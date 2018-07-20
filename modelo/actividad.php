<?php

include_once('../../libreria/conexion.php');
/* 
    select d.nombre as defensor, count( select actAs.id_actividad 
                                            from asesorias inner join actividad as act
                                                where actAs.id_actividad = 5
                                                ) as numAses
            from actividades left join.....
*/


function getActividadesByPeriodoCP($fi,$ff, $sistema, $atributos){
    $sql = " SELECT sistema,U.sexo,U.genero as generoU,U.edad as edadU,U.etnia as etniaU,
        U.discapacidad as discapacidadU, U.idioma as idiomaU,P.nombre as Defensor,
        U.nombre as Usuario, fecha_registro, observacion, A.id_actividad as idAse,
        A.latitud as latAse, A.longitud as longAse, Au.id_actividad as idAud,
        Au.latitud as latAud, Au.longitud as longAud, vis.id_actividad as idAct,
        vis.foto as fotoVis, act.id_actividad as idAct
        from actividad as act left join asesoria as A using(id_actividad) 
        left join audiencias as Au using(id_actividad)
        left join visitas_carcelarias as vis using(id_actividad) 
        left join personal as P using(id_personal)
        left join personal_campo as pc using(id_personal) 
        left join materia as m using(id_materia)
        left join usuario_servicio as U using(id_usuario_servicio)
        where (fecha_registro between '".$fi."' and '".$ff."')
                and m.sistema='".$sistema."' order by generoU";
    $lista= consulta($sql);
    //print_r($sql);
    return $lista;
}
function getActividadesPC($sistema, $atributos){
    $sql = " SELECT sistema,U.sexo,U.genero as generoU,U.edad as edadU,U.etnia as etniaU, 
        U.discapacidad as discapacidadU, U.idioma as idiomaU,P.nombre as Defensor,
        U.nombre as Usuario, fecha_registro, observacion, A.id_actividad as idAse,
        A.latitud as latAse, A.longitud as longAse, Au.id_actividad as idAud,
        Au.latitud as latAud, Au.longitud as longAud, vis.id_actividad as idAct,
        vis.foto as fotoVis, act.id_actividad as idAct
        from actividad as act left join asesoria as A using(id_actividad) 
        left join audiencias as Au using(id_actividad)
        left join visitas_carcelarias as vis using(id_actividad) 
        left join personal as P using(id_personal)
        left join personal_campo as pc using(id_personal) 
        left join materia as m using(id_materia)
        left join usuario_servicio as U using(id_usuario_servicio)
        where m.sistema='".$sistema."' order by generoU";
    $lista= consulta($sql);
    //print_r($sql);
    return $lista;
}
function getActividadesByDefPC($def, $sistema, $atributos){
    $sql = " SELECT sistema,U.sexo,U.genero as generoU,U.edad as edadU,U.etnia as etniaU, 
        U.discapacidad as discapacidadU, U.idioma as idiomaU,P.nombre as Defensor,
        U.nombre as Usuario, fecha_registro, observacion, A.id_actividad as idAse,
        A.latitud as latAse, A.longitud as longAse, Au.id_actividad as idAud,
        Au.latitud as latAud, Au.longitud as longAud, vis.id_actividad as idAct,
        vis.foto as fotoVis, act.id_actividad as idAct
        from actividad as act left join asesoria as A using(id_actividad) 
        left join audiencias as Au using(id_actividad)
        left join visitas_carcelarias as vis using(id_actividad) 
        left join personal as P using(id_personal)
        left join personal_campo as pc using(id_personal) 
        left join materia as m using(id_materia)
        left join usuario_servicio as U using(id_usuario_servicio)
        where pc.id_personal='".$def."' 
                and m.sistema='".$sistema."' order by generoU";
    $lista= consulta($sql);
    //print_r($sql);
    return $lista;
}
function getActividadesByDefPeriodoP($fi,$ff,$def, $sistema, $atributos){
    $sql = " SELECT pc.juzgado,sistema,U.sexo,U.genero as generoU,U.edad as edadU,U.etnia as etniaU, 
    U.discapacidad as discapacidadU, U.idioma as idiomaU,P.nombre as Defensor,P.id_personal as idDef, P.ap_paterno as apDefP, P.ap_materno as apDefM,
    U.nombre as Usuario, fecha_registro, observacion, A.id_actividad as idAse,
    A.latitud as latAse, A.longitud as longAse, Au.id_actividad as idAud,
    Au.latitud as latAud, Au.longitud as longAud, vis.id_actividad as idAct,
    vis.foto as fotoVis, act.id_actividad as idAct
    from actividad as act left join asesoria as A using(id_actividad) 
    left join audiencias as Au using(id_actividad)
    left join visitas_carcelarias as vis using(id_actividad) 
    left join personal as P using(id_personal)
    left join (select * from personal_campo inner join juzgado using(id_juzgado)) AS pc using(id_personal) 
    left join materia as m using(id_materia)
    left join usuario_servicio as U using(id_usuario_servicio)
        where (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal='".$def."' 
                and m.sistema='".$sistema."' order by generoU";
    $lista= consulta($sql);
    //print_r($sql);
    return $lista;
}
function crearDiscapacidades($jsonData){
    print_r($jsonData);
}
function actBySistema($valor, $fi, $ff, $def){
    switch($valor){
        case 'PERIODO':
                $sql = "SELECT m.sistema AS sistemaG, COUNT(act.id_actividad) AS actividadesPorSistema,
                (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            LEFT JOIN asesoria AS A USING (id_actividad)
                            LEFT JOIN audiencias AS Au USING (id_actividad)
                            LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                            LEFT JOIN personal AS P USING (id_personal)
                            LEFT JOIN personal_campo AS pc USING (id_personal)
                            LEFT JOIN materia AS m USING (id_materia)
                            LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE (fecha_registro between '".$fi."' and '".$ff."') and m.sistema = sistemaG) AS actAsesoria,
                (SELECT COUNT(Au.id_actividad)
                    FROM
                        actividad AS act
                            LEFT JOIN asesoria AS A USING (id_actividad)
                            LEFT JOIN audiencias AS Au USING (id_actividad)
                            LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                            LEFT JOIN personal AS P USING (id_personal)
                            LEFT JOIN personal_campo AS pc USING (id_personal)
                            LEFT JOIN materia AS m USING (id_materia)
                            LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between '".$fi."' and '".$ff."') and m.sistema = sistemaG) AS actAudiencia,
                (SELECT COUNT(vis.id_actividad)
                    FROM
                        actividad AS act
                            LEFT JOIN asesoria AS A USING (id_actividad)
                            LEFT JOIN audiencias AS Au USING (id_actividad)
                            LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                            LEFT JOIN personal AS P USING (id_personal)
                            LEFT JOIN personal_campo AS pc USING (id_personal)
                            LEFT JOIN materia AS m USING (id_materia)
                            LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between '".$fi."' and '".$ff."') and m.sistema = sistemaG) AS actVisita
                FROM
                actividad AS act
                    LEFT JOIN asesoria AS A USING (id_actividad)
                    LEFT JOIN audiencias AS Au USING (id_actividad)
                    LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                    LEFT JOIN personal AS P USING (id_personal)
                    LEFT JOIN personal_campo AS pc USING (id_personal)
                    LEFT JOIN materia AS m USING (id_materia)
                    LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                where (fecha_registro between '".$fi."' and '".$ff."')
            GROUP BY sistemaG;";
                return $sql;
        break; 
        case 'PERIODODEF':
                $sql = "SELECT m.sistema AS sistemaG, COUNT(act.id_actividad) AS actividadesPorSistema,
                (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            LEFT JOIN asesoria AS A USING (id_actividad)
                            LEFT JOIN audiencias AS Au USING (id_actividad)
                            LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                            LEFT JOIN personal AS P USING (id_personal)
                            LEFT JOIN personal_campo AS pc USING (id_personal)
                            LEFT JOIN materia AS m USING (id_materia)
                            LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal = '".$def."' and m.sistema = sistemaG) AS actAsesoria,
                (SELECT COUNT(Au.id_actividad)
                    FROM
                        actividad AS act
                            LEFT JOIN asesoria AS A USING (id_actividad)
                            LEFT JOIN audiencias AS Au USING (id_actividad)
                            LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                            LEFT JOIN personal AS P USING (id_personal)
                            LEFT JOIN personal_campo AS pc USING (id_personal)
                            LEFT JOIN materia AS m USING (id_materia)
                            LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal = '".$def."' and m.sistema = sistemaG) AS actAudiencia,
                (SELECT COUNT(vis.id_actividad)
                    FROM
                        actividad AS act
                            LEFT JOIN asesoria AS A USING (id_actividad)
                            LEFT JOIN audiencias AS Au USING (id_actividad)
                            LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                            LEFT JOIN personal AS P USING (id_personal)
                            LEFT JOIN personal_campo AS pc USING (id_personal)
                            LEFT JOIN materia AS m USING (id_materia)
                            LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal = '".$def."' and m.sistema = sistemaG) AS actVisita
                FROM
                actividad AS act
                    LEFT JOIN asesoria AS A USING (id_actividad)
                    LEFT JOIN audiencias AS Au USING (id_actividad)
                    LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                    LEFT JOIN personal AS P USING (id_personal)
                    LEFT JOIN personal_campo AS pc USING (id_personal)
                    LEFT JOIN materia AS m USING (id_materia)
                    LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                where (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal = '".$def."'
            GROUP BY sistemaG;";
                return $sql;
        break;
        case 'DEFENSOR':
                $sql = "SELECT m.sistema AS sistemaG, COUNT(act.id_actividad) AS actividadesPorSistema,
                (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            LEFT JOIN asesoria AS A USING (id_actividad)
                            LEFT JOIN audiencias AS Au USING (id_actividad)
                            LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                            LEFT JOIN personal AS P USING (id_personal)
                            LEFT JOIN personal_campo AS pc USING (id_personal)
                            LEFT JOIN materia AS m USING (id_materia)
                            LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE pc.id_personal = '".$def."' and m.sistema = sistemaG) AS actAsesoria,
                (SELECT COUNT(Au.id_actividad)
                    FROM
                        actividad AS act
                            LEFT JOIN asesoria AS A USING (id_actividad)
                            LEFT JOIN audiencias AS Au USING (id_actividad)
                            LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                            LEFT JOIN personal AS P USING (id_personal)
                            LEFT JOIN personal_campo AS pc USING (id_personal)
                            LEFT JOIN materia AS m USING (id_materia)
                            LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal = '".$def."' and m.sistema = sistemaG) AS actAudiencia,
                (SELECT COUNT(vis.id_actividad)
                    FROM
                        actividad AS act
                            LEFT JOIN asesoria AS A USING (id_actividad)
                            LEFT JOIN audiencias AS Au USING (id_actividad)
                            LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                            LEFT JOIN personal AS P USING (id_personal)
                            LEFT JOIN personal_campo AS pc USING (id_personal)
                            LEFT JOIN materia AS m USING (id_materia)
                            LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal = '".$def."' and m.sistema = sistemaG) AS actVisita
                FROM
                actividad AS act
                    LEFT JOIN asesoria AS A USING (id_actividad)
                    LEFT JOIN audiencias AS Au USING (id_actividad)
                    LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                    LEFT JOIN personal AS P USING (id_personal)
                    LEFT JOIN personal_campo AS pc USING (id_personal)
                    LEFT JOIN materia AS m USING (id_materia)
                    LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                where pc.id_personal = '".$def."'
            GROUP BY sistemaG;";
                return $sql;
        break;
        case 'ALL': 
                $sql = "SELECT m.sistema AS sistemaG, COUNT(act.id_actividad) AS actividadesPorSistema,
                (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            LEFT JOIN asesoria AS A USING (id_actividad)
                            LEFT JOIN audiencias AS Au USING (id_actividad)
                            LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                            LEFT JOIN personal AS P USING (id_personal)
                            LEFT JOIN personal_campo AS pc USING (id_personal)
                            LEFT JOIN materia AS m USING (id_materia)
                            LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE m.sistema = sistemaG) AS actAsesoria,
                (SELECT COUNT(Au.id_actividad)
                    FROM
                        actividad AS act
                            LEFT JOIN asesoria AS A USING (id_actividad)
                            LEFT JOIN audiencias AS Au USING (id_actividad)
                            LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                            LEFT JOIN personal AS P USING (id_personal)
                            LEFT JOIN personal_campo AS pc USING (id_personal)
                            LEFT JOIN materia AS m USING (id_materia)
                            LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE m.sistema = sistemaG) AS actAudiencia,
                (SELECT COUNT(vis.id_actividad)
                    FROM
                        actividad AS act
                            LEFT JOIN asesoria AS A USING (id_actividad)
                            LEFT JOIN audiencias AS Au USING (id_actividad)
                            LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                            LEFT JOIN personal AS P USING (id_personal)
                            LEFT JOIN personal_campo AS pc USING (id_personal)
                            LEFT JOIN materia AS m USING (id_materia)
                            LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE m.sistema = sistemaG) AS actVisita
                FROM
                actividad AS act
                    LEFT JOIN asesoria AS A USING (id_actividad)
                    LEFT JOIN audiencias AS Au USING (id_actividad)
                    LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                    LEFT JOIN personal AS P USING (id_personal)
                    LEFT JOIN personal_campo AS pc USING (id_personal)
                    LEFT JOIN materia AS m USING (id_materia)
                    LEFT JOIN usuario_servicio AS U USING (id_usuario_servicio)
            GROUP BY sistemaG;";
                return $sql;
        break;
    }
}
function sexoBySistema($valor, $fi, $ff, $def){
    switch($valor){
        case 'PERIODO':
                $sql = "SELECT m.sistema as sistemaG, COUNT(act.id_actividad) AS actividadesPorSistema,
                (SELECT COUNT(A.id_actividad) 
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)                
                                INNER JOIN 
                                            
                                    (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between '".$fi."' and '".$ff."') and pc.sistema = sistemaG AND U.sexo='MASCULINO') AS hombreAsesoria,
                (SELECT COUNT(A.id_actividad)
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)               
                                INNER JOIN (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between '".$fi."' and '".$ff."') and pc.sistema = sistemaG AND U.sexo='FEMENINO') AS mujerAsesoria,
                (SELECT COUNT(Au.id_actividad)
                        FROM
                            actividad AS act               
                                INNER JOIN audiencias AS Au USING (id_actividad)               
                                INNER JOIN(select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between '".$fi."' and '".$ff."') and pc.sistema = sistemaG AND U.sexo='MASCULINO') AS hombreAudiencia,
                (SELECT COUNT(Au.id_actividad)
                        FROM
                            actividad AS act		
                                INNER JOIN audiencias AS Au USING (id_actividad)                
                                INNER JOIN (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between '".$fi."' and '".$ff."') and pc.sistema = sistemaG AND U.sexo='FEMENINO') AS mujerAudiencia,
                (SELECT COUNT(vis.id_actividad)
                        FROM
                            actividad AS act               
                                INNER JOIN visitas_carcelarias AS vis USING (id_actividad)
                                INNER JOIN (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between '".$fi."' and '".$ff."') and pc.sistema = sistemaG AND U.sexo='MASCULINO') AS hombreVisita,
                (SELECT COUNT(vis.id_actividad)
                        FROM
                            actividad AS act                
                                INNER JOIN visitas_carcelarias AS vis USING (id_actividad)               
                                INNER JOIN (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between '".$fi."' and '".$ff."') and pc.sistema = sistemaG AND U.sexo='FEMENINO') AS mujerVisita 
                    FROM
                    actividad AS act
                        LEFT JOIN asesoria AS A USING (id_actividad)
                        LEFT JOIN audiencias AS Au USING (id_actividad)
                        LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                        LEFT JOIN personal AS P USING (id_personal)
                        LEFT JOIN 
                                    (SELECT * FROM personal_campo
                                                INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                        LEFT JOIN  materia AS m USING (id_materia)
                        LEFT JOIN  usuario_servicio AS U USING (id_usuario_servicio)
                        where  (fecha_registro between '".$fi."' and '".$ff."') 
                            GROUP BY sistemaG;";
                return $sql;
        break;
        case 'PERIODODEF':
                $sql = "SELECT m.sistema as sistemaG, COUNT(act.id_actividad) AS actividadesPorSistema,
                (SELECT COUNT(A.id_actividad) 
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)                
                                INNER JOIN 
                                            
                                    (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal = '".$def."' and pc.sistema = sistemaG AND U.sexo='MASCULINO') AS hombreAsesoria,
                (SELECT COUNT(A.id_actividad)
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)               
                                INNER JOIN (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal = '".$def."'  and pc.sistema = sistemaG AND U.sexo='FEMENINO') AS mujerAsesoria,
                (SELECT COUNT(Au.id_actividad)
                        FROM
                            actividad AS act               
                                INNER JOIN audiencias AS Au USING (id_actividad)               
                                INNER JOIN(select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal = '".$def."'  and pc.sistema = sistemaG AND U.sexo='MASCULINO') AS hombreAudiencia,
                (SELECT COUNT(Au.id_actividad)
                        FROM
                            actividad AS act		
                                INNER JOIN audiencias AS Au USING (id_actividad)                
                                INNER JOIN (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal = '".$def."'  and pc.sistema = sistemaG AND U.sexo='FEMENINO') AS mujerAudiencia,
                (SELECT COUNT(vis.id_actividad)
                        FROM
                            actividad AS act               
                                INNER JOIN visitas_carcelarias AS vis USING (id_actividad)
                                INNER JOIN (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal = '".$def."'  and pc.sistema = sistemaG AND U.sexo='MASCULINO') AS hombreVisita,
                (SELECT COUNT(vis.id_actividad)
                        FROM
                            actividad AS act                
                                INNER JOIN visitas_carcelarias AS vis USING (id_actividad)               
                                INNER JOIN (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal = '".$def."'  and pc.sistema = sistemaG AND U.sexo='FEMENINO') AS mujerVisita 
                    FROM
                    actividad AS act
                        LEFT JOIN asesoria AS A USING (id_actividad)
                        LEFT JOIN audiencias AS Au USING (id_actividad)
                        LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                        LEFT JOIN personal AS P USING (id_personal)
                        LEFT JOIN 
                                    (SELECT * FROM personal_campo
                                                INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                        LEFT JOIN  materia AS m USING (id_materia)
                        LEFT JOIN  usuario_servicio AS U USING (id_usuario_servicio)
                        where  (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal = '".$def."' 
                            GROUP BY sistemaG;";
                return $sql;
        break;
        case 'DEFENSOR':
                $sql = "SELECT m.sistema as sistemaG, COUNT(act.id_actividad) AS actividadesPorSistema,
                (SELECT COUNT(A.id_actividad) 
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)                
                                INNER JOIN 
                                            
                                    (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal = '".$def."' and pc.sistema = sistemaG AND U.sexo='MASCULINO') AS hombreAsesoria,
                (SELECT COUNT(A.id_actividad)
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)               
                                INNER JOIN (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal = '".$def."'  and pc.sistema = sistemaG AND U.sexo='FEMENINO') AS mujerAsesoria,
                (SELECT COUNT(Au.id_actividad)
                        FROM
                            actividad AS act               
                                INNER JOIN audiencias AS Au USING (id_actividad)               
                                INNER JOIN(select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal = '".$def."'  and pc.sistema = sistemaG AND U.sexo='MASCULINO') AS hombreAudiencia,
                (SELECT COUNT(Au.id_actividad)
                        FROM
                            actividad AS act		
                                INNER JOIN audiencias AS Au USING (id_actividad)                
                                INNER JOIN (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal = '".$def."'  and pc.sistema = sistemaG AND U.sexo='FEMENINO') AS mujerAudiencia,
                (SELECT COUNT(vis.id_actividad)
                        FROM
                            actividad AS act               
                                INNER JOIN visitas_carcelarias AS vis USING (id_actividad)
                                INNER JOIN (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal = '".$def."'  and pc.sistema = sistemaG AND U.sexo='MASCULINO') AS hombreVisita,
                (SELECT COUNT(vis.id_actividad)
                        FROM
                            actividad AS act                
                                INNER JOIN visitas_carcelarias AS vis USING (id_actividad)               
                                INNER JOIN (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal = '".$def."'  and pc.sistema = sistemaG AND U.sexo='FEMENINO') AS mujerVisita 
                    FROM
                    actividad AS act
                        LEFT JOIN asesoria AS A USING (id_actividad)
                        LEFT JOIN audiencias AS Au USING (id_actividad)
                        LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                        LEFT JOIN personal AS P USING (id_personal)
                        LEFT JOIN 
                                    (SELECT * FROM personal_campo
                                                INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                        LEFT JOIN  materia AS m USING (id_materia)
                        LEFT JOIN  usuario_servicio AS U USING (id_usuario_servicio)
                        where pc.id_personal = '".$def."' 
                            GROUP BY sistemaG;";
                return $sql;
        break;
        case 'ALL':
                $sql = "SELECT m.sistema as sistemaG, COUNT(act.id_actividad) AS actividadesPorSistema,
                (SELECT COUNT(A.id_actividad) 
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)                
                                INNER JOIN 
                                            
                                    (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.sistema = sistemaG AND U.sexo='MASCULINO') AS hombreAsesoria,
                (SELECT COUNT(A.id_actividad)
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)               
                                INNER JOIN (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.sistema = sistemaG AND U.sexo='FEMENINO') AS mujerAsesoria,
                (SELECT COUNT(Au.id_actividad)
                        FROM
                            actividad AS act               
                                INNER JOIN audiencias AS Au USING (id_actividad)               
                                INNER JOIN(select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.sistema = sistemaG AND U.sexo='MASCULINO') AS hombreAudiencia,
                (SELECT COUNT(Au.id_actividad)
                        FROM
                            actividad AS act		
                                INNER JOIN audiencias AS Au USING (id_actividad)                
                                INNER JOIN (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.sistema = sistemaG AND U.sexo='FEMENINO') AS mujerAudiencia,
                (SELECT COUNT(vis.id_actividad)
                        FROM
                            actividad AS act               
                                INNER JOIN visitas_carcelarias AS vis USING (id_actividad)
                                INNER JOIN (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.sistema = sistemaG AND U.sexo='MASCULINO') AS hombreVisita,
                (SELECT COUNT(vis.id_actividad)
                        FROM
                            actividad AS act                
                                INNER JOIN visitas_carcelarias AS vis USING (id_actividad)               
                                INNER JOIN (select * from personal_campo 
                                            inner join materia as m using(id_materia))AS pc USING (id_personal)                
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.sistema = sistemaG AND U.sexo='FEMENINO') AS mujerVisita 
                    FROM
                    actividad AS act
                        LEFT JOIN asesoria AS A USING (id_actividad)
                        LEFT JOIN audiencias AS Au USING (id_actividad)
                        LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                        LEFT JOIN personal AS P USING (id_personal)
                        LEFT JOIN 
                                    (SELECT * FROM personal_campo
                                                INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                        LEFT JOIN  materia AS m USING (id_materia)
                        LEFT JOIN  usuario_servicio AS U USING (id_usuario_servicio)
                            GROUP BY sistemaG;";
                return $sql;
        break;
    }
    
}
function generoBySistema($valor, $fi, $ff, $def){
    switch($valor){
        case 'PERIODO':
                $sql = "SELECT m.sistema as sistemaG, 
                (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)                
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE (fecha_registro between '".$fi."' and '".$ff."') and m.sistema = sistemaG AND U.genero='BISEXUAL') AS bisexualAse,
                (SELECT COUNT(A.id_actividad)
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)                
                                INNER JOIN personal_campo AS pc USING (id_personal)
                                INNER JOIN materia AS m USING (id_materia)
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between  '".$fi."' and '".$ff."') and m.sistema = sistemaG AND U.genero='GAY') AS gayAse,
                (SELECT COUNT(A.id_actividad)
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)                
                                INNER JOIN personal_campo AS pc USING (id_personal)
                                INNER JOIN materia AS m USING (id_materia)
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between  '".$fi."' and '".$ff."') and m.sistema = sistemaG AND U.genero='INTERSEXUAL') AS interAse,
                (SELECT COUNT(A.id_actividad)
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)                
                                INNER JOIN personal_campo AS pc USING (id_personal)
                                INNER JOIN materia AS m USING (id_materia)
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between  '".$fi."' and '".$ff."') and m.sistema = sistemaG AND U.genero='LESBICO') AS lesbicoAse,
                (SELECT COUNT(A.id_actividad)
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)                
                                INNER JOIN personal_campo AS pc USING (id_personal)
                                INNER JOIN materia AS m USING (id_materia)
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between  '".$fi."' and '".$ff."') and m.sistema = sistemaG AND U.genero='TRANSEXUAL') AS transexualAse,
                (SELECT COUNT(A.id_actividad)
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)                
                                INNER JOIN personal_campo AS pc USING (id_personal)
                                INNER JOIN materia AS m USING (id_materia)
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between  '".$fi."' and '".$ff."') and m.sistema = sistemaG AND U.genero='TRANSGENERO') AS transgeneroAse,
                (SELECT COUNT(A.id_actividad)
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)                
                                INNER JOIN personal_campo AS pc USING (id_personal)
                                INNER JOIN materia AS m USING (id_materia)
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between  '".$fi."' and '".$ff."') and m.sistema = sistemaG AND U.genero='TRAVESTI') AS travestiAse        
            FROM
            actividad AS act
                LEFT JOIN    asesoria AS A USING (id_actividad)
                LEFT JOIN    audiencias AS Au USING (id_actividad)
                LEFT JOIN    visitas_carcelarias AS vis USING (id_actividad)
                LEFT JOIN    personal AS P USING (id_personal)
                LEFT JOIN
                    (SELECT * FROM personal_campo
                            INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                LEFT JOIN    materia AS m USING (id_materia)
                LEFT JOIN    usuario_servicio AS U USING (id_usuario_servicio)
                    where  (fecha_registro between  '".$fi."' and '".$ff."')
                    GROUP BY sistemaG;";
            return $sql;
        break;
        case 'PERIODODEF':
                $sql = "SELECT m.sistema as sistemaG, 
                (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)                
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE (fecha_registro between '".$fi."' and '".$ff."') and pc.id_personal = '".$def."' and m.sistema = sistemaG AND U.genero='BISEXUAL') AS bisexualAse,
                (SELECT COUNT(A.id_actividad)
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)                
                                INNER JOIN personal_campo AS pc USING (id_personal)
                                INNER JOIN materia AS m USING (id_materia)
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between  '".$fi."' and '".$ff."') and pc.id_personal = '".$def."' and m.sistema = sistemaG AND U.genero='GAY') AS gayAse,
                (SELECT COUNT(A.id_actividad)
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)                
                                INNER JOIN personal_campo AS pc USING (id_personal)
                                INNER JOIN materia AS m USING (id_materia)
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between  '".$fi."' and '".$ff."') and pc.id_personal = '".$def."' and m.sistema = sistemaG AND U.genero='INTERSEXUAL') AS interAse,
                (SELECT COUNT(A.id_actividad)
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)                
                                INNER JOIN personal_campo AS pc USING (id_personal)
                                INNER JOIN materia AS m USING (id_materia)
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between  '".$fi."' and '".$ff."') and pc.id_personal = '".$def."' and m.sistema = sistemaG AND U.genero='LESBICO') AS lesbicoAse,
                (SELECT COUNT(A.id_actividad)
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)                
                                INNER JOIN personal_campo AS pc USING (id_personal)
                                INNER JOIN materia AS m USING (id_materia)
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between  '".$fi."' and '".$ff."') and pc.id_personal = '".$def."' and m.sistema = sistemaG AND U.genero='TRANSEXUAL') AS transexualAse,
                (SELECT COUNT(A.id_actividad)
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)                
                                INNER JOIN personal_campo AS pc USING (id_personal)
                                INNER JOIN materia AS m USING (id_materia)
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between  '".$fi."' and '".$ff."') and pc.id_personal = '".$def."' and m.sistema = sistemaG AND U.genero='TRANSGENERO') AS transgeneroAse,
                (SELECT COUNT(A.id_actividad)
                        FROM
                            actividad AS act
                                INNER JOIN asesoria AS A USING (id_actividad)                
                                INNER JOIN personal_campo AS pc USING (id_personal)
                                INNER JOIN materia AS m USING (id_materia)
                                INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro between  '".$fi."' and '".$ff."') and pc.id_personal = '".$def."' and m.sistema = sistemaG AND U.genero='TRAVESTI') AS travestiAse        
            FROM
            actividad AS act
                LEFT JOIN    asesoria AS A USING (id_actividad)
                LEFT JOIN    audiencias AS Au USING (id_actividad)
                LEFT JOIN    visitas_carcelarias AS vis USING (id_actividad)
                LEFT JOIN    personal AS P USING (id_personal)
                LEFT JOIN
                    (SELECT * FROM personal_campo
                            INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                LEFT JOIN    materia AS m USING (id_materia)
                LEFT JOIN    usuario_servicio AS U USING (id_usuario_servicio)
                    where  (fecha_registro between  '".$fi."' and '".$ff."') and pc.id_personal = '".$def."'
                    GROUP BY sistemaG;";
            return $sql;
        break;
        case 'DEFENSOR':
            $sql = "SELECT m.sistema as sistemaG, 
            (SELECT COUNT(A.id_actividad)
                FROM
                    actividad AS act
                        INNER JOIN asesoria AS A USING (id_actividad)                
                        INNER JOIN personal_campo AS pc USING (id_personal)
                        INNER JOIN materia AS m USING (id_materia)
                        INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE pc.id_personal = '".$def."' and m.sistema = sistemaG AND U.genero='BISEXUAL') AS bisexualAse,
            (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)                
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE  pc.id_personal = '".$def."' and m.sistema = sistemaG AND U.genero='GAY') AS gayAse,
            (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)                
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE pc.id_personal = '".$def."' and m.sistema = sistemaG AND U.genero='INTERSEXUAL') AS interAse,
            (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)                
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE pc.id_personal = '".$def."' and m.sistema = sistemaG AND U.genero='LESBICO') AS lesbicoAse,
            (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)                
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE pc.id_personal = '".$def."' and m.sistema = sistemaG AND U.genero='TRANSEXUAL') AS transexualAse,
            (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)                
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE  pc.id_personal = '".$def."' and m.sistema = sistemaG AND U.genero='TRANSGENERO') AS transgeneroAse,
            (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)                
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE pc.id_personal = '".$def."' and m.sistema = sistemaG AND U.genero='TRAVESTI') AS travestiAse        
        FROM
        actividad AS act
            LEFT JOIN    asesoria AS A USING (id_actividad)
            LEFT JOIN    audiencias AS Au USING (id_actividad)
            LEFT JOIN    visitas_carcelarias AS vis USING (id_actividad)
            LEFT JOIN    personal AS P USING (id_personal)
            LEFT JOIN
                (SELECT * FROM personal_campo
                        INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
            LEFT JOIN    materia AS m USING (id_materia)
            LEFT JOIN    usuario_servicio AS U USING (id_usuario_servicio)
                where  pc.id_personal = '".$def."'
                GROUP BY sistemaG;";
        return $sql;
        break;
        case 'ALL':
            $sql = "SELECT m.sistema as sistemaG, 
            (SELECT COUNT(A.id_actividad)
                FROM
                    actividad AS act
                        INNER JOIN asesoria AS A USING (id_actividad)                
                        INNER JOIN personal_campo AS pc USING (id_personal)
                        INNER JOIN materia AS m USING (id_materia)
                        INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE m.sistema = sistemaG AND U.genero='BISEXUAL') AS bisexualAse,
            (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)                
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE  m.sistema = sistemaG AND U.genero='GAY') AS gayAse,
            (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)                
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE  m.sistema = sistemaG AND U.genero='INTERSEXUAL') AS interAse,
            (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)                
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE m.sistema = sistemaG AND U.genero='LESBICO') AS lesbicoAse,
            (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)                
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE m.sistema = sistemaG AND U.genero='TRANSEXUAL') AS transexualAse,
            (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)                
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE m.sistema = sistemaG AND U.genero='TRANSGENERO') AS transgeneroAse,
            (SELECT COUNT(A.id_actividad)
                    FROM
                        actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)                
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                    WHERE m.sistema = sistemaG AND U.genero='TRAVESTI') AS travestiAse        
        FROM
        actividad AS act
            LEFT JOIN    asesoria AS A USING (id_actividad)
            LEFT JOIN    audiencias AS Au USING (id_actividad)
            LEFT JOIN    visitas_carcelarias AS vis USING (id_actividad)
            LEFT JOIN    personal AS P USING (id_personal)
            LEFT JOIN
                (SELECT * FROM personal_campo
                        INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
            LEFT JOIN    materia AS m USING (id_materia)
            LEFT JOIN    usuario_servicio AS U USING (id_usuario_servicio)
                GROUP BY sistemaG;";
        return $sql;
        break;
    }
    
}
function edadBySistema($valor, $fi, $ff, $def){
    switch($valor){
        case'PERIODO': 
                $sql = "SELECT  m.sistema AS sistemaG,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad between '18' and '24') and U.sexo='MASCULINO') AS edad18_24H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad between '18' and '24') and U.sexo='FEMENINO') AS edad18_24M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad between '25' and '29')  and U.sexo='MASCULINO') AS edad25_29H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad between '25' and '29')  and U.sexo='FEMENINO') AS edad25_29M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad between '30' and '34') and U.sexo='MASCULINO') AS edad30_34H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad between '30' and '34') and U.sexo='FEMENINO') AS edad30_34M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad between '35' and '39') and U.sexo='MASCULINO') AS edad35_39H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad between '35' and '39') and U.sexo='FEMENINO') AS edad35_39M,            
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad between '40' and '44') and U.sexo='MASCULINO') AS edad40_44H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad between '40' and '44') and U.sexo='FEMENINO') AS edad40_44M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad between '45' and '49') and U.sexo='MASCULINO') AS edad45_49H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad between '45' and '49') and U.sexo='FEMENINO') AS edad45_49M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad between '50' and '54') and U.sexo='MASCULINO') AS edad50_54H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad between '50' and '54') and U.sexo='FEMENINO') AS edad50_54M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad between '55' and '59') and U.sexo='MASCULINO') AS edad55_59H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad between '55' and '59') and U.sexo='FEMENINO') AS edad55_59M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad >= '60') and U.sexo='MASCULINO') AS edad60MasH,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') AND (m.sistema = sistemaG AND U.edad >= '60') and U.sexo='FEMENINO') AS edad60MasM
                FROM
                actividad AS act
                    LEFT JOIN asesoria AS A USING (id_actividad)
                    LEFT JOIN audiencias AS Au USING (id_actividad)
                    LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                    LEFT JOIN personal AS P USING (id_personal)
                    LEFT JOIN
                        (SELECT *
                            FROM personal_campo
                                INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                    LEFT JOIN  materia AS m USING (id_materia)
                    LEFT JOIN  usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."')
                GROUP BY sistemaG;";
                return $sql;
        break;
        case'PERIODODEF': 
                $sql = "SELECT  m.sistema AS sistemaG,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '18' and '24') and U.sexo='MASCULINO') AS edad18_24H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '18' and '24') and U.sexo='FEMENINO') AS edad18_24M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '25' and '29')  and U.sexo='MASCULINO') AS edad25_29H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '25' and '29')  and U.sexo='FEMENINO') AS edad25_29M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '30' and '34') and U.sexo='MASCULINO') AS edad30_34H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '30' and '34') and U.sexo='FEMENINO') AS edad30_34M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '35' and '39') and U.sexo='MASCULINO') AS edad35_39H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '35' and '39') and U.sexo='FEMENINO') AS edad35_39M,            
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '40' and '44') and U.sexo='MASCULINO') AS edad40_44H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '40' and '44') and U.sexo='FEMENINO') AS edad40_44M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '45' and '49') and U.sexo='MASCULINO') AS edad45_49H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '45' and '49') and U.sexo='FEMENINO') AS edad45_49M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '50' and '54') and U.sexo='MASCULINO') AS edad50_54H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '50' and '54') and U.sexo='FEMENINO') AS edad50_54M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '55' and '59') and U.sexo='MASCULINO') AS edad55_59H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '55' and '59') and U.sexo='FEMENINO') AS edad55_59M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad >= '60') and U.sexo='MASCULINO') AS edad60MasH,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad >= '60') and U.sexo='FEMENINO') AS edad60MasM
                FROM
                actividad AS act
                    LEFT JOIN asesoria AS A USING (id_actividad)
                    LEFT JOIN audiencias AS Au USING (id_actividad)
                    LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                    LEFT JOIN personal AS P USING (id_personal)
                    LEFT JOIN
                        (SELECT *
                            FROM personal_campo
                                INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                    LEFT JOIN  materia AS m USING (id_materia)
                    LEFT JOIN  usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (fecha_registro BETWEEN '".$fi."' AND '".$ff."') and pc.id_personal='".$def."'
                GROUP BY sistemaG;";
                return $sql;
        break;
        case'DEFENSOR': 
                $sql = "SELECT  m.sistema AS sistemaG,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '18' and '24') and U.sexo='MASCULINO') AS edad18_24H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '18' and '24') and U.sexo='FEMENINO') AS edad18_24M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '25' and '29')  and U.sexo='MASCULINO') AS edad25_29H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '25' and '29')  and U.sexo='FEMENINO') AS edad25_29M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '30' and '34') and U.sexo='MASCULINO') AS edad30_34H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '30' and '34') and U.sexo='FEMENINO') AS edad30_34M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '35' and '39') and U.sexo='MASCULINO') AS edad35_39H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '35' and '39') and U.sexo='FEMENINO') AS edad35_39M,            
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '40' and '44') and U.sexo='MASCULINO') AS edad40_44H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '40' and '44') and U.sexo='FEMENINO') AS edad40_44M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '45' and '49') and U.sexo='MASCULINO') AS edad45_49H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '45' and '49') and U.sexo='FEMENINO') AS edad45_49M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '50' and '54') and U.sexo='MASCULINO') AS edad50_54H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '50' and '54') and U.sexo='FEMENINO') AS edad50_54M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '55' and '59') and U.sexo='MASCULINO') AS edad55_59H,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad between '55' and '59') and U.sexo='FEMENINO') AS edad55_59M,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE  pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad >= '60') and U.sexo='MASCULINO') AS edad60MasH,
                (SELECT COUNT(A.id_actividad)
                    FROM actividad AS act
                            INNER JOIN asesoria AS A USING (id_actividad)
                            INNER JOIN personal_campo AS pc USING (id_personal)
                            INNER JOIN materia AS m USING (id_materia)
                            INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                        WHERE pc.id_personal='".$def."' AND (m.sistema = sistemaG AND U.edad >= '60') and U.sexo='FEMENINO') AS edad60MasM
                FROM
                actividad AS act
                    LEFT JOIN asesoria AS A USING (id_actividad)
                    LEFT JOIN audiencias AS Au USING (id_actividad)
                    LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
                    LEFT JOIN personal AS P USING (id_personal)
                    LEFT JOIN
                        (SELECT *
                            FROM personal_campo
                                INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
                    LEFT JOIN  materia AS m USING (id_materia)
                    LEFT JOIN  usuario_servicio AS U USING (id_usuario_servicio)
                WHERE pc.id_personal='".$def."'
                GROUP BY sistemaG;";
                return $sql;
        break;
        case'ALL': 
        $sql = "SELECT  m.sistema AS sistemaG,
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad between '18' and '24') and U.sexo='MASCULINO') AS edad18_24H,
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad between '18' and '24') and U.sexo='FEMENINO') AS edad18_24M,
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad between '25' and '29')  and U.sexo='MASCULINO') AS edad25_29H,
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad between '25' and '29')  and U.sexo='FEMENINO') AS edad25_29M,
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad between '30' and '34') and U.sexo='MASCULINO') AS edad30_34H,
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad between '30' and '34') and U.sexo='FEMENINO') AS edad30_34M,
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad between '35' and '39') and U.sexo='MASCULINO') AS edad35_39H,
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad between '35' and '39') and U.sexo='FEMENINO') AS edad35_39M,            
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad between '40' and '44') and U.sexo='MASCULINO') AS edad40_44H,
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad between '40' and '44') and U.sexo='FEMENINO') AS edad40_44M,
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad between '45' and '49') and U.sexo='MASCULINO') AS edad45_49H,
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad between '45' and '49') and U.sexo='FEMENINO') AS edad45_49M,
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad between '50' and '54') and U.sexo='MASCULINO') AS edad50_54H,
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad between '50' and '54') and U.sexo='FEMENINO') AS edad50_54M,
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad between '55' and '59') and U.sexo='MASCULINO') AS edad55_59H,
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad between '55' and '59') and U.sexo='FEMENINO') AS edad55_59M,
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad >= '60') and U.sexo='MASCULINO') AS edad60MasH,
        (SELECT COUNT(A.id_actividad)
            FROM actividad AS act
                    INNER JOIN asesoria AS A USING (id_actividad)
                    INNER JOIN personal_campo AS pc USING (id_personal)
                    INNER JOIN materia AS m USING (id_materia)
                    INNER JOIN usuario_servicio AS U USING (id_usuario_servicio)
                WHERE (m.sistema = sistemaG AND U.edad >= '60') and U.sexo='FEMENINO') AS edad60MasM
        FROM
        actividad AS act
            LEFT JOIN asesoria AS A USING (id_actividad)
            LEFT JOIN audiencias AS Au USING (id_actividad)
            LEFT JOIN visitas_carcelarias AS vis USING (id_actividad)
            LEFT JOIN personal AS P USING (id_personal)
            LEFT JOIN
                (SELECT *
                    FROM personal_campo
                        INNER JOIN juzgado USING (id_juzgado)) AS pc USING (id_personal)
            LEFT JOIN  materia AS m USING (id_materia)
            LEFT JOIN  usuario_servicio AS U USING (id_usuario_servicio)
        GROUP BY sistemaG;";
        return $sql;
        break;
    }
    
}
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
function getActividadesByPeriodo($fi,$ff){
    $actBysistema = actBySistema('PERIODO',$fi, $ff, '');
    $listaActBySistema= consulta($actBysistema);
    $sexoBySistema = sexoBySistema('PERIODO',$fi, $ff, '');
    $listaSexoBySistema = consulta($sexoBySistema);
    $generoBySistema = generoBySistema('PERIODO',$fi, $ff, '');
    $listaGeneroBySistema = consulta($generoBySistema);
    $edadBySistema = edadBySistema('PERIODO',$fi, $ff, '');
    $listaEdadBySistema =  consulta($edadBySistema);
    $etniaBySistema = etniaBySistema('PERIODO',$fi, $ff, '');
    $listaEtniaBySistema =  consulta($etniaBySistema);
    $discapacidadBySistema = discapacidadBySistema('PERIODO',$fi, $ff, '');
    $listaDiscapacidadBySistema =  consulta($discapacidadBySistema);
    $idiomaBySistema = idiomaBySistema('PERIODO',$fi, $ff, '');
    $listaIdiomaBySistema =  consulta($idiomaBySistema);
    $topDefensores = topDefensoresBySistema('PERIODO',$fi, $ff, '');
    $listaTop = consulta($topDefensores);
    $lista = array();
    //array_push($lista, $listaActBySistema,$listaSexoBySistema,$listaGeneroBySistema, $listaEdadBySistema,$listaEtniaBySistema, $listaIdiomaBySistema, $listaDiscapacidadBySistema);
    //print_r($lista);
    $lista['actBySistema'] =  $listaActBySistema;
    $lista['sexoBySistema'] =  $listaSexoBySistema;
    $lista['generoBySistema'] =  $listaGeneroBySistema;
    $lista['edadBySistema'] =  $listaEdadBySistema;
    $lista['etniaBySistema'] =  $listaEtniaBySistema;
    $lista['idiomaBySistema'] =  $listaIdiomaBySistema;
    $lista['discapacidadBySistema'] =  $listaDiscapacidadBySistema;
    $lista['topDefensoresBySystema'] = $listaTop;
    
    return $lista;
}
function getActividadesByDefPeriodo($fi,$ff,$def){
    $actBysistema = actBySistema('PERIODODEF',$fi, $ff, $def);
    $listaActBySistema= consulta($actBysistema);
    $sexoBySistema = sexoBySistema('PERIODODEF',$fi, $ff, $def);
    $listaSexoBySistema = consulta($sexoBySistema);
    $generoBySistema = generoBySistema('PERIODODEF',$fi, $ff, $def);
    $listaGeneroBySistema = consulta($generoBySistema);
    $edadBySistema = edadBySistema('PERIODODEF',$fi, $ff, $def);
    $listaEdadBySistema =  consulta($edadBySistema);
    $etniaBySistema = etniaBySistema('PERIODODEF',$fi, $ff, $def);
    $listaEtniaBySistema =  consulta($etniaBySistema);
    $discapacidadBySistema = discapacidadBySistema('PERIODODEF',$fi, $ff, $def);
    $listaDiscapacidadBySistema =  consulta($discapacidadBySistema);
    $idiomaBySistema = idiomaBySistema('PERIODODEF',$fi, $ff,$def);
    $listaIdiomaBySistema =  consulta($idiomaBySistema);
    $nombreDef = "select nombre,ap_paterno, ap_materno, sistema from personal 
                    inner join personal_campo using(id_personal)
                    inner join materia using(id_materia) where id_personal = '".$def."'";
    $listaNom = consulta($nombreDef);
    //$topDefensores = topDefensoresBySistema('PERIODODEF',$fi, $ff, $def);
    //$listaTop = consulta($topDefensores);
    $lista = array();
    //array_push($lista, $listaActBySistema,$listaSexoBySistema,$listaGeneroBySistema, $listaEdadBySistema,$listaEtniaBySistema, $listaIdiomaBySistema, $listaDiscapacidadBySistema);
    //print_r($lista);
    $lista['actBySistemaDef'] =  $listaActBySistema;
    $lista['sexoBySistemaDef'] =  $listaSexoBySistema;
    $lista['generoBySistemaDef'] =  $listaGeneroBySistema;
    $lista['edadBySistemaDef'] =  $listaEdadBySistema;
    $lista['etniaBySistemaDef'] =  $listaEtniaBySistema;
    $lista['idiomaBySistemaDef'] =  $listaIdiomaBySistema;
    $lista['discapacidadBySistemaDef'] =  $listaDiscapacidadBySistema;
    $lista['nombreDef'] = $listaNom;
    //$lista['topDefensoresBySystemaDef'] = $listaTop;
    
    return $lista;
}
function getActividadesByDefCompleto($def){
    $actBysistema = actBySistema('DEFENSOR','', '', $def);
    $listaActBySistema= consulta($actBysistema);
    $sexoBySistema = sexoBySistema('DEFENSOR','', '', $def);
    $listaSexoBySistema = consulta($sexoBySistema);
    $generoBySistema = generoBySistema('DEFENSOR','', '', $def);
    $listaGeneroBySistema = consulta($generoBySistema);
    $edadBySistema = edadBySistema('DEFENSOR','', '', $def);
    $listaEdadBySistema =  consulta($edadBySistema);
    $etniaBySistema = etniaBySistema('DEFENSOR','', '', $def);
    $listaEtniaBySistema =  consulta($etniaBySistema);
    $discapacidadBySistema = discapacidadBySistema('DEFENSOR','', '', $def);
    $listaDiscapacidadBySistema =  consulta($discapacidadBySistema);
    $idiomaBySistema = idiomaBySistema('DEFENSOR','', '', $def);
    $listaIdiomaBySistema =  consulta($idiomaBySistema);
    $nombreDef = "select nombre,ap_paterno, ap_materno, sistema from personal 
                    inner join personal_campo using(id_personal)
                    inner join materia using(id_materia) where id_personal = '".$def."'";
    $listaNom = consulta($nombreDef);
    //$topDefensores = topDefensoresBySistema('PERIODODEF',$fi, $ff, $def);
    //$listaTop = consulta($topDefensores);
    $lista = array();
    //array_push($lista, $listaActBySistema,$listaSexoBySistema,$listaGeneroBySistema, $listaEdadBySistema,$listaEtniaBySistema, $listaIdiomaBySistema, $listaDiscapacidadBySistema);
    //print_r($lista);
    $lista['actBySistemaDef'] =  $listaActBySistema;
    $lista['sexoBySistemaDef'] =  $listaSexoBySistema;
    $lista['generoBySistemaDef'] =  $listaGeneroBySistema;
    $lista['edadBySistemaDef'] =  $listaEdadBySistema;
    $lista['etniaBySistemaDef'] =  $listaEtniaBySistema;
    $lista['idiomaBySistemaDef'] =  $listaIdiomaBySistema;
    $lista['discapacidadBySistemaDef'] =  $listaDiscapacidadBySistema;
    $lista['nombreDef'] = $listaNom;
    //$lista['topDefensoresBySystemaDef'] = $listaTop;
    
    return $lista;
}
function getActividadesGC(){
    $actBysistema = actBySistema('ALL','', '', '');
    $listaActBySistema= consulta($actBysistema);
    $sexoBySistema = sexoBySistema('ALL','', '', '');
    $listaSexoBySistema = consulta($sexoBySistema);
    $generoBySistema = generoBySistema('ALL','', '', '');
    $listaGeneroBySistema = consulta($generoBySistema);
    $edadBySistema = edadBySistema('ALL','', '', '');
    $listaEdadBySistema =  consulta($edadBySistema);
    $etniaBySistema = etniaBySistema('ALL','', '', '');
    $listaEtniaBySistema =  consulta($etniaBySistema);
    $discapacidadBySistema = discapacidadBySistema('ALL','', '', '');
    $listaDiscapacidadBySistema =  consulta($discapacidadBySistema);
    $idiomaBySistema = idiomaBySistema('ALL','', '', '');
    $listaIdiomaBySistema =  consulta($idiomaBySistema);    
    $topDefensores = topDefensoresBySistema('ALL','', '', '');
    $listaTop = consulta($topDefensores);
    $lista = array();
    //array_push($lista, $listaActBySistema,$listaSexoBySistema,$listaGeneroBySistema, $listaEdadBySistema,$listaEtniaBySistema, $listaIdiomaBySistema, $listaDiscapacidadBySistema);
    //print_r($lista);
    $lista['actBySistema'] =  $listaActBySistema;
    $lista['sexoBySistema'] =  $listaSexoBySistema;
    $lista['generoBySistema'] =  $listaGeneroBySistema;
    $lista['edadBySistema'] =  $listaEdadBySistema;
    $lista['etniaBySistema'] =  $listaEtniaBySistema;
    $lista['idiomaBySistema'] =  $listaIdiomaBySistema;
    $lista['discapacidadBySistema'] =  $listaDiscapacidadBySistema;
    $lista['topDefensoresBySystema'] = $listaTop;
    
    return $lista;
}
function getActividadesCompletoBydef($def){
    $sql = " SELECT sistema,U.sexo,U.genero as generoU,U.edad as edadU,U.etnia as etniaU, 
                    U.discapacidad as discapacidadU, U.idioma as idiomaU,P.nombre as Defensor,
                    U.nombre as Usuario, fecha_registro, observacion, A.id_actividad as idAse,
                    A.latitud as latAse, A.longitud as longAse, Au.id_actividad as idAud,
                    Au.latitud as latAud, Au.longitud as longAud, vis.id_actividad as idAct,
                    vis.foto as fotoVis, act.id_actividad as idAct
            from actividad as act left join asesoria as A using(id_actividad) 
                left join audiencias as Au using(id_actividad)
                left join visitas_carcelarias as vis using(id_actividad) 
                left join personal as P using(id_personal)
                left join personal_campo as pc using(id_personal) 
                left join materia as m using(id_materia)
                left join usuario_servicio as U using(id_usuario_servicio)
                    where pc.id_personal='".$def."' order by generoU";
    $lista= consulta($sql);
    //print_r($sql);
    return $lista;
}
function getActividadesCompleto(){
    $sql = " SELECT sistema,U.sexo,U.genero as generoU,U.edad as edadU,U.etnia as etniaU, 
                    U.discapacidad as discapacidadU, U.idioma as idiomaU,P.nombre as Defensor,
                    U.nombre as Usuario, fecha_registro, observacion, A.id_actividad as idAse,
                    A.latitud as latAse, A.longitud as longAse, Au.id_actividad as idAud,
                    Au.latitud as latAud, Au.longitud as longAud, vis.id_actividad as idAct,
                    vis.foto as fotoVis, act.id_actividad as idAct
            from actividad as act left join asesoria as A using(id_actividad) 
                    left join audiencias as Au using(id_actividad)
                    left join visitas_carcelarias as vis using(id_actividad) 
                    left join personal as P using(id_personal)
                    left join personal_campo as pc using(id_personal) 
                    left join materia as m using(id_materia)
                    left join usuario_servicio as U using(id_usuario_servicio)order by generoU";
    $lista= consulta($sql);
    //print_r($sql);
    return $lista;
}

