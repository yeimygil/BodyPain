<?php
include("../funciones.php");
	$link= conectar();

    $id_juego = $_POST["id_juego"];
    $n_muertes = $_POST["n_muertes"];
    $n_asesinatos = $_POST["n_asesinatos"];
    $n_tiempo = $_POST["n_tiempo"];

	$sql_inser_juego="UPDATE juegos set juegos.tiempo_jugado = sec_to_time('$n_tiempo'+(time_to_sec(juegos.tiempo_jugado)))
    , juegos.muertes_totales= '$n_muertes', juegos.asesinatos_totales='$n_asesinatos'
    where juegos.id_juego = '$id_juego'";
	$query_guardar_juego= mysqli_query($link,$sql_inser_juego);
	if(mysqli_insert_id($link)!=0)
	{
		echo mysqli_insert_id($link);
	}else{
		echo "error no registro";
	}
?>