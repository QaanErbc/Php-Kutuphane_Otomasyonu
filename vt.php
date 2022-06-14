<?php


try 
{//Burada Bulunan Kodları yapmayı dener
	$vt = new PDO('mysql:host=localhost; port=3307 ;dbname=otomasyon; charset=utf8', "root", "123usb");
}catch (Exception $e)
{//hata varsa $e değişkenine aktarır
	echo 'Hata Oluştu';
	echo $e->getMessage();
	
//include ederek bağlandım diğer sayfalara
}
?>