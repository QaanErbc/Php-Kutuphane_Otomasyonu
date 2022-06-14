<meta charset="utf-8">
<?php include 'vt.php'; ?>
<?php

if(isset($_GET['Id'])){
	$id = $_GET['Id'];
	$sorgu=$vt->prepare("UPDATE akitap SET Durum=0 WHERE id=$id");
	$sorgu->execute();
	echo "Başarıyla Alındı";
	header("Refresh:1; url=/otm/kitapal.php");
}else{
	header("Refresh:1; url=/otm/kitapal.php");
}

?>