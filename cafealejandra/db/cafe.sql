-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-08-2022 a las 23:30:51
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
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cosechas`
--

INSERT INTO `cosechas` (`id`, `fecha_inicio`, `pago_kilo`, `pago_encargado`, `estado`) VALUES
(3, '2022-07-26', 5000, 25000, 0),
(4, '2022-07-27', 6000, 40000, 0),
(5, '2022-07-21', 1000, 52000, 0),
(6, '2022-07-26', 555, 6666, 1),
(7, '2022-07-13', 757, 7777, 1),
(8, '2022-07-08', 5000, 10000, 1),
(9, '2022-07-25', 5000, 25000, 1),
(10, '2022-07-22', 1000, 10000, 0);

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
(41, 5, 8, '2022-07-13'),
(42, 5, 8, '2022-08-01'),
(43, 5, 8, '2022-07-10'),
(44, 11, 9, '2022-07-31'),
(45, 11, 9, '2022-08-03'),
(46, 3, 7, '2022-08-03'),
(47, 5, 8, '2022-07-28'),
(48, 12, 9, '2022-07-31'),
(49, 13, 8, '2022-08-11');

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
  `num_documento` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `id_cosecha`, `nombres`, `apellidos`, `id_cargo`, `num_telefono`, `num_documento`) VALUES
(2, 7, '1', '2', 1, 3, 4),
(3, 7, 'sdf', 'sdf', 2, 234, 234),
(4, 8, 'Carlos', 'sarmiento', 1, 13212121, 1145524),
(5, 8, 'Juan', 'Suarez', 2, 2147483647, 115448575),
(6, 6, '54', '45', 1, 45, 45),
(7, 8, 'luis', 'suarez', 1, 435453, 45345345),
(8, 8, 'Pedro', 'Leon', 1, 435453, 45345345),
(9, 8, 'Laura', 'Perez', 1, 212121212, 11112222),
(10, 9, 'Carlos', 'Ramirez', 1, 1645645, 45645645),
(11, 9, 'Andres', 'Arias', 2, 1645645, 45645645),
(12, 9, 'Karen', 'Suarez', 2, 54645654, 45645645),
(13, 8, 'Hector', 'Herrera', 2, 2147483647, 115452541);

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
(2, 8, 4, 1, 0, '2022-07-28', 25),
(21, 8, 4, 1, 0, '2022-08-10', 50);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `dias_no_asistidos`
--
ALTER TABLE `dias_no_asistidos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
