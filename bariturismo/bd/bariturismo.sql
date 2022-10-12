-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2022 a las 16:37:28
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
-- Base de datos: `bariturismo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `municipio` varchar(20) NOT NULL,
  `sesion` varchar(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `coordenadas_x` varchar(300) NOT NULL,
  `coordenadas_y` varchar(300) NOT NULL,
  `facebook` varchar(300) NOT NULL,
  `instagram` varchar(300) NOT NULL,
  `imagen1` varchar(300) NOT NULL,
  `imagen2` varchar(300) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `municipio`, `sesion`, `nombre`, `descripcion`, `direccion`, `coordenadas_x`, `coordenadas_y`, `facebook`, `instagram`, `imagen1`, `imagen2`, `estado`) VALUES
(144, 'villanueva', 'restaurantes', 'RESTAURANTE VILLA CHALA, Villanueva ', 'Exquisitos platos típicos Santandereanos y un cómodo ambiente familiar. Estamos ubicados en Villanueva Santander, pueblo donde los viajeros se deleitan con sus hermosos miradores y paisajes.', 'Calle 15 #15 Par, Villanueva - Santander', '6.6734370001342525', '-73.17575723852006', 'Calle 15 #15 Par, Villanueva - Santander', 'Calle 15 #15 Par, Villanueva - Santander', '../images/villanueva/restaurantes/1665522528.jpg', '../images/villanueva/restaurantes/1665522529.jpg', 1),
(147, 'barichara', 'historia', 'salto del mico', 'mirador', '', '6.629414158584638', '-73.2289606354059', '', '', '../images/barichara/historia/1665521851.jpg', '../images/barichara/historia/1665521852.jpg', 1),
(148, 'barichara', 'restaurantes', 'gringo mike\'s', 'comidas rapidas', 'carrera 2 #12-11', '6.635386893907165', '-73.22250324301513', 'https://www.facebook.com/gringomikes/', 'https://www.instagram.com/gringomikes/?hl=es', '../images/barichara/restaurantes/1665522149.png', '../images/barichara/restaurantes/1665522150.jpg', 1),
(149, 'barichara', 'hospedajes', 'Casa Oniri Hotel Boutique', 'Reserva Casa Oniri Hotel Boutique, Barichara. ¡Precios increíbles y sin cargos!. Lee opiniones reales. Hablamos tu idioma. Ofertas secretas. Confirmación inmediata. Ahorra.', 'carrera 23-21', '6.636641657743894', '-73.22381289022051', 'https://es-la.facebook.com/CasaOniri', 'https://es-la.facebook.com/CasaOniri', '../images/barichara/hospedajes/1665522341.jpg', '../images/p2.jpg', 1),
(150, 'villanueva', 'historia', 'catedral de villanueva santander', 'catedral de villanueva', '', '6.672221456361731', '-73.17542892340109', '', '', '../images/villanueva/historia/1665523025.jpg', '../images/villanueva/historia/1665523026.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `rol` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `pass`, `rol`) VALUES
(1, 'user_prueba', 'pass_2002', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
