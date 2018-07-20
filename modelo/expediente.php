<?php

include_once ('../../libreria/conexion.php');
function etniaBySistema($valor, $fi, $ff, $def){
  switch($valor){
      case 'PERIODO':
           $sql = "SELECT U.etnia AS etniaU, COUNT(A.id_Actividad) AS asesoriaPorSistema,
          (SELECT COUNT(A.id_actividad)
           FROM actividad AS act
                   INNER JOIN asesoria AS A USING (id_actividad)
                   INNER JOIN (SELECT *
                           FROM
                           personal_campo
                               INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                   INNER JOIN materia AS m USING (id_materia)
                   INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)						
                           where  (fecha_registro between '".$fi."' and '".$ff."') and
                               U.sexo = 'MASCULINO' AND U.etnia = etniaU and m.sistema='TRADICIONAL') AS etniaHombreT,
          (SELECT COUNT(A.id_actividad)
           FROM actividad AS act
                   INNER JOIN asesoria AS A USING (id_actividad)
                   INNER JOIN (SELECT *
                           FROM
                           personal_campo
                               INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                   INNER JOIN materia AS m USING (id_materia)
                   INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)						
                           where  (fecha_registro between '".$fi."' and '".$ff."') and
                               U.sexo = 'MASCULINO' AND U.etnia = etniaU and m.sistema='ORAL') AS etniaHombreO,
       (SELECT COUNT(A.id_actividad)
           FROM actividad AS act
                   INNER JOIN asesoria AS A USING (id_actividad)
                   INNER JOIN (SELECT *
                           FROM
                           personal_campo
                               INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                   INNER JOIN materia AS m USING (id_materia)
                   INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                       where  (fecha_registro between '".$fi."' and '".$ff."') and
                                           U.sexo = 'FEMENINO' AND U.etnia = etniaU and m.sistema='TRADICIONAL') AS etniaMujerT,
       (SELECT COUNT(A.id_actividad)
           FROM actividad AS act
                   INNER JOIN asesoria AS A USING (id_actividad)
                   INNER JOIN (SELECT *
                           FROM
                           personal_campo
                               INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                   INNER JOIN materia AS m USING (id_materia)
                   INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                       where  (fecha_registro between '".$fi."' and '".$ff."') and
                                           U.sexo = 'FEMENINO' AND U.etnia = etniaU and m.sistema='ORAL') AS etniaMujerO
               FROM		
               actividad AS act
                   LEFT JOIN asesoria AS A USING (id_actividad)
                   LEFT JOIN personal AS P USING (id_personal)
                   LEFT JOIN
                       (SELECT *
                           FROM
                           personal_campo
                               INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                               LEFT JOIN materia AS m USING (id_materia)
                               LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                               where  (fecha_registro between '".$fi."' and '".$ff."')
               GROUP BY etniaU
               ORDER BY sistema;";
      return $sql; 
      break;
      case 'PERIODODEF': 
              $sql = "SELECT U.etnia AS etniaU, COUNT(A.id_Actividad) AS asesoriaPorSistema,
              (SELECT COUNT(A.id_actividad)
                  FROM actividad AS act
                          INNER JOIN asesoria AS A USING (id_actividad)
                          INNER JOIN (SELECT *
                                  FROM
                                  personal_campo
                                      INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                          INNER JOIN materia AS m USING (id_materia)
                          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)						
                                  where  (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal='".$def."' and
                                      U.sexo = 'MASCULINO' AND U.etnia = etniaU and m.sistema='TRADICIONAL') AS etniaHombreT,
              (SELECT COUNT(A.id_actividad)
                  FROM actividad AS act
                          INNER JOIN asesoria AS A USING (id_actividad)
                          INNER JOIN (SELECT *
                                  FROM
                                  personal_campo
                                      INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                          INNER JOIN materia AS m USING (id_materia)
                          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)						
                                  where  (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal='".$def."' and
                                      U.sexo = 'MASCULINO' AND U.etnia = etniaU and m.sistema='ORAL') AS etniaHombreO,
              (SELECT COUNT(A.id_actividad)
                  FROM actividad AS act
                          INNER JOIN asesoria AS A USING (id_actividad)
                          INNER JOIN (SELECT *
                                  FROM
                                  personal_campo
                                      INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                          INNER JOIN materia AS m USING (id_materia)
                          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                              where  (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal='".$def."' and
                                                  U.sexo = 'FEMENINO' AND U.etnia = etniaU and m.sistema='TRADICIONAL') AS etniaMujerT,
              (SELECT COUNT(A.id_actividad)
                  FROM actividad AS act
                          INNER JOIN asesoria AS A USING (id_actividad)
                          INNER JOIN (SELECT *
                                  FROM
                                  personal_campo
                                      INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                          INNER JOIN materia AS m USING (id_materia)
                          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                              where  (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal='".$def."' and
                                                  U.sexo = 'FEMENINO' AND U.etnia = etniaU and m.sistema='ORAL') AS etniaMujerO
                      FROM		
                      actividad AS act
                          LEFT JOIN asesoria AS A USING (id_actividad)
                          LEFT JOIN personal AS P USING (id_personal)
                          LEFT JOIN
                              (SELECT *
                                  FROM
                                  personal_campo
                                      INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                                      LEFT JOIN materia AS m USING (id_materia)
                                      LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                      where  (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal='".$def."'
                      GROUP BY pc.id_personal
                      ORDER BY sistema;";
              return $sql; 
      break;
      case 'DEFENSOR': 
              $sql = "SELECT U.etnia AS etniaU, COUNT(A.id_Actividad) AS asesoriaPorSistema,
              (SELECT COUNT(A.id_actividad)
                  FROM actividad AS act
                          INNER JOIN asesoria AS A USING (id_actividad)
                          INNER JOIN (SELECT *
                                  FROM
                                  personal_campo
                                      INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                          INNER JOIN materia AS m USING (id_materia)
                          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)						
                                  where pc.id_personal='".$def."' and
                                      U.sexo = 'MASCULINO' AND U.etnia = etniaU and m.sistema='TRADICIONAL') AS etniaHombreT,
              (SELECT COUNT(A.id_actividad)
                  FROM actividad AS act
                          INNER JOIN asesoria AS A USING (id_actividad)
                          INNER JOIN (SELECT *
                                  FROM
                                  personal_campo
                                      INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                          INNER JOIN materia AS m USING (id_materia)
                          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)						
                                  where pc.id_personal='".$def."' and
                                      U.sexo = 'MASCULINO' AND U.etnia = etniaU and m.sistema='ORAL') AS etniaHombreO,
              (SELECT COUNT(A.id_actividad)
                  FROM actividad AS act
                          INNER JOIN asesoria AS A USING (id_actividad)
                          INNER JOIN (SELECT *
                                  FROM
                                  personal_campo
                                      INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                          INNER JOIN materia AS m USING (id_materia)
                          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                              where  pc.id_personal='".$def."' and
                                                  U.sexo = 'FEMENINO' AND U.etnia = etniaU and m.sistema='TRADICIONAL') AS etniaMujerT,
              (SELECT COUNT(A.id_actividad)
                  FROM actividad AS act
                          INNER JOIN asesoria AS A USING (id_actividad)
                          INNER JOIN (SELECT *
                                  FROM
                                  personal_campo
                                      INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                          INNER JOIN materia AS m USING (id_materia)
                          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                              where pc.id_personal='".$def."' and
                                                  U.sexo = 'FEMENINO' AND U.etnia = etniaU and m.sistema='ORAL') AS etniaMujerO
                      FROM		
                      actividad AS act
                          LEFT JOIN asesoria AS A USING (id_actividad)
                          LEFT JOIN personal AS P USING (id_personal)
                          LEFT JOIN
                              (SELECT *
                                  FROM
                                  personal_campo
                                      INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                                      LEFT JOIN materia AS m USING (id_materia)
                                      LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                      where pc.id_personal='".$def."'
                      GROUP BY pc.id_personal
                      ORDER BY sistema;";
              return $sql; 
      break;
      case 'ALL': 
      $sql = "SELECT U.etnia AS etniaU, COUNT(A.id_Actividad) AS asesoriaPorSistema,
      (SELECT COUNT(A.id_actividad)
          FROM actividad AS act
                  INNER JOIN asesoria AS A USING (id_actividad)
                  INNER JOIN (SELECT *
                          FROM
                          personal_campo
                              INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                  INNER JOIN materia AS m USING (id_materia)
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)						
                          where U.sexo = 'MASCULINO' AND U.etnia = etniaU and m.sistema='TRADICIONAL') AS etniaHombreT,
      (SELECT COUNT(A.id_actividad)
          FROM actividad AS act
                  INNER JOIN asesoria AS A USING (id_actividad)
                  INNER JOIN (SELECT *
                          FROM
                          personal_campo
                              INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                  INNER JOIN materia AS m USING (id_materia)
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)						
                          where  U.sexo = 'MASCULINO' AND U.etnia = etniaU and m.sistema='ORAL') AS etniaHombreO,
      (SELECT COUNT(A.id_actividad)
          FROM actividad AS act
                  INNER JOIN asesoria AS A USING (id_actividad)
                  INNER JOIN (SELECT *
                          FROM
                          personal_campo
                              INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                  INNER JOIN materia AS m USING (id_materia)
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                      where U.sexo = 'FEMENINO' AND U.etnia = etniaU and m.sistema='TRADICIONAL') AS etniaMujerT,
      (SELECT COUNT(A.id_actividad)
          FROM actividad AS act
                  INNER JOIN asesoria AS A USING (id_actividad)
                  INNER JOIN (SELECT *
                          FROM
                          personal_campo
                              INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                  INNER JOIN materia AS m USING (id_materia)
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                      where U.sexo = 'FEMENINO' AND U.etnia = etniaU and m.sistema='ORAL') AS etniaMujerO
              FROM		
              actividad AS act
                  LEFT JOIN asesoria AS A USING (id_actividad)
                  LEFT JOIN personal AS P USING (id_personal)
                  LEFT JOIN
                      (SELECT *
                          FROM
                          personal_campo
                              INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                              LEFT JOIN materia AS m USING (id_materia)
                              LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)                    
              GROUP BY etniaU
              ORDER BY sistema;";
      return $sql; 
      break;
  }
  
}
function idiomaBySistema($valor, $fi, $ff, $def){
  switch($valor){
  case'PERIODO': 
          $sql = "SELECT U.idioma AS idiomaU, COUNT(A.id_Actividad) AS asesoriaPorSistema,
          (SELECT COUNT(A.id_actividad)
          FROM actividad AS act
                  INNER JOIN asesoria AS A USING (id_actividad)
                  INNER JOIN (SELECT *
                          FROM
                          personal_campo
                              INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                  INNER JOIN materia AS m USING (id_materia)
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)						
                          where  (fecha_registro between '".$fi."' and '".$ff."') and
                              U.sexo = 'MASCULINO' AND U.idioma = idiomaU and m.sistema='TRADICIONAL') AS idiomaHombreT,
         (SELECT COUNT(A.id_actividad)
          FROM actividad AS act
                  INNER JOIN asesoria AS A USING (id_actividad)
                  INNER JOIN (SELECT *
                          FROM
                          personal_campo
                              INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                  INNER JOIN materia AS m USING (id_materia)
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)						
                          where  (fecha_registro between '".$fi."' and '".$ff."') and
                              U.sexo = 'MASCULINO' AND U.idioma= idiomaU and m.sistema='ORAL') AS idiomaHombreO,
          (SELECT COUNT(A.id_actividad)
              FROM actividad AS act
                      INNER JOIN asesoria AS A USING (id_actividad)
                      INNER JOIN (SELECT *
                              FROM
                              personal_campo
                                  INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                      INNER JOIN materia AS m USING (id_materia)
                      INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                          where  (fecha_registro between '".$fi."' and '".$ff."') and
                                              U.sexo = 'FEMENINO' AND U.idioma = idiomaU and m.sistema='TRADICIONAL') AS idiomaMujerT,
          (SELECT COUNT(A.id_actividad)
              FROM actividad AS act
                      INNER JOIN asesoria AS A USING (id_actividad)
                      INNER JOIN (SELECT *
                              FROM
                              personal_campo
                                  INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                      INNER JOIN materia AS m USING (id_materia)
                      INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                          where  (fecha_registro between '".$fi."' and '".$ff."') and
                                              U.sexo = 'FEMENINO' AND U.idioma = idiomaU and m.sistema='ORAL') AS idiomaMujerO
                  FROM		
                  actividad AS act
                      LEFT JOIN asesoria AS A USING (id_actividad)
                      LEFT JOIN personal AS P USING (id_personal)
                      LEFT JOIN
                          (SELECT *
                              FROM
                              personal_campo
                                  INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                                  LEFT JOIN materia AS m USING (id_materia)
                                  LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                  where  (fecha_registro between '".$fi."' and '".$ff."')
                  GROUP BY idiomaU
                  ORDER BY sistema;";
          return $sql;
  break;
  case'PERIODODEF': 
          $sql = "SELECT U.idioma AS idiomaU, COUNT(A.id_Actividad) AS asesoriaPorSistema,
      (SELECT COUNT(A.id_actividad)
          FROM actividad AS act
                  INNER JOIN asesoria AS A USING (id_actividad)
                  INNER JOIN (SELECT *
                          FROM
                          personal_campo
                              INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                  INNER JOIN materia AS m USING (id_materia)
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)						
                          where  (fecha_registro between '".$fi."' and '".$ff."')  and pc.id_personal ='".$def."' and
                              U.sexo = 'MASCULINO' AND U.idioma = idiomaU and m.sistema='TRADICIONAL') AS idiomaHombreT,
      (SELECT COUNT(A.id_actividad)
          FROM actividad AS act
                  INNER JOIN asesoria AS A USING (id_actividad)
                  INNER JOIN (SELECT *
                          FROM
                          personal_campo
                              INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                  INNER JOIN materia AS m USING (id_materia)
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)						
                          where  (fecha_registro between '".$fi."' and '".$ff."')  and pc.id_personal ='".$def."' and
                              U.sexo = 'MASCULINO' AND U.idioma= idiomaU and m.sistema='ORAL') AS idiomaHombreO,
      (SELECT COUNT(A.id_actividad)
          FROM actividad AS act
                  INNER JOIN asesoria AS A USING (id_actividad)
                  INNER JOIN (SELECT *
                          FROM
                          personal_campo
                              INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                  INNER JOIN materia AS m USING (id_materia)
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                      where  (fecha_registro between '".$fi."' and '".$ff."')  and pc.id_personal ='".$def."' and
                                          U.sexo = 'FEMENINO' AND U.idioma = idiomaU and m.sistema='TRADICIONAL') AS idiomaMujerT,
      (SELECT COUNT(A.id_actividad)
          FROM actividad AS act
                  INNER JOIN asesoria AS A USING (id_actividad)
                  INNER JOIN (SELECT *
                          FROM
                          personal_campo
                              INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                  INNER JOIN materia AS m USING (id_materia)
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                      where  (fecha_registro between '".$fi."' and '".$ff."')  and pc.id_personal ='".$def."' and
                                          U.sexo = 'FEMENINO' AND U.idioma = idiomaU and m.sistema='ORAL') AS idiomaMujerO
              FROM		
              actividad AS act
                  LEFT JOIN asesoria AS A USING (id_actividad)
                  LEFT JOIN personal AS P USING (id_personal)
                  LEFT JOIN
                      (SELECT *
                          FROM
                          personal_campo
                              INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                              LEFT JOIN materia AS m USING (id_materia)
                              LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal ='".$def."'
              GROUP BY pc.id_personal
              ORDER BY sistema;";
      return $sql;
  break;
  case'DEFENSOR': 
          $sql = "SELECT U.idioma AS idiomaU, COUNT(A.id_Actividad) AS asesoriaPorSistema,
          (SELECT COUNT(A.id_actividad)
              FROM actividad AS act
                      INNER JOIN asesoria AS A USING (id_actividad)
                      INNER JOIN (SELECT *
                              FROM
                              personal_campo
                                  INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                      INNER JOIN materia AS m USING (id_materia)
                      INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)						
                              where pc.id_personal ='".$def."' and
                                  U.sexo = 'MASCULINO' AND U.idioma = idiomaU and m.sistema='TRADICIONAL') AS idiomaHombreT,
          (SELECT COUNT(A.id_actividad)
              FROM actividad AS act
                      INNER JOIN asesoria AS A USING (id_actividad)
                      INNER JOIN (SELECT *
                              FROM
                              personal_campo
                                  INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                      INNER JOIN materia AS m USING (id_materia)
                      INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)						
                              where pc.id_personal ='".$def."' and
                                  U.sexo = 'MASCULINO' AND U.idioma= idiomaU and m.sistema='ORAL') AS idiomaHombreO,
          (SELECT COUNT(A.id_actividad)
              FROM actividad AS act
                      INNER JOIN asesoria AS A USING (id_actividad)
                      INNER JOIN (SELECT *
                              FROM
                              personal_campo
                                  INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                      INNER JOIN materia AS m USING (id_materia)
                      INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                          where  pc.id_personal ='".$def."' and
                                              U.sexo = 'FEMENINO' AND U.idioma = idiomaU and m.sistema='TRADICIONAL') AS idiomaMujerT,
          (SELECT COUNT(A.id_actividad)
              FROM actividad AS act
                      INNER JOIN asesoria AS A USING (id_actividad)
                      INNER JOIN (SELECT *
                              FROM
                              personal_campo
                                  INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                      INNER JOIN materia AS m USING (id_materia)
                      INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                          where pc.id_personal ='".$def."' and
                                              U.sexo = 'FEMENINO' AND U.idioma = idiomaU and m.sistema='ORAL') AS idiomaMujerO
                  FROM		
                  actividad AS act
                      LEFT JOIN asesoria AS A USING (id_actividad)
                      LEFT JOIN personal AS P USING (id_personal)
                      LEFT JOIN
                          (SELECT *
                              FROM
                              personal_campo
                                  INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                                  LEFT JOIN materia AS m USING (id_materia)
                                  LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                  where pc.id_personal ='".$def."'
                  GROUP BY pc.id_personal
                  ORDER BY sistema;";
          return $sql;
  break;
  case'ALL': 
  $sql = "SELECT U.idioma AS idiomaU, COUNT(A.id_Actividad) AS asesoriaPorSistema,
  (SELECT COUNT(A.id_actividad)
      FROM actividad AS act
              INNER JOIN asesoria AS A USING (id_actividad)
              INNER JOIN (SELECT *
                      FROM
                      personal_campo
                          INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
              INNER JOIN materia AS m USING (id_materia)
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)						
                      where U.sexo = 'MASCULINO' AND U.idioma = idiomaU and m.sistema='TRADICIONAL') AS idiomaHombreT,
  (SELECT COUNT(A.id_actividad)
      FROM actividad AS act
              INNER JOIN asesoria AS A USING (id_actividad)
              INNER JOIN (SELECT *
                      FROM
                      personal_campo
                          INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
              INNER JOIN materia AS m USING (id_materia)
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)						
                      where U.sexo = 'MASCULINO' AND U.idioma= idiomaU and m.sistema='ORAL') AS idiomaHombreO,
  (SELECT COUNT(A.id_actividad)
      FROM actividad AS act
              INNER JOIN asesoria AS A USING (id_actividad)
              INNER JOIN (SELECT *
                      FROM
                      personal_campo
                          INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
              INNER JOIN materia AS m USING (id_materia)
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                  where U.sexo = 'FEMENINO' AND U.idioma = idiomaU and m.sistema='TRADICIONAL') AS idiomaMujerT,
  (SELECT COUNT(A.id_actividad)
      FROM actividad AS act
              INNER JOIN asesoria AS A USING (id_actividad)
              INNER JOIN (SELECT *
                      FROM
                      personal_campo
                          INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
              INNER JOIN materia AS m USING (id_materia)
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                                  where  U.sexo = 'FEMENINO' AND U.idioma = idiomaU and m.sistema='ORAL') AS idiomaMujerO
          FROM		
          actividad AS act
              LEFT JOIN asesoria AS A USING (id_actividad)
              LEFT JOIN personal AS P USING (id_personal)
              LEFT JOIN
                  (SELECT *
                      FROM
                      personal_campo
                          INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                          LEFT JOIN materia AS m USING (id_materia)
                          LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)                                
          GROUP BY idiomaU
          ORDER BY sistema;";
  return $sql;
  break;

  }
  
}
function discapacidadBySistema($valor, $fi, $ff, $def){
  switch($valor){
      case 'PERIODO': 
              $sql = "SELECT matSistemaG,  COUNT(U.id_usuario_servicio) AS discapTotal,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and U.discapacidad = 'SENSORIALES' AND 													
                                      matSistema=matSistemaG
              ) AS tablaSensorial,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and U.discapacidad = 'SENSORIALES' AND 													
                                      matSistema=matSistemaG AND U.sexo='MASCULINO'
              ) AS tablaSensorialM,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and U.discapacidad = 'SENSORIALES' AND 													
                                      matSistema=matSistemaG AND U.sexo='FEMENINO'
              ) AS tablaSensorialF,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and U.discapacidad = 'MOTRICES' AND 
                                              matSistema=matSistemaG
              ) AS tablaMotriz,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and U.discapacidad = 'MOTRICES' AND 
                                              matSistema=matSistemaG AND U.sexo ='MASCULINO'
              ) AS tablaMotrizM,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and U.discapacidad = 'MOTRICES' AND 
                                              matSistema=matSistemaG AND U.sexo ='FEMENINO'
              ) AS tablaMotrizF,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and U.discapacidad = 'MENTALES' AND 
                                              matSistema=matSistemaG
              ) AS tablaMental,
              
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and U.discapacidad = 'MENTALES' AND 
                                              matSistema=matSistemaG AND U.sexo ='MASCULINO'
              ) AS tablaMentalM,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and U.discapacidad = 'MENTALES' AND 
                                              matSistema=matSistemaG and U.sexo = 'FEMENINO'
              ) AS tablaMentalF,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and U.discapacidad = 'MULTIPLES' AND 
                                              matSistema=matSistemaG
              ) AS tablaMultiple,					(
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and U.discapacidad = 'MULTIPLES' AND 
                                              matSistema=matSistemaG AND U.sexo ='MASCULINO'
              ) AS tablaMultipleM,
                                  (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and U.discapacidad = 'MULTIPLES' AND 
                                              matSistema=matSistemaG and U.sexo='FEMENINO'
              ) AS tablaMultipleF,
              
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and U.discapacidad = 'NINGUNO' AND 
                                              matSistema=matSistemaG
              ) AS tablaNinguno,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and U.discapacidad = 'NINGUNO' AND 
                                              matSistema=matSistemaG and U.sexo='MASCULINO'
              ) AS tablaNingunoM,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and U.discapacidad = 'NINGUNO' AND 
                                              matSistema=matSistemaG and U.sexo = 'FEMENINO'
              ) AS tablaNingunoF
          FROM		
          actividad as act
          INNER JOIN asesoria AS AA USING (id_actividad)
          INNER JOIN  
                      (select pcc.id_personal idPer, per.nombre as nombreDef, mate.sistema as matSistemaG
                              from personal_campo as pcc
                                  inner join personal per using(id_personal)										
                                  inner join materia as mate using(id_materia)
                      ) AS tabla1 on act.id_personal = idPer              
          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                      where  (fecha_registro between '".$fi."' and '".$ff."') group by  matSistemaG order by matSistemaG;";
              return $sql;
      break;
      case 'PERIODODEF': 
              $sql = "SELECT matSistemaG,  COUNT(U.id_usuario_servicio) AS discapTotal,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and idPer = '".$def."' and U.discapacidad = 'SENSORIALES' AND 													
                                      matSistema=matSistemaG
              ) AS tablaSensorial,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and idPer = '".$def."' and U.discapacidad = 'SENSORIALES' AND 													
                                      matSistema=matSistemaG AND U.sexo='MASCULINO'
              ) AS tablaSensorialM,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and idPer = '".$def."' and U.discapacidad = 'SENSORIALES' AND 													
                                      matSistema=matSistemaG AND U.sexo='FEMENINO'
              ) AS tablaSensorialF,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and idPer = '".$def."' and U.discapacidad = 'MOTRICES' AND 
                                              matSistema=matSistemaG
              ) AS tablaMotriz,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and idPer = '".$def."' and U.discapacidad = 'MOTRICES' AND 
                                              matSistema=matSistemaG AND U.sexo ='MASCULINO'
              ) AS tablaMotrizM,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and idPer = '".$def."' and U.discapacidad = 'MOTRICES' AND 
                                              matSistema=matSistemaG AND U.sexo ='FEMENINO'
              ) AS tablaMotrizF,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and idPer = '".$def."' and U.discapacidad = 'MENTALES' AND 
                                              matSistema=matSistemaG
              ) AS tablaMental,
              
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and idPer = '".$def."' and U.discapacidad = 'MENTALES' AND 
                                              matSistema=matSistemaG AND U.sexo ='MASCULINO'
              ) AS tablaMentalM,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and idPer= '".$def."' and U.discapacidad = 'MENTALES' AND 
                                              matSistema=matSistemaG and U.sexo = 'FEMENINO'
              ) AS tablaMentalF,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and idPer = '".$def."' and U.discapacidad = 'MULTIPLES' AND 
                                              matSistema=matSistemaG
              ) AS tablaMultiple,					(
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and idPer = '".$def."' and U.discapacidad = 'MULTIPLES' AND 
                                              matSistema=matSistemaG AND U.sexo ='MASCULINO'
              ) AS tablaMultipleM,
                                  (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and idPer= '".$def."' and U.discapacidad = 'MULTIPLES' AND 
                                              matSistema=matSistemaG and U.sexo='FEMENINO'
              ) AS tablaMultipleF,
              
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and idPer= '".$def."' and U.discapacidad = 'NINGUNO' AND 
                                              matSistema=matSistemaG
              ) AS tablaNinguno,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and idPer = '".$def."' and U.discapacidad = 'NINGUNO' AND 
                                              matSistema=matSistemaG and U.sexo='MASCULINO'
              ) AS tablaNingunoM,
              (
                  select count(AA.id_actividad)
                  from
                      actividad as act
                  INNER JOIN asesoria AS AA USING (id_actividad)
                  INNER JOIN  
                              (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                      from personal_campo as pcc
                                          inner join personal per using(id_personal)										
                                          inner join materia as mat using(id_materia)
                              ) AS tabla1 on act.id_personal = idPer              
                  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                              where  (fecha_registro between '".$fi."' and '".$ff."') and idPer= '".$def."' and U.discapacidad = 'NINGUNO' AND 
                                              matSistema=matSistemaG and U.sexo = 'FEMENINO'
              ) AS tablaNingunoF
          FROM		
          actividad as act
          INNER JOIN asesoria AS AA USING (id_actividad)
          INNER JOIN  
                      (select pcc.id_personal idPer, per.nombre as nombreDef, mate.sistema as matSistemaG
                              from personal_campo as pcc
                                  inner join personal per using(id_personal)										
                                  inner join materia as mate using(id_materia)
                      ) AS tabla1 on act.id_personal = idPer              
          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                      where  (fecha_registro between '".$fi."' and '".$ff."') and idPer = '".$def."' group by  matSistemaG order by matSistemaG;";
              return $sql;
      break;
      case'DEFENSOR':                     
          $sql = "SELECT matSistemaG,  COUNT(U.id_usuario_servicio) AS discapTotal,
          (
              select count(AA.id_actividad)
              from
                  actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)										
                                      inner join materia as mat using(id_materia)
                          ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                          where    idPer= '".$def."' and U.discapacidad = 'SENSORIALES' AND 													
                                  matSistema=matSistemaG
          ) AS tablaSensorial,
          (
              select count(AA.id_actividad)
              from
                  actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)										
                                      inner join materia as mat using(id_materia)
                          ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                          where    idPer = '".$def."' and U.discapacidad = 'SENSORIALES' AND 													
                                  matSistema=matSistemaG AND U.sexo='MASCULINO'
          ) AS tablaSensorialM,
          (
              select count(AA.id_actividad)
              from
                  actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)										
                                      inner join materia as mat using(id_materia)
                          ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                          where    idPer = '".$def."' and U.discapacidad = 'SENSORIALES' AND 													
                                  matSistema=matSistemaG AND U.sexo='FEMENINO'
          ) AS tablaSensorialF,
          (
              select count(AA.id_actividad)
              from
                  actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)										
                                      inner join materia as mat using(id_materia)
                          ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                          where idPer = '".$def."' and U.discapacidad = 'MOTRICES' AND 
                                          matSistema=matSistemaG
          ) AS tablaMotriz,
          (
              select count(AA.id_actividad)
              from
                  actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)										
                                      inner join materia as mat using(id_materia)
                          ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                          where idPer = '".$def."' and U.discapacidad = 'MOTRICES' AND 
                                          matSistema=matSistemaG AND U.sexo ='MASCULINO'
          ) AS tablaMotrizM,
          (
              select count(AA.id_actividad)
              from
                  actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)										
                                      inner join materia as mat using(id_materia)
                          ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                          where idPer = '".$def."' and U.discapacidad = 'MOTRICES' AND 
                                          matSistema=matSistemaG AND U.sexo ='FEMENINO'
          ) AS tablaMotrizF,
          (
              select count(AA.id_actividad)
              from
                  actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)										
                                      inner join materia as mat using(id_materia)
                          ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                          where idPer= '".$def."' and U.discapacidad = 'MENTALES' AND 
                                          matSistema=matSistemaG
          ) AS tablaMental,
          
          (
              select count(AA.id_actividad)
              from
                  actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)										
                                      inner join materia as mat using(id_materia)
                          ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                          where idPer = '".$def."' and U.discapacidad = 'MENTALES' AND 
                                          matSistema=matSistemaG AND U.sexo ='MASCULINO'
          ) AS tablaMentalM,
          (
              select count(AA.id_actividad)
              from
                  actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)										
                                      inner join materia as mat using(id_materia)
                          ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                          where idPer = '".$def."' and U.discapacidad = 'MENTALES' AND 
                                          matSistema=matSistemaG and U.sexo = 'FEMENINO'
          ) AS tablaMentalF,
          (
              select count(AA.id_actividad)
              from
                  actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)										
                                      inner join materia as mat using(id_materia)
                          ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                          where idPer = '".$def."' and U.discapacidad = 'MULTIPLES' AND 
                                          matSistema=matSistemaG
          ) AS tablaMultiple,					(
              select count(AA.id_actividad)
              from
                  actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)										
                                      inner join materia as mat using(id_materia)
                          ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                          where idPer = '".$def."' and U.discapacidad = 'MULTIPLES' AND 
                                          matSistema=matSistemaG AND U.sexo ='MASCULINO'
          ) AS tablaMultipleM,
                              (
              select count(AA.id_actividad)
              from
                  actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)										
                                      inner join materia as mat using(id_materia)
                          ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                          where  idPer = '".$def."' and U.discapacidad = 'MULTIPLES' AND 
                                          matSistema=matSistemaG and U.sexo='FEMENINO'
          ) AS tablaMultipleF,
          
          (
              select count(AA.id_actividad)
              from
                  actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)										
                                      inner join materia as mat using(id_materia)
                          ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                          where  idPer = '".$def."' and U.discapacidad = 'NINGUNO' AND 
                                          matSistema=matSistemaG
          ) AS tablaNinguno,
          (
              select count(AA.id_actividad)
              from
                  actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)										
                                      inner join materia as mat using(id_materia)
                          ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                          where idPer = '".$def."' and U.discapacidad = 'NINGUNO' AND 
                                          matSistema=matSistemaG and U.sexo='MASCULINO'
          ) AS tablaNingunoM,
          (
              select count(AA.id_actividad)
              from
                  actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)										
                                      inner join materia as mat using(id_materia)
                          ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                          where idPer = '".$def."' and U.discapacidad = 'NINGUNO' AND 
                                          matSistema=matSistemaG and U.sexo = 'FEMENINO'
          ) AS tablaNingunoF
      FROM		
      actividad as act
      INNER JOIN asesoria AS AA USING (id_actividad)
      INNER JOIN  
                  (select pcc.id_personal idPer, per.nombre as nombreDef, mate.sistema as matSistemaG
                          from personal_campo as pcc
                              inner join personal per using(id_personal)										
                              inner join materia as mate using(id_materia)
                  ) AS tabla1 on act.id_personal = idPer              
      INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                  where idPer = '".$def."' group by  matSistemaG order by matSistemaG;";
          return $sql;
      break;
      case'ALL': 
      
      $sql = "SELECT matSistemaG,  COUNT(U.id_usuario_servicio) AS discapTotal,
      (
          select count(AA.id_actividad)
          from
              actividad as act
          INNER JOIN asesoria AS AA USING (id_actividad)
          INNER JOIN  
                      (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                              from personal_campo as pcc
                                  inner join personal per using(id_personal)										
                                  inner join materia as mat using(id_materia)
                      ) AS tabla1 on act.id_personal = idPer              
          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                      where  U.discapacidad = 'SENSORIALES' AND 													
                              matSistema=matSistemaG
      ) AS tablaSensorial,
      (
          select count(AA.id_actividad)
          from
              actividad as act
          INNER JOIN asesoria AS AA USING (id_actividad)
          INNER JOIN  
                      (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                              from personal_campo as pcc
                                  inner join personal per using(id_personal)										
                                  inner join materia as mat using(id_materia)
                      ) AS tabla1 on act.id_personal = idPer              
          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                      where  U.discapacidad = 'SENSORIALES' AND 													
                              matSistema=matSistemaG AND U.sexo='MASCULINO'
      ) AS tablaSensorialM,
      (
          select count(AA.id_actividad)
          from
              actividad as act
          INNER JOIN asesoria AS AA USING (id_actividad)
          INNER JOIN  
                      (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                              from personal_campo as pcc
                                  inner join personal per using(id_personal)										
                                  inner join materia as mat using(id_materia)
                      ) AS tabla1 on act.id_personal = idPer              
          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                      where  U.discapacidad = 'SENSORIALES' AND 													
                              matSistema=matSistemaG AND U.sexo='FEMENINO'
      ) AS tablaSensorialF,
      (
          select count(AA.id_actividad)
          from
              actividad as act
          INNER JOIN asesoria AS AA USING (id_actividad)
          INNER JOIN  
                      (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                              from personal_campo as pcc
                                  inner join personal per using(id_personal)										
                                  inner join materia as mat using(id_materia)
                      ) AS tabla1 on act.id_personal = idPer              
          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                      where  U.discapacidad = 'MOTRICES' AND 
                                      matSistema=matSistemaG
      ) AS tablaMotriz,
      (
          select count(AA.id_actividad)
          from
              actividad as act
          INNER JOIN asesoria AS AA USING (id_actividad)
          INNER JOIN  
                      (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                              from personal_campo as pcc
                                  inner join personal per using(id_personal)										
                                  inner join materia as mat using(id_materia)
                      ) AS tabla1 on act.id_personal = idPer              
          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                      where  U.discapacidad = 'MOTRICES' AND 
                                      matSistema=matSistemaG AND U.sexo ='MASCULINO'
      ) AS tablaMotrizM,
      (
          select count(AA.id_actividad)
          from
              actividad as act
          INNER JOIN asesoria AS AA USING (id_actividad)
          INNER JOIN  
                      (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                              from personal_campo as pcc
                                  inner join personal per using(id_personal)										
                                  inner join materia as mat using(id_materia)
                      ) AS tabla1 on act.id_personal = idPer              
          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                      where U.discapacidad = 'MOTRICES' AND 
                                      matSistema=matSistemaG AND U.sexo ='FEMENINO'
      ) AS tablaMotrizF,
      (
          select count(AA.id_actividad)
          from
              actividad as act
          INNER JOIN asesoria AS AA USING (id_actividad)
          INNER JOIN  
                      (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                              from personal_campo as pcc
                                  inner join personal per using(id_personal)										
                                  inner join materia as mat using(id_materia)
                      ) AS tabla1 on act.id_personal = idPer              
          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                      where  U.discapacidad = 'MENTALES' AND 
                                      matSistema=matSistemaG
      ) AS tablaMental,
      
      (
          select count(AA.id_actividad)
          from
              actividad as act
          INNER JOIN asesoria AS AA USING (id_actividad)
          INNER JOIN  
                      (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                              from personal_campo as pcc
                                  inner join personal per using(id_personal)										
                                  inner join materia as mat using(id_materia)
                      ) AS tabla1 on act.id_personal = idPer              
          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                      where  U.discapacidad = 'MENTALES' AND 
                                      matSistema=matSistemaG AND U.sexo ='MASCULINO'
      ) AS tablaMentalM,
      (
          select count(AA.id_actividad)
          from
              actividad as act
          INNER JOIN asesoria AS AA USING (id_actividad)
          INNER JOIN  
                      (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                              from personal_campo as pcc
                                  inner join personal per using(id_personal)										
                                  inner join materia as mat using(id_materia)
                      ) AS tabla1 on act.id_personal = idPer              
          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                      where U.discapacidad = 'MENTALES' AND 
                                      matSistema=matSistemaG and U.sexo = 'FEMENINO'
      ) AS tablaMentalF,
      (
          select count(AA.id_actividad)
          from
              actividad as act
          INNER JOIN asesoria AS AA USING (id_actividad)
          INNER JOIN  
                      (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                              from personal_campo as pcc
                                  inner join personal per using(id_personal)										
                                  inner join materia as mat using(id_materia)
                      ) AS tabla1 on act.id_personal = idPer              
          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                      where U.discapacidad = 'MULTIPLES' AND 
                                      matSistema=matSistemaG
      ) AS tablaMultiple,					(
          select count(AA.id_actividad)
          from
              actividad as act
          INNER JOIN asesoria AS AA USING (id_actividad)
          INNER JOIN  
                      (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                              from personal_campo as pcc
                                  inner join personal per using(id_personal)										
                                  inner join materia as mat using(id_materia)
                      ) AS tabla1 on act.id_personal = idPer              
          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                      where U.discapacidad = 'MULTIPLES' AND 
                                      matSistema=matSistemaG AND U.sexo ='MASCULINO'
      ) AS tablaMultipleM,
                          (
          select count(AA.id_actividad)
          from
              actividad as act
          INNER JOIN asesoria AS AA USING (id_actividad)
          INNER JOIN  
                      (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                              from personal_campo as pcc
                                  inner join personal per using(id_personal)										
                                  inner join materia as mat using(id_materia)
                      ) AS tabla1 on act.id_personal = idPer              
          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                      where U.discapacidad = 'MULTIPLES' AND 
                                      matSistema=matSistemaG and U.sexo='FEMENINO'
      ) AS tablaMultipleF,
      
      (
          select count(AA.id_actividad)
          from
              actividad as act
          INNER JOIN asesoria AS AA USING (id_actividad)
          INNER JOIN  
                      (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                              from personal_campo as pcc
                                  inner join personal per using(id_personal)										
                                  inner join materia as mat using(id_materia)
                      ) AS tabla1 on act.id_personal = idPer              
          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                      where U.discapacidad = 'NINGUNO' AND 
                                      matSistema=matSistemaG
      ) AS tablaNinguno,
      (
          select count(AA.id_actividad)
          from
              actividad as act
          INNER JOIN asesoria AS AA USING (id_actividad)
          INNER JOIN  
                      (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                              from personal_campo as pcc
                                  inner join personal per using(id_personal)										
                                  inner join materia as mat using(id_materia)
                      ) AS tabla1 on act.id_personal = idPer              
          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                      where U.discapacidad = 'NINGUNO' AND 
                                      matSistema=matSistemaG and U.sexo='MASCULINO'
      ) AS tablaNingunoM,
      (
          select count(AA.id_actividad)
          from
              actividad as act
          INNER JOIN asesoria AS AA USING (id_actividad)
          INNER JOIN  
                      (select pcc.id_personal idPer, per.nombre as nombreDef, mat.sistema as matSistema 
                              from personal_campo as pcc
                                  inner join personal per using(id_personal)										
                                  inner join materia as mat using(id_materia)
                      ) AS tabla1 on act.id_personal = idPer              
          INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                      where U.discapacidad = 'NINGUNO' AND 
                                      matSistema=matSistemaG and U.sexo = 'FEMENINO'
      ) AS tablaNingunoF
  FROM		
  actividad as act
  INNER JOIN asesoria AS AA USING (id_actividad)
  INNER JOIN  
              (select pcc.id_personal idPer, per.nombre as nombreDef, mate.sistema as matSistemaG
                      from personal_campo as pcc
                          inner join personal per using(id_personal)										
                          inner join materia as mate using(id_materia)
              ) AS tabla1 on act.id_personal = idPer              
  INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
             group by  matSistemaG order by matSistemaG;";
      return $sql;
      break;
  }
  
}
function topDefensoresBySistema($valor, $fi, $ff, $def){
  switch($valor){
      case'PERIODO': 
      $sql = "SELECT matSistema as sistemaM, nombreDef AS nombreP,tabla1.idPer as idDeff, nombreJuz, COUNT(AA.id_Actividad) AS asesoriaPorSistema,
      (SELECT COUNT(AA.id_actividad)
          FROM actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                      (select pcc.id_personal idPer, juz.id_juzgado as idJuz, juz.juzgado as nombreJuz, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)
                                      INNER JOIN juzgado  juz USING (id_juzgado)
                                      inner join materia as mat using(id_materia)
                           ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS cv USING (id_usuario_servicio)						
                      where  (fecha_registro between '".$fi."' and '".$ff."') and
                          cv.sexo = 'FEMENINO' AND tabla1.idPer = idDeff and matSistema = sistemaM) AS mujeres,
          (SELECT COUNT(AA.id_actividad)
          FROM actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, juz.id_juzgado as idJuz, juz.juzgado as nombreJuz, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)
                                      INNER JOIN juzgado  juz USING (id_juzgado)
                                      inner join materia as mat using(id_materia)
                           ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS cv USING (id_usuario_servicio)						
                      where  (fecha_registro between '".$fi."' and '".$ff."') and
                          cv.sexo = 'MASCULINO' AND tabla1.idPer = idDeff and matSistema = sistemaM) AS hombres
          FROM actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, juz.id_juzgado as idJuz, juz.juzgado as nombreJuz, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)
                                      INNER JOIN juzgado  juz USING (id_juzgado)
                                      inner join materia as mat using(id_materia)
                           ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS cv USING (id_usuario_servicio)
                          where  (fecha_registro between '".$fi."' and '".$ff."') 
          GROUP BY idDeff
          ORDER BY sistemaM;";
      return $sql;
      break;
      case'PERIODODEF': 
      $sql = "SELECT matSistema as sistemaM, nombreDef AS nombreP,tabla1.idPer as idDeff, nombreJuz, COUNT(AA.id_Actividad) AS asesoriaPorSistema,
      (SELECT COUNT(AA.id_actividad)
          FROM actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                      (select pcc.id_personal idPer, juz.id_juzgado as idJuz, juz.juzgado as nombreJuz, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)
                                      INNER JOIN juzgado  juz USING (id_juzgado)
                                      inner join materia as mat using(id_materia)
                           ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS cv USING (id_usuario_servicio)						
                      where  (fecha_registro between '".$fi."' and '".$ff."') and pcc.id_personal='".$def."' and
                          cv.sexo = 'FEMENINO' AND tabla1.idPer = idDeff and matSistema = sistemaM) AS mujeres,
          (SELECT COUNT(AA.id_actividad)
          FROM actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, juz.id_juzgado as idJuz, juz.juzgado as nombreJuz, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)
                                      INNER JOIN juzgado  juz USING (id_juzgado)
                                      inner join materia as mat using(id_materia)
                           ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS cv USING (id_usuario_servicio)						
                      where  (fecha_registro between '".$fi."' and '".$ff."') and pcc.id_personal='".$def."' and
                          cv.sexo = 'MASCULINO' AND tabla1.idPer = idDeff and matSistema = sistemaM) AS hombres
          FROM actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, juz.id_juzgado as idJuz, juz.juzgado as nombreJuz, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)
                                      INNER JOIN juzgado  juz USING (id_juzgado)
                                      inner join materia as mat using(id_materia)
                           ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS cv USING (id_usuario_servicio)
                          where  (fecha_registro between '".$fi."' and '".$ff."') and pcc.id_personal='".$def."' 
          GROUP BY idDeff
          ORDER BY sistemaM;";
      return $sql;
      break;
      case'DEFENSOR': 
      $sql = "SELECT matSistema as sistemaM, nombreDef AS nombreP,tabla1.idPer as idDeff, nombreJuz, COUNT(AA.id_Actividad) AS asesoriaPorSistema,
      (SELECT COUNT(AA.id_actividad)
          FROM actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                      (select pcc.id_personal idPer, juz.id_juzgado as idJuz, juz.juzgado as nombreJuz, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)
                                      INNER JOIN juzgado  juz USING (id_juzgado)
                                      inner join materia as mat using(id_materia)
                           ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS cv USING (id_usuario_servicio)						
                      where    pcc.id_personal='".$def."' and
                          cv.sexo = 'FEMENINO' AND tabla1.idPer = idDeff and matSistema = sistemaM) AS mujeres,
          (SELECT COUNT(AA.id_actividad)
          FROM actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, juz.id_juzgado as idJuz, juz.juzgado as nombreJuz, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)
                                      INNER JOIN juzgado  juz USING (id_juzgado)
                                      inner join materia as mat using(id_materia)
                           ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS cv USING (id_usuario_servicio)						
                      where    pcc.id_personal='".$def."' and
                          cv.sexo = 'MASCULINO' AND tabla1.idPer = idDeff and matSistema = sistemaM) AS hombres
          FROM actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, juz.id_juzgado as idJuz, juz.juzgado as nombreJuz, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)
                                      INNER JOIN juzgado  juz USING (id_juzgado)
                                      inner join materia as mat using(id_materia)
                           ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS cv USING (id_usuario_servicio)
                          where pcc.id_personal='".$def."' 
          GROUP BY idDeff
          ORDER BY sistemaM;";
      return $sql;
      break;
      case'ALL': 
      $sql = "SELECT matSistema as sistemaM, nombreDef AS nombreP,tabla1.idPer as idDeff, nombreJuz, COUNT(AA.id_Actividad) AS asesoriaPorSistema,
      (SELECT COUNT(AA.id_actividad)
          FROM actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                      (select pcc.id_personal idPer, juz.id_juzgado as idJuz, juz.juzgado as nombreJuz, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)
                                      INNER JOIN juzgado  juz USING (id_juzgado)
                                      inner join materia as mat using(id_materia)
                           ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS cv USING (id_usuario_servicio)						
                      where cv.sexo = 'FEMENINO' AND tabla1.idPer = idDeff and matSistema = sistemaM) AS mujeres,
          (SELECT COUNT(AA.id_actividad)
          FROM actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, juz.id_juzgado as idJuz, juz.juzgado as nombreJuz, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)
                                      INNER JOIN juzgado  juz USING (id_juzgado)
                                      inner join materia as mat using(id_materia)
                           ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS cv USING (id_usuario_servicio)						
                      where cv.sexo = 'MASCULINO' AND tabla1.idPer = idDeff and matSistema = sistemaM) AS hombres
          FROM actividad as act
              INNER JOIN asesoria AS AA USING (id_actividad)
              INNER JOIN  
                          (select pcc.id_personal idPer, juz.id_juzgado as idJuz, juz.juzgado as nombreJuz, per.nombre as nombreDef, mat.sistema as matSistema 
                                  from personal_campo as pcc
                                      inner join personal per using(id_personal)
                                      INNER JOIN juzgado  juz USING (id_juzgado)
                                      inner join materia as mat using(id_materia)
                           ) AS tabla1 on act.id_personal = idPer              
              INNER JOIN usuario_servicio AS cv USING (id_usuario_servicio)
          GROUP BY idDeff
          ORDER BY sistemaM;";
      return $sql;
      break;
  }
  
}
function getExpedientesByDefPeriodo($fi,$ff,$def){
}
function getExpedientesByPeriodo($fi,$ff){
}
function getExpedientesByDefCompleto($def){
}
function getExpedientesGC(){
  $lista = array();
  $sqlExpGeneral='call tablaExpGeneral();';
  $listaExpGeneral = consulta($sqlExpGeneral);
  $sqlExpMateria = 'call tablaExpMateria()';
  $listaExpMateria = consulta($sqlExpMateria);
  $sqlExpRegion = 'call tablaExpRegion()';
  $listaExpRegion = consulta($sqlExpRegion);
  $sexoBySistema =  'call tablaExpSexo()';//sexoBySistema('ALL','', '', '');
  $listaExpSexo = consulta($sexoBySistema);
  $actBySistema =  'call tablaExpActividades()';
  $listaExpAct =  consulta($actBySistema);
  $generoBySistema =  'call tablaExpGenero()';
  $listaExpGenero =  consulta($generoBySistema);
  $edadBySistema =  'call tablaExpEdad()';
  $listaExpEdad =  consulta($edadBySistema);
  $etniaBySistema =  'call tablaExpEtnia()';
  $listaExpEtnia =  consulta($etniaBySistema);
  $idiomaBySistema =  'call tablaExpIdioma()';
  $listaExpIdioma =  consulta($idiomaBySistema);


      $lista['tablaActExp'] = $listaExpAct;      
      $lista['tablaSexoExp'] = $listaExpSexo;
      $lista['tablaGeneroExp'] = $listaExpGenero;      
      $lista['tablaEdadExp']= $listaExpEdad;      
      $lista['tablaActEtnia'] = $listaExpEtnia;
      $lista['tablaIdiomaExp'] = $listaExpAct; 
      $lista['tablaGeneralExp'] = $listaExpGeneral;
      $lista['tablaMateriaExp'] =$listaExpMateria;
      return $lista;
}
function getExpedientesByDefPeriodoP($fi,$ff,$def, $sistema, $atributos){

}
function getExpedientesByPeriodoCP($fi,$ff, $sistema, $atributos){

}
function getExpedientesByDefPC($def, $sistema, $atributos){

}
function getExpedientesPC($sistema, $atributos){

}
function getExpedientesByRangoFecha($fechaI, $fechaF){
  $sql = " select * from expediente as exp inner join personal as p using(id_personal)
  inner join( SELECT * from personal_campo as pc inner join materia as m using(id_materia)
                  )as tablaPersonalCampo using(id_personal)
                  inner join (
    select * from usuario_servicio as us 
                      inner join detalle_usuario_expediente as deus using(id_usuario_servicio)
                  ) as tablaUsuario using(id_expediente)
                  inner join (
        select * from contraparte_expediente as co 
                              inner join contraparte using(id_contraparte)
                              ) as tablaContraparte using(id_expediente)
where fecha_registro between '".$fechaI."' and '".$fechaF."'  order by generoU";
  $lista= consulta($sql);
  //print_r($sql);
  return $lista;
}

