-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2022 a las 22:43:46
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
(16, '1', '<br />\n<b>Warning</b>:  imagecreatefrompng(): \'C:\\', 'fg', 'hfg', 'gh', 'hf', 'fg'),
(17, '1', '<br />\n<b>Warning</b>:  imagecreatefrompng(): \'C:\\', 'fgh', 'fg', 'hfg', 'hfg', 'hfgh'),
(18, '1', '<br />\n<b>Warning</b>:  imagecreatefrompng(): \'C:\\', 'fgh', 'fghfg', 'fg', 'h', 'fgh'),
(19, '1', '66', '34', '435', '345', '345', '345'),
(20, '1', '66', '534', '43', '5', '345', '34');

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
(8, '1', '66', 'Desinfeccion', '34534');

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
  `recomendaciones` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro_equipo`
--

INSERT INTO `registro_equipo` (`id`, `id_cliente`, `ubicacion`, `nombre`, `codigo`, `marca`, `modelo`, `fabricante`, `serie`, `lote`, `tipo`, `equipo`, `claficacion_bio`, `doc_sanitario`, `clasif_riesgo`, `pqs_oms`, `codigo_umdns`, `imagen`, `uso_previsto`, `fuente_alimentacion`, `tec_predominante`, `tension`, `corriente`, `potencia`, `temperatura`, `humedad`, `peso`, `dimensiones`, `otro`, `magnitud`, `unidad_medida`, `intervalo`, `division_escala`, `tipo_indicacion`, `clase`, `forma_adq`, `doc_adq`, `estado_adq`, `f_fabricacion`, `f_adq`, `f_recepcion`, `f_instal`, `f_venc_garantia`, `costo`, `vida_util`, `proveedor`, `tipo_intervencion`, `recurso_humano`, `frecuencia`, `metodo_desecho`, `responsable`, `recomendaciones`) VALUES
(58, '1', '12', 'tf', 'fg', '', '', 'fhg', '', 'fg', 'fgh', 'Móvil', 'DX', 'RS', 'IIA', 'fg', 'fgh', '../../images/registro_equipo/1669236230.png', 'fghfghfg', 'g', 'gg', '55', '5', '5', '33', '2', '6', '78', 'ythfghfg fghfghfg', '55', '456', '45', '645', '4', '3', 'Compra', 'trt', 'Nuevo', '2022-11-03', '2022-11-11', '2022-11-10', '2022-11-16', '2022-11-04', '546', 55, '4564', 'Metrología', 'Interno', '4', '54546', '35345dfgdfg fgfghfgh', 'ghfhgfghfgfgh fghfghfghfghfg'),
(59, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '../../images/registro_equipo/1669236344.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', '', '', '', '6867867'),
(60, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '../../images/registro_equipo/1669236430.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', '', '', '', 'gfgfdgd'),
(61, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '../../images/registro_equipo/1669236483.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', '', '', '', 'bvvbcvbcv'),
(62, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '../../images/registro_equipo/1669236552.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', '', '', '', 'hjgfhgfhfg'),
(63, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '../../images/registro_equipo/1669236664.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', '', '', '', 'bcvbcvbcvbcvcvbc'),
(64, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '../../images/registro_equipo/1669236990.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', '', '', '', 'fghfdgdfgf'),
(65, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '../../images/registro_equipo/1669237074.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', '', '', '', 'yhfgh'),
(66, '1', '18', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '../../images/registro_equipo/1669237500.jpg', '', '43534', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', '', '', '', '', '', '43534534');

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
(42, '1', '66', 'Riesgo específico');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proceso_limpieza`
--
ALTER TABLE `proceso_limpieza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `registro_equipo`
--
ALTER TABLE `registro_equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `riesgos_asociados`
--
ALTER TABLE `riesgos_asociados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
