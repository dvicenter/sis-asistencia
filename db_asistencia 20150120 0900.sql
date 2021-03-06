﻿-- Script was generated by Devart dbForge Studio for MySQL, Version 6.0.128.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 20/01/2015 9:00:41
-- Server version: 5.5.8
-- Client version: 4.1

-- 
-- Disable foreign keys
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

-- 
-- Set default database
--
USE db_asistencia;

--
-- Definition for table tbl_area
--
DROP TABLE IF EXISTS tbl_area;
CREATE TABLE IF NOT EXISTS tbl_area (
  idArea INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  active CHAR(1) NOT NULL,
  PRIMARY KEY (idArea)
)
ENGINE = INNODB
AUTO_INCREMENT = 10
AVG_ROW_LENGTH = 2048
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

--
-- Definition for table tbl_instituto
--
DROP TABLE IF EXISTS tbl_instituto;
CREATE TABLE IF NOT EXISTS tbl_instituto (
  idInstituto INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  active CHAR(1) NOT NULL,
  PRIMARY KEY (idInstituto)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 4096
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

--
-- Definition for table tbl_user
--
DROP TABLE IF EXISTS tbl_user;
CREATE TABLE IF NOT EXISTS tbl_user (
  id_user INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id_user)
)
ENGINE = INNODB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 16384
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

