-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2022 a las 23:56:29
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
-- Base de datos: `mogotes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `embalaje_detalle`
--

CREATE TABLE `embalaje_detalle` (
  `id` int(20) NOT NULL,
  `id_encabezado` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `id_empaque` int(20) NOT NULL,
  `cantidad` int(20) NOT NULL,
  `fecha_fabricacion` date NOT NULL,
  `fecha_vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `embalaje_empaque`
--

CREATE TABLE `embalaje_empaque` (
  `id` int(20) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `empaque` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `embalaje_empaque`
--

INSERT INTO `embalaje_empaque` (`id`, `producto`, `empaque`) VALUES
(1, 'Bocadillo', 'Especial Navideño'),
(2, 'Bocadillo', '20x30'),
(3, 'Bocadillo', '84x10'),
(4, 'Bocadillo', 'Mooticos x 5'),
(5, 'Bocadillo', 'Mooticos Unidades'),
(6, 'Bocadillo', 'Lonja'),
(7, 'Bocadillo', 'Extrafino 28x16'),
(8, 'Bocadillo', '28x20'),
(9, 'Bocadillo', 'Mooticos x 10'),
(11, 'Bocadillo', 'Unidades'),
(12, 'Bocadillo', 'Bocadillo manzana'),
(13, 'Espejuelo', 'Pastilla unidad'),
(14, 'Espejuelo', '20x40'),
(15, 'Espejuelo', '96x12'),
(16, 'Espejuelo', 'Mooticos x5'),
(17, 'Espejuelo', 'Mooticos unidad'),
(18, 'Espejuelo', '40x20'),
(19, 'Espejuelo', 'Mooticos x10'),
(20, 'Arequipe', 'Cajita x2  unidades'),
(21, 'Arequipe', 'Bocadillo panela'),
(22, 'Arequipe', 'Herpos'),
(23, 'Arequipe', 'Bocadillo panela unidad'),
(24, 'Arequipe', 'Bocadillo Light');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `embalaje_encabezado`
--

CREATE TABLE `embalaje_encabezado` (
  `id` int(20) NOT NULL,
  `id_lote` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `azucar` int(20) NOT NULL,
  `bijao` int(20) NOT NULL,
  `celofan` int(20) NOT NULL,
  `recortes` int(20) NOT NULL,
  `madera` int(20) NOT NULL,
  `tablas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escaldado`
--

CREATE TABLE `escaldado` (
  `id` int(20) NOT NULL,
  `id_lote` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `lavada` int(20) NOT NULL,
  `desinfectada` int(20) NOT NULL,
  `escaldada` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id` int(20) NOT NULL,
  `lebrija` int(10) NOT NULL,
  `mogotes` int(10) NOT NULL,
  `villa_mercedes` int(10) NOT NULL,
  `manzana_blanca` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_arequipe`
--

CREATE TABLE `reporte_arequipe` (
  `id` int(20) NOT NULL,
  `id_lote` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `leche` int(20) NOT NULL,
  `azucar` int(20) NOT NULL,
  `botes_marmitas` int(20) NOT NULL,
  `botes_pailas` int(20) NOT NULL,
  `tabla_extrafino` int(20) NOT NULL,
  `tabla_bocadillo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_bocadillo`
--

CREATE TABLE `reporte_bocadillo` (
  `id` int(20) NOT NULL,
  `id_lote` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `recortes` int(20) NOT NULL,
  `botes_marmitas` int(20) NOT NULL,
  `azucar` int(20) NOT NULL,
  `devolucion_tablas` int(20) NOT NULL,
  `botes_pailas` int(20) NOT NULL,
  `brix` int(20) NOT NULL,
  `tabla_extrafino` int(20) NOT NULL,
  `tabla_bocadillos` int(20) NOT NULL,
  `tabla_lonja` int(20) NOT NULL,
  `tabla_manzana` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_espejuelo`
--

CREATE TABLE `reporte_espejuelo` (
  `id` int(20) NOT NULL,
  `id_lote` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `azucar` int(20) NOT NULL,
  `aceite_oliva` int(20) NOT NULL,
  `pectina` int(20) NOT NULL,
  `botes_marmitas` int(20) NOT NULL,
  `botes_pailas` int(20) NOT NULL,
  `brix` int(20) NOT NULL,
  `redonda` int(20) NOT NULL,
  `tabla_metalica` int(20) NOT NULL,
  `fecha_fabricacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `numero_telefono` varchar(20) NOT NULL,
  `numero_documento` varchar(20) NOT NULL,
  `id_cargo` int(1) NOT NULL,
  `clave` int(11) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `numero_telefono`, `numero_documento`, `id_cargo`, `clave`, `estado`) VALUES
(1, 'Hector', 'Herrera', '56756', '75675676', 2, 3333, 1),
(2, 'Carlos', '456456', '2132', '123123', 2, 1111, 1),
(3, 'juan', 'sandoval', '312131131', '1111', 1, 1111, 1),
(4, 'carlos', 'perez', '13121321', '2222', 2, 2222, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `embalaje_detalle`
--
ALTER TABLE `embalaje_detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `embalaje_empaque`
--
ALTER TABLE `embalaje_empaque`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `embalaje_encabezado`
--
ALTER TABLE `embalaje_encabezado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `escaldado`
--
ALTER TABLE `escaldado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte_arequipe`
--
ALTER TABLE `reporte_arequipe`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte_bocadillo`
--
ALTER TABLE `reporte_bocadillo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte_espejuelo`
--
ALTER TABLE `reporte_espejuelo`
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
-- AUTO_INCREMENT de la tabla `embalaje_detalle`
--
ALTER TABLE `embalaje_detalle`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `embalaje_empaque`
--
ALTER TABLE `embalaje_empaque`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `embalaje_encabezado`
--
ALTER TABLE `embalaje_encabezado`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `escaldado`
--
ALTER TABLE `escaldado`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_arequipe`
--
ALTER TABLE `reporte_arequipe`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_bocadillo`
--
ALTER TABLE `reporte_bocadillo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_espejuelo`
--
ALTER TABLE `reporte_espejuelo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
