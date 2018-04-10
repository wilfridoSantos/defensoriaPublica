<?php
include "../../Controlador/sesion.php";
  //print_r( $_SESSION[session_name()]+" abcde123");

  if ($_SESSION["rol"] == "2") {//ROL -2- => COORDINADOR
      header("Location: ../Vistas/Coordinador/index.php");
  }

  if ($_SESSION["rol"] == "3") {//ROL -3- => DEFENSOR
    header("Location: ../Vistas/Defensor/index.php");
  }


?>
<!DOCTYPE html>
<html lang="en">
<script type="text/javascript">
history.forward();
</script>
  
  <head>
  
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>ADMINSTRADOR MODULE</title>

                     <input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}"/>
    <!-- Bootstrap -->
    <link href="../../Recursos/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Font Awesome -->
    <link href="../../Recursos/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- NProgress -->
    <link href="../../Recursos/vendors/nprogress/nprogress.css" rel="stylesheet"/>
    <!-- iCheck -->
    <link href="../../Recursos/vendors/iCheck/skins/flat/green.css" rel="stylesheet"/>
    <!-- Datatables -->
    <link href="../../Recursos/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
    <link href="../../Recursos/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet"/>
    <link href="../../Recursos/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet"/>
    <link href="../../Recursos/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet"/>
    <link href="../../Recursos/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../../Recursos/css/custom.min.css" rel="stylesheet"/>
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
                <img src="../../Recursos/images/OAXACA.jpg" alt="..." class="img-circle profile_img"/>
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
                
                <ul class="nav side-menu">
                 
                  <li><a><i class="fa fa-edit"></i> Personal <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="" th:src="@{defensores.html}" >Alta </a></li>
                      
                      <li><a href="" th:src="@{defensores.html}" >Baja </a></li>
                      <li><a href="form_advanced.html">Lista</a></li>
                      <li><a href="" th:src="@{defensores.html}" >Adscripcion </a></li>                     
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Informes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="">Informe mensual</a></li>
                      <li><a href="">Informe anual</a></li>
                      <li><a href="">informe especifico</a></li>
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
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
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
                    <img src="../../Recursos/images/img.jpg" alt=""/>John Doe
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
                    <li>
                    <form th:action="@{/logout}" method="POST">
                      <input type="submit"><i class="fa fa-sign-out pull-right"></i> Log Out</input>
                    </form>
                    </li>
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
     

    <!-- jQuery -->
    <script src="../../Recursos/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../Recursos/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../Recursos/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../Recursos/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../../Recursos/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../../Recursos/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../Recursos/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../../Recursos/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../Recursos/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../../Recursos/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../../Recursos/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../Recursos/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../Recursos/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../../Recursos/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../../Recursos/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../Recursos/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../../Recursos/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../../Recursos/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../../Recursos/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../../Recursos/vendors/pdfmake/build/vfs_fonts.js"></script>

    <script src="../../Recursos/js/Gestion.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../Recursos/js/custom.min.js"></script>

  </body>
</html>