-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2022 a las 22:41:53
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
(1, 1, 5323, 6, 55),
(2, 1, 5323, 3, 434),
(3, 1, 5323, 4, 54),
(4, 1, 5323, 2, 45),
(5, 1, 5323, 1, 54),
(6, 2, 7878, 12, 456),
(7, 3, 789, 13, 456),
(8, 4, 5323, 13, 54),
(9, 4, 5323, 21, 545),
(10, 5, 1233, 3, 100),
(11, 5, 1233, 2, 24),
(12, 6, 1233, 22, 22),
(13, 6, 1233, 24, 20),
(14, 7, 5323, 6, 6);

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
(1, 5323, 3, 54, 54, 55, 5, 54, 5, '2022-11-02', '2023-03-02', '2022-11-02'),
(2, 7878, 3, 554645, 456, 64564, 456456, 65, 456, '2022-11-02', '2023-03-02', '2022-11-02'),
(3, 789, 3, 546, 45, 456, 56, 45456, 456, '2022-11-02', '2023-03-02', '2022-11-02'),
(4, 5323, 3, 45, 45, 45, 45, 45, 45, '2022-11-02', '2023-03-02', '2022-11-02'),
(5, 1233, 3, 3, 1900, 0, 1000, 3, 0, '2022-11-11', '2023-02-11', '2022-11-11'),
(6, 1233, 8, 3, 4, 0, 1, 2, 3, '2022-11-11', '2023-02-11', '2022-11-11'),
(7, 5323, 3, 6, 66, 6, 6, 6, 6, '2022-11-02', '2023-03-02', '2022-11-11');

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
(1, 5323, 3, 34, 543, 56, 65, '2022-11-02'),
(2, 789, 3, 645, 56, 45, 456, '2022-11-02'),
(3, 7897, 3, 546, 4545, 456, 54645, '2022-11-02'),
(4, 7878, 3, 3453, 453, 45343, 45, '2022-11-02'),
(5, 1233, 3, 12.52, 200, 20, 10, '2022-11-11'),
(6, 1233, 3, 0, 100, 0, 0, '2022-11-11'),
(7, 1233, 8, 1, 1, 5, 0, '2022-11-11'),
(8, 1233, 8, 1, 1, 5, 0, '2022-11-11'),
(9, 5465464, 3, 6, 6, 6, 6, '2022-11-11'),
(10, 645645, 3, 6, 6, 6, 6, '2022-11-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id` int(20) NOT NULL,
  `id_usuario` int(11) NOT NULL,
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

INSERT INTO `lote` (`id`, `id_usuario`, `codigo`, `lebrija`, `cristalina`, `villa_mercedes`, `manzana_blanca`, `peso`, `codigo_lote_anterior`, `fecha_recepcion`, `peso_lote_anteior`, `estado`, `fecha_fabricacion`, `fecha_vencimiento`) VALUES
(1, 3, 5323, 323, 0, 0, 0, 323, 0, '2022-11-02', 0, 4, '2022-11-02', '2023-03-02'),
(2, 3, 5465464, 4564, 0, 0, 0, 4564, 0, '2022-11-02', 0, 3, '2022-11-15', '2023-04-15'),
(3, 3, 645645, 4564, 0, 0, 0, 4564, 0, '2022-11-02', 0, 2, NULL, NULL),
(4, 3, 7878, 97897, 0, 0, 0, 97987, 87, '2022-11-02', 90, 5, '2022-11-02', '2023-03-02'),
(5, 3, 7897, 789, 0, 0, 0, 789, 0, '2022-11-02', 0, 3, '2022-11-15', '2023-04-15'),
(6, 3, 789, 0, 0, 34, 0, 34, 0, '2022-11-02', 0, 5, '2022-11-02', '2023-03-02'),
(7, 3, 25236, 108.28, 149.42, 0, 0, 257.7, 0, '2022-11-04', 0, 1, NULL, NULL),
(8, 3, 1233, 10.44, 11.24, 12.22, 0, 56.58, 1232, '2022-11-11', 22.68, 4, '2022-11-11', '2023-02-11');

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
(1, 7897, 3, 32, 322, 323, 23, 32, 32, '2022-11-02'),
(2, 1233, 3, 16, 10, 1, 2, 0, 0, '2022-11-11');

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
  `botes_pailas` float NOT NULL,
  `brix` float NOT NULL,
  `tabla_extrafino` float NOT NULL,
  `tabla_bocadillos` float NOT NULL,
  `tabla_lonja` float NOT NULL,
  `tabla_manzana` float NOT NULL,
  `dev_tabla_extrafino` float NOT NULL,
  `dev_tabla_bocadillos` float NOT NULL,
  `dev_tabla_lonja` float NOT NULL,
  `dev_tabla_manzana` float NOT NULL,
  `adic_tabla_extrafino` float NOT NULL,
  `adic_tabla_bocadillos` float NOT NULL,
  `adic_tabla_lonja` float NOT NULL,
  `adic_tabla_manzana` float NOT NULL,
  `codigo_lote_adicion` int(11) NOT NULL,
  `fecha_fabricacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reporte_bocadillo`
--

INSERT INTO `reporte_bocadillo` (`id`, `codigo_lote`, `id_empleado`, `recortes`, `botes_marmitas`, `azucar`, `botes_pailas`, `brix`, `tabla_extrafino`, `tabla_bocadillos`, `tabla_lonja`, `tabla_manzana`, `dev_tabla_extrafino`, `dev_tabla_bocadillos`, `dev_tabla_lonja`, `dev_tabla_manzana`, `adic_tabla_extrafino`, `adic_tabla_bocadillos`, `adic_tabla_lonja`, `adic_tabla_manzana`, `codigo_lote_adicion`, `fecha_fabricacion`) VALUES
(1, 5323, 3, 4, 4, 45, 54, 5, 12, 7, 45, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-02'),
(2, 789, 3, 34534, 53, 45, 534, 4534, 435, 334, 45, 345, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-02'),
(3, 7878, 3, 345, 345, 345, 345, 34534, 334, 345345, 534345, 345, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-02'),
(4, 1233, 8, 200, 0, 1, 0, 72, 0, 10, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-11-11'),
(5, 7897, 3, 1, 2, 4, 5, 3, 6, 7, 8, 9, 11, 10, 12, 13, 14, 15, 16, 17, 0, '2022-11-12'),
(6, 7897, 3, 6, 78, 8, 58, 47, 69, 14, 25, 36, 47, 58, 698, 9, 8, 69, 82, 96, 0, '2022-11-11'),
(7, 7897, 3, 5464, 564, 645, 45, 5645, 456, 456, 45645, 645, 2000, 456, 2000, 6456, 45645, 45645, 645, 456, 2147483647, '2022-11-10'),
(8, 7897, 3, 5, 5, 5, 5, 55, 7, 7, 7, 7, 8, 8, 8, 8, 23, 23, 34, 43, 23, '2022-11-09'),
(9, 7897, 3, 3, 3, 33, 3, 3, 4, 34, 3, 44, 1, 2, 445, 54, 4, 44, 5, 55, 234, '2022-11-08'),
(10, 5465464, 3, 1, 2, 4, 5, 3, 2, 2, 10, 4, 1, 0, 1, 0, 0, 5, 0, 0, 97, '2022-11-15'),
(11, 7897, 3, 3, 1, 31, 1, 2, 2, 10, 0, 0, 0.5, 2, 0, 0, 0, 3.5, 0, 0, 9645, '2022-11-15');

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
(1, 7897, 3, 23, 23, 2323, 23, 23, 23, 32, 23, '2022-11-02');

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
(1, 'Hector', 'Herrera', '56756', '75675676', 2, 3333, 0),
(2, 'Carlos', '456456', '2132', '123123', 2, 1111, 1),
(3, 'juan', 'sandoval', '312131131', '1111', 1, 1111, 1),
(4, 'carlos', 'perez', '13121321', '2222', 2, 2222, 1),
(8, 'Pedro', 'Rodriguez', '3122215221', '123456789', 2, 2222, 1);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `embalaje_empaque`
--
ALTER TABLE `embalaje_empaque`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `embalaje_encabezado`
--
ALTER TABLE `embalaje_encabezado`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `escaldado`
--
ALTER TABLE `escaldado`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `reporte_arequipe`
--
ALTER TABLE `reporte_arequipe`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reporte_bocadillo`
--
ALTER TABLE `reporte_bocadillo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `reporte_espejuelo`
--
ALTER TABLE `reporte_espejuelo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
