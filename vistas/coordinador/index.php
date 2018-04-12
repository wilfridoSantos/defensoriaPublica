<?php
include "../../Controlador/sesion.php";
  //print_r( $_SESSION[session_name()]+" abcde123");
  if($_SESSION["rol"] != 2 ){
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

    <title>DataTables | Gentelella</title>

    <!-- Bootstrap -->
    <link href="../recursos/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Font Awesome -->
    <link href="../recursos/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- NProgress -->
    <link href="../recursos/vendors/nprogress/nprogress.css" rel="stylesheet"/>
    <!-- iCheck -->
    <link href="../recursos/vendors/iCheck/skins/flat/green.css" rel="stylesheet"/>
    <!-- Datatables -->
    <link href="../recursos/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
    <link href="../recursos/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet"/>
    <link href="../recursos/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet"/>
    <link href="../recursos/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet"/>
    <link href="../recursos/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../recursos/css/custom.min.css" rel="stylesheet"/>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa "></i> <span>Defensoria publica</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../recursos/images/defensoriav1.png" alt="..." class="img-circle profile_img"/>
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Coordinador de defensores</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Defensores <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a id="defensores">lista de defensores</a></li>
                      <li><a id="verusuarios">Ver los usuarios del servicio</a></li>
                      <li><a id="asignarDefensor">Asignar  un defensor</a></li>
                      <li><a id="registrar">Registrar un defensor</a></li>
                      <li><a id="buscar">Buscar</a></li>
                       <li><a id="buscar">Cambiar de adscripcion</a></li>
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
              <a data-toggle="tooltip" data-placement="top" title="Salir" href="login.html">
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
                    <img src="../recursos/images/img.jpg" alt=""/>John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span>Configuracion</span>
                      </a>
                    </li>

                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
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
                        <span class="image"><img src="../recursos/images/img.jpg" alt="Profile Image" /></span>
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
                        <span class="image"><img src="../recursos/images/img.jpg" alt="Profile Image" /></span>
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
                        <span class="image"><img src="../recursos/images/img.jpg" alt="Profile Image" /></span>
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
                        <span class="image"><img src="../recursos/images/img.jpg" alt="Profile Image" /></span>
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

        <!-- page content -->
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

            <div class="row" id="menuContainer">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#"> 1</a>
                          </li>
                          <li><a href="#"> 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      lista de los defensores
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Apellido Paterno</th>
                          <th>Apellido Materno</th>
                          <th>Direccion</th>
                          <th>Telefono</th>
                          <th>Cantidad de benificiarios</th>
                        </tr>
                      </thead>


                      <tbody>
                        <a href="#" ><tr >
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>Edinburgh</td>
                          <td>34</td>
                          <td>9512345676</td>
                        </tr></a>
                        <tr>
                          <td>Garrett Winters</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <td>Tokyo</td>
                          <td>34</td>
                          <td>9512345676</td>
                        </tr>
                        <tr>
                          <td>Ashton </td>
                          <td>Junior Technical Author</td>
                          <td>San Francisco</td>
                          <td>Tokyo</td>
                          <td>43</td>
                          <td>9512345676</td>
                        </tr>



                        <tr>
                          <td>Michael Bruce</td>
                          <td>Javascript Developer</td>
                          <td>Singapore</td>
                          <td>Singapore</td>
                          <td>34</td>
                          <td>9512345676</td>
                        </tr>
                        <tr>
                          <td>Donna Snider</td>
                          <td>Customer Support</td>
                          <td>Junior</td>
                          <td>Singapore</td>
                          <td>24</td>
                          <td>9512345676</td>
                        </tr>
                      </tbody>
                    </table>
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
            <a href="https://colorlib.com"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->


    <!-- jQuery -->
    <script src="../recursos/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../recursos/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../recursos/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../recursos/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../recursos/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../recursos/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../recursos/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../recursos/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../recursos/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../recursos/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../recursos/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../recursos/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../recursos/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../recursos/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../recursos/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../recursos/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../recursos/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../recursos/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../recursos/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../recursos/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../recursos/js/custom.min.js"></script>

    <script src="../recursos/js/Gestion.js"></script>
  </body>
</html>