function getExpedienteByNum($numExp){
      $sql = " select * from respuesta inner join preguntas using(id_pregunta) inner join expediente using(id_expediente)
       where num_expediente='".$numExp."' ";
    $lista=consulta($sql);
    return $lista;    
}
function listar_expedienteByPersonalAndMateria($id_usuario_servicio,$materia){
  
      $sql = " select * from expediente inner join personal_campo
                 using(id_personal) inner join detalle_usuario_expediente  using(id_expediente)
                 where id_materia='".$materia."' 
                 and id_usuario_servicio='".$id_usuario_servicio."'";
   // echo $sql;
         $lista=consulta($sql);
       //  print_r($lista);
         return $lista;
  }

  function listar_UsuarioServicioByExpediente($id_expediente){
  
    $sql = "   select * from detalle_usuario_expediente 
                inner join usuario_servicio using(id_usuario_servicio)
                where id_expediente='".$id_expediente."'"; 
       $lista=consulta($sql);
     //  print_r($lista);
       return $lista;
}

  function listar_x_num_expediente_($num_expediente){
   
    $sql = "select * from expediente  inner join 
                          usuario_servicio using(id_usuario_servicio)
                           where num_expediente='".$num_expediente."'";
   // echo $sql;
    $lista=consulta($sql);
  //  print_r($lista);
    return $lista;
 }

 function listar_expedientes(){
  $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal)
                                inner join materia using(id_materia)";
  $lista=consulta($sql);
  return $lista;
}
function listar_expedientes_x_materia($materia){
  $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal)
         inner join materia using(id_materia)
        where materia= '".$materia."'";
  $lista=consulta($sql);
  return $lista;
}
function listar_expedientes_x_estado($estado){
  switch($estado){
    case 1:
      $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal)
             inner join materia using(id_materia) where id_personal>0";
    break;
    case 2: 
      $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal) 
                 inner join materia using(id_materia)where id_personal<0";
    break;
    case 3: 
      $sql="SELECT e.id_expediente, e.num_expediente, m.materia, e.fecha_inicio, e.estado, p.id_personal, e.observaciones
       FROM expediente as e inner join personal_campo as pc using(id_personal) inner join personal as p using(id_personal)
       inner join materia as m  using(id_materia)";
    break;
  }
  $lista=consulta($sql);
  return $lista;
}

