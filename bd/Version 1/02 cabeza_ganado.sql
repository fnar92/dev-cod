-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2016 a las 16:44:22
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `codiga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabeza_ganado`
--

CREATE TABLE IF NOT EXISTS `cabeza_ganado` (
  `id_cabeza` int(11) NOT NULL,
  `procedencia` tinyint(1) NOT NULL COMMENT 'verdad, si es comprado\nfalso, si es nacido',
  `nombre` varchar(45) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `raza` varchar(45) NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  `des_procedencia` varchar(45) DEFAULT NULL,
  `madre` varchar(45) DEFAULT NULL,
  `padre` varchar(45) DEFAULT NULL,
  `fecha_destino` date DEFAULT NULL,
  `observaciones` varchar(45) DEFAULT NULL,
  `usuario_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cabeza_ganado`
--

INSERT INTO `cabeza_ganado` (`id_cabeza`, `procedencia`, `nombre`, `fecha_nacimiento`, `sexo`, `raza`, `color`, `des_procedencia`, `madre`, `padre`, `fecha_destino`, `observaciones`, `usuario_id_usuario`) VALUES
(1, 1, 'Vaca 1', '2016-06-27', 'femenino', 'Holstein', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 1, 'Vaca 2', '2016-06-27', 'femenino', 'Holstein', NULL, NULL, NULL, NULL, NULL, NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cabeza_ganado`
--
ALTER TABLE `cabeza_ganado`
  ADD PRIMARY KEY (`id_cabeza`,`usuario_id_usuario`), ADD KEY `fk_cabeza_ganado_usuario_idx` (`usuario_id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cabeza_ganado`
--
ALTER TABLE `cabeza_ganado`
  MODIFY `id_cabeza` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cabeza_ganado`
--
ALTER TABLE `cabeza_ganado`
ADD CONSTRAINT `fk_cabeza_ganado_usuario` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
