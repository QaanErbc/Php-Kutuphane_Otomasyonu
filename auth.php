<?php 
session_start();
if(isset($_SESSION['isLogin'])){
	
}else{
	header("Refresh:1; url=/otm/giris.php");
	exit();
}
?>