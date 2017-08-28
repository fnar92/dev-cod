-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2016 a las 16:43:41
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
-- Estructura de tabla para la tabla `geo_posicion`
--

CREATE TABLE IF NOT EXISTS `geo_posicion` (
  `id_geo_posicion` int(11) NOT NULL,
  `longitud` decimal(18,15) NOT NULL,
  `latitud` decimal(18,15) NOT NULL,
  `temperatura` int(11) DEFAULT NULL,
  `celo` varchar(45) DEFAULT NULL,
  `cabeza_ganado_id_cabeza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `geo_posicion`
--

INSERT INTO `geo_posicion` (`id_geo_posicion`, `longitud`, `latitud`, `temperatura`, `celo`, `cabeza_ganado_id_cabeza`) VALUES
(1, '21.888688000000000', '-102.268274000000000', NULL, NULL, 1),
(2, '21.888335000000000', '-102.265712000000000', NULL, NULL, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `geo_posicion`
--
ALTER TABLE `geo_posicion`
  ADD PRIMARY KEY (`id_geo_posicion`,`cabeza_ganado_id_cabeza`), ADD KEY `fk_geo_posicion_cabeza_ganado1_idx` (`cabeza_ganado_id_cabeza`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `geo_posicion`
--
ALTER TABLE `geo_posicion`
ADD CONSTRAINT `fk_geo_posicion_cabeza_ganado1` FOREIGN KEY (`cabeza_ganado_id_cabeza`) REFERENCES `cabeza_ganado` (`id_cabeza`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
