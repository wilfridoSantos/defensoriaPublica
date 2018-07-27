<?php

include_once ('../../libreria/conexion.php');
//print_r(fintrarPor("etnia"));
function fintrarPor($fintroPor){
    $sql="select ".$fintroPor.",count(".$fintroPor." ) as total, sexo, count(sexo) from(
        select   pre.pregunta,detalleUsuario.sexo, COUNT(detalleUsuario.sexo) AS tsexo, detalleUsuario.etnia as etnia, COUNT(detalleUsuario.etnia) AS indigena,
       detalleUsuario.idioma, COUNT(detalleUsuario.idioma)as lengua, exp.id_usuario_servicio, exp.id_expediente , preMateria.id_pregunta_materia
      , preMateria.id_materia,res.respuesta
                  from pregunta as pre inner join pregunta_materia as preMateria using(id_pregunta)  
                  inner join respuesta as res using(id_pregunta_materia) 
                  left join detalle_usuario_expediente as exp using(id_expediente)
                  inner join usuario_servicio  as detalleUsuario using(id_usuario_servicio)
                  where id_materia=10 group by  sexo, etnia,idioma,res.respuesta  ) as algo group by respuesta,sexo;";
    $lista = consulta($sql);
   //echo $sql;
    return $lista;
}

//print_r(fintrarPorRespuesta("JUZGADO PENAL DE ETLA",10));

function fintrarPorRespuesta($fintroPor,$princialPor){
   /*  $sql="select idioma, count(idioma) as total, sexo, count(sexo) as tsexo from(
        select   pre.pregunta,detalleUsuario.sexo, COUNT(detalleUsuario.sexo) AS tsexo, detalleUsuario.etnia as etnia, COUNT(detalleUsuario.etnia) AS indigena,
       detalleUsuario.idioma, COUNT(detalleUsuario.idioma)as lengua, exp.id_usuario_servicio, exp.id_expediente , preMateria.id_pregunta_materia
            , preMateria.id_materia,res.respuesta
                  from pregunta as pre inner join pregunta_materia as preMateria using(id_pregunta)  
                  inner join respuesta as res using(id_pregunta_materia) 
                  left join detalle_usuario_expediente as exp using(id_expediente)
                  inner join usuario_servicio  as detalleUsuario using(id_usuario_servicio)
                  where id_materia=10 group by  sexo, etnia,idioma,res.respuesta  ) as algo   where respuesta=".$fintroPor." group by idioma,sexo;"; */
      $sql="select idioma, count(idioma) as total, sexo, count(sexo) as tsexo from(
        ".principalMateria($princialPor)."   where respuesta='".$fintroPor."' group by idioma,sexo;";             
    $lista = consulta($sql);
   //echo $sql;
    return $lista;
}