function listar_expedientes_EM($estado, $materia){
  switch($estado){
    case 1:
      $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal) 
      inner join materia using(id_materia)
      where id_personal>0 and materia= '".$materia."'";
    break;
    case 2: 
      $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal) 
      inner join materia using(id_materia)
      where id_personal<0 and materia= '".$materia."'";
    break;
    case 3: 
      $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal)
      inner join materia using(id_materia)
      where materia= '".$materia."'";
    break;
  }
  $lista=consulta($sql);
  return $lista;
}
function listar_expedientes_activos(){
  $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal) where id_personal>0";
  $lista=consulta($sql);
  return $lista;
}
function listar_expedientes_activos_materia($q2){
  $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal) 
  where id_personal>0 and materia= '".$materia."'";
  $lista=consulta($sql);
  return $lista;
}
function listar_expedientes_inactivos(){
  $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal) where id_personal<0";
  $lista=consulta($sql);
  return $lista;
}
function listar_expedientes_inactivos_materia($q2){
  $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal)
   where id_personal<0 and materia= '".$materia."'";
  $lista=consulta($sql);
  return $lista;
}
function updateExpediente($id_defensor, $id_expediente){
  $sql = "update expediente set id_personal='".$id_defensor."'";
  $sql.=" where id_expediente='".$id_expediente."'";
  $lista = consulta($sql);
  //echo $sql;
  return $lista;

}
function checkNoti(){
  $sql = "select count(id_expediente) as numeroExps from notificaciones";//num notis
  $nums = consulta($sql)[0]['numeroExps'];
  
  return $nums;
}

