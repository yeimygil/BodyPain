<?php  
  session_start();
  include("header.php");
?>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Body Pain</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../index.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Pagina_Principal/QuienesSomos.php">Quienes somos</a>
        </li>
        <?php
        if(!empty($_SESSION['usuario'])){
          echo '
        <li class="nav-item">
          <a class="nav-link" href="./estadisticasJugador.php">Estadisticas</a>
        </li>
        ';
      }
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Juegos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../Pagina_Principal/bodypain.php">BodyPain</a>
          </div>
        </li>  
    </ul>
    <?php
    if(empty($_SESSION['usuario'])){
        echo '<form action="../login.php" class="form-inline my-2 my-lg-0">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Iniciar sesion</button>
        </form>';
    }else{
        echo '<form action="../cerrar_sesion.php" class="form-inline my-2 my-lg-0">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerrar sesion</button>
      </form>';
    }
    ?>
    <?php
    if(empty($_SESSION['usuario'])){
        echo '<form action="../Usuario/registrar_usuario.php" class="form-inline my-2 my-lg-0">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Registrarse</button>
        </form>';
    }else{
        echo '';
    }
    ?>
  </div>
</nav>
<?php  include("body.php")?>