function fintrarPorPregunta($fintroPor,$princialPor){// ME FILTRA TODO POR PREGUNTAS
   
       /* $sql="select idioma, count(idioma) as total,sexo, count(sexo) as tsexo, algo.respuesta from(
         ".principalMateria($princialPor)."   where pregunta='".$fintroPor."' group by idioma,sexo,algo.respuesta";             
     $lista = consulta($sql); */
        $sql="select idioma, sexo,  respuesta , discapacidad ,etnia,genero from vistaMateria
            where pregunta='".$fintroPor."' ;";             
     $lista = consulta($sql); 
     //echo $sql;
    // $sql ="select * from vistamateria";
   //$lista = consulta($sql);
     return $lista;
 }
 function filtrarPorPreguntaDefensor($fintroPor,$defensor,$fInicio,$fFinal){// ME FILTRA TODO POR PREGUNTAS PARA EL CASO DEL DEFENSOR
  // $sql="select idioma, sexo,  respuesta , discapacidad ,etnia from (".principalDefensor($defensor,$fInicio,$fFinal)."
   $sql="  select id_materia, COALESCE(idioma,'0') as idioma,COALESCE(sexo,'0') as sexo, COALESCE(respuesta,'0') as respuesta  , 
           COALESCE(discapacidad,'0') as discapacidad, COALESCE(etnia,'0') as etnia, COALESCE(genero,'0') as genero from (".principalDefensor($defensor,$fInicio,$fFinal)."
         ) as resultado where p='".$fintroPor."' ;";             
    $lista = consulta($sql); 
 // $sql ="select * from vistamateria";
//$lista = consulta($sql);
//echo $sql;
  return $lista;
}
function filtrarPorPreguntaRegionSistemaMateria($fintroPor,$region,$sistema,$materia,$fInicio,$fFinal){// ME FILTRA TODO POR PREGUNTAS PARA EL CASO DEL DEFENSOR
    // $sql="select idioma, sexo,  respuesta , discapacidad ,etnia from (".principalDefensor($defensor,$fInicio,$fFinal)."
     $sql="  select id_materia, COALESCE(idioma,'0') as idioma,COALESCE(sexo,'0') as sexo, COALESCE(respuesta,'0') as respuesta  , 
             COALESCE(discapacidad,'0') as discapacidad, COALESCE(etnia,'0') as etnia, COALESCE(genero,'0') as genero from (".principalRegionSistemaMateria($region,$sistema,$materia,$fInicio,$fFinal)."
           ) as resultado where pregunta='".$fintroPor."' ;";             
      $lista = consulta($sql); 
   // $sql ="select * from vistamateria";
  //$lista = consulta($sql);
 // echo $sql;
    return $lista;
  }
 function filtrarPorPreguntaSistema($fintroPor,$fInicio,$fFinal){// ME FILTRA TODO POR PREGUNTAS PARA EL CASO DEL DEFENSOR
  // $sql="select idioma, sexo,  respuesta , discapacidad ,etnia from (".principalDefensor($defensor,$fInicio,$fFinal)."
   $sql="  select id_materia, COALESCE(idioma,'0') as idioma,COALESCE(sexo,'0') as sexo, COALESCE(respuesta,'0') as respuesta  , 
           COALESCE(discapacidad,'0') as discapacidad, COALESCE(etnia,'0') as etnia, COALESCE(genero,'0') as genero from vistaSistema
          where pregunta='".$fintroPor."' ;";             
    $lista = consulta($sql); 
 // $sql ="select * from vistamateria";
//$lista = consulta($sql);
//echo $sql;
  return $lista;
}
 function filtrarPorPreguntaSistemaMateria($fintroPor,$fInicio,$fFinal){// ME FILTRA TODO POR PREGUNTAS PARA EL CASO DEL DEFENSOR
   $sql="  select id_materia, COALESCE(idioma,'0') as idioma,COALESCE(sexo,'0') as sexo, COALESCE(respuesta,'0') as respuesta  , 
           COALESCE(discapacidad,'0') as discapacidad, COALESCE(etnia,'0') as etnia, COALESCE(genero,'0') as genero from vistaSistemaMateria
          where pregunta='".$fintroPor."' ;";             
    $lista = consulta($sql); 
 //echo $sql;
  return $lista;
}
function filtradoPorDiscapacidad($dicapacidad,$pregunta){
     $sql="select sexo, count(sexo) as tsexo from (
             select discapacidad,  sexo from vistaMateria 
              where pregunta='".$pregunta."'  ) as filtro
      where  discapacidad='".$dicapacidad."' group by sexo ;";
      return consulta($sql);
}        
function filtradoPorEtnia($etnia,$pregunta){
    $sql="select sexo, count(sexo) as tsexo from (
            select etnia,  sexo from vistaMateria 
             where pregunta='".$pregunta."'  ) as filtro
     where  etnia='".$etnia."' group by sexo ;";
//     echo $sql;

     return consulta($sql);
}  
function filtradoPorIdioma($idioma,$pregunta){
    $sql="select sexo, count(sexo) as tsexo from (
            select idioma,  sexo from vistaMateria 
             where pregunta='".$pregunta."'  ) as filtro
     where  idioma='".$idioma."' group by sexo ;";
    //echo $sql;

     return consulta($sql);
}       
   
