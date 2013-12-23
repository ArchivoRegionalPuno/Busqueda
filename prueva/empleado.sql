CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL auto_increment,
  `nombres` varchar(32) NOT NULL default '',
  `departamento` varchar(40) NOT NULL default '',
  `sueldo` double default NULL,
  KEY `id` (`idempleado`)
) ENGINE=MyISAM;

INSERT INTO `empleado` (`idempleado`,`nombres`,`departamento`,`sueldo`) VALUES 
 (1,'Juan Perez','Informatica',500),
 (2,'Laura Morales','Contabilidad',550),
 (3,'Luis Gutierrez','Administracion',850),
 (4,'Pedro Solar','Informatica',500),
 (5,'David Vilchez','Contabilidad',550),
 (6,'Juan Morales','Informatica',800),
 (7,'Vicente Fernandez','Informatica',690),
 (8,'Alex Castillo','Contabilidad',800),
 (9,'Wilberto Mendoz','Administracion',800),
 (10,'Sonia Morales','Logistica',800),
 (11,'Silvia Nesta','Logistica',900),
 (12,'David liÃ±an','Logistica',500),
 (13,'Jerry Castillo','Administracion',800),
 (14,'Juan Hernandez','Administracion',900),
 (15,'Oswaldo','Administracion',500),
 (16,'Miguel Cabosmalon','Logistica',700),
 (17,'Ana Maria','Logistica',800),
 (18,'Lucy Hernandez','Logistica',500),
 (19,'Jorge Vasquez','Administracion',500),
 (20,'Yris Manrique','Contabilidad',400);

