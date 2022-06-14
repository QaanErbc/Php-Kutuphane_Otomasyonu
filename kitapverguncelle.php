<meta charset="utf-8">
<?php include 'vt.php'; ?>
<?php

if(isset($_GET['Id'])){
	$id = $_GET['Id'];
	$sorgu=$vt->prepare("UPDATE akitap SET Durum=1 WHERE id=$id");
	$sorgu->execute();
	echo "Başarıyla İade Edildi";
	header("Refresh:1; url=/otm/kitapver.php");
}else{
	header("Refresh:1; url=/otm/kitapver.php");
}

?>