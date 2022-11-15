<?php
include("../funciones.php");
	$link= conectar();
	extract($_POST);
	$sql_inser_usuario="insert into personas (personas.usuario, personas.contrasena, personas.fecha_nacimiento, 
    personas.id_departamento_fk, personas.id_tipo_persona_fk, personas.id_genero_fk)
    values
            ('$txtusuario', '$pass', '$fecha_nac', $sl_departamento, 2, '$sl_genero')";
	$query_guardar_usuario= mysqli_query($link,$sql_inser_usuario);
	if(mysqli_insert_id($link)!=0)
	{
		echo "<center><h1>el usuario fue guardado exitosamente</h1></center>";
		header("location:../login.php");
	}else{
		echo "<center><h1>Error al registrar la persona</h1></center>";
	}
?>