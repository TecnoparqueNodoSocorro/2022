-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2022 a las 23:59:40
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
  `codigo_lote` int(11) NOT NULL,
  `id_empaque` int(20) NOT NULL,
  `cantidad` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `embalaje_detalle`
--

INSERT INTO `embalaje_detalle` (`id`, `id_encabezado`, `codigo_lote`, `id_empaque`, `cantidad`) VALUES
(18, 24, 999, 11, 65),
(19, 24, 999, 9, 65),
(20, 25, 1234, 2, 3),
(21, 25, 1234, 1, 2),
(22, 25, 1234, 3, 1);

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
  `codigo_lote` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `azucar` int(20) NOT NULL,
  `bijao` int(20) NOT NULL,
  `celofan` int(20) NOT NULL,
  `recortes` int(20) NOT NULL,
  `madera` int(20) NOT NULL,
  `tablas` int(20) NOT NULL,
  `fecha_fabricacion` date NOT NULL DEFAULT current_timestamp(),
  `fecha_vencimiento` date NOT NULL,
  `fecha_embalaje` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `embalaje_encabezado`
--

INSERT INTO `embalaje_encabezado` (`id`, `codigo_lote`, `id_empleado`, `azucar`, `bijao`, `celofan`, `recortes`, `madera`, `tablas`, `fecha_fabricacion`, `fecha_vencimiento`, `fecha_embalaje`) VALUES
(24, 999, 3, 67, 67, 67, 67, 676, 676, '2022-10-27', '2023-02-27', '2022-10-27'),
(25, 1234, 3, 2, 34, 23, 234, 234, 23, '2022-10-26', '2023-02-26', '2022-10-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escaldado`
--

CREATE TABLE `escaldado` (
  `id` int(20) NOT NULL,
  `codigo_lote` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `desperdicio` float NOT NULL,
  `desinfectante` float NOT NULL,
  `escaldada` float NOT NULL,
  `cantidad_verde` float NOT NULL,
  `fecha_escaldado` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `escaldado`
--

INSERT INTO `escaldado` (`id`, `codigo_lote`, `id_empleado`, `desperdicio`, `desinfectante`, `escaldada`, `cantidad_verde`, `fecha_escaldado`) VALUES
(1, 890, 3, 54, 545, 6, 34, '2022-10-24'),
(2, 675, 3, 43, 2, 5, 3, '2022-10-24'),
(3, 675, 3, 767, 6767, 6785, 465, '2022-10-24'),
(5, 890, 3, 64545, 5, 455, 45, '2022-10-24'),
(6, 675, 3, 67, 67, 764, 5, '2022-10-24'),
(7, 675, 3, 67, 67675, 345, 3, '2022-10-24'),
(8, 675, 3, 56, 657, 56756, 7, '2022-10-24'),
(9, 890, 3, 867, 8768, 6786, 7867, '2022-10-24'),
(10, 675, 3, 233, 2, 32, 32, '2022-10-24'),
(11, 675, 3, 877, 8778, 8, 7, '2022-10-24'),
(12, 756, 3, 14, 45, 13, 12, '2022-10-24'),
(13, 4354, 3, 44.23, 12, 12.54, 22.01, '2022-10-24'),
(14, 4354, 3, 25.77, 36, 77.52, 10.3, '2022-10-24'),
(15, 4354, 3, 14.25, 22, 14.77, 35.65, '2022-10-24'),
(16, 756, 3, 65.76, 87, 86.05, 23.67, '2022-10-24'),
(17, 756, 3, 67.87, 54, 656.78, 14.25, '2022-10-24'),
(18, 4534, 3, 5, 55, 55, 5, '2022-10-24'),
(19, 9655, 3, 4, 55, 55, 4, '2022-10-24'),
(20, 756, 3, 10.25, 25, 10.87, 12.36, '2022-10-24'),
(21, 756, 2, 76.44, 67, 76.47, 67.365, '2022-10-24'),
(22, 1234, 3, 12, 3, 3, 2, '2022-10-26'),
(23, 1234, 3, 23, 12, 45, 34, '2022-10-26'),
(24, 4534, 3, 4, 4, 4, 4, '2022-10-27'),
(25, 4354, 3, 6, 5, 4, 3, '2022-10-27'),
(26, 999, 3, 14, 14, 1414, 14, '2022-10-27'),
(28, 1425, 3, 32, 3, 3, 21, '2022-10-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id` int(20) NOT NULL,
  `codigo` int(11) NOT NULL,
  `lebrija` float NOT NULL,
  `cristalina` float NOT NULL,
  `villa_mercedes` float NOT NULL,
  `manzana_blanca` float NOT NULL,
  `peso` float NOT NULL,
  `codigo_lote_anterior` int(11) NOT NULL,
  `fecha_recepcion` date NOT NULL DEFAULT current_timestamp(),
  `peso_lote_anteior` float NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  `fecha_fabricacion` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`id`, `codigo`, `lebrija`, `cristalina`, `villa_mercedes`, `manzana_blanca`, `peso`, `codigo_lote_anterior`, `fecha_recepcion`, `peso_lote_anteior`, `estado`, `fecha_fabricacion`, `fecha_vencimiento`) VALUES
(1, 756, 568, 0, 0, 0, 634.9, 6766, '2022-10-24', 67.25, 5, NULL, NULL),
(2, 4354, 25, 0, 0, 0, 25.22, 0, '2022-10-24', 0, 2, '2022-10-27', '2023-02-27'),
(3, 9655, 86, 0, 0, 0, 101.84, 9654, '2022-10-24', 15.63, 5, NULL, NULL),
(4, 4534, 23, 0, 0, 0, 0, 0, '2022-10-24', 0, 3, '2022-10-27', '2023-02-27'),
(5, 1425, 14, 0, 0, 0, 14.22, 0, '2022-10-24', 0, 2, NULL, NULL),
(6, 675, 14, 5, 1, 44, 64.69, 0, '2022-10-24', 0, 5, NULL, NULL),
(7, 890, 1425, 0, 0, 0, 1427.22, 890, '2022-10-24', 2.22, 5, NULL, NULL),
(9, 564, 77.68, 0, 0, 0, 77.68, 0, '2022-10-24', 0, 5, NULL, NULL),
(10, 1234, 21.76, 0, 23.58, 0, 90.34, 1233, '2022-10-26', 45, 4, '2022-10-26', '2023-02-26'),
(11, 999, 12.5, 0, 0, 0, 22.5, 342, '2022-10-27', 10, 4, '2022-10-27', '2023-02-27'),
(12, 1111, 21.9, 0, 0, 0, 21.9, 0, '2022-10-27', 0, 1, NULL, NULL),
(13, 5, 25, 0, 0, 0, 25, 0, '2022-10-27', 0, 1, NULL, NULL),
(14, 55, 2542, 0, 0, 0, 2542, 0, '2022-10-27', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_arequipe`
--

CREATE TABLE `reporte_arequipe` (
  `id` int(20) NOT NULL,
  `codigo_lote` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `leche` float NOT NULL,
  `azucar` float NOT NULL,
  `botes_marmitas` float NOT NULL,
  `botes_pailas` float NOT NULL,
  `tabla_extrafino` float NOT NULL,
  `tabla_bocadillo` float NOT NULL,
  `fecha_fabricacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reporte_arequipe`
--

INSERT INTO `reporte_arequipe` (`id`, `codigo_lote`, `id_empleado`, `leche`, `azucar`, `botes_marmitas`, `botes_pailas`, `tabla_extrafino`, `tabla_bocadillo`, `fecha_fabricacion`) VALUES
(1, 9655, 3, 2, 1, 3, 4, 5, 6, '2022-10-27'),
(2, 756, 3, 1.4, 4.3, 6.3, 9.65, 6.45, 1.65, '2022-10-27'),
(3, 9655, 3, 14.2, 42.6, 41.5, 487.4, 4.4, 25.4, '2022-10-27'),
(4, 756, 3, 10.5, 12.4, 0, 0, 45.2, 41.4, '2022-10-27'),
(5, 9655, 3, 7678, 67867, 67867, 8678, 67867, 678, '2022-10-27'),
(6, 4534, 3, 3, 1, 313, 1, 23, 132, '2022-10-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_bocadillo`
--

CREATE TABLE `reporte_bocadillo` (
  `id` int(20) NOT NULL,
  `codigo_lote` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `recortes` float NOT NULL,
  `botes_marmitas` float NOT NULL,
  `azucar` float NOT NULL,
  `devolucion_tablas` float NOT NULL,
  `botes_pailas` float NOT NULL,
  `brix` float NOT NULL,
  `tabla_extrafino` float NOT NULL,
  `tabla_bocadillos` float NOT NULL,
  `tabla_lonja` float NOT NULL,
  `tabla_manzana` float NOT NULL,
  `fecha_fabricacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reporte_bocadillo`
--

INSERT INTO `reporte_bocadillo` (`id`, `codigo_lote`, `id_empleado`, `recortes`, `botes_marmitas`, `azucar`, `devolucion_tablas`, `botes_pailas`, `brix`, `tabla_extrafino`, `tabla_bocadillos`, `tabla_lonja`, `tabla_manzana`, `fecha_fabricacion`) VALUES
(1, 9655, 3, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, '2022-10-27'),
(2, 756, 3, 21, 43, 4, 4, 45, 23, 78, 87, 45, 86, '2022-10-27'),
(3, 9655, 3, 32423, 423, 2342, 4234, 34, 234234, 234, 23423, 42, 342, '2022-10-27'),
(4, 756, 3, 234, 234, 234, 23423, 24324, 4, 234, 23423, 234, 232, '2022-10-27'),
(5, 9655, 3, 678, 77, 687, 6, 8, 78, 768, 76, 76, 76, '2022-10-27'),
(6, 756, 3, 657, 6756, 5675, 5675, 7657, 6756, 5675680, 567567, 567, 567, '2022-10-27'),
(7, 9655, 3, 768, 7687, 67, 876, 867, 7, 6786, 76, 768, 67867, '2022-10-27'),
(8, 756, 3, 678, 78, 678678, 786, 678, 678, 67, 678, 678, 678, '2022-10-27'),
(9, 9655, 3, 6, 66, 7, 7, 6, 5, 76, 5, 76, 56, '2022-10-27'),
(10, 9655, 3, 67, 6766, 6, 767, 7, 76, 7, 676, 67, 67, '2022-10-27'),
(11, 756, 3, 567, 5675, 567756, 56756, 567, 6567, 567, 567, 657, 67, '2022-10-27'),
(12, 756, 3, 76, 5656, 756, 567, 756, 56756, 756, 567, 756, 567, '2022-10-27'),
(13, 9655, 3, 675, 67, 567567, 567, 7567, 56756, 756, 756, 756, 56756, '2022-10-27'),
(14, 1234, 3, 3, 32, 23, 4, 2, 4, 3, 2, 14, 4, '2022-10-27'),
(17, 4534, 3, 21, 12, 2131, 3, 0, 12, 3, 66, 45, 6, '2022-10-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_espejuelo`
--

CREATE TABLE `reporte_espejuelo` (
  `id` int(20) NOT NULL,
  `codigo_lote` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `azucar` float NOT NULL,
  `aceite_oliva` float NOT NULL,
  `pectina` float NOT NULL,
  `botes_marmitas` float NOT NULL,
  `botes_pailas` float NOT NULL,
  `brix` float NOT NULL,
  `redonda` float NOT NULL,
  `tabla_metalica` float NOT NULL,
  `fecha_fabricacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reporte_espejuelo`
--

INSERT INTO `reporte_espejuelo` (`id`, `codigo_lote`, `id_empleado`, `azucar`, `aceite_oliva`, `pectina`, `botes_marmitas`, `botes_pailas`, `brix`, `redonda`, `tabla_metalica`, `fecha_fabricacion`) VALUES
(1, 9655, 3, 1, 23, 3, 4, 5, 6, 8, 7, '2022-10-27'),
(2, 756, 3, 1, 2, 3, 4, 5, 6, 8, 7, '2022-10-27'),
(3, 9655, 3, 1.23, 23.2, 32.6, 2.3, 32.2, 520.5, 534.5, 5.4, '2022-10-27'),
(4, 9655, 3, 2.22, 3.63, 4.44, 1.552, 45.11, 12.445, 14.54, 12.44, '2022-10-27'),
(5, 9655, 3, 6756, 756756, 6575, 7567, 756, 56756, 7567, 56756, '2022-10-27'),
(6, 9655, 3, 56567, 567, 567, 56756, 567565, 56756, 567, 67, '2022-10-27');

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
(4, 'carlos', 'perez', '13121321', '2222', 2, 2222, 0);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `embalaje_empaque`
--
ALTER TABLE `embalaje_empaque`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `embalaje_encabezado`
--
ALTER TABLE `embalaje_encabezado`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `escaldado`
--
ALTER TABLE `escaldado`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `reporte_arequipe`
--
ALTER TABLE `reporte_arequipe`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `reporte_bocadillo`
--
ALTER TABLE `reporte_bocadillo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `reporte_espejuelo`
--
ALTER TABLE `reporte_espejuelo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