function filtradoPorSistemaDiscapacidad($dicapacidad,$pregunta){
    $sql="select sexo, count(sexo) as tsexo from (
            select discapacidad,  sexo from vistaSistema 
             where pregunta='".$pregunta."'  ) as filtro
     where  discapacidad='".$dicapacidad."' group by sexo ;";
     return consulta($sql);
}        
function filtradoPorSistemaEtnia($etnia,$pregunta){
   $sql="select sexo, count(sexo) as tsexo from (
           select etnia,  sexo from vistaSistema 
            where pregunta='".$pregunta."'  ) as filtro
    where  etnia='".$etnia."' group by sexo ;";
//     echo $sql;

    return consulta($sql);
}  
function filtradoPorSistemaIdioma($idioma,$pregunta){
   $sql="select sexo, count(sexo) as tsexo from (
           select idioma,  sexo from vistaSistema 
            where pregunta='".$pregunta."'  ) as filtro
    where  idioma='".$idioma."' group by sexo ;";
   //echo $sql;

    return consulta($sql);
} 
function principalMateria($materia,$fechaInicio,$fechaFinal){// ESTO ES SOLO PARA NO REPETIR ESTO LINEAS DE CODIGO MUCHAS VECES
   /* select   pre.pregunta,detalleUsuario.sexo, COUNT(detalleUsuario.sexo) AS tsexo, detalleUsuario.etnia as etnia, COUNT(detalleUsuario.etnia) AS indigena,
                detalleUsuario.idioma, COUNT(detalleUsuario.idioma)as tidioma, exp.id_usuario_servicio, exp.id_expediente , preMateria.id_pregunta_materia
            , preMateria.id_materia,res.respuesta
                  from pregunta as pre inner join pregunta_materia as preMateria using(id_pregunta)  
                  inner join respuesta as res using(id_pregunta_materia) 
                  left join detalle_usuario_expediente as exp using(id_expediente)
                  inner join usuario_servicio  as detalleUsuario using(id_usuario_servicio)
                  where id_materia=".$materia." group by  sexo, etnia,idioma, pre.pregunta  order by pregunta  as algo ";
    return $sql; */

  // EL DROP IF EXISTS JAMAS SE DEBE BORRAR NI QUITAR PORQUE ES MUY NECESARIO QUE ESTE
  $agregarFecha=" ";
  if($fechaInicio!=" "&$fechaInicio!='')
   $agregarFecha="and (res.fecha_registro BETWEEN '".$fechaInicio."' and '".$fechaFinal."')";

  
   
   $sql=" drop view if exists vistaMateria;
            create view  vistaMateria as
            select   pre.pregunta,detalleUsuario.sexo, detalleUsuario.etnia as etnia,detalleUsuario.genero as genero, 
                    detalleUsuario.idioma, exp.id_usuario_servicio, exp.id_expediente , preMateria.id_pregunta_materia
                , preMateria.id_materia,res.respuesta,detalleUsuario.discapacidad,sistema,materia
                    from pregunta as pre inner join pregunta_materia as preMateria using(id_pregunta) 
                    inner join materia using(id_materia) 
                    inner join respuesta as res using(id_pregunta_materia) 
                    left join detalle_usuario_expediente as exp using(id_expediente)
                    inner join usuario_servicio  as detalleUsuario using(id_usuario_servicio)
                    where materia='".$materia."' ".$agregarFecha."
                    group by  sexo, etnia, pre.pregunta , discapacidad order by pregunta  ; ";
           //echo $sql;       
    return consulta($sql);
}
//print_r(preguntasMateriaAgrupadas('civil'));
function preguntasMateriaAgrupadas($Nombremateria){//  este se agrupa en todas las materia sin importar el sistema y instancia
$where="";



    switch ($Nombremateria) {
    case "PENAL" :
    
    //echo "\n EN PENAL \n";
         $where="where  detalle.id_materia=1 or detalle.id_materia=2 or detalle.id_materia=10  or detalle.id_materia=11  or detalle.id_materia=25";
        break;
        
    case "CIVIL":
    //echo "\n EN CIVIL \n";

    $where="where  detalle.id_materia=5 or detalle.id_materia=6 or detalle.id_materia=12  or detalle.id_materia=13";
        break;
    case 'EJECUCION':
    //echo "\n EN EJECUCION \n";

    $where="where  detalle.id_materia=9 or detalle.id_materia=16 or detalle.id_materia=17";
        break;
    case 'FAMILIAR':
    //echo "\n EN FAMILIAR \n";

    $where="where  detalle.id_materia=3 or detalle.id_materia=4 or detalle.id_materia=14  or detalle.id_materia=15";
        break;
    case 'AGRARIO':
    //echo "\n EN AGRARIO \n";

    $where="where  detalle.id_materia=7 or detalle.id_materia=8  or detalle.id_materia=24";
        break;
    case 'ADOLESCENTE':
    //echo "\n EN ADOLESCENTE \n";
    $where="where  detalle.id_materia=22 or detalle.id_materia=23";
        break; 

    
    default:
        # code...
        break;
} 
    $sql="  select pre.id_pregunta, pre.pregunta, detalle.id_materia, detalle.id_pregunta_materia, detalle.identificador,  op.opcion   
     FROM pregunta_materia as detalle  
         inner join pregunta as pre using(id_pregunta) 
         left join opcion as op using(id_pregunta)".$where." 
         group by pregunta;";

        // echo "\nfina \n";
        // echo $sql;
     return consulta($sql);
 }
