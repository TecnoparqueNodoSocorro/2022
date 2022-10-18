-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2022 a las 23:42:16
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
(49, 'menu', 'Diversion', 'planes', '../images/imagen_articulo/1665667838.jpg', '5756756', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 1),
(50, 'menu', 'servicios', 'concierge', '../images/imagen_articulo/1665666788.jpg', '4', '44444', 1),
(51, 'menu2', 'planesyservicios', 'barichara', '../images/imagen_articulo/1665666798.jpg', 'prueba edit24', '345345', 1),
(52, 'menu', 'Diversion', 'planes', '../images/imagen_articulo/1665610602.jpg', '4545', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\n', 1),
(53, 'menu3', 'enterate', 'hotelesdeensueno', '../images/imagen_articulo/1665679315.jpg', 'erterter', 'terter', 1),
(54, 'menu3', 'enterate', 'disenadores', '../images/imagen_articulo/1665697382.jpg', 'ggfhfgh', 'fghfghfghfg', 1),
(55, 'menu', 'Diversion', 'planes', '../images/imagen_articulo/1665667838.jpg', '5756756', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 1),
(56, 'menu', 'Diversion', 'planes', '../images/imagen_articulo/1665610602.jpg', '4545', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\r\n', 1),
(57, 'menu', 'Diversion', 'planes', '../images/imagen_articulo/1665667838.jpg', '5756756', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 1),
(58, 'menu', 'Diversion', 'planes', '../images/imagen_articulo/1665610602.jpg', '4545', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\r\n', 1),
(59, 'menu', 'Diversion', 'planes', '../images/imagen_articulo/1665667838.jpg', '5756756', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 1),
(60, 'menu', 'Diversion', 'planes', '../images/imagen_articulo/1665610602.jpg', '4545', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\r\n', 1),
(61, 'menu', 'Diversion', 'planes', '../images/imagen_articulo/1665667838.jpg', '5756756', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 1),
(62, 'menu', 'Diversion', 'planes', '../images/imagen_articulo/1665610602.jpg', '4545', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\r\n', 1),
(63, 'menu', 'Diversion', 'planes', '../images/imagen_articulo/1665667838.jpg', '5756756', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 1),
(64, 'menu', 'Diversion', 'planes', '../images/imagen_articulo/1665610602.jpg', '4545', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\r\n', 1),
(65, 'menu', 'Diversion', 'planes', '../images/imagen_articulo/1665667838.jpg', '5756756', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 1),
(66, 'menu', 'Diversion', 'planes', '../images/imagen_articulo/1665610602.jpg', '4545', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\r\n', 1),
(67, 'menu', 'Diversion', 'planes', '../images/imagen_articulo/1665667838.jpg', '5756756', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 1),
(68, 'menu', 'Diversion', 'planes', '../images/imagen_articulo/1665610602.jpg', '4545', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\r\n', 1),
(69, 'menu', 'Diversion', 'eventos', '../images/imagen_articulo/1665760672.jpg', 'titulo prueba eventos', 'descripcion de eventos', 1),
(70, 'menu', 'Diversion', 'pride', '../images/imagen_articulo/1665760773.jpg', 'prueba pride', 'tyutyutyutyutyutyuty', 1),
(71, 'menu', 'Diversion', 'festivales', '../images/imagen_articulo/1665760803.jpg', 'prueba festivales', 'ertertertertertertertertert', 1),
(72, 'menu', 'Diversion', 'cruceros', '../images/imagen_articulo/1665760846.png', 'prueba crucerios', 'sdfsdfsdfsd', 1),
(73, 'menu', 'servicios', 'hoteles', '../images/imagen_articulo/1665761224.jpg', 'prueba hoteles', 'edsedsedsedsedsedsedsedsedsedsedsedsedesdsededse', 1),
(74, 'menu', 'servicios', 'Oasis', '../images/imagen_articulo/1665761260.jpg', 'prueba oasis', '    background-color: rgb(240, 118, 18);\r\n    box-shadow: 1px 1px #393939;\r\n    opacity: 0.9;\r\n    border-radius: 20px;\r\n    padding: 15px\r\npx\r\n;\r\n    margin: 15px;\r\n    font-size: 0.8rem;', 1),
(75, 'menu', 'servicios', 'autos', '../images/imagen_articulo/1665761296.png', 'prueba autos', 'sdfsdfsdhjf sgfjhsdjdsg dhgfjsdgfjhds  jdfgsjdhgfsdjfhsd jhdsgf sjdhgdsjf sdjhfgjsdhgf sdjgfjsdhgfsjdgf lfoa', 1),
(76, 'menu', 'servicios', 'toures', '../images/imagen_articulo/1665761322.jpg', 'prueba toures', 'dhfkshd kdsjhfkdjhfkjsdhfks djfsdkjhfskd ksjdfhskdjfhksdj fsjdhf skjdhfsjdkhf ds', 1),
(77, 'menu', 'servicios', 'wedding', '../images/imagen_articulo/1665761351.jpg', 'prueba wedding', 'descripcion sdfhkjsdh jhdfkjshdfjksd jksdhfjkshdfjksdf', 1),
(78, 'menu', 'cultura', 'cultura', '../images/imagen_articulo/1665761796.jpg', 'prueba cultura', 'skdjhf sdfhsdkjhfsjkdhf sdkfjhsdjf sdhfkjsdhf ksdhfksjdhfsd sdjhkdshsdhf sdkjf hskjdfsjkdsd', 1),
(79, 'menu2', 'planesyservicios', 'planesdeboda', '../images/imagen_articulo/1665764694.jpg', 'menu2 planes de boda', 'descriocion menu2 planes de boda', 1),
(80, 'menu2', 'planesyservicios', 'barichara', '../images/imagen_articulo/1665764729.png', 'menu2 barichara', 'descripcion barichar afjsdklfijsdlf sldjfsld fdsi', 1),
(81, 'menu2', 'planesyservicios', 'promociones', '../images/imagen_articulo/1665764758.png', 'prueba promociones menu 2', 'descirpnsd menid 2 barichar afnsdkjfhnsdsdfsd sdfgsdfsd', 1),
(82, 'menu2', 'planesyservicios', 'vacaciones', '../images/imagen_articulo/1665764786.jpg', 'menu 2 vacaciones ', 'dscriocn menu 2 vacacionces csdjfiksdjfised skjdfksdjhfisdhfs skedjfsldhfisdfsdf sdf sdfsd', 1),
(83, 'menu2', 'planesyservicios', 'lunademiel', '../images/imagen_articulo/1665764819.png', 'titulo enu 2 luna de miel sdf', 'descripcion menu 2 luna de miel dshfsdjhfsjdkhfsjkd skjdhfkjsdhfkjs sdkhfkdsjhf ', 1),
(84, 'menu2', 'planesyservicios', 'tour_de_entretenimiento', '../images/imagen_articulo/1665764848.png', 'tutilo menu 2 touur de entretenimiento', 'descriociuon de titulo 23 mdfjksdnf sdkjhsdf sdusiuh fdsiugfs8d', 1),
(85, 'menu2', 'planesyservicios', 'bodas', '../images/imagen_articulo/1665764876.png', 'titulo menu 2 bodas', 'efjsoejfsod jdiufhsdih sdfhsd menu 2 biodas ', 1),
(86, 'menu2', 'planesyservicios', 'turismo', '../images/imagen_articulo/1665764913.png', 'tituulo turtismoi menu 2 ', 'dweaeciornseiodfjois fsjdha foisdjfsd menu2  descruocn', 1),
(87, 'menu3', 'enterate', 'propuestas_matrimonio', '../images/imagen_articulo/1665775577.jpg', 'PRUEBA PROPUESTAS DE maTRImonio', 'descripcion pruebas de matrimonio dskjfhksdjhfkjsdhfskjdhfksdj sdkhfksjdh ksdjfhsdk fhsdkjfh sdhf sdkj f', 1),
(88, 'menu3', 'enterate', 'cheffypasteleros', '../images/imagen_articulo/1665775618.jpg', 'prueba titulo cheefff y pasteleros', 'fskdjhfsjfs descripcion chef sdhfsdjh sdhfkjsdh sdjhfskd\r\n', 1),
(89, 'menu3', 'enterate', 'gastronomiabodas', '../images/imagen_articulo/1665775704.png', 'PRUEBA TITULO DE GRASTRONOBIA DE BODAS', 'dsjfsdjhfsdkjh sdescriopcion bodas deskfjsdkjf ', 1),
(90, 'menu3', 'enterate', 'propuestas_matrimonio', '../images/imagen_articulo/1666097535.jpg', '34534', '678657567+\r\n', 1),
(91, 'menu3', 'enterate', 'cheffypasteleros', '../images/imagen_articulo/1666097552.jpg', '0\'¿0\'', '¿0\'¿0\'¿0\'', 1);

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
(20, 'menu2', 'planesyservicios', 'planesdeboda'),
(21, 'menu2', 'planesyservicios', 'barichara'),
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
(40, 'menu3', 'enterate', 'cruceros'),
(41, 'menu', 'cultura', 'cultura');

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
  `img1` varchar(50) NOT NULL,
  `img2` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `idproveedor`, `idcategoria`, `nombre`, `precio`, `img1`, `img2`, `descripcion`, `estado`) VALUES
(12, 1, 2, '454', 54, '../images/productos/1665678249.jpg', '../images/productos/1665678180.jpg', '45', 1),
(14, 1, 3, '¿\'', 86, '../images/productos/1665678301.jpg', '../images/productos/1665678302.jpg', '997', 1),
(15, 2, 2, 'prueba de fptgd', 2000000, '../images/imagen_articulo/1665674703.png', '../images/imagen_articulo/1665674628.jpg', 'prueba descr', 1),
(16, 2, 2, '456454', 56454, '../images/productos/p2.jpg', '../images/imagen_articulo/p2.jpg', '56456', 1),
(17, 2, 2, '78678', 678678678, '../images/productos/1665675381.jpg', '../images/productos/p2.jpg', '67876', 1),
(18, 2, 1, 'rtyrty', 657657, '../images/productos/p2.jpg', '../images/productos/1665675413.jpg', '567567', 1),
(19, 2, 1, '654645', 64564564, '../images/productos/1665675502.jpg', '../images/productos/1665675503.jpg', '56456456', 1),
(20, 2, 7, '456456', 456454, '../images/productos/1665675970.jpg', '../images/productos/1665676239.jpg', '5645645', 1),
(21, 2, 9, '444', 44, '../images/productos/1665678196.jpg', '../images/productos/1665678197.jpg', '444', 1),
(22, 31, 1, 'prueba id', 5000, '../images/productos/1666128419.jpg', '../images/productos/1666128420.jpg', 'prueba idprueba idprueba idprueba idprueba idprueba idprueba idprueba idprueba idprueba id', 1);

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
  `estado` int(11) NOT NULL DEFAULT 1,
  `usuario` varchar(15) NOT NULL,
  `pasww1` varchar(10) NOT NULL,
  `id_cargo` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `nit`, `telefono`, `correo`, `maxprod`, `direccion`, `descripcion`, `logo`, `vigencia`, `estado`, `usuario`, `pasww1`, `id_cargo`) VALUES
(31, 'nombre prue55', 'nit', '1111', 'email', 9999, 'direccion prueba', 'descr', '../images/logos/1665606521.jpg', '2022-10-19', 1, 'user', '55', 1),
(32, '45645 fff', '645', '645', '6456', 45645, '645645', '54645645', '../images/logos/1665606195.png', '2022-10-12', 1, '6546', '444', 1),
(33, '44', '44', '2312312312', 'dsfdsfdxchjd', 44, 'calle 23', 'descripcion de la empresa sdfisdhfsudhjfs\r\n', '../images/logos/1665671729.png', '2022-10-13', 1, '44', '44', 1),
(34, '44', '44', '44', '44', 44, '44', '44', '../images/logos/1665603135.jpg', '0000-00-00', 1, '44', '44', 1),
(35, 'erer', 'ere', '343', 'ere', 434, 'rer', 'erere', '../images/logos/1665604323.jpg', '2022-10-11', 1, 'ere', '33', 1),
(36, '54645', '456456', '4564564', '45645645', 454, '45645645', '546456', '../images/logos/1665671238.jpg', '2022-10-14', 1, '45645', '44', 1),
(37, 'admin', '0000', '00000', 'admin@correoprueba.com', 0, 'direccion admin', 'descripcion admin', '../images/logos/1666123991.jpg', '0000-00-00', 1, 'admin', 'admin12345', 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `pg_categorias`
--
ALTER TABLE `pg_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `product_categorias`
--
ALTER TABLE `product_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
