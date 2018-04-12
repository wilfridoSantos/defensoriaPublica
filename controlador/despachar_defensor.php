<?php

    switch ((isset($_GET['realizar']) ? $_GET['realizar'] : '') )
    {
        case 'reporte_asesoria':
            require_once("controlador/defensor/reporte_asesoria.php");
            break;
        case 'reporte_visitas':
              require_once("controlador/defensor/reporte_visitas.php");
          break;
          case 'reporte_audiencia':
          require_once("controlador/defensor/reporte_audiencia.php");
          break;
      case 'reporte_bitacora':
            require_once("controlador/defensor/reporte_bitacora.php");
        break;


       
        default:
          //  require_once("layout_admin.php");
            break;
    }
   

?>
