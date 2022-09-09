-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2022 a las 18:56:26
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
  `codigo_caprino` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_tratamiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `caprinos_en_tratamiento`
--

INSERT INTO `caprinos_en_tratamiento` (`id`, `id_usuario`, `codigo_caprino`, `id_tratamiento`) VALUES
(61, 29, 'a23', 86),
(62, 34, 'c33', 87),
(63, 33, '4444', 88),
(64, 29, 'a23', 89),
(65, 29, 'a23', 90),
(66, 29, 'a11', 91),
(67, 29, '1', 91),
(68, 29, 'hr23', 91),
(69, 29, 'a11', 92),
(70, 29, 'A20', 92),
(71, 29, 'a22', 92),
(72, 29, 'a23', 92);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_caprino`
--

CREATE TABLE `registro_caprino` (
  `id` int(11) NOT NULL,
  `codigo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
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
(50, '1', 29, 'Alpino', '2022-08-17', 'Otro', 1, '', NULL),
(53, 'c1', 28, 'Santandereano', '2022-08-17', 'Nacido', 0, 'Sacrificio', '2022-08-29'),
(54, 'a33', 32, 'Alpino', '2022-08-04', 'Comprado', 1, '', NULL),
(55, 'a1', 32, 'Booer', '2022-08-18', 'Otro', 0, 'Sacrificio', '2022-08-18'),
(56, 'a32', 28, 'Saanen', '2022-08-15', 'Comprado', 1, '', NULL),
(57, 'z56', 28, 'Santandereano', '2022-06-17', 'Nacido', 1, '', NULL),
(58, 'eq34', 28, 'Alpino', '2022-08-10', 'Comprado', 0, 'Venta', '2022-08-02'),
(59, 'a23', 29, 'Nubiana', '2022-08-02', 'Comprado', 1, '', NULL),
(60, 'a21', 32, 'Alpino', '2022-08-01', 'Comprado', 1, '', NULL),
(61, 'c33', 34, 'Alpino', '2022-08-22', 'Otro', 1, '', NULL),
(62, '4444', 33, 'Togenburn', '2022-08-22', 'Otro', 1, '', NULL),
(63, 'c45', 34, 'Nubiana', '2022-08-30', 'Otro', 1, '', NULL),
(64, 'q56', 34, 'Otras', '2022-08-25', 'Nacido', 1, '', NULL),
(66, 'a22', 29, 'Saanen', '2022-08-23', 'Comprado', 1, '', NULL),
(67, 'a11', 29, 'Saanen', '2022-08-20', 'Otro', 1, '', NULL),
(68, 'd45', 29, 'Togenburn', '2022-08-12', 'Nacido', 1, '', NULL),
(69, 'j67', 29, 'Nubiana', '2022-07-06', 'Otro', 1, '', NULL),
(70, 'hr23', 29, 'Nubiana', '2022-08-12', 'Comprado', 1, '', NULL),
(71, 'k90', 29, 'Santandereano', '2022-08-23', 'Otro', 0, 'Muerte Natural', '2022-08-24'),
(73, 'A20', 29, 'Booer', '2022-08-24', 'Comprado', 1, '', NULL),
(74, '01', 2, 'Alpino', '2022-09-04', 'Comprado', 1, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_control`
--

CREATE TABLE `registro_control` (
  `id` int(11) NOT NULL,
  `codigo_caprino` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
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
(58, 'a32', 28, 21, 2, 'enfermedad respiratoria', '', '', '2022-08-23'),
(59, 'z56', 28, 22, 3, '', 'enfermedad gastro intestinal', '', '2022-08-23'),
(60, '1', 29, 25, 2, 'enfermedad respiratoria', 'enfermedad gastro intestinal', '', '2022-08-23'),
(61, '1', 29, 25, 5, '', '', 'enfermedad por mordedura', '2022-08-23'),
(62, '1', 29, 5, 3, '', 'enfermedad gastro intestinal', '', '2022-08-23'),
(63, 'a23', 29, 23, 2, 'enfermedad respiratoria', '', '', '2022-08-23'),
(64, 'a33', 32, 47, 1, 'enfermedad respiratoria', '', '', '2022-08-23'),
(65, 'a33', 32, 11, 4, '', '', 'enfermedad por mordedura', '2022-08-23'),
(66, 'c33', 34, 20, 5, '', '', 'enfermedad por mordedura', '2022-08-23'),
(67, 'A20', 29, 25, 5, '', 'Gastro', '', '2022-08-24'),
(68, '1', 29, 85, 4, 'enfermedad respiratoria', 'enfermedad gastro intestinal', 'enfermedad por mordedura', '2022-08-24'),
(69, '1', 29, 66, 1, '', '', '', '2022-08-24'),
(70, 'd45', 29, 85, 2, 'enfermedad respiratoria', '', 'enfermedad por mordedura', '2022-09-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_produccion`
--

CREATE TABLE `registro_produccion` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `codigo_caprino` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_leche` int(3) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro_produccion`
--

INSERT INTO `registro_produccion` (`id`, `id_usuario`, `codigo_caprino`, `cantidad_leche`, `fecha_registro`) VALUES
(27, 32, '33', 58, '2022-08-05'),
(28, 28, 'a32', 32, '2022-08-23'),
(29, 28, 'z56', 32, '2022-08-26'),
(30, 28, 'z56', 122, '2022-08-26'),
(31, 32, 'a21', 10, '2022-08-08'),
(32, 32, 'a33', 10, '2022-08-12'),
(33, 32, 'a33', 100, '2022-08-30'),
(34, 29, '1', 20, '2022-08-25'),
(35, 29, 'a23', 1000, '2022-08-25'),
(36, 29, 'a23', 10, '2022-08-08'),
(37, 29, 'a22', 20, '2022-08-23'),
(38, 29, '1', 25, '2022-08-30'),
(39, 29, 'a22', 25, '2022-09-10'),
(40, 29, 'a11', 525, '2022-09-12'),
(41, 29, 'a11', 52, '2022-09-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_salidas`
--

CREATE TABLE `registro_salidas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  `codigo_caprino` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
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
(86, 29, '74', '2022-08-30'),
(87, 34, '33', '2022-08-16'),
(88, 33, '4444', '2022-08-17'),
(89, 29, 'we', '2022-08-22'),
(90, 29, 'parvo', '2022-08-24'),
(91, 29, 'Prueba ultima', '2022-08-31'),
(92, 29, 'Vacunación todo', '2022-08-24');

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
  `clave` int(4) NOT NULL,
  `id_cargo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `num_documento`, `num_telefono`, `direccion`, `objetivo_produccion`, `clave`, `id_cargo`) VALUES
(28, 'Juan', 'Sandoval', '2111', '121212', 'san gil', 'Carne', 1111, 1),
(29, 'Pedro', 'Rojas', '2222', '121212', 'san gil', 'Carne', 2222, 2),
(32, 'Carlos', 'Perez', '5555', '985454', 'San gil', 'Doble Propósito', 5555, 2),
(33, 'Luis', 'Vargas', '4444', '12212454', 'San gil', 'Carne', 4444, 2),
(34, 'Hector', '4564', '3333', '45645', '4545', 'Carne', 3333, 2),
(35, 'Juan', 'Sandoval', '321313213', '13121231', 'San gil', 'Leche', 8888, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caprinos_en_tratamiento`
--
ALTER TABLE `caprinos_en_tratamiento`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `registro_caprino`
--
ALTER TABLE `registro_caprino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `registro_control`
--
ALTER TABLE `registro_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `registro_produccion`
--
ALTER TABLE `registro_produccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `registro_salidas`
--
ALTER TABLE `registro_salidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registro_tratamientos`
--
ALTER TABLE `registro_tratamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
