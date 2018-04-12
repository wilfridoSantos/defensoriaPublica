<?php
if (session_start()) {
 
  session_destroy();
  $_SESSION["autentificado"] = false;
  //header("Expires: Tue, 13 Jan 2005 16:00:00 GMT"); // Ponemos la fecha siempre en pasado
  //header("Pragma: no-cache"); 
  //header("Cache-Control: no-cache");  
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>

        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Defensoria publica del estado de oaxaca| </title>

    <!-- Bootstrap -->
    <link href="recursos/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Font Awesome -->
    <link href="recursos/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- NProgress -->
    <link href="recursos/vendors/nprogress/nprogress.css" rel="stylesheet"/>
    <!-- Animate.css -->
    <link href="recursos/vendors/animate.css/animate.min.css" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="recursos/css/custom.min.css" rel="stylesheet"/>



        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="recursos/js/jquery-1.11.2.min.js"></script>
        <script src="recursos/js/modernizr.js"></script>
        <script src="recursos/js/bootstrap.min.js"></script>
        <script src="recursos/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="recursos/js/main.js"></script>    
        <link rel="stylesheet" href="Recursos/css/beforeSend.css">
  </head>
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          
            <form  method="POST">
              
              <h1>Defensoria publica</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required=""  name="username" id="usuarios_inicio"
                onkeyup = "if (event.keyCode == 13) ingresarSistema()" maxlength="70"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password"
                onkeyup = "if (event.keyCode == 13) ingresarSistema()"  name="password_txt" required="" maxlength="70"/>
              </div>
              <div>
                
               <button id="ingresar" class="btn btn-primary btn-sm " type="button"  onclick="ingresarSistema()"  >
               <i class="zmdi zmdi-arrow-right">&nbsp;</i>
                Iniciar Sesion
               </button>
               <button id="restorePassword" onclick="olvido();" class="btn btn-primary btn-sm" type="button" >
               <i class="zmdi zmdi-key"> &nbsp;</i>
                Recuperar Contrasenia
               </button>

                <div id="mensaje_index"  style="background: #fff; border-radius: 1em;" class="group-material-login text-center">                   
                </div>
               
               <!--
               <button type="submit"  class="btn btn-default">
                 <a type="submit"> recuperar </a>
              </button>
               
                <button id="ingresar" onclick="ingresarSistema()" class="btn-login" type="button">Ingresar al sistema &nbsp; <i class="zmdi zmdi-arrow-right"></i></button>                
                <div id="mensaje_index"  style="background: #fff; border-radius: 1em;" class="group-material-login text-center">     
                  -- >
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Crear nueva cuenta </a>
                </p>

                <div class="clearfix"></div>
                <br/>

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
          
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              
              <div>
                <a class="btn btn-default submit" type="submit">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body> 
</html>
