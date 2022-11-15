<?php
	include("funciones.php");
	$link= conectar();
	session_start();
	unset($_SESSION['id_tipo_persona']);
	unset($_SESSION['usuario']);
	session_destroy();
	header("location:index.php");
?>
