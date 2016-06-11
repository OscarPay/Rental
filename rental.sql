-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2016 a las 06:29:19
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `rental`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `car`
--

CREATE TABLE IF NOT EXISTS `car` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `transmision` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `placas` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `poliza` varchar(255) NOT NULL,
  `num_serie` varchar(255) NOT NULL,
  `num_pasajeros` varchar(255) NOT NULL,
  `precio` float NOT NULL,
  `descripcion` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1464823092),
('m160602_041006_create_person', 1464843133),
('m160610_124209_create_car', 1465598544);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `person`
--

CREATE TABLE IF NOT EXISTS `person` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `celular` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `num_licencia` varchar(255) DEFAULT NULL,
  `num_cuenta` varchar(255) DEFAULT NULL,
  `banco` varchar(255) DEFAULT NULL,
  `cuenta` varchar(255) DEFAULT NULL,
  `cod_seguridad` varchar(255) DEFAULT NULL,
  `vencimiento` varchar(255) DEFAULT NULL,
  `licencia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `person`
--

INSERT INTO `person` (`id`, `nombre`, `apellido`, `password`, `celular`, `email`, `tipo`, `num_licencia`, `num_cuenta`, `banco`, `cuenta`, `cod_seguridad`, `vencimiento`, `licencia`) VALUES
(1, 'Admin', 'Admin', 'admin', 9343434, 'admin@hotmail.com', 'ADMINISTRADOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Cliente', 'Cliente', 'cliente', 9353535, 'cliente@hotmail.com', 'CLIENTE', '123456789', '', '', '', '', '', ''),
(5, 'Oscar', 'Perez', 'oscar', 1232323, 'oscar@hotmail.com', 'VENDEDOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Henry', 'Rodriguez', 'rodriguez', 9232323, 'rodriguez@hotmail.com', 'VENDEDOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Didier', 'Sanchez', 'sanchez', 9101010, 'didier@hotmail.com', 'CLIENTE', 'asdfasdf', 'asdfas', 'asdfadsf', 'asdfasdf', 'asdfasdf', 'asdfasd', 'asdfasdf'),
(11, 'Vendedor', 'vendedor', 'vendedor', 9101010, 'vendedor@hotmail.com', 'VENDEDOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `car`
--
ALTER TABLE `car`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
 ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `person`
--
ALTER TABLE `person`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `car`
--
ALTER TABLE `car`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `person`
--
ALTER TABLE `person`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
