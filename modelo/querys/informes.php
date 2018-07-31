<?php

include_once('../../libreria/conexion.php');

function consultaMatNotSystem($mat, $atrib){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETO','MATERIA','','','".$mat."','','','')";
    $l = consulta($sql);
    $lista['tablaActExp'] = $l;

    $sql = "call tablaExpGeneralP('COMPLETO','MATERIA','','','".$mat."','','','')";
    $l = consulta($sql);  
    $lista['tablaGeneralExp'] = $l;   

    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
               
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExp'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaEdadExp'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaEtniaExp'] = $l;      
            break;

            case 'GENERAL':                 
                   
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaGeneroExp'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExp'] = $l;      
            break;

            /* case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break; */

            case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break;

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaSexoExp'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaMatSystem($sis, $mat, $atrib){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);                
                $lista['tablaActExp'] = $l;

                $sql = "call tablaExpGeneralP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaGeneralExp'] = $l;                
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExp'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaEdadExp'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaEtniaExp'] = $l;      
            break;

            case 'GENERAL':                 
                     
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaGeneroExp'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExp'] = $l;      
            break;

    /*             case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break; */

            case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break;
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaSexoExp'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaRegNotSystem($reg, $atrib){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);
                $lista['tablaActExp'] = $l;


                $sql = "call tablaExpGeneralP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaGeneralExp'] = $l;  
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExp'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaEdadExp'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','REGION','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaEtniaExp'] = $l;      
            break;

            case 'GENERAL':                 
                    
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaGeneroExp'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExp'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','','','".$mat."','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaSexoExp'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaRegSystem($sis, $reg, $atrib){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);                
                $lista['tablaActExp'] = $l;
                $sql = "call tablaExpGeneralP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaGeneralExp'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExp'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaEdadExp'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaEtniaExp'] = $l;      
            break;

            case 'GENERAL':                 
                      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaGeneroExp'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExp'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaSexoExp'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaAmbasNotSystem($mat, $reg, $atrib){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
    $l = consulta($sql);
    $lista['tablaActExp'] = $l;
    $sql = "call tablaExpGeneralP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
    $l = consulta($sql);  
    $lista['tablaGeneralExp'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
               
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExp'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaEdadExp'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaEtniaExp'] = $l;      
            break;

            case 'GENERAL':                 
                      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaGeneroExp'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExp'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','','','','".$mat."','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaSexoExp'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaAmbasSystem($sis, $mat, $reg, $atrib){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);                
                $lista['tablaActExp'] = $l;
    $sql = "call tablaExpGeneralP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaGeneralExp'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExp'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaEdadExp'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaEtniaExp'] = $l;      
            break;

            case 'GENERAL':                 
                     
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaGeneroExp'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExp'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMAREG','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaSexoExp'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaNingunoNotSystem($atrib){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETO','COMPLETO','','','','','','')";
    $l = consulta($sql);
    $lista['tablaActExp'] = $l;
    $sql = "call tablaExpGeneralP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['tablaGeneralExp'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
               
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExp'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['tablaEdadExp'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['tablaEtniaExp'] = $l;      
            break;

            case 'GENERAL':                 
                      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['tablaGeneroExp'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExp'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break;

            case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; 

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['tablaSexoExp'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaNingunoSystem($sis, $atrib){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);                
                $lista['tablaActExp'] = $l;
                $sql = "call tablaExpGeneralP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaGeneralExp'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExp'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaEdadExp'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaEtniaExp'] = $l;      
            break;

            case 'GENERAL':                 
                     
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaGeneroExp'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExp'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','COMPLETO','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break; 

             case 'REGION':                 
                $sql = "call bddefensoria.tablaExpRegionP('COMPLETO', 'SISTEMANIN', '', '".$sis."', '', '', '', '')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; 
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaSexoExp'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break;
        }
    }   
   // print_r($sql);
    return $lista;
}


