<?php 
  /*  EJECUCION
   FAMILIAR 
   AGRARIO 
   ADOLESCENTE  */

   include_once('../../modelo/conteo/pregunta.php');
   
//header('Content-Type: application/json');
  $respuesta = Array(  );

$respuestaConsultaMateria;
function constructorMateria($materia,$fechaInicio,$fechaFinal){
    $thisMateria=$materia;
    $thisFechaInicio='';
    $thisFechaFinal='';
    if(($fechaInicio!=""|$fechaInicio!=" ")&($fechaInicio!=" "|$fechaInicio!=""))
        $thisFechaInicio=$fechaInicio;
    
    if(($fechaFinal!=""|$fechaFinal!=" ")&($fechaFinal!=" "|$fechaFinal!=""))
          $thisFechaFinal=$fechaFinal;
    
          realizandoOperacionMateria($thisMateria,$thisFechaInicio,$thisFechaFinal);
    /* echo "fdsfdsfs ".$thisDefensor;
    echo "fechI ".$thisFechaInicio;
    echo "\n fechaFinal ".$thisFechaFinal;
   */}
function realizandoOperacionMateria($materia,$fechaInicio,$fechaFinal){
  //principalMateria('PENAL','',''); // PRIMERO CREAMOS LA VISTA EL CUAL SERA CONSUMIDO 
  principalMateria($materia,$fechaInicio,$fechaFinal); // PRIMERO CREAMOS LA VISTA EL CUAL SERA CONSUMIDO 
//$preguntas=preguntasMateria(10);
$preguntas=preguntasMateriaAgrupadas($materia);// SIEMPRE MANDARLO EN MAYUSCULAS
$equals="";
//print_r($preguntas);
foreach ($preguntas as $key => $value) {
   //print_r("\n preguntas ".$value['pregunta']);
    if($value['pregunta']!=$equals){
        $equals=$value['pregunta'];
        $Arrayvalor =Array(); $array=Array();
       // $array['datosGenerale']=fintrarPorPregunta($value['pregunta'],10);
        $Arrayvalor=fintrarPorPregunta($value['pregunta'],10);//NOTA EL PARAMETRO 10 NO SIRVE Y HACE NADA
       // print_r($Arrayvalor);
        //$filtratoPorOpcion=filtralPorRespuesta($array['datosGenerales'],$valor['opcion']);
        if($Arrayvalor!='0'){
            $discapacidades=array_column( $Arrayvalor,'discapacidad');
            $etnias=array_column( $Arrayvalor,'etnia');
            $idioma=array_column( $Arrayvalor,'idioma');
                $arrayGenerales['sexo']=array_count_values(array_column( $Arrayvalor,'sexo'));
               // $arrayGenerales['idioma']=array_count_values(array_column( $Arrayvalor,'idioma'));
//                $arrayGenerales['discapacidad']=array_count_values(array_column( $Arrayvalor,'discapacidad'));
               $arrayGenerales['discapacidad']=filtradoGenerales('discapacidad',$discapacidades,$value['pregunta']);
               $arrayGenerales['etnias']=filtradoGenerales('etnia',$etnias,$value['pregunta']);
               $arrayGenerales['idiomas']=filtradoGenerales('idioma',$idioma,$value['pregunta']);
               $arrayGenerales['generos']=array_count_values(array_column( $Arrayvalor,'genero'));
             
               $arrayGenerales['respuesta']=array_count_values(array_column( $Arrayvalor,'respuesta'));
//                $arrayGenerales['etnias']=array_count_values(array_column( $Arrayvalor,'etnia'));
            //$array['datosGenerales']=fintrarPorPregunta($value['pregunta'],10);
            //print_r($array['datosGenerales']);
          //  print_r($arrayGenerales);
            $array['datosGenerales']=$arrayGenerales;

            if($value['identificador']=="select"){
                $arrayOpcion=Array();

                $opciones=opcionesPorMateria($value['id_pregunta']);
            // $ArrayRespuesta=Array();
                
                foreach ($opciones as $llave => $valor) {
                
                        $filtratoPorOpciones=filtralPorRespuesta($Arrayvalor,$valor['opcion']);
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
   
    global $respuestaConsultaMateria;
    $respuestaConsultaMateria=$respuesta;

}//final del if
}
 //print_r( $respuesta);

}// FIN DE LA FUNCION OPERACIONMATERIA
function getRespuestaMateria(){
    global $respuestaConsultaMateria;
    return  $respuestaConsultaMateria   ;
}
//print_r( $preguntas);


/* $array = array (1, 3, 3, 5, 6); 
$my_value = 3; 
$filtered_array = array_filter($array, function ($element) use ($my_value) { return ($element != $my_value); } ); 
 */
  function filtralPorRespuesta($array,$opcion){

            return array_filter($array,function($respuesta) use ($opcion){
                   return ($respuesta['respuesta']==$opcion);      
                  }); 
  }

  function funcionPerezoso(array $arr, $pregunta,callable $fn)
{   
    $arrayFiltrados=Array();
    if($arr!=0)
    foreach ($arr as $key => $valores) {
        $retornoFucnion=$fn($valores,$pregunta);
        $arrayFiltrados[$valores]=funcionContadoSexo($retornoFucnion);
       }
  
    return $arrayFiltrados;
}

function funcionContadoSexo($arr)
{   $arrays=Array();
 
    if($arr!=0){
        foreach ($arr as $key => $valores) {
            $arrays[$valores['sexo']]=$valores['tsexo'];
        }

    }
   
    return $arrays;
}

  function filtradoGenerales($filtraPor,$array,$pregunta){
     $funcionALLamar;
    switch ($filtraPor) {
        case 'idioma':
        //   return  funcionPerezoso( $array, $pregunta,filtradoPorIdioma($valores,$pregunta));
           return  funcionPerezoso( $array, $pregunta,'filtradoPorIdioma');
        break;
        case 'etnia':
           //return  funcionPerezoso( $array, $pregunta,filtradoPorEtnia($valores,$pregunta));
           return  funcionPerezoso( $array, $pregunta,"filtradoPorEtnia");
        break;
        case 'discapacidad':
           return  funcionPerezoso( $array, $pregunta,  'filtradoPorDiscapacidad');
         break;
        
        default:
            # code...
            break;
    }
   } 
   

?>