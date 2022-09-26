-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2022 a las 15:52:54
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
-- Base de datos: `baricharapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `session` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `item` varchar(50) NOT NULL,
  `imagen1` varchar(100) NOT NULL,
  `imagen2` varchar(100) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `id` int(11) NOT NULL,
  `sesion` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `item` varchar(50) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id`, `sesion`, `categoria`, `item`, `imagen`, `titulo`, `descripcion`, `estado`) VALUES
(21, 'menu2', 'planesyservicios', 'barichara', 'C:\\fakepath\\logohd.png', 'prueba edit', '7878', 0),
(22, 'menu3', 'enterate', 'hotelesdeensueno', 'C:\\fakepath\\logohd.png', '7878', '7878', 1),
(24, 'menu3', 'enterate', 'gastronomiabodas', 'C:\\fakepath\\Scanned-image31-05-2022-141827.pdf', 'prueba', 'prueba 2', 1),
(25, 'menu2', 'planesyservicios', 'planes', 'C:\\fakepath\\Scanned-image31-05-2022-141827.pdf', '23423', '4234', 1),
(26, 'menu', 'Diversion', 'planes', 'C:\\fakepath\\cafe.sql', 'titulo', 'desricpocion', 1),
(27, 'menu3', 'enterate', 'hotelesdeensueno', 'C:\\fakepath\\logohd.png', '7878', '7878', 1),
(28, 'menu3', 'enterate', 'hotelesdeensueno', 'C:\\fakepath\\logohd.png', '7878', '7878', 1),
(29, 'menu3', 'enterate', 'hotelesdeensueno', 'C:\\fakepath\\logohd.png', '7878', '7878', 1),
(30, 'menu2', 'planesyservicios', 'planes', 'C:\\fakepath\\logohd.png', '4534', 'yrtytfytr', 1),
(31, 'menu3', 'enterate', 'gastronomiabodas', 'C:\\fakepath\\Scanned-image31-05-2022-141827.pdf', 'prueba', 'prueba 2', 1),
(32, 'menu2', 'planesyservicios', 'planes', 'C:\\fakepath\\Scanned-image31-05-2022-141827.pdf', '23423', '4234', 1),
(33, 'menu', 'Diversion', 'planes', 'C:\\fakepath\\cafe.sql', 'titulo', 'desricpocion', 1),
(34, 'menu3', 'enterate', 'hotelesdeensueno', 'C:\\fakepath\\logohd.png', '7878', '7878', 1),
(35, 'menu3', 'enterate', 'hotelesdeensueno', 'C:\\fakepath\\logohd.png', '7878', '7878', 1),
(36, 'menu3', 'enterate', 'hotelesdeensueno', 'C:\\fakepath\\logohd.png', '7878', '7878', 1),
(37, 'menu2', 'planesyservicios', 'planes', 'C:\\fakepath\\logohd.png', '4534', 'yrtytfytr', 1),
(38, 'menu3', 'enterate', 'gastronomiabodas', 'C:\\fakepath\\Scanned-image31-05-2022-141827.pdf', 'prueba', 'prueba 2', 1),
(39, 'menu2', 'planesyservicios', 'planes', 'C:\\fakepath\\Scanned-image31-05-2022-141827.pdf', '23423', '4234', 1),
(40, 'menu', 'Diversion', 'planes', 'C:\\fakepath\\cafe.sql', 'titulo', 'desricpocion', 1),
(41, 'menu3', 'enterate', 'hotelesdeensueno', 'C:\\fakepath\\logohd.png', '7878', '7878', 1),
(42, 'menu3', 'enterate', 'hotelesdeensueno', 'C:\\fakepath\\logohd.png', '7878', '7878', 1),
(43, 'menu3', 'enterate', 'hotelesdeensueno', 'C:\\fakepath\\logohd.png', '7878', '7878', 1),
(44, 'menu2', 'planesyservicios', 'planes', 'C:\\fakepath\\logohd.png', '4534', 'yrtytfytr', 1),
(45, 'menu3', 'enterate', 'gastronomiabodas', 'C:\\fakepath\\Scanned-image31-05-2022-141827.pdf', 'prueba', 'prueba 2', 1),
(47, 'menu', 'Diversion', 'planes', 'C:\\fakepath\\cafe (1).sql', '2342332423', '324234', 1),
(48, 'menu', 'Diversion', 'pride', 'C:\\fakepath\\equipos.xlsx', '1242', '234234232423', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pg_categorias`
--

CREATE TABLE `pg_categorias` (
  `id` int(11) NOT NULL,
  `sesion` varchar(200) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `item` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pg_categorias`
--

INSERT INTO `pg_categorias` (`id`, `sesion`, `categoria`, `item`) VALUES
(1, 'menu', 'Diversion', 'planes'),
(2, 'menu', 'Diversion', 'eventos'),
(3, 'menu', 'Diversion', 'planes'),
(4, 'menu', 'Diversion', 'eventos'),
(5, 'menu', 'Diversion', 'pride'),
(6, 'menu', 'Diversion', 'festivales'),
(7, 'menu', 'Diversion', 'pride'),
(8, 'menu', 'Diversion', 'festivales'),
(9, 'menu', 'Diversion', 'cruceros'),
(10, 'menu', 'servicios', 'concierge'),
(11, 'menu', 'servicios', 'hoteles'),
(12, 'menu', 'servicios', 'concierge'),
(13, 'menu', 'servicios', 'hoteles'),
(14, 'menu', 'servicios', 'Oasis'),
(15, 'menu', 'servicios', 'autos'),
(16, 'menu', 'servicios', 'toures'),
(17, 'menu', 'servicios', 'autos'),
(18, 'menu', 'servicios', 'wedding'),
(19, 'menu2', 'planesyservicios', 'barichara'),
(20, 'menu2', 'planesyservicios', 'planes'),
(21, 'menu2', 'planesyservicios', 'barichara'),
(22, 'menu2', 'planesyservicios', 'planes'),
(23, 'menu2', 'planesyservicios', 'promociones'),
(24, 'menu2', 'planesyservicios', 'vacaciones'),
(25, 'menu2', 'planesyservicios', 'promociones'),
(26, 'menu2', 'planesyservicios', 'vacaciones'),
(27, 'menu2', 'planesyservicios', 'lunademiel'),
(28, 'menu2', 'planesyservicios', 'tour_de_entretenimiento'),
(29, 'menu2', 'planesyservicios', 'lunademiel'),
(30, 'menu2', 'planesyservicios', 'tour_de_entretenimiento'),
(31, 'menu2', 'planesyservicios', 'bodas'),
(32, 'menu2', 'planesyservicios', 'turismo'),
(33, 'menu3', 'enterate', 'propuestas_matrimonio'),
(34, 'menu3', 'enterate', 'cheffypasteleros'),
(35, 'menu3', 'enterate', 'propuestas_matrimonio'),
(36, 'menu3', 'enterate', 'cheffypasteleros'),
(37, 'menu3', 'enterate', 'hotelesdeensueno'),
(38, 'menu3', 'enterate', 'gastronomiabodas'),
(39, 'manu3', 'enterate', 'disenadores'),
(40, 'menu3', 'enterate', 'cruceros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `precio` int(11) NOT NULL,
  `img1` blob NOT NULL,
  `img2` blob NOT NULL,
  `descripcion` blob NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `idproveedor`, `idcategoria`, `nombre`, `precio`, `img1`, `img2`, `descripcion`, `estado`) VALUES
(8, 1, 2, 'prueba cambio', 54, '', '', 0x3435, 1),
(9, 1, 4, '77', 77, '', '', 0x3737, 1),
(10, 1, 10, 'tarjetas', 25000, '', '', 0x6465736372697063696f6e20707275656261, 1),
(12, 1, 2, '454', 54, '', '', 0x3435, 1),
(13, 1, 5, '3333', 3333, '', '', 0x33333333, 1),
(14, 1, 3, '¿\'', 86, '', '', 0x393937, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_categorias`
--

CREATE TABLE `product_categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `product_categorias`
--

INSERT INTO `product_categorias` (`id`, `nombre`) VALUES
(1, 'Iglesias, hoteles y bodas'),
(2, 'Maquillaje y peinado'),
(3, 'Iluminación sonido y animación'),
(4, 'Zapatos y recordatorios'),
(5, 'Planeadores de bodas'),
(6, 'Videos y fotografía'),
(7, 'Chef y pasteleros'),
(8, 'Anillos y accesorios'),
(9, 'Vestidos de novia y novio'),
(10, 'Tarjetas de invitación'),
(11, 'Bebidas y licores'),
(12, 'Floristería y decoración');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `nit` varchar(300) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(300) NOT NULL,
  `maxprod` int(10) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `descripcion` varchar(600) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `vigencia` date NOT NULL,
  `estado` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `pasww1` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `nit`, `telefono`, `correo`, `maxprod`, `direccion`, `descripcion`, `logo`, `vigencia`, `estado`, `usuario`, `pasww1`) VALUES
(1, 'juan', '323423', '', '', 0, 'SAN GIL', '', '', '2022-09-28', 1, 'judaver', '111'),
(2, 'tortax', '829001846-6', '314556343943', 'juan@gmail.com', 10, 'el socorro tecnoparque4', 'descripcion', '', '2022-09-07', 1, 'judaver', '2222'),
(3, '', '', '', '', 0, '', '', '', '2022-09-15', 1, 'judaver', '123456789'),
(4, 'datos de prueba', '829001846', '1244234', 'jdvertel@sena.edu.co', 2, 'datos de prueba', 'datos de prueba', '', '2022-08-03', 1, 'judaver', '123456789'),
(5, '', '', '', '', 0, '', '', '', '2022-09-30', 1, 'judaver', '123456789'),
(6, 'prueba4', '12345', '123123', 'prueba4@HOT.COM', 2, 'prueba4', 'prueba4\nprueba4\nprueba4\nprueba4\n', 'C:\\fakepath\\baricharapp.sql', '2022-08-11', 1, 'judaver', '12345'),
(7, 'rerre', 'erer', '', '', 0, '', 'prueba despues del if', '', '2022-09-28', 0, 'judaver', '123456'),
(8, 'tortas ', '23234234', '23234', 'jdvertel@sena.edu.co', 2, 'sdrsdr', 'sdrsdrererer', '', '2022-08-19', 0, 'judaver', '12345'),
(9, 'tortas ', '23234234', '23234', 'jdvertel@sena.edu.co', 2, 'sdrsdr', 'sdrsdrererer', '', '2022-08-19', 0, 'judaver', '12345'),
(10, 'proveedor nuevo1', '123456', '142536', 'jdvertel@sena.edu.co', 2, 'calle ', 'reseña', 'C:\\fakepath\\baricharapp.sql', '2022-08-11', 0, 'judaver', '4765'),
(11, 'DFDS', '829001846-6', '3432', 'jdvertel@sena.edu.co', 4, 'el socorro tecnoparque', 'DFSDFSDFSDF', '', '2022-09-30', 0, 'judaver', '123'),
(12, 'DFDS', '829001846-6', '3432', 'jdvertel@sena.edu.co', 4, 'el socorro tecnoparque', 'DFSDFSDFSDF', '', '2022-09-25', 0, 'judaver', '123'),
(13, 'DFDS', '829001846-6', '3432', 'jdvertel@sena.edu.co', 4, 'el socorro tecnoparque', 'DFSDFSDFSDF', '', '2022-09-30', 0, 'judaver', '123'),
(14, '', '', '', '', 0, '', '', '', '0000-00-00', 0, '', ''),
(15, '', '', '', '', 0, '', '', '', '0000-00-00', 0, '', ''),
(16, '32', '', '', '', 0, '', '', '', '0000-00-00', 0, '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pg_categorias`
--
ALTER TABLE `pg_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_categorias`
--
ALTER TABLE `product_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `pg_categorias`
--
ALTER TABLE `pg_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `product_categorias`
--
ALTER TABLE `product_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
