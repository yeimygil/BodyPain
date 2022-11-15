<?php
	include("funciones.php");
	$link= conectar();
	extract($_POST);
	$password=sha1($pass);
	$consulta_comprobacion="SELECT a.id_persona, a.usuario, a.contrasena, a.id_tipo_persona_fk FROM personas a, tipo_persona b 
	WHERE a.id_tipo_persona_fk=b.id_tipo_persona and a.usuario='$txtusuario'";
	$resultado_comprobacion=mysqli_query($link,$consulta_comprobacion);
	if($comprobacion=mysqli_fetch_array($resultado_comprobacion)){
		extract($comprobacion);
		if($contrasena==$pass){//colocar el $password
			session_start();
			$_SESSION['id_tipo_persona']=$id_tipo_persona_fk;
			$_SESSION['usuario']=$txtusuario;
            echo session_id();
            echo $_SESSION['usuario'];
            header("location:index.php");
		}else{
			echo "error  a";
			//header("location:login.php");
		}
	}else{
		echo "error  b";
		header("location:login.php");
	}
?>