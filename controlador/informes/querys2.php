<?php 
    include '../../modelo/querys/informes.php';    
    if((isset($_POST['sistema']) && isset($_POST['materia']) && isset($_POST['filtro']) && isset($_POST['check']) && isset($_POST['atributos']) && isset($_POST['f1']) && isset($_POST['f2'])) ||
         (isset($_POST['sistema']) && isset($_POST['region']) && isset($_POST['filtro']) && isset($_POST['check']) && isset($_POST['atributos'])  && isset($_POST['f1']) && isset($_POST['f2'])) ||
         (isset($_POST['sistema']) && isset($_POST['region']) && isset($_POST['materia']) && isset($_POST['filtro']) && isset($_POST['check']) && isset($_POST['atributos'])  && isset($_POST['f1']) && isset($_POST['f2']))||
         (isset($_POST['sistema']) && isset($_POST['filtro']) && isset($_POST['check']) && isset($_POST['atributos'])  && isset($_POST['f1']) && isset($_POST['f2']))){
        $x = $_POST['filtro'];
                    $f1 = $_POST['f1'];
                   $f2=$_POST['f2'];
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
                                    $cons = consultaMatNotSystemDefP($mat, $atrib, $id, $f1, $f2);
                                    $data = json_encode($cons);
                                    echo $data;
                                break;
                                case 'TRADICIONAL' || 'ORAL':
                                    $cons = consultaMatSystemDefP($sis, $mat, $atrib, $id, $f1, $f2);
                                    $data = json_encode($cons);
                                    echo $data;
                                break;
                            }
                        }
                    }else{//sin defensor y por materia  
                        //$consulta = consultaMatSistema();
                        switch($sis){
                            case 'ALL':
                                $cons = consultaMatNotSystemP($mat, $atrib, $f1, $f2);
                                $data = json_encode($cons);
                                echo $data;
                            break;
                            case 'TRADICIONAL' || 'ORAL':
                                $cons = consultaMatSystemP($sis, $mat, $atrib, $f1, $f2);
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
                                    $cons = consultaRegNotSystemDefP($reg, $atrib, $id, $f1, $f2);
                                    $data = json_encode($cons);
                                    echo $data;
                                break;
                                case 'TRADICIONAL' || 'ORAL':
                                    $cons = consultaRegSystemDefP($sis, $reg, $atrib, $id, $f1, $f2);
                                    $data = json_encode($cons);
                                    echo $data;
                                break;
                            }
                        }
                    }else{//sin defensor y por materia  
                        //$consulta = consultaMatSistema();
                        switch($sis){
                            case 'ALL':
                                $cons = consultaRegNotSystemP($reg, $atrib, $f1, $f2);
                                $data = json_encode($cons);
                                echo $data;
                            break;
                            case 'TRADICIONAL' || 'ORAL':
                                $cons = consultaRegSystemP($sis, $reg, $atrib, $f1, $f2);
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
                                    $cons = consultaAmbasNotSystemDefP($mat, $reg, $atrib, $id, $f1, $f2);
                                    $data = json_encode($cons);
                                    echo $data;
                                break;
                                case 'TRADICIONAL' || 'ORAL':
                                    $cons = consultaAmbasSystemDefP($sis, $mat, $reg, $atrib, $id, $f1, $f2);
                                    $data = json_encode($cons);
                                    echo $data;
                                break;
                            }
                        }
                    }else{//sin defensor y por materia  
                        //$consulta = consultaMatSistema();
                        switch($sis){
                            case 'ALL':
                                $cons = consultaAmbasNotSystemP($mat, $reg, $atrib, $f1, $f2);
                                $data = json_encode($cons);
                                echo $data;
                            break;
                            case 'TRADICIONAL' || 'ORAL':
                                $cons = consultaAmbasSystemP($sis, $mat, $reg, $atrib, $f1, $f2);
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
                                    $cons = consultaNingunoNotSystemDefP($atrib, $id, $f1, $f2);
                                    $data = json_encode($cons);
                                    echo $data;
                                break;
                                case 'TRADICIONAL' || 'ORAL':
                                    $cons = consultaNingunoSystemDefP($sis, $atrib, $id, $f1, $f2);
                                    $data = json_encode($cons);
                                    echo $data;
                                break;
                            }
                        }
                    }else{//sin defensor y por materia  
                        //$consulta = consultaMatSistema();
                        switch($sis){
                            case 'ALL':
                                $cons = consultaNingunoNotSystemP($atrib, $f1, $f2);
                                $data = json_encode($cons);
                                echo $data;
                            break;
                            case 'TRADICIONAL' || 'ORAL':
                                $cons = consultaNingunoSystemP($sis, $atrib, $f1, $f2);
                                $data = json_encode($cons);
                                echo $data;
                            break;
                        }
                    }
            break;
        }        
    }
?>
