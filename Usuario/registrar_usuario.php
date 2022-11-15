<?php
	include("../funciones.php");
	$link= conectar();
	
	$consulta_genero = "select * from genero";
	$resultado_genero=mysqli_query($link,$consulta_genero);
	
	$consulta_tipo_persona = "select * from tipo_persona";
	$resultado_tipo_persona =mysqli_query($link,$consulta_tipo_persona);
	
	$consulta_departamento = "select * from departamentos";
	$resultado_departamento =mysqli_query($link,$consulta_departamento);
?>
<?php  include("../bootstrap/header.php");?>
  </head>
  <body>
<?php  include("../bootstrap/barra_navegacion.php");?>
<br>
<div class="container">
	<div class="card">
		<div class="card-header" style="background-color: #dc3545; color: white; font-weight: bold;">
				<center><h5>registrar</h5></center>
		</div>
		<div class="card-body">
			<form action="guardar_usuario.php" method="post">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label >Usuario:</label>
						<input class="form-control" type="text"  id="txtusuario" name="txtusuario" size="30"/>
					</div>
					<div class="form-group col-md-6">
						<label>Contrasena:</label>
						<input class="form-control" type="password"  id="pass" name="pass" size="30"/>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Fecha de nacimiento:</label>
						<input class="form-control" type="date"  id="fecha_nac" name="fecha_nac" size="30"/>
					</div>
					
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Genero</label>
						<select class="form-control" id="sl_genero" name="sl_genero">
							<option value="0">.:Seleccionar:</option>
							<?php
							while($fila_genero=mysqli_fetch_array($resultado_genero))
							{
								extract($fila_genero);
								echo "<option value='$id_genero'>$nombre_genero</option>";
							}		
							?>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Departamento</label>
						<select class="form-control" id="sl_departamento" name="sl_departamento">
							<option value="0">.:Seleccionar:</option>
							<?php
							while($fila_departamento=mysqli_fetch_array($resultado_departamento))
							{
								extract($fila_departamento);
								if($id_departamento!=$sl_departamento)
								{
									echo "<option value='$id_departamento'>$nombre_departamento</option>";
								}else{
									echo "<option value='$id_departamento' selected>$nombre_departamento</option>";
								}
							}		
							?>
						</select>
					</div>
				</div>
				<input class="btn btn-primary" type="submit" value="enviar" id="btn_registrar_persona" name="btn_registrar_persona"/>
			</form>
		</div>
		
	</div>
</div>

<?php  include("../bootstrap/body.php")?>

