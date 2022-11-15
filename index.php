<?php
	include("funciones.php");
	$link= conectar();
    session_start();
    if(!empty($_SESSION['usuario'])){
        //echo $_SESSION['usuario'];
    }
?>
<?php  include("bootstrap/header.php");?>
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">BodyPain</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Pagina_Principal/QuienesSomos.php">Quienes somos</a>
        </li>
        <?php
        if(!empty($_SESSION['usuario'])){
          echo '
        <li class="nav-item">
          <a class="nav-link" href="juego/estadisticasJugador.php">estadisticas</a>
        </li>
        ';
      }
        ?>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Juegos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="Pagina_Principal/bodypain.php">BodyPain</a>
          </div>
        </li>
    </ul>
    <?php
    if(empty($_SESSION['usuario'])){
        echo '<form action="login.php" class="form-inline my-2 my-lg-0">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Iniciar sesion</button>
        </form>';
    }else{
        echo '<form action="cerrar_sesion.php" class="form-inline my-2 my-lg-0">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">cerrar sesion</button>
      </form>';
    }
    ?>
    <?php
    if(empty($_SESSION['usuario'])){
        echo '<form action="Usuario/registrar_usuario.php" class="form-inline my-2 my-lg-0">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Registrarse</button>
        </form>';
    }else{
        echo '';
    }
    ?>
  </div>
</nav>



<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>TRABAJA CON PERFECCION</h1>
        <p>EL MEJOR EQUIPO DE TRABAJO</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="bootstrap/pro.jpg" class="d-block w-100" alt="list-style-image">
      <div class="carousel-caption d-none d-md-block">
        <h1>LA PRIORIDAD ES EL CLIENTE</h1><br></br>
        <p>VELAR POR LA SATISFACCCION DE CLIENTE</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="bootstrap/canasta.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>RESPONSABILIDAD</h1>
        <p>LA CARACTERISTICA DE TODOS NUESTROS EMPLEADOS</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

  </body>
</html>