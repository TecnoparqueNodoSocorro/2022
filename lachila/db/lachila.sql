-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2022 a las 15:52:18
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
-- Base de datos: `lachila`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envasado`
--

CREATE TABLE `envasado` (
  `id` int(11) NOT NULL,
  `id_lote` int(11) NOT NULL,
  `id_envase` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_envasado` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `envasado`
--

INSERT INTO `envasado` (`id`, `id_lote`, `id_envase`, `id_usuario`, `cantidad`, `fecha_envasado`) VALUES
(24, 46, 1, 2, 26, '2022-09-10'),
(25, 46, 3, 2, 25, '2022-09-09'),
(26, 46, 3, 2, 10, '2022-09-09'),
(27, 46, 4, 2, 10, '2022-09-09'),
(28, 46, 5, 2, 1, '2022-09-09'),
(29, 44, 1, 2, 1, '2022-09-09'),
(30, 44, 1, 2, 2, '2022-09-09'),
(31, 44, 2, 2, 3, '2022-09-09'),
(32, 44, 3, 2, 4, '2022-09-09'),
(33, 44, 4, 2, 1, '2022-09-09'),
(34, 44, 4, 2, 5, '2022-09-09'),
(35, 44, 5, 2, 1, '2022-09-09'),
(36, 44, 5, 2, 10, '2022-09-09'),
(37, 59, 1, 2, 10, '2022-09-12'),
(38, 59, 4, 2, 50, '2022-09-12'),
(39, 64, 2, 2, 10, '2022-09-12'),
(40, 64, 4, 2, 10, '2022-09-12'),
(41, 45, 3, 2, 10, '2022-09-12'),
(42, 58, 2, 2, 20, '2022-09-12'),
(43, 45, 4, 2, 20, '2022-09-12'),
(44, 94, 4, 2, 20, '2022-09-13'),
(45, 94, 5, 2, 10, '2022-09-13'),
(46, 94, 1, 2, 5, '2022-09-13'),
(47, 94, 4, 2, 1, '2022-09-13'),
(48, 91, 1, 2, 10, '2022-09-13'),
(49, 91, 4, 2, 20, '2022-09-13'),
(84, 96, 3, 2, 25, '2022-09-14'),
(85, 96, 4, 2, 20, '2022-09-16'),
(86, 96, 5, 2, 1, '2022-09-16'),
(87, 96, 5, 2, 1, '2022-09-16'),
(88, 101, 4, 2, 20, '2022-09-16'),
(89, 101, 5, 2, 20, '2022-09-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envases`
--

CREATE TABLE `envases` (
  `id` int(11) NOT NULL,
  `material` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `capacidad` int(11) NOT NULL,
  `unidad_medida` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `envases`
--

INSERT INTO `envases` (`id`, `material`, `capacidad`, `unidad_medida`) VALUES
(1, 'vidrio', 50, ' ml'),
(2, 'vidrio', 250, ' ml'),
(3, 'vidrio', 477, ' ml'),
(4, 'vidrio', 500, ' ml'),
(5, 'vidrio', 1000, ' ml');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

CREATE TABLE `lotes` (
  `id` int(11) NOT NULL,
  `codigo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_materia` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `peso_inicial` int(11) NOT NULL,
  `peso_neto` int(11) NOT NULL,
  `p_desperdicio` int(11) NOT NULL,
  `adicion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fermentacion` int(1) NOT NULL DEFAULT 1,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `lotes`
--

INSERT INTO `lotes` (`id`, `codigo`, `id_materia`, `fecha_inicio`, `peso_inicial`, `peso_neto`, `p_desperdicio`, `adicion`, `fermentacion`, `fecha_fin`) VALUES
(91, '10', 7, '2022-08-30', 101, 10, 10, 'agua', 4, '2022-09-14'),
(94, '001-arroz', 15, '2022-09-01', 36, 35, 58, 'Agua de panela', 4, '2022-09-13'),
(96, '002-arroz', 15, '2022-08-30', 343, 43, 4, 'agua', 4, '2022-09-16'),
(97, '001-ba', 6, '2022-09-13', 20, 20, 20, 'nada', 1, NULL),
(101, '003-arroz', 2, '2022-09-01', 6, 6, 6, '6', 3, NULL),
(104, '456', 2, '2022-09-22', 565, 657, 4, '56', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre`) VALUES
(1, 'vinagre aromatizado con finas hierbas (oregano)'),
(2, 'vinagre aromatizado con finas hierbas (albahaca)'),
(3, 'vinagre aromatizado con finas hierbas (romero)'),
(4, 'vinagre aromatizado con finas hierbas (tomillo)'),
(5, 'vinagre natural de mz con ajo, pimiento, oregano, tomillo, y eucalipto (sidra de fuego)'),
(6, 'vinagre natural de banano'),
(7, 'vinagre natural de sidra de manzana'),
(8, 'vinagre natural de pera'),
(9, 'vinagre natural de guayaba'),
(10, 'vinagre natural de piña'),
(11, 'vinagre natural de sidra de mz + aleo+ canela'),
(12, 'vinagre mz +curcuma con pimienta negra'),
(13, 'vinagre mz + jengibre + pimiento cayena'),
(14, 'vinagre de chontaduro con borojo + maca'),
(15, 'vinagre de arroz'),
(16, 'vinagre blanco'),
(17, 'vinagreta agridulce'),
(18, 'vinagreta finas hierbas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_variables`
--

CREATE TABLE `registro_variables` (
  `id` int(11) NOT NULL,
  `codigo_lote` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `fase_lote` int(1) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `brix` int(11) NOT NULL,
  `alcohol` int(11) NOT NULL,
  `ph` int(11) NOT NULL,
  `tds` int(11) NOT NULL,
  `ac` int(11) NOT NULL,
  `temperatura` int(11) NOT NULL,
  `humedad` int(11) NOT NULL,
  `fecha_registro` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro_variables`
--

INSERT INTO `registro_variables` (`id`, `codigo_lote`, `fase_lote`, `id_usuario`, `brix`, `alcohol`, `ph`, `tds`, `ac`, `temperatura`, `humedad`, `fecha_registro`) VALUES
(189, '10', 1, 17, 10, 10, 101, 10, 10, 10, 10, '2022-09-13'),
(190, '10', 1, 17, 101, 10, 20, 10, 20, 20, 20, '2022-09-13'),
(191, '10', 1, 17, 30, 30, 30, 30, 30, 30, 30, '2022-09-13'),
(192, '10', 1, 17, 40, 40, 40, 40, 40, 40, 40, '2022-09-13'),
(193, '10', 1, 17, 50, 50, 50, 50, 50, 50, 50, '2022-09-13'),
(194, '10', 1, 1, 60, 60, 60, 60, 60, 60, 60, '2022-09-13'),
(195, '10', 1, 1, 70, 70, 70, 70, 70, 70, 70, '2022-09-13'),
(196, '10', 1, 1, 80, 80, 80, 80, 80, 80, 80, '2022-09-13'),
(197, '10', 1, 1, 90, 90, 90, 90, 90, 90, 90, '2022-09-13'),
(198, '10', 1, 1, 100, 100, 100, 110, 100, 100, 100, '2022-09-13'),
(199, '10', 1, 1, 10, 10, 15, 15, 15, 15, 15, '2022-09-13'),
(200, '001-arroz', 1, 17, 11, 11, 11, 11, 11, 11, 11, '2022-09-13'),
(201, '001-arroz', 1, 17, 222, 22, 22, 222, 22, 22, 22, '2022-09-13'),
(202, '001-arroz', 1, 17, 33, 33, 33, 33, 33, 33, 33, '2022-09-13'),
(203, '001-arroz', 1, 17, 44, 44, 44, 44, 44, 44, 44, '2022-09-13'),
(204, '001-arroz', 1, 17, 55, 55, 55, 55, 55, 555, 55, '2022-09-13'),
(205, '001-arroz', 1, 1, 66, 66, 66, 66, 66, 66, 66, '2022-09-13'),
(206, '001-arroz', 1, 1, 77, 77, 77, 77, 77, 77, 77, '2022-09-13'),
(207, '001-arroz', 1, 1, 88, 88, 88, 88, 88, 88, 88, '2022-09-13'),
(208, '001-arroz', 1, 1, 99, 99, 99, 999, 99, 99, 99, '2022-09-14'),
(209, '002-arroz', 1, 17, 10, 101, 10, 10, 10, 10, 10, '2022-09-13'),
(210, '001-arroz', 2, 1, 10, 10, 10, 10, 10, 10, 10, '2022-09-21'),
(211, '001-arroz', 2, 1, 10, 20, 20, 20, 20, 20, 20, '2022-09-20'),
(212, '001-arroz', 2, 1, 30, 30, 30, 30, 30, 30, 30, '2022-09-19'),
(213, '001-arroz', 2, 1, 40, 50, 60, 70, 80, 90, 100, '2022-09-18'),
(214, '001-arroz', 2, 17, 11, 11, 11, 11, 11, 11, 11, '2022-09-17'),
(215, '001-arroz', 2, 17, 15, 15, 15, 15, 15, 15, 15, '2022-09-16'),
(216, '001-arroz', 2, 17, 25, 25, 25, 25, 25, 25, 25, '2022-09-15'),
(217, '001-arroz', 2, 17, 35, 35, 35, 35, 35, 35, 35, '2022-09-14'),
(218, '001-ba', 1, 17, 45, 45, 45, 45, 45, 45, 45, '2022-09-21'),
(219, '001-ba', 1, 17, 68, 68, 68, 68, 68, 68, 68, '2022-09-20'),
(220, '10', 2, 17, 42, 45, 47, 10, 45, 27, 85, '2022-09-13'),
(221, '10', 2, 1, 36, 36, 36, 36, 36, 36, 36, '2022-09-13'),
(222, '10', 2, 1, 88, 88, 5, 99, 45, 80, 80, '2022-09-13'),
(223, '10', 2, 1, 23, 23, 23, 66, 23, 25, 25, '2022-09-13'),
(224, '10', 2, 1, 8, 69, 58, 58, 58, 58, 58, '2022-09-13'),
(225, '10', 2, 17, 100, 100, 100, 100, 100, 100, 100, '2022-09-13'),
(226, '10', 2, 17, 91, 91, 91, 91, 91, 91, 91, '2022-09-13'),
(227, '002-arroz', 1, 1, 25, 25, 25, 25, 25, 25, 25, '2022-09-13'),
(228, '002-arroz', 1, 17, 99, 99, 99, 99, 99, 99, 99, '2022-09-13'),
(229, '002-arroz', 2, 17, 1, 1, 1, 1, 11, 1, 1, '2022-09-13'),
(230, '003-arroz', 1, 18, 1, 1, 1, 1, 1, 1, 1, '2022-09-13'),
(231, '002-arroz', 2, 18, 2, 2, 2, 2, 2, 2, 2, '2022-09-12'),
(232, '002-arroz', 2, 18, 3, 33, 3, 3, 3, 3, 3, '2022-09-13'),
(233, '002-arroz', 2, 18, 4, 4, 4, 4, 4, 4, 4, '2022-09-14'),
(234, '003-arroz', 1, 1, 12, 12, 12, 121, 2, 12, 12, '2022-09-15'),
(235, '003-arroz', 1, 1, 12, 12, 12, 12, 12, 121, 2, '2022-09-16'),
(236, '003-arroz', 1, 1, 121, 212, 1212, 12, 1212, 12, 12, '2022-09-17'),
(237, '003-arroz', 1, 1, 12, 12, 12, 12, 12, 12, 12, '2022-09-18'),
(238, '003-arroz', 1, 1, 12, 12, 121, 12, 2, 12, 12, '2022-09-19'),
(239, '003-arroz', 1, 1, 12, 12, 12, 12, 12, 121, 12, '2022-09-20'),
(240, '003-arroz', 1, 1, 12, 12, 121, 12, 2, 12, 12, '2022-09-21'),
(241, '003-arroz', 1, 1, 12, 12, 12, 12, 121, 23, 32, '2022-09-22'),
(242, '003-arroz', 1, 1, 34, 34, 34, 34, 34, 34, 34, '2022-09-23'),
(243, '003-arroz', 1, 1, 45, 45, 45, 45, 45, 45, 45, '2022-09-24'),
(244, '003-arroz', 1, 1, 54, 54, 54, 54, 54, 54, 54, '2022-09-25'),
(245, '003-arroz', 1, 1, 76, 67, 67, 67, 67, 67, 67, '2022-09-26'),
(246, '001-ba', 1, 1, 12, 12, 12, 12, 12, 12, 12, '2022-09-18'),
(247, '001-ba', 1, 1, 23, 23, 23, 23, 23, 23, 23, '2022-09-16'),
(248, '001-ba', 1, 1, 54, 54, 2345, 54, 545, 65, 65, '2022-09-17'),
(249, '001-ba', 1, 1, 98, 87, 76, 67, 76, 87, 87, '2022-09-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_cargo` int(1) NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `num_telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `num_documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `clave` int(4) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_cargo`, `nombres`, `apellidos`, `num_telefono`, `num_documento`, `fecha_nacimiento`, `clave`, `estado`) VALUES
(1, 1, 'pedro', 'gomez', '565656', '1111', '2022-08-18', 1111, 1),
(2, 2, 'Hector', 'Herrera', '21212', '2222', '2022-08-09', 2222, 1),
(8, 1, 'luis', 'carlos', '45464564', '4444', '2022-08-02', 4444, 1),
(9, 1, 'andres', 'andres', '23423423', '7777', '2022-09-02', 7777, 1),
(17, 1, 'juan', 'sandoval', '312312121', '1100973339', '2022-09-13', 1425, 1),
(18, 1, 'camilo', 'camilo', '34234', '11001100', '1985-02-12', 1010, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `envasado`
--
ALTER TABLE `envasado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `envases`
--
ALTER TABLE `envases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_variables`
--
ALTER TABLE `registro_variables`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `envasado`
--
ALTER TABLE `envasado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `envases`
--
ALTER TABLE `envases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `lotes`
--
ALTER TABLE `lotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `registro_variables`
--
ALTER TABLE `registro_variables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