function getActividades(){
    $sql = "select act.fecha_registro as fechaR, act.observacion as observaciones,act.id_actividad as idAct,
    ase.latitud as latAse, ase.longitud as longAse,
    aud.latitud as latAud, aud.longitud as longAud,
    vis.foto as fotoVis,
    usu.nombre as Usuario
     from actividad as act 
                     left join asesoria as ase using(id_actividad)
                     left join audiencias as aud using(id_actividad)
                     left JOIN visitas_carcelarias as vis using(id_actividad)
                     inner join usuario_servicio as usu using(id_usuario_servicio)
                     order     by id_actividad;";
    $consulta = consulta($sql);
    return $consulta;
}
function getActividadesAsesorias(){
    $sql = "select act.fecha_registro as fechaR, act.observacion as observaciones,act.id_actividad as idAct,
    ase.latitud as latAse, ase.longitud as longAse,
    usu.nombre as Usuario
     from actividad as act 
                     inner join asesoria as ase using(id_actividad)                     
                     inner join usuario_servicio as usu using(id_usuario_servicio)
                     order by id_actividad;";
    $consulta = consulta($sql);
    return $consulta;
}
function getActividadesAudiencias(){
    $sql = "select act.fecha_registro as fechaR, act.observacion as observaciones,act.id_actividad as idAct,    
    aud.latitud as latAud, aud.longitud as longAud,
    usu.nombre as Usuario
     from actividad as act 
                     
                     inner join audiencias as aud using(id_actividad)
                     
                     inner join usuario_servicio as usu using(id_usuario_servicio)
                     order by id_actividad;";
    $consulta = consulta($sql);
    return $consulta;
}
function updateObservacion($obs, $id_act){
    $sql = "update actividad set observacion='".$obs."' where id_actividad='".$id_act."' ";
    $consulta = consulta($sql);
    return $consulta;
}
function getActividadesVisitas(){
        $sql = "select act.fecha_registro as fechaR, act.observacion as observaciones,
        vis.foto as fotoVis,
        usu.nombre as Usuario
        from actividad as act                     
                        inner JOIN visitas_carcelarias as vis using(id_actividad)
                        inner join usuario_servicio as usu using(id_usuario_servicio)
                        order by id_actividad;";
    $consulta = consulta($sql);
    return $consulta;
}
function listar_actividad_x_id($id){
      global $conexion;
      $sql = "select * from defensor where id='".$id."'";
      $consulta = consulta($sql, $conexion);
      return $consulta;
  }
  function getActividadesByRangoFecha($fechaI, $fechaF){
    $sql = " SELECT sistema,U.sexo,U.genero as generoU,U.edad as edadU,U.etnia as etniaU, U.discapacidad as discapacidadU, U.idioma as idiomaU,P.nombre as Defensor, U.nombre as Usuario, fecha_registro, observacion,
                    A.id_actividad as idAse, A.latitud as latAse, A.longitud as longAse,
                    Au.id_actividad as idAud, Au.latitud as latAud, Au.longitud as longAud,
                    vis.id_actividad as idAct, vis.foto as fotoVis, act.id_actividad as idAct
    from actividad as act left join asesoria as A using(id_actividad) 
        left join audiencias as Au using(id_actividad)
        left join visitas_carcelarias as vis using(id_actividad) 
        left join personal as P using(id_personal)
        left join personal_campo using(id_personal) 
        left join materia as m using(id_materia)
        left join usuario_servicio as U using(id_usuario_servicio)
    where fecha_registro between '".$fechaI."' and '".$fechaF."'  order by generoU";
    $lista= consulta($sql);
    //print_r($sql);
    return $lista;
}

