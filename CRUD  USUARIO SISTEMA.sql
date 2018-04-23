SELECT * FROM bddefensoria.usuario_sistema;

-- INSERT 
insert into usuario_sistema values(1, 1, 'jesus', '$2y$10$YIfFTXProgzBKDVBkRfFLOCkyuhaCWIN/KBbgZypFF7Lu8rw6gTXS', 1); -- herrera
insert into usuario_sistema values(2, 2, 'cesar', '$2y$10$/D4xHEpDwaS6UiWxiYyxreKYwCbhj.ZM9my/wekiKiphwpFMTgrL.', 1); -- aspra
insert into usuario_sistema values(3, 3, 'coordinadorDefensor', '$2y$10$kwjcb0zOhm/upATPBMUtIOfYlJ2dCNnC.oAXKJs.cb6yimSSxzt1e', 1); -- 1234
insert into usuario_sistema values(4, 4, 'gris', '$2y$10$hiv8GPwNnBstUo3r5/AmSePqZNGB2SUIoV55Z8qx6ZJisQ4xooXna', 1); -- cortes
insert into usuario_sistema values(5, 5, 'defensorPrueba', '$2y$10$p0DlEOO/N.L/ZHrnOMpF5.imCUOvoJWCJclG/ZQ2g1Ck0mso8MCj2', 1); -- 1234

-- UPDATE
update usuario_sistema set password = '$2y$10$kwjcb0zOhm/upATPBMUtIOfYlJ2dCNnC.oAXKJs.cb6yimSSxzt1e' where id_usuario_sistema = 3;
-- DELETE