<?php 
    include '../../modelo/querys/informes.php';    
    if((isset($_POST['sistema']) && isset($_POST['materia']) && isset($_POST['filtro']) && isset($_POST['check']) && isset($_POST['atributos'])) ||
         (isset($_POST['sistema']) && isset($_POST['region']) && isset($_POST['filtro']) && isset($_POST['check']) && isset($_POST['atributos'])) ||
         (isset($_POST['sistema']) && isset($_POST['region']) && isset($_POST['materia']) && isset($_POST['filtro']) && isset($_POST['check']) && isset($_POST['atributos']))||
         (isset($_POST['sistema']) && isset($_POST['filtro']) && isset($_POST['check']) && isset($_POST['atributos']))){
        $x = $_POST['filtro'];
        switch($x){
            case 'MATERIA':               
                   $check = $_POST['check'];
                   $sis = $_POST['sistema'];
                   $mat = $_POST['materia'];
                   $atrib = $_POST['atributos'];
                    if($check=='true'){// por defensor
                        if(isset($_POST['id'])){
                            $id=$_POST['id'];
                            switch($sis){
                                case 'ALL':
                                    $cons = consultaMatNotSystemDef($mat, $atrib, $id);
                                    $data = json_encode($cons);
                                    echo $data;
                                break;
                                case 'TRADICIONAL' || 'ORAL':
                                    $cons = consultaMatSystemDef($sis, $mat, $atrib, $id);
                                    $data = json_encode($cons);
                                    echo $data;
                                break;
                            }
                        }
                    }else{//sin defensor y por materia  
                        //$consulta = consultaMatSistema();
                        switch($sis){
                            case 'ALL':
                                $cons = consultaMatNotSystem($mat, $atrib);
                                $data = json_encode($cons);
                                echo $data;
                            break;
                            case 'TRADICIONAL' || 'ORAL':
                                $cons = consultaMatSystem($sis, $mat, $atrib);
                                $data = json_encode($cons);
                                echo $data;
                            break;
                        }
                    }                 
            break;
            
            case 'REGION':
                    $check = $_POST['check'];
                    $sis = $_POST['sistema'];
                    $reg = $_POST['region'];
                    $atrib = $_POST['atributos'];
                    if($check=='true'){// por defensor
                        if(isset($_POST['id'])){
                            $id=$_POST['id'];
                            switch($sis){
                                case 'ALL':
                                    $cons = consultaRegNotSystemDef($reg, $atrib, $id);
                                    $data = json_encode($cons);
                                    echo $data;
                                break;
                                case 'TRADICIONAL' || 'ORAL':
                                    $cons = consultaRegSystemDef($sis, $reg, $atrib, $id);
                                    $data = json_encode($cons);
                                    echo $data;
                                break;
                            }
                        }
                    }else{//sin defensor y por materia  
                        //$consulta = consultaMatSistema();
                        switch($sis){
                            case 'ALL':
                                $cons = consultaRegNotSystem($reg, $atrib);
                                $data = json_encode($cons);
                                echo $data;
                            break;
                            case 'TRADICIONAL' || 'ORAL':
                                $cons = consultaRegSystem($sis, $reg, $atrib);
                                $data = json_encode($cons);
                                echo $data;
                            break;
                        }
                    }  
            break;
            
            case 'AMBAS':
                    $check = $_POST['check'];
                    $sis = $_POST['sistema'];
                    $reg = $_POST['region'];
                    $mat = $_POST['materia'];
                    $atrib = $_POST['atributos'];
                    if($check=='true'){// por defensor
                        if(isset($_POST['id'])){
                            $id= $_POST['id'];
                            switch($sis){
                                case 'ALL':
                                    $cons = consultaAmbasNotSystemDef($mat, $reg, $atrib, $id);
                                    $data = json_encode($cons);
                                    echo $data;
                                break;
                                case 'TRADICIONAL' || 'ORAL':
                                    $cons = consultaAmbasSystemDef($sis, $mat, $reg, $atrib, $id);
                                    $data = json_encode($cons);
                                    echo $data;
                                break;
                            }
                        }
                    }else{//sin defensor y por materia  
                        //$consulta = consultaMatSistema();
                        switch($sis){
                            case 'ALL':
                                $cons = consultaAmbasNotSystem($mat, $reg, $atrib);
                                $data = json_encode($cons);
                                echo $data;
                            break;
                            case 'TRADICIONAL' || 'ORAL':
                                $cons = consultaAmbasSystem($sis, $mat, $reg, $atrib);
                                $data = json_encode($cons);
                                echo $data;
                            break;
                        }
                    }
            break;
            
            case 'NINGUNO':
                    $check = $_POST['check'];
                    $sis = $_POST['sistema'];
                    $atrib = $_POST['atributos'];
                    if($check=='true'){// por defensor
                        if(isset($_POST['id'])){
                            $id= $_POST['id'];
                            switch($sis){
                                case 'ALL':
                                    $cons = consultaNingunoNotSystemDef($atrib, $id);
                                    $data = json_encode($cons);
                                    echo $data;
                                break;
                                case 'TRADICIONAL' || 'ORAL':
                                    $cons = consultaNingunoSystemDef($sis, $atrib, $id);
                                    $data = json_encode($cons);
                                    echo $data;
                                break;
                            }
                        }
                    }else{//sin defensor y por materia  
                        //$consulta = consultaMatSistema();
                        switch($sis){
                            case 'ALL':
                                $cons = consultaNingunoNotSystem($atrib);
                                $data = json_encode($cons);
                                echo $data;
                            break;
                            case 'TRADICIONAL' || 'ORAL':
                                $cons = consultaNingunoSystem($sis, $atrib);
                                $data = json_encode($cons);
                                echo $data;
                            break;
                        }
                    }
            break;
        }        
    }
?>
