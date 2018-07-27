<?php 
 include_once('../../modelo/conteo/pregunta.php');
   
//header('Content-Type: application/json');
  $respuesta = Array(  );
  $respuestaOperacion;
// principalMateria(10,'',''); // PRIMERO CREAMOS LA VISTA EL CUAL SERA CONSUMIDO 

function constructorSistema($sistema,$fechaInicio,$fechaFinal){
    $thisSistema=strtoupper ($sistema);
    $thisFechaInicio='';
    $thisFechaFinal='';
    if(($fechaInicio!=""|$fechaInicio!=" ")&($fechaInicio!=" "|$fechaInicio!=""))
        $thisFechaInicio=$fechaInicio;
    
    if(($fechaFinal!=""|$fechaFinal!=" ")&($fechaFinal!=" "|$fechaFinal!=""))
          $thisFechaFinal=$fechaFinal;
    
    realizandoOperacionSistema($thisSistema,$thisFechaInicio,$thisFechaFinal);
 
}
function realizandoOperacionSistema($sistema,$fechaIncio,$fechaFinal){
    //principalSistema('ORAL','',''); // PRIMERO CREAMOS LA VISTA EL CUAL SERA CONSUMIDO 
    principalSistema($sistema,$fechaIncio,$fechaFinal); // PRIMERO CREAMOS LA VISTA EL CUAL SERA CONSUMIDO 
    //$preguntas=preguntasMateria(10);
   // $preguntas=preguntasSistema('ORAL');// SIEMPRE MANDARLO EN MAYUSCULAS
    $preguntas=preguntasSistema($sistema);// SIEMPRE MANDARLO EN MAYUSCULAS
    $equals="";
    foreach ($preguntas as $key => $value) {
      if($value['pregunta']!=$equals){
        $equals=$value['pregunta'];
        $Arrayvalor =Array(); $array=Array();
       // $array['datosGenerale']=fintrarPorPregunta($value['pregunta'],10);
        $Arrayvalor=filtrarPorPreguntaSistema($value['pregunta'],' ',' ');
       // print_r($Arrayvalor);
        //$filtratoPorOpcion=filtralPorRespuestaSistema($array['datosGenerales'],$valor['opcion']);
        if($Arrayvalor!='0'){
            $discapacidades=array_column( $Arrayvalor,'discapacidad');
            $etnias=array_column( $Arrayvalor,'etnia');
            $idioma=array_column( $Arrayvalor,'idioma');
                $arrayGenerales['sexo']=array_count_values(array_column( $Arrayvalor,'sexo'));
               // $arrayGenerales['idioma']=array_count_values(array_column( $Arrayvalor,'idioma'));
//                $arrayGenerales['discapacidad']=array_count_values(array_column( $Arrayvalor,'discapacidad'));
               $arrayGenerales['discapacidad']=filtradoGeneralesSistema('discapacidad',$discapacidades,$value['pregunta']);
               $arrayGenerales['etnias']=filtradoGeneralesSistema('etnia',$etnias,$value['pregunta']);
               $arrayGenerales['idiomas']=filtradoGeneralesSistema('idioma',$idioma,$value['pregunta']);
               $arrayGenerales['generos']=array_count_values(array_column( $Arrayvalor,'genero'));
              
               $arrayGenerales['respuesta']=array_count_values(array_column( $Arrayvalor,'respuesta'));
           // print_r($arrayGenerales);
           // print_r($Arrayvalor);
            $array['datosGenerales']=$arrayGenerales;

            if($value['identificador']=="select"){
                $arrayOpcion=Array();
                $opciones=opcionesPorMateria($value['id_pregunta']);
                foreach ($opciones as $llave => $valor) {
                        $filtratoPorOpciones=filtralPorRespuestaSistema($Arrayvalor,$valor['opcion']);
                        $filtratoPorOpcion['sexo']=array_count_values(array_column( $filtratoPorOpciones,'sexo'));
                        $filtratoPorOpcion['idioma']=array_count_values(array_column( $filtratoPorOpciones,'idioma'));
                        $filtratoPorOpcion['discapacidades']=array_count_values(array_column( $filtratoPorOpciones,'discapacidad'));
                        $filtratoPorOpcion['etnias']=array_count_values(array_column( $filtratoPorOpciones,'etnia'));
                        $valores=$filtratoPorOpcion;
                        $arrayOpcion[$valor['opcion']]=$valores;
              } 
             $array['opciones']=$arrayOpcion;
             } 
        }
    $respuesta[$value['pregunta']]=$array;//  SE GUARDA EL VARLOR DE CADA UNO DE LAS PREGUNTAS
    global $respuestaOperacion;
    $respuestaOperacion=$respuesta;//  SE GUARDA EL VARLOR DE CADA UNO DE LAS PREGUNTAS
}//final del if
}
}//FIN DE LA FUNCION REALIZANDO OPERACION
//print_r( $respuesta);
function getRespuestaSistema(){
    global $respuestaOperacion;
    return  $respuestaOperacion   ;
}

/* $array = array (1, 3, 3, 5, 6); 
$my_value = 3; 
$filtered_array = array_filter($array, function ($element) use ($my_value) { return ($element != $my_value); } ); 
 */
  function filtralPorRespuestaSistema($array,$opcion){

            return array_filter($array,function($respuesta) use ($opcion){
                   return ($respuesta['respuesta']==$opcion);      
                  }); 
  }

  function funcionPerezosoSistema(array $arr, $pregunta,callable $fn)
{   
    $arrayFiltrados=Array();
    if($arr!=0)
    foreach ($arr as $key => $valores) {
        $retornoFucnion=$fn($valores,$pregunta);
        $arrayFiltrados[$valores]=funcionContadoSexoSistema($retornoFucnion);
       }
  
    return $arrayFiltrados;
}

function funcionContadoSexoSistema($arr)
{   $arrays=Array();
 
    if($arr!=0){
        foreach ($arr as $key => $valores) {
            $arrays[$valores['sexo']]=$valores['tsexo'];
        }

    }
   
    return $arrays;
}

  function filtradoGeneralesSistema($filtraPor,$array,$pregunta){
     $funcionALLamar;
    switch ($filtraPor) {
        case 'idioma':
        //   return  funcionPerezosoSistema( $array, $pregunta,filtradoPorIdioma($valores,$pregunta));
           return  funcionPerezosoSistema( $array, $pregunta,'filtradoPorSistemaIdioma');
        break;
        case 'etnia':
           //return  funcionPerezosoSistema( $array, $pregunta,filtradoPorSistemaEtnia($valores,$pregunta));
           return  funcionPerezosoSistema( $array, $pregunta,"filtradoPorSistemaEtnia");
        break;
        case 'discapacidad':
           return  funcionPerezosoSistema( $array, $pregunta,  'filtradoPorSistemaDiscapacidad');
         break;
        
        default:
            # code...
            break;
    }
   } 
   

?>