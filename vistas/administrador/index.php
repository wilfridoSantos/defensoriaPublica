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

    <title>Modulo Coordinador General</title>

<!--     <link rel="stylesheet" href="../../recursos/vendors/jquery/src/css/jquery-ui.css" />
    <link rel="stylesheet" href="../../recursos/css/style.css" />
    <script src="../../recursos/vendors/jquery/jquery-ui.js"></script> -->
    
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
                <img src="../../recursos/images/defensoriav1.png" alt="..." class="img-circle profile_img"/>
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                                  <?php echo $_SESSION['usuario'] ?>
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
                      <li><a id="informeAnual">Generar Informe Anual</a></li>
                      <li><a id="informeMensual">Generar Informe Mensual</a></li>
                      <li><a id="informeEspecifico">Generar Informe Especifico</a></li>
                      <li><a id="tarjetaInformativa">Generar Tarjeta Informativa</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-home"></i> Servicios Defensores <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a id="listarDefensores">Listar Defensores</a></li>
                      <li><a id="listarAudiencias">Listar Audiencias Defensores Por Fecha</a></li>
                      <li><a id="listarVisitas">Listar Visitas Carcelarias Por Fecha</a></li>
                      <li><a id="listarAsesoria">Listar Asesorias Por Fecha</a></li>
                      <li><a id="asignarCaso">Asignar Un Caso</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-home"></i> Configuracion Defensores <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li><a id="registrarDefensor">Registrar personal</a></li>
                      <li><a id="eliminarDefensor">Eliminar (E.logica) Defensor</a></li>
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
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
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
                    <img src="../../recursos/images/img.jpg" alt=""/><?php echo $_SESSION['usuario'] ?>
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
                          <span><?php echo $_SESSION['usuario'] ?></span>
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
                          <span><?php echo $_SESSION['usuario'] ?></span>
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
<div>

<h1 Bienvenido Coordinador </h1>
</div>
  
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

            <div class="row" id="menuContainer">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">               
                  <?php
                     if(!isset($_SESSION['mensaje'])){
                          $alert='alert alert-success';
                  ?><h3><?php echo $_SESSION['mensaje'] ?></h3>
                  <?php
                       // echo $_SESSION['mensaje'];
                        if($_SESSION['mensaje']['tipo']=='error')
                          $alert='alert alert-danger';
                           
                  ?>
                    <div class='" <?php echo $alert; ?>"' alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <strong align="center">
                        <?php 
                        echo $_SESSION['mensaje']['mensaje'];
                                                $_SESSION['mensaje']=[];
                        ?> 
                     </strong>

                  </div>
                <?php
               }
               ?>
                
                  <div class="x_title">
                    <h2></h2>
                    
                   
                    <div class="clearfix"></div>
                  </div>
                  

                  <div class="x_content">
                    
                      
                    <div align ="center">
                 
                      <?php 
            switch (isset($_GET['dirigir'])) {
                case 'registrar_defensor':
                    require_once("../usuarios/registrar.php");                    
                    break;
                
                    case 'listar_defensor':
                    require_once("../usuarios/registrar.php");                    
                    break;
                
                
                default:
                  //  require_once("/vista principal.php");
                    break;
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


    <!-- jQuery -->
    <script src="../../recursos/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../recursos/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../recursos/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../recursos/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../../recursos/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
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

    <!-- Custom Theme Scripts -->
    <script src="../../recursos/js/custom.min.js"></script>

    <script src="../../recursos/js/Gestion.js"></script>
    <script src="../../recursos/js/main.js"></script>
  </body>
</html>