function preguntasSistemaMateriaAgrupadas($Nombremateria,$sistema){//  este se agrupa en todas las materia sin importar el sistema y instancia

    /* $sql="  select pre.id_pregunta, pre.pregunta, detalle.id_materia, detalle.id_pregunta_materia, detalle.identificador,  op.opcion   
     FROM pregunta_materia as detalle  
         inner join pregunta as pre using(id_pregunta) 
         left join opcion as op using(id_pregunta)".$where." 
         group by pregunta;"; */

    $sql="select pre.id_pregunta, pre.pregunta, detalle.id_materia, detalle.id_pregunta_materia, detalle.identificador,  op.opcion,sistema,materia   
         FROM pregunta_materia as detalle 
             inner join materia using(id_materia)
             inner join pregunta as pre using(id_pregunta) 
             left join opcion as op using(id_pregunta) 
             where  sistema='".$sistema."' and materia='".$Nombremateria."'
             group by pregunta;";
        // echo "\nfina \n";
      //   echo $sql;
     return consulta($sql);
 }
function preguntasSistema($sistema){
    
    $sql="select pre.id_pregunta, pre.pregunta, detalle.id_materia, detalle.id_pregunta_materia, detalle.identificador,  op.opcion,sistema   
    FROM pregunta_materia as detalle 
        inner join materia using(id_materia)
        inner join pregunta as pre using(id_pregunta) 
        left join opcion as op using(id_pregunta) 
        where  sistema='".$sistema."'
        group by pregunta;";
    return consulta($sql);
}
function preguntasMateria($idmateria){
   /*  $sql="select   pre.pregunta
        from pregunta as pre inner join pregunta_materia as preMateria using(id_pregunta)  
        where id_materia=".$materia; */
    $sql="select pre.id_pregunta, pre.pregunta, detalle.id_materia, detalle.id_pregunta_materia, detalle.identificador,  op.opcion   
                FROM pregunta_materia as detalle  
                    inner join pregunta as pre using(id_pregunta) 
                    left join opcion as op using(id_pregunta) 
            where  detalle.id_materia=".$idmateria;
    return consulta($sql);
}
function preguntasRegionSistemaMateria($region,$sistema,$materia){
    $and=" ";
    if($sistema!=""&$sistema!="NINGUNO"&($materia==""|$materia=="NINGUNO"))
      $and="and sistema='".$sistema."'";
    if($materia!=""&$materia!="NINGUNO"&($sistema==""|$sistema=="NINGUNO"))
      $and="and materia='".$materia."'";
    if($materia!=""&$materia!="NINGUNO"&$sistema!=""&$sistema!="NINGUNO")
      $and="or sistema='".$sistema."' or materia='".$materia."'";
     // $and="and sistema='".$sistema."' and materia='".$materia."'";

 $sql="	select preguntas.id_pregunta,preguntas.pregunta,preguntas.identificador,respuestas.*,opcion 
    from 
      (select id_pregunta,pregunta as pregunta,id_pregunta_materia,id_materia,identificador
            from pregunta as pre inner join pregunta_materia as preMateria using(id_pregunta) ) as preguntas 
     inner join
       ( select id_personal, per.id_materia, per.id_juzgado,per.juzgado,per.region,per.materia,per.sistema
                    from (select * from personal_campo inner join juzgado using(id_juzgado) inner join materia using(id_materia) ) as per  
        ) as respuestas using (id_materia) 
      left join opcion as op on preguntas.id_pregunta=op.id_pregunta
   # where region='".$region."'".$and." 
    group by pregunta, opcion ;";
    //echo $sql;
    return consulta($sql);
}

