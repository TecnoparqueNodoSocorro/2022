-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2022 a las 23:15:17
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
-- Base de datos: `gestion_caprina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caprinos_en_tratamiento`
--

CREATE TABLE `caprinos_en_tratamiento` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `codigo_caprino` int(11) NOT NULL,
  `id_tratamiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `caprinos_en_tratamiento`
--

INSERT INTO `caprinos_en_tratamiento` (`id`, `id_usuario`, `codigo_caprino`, `id_tratamiento`) VALUES
(21, 1, 55, 66),
(22, 1, 711, 67),
(23, 1, 45, 68),
(24, 1, 71, 68),
(25, 1, 55, 68),
(26, 1, 22, 69),
(27, 1, 55, 70),
(28, 1, 45, 70),
(29, 1, 71, 70),
(30, 1, 711, 70),
(31, 1, 55, 71),
(32, 1, 711, 71),
(33, 1, 23, 71),
(34, 1, 71, 72),
(35, 1, 711, 72),
(36, 1, 55, 72),
(37, 1, 45, 72),
(38, 1, 22, 72),
(39, 1, 11, 72),
(40, 1, 711, 73),
(41, 1, 71, 73),
(42, 1, 56, 73);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad`
--

CREATE TABLE `enfermedad` (
  `id` int(11) NOT NULL,
  `enfermedad` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_caprino`
--

CREATE TABLE `registro_caprino` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `raza` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `origen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  `motivo_salida` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_salida` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro_caprino`
--

INSERT INTO `registro_caprino` (`id`, `codigo`, `id_usuario`, `raza`, `fecha_nacimiento`, `origen`, `estado`, `motivo_salida`, `fecha_salida`) VALUES
(15, 2, 1, 'Saanen', '2022-08-04', 'Nacido', 0, 'Venta', '2022-08-13'),
(16, 4, 1, 'Alpino', '2022-08-06', 'Nacido', 0, 'Sacrificio', '2022-08-13'),
(17, 5, 1, 'Alpino', '2022-08-12', 'Comprado', 0, 'Sacrificio', '2022-08-04'),
(19, 7, 1, 'Saanen', '2022-08-10', 'Comprado', 0, 'Sacrificio', '2022-08-13'),
(26, 9, 1, 'Saanen', '2022-08-12', 'Comprado', 0, 'Sacrificio', '2022-08-05'),
(27, 55, 1, 'Saanen', '2022-08-06', 'Otro', 1, '', NULL),
(29, 14, 1, 'Saanen', '2022-08-06', 'Comprado', 0, 'Venta', '2022-08-10'),
(31, 45, 1, 'Alpino', '2022-08-19', 'Comprado', 1, '', NULL),
(35, 71, 1, 'Alpino', '2022-08-05', 'Comprado', 1, '', NULL),
(38, 711, 1, 'Saanen', '2022-08-06', 'Nacido', 1, '', NULL),
(39, 22, 1, 'Booer', '2022-08-02', 'Comprado', 1, '', NULL),
(40, 23, 1, 'Santandereano', '2022-08-02', 'Nacido', 0, 'Sacrificio', '2022-08-16'),
(41, 11, 1, 'Alpino', '2022-08-11', 'Nacido', 1, '', NULL),
(42, 56, 1, 'Saanen', '2022-08-18', 'Comprado', 1, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_control`
--

CREATE TABLE `registro_control` (
  `id` int(11) NOT NULL,
  `codigo_caprino` int(20) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `peso` int(3) NOT NULL,
  `condicion_corporal` int(1) NOT NULL,
  `enfermedad_respiratoria` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `enfermedad_gastrointestinal` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `enfermedad_mordedura` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro_control`
--

INSERT INTO `registro_control` (`id`, `codigo_caprino`, `id_usuario`, `peso`, `condicion_corporal`, `enfermedad_respiratoria`, `enfermedad_gastrointestinal`, `enfermedad_mordedura`, `fecha`) VALUES
(47, 711, 1, 45, 3, 'enfermedad respiratoria', '', '', '2022-08-11'),
(48, 45, 1, 45, 2, 'enfermedad respiratoria', 'enfermedad gastro intestinal', '', '2022-08-08'),
(49, 711, 1, 34, 2, 'enfermedad respiratoria', 'enfermedad gastro intestinal', 'enfermedad por mordedura', '2022-08-09'),
(50, 22, 1, 43, 2, '', 'enfermedad gastro intestinal', '', '2022-08-09'),
(51, 45, 1, 9, 1, '', '', 'enfermedad por mordedura', '2022-08-09'),
(52, 71, 1, 74, 3, '', '', 'mordido una pata', '2022-08-10'),
(53, 71, 1, 78, 4, 'enfermedad respiratoria', '', '', '2022-08-10'),
(54, 55, 1, 66, 4, '', '', '', '2022-08-10'),
(55, 71, 1, 23, 1, 'enfermedad respiratoria', '', '', '2022-08-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_produccion`
--

CREATE TABLE `registro_produccion` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `codigo_caprino` int(11) NOT NULL,
  `cantidad_leche` int(3) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro_produccion`
--

INSERT INTO `registro_produccion` (`id`, `id_usuario`, `codigo_caprino`, `cantidad_leche`, `fecha_registro`) VALUES
(8, 1, 55, 67, '2022-08-11'),
(9, 1, 45, 45, '2022-08-11'),
(10, 1, 711, 55, '2022-08-10'),
(11, 1, 45, 10, '2022-08-09'),
(12, 1, 71, 411, '2022-08-09'),
(13, 1, 711, 10, '2022-08-10'),
(14, 1, 71, 25, '2022-08-08'),
(15, 1, 45, 55, '2022-08-03'),
(16, 1, 71, 55, '2022-08-05'),
(17, 1, 711, 25, '2022-07-31'),
(18, 1, 45, 52, '2022-09-03'),
(19, 1, 55, 52, '2022-09-05'),
(20, 1, 55, 25, '2022-09-15'),
(21, 1, 711, 56, '2022-08-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_salidas`
--

CREATE TABLE `registro_salidas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  `codigo_caprino` int(11) NOT NULL,
  `motivo` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_tratamientos`
--

CREATE TABLE `registro_tratamientos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro_tratamientos`
--

INSERT INTO `registro_tratamientos` (`id`, `id_usuario`, `descripcion`, `fecha_inicio`) VALUES
(66, 1, 'vacunacion 1', '2022-08-01'),
(67, 1, 'vacunacion 2', '2022-08-05'),
(68, 1, 'vacunacion 3', '2022-08-19'),
(69, 1, 'vacunacion 4', '2022-08-27'),
(70, 1, 'vacunacion 5', '2022-08-11'),
(71, 1, 'vacunacion por mordedura', '2022-08-02'),
(72, 1, 'Vacunacion por rabia', '2022-08-17'),
(73, 1, '74', '2022-08-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `num_documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `num_telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `objetivo_produccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_cargo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `num_documento`, `num_telefono`, `direccion`, `objetivo_produccion`, `id_cargo`) VALUES
(1, 'Juan', 'Sandoval', '115151', '31245', 'San Gil', 'Otros', 1),
(7, 'juan', 'sandoval', '1121221', '31231231', '4', 'Leche', 1),
(8, '65756', '567567', '56765', '56756', '657567567', 'Carne', 1),
(9, '1', 'Herrera', '4', '456456', '456456', 'Leche', 1),
(10, '8', '456', '8', '64546', '45645', 'Carne', 2),
(11, 'Hector', 'Herrera', '45645645', '456456', '45645645', 'Carne', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caprinos_en_tratamiento`
--
ALTER TABLE `caprinos_en_tratamiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_caprino`
--
ALTER TABLE `registro_caprino`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `registro_control`
--
ALTER TABLE `registro_control`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_produccion`
--
ALTER TABLE `registro_produccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_salidas`
--
ALTER TABLE `registro_salidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_tratamientos`
--
ALTER TABLE `registro_tratamientos`
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
-- AUTO_INCREMENT de la tabla `caprinos_en_tratamiento`
--
ALTER TABLE `caprinos_en_tratamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_caprino`
--
ALTER TABLE `registro_caprino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `registro_control`
--
ALTER TABLE `registro_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `registro_produccion`
--
ALTER TABLE `registro_produccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `registro_salidas`
--
ALTER TABLE `registro_salidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registro_tratamientos`
--
ALTER TABLE `registro_tratamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
