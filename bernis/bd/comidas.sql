-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2022 a las 23:23:42
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
(222, 2, 2, '2022-07-30 20:39:29'),
(223, 2, 2, '2022-07-30 20:39:38'),
(224, 2, 2, '2022-07-30 20:39:47'),
(225, 2, 2, '2022-08-01 14:38:22'),
(226, 2, 2, '2022-08-01 14:59:43'),
(227, 2, 2, '2022-08-01 14:59:55'),
(228, 2, 2, '2022-08-01 14:59:55'),
(229, 2, 2, '2022-08-01 21:06:14'),
(230, 2, 2, '2022-08-02 13:58:15'),
(231, 2, 2, '2022-08-02 13:58:52'),
(232, 2, 2, '2022-08-02 13:59:44'),
(233, 2, 2, '2022-08-02 14:07:41'),
(234, 2, 2, '2022-08-02 14:07:47'),
(235, 2, 2, '2022-08-02 14:08:59'),
(236, 2, 2, '2022-08-02 14:09:22'),
(237, 2, 2, '2022-08-02 14:10:53'),
(238, 2, 2, '2022-08-02 14:11:13'),
(239, 2, 2, '2022-08-02 14:11:13'),
(240, 2, 2, '2022-08-02 14:11:13'),
(241, 2, 2, '2022-08-02 14:11:13'),
(242, 2, 2, '2022-08-02 14:11:22'),
(243, 2, 2, '2022-08-02 14:11:22'),
(244, 2, 2, '2022-08-02 14:11:24'),
(245, 2, 2, '2022-08-02 14:11:25'),
(246, 2, 2, '2022-08-02 14:15:17'),
(247, 2, 2, '2022-08-02 14:17:29'),
(248, 2, 2, '2022-08-02 14:20:20'),
(249, 2, 2, '2022-08-02 14:25:34'),
(250, 2, 2, '2022-08-02 14:26:59'),
(251, 2, 2, '2022-08-02 14:27:25'),
(252, 2, 2, '2022-08-02 14:27:56'),
(253, 2, 2, '2022-08-02 14:30:01'),
(254, 2, 2, '2022-08-02 14:32:51'),
(255, 2, 2, '2022-08-02 14:34:31'),
(256, 2, 2, '2022-08-02 14:34:55'),
(257, 2, 2, '2022-08-02 14:53:24'),
(258, 2, 2, '2022-08-02 14:55:07'),
(259, 2, 2, '2022-08-02 19:04:51'),
(260, 2, 2, '2022-08-02 19:05:14'),
(261, 2, 2, '2022-08-02 19:11:08'),
(262, 2, 2, '2022-08-02 19:30:53'),
(263, 2, 2, '2022-08-02 19:57:18'),
(264, 2, 2, '2022-08-02 19:59:08'),
(265, 2, 2, '2022-08-02 19:59:15'),
(266, 2, 2, '2022-08-02 20:02:06'),
(267, 2, 2, '2022-08-02 20:04:55'),
(268, 2, 2, '2022-08-02 20:04:57'),
(269, 2, 2, '2022-08-02 20:06:20'),
(270, 2, 2, '2022-08-02 20:07:50'),
(271, 2, 2, '2022-08-02 20:09:22'),
(272, 2, 2, '2022-08-04 14:12:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_detalle`
--

CREATE TABLE `facturas_detalle` (
  `id` int(15) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_empresa` int(5) NOT NULL,
  `categoria` varchar(11) NOT NULL,
  `id_producto` int(5) NOT NULL,
  `nombrep` varchar(100) NOT NULL,
  `precioP` int(11) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facturas_detalle`
--

INSERT INTO `facturas_detalle` (`id`, `id_factura`, `id_empresa`, `categoria`, `id_producto`, `nombrep`, `precioP`, `cantidad`, `fecha`) VALUES
(74, 222, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-07-30 20:39:29'),
(75, 222, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-07-30 20:39:29'),
(76, 223, 2, 'Fritos', 50, ' empanada david', 4000, 1, '2022-07-30 20:39:38'),
(77, 223, 2, 'Crudos', 51, ' empanada cruda', 8000, 1, '2022-07-30 20:39:38'),
(78, 224, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 2, '2022-07-30 20:39:47'),
(79, 224, 2, 'Fritos', 38, ' empanada mexicana', 3000, 2, '2022-07-30 20:39:47'),
(80, 224, 2, 'Fritos', 50, ' empanada david', 4000, 2, '2022-07-30 20:39:47'),
(81, 224, 2, 'Crudos', 51, ' empanada cruda', 8000, 1, '2022-07-30 20:39:47'),
(82, 225, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 5, '2022-08-01 14:38:22'),
(83, 225, 2, 'Fritos', 38, ' empanada mexicana', 3000, 6, '2022-08-01 14:38:22'),
(84, 225, 2, 'Fritos', 50, ' empanada david', 4000, 3, '2022-08-01 14:38:22'),
(85, 225, 2, 'Crudos', 51, ' empanada cruda', 8000, 2, '2022-08-01 14:38:22'),
(86, 226, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-01 14:59:43'),
(87, 226, 2, 'Fritos', 50, ' empanada david', 4000, 1, '2022-08-01 14:59:43'),
(88, 227, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-01 14:59:55'),
(89, 227, 2, 'Fritos', 50, ' empanada david', 4000, 1, '2022-08-01 14:59:55'),
(90, 228, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-01 14:59:55'),
(91, 228, 2, 'Fritos', 50, ' empanada david', 4000, 1, '2022-08-01 14:59:55'),
(92, 229, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-01 21:06:14'),
(93, 229, 2, 'Jugos', 53, ' Café expreso ', 3500, 1, '2022-08-01 21:06:14'),
(94, 229, 2, 'Jugos', 54, ' Jugo de mora ', 4000, 2, '2022-08-01 21:06:14'),
(95, 229, 2, 'Gaseosas', 56, ' gaseosa personal ', 3800, 1, '2022-08-01 21:06:14'),
(96, 229, 2, 'Jugos', 55, ' Jugo de mango', 4000, 1, '2022-08-01 21:06:14'),
(97, 229, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-01 21:06:14'),
(98, 229, 2, 'Fritos', 50, ' empanada david', 4000, 1, '2022-08-01 21:06:14'),
(99, 229, 2, 'horneados', 52, ' empanada horneada', 5500, 1, '2022-08-01 21:06:14'),
(100, 230, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-02 13:58:15'),
(101, 230, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 13:58:15'),
(102, 231, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-02 13:58:53'),
(103, 231, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 13:58:53'),
(104, 232, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-02 13:59:44'),
(105, 232, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 13:59:44'),
(106, 233, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-02 14:07:41'),
(107, 233, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 14:07:41'),
(108, 234, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-02 14:07:48'),
(109, 234, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 14:07:48'),
(110, 235, 2, 'Fritos', 50, ' empanada david', 4000, 1, '2022-08-02 14:08:59'),
(111, 236, 2, 'Jugos', 53, ' Café expreso ', 3500, 2, '2022-08-02 14:09:22'),
(112, 237, 2, 'horneados', 52, ' empanada horneada', 5500, 1, '2022-08-02 14:10:53'),
(113, 237, 2, 'Jugos', 53, ' Café expreso ', 3500, 1, '2022-08-02 14:10:53'),
(114, 247, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-02 14:17:29'),
(115, 247, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 14:17:29'),
(116, 248, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-02 14:20:20'),
(117, 248, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 14:20:20'),
(118, 249, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 14:25:34'),
(119, 250, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-02 14:26:59'),
(120, 250, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 14:26:59'),
(121, 251, 2, 'Fritos', 50, ' empanada david', 4000, 1, '2022-08-02 14:27:25'),
(122, 251, 2, 'Crudos', 51, ' empanada cruda', 8000, 1, '2022-08-02 14:27:25'),
(123, 252, 2, 'Fritos', 50, ' empanada david', 4000, 1, '2022-08-02 14:27:56'),
(124, 252, 2, 'Crudos', 51, ' empanada cruda', 8000, 1, '2022-08-02 14:27:56'),
(125, 253, 2, 'horneados', 52, ' empanada horneada', 5500, 1, '2022-08-02 14:30:01'),
(126, 253, 2, 'Jugos', 54, ' Jugo de mora ', 4000, 2, '2022-08-02 14:30:01'),
(127, 254, 2, 'Fritos', 50, ' empanada david', 4000, 1, '2022-08-02 14:32:51'),
(128, 254, 2, 'Crudos', 51, ' empanada cruda', 8000, 1, '2022-08-02 14:32:51'),
(129, 255, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-02 14:34:31'),
(130, 256, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-02 14:34:55'),
(131, 256, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 14:34:55'),
(132, 257, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-02 14:53:24'),
(133, 257, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 14:53:24'),
(134, 257, 2, 'Fritos', 50, ' empanada david', 4000, 1, '2022-08-02 14:53:24'),
(135, 258, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-02 14:55:07'),
(136, 258, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 14:55:07'),
(137, 258, 2, 'Fritos', 50, ' empanada david', 4000, 1, '2022-08-02 14:55:07'),
(138, 259, 2, 'Fritos', 50, ' empanada david', 4000, 1, '2022-08-02 19:04:51'),
(139, 259, 2, 'Crudos', 51, ' empanada cruda', 8000, 1, '2022-08-02 19:04:51'),
(140, 260, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-02 19:05:14'),
(141, 260, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 19:05:14'),
(142, 261, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-02 19:11:08'),
(143, 261, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 19:11:08'),
(144, 262, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 19:30:53'),
(145, 262, 2, 'Fritos', 50, ' empanada david', 4000, 1, '2022-08-02 19:30:53'),
(146, 266, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 20:02:07'),
(147, 266, 2, 'Fritos', 50, ' empanada david', 4000, 1, '2022-08-02 20:02:07'),
(148, 267, 2, 'Fritos', 38, ' empanada mexicana', 3000, 2, '2022-08-02 20:04:55'),
(149, 267, 2, 'Crudos', 51, ' empanada cruda', 8000, 1, '2022-08-02 20:04:55'),
(150, 268, 2, 'Fritos', 38, ' empanada mexicana', 3000, 2, '2022-08-02 20:04:57'),
(151, 268, 2, 'Crudos', 51, ' empanada cruda', 8000, 1, '2022-08-02 20:04:57'),
(152, 269, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-02 20:06:20'),
(153, 269, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 20:06:20'),
(154, 269, 2, 'Fritos', 50, ' empanada david', 4000, 1, '2022-08-02 20:06:20'),
(155, 269, 2, 'Crudos', 51, ' empanada cruda', 8000, 1, '2022-08-02 20:06:20'),
(156, 270, 2, 'Fritos', 38, ' empanada mexicana', 3000, 1, '2022-08-02 20:07:50'),
(157, 270, 2, 'Fritos', 50, ' empanada david', 4000, 1, '2022-08-02 20:07:50'),
(158, 271, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-02 20:09:22'),
(159, 271, 2, 'Crudos', 51, ' empanada cruda', 8000, 1, '2022-08-02 20:09:22'),
(160, 272, 2, 'horneados', 37, ' paquete empanada de carne cruda', 1800, 1, '2022-08-04 14:12:52'),
(161, 272, 2, 'Fritos', 50, ' empanada david', 4000, 1, '2022-08-04 14:12:52'),
(162, 272, 2, 'Crudos', 51, ' empanada cruda', 8000, 1, '2022-08-04 14:12:52');

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
(38, 1, 'Fritos', 'empanada mexicana', 'empanada mexicana clasica', 2500, 3000, 'views/images/products/1653340417.png'),
(50, 1, 'Fritos', 'empanada david', 'empanada de prueba', 3500, 4000, 'views/images/products/1659213531.jpg'),
(51, 1, 'Crudos', 'empanada cruda', 'empabnada crubda prueba', 6000, 8000, 'views/images/products/1659213560.jpg'),
(52, 1, 'horneados', 'empanada horneada', 'delicionsa emanad ahorneada rellena de carne ', 5000, 5500, 'views/images/products/1659386840.jpg'),
(53, 1, 'Jugos', 'Café expreso ', 'Delicioso café natural acompañado de 2 tajadas de pan ', 3000, 3500, 'views/images/products/1659387211.jpg'),
(54, 1, 'Jugos', 'Jugo de mora ', 'Jugo con mora natural ', 3500, 4000, 'views/images/products/1659387316.jpg'),
(55, 1, 'Jugos', 'Jugo de mango', 'Jugo con mango  natural ', 3800, 4000, 'views/images/products/1659387370.jpg'),
(56, 1, 'Gaseosas', 'gaseosa personal ', 'Productos portobon', 2500, 3800, 'views/images/products/1659387707.jpg');

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

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `idemp`, `nombre`, `usuario`, `contrasena`) VALUES
(1, 1, 1, 'juan', 'juan');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT de la tabla `facturas_detalle`
--
ALTER TABLE `facturas_detalle`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
