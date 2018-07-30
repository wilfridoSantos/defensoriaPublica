IF(tipo='COMPLETO') THEN
	if(tipo2='COMPLETO') THEN
		select tablaPer.id_personal as id, tablaPer.nombre as defensor,tablaPer.juzgado as juzgado, tablaPer.materia,tablaPer.sistema as sis, count(distinct exp.id_expediente) as totExp,
							(select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema  
												from personal_campo as pc 
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
									where id= tablaPer.id_personal and sis = tablaPer.sistema 
                     
                     ) as usuarios,
							(select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema 
														from personal_campo as pc 
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
									where id= tablaPer.id_personal and sis = tablaPer.sistema and us.sexo='MASCULINO'
                           ) as hombres,
                          (select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema, ju.juzgado  
															from personal_campo as pc
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
								where id= tablaPer.id_personal and sis = tablaPer.sistema and us.sexo='FEMENINO') as mujeres
	from expediente as exp
        inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema , ju.juzgado  from personal_campo as pc 
								inner join personal p using(id_personal)
								inner join juzgado as ju using(id_juzgado)
								inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
		group by tablaPer.id_personal, tablaPer.sistema;
	END IF;	
    if(tipo2='MATERIA') THEN
		select tablaPer.id_personal as id, tablaPer.nombre as defensor,tablaPer.juzgado as juzgado, tablaPer.materia,tablaPer.sistema as sis, count(distinct exp.id_expediente) as totExp,
							(select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema  
												from personal_campo as pc 
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
									where id= tablaPer.id_personal and sis = tablaPer.sistema 
                     
                     ) as usuarios,
							(select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema 
														from personal_campo as pc 
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
									where id= tablaPer.id_personal and sis = tablaPer.sistema and us.sexo='MASCULINO'
                           ) as hombres,
                          (select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema, ju.juzgado  
															from personal_campo as pc
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
								where id= tablaPer.id_personal and sis = tablaPer.sistema and us.sexo='FEMENINO') as mujeres
	from expediente as exp
        inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema , ju.juzgado  from personal_campo as pc 
								inner join personal p using(id_personal)
								inner join juzgado as ju using(id_juzgado)
								inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
                                WHERE tablaPer.materia=mat
		group by tablaPer.id_personal, tablaPer.sistema;
	END IF;	
    if(tipo2='SISTEMATERIA') THEN
		select tablaPer.id_personal as id, tablaPer.nombre as defensor,tablaPer.juzgado as juzgado, tablaPer.materia,tablaPer.sistema as sis, count(distinct exp.id_expediente) as totExp,
							(select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema  
												from personal_campo as pc 
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
									where id= tablaPer.id_personal and sis = tablaPer.sistema 
                     
                     ) as usuarios,
							(select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema 
														from personal_campo as pc 
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
									where id= tablaPer.id_personal and sis = tablaPer.sistema and us.sexo='MASCULINO'
                           ) as hombres,
                          (select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema, ju.juzgado  
															from personal_campo as pc
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
								where id= tablaPer.id_personal and sis = tablaPer.sistema and us.sexo='FEMENINO') as mujeres
	from expediente as exp
        inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema , ju.juzgado  from personal_campo as pc 
								inner join personal p using(id_personal)
								inner join juzgado as ju using(id_juzgado)
								inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
			WHERE tablaPer.materia=mat and tablaPer.sistema=sis
		group by tablaPer.id_personal, tablaPer.sistema;
	END IF;
    if(tipo2='REGION') THEN
		select tablaPer.id_personal as id, tablaPer.nombre as defensor,tablaPer.juzgado as juzgado, tablaPer.materia,tablaPer.sistema as sis, count(distinct exp.id_expediente) as totExp,
							(select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema  
												from personal_campo as pc 
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
									where id= tablaPer.id_personal and sis = tablaPer.sistema 
                     
                     ) as usuarios,
							(select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema 
														from personal_campo as pc 
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
									where id= tablaPer.id_personal and sis = tablaPer.sistema and us.sexo='MASCULINO'
                           ) as hombres,
                          (select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema, ju.juzgado  
															from personal_campo as pc
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
								where id= tablaPer.id_personal and sis = tablaPer.sistema and us.sexo='FEMENINO') as mujeres
	from expediente as exp
        inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema , ju.juzgado, ju.region  from personal_campo as pc 
								inner join personal p using(id_personal)
								inner join juzgado as ju using(id_juzgado)
								inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
                                WHERE tablaPer.region=reg
		group by tablaPer.id_personal, tablaPer.sistema;
	END IF;	
    if(tipo2='SISTEMAREG') THEN
		select tablaPer.id_personal as id, tablaPer.nombre as defensor,tablaPer.juzgado as juzgado, tablaPer.materia,tablaPer.sistema as sis, count(distinct exp.id_expediente) as totExp,
							(select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, ju.region,p.nombre, ma.materia, ma.sistema  
												from personal_campo as pc 
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
									where id= tablaPer.id_personal and sis = tablaPer.sistema 
                     
                     ) as usuarios,
							(select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema 
														from personal_campo as pc 
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
									where id= tablaPer.id_personal and sis = tablaPer.sistema and us.sexo='MASCULINO'
                           ) as hombres,
                          (select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema, ju.juzgado  
															from personal_campo as pc
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
								where id= tablaPer.id_personal and sis = tablaPer.sistema and us.sexo='FEMENINO') as mujeres
	from expediente as exp
        inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema , ju.juzgado, ju.region  from personal_campo as pc 
								inner join personal p using(id_personal)
								inner join juzgado as ju using(id_juzgado)
								inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
			WHERE tablaPer.region=reg and tablaPer.sistema=sis
		group by tablaPer.id_personal, tablaPer.sistema;
	END IF;
    if(tipo2='AMBAS') THEN
		select tablaPer.id_personal as id, tablaPer.nombre as defensor,tablaPer.juzgado as juzgado, tablaPer.materia,tablaPer.sistema as sis, count(distinct exp.id_expediente) as totExp,
							(select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema  
												from personal_campo as pc 
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
									where id= tablaPer.id_personal and sis = tablaPer.sistema 
                     
                     ) as usuarios,
							(select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema 
														from personal_campo as pc 
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
									where id= tablaPer.id_personal and sis = tablaPer.sistema and us.sexo='MASCULINO'
                           ) as hombres,
                          (select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema, ju.juzgado  
															from personal_campo as pc
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
								where id= tablaPer.id_personal and sis = tablaPer.sistema and us.sexo='FEMENINO') as mujeres
	from expediente as exp
        inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema , ju.juzgado, ju.region  from personal_campo as pc 
								inner join personal p using(id_personal)
								inner join juzgado as ju using(id_juzgado)
								inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
                                WHERE tablaPer.region=reg and tablaPer.materia=mat
		group by tablaPer.id_personal, tablaPer.sistema;
	END IF;	
    if(tipo2='SISTEMAMBAS') THEN
		select tablaPer.id_personal as id, tablaPer.nombre as defensor,tablaPer.juzgado as juzgado, tablaPer.materia,tablaPer.sistema as sis, count(distinct exp.id_expediente) as totExp,
							(select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, ju.region,p.nombre, ma.materia, ma.sistema  
												from personal_campo as pc 
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
									where id= tablaPer.id_personal and sis = tablaPer.sistema 
                     
                     ) as usuarios,
							(select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema 
														from personal_campo as pc 
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
									where id= tablaPer.id_personal and sis = tablaPer.sistema and us.sexo='MASCULINO'
                           ) as hombres,
                          (select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema, ju.juzgado  
															from personal_campo as pc
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
								where id= tablaPer.id_personal and sis = tablaPer.sistema and us.sexo='FEMENINO') as mujeres
	from expediente as exp
        inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema , ju.juzgado, ju.region  from personal_campo as pc 
								inner join personal p using(id_personal)
								inner join juzgado as ju using(id_juzgado)
								inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
			WHERE tablaPer.region=reg and tablaPer.sistema=sis and tablaPer.materia=mat
		group by tablaPer.id_personal, tablaPer.sistema;
	END IF;
    if(tipo2='SISTEMANIN') THEN
		select tablaPer.id_personal as id, tablaPer.nombre as defensor,tablaPer.juzgado as juzgado, tablaPer.materia,tablaPer.sistema as sis, count(distinct exp.id_expediente) as totExp,
							(select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, ju.region,p.nombre, ma.materia, ma.sistema  
												from personal_campo as pc 
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
									where id= tablaPer.id_personal and sis = tablaPer.sistema 
                     
                     ) as usuarios,
							(select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema 
														from personal_campo as pc 
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
									where id= tablaPer.id_personal and sis = tablaPer.sistema and us.sexo='MASCULINO'
                           ) as hombres,
                          (select count(de.id_usuario_servicio)
								from expediente as exp
									inner join detalle_usuario_expediente de using(id_expediente)										
									inner join usuario_servicio as us using(id_usuario_servicio)
									inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema, ju.juzgado  
															from personal_campo as pc
															inner join personal p using(id_personal)
															inner join juzgado as ju using(id_juzgado)
															inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
								where id= tablaPer.id_personal and sis = tablaPer.sistema and us.sexo='FEMENINO') as mujeres
	from expediente as exp
        inner join (select pc.id_personal, pc.id_materia,ju.id_juzgado, p.nombre, ma.materia, ma.sistema , ju.juzgado, ju.region  from personal_campo as pc 
								inner join personal p using(id_personal)
								inner join juzgado as ju using(id_juzgado)
								inner join materia as ma using(id_materia)) as tablaPer using(id_personal)
			WHERE tablaPer.sistema=sis
		group by tablaPer.id_personal, tablaPer.sistema;
	END IF;
END IF;

