<?php  include("bootstrap/header.php");?>
  </head>
  <body>
<div class="sidenav">
   <div class="login-main-text">
      <h2>Solicitud<br>Pagina de inicio de sesion</h2>
      <p>Inicie sesion desde aqui para acceder.</p>
   </div>
</div>
<div class="main">
   <div class="col-md-6 col-sm-12">
      <div class="login-form">
         <form action="comprobacion_usuario.php" method="post">
            <div class="form-group">
               <label>User</label>
               <input name="txtusuario" id="txtusuario" type="text" class="form-control" placeholder="usuario">
            </div>
            <div class="form-group">
               <label>Password</label>
               <input name="pass" id="pass" type="password" class="form-control" placeholder="password">
            </div>
            
            <button name="btn_login" id="btn_login" type="submit"class="btn btn-black">Iniciar sesion</button>
         </form>
         
      </div>
   </div>
</div>
<a href="Usuario/registrar_usuario.php"><center>Crear Cuenta</center></a>

<?php  include("bootstrap/body.php")?>














<style type="text/css">
   body {
    font-family: "Lato", sans-serif;
}



.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background-color: #EC200F;
    overflow-x: hidden;
    padding-top: 20px;
}


.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 80%;
    }

    .register-form{
        margin-top: 20%;
    }
}


.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #EC200F !important;
    color: #fff;
}
</style>