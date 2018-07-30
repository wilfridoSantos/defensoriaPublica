<?php

include_once('../../libreria/conexion.php');

function consultaMatNotSystem($mat, $atrib){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

            /* case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; */

            case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break;

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expTop'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaMatSystem($sis, $mat, $atrib){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);                
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

    /*             case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; */

            case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break;
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['exptTop'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaRegNotSystem($reg, $atrib){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','REGION','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','','','".$mat."','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','REGION','','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expTop'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaRegSystem($sis, $reg, $atrib){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);                
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['exptTop'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaAmbasNotSystem($mat, $reg, $atrib){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','','','','".$mat."','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','AMBAS','','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expTop'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaAmbasSystem($sis, $mat, $reg, $atrib){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);                
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMAREG','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['exptTop'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaNingunoNotSystem($atrib){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['expTop'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaNingunoSystem($sis, $atrib){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);                
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['exptTop'] = $l;      
            break;
        }
    }   
   // print_r($sql);
    return $lista;
}


function consultaMatNotSystemDef($mat, $atrib, $id){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','','')";
                $l = consulta($sql);
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

            /* case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; */

            case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break;

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expTop'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaMatSystemDef($sis, $mat, $atrib, $id){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);                
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

    /*             case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; */

            case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break;
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['exptTop'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaRegNotSystemDef($reg, $atrib, $id){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','','')";
                $l = consulta($sql);
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','REGIONDEF','".$id."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','','','".$mat."','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expTop'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaRegSystemDef($sis, $reg, $atrib, $id){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);                
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['exptTop'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaAmbasNotSystemDef($mat, $reg, $atrib, $id){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','','','','".$mat."','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expTop'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaAmbasSystemDef($sis, $mat, $reg, $atrib, $id){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);                
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMAREG','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['exptTop'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaNingunoNotSystemDef($atrib, $id){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesP('COMPLETO','COMPLETODEF','".$id."','','','','','')";
                $l = consulta($sql);
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','COMPLETODEF','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','COMPLETODEF','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','COMPLETODEF','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralP('COMPLETO','COMPLETODEF','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','COMPLETODEF','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','COMPLETODEF','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','COMPLETODEF','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','COMPLETODEF','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','COMPLETODEF','".$id."','','','','','')";
                $l = consulta($sql);  
                $lista['expTop'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaNingunoSystemDef($sis, $atrib, $id){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','','')";
                $l = consulta($sql);                
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralP('COMPLETO','SISTEMANIN','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['exptTop'] = $l;      
            break;
        }
    }   
   // print_r($sql);
    return $lista;
}

///============================================================================================ PERIODO
function consultaMatNotSystemP($mat, $atrib, $fi, $ff){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesPP('COMPLETO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadPP('COMPLETO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadPP('COMPLETO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaPP('COMPLETO','MATERIA','','','".$mat."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralPP('COMPLETO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroPP('COMPLETO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaPP('COMPLETO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

            /* case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; */

            case 'REGION':                 
                $sql = "call tablaExpRegionPP('COMPLETO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break;

            case 'SEXO':                 
                $sql = "call tablaExpSexoPP('COMPLETO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopPP('COMPLETO','MATERIA','','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expTop'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaMatSystemP($sis, $mat, $atrib, $fi, $ff){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesPP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);                
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadPP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadPP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaPP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralPP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroPP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaPP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

    /*             case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; */

            case 'REGION':                 
                $sql = "call tablaExpRegionPP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break;
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoPP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopPP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['exptTop'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaRegNotSystemP($reg, $atrib, $fi, $ff){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesPP('COMPLETO','REGION','','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadPP('COMPLETO','REGION','','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadPP('COMPLETO','REGION','','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaPP('COMPLETO','REGION','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralPP('COMPLETO','REGION','','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroPP('COMPLETO','REGION','','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaPP('COMPLETO','REGION','','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaPP('COMPLETO','REGION','','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','','','".$mat."','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoPP('COMPLETO','REGION','','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopPP('COMPLETO','REGION','','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expTop'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaRegSystemP($sis, $reg, $atrib, $fi, $ff){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesPP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);                
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadPP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadPP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaPP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralPP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroPP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaPP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaPP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoPP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopPP('COMPLETO','SISTEMAREG','','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['exptTop'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaAmbasNotSystemP($mat, $reg, $atrib, $fi, $ff){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesPP('COMPLETO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadPP('COMPLETO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadPP('COMPLETO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaPP('COMPLETO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralPP('COMPLETO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroPP('COMPLETO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaPP('COMPLETO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaPP('COMPLETO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','','','','".$mat."','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoPP('COMPLETO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopPP('COMPLETO','AMBAS','','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expTop'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaAmbasSystemP($sis, $mat, $reg, $atrib, $fi, $ff){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesPP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);                
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadPP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadPP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaPP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralPP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroPP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaPP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaPP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMAREG','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoPP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopPP('COMPLETO','SISTEMAMBAS','','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['exptTop'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaNingunoNotSystemP($atrib, $fi, $ff){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesPP('COMPLETO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadPP('COMPLETO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadPP('COMPLETO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaPP('COMPLETO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralPP('COMPLETO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroPP('COMPLETO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaPP('COMPLETO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaPP('COMPLETO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoPP('COMPLETO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopPP('COMPLETO','COMPLETO','','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expTop'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaNingunoSystemP($sis, $atrib, $fi, $ff){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesPP('COMPLETO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);                
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadPP('COMPLETO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadPP('COMPLETO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaPP('COMPLETO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralPP('COMPLETO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroPP('COMPLETO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaPP('COMPLETO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaPP('COMPLETO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoPP('COMPLETO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopPP('COMPLETO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['exptTop'] = $l;      
            break;
        }
    }   
   // print_r($sql);
    return $lista;
}


function consultaMatNotSystemDefP($mat, $atrib, $id, $fi, $ff){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesPP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadPP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadPP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaPP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralPP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroPP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaPP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

            /* case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','MATERIA','','','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; */

            case 'REGION':                 
                $sql = "call tablaExpRegionPP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break;

            case 'SEXO':                 
                $sql = "call tablaExpSexoPP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopPP('COMPLETO','MATERIADEF','".$id."','','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expTop'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaMatSystemDefP($sis, $mat, $atrib, $id, $fi, $ff){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesPP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);                
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadPP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadPP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaPP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralPP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroPP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaPP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

    /*             case 'MATERIA':                 
                $sql = "call tablaExpMateriaP('COMPLETO','SISTEMATERIA','','".$sis."','".$mat."','','','')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; */

            case 'REGION':                 
                $sql = "call tablaExpRegionPP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break;
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoPP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopPP('COMPLETO','SISTEMATERIADEF','".$id."','".$sis."','".$mat."','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['exptTop'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaRegNotSystemDefP($reg, $atrib, $id, $fi, $ff){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesPP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadPP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadPP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaPP('COMPLETO','REGIONDEF','".$id."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralPP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroPP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaPP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaPP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','','','".$mat."','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoPP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopPP('COMPLETO','REGIONDEF','".$id."','','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expTop'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaRegSystemDefP($sis, $reg, $atrib, $id, $fi, $ff){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesPP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);                
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadPP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadPP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaPP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralPP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroPP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaPP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaPP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoPP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopPP('COMPLETO','SISTEMAREGDEF','".$id."','".$sis."','','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['exptTop'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaAmbasNotSystemDefP($mat, $reg, $atrib, $id, $fi, $ff){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesPP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadPP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadPP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaPP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralPP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroPP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaPP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaPP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','MATERIA','','','','".$mat."','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoPP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopPP('COMPLETO','AMBASDEF','".$id."','','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expTop'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaAmbasSystemDefP($sis, $mat, $reg, $atrib, $id, $fi, $ff){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesPP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);                
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadPP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadPP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaPP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralPP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroPP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaPP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaPP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMAREG','','".$sis."','".$mat."','".$reg."','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoPP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopPP('COMPLETO','SISTEMAMBASDEF','".$id."','".$sis."','".$mat."','".$reg."','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['exptTop'] = $l;      
            break;
        }
    }
   
    
   // print_r($sql);
    return $lista;
}
function consultaNingunoNotSystemDefP($atrib, $id, $fi, $ff){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesPP('COMPLETO','COMPLETODEF','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadPP('COMPLETO','COMPLETODEF','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadPP('COMPLETO','COMPLETODEF','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaPP('COMPLETO','COMPLETODEF','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralPP('COMPLETO','COMPLETODEF','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroPP('COMPLETO','COMPLETODEF','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaPP('COMPLETO','COMPLETODEF','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

            case 'MATERIA':                 
                $sql = "call tablaExpMateriaPP('COMPLETO','COMPLETODEF','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break;

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','COMPLETO','','','','','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */

            case 'SEXO':                 
                $sql = "call tablaExpSexoPP('COMPLETO','COMPLETODEF','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopPP('COMPLETO','COMPLETODEF','".$id."','','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expTop'] = $l;      
            break;
        }
    }
 
    return $lista;
}
function consultaNingunoSystemDefP($sis, $atrib, $id, $fi, $ff){
    $lista = array();
    foreach($atrib as $val){
        switch($val){
            case 'ACTIVIDAD':
                $sql = "call tablaExpActividadesPP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);                
                $lista['expActividad'] = $l;
            break;

            case 'DISCAPACIDAD':                 
                $sql = "call tablaExpDiscapacidadPP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expDiscapacidad'] = $l;      
            break;

            case 'EDAD':                 
                $sql = "call tablaExpEdadPP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEdad'] = $l;      
             break;

             case 'ETNIA':                 
                $sql = "call tablaExpEtniaPP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expEtnia'] = $l;      
            break;

            case 'GENERAL':                 
                $sql = "call tablaExpGeneralPP('COMPLETO','SISTEMANIN','','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGeneral'] = $l;      
            break;

            case 'GENERO':                 
                $sql = "call tablaExpGeneroPP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expGenero'] = $l;      
            break;

            case 'IDIOMA':                 
                $sql = "call tablaExpIdiomaPP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expIdioma'] = $l;      
            break;

                case 'MATERIA':                 
                $sql = "call tablaExpMateriaPP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expMateria'] = $l;      
            break; 

            /* case 'REGION':                 
                $sql = "call tablaExpRegionP('COMPLETO','SISTEMANIN','','".$sis."','','','','')";
                $l = consulta($sql);  
                $lista['expRegion'] = $l;      
            break; */
            
            case 'SEXO':                 
                $sql = "call tablaExpSexoPP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['expSexo'] = $l;      
            break;

            case 'TOP':                 
                $sql = "call tablaExpTopPP('COMPLETO','SISTEMANINDEF','".$id."','".$sis."','','','".$fi."','".$ff."')";
                $l = consulta($sql);  
                $lista['exptTop'] = $l;      
            break;
        }
    }   
   // print_r($sql);
    return $lista;
}

?>
