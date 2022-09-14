-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2022 a las 17:01:39
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `baricharapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `session` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `item` varchar(50) NOT NULL,
  `imagen1` varchar(100) NOT NULL,
  `imagen2` varchar(100) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `id` int(11) NOT NULL,
  `sesion` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `item` varchar(50) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id`, `sesion`, `categoria`, `item`, `imagen`, `titulo`, `descripcion`, `estado`) VALUES
(13, 'menu', 'Diversion', 'planes', 'C:\\fakepath\\cafe.sql', 'titulo', 'desricpocion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pg_categorias`
--

CREATE TABLE `pg_categorias` (
  `id` int(11) NOT NULL,
  `sesion` varchar(200) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `item` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pg_categorias`
--

INSERT INTO `pg_categorias` (`id`, `sesion`, `categoria`, `item`) VALUES
(1, 'menu', 'Diversion', 'planes'),
(2, 'menu', 'Diversion', 'eventos'),
(3, 'menu', 'Diversion', 'planes'),
(4, 'menu', 'Diversion', 'eventos'),
(5, 'menu', 'Diversion', 'pride'),
(6, 'menu', 'Diversion', 'festivales'),
(7, 'menu', 'Diversion', 'pride'),
(8, 'menu', 'Diversion', 'festivales'),
(9, 'menu', 'Diversion', 'cruceros'),
(10, 'menu', 'servicios', 'concierge'),
(11, 'menu', 'servicios', 'hoteles'),
(12, 'menu', 'servicios', 'concierge'),
(13, 'menu', 'servicios', 'hoteles'),
(14, 'menu', 'servicios', 'Oasis'),
(15, 'menu', 'servicios', 'autos'),
(16, 'menu', 'servicios', 'toures'),
(17, 'menu', 'servicios', 'autos'),
(18, 'menu', 'servicios', 'wedding'),
(19, 'menu2', 'planesyservicios', 'barichara'),
(20, 'menu2', 'planesyservicios', 'planes'),
(21, 'menu2', 'planesyservicios', 'barichara'),
(22, 'menu2', 'planesyservicios', 'planes'),
(23, 'menu2', 'planesyservicios', 'promociones'),
(24, 'menu2', 'planesyservicios', 'vacaciones'),
(25, 'menu2', 'planesyservicios', 'promociones'),
(26, 'menu2', 'planesyservicios', 'vacaciones'),
(27, 'menu2', 'planesyservicios', 'lunademiel'),
(28, 'menu2', 'planesyservicios', 'tour_de_entretenimiento'),
(29, 'menu2', 'planesyservicios', 'lunademiel'),
(30, 'menu2', 'planesyservicios', 'tour_de_entretenimiento'),
(31, 'menu2', 'planesyservicios', 'bodas'),
(32, 'menu2', 'planesyservicios', 'turismo'),
(33, 'menu3', 'enterate', 'propuestas_matrimonio'),
(34, 'menu3', 'enterate', 'cheffypasteleros'),
(35, 'menu3', 'enterate', 'propuestas_matrimonio'),
(36, 'menu3', 'enterate', 'cheffypasteleros'),
(37, 'menu3', 'enterate', 'hotelesdeensueno'),
(38, 'menu3', 'enterate', 'gastronomiabodas'),
(39, 'manu3', 'enterate', 'disenadores'),
(40, 'menu3', 'enterate', 'cruceros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) DEFAULT NULL,
  `idproveedor` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `precio` int(11) NOT NULL,
  `img1` varchar(300) NOT NULL,
  `img2` varchar(300) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `nit` varchar(300) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(300) NOT NULL,
  `maxprod` int(10) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `descripcion` varchar(600) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `vigencia` date NOT NULL,
  `estado` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `pasww1` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `nit`, `telefono`, `correo`, `maxprod`, `direccion`, `descripcion`, `logo`, `vigencia`, `estado`, `usuario`, `pasww1`) VALUES
(1, 'juan', '', '', '', 0, '', '', '', '2022-10-31', 1, 'judaver', '123456789'),
(2, 'tortas ', '829001846-6', '3145563439', 'juan@gmail.com', 10, 'el socorro tecnoparque', 'descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--descripcion--', '', '2022-09-16', 0, 'judaver', '4765'),
(3, '', '', '', '', 0, '', '', '', '2022-09-30', 0, 'judaver', '123456789'),
(4, 'datos de prueba', '829001846', '1244234', 'jdvertel@sena.edu.co', 2, 'datos de prueba', 'datos de prueba', '', '2022-08-03', 0, 'judaver', '123456789'),
(5, '', '', '', '', 0, '', '', '', '2022-09-30', 0, 'judaver', '123456789'),
(6, 'prueba4', '12345', '123123', 'prueba4@HOT.COM', 2, 'prueba4', 'prueba4\nprueba4\nprueba4\nprueba4\n', 'C:\\fakepath\\baricharapp.sql', '2022-08-11', 0, 'judaver', '12345'),
(7, 'rerre', 'erer', '', '', 0, '', 'prueba despues del if', '', '2022-09-28', 0, 'judaver', '123456'),
(8, 'tortas ', '23234234', '23234', 'jdvertel@sena.edu.co', 2, 'sdrsdr', 'sdrsdrererer', '', '2022-08-19', 0, 'judaver', '12345'),
(9, 'tortas ', '23234234', '23234', 'jdvertel@sena.edu.co', 2, 'sdrsdr', 'sdrsdrererer', '', '2022-08-19', 0, 'judaver', '12345'),
(10, 'proveedor nuevo1', '123456', '142536', 'jdvertel@sena.edu.co', 2, 'calle ', 'reseña', 'C:\\fakepath\\baricharapp.sql', '2022-08-11', 0, 'judaver', '4765'),
(11, 'DFDS', '829001846-6', '3432', 'jdvertel@sena.edu.co', 4, 'el socorro tecnoparque', 'DFSDFSDFSDF', '', '2022-09-30', 0, 'judaver', '123'),
(12, 'DFDS', '829001846-6', '3432', 'jdvertel@sena.edu.co', 4, 'el socorro tecnoparque', 'DFSDFSDFSDF', '', '2022-09-25', 0, 'judaver', '123'),
(13, 'DFDS', '829001846-6', '3432', 'jdvertel@sena.edu.co', 4, 'el socorro tecnoparque', 'DFSDFSDFSDF', '', '2022-09-30', 0, 'judaver', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pg_categorias`
--
ALTER TABLE `pg_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pg_categorias`
--
ALTER TABLE `pg_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