--
-- Definition for table tbl_practicante
--
DROP TABLE IF EXISTS tbl_practicante;
CREATE TABLE IF NOT EXISTS tbl_practicante (
  idPracticante INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  fechaInicio DATE NOT NULL,
  fechaFinal DATE NOT NULL,
  idArea INT(11) NOT NULL,
  idInstituto INT(11) NOT NULL,
  active CHAR(1) NOT NULL,
  PRIMARY KEY (idPracticante),
  UNIQUE INDEX UK_tbl_practicante_idPracticante (idPracticante),
  CONSTRAINT FK_tbl_practicante_tbl_area_idArea FOREIGN KEY (idArea)
    REFERENCES tbl_area(idArea) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_tbl_practicante_tbl_instituto_idInstituto FOREIGN KEY (idInstituto)
    REFERENCES tbl_instituto(idInstituto) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 8192
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

--
-- Definition for table tbl_asistencia
--
DROP TABLE IF EXISTS tbl_asistencia;
CREATE TABLE IF NOT EXISTS tbl_asistencia (
  idAsistencia INT(11) NOT NULL AUTO_INCREMENT,
  idPracticante INT(11) NOT NULL,
  asistio SMALLINT(6) NOT NULL,
  fecha DATE NOT NULL,
  PRIMARY KEY (idAsistencia),
  CONSTRAINT FK_tbl_asistencia_tbl_practicante_idPracticante FOREIGN KEY (idPracticante)
    REFERENCES tbl_practicante(idPracticante) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 35
AVG_ROW_LENGTH = 2730
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

DELIMITER $$

--
-- Definition for procedure prc_cnd_asist_practicantes
--
DROP PROCEDURE IF EXISTS prc_cnd_asist_practicantes$$
CREATE DEFINER = 'root'@'localhost'
PROCEDURE prc_cnd_asist_practicantes(IN fecha DATE)
BEGIN
  DROP TABLE IF EXISTS tabla1;
DROP TABLE IF EXISTS tabla2;
  create temporary table tabla1
  SELECT a.idAsistencia, a.idPracticante, b.nombre,b.apellido, a.fecha, a.asistio FROM tbl_asistencia a
  INNER JOIN tbl_practicante b ON a.idPracticante = b.idPracticante
  WHERE a.fecha = fecha;
 
  create temporary table tabla2
  SELECT b.idAsistencia, a.idPracticante,a.nombre,a.apellido,a.fechaInicio, a.fechaFinal, b.fecha,b.asistio, a.idArea,a.idInstituto FROM tbl_practicante a LEFT JOIN
  tabla1 b ON a.idPracticante = b.idPracticante;

SELECT a.idAsistencia, a.idPracticante, a.nombre, a.apellido, a.fechaInicio,a.fechaFinal, b.nombre AS area, c.nombre AS instituto, a.fecha, a.asistio  FROM tabla2 a INNER JOIN tbl_area b ON a.idArea = b.idArea
  INNER JOIN tbl_instituto c ON a.idInstituto = c.idInstituto;
END
$$

--
-- Definition for procedure prc_cnd_pract
--
DROP PROCEDURE IF EXISTS prc_cnd_pract$$
CREATE DEFINER = 'root'@'localhost'
PROCEDURE prc_cnd_pract(IN pNombre VARCHAR(255))
BEGIN
  SELECT
  tbl_practicante.idPracticante,
  tbl_practicante.nombre,
  tbl_practicante.apellido
FROM tbl_practicante
 WHERE tbl_practicante.active = '1'
  AND tbl_practicante.nombre LIKE CONCAT('%', pNombre ,'%');
END
$$

--
-- Definition for procedure prc_cnd_rpt_asist
--
DROP PROCEDURE IF EXISTS prc_cnd_rpt_asist$$
CREATE DEFINER = 'root'@'localhost'
PROCEDURE prc_cnd_rpt_asist(IN idpract INT)
BEGIN
  SELECT
  tbl_practicante.nombre,
  tbl_practicante.apellido,
  tbl_asistencia.asistio,
  tbl_asistencia.fecha,
  tbl_instituto.nombre,
  tbl_area.nombre,
  tbl_practicante.idPracticante,
  tbl_practicante.fechaInicio,
  tbl_practicante.fechaFinal
FROM tbl_asistencia
  INNER JOIN tbl_practicante
    ON tbl_asistencia.idPracticante = tbl_practicante.idPracticante
  INNER JOIN tbl_area
    ON tbl_practicante.idArea = tbl_area.idArea
  INNER JOIN tbl_instituto
    ON tbl_practicante.idInstituto = tbl_instituto.idInstituto

  WHERE tbl_asistencia.idPracticante = idpract and
        tbl_practicante.active = '1'
  ORDER BY tbl_asistencia.idPracticante DESC,
            tbl_asistencia.fecha ASC;
END
$$

DELIMITER ;

--
-- Definition for view vw_practicantes
--
DROP VIEW IF EXISTS vw_practicantes CASCADE;
CREATE OR REPLACE 
	DEFINER = 'root'@'localhost'
VIEW vw_practicantes
AS
	select `tbl_practicante`.`idPracticante` AS `idPracticante`,`tbl_practicante`.`nombre` AS `nombre`,`tbl_practicante`.`apellido` AS `apellido`,`tbl_practicante`.`fechaInicio` AS `fechaInicio`,`tbl_practicante`.`fechaFinal` AS `fechaFinal`,`tbl_area`.`nombre` AS `area`,`tbl_instituto`.`nombre` AS `instituto` from ((`tbl_practicante` join `tbl_instituto` on((`tbl_practicante`.`idInstituto` = `tbl_instituto`.`idInstituto`))) join `tbl_area` on((`tbl_practicante`.`idArea` = `tbl_area`.`idArea`))) where (`tbl_practicante`.`active` = '1');

-- 
-- Dumping data for table tbl_area
--
INSERT INTO tbl_area VALUES
(1, 'DPTO. NUTRICION', '1'),
(2, 'CS. HUAURA -PSICOLOGIA', '1'),
(3, 'UNIDAD ESTADISTICA E INFORMATICA', '1'),
(4, 'SERVICIOS GENERALES', '1'),
(5, 'UNIDAD DE ECONOMIA', '1'),
(7, 'DPTO. ODONTOLOGIA', '1'),
(8, 'APOYO ADMINISTRATIVO MR. HUALMAY', '1'),
(9, 'aa', '0');

-- 
-- Dumping data for table tbl_instituto
--
INSERT INTO tbl_instituto VALUES
(1, 'UNJFSC', '1'),
(2, 'UAP', '1'),
(3, 'SENATI', '1'),
(4, 'aaa', '0');

-- 
-- Dumping data for table tbl_user
--
INSERT INTO tbl_user VALUES
(1, 'admin', '123');

-- 
-- Dumping data for table tbl_practicante
--
INSERT INTO tbl_practicante VALUES
(1, 'JANIA KATHERINE', 'PARIA VELASQUEZ', '2014-01-01', '2014-03-31', 1, 1, '1'),
(2, 'LISETTE GISELA', 'RAVENA NICHO', '2014-01-01', '2014-03-31', 1, 1, '1');

-- 
-- Dumping data for table tbl_asistencia
--
INSERT INTO tbl_asistencia VALUES
(1, 1, 1, '2015-01-11'),
(2, 1, 0, '2015-01-10'),
(4, 1, 0, '2015-01-08'),
(5, 2, 0, '0000-00-00'),
(33, 1, 0, '2015-01-20'),
(34, 2, 1, '2015-01-20');

-- 
-- Enable foreign keys
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;