function opcionesPorMateria($id_pregunta){
     $sql="select opcion from opcion where id_pregunta=".$id_pregunta;
    return consulta($sql); 
}

function aplicarConsultaDefensor($densor,$fechaInicio,$fechaFina){
   /*  $sql="
    select p,id_pregunta as idP, respuesta as res,genero  as generos, discapacidad as discapacidades, (select count(sexo) as h from (".
    principalDefensor($densor,$fechaInicio,$fechaFina)."
           )  as hombre where hombre.respuesta=res and sexo='MASCULINO' 
           ) as hombre
           ,(select count(sexo) as m from (".
                        principalDefensor($densor,$fechaInicio,$fechaFina)." ) 
          as hombre where hombre.respuesta=res and sexo='FEMENINO') AS MUJER ,
  (select count(genero) as m from (".
          principalDefensor($densor,$fechaInicio,$fechaFina)." ) 
    as hombre where hombre.respuesta=res and genero=generos) AS tgenero ,
    (select count(genero) as m from (".
            principalDefensor($densor,$fechaInicio,$fechaFina)." ) 
      as hombre where hombre.respuesta=res and discapacidad=discapacidades) AS tdiscapaciad 
from (". principalDefensor($densor,$fechaInicio,$fechaFina).") as e  group by respuesta;

    "; */
    $sql=principalDefensor($densor,$fechaInicio,$fechaFina);
    //echo $sql;
    return consulta($sql);

}

function principalDefensor($defensor,$fechaInicio,$fechaFina){
    $agregarFecha=" ";
    if($fechaInicio!=" "&$fechaInicio!='')
     $agregarFecha=" where (fecha_registro BETWEEN '".$fechaInicio."' and '".$fechaFina." ') ";
  // $agregarFecha="and (res.fecha_registro BETWEEN '".$fechaInicio."' and '".$fechaFinal."')";
  //select preguntas.p,respuestas.*, user.sexo, user.genero,user.etnia,user.idioma,user.discapacidad 
    
    $sql="
    select preguntas.id_pregunta,preguntas.p,respuestas.*, user.sexo, user.genero,user.etnia,user.idioma,user.discapacidad 
         from 
		 (select id_pregunta,pregunta as p,id_pregunta_materia,id_materia
          from pregunta as pre inner join pregunta_materia as preMateria using(id_pregunta) ) as preguntas 
         
         left join
          
        (select tablaPregunta.id_personal,tablaPregunta.id_expediente,tablaPregunta.id_usuario_servicio,res.respuesta,res.fecha_registro,tablaPregunta.id_materia,res.id_pregunta_materia
                 
		        from (select id_personal,exp.id_expediente,id_usuario_servicio, per.id_materia
						from personal_campo as per inner join expediente as exp using(id_personal) 
					inner join detalle_usuario_expediente as detalleExp using(id_expediente)  where id_personal=".$defensor." ) as tablaPregunta
				
                left join respuesta as res on tablaPregunta.id_expediente=res.id_expediente  ".$agregarFecha." 
                
         ) as respuestas using (id_pregunta_materia) left join usuario_servicio as user using(id_usuario_servicio) where  preguntas.id_materia=(
                    select tablaPregunta.id_materia
		             from (select id_personal,exp.id_expediente,id_usuario_servicio, per.id_materia
						from personal_campo as per inner join expediente as exp using(id_personal) 
				 	inner join detalle_usuario_expediente as detalleExp using(id_expediente)  where id_personal=".$defensor." ) as tablaPregunta
                       left join respuesta as res on tablaPregunta.id_expediente=res.id_expediente limit 1)  ";
       return $sql; //  EN ESTA NO SE REALIZA LA CONSULTA EN FORMA DE VISTA PORQUE NO SE PERMITE SUBCONSULTA EN UNA VISTA                
}