function consultaMatNotSystemDef($mat, $atrib, $id){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETO','MATERIA','".$id."','','".$mat."','','','')";
                $l = consulta($sql);
                $lista['tablaActExpDef'] = $l;
                $sql = "call tablaExpGeneralP('COMPLETO','MATERIA','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaGeneralExpDef'] = $l;  
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','MATERIA','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExpDef'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','MATERIA','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaEdadExpDef'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','MATERIA','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaEtniaExpDef'] = $l;      
            break;

            case 'GENERAL':                 
                   
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','MATERIA','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaGeneroExpDef'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','MATERIA','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExpDef'] = $l;      
            break;

            /* case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break; */

            case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExpDef'] = $l;      
            break;

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','MATERIA','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaSexoExpDef'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','MATERIA','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaTopExpDef'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaMatSystemDef($sis, $mat, $atrib, $id){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);                
                $lista['tablaActExpDef'] = $l;
                $sql = "call tablaExpGeneralP('COMPLETO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaGeneralExpDef'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExpDef'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaEdadExpDef'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaEtniaExpDef'] = $l;      
            break;

            case 'GENERAL':                 
                      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaGeneroExpDef'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExpDef'] = $l;      
            break;

    /*             case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break; */

            case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExpDef'] = $l;      
            break;
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaSexoExpDef'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaTopExpDef'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaRegNotSystemDef($reg, $atrib, $id){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETO','REGION','".$id."','','','".$reg."','','')";
    $l = consulta($sql);
    $lista['tablaActExpDef'] = $l;
    $sql = "call tablaExpGeneralP('COMPLETO','REGION','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaGeneralExpDef'] = $l; 
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
               
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','REGION','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExpDef'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','REGION','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaEdadExpDef'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','REGION','".$id."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaEtniaExpDef'] = $l;      
            break;

            case 'GENERAL':                 
                     
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','REGION','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaGeneroExpDef'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','REGION','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExpDef'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','REGION','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExpDef'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','','','".$mat."','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','REGION','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaSexoExpDef'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','REGION','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaTopExpDef'] = $l;      
            break;
        }
    }
    return $lista;
}
function consultaRegSystemDef($sis, $reg, $atrib, $id){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETO','SISTEMAREG','".$id."','".$sis."','','".$reg."','','')";
    $l = consulta($sql);                
    $lista['tablaActExpDef'] = $l;
    $sql = "call tablaExpGeneralP('COMPLETO','SISTEMAREG','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaGeneralExpDef'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
               
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','SISTEMAREG','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExpDef'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','SISTEMAREG','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaEdadExpDef'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','SISTEMAREG','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaEtniaExpDef'] = $l;      
            break;

            case 'GENERAL':                 
                      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','SISTEMAREG','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaGeneroExpDef'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','SISTEMAREG','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExpDef'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMAREG','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExpDef'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMAREG','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','SISTEMAREG','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaSexoExpDef'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','SISTEMAREG','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaTopExpDef'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaAmbasNotSystemDef($mat, $reg, $atrib, $id){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETO','AMBAS','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);
                $lista['tablaActExpDef'] = $l;
                $sql = "call tablaExpGeneralP('COMPLETO','AMBAS','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaGeneralExpDef'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','AMBAS','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExpDef'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','AMBAS','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaEdadExpDef'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','AMBAS','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaEtniaExpDef'] = $l;      
            break;

            case 'GENERAL':                 
                      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','AMBAS','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaGeneroExpDef'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','AMBAS','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExpDef'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','AMBAS','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExpDef'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','','','','".$mat."','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','AMBAS','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaSexoExpDef'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','AMBAS','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaTopExpDef'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaAmbasSystemDef($sis, $mat, $reg, $atrib, $id){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','','')";
    $l = consulta($sql);                
    $lista['tablaActExpDef'] = $l;
    $sql = "call tablaExpGeneralP('COMPLETO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','','')";
    $l = consulta($sql);  
    $lista['tablaGeneralExpDef'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
               
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExpDef'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaEdadExpDef'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaEtniaExpDef'] = $l;      
            break;

            case 'GENERAL':                 
                     
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaGeneroExpDef'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExpDef'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExpDef'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMAREG','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaSexoExpDef'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaTopExpDef'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaNingunoNotSystemDef($atrib, $id){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETO','COMPLETO','".$id."','','','','','')";
                $l = consulta($sql);
                $lista['tablaActExpDef'] = $l;
                $sql = "call tablaExpGeneralP('COMPLETO','COMPLETO','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['tablaGeneralExpDef'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','COMPLETO','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExpDef'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','COMPLETO','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['tablaEdadExpDef'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','COMPLETO','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['tablaEtniaExpDef'] = $l;      
            break;

            case 'GENERAL':                 
                      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','COMPLETO','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['tablaGeneroExpDef'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','COMPLETO','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExpDef'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','COMPLETO','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExpDef'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','COMPLETO','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['tablaSexoExpDef'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','COMPLETO','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['tablaTopExpDef'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaNingunoSystemDef($sis, $atrib, $id){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETO','SISTEMANIN','".$id."','".$sis."','','','','')";
                $l = consulta($sql);                
                $lista['tablaActExpDef'] = $l;
                $sql = "call tablaExpGeneralP('COMPLETO','SISTEMANIN','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaGeneralExpDef'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','SISTEMANIN','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExpDef'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','SISTEMANIN','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaEdadExpDef'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','SISTEMANIN','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaEtniaExpDef'] = $l;      
            break;

            case 'GENERAL':                 
                     
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','SISTEMANIN','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaGeneroExpDef'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','SISTEMANIN','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExpDef'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMANIN','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExpDef'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','SISTEMANIN','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaSexoExpDef'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','SISTEMANIN','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaTopExpDef'] = $l;      
            break;
        }
    }   
   // print_r($sql);
    return $lista;
}

///============================================================================================ PERIODO
function consultaMatNotSystemP($mat, $atrib, $fi, $ff){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETOPERIODO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);
                $lista['tablaActExp'] = $l;
                $sql = "call tablaExpGeneralP('COMPLETOPERIODO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneralExp'] = $l;  
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETOPERIODO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExp'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETOPERIODO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEdadExp'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETOPERIODO','MATERIA','','','".$mat."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEtniaExp'] = $l;      
            break;

            case 'GENERAL':                 
                   
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETOPERIODO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneroExp'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETOPERIODO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExp'] = $l;      
            break;

            /* case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break; */

            case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETOPERIODO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break;

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETOPERIODO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaSexoExp'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETOPERIODO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaMatSystemP($sis, $mat, $atrib, $fi, $ff){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETOPERIODO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);                
                $lista['tablaActExp'] = $l;
                $sql = "call tablaExpGeneralP('COMPLETOPERIODO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneralExp'] = $l;  
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETOPERIODO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExp'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETOPERIODO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEdadExp'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETOPERIODO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEtniaExp'] = $l;      
            break;

            case 'GENERAL':                 
                   
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETOPERIODO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneroExp'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETOPERIODO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExp'] = $l;      
            break;

    /*             case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETOPERIODO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break; */

            case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETOPERIODO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break;
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETOPERIODO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaSexoExp'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETOPERIODO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaRegNotSystemP($reg, $atrib, $fi, $ff){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETOPERIODO','REGION','','','','".$reg."','".$fi."','".$ff."')";
    $l = consulta($sql);
    $lista['tablaActExp'] = $l;
    $sql = "call tablaExpGeneroP('COMPLETOPERIODO','REGION','','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneroExp'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
               
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETOPERIODO','REGION','','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExp'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETOPERIODO','REGION','','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEdadExp'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETOPERIODO','REGION','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEtniaExp'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralP('COMPLETOPERIODO','REGION','','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneralExp'] = $l;      
            break;

            case 'GENERO':                 
                      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETOPERIODO','REGION','','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExp'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETOPERIODO','REGION','','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETOPERIODO','MATERIA','','','".$mat."','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETOPERIODO','REGION','','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaSexoExp'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETOPERIODO','REGION','','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaRegSystemP($sis, $reg, $atrib, $fi, $ff){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETOPERIODO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
    $l = consulta($sql);                
    $lista['tablaActExp'] = $l;
    $sql = "call tablaExpGeneralP('COMPLETOPERIODO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
    $l = consulta($sql);  
    $lista['tablaGeneralExp'] = $l; 
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
               
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETOPERIODO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExp'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETOPERIODO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEdadExp'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETOPERIODO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEtniaExp'] = $l;      
            break;

            case 'GENERAL':                 
                    
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETOPERIODO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneroExp'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETOPERIODO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExp'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETOPERIODO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETOPERIODO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaSexoExp'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETOPERIODO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaAmbasNotSystemP($mat, $reg, $atrib, $fi, $ff){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETOPERIODO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);
                $lista['tablaActExp'] = $l;
                $sql = "call tablaExpGeneralP('COMPLETOPERIODO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneralExp'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETOPERIODO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExp'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETOPERIODO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEdadExp'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETOPERIODO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEtniaExp'] = $l;      
            break;

            case 'GENERAL':                 
                      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETOPERIODO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneroExp'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETOPERIODO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExp'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETOPERIODO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','','','','".$mat."','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETOPERIODO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaSexoExp'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETOPERIODO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaAmbasSystemP($sis, $mat, $reg, $atrib, $fi, $ff){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETOPERIODO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);                
                $lista['tablaActExp'] = $l;
                $sql = "call tablaExpGeneralP('COMPLETOPERIODO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneralExp'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETOPERIODO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExp'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETOPERIODO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEdadExp'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETOPERIODO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEtniaExp'] = $l;      
            break;

            case 'GENERAL':                 
                      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETOPERIODO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneroExp'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETOPERIODO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExp'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETOPERIODO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMAREG','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETOPERIODO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaSexoExp'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETOPERIODO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaNingunoNotSystemP($atrib, $fi, $ff){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETOPERIODO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);
                $lista['tablaActExp'] = $l;
                $sql = "call tablaExpGeneralP('COMPLETOPERIODO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneralExp'] = $l;  
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETOPERIODO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExp'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETOPERIODO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEdadExp'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETOPERIODO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEtniaExp'] = $l;      
            break;

            case 'GENERAL':                 
                    
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETOPERIODO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneroExp'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETOPERIODO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExp'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETOPERIODO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETOPERIODO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaSexoExp'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETOPERIODO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaNingunoSystemP($sis, $atrib, $fi, $ff){
    $lista = array();
    $sql = "call tablaExpActividadesP('COMPLETOPERIODO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
    $l = consulta($sql);                
    $lista['tablaActExp'] = $l;
    $sql = "call tablaExpGeneralP('COMPLETOPERIODO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneralExp'] = $l; 
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
               
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETOPERIODO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExp'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETOPERIODO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEdadExp'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETOPERIODO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEtniaExp'] = $l;      
            break;

            case 'GENERAL':                 
                     
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETOPERIODO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneroExp'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETOPERIODO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExp'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETOPERIODO','COMPLETO','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break; 

             case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETOPERIODO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; 
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETOPERIODO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaSexoExp'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETOPERIODO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break;
        }
    }   
   // print_r($sql);
    return $lista;
}


