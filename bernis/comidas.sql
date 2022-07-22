-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2022 a las 20:38:13
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

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `email`, `telefono`, `nit`, `direccion`, `ciudad`) VALUES
(1, 'delicias bernys', 'delicias@gmail.com', '3101010123', '000000', 'label', 'sangil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `id_empresa`, `id_usuario`, `fecha`) VALUES
(31, 3, 4, '2022-07-21 21:48:55'),
(32, 1, 4, '2022-07-21 21:57:51'),
(33, 3, 4, '2022-07-21 22:09:36'),
(34, 3, 4, '2022-07-21 22:12:41'),
(35, 8, 8, '2022-07-21 22:14:15'),
(36, 8, 8, '2022-07-21 22:19:38'),
(37, 8, 8, '2022-07-21 22:23:20'),
(38, 8, 8, '2022-07-21 22:24:04'),
(39, 8, 8, '2022-07-21 22:25:18'),
(40, 8, 8, '2022-07-21 22:26:51'),
(41, 8, 8, '2022-07-21 22:28:34'),
(42, 8, 8, '2022-07-21 22:28:40'),
(43, 8, 8, '2022-07-21 22:30:07'),
(44, 8, 8, '2022-07-22 13:35:32'),
(45, 2, 2, '2022-07-22 13:36:25'),
(46, 2, 2, '2022-07-22 13:45:27'),
(47, 2, 2, '2022-07-22 13:47:22'),
(48, 2, 2, '2022-07-22 13:50:29'),
(49, 2, 2, '2022-07-22 13:54:29'),
(50, 2, 2, '2022-07-22 14:05:15'),
(51, 2, 2, '2022-07-22 14:09:02'),
(52, 2, 2, '2022-07-22 14:11:51'),
(53, 2, 2, '2022-07-22 14:11:52'),
(54, 2, 2, '2022-07-22 14:14:12'),
(55, 2, 2, '2022-07-22 14:17:23'),
(56, 2, 2, '2022-07-22 14:17:39'),
(57, 2, 2, '2022-07-22 14:31:56'),
(58, 2, 2, '2022-07-22 14:36:27'),
(59, 2, 2, '2022-07-22 14:36:32'),
(60, 2, 2, '2022-07-22 14:40:36'),
(61, 2, 2, '2022-07-22 15:07:40'),
(62, 2, 2, '2022-07-22 15:09:44'),
(63, 2, 2, '2022-07-22 15:11:08'),
(64, 2, 2, '2022-07-22 15:12:27'),
(65, 2, 2, '2022-07-22 15:12:57'),
(66, 2, 2, '2022-07-22 15:14:17'),
(67, 2, 2, '2022-07-22 15:15:02'),
(68, 2, 2, '2022-07-22 15:15:52'),
(69, 2, 2, '2022-07-22 15:15:58'),
(70, 2, 2, '2022-07-22 15:15:58'),
(71, 2, 2, '2022-07-22 18:36:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_detalle`
--

CREATE TABLE `facturas_detalle` (
  `id` int(15) NOT NULL,
  `id empresa` int(5) NOT NULL,
  `id_producto` int(5) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(37, 1, 'horneados', 'paquete empanada de carne cruda', 'empanadas grande de carne  para llevar', 12030, 1800, 'views/images/products/1653340382.png'),
(38, 1, 'Fritos', 'empanada mexicana', 'empanada mexicana clasica', 2500, 3000, 'views/images/products/1653340417.png');

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
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas_detalle`
--
ALTER TABLE `facturas_detalle`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `facturas_detalle`
--
ALTER TABLE `facturas_detalle`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
