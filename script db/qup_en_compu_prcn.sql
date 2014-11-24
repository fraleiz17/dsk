-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2014 a las 07:01:24
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `qup`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
`bannerID` int(11) NOT NULL,
  `imgbaner` varchar(100) NOT NULL,
  `texto` text NOT NULL,
  `zonaID` int(11) NOT NULL DEFAULT '9',
  `posicion` int(11) DEFAULT NULL COMMENT '1 - arriba 2 - centro -3 abajo - 4 lateral',
  `seccionID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2340;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`bannerID`, `imgbaner`, `texto`, `zonaID`, `posicion`, `seccionID`) VALUES
(6, 'banner_lateral/_9ad4a__0019e_3_thumb.png', '', 9, 4, 17),
(7, '/_29f25__15bf6_Hydrangeas_thumb.jpg', 'texto apoyo', 9, 2, 1),
(11, 'banner_superior/_b2fea__fce75_Chrysanthemum_thumb.jpg', '', 9, 1, 1),
(13, '', 'Apoyo', 9, 2, 2),
(16, '', 'APOYO EN PERFIL', 9, 2, 5),
(19, '', 'TEXTO DE APOYO EN ADOPCION ZONA 9', 9, 2, 6),
(20, 'banner_superior/_822d8__10821_accept1_thumb.png', '', 4, 1, 6),
(21, 'banner_inferior/_88e8c__a065d_accept1_thumb.png', '', 4, 3, 6),
(22, '', 'TEXTO DE APOYO EN ADOPCION EN ZONA 4', 4, 2, 6),
(24, '', 'APOYO EN ASOCIACIONES', 9, 2, 11),
(27, '', 'APOYO EN CRUZA', 9, 2, 3),
(29, '/_2d53b__bd399_900x500_1_thumb.jpg', '', 9, 2, 1),
(30, '/_d6b77__32fe3_900x500_2_thumb.jpg', '', 9, 2, 1),
(31, '/_32586__d5ea9_900x500_3_thumb.jpg', '', 9, 2, 1),
(32, 'banner_superior/_166ef__2c8e3_2_thumb.png', '', 9, 1, 1),
(33, 'banner_superior/_58322__060cc__166ef__2c8e3_2_thumb.png', '', 9, 1, 1),
(34, 'banner_superior/_129a3__05901__4e023__0fbf0_Chrysanthemum_thumb_thumb.jpg', '', 9, 1, 2),
(36, 'banner_superior/_ea1f1__d803d__3bbd0__55d73_Hydrangeas_thumb_thumb.jpg', '', 9, 1, 16),
(37, 'banner_inferior/_53d25__26d2b__4e023__0fbf0_Chrysanthemum_thumb_thumb.jpg', '', 9, 3, 16),
(38, 'banner_superior/_c95b5__56c48__7fa10__f1a51_Jellyfish_thumb_thumb.jpg', '', 9, 1, 2),
(39, 'banner_superior/_bc22e__3527e__166ef__2c8e3_2_thumb_thumb.png', '', 9, 1, 2),
(40, 'banner_superior/_538f2__c3f56_1_thumb.png', '', 9, 1, 4),
(41, 'banner_superior/_37a6d__acac4__4e023__0fbf0_Chrysanthemum_thumb_thumb.jpg', '', 9, 1, 4),
(42, '', 'texto de apoyo en directorio', 9, 2, 4),
(43, 'banner_inferior/_aa110__287d6_1_thumb.png', '', 9, 3, 2),
(44, 'banner_inferior/_70a27__f56d0_3_thumb.png', '', 9, 3, 4),
(45, 'banner_superior/_2ef37__170fb__18b38__28cb4_Jellyfish_thumb_thumb.jpg', '', 9, 1, 12),
(46, 'banner_inferior/_ab70f__f34f8__70a27__f56d0_3_thumb_thumb.png', '', 9, 3, 12),
(47, 'banner_superior/_5194f__e7dfc_1_thumb.png', '', 9, 1, 5),
(48, 'banner_superior/_020f5__f51a1__53d25__26d2b__4e023__0fbf0_Chrysanthemum_thumb_thumb_thumb.jpg', '', 9, 1, 7),
(50, 'banner_inferior/_177ec__8529a__53d25__26d2b__4e023__0fbf0_Chrysanthemum_thumb_thumb_thumb.jpg', '', 9, 3, 7),
(51, '', 'Texto en perros perdidos', 9, 2, 7),
(52, 'banner_superior/_06179__9df0b__18b38__28cb4_Jellyfish_thumb_thumb.jpg', '', 9, 1, 8),
(53, 'banner_superior/_9f7dd__8bd3d_Hydrangeas_-_copia_thumb.jpg', '', 9, 1, 10),
(54, 'banner_superior/_be6d7__4ca8d_Chrysanthemum_thumb.jpg', '', 9, 1, 9),
(55, 'banner_inferior/_80f93__c922b_Hydrangeas_-_copia_thumb.jpg', '', 9, 3, 9),
(56, 'banner_inferior/_af503__4edd9_Captura_de_pantalla_2014-08-19_a_la(s)_14.00_.57__thumb.png', '', 9, 3, 10),
(60, '', '<p> \r\nQuieroUnPerro.com es un sitio creado para la comunidad amante de los perros. En este portal podr? encontrar el perrito que siempre buscaste, conseguir la pareja perfecta para cruzarlo o buscarlo en caso de que est?perdido. Aqu?tambi? podr? adoptar a aqu?los que son abandonados y viven en terribles condiciones o ayudar a buscarles una familia.\r\n</br>\r\nQuieroUnPerro.com est?comprometido con la sociedad y ofrece espacios gratuitos para promover y concientizar acerca del respeto y cuidado de las mascotas. Tenemos por objetivo solucionar todas tus necesidades relacionadas al mejor amigo del hombre, abriendo canales de comunicaci? para contactar a otros amantes de perros y compartir experiencias.\r\n</br>\r\nEn este portal encontrar? informaci? de todo tipo de eventos caninos, promociones, art?ulos de inter? y un amplio directorio de productos y servicios para tu peludo, buscando siempre darle lo mejor a tu mascota.\r\n</p>\r\n<div class="sub_quienes"> LA COMINIDAD QUP</div>\r\n<p>\r\nLa comunidad de QuieroUnPerro.com (QUP) est?conformada por diversas organizaciones y asociaciones de protecci? animal que unen esfuerzos para procurar el cuidado, bienestar y respeto hacia los animales. QUP te invita a formar parte de los voluntarios que participan apoyando a dichas asociaciones en sus m?ltiples campa?s y actividades de rescate, adopci?, esterilizaci?, entre otras. Si quieres unirte, por favor cont?tanos a trav? del correo ayuda@quierounperro.com.\r\n</p>', 9, 2, 12),
(61, '', '<p><font class="sub_frecuentes">1.- ?Cu?tos anuncios se pueden publicar por usuario?</font>\r\n</br>\r\n- No existe un l?ite de anuncios para publicar por usuario. Cuando eres un usuario nuevo, tienes derecho a un anuncio de prueba gratis. Una vez utilizado, puedes adquirir la cantidad de anuncios que desees publicar. </p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes">2.- ?Con que medidas de seguridad cuenta el sitio?</font>\r\n</br>\r\n- El sitio cuenta con una programaci? segura, de manera que todos tus datos e informaci? se encuentran encriptados. Las transacciones se realizan directamente con el banco, de esta manera el sitio no tiene acceso a tu informaci? bancaria. Adem?, est?soportado por un dominio HTTPS que garantiza la seguridad del usuario.\r\n</p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes">3.- ?Por qu?no puedo ingresar a mi cuenta?</font>\r\n</br>\r\na) El usuario y/o la contrase? son incorrectos, puedes utilizar el campo de solicitud de contrase? y ?ta te ser?enviada a la cuenta de correo electr?ico que est?registrado en tu perfil de usuario. b) Tu cuenta ha sido cancelada debido a que se violaron una o m? de las pol?icas y/o t?minos y condiciones de uso de QuieroUnPerro.com\r\n</p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes">4.- ?Por qu?mi cuenta de usuario se ha cancelado?</font>\r\n</br>\r\nExisten varias  razones por las cuales se cancela una cuenta:\r\n-	El usuario ha violado una o m? de las pol?icas y/o t?minos y condiciones de uso de QuieroUnPerro.com\r\n</br>\r\n-	El usuario ha publicado anuncios o comentarios que atentan contra la moral, la salud, y las buenas costumbres.\r\n</br>\r\n-	El usuario ha publicado informaci? falsa en el sitio o ha intentado hacer transacciones fraudulentas.\r\n</br>\r\n-	El usuario ha publicado un anuncio de venta o cruza en las secciones de adopci? o perros perdidos debido a que son secciones gratuitas y de servicio a la comunidad.\r\n</br>\r\n</p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes">5.- ?Si olvid?mi cuenta, tengo que crear otro usuario?</font>\r\n</br>\r\n- No. Para recuperar tu usuario y contrase? solamente necesitas utilizar el campo para recuperar contrase? v? correo electr?ico, que est?situado en la secci? lateral izquierda de la p?ina de inicio en la secci? de mi cuenta. \r\n</p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes">6.- ?C?o puedo subir las fotos a mi anuncio?</font>\r\n</br>\r\n- Una vez que te encuentres en el tercer paso de creaci? de anuncio, deber? seleccionar el bot? "cargar im?enes" y se abrir?una ventana para seleccionar las im?enes de tu computadora. Si las im?enes son de un tama? superior a 1MB el tiempo de carga puede tardar unos minutos.\r\n</p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes">7.- ?C?o puedo saber si mi anuncio ya fue publicado?</font>\r\n</br>\r\n- Una vez que termines el proceso de creaci? de anuncio, ?te ser?revisado y aprobado para su publicaci? en el sitio, a pesar de ya haber sido pagado. Este proceso puede llegar a tardar hasta 12 horas h?iles. Puedes consultar el estatus de tu anuncio en cualquier momento en tu perfil de usuario. Una vez autorizado, ?te ser?publicado en la secci? previamente seleccionada y ser?visible para todos los visitantes del sitio.\r\n</p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes"> 8.-  Ya pasaron 12 horas h?iles y mi anuncio no ha sido publicado, ?qu?sucede? </font>\r\n</br>\r\n- Puede ser que el contenido del anuncio atente contra las pol?icas y t?minos y condiciones de QuieroUnPerro.com. Si este es el caso, recibir? un correo electr?ico donde se te comunique lo sucedido y los pasos a seguir. Si no lo has recibido, por favor envia un correo a contacto@quierounperro.com.\r\n</p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes">9.- ?Cu? es la vigencia de los anuncios en las secciones de publicaci??</font>\r\n</br>\r\n-La vigencia de los anuncios var? dependiendo del tipo de paquete que se ha contratado, para el caso de los paquetes Lite y Regular es de 30 d?s, y para los paquetes Premium es de 60 d?s.\r\n</p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes">10.- ?C?o  puedo  anunciar mi marca, producto, servicio o evento en la p?ina?</font>\r\n</br>\r\n- Env? un correo a la direcci? publicidad@quierounperro.com y llena la informaci? que se solicita. Un representante se pondr?en contacto contigo para mayor informaci?\r\n', 9, 2, 15),
(66, 'banner_superior/_da1fc__d4cef__538f2__c3f56_1.png', '', 9, 1, 6),
(67, 'banner_superior/_59d0c__b4733__166ef__2c8e3_2_thumb.png', '', 9, 1, 6),
(68, 'banner_inferior/_612a8__618d4__5194f__e7dfc_1.png', '', 9, 3, 6),
(69, 'banner_superior/_21256__376b2__6b72f__5a979_1.png', '', 9, 1, 11),
(70, 'banner_superior/_789c4__88bd7__6b72f__5a979_1.png', '', 9, 1, 11),
(71, 'banner_inferior/_78025__0db88__5194f__e7dfc_1_thumb.png', '', 9, 3, 11),
(72, 'banner_inferior/_1b836__014a7__59d0c__b4733__166ef__2c8e3_2_thumb.png', '', 9, 3, 11),
(73, 'banner_superior/_7b53a__16a81__6b72f__5a979_1.png', '', 9, 1, 3),
(74, 'banner_inferior/_56e25__14b09__6b72f__5a979_1.png', '', 9, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
`cartID` int(11) NOT NULL,
  `usuarioID` int(11) DEFAULT NULL,
  `productoID` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL COMMENT 'cantidad',
  `precio` float(5,2) DEFAULT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `talla` varchar(120) DEFAULT NULL,
  `color` varchar(70) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`cartID`, `usuarioID`, `productoID`, `cantidad`, `precio`, `nombre`, `talla`, `color`) VALUES
(3, 2, 17, 10, 78.00, 'MMM', '3', 'AMARILLO'),
(4, 2, 3, 1, 123.00, 'AAA', '0', '0'),
(7, 3, 1, 1, 999.99, 'BOTAS DE LLUVIA', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritototal`
--

