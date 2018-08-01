<?php 
   

   include_once('../../modelo/conteo/pregunta.php');
   
header('Content-Type: application/json');
  $respuesta = Array(  );

 $respuestaConsulta;

  function tipoconstructorRegionSistemaMateria($region,$sistema,$materia,$fechaInicio,$fechaFinal){
    $thisRegion=$region;
    $thisFechaInicio='';
    $thisFechaFinal='';
    $thisSistema='';
    $thisMateria='';
    if(($fechaInicio!=""|$fechaInicio!=" ")&($fechaInicio!=" "|$fechaInicio!=""))
        $thisFechaInicio=$fechaInicio;
    
    if(($fechaFinal!=""|$fechaFinal!=" ")&($fechaFinal!=" "|$fechaFinal!=""))
          $thisFechaFinal=$fechaFinal;
    if(($sistema!=""|$sistema!=" ")&($sistema!=" "|$sistema!=""))
          $thisSistema=$sistema;
    if(($materia!=""|$materia!=" ")&($materia!=" "|$materia!=""))
          $thisMateria=$materia;
       
   //principalRegionSistemaMateria($thisRegion,$thisSistema,$thisMateria,$thisFechaInicio,$thisFechaFinal);
  // preguntasRegionSistemaMateria($thisRegion,$thisSistema,$thisMateria);
   realizandoOperacionRegionSistemaMateria($thisRegion,$thisSistema,$thisMateria,$thisFechaInicio,$thisFechaFinal);
    }
  
   function realizandoOperacionRegionSistemaMateria($region,$sistema,$materia,$thisFechaInicio,$fechaFinal){
//  $listaPreguntas=aplicarConsultaDefensor(19,'',''); // PRIMERO CREAMOS LA VISTA EL CUAL SERA CONSUMIDO 
  $listaPreguntas=aplicarConsultaRegionSistemaMateria($region,$sistema,$materia,$thisFechaInicio,$fechaFinal); // PRIMERO CREAMOS LA VISTA EL CUAL SERA CONSUMIDO 
  //echo "lista de preguntas \n";
//  print_r($listaPreguntas);
  $preguntasConOpcion=preguntasRegionSistemaMateria($region,$sistema,$materia);
 //print_r($preguntasConOpcion);
 $equals="";
 if($preguntasConOpcion!=0)
foreach ($preguntasConOpcion as $key => $value) {
   
    if($value['pregunta']!=$equals){
        $equals=$value['pregunta'];
        $Arrayvalor =Array(); $array=Array();
       // $array['datosGenerale']=filtrarPorPreguntaDefensor($value['pregunta'],19,'','');
      //  print_r($array);
      // $Arrayvalor=filtrarPorPreguntaDefensor($value['pregunta'],19,'','');//se cmaio por abajo
       $Arrayvalor=filtrarPorPreguntaRegionSistemaMateria($value['pregunta'],$region,$sistema,$materia,$thisFechaInicio,$fechaFinal);
       // print_r($Arrayvalor);
        //$filtratoPorOpcion=filtralPorRespuesta($array['datosGenerales'],$valor['opcion']);
        if($Arrayvalor!='0'){
            //echo "aqui viene \n"; 
           // print_r($Arrayvalor);
      
            $discapacidades=array_column( $Arrayvalor,'discapacidad');
            $etnias=array_column( $Arrayvalor,'etnia');
            $idioma=array_column( $Arrayvalor,'idioma');
            $genero=array_column( $Arrayvalor,'genero');
          //  print_r($etnias);
                $arrayGenerales['sexo']=array_count_values(array_column( $Arrayvalor,'sexo'));
                //filtradoGenerales($filtraPor,$array,$pregunta,$region,$sistema,$materia,$fechaInicio,$fechaFina)
               $arrayGenerales['discapacidad']=filtradoGenerales('discapacidad',$discapacidades,$value['pregunta'],$region,$sistema,$materia,$thisFechaInicio,$fechaFinal);
               $arrayGenerales['etnias']=filtradoGenerales('etnia',$etnias,$value['pregunta'],$region,$sistema,$materia,$thisFechaInicio,$fechaFinal);
               $arrayGenerales['idiomas']=filtradoGenerales('idioma',$idioma,$value['pregunta'],$region,$sistema,$materia,$thisFechaInicio,$fechaFinal);
               $arrayGenerales['generos']=array_count_values(array_column( $Arrayvalor,'genero'));
                
               $arrayGenerales['respuesta']=array_count_values(array_column( $Arrayvalor,'respuesta'));
            $array['datosGenerales']=$arrayGenerales;

             if($value['identificador']=="select"){
                $arrayOpcion=Array();

                $opciones=opcionesPorMateria($value['id_pregunta']);
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
   // print_r( $respuesta);
    //return $respuesta;
global $respuestaConsulta;
$respuestaConsulta=$respuesta;
}//final del if 
}
}//fin realizando operacion

//print_r( $respuestaConsulta);
//$respuestaConsulta=$respuesta;
function getRespuestaRegionSistemaMateria(){
    global $respuestaConsulta;
    return  $respuestaConsulta   ;
}
//print_r( $preguntas);

  function filtralPorRespuesta($array,$opcion){

            return array_filter($array,function($respuesta) use ($opcion){
                   return ($respuesta['respuesta']==$opcion);      
                  }); 
  }

  function funcionPerezoso(array $arr, $pregunta,$region,$sistema,$materia,$fechaInicio,$fechaFina,callable $fn)
{  $arrayFiltrados=Array();
    if($arr!=0)
    foreach ($arr as $key => $valores) {
        $retornoFucnion=$fn($valores,$pregunta,$region,$sistema,$materia,$fechaInicio,$fechaFina);
        $arrayFiltrados[$valores]=funcionContadoSexo($retornoFucnion);
       }
  
    return $arrayFiltrados;
}

function funcionContadoSexo($arr)
{   $arrays=Array();
    //print_r($arr)
    if($arr!=0){
        foreach ($arr as $key => $valores) {
            $arrays[$valores['sexo']]=$valores['tsexo'];
        }

    }
   
    return $arrays;
}

  function filtradoGenerales($filtraPor,$array,$pregunta,$region,$sistema,$materia,$fechaInicio,$fechaFina){
     $funcionALLamar;
    // echo $fechaFina." se tiene en filtrado general";
    switch ($filtraPor) {
        case 'idioma':
        //   return  funcionPerezoso( $array, $pregunta,filtradoPorIdioma($valores,$pregunta));
           return  funcionPerezoso( $array, $pregunta,$region,$sistema,$materia,$fechaInicio,$fechaFina,'filtradoPorIdiomaRegionSistemaMateria');
        break;
        case 'etnia':
           //return  funcionPerezoso( $array, $pregunta,filtradoPorEtnia($valores,$pregunta));
           return  funcionPerezoso( $array, $pregunta,$region,$sistema,$materia,$fechaInicio,$fechaFina,"filtradoPorEtniaRegionSistemaMateria");
        break;
        case 'discapacidad':
           return  funcionPerezoso( $array, $pregunta, $region,$sistema,$materia,$fechaInicio,$fechaFina, 'filtradoPorDiscapacidadRegionSistemaMateria');
         break;
        
        
        default:
            # code...
            break;
    }
   } 
   
   function filtradoPorDiscapacidadRegionSistemaMateria($dicapacidad,$pregunta,$region,$sistema,$materia,$fechaInicio,$fechaFina){
    $sql="select sexo, count(sexo) as tsexo from (
            select discapacidad,  sexo from (".principalRegionSistemaMateria($region,$sistema,$materia,$fechaInicio,$fechaFina)." ) as  resultado
             where pregunta='".$pregunta."'  ) as filtro
     where  discapacidad='".$dicapacidad."' group by sexo ;";
    // echo $sql;
    // echo "aqui se finaliza \n";

     return consulta($sql);
}        
function filtradoPorEtniaRegionSistemaMateria($etnia,$pregunta,$region,$sistema,$materia,$fechaInicio,$fechaFina){
   $sql="select sexo, count(sexo) as tsexo from (
           select etnia,  sexo from (".principalRegionSistemaMateria($region,$sistema,$materia,$fechaInicio,$fechaFina)." ) as resultado 
            where pregunta='".$pregunta."'  ) as filtro
    where  etnia='".$etnia."' group by sexo ;";
//     echo $sql;

    return consulta($sql);
}  
function filtradoPorIdiomaRegionSistemaMateria($idioma,$pregunta,$region,$sistema,$materia,$fechaInicio,$fechaFina){
   $sql="select sexo, count(sexo) as tsexo from (
           select idioma,  sexo from (".principalRegionSistemaMateria($region,$sistema,$materia,$fechaInicio,$fechaFina)." )as resultado
            where pregunta='".$pregunta."'  ) as filtro
    where  idioma='".$idioma."' group by sexo ;";
   //echo $sql;

    return consulta($sql);
}  
?>