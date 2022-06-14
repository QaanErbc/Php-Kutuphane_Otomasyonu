<meta charset="utf-8">
<?php 
	session_start();
	unset($_SESSION['isLogin']);
	echo "Çıkış Başarılı";
	header("Refresh:1; url=giris.php");
?>