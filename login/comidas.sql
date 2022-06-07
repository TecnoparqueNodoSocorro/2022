-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2022 a las 20:41:13
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
-- Base de datos: `comidas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `idemp` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `idemp`, `nombre`, `descripcion`) VALUES
(8, 1, 'Fritos', 'productos fritados para venta '),
(9, 1, 'horneados ', 'productos para el horno '),
(10, 1, 'Crudos', 'productos para venta crudos'),
(11, 1, 'Jugos naturales', 'jugos preparados '),
(12, 1, 'Gaseosas', 'productosd postobon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `idemp` int(11) NOT NULL,
  `clasificacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `costo` int(10) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `idemp`, `clasificacion`, `nombre`, `descripcion`, `costo`, `precio`, `imagen`) VALUES
(35, 1, 'Fritos', 'empanada de carne ', 'empanada grande de carne ', 12000, 2000, 'views/images/products/1653340298.png'),
(36, 1, 'horneados', 'empanada horneada pollo', 'empanada horneada', 1100, 1800, 'views/images/products/1653340326.png'),
(37, 1, 'Crudos', 'paquete empanada de carne cruda', 'empanadas grande de carne  para llevar', 12000, 18000, 'views/images/products/1653340382.png'),
(38, 1, 'Fritos', 'empanada mexicana', 'empanada mexicana clasica', 2500, 3000, 'views/images/products/1653340417.png'),
(39, 1, 'Gaseosas', 'gaseosa personal ', 'gaseopsa personal desechable ', 2200, 2500, 'views/images/products/1653340481.jpg'),
(41, 1, 'Fritos', 'empanada de frutas', 'empoanada hawayaa', 3000, 3500, 'views/images/products/1653341611.png'),
(43, 1, 'Fritos', 'nueva imagen', 'localhost', 500, 1500, 'views/images/products/1654627188.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `idemp` int(11) NOT NULL,
  `nombre` int(50) NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(30) NOT NULL,
  `idemp` int(30) NOT NULL,
  `user` int(30) NOT NULL,
  `idproducto` int(30) NOT NULL,
  `id_categoria` int(5) NOT NULL,
  `cantidad` int(30) NOT NULL,
  `total` int(30) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idfactura` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `idemp`, `user`, `idproducto`, `id_categoria`, `cantidad`, `total`, `fecha`, `idfactura`) VALUES
(1, 1, 1, 35, 0, 2, 4000, '2022-05-24 19:17:14', 1),
(2, 1, 1, 36, 0, 2, 3600, '2022-05-24 19:17:31', 2),
(3, 1, 1, 40, 0, 2, 7000, '2022-05-24 19:17:45', 3),
(4, 1, 1, 41, 0, 2, 7000, '2022-05-24 19:17:58', 4),
(5, 1, 1, 35, 0, 4, 8000, '2022-05-24 19:18:08', 5),
(6, 1, 1, 35, 0, 5, 10000, '2022-05-24 19:18:17', 6),
(7, 1, 1, 39, 0, 5, 12500, '2022-05-24 19:21:43', 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
