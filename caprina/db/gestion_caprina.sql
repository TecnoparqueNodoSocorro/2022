-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2022 a las 16:49:46
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
(43, 1, 0, 74),
(44, 1, 2, 74),
(45, 1, 33, 75),
(46, 1, 0, 75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_caprino`
--

CREATE TABLE `registro_caprino` (
  `id` int(11) NOT NULL,
  `codigo` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
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
(52, '2', 28, 'Saanen', '2022-08-16', 'Comprado', 1, '', NULL),
(53, 'c1', 28, 'Santandereano', '2022-08-17', 'Nacido', 1, '', NULL),
(54, '33', 32, 'Alpino', '2022-08-04', 'Comprado', 1, '', NULL),
(55, 'a1', 32, 'Booer', '2022-08-18', 'Otro', 0, 'Sacrificio', '2022-08-18');

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
(56, 0, 28, 25, 3, 'Problemas', '', '', '2022-08-19'),
(57, 0, 32, 12, 3, 'enfermedad respiratoria', '', 'enfermedad por mordedura', '2022-08-19');

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
(27, 32, 33, 58, '2022-08-05');

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
(74, 1, 'Vacunacion', '2022-08-17'),
(75, 1, '123', '2022-08-05');

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
(32, 'Carlos', 'Perez', '5555', '985454', 'San gil', 'Doble Propósito', 5555, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `registro_caprino`
--
ALTER TABLE `registro_caprino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `registro_control`
--
ALTER TABLE `registro_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `registro_produccion`
--
ALTER TABLE `registro_produccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `registro_salidas`
--
ALTER TABLE `registro_salidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registro_tratamientos`
--
ALTER TABLE `registro_tratamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