function consultaMatNotSystemDefP($mat, $atrib, $id, $fi, $ff){
    $lista = array();
    $sql = "call tablaExpActividadesP('DEFENSORPERIODO','MATERIA','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);
                $lista['tablaActExpDef'] = $l;

                $sql = "call tablaExpGeneralP('DEFENSORPERIODO','MATERIA','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneralExpDef'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('DEFENSORPERIODO','MATERIA','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExpDef'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('DEFENSORPERIODO','MATERIA','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEdadExpDef'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('DEFENSORPERIODO','MATERIA','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEtniaExpDef'] = $l;      
            break;

            case 'GENERAL':                 
                      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('DEFENSORPERIODO','MATERIA','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneroExpDef'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('DEFENSORPERIODO','MATERIA','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExpDef'] = $l;      
            break;

            /* case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break; */

           /*  case 'REGION':                 
                $sql = "call tablaExpRegionP('DEFENSORPERIODO','MATERIA','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('DEFENSORPERIODO','MATERIA','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaSexoExpDef'] = $l;      
            break;

           /*  case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETOPERIODO','MATERIA','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break; */
        }
    }
 
    return $lista;
}
function consultaMatSystemDefP($sis, $mat, $atrib, $id, $fi, $ff){
    $lista = array();
    $sql = "call tablaExpActividadesP('DEFENSORPERIODO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);                
                $lista['tablaActExpDef'] = $l;
                $sql = "call tablaExpGeneralP('DEFENSORPERIODO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneralExpDef'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('DEFENSORPERIODO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExpDef'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('DEFENSORPERIODO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEdadExpDef'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('DEFENSORPERIODO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEtniaExpDef'] = $l;      
            break;

            case 'GENERAL':                 
                      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('DEFENSORPERIODO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneroExpDef'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('DEFENSORPERIODO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExpDef'] = $l;      
            break; 

    /*             case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break; */

          /*   case 'REGION':                 
                $sql = "call tablaExpRegionP('DEFENSORPERIODO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaRegionExpDef'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('DEFENSORPERIODO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaSexoExpDef'] = $l;      
            break;

            /* case 'TOP':                 
                $sql = "call tablaExpTopP('DEFENSORPERIODO','SISTEMATERIA','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break; */
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaRegNotSystemDefP($reg, $atrib, $id, $fi, $ff){
    $lista = array();
    $sql = "call tablaExpActividadesP('DEFENSORPERIODO','REGION','".$id."','','','".$reg."','".$fi."','".$ff."')";
    $l = consulta($sql);
    $lista['tablaActExpDef'] = $l;
    $sql = "call tablaExpGeneralP('DEFENSORPERIODO','REGION','".$id."','','','".$reg."','".$fi."','".$ff."')";
    $l = consulta($sql);  
    $lista['tablaGeneralExpDef'] = $l;  
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
               
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('DEFENSORPERIODO','REGIONF','".$id."','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExpDef'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('DEFENSORPERIODO','REGION','".$id."','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEdadExpDef'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('DEFENSORPERIODO','REGION','".$id."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEtniaExpDef'] = $l;      
            break;

            case 'GENERAL':                 
                   
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('DEFENSORPERIODO','REGION','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaGeneroExpDef'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('DEFENSORPERIODO','REGION','".$id."','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExpDef'] = $l;      
            break;

           /*  case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('DEFENSORPERIODO','REGION','".$id."','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break; */

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','','','".$mat."','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('DEFENSORPERIODO','REGION','".$id."','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaSexoExpDef'] = $l;      
            break;
/* 
            case 'TOP':                 
                $sql = "call tablaExpTopP('DEFENSORPERIODO','REGION','".$id."','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break; */
        }
    }
 
    return $lista;
}
function consultaRegSystemDefP($sis, $reg, $atrib, $id, $fi, $ff){
    $lista = array();
    $sql = "call tablaExpActividadesP('DEFENSORPERIODO','SISTEMAREG','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);                
                $lista['tablaActExpDef'] = $l;

                $sql = "call tablaExpGeneralP('DEFENSORPERIODO','SISTEMAREG','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneralExpDef'] = $l; 
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('DEFENSORPERIODO','SISTEMAREG','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExpDef'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('DEFENSORPERIODO','SISTEMAREG','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEdadExpDef'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('DEFENSORPERIODO','SISTEMAREG','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEtniaExpDef'] = $l;      
            break;

            case 'GENERAL':                 
                    
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('DEFENSORPERIODO','SISTEMAREG','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneroExpDef'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('DEFENSORPERIODO','SISTEMAREG','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExpDef'] = $l;      
            break;

              /*   case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('DEFENSORPERIODO','SISTEMAREG','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break;  */

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMAREG','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('DEFENSORPERIODO','SISTEMAREG','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaSexoExpDef'] = $l;      
            break;
/* 
            case 'TOP':                 
                $sql = "call tablaExpTopP('DEFENSORPERIODO','SISTEMAREG','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break; */
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaAmbasNotSystemDefP($mat, $reg, $atrib, $id, $fi, $ff){
    $lista = array();
    $sql = "call tablaExpActividadesP('DEFENSORPERIODO','AMBAS','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
    $l = consulta($sql);
    $lista['tablaActExpDef'] = $l;
    $sql = "call tablaExpGeneralP('DEFENSORPERIODO','AMBAS','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneralExpDef'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
               
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('DEFENSORPERIODO','AMBAS','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExpDef'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('DEFENSORPERIODO','AMBAS','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEdadExpDef'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('DEFENSORPERIODO','AMBAS','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEtniaExpDef'] = $l;      
            break;

            case 'GENERAL':                 
                      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('DEFENSORPERIODO','AMBAS','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneroExpDef'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('DEFENSORPERIODO','AMBAS','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExpDef'] = $l;      
            break;

           /*  case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('DEFENSORPERIODO','AMBAS','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break; */

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','','','','".$mat."','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('DEFENSORPERIODO','AMBAS','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaSexoExpDef'] = $l;      
            break;

           /*  case 'TOP':                 
                $sql = "call tablaExpTopP('DEFENSORPERIODO','AMBAS','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break; */
        }
    }
 
    return $lista;
}
function consultaAmbasSystemDefP($sis, $mat, $reg, $atrib, $id, $fi, $ff){
    $lista = array();
    $sql = "call tablaExpActividadesP('DEFENSORPERIODO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);                
                $lista['tablaActExpDef'] = $l;


                $sql = "call tablaExpGeneralP('DEFENSORPERIODO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneralExpDef'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('DEFENSORPERIODO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExpDef'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('DEFENSORPERIODO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEdadExpDef'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('DEFENSORPERIODO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEtniaExpDef'] = $l;      
            break;

            case 'GENERAL':                 
                      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('DEFENSORPERIODO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneroExpDef'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('DEFENSORPERIODO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExpDef'] = $l;      
            break;
/* 
                case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('DEFENSORPERIODO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break;  */

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMAREG','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('DEFENSORPERIODO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaSexoExpDef'] = $l;      
            break;
/* 
            case 'TOP':                 
                $sql = "call tablaExpTopP('DEFENSORPERIODO','SISTEMAMBAS','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break; */
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaNingunoNotSystemDefP($atrib, $id, $fi, $ff){
    $lista = array();
    $sql = "call tablaExpActividadesP('DEFENSORPERIODO','COMPLETO','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);
                $lista['tablaActExpDef'] = $l;
                $sql = "call tablaExpGeneralP('DEFENSORPERIODO','COMPLETO','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneralExpDef'] = $l;  
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('DEFENSORPERIODO','COMPLETO','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExpDef'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('DEFENSORPERIODO','COMPLETO','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEdadExpDef'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('DEFENSORPERIODO','COMPLETO','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEtniaExpDef'] = $l;      
            break;

            case 'GENERAL':                 
                    
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('DEFENSORPERIODO','COMPLETO','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneroExpDef'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('DEFENSORPERIODO','COMPLETO','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExpDef'] = $l;      
            break;

           /*  case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('DEFENSORPERIODO','COMPLETO','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break;
 */
            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('DEFENSORPERIODO','COMPLETO','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaSexoExpDef'] = $l;      
            break;

          /*   case 'TOP':                 
                $sql = "call tablaExpTopP('DEFENSORPERIODO','COMPLETO','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break; */
        }
    }
 
    return $lista;
}
function consultaNingunoSystemDefP($sis, $atrib, $id, $fi, $ff){
    $lista = array();
    $sql = "call tablaExpActividadesP('DEFENSORPERIODO','SISTEMANIN','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);                
                $lista['tablaActExpDef'] = $l;
                $sql = "call tablaExpGeneralP('DEFENSORPERIODO','SISTEMANIN','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneralExpDef'] = $l;
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('DEFENSORPERIODO','SISTEMANIN','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaDiscapacidadExpDef'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('DEFENSORPERIODO','SISTEMANIN','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEdadExpDef'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('DEFENSORPERIODO','SISTEMANIN','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaEtniaExpDef'] = $l;      
            break;

            case 'GENERAL':                 
                      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('DEFENSORPERIODO','SISTEMANIN','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaGeneroExpDef'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('DEFENSORPERIODO','SISTEMANIN','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaIdiomaExpDef'] = $l;      
            break;

               /*  case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('DEFENSORPERIODO','SISTEMANIN','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaMateriaExp'] = $l;      
            break; */ 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['tablaRegionExp'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('DEFENSORPERIODO','SISTEMANIN','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaSexoExpDef'] = $l;      
            break;

           /*  case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETOPERIODO','SISTEMANIN','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['tablaTopExp'] = $l;      
            break; */
        }
    }   
   // print_r($sql);
    return $lista;
}

?>
