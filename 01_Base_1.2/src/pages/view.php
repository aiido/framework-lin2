<div id="view">
	<?php
		$sql = "SELECT * FROM articles WHERE id = ".$_GET["id"];
		$result = $pdo->query($sql);
		while($val = $result->fetch()){
	?>

	<h1><?php echo $val["title"];?></h1>
	<img src="assets/images/articles/<?php echo $val["picture"];?>" alt="<?php echo $val["title"];?>" />
	<p><?php echo $val["description"];?></p>
	<div class="prix"><?php echo number_format($val["price"], 2);?></div>
	<a href="basket?action=add&amp;id=<?php echo $val["id"];?>">Ajouter au panier</a>
	<br /><br />

	<?php
		}
	?>
</div>
