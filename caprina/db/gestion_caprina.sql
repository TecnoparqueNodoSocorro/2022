-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2022 a las 23:55:56
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
  `codigo_caprino` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_tratamiento` int(11) NOT NULL,
  `estado` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `caprinos_en_tratamiento`
--

INSERT INTO `caprinos_en_tratamiento` (`id`, `id_usuario`, `codigo_caprino`, `id_tratamiento`, `estado`) VALUES
(61, 29, 'a23', 86, ''),
(62, 34, 'c33', 87, ''),
(63, 33, '4444', 88, ''),
(64, 29, 'a23', 89, ''),
(65, 29, 'a23', 90, ''),
(66, 29, 'a11', 91, ''),
(67, 29, '1', 91, ''),
(68, 29, 'hr23', 91, ''),
(69, 29, 'a11', 92, ''),
(70, 29, 'A20', 92, ''),
(71, 29, 'a22', 92, ''),
(72, 29, 'a23', 92, ''),
(73, 29, '23', 93, ''),
(74, 29, '434', 93, ''),
(75, 29, '75', 93, ''),
(76, 29, 'h47', 93, ''),
(77, 29, '434', 94, ''),
(78, 29, '23', 94, ''),
(79, 29, '75', 94, ''),
(80, 33, '2342', 95, ''),
(81, 29, 'h47', 104, ''),
(82, 29, 'h47', 105, ''),
(83, 29, 'c22', 105, ''),
(84, 29, 'c21', 105, ''),
(85, 29, '75', 105, ''),
(86, 29, '434', 105, ''),
(87, 29, '23', 105, ''),
(88, 29, 'h47', 106, ''),
(89, 29, '434', 106, ''),
(90, 29, '23', 106, ''),
(91, 29, 'c22', 107, ''),
(92, 29, '75', 107, ''),
(93, 29, '434', 107, ''),
(94, 29, '23', 107, ''),
(95, 29, 'h47', 108, ''),
(96, 29, 'c22', 108, ''),
(97, 29, 'c21', 108, ''),
(98, 29, 'asasfrtyrtyrt', 108, ''),
(99, 29, 'asasfrrtyr', 108, ''),
(100, 29, 'asasfrrerrtyrt', 108, ''),
(101, 29, 'asasfrrerefghfgtryrt', 108, ''),
(102, 29, 'asasfrrerefghfg', 108, ''),
(103, 29, 'asasfrrer', 108, ''),
(104, 29, 'asasfr', 108, ''),
(105, 29, 'asasfffrtyrt', 108, ''),
(106, 29, 'asasfffrrtyrt', 108, ''),
(107, 29, 'asasfffrrfghfgrtyrt', 108, ''),
(108, 29, 'asasfffrrfghfg', 108, ''),
(109, 29, 'asasfffrfghfgrtyrt', 108, ''),
(110, 29, 'asasfffrfghfg', 108, ''),
(111, 29, 'asasfffr', 108, ''),
(112, 29, 'asasfff', 108, ''),
(113, 29, 'asasf', 108, ''),
(114, 29, '75', 108, ''),
(115, 29, '434', 108, ''),
(116, 29, '23', 108, ''),
(117, 29, 'asasfrtyrtyrt', 109, ''),
(118, 29, 'asasfrrtyr', 109, ''),
(119, 29, 'asasfrrerrtyrt', 109, ''),
(120, 29, 'asasfrrerefghfgtryrt', 109, ''),
(121, 29, 'asasfrrerefghfg', 109, ''),
(122, 29, 'asasfrrer', 109, ''),
(123, 29, 'asasfr', 109, ''),
(124, 29, 'asasfffrtyrt', 109, ''),
(125, 29, 'asasfffrrtyrt', 109, ''),
(126, 29, 'asasfffrrfghfgrtyrt', 109, ''),
(127, 29, 'asasfffrrfghfg', 109, ''),
(128, 29, 'asasfffrfghfgrtyrt', 109, ''),
(129, 29, 'asasfffrfghfg', 109, ''),
(130, 29, 'asasfffr', 109, ''),
(131, 29, 'asasfff', 109, ''),
(132, 29, 'asasf', 109, ''),
(133, 29, 'c22', 116, ''),
(134, 29, 'h47', 116, ''),
(135, 29, 'c21', 116, ''),
(136, 29, 'asasf', 117, ''),
(137, 29, '75', 117, ''),
(138, 29, '434', 117, ''),
(139, 29, '23', 117, ''),
(140, 29, 'c22', 125, 'si'),
(141, 29, 'h47', 126, 'si'),
(142, 29, 'asasfrtyrtyrt', 126, 'si'),
(143, 29, 'c22', 126, 'si'),
(144, 29, '75', 127, 'si'),
(145, 29, '23', 127, 'si'),
(146, 29, 'c22', 128, 'si'),
(147, 29, 'h47', 129, 'si'),
(148, 29, 'asasfrrtyr', 130, 'si'),
(149, 29, 'h47', 131, 'si'),
(150, 29, 'h47', 132, 'si'),
(151, 29, 'c22', 132, 'si'),
(152, 29, 'c21', 132, 'si'),
(153, 29, 'h47', 133, 'si'),
(154, 29, 'c22', 133, 'si'),
(155, 29, 'c21', 133, 'si'),
(156, 29, 'c21', 134, 'si'),
(157, 29, 'c21', 135, 'si'),
(158, 29, 'c22', 136, 'si'),
(159, 29, 'h47', 136, 'si'),
(160, 29, 'h47', 137, 'si'),
(161, 29, 'c21', 137, 'si'),
(162, 29, 'c22', 137, 'si'),
(163, 29, '23', 137, 'si'),
(164, 29, 'h47', 137, 'si'),
(165, 29, 'c21', 137, 'si'),
(166, 29, 'c22', 137, 'si'),
(167, 29, '23', 137, 'si'),
(168, 29, 'c21', 138, 'si'),
(169, 29, 'c22', 138, 'si'),
(170, 29, 'h47', 138, 'si'),
(171, 29, '434', 138, 'si'),
(172, 29, '75', 138, 'si'),
(173, 29, '23', 138, 'si'),
(174, 29, 'h47', 139, 'si'),
(175, 29, 'c22', 139, 'si'),
(176, 29, 'c21', 139, 'si'),
(177, 29, '75', 139, 'si'),
(178, 29, '23', 139, 'si'),
(179, 29, '434', 139, 'si'),
(180, 29, 'h47', 140, 'si'),
(181, 29, 'c22', 140, 'si'),
(182, 29, 'c21', 140, 'si'),
(183, 29, '75', 140, 'si'),
(184, 29, '434', 140, 'si'),
(185, 29, '23', 140, 'si'),
(186, 29, 'asasfrtyrtyrt', 140, 'no'),
(187, 29, 'asasfrrtyr', 140, 'no'),
(188, 29, 'asasfrrerrtyrt', 140, 'no'),
(189, 29, 'asasfrrerefghfgtryrt', 140, 'no'),
(190, 29, 'asasfrrerefghfg', 140, 'no'),
(191, 29, 'asasfrrer', 140, 'no'),
(192, 29, 'asasfr', 140, 'no'),
(193, 29, 'asasfffrtyrt', 140, 'no'),
(194, 29, 'asasfffrrtyrt', 140, 'no'),
(195, 29, 'asasfffrrfghfgrtyrt', 140, 'no'),
(196, 29, 'asasfffrrfghfg', 140, 'no'),
(197, 29, 'asasfffrfghfgrtyrt', 140, 'no'),
(198, 29, 'asasfffrfghfg', 140, 'no'),
(199, 29, 'asasfffr', 140, 'no'),
(200, 29, 'asasfff', 140, 'no'),
(201, 29, 'asasf', 140, 'no'),
(202, 29, 'c22', 141, 'si'),
(203, 29, 'h47', 141, 'no'),
(204, 29, 'c21', 141, 'no'),
(205, 29, 'asasfrtyrtyrt', 141, 'no'),
(206, 29, 'asasfrrtyr', 141, 'no'),
(207, 29, 'asasfrrerrtyrt', 141, 'no'),
(208, 29, 'asasfrrerefghfgtryrt', 141, 'no'),
(209, 29, 'asasfrrerefghfg', 141, 'no'),
(210, 29, 'asasfrrer', 141, 'no'),
(211, 29, 'asasfr', 141, 'no'),
(212, 29, 'asasfffrtyrt', 141, 'no'),
(213, 29, 'asasfffrrtyrt', 141, 'no'),
(214, 29, 'asasfffrrfghfgrtyrt', 141, 'no'),
(215, 29, 'asasfffrrfghfg', 141, 'no'),
(216, 29, 'asasfffrfghfgrtyrt', 141, 'no'),
(217, 29, 'asasfffrfghfg', 141, 'no'),
(218, 29, 'asasfffr', 141, 'no'),
(219, 29, 'asasfff', 141, 'no'),
(220, 29, 'asasf', 141, 'no'),
(221, 29, '75', 141, 'no'),
(222, 29, '434', 141, 'no'),
(223, 29, '23', 141, 'no'),
(224, 29, 'h47', 142, 'si'),
(225, 29, 'c22', 142, 'si'),
(226, 29, 'c21', 142, 'si'),
(227, 29, 'asasfrtyrtyrt', 142, 'si'),
(228, 29, 'asasfrrtyr', 142, 'si'),
(229, 29, 'asasfrrerrtyrt', 142, 'si'),
(230, 29, 'asasfrrerefghfgtryrt', 142, 'si'),
(231, 29, 'asasfrrerefghfg', 142, 'si'),
(232, 29, 'asasfrrer', 142, 'si'),
(233, 29, 'asasfr', 142, 'si'),
(234, 29, 'asasfffrtyrt', 142, 'si'),
(235, 29, 'asasfffrrtyrt', 142, 'si'),
(236, 29, 'asasfffrrfghfgrtyrt', 142, 'si'),
(237, 29, 'asasfffrrfghfg', 142, 'si'),
(238, 29, 'asasfffrfghfgrtyrt', 142, 'si'),
(239, 29, 'asasfffrfghfg', 142, 'si'),
(240, 29, 'asasfffr', 142, 'si'),
(241, 29, 'asasfff', 142, 'si'),
(242, 29, 'asasf', 142, 'si'),
(243, 29, '75', 142, 'si'),
(244, 29, '434', 142, 'si'),
(245, 29, '23', 142, 'si'),
(246, 29, 'c22', 144, 'si'),
(247, 29, 'c21', 144, 'si'),
(248, 29, 'asasfrtyrtyrt', 144, 'si'),
(249, 29, 'asasfrrtyr', 144, 'si'),
(250, 29, 'asasfrrerrtyrt', 144, 'si'),
(251, 29, 'asasfrrerefghfgtryrt', 144, 'si'),
(252, 29, 'asasfrrerefghfg', 144, 'si'),
(253, 29, 'asasfrrer', 144, 'si'),
(254, 29, 'asasfr', 144, 'si'),
(255, 29, 'asasfffrtyrt', 144, 'si'),
(256, 29, 'asasfffrrtyrt', 144, 'si'),
(257, 29, 'asasfffrrfghfgrtyrt', 144, 'si'),
(258, 29, 'asasfffrrfghfg', 144, 'si'),
(259, 29, 'asasfffrfghfgrtyrt', 144, 'si'),
(260, 29, 'asasfffrfghfg', 144, 'si'),
(261, 29, 'asasfffr', 144, 'si'),
(262, 29, 'asasfff', 144, 'si'),
(263, 29, 'asasf', 144, 'si'),
(264, 29, '75', 144, 'si'),
(265, 29, '434', 144, 'si'),
(266, 29, '23', 144, 'si'),
(267, 29, 'c22', 144, 'si'),
(268, 29, 'c21', 144, 'si'),
(269, 29, 'asasfrtyrtyrt', 144, 'si'),
(270, 29, 'asasfrrtyr', 144, 'si'),
(271, 29, 'asasfrrerrtyrt', 144, 'si'),
(272, 29, 'asasfrrerefghfgtryrt', 144, 'si'),
(273, 29, 'asasfrrerefghfg', 144, 'si'),
(274, 29, 'asasfrrer', 144, 'si'),
(275, 29, 'asasfr', 144, 'si'),
(276, 29, 'asasfffrtyrt', 144, 'si'),
(277, 29, 'asasfffrrtyrt', 144, 'si'),
(278, 29, 'asasfffrrfghfgrtyrt', 144, 'si'),
(279, 29, 'asasfffrrfghfg', 144, 'si'),
(280, 29, 'asasfffrfghfgrtyrt', 144, 'si'),
(281, 29, 'asasfffrfghfg', 144, 'si'),
(282, 29, 'asasfffr', 144, 'si'),
(283, 29, 'asasfff', 144, 'si'),
(284, 29, 'asasf', 144, 'si'),
(285, 29, '75', 144, 'si'),
(286, 29, '434', 144, 'si'),
(287, 29, '23', 144, 'si'),
(288, 29, 'h47', 144, 'no'),
(289, 29, 'h47', 144, 'no'),
(290, 32, '65', 145, 'si'),
(291, 32, '4532', 145, 'si'),
(292, 32, '45', 145, 'si'),
(293, 32, '23423', 145, 'si'),
(294, 32, '677', 145, 'no'),
(295, 32, '677', 146, 'si'),
(296, 32, '65', 146, 'si'),
(297, 32, '4532', 146, 'si'),
(298, 32, '45', 146, 'si'),
(299, 32, '23423', 146, 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_caprino`
--

