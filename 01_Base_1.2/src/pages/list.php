<div id="list">
<form action="<?php echo htmlentities($_SERVER["REQUEST_URI"]);?>" method="get">
<select name="category_id" onchange="this.form.submit();">
<option value="0">--- Tout ---</option>
<?php
	$sql = "SELECT * FROM articlescategories";
	//$result = $pdo->query($sql);
	$result = $connect->fetch($sql);

	foreach($result AS $val){
	?>
			<option value="<?php echo $val["id"];?>"<?php if($val["id"] == @$_GET["category_id"]) echo 'selected="selected"';?>><?php echo $val["category"];?></option>
		<?php
			}
		?>
</select>
</form>

<table>
<?php
	$sqlCat = "SELECT * FROM articlescategories";
	if(@$_GET["category_id"] != 0)
		$sqlCat .= " WHERE id=".$_GET["category_id"];
	//$resultCat = $pdo->query($sqlCat);
	$resultCat = $connect->fetch($sqlCat);
		foreach($resultCat AS $valCat){
	?>

	<tr><td colspan="4"><h2><?php echo $valCat["category"];?></h2></td></tr>
	<tr>
		<th>Image</th>
		<th>Titre</th>
		<th>Prix</th>
		<th>Panier</th>
	</tr>
	<?php
		$sql = "SELECT * FROM articles WHERE category_id = ".$valCat["id"];
		//$result = $pdo->query($sql);
		$result = $connect->fetch($sql);
		foreach($result AS $val){
	?>
		<tr>
			<td><img src="assets/images/articles/<?php echo $val["picture"];?>" alt="<?php echo $val["title"];?>" /></td>
			<td><a href="view?id=<?php echo $val["id"];?>"><?php echo $val["title"];?></a></td>
			<td class="prix"><?php echo number_format($val["price"], 2);?></td>
			<td><a href="basket?action=add&amp;id=<?php echo $val["id"];?>">Ajouter au panier</a></td>
		</tr>
		<?php
			}
	}?>
</table>

</div>