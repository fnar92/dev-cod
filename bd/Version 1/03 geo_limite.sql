-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2016 a las 16:43:59
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
-- Estructura de tabla para la tabla `geo_limite`
--

CREATE TABLE IF NOT EXISTS `geo_limite` (
  `id_limite` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `latitud` decimal(18,15) NOT NULL,
  `longitud` decimal(18,15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `geo_limite`
--

INSERT INTO `geo_limite` (`id_limite`, `usuario_id_usuario`, `latitud`, `longitud`) VALUES
(1, 1, '21.886567000000000', '-102.270511000000000'),
(2, 1, '21.885713000000000', '-102.269261000000000'),
(3, 1, '21.884854000000000', '-102.269732000000000'),
(4, 1, '21.884775000000000', '-102.269549000000000'),
(5, 1, '21.885565000000000', '-102.265778000000000'),
(6, 1, '21.886155000000000', '-102.264560000000000'),
(7, 1, '21.887942000000000', '-102.262020000000000'),
(8, 1, '21.889229000000000', '-102.262626000000000'),
(9, 1, '21.891054000000000', '-102.266226000000000'),
(10, 1, '21.891075000000000', '-102.266661000000000'),
(11, 1, '21.891166000000000', '-102.267178000000000'),
(12, 1, '21.889832000000000', '-102.267894000000000'),
(13, 1, '21.890082000000000', '-102.269290000000000'),
(14, 1, '21.888455000000000', '-102.270534000000000'),
(15, 1, '21.888072000000000', '-102.270633000000000'),
(16, 1, '21.887494000000000', '-102.269809000000000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `geo_limite`
--
ALTER TABLE `geo_limite`
  ADD PRIMARY KEY (`id_limite`,`usuario_id_usuario`), ADD KEY `fk_geo_limite_usuario1_idx` (`usuario_id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `geo_limite`
--
ALTER TABLE `geo_limite`
  MODIFY `id_limite` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `geo_limite`
--
ALTER TABLE `geo_limite`
ADD CONSTRAINT `fk_geo_limite_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