function DeleteNotificacion($id_expediente ){
  $sql = "delete from  notificaciones where id_expediente=".$id_expediente;//num notis
  $nums = consulta($sql);
 //echo $sql;
  return $nums;
}

function finalizarExpediente($datos){
  $sql="update expediente set estado='finalizado',fecha_final='".$datos['fecha_final']."', observaciones='".$datos['observaciones']."'
  where id_expediente='".$datos['id_expediente']."'";
  $lista = consulta($sql);
 // echo $sql;
  return $lista;
}

function bajaExpediente($respuesta){
    $sql="update expediente set estado='".$respuesta['estado']."', observaciones='".$respuesta['observaciones']."'
          ,fecha_final='".$respuesta['fecha_baja']."',  motivos='".$respuesta['motivos']."' where id_expediente='".$respuesta['id_expediente']."'";
          $lista = consulta($sql);
        //  echo $sql;
          return $lista;
}

function estadoEnProceso($id_expediente){
  $sql="update expediente set estado='PROCESO'
        where id_expediente='".$id_expediente."'";
        $lista = consulta($sql);
        //echo $sql;
        return $lista;
}

 /* function listar_expediente_x_defensor($idDefensor){
   
    $sql = "select exp.estado,exp.fecha_final,exp.fecha_inicio, exp.num_expediente, exp.materia,exp.id_usuario_servicio,defensor.id_juzgado   defensor.estado from expediente as exp inner join 
                          personal_campo  ad defensor using(id_personal)
                           where id_personal='".$idDefensor."'";
   // echo $sql;
    $lista=consulta($sql);
  //  print_r($lista);
    return $lista;
 } */
 function listar_expediente_x_defensor($idDefensor){
   
    $sql = "select exp.id_expediente,exp.estado,exp.nombre_delito,exp.tipo_delito,exp.observaciones,exp.fecha_final,exp.fecha_inicio, exp.num_expediente,
                defensor.id_juzgado,     defensor.estado AS estadoDefensor,defensor.id_personal,mate.materia,mate.sistema
                from expediente as exp inner join 
            personal_campo  as defensor using(id_personal)
            inner join materia as mate using(id_materia)
            
                where id_personal='".$idDefensor."'";

   // echo $sql;
    $lista=consulta($sql);
  //  print_r($lista);
    return $lista;
 }
  
  function listar_expediente_asesoria($id_expediente){
        global $conexion;
        $sql = "select * from expediente inner join compra_proveedor using(id_expediente) inner join asesoria using(id_expediente) where nombre='".$id_expediente."'";
        $consulta = consulta($sql, $conexion);
        return $consulta;
    }
    function listar_expediente_visitas($id_expediente){
        global $conexion;
        $sql = "select * from expediente inner join compra_proveedor using(id_expediente) inner join visitas using(id_expediente) where nombre='".$id_expediente."'";
        $consulta = consulta($sql, $conexion);
        return $consulta;
    }
    function listar_expediente_adudiencia($id_expediente){
        global $conexion;
        $sql = "select * from expediente inner join compra_proveedor using(id_expediente) inner join audiencia using(id_expediente) where nombre='".$id_expediente."'";
        $consulta = consulta($sql, $conexion);
        return $consulta;
    }
    
    function listar_pregunta($id_materia){
     
        $sql = "select pregunta.id_pregunta,pregunta.id_materia,pregunta.id_pregunta,pregunta.pregunta,pregunta.identificador
                    from preguntas as pregunta
                      where id_materia='".$id_materia."'";
        $consulta = consulta($sql);
        return $consulta;
    }
    
    function listar_preguntaConOpciones($id_materia,$id_expediente){
     
        /*  $sql = "select pregunta.id_pregunta,pregunta.pregunta,detalle.id_materia,detalle.id_pregunta_materia,detalle.identificador,op.opcion
                from pregunta as pregunta
                inner join pregunta_materia as detalle using(id_pregunta)
                left join opcion as op on pregunta.id_pregunta=op.id_pregunta
                where id_materia='".$id_materia."'";   */
           

        /*   $sql="select  preguntaOpcion.id_pregunta,preguntaOpcion.pregunta,preguntaOpcion.id_materia,preguntaOpcion.id_pregunta_materia,preguntaOpcion.identificador,preguntaOpcion.opcion
             from (select pregunta.id_pregunta,pregunta.pregunta,detalle.id_materia,detalle.id_pregunta_materia,detalle.identificador,op.opcion
              from pregunta as pregunta
              inner join pregunta_materia as detalle using(id_pregunta)
              left join opcion as op on pregunta.id_pregunta=op.id_pregunta
              where id_materia=".$id_materia.") as preguntaOpcion left join respuesta as res
                on preguntaOpcion.id_pregunta_materia=res.id_pregunta_materia
              where res.id_pregunta_materia IS NULL";  */

              $sql=" select pre.id_pregunta, pre.pregunta, detalle.id_materia, detalle.id_pregunta_materia, detalle.identificador, op.opcion, expRespuesta.id_respuesta, expRespuesta.respuesta  from( 
                select exp.id_expediente, exp.id_personal,res.id_respuesta,res.id_pregunta_materia,res.respuesta
                  from expediente as exp left join  respuesta as res 
                    using(id_expediente)  
                  where exp.id_expediente =".$id_expediente."
              ) as expRespuesta
                          right join pregunta_materia as detalle using(id_pregunta_materia) 
              inner join pregunta as pre using(id_pregunta) 
              left join opcion as op using(id_pregunta) 
            where  detalle.id_materia=".$id_materia; 
      //  echo $sql;
           
        $consulta = consulta($sql);
    //  print_r($consulta);
        return $consulta;
    }
    

    function alta_expediente($objetoEntidad){
      
        $sql = "INSERT INTO expediente ";
        $sql.= " SET id_personal='".$objetoEntidad['id_defensor']."', nombre_delito='".$objetoEntidad['nombre_delito']."' ,";
        $sql.= "  tipo_delito='".$objetoEntidad['grado_delito']."', num_expediente='".$objetoEntidad['num_expediente']."', ";
        $sql.= " tipo_expediente='".$objetoEntidad['tipo_expediente']."' ";
      // echo $sql;
         $lista=registro($sql);
      return $lista;
    }
  

    //Definimos la funciones sobre el objeto crear_expediente
    
    function ultimoExpedinteCreatado(){
        $sql = "SELECT MAX(id_expediente) AS id FROM expediente";
        $id=consulta($sql);
        // print_r($id);
      return $id[0]['id']; 

    }



?>
