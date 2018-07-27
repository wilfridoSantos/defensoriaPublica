<?php 
    include '../../modelo/actividad.php';    
    if(isset($_POST['nue'])){
        $fechaInicio =$_POST['fechaI'];
        $fechaFinal = $_POST['fechaF'];
        $nue = $_POST['nue'];             
        $informeGeneralActNue = getActividadesByFiltroNue($fechaInicio, $fechaFinal, $nue);
        $informeEncodeNue = json_encode($informeGeneralActNue);
        echo $informeEncodeNue; 
    }else {
        if(isset($_POST['radio1'])){            
            $fi= $_POST['fechaI'];
            $ff= $_POST['fechaF'];                        
            if($_POST['check'] == 'true'){//informe por periodo y defensor en especifico
                if(isset($_POST['defensor'])){
                    $def = $_POST['defensor'];
                    $informeByDefPeriodo = getActividadesByDefPeriodo($fi,$ff,$def);
                    $informeEncode = json_encode($informeByDefPeriodo);  
                    print_r($informeEncode);
                }
            }else{//informe by periodo solamente
                $informeByPeriodo = getActividadesByPeriodo($fi,$ff);
                //print_r($informeByPeriodo);
                $informeEncode = json_encode($informeByPeriodo);
                print_r($informeEncode);
                        //echo 'kjashdkjahskdjhaskjh';
            }          
        }
        if(isset($_POST['radio2'])){                       
            if($_POST['check'] == 'true'){//informe por periodo y defensor en especifico
                if(isset($_POST['defensor'])){
                    $def = $_POST['defensor'];
                    $informeByDefCompleto = getActividadesByDefCompleto($def);
                    $informeEncode = json_encode($informeByDefCompleto);  
                    print_r($informeEncode);
                }
            }else{
                $informeActGCompleto = getActividadesGC();
                $informeEncode = json_encode($informeActGCompleto);
                print_r($informeEncode);
                        //echo 'kjashdkjahskdjhaskjh';
            }                 
        }
        if(isset($_POST['radio3'])){
            $fi= $_POST['fechaI'];
            $ff= $_POST['fechaF'];                        
            $sistema=$_POST['sistema'];
            $atributos=$_POST['atributos'];

            if($_POST['check'] == 'true'){//informe por periodo y defensor en especifico                
                if(isset($_POST['defensor'])){
                    $def = $_POST['defensor'];                
                    $informeByDefPeriodoP = getActividadesByDefPeriodoP($fi,$ff,$def, $sistema, $atributos);
                    $informeEncode = json_encode($informeByDefPeriodoP);  
                    print_r($informeEncode);
                }
            }else{            
                $informeByPeriodoCP = getActividadesByPeriodoCP($fi,$ff, $sistema, $atributos);
                $informeEncode = json_encode($informeByPeriodoCP);
                print_r($informeEncode);                
            }                
        }
        if(isset($_POST['radio4'])){                       
            $sistema=$_POST['sistema'];
            $atributos=$_POST['atributos'];
            if($_POST['check'] == 'true'){//informe por periodo y defensor en especifico                
                if(isset($_POST['defensor'])){
                    $def = $_POST['defensor'];                
                    $informeByDefPC = getActividadesByDefPC($def, $sistema, $atributos);
                    $informeEncode = json_encode($informeByDefPC);  
                    print_r($informeEncode);
                }
            }else{//informe by periodo solamente             
                $informePC = getActividadesPC($sistema, $atributos);
                $informeEncode = json_encode($informePC);
                print_r($informeEncode);                
            }       
        }

    }
?>