CREATE TABLE `registro_caprino` (
  `id` int(11) NOT NULL,
  `codigo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `genero` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dato1` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_madre` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
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

INSERT INTO `registro_caprino` (`id`, `codigo`, `id_usuario`, `genero`, `dato1`, `codigo_madre`, `raza`, `fecha_nacimiento`, `origen`, `estado`, `motivo_salida`, `fecha_salida`) VALUES
(85, '342', 29, 'hembra', 'siparto', '', 'Saanen', '2022-09-15', 'Comprado', 0, 'Venta', '2022-09-07'),
(86, '23', 29, 'hembra', 'noparto', 'b54', 'Saanen', '2022-09-09', 'Nacido', 1, '', NULL),
(87, '434', 29, 'macho', 'sicapado', '', 'Saanen', '2022-09-10', 'Comprado', 1, '', NULL),
(88, '75', 29, 'hembra', 'Con partos', '', 'Saanen', '2022-09-06', 'Comprado', 1, '', NULL),
(89, 'h47', 29, 'macho', 'No capado', '342', 'Saanen', '2022-08-30', 'Nacido', 1, '', NULL),
(90, '2342', 33, 'macho', 'Capado', '0', 'Saanen', '2022-09-03', 'Comprado', 1, '', NULL),
(91, 'c21', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-16', 'Comprado', 1, '', NULL),
(92, 'c22', 29, 'hembra', 'Sin partos', '75', 'Saanen', '2022-09-01', 'Nacido', 1, '', NULL),
(93, 'asasfff', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-02', 'Comprado', 1, '', NULL),
(94, 'asasf', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-02', 'Comprado', 1, '', NULL),
(95, 'asasfffr', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-02', 'Comprado', 1, '', NULL),
(96, 'asasfr', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-02', 'Comprado', 1, '', NULL),
(109, 'asasfffrfghfg', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-02', 'Comprado', 1, '', NULL),
(110, 'asasfrrerefghfg', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-02', 'Comprado', 1, '', NULL),
(111, 'asasfffrrfghfg', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-02', 'Comprado', 1, '', NULL),
(112, 'asasfrrer', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-02', 'Comprado', 1, '', NULL),
(113, 'asasfffrtyrt', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-02', 'Comprado', 1, '', NULL),
(114, 'asasfrtyrtyrt', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-02', 'Comprado', 1, '', NULL),
(115, 'asasfffrrtyrt', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-02', 'Comprado', 1, '', NULL),
(116, 'asasfrrtyr', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-02', 'Comprado', 1, '', NULL),
(117, 'asasfffrfghfgrtyrt', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-02', 'Comprado', 1, '', NULL),
(118, 'asasfrrerefghfgtryrt', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-02', 'Comprado', 1, '', NULL),
(119, 'asasfffrrfghfgrtyrt', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-02', 'Comprado', 1, '', NULL),
(120, 'asasfrrerrtyrt', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-02', 'Comprado', 1, '', NULL),
(121, '10', 29, 'hembra', 'Sin partos', '0', 'Booer', '2022-09-08', 'Comprado', 1, '', NULL),
(122, '11', 29, 'macho', 'No capado', '0', 'Togenburn', '2022-10-04', 'Genética', 1, '', NULL),
(123, '13', 29, 'hembra', 'Con partos', '0', 'Santandereano', '2022-09-13', 'Seleccione el origen', 1, '', NULL),
(124, '67', 29, 'macho', 'Capado', '0', 'Saanen', '2022-09-15', 'Comprado', 1, '', NULL),
(125, '435', 29, 'macho', '0', '13', 'Nubiana', '2022-09-17', 'Nacido', 1, '', NULL),
(126, '42', 29, 'hembra', '0', '23', 'Togenburn', '2022-09-15', 'Nacido', 1, '', NULL),
(127, '78', 29, 'macho', 'No capado', '0', 'Otras', '2022-09-21', 'Genética', 1, '', NULL),
(128, 'rete', 29, 'hembra', 'Con partos', '0', 'Alpino', '2022-09-03', 'Genética', 1, '', NULL),
(129, '12', 29, 'hembra', 'Sin partos', '0', 'Alpino', '2022-09-02', 'Genética', 1, '', NULL),
(130, '45', 32, 'macho', 'Capado', '0', 'Nubiana', '2022-09-27', 'Genética', 1, '', NULL),
(131, '23423', 32, 'macho', 'Capado', '0', 'Nubiana', '2022-09-02', 'Comprado', 1, '', NULL),
(132, '4532', 32, 'hembra', 'Sin partos', '0', 'Santandereano', '2022-09-10', 'Genética', 1, '', NULL),
(133, '65', 32, 'macho', '0', '4532', 'Nubiana', '2022-09-02', 'Nacido', 1, '', NULL),
(134, '677', 32, 'hembra', 'Sin partos', '0', 'Togenburn', '2022-09-01', 'Otro', 1, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_control`
--

CREATE TABLE `registro_control` (
  `id` int(11) NOT NULL,
  `codigo_caprino` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
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
(58, 'a32', 28, 21, 2, 'enfermedad respiratoria', '', '', '2022-08-23'),
(59, 'z56', 28, 22, 3, '', 'enfermedad gastro intestinal', '', '2022-08-23'),
(60, '1', 29, 25, 2, 'enfermedad respiratoria', 'enfermedad gastro intestinal', '', '2022-08-23'),
(61, '1', 29, 25, 5, '', '', 'enfermedad por mordedura', '2022-08-23'),
(62, '1', 29, 5, 3, '', 'enfermedad gastro intestinal', '', '2022-08-23'),
(63, 'a23', 29, 23, 2, 'enfermedad respiratoria', '', '', '2022-08-23'),
(64, 'a33', 32, 47, 1, 'enfermedad respiratoria', '', '', '2022-08-23'),
(65, 'a33', 32, 11, 4, '', '', 'enfermedad por mordedura', '2022-08-23'),
(66, 'c33', 34, 20, 5, '', '', 'enfermedad por mordedura', '2022-08-23'),
(67, 'A20', 29, 25, 5, '', 'Gastro', '', '2022-08-24'),
(68, '1', 29, 85, 4, 'enfermedad respiratoria', 'enfermedad gastro intestinal', 'enfermedad por mordedura', '2022-08-24'),
(69, '1', 29, 66, 1, '', '', '', '2022-08-24'),
(70, 'd45', 29, 85, 2, 'enfermedad respiratoria', '', 'enfermedad por mordedura', '2022-09-07'),
(71, '23', 29, 34, 2, 'enfermedad respiratoria', '', '', '2022-09-21'),
(72, '434', 29, 45, 2, 'enfermedad respiratoria', '', '', '2022-09-21'),
(73, '75', 29, 55, 3, 'enfermedad respiratoria', 'enfermedad gastro intestinal', '', '2022-09-21'),
(74, 'h47', 29, 543, 4, '', '', 'enfermedad por mordedura', '2022-09-21'),
(75, '75', 29, 89, 4, 'enfermedad respiratoria', 'enfermedad gastro intestinal', 'enfermedad por mordedura', '2022-09-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_produccion`
--

CREATE TABLE `registro_produccion` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `codigo_caprino` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_leche` int(3) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro_produccion`
--

INSERT INTO `registro_produccion` (`id`, `id_usuario`, `codigo_caprino`, `cantidad_leche`, `fecha_registro`) VALUES
(27, 32, '33', 58, '2022-08-05'),
(28, 28, 'a32', 32, '2022-08-23'),
(29, 28, 'z56', 32, '2022-08-26'),
(30, 28, 'z56', 122, '2022-08-26'),
(31, 32, 'a21', 10, '2022-08-08'),
(32, 32, 'a33', 10, '2022-08-12'),
(33, 32, 'a33', 100, '2022-08-30'),
(34, 29, '1', 20, '2022-08-25'),
(35, 29, 'a23', 1000, '2022-08-25'),
(36, 29, 'a23', 10, '2022-08-08'),
(37, 29, 'a22', 20, '2022-08-23'),
(38, 29, '1', 25, '2022-08-30'),
(39, 29, 'a22', 25, '2022-09-10'),
(40, 29, 'a11', 525, '2022-09-12'),
(41, 29, 'a11', 52, '2022-09-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_salidas`
--

CREATE TABLE `registro_salidas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  `codigo_caprino` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
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
(86, 29, '74', '2022-08-30'),
(87, 34, '33', '2022-08-16'),
(88, 33, '4444', '2022-08-17'),
(89, 29, 'we', '2022-08-22'),
(90, 29, 'parvo', '2022-08-24'),
(91, 29, 'Prueba ultima', '2022-08-31'),
(92, 29, 'Vacunación todo', '2022-08-24'),
(93, 29, 'PRUEBA', '2022-09-01'),
(94, 29, 'prueba 3 ', '2022-09-08'),
(95, 33, 'prueba 23', '2022-09-21'),
(96, 29, 'Prueba pick', '2022-09-23'),
(97, 29, 'prueba picklist 2', '2022-09-16'),
(98, 29, 'prueba pick 3', '2022-09-16'),
(99, 29, '5656', '2022-09-24'),
(100, 29, '65656', '2022-09-09'),
(101, 29, 'pick prueba5', '2022-09-30'),
(102, 29, 'rerere', '2022-09-30'),
(103, 29, '99999', '2022-09-27'),
(104, 29, 'prueba con usuario', '2022-09-27'),
(105, 29, 'prueba pick7', '2022-09-22'),
(106, 29, 'prueba fin', '2022-09-28'),
(107, 29, 'prueba final', '2022-09-25'),
(108, 29, 'prueba vacunacion', '2022-09-22'),
(109, 29, 'prueba array', '2022-09-16'),
(110, 29, 'yytuty', '2022-09-05'),
(111, 29, 'fdsfsd', '2022-09-23'),
(112, 29, 'prueba', '2022-09-21'),
(113, 29, 'estado', '2022-09-27'),
(114, 29, 'estado', '2022-09-20'),
(115, 29, 'estado 3', '2022-09-27'),
(116, 29, 'estado3', '2022-09-22'),
(117, 29, 'estado4', '2022-09-27'),
(118, 29, '4544', '2022-09-27'),
(119, 29, 'estado5', '2022-09-09'),
(120, 29, 'rteter', '2022-09-08'),
(121, 29, '6756', '2022-09-09'),
(122, 29, 'uiyu', '2022-09-15'),
(123, 29, 'yiuyyui', '2022-09-07'),
(124, 29, '6756', '2022-09-27'),
(125, 29, '56756', '2022-09-21'),
(126, 29, 'pruebaestado', '2022-09-27'),
(127, 29, '878787', '2022-09-02'),
(128, 29, '4546456', '2022-09-03'),
(129, 29, '756756', '2022-09-17'),
(130, 29, '6756756', '2022-09-08'),
(131, 29, '56456', '2022-09-03'),
(132, 29, '88ioo', '2022-09-09'),
(133, 29, '88ioo', '2022-09-09'),
(134, 29, 'uuuu', '2022-09-21'),
(135, 29, '3324234', '2022-09-08'),
(136, 29, 'iiii', '2022-09-26'),
(137, 29, 'hgjghjghj', '2022-09-14'),
(138, 29, '756756', '2022-09-09'),
(139, 29, 'sino', '2022-09-27'),
(140, 29, 'sino2', '2022-09-19'),
(141, 29, 'prueba final', '2022-09-02'),
(142, 29, '453453', '2022-09-05'),
(143, 29, 'prueba', '2022-09-26'),
(144, 29, 'prueba si no', '2022-09-28'),
(145, 32, 'prueba 5555', '2022-09-07'),
(146, 32, 'Aa', '2022-09-27');

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
(28, 'Juan', 'Sandoval', '1111', '121212', 'san gil', 'Carne', 1111, 1),
(29, 'Pedro', 'Rojas', '2222', '121212', 'san gil', 'Carne', 2222, 2),
(32, 'Carlos', 'Perez', '5555', '985454', 'San gil', 'Doble Propósito', 5555, 2),
(33, 'Luis', 'Vargas', '4444', '12212454', 'San gil', 'Carne', 4444, 2),
(34, 'Hector', '4564', '3333', '45645', '4545', 'Carne', 3333, 2),
(35, 'Juan', 'Sandoval', '321313213', '13121231', 'San gil', 'Leche', 8888, 2),
(36, 'Juan Sebastián', 'Sandoval Vargas', '2354598', '32155465', 'Calle 24G #10a-24', 'Carne', 8888, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT de la tabla `registro_caprino`
--
ALTER TABLE `registro_caprino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de la tabla `registro_control`
--
ALTER TABLE `registro_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `registro_produccion`
--
ALTER TABLE `registro_produccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `registro_salidas`
--
ALTER TABLE `registro_salidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registro_tratamientos`
--
ALTER TABLE `registro_tratamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
