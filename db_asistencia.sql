-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-01-2015 a las 10:18:25
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_asistencia`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_cnd_asist_practicantes`(IN fecha DATE)
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
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_area`
--

CREATE TABLE IF NOT EXISTS `tbl_area` (
`idArea` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `active` char(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=2340 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `tbl_area`
--

INSERT INTO `tbl_area` (`idArea`, `nombre`, `active`) VALUES
(1, 'DPTO. NUTRICION', '1'),
(2, 'CS. HUAURA -PSICOLOGIA', '1'),
(3, 'UNIDAD ESTADISTICA E INFORMATICA', '1'),
(4, 'SERVICIOS GENERALES', '1'),
(5, 'UNIDAD DE ECONOMIA', '1'),
(7, 'DPTO. ODONTOLOGIA', '1'),
(8, 'APOYO ADMINISTRATIVO MR. HUALMAY', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_asistencia`
--

CREATE TABLE IF NOT EXISTS `tbl_asistencia` (
`idAsistencia` int(11) NOT NULL,
  `idPracticante` int(11) NOT NULL,
  `asistio` smallint(6) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=3276 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `tbl_asistencia`
--

INSERT INTO `tbl_asistencia` (`idAsistencia`, `idPracticante`, `asistio`, `fecha`) VALUES
(1, 1, 1, '2015-01-11'),
(2, 1, 0, '2015-01-10'),
(4, 1, 0, '2015-01-08'),
(5, 2, 0, '0000-00-00'),
(33, 1, 0, '2015-01-20'),
(34, 2, 0, '2015-01-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_instituto`
--

CREATE TABLE IF NOT EXISTS `tbl_instituto` (
`idInstituto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `active` varchar(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_instituto`
--

INSERT INTO `tbl_instituto` (`idInstituto`, `nombre`, `active`) VALUES
(1, 'UNJFSC', '1'),
(2, 'UAP', '1'),
(3, 'SENATI', '1'),
(4, 'aaa b', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_practicante`
--

CREATE TABLE IF NOT EXISTS `tbl_practicante` (
`idPracticante` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFinal` date NOT NULL,
  `idArea` int(11) NOT NULL,
  `idInstituto` int(11) NOT NULL,
  `active` char(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_practicante`
--

INSERT INTO `tbl_practicante` (`idPracticante`, `nombre`, `apellido`, `fechaInicio`, `fechaFinal`, `idArea`, `idInstituto`, `active`) VALUES
(1, 'JANIA KATHERINE', 'PARIA VELASQUEZ', '2014-01-01', '2014-03-31', 1, 1, '1'),
(2, 'LISETTE GISELA', 'RAVENA NICHO', '2014-01-01', '2014-03-31', 1, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=16384 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_area`
--
ALTER TABLE `tbl_area`
 ADD PRIMARY KEY (`idArea`);

--
-- Indices de la tabla `tbl_asistencia`
--
ALTER TABLE `tbl_asistencia`
 ADD PRIMARY KEY (`idAsistencia`), ADD KEY `FK_tbl_asistencia_tbl_practicante_idPracticante` (`idPracticante`);

--
-- Indices de la tabla `tbl_instituto`
--
ALTER TABLE `tbl_instituto`
 ADD PRIMARY KEY (`idInstituto`);

--
-- Indices de la tabla `tbl_practicante`
--
ALTER TABLE `tbl_practicante`
 ADD PRIMARY KEY (`idPracticante`), ADD UNIQUE KEY `UK_tbl_practicante_idPracticante` (`idPracticante`), ADD KEY `FK_tbl_practicante_tbl_area_idArea` (`idArea`), ADD KEY `FK_tbl_practicante_tbl_instituto_idInstituto` (`idInstituto`);

--
-- Indices de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_area`
--
ALTER TABLE `tbl_area`
MODIFY `idArea` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `tbl_asistencia`
--
ALTER TABLE `tbl_asistencia`
MODIFY `idAsistencia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `tbl_instituto`
--
ALTER TABLE `tbl_instituto`
MODIFY `idInstituto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_practicante`
--
ALTER TABLE `tbl_practicante`
MODIFY `idPracticante` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_asistencia`
--
ALTER TABLE `tbl_asistencia`
ADD CONSTRAINT `FK_tbl_asistencia_tbl_practicante_idPracticante` FOREIGN KEY (`idPracticante`) REFERENCES `tbl_practicante` (`idPracticante`);

--
-- Filtros para la tabla `tbl_practicante`
--
ALTER TABLE `tbl_practicante`
ADD CONSTRAINT `FK_tbl_practicante_tbl_area_idArea` FOREIGN KEY (`idArea`) REFERENCES `tbl_area` (`idArea`),
ADD CONSTRAINT `FK_tbl_practicante_tbl_instituto_idInstituto` FOREIGN KEY (`idInstituto`) REFERENCES `tbl_instituto` (`idInstituto`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