CREATE TABLE IF NOT EXISTS `carritototal` (
`carritoTotalID` int(11) NOT NULL,
  `usuarioID` int(11) DEFAULT NULL,
  `totalProductos` float(9,2) DEFAULT NULL,
  `totalPrecio` float(9,2) DEFAULT NULL,
  `subtotal` float(9,2) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=16384;

--
-- Volcado de datos para la tabla `carritototal`
--

INSERT INTO `carritototal` (`carritoTotalID`, `usuarioID`, `totalProductos`, `totalPrecio`, `subtotal`, `descuento`) VALUES
(1, 2, 11.00, 903.00, 903.00, 0),
(2, 7, 0.00, 0.00, 0.00, 0),
(3, 3, 1.00, 949.99, 999.99, 5),
(4, 15, 0.00, NULL, 0.00, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogoproductos`
--

CREATE TABLE IF NOT EXISTS `catalogoproductos` (
`productoID` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `sku` varchar(30) NOT NULL,
  `precio` float(7,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1024;

--
-- Volcado de datos para la tabla `catalogoproductos`
--

INSERT INTO `catalogoproductos` (`productoID`, `nombre`, `descripcion`, `sku`, `precio`) VALUES
(1, 'BOTAS DE LLUVIA', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut aliquam arcu. Aliquam lectus ante, aliquam vitae consectetur eu, blandit at massa. Suspendisse nec elementum leo. Nullam auctor neque eu nulla tincidunt consequat. Nullam ut massa eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse gravida nec sapien a tempor. ', 'BBB001', 1500.00),
(3, 'AAA', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut aliquam arcu. Aliquam lectus ante, aliquam vitae consectetur eu, blandit at massa. Suspendisse nec elementum leo. Nullam auctor neque eu nulla tincidunt consequat. Nullam ut massa eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse gravida nec sapien a tempor. ', 'AAA01', 123.00),
(4, 'BBB', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut aliquam arcu. Aliquam lectus ante, aliquam vitae consectetur eu, blandit at massa. Suspendisse nec elementum leo. Nullam auctor neque eu nulla tincidunt consequat. Nullam ut massa eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse gravida nec sapien a tempor. ', 'BBB', 5656.00),
(5, 'CCC', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut aliquam arcu. Aliquam lectus ante, aliquam vitae consectetur eu, blandit at massa. Suspendisse nec elementum leo. Nullam auctor neque eu nulla tincidunt consequat. Nullam ut massa eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse gravida nec sapien a tempor. ', 'CCC', 234.00),
(6, 'DDD', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut aliquam arcu. Aliquam lectus ante, aliquam vitae consectetur eu, blandit at massa. Suspendisse nec elementum leo. Nullam auctor neque eu nulla tincidunt consequat. Nullam ut massa eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse gravida nec sapien a tempor. ', 'DDD', 555.00),
(7, 'EE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut aliquam arcu. Aliquam lectus ante, aliquam vitae consectetur eu, blandit at massa. Suspendisse nec elementum leo. Nullam auctor neque eu nulla tincidunt consequat. Nullam ut massa eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse gravida nec sapien a tempor. ', 'EE', 234.00),
(8, 'FFF', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut aliquam arcu. Aliquam lectus ante, aliquam vitae consectetur eu, blandit at massa. Suspendisse nec elementum leo. Nullam auctor neque eu nulla tincidunt consequat. Nullam ut massa eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse gravida nec sapien a tempor. ', 'FFF', 65.00),
(9, 'GGG', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut aliquam arcu. Aliquam lectus ante, aliquam vitae consectetur eu, blandit at massa. Suspendisse nec elementum leo. Nullam auctor neque eu nulla tincidunt consequat. Nullam ut massa eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse gravida nec sapien a tempor. ', 'GGG', 78.00),
(10, 'HHH', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut aliquam arcu. Aliquam lectus ante, aliquam vitae consectetur eu, blandit at massa. Suspendisse nec elementum leo. Nullam auctor neque eu nulla tincidunt consequat. Nullam ut massa eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse gravida nec sapien a tempor. ', 'HHH', 0.00),
(11, 'JJJ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut aliquam arcu. Aliquam lectus ante, aliquam vitae consectetur eu, blandit at massa. Suspendisse nec elementum leo. Nullam auctor neque eu nulla tincidunt consequat. Nullam ut massa eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse gravida nec sapien a tempor. ', 'JJJ', 56.00),
(12, 'HHH', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut aliquam arcu. Aliquam lectus ante, aliquam vitae consectetur eu, blandit at massa. Suspendisse nec elementum leo. Nullam auctor neque eu nulla tincidunt consequat. Nullam ut massa eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse gravida nec sapien a tempor. ', 'HHH', 78.00),
(13, 'HHH', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut aliquam arcu. Aliquam lectus ante, aliquam vitae consectetur eu, blandit at massa. Suspendisse nec elementum leo. Nullam auctor neque eu nulla tincidunt consequat. Nullam ut massa eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse gravida nec sapien a tempor. ', 'HHH', 78.00),
(14, 'III', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut aliquam arcu. Aliquam lectus ante, aliquam vitae consectetur eu, blandit at massa. Suspendisse nec elementum leo. Nullam auctor neque eu nulla tincidunt consequat. Nullam ut massa eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse gravida nec sapien a tempor. ', 'III', 87.00),
(15, 'KK', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut aliquam arcu. Aliquam lectus ante, aliquam vitae consectetur eu, blandit at massa. Suspendisse nec elementum leo. Nullam auctor neque eu nulla tincidunt consequat. Nullam ut massa eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse gravida nec sapien a tempor. ', 'KKK', 89.00),
(16, 'LLL', 'ssssssssssssss', 'LLL', 80.00),
(17, 'MMM', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut aliquam arcu. Aliquam lectus ante, aliquam vitae consectetur eu, blandit at massa. Suspendisse nec elementum leo. Nullam auctor neque eu nulla tincidunt consequat. Nullam ut massa eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse gravida nec sapien a tempor. ', 'MMM', 78.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=9362 COMMENT='tabla necesaria para CodeIgniter ... ';

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('ff6977f5fb8deb0033b27ef1c550f1c5', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.111 Safari/537.36', 1416808520, 'a:14:{s:9:"user_data";s:0:"";s:6:"banner";a:48:{i:0;O:8:"stdClass":6:{s:8:"bannerID";s:1:"6";s:8:"imgbaner";s:40:"banner_lateral/_9ad4a__0019e_3_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"4";s:9:"seccionID";s:2:"17";}i:1;O:8:"stdClass":6:{s:8:"bannerID";s:1:"7";s:8:"imgbaner";s:35:"/_29f25__15bf6_Hydrangeas_thumb.jpg";s:5:"texto";s:11:"texto apoyo";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"1";}i:2;O:8:"stdClass":6:{s:8:"bannerID";s:2:"11";s:8:"imgbaner";s:53:"banner_superior/_b2fea__fce75_Chrysanthemum_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"1";}i:3;O:8:"stdClass":6:{s:8:"bannerID";s:2:"13";s:8:"imgbaner";s:0:"";s:5:"texto";s:5:"Apoyo";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"2";}i:4;O:8:"stdClass":6:{s:8:"bannerID";s:2:"16";s:8:"imgbaner";s:0:"";s:5:"texto";s:15:"APOYO EN PERFIL";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"5";}i:5;O:8:"stdClass":6:{s:8:"bannerID";s:2:"19";s:8:"imgbaner";s:0:"";s:5:"texto";s:33:"TEXTO DE APOYO EN ADOPCION ZONA 9";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"6";}i:6;O:8:"stdClass":6:{s:8:"bannerID";s:2:"20";s:8:"imgbaner";s:47:"banner_superior/_822d8__10821_accept1_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"4";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"6";}i:7;O:8:"stdClass":6:{s:8:"bannerID";s:2:"21";s:8:"imgbaner";s:47:"banner_inferior/_88e8c__a065d_accept1_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"4";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"6";}i:8;O:8:"stdClass":6:{s:8:"bannerID";s:2:"22";s:8:"imgbaner";s:0:"";s:5:"texto";s:36:"TEXTO DE APOYO EN ADOPCION EN ZONA 4";s:6:"zonaID";s:1:"4";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"6";}i:9;O:8:"stdClass":6:{s:8:"bannerID";s:2:"24";s:8:"imgbaner";s:0:"";s:5:"texto";s:21:"APOYO EN ASOCIACIONES";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:2:"11";}i:10;O:8:"stdClass":6:{s:8:"bannerID";s:2:"27";s:8:"imgbaner";s:0:"";s:5:"texto";s:14:"APOYO EN CRUZA";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"3";}i:11;O:8:"stdClass":6:{s:8:"bannerID";s:2:"29";s:8:"imgbaner";s:34:"/_2d53b__bd399_900x500_1_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"1";}i:12;O:8:"stdClass":6:{s:8:"bannerID";s:2:"30";s:8:"imgbaner";s:34:"/_d6b77__32fe3_900x500_2_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"1";}i:13;O:8:"stdClass":6:{s:8:"bannerID";s:2:"31";s:8:"imgbaner";s:34:"/_32586__d5ea9_900x500_3_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"1";}i:14;O:8:"stdClass":6:{s:8:"bannerID";s:2:"32";s:8:"imgbaner";s:41:"banner_superior/_166ef__2c8e3_2_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"1";}i:15;O:8:"stdClass":6:{s:8:"bannerID";s:2:"33";s:8:"imgbaner";s:55:"banner_superior/_58322__060cc__166ef__2c8e3_2_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"1";}i:16;O:8:"stdClass":6:{s:8:"bannerID";s:2:"34";s:8:"imgbaner";s:73:"banner_superior/_129a3__05901__4e023__0fbf0_Chrysanthemum_thumb_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"2";}i:17;O:8:"stdClass":6:{s:8:"bannerID";s:2:"36";s:8:"imgbaner";s:70:"banner_superior/_ea1f1__d803d__3bbd0__55d73_Hydrangeas_thumb_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:2:"16";}i:18;O:8:"stdClass":6:{s:8:"bannerID";s:2:"37";s:8:"imgbaner";s:73:"banner_inferior/_53d25__26d2b__4e023__0fbf0_Chrysanthemum_thumb_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:2:"16";}i:19;O:8:"stdClass":6:{s:8:"bannerID";s:2:"38";s:8:"imgbaner";s:69:"banner_superior/_c95b5__56c48__7fa10__f1a51_Jellyfish_thumb_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"2";}i:20;O:8:"stdClass":6:{s:8:"bannerID";s:2:"39";s:8:"imgbaner";s:61:"banner_superior/_bc22e__3527e__166ef__2c8e3_2_thumb_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"2";}i:21;O:8:"stdClass":6:{s:8:"bannerID";s:2:"40";s:8:"imgbaner";s:41:"banner_superior/_538f2__c3f56_1_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"4";}i:22;O:8:"stdClass":6:{s:8:"bannerID";s:2:"41";s:8:"imgbaner";s:73:"banner_superior/_37a6d__acac4__4e023__0fbf0_Chrysanthemum_thumb_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"4";}i:23;O:8:"stdClass":6:{s:8:"bannerID";s:2:"42";s:8:"imgbaner";s:0:"";s:5:"texto";s:28:"texto de apoyo en directorio";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"4";}i:24;O:8:"stdClass":6:{s:8:"bannerID";s:2:"43";s:8:"imgbaner";s:41:"banner_inferior/_aa110__287d6_1_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"2";}i:25;O:8:"stdClass":6:{s:8:"bannerID";s:2:"44";s:8:"imgbaner";s:41:"banner_inferior/_70a27__f56d0_3_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"4";}i:26;O:8:"stdClass":6:{s:8:"bannerID";s:2:"45";s:8:"imgbaner";s:69:"banner_superior/_2ef37__170fb__18b38__28cb4_Jellyfish_thumb_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:2:"12";}i:27;O:8:"stdClass":6:{s:8:"bannerID";s:2:"46";s:8:"imgbaner";s:61:"banner_inferior/_ab70f__f34f8__70a27__f56d0_3_thumb_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:2:"12";}i:28;O:8:"stdClass":6:{s:8:"bannerID";s:2:"47";s:8:"imgbaner";s:41:"banner_superior/_5194f__e7dfc_1_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"5";}i:29;O:8:"stdClass":6:{s:8:"bannerID";s:2:"48";s:8:"imgbaner";s:93:"banner_superior/_020f5__f51a1__53d25__26d2b__4e023__0fbf0_Chrysanthemum_thumb_thumb_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"7";}i:30;O:8:"stdClass":6:{s:8:"bannerID";s:2:"50";s:8:"imgbaner";s:93:"banner_inferior/_177ec__8529a__53d25__26d2b__4e023__0fbf0_Chrysanthemum_thumb_thumb_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"7";}i:31;O:8:"stdClass":6:{s:8:"bannerID";s:2:"51";s:8:"imgbaner";s:0:"";s:5:"texto";s:24:"Texto en perros perdidos";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"7";}i:32;O:8:"stdClass":6:{s:8:"bannerID";s:2:"52";s:8:"imgbaner";s:69:"banner_superior/_06179__9df0b__18b38__28cb4_Jellyfish_thumb_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"8";}i:33;O:8:"stdClass":6:{s:8:"bannerID";s:2:"53";s:8:"imgbaner";s:58:"banner_superior/_9f7dd__8bd3d_Hydrangeas_-_copia_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:2:"10";}i:34;O:8:"stdClass":6:{s:8:"bannerID";s:2:"54";s:8:"imgbaner";s:53:"banner_superior/_be6d7__4ca8d_Chrysanthemum_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"9";}i:35;O:8:"stdClass":6:{s:8:"bannerID";s:2:"55";s:8:"imgbaner";s:58:"banner_inferior/_80f93__c922b_Hydrangeas_-_copia_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"9";}i:36;O:8:"stdClass":6:{s:8:"bannerID";s:2:"56";s:8:"imgbaner";s:89:"banner_inferior/_af503__4edd9_Captura_de_pantalla_2014-08-19_a_la(s)_14.00_.57__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:2:"10";}i:37;O:8:"stdClass":6:{s:8:"bannerID";s:2:"60";s:8:"imgbaner";s:0:"";s:5:"texto";s:1462:"<p> \r\nQuieroUnPerro.com es un sitio creado para la comunidad amante de los perros. En este portal podr? encontrar el perrito que siempre buscaste, conseguir la pareja perfecta para cruzarlo o buscarlo en caso de que est?perdido. Aqu?tambi? podr? adoptar a aqu?los que son abandonados y viven en terribles condiciones o ayudar a buscarles una familia.\r\n</br>\r\nQuieroUnPerro.com est?comprometido con la sociedad y ofrece espacios gratuitos para promover y concientizar acerca del respeto y cuidado de las mascotas. Tenemos por objetivo solucionar todas tus necesidades relacionadas al mejor amigo del hombre, abriendo canales de comunicaci? para contactar a otros amantes de perros y compartir experiencias.\r\n</br>\r\nEn este portal encontrar? informaci? de todo tipo de eventos caninos, promociones, art?ulos de inter? y un amplio directorio de productos y servicios para tu peludo, buscando siempre darle lo mejor a tu mascota.\r\n</p>\r\n<div class="sub_quienes"> LA COMINIDAD QUP</div>\r\n<p>\r\nLa comunidad de QuieroUnPerro.com (QUP) est?conformada por diversas organizaciones y asociaciones de protecci? animal que unen esfuerzos para procurar el cuidado, bienestar y respeto hacia los animales. QUP te invita a formar parte de los voluntarios que participan apoyando a dichas asociaciones en sus m?ltiples campa?s y actividades de rescate, adopci?, esterilizaci?, entre otras. Si quieres unirte, por favor cont?tanos a trav? del correo ayuda@quierounperro.com.\r\n</p>";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:2:"12";}i:38;O:8:"stdClass":6:{s:8:"bannerID";s:2:"61";s:8:"imgbaner";s:0:"";s:5:"texto";s:4224:"<p><font class="sub_frecuentes">1.- ?Cu?tos anuncios se pueden publicar por usuario?</font>\r\n</br>\r\n- No existe un l?ite de anuncios para publicar por usuario. Cuando eres un usuario nuevo, tienes derecho a un anuncio de prueba gratis. Una vez utilizado, puedes adquirir la cantidad de anuncios que desees publicar. </p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes">2.- ?Con que medidas de seguridad cuenta el sitio?</font>\r\n</br>\r\n- El sitio cuenta con una programaci? segura, de manera que todos tus datos e informaci? se encuentran encriptados. Las transacciones se realizan directamente con el banco, de esta manera el sitio no tiene acceso a tu informaci? bancaria. Adem?, est?soportado por un dominio HTTPS que garantiza la seguridad del usuario.\r\n</p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes">3.- ?Por qu?no puedo ingresar a mi cuenta?</font>\r\n</br>\r\na) El usuario y/o la contrase? son incorrectos, puedes utilizar el campo de solicitud de contrase? y ?ta te ser?enviada a la cuenta de correo electr?ico que est?registrado en tu perfil de usuario. b) Tu cuenta ha sido cancelada debido a que se violaron una o m? de las pol?icas y/o t?minos y condiciones de uso de QuieroUnPerro.com\r\n</p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes">4.- ?Por qu?mi cuenta de usuario se ha cancelado?</font>\r\n</br>\r\nExisten varias  razones por las cuales se cancela una cuenta:\r\n-	El usuario ha violado una o m? de las pol?icas y/o t?minos y condiciones de uso de QuieroUnPerro.com\r\n</br>\r\n-	El usuario ha publicado anuncios o comentarios que atentan contra la moral, la salud, y las buenas costumbres.\r\n</br>\r\n-	El usuario ha publicado informaci? falsa en el sitio o ha intentado hacer transacciones fraudulentas.\r\n</br>\r\n-	El usuario ha publicado un anuncio de venta o cruza en las secciones de adopci? o perros perdidos debido a que son secciones gratuitas y de servicio a la comunidad.\r\n</br>\r\n</p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes">5.- ?Si olvid?mi cuenta, tengo que crear otro usuario?</font>\r\n</br>\r\n- No. Para recuperar tu usuario y contrase? solamente necesitas utilizar el campo para recuperar contrase? v? correo electr?ico, que est?situado en la secci? lateral izquierda de la p?ina de inicio en la secci? de mi cuenta. \r\n</p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes">6.- ?C?o puedo subir las fotos a mi anuncio?</font>\r\n</br>\r\n- Una vez que te encuentres en el tercer paso de creaci? de anuncio, deber? seleccionar el bot? "cargar im?enes" y se abrir?una ventana para seleccionar las im?enes de tu computadora. Si las im?enes son de un tama? superior a 1MB el tiempo de carga puede tardar unos minutos.\r\n</p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes">7.- ?C?o puedo saber si mi anuncio ya fue publicado?</font>\r\n</br>\r\n- Una vez que termines el proceso de creaci? de anuncio, ?te ser?revisado y aprobado para su publicaci? en el sitio, a pesar de ya haber sido pagado. Este proceso puede llegar a tardar hasta 12 horas h?iles. Puedes consultar el estatus de tu anuncio en cualquier momento en tu perfil de usuario. Una vez autorizado, ?te ser?publicado en la secci? previamente seleccionada y ser?visible para todos los visitantes del sitio.\r\n</p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes"> 8.-  Ya pasaron 12 horas h?iles y mi anuncio no ha sido publicado, ?qu?sucede? </font>\r\n</br>\r\n- Puede ser que el contenido del anuncio atente contra las pol?icas y t?minos y condiciones de QuieroUnPerro.com. Si este es el caso, recibir? un correo electr?ico donde se te comunique lo sucedido y los pasos a seguir. Si no lo has recibido, por favor envia un correo a contacto@quierounperro.com.\r\n</p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes">9.- ?Cu? es la vigencia de los anuncios en las secciones de publicaci??</font>\r\n</br>\r\n-La vigencia de los anuncios var? dependiendo del tipo de paquete que se ha contratado, para el caso de los paquetes Lite y Regular es de 30 d?s, y para los paquetes Premium es de 60 d?s.\r\n</p>\r\n</br>\r\n<p>\r\n<font class="sub_frecuentes">10.- ?C?o  puedo  anunciar mi marca, producto, servicio o evento en la p?ina?</font>\r\n</br>\r\n- Env? un correo a la direcci? publicidad@quierounperro.com y llena la informaci? que se solicita. Un representante se pondr?en contacto contigo para mayor informaci?\r\n";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:2:"15";}i:39;O:8:"stdClass":6:{s:8:"bannerID";s:2:"66";s:8:"imgbaner";s:49:"banner_superior/_da1fc__d4cef__538f2__c3f56_1.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"6";}i:40;O:8:"stdClass":6:{s:8:"bannerID";s:2:"67";s:8:"imgbaner";s:55:"banner_superior/_59d0c__b4733__166ef__2c8e3_2_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"6";}i:41;O:8:"stdClass":6:{s:8:"bannerID";s:2:"68";s:8:"imgbaner";s:49:"banner_inferior/_612a8__618d4__5194f__e7dfc_1.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"6";}i:42;O:8:"stdClass":6:{s:8:"bannerID";s:2:"69";s:8:"imgbaner";s:49:"banner_superior/_21256__376b2__6b72f__5a979_1.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:2:"11";}i:43;O:8:"stdClass":6:{s:8:"bannerID";s:2:"70";s:8:"imgbaner";s:49:"banner_superior/_789c4__88bd7__6b72f__5a979_1.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:2:"11";}i:44;O:8:"stdClass":6:{s:8:"bannerID";s:2:"71";s:8:"imgbaner";s:55:"banner_inferior/_78025__0db88__5194f__e7dfc_1_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:2:"11";}i:45;O:8:"stdClass":6:{s:8:"bannerID";s:2:"72";s:8:"imgbaner";s:69:"banner_inferior/_1b836__014a7__59d0c__b4733__166ef__2c8e3_2_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:2:"11";}i:46;O:8:"stdClass":6:{s:8:"bannerID";s:2:"73";s:8:"imgbaner";s:49:"banner_superior/_7b53a__16a81__6b72f__5a979_1.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"3";}i:47;O:8:"stdClass":6:{s:8:"bannerID";s:2:"74";s:8:"imgbaner";s:49:"banner_inferior/_56e25__14b09__6b72f__5a979_1.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"3";}}s:6:"logged";b:1;s:9:"idUsuario";s:1:"3";s:6:"correo";s:21:"marthahdez2@gmail.com";s:6:"nombre";s:6:"martha";s:8:"apellido";s:4:"hdez";s:8:"telefono";s:10:"1234567890";s:11:"tipoUsuario";s:1:"1";s:7:"authKey";s:20:"9476F43EE80632ECF018";s:5:"nivel";s:1:"1";s:13:"idUsuarioDato";N;s:3:"rol";i:1;s:14:"manuallyLogged";b:1;}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
`compraID` int(11) NOT NULL,
  `usuarioID` int(11) NOT NULL,
  `subtotal` float(5,2) NOT NULL,
  `idCuponAdquirido` int(11) DEFAULT NULL,
  `descuento` int(2) DEFAULT NULL,
  `total` float(5,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `pagado` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`compraID`, `usuarioID`, `subtotal`, `idCuponAdquirido`, `descuento`, `total`, `fecha`, `pagado`) VALUES
(1, 3, 425.00, NULL, 20, 340.00, '2014-08-06 00:11:56', 1),
(2, 3, 123.00, NULL, 5, 116.85, '2014-08-13 00:38:34', 1),
(3, 3, 999.99, NULL, 0, 999.99, '2014-08-13 00:45:08', 1),
(4, 7, 999.99, NULL, NULL, 999.99, '2014-08-14 01:40:51', 1),
(5, 3, 999.99, NULL, NULL, 999.99, '2014-08-14 09:34:45', 1),
(6, 3, 5.00, 0, 5, 4.75, '2014-08-15 02:36:22', 0),
(7, 3, 100.00, 0, 5, 95.00, '2014-08-15 02:38:14', 0),
(8, 3, 100.00, 0, 0, 100.00, '2014-08-15 03:07:56', 0),
(9, 3, 100.00, 0, 0, 100.00, '2014-08-15 03:08:04', 1),
(10, 3, 5.00, 0, 5, 4.75, '2014-08-15 09:58:24', 1),
(11, 3, 100.00, 0, 0, 100.00, '2014-08-15 09:59:09', 1),
(12, 3, 100.00, 0, 5, 95.00, '2014-08-15 10:14:57', 1),
(13, 3, 100.00, 0, 5, 95.00, '2014-08-15 10:18:25', 1),
(14, 3, 100.00, 0, 0, 100.00, '2014-08-15 10:26:03', 1),
(15, 3, 5.00, 0, 0, 5.00, '2014-08-15 10:33:24', 1),
(16, 3, 5.00, 0, 0, 5.00, '2014-08-15 10:41:40', 1),
(17, 3, 100.00, 0, 0, 100.00, '2014-08-15 10:44:05', 1),
(18, 3, 100.00, 0, 0, 100.00, '2014-08-15 11:45:27', 1),
(19, 3, 100.00, 0, 0, 100.00, '2014-08-15 11:47:47', 1),
(20, 3, 5.00, 0, 0, 5.00, '2014-08-15 11:57:39', 1),
(21, 3, 100.00, 0, 0, 100.00, '2014-08-15 12:02:45', 1),
(22, 3, 100.00, 0, 0, 100.00, '2014-08-15 12:09:54', 0),
(23, 3, 100.00, 0, 0, 100.00, '2014-08-15 12:10:38', 1),
(24, 3, 166.00, 0, 5, 157.70, '2014-08-15 12:12:25', 1),
(25, 3, 5.00, 0, 0, 5.00, '2014-08-15 12:19:55', 170),
(26, 3, 100.00, 0, 0, 100.00, '2014-08-15 12:22:15', 1),
(27, 3, 5.00, 0, 0, 5.00, '2014-08-15 16:30:07', 1),
(28, 3, 100.00, 0, 0, 100.00, '2014-08-15 18:30:16', 1),
(29, 7, 5.00, 0, 0, 5.00, '2014-08-17 17:38:18', 1),
(30, 3, 0.00, 0, 0, 0.00, '2014-08-25 07:01:46', 1),
(31, 3, 0.00, 0, 0, 0.00, '2014-08-25 07:12:20', 1),
(32, 3, 0.00, 0, 0, 0.00, '2014-08-25 07:36:19', 1),
(33, 3, 0.00, 0, 0, 0.00, '2014-08-25 12:59:53', 1),
(34, 2, 0.00, 0, 0, 0.00, '2014-10-15 17:37:06', 1),
(35, 3, 0.00, 0, 0, 0.00, '2014-10-15 19:40:31', 1),
(36, 3, 100.00, 1, 10, 90.00, '2014-10-15 19:46:21', 0),
(37, 3, 100.00, 2, 10, 90.00, '2014-10-16 23:46:39', 0),
(38, 3, 100.00, 3, 10, 90.00, '2014-10-17 00:01:38', 0),
(39, 3, 100.00, 4, 10, 90.00, '2014-11-02 00:11:21', 0),
(40, 3, 100.00, 5, 10, 90.00, '2014-11-02 00:18:37', 0),
(41, 3, 100.00, 8, 10, 90.00, '2014-11-04 17:08:16', 0),
(42, 3, 100.00, 9, 10, 90.00, '2014-11-04 17:22:18', 0),
(43, 3, 100.00, 10, 10, 90.00, '2014-11-04 23:13:38', 0),
(44, 3, 0.00, 0, 0, 0.00, '2014-11-11 21:25:57', 1),
(45, 3, 166.00, 0, 0, 166.00, '2014-11-23 23:57:47', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compradetalle`
--

CREATE TABLE IF NOT EXISTS `compradetalle` (
`compraDetalleID` int(11) NOT NULL,
  `compraID` int(11) NOT NULL,
  `productoID` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float(5,2) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `talla` varchar(120) NOT NULL,
  `color` varchar(120) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096;

--
-- Volcado de datos para la tabla `compradetalle`
--

INSERT INTO `compradetalle` (`compraDetalleID`, `compraID`, `productoID`, `cantidad`, `precio`, `nombre`, `talla`, `color`) VALUES
(1, 1, 11, 1, 56.00, 'JJJ', '', ''),
(2, 1, 3, 3, 123.00, 'AAA', '', ''),
(3, 2, 3, 1, 123.00, 'AAA', '0', '0'),
(4, 3, 1, 2, 999.99, 'BOTAS DE LLUVIA', '0', '0'),
(5, 4, 1, 4, 999.99, 'BOTAS DE LLUVIA', '0', '0'),
(6, 5, 1, 1, 999.99, 'BOTAS DE LLUVIA', '0', '0'),
(7, 23, 23, 1, 100.00, 'Regular', '', ''),
(8, 24, 61, 1, 166.00, 'Premium', '', ''),
(9, 25, 62, 1, 5.00, 'Lite', '', ''),
(10, 26, 63, 1, 100.00, 'Regular', '', ''),
(11, 27, 64, 1, 5.00, 'Lite', '', ''),
(12, 28, 65, 1, 100.00, 'Regular', '', ''),
(13, 29, 66, 1, 5.00, 'Lite', '', ''),
(14, 30, 1, 1, 0.00, 'Lite', '', ''),
(15, 31, 1, 1, 0.00, 'Lite', '', ''),
(16, 32, 1, 1, 0.00, 'Lite', '', ''),
(17, 33, 2, 1, 0.00, 'Lite', '', ''),
(18, 34, 3, 1, 0.00, 'Lite', '', ''),
(19, 35, 4, 1, 0.00, 'Lite', '', ''),
(20, 44, 15, 1, 0.00, 'Lite', '', ''),
(21, 45, 16, 1, 166.00, 'Premium', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contadormensajes`
--

CREATE TABLE IF NOT EXISTS `contadormensajes` (
`contadorID` int(11) NOT NULL,
  `cantMensajes` char(20) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE IF NOT EXISTS `contenido` (
`contenidoID` int(11) NOT NULL,
  `seccionID` int(1) NOT NULL,
  `seccionDetalle` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `fecha` varchar(80) NOT NULL,
  `zonaID` int(11) DEFAULT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `mes` varchar(30) DEFAULT NULL,
  `origenes` mediumtext,
  `caracter` mediumtext,
  `cualidades` mediumtext,
  `colores` mediumtext,
  `acercaDe` mediumtext,
  `horario` varchar(80) DEFAULT NULL,
  `lugar` varchar(120) DEFAULT NULL,
  `domicilio` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1365;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`contenidoID`, `seccionID`, `seccionDetalle`, `texto`, `fecha`, `zonaID`, `nombre`, `mes`, `origenes`, `caracter`, `cualidades`, `colores`, `acercaDe`, `horario`, `lugar`, `domicilio`) VALUES
(3, 8, 'Raza del mes', '', '2014-08-25', 9, 'ssss', 'Marzo', 's', 's', 's', 's', 's ', NULL, NULL, NULL),
(4, 8, 'Raza del mes', '', '2014-08-25', 0, '4', 'Abril', 'd', 'd', 'd', 'd', 'd  ', NULL, NULL, NULL),
(5, 8, 'Raza del mes', '', '2014-08-24', 9, '5', 'Junio', 'El Bich? malt? es una raza de perro de tama? peque? que surgi?en el Mediterr?eo central siendo Italia quien tom?el patrocinio. El nombre de la raza y el origen son, generalmente, asociados a la isla mediterr?ea de Malta, sin embargo, el nombre es a veces descrito con referencia a la isla de Mljet o Meleda', 'El Bich? malt? es una raza de perro de tama? peque? que surgi?en el Mediterr?eo central siendo Italia quien tom?el patrocinio. El nombre de la raza y el origen son, generalmente, asociados a la isla mediterr?ea de Malta, sin embargo, el nombre es a veces descrito con referencia a la isla de Mljet o Meleda', 'El Bich? malt? es una raza de perro de tama? peque? que surgi?en el Mediterr?eo central siendo Italia quien tom?el patrocinio. El nombre de la raza y el origen son, generalmente, asociados a la isla mediterr?ea de Malta, sin embargo, el nombre es a veces descrito con referencia a la isla de Mljet o Meleda', 'El Bich? malt? es una raza de perro de tama? peque? que surgi?en el Mediterr?eo central siendo Italia quien tom?el patrocinio. El nombre de la raza y el origen son, generalmente, asociados a la isla mediterr?ea de Malta, sin embargo, el nombre es a veces descrito con referencia a la isla de Mljet o Meleda', 'El Bich? malt? es una raza de perro de tama? peque? que surgi?en el Mediterr?eo central siendo Italia quien tom?el patrocinio. El nombre de la raza y el origen son, generalmente, asociados a la isla mediterr?ea de Malta, sin embargo, el nombre es a veces descrito con referencia a la isla de Mljet o Meleda', NULL, NULL, NULL),
(6, 8, 'Raza del mes', '', '2014-08-25', 9, 'sssssssssssssss', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL),
(11, 9, 'Evento del mes', 'Evento para perros peque?s con due?s especiales', '24 sep', 9, 'evento5', NULL, NULL, NULL, NULL, NULL, NULL, '10:00 - 12:00', 'HACIENDA JURICA', 'CIRCUITO DE LA CIENCIA '),
(12, 9, 'Evento del mes', 'domicilio conocido domicilio conocido domicilio conocido ', '14 oct', 9, 'evento de chihuahuas', NULL, NULL, NULL, NULL, NULL, NULL, '12:00 - 23:00', 'estadio azteca', 'domicilio conocido'),
(13, 9, 'Evento del mes', 'evento5', 'evento5', 9, 'evento5', NULL, NULL, NULL, NULL, NULL, NULL, 'evento5', 'evento5', 'evento5'),
(14, 9, 'Evento del mes', 'bbbb', 'bbb', 9, 'bbb', NULL, NULL, NULL, NULL, NULL, NULL, 'aaaaaaaaaa', 'b', 'bbb'),
(16, 10, 'Dato Curioso', 'En esta época de calor es normal salir más y disfrutar al aire libre; es buen momento para aprovechar y divertirnos con nuestras mascotas. Pero a la hora de exponernos al Sol debemos tomar ciertas precauciones, especialmente si vivimos en sitios muy cálidos. Hay razas de perros que no necesitan protegerse del Sol más allá de lo que dicta el sentido común, porque tienen mucho pelo, éste es grueso, o su piel es oscura; pero existen otras razas que son más sensibles a las exposiciones prolongadas a los rayos del Sol. Debemos tener más cuidado si nuestro perro no tiene pelo, si lo tiene muy fino, si su piel es clara o, evidentemente, si es albino. También debemos tener más precaución si nuestro perro es aún un cachorrito o si es ya viejo, ya que en estos casos son más sensibles a las temperaturas extremas. Tampoco debe abusar del Sol veraniego una perrita que esté preñada. Tenemos que conocer cómo es la piel de nuestro perro, fijarnos si tienen la piel clara y qué partes tiene sin cubrir de pelo.', '0', 9, 'Algunos consejos para el verano', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0'),
(17, 10, 'Dato Curioso', 'En esta época de calor es normal salir más y disfrutar al aire libre; es buen momento para aprovechar y divertirnos con nuestras mascotas. Pero a la hora de exponernos al Sol debemos tomar ciertas precauciones, especialmente si vivimos en sitios muy cálidos. Hay razas de perros que no necesitan protegerse del Sol más allá de lo que dicta el sentido común, porque tienen mucho pelo, éste es grueso, o su piel es oscura; pero existen otras razas que son más sensibles a las exposiciones prolongadas a los rayos del Sol. Debemos tener más cuidado si nuestro perro no tiene pelo, si lo tiene muy fino, si su piel es clara o, evidentemente, si es albino. También debemos tener más precaución si nuestro perro es aún un cachorrito o si es ya viejo, ya que en estos casos son más sensibles a las temperaturas extremas. Tampoco debe abusar del Sol veraniego una perrita que esté preñada. Tenemos que conocer cómo es la piel de nuestro perro, fijarnos si tienen la piel clara y qué partes tiene sin cubrir de pelo.', '0', 9, 'Datos Curiosos', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0'),
(18, 10, 'Dato Curioso', 'En esta época de calor es normal salir más y disfrutar al aire libre; es buen momento para aprovechar y divertirnos con nuestras mascotas. Pero a la hora de exponernos al Sol debemos tomar ciertas precauciones, especialmente si vivimos en sitios muy cálidos. Hay razas de perros que no necesitan protegerse del Sol más allá de lo que dicta el sentido común, porque tienen mucho pelo, éste es grueso, o su piel es oscura; pero existen otras razas que son más sensibles a las exposiciones prolongadas a los rayos del Sol. Debemos tener más cuidado si nuestro perro no tiene pelo, si lo tiene muy fino, si su piel es clara o, evidentemente, si es albino. También debemos tener más precaución si nuestro perro es aún un cachorrito o si es ya viejo, ya que en estos casos son más sensibles a las temperaturas extremas. Tampoco debe abusar del Sol veraniego una perrita que esté preñada. Tenemos que conocer cómo es la piel de nuestro perro, fijarnos si tienen la piel clara y qué partes tiene sin cubrir de pelo.', '0', 9, 'Datos Curiosos', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0'),
(19, 10, 'Dato Curioso', 'En esta época de calor es normal salir más y disfrutar al aire libre; es buen momento para aprovechar y divertirnos con nuestras mascotas. Pero a la hora de exponernos al Sol debemos tomar ciertas precauciones, especialmente si vivimos en sitios muy cálidos. Hay razas de perros que no necesitan protegerse del Sol más allá de lo que dicta el sentido común, porque tienen mucho pelo, éste es grueso, o su piel es oscura; pero existen otras razas que son más sensibles a las exposiciones prolongadas a los rayos del Sol. Debemos tener más cuidado si nuestro perro no tiene pelo, si lo tiene muy fino, si su piel es clara o, evidentemente, si es albino. También debemos tener más precaución si nuestro perro es aún un cachorrito o si es ya viejo, ya que en estos casos son más sensibles a las temperaturas extremas. Tampoco debe abusar del Sol veraniego una perrita que esté preñada. Tenemos que conocer cómo es la piel de nuestro perro, fijarnos si tienen la piel clara y qué partes tiene sin cubrir de pelo.', '0', 9, 'Datos Curiosos', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupon`
--

CREATE TABLE IF NOT EXISTS `cupon` (
`cuponID` int(11) NOT NULL,
  `nombreCupon` varchar(45) NOT NULL,
  `paqueteID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096;

--
-- Volcado de datos para la tabla `cupon`
--

INSERT INTO `cupon` (`cuponID`, `nombreCupon`, `paqueteID`) VALUES
(60, 'Tienda', 2),
(61, 'Paquete', 2),
(62, 'Negocio', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuponadquirido`
--

CREATE TABLE IF NOT EXISTS `cuponadquirido` (
`idCuponAdquirido` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `vigencia` date NOT NULL,
  `tipoCupon` int(1) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  `usado` tinyint(1) NOT NULL,
  `servicioID` int(11) NOT NULL,
  `detalleID` int(11) NOT NULL,
  `paqueteID` int(3) NOT NULL,
  `cuponDetalleID` int(11) DEFAULT NULL,
  `cuponID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=528;

--
-- Volcado de datos para la tabla `cuponadquirido`
--

INSERT INTO `cuponadquirido` (`idCuponAdquirido`, `descripcion`, `valor`, `vigencia`, `tipoCupon`, `vigente`, `usado`, `servicioID`, `detalleID`, `paqueteID`, `cuponDetalleID`, `cuponID`) VALUES
(1, 'cuponTienda', '10', '2014-10-30', 1, 1, 1, 5, 2, 2, 76, 60),
(2, 'cuponTienda', '10', '2014-10-31', 1, 1, 1, 6, 2, 2, 76, 60),
(3, 'cuponTienda', '10', '2014-11-01', 1, 1, 1, 7, 2, 2, 76, 60),
(4, 'cuponTienda', '10', '2014-11-17', 1, 1, 1, 8, 2, 2, 76, 60),
(5, 'cuponTienda', '10', '2014-11-17', 1, 1, 1, 9, 2, 2, 76, 60),
(8, 'cuponTienda', '10', '2014-11-19', 1, 1, 1, 12, 2, 2, 76, 60),
(9, 'cuponTienda', '10', '2014-11-19', 1, 1, 1, 13, 2, 2, 76, 60),
(10, 'cuponTienda', '10', '2014-11-19', 1, 1, 1, 14, 2, 2, 76, 60),
(11, 'AAAAA', '10', '2014-12-23', 3, 1, 0, 16, 3, 3, 78, 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupondetalle`
--

CREATE TABLE IF NOT EXISTS `cupondetalle` (
`cuponDetalleID` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `vigencia` int(2) NOT NULL,
  `tipoCupon` int(1) NOT NULL,
  `cuponID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096;

--
-- Volcado de datos para la tabla `cupondetalle`
--

INSERT INTO `cupondetalle` (`cuponDetalleID`, `descripcion`, `valor`, `vigencia`, `tipoCupon`, `cuponID`) VALUES
(76, 'cuponTienda', '10', 30, 1, 60),
(77, 'cuponPaquete', '80', 15, 2, 61),
(78, 'AAAAA', '10', 60, 3, 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinoenvio`
--

CREATE TABLE IF NOT EXISTS `destinoenvio` (
`destinoID` int(11) NOT NULL,
  `grupoID` int(11) NOT NULL,
  `estadoID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='agrupacion de estados segun costo de envio';

--
-- Volcado de datos para la tabla `destinoenvio`
--

INSERT INTO `destinoenvio` (`destinoID`, `grupoID`, `estadoID`) VALUES
(1, 1, 11),
(4, 2, 19),
(5, 2, 7),
(6, 3, 15),
(7, 4, 2),
(8, 5, 26),
(9, 6, 6),
(10, 7, 10),
(11, 8, 25),
(12, 8, 3),
(13, 9, 8),
(14, 9, 18),
(15, 9, 32),
(17, 11, 17),
(18, 11, 14),
(19, 11, 9),
(20, 11, 21),
(21, 11, 29),
(22, 12, 1),
(23, 12, 22),
(25, 12, 12),
(26, 12, 24),
(28, 13, 28),
(29, 14, 4),
(30, 14, 27),
(31, 15, 23),
(32, 15, 31),
(33, 16, 30),
(34, 16, 5),
(35, 16, 20),
(36, 12, 16),
(42, 10, 0),
(43, 10, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepaquete`
--

CREATE TABLE IF NOT EXISTS `detallepaquete` (
`detalleID` int(11) NOT NULL,
  `cantFotos` int(11) NOT NULL,
  `caracteres` int(11) NOT NULL,
  `vigencia` int(2) NOT NULL,
  `cupones` int(2) NOT NULL,
  `videos` int(2) NOT NULL,
  `precio` float(5,2) NOT NULL,
  `paqueteID` int(3) NOT NULL,
  `tipoPaquete` int(11) NOT NULL DEFAULT '1' COMMENT 'Elemento que identifica el tipo de paquete'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461;

--
-- Volcado de datos para la tabla `detallepaquete`
--

INSERT INTO `detallepaquete` (`detalleID`, `cantFotos`, `caracteres`, `vigencia`, `cupones`, `videos`, `precio`, `paqueteID`, `tipoPaquete`) VALUES
(1, 1, 30, 30, 0, 0, 0.00, 1, 1),
(2, 2, 300, 15, 2, 1, 100.00, 2, 2),
(3, 3, 1000, 60, 3, 2, 166.00, 3, 3),
(4, 0, 1000, 1825, 0, 0, 0.00, 4, 4),
(5, 0, 100, 30, 0, 0, 25.00, 5, 5),
(6, 0, 200, 60, 0, 0, 50.00, 6, 5),
(7, 0, 300, 90, 0, 0, 75.00, 7, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
`estadoID` int(11) NOT NULL,
  `nombreEstado` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=496;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`estadoID`, `nombreEstado`) VALUES
(1, 'Aguascalientes'),
(2, 'Baja California'),
(3, 'Baja California Sur'),
(4, 'Campeche'),
(5, 'Chiapas'),
(6, 'Chihuahua'),
(7, 'Coahuila'),
(8, 'Colima'),
(9, 'Distrito Federal'),
(10, 'Durango'),
(11, 'Estado de México'),
(12, 'Guanajuato'),
(13, 'Guerrero'),
(14, 'Hidalgo'),
(15, 'Jalisco'),
(16, 'Michoacán'),
(17, 'Morelos'),
(18, 'Nayarit'),
(19, 'Nuevo León'),
(20, 'Oaxaca'),
(21, 'Puebla'),
(22, 'Querétaro'),
(23, 'Quintana Roo'),
(24, 'San Luis Potosí'),
(25, 'Sinaloa'),
(26, 'Sonora'),
(27, 'Tabasco'),
(28, 'Tamaulipas'),
(29, 'Tlaxcala'),
(30, 'Veracruz'),
(31, 'Yucatán'),
(32, 'Zacatecas'),
(33, 'Fuera de México');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE IF NOT EXISTS `favoritos` (
  `publicacionID` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`publicacionID`, `idUsuario`) VALUES
(1, 7),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotoscontenido`
--

CREATE TABLE IF NOT EXISTS `fotoscontenido` (
`fotoID` int(11) NOT NULL,
  `foto` varchar(120) NOT NULL,
  `contenidoID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=819;

--
-- Volcado de datos para la tabla `fotoscontenido`
--

INSERT INTO `fotoscontenido` (`fotoID`, `foto`, `contenidoID`) VALUES
(7, '_18b38__28cb4_Jellyfish1.jpg', 5),
(8, '_18b38__28cb4_Jellyfish.jpg', 4),
(9, 'Imagen5.png', 4),
(11, 'Imagen71.jpg', 3),
(13, 'Tulips1.jpg', 13),
(17, 'Hydrangeas_-_copia1.jpg', 14),
(27, '32.png', 16),
(28, '12.png', 17),
(29, '22.png', 18),
(30, '42.png', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotospublicacion`
--

CREATE TABLE IF NOT EXISTS `fotospublicacion` (
`fotoID` int(11) NOT NULL,
  `foto` varchar(180) NOT NULL,
  `publicacionID` int(11) NOT NULL,
  `servicioID` int(11) NOT NULL,
  `detalleID` int(11) NOT NULL,
  `paqueteID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=16384;

--
-- Volcado de datos para la tabla `fotospublicacion`
--

INSERT INTO `fotospublicacion` (`fotoID`, `foto`, `publicacionID`, `servicioID`, `detalleID`, `paqueteID`) VALUES
(1, '', 1, 1, 1, 1),
(2, 'images/anuncios/images', 49, 57, 2, 2),
(3, 'images/anuncios/temp', 49, 57, 2, 2),
(4, 'images/anuncios/images', 50, 58, 2, 2),
(5, 'images/anuncios/temp', 50, 58, 2, 2),
(6, 'images/anuncios/', 51, 59, 2, 2),
(7, 'images/anuncios/', 51, 59, 2, 2),
(8, 'images/anuncios/', 52, 60, 1, 1),
(9, 'images/anuncios/', 52, 60, 1, 1),
(10, 'images/anuncios/9edbf86a-6af0-4125-b49e-e3da11376c79.png', 53, 61, 1, 1),
(11, 'images/anuncios/9edbf86a-6af0-4125-b49e-e3da11376c79.png', 53, 61, 1, 1),
(12, 'images/anuncios/a', 54, 62, 2, 2),
(13, 'images/anuncios/m', 54, 62, 2, 2),
(14, 'images/anuncios/Array', 55, 63, 2, 2),
(15, 'images/anuncios/Array', 55, 63, 2, 2),
(16, 'images/anuncios/ecda8234-666e-42a3-b122-5e1513cd38ac.png', 56, 64, 2, 2),
(17, 'images/anuncios/ecda8234-666e-42a3-b122-5e1513cd38ac.png', 56, 64, 2, 2),
(18, 'images/anuncios/e67d900a-87d9-4c02-8de3-b482adb98eb7.png', 57, 65, 1, 1),
(19, 'images/anuncios/e67d900a-87d9-4c02-8de3-b482adb98eb7.png', 57, 65, 1, 1),
(20, 'images/anuncios/0a1fe7b7-c86d-488e-bdf1-fc7b85f63b4d.png', 58, 66, 2, 2),
(21, 'images/anuncios/0a1fe7b7-c86d-488e-bdf1-fc7b85f63b4d.png', 58, 66, 2, 2),
(22, 'images/anuncios/b57f0e05-7bba-47b9-ae86-ad6539badd22.png', 59, 67, 2, 2),
(23, 'images/anuncios/b57f0e05-7bba-47b9-ae86-ad6539badd22.png', 59, 67, 2, 2),
(24, 'images/anuncios/b57f0e05-7bba-47b9-ae86-ad6539badd22.png', 60, 68, 2, 2),
(25, 'images/anuncios/b57f0e05-7bba-47b9-ae86-ad6539badd22.png', 60, 68, 2, 2),
(26, 'images/anuncios/5ddb3726-f331-4df6-9ed4-c7bb4f497324.png', 61, 69, 3, 3),
(27, 'images/anuncios/5ddb3726-f331-4df6-9ed4-c7bb4f497324.png', 61, 69, 3, 3),
(28, 'images/anuncios/79f9078e-3692-4db7-980e-1b91287e3082.png', 62, 70, 1, 1),
(29, 'images/anuncios/79f9078e-3692-4db7-980e-1b91287e3082.png', 62, 70, 1, 1),
(30, 'images/anuncios/aab6366c-532f-478c-ad78-e9acec91f07e.png', 63, 71, 2, 2),
(31, 'images/anuncios/aab6366c-532f-478c-ad78-e9acec91f07e.png', 63, 71, 2, 2),
(32, 'images/anuncios/c51220ee-4225-445d-b46c-5ec8ed117df9.png', 64, 72, 1, 1),
(33, 'images/anuncios/c51220ee-4225-445d-b46c-5ec8ed117df9.png', 64, 72, 1, 1),
(34, 'images/anuncios/7421123f-df50-4fbc-b133-709bff1486ce.png', 65, 73, 2, 2),
(35, 'images/anuncios/7421123f-df50-4fbc-b133-709bff1486ce.png', 65, 73, 2, 2),
(36, 'images/anuncios/662b1e3d-fce8-4a26-afa2-657d14ae0eaf.png', 66, 74, 1, 1),
(37, 'images/anuncios/662b1e3d-fce8-4a26-afa2-657d14ae0eaf.png', 66, 74, 1, 1),
(38, 'images/anuncios/c0be7f57-3040-4726-bdd1-27940167db58.png', 1, 1, 1, 1),
(39, 'images/anuncios/464a25f4-8ee7-45cf-a9db-13dfce3ed760.png', 1, 1, 1, 1),
(40, 'images/anuncios/2a3f38a1-408b-44a8-8a3e-ccc29384665d.png', 2, 2, 1, 1),
(41, 'images/anuncios/9e68fd08-5fe0-48d4-aa62-3cdd27a733a9.png', 3, 3, 1, 1),
(42, 'images/anuncios/1696e2ea-7ffc-452a-807c-aeb031540bc5.png', 4, 4, 1, 1),
(43, '', 5, 5, 2, 2),
(44, '', 6, 6, 2, 2),
(45, '', 7, 7, 2, 2),
(46, '', 8, 8, 2, 2),
(47, '', 9, 9, 2, 2),
(48, '', 12, 12, 2, 2),
(49, '', 13, 13, 2, 2),
(50, './images/negocio_logo/5a4b4036-a3b1-4dd3-a0f4-8a710e70d790.jpg', 14, 14, 2, 2),
(51, 'images/anuncios/224cc645-c1ad-4eb2-91d4-a8c9b4fe875c.JPG', 15, 15, 1, 1),
(52, 'images/anuncios/96399448-0332-4080-97d1-63954dcbc437.jpg', 16, 16, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotostienda`
--

CREATE TABLE IF NOT EXISTS `fotostienda` (
`fotoID` int(11) NOT NULL,
  `foto` varchar(120) NOT NULL,
  `productoID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=819;

--
-- Volcado de datos para la tabla `fotostienda`
--

INSERT INTO `fotostienda` (`fotoID`, `foto`, `productoID`) VALUES
(1, '021.png', 1),
(2, '021.png', 1),
(3, '021.png', 1),
(7, '021.png', 3),
(8, '021.png', 3),
(9, '021.png', 3),
(10, '021.png', 4),
(11, '021.png', 4),
(12, '021.png', 4),
(13, '021.png', 5),
(14, '021.png', 5),
(15, '021.png', 5),
(16, '021.png', 6),
(17, '021.png', 8),
(18, '021.png', 9),
(19, '021.png', 10),
(20, '021.png', 11),
(21, '021.png', 17),
(22, '021.png', 17),
(23, '021.png', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giro`
--

CREATE TABLE IF NOT EXISTS `giro` (
`giroID` int(11) NOT NULL COMMENT 'Se definen de acuerdo al formulario de registro para empresa en index_view',
  `nombreGiro` varchar(100) NOT NULL,
  `logo` varchar(120) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1365;

--
-- Volcado de datos para la tabla `giro`
--

INSERT INTO `giro` (`giroID`, `nombreGiro`, `logo`) VALUES
(1, 'Accesorios para mascotas', 'giros_negocio/accesorios.png'),
(2, 'Veterinaria ', 'giros_negocio/veterinaria.png'),
(3, 'Estética canina', 'giros_negocio/estetica.png'),
(4, 'Adiestramiento canino', 'giros_negocio/adistramiento_canino.png'),
(5, 'Centro de sociabilización', 'giros_negocio/sociabilizacion.png'),
(6, 'Criadero de perros ', 'giros_negocio/criadero.png'),
(7, 'Hotel y pensión canina ', 'giros_negocio/hotel_pension.png'),
(8, 'Alimento y medicamento', 'giros_negocio/comida.png'),
(9, 'Guardería de perros', 'giros_negocio/guarderia.png'),
(10, 'Tienda de mascotas ', 'giros_negocio/tienda.png'),
(11, 'Servicios funerarios ', 'giros_negocio/funeral.png'),
(12, 'Servicio de paseo', 'giros_negocio/paseo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giroempresa`
--

CREATE TABLE IF NOT EXISTS `giroempresa` (
`giroEmpresaID` int(11) NOT NULL,
  `idUsuarioDetalle` int(11) NOT NULL,
  `giroID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192;

--
-- Volcado de datos para la tabla `giroempresa`
--

INSERT INTO `giroempresa` (`giroEmpresaID`, `idUsuarioDetalle`, `giroID`) VALUES
(1, 1, 6),
(2, 1, 7),
(3, 3, 6),
(4, 3, 7),
(5, 3, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupoenvio`
--

CREATE TABLE IF NOT EXISTS `grupoenvio` (
  `grupoID` int(11) NOT NULL,
  `costo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Division de grupos para cobro de envio';

--
-- Volcado de datos para la tabla `grupoenvio`
--

INSERT INTO `grupoenvio` (`grupoID`, `costo`) VALUES
(1, 86),
(2, 90),
(3, 86),
(4, 124),
(5, 119),
(6, 119),
(7, 90),
(8, 117),
(9, 90),
(10, 100),
(11, 86),
(12, 81),
(13, 100),
(14, 117),
(15, 119),
(16, 117);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
`mensajeID` int(11) NOT NULL,
  `asunto` varchar(80) NOT NULL,
  `mensaje` varchar(300) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `tipoMensaje` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2340;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`mensajeID`, `asunto`, `mensaje`, `idUsuario`, `tipoMensaje`) VALUES
(27, 'Una Oferta', 'Una Oferta', 3, 'Oferta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajesadmin`
--

CREATE TABLE IF NOT EXISTS `mensajesadmin` (
`mensajeID` int(11) NOT NULL,
  `tipoMensaje` varchar(80) DEFAULT NULL,
  `asunto` varchar(80) DEFAULT NULL,
  `contenido` text
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096;

--
-- Volcado de datos para la tabla `mensajesadmin`
--

INSERT INTO `mensajesadmin` (`mensajeID`, `tipoMensaje`, `asunto`, `contenido`) VALUES
(8, 'Oferta', 'Una Oferta', 'Una Oferta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
`paisID` int(11) NOT NULL,
  `PAIS_ISONUM` smallint(6) DEFAULT NULL,
  `PAIS_ISO2` char(2) DEFAULT NULL,
  `PAIS_ISO3` char(3) DEFAULT NULL,
  `nombrePais` varchar(80) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=68;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`paisID`, `PAIS_ISONUM`, `PAIS_ISO2`, `PAIS_ISO3`, `nombrePais`) VALUES
(1, 4, 'AF', 'AFG', 'Afganistán'),
(2, 248, 'AX', 'ALA', 'Islas Gland'),
(3, 8, 'AL', 'ALB', 'Albania'),
(4, 276, 'DE', 'DEU', 'Alemania'),
(5, 20, 'AD', 'AND', 'Andorra'),
(6, 24, 'AO', 'AGO', 'Angola'),
(7, 660, 'AI', 'AIA', 'Anguilla'),
(8, 10, 'AQ', 'ATA', 'Antártida'),
(9, 28, 'AG', 'ATG', 'Antigua y Barbuda'),
(10, 530, 'AN', 'ANT', 'Antillas Holandesas'),
(11, 682, 'SA', 'SAU', 'Arabia Saud'),
(12, 12, 'DZ', 'DZA', 'Argelia'),
(13, 32, 'AR', 'ARG', 'Argentina'),
(14, 51, 'AM', 'ARM', 'Armenia'),
(15, 533, 'AW', 'ABW', 'Aruba'),
(16, 36, 'AU', 'AUS', 'Australia'),
(17, 40, 'AT', 'AUT', 'Austria'),
(18, 31, 'AZ', 'AZE', 'Azerbaiy'),
(19, 44, 'BS', 'BHS', 'Bahamas'),
(20, 48, 'BH', 'BHR', 'Bahráin'),
(21, 50, 'BD', 'BGD', 'Bangladesh'),
(22, 52, 'BB', 'BRB', 'Barbados'),
(23, 112, 'BY', 'BLR', 'Bielorrusia'),
(24, 56, 'BE', 'BEL', 'Bélgica'),
(25, 84, 'BZ', 'BLZ', 'Belice'),
(26, 204, 'BJ', 'BEN', 'Benin'),
(27, 60, 'BM', 'BMU', 'Bermudas'),
(28, 64, 'BT', 'BTN', 'Bhut'),
(29, 68, 'BO', 'BOL', 'Bolivia'),
(30, 70, 'BA', 'BIH', 'Bosnia y Herzegovina'),
(31, 72, 'BW', 'BWA', 'Botsuana'),
(32, 74, 'BV', 'BVT', 'Isla Bouvet'),
(33, 76, 'BR', 'BRA', 'Brasil'),
(34, 96, 'BN', 'BRN', 'Brun'),
(35, 100, 'BG', 'BGR', 'Bulgaria'),
(36, 854, 'BF', 'BFA', 'Burkina Faso'),
(37, 108, 'BI', 'BDI', 'Burundi'),
(38, 132, 'CV', 'CPV', 'Cabo Verde'),
(39, 136, 'KY', 'CYM', 'Islas Caim'),
(40, 116, 'KH', 'KHM', 'Camboya'),
(41, 120, 'CM', 'CMR', 'Camerún'),
(42, 124, 'CA', 'CAN', 'Canadá'),
(43, 140, 'CF', 'CAF', 'República Centroafricana'),
(44, 148, 'TD', 'TCD', 'Chad'),
(45, 203, 'CZ', 'CZE', 'República Checa'),
(46, 152, 'CL', 'CHL', 'Chile'),
(47, 156, 'CN', 'CHN', 'China'),
(48, 196, 'CY', 'CYP', 'Chipre'),
(49, 162, 'CX', 'CXR', 'Isla de Navidad'),
(50, 336, 'VA', 'VAT', 'Ciudad del Vaticano'),
(51, 166, 'CC', 'CCK', 'Islas Cocos'),
(52, 170, 'CO', 'COL', 'Colombia'),
(53, 174, 'KM', 'COM', 'Comoras'),
(54, 180, 'CD', 'COD', 'República Democrática del Congo'),
(55, 178, 'CG', 'COG', 'Congo'),
(56, 184, 'CK', 'COK', 'Islas Cook'),
(57, 408, 'KP', 'PRK', 'Corea del Norte'),
(58, 410, 'KR', 'KOR', 'Corea del Sur'),
(59, 384, 'CI', 'CIV', 'Costa de Marfil'),
(60, 188, 'CR', 'CRI', 'Costa Rica'),
(61, 191, 'HR', 'HRV', 'Croacia'),
(62, 192, 'CU', 'CUB', 'Cuba'),
(63, 208, 'DK', 'DNK', 'Dinamarca'),
(64, 212, 'DM', 'DMA', 'Dominica'),
(65, 214, 'DO', 'DOM', 'República Dominicana'),
(66, 218, 'EC', 'ECU', 'Ecuador'),
(67, 818, 'EG', 'EGY', 'Egipto'),
(68, 222, 'SV', 'SLV', 'El Salvador'),
(69, 784, 'AE', 'ARE', 'Emiratos Árabes Unidos'),
(70, 232, 'ER', 'ERI', 'Eritrea'),
(71, 703, 'SK', 'SVK', 'Eslovaquia'),
(72, 705, 'SI', 'SVN', 'Eslovenia'),
(73, 724, 'ES', 'ESP', 'Espa'),
(74, 581, 'UM', 'UMI', 'Islas ultramarinas de Estados Unidos'),
(75, 840, 'US', 'USA', 'Estados Unidos'),
(76, 233, 'EE', 'EST', 'Estonia'),
(77, 231, 'ET', 'ETH', 'Etiop'),
(78, 234, 'FO', 'FRO', 'Islas Feroe'),
(79, 608, 'PH', 'PHL', 'Filipinas'),
(80, 246, 'FI', 'FIN', 'Finlandia'),
(81, 242, 'FJ', 'FJI', 'Fiyi'),
(82, 250, 'FR', 'FRA', 'Francia'),
(83, 266, 'GA', 'GAB', 'Gab'),
(84, 270, 'GM', 'GMB', 'Gambia'),
(85, 268, 'GE', 'GEO', 'Georgia'),
(86, 239, 'GS', 'SGS', 'Islas Georgias del Sur y Sandwich del Sur'),
(87, 288, 'GH', 'GHA', 'Ghana'),
(88, 292, 'GI', 'GIB', 'Gibraltar'),
(89, 308, 'GD', 'GRD', 'Granada'),
(90, 300, 'GR', 'GRC', 'Grecia'),
(91, 304, 'GL', 'GRL', 'Groenlandia'),
(92, 312, 'GP', 'GLP', 'Guadalupe'),
(93, 316, 'GU', 'GUM', 'Guam'),
(94, 320, 'GT', 'GTM', 'Guatemala'),
(95, 254, 'GF', 'GUF', 'Guayana Francesa'),
(96, 324, 'GN', 'GIN', 'Guinea'),
(97, 226, 'GQ', 'GNQ', 'Guinea Ecuatorial'),
(98, 624, 'GW', 'GNB', 'Guinea-Bissau'),
(99, 328, 'GY', 'GUY', 'Guyana'),
(100, 332, 'HT', 'HTI', 'Hait'),
(101, 334, 'HM', 'HMD', 'Islas Heard y McDonald'),
(102, 340, 'HN', 'HND', 'Honduras'),
(103, 344, 'HK', 'HKG', 'Hong Kong'),
(104, 348, 'HU', 'HUN', 'Hungr'),
(105, 356, 'IN', 'IND', 'India'),
(106, 360, 'ID', 'IDN', 'Indonesia'),
(107, 364, 'IR', 'IRN', 'Irán'),
(108, 368, 'IQ', 'IRQ', 'Iraq'),
(109, 372, 'IE', 'IRL', 'Irlanda'),
(110, 352, 'IS', 'ISL', 'Islandia'),
(111, 376, 'IL', 'ISR', 'Israel'),
(112, 380, 'IT', 'ITA', 'Italia'),
(113, 388, 'JM', 'JAM', 'Jamaica'),
(114, 392, 'JP', 'JPN', 'Jap'),
(115, 400, 'JO', 'JOR', 'Jordania'),
(116, 398, 'KZ', 'KAZ', 'Kazajst'),
(117, 404, 'KE', 'KEN', 'Kenia'),
(118, 417, 'KG', 'KGZ', 'Kirguist'),
(119, 296, 'KI', 'KIR', 'Kiribati'),
(120, 414, 'KW', 'KWT', 'Kuwait'),
(121, 418, 'LA', 'LAO', 'Laos'),
(122, 426, 'LS', 'LSO', 'Lesotho'),
(123, 428, 'LV', 'LVA', 'Letonia'),
(124, 422, 'LB', 'LBN', 'Líbano'),
(125, 430, 'LR', 'LBR', 'Liberia'),
(126, 434, 'LY', 'LBY', 'Libia'),
(127, 438, 'LI', 'LIE', 'Liechtenstein'),
(128, 440, 'LT', 'LTU', 'Lituania'),
(129, 442, 'LU', 'LUX', 'Luxemburgo'),
(130, 446, 'MO', 'MAC', 'Macao'),
(131, 807, 'MK', 'MKD', 'ARY Macedonia'),
(132, 450, 'MG', 'MDG', 'Madagascar'),
(133, 458, 'MY', 'MYS', 'Malasia'),
(134, 454, 'MW', 'MWI', 'Malawi'),
(135, 462, 'MV', 'MDV', 'Maldivas'),
(136, 466, 'ML', 'MLI', 'Mal'),
(137, 470, 'MT', 'MLT', 'Malta'),
(138, 238, 'FK', 'FLK', 'Islas Malvinas'),
(139, 580, 'MP', 'MNP', 'Islas Marianas del Norte'),
(140, 504, 'MA', 'MAR', 'Marruecos'),
(141, 584, 'MH', 'MHL', 'Islas Marshall'),
(142, 474, 'MQ', 'MTQ', 'Martinica'),
(143, 480, 'MU', 'MUS', 'Mauricio'),
(144, 478, 'MR', 'MRT', 'Mauritania'),
(145, 175, 'YT', 'MYT', 'Mayotte'),
(146, 484, 'MX', 'MEX', 'México'),
(147, 583, 'FM', 'FSM', 'Micronesia'),
(148, 498, 'MD', 'MDA', 'Moldavia'),
(149, 492, 'MC', 'MCO', 'Mónaco'),
(150, 496, 'MN', 'MNG', 'Mongolia'),
(151, 500, 'MS', 'MSR', 'Montserrat'),
(152, 508, 'MZ', 'MOZ', 'Mozambique'),
(153, 104, 'MM', 'MMR', 'Myanmar'),
(154, 516, 'NA', 'NAM', 'Namibia'),
(155, 520, 'NR', 'NRU', 'Nauru'),
(156, 524, 'NP', 'NPL', 'Nepal'),
(157, 558, 'NI', 'NIC', 'Nicaragua'),
(158, 562, 'NE', 'NER', 'Níger'),
(159, 566, 'NG', 'NGA', 'Nigeria'),
(160, 570, 'NU', 'NIU', 'Niue'),
(161, 574, 'NF', 'NFK', 'Isla Norfolk'),
(162, 578, 'NO', 'NOR', 'Noruega'),
(163, 540, 'NC', 'NCL', 'Nueva Caledonia'),
(164, 554, 'NZ', 'NZL', 'Nueva Zelanda'),
(165, 512, 'OM', 'OMN', 'Om'),
(166, 528, 'NL', 'NLD', 'Países Bajos'),
(167, 586, 'PK', 'PAK', 'Pakist'),
(168, 585, 'PW', 'PLW', 'Palau'),
(169, 275, 'PS', 'PSE', 'Palestina'),
(170, 591, 'PA', 'PAN', 'Panam'),
(171, 598, 'PG', 'PNG', 'Papáa Nueva Guinea'),
(172, 600, 'PY', 'PRY', 'Paraguay'),
(173, 604, 'PE', 'PER', 'Perú'),
(174, 612, 'PN', 'PCN', 'Islas Pitcairn'),
(175, 258, 'PF', 'PYF', 'Polinesia Francesa'),
(176, 616, 'PL', 'POL', 'Polonia'),
(177, 620, 'PT', 'PRT', 'Portugal'),
(178, 630, 'PR', 'PRI', 'Puerto Rico'),
(179, 634, 'QA', 'QAT', 'Qatar'),
(180, 826, 'GB', 'GBR', 'Reino Unido'),
(181, 638, 'RE', 'REU', 'Reuni'),
(182, 646, 'RW', 'RWA', 'Ruanda'),
(183, 642, 'RO', 'ROU', 'Rumania'),
(184, 643, 'RU', 'RUS', 'Rusia'),
(185, 732, 'EH', 'ESH', 'Sahara Occidental'),
(186, 90, 'SB', 'SLB', 'Islas Salom'),
(187, 882, 'WS', 'WSM', 'Samoa'),
(188, 16, 'AS', 'ASM', 'Samoa Americana'),
(189, 659, 'KN', 'KNA', 'San Crist?bal y Nevis'),
(190, 674, 'SM', 'SMR', 'San Marino'),
(191, 666, 'PM', 'SPM', 'San Pedro y Miquel'),
(192, 670, 'VC', 'VCT', 'San Vicente y las Granadinas'),
(193, 654, 'SH', 'SHN', 'Santa Helena'),
(194, 662, 'LC', 'LCA', 'Santa Luc'),
(195, 678, 'ST', 'STP', 'Santo Tomás y Príncipe'),
(196, 686, 'SN', 'SEN', 'Senegal'),
(197, 891, 'CS', 'SCG', 'Serbia y Montenegro'),
(198, 690, 'SC', 'SYC', 'Seychelles'),
(199, 694, 'SL', 'SLE', 'Sierra Leona'),
(200, 702, 'SG', 'SGP', 'Singapur'),
(201, 760, 'SY', 'SYR', 'Siria'),
(202, 706, 'SO', 'SOM', 'Somalia'),
(203, 144, 'LK', 'LKA', 'Sri Lanka'),
(204, 748, 'SZ', 'SWZ', 'Suazilandia'),
(205, 710, 'ZA', 'ZAF', 'Sudáfrica'),
(206, 736, 'SD', 'SDN', 'Sud'),
(207, 752, 'SE', 'SWE', 'Suecia'),
(208, 756, 'CH', 'CHE', 'Suiza'),
(209, 740, 'SR', 'SUR', 'Surinam'),
(210, 744, 'SJ', 'SJM', 'Svalbard y Jan Mayen'),
(211, 764, 'TH', 'THA', 'Tailandia'),
(212, 158, 'TW', 'TWN', 'Taiw'),
(213, 834, 'TZ', 'TZA', 'Tanzania'),
(214, 762, 'TJ', 'TJK', 'Tayikist'),
(215, 86, 'IO', 'IOT', 'Territorio Británico del Ocáano Índico'),
(216, 260, 'TF', 'ATF', 'Territorios Australes Franceses'),
(217, 626, 'TL', 'TLS', 'Timor Oriental'),
(218, 768, 'TG', 'TGO', 'Togo'),
(219, 772, 'TK', 'TKL', 'Tokelau'),
(220, 776, 'TO', 'TON', 'Tonga'),
(221, 780, 'TT', 'TTO', 'Trinidad y Tobago'),
(222, 788, 'TN', 'TUN', 'Túnez'),
(223, 796, 'TC', 'TCA', 'Islas Turcas y Caicos'),
(224, 795, 'TM', 'TKM', 'Turkmenist'),
(225, 792, 'TR', 'TUR', 'Turquía'),
(226, 798, 'TV', 'TUV', 'Tuvalu'),
(227, 804, 'UA', 'UKR', 'Ucrania'),
(228, 800, 'UG', 'UGA', 'Uganda'),
(229, 858, 'UY', 'URY', 'Uruguay'),
(230, 860, 'UZ', 'UZB', 'Uzbekist'),
(231, 548, 'VU', 'VUT', 'Vanuatu'),
(232, 862, 'VE', 'VEN', 'Venezuela'),
(233, 704, 'VN', 'VNM', 'Vietnam'),
(234, 92, 'VG', 'VGB', 'Islas Vírgenes Británicas'),
(235, 850, 'VI', 'VIR', 'Islas Vírgenes de los Estados Unidos'),
(236, 876, 'WF', 'WLF', 'Wallis y Futuna'),
(237, 887, 'YE', 'YEM', 'Yemen'),
(238, 262, 'DJ', 'DJI', 'Yibuti'),
(239, 894, 'ZM', 'ZMB', 'Zambia'),
(240, 716, 'ZW', 'ZWE', 'Zimbabue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE IF NOT EXISTS `paquete` (
`paqueteID` int(3) NOT NULL,
  `nombrePaquete` varchar(20) NOT NULL,
  `tipoPublicacion` int(11) DEFAULT NULL COMMENT '1 si es una publicacion en alguna seccion diferente al directorio\r\n2 si es una publicacion en el directorio'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461;

--
-- Volcado de datos para la tabla `paquete`
--

INSERT INTO `paquete` (`paqueteID`, `nombrePaquete`, `tipoPublicacion`) VALUES
(1, 'Lite', 1),
(2, 'Regular', 1),
(3, 'Premium', 1),
(4, 'Asociacion', 3),
(5, 'Directorio 1', 4),
(6, 'Directorio 2', 4),
(7, 'Directorio 3', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
`idPermiso` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `nombrePermiso` varchar(70) NOT NULL,
  `borrado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2340;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idPermiso`, `nivel`, `nombrePermiso`, `borrado`) VALUES
(1, 1, 'Usuario Normal : Cuenta', 0),
(2, 2, 'Usuario Negocio: Cuenta Negocio', 0),
(3, 3, 'Usuario AC: Cuenta AC', 0),
(4, 0, 'Admin', 0),
(5, 1, 'Carrito: Usuario', 0),
(6, 2, 'Carrito: Negocio', 0),
(7, 3, 'Carrito: AC', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productodetalle`
--

CREATE TABLE IF NOT EXISTS `productodetalle` (
`detalleProductoID` int(11) NOT NULL,
  `productoID` int(11) DEFAULT NULL,
  `detalle` varchar(70) DEFAULT NULL,
  `valor` varchar(70) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1260;

--
-- Volcado de datos para la tabla `productodetalle`
--

INSERT INTO `productodetalle` (`detalleProductoID`, `productoID`, `detalle`, `valor`) VALUES
(12, 15, 'talla', '4'),
(19, 17, 'talla', '1'),
(20, 17, 'talla', '2'),
(21, 17, 'talla', '3'),
(22, 17, 'color', 'ROSA'),
(23, 17, 'color', 'AZUL'),
(24, 17, 'color', 'AMARILLO'),
(25, 16, 'talla', 'Unitalla'),
(26, 16, 'color', 'Rojo'),
(27, 16, 'color', 'Morado'),
(28, 16, 'color', 'Amarillo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
`publicacionID` int(11) NOT NULL,
  `seccion` int(1) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `numeroVisitas` int(11) NOT NULL,
  `estadoID` int(11) NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `razaID` char(20) NOT NULL,
  `precio` float(5,2) NOT NULL,
  `descripcion` text NOT NULL,
  `muestraTelefono` tinyint(1) NOT NULL,
  `aprobada` tinyint(1) NOT NULL,
  `servicioID` int(11) NOT NULL,
  `detalleID` int(11) NOT NULL,
  `paqueteID` int(3) NOT NULL,
  `ciudad` varchar(80) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1820;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`publicacionID`, `seccion`, `titulo`, `vigente`, `fechaCreacion`, `fechaVencimiento`, `numeroVisitas`, `estadoID`, `genero`, `razaID`, `precio`, `descripcion`, `muestraTelefono`, `aprobada`, `servicioID`, `detalleID`, `paqueteID`, `ciudad`) VALUES
(1, 3, 'sssssssss', 1, '2014-08-25', '2014-09-24', 0, 1, 0, '19', 999.99, 'ddddddddddddcsddd', 1, 1, 1, 1, 1, 'sssssss'),
(2, 7, 'yyy', 1, '2014-08-25', '2014-09-24', 2, 2, 1, '17', 999.99, 'uuuuuuu', 1, 1, 2, 1, 1, 'yy'),
(3, 2, 'qwerty', 1, '2014-10-15', '2014-11-14', 1, 22, 0, '11', 999.99, 'eeeeeeeeeeeeee', 1, 1, 3, 1, 1, 'qwertyu'),
(4, 6, 'qwertyui', 1, '2014-10-15', '2014-11-14', 0, 22, 0, '8', 0.00, 'qwwwwwww', 1, 1, 4, 1, 1, 'qwwqw'),
(5, 4, 'publicacion de directorio', 1, '2014-10-15', '2014-10-30', 0, 0, 0, '1', 100.00, '', 0, 1, 5, 2, 2, NULL),
(6, 4, 'publicacion de directorio', 1, '2014-10-16', '2014-10-31', 0, 22, 0, '1', 100.00, 'QUERETARO QUERETARO QUERETARO QUERETARO', 1, 1, 6, 2, 2, NULL),
(7, 4, 'publicacion de directorio', 1, '2014-10-17', '2014-11-01', 0, 22, 0, '1', 100.00, 'QUERETARO QUERETARO QUERETARO QUERETARO QUERETARO', 1, 0, 7, 2, 2, NULL),
(8, 4, 'publicacion de directorio', 1, '2014-11-02', '2014-11-17', 0, 22, 0, '1', 100.00, '', 0, 0, 8, 2, 2, NULL),
(9, 4, 'publicacion de directorio', 1, '2014-11-02', '2014-11-17', 0, 22, 0, '1', 100.00, 'aaaaaaaaaaaaaaaaaa', 1, 0, 9, 2, 2, NULL),
(12, 4, 'publicacion de directorio', 1, '2014-11-04', '2014-11-19', 0, 22, 0, '1', 100.00, '', 0, 0, 12, 2, 2, NULL),
(13, 4, 'publicacion de directorio', 1, '2014-11-04', '2014-11-19', 0, 22, 0, '1', 100.00, '', 0, 0, 13, 2, 2, NULL),
(14, 4, 'publicacion de directorio', 1, '2014-11-04', '2014-11-19', 0, 22, 0, '1', 100.00, 'https://www.facebook.com/', 1, 0, 14, 2, 2, NULL),
(15, 6, 'qwertyuiop', 1, '2014-11-11', '2014-12-11', 0, 22, 1, '15', 0.00, 'wertyuio', 1, 1, 15, 1, 1, 'qwertyuio'),
(16, 2, 'premium', 1, '2014-11-23', '2015-01-22', 0, 22, 0, '77', 999.99, 'Perro en venta premiun', 1, 0, 16, 3, 3, 'QRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE IF NOT EXISTS `raza` (
`razaID` int(11) NOT NULL,
  `raza` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=197;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`razaID`, `raza`) VALUES
(1, 'Akita Inu'),
(2, 'Alaskan Malamute'),
(3, 'Barzoi'),
(4, 'Basset Azul de Gascu?'),
(5, 'Basset Hound'),
(6, 'Beagle'),
(7, 'Beauceron'),
(8, 'Bich? Malt?'),
(9, 'Bobtail'),
(10, 'Border Collie'),
(11, 'Boxer'),
(12, 'Boyero de Berna'),
(13, 'Braco'),
(14, 'Briard'),
(15, 'Bull Terrier Ingl?'),
(16, 'Bulldog'),
(17, 'Bullmastiff'),
(18, 'Cairn Terrier'),
(19, 'Cane Corso'),
(20, 'Caniche'),
(21, 'Cavalier King Charles'),
(22, 'Chihuahua'),
(23, 'Chow Chow'),
(24, 'Cocker Spaniel'),
(25, 'Collie'),
(26, 'D?mata'),
(27, 'Doberman'),
(28, 'Dogo'),
(29, 'Epagneul'),
(30, 'Fox Terrier'),
(31, 'Galgo'),
(32, 'Golden Retriever'),
(33, 'Gordon Setter'),
(34, 'Gos d''Atura'),
(35, 'Gran Dan?'),
(36, 'Husky Siberiano'),
(37, 'Komondor'),
(38, 'Labrador Retriever'),
(39, 'Lebrel'),
(40, 'Mastiff'),
(41, 'Mast?'),
(42, 'Monta? de los Pirineos'),
(43, 'Norfolk Terrier'),
(44, 'Norwich Terrier'),
(45, 'Papillon'),
(46, 'Pastor Alem?'),
(47, 'Pastor Australiano'),
(48, 'Pastor Belga'),
(49, 'Pastor Blanco Suizo'),
(50, 'Pastor de los Pirineos'),
(51, 'Pekin?'),
(52, 'Peque? Azul de Gascu?'),
(53, 'Peque? Basset Griffon'),
(54, 'Peque? Brabantino'),
(55, 'Peque? Perro Le?'),
(56, 'Peque? Perro Ruso'),
(57, 'Peque? Sabueso Suizo'),
(58, 'Perdiguero'),
(59, 'Perro de Agua Espa?l'),
(60, 'Perro Lobo de Checoslovaquia'),
(61, 'Pinscher miniatura'),
(62, 'Pit Bull'),
(63, 'Podenco'),
(64, 'Pointer Ingl?'),
(65, 'Presa Canario'),
(66, 'Pug'),
(67, 'Rafeiro do Alentejo'),
(68, 'Rottweiler'),
(69, 'Samoyedo'),
(70, 'San Bernardo'),
(71, 'Schnauzer'),
(72, 'Scottish Terrier'),
(73, 'Setter'),
(74, 'Shar Pei'),
(75, 'Shih Tzu'),
(76, 'Spitz'),
(77, 'Springer Spaniel'),
(78, 'Teckel'),
(79, 'Terranova'),
(80, 'Weimaraner'),
(81, 'Westies'),
(82, 'Whippet'),
(83, 'Yorkshire Terrier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
`idRol` int(11) NOT NULL,
  `nombreRol` varchar(45) NOT NULL,
  `borrado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`, `borrado`) VALUES
(1, 'Usuario Normal', 0),
(2, 'Usuario Negocio', 0),
(3, 'Usuario AC', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roltienepermiso`
--

CREATE TABLE IF NOT EXISTS `roltienepermiso` (
  `idRol` int(11) NOT NULL,
  `idPermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2730;

--
-- Volcado de datos para la tabla `roltienepermiso`
--

INSERT INTO `roltienepermiso` (`idRol`, `idPermiso`) VALUES
(1, 1),
(2, 2),
(3, 3),
(1, 5),
(2, 5),
(3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE IF NOT EXISTS `seccion` (
`seccionID` int(10) NOT NULL,
  `seccionNombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1092;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`seccionID`, `seccionNombre`) VALUES
(1, 'Inicio'),
(2, 'Venta'),
(3, 'Cruza'),
(4, 'Directorio'),
(5, 'Perfil de usuario'),
(6, 'Adopción'),
(7, 'Perros Perdidos'),
(8, 'La raza del mes'),
(9, 'Evento del mes'),
(10, 'Datos Curiosos'),
(11, 'Asoc. Protectoras'),
(12, '¿Quiénes somos?'),
(13, 'Tutorial'),
(14, 'Publicidad'),
(15, 'F.A.Q.'),
(16, 'Tienda'),
(17, 'Publicidad Lateral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serviciocontratado`
--

CREATE TABLE IF NOT EXISTS `serviciocontratado` (
`servicioID` int(11) NOT NULL,
  `cantFotos` int(11) NOT NULL,
  `caracteres` int(11) NOT NULL,
  `vigencia` int(2) NOT NULL,
  `cupones` int(2) NOT NULL,
  `videos` int(2) NOT NULL,
  `precio` float(5,2) NOT NULL,
  `detalleID` int(11) NOT NULL,
  `paqueteID` int(3) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `pagado` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=606;

--
-- Volcado de datos para la tabla `serviciocontratado`
--

INSERT INTO `serviciocontratado` (`servicioID`, `cantFotos`, `caracteres`, `vigencia`, `cupones`, `videos`, `precio`, `detalleID`, `paqueteID`, `idUsuario`, `pagado`) VALUES
(1, 1, 30, 30, 0, 0, 0.00, 1, 1, 3, 1),
(2, 1, 30, 30, 0, 0, 0.00, 1, 1, 3, 1),
(3, 1, 30, 30, 0, 0, 0.00, 1, 1, 2, 1),
(4, 1, 30, 30, 0, 0, 0.00, 1, 1, 3, 1),
(5, 2, 300, 15, 2, 1, 100.00, 2, 2, 3, 0),
(6, 2, 300, 15, 2, 1, 100.00, 2, 2, 3, 0),
(7, 2, 300, 15, 2, 1, 100.00, 2, 2, 3, 0),
(8, 2, 300, 15, 2, 1, 100.00, 2, 2, 3, 0),
(9, 2, 300, 15, 2, 1, 100.00, 2, 2, 3, 0),
(12, 2, 300, 15, 2, 1, 100.00, 2, 2, 3, 0),
(13, 2, 300, 15, 2, 1, 100.00, 2, 2, 3, 0),
(14, 2, 300, 15, 2, 1, 100.00, 2, 2, 3, 0),
(15, 1, 30, 30, 0, 0, 0.00, 1, 1, 3, 1),
(16, 3, 1000, 60, 3, 2, 166.00, 3, 3, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopaquete`
--

CREATE TABLE IF NOT EXISTS `tipopaquete` (
`idtipopaquete` int(11) NOT NULL,
  `nombreTipoPaquete` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461;

--
-- Volcado de datos para la tabla `tipopaquete`
--

INSERT INTO `tipopaquete` (`idtipopaquete`, `nombreTipoPaquete`) VALUES
(1, 'Lite'),
(2, 'Regular'),
(3, 'Premium'),
(4, 'Asociacion'),
(5, 'Directorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacionusuario`
--

CREATE TABLE IF NOT EXISTS `ubicacionusuario` (
`ubicacionUsuarioID` int(11) NOT NULL,
  `tipoUsuario` int(1) NOT NULL,
  `latitud` varchar(40) NOT NULL,
  `longitud` varchar(20) NOT NULL,
  `idUsuarioDato` int(11) NOT NULL,
  `estadoID` int(11) DEFAULT NULL,
  `zonageograficaID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192;

--
-- Volcado de datos para la tabla `ubicacionusuario`
--

INSERT INTO `ubicacionusuario` (`ubicacionUsuarioID`, `tipoUsuario`, `latitud`, `longitud`, `idUsuarioDato`, `estadoID`, `zonageograficaID`) VALUES
(1, 2, '20.571765230363617', '-100.3824978359375', 6, 22, 4),
(2, 3, '', '', 7, 0, NULL),
(3, 2, '20.557501222898853', '-100.41725280898436', 8, 22, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idUsuario` int(11) NOT NULL,
  `nombre` varchar(39) NOT NULL,
  `apellido` varchar(65) NOT NULL,
  `telefono` int(10) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `recepcionCorreo` int(1) NOT NULL DEFAULT '1' COMMENT '1 - recepci?n de correo activa\n 0 - recepci?n de correo inactiva',
  `tipoUsuario` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Administrador\n1 - usuario normal\n2 - negocio\n3 - AC',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0 - no activado\n1 - activo',
  `nivel` int(11) DEFAULT NULL COMMENT 'establecimiento de jerarqu?a en usuarios',
  `codigoConfirmacion` varchar(100) NOT NULL COMMENT 'c?digo necesario para confirmar cuenta.',
  `fechaRegistro` datetime NOT NULL,
  `useragent` varchar(255) DEFAULT NULL,
  `last_ip_access` varchar(16) DEFAULT NULL,
  `authKey` varchar(100) DEFAULT NULL,
  `paqueteGratis` int(11) DEFAULT '1' COMMENT 'si paquete gratis = 1 no lo ha usado, si = 0 entonces ya tiene costo'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=3276;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `telefono`, `correo`, `contrasena`, `recepcionCorreo`, `tipoUsuario`, `status`, `nivel`, `codigoConfirmacion`, `fechaRegistro`, `useragent`, `last_ip_access`, `authKey`, `paqueteGratis`) VALUES
(2, 'admin', 'admin', 1111, 'admin@gmail.com', '2e0e4da5c11c0f8a73a01a5ddd672211af58c5b1e5179d7412', 0, 0, 1, 0, 'A7995E2C507D113EF045E8BE6', '2014-07-14 21:23:15', NULL, NULL, '9831A0FC5D8377D2B965', 1),
(3, 'martha', 'hdez', 1234567890, 'marthahdez2@gmail.com', '5287afd7bed68e3269996f00f446240dcaca0224a6405f1d56', 1, 1, 1, 1, 'EA5A0F1E6DD8358A5ECDC3C6C', '2014-07-17 17:24:18', NULL, NULL, 'AD401AAD1012E0AED657', 1),
(4, 'dddd', 'dddd', 0, 'dddd@ssss.com', '2e0e4da5c11c0f8a73a01a5ddd672211af58c5b1e5179d7412', 0, 1, 1, 1, 'A7995E2C507D113EF045E8BE6', '2014-08-03 18:24:47', NULL, NULL, 'DAE20D308B05D531E511', 1),
(6, 'Martha', 'hh', 2147483647, 'martha.tain@gmail.com', '2e0e4da5c11c0f8a73a01a5ddd672211af58c5b1e5179d7412', 0, 2, 1, 2, 'A7995E2C507D113EF045E8BE6', '2014-08-06 21:23:18', NULL, NULL, '5290D994FE0F37B5BBCF', 1),
(7, 'AAA', 'AAAAAAA', 0, 'AAAA@AAA.COM', '2e0e4da5c11c0f8a73a01a5ddd672211af58c5b1e5179d7412', 0, 3, 1, 3, 'FA5760A00DBFD87A83B1444D1', '2014-08-06 21:27:41', NULL, NULL, '8C57194032ECDF532210', 1),
(8, 'qwerty', 'qwerty', 0, 'marthahdez1@gmail.com', '09e9594c4e08da50121b6d96709f0cb82883ed0a589d568e22', 1, 2, 1, 2, 'A7CB99ED6727A5DC281AECB4D', '2014-08-15 18:54:48', NULL, NULL, 'BABB34C62A44A2772CC8', 1),
(9, 'ADMIN', 'ADMIN', 1234567890, 'marthahdez22@gmail.com', 'ce837a193dcf8a0928f833783098d1618022daa182d8b46285', 1, 0, 2, 0, '257F06E49C44489737D3BBD31', '2014-08-24 03:08:24', NULL, NULL, '727E36D81670749F9ADC', 1),
(10, 'ADMIN', 'ADMIN', 1234567890, 'marthahdez3@gmail.com', 'dbc69d29174adbf8ce36f3dcfc0f59e71ba84994beeda33375', 1, 0, 2, 0, 'B26B7969336756D19A6AEA3B3', '2014-08-24 03:13:22', NULL, NULL, 'F5D6087BCAFD0F5DA5CB', 1),
(11, 'adminadmin', 'adminadmin', 0, 'marthahdez4@gmail.com', '24da39cb7e92b5194a1139a352eff6414cf1a844b3fb968d33', 1, 0, 2, 0, 'E17BCBA6035A2D74A239BEF0F', '2014-08-24 03:15:23', NULL, NULL, '8E90D61BADDC5BE38ACB', 1),
(12, 'martha', 'hdez', 0, 'cosa83@hotmail.com', 'b183d14427376863e2c042ddfa2d7e306dc3772b69f7d141c6', 1, 1, 1, 1, '341AFB0F050E31E75BB0D79B7', '2014-08-28 10:55:37', NULL, NULL, 'EEBFE31A1948BA164A2C', 1),
(13, 'Marina', 'Baez', 2147483647, 'marina.baezb@gmail.com', '327cd28dccfcbf1d2d979818a6127b28dc2194d8b2b916b456', 0, 1, 0, 1, '0C6D34EF617BE631BAFE31297', '2014-11-07 10:19:45', NULL, NULL, '375AD57052B7F03A00A3', 1),
(14, 'Juan', 'Perez', 2147483647, 'joanitom@hotmail.com', '48eccaf71f31964898232300a4a1258871de71a7c393fa1b63', 1, 1, 1, 1, '91C1CA0D827694473AEA68FB4', '2014-11-08 17:22:08', NULL, NULL, '1F8F7CBBB0A1DAAD7855', 1),
(15, 'remigio', 'amieva', 2147483647, 'ramieva@calclosets.com', '3af84f67d602d63002d7b59e4d2b08a00df4c634dec6f69f96', 0, 1, 1, 1, '23C31187A9822083B3A71B82C', '2014-11-11 23:02:58', NULL, NULL, '160B17850C875B81D822', 1),
(16, 'martha', 'hdez', 2147483647, 'marthahdez2@gmail.com', '0aa3e34df42b3c84ca3eb4a841b2013760922a750d18f2de69', 1, 1, 0, 1, '70541ECD943D46F1CE3A10B0C', '2014-11-22 22:38:05', NULL, NULL, 'AD401AAD1012E0AED657', 1),
(17, 'martha', 'hdez', 2147483647, 'marthahdezAA2@gmail.com', '2e0e4da5c11c0f8a73a01a5ddd672211af58c5b1e5179d7412', 1, 1, 1, 1, '0B8055FB0AE407915981879B7', '2014-11-22 22:38:06', NULL, NULL, 'D524CDEFE40419644CAD', 1),
(18, 'martha', 'hdez', 0, 'marthahdez222@gmail.com', 'e7c234e7f056cc24aa3c1cfb1c9e6c493f6b1b3fdcb32e7de9', 1, 1, 1, 1, 'D060F77E3886B9628F90D603E', '2014-11-23 22:33:44', NULL, NULL, '7A2E7590F5B3BE00B1CA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariodato`
--

CREATE TABLE IF NOT EXISTS `usuariodato` (
`idUsuarioDato` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `razonSocial` varchar(45) NOT NULL,
  `rfc` varchar(20) DEFAULT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `noInterior` varchar(11) DEFAULT NULL,
  `noExterior` varchar(11) DEFAULT NULL,
  `cp` int(7) DEFAULT NULL,
  `municipio` varchar(45) DEFAULT NULL,
  `estadoID` int(11) NOT NULL,
  `idPais` int(11) DEFAULT '147' COMMENT '147 = M?xico'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2730;

--
-- Volcado de datos para la tabla `usuariodato`
--

INSERT INTO `usuariodato` (`idUsuarioDato`, `idUsuario`, `razonSocial`, `rfc`, `calle`, `noInterior`, `noExterior`, `cp`, `municipio`, `estadoID`, `idPais`) VALUES
(2, 2, '', '', '', '0', '', 0, '', 0, 147),
(3, 3, 'aaaaaaaa', 'aaaaaaaaaaaaaaaaaaaa', '2345', '0', '3456', 23456, 'QUERETARO', 22, 146),
(4, 4, '', '', '', '0', '', 0, '', 0, 147),
(6, 6, 'AAAA', 'AAAAA', 'AAA', '0', '222', 2222, 'QRO', 22, 147),
(7, 7, '', '', '', '0', '0', 0, '', 0, 147),
(8, 3, 'rrfc', 'rfc', '33', '0', '45', 45678, 'QRO', 22, 147),
(9, 12, '', '', '', '0', '', 0, '', 0, 147),
(10, 13, '', '', '', '0', '', 0, '', 0, 147),
(11, 14, 'XXXAAADD', 'XXXAAADD', '34', '0', '343', 23456, 'QUERETARO', 22, 147),
(12, 15, '', '', '', '0', '', 0, '', 0, 147),
(13, 17, '', '', '', '0', '', 0, '', 0, 147),
(14, 16, '', '', '', '0', '', 0, '', 0, 147),
(15, 18, 'MARTHA', 'MARTHA', '111', '0', '222', 76000, 'QUERETARO', 22, 147);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariodetalle`
--

CREATE TABLE IF NOT EXISTS `usuariodetalle` (
`idusuarioDetalle` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `tipoUsuario` int(1) NOT NULL,
  `nombreNegocio` varchar(80) NOT NULL,
  `giro` varchar(45) DEFAULT NULL,
  `nombreContacto` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `correo` varchar(45) NOT NULL,
  `paginaWeb` varchar(45) DEFAULT NULL,
  `logo` varchar(45) DEFAULT NULL,
  `descripcion` tinytext,
  `municipioC` varchar(80) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192 COMMENT='Ambos usuarios, Negocio y AC comparten estos datos, por lo cual ambos se almacenan en esta tabla';

--
-- Volcado de datos para la tabla `usuariodetalle`
--

INSERT INTO `usuariodetalle` (`idusuarioDetalle`, `idUsuario`, `tipoUsuario`, `nombreNegocio`, `giro`, `nombreContacto`, `telefono`, `calle`, `numero`, `idEstado`, `colonia`, `cp`, `correo`, `paginaWeb`, `logo`, `descripcion`, `municipioC`) VALUES
(1, 6, 2, 'AAAAA', NULL, '', '', '1111', '222', 22, 'WWWW', 0, 'DDDD@DDD.COM', '', '', ' AAAAAA', NULL),
(2, 7, 3, '', '0', '', '', '', '', 0, '', 0, '0', '', '', ' ', NULL),
(3, 8, 2, 'NEGOCIO', NULL, 'CONTACTO', '23333', '45', '34', 22, 'LLLL', 222222, 'CORREO@SSSS.COM', 'WWW.PAGINA.COM', '', 'DATOS DEL NEGOCIO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
`videoID` int(11) NOT NULL,
  `link` text NOT NULL,
  `publicacionID` int(11) NOT NULL,
  `servicioID` int(11) NOT NULL,
  `detalleID` int(11) NOT NULL,
  `paqueteID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`videoID`, `link`, `publicacionID`, `servicioID`, `detalleID`, `paqueteID`) VALUES
(1, '4444 4444 4444 0008', 20, 28, 3, 3),
(2, 'fotospublicacion', 21, 29, 2, 2),
(3, '<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/reset.css" media="screen"></link>', 22, 30, 1, 1),
(4, 'hhhh', 23, 31, 1, 1),
(5, 'tttttttttttttttttt', 24, 32, 2, 2),
(6, '', 25, 33, 2, 2),
(7, 'sssssssssssssssss', 26, 34, 1, 1),
(8, 'aaaaaaaaaaaaaaaaaaaa', 27, 35, 1, 1),
(9, 'aaaaaaaaaaaaaaaaaaaa', 28, 36, 1, 1),
(10, 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 47, 55, 1, 1),
(11, 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 48, 56, 2, 2),
(12, 'QWERTY', 49, 57, 2, 2),
(13, 'DDDDDDDD', 50, 58, 2, 2),
(14, 'ffffffffffffffffffffff', 51, 59, 2, 2),
(15, 'aaaaaaaaaa', 52, 60, 1, 1),
(16, 'rrrrrrrrrrr', 53, 61, 1, 1),
(17, 'sssssssssssssssss', 54, 62, 2, 2),
(18, '33333', 55, 63, 2, 2),
(19, '44444', 56, 64, 2, 2),
(20, 'EEEEEEEEEEEEE', 57, 65, 1, 1),
(21, 'sssssssssssssssss', 58, 66, 2, 2),
(22, 'ggggggg', 59, 67, 2, 2),
(23, 'ggggggg', 60, 68, 2, 2),
(24, '33333', 61, 69, 3, 3),
(25, 'RRRRRRR', 62, 70, 1, 1),
(26, 'DDDDD', 63, 71, 2, 2),
(27, 'http://localhost:82/qup/asociacion/principal/favoritos/', 64, 72, 1, 1),
(28, 'https://www.youtube.com/watch?v=-aNxhQKAXxE', 65, 73, 2, 2),
(29, 'sssssssssssssssss', 66, 74, 1, 1),
(32, '', 1, 1, 1, 1),
(33, '', 2, 2, 1, 1),
(34, '', 3, 3, 1, 1),
(35, '', 4, 4, 1, 1),
(36, '', 15, 15, 1, 1),
(37, '', 16, 16, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE IF NOT EXISTS `visita` (
  `idVisita` int(11) NOT NULL,
  `numeroVisitas` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`idVisita`, `numeroVisitas`) VALUES
(1, 2821);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vs_database_diagrams`
--

CREATE TABLE IF NOT EXISTS `vs_database_diagrams` (
  `name` char(80) DEFAULT NULL,
  `diadata` text,
  `comment` varchar(1022) DEFAULT NULL,
  `preview` text,
  `lockinfo` char(80) DEFAULT NULL,
  `locktime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `version` char(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vs_database_diagrams`
--

INSERT INTO `vs_database_diagrams` (`name`, `diadata`, `comment`, `preview`, `lockinfo`, `locktime`, `version`) VALUES
('productos', NULL, NULL, NULL, 'quieroun_perro*3989957', '2014-07-25 23:46:09', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonageografica`
--

CREATE TABLE IF NOT EXISTS `zonageografica` (
`zonaID` int(11) NOT NULL,
  `zona` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1820;

--
-- Volcado de datos para la tabla `zonageografica`
--

INSERT INTO `zonageografica` (`zonaID`, `zona`) VALUES
(1, 'Noroeste'),
(2, 'Noreste'),
(3, 'Occidente'),
(4, 'Centronorte'),
(5, 'Metropolitana'),
(6, 'Oriente'),
(7, 'Suroeste'),
(8, 'Sureste'),
(9, 'Todas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonageograficaestado`
--

CREATE TABLE IF NOT EXISTS `zonageograficaestado` (
`zonaID` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `estadoID` int(11) NOT NULL,
  `zonageograficaID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=496;

--
-- Volcado de datos para la tabla `zonageograficaestado`
--

INSERT INTO `zonageograficaestado` (`zonaID`, `nombre`, `estadoID`, `zonageograficaID`) VALUES
(2, 'Noroeste', 2, 1),
(3, 'Noroeste', 3, 1),
(4, 'Noroeste', 26, 1),
(5, 'Noroeste', 25, 1),
(6, 'Noroeste', 6, 1),
(7, 'Noroeste', 10, 1),
(8, 'Noreste', 7, 2),
(9, 'Noreste', 19, 2),
(10, 'Noreste', 28, 2),
(11, 'Occidente', 15, 3),
(12, 'Occidente', 18, 3),
(13, 'Occidente', 8, 3),
(14, 'Occidente', 16, 3),
(15, 'Centronorte', 1, 4),
(16, 'Centronorte', 12, 4),
(17, 'Centronorte', 24, 4),
(18, 'Centronorte', 22, 4),
(19, 'Centronorte', 32, 4),
(20, 'Metropolitana', 11, 5),
(21, 'Metropolitana', 9, 5),
(22, 'Metropolitana', 17, 5),
(23, 'Oriente', 14, 6),
(24, 'Oriente', 21, 6),
(25, 'Oriente', 29, 6),
(26, 'Oriente', 30, 6),
(27, 'Oriente', 27, 6),
(28, 'Suroeste', 13, 7),
(29, 'Suroeste', 20, 7),
(30, 'Suroeste', 5, 7),
(31, 'Sureste', 4, 8),
(32, 'Sureste', 23, 8),
(33, 'Sureste', 31, 8),
(34, 'Sureste', 27, 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
 ADD PRIMARY KEY (`bannerID`,`zonaID`) USING BTREE, ADD KEY `pertenece` (`zonaID`) USING BTREE, ADD KEY `seccion` (`seccionID`) USING BTREE;

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
 ADD PRIMARY KEY (`cartID`) USING BTREE, ADD KEY `usuarioID` (`usuarioID`) USING BTREE;

--
-- Indices de la tabla `carritototal`
--
ALTER TABLE `carritototal`
 ADD PRIMARY KEY (`carritoTotalID`) USING BTREE;

--
-- Indices de la tabla `catalogoproductos`
--
ALTER TABLE `catalogoproductos`
 ADD PRIMARY KEY (`productoID`) USING BTREE;

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`) USING BTREE, ADD KEY `last_activity_idx` (`last_activity`) USING BTREE;

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
 ADD PRIMARY KEY (`compraID`) USING BTREE, ADD KEY `usuarioID` (`usuarioID`) USING BTREE;

--
-- Indices de la tabla `compradetalle`
--
ALTER TABLE `compradetalle`
 ADD PRIMARY KEY (`compraDetalleID`) USING BTREE, ADD KEY `compraID` (`compraID`) USING BTREE;

--
-- Indices de la tabla `contadormensajes`
--
ALTER TABLE `contadormensajes`
 ADD PRIMARY KEY (`contadorID`) USING BTREE, ADD KEY `tiene` (`idUsuario`) USING BTREE;

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
 ADD PRIMARY KEY (`contenidoID`) USING BTREE, ADD KEY `seccion` (`seccionID`) USING BTREE;

--
-- Indices de la tabla `cupon`
--
ALTER TABLE `cupon`
 ADD PRIMARY KEY (`cuponID`) USING BTREE, ADD KEY `paqueteID` (`paqueteID`) USING BTREE;

--
-- Indices de la tabla `cuponadquirido`
--
ALTER TABLE `cuponadquirido`
 ADD PRIMARY KEY (`idCuponAdquirido`,`servicioID`,`detalleID`,`paqueteID`) USING BTREE, ADD KEY `detalleCuponPaquete` (`servicioID`,`detalleID`,`paqueteID`) USING BTREE, ADD KEY `historicoCupon` (`cuponDetalleID`,`cuponID`) USING BTREE;

--
-- Indices de la tabla `cupondetalle`
--
ALTER TABLE `cupondetalle`
 ADD PRIMARY KEY (`cuponDetalleID`,`cuponID`) USING BTREE, ADD KEY `detalleCupon` (`cuponID`) USING BTREE;

--
-- Indices de la tabla `destinoenvio`
--
ALTER TABLE `destinoenvio`
 ADD PRIMARY KEY (`destinoID`);

--
-- Indices de la tabla `detallepaquete`
--
ALTER TABLE `detallepaquete`
 ADD PRIMARY KEY (`detalleID`,`paqueteID`) USING BTREE, ADD KEY `detallePaquete` (`paqueteID`) USING BTREE, ADD KEY `fk_tipoPaquete_paquete_idx` (`tipoPaquete`) USING BTREE;

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
 ADD PRIMARY KEY (`estadoID`) USING BTREE;

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
 ADD KEY `favoritos` (`idUsuario`) USING BTREE;

--
-- Indices de la tabla `fotoscontenido`
--
ALTER TABLE `fotoscontenido`
 ADD PRIMARY KEY (`fotoID`) USING BTREE, ADD KEY `productoID_new` (`contenidoID`) USING BTREE;

--
-- Indices de la tabla `fotospublicacion`
--
ALTER TABLE `fotospublicacion`
 ADD PRIMARY KEY (`fotoID`) USING BTREE;

--
-- Indices de la tabla `fotostienda`
--
ALTER TABLE `fotostienda`
 ADD PRIMARY KEY (`fotoID`) USING BTREE, ADD KEY `productoID` (`productoID`) USING BTREE;

--
-- Indices de la tabla `giro`
--
ALTER TABLE `giro`
 ADD PRIMARY KEY (`giroID`) USING BTREE;

--
-- Indices de la tabla `giroempresa`
--
ALTER TABLE `giroempresa`
 ADD PRIMARY KEY (`giroEmpresaID`) USING BTREE, ADD KEY `idUsuarioDetalle` (`idUsuarioDetalle`) USING BTREE;

--
-- Indices de la tabla `grupoenvio`
--
ALTER TABLE `grupoenvio`
 ADD PRIMARY KEY (`grupoID`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
 ADD PRIMARY KEY (`mensajeID`) USING BTREE, ADD KEY `mensajes` (`idUsuario`) USING BTREE;

--
-- Indices de la tabla `mensajesadmin`
--
ALTER TABLE `mensajesadmin`
 ADD PRIMARY KEY (`mensajeID`) USING BTREE;

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
 ADD PRIMARY KEY (`paisID`) USING BTREE;

--
-- Indices de la tabla `paquete`
--
ALTER TABLE `paquete`
 ADD PRIMARY KEY (`paqueteID`) USING BTREE;

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
 ADD PRIMARY KEY (`idPermiso`) USING BTREE;

--
-- Indices de la tabla `productodetalle`
--
ALTER TABLE `productodetalle`
 ADD PRIMARY KEY (`detalleProductoID`) USING BTREE, ADD KEY `productoID` (`productoID`) USING BTREE;

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
 ADD PRIMARY KEY (`publicacionID`,`servicioID`,`detalleID`,`paqueteID`) USING BTREE, ADD KEY `contenidoPublicacion` (`servicioID`,`detalleID`,`paqueteID`) USING BTREE, ADD KEY `publicacionID` (`publicacionID`) USING BTREE;

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
 ADD PRIMARY KEY (`razaID`) USING BTREE;

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
 ADD PRIMARY KEY (`idRol`) USING BTREE;

--
-- Indices de la tabla `roltienepermiso`
--
ALTER TABLE `roltienepermiso`
 ADD PRIMARY KEY (`idRol`,`idPermiso`) USING BTREE, ADD KEY `fk_rol_has_permiso_permiso1` (`idPermiso`) USING BTREE, ADD KEY `fk_rol_has_permiso_rol` (`idRol`) USING BTREE;

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
 ADD PRIMARY KEY (`seccionID`) USING BTREE;

--
-- Indices de la tabla `serviciocontratado`
--
ALTER TABLE `serviciocontratado`
 ADD PRIMARY KEY (`servicioID`,`detalleID`,`paqueteID`) USING BTREE, ADD KEY `detallePaqueteUsuario` (`idUsuario`) USING BTREE, ADD KEY `historicoPaquete` (`detalleID`,`paqueteID`) USING BTREE;

--
-- Indices de la tabla `tipopaquete`
--
ALTER TABLE `tipopaquete`
 ADD PRIMARY KEY (`idtipopaquete`) USING BTREE;

--
-- Indices de la tabla `ubicacionusuario`
--
ALTER TABLE `ubicacionusuario`
 ADD PRIMARY KEY (`ubicacionUsuarioID`,`idUsuarioDato`) USING BTREE, ADD KEY `ubicacionUsuario` (`idUsuarioDato`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idUsuario`) USING BTREE;

--
-- Indices de la tabla `usuariodato`
--
ALTER TABLE `usuariodato`
 ADD PRIMARY KEY (`idUsuarioDato`) USING BTREE, ADD KEY `adicional` (`idUsuario`) USING BTREE;

--
-- Indices de la tabla `usuariodetalle`
--
ALTER TABLE `usuariodetalle`
 ADD PRIMARY KEY (`idusuarioDetalle`,`idUsuario`) USING BTREE, ADD KEY `detalleUsuario` (`idUsuario`) USING BTREE, ADD KEY `idusuarioDetalle` (`idusuarioDetalle`) USING BTREE;

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
 ADD PRIMARY KEY (`videoID`) USING BTREE, ADD KEY `publicacionID` (`publicacionID`) USING BTREE;

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
 ADD PRIMARY KEY (`idVisita`) USING BTREE;

--
-- Indices de la tabla `zonageografica`
--
ALTER TABLE `zonageografica`
 ADD PRIMARY KEY (`zonaID`) USING BTREE;

--
-- Indices de la tabla `zonageograficaestado`
--
ALTER TABLE `zonageograficaestado`
 ADD PRIMARY KEY (`zonaID`,`estadoID`) USING BTREE, ADD KEY `zonageograficaID` (`zonageograficaID`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
MODIFY `bannerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `carritototal`
--
ALTER TABLE `carritototal`
MODIFY `carritoTotalID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `catalogoproductos`
--
ALTER TABLE `catalogoproductos`
MODIFY `productoID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
MODIFY `compraID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `compradetalle`
--
ALTER TABLE `compradetalle`
MODIFY `compraDetalleID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `contadormensajes`
--
ALTER TABLE `contadormensajes`
MODIFY `contadorID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
MODIFY `contenidoID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `cupon`
--
ALTER TABLE `cupon`
MODIFY `cuponID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT de la tabla `cuponadquirido`
--
ALTER TABLE `cuponadquirido`
MODIFY `idCuponAdquirido` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `cupondetalle`
--
ALTER TABLE `cupondetalle`
MODIFY `cuponDetalleID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT de la tabla `destinoenvio`
--
ALTER TABLE `destinoenvio`
MODIFY `destinoID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `detallepaquete`
--
ALTER TABLE `detallepaquete`
MODIFY `detalleID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
MODIFY `estadoID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `fotoscontenido`
--
ALTER TABLE `fotoscontenido`
MODIFY `fotoID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `fotospublicacion`
--
ALTER TABLE `fotospublicacion`
MODIFY `fotoID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `fotostienda`
--
ALTER TABLE `fotostienda`
MODIFY `fotoID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `giro`
--
ALTER TABLE `giro`
MODIFY `giroID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Se definen de acuerdo al formulario de registro para empresa en index_view',AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `giroempresa`
--
ALTER TABLE `giroempresa`
MODIFY `giroEmpresaID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
MODIFY `mensajeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `mensajesadmin`
--
ALTER TABLE `mensajesadmin`
MODIFY `mensajeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
MODIFY `paisID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=241;
--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
MODIFY `paqueteID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
MODIFY `idPermiso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `productodetalle`
--
ALTER TABLE `productodetalle`
MODIFY `detalleProductoID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
MODIFY `publicacionID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
MODIFY `razaID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
MODIFY `seccionID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `serviciocontratado`
--
ALTER TABLE `serviciocontratado`
MODIFY `servicioID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `tipopaquete`
--
ALTER TABLE `tipopaquete`
MODIFY `idtipopaquete` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ubicacionusuario`
--
ALTER TABLE `ubicacionusuario`
MODIFY `ubicacionUsuarioID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `usuariodato`
--
ALTER TABLE `usuariodato`
MODIFY `idUsuarioDato` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `usuariodetalle`
--
ALTER TABLE `usuariodetalle`
MODIFY `idusuarioDetalle` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
MODIFY `videoID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `zonageografica`
--
ALTER TABLE `zonageografica`
MODIFY `zonaID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `zonageograficaestado`
--
ALTER TABLE `zonageograficaestado`
MODIFY `zonaID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `banner`
--
ALTER TABLE `banner`
ADD CONSTRAINT `banner_fk1` FOREIGN KEY (`seccionID`) REFERENCES `seccion` (`seccionID`);

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
ADD CONSTRAINT `carrito_fk1` FOREIGN KEY (`usuarioID`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
ADD CONSTRAINT `compra_fk1` FOREIGN KEY (`usuarioID`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `compradetalle`
--
ALTER TABLE `compradetalle`
ADD CONSTRAINT `compradetalle_fk1` FOREIGN KEY (`compraID`) REFERENCES `compra` (`compraID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contadormensajes`
--
ALTER TABLE `contadormensajes`
ADD CONSTRAINT `tiene` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
ADD CONSTRAINT `contenido_fk1` FOREIGN KEY (`seccionID`) REFERENCES `seccion` (`seccionID`);

--
-- Filtros para la tabla `cupon`
--
ALTER TABLE `cupon`
ADD CONSTRAINT `cupon_fk1` FOREIGN KEY (`paqueteID`) REFERENCES `paquete` (`paqueteID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuponadquirido`
--
ALTER TABLE `cuponadquirido`
ADD CONSTRAINT `detalleCuponPaquete` FOREIGN KEY (`servicioID`, `detalleID`, `paqueteID`) REFERENCES `serviciocontratado` (`servicioID`, `detalleID`, `paqueteID`);

--
-- Filtros para la tabla `cupondetalle`
--
ALTER TABLE `cupondetalle`
ADD CONSTRAINT `detalleCupon` FOREIGN KEY (`cuponID`) REFERENCES `cupon` (`cuponID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallepaquete`
--
ALTER TABLE `detallepaquete`
ADD CONSTRAINT `detallePaquete` FOREIGN KEY (`paqueteID`) REFERENCES `paquete` (`paqueteID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `detallepaquete_fk1` FOREIGN KEY (`tipoPaquete`) REFERENCES `tipopaquete` (`idtipopaquete`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
ADD CONSTRAINT `favoritos` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fotostienda`
--
ALTER TABLE `fotostienda`
ADD CONSTRAINT `fotostienda_fk1` FOREIGN KEY (`productoID`) REFERENCES `catalogoproductos` (`productoID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `giroempresa`
--
ALTER TABLE `giroempresa`
ADD CONSTRAINT `giroempresa_fk1` FOREIGN KEY (`idUsuarioDetalle`) REFERENCES `usuariodetalle` (`idusuarioDetalle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
ADD CONSTRAINT `mensajes` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productodetalle`
--
ALTER TABLE `productodetalle`
ADD CONSTRAINT `productodetalle_fk1` FOREIGN KEY (`productoID`) REFERENCES `catalogoproductos` (`productoID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `roltienepermiso`
--
ALTER TABLE `roltienepermiso`
ADD CONSTRAINT `fk_rol_has_permiso_permiso1` FOREIGN KEY (`idPermiso`) REFERENCES `permiso` (`idPermiso`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_rol_has_permiso_rol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `serviciocontratado`
--
ALTER TABLE `serviciocontratado`
ADD CONSTRAINT `detallePaqueteUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `historicoPaquete` FOREIGN KEY (`detalleID`, `paqueteID`) REFERENCES `detallepaquete` (`detalleID`, `paqueteID`);

--
-- Filtros para la tabla `ubicacionusuario`
--
ALTER TABLE `ubicacionusuario`
ADD CONSTRAINT `ubicacionUsuario` FOREIGN KEY (`idUsuarioDato`) REFERENCES `usuariodato` (`idUsuarioDato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariodato`
--
ALTER TABLE `usuariodato`
ADD CONSTRAINT `adicional` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariodetalle`
--
ALTER TABLE `usuariodetalle`
ADD CONSTRAINT `detalleUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `zonageograficaestado`
--
ALTER TABLE `zonageograficaestado`
ADD CONSTRAINT `zonageograficaestado_fk1` FOREIGN KEY (`zonageograficaID`) REFERENCES `zonageografica` (`zonaID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
