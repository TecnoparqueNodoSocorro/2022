-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2022 a las 15:14:19
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
-- Estructura de tabla para la tabla `lotes`
--

CREATE TABLE `lotes` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `materia` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `peso_inicial` int(11) NOT NULL,
  `peso_neto` int(11) NOT NULL,
  `p_desperdicio` int(11) NOT NULL,
  `adicion` text COLLATE utf8_spanish_ci NOT NULL,
  `fermentacion` int(1) NOT NULL DEFAULT 1,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `lotes`
--

INSERT INTO `lotes` (`id`, `codigo`, `materia`, `fecha_inicio`, `peso_inicial`, `peso_neto`, `p_desperdicio`, `adicion`, `fermentacion`, `fecha_fin`) VALUES
(22, 'm01', 'mangi', '2022-09-05', 23, 23, 23, 'adicion', 4, '2022-09-02'),
(23, '23', '23', '2022-09-06', 23, 23, 23, '2323', 3, NULL),
(26, 'c00132', 'calabaza', '2022-08-30', 324, 23423, 4, '4232', 4, '2022-09-02'),
(27, 'p1', 'pera', '2022-09-05', 24, 45, 54, 'nada', 2, NULL),
(28, 'piña1', 'piña', '2022-08-31', 45, 98, 86, 'pera', 2, NULL),
(29, '34', 'pera', '2022-09-13', 4, 343, 354, '345', 1, NULL),
(30, 'p01', 'aguacwt', '2022-09-04', 23, 2323, 32, 'eweqw', 1, NULL),
(31, 'm1', 'manzana', '2022-09-07', 44, 44, 44, 'nada', 1, NULL),
(39, 'g01', 'guayaba', '2022-08-30', 8, 8, 89, 'nada', 1, NULL),
(40, '24', '24', '2022-08-31', 24, 24, 24, '242424', 1, NULL),
(41, '4242', '242', '2022-08-30', 24, 42424, 2424, '2424', 1, NULL);

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
(115, 'm01', 2, 2, 12, 12, 12, 12, 12, 12, 12, '2022-09-21'),
(116, 'm01', 2, 2, 11, 11, 1, 1, 1, 1, 1, '2022-09-02'),
(117, 'm01', 2, 1, 1, 1, 1, 1, 1, 1, 1, '2022-09-22'),
(118, 'm01', 2, 8, 4, 4, 4, 44, 4, 4, 4, '2022-09-07'),
(119, 'm01', 2, 9, 7, 7, 7, 7, 7, 7, 7, '2022-09-27'),
(120, 'm01', 2, 1, 98, 989, 989, 8, 8, 98, 89, '2022-09-02'),
(121, '23', 1, 1, 12, 21, 21, 21, 44, 44, 44, '2022-09-02'),
(122, '23', 1, 8, 65, 56, 65, 65, 65, 97, 34, '2022-09-02'),
(123, 'c00132', 1, 9, 98, 98, 98, 98, 89, 33, 33, '2022-09-02'),
(124, 'p001', 1, 9, 323, 23, 23, 23, 23, 32, 12, '2022-09-02'),
(125, 'p001', 1, 9, 2121, 21, 21, 12, 21, 122, 1, '2022-09-02'),
(126, 'c00132', 1, 1, 1, 1, 1, 11, 11, 212, 1, '2022-09-02'),
(127, 'p001', 1, 1, 21, 212, 2, 121, 12, 34, 21, '2022-09-02'),
(128, 'c00132', 1, 8, 65, 67, 6, 565, 6, 65, 65, '2022-09-02'),
(129, 'p001', 1, 8, 65, 66, 77, 66, 77, 345, 534, '2022-09-02'),
(130, 'c00132', 2, 1, 12, 21, 12, 2, 12, 12, 12, '2022-09-02'),
(131, 'c00132', 2, 1, 3, 23, 32, 32, 32, 323, 21, '2022-09-02'),
(132, 'p001', 2, 1, 213, 123, 123, 12312312, 1231, 765, 3467, '2022-09-02'),
(133, 'p001', 2, 1, 564, 456, 564, 454, 645, 222, 21, '2022-09-02'),
(134, 'c00132', 2, 1, 98, 98, 89, 89, 89, 98, 89, '2022-09-02'),
(135, 'c00132', 2, 1, 98, 89, 98, 89, 342, 231, 123, '2022-09-02'),
(136, 'p01', 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-09-07'),
(137, 'm1', 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-09-02'),
(138, 'p01', 1, 1, 2, 2, 2, 22, 2, 2, 2, '2022-09-06'),
(139, '34', 1, 1, 1, 1, 11, 1, 1, 1, 1, '2022-09-06'),
(140, 'm1', 1, 1, 87, 87, 87, 87, 78, 78, 78, '2022-09-02'),
(141, 'p01', 1, 3, 878, 7, 69, 69, 69, 69, 96, '2022-09-06'),
(142, '34', 1, 1, 8, 7, 87, 3, 1, 2, 63, '2022-09-06'),
(143, 'p01', 1, 1, 878, 7, 7, 878, 87, 87, 87, '2022-09-06'),
(144, 'm1', 1, 1, 7, 78, 87, 87, 87, 78, 78, '2022-09-03'),
(145, 'piña1', 2, 1, 2, 6, 52, 36, 52, 25, 15, '2022-09-19'),
(146, '34', 1, 1, 11, 99, 99, 99, 99, 99, 99, '2022-09-06'),
(147, 'm1', 1, 9, 2, 6, 5, 3, 3, 6, 46, '2022-09-02'),
(148, 'p01', 1, 9, 23, 23, 26, 56, 85, 25, 852, '2022-09-06'),
(150, '4242', 1, 1, 23, 32, 323, 32, 2323, 2323, 2323, '2022-09-07'),
(151, 'piña1', 2, 9, 6, 6, 6, 6, 6, 6, 6, '2022-09-07'),
(152, '34', 1, 9, 2, 3, 3, 2, 32, 32, 32, '2022-10-07'),
(153, 'piña1', 2, 1, 8, 8, 8, 8, 8, 5, 4, '2022-09-17'),
(154, 'p1', 2, 1, 4, 4, 4, 7, 4, 4, 4, '2022-09-15'),
(155, '4242', 1, 1, 47, 47, 47, 47, 47, 47, 47, '2022-09-08'),
(156, '4242', 1, 8, 14, 41, 77, 7, 7774, 5, 8, '2022-09-08'),
(157, 'piña1', 2, 8, 44, 47, 4, 74, 47, 75, 745, '2022-09-08'),
(158, 'g01', 1, 13, 23, 65, 85, 85, 22, 52, 25, '2022-09-08'),
(159, 'piña1', 2, 13, 6, 6, 8, 8, 0, 6, 48, '2022-09-08'),
(160, 'p1', 2, 13, 66, 8, 6, 8, 8, 6, 5, '2022-09-08'),
(161, '24', 1, 13, 6, 6, 6, 9, 9, 8, 5, '2022-09-08');

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
(9, 1, 'andres', 'andres', '23423423', '7777', '2022-09-02', 6655, 1),
(13, 1, '99', '99', '99', '9999', '2022-09-16', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lotes`
--
ALTER TABLE `lotes`
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
-- AUTO_INCREMENT de la tabla `lotes`
--
ALTER TABLE `lotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `registro_variables`
--
ALTER TABLE `registro_variables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
