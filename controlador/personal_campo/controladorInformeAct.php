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
        if($_POST['radio1'] == 'true'){//informe por periodo
            if(isset($_POST['fechaI']) && isset($_POST['fechaF']) ){
                $fi= $_POST['fechaI'];
                $ff= $_POST['fechaF'];
                                
                if($_POST['check'] == 'true'){//informe por periodo y defensor en especifico
                    if(isset($_POST['defensor'])){
                        $def = $_POST['defensor'];
                        $informeByDefPeriodo = getActividadesByDefPeriodo($fi,$ff,$def);
                        $informeEncode = json_encode($informeByDefPeriodo);  
                        print_r($informeEncode);
                    }
                }
                if($_POST['check'] == 'false'){//informe by periodo solamente
                // print_r($_POST['check'].' valor del check');
                    $informeByPeriodo = getActividadesByPeriodo($fi,$ff);
                    $informeEncode = json_encode($informeByPeriodo);
                    print_r($informeEncode);
                    //echo 'kjashdkjahskdjhaskjh';
                }
            }
           // print_r($_POST['radio1'].' valor del radio '.$_POST['check'].' valor del check');
        }
        if($_POST['radio1'] == 'false'){//informe general
            if($_POST['check']== 'true'){//informe completo y defensor en especifico
                if(isset($_POST['defensor'])){
                    $def = $_POST['defensor'];
                    $informeFullByDef = getActividadesCompletoBydef($def);
                    $informeEncode = json_encode($informeFullByDef);
                    print_r($informeEncode);
                 }
                
            }else{//informe completo general
                $informeFull = getActividadesCompleto();
                $informeEncode = json_encode($informeFull);
                print_r($informeEncode);
                //echo 'ajhdkjhakjdha';
            }
        }

    }
?>
