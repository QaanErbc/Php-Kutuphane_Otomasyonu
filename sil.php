<?php include 'vt.php';
	if(isset($_GET['ID']))
	{
		 $id=$_GET['ID']; 
		
		//die(); // die kes sonraki kodları çalıştırma demektir
		
		$sorgu=$vt->prepare("DELETE FROM akitap WHERE ID=?"); //php.org.pdo
		
		$sorgu->execute(array($id));
		echo "Kayıt Silindi";
	}
	header("Refresh:1 Url=anasf.php"); // 1 sn bekledikten sonra ana sayfaya dönemsine yarar


?>