function aplicarConsultaRegionSistemaMateria($region,$sistema,$materia,$fechaInicio,$fechaFina){
   
     $sql=principalRegionSistemaMateria($region,$sistema,$materia,$fechaInicio,$fechaFina);
    // echo $sql;
     return consulta($sql);
 
 }
function principalRegionSistemaMateria($region,$sistema,$materia,$fechaInicio,$fechaFina){
    $agregarFecha=" ";
    $and=" ";
    if($fechaInicio!=" "&$fechaInicio!='')
     $agregarFecha=" where (fecha_registro BETWEEN '".$fechaInicio."' and '".$fechaFina." ') ";
  // $agregarFecha="and (res.fecha_registro BETWEEN '".$fechaInicio."' and '".$fechaFinal."')";
  //select preguntas.p,respuestas.*, user.sexo, user.genero,user.etnia,user.idioma,user.discapacidad 
    if($sistema!=""&$sistema!="NINGUNO"&($materia==""|$materia=="NINGUNO"))
      $and="and sistema='".$sistema."'";
    if($materia!=""&$materia!="NINGUNO"&($sistema==""|$sistema=="NINGUNO"))
      $and="and materia='".$materia."'";
    if($materia!=""&$materia!="NINGUNO"&$sistema!=""&$sistema!="NINGUNO")
      $and="and sistema='".$sistema."' and materia='".$materia."'";

    $sql="
    select preguntas.id_pregunta,preguntas.pregunta,respuestas.*, user.sexo, user.genero,user.etnia,user.idioma,user.discapacidad 
         from 
		 (select id_pregunta,pregunta as pregunta,id_pregunta_materia,id_materia
          from pregunta as pre inner join pregunta_materia as preMateria using(id_pregunta) ) as preguntas 
         
         left join
          
        (select tablaPregunta.id_personal,tablaPregunta.id_expediente,tablaPregunta.id_usuario_servicio, tablaPregunta.juzgado,tablaPregunta.region,tablaPregunta.materia,tablaPregunta.sistema,res.respuesta,res.fecha_registro,tablaPregunta.id_materia,res.id_pregunta_materia
                 
		        from (select id_personal,exp.id_expediente,id_usuario_servicio, per.id_materia, per.id_juzgado,per.juzgado,per.region,per.materia,per.sistema
						from (select * from personal_campo inner join juzgado using(id_juzgado) inner join materia using(id_materia) ) as per inner join expediente as exp using(id_personal) 
					    inner join detalle_usuario_expediente as detalleExp using(id_expediente) # where  region='cañada'   
                    ) as tablaPregunta
				
                inner join respuesta as res on tablaPregunta.id_expediente=res.id_expediente  ".$agregarFecha." 
                
         ) as respuestas using (id_pregunta_materia) left join usuario_servicio as user using(id_usuario_servicio) where  region='".$region."' ".$and."   ";
//echo $sql;
//echo "finalizao esta cosa \n" ;
//return consulta($sql);     
return $sql; //  EN ESTA NO SE REALIZA LA CONSULTA EN FORMA DE VISTA PORQUE NO SE PERMITE SUBCONSULTA EN UNA VISTA                
}



