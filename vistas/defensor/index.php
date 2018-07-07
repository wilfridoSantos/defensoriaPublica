<?php
include "../../Controlador/sesion.php";
  //print_r( $_SESSION[session_name()]+" abcde123");
  //session_start();
  if($_SESSION["rol"] != 4 ){
     header("Location: ../baseIndex.php");
  }
  $personal=$_SESSION['personal'];
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>Modulo defensor</title>

<!--     <link rel="stylesheet" href="../../recursos/vendors/jquery/src/css/jquery-ui.css" />
    <link rel="stylesheet" href="../../recursos/css/style.css" />
    <script src="../../recursos/vendors/jquery/jquery-ui.js"></script> -->
  <!--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzTOTwZBuaUzajwK5B3K-DGIOGpTu3FdU"></script>
      <link href="../../recursos/css/style.css" rel="stylesheet"/>  -->
    <!-- jQuery -->
    <!-- <script src="../../recursos/vendors/jquery/dist/jquery.min.js"></script> ESTA ESTO Y SE CAMBIO POR LO DE ABAJO-->
    <script  type="text/javascript"  src="../../recursos/js/jquery-1.11.2.min.js"></script> 
    <!-- Bootstrap -->
    <link href="../../recursos/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Font Awesome -->
    <link href="../../recursos/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- NProgress -->
    <link href="../../recursos/vendors/nprogress/nprogress.css" rel="stylesheet"/>
    <!-- iCheck -->
    <link href="../../recursos/vendors/iCheck/skins/flat/green.css" rel="stylesheet"/>
    <!-- Datatables -->
    <link href="../../recursos/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
    <link href="../../recursos/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet"/>
    <link href="../../recursos/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet"/>
    <link href="../../recursos/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet"/>
    <link href="../../recursos/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../../recursos/css/custom.css" rel="stylesheet"/>
  </head>

  <body class="nav-md" style="background-color:black;">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa "></i> <span>Defensoria publica</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../../recursos/uploads/<?php echo $personal[0]['foto'] ?>" alt="..." class="img-circle profile_img"/>
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                                  <?php echo  $personal[0]['nombre'] ?>
                                  <input type="hidden" id="id_personalUser" name=""  value="<?php echo $personal[0]['id_personal']?>">
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
             
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">

                  

                  <li><a><i class="fa fa-home"></i> Servicios y actividad  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a id="registrarActividad">Registrar actividad</a></li>
                    
                       <li><a id="verMisExpediente">Mis expedientes</a></li> 
                      <li><a id="listarActividades">Listar Actividades</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-home"></i> Configuracion <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li><a id="registrarUsuarioServicio">Registrar usuario</a></li>
                      <li><a id="crearExpediente">Crear Expediente</a></li>
                      <li><a id="actualizarDefensor">Actualizar Datos Defensor</a></li> <!-- Editar Defensor -->
                      <li><a id="cambiarAdscripcion">Cambiar Adscripcion Defensor</a></li>
                      <form action="../../action.php" method="post">
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Buscar Defensor(username)" name="busqueda">
                          <div class="input-group-btn">
                              <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                          </div>
                      </div>
                      </form>
                    </ul>
                  </li>
              </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
             
              <a data-toggle="tooltip" data-placement="top" title="Salir" href="../../controlador/salir.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../../recursos/uploads/<?php echo $personal[0]['foto'] ?> " alt=""/><?php// echo $_SESSION['usuario'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                   <!--  <li><a href="javascript:;"> Perfil</a></li> -->
                    <li>
                      <a href="javascript:;">
                       <!--  <span>Configuracion</span> -->
                      </a>
                    </li>

                    <li><a href="../../controlador/salir.php"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
  <!-- page content -->
