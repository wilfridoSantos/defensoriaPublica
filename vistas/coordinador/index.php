<?php
include "../../Controlador/sesion.php";
  //print_r( $_SESSION[session_name()]+" abcde123");
  if($_SESSION["rol"] != 1){
     header("Location: ../baseIndex.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<script type="text/javascript">

</script>

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>Defensoria publica</title>


<<<<<<< HEAD
=======
<!--     <link rel="stylesheet" href="../../recursos/vendors/jquery/src/css/jquery-ui.css" />
    <link rel="stylesheet" href="../../recursos/css/style.css" />
    <script src="../../recursos/vendors/jquery/jquery-ui.js"></script> -->
    
    <!-- jQuery -->
    <script src="../../recursos/vendors/jquery/dist/jquery.min.js"></script>
>>>>>>> acfcd337647c416ca3ae3f7b30f9b0b755ac9dfe
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
    <link href="../../recursos/css/custom.min.css" rel="stylesheet"/>
  </head>

  <body class="nav-md">

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
<<<<<<< HEAD
                <?php echo ($_SESSION['usuario']);?>
=======
                                  <?php //echo $_SESSION['usuario'] ?>
>>>>>>> acfcd337647c416ca3ae3f7b30f9b0b755ac9dfe
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">

                <ul class="nav side-menu">

                  <li><a><i class="fa fa-home"></i> Personal <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>><a id="defensores">Alta Defensor</a></li>

                      <li>><a id="defensores">Baja Defensor</a></li>
                      <li><a id="defensores">Lista Defensores</a></li>
                      <li><a id="defensores">Cambio Adscripcion Defensore</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Informes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a id="">Informe mensual</a></li>
                      <li><a id="">Informe anual</a></li>
                      <li><a id="">informe especifico</a></li>
                    </ul>
                  </li>

<<<<<<< HEAD


                </ul>
=======
                  <li><a><i class="fa fa-home"></i> Configuracion usurio <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li><a id="registrarExpediente">Registrar usuario</a></li>
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
>>>>>>> acfcd337647c416ca3ae3f7b30f9b0b755ac9dfe
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
<<<<<<< HEAD
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
=======
             
              <a data-toggle="tooltip" data-placement="top" title="Salir" href="../../index.php">
>>>>>>> acfcd337647c416ca3ae3f7b30f9b0b755ac9dfe
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
<<<<<<< HEAD
                    <img src="images/img.jpg" alt=""/>John Doe
=======
                    <img src="../../recursos/images/img.jpg" alt=""/><?php// echo $_SESSION['usuario'] ?>
>>>>>>> acfcd337647c416ca3ae3f7b30f9b0b755ac9dfe
                    <span class=" fa fa-angle-down"></span>
            	      </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span>Configurar</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>


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
                        <span class="image"><img src="../../Recursos/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="../../Recursos/images/img.jpg" alt="Profile Image" /></span>
                        <span>
<<<<<<< HEAD
                          <span>John Smith</span>
=======
                          <span><?php //echo $_SESSION['usuario'] ?></span>
>>>>>>> acfcd337647c416ca3ae3f7b30f9b0b755ac9dfe
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="../../Recursos/images/img.jpg" alt="Profile Image" /></span>
                        <span>
<<<<<<< HEAD
                          <span>John Smith</span>
=======
                          <span><?php// echo $_SESSION['usuario'] ?></span>
>>>>>>> acfcd337647c416ca3ae3f7b30f9b0b755ac9dfe
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="../../Recursos/images/img.jpg" alt="Profile Image" /></span>
                        <span>
<<<<<<< HEAD
                          <span>John Smith</span>
=======
                          <span><?php //echo $_SESSION['usuario'] ?></span>
>>>>>>> acfcd337647c416ca3ae3f7b30f9b0b755ac9dfe
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
                          <strong>See All Alerts</strong>
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
<<<<<<< HEAD

        <!-- page content -->
        <div class="right_col" role="main">
=======
  <!-- page content -->
<div><h1 Bienvenido Coordinador </h1></div>
  
   <div class="right_col" role="main">
>>>>>>> acfcd337647c416ca3ae3f7b30f9b0b755ac9dfe
          <div class="">
            <div class="page-title">

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
               // echo isset($_SESSION['mensaje']);
                     
                     if(isset($_SESSION['mensaje'])){
                      if(isset($_SESSION['mensaje']['tipo'])){

<<<<<<< HEAD
            <div class="row" id="menuContainer">


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
=======
                        if($_SESSION['mensaje']['tipo']=='exito')
                           $alert='alert alert-success';

                        //$alert='alert alert-danger';
                         if($_SESSION['mensaje']['tipo']=='error')
                           $alert='alert alert-danger';
                         
                          if($_SESSION['mensaje']['tipo']=='juzgado')
                            $alert='alert alert-danger';
                           
                          //else $alert='';
                          
                      }
                  ?>
                    <div class='<?php echo $alert; ?>' alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
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
        
                
>>>>>>> acfcd337647c416ca3ae3f7b30f9b0b755ac9dfe
                  <div class="x_title">

                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<<<<<<< HEAD
                    <p class="text-muted font-13 m-b-30">
                      Lista de los defensores activos
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Direccion</th>
                          <th>Telefono</th>
                          <th>Email</th>
                          <th>Juzgado adscrito</th>
                          <th>asignar benificiario</th>
                        </tr>
                      </thead>


                      <tbody>
                        <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>61</td>
                          <td>2011/04/25</td>
                          <td>$320,800</td>
                        </tr>
                        <tr>
                          <td>Garrett Winters</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <td>63</td>
                          <td>2011/07/25</td>
                          <td>$170,750</td>
                        </tr>

                        <tr>
                          <td>Gloria Little</td>
                          <td>Systems Administrator</td>
                          <td>New York</td>
                          <td>59</td>
                          <td>2009/04/10</td>
                          <td>$237,500</td>
                        </tr>
                        <tr>
                          <td>Bradley Greer</td>
                          <td>Software Engineer</td>
                          <td>London</td>
                          <td>41</td>
                          <td>2012/10/13</td>
                          <td>$132,000</td>
                        </tr>
                        <tr>
                          <td>Dai Rios</td>
                          <td>Personnel Lead</td>
                          <td>Edinburgh</td>
                          <td>35</td>
                          <td>2012/09/26</td>
                          <td>$217,500</td>
                        </tr>

                        <tr>

                          <td>Donna Snider</td>
                          <td>Customer Support</td>
                          <td>New York</td>
                          <td>27</td>
                          <td>2011/01/25</td>
                          <td>$112,000</td>
                        </tr>
                      </tbody>
                    </table>
=======
                    
                      
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
               if(isset($_GET['dirigir'])) {
               switch ($_GET['dirigir']) {
                case 'registrar_usuario':
                      ?>  
                      <script>
                      $('#menuContainer').children().remove();
                      
                      $('#menuContainer').load("registroUsuarioServicio.php");
                      </script>
                <?php  break;
                case 'listar_defensor':?>
                    <script>//    $('#menuContainer').load("listarDefensores.php"); </script>
                    <?php break;
                    case 'cambioAdscripcion':
                    ?>
                    <script>//    $('#menuContainer').load("cambiarAdscripcion.php"); </script>
                   <?php 
                break;
                
                
                default:
                require_once("../usuario/registrar.php.php");   
                    break;
            }
          }
        ?>                   
                    </div>
>>>>>>> acfcd337647c416ca3ae3f7b30f9b0b755ac9dfe
                  </div>
                </div>
              </div>




                  </div>
                </div>
              </div>
            </div>
          </div>

        <div id="menuContainer">

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->


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

    <script src="../../recursos/js/Gestion.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../recursos/js/custom.min.js"></script>

<<<<<<< HEAD
=======
    <script src="../../recursos/js/coordinador/gestionCoordinador.js"></script>
    <script src="../../recursos/js/main.js"></script>
>>>>>>> acfcd337647c416ca3ae3f7b30f9b0b755ac9dfe
  </body>
</html>
