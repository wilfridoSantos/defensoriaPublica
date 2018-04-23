SELECT * FROM bddefensoria.personal;

-- insert
-- insert admin
insert into personal values(1, 1, 1, 'Jesus Gerardo', 'Herrera', 'Perez', 'CURP1234ABCD3214567', 'conocida', '123', '21', 'centro', 'oaxaca de juarez', '123','321', 'Masculino', '9511234567', 'admin@mail.com', 'C:\xampp\htdocs\defensoriaPublica\foto.jpg');

-- insert coordinador
insert into personal values(2, 2, 2, 'Cesar', 'Aspra', 'Lopez', 'CURP1234ABCD3214567', 'conocida', '123', '21', 'centro', 'oaxaca de juarez', '123','321', 'Masculino', '9511234567', 'admin@mail.com', 'C:\xampp\htdocs\defensoriaPublica\foto.jpg');

-- insert coordinador defensor
insert into personal values(3, 3, 3, 'user', 'ap paterno', 'ap materno', 'CURP1234ABCD3214567', 'conocida', '123', '21', 'centro', 'oaxaca de juarez', '123','321', 'Masculino', '9511234567', 'admin@mail.com', 'C:\xampp\htdocs\defensoriaPublica\foto.jpg');

-- insert estadistica
insert into personal values(4, 4, 4, 'Griselda', 'Mendez', 'Cortes', 'CURP1234ABCD3214567', 'conocida', '123', '21', 'centro', 'oaxaca de juarez', '123','321', 'Masculino', '9511234567', 'admin@mail.com', 'C:\xampp\htdocs\defensoriaPublica\foto.jpg');

-- insert defensor
insert into personal values(5, 5, 5, 'NombreDefensor', 'ap paterno', 'ap materno', 'CURP1234ABCD3214567', 'conocida', '123', '21', 'centro', 'oaxaca de juarez', '123','321', 'Masculino', '9511234567', 'admin@mail.com', 'C:\xampp\htdocs\defensoriaPublica\foto.jpg');

-- update

-- delete
delete from personal where id_personal =1;