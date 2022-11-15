<?php
include("../funciones.php");
	$link= conectar();

    $id_usuario = $_POST["id_usuario"];

	$sql_inser_juego="INSERT into juegos (juegos.id_persona_fk)
    VALUES ('$id_usuario')";
	$query_guardar_juego= mysqli_query($link,$sql_inser_juego);
	if(mysqli_insert_id($link)!=0)
	{
		echo mysqli_insert_id($link);
	}else{
		echo "error no registro";
	}
?>