function principalSistema($sistema,$fechaInicio,$fechaFinal){// ESTO ES SOLO PARA NO REPETIR ESTO LINEAS DE CODIGO MUCHAS VECES
   // EL DROP IF EXISTS JAMAS SE DEBE BORRAR NI QUITAR PORQUE ES MUY NECESARIO QUE ESTE
   $agregarFecha=" ";
   if($fechaInicio!=" "&$fechaInicio!='')
    $agregarFecha="and (res.fecha_registro BETWEEN '".$fechaInicio."' and '".$fechaFinal."')";
 
   
    
    $sql=" drop view if exists vistaSistema;
             create view  vistaSistema as
             select   pre.pregunta,detalleUsuario.sexo, detalleUsuario.etnia as etnia, detalleUsuario.genero,
                     detalleUsuario.idioma, exp.id_usuario_servicio, exp.id_expediente , preMateria.id_pregunta_materia
                 , preMateria.id_materia,res.respuesta,detalleUsuario.discapacidad,sistema,materia
                     from pregunta as pre inner join pregunta_materia as preMateria using(id_pregunta) 
                     inner join materia using(id_materia) 
                     inner join respuesta as res using(id_pregunta_materia) 
                     left join detalle_usuario_expediente as exp using(id_expediente)
                     inner join usuario_servicio  as detalleUsuario using(id_usuario_servicio)
                     where sistema='".$sistema."' ".$agregarFecha."
                     group by  sexo, etnia, pre.pregunta , discapacidad order by pregunta  ; ";
           // echo $sql;       
     return consulta($sql);
 }
function principalSistemaMateria($sistema,$materia,$fechaInicio,$fechaFinal){// ESTO ES SOLO PARA NO REPETIR ESTO LINEAS DE CODIGO MUCHAS VECES
   // EL DROP IF EXISTS JAMAS SE DEBE BORRAR NI QUITAR PORQUE ES MUY NECESARIO QUE ESTE
   $agregarFecha=" ";
   if($fechaInicio!=" "&$fechaInicio!='')
    $agregarFecha="and (res.fecha_registro BETWEEN '".$fechaInicio."' and '".$fechaFinal."')";
 
   /*  select   pre.pregunta,detalleUsuario.sexo, detalleUsuario.etnia as etnia, detalleUsuario.genero,
    detalleUsuario.idioma, exp.id_usuario_servicio, exp.id_expediente , preMateria.id_pregunta_materia
, preMateria.id_materia,res.respuesta,detalleUsuario.discapacidad,sistema,materia
    from pregunta as pre inner join pregunta_materia as preMateria using(id_pregunta) 
    inner join materia using(id_materia) 
    inner join respuesta as res using(id_pregunta_materia) 
    left join detalle_usuario_expediente as exp using(id_expediente)
    inner join usuario_servicio  as detalleUsuario using(id_usuario_servicio)
   where sistema='tradicional' and materia='civil'
    group by  sexo, etnia, pre.pregunta , discapacidad order by pregunta  ;
     */
    $sql=" drop view if exists vistaSistemaMateria;
             create view  vistaSistemaMateria as
             select   pre.pregunta,detalleUsuario.sexo, detalleUsuario.etnia as etnia, detalleUsuario.genero,
                     detalleUsuario.idioma, exp.id_usuario_servicio, exp.id_expediente , preMateria.id_pregunta_materia
                 , preMateria.id_materia,res.respuesta,detalleUsuario.discapacidad,sistema,materia
                     from pregunta as pre inner join pregunta_materia as preMateria using(id_pregunta) 
                     inner join materia using(id_materia) 
                     inner join respuesta as res using(id_pregunta_materia) 
                     left join detalle_usuario_expediente as exp using(id_expediente)
                     inner join usuario_servicio  as detalleUsuario using(id_usuario_servicio)
                     where sistema='".$sistema."' and materia='".$materia."' ".$agregarFecha."
                     group by  sexo, etnia, pre.pregunta , discapacidad order by pregunta  ; ";
           //echo $sql;       
     return consulta($sql);
 }
              
?>

