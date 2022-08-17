-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2022 a las 23:23:10
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
-- Base de datos: `cafe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cosechas`
--

CREATE TABLE `cosechas` (
  `id` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `pago_kilo` int(11) NOT NULL,
  `pago_encargado` int(11) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cosechas`
--

INSERT INTO `cosechas` (`id`, `fecha_inicio`, `pago_kilo`, `pago_encargado`, `estado`, `fecha_fin`) VALUES
(26, '2022-08-14', 5000, 15000, 1, NULL),
(27, '2022-08-18', 2000, 20000, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias_no_asistidos`
--

CREATE TABLE `dias_no_asistidos` (
  `id` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `id_cosecha` int(20) NOT NULL,
  `dia_no_asistido` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dias_no_asistidos`
--

INSERT INTO `dias_no_asistidos` (`id`, `id_empleado`, `id_cosecha`, `dia_no_asistido`) VALUES
(50, 26, 26, '2022-08-19'),
(51, 26, 26, '2022-08-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `id_cosecha` int(11) NOT NULL,
  `nombres` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_cargo` int(1) NOT NULL,
  `num_telefono` int(10) NOT NULL,
  `num_documento` int(20) NOT NULL,
  `contrasena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `id_cosecha`, `nombres`, `apellidos`, `id_cargo`, `num_telefono`, `num_documento`, `contrasena`) VALUES
(20, 0, 'administrador', 'admin', 3, 0, 13862306, '4765'),
(22, 26, 'omar ', 'peña', 1, 12345, 11111, '12345'),
(23, 26, 'pilar ', 'sanchez', 1, 22222, 22222, '12345'),
(24, 26, 'alanix', 'hormiga', 1, 4444, 44444, '12345'),
(25, 26, 'sebastian', 'sandoval', 1, 55555, 55555, '12345'),
(26, 26, 'sergio', 'pérez', 2, 77777, 77777, '12345'),
(27, 26, 'pablo', 'perez', 1, 8888, 88888, '12345'),
(28, 27, 'prueba', 'prueba', 2, 123123123, 321321321, ''),
(29, 26, 'prueba', 'prueba', 1, 7778, 67867867, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `pagos` int(20) NOT NULL DEFAULT 0,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `id_empleado`, `pagos`, `fecha`) VALUES
(35, 4, 2000, '2022-08-04'),
(58, 4, 3000, '2022-08-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `id_cosecha` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_cargo` int(1) NOT NULL,
  `dias_no_laborados` int(3) NOT NULL,
  `fecha_registro` date NOT NULL,
  `kilos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `id_cosecha`, `id_empleado`, `id_cargo`, `dias_no_laborados`, `fecha_registro`, `kilos`) VALUES
(24, 26, 22, 1, 0, '2022-08-15', 25),
(25, 26, 23, 1, 0, '2022-08-15', 50);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cosechas`
--
ALTER TABLE `cosechas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dias_no_asistidos`
--
ALTER TABLE `dias_no_asistidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cosechas`
--
ALTER TABLE `cosechas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `dias_no_asistidos`
--
ALTER TABLE `dias_no_asistidos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
