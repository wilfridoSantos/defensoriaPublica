SELECT * FROM bddefensoria.estudios;

-- CREATE
-- ADMINISTRADOR
insert into estudios values(1, 'licenciatura', '2014-08-10', 'UABJO', '2004-2008' ,'descripcion de perfil de egreso', 'c3dul4Pr0f4io4L','Lic. en derecho', 'C:/xampp/htdocs/defensoriaPublica/ejemplo.jpg');
-- COORDINADOR
insert into estudios values(2, 'licenciatura', '2012-08-10', 'universidad panamericana', '2004-2008' ,'descripcion de perfil de egreso', 'c3dul4Pr0f4io4L','Lic. en derecho', 'C:/xampp/htdocs/defensoriaPublica/ejemplo.jpg');
-- COORDINADOR-DEFENSO
insert into estudios values(3, 'licenciatura', '2013-08-10', 'UNAM', '2010-2013' ,'descripcion de perfil de egreso', 'c3dul4Pr0f4io4L','Lic. en derecho', 'C:/xampp/htdocs/defensoriaPublica/ejemplo.jpg');
-- ESTADISTICA
insert into estudios values(4, 'licenciatura', '2015-08-10', 'UNAM', '2011-2015' ,'descripcion de perfil de egreso', 'c3dul4Pr0f4io4L','Lic. en derecho', 'C:/xampp/htdocs/defensoriaPublica/ejemplo.jpg');
-- DEFENSOR
insert into estudios values(5, 'licenciatura', '2016-08-10', 'UABJO', '2012-2016' ,'descripcion de perfil de egreso', 'c3dul4Pr0f4io4L','Lic. en derecho', 'C:/xampp/htdocs/defensoriaPublica/ejemplo.jpg');


-- UPDATE
update estudios set instituto = 'universidad panamericana' where id_estudios=1;

-- REMOVE
delete from estudios where id_estudios=1;