select *
-- `personals`.*, `activos`.*, 
-- (select gerencia from gerencias g where g.idgerencia=personals.idgerencia_personal ) as gerencia, 
-- (select subgerencia from subgerencias sg where sg.idsubgerencia=personals.idsubgerencia_personal) subgerencia, 
-- (select sede from sedes where sedes.idsede=personals.idsede_personal) sede, 
-- (select concat("Nombre: ",softwares.nombre_software,", Arquitectura: ",softwares.arquitectura,", Service Pack: ",softwares.service_pack) from softwares where softwares.id_activo_software=activos.idactivo) software, 
-- (select concat("Marca: ",hardwares.marca,", Modelo: ",hardwares.modelo,", Num. Serie: ",hardwares.num_serie,", Inventario: ",hardwares.cod_inventario) from hardwares where hardwares.id_activo_hardware=activos.idactivo) hardware 
from `personals_activos` 
left join `activos` on `personals_activos`.`activos_id` = `activos`.`idactivo` 
left join `personals` on `personals_activos`.`personals_idpersonal` = `personals`.`idpersonal` 
group by personals.idgerencia_personal

select count(idactivo) from activos where (TIMESTAMPDIFF(YEAR, activos.fecha_adquisicion , CURDATE()))>=4;
SELECT * FROM activos;

select activos_id, idgerencia_personal,
(select gerencia from gerencias g where g.idgerencia=personals.idgerencia_personal ) as gerencia,
count(activos.idactivo) total_activos,

(select distinct(activos_id) idactivo_unico,personals_activos.* from personals_activos)


from (select distinct(activos_id) idactivo_unico,personals_activos.* from personals_activos ) pa
left join `activos` on `activos_id` = `activos`.`idactivo` 
left join `personals` on pa.personals_idpersonal = `personals`.`idpersonal` 
where activos.tipo_activo=1
group by personals.idgerencia_personal



 Error Code: 1064. You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version 
 for the right syntax to use near 'select (a2.idactivo) from activos a2 where  a2.idactivo=pa.activos_id)  from (se' at line 5
 
 Error Code: 1055. Expression #4 of SELECT list is not in GROUP BY clause and contains nonaggregated 
 column 'pa.activos_id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by

