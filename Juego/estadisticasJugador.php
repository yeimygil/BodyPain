<?php
	include("../funciones.php");
	$link= conectar();
	extract($_POST);

	$filtro_departamento="";

	if(isset($sl_departamento) && $sl_departamento!=0)
	{
		$filtro_departamento=" and 	c.id_departamento= $sl_departamento";  
	}

    $consulta_persona='select a.usuario, c.nombre_departamento, b.tiempo_jugado, b.muertes_totales, b.asesinatos_totales, b.porcentaje_completado
	from personas a, juegos b, departamentos c
	where
	a.id_persona = b.id_persona_fk and 
	c.id_departamento = a.id_departamento_fk';
	$orden=" order by b.muertes_totales desc";
	$super_consulta_persona = $consulta_persona.$filtro_departamento.$orden;
	$resultado_persona=mysqli_query($link,$super_consulta_persona);
  
	$consulta_departamento = "select a.id_departamento, a.nombre_departamento from departamentos a";
	$resultado_departamento =mysqli_query($link,$consulta_departamento);
  

  $consulta_top='SELECT p.usuario as label, MAX(j.asesinatos_totales) as y, j.id_juego
    FROM personas p
    INNER JOIN juegos j on j.id_persona_fk = p.id_persona
    GROUP BY p.usuario 
    ORDER BY j.asesinatos_totales DESC
    LIMIT 10';
 $resultado_top=mysqli_query($link,$consulta_top);
 $data = array();

 while ($dataPoints = mysqli_fetch_array($resultado_top)) 
 {
    extract($dataPoints);
    array_push($data,$dataPoints);
 }

  $datajson=json_encode($data,JSON_NUMERIC_CHECK);

  $consulta_muertes='SELECT d.nombre_departamento AS label, SUM(j.muertes_totales) AS  y
FROM departamentos d
INNER JOIN personas p on p.id_departamento_fk = d.id_departamento
INNER JOIN juegos j on j.id_persona_fk = p.id_persona
GROUP BY d.nombre_departamento
ORDER BY j.muertes_totales DESC
LIMIT 10';

$resultado_muertes=mysqli_query($link,$consulta_muertes);
$datam=array();
 while ($datamPoint = mysqli_fetch_array($resultado_muertes)) 
 {
    extract($datamPoint);
    array_push($datam,$datamPoint);
 }
   $datamjson=json_encode($datam,JSON_NUMERIC_CHECK);


   $consulta_completado='SELECT COUNT(s1.MPC) as y, s1.MPC as x FROM(
SELECT p.usuario, MAX(j.porcentaje_completado) as MPC, j.id_juego
    FROM personas p
    INNER JOIN juegos j on j.id_persona_fk = p.id_persona
    GROUP BY p.usuario 
    ORDER BY j.porcentaje_completado DESC) s1
GROUP BY s1.MPC;';
$resultado_completado=mysqli_query($link,$consulta_completado);
$datac=array();
 while ($datacPoint = mysqli_fetch_array($resultado_completado)) 
 {
    extract($datacPoint);
    array_push($datac,$datacPoint);
 }
   $datacjson=json_encode($datac,JSON_NUMERIC_CHECK);

?>
<?php  include("../bootstrap/header.php");?>
<script>
window.onload = function () {
  //Grafica de barras 1
  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    title: {
      text: "Top 10 asesinatos"
    },
    axisY: {
      title: "Asesinatos totales"
    },
    data: [{
      type: "column",
      dataPoints: <?php echo $datajson ?>
    }]
  });
  chart.render();

  //Grafica de barras 2
  var chart2 = new CanvasJS.Chart("chartContainer2", {
    animationEnabled: true,
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    title: {
      text: "Top 10 muertes por municipio"
    },
    axisY: {
      title: "Muertes totales"
    },
    data: [{
      type: "column",
      dataPoints: <?php echo $datamjson ?>
    }]
  });
  chart2.render();

  //Grafica de areas
  var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	//theme: "light2",
	title:{
		text: "Porcentaje completado"
	},
	axisX:{
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	axisY:{
		title: "in Metric Tons",
		includeZero: true,
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	toolTip:{
		enabled: false
	},
	data: [{
		type: "area",
		dataPoints: <?php echo $datacjson ?>
	}]
});
chart3.render();
}

</script>

  </head>
  <body>
<?php  include("../bootstrap/barra_navegacion_juegos.php");?>
<br>
<div class="container ">
  <div class="row">
    <div class="col-md-4">
      <div class="card card-body">
				<form action="" method="post">
          <div class="form-group">
            departamento:
						<select class="form-control" id="sl_departamento" name="sl_departamento">
              <option value="0">.:Seleccionar:</option>
							<?php
							while($fila_departamento=mysqli_fetch_array($resultado_departamento))
							{
                extract($fila_departamento);
								echo "<option value='$id_departamento'>$nombre_departamento</option>";
							}		
							?>
						</select><br>		
						<input class="form-control btn btn-info" type="submit" value="Buscar" id="btn_buscar_persona" name="btn_buscar_persona"/>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-8">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
						<div class="card text-center">
							<div class="card text-left">
								<div class="card-header"><center><h3>Tabla de Estadisticas</h3></center></div>
								<div class="card-body">
									<table id="example" class="display nowrap table table-hover table-bordered" style="width:100%" >
										<thead style="background-color: #dc3545; color: white; font-weight: bold;">
											<tr>
												<th>usuario</th>
												<th>Departamento</th>
												<th>Tiempo total de juego</th>
												<th>Muertes totales</th>
												<th>Asesinatos totales</th>
												<th>porcentaje completado</th>
											</tr>
										</thead>
										<?php
										while($fila_persona=mysqli_fetch_array($resultado_persona))
										{
											extract($fila_persona);
											echo "
											<tr>
											<td>$usuario</td>
											<td>$nombre_departamento</td>
											<td>$tiempo_jugado</td>
											<td>$muertes_totales</td>
											<td>$asesinatos_totales</td>
											<td>$porcentaje_completado</td>
											</tr>";
										}
										?>
										<tbody>

										</tbody>
									</table>

								</div>
								<div class="card-footer text-muted"><center><h3>Body Pain</h3></center></div>
							</div>
						</div>
					</div>
				</div>  
			</div>   
		</div>
	</div>
</div>
<div class="chartContainer" style="height: 370px; width: 100%;" id="chartContainer"></div>
<div class="chartContainer2" style="height: 370px; width: 100%;" id="chartContainer2"></div>
<div class="chartContainer3" style="height: 370px; width: 100%;" id="chartContainer3"></div>

<?php  include("../bootstrap/body.php")?>

<style type="text/css">
	div.dataTables_wrapper {
		width: 600px;
		margin: 0 auto;
	}

</style>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable( {
			"paging": false,
			"searching": false,
			"scrollY": 600,
			"bInfo" : false,
			" colReorder:": false,
			"scrollX": true,
			"ordering": false
		} );
	} );
</script>