<?php
include "../../Controlador/sesion.php";
  //print_r( $_SESSION[session_name()]+" abcde123");
  if($_SESSION["rol"] != 1 ){
     header("Location: ../baseIndex.php");
     
  }
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>Modulo ADMINISTRADOR</title>
    

     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzTOTwZBuaUzajwK5B3K-DGIOGpTu3FdU"></script>
      <link href="../../recursos/css/style.css" rel="stylesheet"/> 

    <script src="../../recursos/vendors/jquery/dist/jquery.min.js"></script>
    <link href="../../recursos/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    
    <link href="../../recursos/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>

    <link href="../../recursos/vendors/nprogress/nprogress.css" rel="stylesheet"/>

    <link href="../../recursos/vendors/iCheck/skins/flat/green.css" rel="stylesheet"/>

    <link href="../../recursos/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
    <link href="../../recursos/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet"/>
    <link href="../../recursos/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet"/>
    <link href="../../recursos/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet"/>
    <link href="../../recursos/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet"/>


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
                <img src="../../recursos/images/img.jpg" alt="..." class="img-circle profile_img"/>
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                                  <?php //echo $_SESSION['usuario'] ?>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
             
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">

                  <li><a><i class="fa fa-home"></i> Generar Informe <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a id="informeActividades">Generar Informe de Actividades</a></li>  
                    <!-- <li><a id="informeAnual">Generar Informe Anual</a></li>
                      <li><a id="informeMensual">Generar Informe Mensual</a></li>
                      <li><a id="informeEspecifico">Generar Informe Especifico</a></li>

                      <li><a id="tarjetaInformativa">Generar Tarjeta Informativa</a></li>-->
                      
                    </ul>
                  </li>

                  <li><a><i class="fa fa-home"></i> Servicios Defensores <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a id="listarDefensores">Listar Defensores</a></li>
                      <li><a id="listarExpedientes">Listar Expedientes</a></li>
                      
          
                    </ul>
                  </li>

                  <li><a><i class="fa fa-home"></i> Configuracion Personal <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li><a id="registrarDefensor">Registrar personal</a></li>
                     <!--  <li><a id="cambiarAdscripcion">Cambiar Adscripcion Defensor</a></li> -->
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
             
              <a data-toggle="tooltip" data-placement="top" title="Salir" href="../../index.php">
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
                    <img src="../../recursos/images/img.jpg" alt=""/><?php// echo $_SESSION['usuario'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span>Configuracion</span>
                      </a>
                    </li>

                    <li><a href="../../index.php"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="../../recursos/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo $_SESSION['usuario'] ?></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                        asignacion de caso => defensor: xxx, fecha:
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="../../recursos/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span><?php //echo $_SESSION['usuario'] ?></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          asignacion de caso => defensor: xxx, fecha:  
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="../../recursos/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span><?php// echo $_SESSION['usuario'] ?></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="../../recursos/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span><?php //echo $_SESSION['usuario'] ?></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>Ver todas las notificaciones</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
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
            <div id="dialogo" title="Confirma Eliminar?" message="haksjdhkjas"></div>
            
            <?php
               // echo isset($_SESSION['mensaje']);
              

                     if(isset($_SESSION['mensaje'])){
                      if(isset($_SESSION['mensaje']['tipo'])){

                        if($_SESSION['mensaje']['tipo']=='exito')
                           $alert='alert alert-success';

                        //$alert='alert alert-danger';
                         if($_SESSION['mensaje']['tipo']=='error')
                           $alert='alert alert-danger';
                         
                          if($_SESSION['mensaje']['tipo']=='juzgado')
                            $alert='alert alert-danger';                           
                          
                      }
                  ?>
                    <div class='<?php echo $alert; ?>'  role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                      <strong align="center">
                        <?php 
                        echo (isset($_SESSION['mensaje']['mensaje'])?$_SESSION['mensaje']['mensaje']:"");
                                                $_SESSION['mensaje']=[];
                                                $_SESSION['mensaje']['tipo']='';
                                                $_SESSION['mensaje']['mensaje']='';
                        ?> 
                     </strong>

                  </div>
                <?php
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
               // echo $_SESSION['dirigir'];
               if(isset($_SESSION['dirigir'])) {
               switch ($_SESSION['dirigir']) {
                case 'registrar_defensor':
                $_SESSION['dirigir']="";?>  
                    <script>
                     $('#menuContainer').children().remove();
                     $('#menuContainer').load("../usuarios/registrar.php");
                     
                     </script>
                 <?php 
               break;
              case 'listar_defensor':$_SESSION['dirigir']="";?>
                    <script>  
                    $('#menuContainer').children().remove();
                   // $('#menuContainer').load("listarDefensores.php");/// probar con window.load o algo asi
                     </script>
                    
                 <?php
              break;
              case 'cambioAdscripcion':
              $_SESSION['dirigir']="";?>
                    <script> 
                    $('#menuContainer').children().remove();
                    $('#menuContainer').load("cambiarAdscripcion.php"); </script>
                  <?php 
              break;
                
                
                default:
               // require_once("../usuario/registrar.php.php");   
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
<!--           <div class="col-md-4">
                        <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                          <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                        </div>  -->
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
  
    <script src="../../recursos/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script src="../../recursos/vendors/fastclick/lib/fastclick.js"></script>
    
    <script src="../../recursos/vendors/nprogress/nprogress.js"></script>
   
    <script src="../../recursos/vendors/iCheck/icheck.min.js"></script>
    <script src="../../recursos/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../recursos/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../../recursos/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../recursos/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../../recursos/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../../recursos/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../recursos/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../recursos/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../../recursos/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../../recursos/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../recursos/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../../recursos/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../../recursos/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../../recursos/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../../recursos/vendors/pdfmake/build/vfs_fonts.js"></script>

    
    <script src="../../recursos/js/custom.min.js"></script>
    <script src="../../recursos/js/Gestion.js"></script>
    <script src="../../recursos/js/main.js"></script>
    <script src="../../recursos/js/herramienta.js"></script>
    <script src="../../recursos/js/bootstrap.notify.js"></script>
  </body>
</html>
<?php
 if( $_SESSION['post_data'] == 1 ){
?>
    <script>$("#menuContainer").load("listarExpedientes.php");</script>

<?php
  unset($_SESSION['post_data']);
  }  
?>
<script>
  setTimeout(function() {
//	$.notifyClose();
console.log("hola");

$.notify("Hello World"); 
}, 100);
//$.notify("Hello World");  
</script>