<div><h1 Bienvenido Coordinador </h1></div>
  
   <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                  
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <div id="dialogo" title="Confirma Eliminar?"></div>
            <?php
              //  print_r ($_SESSION['mensaje']) ;
                     
                     if(isset($_SESSION['mensaje'])){
                      if(isset($_SESSION['mensaje']['tipo'])){

                        if($_SESSION['mensaje']['tipo']=='exito')
                           $alert='alert alert-success';

                        //$alert='alert alert-danger';
                         if($_SESSION['mensaje']['tipo']=='error')
                           $alert='alert alert-danger';

                          if($_SESSION['mensaje']['tipo']=='juzgado')
                            $alert='alert alert-danger';
                           
                          //else $alert='';
                          
                      }
                  ?> <!-- class='alert-dismissible fade in  -->
                    <div id="contenedorMensaje"  class='alert-dismissible fade in <?php echo $alert; ?>'  role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <strong align="center" id="idMensaje">
                        <?php 
                        echo (isset($_SESSION['mensaje']['mensaje'])?$_SESSION['mensaje']['mensaje']:"");
                                                $_SESSION['mensaje']=[];
                                                $_SESSION['mensaje']['tipo']='';
                                                $_SESSION['mensaje']['mensaje']='';
                        ?> 
                     </strong>

                  </div>
                <?php
                 $_SESSION['mensaje']['mensaje']='';
               }
               ?>
            <div class="row" id="menuContainer">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">               
        
                
                  <div class="x_title">
                    <h2></h2>
                    
                   
                    <div class="clearfix"></div>
                  </div>
                  

                  <div class="x_content">
                    
                  <!-- <iframe id="myFrame" width="1000" height="450" src="/default.asp"></iframe>
                   -->  
                   <div align ="center">
                   <img id="img_index_coord"src="../../recursos/images/LOGO_PRINCIPAL.png">
                    <p class="text-justify">
                      MISIÓN
                      <br/>
                      La misión de la Defensoría Pública es garantizar el derecho humano de acceso a la justicia a los sectores sociales que lo requieran, priorizando la atención a las personas de escasos recursos económicos y en situación de vulnerabilidad, a través de los servicios jurídicos de asesorías, patrocinio y defensa técnica, adecuada y diligente en materia penal, justicia especializada para adolescentes, civil, familiar, mercantil, agraria, administrativa y constitucional.
                     </p>
                     <p class="text-justify">
                       VISIÓN
                       <br/>
                      Ser una institución a la vanguardia que brinde servicios jurídicos con sensibilidad humana, ética y compromiso con la sociedad oaxaqueña, a fin de consolidar el Sistema de Justicia, la democracia, y el ejercicio pleno de la libertad, en un ambiente de equidad y respeto absoluto a los derechos humanos.
                      </p>
                      <p class="text-justify">
                      PRINCIPIOS
                      <br/>
                      Los principios que deben regir la conducta de los servidores públicos dependientes de la Defensoría Pública del Estado de Oaxaca, serán:
                      </p>
                       
                      <?php
                //echo $_SESSION['dirigir'];
                if(isset($_SESSION['dirigir'])) {
                switch ($_SESSION['dirigir']) {
                case 'registrar_usuario':
                $_SESSION['dirigir']="";
                      ?>  
                      <script>
                      $('#menuContainer').children().remove();
                      
                      $('#menuContainer').load("registroUsuarioServicio.php");
                     
                      </script>
                      
                <?php  break;
                case 'listar_defensor':?>
                    <script>//    $('#menuContainer').load("listarDefensores.php"); </script>
                    <?php 
                break;
                case 'cambioAdscripcion':
                    ?>
                    <script>//    $('#menuContainer').load("cambiarAdscripcion.php"); </script>
                   <?php 
                break;
                
                case 'asignar_defensor':  $_SESSION['dirigir']="";?>
                    <script>
                        $('#menuContainer').load("asignarDefensor.php"); </script>
                        
                    <?php
                 break;
                 case 'listar_Expediente':  $_SESSION['dirigir']="";?>
                   <script>
                     $('#menuContainer').load("../administrador/verExpediente.php"); </script>
                     
                    <?php
                 break;
                
                default:
                //require_once("../usuario/registrar.php.php");   
                    break;
            }
          }
        ?>                   
                    </div>
                  </div>
                </div>
              </div>


                   
					
					
                  </div>
                </div>
              </div>
            </div>
          </div>
          
         
        </div>
        <!-- /page content --> 


        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <a href="https://colorlib.com"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->


    <!-- Bootstrap -->
    <script type="text/javascript"  src="../../recursos/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script  type="text/javascript" src="../../recursos/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script  type="text/javascript"  src="../../recursos/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script  type="text/javascript"  src="../../recursos/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script  type="text/javascript"  src="../../recursos/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script  type="text/javascript"  src="../../recursos/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script  type="text/javascript"  src="../../recursos/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script  type="text/javascript"  src="../../recursos/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script  type="text/javascript"  src="../../recursos/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script  type="text/javascript"  src="../../recursos/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script  type="text/javascript"  src="../../recursos/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script  type="text/javascript"  src="../../recursos/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script  type="text/javascript"  src="../../recursos/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script  type="text/javascript"  src="../../recursos/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script  type="text/javascript"  src="../../recursos/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script  type="text/javascript"  src="../../recursos/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script  type="text/javascript"  src="../../recursos/vendors/jszip/dist/jszip.min.js"></script>
    <script  type="text/javascript"  src="../../recursos/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script  type="text/javascript"  src="../../recursos/vendors/pdfmake/build/vfs_fonts.js"></script><!-- 
    <script  type="text/javascript" src="../../recursos/vendors/jquery/jquery-ui.js"></script> -->
    <link rel="stylesheet" href="../../recursos/vendors/jquery/jquery-ui-themes-1.12.1/jquery-ui.css"> 
    <!-- Custom Theme Scripts -->
    <script  type="text/javascript"  src="../../recursos/js/custom.min.js"></script>
    <script  type="text/javascript"  src="../../recursos/js/herramienta.js"></script>
    <script  type="text/javascript"  src="../../recursos/js/defensor/atendiendoDefensor.js"></script>
    <script  type="text/javascript"  src="../../recursos/js/jquery-ui.1.12.1.js"></script>
    <script  type="text/javascript"  src="../../recursos/js/main.js"></script>
  </body>
</html>
