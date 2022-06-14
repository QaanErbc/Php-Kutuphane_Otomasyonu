<?php 
$isInRole=false;

if(isset($_SESSION['rol']) && $_SESSION['rol']=="Admin"){
	$isInRole=true;
}
?>