-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2018 a las 23:28:18
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `licitacion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`id`, `nombre`, `fecha`, `licitacion_id`) VALUES
(15, 'Contrato 2 con licita 4', '2018-10-20', 21),
(17, 'Contrato 2 con licita 5', '2018-10-20', 16),
(18, 'Contrato 3 con licita 5', '2018-10-20', 22),
(20, 'Contrato 2 con licitacion 6', '2018-10-20', 16),
(21, 'Contrato 3 con licitacion 6', '2018-10-20', 23),
(22, 'Contrato 4 con licitacion 6', '2018-10-20', 23),
(23, 'Contrato 5 con licita 6', '2018-10-20', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `adjunto` varchar(100) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `iva` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `contrato_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `nombre`, `fecha`, `adjunto`, `precio`, `iva`, `total`, `contrato_id`) VALUES
(6, 'Factura 6', '2018-10-20', '', 200, 21, 158, NULL),
(8, 'Factu', '2018-10-20', 'Prueba.pdf', 200, 21, 158, NULL),
(9, 'Factura 16', '2018-10-20', 'Prueba.pdf', 200, 21, 158, NULL),
(14, 'Factura 25', '2018-10-20', 'Prueba.pdf', 55, 21, 43.45, NULL),
(15, 'Facturicion 14', '2018-10-20', NULL, 200, 21, 158, 23),
(17, 'Factura 9', '2018-10-20', '', 100, 21, 79, NULL),
(24, 'Factura 3', '2018-10-20', 'sample.jpg', 200, 21, 158, NULL),
(26, 'Factura 4', '2018-10-20', 'sample.jpg', 600000, 21, 474000, 22),
(27, 'Factura 5', '2018-10-20', NULL, 200000, 21, 158000, 23),
(29, 'Factura!!', '2018-10-20', 'sample.jpg', 500, 21, 395, 22),
(30, 'Factura', '2018-10-20', NULL, 322343, 21, 254651, 21),
(31, 'Otra factura', '2018-10-20', 'sample.jpg', 222, 21, 175.38, NULL),
(32, 'Factura 15', '2018-10-20', '', 1200000, 21, 948000, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licitacion`
--

CREATE TABLE `licitacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `publicada` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `licitacion`
--

INSERT INTO `licitacion` (`id`, `nombre`, `fecha`, `publicada`) VALUES
(16, 'Licitacion con contrato', '2018-10-11', 'y'),
(18, 'Licitacion sin contrato', '2018-10-19', 'y'),
(19, 'Licitacion distinta', '2018-10-19', 'y'),
(20, 'Licitacion 3', '2018-10-20', 'n'),
(21, 'Licitacion 4', '2018-10-20', 'y'),
(22, 'Licitacion 5', '2018-10-20', 'y'),
(23, 'Licitacion 6', '2018-10-20', 'y'),
(25, 'Licita 8', '2018-10-20', 'n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`) VALUES
(2, 'administrador', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `licitacion_id` (`licitacion_id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contrato_id` (`contrato_id`);

--
-- Indices de la tabla `licitacion`
--
ALTER TABLE `licitacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `licitacion`
--
ALTER TABLE `licitacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`licitacion_id`) REFERENCES `licitacion` (`id`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`contrato_id`) REFERENCES `contrato` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
