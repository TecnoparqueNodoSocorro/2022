-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2022 a las 22:24:06
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
-- Base de datos: `laboratorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anexos`
--

CREATE TABLE `anexos` (
  `id` int(11) NOT NULL,
  `id_equipo` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `documento` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nit` varchar(50) NOT NULL,
  `rep_legal` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `id_cargo` int(1) NOT NULL DEFAULT 3,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `nit`, `rep_legal`, `ciudad`, `direccion`, `telefono`, `email`, `clave`, `logo`, `id_cargo`, `estado`) VALUES
(1, 'cliente', '534534534 ', 'yuiyuyuiuy', 'yuiyui', 'yuiyuiyu', '76867867', 'uiuyiyuiyu@fsefesdfds', '5555', '../../images/logos/1668026236.png', 3, 1),
(2, 'cliente 2', '567565-4', '7567', '75675', '67567', '567567', '456@sdfsdfsdf', '6666', '../../images/logos/1668009525.jpg', 3, 1),
(3, '345345', '3453', '4534', '345', '345', '345', '345@dgty', '4444', '../../images/logos/logostock.jpg', 3, 1),
(4, 'rty', 'tryrt', 'ytr', 'tryrt', 'tryrty', '45645', '456@sdfsdfsdf', 'tttt', '../../images/logos/logostock.jpg', 3, 1),
(5, 'tyuty', 'utyu', 'tyuty', 'tyu', 'yuty', '45645', 'retertre@setfdsfsd', '6666', '../../images/logos/logostock.jpg', 3, 1),
(6, 'hhh', 'hhh', 'hh', 'hhh', 'hhh', '45645', '456@sdfsdfsdf', '4444', '../../images/logos/logostock.jpg', 3, 1),
(7, 'eww', 'werwe', 'rwer', 'werwe', 'rwe', '23423', '456@sdfsdfsdf', '3333', '../../images/logos/logostock.jpg', 3, 1),
(8, 'ghfhfg', 'hfghfg', 'hfg', 'fgh', 'fgh', '5674676', '456@sdfsdfsdf', 'jjjj', '../../images/logos/logostock.jpg', 3, 1),
(9, 'uytu', 'tyuyt', 'tyuty', 'utyuty', 'gyyt', '567', '456@sdfsdfsdf', '6666', '../../images/logos/logostock.jpg', 3, 1),
(10, '6', '6', '6', '6', '678676', '6', '456@sdfsdfsdf', '6', '../../images/logos/logostock.jpg', 3, 1),
(11, 'reter', 'terte', 'ter', 'terter', 'ter', '56', '456@sdfsdfsdf', '66', '../../images/logos/logostock.jpg', 3, 1),
(12, '768', '67867', '867', '678', '678', '678', 'retertre@setfdsfsd', '7', '../../images/logos/logostock.jpg', 3, 1),
(13, '678', '67867', '678', '678', '7867', '67867', '456@sdfsdfsdf', '777', '../../images/logos/logostock.jpg', 3, 1),
(14, '9', '9', '9', '9', '9', '9', 'erreter@fd', '9', '../../images/logos/logostock.jpg', 3, 1),
(15, '3', '3', '3', '3', '3', '3', '3@das', '3', '../../images/logos/1669217468.jpg', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes_asociados`
--

CREATE TABLE `componentes_asociados` (
  `id` int(11) NOT NULL,
  `id_cliente` varchar(50) NOT NULL,
  `id_equipo` varchar(50) NOT NULL,
  `componente` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `serie` varchar(50) NOT NULL,
  `cod_iden` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `componentes_asociados`
--

INSERT INTO `componentes_asociados` (`id`, `id_cliente`, `id_equipo`, `componente`, `marca`, `modelo`, `serie`, `cod_iden`) VALUES
(19, '1', '66', '34', '435', '345', '345', '345'),
(20, '1', '66', '534', '43', '5', '345', '34'),
(21, '', '66', 'comp', 'asus', '24132', 'serie-3545', '445'),
(22, '', '66', 'r', 'r', 'r', 'r', 'r'),
(23, '', '67', 'dfg', 'fdgfd', 'gdf', 'gdfg', 'dfg'),
(24, '', '67', '45334', '5345', '34534', '534534', '5345345'),
(25, '', '68', '45334', '5345', '34534', '534534', '5345345'),
(26, '1', '69', 'uy', 't', 'u', 'yuty', 'tyyu'),
(27, '1', '70', 'ghf', 'fg', 'hfg', 'hfg', 'fgh'),
(28, '1', '71', 'fgh', 'fgh', 'fghfg', 'fg', 'fgh'),
(29, '1', '71', 'mouse', 'kdfjghkfd', '974358', '392000', '542'),
(30, '1', '72', 'fsd', 's', 'dfsd', 'dfs', 'sdf'),
(31, '1', '72', 'sd', 'sd', 'sdf', 'f', 'sdf'),
(32, '1', '73', '567', '56', '7', '56', '567'),
(33, '1', '74', '678', '67', '78', '86', '678'),
(34, '1', '74', 'prueba editar', '687', '8678', '7', '76867'),
(35, '2', '75', 'ert', 'ert', 'ert', 'erter', 'erter');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `numero_documento` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `numero_telefono` varchar(20) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `id_cargo` int(1) NOT NULL DEFAULT 2,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombres`, `apellidos`, `numero_documento`, `correo`, `numero_telefono`, `clave`, `id_cargo`, `estado`) VALUES
(1, 'pedro', 'user', '465465464', 'correo edit@editprueba', '4543534', '1111', 2, 1),
(2, 'admin', 'user', '987654321', '', '0000000', '4765', 1, 1),
(3, 'usuario', 'usuario', '534534534', '', '34534534', '5555', 2, 1),
(4, '456', '45546', '324234234', '45645@dtgrdfgfd', '45645', '3333', 2, 1),
(5, 'ghfgh', 'fghfg', '5645645', '546456456', '64564564', '6666', 2, 1),
(6, 'd32423423', '423423', '42342342', '34234', '4234', '33333333', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_limpieza`
--

CREATE TABLE `proceso_limpieza` (
  `id` int(11) NOT NULL,
  `id_cliente` varchar(50) NOT NULL,
  `id_equipo` varchar(100) NOT NULL,
  `proceso` varchar(50) NOT NULL,
  `metodo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proceso_limpieza`
--

INSERT INTO `proceso_limpieza` (`id`, `id_cliente`, `id_equipo`, `proceso`, `metodo`) VALUES
(3, '1', '<br />\n<b>Warning</b>:  imagecreatefrompng(): \'C:\\xampp\\tmp\\php90A8.tmp\' is not a valid PNG file in ', 'Limpieza', '45645645645645'),
(4, '1', '<br />\n<b>Warning</b>:  imagecreatefrompng(): \'C:\\xampp\\tmp\\php90A8.tmp\' is not a valid PNG file in ', 'Desinfeccion', '45645645645'),
(5, '', '64', 'Limpieza', '5654645'),
(6, '', '64', 'Desinfeccion', '645645645'),
(7, '1', '66', 'Limpieza', '34534'),
(8, '1', '66', 'Desinfeccion', '34534'),
(9, '1', '69', 'Limpieza', 'tyuty'),
(10, '1', '69', 'Desinfeccion', 'tyutyu'),
(11, '1', '70', 'Limpieza', 'fhghfghfg'),
(12, '1', '70', 'Esterilizacion', 'fghfghfg'),
(13, '1', '71', 'Limpieza', 'fdhgfhgfg'),
(14, '1', '71', 'Desinfeccion', 'g765657567'),
(15, '1', '71', 'Esterilizacion', 'fghfg57656'),
(16, '1', '72', 'Limpieza', 'sfdfsd'),
(17, '1', '72', 'Desinfeccion', 'sdfsdfsd'),
(18, '1', '73', 'Desinfeccion', '567567'),
(19, '1', '73', 'Esterilizacion', '56756756'),
(20, '1', '74', 'Limpieza', '678'),
(21, '1', '74', 'Desinfeccion', '678'),
(22, '1', '74', 'Esterilizacion', '6786'),
(23, '2', '75', 'Limpieza', '34534534534'),
(24, '2', '75', 'Esterilizacion', '534534534');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_equipo`
--

CREATE TABLE `registro_equipo` (
  `id` int(11) NOT NULL,
  `id_cliente` varchar(20) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `fabricante` varchar(50) NOT NULL,
  `serie` varchar(20) NOT NULL,
  `lote` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `equipo` varchar(50) NOT NULL,
  `claficacion_bio` varchar(50) NOT NULL,
  `doc_sanitario` varchar(20) NOT NULL,
  `clasif_riesgo` varchar(20) NOT NULL,
  `pqs_oms` varchar(20) NOT NULL,
  `codigo_umdns` varchar(20) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `uso_previsto` varchar(200) NOT NULL,
  `fuente_alimentacion` varchar(50) NOT NULL,
  `tec_predominante` varchar(50) NOT NULL,
  `tension` varchar(50) NOT NULL,
  `corriente` varchar(50) NOT NULL,
  `potencia` varchar(50) NOT NULL,
  `temperatura` varchar(50) NOT NULL,
  `humedad` varchar(50) NOT NULL,
  `peso` varchar(50) NOT NULL,
  `dimensiones` varchar(100) NOT NULL,
  `otro` varchar(200) NOT NULL,
  `magnitud` varchar(100) NOT NULL,
  `unidad_medida` varchar(100) NOT NULL,
  `intervalo` varchar(100) NOT NULL,
  `division_escala` varchar(100) NOT NULL,
  `tipo_indicacion` varchar(100) NOT NULL,
  `clase` varchar(100) NOT NULL,
  `forma_adq` varchar(100) NOT NULL,
  `doc_adq` varchar(100) NOT NULL,
  `estado_adq` varchar(100) NOT NULL,
  `f_fabricacion` date NOT NULL,
  `f_adq` date NOT NULL,
  `f_recepcion` date NOT NULL,
  `f_instal` date NOT NULL,
  `f_venc_garantia` date NOT NULL,
  `costo` varchar(100) NOT NULL,
  `vida_util` int(10) NOT NULL,
  `proveedor` varchar(100) NOT NULL,
  `tipo_intervencion` varchar(50) NOT NULL,
  `recurso_humano` varchar(50) NOT NULL,
  `frecuencia` varchar(50) NOT NULL,
  `metodo_desecho` varchar(200) NOT NULL,
  `responsable` varchar(100) NOT NULL,
  `recomendaciones` varchar(1000) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro_equipo`
--

INSERT INTO `registro_equipo` (`id`, `id_cliente`, `ubicacion`, `nombre`, `codigo`, `marca`, `modelo`, `fabricante`, `serie`, `lote`, `tipo`, `equipo`, `claficacion_bio`, `doc_sanitario`, `clasif_riesgo`, `pqs_oms`, `codigo_umdns`, `imagen`, `uso_previsto`, `fuente_alimentacion`, `tec_predominante`, `tension`, `corriente`, `potencia`, `temperatura`, `humedad`, `peso`, `dimensiones`, `otro`, `magnitud`, `unidad_medida`, `intervalo`, `division_escala`, `tipo_indicacion`, `clase`, `forma_adq`, `doc_adq`, `estado_adq`, `f_fabricacion`, `f_adq`, `f_recepcion`, `f_instal`, `f_venc_garantia`, `costo`, `vida_util`, `proveedor`, `tipo_intervencion`, `recurso_humano`, `frecuencia`, `metodo_desecho`, `responsable`, `recomendaciones`, `estado`) VALUES
(64, '1', '18', 'maquina14', '453', 'asus', '45', 'carro', '3', '23', '', '', '', '', '', '', '', '../../images/registro_equipo/1669237500.jpg', '', '43534', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', '', '', '', '43534534', 0),
(65, '2', '2', '4maquina1', '', '', '', '', '', '', '', '', '', '', '', '', '', '../../images/registro_equipo/1669236664.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', '', '', '', 'bcvbcvbcvbcvcvbc', 1),
(66, '2', '1', 'maquina13', '', '', '', '', '', '', '', '', '', '', '', '', '', '../../images/registro_equipo/1669236552.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', '', '', '', 'hjgfhgfhfg', 1),
(67, '2', '3', 'maquina12', '', '', '', '', '', '', '', '', '', '', '', '', '', '../../images/registro_equipo/1669236483.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', '', '', '', 'bvvbcvbcv', 1),
(70, '1', '11', 'maquina15', '', '', '', '', '', '', '', '', '', '', '', '', '', '../../images/registro_equipo/1669295774.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'fghf', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', 'Mantenimiento Preventivo', 'Interno', '', 'fghgf', 'fgh', 'fghfgh', 1),
(71, '1', '17', 'fgh', '', '', '', '', '', '', '', '', '', '', '', '', '', '../../images/registro_equipo/1669295891.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', '', '', '', 'crece', 1),
(72, '1', '20', 'maquina16', '', '', '', '', '', '', '', '', '', '', '', '', '', '../../images/registro_equipo/1669296541.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', '', 'sdf', 'sdf', '', 1),
(73, '1', '16', 'maquina17', '', '', '', '', '', '', '', '', '', '', '', '', '', '../../images/registro_equipo/1669296678.jpg', '', '', '', '', '', '', '', '', '', '567', '567', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', '', '', '', '', 1),
(74, '1', '21', '8maquina1', '', '', '', '', '', '', '', '', '', '', '', '', '', '../../images/registro_equipo/1669296750.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '678', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', 'Mantenimiento Preventivo', 'Interno', '67', '', '', '', 1),
(75, '2', '3', 'equipo', '4324', 'amrca', '45', 'carros', '33gh6', '324', 'caro', 'Móvil', 'RH', 'PC', 'IIA', '09923922', '2255655414', '../../images/registro_equipo/1669322390.jpg', 'este equipo es para sjdhfsdkjhgsdijhfskdhfdsf', '345', '5', '345', '345', '45334', '4', '44', '443', '5', '534', '4', '34', '43', '43', '34', '4', 'Compra', '435', 'Usado', '2022-11-03', '2022-11-08', '2022-11-24', '2022-12-07', '2022-11-29', '43345344', 35, '4', 'Mantenimiento Preventivo', 'Interno', '4', '4345345', 'werwerwerwe', 'werwerwerwerwerwerewr b wetrwerwerwe werwerwe', 1),
(76, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '../../images/registro_equipo/imagen_defecto.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', '', '', '', 'yuiyuiyu', 1),
(77, '', '', '', '', 'etr', 'erter', '', 'erter', '', '', '', '', '', '', '', '', '../../images/registro_equipo/imagen_defecto.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', '', '', '', 'erter', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `riesgos_asociados`
--

CREATE TABLE `riesgos_asociados` (
  `id` int(11) NOT NULL,
  `id_cliente` varchar(50) NOT NULL,
  `id_equipo` varchar(50) NOT NULL,
  `riesgo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `riesgos_asociados`
--

INSERT INTO `riesgos_asociados` (`id`, `id_cliente`, `id_equipo`, `riesgo`) VALUES
(35, '', '65', 'Riesgo de atrapamiento'),
(36, '', '65', 'Riesgo específico'),
(37, '', '65', 'Riesgo de punción'),
(38, '', '65', 'Riesgo quemaduras'),
(39, '', '65', 'Riesgo láser'),
(40, '1', '66', 'Riesgo biológico'),
(41, '1', '66', 'Riesgo de atrapamiento'),
(42, '1', '66', 'Riesgo específico'),
(43, '1', '69', 'Riesgo biológico'),
(44, '1', '69', 'Riesgo de atrapamiento'),
(45, '1', '70', 'Riesgo biológico'),
(46, '1', '70', 'Riesgo de atrapamiento'),
(47, '1', '70', 'Riesgo específico'),
(48, '1', '71', 'Riesgo biológico'),
(49, '1', '71', 'Riesgo de atrapamiento'),
(50, '1', '71', 'Riesgo específico'),
(51, '1', '71', 'Riesgo de punción'),
(52, '1', '71', 'Riesgo quemaduras'),
(53, '1', '72', 'Riesgo biológico'),
(54, '1', '72', 'Riesgo de atrapamiento'),
(55, '1', '72', 'Riesgo específico'),
(56, '1', '72', 'Riesgo de punción'),
(57, '1', '72', 'Riesgo quemaduras'),
(58, '1', '73', 'Riesgo quemaduras'),
(59, '1', '73', 'Riesgo láser'),
(60, '1', '73', 'Riesgo eléctrico'),
(61, '1', '73', 'Riesgo de congelamiento'),
(62, '1', '74', 'Riesgo eléctrico'),
(63, '1', '74', 'Riesgo de congelamiento'),
(64, '2', '75', 'Riesgo de punción'),
(65, '2', '75', 'Riesgo quemaduras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciones`
--

CREATE TABLE `ubicaciones` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ubicaciones`
--

INSERT INTO `ubicaciones` (`id`, `id_cliente`, `nombre`) VALUES
(1, 1, '2'),
(2, 1, 'editar '),
(3, 2, 'sala 5 edit 2'),
(4, 2, 'urgencias edit2'),
(5, 1, 'sala 45'),
(6, 1, 'sala 52'),
(7, 2, 'sala 7 edit'),
(8, 0, '2'),
(9, 0, '44'),
(10, 1, '666'),
(11, 1, '56553'),
(12, 1, '666'),
(13, 1, '76'),
(14, 1, '64'),
(15, 1, '45'),
(16, 1, '63kjnjn6787'),
(17, 1, 'ojo'),
(18, 1, 'prueba editar'),
(19, 1, 'prueba agregar'),
(20, 1, 'prueba fin editar'),
(21, 1, 'agregar emp edit');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anexos`
--
ALTER TABLE `anexos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `componentes_asociados`
--
ALTER TABLE `componentes_asociados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proceso_limpieza`
--
ALTER TABLE `proceso_limpieza`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_equipo`
--
ALTER TABLE `registro_equipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `riesgos_asociados`
--
ALTER TABLE `riesgos_asociados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anexos`
--
ALTER TABLE `anexos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `componentes_asociados`
--
ALTER TABLE `componentes_asociados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proceso_limpieza`
--
ALTER TABLE `proceso_limpieza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `registro_equipo`
--
ALTER TABLE `registro_equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `riesgos_asociados`
--
ALTER TABLE `riesgos_asociados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