function getActividadesConsulta($inicio, $final, $sys){
    $sql = " SELECT sistema,U.sexo,U.genero as generoU,U.edad as edadU,U.etnia as etniaU, U.discapacidad as discapacidadU, U.idioma as idiomaU,P.nombre as Defensor, U.nombre as Usuario, fecha_registro, observacion,
                    A.id_actividad as idAse, A.latitud as latAse, A.longitud as longAse,
                    Au.id_actividad as idAud, Au.latitud as latAud, Au.longitud as longAud,
                    vis.id_actividad as idAct, vis.foto as fotoVis, act.id_actividad as idAct
    from actividad as act left join asesoria as A using(id_actividad) 
        left join audiencias as Au using(id_actividad)
        left join visitas_carcelarias as vis using(id_actividad) 
        left join personal as P using(id_personal)
        left join personal_campo using(id_personal) 
        left join materia as m using(id_materia)
        left join usuario_servicio as U using(id_usuario_servicio)
    where (fecha_registro between '".$inicio."' and '".$final."') and m.sistema='".$sys."'";
    $lista= consulta($sql);
    //print_r($sql);
    return $lista;
}
function getActividadesByFiltroPersonal($fechaInicio, $fechaFinal,$puesto){
    $sql = "SELECT * FROM actividad inner join asesoria using(id_actividad) inner join personal using(id_personal)
    where (fecha_registro between '".$fechaI."' and '".$fechaF."') and id_cargo='".$puesto."'";
    $lista= consulta($sql);
    //print_r($sql);
    return $lista;
}
function getActividadesByFiltroNue($fechaInicio, $fechaFinal,$nue){
    $sql = "SELECT P.nombre as Defensor, U.nombre as Usuario, fecha_registro, observacion, latitud, longitud
    FROM actividad inner join asesoria as A using(id_actividad) inner join personal AS P using(id_personal) 
    inner join usuario_servicio as U using(id_usuario_servicio)  
    where (fecha_registro between '".$fechaInicio."' and '".$fechaFinal."') and nue='".$nue."'";
    $lista= consulta($sql);
    //print_r($sql);
    return $lista;
}
    //Definimos la funciones sobre el objeto crear_asesoria
    function crear_actividad($asesoria){
        
        $sql = "INSERT INTO actividad ";
        $sql.= "SET id_usuario_servicio='".$asesoria['id_usuario_servicio']."',   id_personal='".$asesoria['id_personal_campo']."',";
       // $sql.= " dia_registro='".$asesoria['dia_registro']."',   mes_registro='".$asesoria['mes_registro']."',";
        $sql.= " fecha_registro='".$asesoria['fecha_registro']."',   observacion='".$asesoria['observacion']."'";
            echo $sql;
        $lista=registro($sql);
        return $lista;

    }

 
    function ultimoActividadRegistrado(){
        $sql = "SELECT MAX(id_actividad) AS id FROM actividad";
          $id=consulta($sql);
          // print_r($id);
        return $id[0]['id']; 

    }




?>
