-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2022 a las 00:00:18
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
  `nit` varchar(300) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `rep_legal` varchar(300) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(300) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `descripcion` varchar(600) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `clasificacion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `pg_categorias`
--
ALTER TABLE `pg_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
