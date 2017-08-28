-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2016 a las 20:21:16
-- Versión del servidor: 10.1.8-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `codiga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabeza_ganado`
--

CREATE TABLE `cabeza_ganado` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprador`
--

CREATE TABLE `comprador` (
  `id_comprador` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `usuario_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctrl_errores`
--

CREATE TABLE `ctrl_errores` (
  `id_errores` int(11) NOT NULL,
  `nombre_error` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctrl_reproductivo`
--

CREATE TABLE `ctrl_reproductivo` (
  `id_ctrl_reproductivo` int(11) NOT NULL,
  `cabeza_ganado_id_cabeza` int(11) NOT NULL,
  `nombre_toro` varchar(45) DEFAULT NULL,
  `fecha_secado` date DEFAULT NULL,
  `fecha_parto` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctrl_vacunas`
--

CREATE TABLE `ctrl_vacunas` (
  `id_ctrl_vacunas` int(11) NOT NULL,
  `vacunas_id_vacunas` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `observaciones` varchar(45) NOT NULL,
  `cabeza_ganado_id_cabeza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `id_destino` int(11) NOT NULL,
  `tipo_final` varchar(45) NOT NULL,
  `costo` varchar(45) DEFAULT NULL,
  `cabeza_ganado_id_cabeza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `num_factura` varchar(45) NOT NULL,
  `costo` int(11) NOT NULL,
  `comprador_id_comprador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `geo_limite`
--

CREATE TABLE `geo_limite` (
  `id_limite` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `latitud` decimal(18,15) NOT NULL,
  `longitud` decimal(18,15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `geo_posicion`
--

CREATE TABLE `geo_posicion` (
  `id_geo_posicion` int(11) NOT NULL,
  `longitud` decimal(18,15) NOT NULL,
  `latitud` decimal(18,15) NOT NULL,
  `temperatura` float DEFAULT NULL,
  `celo` varchar(45) DEFAULT NULL,
  `cabeza_ganado_id_cabeza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE `produccion` (
  `id_produccion` int(11) NOT NULL,
  `litros` int(11) NOT NULL,
  `vendida` int(11) NOT NULL,
  `comprandor` varchar(45) DEFAULT NULL,
  `cabeza_ganado_id_cabeza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` int(11) NOT NULL,
  `descripcion` varchar(90) DEFAULT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `ctrl_errores_id_errores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_usuario`
--

CREATE TABLE `tipo_de_usuario` (
  `id_tipo_de_usuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_de_usuario`
--

INSERT INTO `tipo_de_usuario` (`id_tipo_de_usuario`, `nombre`) VALUES
(1, 'Basica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido_paterno` varchar(45) DEFAULT NULL,
  `apellido_materno` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  `telefono` int(10) UNSIGNED DEFAULT NULL,
  `celular` int(10) UNSIGNED DEFAULT NULL,
  `callenumero` varchar(45) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `municipio` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `tipo_de_usuario_id_tipo_de_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE `vacunas` (
  `id_vacunas` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `usuario_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cabeza_ganado`
--
ALTER TABLE `cabeza_ganado`
  ADD PRIMARY KEY (`id_cabeza`,`usuario_id_usuario`),
  ADD KEY `fk_cabeza_ganado_usuario_idx` (`usuario_id_usuario`);

--
-- Indices de la tabla `comprador`
--
ALTER TABLE `comprador`
  ADD PRIMARY KEY (`id_comprador`,`usuario_id_usuario`),
  ADD KEY `fk_comprador_usuario1_idx` (`usuario_id_usuario`);

--
-- Indices de la tabla `ctrl_errores`
--
ALTER TABLE `ctrl_errores`
  ADD PRIMARY KEY (`id_errores`);

--
-- Indices de la tabla `ctrl_reproductivo`
--
ALTER TABLE `ctrl_reproductivo`
  ADD PRIMARY KEY (`id_ctrl_reproductivo`,`cabeza_ganado_id_cabeza`),
  ADD KEY `fk_ctrl_reproductivo_cabeza_ganado1_idx` (`cabeza_ganado_id_cabeza`);

--
-- Indices de la tabla `ctrl_vacunas`
--
ALTER TABLE `ctrl_vacunas`
  ADD PRIMARY KEY (`id_ctrl_vacunas`,`vacunas_id_vacunas`,`cabeza_ganado_id_cabeza`),
  ADD KEY `fk_ctrl_vacunas_cabeza_ganado1_idx` (`cabeza_ganado_id_cabeza`),
  ADD KEY `fk_ctrl_vacunas_vacunas1_idx` (`vacunas_id_vacunas`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`id_destino`,`cabeza_ganado_id_cabeza`),
  ADD KEY `fk_destino_cabeza_ganado1_idx` (`cabeza_ganado_id_cabeza`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`,`comprador_id_comprador`),
  ADD KEY `fk_factura_comprador1_idx` (`comprador_id_comprador`);

--
-- Indices de la tabla `geo_limite`
--
ALTER TABLE `geo_limite`
  ADD PRIMARY KEY (`id_limite`,`usuario_id_usuario`),
  ADD KEY `fk_geo_limite_usuario1_idx` (`usuario_id_usuario`);

--
-- Indices de la tabla `geo_posicion`
--
ALTER TABLE `geo_posicion`
  ADD PRIMARY KEY (`id_geo_posicion`,`cabeza_ganado_id_cabeza`),
  ADD KEY `fk_geo_posicion_cabeza_ganado1_idx` (`cabeza_ganado_id_cabeza`);

--
-- Indices de la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD PRIMARY KEY (`id_produccion`,`cabeza_ganado_id_cabeza`),
  ADD KEY `fk_produccion_cabeza_ganado1_idx` (`cabeza_ganado_id_cabeza`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`,`usuario_id_usuario`,`ctrl_errores_id_errores`),
  ADD KEY `fk_ticket_usuario1_idx` (`usuario_id_usuario`),
  ADD KEY `fk_ticket_ctrl_errores1_idx` (`ctrl_errores_id_errores`);

--
-- Indices de la tabla `tipo_de_usuario`
--
ALTER TABLE `tipo_de_usuario`
  ADD PRIMARY KEY (`id_tipo_de_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_tipo_de_usuario1_idx` (`tipo_de_usuario_id_tipo_de_usuario`);

--
-- Indices de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD PRIMARY KEY (`id_vacunas`,`usuario_id_usuario`),
  ADD KEY `fk_vacunas_usuario1_idx` (`usuario_id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cabeza_ganado`
--
ALTER TABLE `cabeza_ganado`
  MODIFY `id_cabeza` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comprador`
--
ALTER TABLE `comprador`
  MODIFY `id_comprador` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ctrl_errores`
--
ALTER TABLE `ctrl_errores`
  MODIFY `id_errores` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ctrl_reproductivo`
--
ALTER TABLE `ctrl_reproductivo`
  MODIFY `id_ctrl_reproductivo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ctrl_vacunas`
--
ALTER TABLE `ctrl_vacunas`
  MODIFY `id_ctrl_vacunas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `geo_limite`
--
ALTER TABLE `geo_limite`
  MODIFY `id_limite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `produccion`
--
ALTER TABLE `produccion`
  MODIFY `id_produccion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_de_usuario`
--
ALTER TABLE `tipo_de_usuario`
  MODIFY `id_tipo_de_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `id_vacunas` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cabeza_ganado`
--
ALTER TABLE `cabeza_ganado`
  ADD CONSTRAINT `fk_cabeza_ganado_usuario` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comprador`
--
ALTER TABLE `comprador`
  ADD CONSTRAINT `fk_comprador_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ctrl_reproductivo`
--
ALTER TABLE `ctrl_reproductivo`
  ADD CONSTRAINT `fk_ctrl_reproductivo_cabeza_ganado1` FOREIGN KEY (`cabeza_ganado_id_cabeza`) REFERENCES `cabeza_ganado` (`id_cabeza`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ctrl_vacunas`
--
ALTER TABLE `ctrl_vacunas`
  ADD CONSTRAINT `fk_ctrl_vacunas_cabeza_ganado1` FOREIGN KEY (`cabeza_ganado_id_cabeza`) REFERENCES `cabeza_ganado` (`id_cabeza`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ctrl_vacunas_vacunas1` FOREIGN KEY (`vacunas_id_vacunas`) REFERENCES `vacunas` (`id_vacunas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `destino`
--
ALTER TABLE `destino`
  ADD CONSTRAINT `fk_destino_cabeza_ganado1` FOREIGN KEY (`cabeza_ganado_id_cabeza`) REFERENCES `cabeza_ganado` (`id_cabeza`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura_comprador1` FOREIGN KEY (`comprador_id_comprador`) REFERENCES `comprador` (`id_comprador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `geo_limite`
--
ALTER TABLE `geo_limite`
  ADD CONSTRAINT `fk_geo_limite_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `geo_posicion`
--
ALTER TABLE `geo_posicion`
  ADD CONSTRAINT `fk_geo_posicion_cabeza_ganado1` FOREIGN KEY (`cabeza_ganado_id_cabeza`) REFERENCES `cabeza_ganado` (`id_cabeza`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD CONSTRAINT `fk_produccion_cabeza_ganado1` FOREIGN KEY (`cabeza_ganado_id_cabeza`) REFERENCES `cabeza_ganado` (`id_cabeza`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_ticket_ctrl_errores1` FOREIGN KEY (`ctrl_errores_id_errores`) REFERENCES `ctrl_errores` (`id_errores`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_tipo_de_usuario1` FOREIGN KEY (`tipo_de_usuario_id_tipo_de_usuario`) REFERENCES `tipo_de_usuario` (`id_tipo_de_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD CONSTRAINT `fk_vacunas_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
