-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-06-2015 a las 16:26:46
-- Versión del servidor: 5.5.41-cll-lve
-- Versión de PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `quieroun_beta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `bannerID` int(11) NOT NULL AUTO_INCREMENT,
  `imgbaner` varchar(500) NOT NULL,
  `texto` text NOT NULL,
  `zonaID` int(11) NOT NULL DEFAULT '9',
  `posicion` int(11) DEFAULT NULL COMMENT '1 - arriba 2 - centro -3 abajo - 4 lateral',
  `seccionID` int(11) DEFAULT NULL,
  PRIMARY KEY (`bannerID`,`zonaID`) USING BTREE,
  KEY `pertenece` (`zonaID`) USING BTREE,
  KEY `seccion` (`seccionID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2340 AUTO_INCREMENT=79 ;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`bannerID`, `imgbaner`, `texto`, `zonaID`, `posicion`, `seccionID`) VALUES
(9, '', '<p> \nQuieroUnPerro.com es un sitio creado para la comunidad amante de los perros. En este portal podrás encontrar el perrito que siempre buscaste, conseguir la pareja perfecta para cruzarlo o buscarlo en caso de que esté perdido. Aquí también podrás adoptar a aquéllos que son abandonados y viven en terribles condiciones o ayudar a buscarles una familia.\n</br>\nQuieroUnPerro.com está comprometido con la sociedad y ofrece espacios gratuitos para promover y concientizar acerca del respeto y cuidado de las mascotas. Tenemos por objetivo solucionar todas tus necesidades relacionadas al mejor amigo del hombre, abriendo canales de comunicación para contactar a otros amantes de perros y compartir experiencias.\n</br>\nEn este portal encontrarás información de todo tipo de eventos caninos, promociones, artículos de interés y un amplio directorio de productos y servicios para tu peludo, buscando siempre darle lo mejor a tu mascota.\n</p>\n<div class="sub_quienes"> LA COMINIDAD QUP</div>\n<p>\nLa comunidad de QuieroUnPerro.com (QUP) está conformada por diversas organizaciones y asociaciones de protección animal que unen esfuerzos para procurar el cuidado, bienestar y respeto hacia los animales. QUP te invita a formar parte de los voluntarios que participan apoyando a dichas asociaciones en sus múltiples campañas y actividades de rescate, adopción, esterilización, entre otras. Si quieres unirte, por favor contáctanos a través del correo ayuda@quierounperro.com.\n</p>', 9, 2, 12),
(24, 'banner_superior/_82b8a__36e88_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png', '', 9, 1, 1),
(26, '/_df675__caeff_Captura_de_pantalla_2015-04-23_a_la(s)_09.51_.40__thumb.png', 'Ayúdanos a encontrarles hogar', 9, 2, 1),
(27, '/_cedc5__b5441_Captura_de_pantalla_2015-04-23_a_la(s)_09.52_.55__thumb.png', 'Conoce los cuidados básicos de todo cachorro', 9, 2, 1),
(28, 'banner_lateral/_64133__b02d5_Captura_de_pantalla_2015-04-23_a_la(s)_09.50_.39__thumb.png', '', 9, 4, 17),
(29, 'banner_inferior/_b183d__0ef27_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png', '', 9, 3, 8),
(30, 'banner_superior/_be15a__86ed0_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png', '', 9, 1, 8),
(31, 'banner_superior/_5fbd1__20d7f_Captura_de_pantalla_2015-04-23_a_la(s)_09.47_.21__thumb.png', '', 9, 1, 9),
(32, 'banner_inferior/_1b410__3ff85_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png', '', 9, 3, 9),
(33, '', 'Perrotón Abril 2015', 9, 2, 9),
(34, 'banner_superior/_c22c5__6738e_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png', '', 9, 1, 15),
(35, 'banner_inferior/_7a044__ffa22_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png', '', 9, 3, 15),
(37, 'banner_lateral/_cd363__b1d28_Penguins_thumb.jpg', '', 9, 4, 17),
(40, 'banner_inferior/_5e35e__611e1_Desert_thumb.jpg', '', 9, 3, 9),
(41, '', '<p> \n\n<p><font class="sub_frecuentes">1.- ¿Cuántos anuncios se pueden publicar por usuario?</font>\n</br>\n- No existe un límite de anuncios para publicar por usuario. Cuando eres un usuario nuevo, tienes derecho a un anuncio de prueba gratis. Una vez utilizado, puedes adquirir la cantidad de anuncios que desees publicar. </p>\n</br>\n<p>\n<font class="sub_frecuentes">2.- ¿Con que medidas de seguridad cuenta el sitio?</font>\n</br>\n- El sitio cuenta con una programación segura, de manera que todos tus datos e información se encuentran encriptados. Las transacciones se realizan directamente con el banco, de esta manera el sitio no tiene acceso a tu información bancaria. Además, está soportado por un dominio HTTPS que garantiza la seguridad del usuario.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">3.- ¿Por qué no puedo ingresar a mi cuenta?</font>\n</br>\na) El usuario y/o la contraseña son incorrectos, puedes utilizar el campo de solicitud de contraseña y ésta te será enviada a la cuenta de correo electrónico que está registrado en tu perfil de usuario. b) Tu cuenta ha sido cancelada debido a que se violaron una o más de las políticas y/o términos y condiciones de uso de QuieroUnPerro.com\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">4.- ¿Por qué mi cuenta de usuario se ha cancelado?</font>\n</br>\nExisten varias  razones por las cuales se cancela una cuenta:\n-	El usuario ha violado una o más de las políticas y/o términos y condiciones de uso de QuieroUnPerro.com\n</br>\n-	El usuario ha publicado anuncios o comentarios que atentan contra la moral, la salud, y las buenas costumbres.\n</br>\n-	El usuario ha publicado información falsa en el sitio o ha intentado hacer transacciones fraudulentas.\n</br>\n-	El usuario ha publicado un anuncio de venta o cruza en las secciones de adopción o perros perdidos debido a que son secciones gratuitas y de servicio a la comunidad.\n</br>\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">5.- ¿Si olvidé mi cuenta, tengo que crear otro usuario?</font>\n</br>\n- No. Para recuperar tu usuario y contraseña solamente necesitas utilizar el campo para recuperar contraseña vía correo electrónico, que está situado en la sección lateral izquierda de la página de inicio en la sección de mi cuenta. \n</p>\n</br>\n<p>\n<font class="sub_frecuentes">6.- ¿Cómo puedo subir las fotos a mi anuncio?</font>\n</br>\n- Una vez que te encuentres en el tercer paso de creación de anuncio, deberás seleccionar el botón “cargar imágenes" y se abrirá una ventana para seleccionar las imágenes de tu computadora. Si las imágenes son de un tamaño superior a 1MB el tiempo de carga puede tardar unos minutos.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">7.- ¿Cómo puedo saber si mi anuncio ya fue publicado?</font>\n</br>\n- Una vez que termines el proceso de creación de anuncio, éste será revisado y aprobado para su publicación en el sitio, a pesar de ya haber sido pagado. Este proceso puede llegar a tardar hasta 12 horas hábiles. Puedes consultar el estatus de tu anuncio en cualquier momento en tu perfil de usuario. Una vez autorizado, éste será publicado en la sección previamente seleccionada y será visible para todos los visitantes del sitio.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes"> 8.-  Ya pasaron 12 horas hábiles y mi anuncio no ha sido publicado, ¿qué sucede? </font>\n</br>\n- Puede ser que el contenido del anuncio atente contra las políticas y términos y condiciones de QuieroUnPerro.com. Si este es el caso, recibirás un correo electrónico donde se te comunique lo sucedido y los pasos a seguir. Si no lo has recibido, por favor envia un correo a contacto@quierounperro.com.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">9.- ¿Cuál es la vigencia de los anuncios en las secciones de publicación?</font>\n</br>\n-La vigencia de los anuncios varía dependiendo del tipo de paquete que se ha contratado, para el caso de los paquetes Lite y Regular es de 30 días, y para los paquetes Premium es de 60 días.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">10.- ¿Cómo  puedo  anunciar mi marca, producto, servicio o evento en la página?</font>\n</br>\n- Envía un correo a la dirección publicidad@quierounperro.com y llena la información que se solicita. Un representante se pondrá en contacto contigo para mayor información\n</p>', 9, 2, 15),
(42, 'banner_superior/_476ee__fd208__056f3__2901d_Tulips_thumb_thumb.jpg', '', 9, 1, 1),
(43, 'banner_superior/_86d45__8d6b9_banner-logo_thumb.jpg', '', 9, 1, 6),
(44, 'banner_inferior/_4a312__149a0_banner-logo_thumb.jpg', '', 9, 3, 6),
(53, 'banner_superior/_7cef6__257f6_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png', '', 9, 1, 10),
(54, '', 'TEXTO DE APOYO DIRECTORIO', 9, 2, 4),
(55, 'banner_superior/_876b3__b9f4c_butterflies_and_hurricanes_wallpaper_by_ponylov-d5i8mgw_thumb.png', '', 9, 1, 6),
(56, 'banner_superior/_4d55e__b190d_1_thumb.png', '', 9, 1, 6),
(58, 'banner_superior/_fb622__2fff3_banner-logo_thumb.jpg', '', 9, 1, 11),
(61, 'banner_superior/_26714__dfe6a_banner-logo_thumb.jpg', '', 9, 1, 7),
(62, 'banner_inferior/_52430__719b0_banner-logo_thumb.jpg', '', 9, 3, 7),
(65, 'banner_superior/_02553__67a3c_WHICH-DOG-WEB-BANNER_thumb.jpg', '', 9, 1, 11),
(66, 'banner_inferior/_970b4__29153_WHICH-DOG-WEB-BANNER_thumb.jpg', '', 9, 3, 11),
(69, 'banner_inferior/_5ebb4__48a24_banner-logo_thumb.jpg', '', 9, 3, 11),
(73, '', 'TEXTO DE APOYO PARA SECCION DE PERROS PERDIDOS', 9, 2, 7),
(74, '', 'TEXTO DE APOYO ADOPCION', 9, 2, 6),
(75, '', 'TEXTO DE APOYO ASOCIACIONES PROTECTORES', 9, 2, 11),
(76, '', 'VENTA VENTA VENTA', 9, 2, 2),
(77, 'banner_superior/_78438__e5b74_dog-banner_thumb.jpg', '', 9, 1, 4),
(78, 'banner_inferior/_0a60d__2ea0d_descarga_(1)_thumb.jpg', '', 9, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
  `cartID` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioID` int(11) DEFAULT NULL,
  `productoID` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL COMMENT 'cantidad',
  `precio` float(5,2) DEFAULT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `talla` varchar(120) DEFAULT NULL,
  `color` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`cartID`) USING BTREE,
  KEY `usuarioID` (`usuarioID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`cartID`, `usuarioID`, `productoID`, `cantidad`, `precio`, `nombre`, `talla`, `color`) VALUES
(33, 31, 5, 2, 350.00, 'Alimento Light', 'Grande', 'N/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritototal`
--

CREATE TABLE IF NOT EXISTS `carritototal` (
  `carritoTotalID` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioID` int(11) DEFAULT NULL,
  `totalProductos` float(9,2) DEFAULT NULL,
  `totalPrecio` float(9,2) DEFAULT NULL,
  `subtotal` float(9,2) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  PRIMARY KEY (`carritoTotalID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=16384 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `carritototal`
--

INSERT INTO `carritototal` (`carritoTotalID`, `usuarioID`, `totalProductos`, `totalPrecio`, `subtotal`, `descuento`) VALUES
(2, 15, 13.00, 1381.00, 1381.00, NULL),
(26, 31, 2.00, 700.00, 700.00, 0),
(27, 27, 0.00, 0.00, 0.00, 0),
(28, 32, 0.00, 0.00, 0.00, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogoproductos`
--

CREATE TABLE IF NOT EXISTS `catalogoproductos` (
  `productoID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `sku` varchar(30) NOT NULL,
  `precio` float(7,2) NOT NULL,
  PRIMARY KEY (`productoID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1024 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `catalogoproductos`
--

INSERT INTO `catalogoproductos` (`productoID`, `nombre`, `descripcion`, `sku`, `precio`) VALUES
(5, 'Alimento Light', 'Este alimento es ideal para los perros de mayor edad que no pueden hacer mucho ejercicio pero que deben perder peso.', 'CROQUETAS', 350.00),
(6, 'Alberca para perros', 'Alberca para perros ', 'Alberca', 350.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`) USING BTREE,
  KEY `last_activity_idx` (`last_activity`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=9362 COMMENT='tabla necesaria para CodeIgniter ... ';

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('01c8d1373cbf8790d40c7e2e16037a25', '66.249.73.205', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1434255139, ''),
('535dfa4c2ef81efb71db1af5a4f11f72', '66.249.64.158', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1434187877, ''),
('54984949e918436c140a08d446100bcd', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.130 Safari/537.36', 1435011309, 'a:15:{s:6:"banner";a:34:{i:0;O:8:"stdClass":6:{s:8:"bannerID";s:1:"9";s:8:"imgbaner";s:0:"";s:5:"texto";s:1491:"<p> \nQuieroUnPerro.com es un sitio creado para la comunidad amante de los perros. En este portal podrás encontrar el perrito que siempre buscaste, conseguir la pareja perfecta para cruzarlo o buscarlo en caso de que esté perdido. Aquí también podrás adoptar a aquéllos que son abandonados y viven en terribles condiciones o ayudar a buscarles una familia.\n</br>\nQuieroUnPerro.com está comprometido con la sociedad y ofrece espacios gratuitos para promover y concientizar acerca del respeto y cuidado de las mascotas. Tenemos por objetivo solucionar todas tus necesidades relacionadas al mejor amigo del hombre, abriendo canales de comunicación para contactar a otros amantes de perros y compartir experiencias.\n</br>\nEn este portal encontrarás información de todo tipo de eventos caninos, promociones, artículos de interés y un amplio directorio de productos y servicios para tu peludo, buscando siempre darle lo mejor a tu mascota.\n</p>\n<div class="sub_quienes"> LA COMINIDAD QUP</div>\n<p>\nLa comunidad de QuieroUnPerro.com (QUP) está conformada por diversas organizaciones y asociaciones de protección animal que unen esfuerzos para procurar el cuidado, bienestar y respeto hacia los animales. QUP te invita a formar parte de los voluntarios que participan apoyando a dichas asociaciones en sus múltiples campañas y actividades de rescate, adopción, esterilización, entre otras. Si quieres unirte, por favor contáctanos a través del correo ayuda@quierounperro.com.\n</p>";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:2:"12";}i:1;O:8:"stdClass":6:{s:8:"bannerID";s:2:"24";s:8:"imgbaner";s:89:"banner_superior/_82b8a__36e88_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"1";}i:2;O:8:"stdClass":6:{s:8:"bannerID";s:2:"26";s:8:"imgbaner";s:74:"/_df675__caeff_Captura_de_pantalla_2015-04-23_a_la(s)_09.51_.40__thumb.png";s:5:"texto";s:30:"Ayúdanos a encontrarles hogar";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"1";}i:3;O:8:"stdClass":6:{s:8:"bannerID";s:2:"27";s:8:"imgbaner";s:74:"/_cedc5__b5441_Captura_de_pantalla_2015-04-23_a_la(s)_09.52_.55__thumb.png";s:5:"texto";s:45:"Conoce los cuidados básicos de todo cachorro";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"1";}i:4;O:8:"stdClass":6:{s:8:"bannerID";s:2:"28";s:8:"imgbaner";s:88:"banner_lateral/_64133__b02d5_Captura_de_pantalla_2015-04-23_a_la(s)_09.50_.39__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"4";s:9:"seccionID";s:2:"17";}i:5;O:8:"stdClass":6:{s:8:"bannerID";s:2:"29";s:8:"imgbaner";s:89:"banner_inferior/_b183d__0ef27_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"8";}i:6;O:8:"stdClass":6:{s:8:"bannerID";s:2:"30";s:8:"imgbaner";s:89:"banner_superior/_be15a__86ed0_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"8";}i:7;O:8:"stdClass":6:{s:8:"bannerID";s:2:"31";s:8:"imgbaner";s:89:"banner_superior/_5fbd1__20d7f_Captura_de_pantalla_2015-04-23_a_la(s)_09.47_.21__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"9";}i:8;O:8:"stdClass":6:{s:8:"bannerID";s:2:"32";s:8:"imgbaner";s:89:"banner_inferior/_1b410__3ff85_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"9";}i:9;O:8:"stdClass":6:{s:8:"bannerID";s:2:"33";s:8:"imgbaner";s:0:"";s:5:"texto";s:20:"Perrotón Abril 2015";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"9";}i:10;O:8:"stdClass":6:{s:8:"bannerID";s:2:"34";s:8:"imgbaner";s:89:"banner_superior/_c22c5__6738e_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:2:"15";}i:11;O:8:"stdClass":6:{s:8:"bannerID";s:2:"35";s:8:"imgbaner";s:89:"banner_inferior/_7a044__ffa22_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:2:"15";}i:12;O:8:"stdClass":6:{s:8:"bannerID";s:2:"37";s:8:"imgbaner";s:47:"banner_lateral/_cd363__b1d28_Penguins_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"4";s:9:"seccionID";s:2:"17";}i:13;O:8:"stdClass":6:{s:8:"bannerID";s:2:"40";s:8:"imgbaner";s:46:"banner_inferior/_5e35e__611e1_Desert_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"9";}i:14;O:8:"stdClass":6:{s:8:"bannerID";s:2:"41";s:8:"imgbaner";s:0:"";s:5:"texto";s:4320:"<p> \n\n<p><font class="sub_frecuentes">1.- ¿Cuántos anuncios se pueden publicar por usuario?</font>\n</br>\n- No existe un límite de anuncios para publicar por usuario. Cuando eres un usuario nuevo, tienes derecho a un anuncio de prueba gratis. Una vez utilizado, puedes adquirir la cantidad de anuncios que desees publicar. </p>\n</br>\n<p>\n<font class="sub_frecuentes">2.- ¿Con que medidas de seguridad cuenta el sitio?</font>\n</br>\n- El sitio cuenta con una programación segura, de manera que todos tus datos e información se encuentran encriptados. Las transacciones se realizan directamente con el banco, de esta manera el sitio no tiene acceso a tu información bancaria. Además, está soportado por un dominio HTTPS que garantiza la seguridad del usuario.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">3.- ¿Por qué no puedo ingresar a mi cuenta?</font>\n</br>\na) El usuario y/o la contraseña son incorrectos, puedes utilizar el campo de solicitud de contraseña y ésta te será enviada a la cuenta de correo electrónico que está registrado en tu perfil de usuario. b) Tu cuenta ha sido cancelada debido a que se violaron una o más de las políticas y/o términos y condiciones de uso de QuieroUnPerro.com\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">4.- ¿Por qué mi cuenta de usuario se ha cancelado?</font>\n</br>\nExisten varias  razones por las cuales se cancela una cuenta:\n-	El usuario ha violado una o más de las políticas y/o términos y condiciones de uso de QuieroUnPerro.com\n</br>\n-	El usuario ha publicado anuncios o comentarios que atentan contra la moral, la salud, y las buenas costumbres.\n</br>\n-	El usuario ha publicado información falsa en el sitio o ha intentado hacer transacciones fraudulentas.\n</br>\n-	El usuario ha publicado un anuncio de venta o cruza en las secciones de adopción o perros perdidos debido a que son secciones gratuitas y de servicio a la comunidad.\n</br>\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">5.- ¿Si olvidé mi cuenta, tengo que crear otro usuario?</font>\n</br>\n- No. Para recuperar tu usuario y contraseña solamente necesitas utilizar el campo para recuperar contraseña vía correo electrónico, que está situado en la sección lateral izquierda de la página de inicio en la sección de mi cuenta. \n</p>\n</br>\n<p>\n<font class="sub_frecuentes">6.- ¿Cómo puedo subir las fotos a mi anuncio?</font>\n</br>\n- Una vez que te encuentres en el tercer paso de creación de anuncio, deberás seleccionar el botón “cargar imágenes" y se abrirá una ventana para seleccionar las imágenes de tu computadora. Si las imágenes son de un tamaño superior a 1MB el tiempo de carga puede tardar unos minutos.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">7.- ¿Cómo puedo saber si mi anuncio ya fue publicado?</font>\n</br>\n- Una vez que termines el proceso de creación de anuncio, éste será revisado y aprobado para su publicación en el sitio, a pesar de ya haber sido pagado. Este proceso puede llegar a tardar hasta 12 horas hábiles. Puedes consultar el estatus de tu anuncio en cualquier momento en tu perfil de usuario. Una vez autorizado, éste será publicado en la sección previamente seleccionada y será visible para todos los visitantes del sitio.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes"> 8.-  Ya pasaron 12 horas hábiles y mi anuncio no ha sido publicado, ¿qué sucede? </font>\n</br>\n- Puede ser que el contenido del anuncio atente contra las políticas y términos y condiciones de QuieroUnPerro.com. Si este es el caso, recibirás un correo electrónico donde se te comunique lo sucedido y los pasos a seguir. Si no lo has recibido, por favor envia un correo a contacto@quierounperro.com.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">9.- ¿Cuál es la vigencia de los anuncios en las secciones de publicación?</font>\n</br>\n-La vigencia de los anuncios varía dependiendo del tipo de paquete que se ha contratado, para el caso de los paquetes Lite y Regular es de 30 días, y para los paquetes Premium es de 60 días.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">10.- ¿Cómo  puedo  anunciar mi marca, producto, servicio o evento en la página?</font>\n</br>\n- Envía un correo a la dirección publicidad@quierounperro.com y llena la información que se solicita. Un representante se pondrá en contacto contigo para mayor información\n</p>";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:2:"15";}i:15;O:8:"stdClass":6:{s:8:"bannerID";s:2:"42";s:8:"imgbaner";s:66:"banner_superior/_476ee__fd208__056f3__2901d_Tulips_thumb_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"1";}i:16;O:8:"stdClass":6:{s:8:"bannerID";s:2:"43";s:8:"imgbaner";s:51:"banner_superior/_86d45__8d6b9_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"6";}i:17;O:8:"stdClass":6:{s:8:"bannerID";s:2:"44";s:8:"imgbaner";s:51:"banner_inferior/_4a312__149a0_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"6";}i:18;O:8:"stdClass":6:{s:8:"bannerID";s:2:"53";s:8:"imgbaner";s:89:"banner_superior/_7cef6__257f6_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:2:"10";}i:19;O:8:"stdClass":6:{s:8:"bannerID";s:2:"54";s:8:"imgbaner";s:0:"";s:5:"texto";s:25:"TEXTO DE APOYO DIRECTORIO";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"4";}i:20;O:8:"stdClass":6:{s:8:"bannerID";s:2:"55";s:8:"imgbaner";s:95:"banner_superior/_876b3__b9f4c_butterflies_and_hurricanes_wallpaper_by_ponylov-d5i8mgw_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"6";}i:21;O:8:"stdClass":6:{s:8:"bannerID";s:2:"56";s:8:"imgbaner";s:41:"banner_superior/_4d55e__b190d_1_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"6";}i:22;O:8:"stdClass":6:{s:8:"bannerID";s:2:"58";s:8:"imgbaner";s:51:"banner_superior/_fb622__2fff3_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:2:"11";}i:23;O:8:"stdClass":6:{s:8:"bannerID";s:2:"61";s:8:"imgbaner";s:51:"banner_superior/_26714__dfe6a_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"7";}i:24;O:8:"stdClass":6:{s:8:"bannerID";s:2:"62";s:8:"imgbaner";s:51:"banner_inferior/_52430__719b0_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"7";}i:25;O:8:"stdClass":6:{s:8:"bannerID";s:2:"65";s:8:"imgbaner";s:60:"banner_superior/_02553__67a3c_WHICH-DOG-WEB-BANNER_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:2:"11";}i:26;O:8:"stdClass":6:{s:8:"bannerID";s:2:"66";s:8:"imgbaner";s:60:"banner_inferior/_970b4__29153_WHICH-DOG-WEB-BANNER_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:2:"11";}i:27;O:8:"stdClass":6:{s:8:"bannerID";s:2:"69";s:8:"imgbaner";s:51:"banner_inferior/_5ebb4__48a24_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:2:"11";}i:28;O:8:"stdClass":6:{s:8:"bannerID";s:2:"73";s:8:"imgbaner";s:0:"";s:5:"texto";s:46:"TEXTO DE APOYO PARA SECCION DE PERROS PERDIDOS";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"7";}i:29;O:8:"stdClass":6:{s:8:"bannerID";s:2:"74";s:8:"imgbaner";s:0:"";s:5:"texto";s:23:"TEXTO DE APOYO ADOPCION";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"6";}i:30;O:8:"stdClass":6:{s:8:"bannerID";s:2:"75";s:8:"imgbaner";s:0:"";s:5:"texto";s:39:"TEXTO DE APOYO ASOCIACIONES PROTECTORES";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:2:"11";}i:31;O:8:"stdClass":6:{s:8:"bannerID";s:2:"76";s:8:"imgbaner";s:0:"";s:5:"texto";s:17:"VENTA VENTA VENTA";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"2";}i:32;O:8:"stdClass":6:{s:8:"bannerID";s:2:"77";s:8:"imgbaner";s:50:"banner_superior/_78438__e5b74_dog-banner_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"4";}i:33;O:8:"stdClass":6:{s:8:"bannerID";s:2:"78";s:8:"imgbaner";s:52:"banner_inferior/_0a60d__2ea0d_descarga_(1)_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"4";}}s:6:"logged";b:1;s:9:"idUsuario";s:1:"3";s:6:"correo";s:21:"marthahdez2@gmail.com";s:6:"nombre";s:6:"martha";s:8:"apellido";s:4:"hdez";s:8:"telefono";s:10:"1234567890";s:11:"tipoUsuario";s:1:"1";s:7:"authKey";s:20:"A446E874DAB3FFEC3A32";s:5:"nivel";s:1:"1";s:13:"paqueteGratis";s:1:"0";s:13:"idUsuarioDato";s:1:"2";s:3:"rol";i:1;s:14:"manuallyLogged";b:1;s:12:"cuponusuario";N;}'),
('7b55211b607ae100bbe4d85737d1c08f', '189.234.149.210', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.124 Safari/537.36', 1434649015, 'a:2:{s:9:"user_data";s:0:"";s:6:"banner";a:34:{i:0;O:8:"stdClass":6:{s:8:"bannerID";s:1:"9";s:8:"imgbaner";s:0:"";s:5:"texto";s:1491:"<p> \nQuieroUnPerro.com es un sitio creado para la comunidad amante de los perros. En este portal podrás encontrar el perrito que siempre buscaste, conseguir la pareja perfecta para cruzarlo o buscarlo en caso de que esté perdido. Aquí también podrás adoptar a aquéllos que son abandonados y viven en terribles condiciones o ayudar a buscarles una familia.\n</br>\nQuieroUnPerro.com está comprometido con la sociedad y ofrece espacios gratuitos para promover y concientizar acerca del respeto y cuidado de las mascotas. Tenemos por objetivo solucionar todas tus necesidades relacionadas al mejor amigo del hombre, abriendo canales de comunicación para contactar a otros amantes de perros y compartir experiencias.\n</br>\nEn este portal encontrarás información de todo tipo de eventos caninos, promociones, artículos de interés y un amplio directorio de productos y servicios para tu peludo, buscando siempre darle lo mejor a tu mascota.\n</p>\n<div class="sub_quienes"> LA COMINIDAD QUP</div>\n<p>\nLa comunidad de QuieroUnPerro.com (QUP) está conformada por diversas organizaciones y asociaciones de protección animal que unen esfuerzos para procurar el cuidado, bienestar y respeto hacia los animales. QUP te invita a formar parte de los voluntarios que participan apoyando a dichas asociaciones en sus múltiples campañas y actividades de rescate, adopción, esterilización, entre otras. Si quieres unirte, por favor contáctanos a través del correo ayuda@quierounperro.com.\n</p>";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:2:"12";}i:1;O:8:"stdClass":6:{s:8:"bannerID";s:2:"24";s:8:"imgbaner";s:89:"banner_superior/_82b8a__36e88_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"1";}i:2;O:8:"stdClass":6:{s:8:"bannerID";s:2:"26";s:8:"imgbaner";s:74:"/_df675__caeff_Captura_de_pantalla_2015-04-23_a_la(s)_09.51_.40__thumb.png";s:5:"texto";s:30:"Ayúdanos a encontrarles hogar";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"1";}i:3;O:8:"stdClass":6:{s:8:"bannerID";s:2:"27";s:8:"imgbaner";s:74:"/_cedc5__b5441_Captura_de_pantalla_2015-04-23_a_la(s)_09.52_.55__thumb.png";s:5:"texto";s:45:"Conoce los cuidados básicos de todo cachorro";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"1";}i:4;O:8:"stdClass":6:{s:8:"bannerID";s:2:"28";s:8:"imgbaner";s:88:"banner_lateral/_64133__b02d5_Captura_de_pantalla_2015-04-23_a_la(s)_09.50_.39__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"4";s:9:"seccionID";s:2:"17";}i:5;O:8:"stdClass":6:{s:8:"bannerID";s:2:"29";s:8:"imgbaner";s:89:"banner_inferior/_b183d__0ef27_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"8";}i:6;O:8:"stdClass":6:{s:8:"bannerID";s:2:"30";s:8:"imgbaner";s:89:"banner_superior/_be15a__86ed0_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"8";}i:7;O:8:"stdClass":6:{s:8:"bannerID";s:2:"31";s:8:"imgbaner";s:89:"banner_superior/_5fbd1__20d7f_Captura_de_pantalla_2015-04-23_a_la(s)_09.47_.21__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"9";}i:8;O:8:"stdClass":6:{s:8:"bannerID";s:2:"32";s:8:"imgbaner";s:89:"banner_inferior/_1b410__3ff85_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"9";}i:9;O:8:"stdClass":6:{s:8:"bannerID";s:2:"33";s:8:"imgbaner";s:0:"";s:5:"texto";s:20:"Perrotón Abril 2015";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"9";}i:10;O:8:"stdClass":6:{s:8:"bannerID";s:2:"34";s:8:"imgbaner";s:89:"banner_superior/_c22c5__6738e_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:2:"15";}i:11;O:8:"stdClass":6:{s:8:"bannerID";s:2:"35";s:8:"imgbaner";s:89:"banner_inferior/_7a044__ffa22_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:2:"15";}i:12;O:8:"stdClass":6:{s:8:"bannerID";s:2:"37";s:8:"imgbaner";s:47:"banner_lateral/_cd363__b1d28_Penguins_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"4";s:9:"seccionID";s:2:"17";}i:13;O:8:"stdClass":6:{s:8:"bannerID";s:2:"40";s:8:"imgbaner";s:46:"banner_inferior/_5e35e__611e1_Desert_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"9";}i:14;O:8:"stdClass":6:{s:8:"bannerID";s:2:"41";s:8:"imgbaner";s:0:"";s:5:"texto";s:4320:"<p> \n\n<p><font class="sub_frecuentes">1.- ¿Cuántos anuncios se pueden publicar por usuario?</font>\n</br>\n- No existe un límite de anuncios para publicar por usuario. Cuando eres un usuario nuevo, tienes derecho a un anuncio de prueba gratis. Una vez utilizado, puedes adquirir la cantidad de anuncios que desees publicar. </p>\n</br>\n<p>\n<font class="sub_frecuentes">2.- ¿Con que medidas de seguridad cuenta el sitio?</font>\n</br>\n- El sitio cuenta con una programación segura, de manera que todos tus datos e información se encuentran encriptados. Las transacciones se realizan directamente con el banco, de esta manera el sitio no tiene acceso a tu información bancaria. Además, está soportado por un dominio HTTPS que garantiza la seguridad del usuario.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">3.- ¿Por qué no puedo ingresar a mi cuenta?</font>\n</br>\na) El usuario y/o la contraseña son incorrectos, puedes utilizar el campo de solicitud de contraseña y ésta te será enviada a la cuenta de correo electrónico que está registrado en tu perfil de usuario. b) Tu cuenta ha sido cancelada debido a que se violaron una o más de las políticas y/o términos y condiciones de uso de QuieroUnPerro.com\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">4.- ¿Por qué mi cuenta de usuario se ha cancelado?</font>\n</br>\nExisten varias  razones por las cuales se cancela una cuenta:\n-	El usuario ha violado una o más de las políticas y/o términos y condiciones de uso de QuieroUnPerro.com\n</br>\n-	El usuario ha publicado anuncios o comentarios que atentan contra la moral, la salud, y las buenas costumbres.\n</br>\n-	El usuario ha publicado información falsa en el sitio o ha intentado hacer transacciones fraudulentas.\n</br>\n-	El usuario ha publicado un anuncio de venta o cruza en las secciones de adopción o perros perdidos debido a que son secciones gratuitas y de servicio a la comunidad.\n</br>\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">5.- ¿Si olvidé mi cuenta, tengo que crear otro usuario?</font>\n</br>\n- No. Para recuperar tu usuario y contraseña solamente necesitas utilizar el campo para recuperar contraseña vía correo electrónico, que está situado en la sección lateral izquierda de la página de inicio en la sección de mi cuenta. \n</p>\n</br>\n<p>\n<font class="sub_frecuentes">6.- ¿Cómo puedo subir las fotos a mi anuncio?</font>\n</br>\n- Una vez que te encuentres en el tercer paso de creación de anuncio, deberás seleccionar el botón “cargar imágenes" y se abrirá una ventana para seleccionar las imágenes de tu computadora. Si las imágenes son de un tamaño superior a 1MB el tiempo de carga puede tardar unos minutos.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">7.- ¿Cómo puedo saber si mi anuncio ya fue publicado?</font>\n</br>\n- Una vez que termines el proceso de creación de anuncio, éste será revisado y aprobado para su publicación en el sitio, a pesar de ya haber sido pagado. Este proceso puede llegar a tardar hasta 12 horas hábiles. Puedes consultar el estatus de tu anuncio en cualquier momento en tu perfil de usuario. Una vez autorizado, éste será publicado en la sección previamente seleccionada y será visible para todos los visitantes del sitio.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes"> 8.-  Ya pasaron 12 horas hábiles y mi anuncio no ha sido publicado, ¿qué sucede? </font>\n</br>\n- Puede ser que el contenido del anuncio atente contra las políticas y términos y condiciones de QuieroUnPerro.com. Si este es el caso, recibirás un correo electrónico donde se te comunique lo sucedido y los pasos a seguir. Si no lo has recibido, por favor envia un correo a contacto@quierounperro.com.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">9.- ¿Cuál es la vigencia de los anuncios en las secciones de publicación?</font>\n</br>\n-La vigencia de los anuncios varía dependiendo del tipo de paquete que se ha contratado, para el caso de los paquetes Lite y Regular es de 30 días, y para los paquetes Premium es de 60 días.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">10.- ¿Cómo  puedo  anunciar mi marca, producto, servicio o evento en la página?</font>\n</br>\n- Envía un correo a la dirección publicidad@quierounperro.com y llena la información que se solicita. Un representante se pondrá en contacto contigo para mayor información\n</p>";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:2:"15";}i:15;O:8:"stdClass":6:{s:8:"bannerID";s:2:"42";s:8:"imgbaner";s:66:"banner_superior/_476ee__fd208__056f3__2901d_Tulips_thumb_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"1";}i:16;O:8:"stdClass":6:{s:8:"bannerID";s:2:"43";s:8:"imgbaner";s:51:"banner_superior/_86d45__8d6b9_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"6";}i:17;O:8:"stdClass":6:{s:8:"bannerID";s:2:"44";s:8:"imgbaner";s:51:"banner_inferior/_4a312__149a0_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"6";}i:18;O:8:"stdClass":6:{s:8:"bannerID";s:2:"53";s:8:"imgbaner";s:89:"banner_superior/_7cef6__257f6_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:2:"10";}i:19;O:8:"stdClass":6:{s:8:"bannerID";s:2:"54";s:8:"imgbaner";s:0:"";s:5:"texto";s:25:"TEXTO DE APOYO DIRECTORIO";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"4";}i:20;O:8:"stdClass":6:{s:8:"bannerID";s:2:"55";s:8:"imgbaner";s:95:"banner_superior/_876b3__b9f4c_butterflies_and_hurricanes_wallpaper_by_ponylov-d5i8mgw_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"6";}i:21;O:8:"stdClass":6:{s:8:"bannerID";s:2:"56";s:8:"imgbaner";s:41:"banner_superior/_4d55e__b190d_1_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"6";}i:22;O:8:"stdClass":6:{s:8:"bannerID";s:2:"58";s:8:"imgbaner";s:51:"banner_superior/_fb622__2fff3_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:2:"11";}i:23;O:8:"stdClass":6:{s:8:"bannerID";s:2:"61";s:8:"imgbaner";s:51:"banner_superior/_26714__dfe6a_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"7";}i:24;O:8:"stdClass":6:{s:8:"bannerID";s:2:"62";s:8:"imgbaner";s:51:"banner_inferior/_52430__719b0_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"7";}i:25;O:8:"stdClass":6:{s:8:"bannerID";s:2:"65";s:8:"imgbaner";s:60:"banner_superior/_02553__67a3c_WHICH-DOG-WEB-BANNER_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:2:"11";}i:26;O:8:"stdClass":6:{s:8:"bannerID";s:2:"66";s:8:"imgbaner";s:60:"banner_inferior/_970b4__29153_WHICH-DOG-WEB-BANNER_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:2:"11";}i:27;O:8:"stdClass":6:{s:8:"bannerID";s:2:"69";s:8:"imgbaner";s:51:"banner_inferior/_5ebb4__48a24_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:2:"11";}i:28;O:8:"stdClass":6:{s:8:"bannerID";s:2:"73";s:8:"imgbaner";s:0:"";s:5:"texto";s:46:"TEXTO DE APOYO PARA SECCION DE PERROS PERDIDOS";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"7";}i:29;O:8:"stdClass":6:{s:8:"bannerID";s:2:"74";s:8:"imgbaner";s:0:"";s:5:"texto";s:23:"TEXTO DE APOYO ADOPCION";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"6";}i:30;O:8:"stdClass":6:{s:8:"bannerID";s:2:"75";s:8:"imgbaner";s:0:"";s:5:"texto";s:39:"TEXTO DE APOYO ASOCIACIONES PROTECTORES";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:2:"11";}i:31;O:8:"stdClass":6:{s:8:"bannerID";s:2:"76";s:8:"imgbaner";s:0:"";s:5:"texto";s:17:"VENTA VENTA VENTA";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"2";}i:32;O:8:"stdClass":6:{s:8:"bannerID";s:2:"77";s:8:"imgbaner";s:50:"banner_superior/_78438__e5b74_dog-banner_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"4";}i:33;O:8:"stdClass":6:{s:8:"bannerID";s:2:"78";s:8:"imgbaner";s:52:"banner_inferior/_0a60d__2ea0d_descarga_(1)_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"4";}}}'),
('a7241e444df24ca13f906d9fa498471c', '66.249.67.99', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1434603185, ''),
('d7ce07d6853d67f6f6ffa94ad1cc873d', '66.249.69.126', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1434936223, ''),
('de45491b548646139ce72095697e0f18', '187.189.242.4', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.124 Safari/537.36', 1434737423, 'a:2:{s:9:"user_data";s:0:"";s:6:"banner";a:34:{i:0;O:8:"stdClass":6:{s:8:"bannerID";s:1:"9";s:8:"imgbaner";s:0:"";s:5:"texto";s:1491:"<p> \nQuieroUnPerro.com es un sitio creado para la comunidad amante de los perros. En este portal podrás encontrar el perrito que siempre buscaste, conseguir la pareja perfecta para cruzarlo o buscarlo en caso de que esté perdido. Aquí también podrás adoptar a aquéllos que son abandonados y viven en terribles condiciones o ayudar a buscarles una familia.\n</br>\nQuieroUnPerro.com está comprometido con la sociedad y ofrece espacios gratuitos para promover y concientizar acerca del respeto y cuidado de las mascotas. Tenemos por objetivo solucionar todas tus necesidades relacionadas al mejor amigo del hombre, abriendo canales de comunicación para contactar a otros amantes de perros y compartir experiencias.\n</br>\nEn este portal encontrarás información de todo tipo de eventos caninos, promociones, artículos de interés y un amplio directorio de productos y servicios para tu peludo, buscando siempre darle lo mejor a tu mascota.\n</p>\n<div class="sub_quienes"> LA COMINIDAD QUP</div>\n<p>\nLa comunidad de QuieroUnPerro.com (QUP) está conformada por diversas organizaciones y asociaciones de protección animal que unen esfuerzos para procurar el cuidado, bienestar y respeto hacia los animales. QUP te invita a formar parte de los voluntarios que participan apoyando a dichas asociaciones en sus múltiples campañas y actividades de rescate, adopción, esterilización, entre otras. Si quieres unirte, por favor contáctanos a través del correo ayuda@quierounperro.com.\n</p>";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:2:"12";}i:1;O:8:"stdClass":6:{s:8:"bannerID";s:2:"24";s:8:"imgbaner";s:89:"banner_superior/_82b8a__36e88_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"1";}i:2;O:8:"stdClass":6:{s:8:"bannerID";s:2:"26";s:8:"imgbaner";s:74:"/_df675__caeff_Captura_de_pantalla_2015-04-23_a_la(s)_09.51_.40__thumb.png";s:5:"texto";s:30:"Ayúdanos a encontrarles hogar";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"1";}i:3;O:8:"stdClass":6:{s:8:"bannerID";s:2:"27";s:8:"imgbaner";s:74:"/_cedc5__b5441_Captura_de_pantalla_2015-04-23_a_la(s)_09.52_.55__thumb.png";s:5:"texto";s:45:"Conoce los cuidados básicos de todo cachorro";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"1";}i:4;O:8:"stdClass":6:{s:8:"bannerID";s:2:"28";s:8:"imgbaner";s:88:"banner_lateral/_64133__b02d5_Captura_de_pantalla_2015-04-23_a_la(s)_09.50_.39__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"4";s:9:"seccionID";s:2:"17";}i:5;O:8:"stdClass":6:{s:8:"bannerID";s:2:"29";s:8:"imgbaner";s:89:"banner_inferior/_b183d__0ef27_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"8";}i:6;O:8:"stdClass":6:{s:8:"bannerID";s:2:"30";s:8:"imgbaner";s:89:"banner_superior/_be15a__86ed0_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"8";}i:7;O:8:"stdClass":6:{s:8:"bannerID";s:2:"31";s:8:"imgbaner";s:89:"banner_superior/_5fbd1__20d7f_Captura_de_pantalla_2015-04-23_a_la(s)_09.47_.21__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"9";}i:8;O:8:"stdClass":6:{s:8:"bannerID";s:2:"32";s:8:"imgbaner";s:89:"banner_inferior/_1b410__3ff85_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"9";}i:9;O:8:"stdClass":6:{s:8:"bannerID";s:2:"33";s:8:"imgbaner";s:0:"";s:5:"texto";s:20:"Perrotón Abril 2015";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"9";}i:10;O:8:"stdClass":6:{s:8:"bannerID";s:2:"34";s:8:"imgbaner";s:89:"banner_superior/_c22c5__6738e_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:2:"15";}i:11;O:8:"stdClass":6:{s:8:"bannerID";s:2:"35";s:8:"imgbaner";s:89:"banner_inferior/_7a044__ffa22_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:2:"15";}i:12;O:8:"stdClass":6:{s:8:"bannerID";s:2:"37";s:8:"imgbaner";s:47:"banner_lateral/_cd363__b1d28_Penguins_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"4";s:9:"seccionID";s:2:"17";}i:13;O:8:"stdClass":6:{s:8:"bannerID";s:2:"40";s:8:"imgbaner";s:46:"banner_inferior/_5e35e__611e1_Desert_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"9";}i:14;O:8:"stdClass":6:{s:8:"bannerID";s:2:"41";s:8:"imgbaner";s:0:"";s:5:"texto";s:4320:"<p> \n\n<p><font class="sub_frecuentes">1.- ¿Cuántos anuncios se pueden publicar por usuario?</font>\n</br>\n- No existe un límite de anuncios para publicar por usuario. Cuando eres un usuario nuevo, tienes derecho a un anuncio de prueba gratis. Una vez utilizado, puedes adquirir la cantidad de anuncios que desees publicar. </p>\n</br>\n<p>\n<font class="sub_frecuentes">2.- ¿Con que medidas de seguridad cuenta el sitio?</font>\n</br>\n- El sitio cuenta con una programación segura, de manera que todos tus datos e información se encuentran encriptados. Las transacciones se realizan directamente con el banco, de esta manera el sitio no tiene acceso a tu información bancaria. Además, está soportado por un dominio HTTPS que garantiza la seguridad del usuario.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">3.- ¿Por qué no puedo ingresar a mi cuenta?</font>\n</br>\na) El usuario y/o la contraseña son incorrectos, puedes utilizar el campo de solicitud de contraseña y ésta te será enviada a la cuenta de correo electrónico que está registrado en tu perfil de usuario. b) Tu cuenta ha sido cancelada debido a que se violaron una o más de las políticas y/o términos y condiciones de uso de QuieroUnPerro.com\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">4.- ¿Por qué mi cuenta de usuario se ha cancelado?</font>\n</br>\nExisten varias  razones por las cuales se cancela una cuenta:\n-	El usuario ha violado una o más de las políticas y/o términos y condiciones de uso de QuieroUnPerro.com\n</br>\n-	El usuario ha publicado anuncios o comentarios que atentan contra la moral, la salud, y las buenas costumbres.\n</br>\n-	El usuario ha publicado información falsa en el sitio o ha intentado hacer transacciones fraudulentas.\n</br>\n-	El usuario ha publicado un anuncio de venta o cruza en las secciones de adopción o perros perdidos debido a que son secciones gratuitas y de servicio a la comunidad.\n</br>\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">5.- ¿Si olvidé mi cuenta, tengo que crear otro usuario?</font>\n</br>\n- No. Para recuperar tu usuario y contraseña solamente necesitas utilizar el campo para recuperar contraseña vía correo electrónico, que está situado en la sección lateral izquierda de la página de inicio en la sección de mi cuenta. \n</p>\n</br>\n<p>\n<font class="sub_frecuentes">6.- ¿Cómo puedo subir las fotos a mi anuncio?</font>\n</br>\n- Una vez que te encuentres en el tercer paso de creación de anuncio, deberás seleccionar el botón “cargar imágenes" y se abrirá una ventana para seleccionar las imágenes de tu computadora. Si las imágenes son de un tamaño superior a 1MB el tiempo de carga puede tardar unos minutos.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">7.- ¿Cómo puedo saber si mi anuncio ya fue publicado?</font>\n</br>\n- Una vez que termines el proceso de creación de anuncio, éste será revisado y aprobado para su publicación en el sitio, a pesar de ya haber sido pagado. Este proceso puede llegar a tardar hasta 12 horas hábiles. Puedes consultar el estatus de tu anuncio en cualquier momento en tu perfil de usuario. Una vez autorizado, éste será publicado en la sección previamente seleccionada y será visible para todos los visitantes del sitio.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes"> 8.-  Ya pasaron 12 horas hábiles y mi anuncio no ha sido publicado, ¿qué sucede? </font>\n</br>\n- Puede ser que el contenido del anuncio atente contra las políticas y términos y condiciones de QuieroUnPerro.com. Si este es el caso, recibirás un correo electrónico donde se te comunique lo sucedido y los pasos a seguir. Si no lo has recibido, por favor envia un correo a contacto@quierounperro.com.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">9.- ¿Cuál es la vigencia de los anuncios en las secciones de publicación?</font>\n</br>\n-La vigencia de los anuncios varía dependiendo del tipo de paquete que se ha contratado, para el caso de los paquetes Lite y Regular es de 30 días, y para los paquetes Premium es de 60 días.\n</p>\n</br>\n<p>\n<font class="sub_frecuentes">10.- ¿Cómo  puedo  anunciar mi marca, producto, servicio o evento en la página?</font>\n</br>\n- Envía un correo a la dirección publicidad@quierounperro.com y llena la información que se solicita. Un representante se pondrá en contacto contigo para mayor información\n</p>";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:2:"15";}i:15;O:8:"stdClass":6:{s:8:"bannerID";s:2:"42";s:8:"imgbaner";s:66:"banner_superior/_476ee__fd208__056f3__2901d_Tulips_thumb_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"1";}i:16;O:8:"stdClass":6:{s:8:"bannerID";s:2:"43";s:8:"imgbaner";s:51:"banner_superior/_86d45__8d6b9_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"6";}i:17;O:8:"stdClass":6:{s:8:"bannerID";s:2:"44";s:8:"imgbaner";s:51:"banner_inferior/_4a312__149a0_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"6";}i:18;O:8:"stdClass":6:{s:8:"bannerID";s:2:"53";s:8:"imgbaner";s:89:"banner_superior/_7cef6__257f6_Captura_de_pantalla_2015-04-23_a_la(s)_09.49_.26__thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:2:"10";}i:19;O:8:"stdClass":6:{s:8:"bannerID";s:2:"54";s:8:"imgbaner";s:0:"";s:5:"texto";s:25:"TEXTO DE APOYO DIRECTORIO";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"4";}i:20;O:8:"stdClass":6:{s:8:"bannerID";s:2:"55";s:8:"imgbaner";s:95:"banner_superior/_876b3__b9f4c_butterflies_and_hurricanes_wallpaper_by_ponylov-d5i8mgw_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"6";}i:21;O:8:"stdClass":6:{s:8:"bannerID";s:2:"56";s:8:"imgbaner";s:41:"banner_superior/_4d55e__b190d_1_thumb.png";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"6";}i:22;O:8:"stdClass":6:{s:8:"bannerID";s:2:"58";s:8:"imgbaner";s:51:"banner_superior/_fb622__2fff3_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:2:"11";}i:23;O:8:"stdClass":6:{s:8:"bannerID";s:2:"61";s:8:"imgbaner";s:51:"banner_superior/_26714__dfe6a_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"7";}i:24;O:8:"stdClass":6:{s:8:"bannerID";s:2:"62";s:8:"imgbaner";s:51:"banner_inferior/_52430__719b0_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"7";}i:25;O:8:"stdClass":6:{s:8:"bannerID";s:2:"65";s:8:"imgbaner";s:60:"banner_superior/_02553__67a3c_WHICH-DOG-WEB-BANNER_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:2:"11";}i:26;O:8:"stdClass":6:{s:8:"bannerID";s:2:"66";s:8:"imgbaner";s:60:"banner_inferior/_970b4__29153_WHICH-DOG-WEB-BANNER_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:2:"11";}i:27;O:8:"stdClass":6:{s:8:"bannerID";s:2:"69";s:8:"imgbaner";s:51:"banner_inferior/_5ebb4__48a24_banner-logo_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:2:"11";}i:28;O:8:"stdClass":6:{s:8:"bannerID";s:2:"73";s:8:"imgbaner";s:0:"";s:5:"texto";s:46:"TEXTO DE APOYO PARA SECCION DE PERROS PERDIDOS";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"7";}i:29;O:8:"stdClass":6:{s:8:"bannerID";s:2:"74";s:8:"imgbaner";s:0:"";s:5:"texto";s:23:"TEXTO DE APOYO ADOPCION";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"6";}i:30;O:8:"stdClass":6:{s:8:"bannerID";s:2:"75";s:8:"imgbaner";s:0:"";s:5:"texto";s:39:"TEXTO DE APOYO ASOCIACIONES PROTECTORES";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:2:"11";}i:31;O:8:"stdClass":6:{s:8:"bannerID";s:2:"76";s:8:"imgbaner";s:0:"";s:5:"texto";s:17:"VENTA VENTA VENTA";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"2";s:9:"seccionID";s:1:"2";}i:32;O:8:"stdClass":6:{s:8:"bannerID";s:2:"77";s:8:"imgbaner";s:50:"banner_superior/_78438__e5b74_dog-banner_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"1";s:9:"seccionID";s:1:"4";}i:33;O:8:"stdClass":6:{s:8:"bannerID";s:2:"78";s:8:"imgbaner";s:52:"banner_inferior/_0a60d__2ea0d_descarga_(1)_thumb.jpg";s:5:"texto";s:0:"";s:6:"zonaID";s:1:"9";s:8:"posicion";s:1:"3";s:9:"seccionID";s:1:"4";}}}'),
('e1fd23745fc83b521cfe1c40d61c47cf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.124 Safari/537.36', 1434729725, ''),
('f205b72d66e34df0476f3ffc3b87aa1c', '66.249.64.153', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1434192642, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `compraID` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioID` int(11) NOT NULL,
  `subtotal` float(10,2) NOT NULL,
  `idCuponAdquirido` int(11) DEFAULT NULL,
  `descuento` int(2) DEFAULT NULL,
  `total` float(10,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `pagado` int(11) DEFAULT '0',
  PRIMARY KEY (`compraID`) USING BTREE,
  KEY `usuarioID` (`usuarioID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=120 ;

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
(48, 3, 0.00, 0, 0, 0.00, '2014-12-15 19:54:05', 1),
(49, 3, 25.00, 0, NULL, 25.00, '2014-12-15 20:30:16', 0),
(50, 3, 0.00, 0, 0, 0.00, '2014-12-28 16:35:00', 1),
(51, 3, 0.00, 0, 0, 0.00, '2014-12-28 16:40:41', 1),
(52, 3, 0.00, 0, 0, 0.00, '2015-03-29 10:46:39', 1),
(53, 3, 0.00, 0, 0, 0.00, '2015-04-06 16:55:43', 1),
(54, 2, 0.00, 0, 0, 0.00, '2015-04-23 10:47:08', 1),
(55, 21, 0.00, 0, 0, 0.00, '2015-04-23 20:01:55', 1),
(56, 3, 0.00, 0, 0, 0.00, '2015-04-26 15:09:05', 1),
(57, 3, 0.00, 0, 0, 0.00, '2015-04-26 15:10:28', 1),
(58, 24, 0.00, 0, 0, 0.00, '2015-04-26 15:15:24', 1),
(59, 24, 0.00, 0, 0, 0.00, '2015-04-26 15:22:52', 1),
(60, 3, 0.00, 0, 0, 0.00, '2015-04-26 15:56:48', 1),
(61, 3, 0.00, 0, 0, 0.00, '2015-04-26 16:00:17', 1),
(62, 24, 69.00, 0, 0, 69.00, '2015-04-26 16:38:31', 0),
(63, 24, 100.00, 0, 0, 100.00, '2015-04-26 16:58:12', 1),
(64, 3, 69.00, 0, 0, 69.00, '2015-04-26 17:22:54', 0),
(65, 24, 166.00, 0, 0, 166.00, '2015-04-26 17:36:11', 1),
(66, 3, 69.00, 0, 0, 69.00, '2015-04-26 17:44:04', 0),
(67, 3, 69.00, 0, 0, 69.00, '2015-04-26 17:48:28', 0),
(68, 3, 69.00, 0, 0, 69.00, '2015-04-26 17:50:12', 0),
(69, 3, 100.00, 0, 0, 100.00, '2015-04-26 18:29:09', 0),
(70, 26, 69.00, 0, 0, 0.00, '2015-05-07 22:01:01', 1),
(71, 26, 100.00, 0, 0, 100.00, '2015-05-07 22:15:59', 1),
(72, 3, 70.00, NULL, 0, 70.00, '2015-05-07 23:41:42', 0),
(76, 27, 0.00, 0, NULL, 0.00, '2015-05-12 16:35:24', 1),
(77, 28, 50.00, 0, NULL, 50.00, '2015-05-12 16:42:06', 1),
(78, 27, 0.00, 0, NULL, 0.00, '2015-05-12 16:48:52', 1),
(79, 3, 100.00, NULL, 0, 100.00, '2015-05-12 20:23:26', 0),
(80, 3, 166.00, 0, 0, 166.00, '2015-05-24 13:19:42', 0),
(81, 3, 166.00, 0, 0, 166.00, '2015-05-24 15:03:47', 1),
(82, 3, 245.00, NULL, NULL, 245.00, '2015-05-24 15:41:05', 0),
(83, 3, 245.00, NULL, 0, 245.00, '2015-05-24 16:13:16', 0),
(84, 3, 350.00, NULL, NULL, 350.00, '2015-05-24 16:23:10', 0),
(85, 27, 700.00, NULL, NULL, 700.00, '2015-05-24 16:25:09', 0),
(86, 3, 350.00, NULL, 0, 350.00, '2015-05-24 16:25:13', 0),
(87, 27, 350.00, NULL, 0, 350.00, '2015-05-24 16:34:23', 0),
(88, 3, 350.00, NULL, NULL, 350.00, '2015-05-24 16:44:51', 0),
(89, 3, 999.99, NULL, NULL, 999.99, '2015-05-25 18:17:09', 0),
(90, 3, 350.00, NULL, NULL, 350.00, '2015-05-25 18:18:43', 0),
(91, 22, 75.00, 0, NULL, 75.00, '2015-05-25 23:44:30', 0),
(92, 3, 100.00, NULL, NULL, 100.00, '2015-05-26 17:39:35', 0),
(93, 3, 100.00, NULL, NULL, 100.00, '2015-05-26 17:46:28', 0),
(94, 3, 100.00, NULL, NULL, 100.00, '2015-05-26 17:53:29', 0),
(96, 3, 200.00, NULL, NULL, 200.00, '2015-05-26 18:05:20', 0),
(97, 3, 100.00, NULL, 0, 100.00, '2015-05-26 18:08:11', 0),
(98, 3, 100.00, NULL, 0, 100.00, '2015-05-26 18:14:13', 0),
(99, 3, 100.00, NULL, NULL, 100.00, '2015-05-27 17:56:18', 0),
(100, 3, 100.00, NULL, NULL, 100.00, '2015-05-27 18:08:31', 0),
(101, 3, 100.00, NULL, NULL, 100.00, '2015-05-27 18:14:08', 0),
(102, 3, 100.00, NULL, NULL, 100.00, '2015-05-27 18:20:40', 0),
(104, 29, 700.00, NULL, NULL, 700.00, '2015-05-28 20:10:51', 0),
(105, 29, 89.00, 0, 0, 0.00, '2015-05-28 20:19:57', 1),
(106, 29, 89.00, 0, 0, 89.00, '2015-05-28 20:22:25', 0),
(107, 3, 100.00, 0, 0, 100.00, '2015-06-08 20:56:43', 0),
(108, 3, 166.00, 0, 0, 166.00, '2015-06-08 20:58:27', 0),
(109, 3, 100.00, 0, 0, 100.00, '2015-06-09 19:53:55', 0),
(110, 3, 100.00, 0, 0, 100.00, '2015-06-09 23:28:46', 0),
(111, 3, 89.00, 0, 0, 89.00, '2015-06-09 23:32:16', 0),
(112, 3, 100.00, 0, 0, 100.00, '2015-06-09 23:41:27', 0),
(113, 30, 89.00, 0, 0, 0.00, '2015-06-10 00:17:05', 1),
(114, 30, 89.00, 0, 0, 89.00, '2015-06-10 00:28:08', 0),
(115, 3, 166.00, 0, 0, 166.00, '2015-06-10 21:59:20', 0),
(116, 3, 166.00, 0, 0, 166.00, '2015-06-10 23:13:28', 0),
(117, 31, 89.00, 0, 0, 0.00, '2015-06-11 19:48:21', 1),
(118, 32, 89.00, 0, 0, 0.00, '2015-06-11 20:06:47', 1),
(119, 3, 999.99, NULL, NULL, 999.99, '2015-06-22 17:17:54', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compradetalle`
--

CREATE TABLE IF NOT EXISTS `compradetalle` (
  `compraDetalleID` int(11) NOT NULL AUTO_INCREMENT,
  `compraID` int(11) NOT NULL,
  `productoID` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float(5,2) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `talla` varchar(120) NOT NULL,
  `color` varchar(120) NOT NULL,
  PRIMARY KEY (`compraDetalleID`) USING BTREE,
  KEY `compraID` (`compraID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096 AUTO_INCREMENT=88 ;

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
(24, 48, 19, 1, 0.00, 'Lite', '', ''),
(25, 50, 21, 1, 0.00, 'Lite', '', ''),
(26, 51, 22, 1, 0.00, 'Lite', '', ''),
(27, 52, 1, 1, 0.00, 'Lite', '', ''),
(28, 53, 2, 1, 0.00, 'Lite', '', ''),
(29, 54, 3, 1, 0.00, 'Lite', '', ''),
(30, 55, 4, 1, 0.00, 'Lite', '', ''),
(31, 56, 5, 1, 0.00, 'Lite', '', ''),
(32, 57, 6, 1, 0.00, 'Lite', '', ''),
(33, 58, 7, 1, 0.00, 'Lite', '', ''),
(34, 59, 8, 1, 0.00, 'Lite', '', ''),
(35, 60, 9, 1, 0.00, 'Lite', '', ''),
(36, 61, 10, 1, 0.00, 'Lite', '', ''),
(37, 62, 11, 1, 69.00, 'Lite', '', ''),
(38, 63, 12, 1, 100.00, 'Regular', '', ''),
(39, 64, 13, 1, 69.00, 'Lite', '', ''),
(40, 65, 14, 1, 166.00, 'Premium', '', ''),
(41, 66, 15, 1, 69.00, 'Lite', '', ''),
(42, 67, 16, 1, 69.00, 'Lite', '', ''),
(43, 68, 17, 1, 69.00, 'Lite', '', ''),
(44, 69, 18, 1, 100.00, 'Regular', '', ''),
(45, 70, 19, 1, 69.00, 'Lite', '', ''),
(46, 71, 20, 1, 100.00, 'Regular', '', ''),
(47, 72, 1, 1, 70.00, 'AGUA PARA PERRO', 'Unitalla', 'ROJO'),
(48, 79, 6, 1, 100.00, 'DISFRAZ PARA PERRO', 'Mediana', 'AZUL'),
(49, 80, 27, 1, 166.00, 'Premium', '', ''),
(50, 81, 28, 1, 166.00, 'Premium', '', ''),
(51, 82, 7, 1, 245.00, 'CORREA', 'Unitalla', 'AZUL'),
(52, 83, 7, 1, 245.00, 'CORREA', 'Unitalla', 'MORADA'),
(53, 84, 5, 1, 350.00, 'Alimento Light', 'Grande', 'N/A'),
(54, 86, 5, 1, 350.00, 'Alimento Light', 'Grande', 'N/A'),
(55, 85, 5, 2, 350.00, 'Alimento Light', 'Grande', 'N/A'),
(56, 87, 5, 1, 350.00, 'Alimento Light', 'Grande', 'N/A'),
(57, 88, 5, 1, 350.00, 'Alimento Light', 'Grande', 'N/A'),
(58, 89, 5, 3, 350.00, 'Alimento Light', 'Grande', 'N/A'),
(59, 90, 5, 1, 350.00, 'Alimento Light', 'Grande', 'N/A'),
(60, 92, 9, 1, 100.00, 'BOLSA DE VIAJE', 'Chica', 'AZUL'),
(61, 93, 9, 1, 100.00, 'BOLSA DE VIAJE', 'Mediana', 'AZUL'),
(62, 94, 9, 1, 100.00, 'BOLSA DE VIAJE', 'Chica', 'AZUL'),
(64, 96, 9, 2, 100.00, 'BOLSA DE VIAJE', 'Chica', 'AZUL'),
(65, 97, 9, 1, 100.00, 'BOLSA DE VIAJE', 'Mediana', 'AZUL'),
(66, 98, 9, 1, 100.00, 'BOLSA DE VIAJE', 'Chica', 'AZUL'),
(67, 99, 9, 1, 100.00, 'BOLSA DE VIAJE', 'Chica', 'AZUL'),
(68, 100, 9, 1, 100.00, 'BOLSA DE VIAJE', 'Mediana', 'AZUL'),
(69, 101, 9, 1, 100.00, 'BOLSA DE VIAJE', 'Mediana', 'AZUL'),
(70, 102, 9, 1, 100.00, 'BOLSA DE VIAJE', 'Mediana', 'AZUL'),
(72, 104, 5, 2, 350.00, 'Alimento Light', 'Grande', 'N/A'),
(73, 105, 30, 1, 89.00, 'Lite', '', ''),
(74, 106, 31, 1, 89.00, 'Lite', '', ''),
(75, 107, 32, 1, 100.00, 'Regular', '', ''),
(76, 108, 33, 1, 166.00, 'Premium', '', ''),
(77, 109, 34, 1, 100.00, 'Regular', '', ''),
(78, 110, 35, 1, 100.00, 'Regular', '', ''),
(79, 111, 36, 1, 89.00, 'Lite', '', ''),
(80, 112, 37, 1, 100.00, 'Regular', '', ''),
(81, 113, 38, 1, 89.00, 'Lite', '', ''),
(82, 114, 39, 1, 89.00, 'Lite', '', ''),
(83, 115, 40, 1, 166.00, 'Premium', '', ''),
(84, 116, 41, 1, 166.00, 'Premium', '', ''),
(85, 117, 42, 1, 89.00, 'Lite', '', ''),
(86, 118, 43, 1, 89.00, 'Lite', '', ''),
(87, 119, 5, 3, 350.00, 'Alimento Light', 'Grande', 'N/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contadormensajes`
--

CREATE TABLE IF NOT EXISTS `contadormensajes` (
  `contadorID` int(11) NOT NULL AUTO_INCREMENT,
  `cantMensajes` char(20) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`contadorID`) USING BTREE,
  KEY `tiene` (`idUsuario`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE IF NOT EXISTS `contenido` (
  `contenidoID` int(11) NOT NULL AUTO_INCREMENT,
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
  `domicilio` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`contenidoID`) USING BTREE,
  KEY `seccion` (`seccionID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1365 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`contenidoID`, `seccionID`, `seccionDetalle`, `texto`, `fecha`, `zonaID`, `nombre`, `mes`, `origenes`, `caracter`, `cualidades`, `colores`, `acercaDe`, `horario`, `lugar`, `domicilio`) VALUES
(2, 8, 'Raza del mes', '', '2015-04-23', 9, 'Chihuahua', 'Febrero', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México     ', NULL, NULL, NULL),
(3, 8, 'Raza del mes', '', '2015-04-23', 9, 'Mastil', 'Marzo', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México  ', NULL, NULL, NULL),
(4, 8, 'Raza del mes', '', '2015-04-23', 9, 'Maltes', 'Abril', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México', 'El chihuahueño o chihuahua es una raza de perro originaria de México  ', NULL, NULL, NULL),
(5, 9, 'Evento del mes', 'SE CANCELA PROXIMO PERROTON PURINA DEBIDO A LAS FUERTES LLUVIAS. TE MANTENDREMOS INFORMADO.', '10-OCT', 9, 'PERROTON PURINA DOG CHOW 2015', NULL, NULL, NULL, NULL, NULL, NULL, '10:00 am', 'Metepec', ' oficina de la Octava Regiduría del Ayuntamiento de Metepec'),
(6, 10, 'Dato Curioso', 'SABIAS QUE SABIAS QUE \n\n1.- Los perros hacen caca en alineación con el campo magnético de la Tierra.\n\n2.- El sentido del olfato de un perro es 10.000 veces más fuerte que el de los seres humanos.\n\n3.- Paul McCartney grabó un silbato ultrasónico audible sólo para los perros, en el final de “Un día en la vida”.\n\n4.- Los seres humanos y los perros son las únicas dos especies conocidas por buscar señales visuales en los ojos del otro. Y los perros sólo lo hacen con los seres humanos.\n\n5.- Los primeros perros clonados, seis labradores canadienses, comenzaron a trabajar para el servicio de aduanas de Corea del Sur como olfateadores, en 2009.\n\n6.- El perro más viejo del mundo murió a los 29 años.\n\n7.- El ADN mitocondrial de cada perro es un 99,9% igual que el de un lobo gris.\n\n8.- Los perros tienen 13 tipos de sangre, mientras que los seres humanos sólo tenemos 4.\n\n9.- Los perros y gatos sólo pueden sudar a través de las almohadillas de las patas y la nariz.\n\n10.- Los nazis trataron de enseñar a los perros a hablar y leer.', '0', 9, 'SABIAS QUE??', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 10, 'Dato Curioso', 'Los perros son un estuche de monerías, desempeñan muchos papeles ante la sociedad, pero la más importante es la amistad que éstos nos brindan, hay muchas cosas que no sabemos de los perros, en ésta publicación te decimos detalles sorprendentes de nuestros amigos peludos, cosas que no sabias y que estás a punto de descubrir.\n\n1. Sabias que los perros solo pueden sudar por los cojinetes de las patas y se refrescan  lamiendo su nariz? esto es porque carecen de glándulas sudoriparas en casi todo el cuerpo,  la mayoría de éstas glándulas se encuentran solo en los cojinetes de sus patas, así que solo pueden sudar por ahi.\n\n2. Los perros tiene el sentido del oído tan desarrollado que pueden escuchar  sonidos desde una distancia de 225  hasta 230 metros.\n\n3. Un perro cachorro pasa el 10 % del día alimentandose y jugando,  el 90% restante lo utiliza para dormir, existen investigaciones que hablan de que mientras duerme, sueña que come y juega.\n\n4. Louis Doberman creó la raza que lleva su nombre para defenderse de las personas durante su trabajo, ya que era recaudador de impuestos y era objeto de agresiones verbales y físicas.\n\n5. Sabias que la especie canina es única en el mundo por tener el record de mayor razas registradas a diferencia de cualquier otro ser vivo?\n\n6. En E.U.A existe una estación de radio solo para perros, creada con la finalidad de entretener a perros que pasan muchas horas solos en casa, porque sus dueños trabajan, evitando que hagan destrozos en la misma.\n\n7. Estudios han comprobado que los humanos comparten un 75% de nuestro código Humano con los perros colocandose en el 2do. lugar en compatibilidad, el 1er. lugar lo tiene el cerdo que tiene mas del 90% de compatibilidad con el ser humano.\n\n8. La raza de perro más pequeña que existe es el Chihuahueño, la más grande es el Gran Danés, la más pesada es el San Bernardo y la más rápida es el Galgo.\n\n9. Sabias que las perras pueden parir hasta 19 cachorro? El parto con más cachorros que ha existido en la humanidad fue registrado con 23 cachorros en 1944.\n\n10. Los perros aprenden de acuerdo a la experiencia, se ha demostrado que los perros tienen una capacidad de aprendizaje equivalente a un niño de 2 años.', '0', 9, 'DATOS INTERESANTES PERROS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 10, 'Dato Curioso', 'El gran danés, dogo alemán o alano alemán es una raza canina conocida por su gran tamaño y personalidad delicada, considerado como el «Apolo entre todas las razas» por la Federación Cinológica Internacional. También se considera que desciende del Bullenbeisser con mezcla de sangre 50/50 y es parte del grupo Generación Bullenbeisser.\n\nEl Gran danés, aun siendo una raza gigante, no suele ser torpe en su andar y movimientos. Su carácter suele ser amistoso y nunca tímido. Los machos deben ser de constitución más fuerte que las hembras.\n\nSu constitución es fuerte y musculosa; no es ni ligera ni doble. La forma de los machos es cuadrada; es tan alto como largo. A las hembras se les "permite" ser ligeramente más largas que altas. La distancia de la cruz a los hombros es igual que de los hombros al suelo.\n\nLa ficción ha hecho que sea uno de los perros más conocidos para el público general. El personaje Scooby Doo es un gran danés.\n\nNo es un perro para novatos, requiere mucho cuidado pues, de igual forma que otras razas gigantes, es propenso a la torsión gástrica por lo que debe caminar a diario pero no hacer sobre esfuerzos ni someterse a cambios bruscos de temperatura. Los costos de mantenimiento son muy altos y hay que tenerlo presente antes de adquirir uno.', '0', 9, 'Gran Danés', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 10, 'Dato Curioso', 'Boo the dog belongs to a San Francisco-based Facebook employee who created a Facebook page for the dog with a statement "My name is Boo. I am a dog. Life is good." He became popular in October 2010 after singer Ke$ha sent a tweet that she had a new boyfriend, linking to the page, and Khloé Kardashian called him the "cutest dog on the planet".[1][2]\n\nChronicle Books, noticing that Boo had 5 million Facebook fans at the time, approached the owner to write a picture book. In August 2011, Boo: The Life of the World''s Cutest Dog, written by his owner under pen name J.H. Lee, was published. The book was eventually published in ten languages. A second book followed, Boo: Little Dog in the Big City, as well as a calendar and plans for a cut-out book and additional children''s books. He also has his own stuffed animal for kids.[1] His merchandise includes a Gund stuffed animal.\n\nBoo was appointed a spokesdog for Virgin America airline, which featured photos of him in an airplane along with advice for people traveling with pets.[1] In April 2012, Boo was the subject of a death hoax after #RIPBOO appeared on Facebook. Tweets followed as Gizmodo writer Sam Biddle tweeted Boo had died. It was later confirmed by The Chronicle Book staff that Boo was alive and well.[3] In July 2012, Boo was named the Official Pet Liaison of Virgin America.[4]\n\nMike Isaac of All Things Digital outed Boo''s owner as Irene Ahn, a Facebook employee, in August 2012.', '0', 9, 'BOO THE DOG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 8, 'Raza del mes', '', '2015-04-23', 9, 'BOO', 'Enero', 'dbfklan', 'bkdfna', 'adafa', 'adfadf', 'fadfda', NULL, NULL, NULL),
(11, 9, 'Evento del mes', 'TE ESPERAMOS', '25-JUL', 9, 'EXPO CANINA', NULL, NULL, NULL, NULL, NULL, NULL, '9:00 am', 'QUERETARO', 'QUERETARO'),
(12, 9, 'Evento del mes', 'Prueba', 'ABR 10', 9, 'Evento de prueba', NULL, NULL, NULL, NULL, NULL, NULL, '10:00 am', 'Estadio', 'Falso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupon`
--

CREATE TABLE IF NOT EXISTS `cupon` (
  `cuponID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCupon` varchar(45) NOT NULL,
  `paqueteID` int(11) DEFAULT NULL,
  PRIMARY KEY (`cuponID`) USING BTREE,
  KEY `paqueteID` (`paqueteID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuponadquirido`
--

CREATE TABLE IF NOT EXISTS `cuponadquirido` (
  `idCuponAdquirido` int(11) NOT NULL AUTO_INCREMENT,
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
  `cuponID` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCuponAdquirido`,`servicioID`,`detalleID`,`paqueteID`) USING BTREE,
  KEY `detalleCuponPaquete` (`servicioID`,`detalleID`,`paqueteID`) USING BTREE,
  KEY `historicoCupon` (`cuponDetalleID`,`cuponID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=528 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `cuponadquirido`
--

INSERT INTO `cuponadquirido` (`idCuponAdquirido`, `descripcion`, `valor`, `vigencia`, `tipoCupon`, `vigente`, `usado`, `servicioID`, `detalleID`, `paqueteID`, `cuponDetalleID`, `cuponID`) VALUES
(1, 'cuponTienda', '10', '2015-05-26', 1, 1, 0, 12, 2, 2, 76, 60),
(2, 'cuponPaquete', '80', '2015-05-26', 2, 1, 0, 12, 2, 2, 77, 61),
(3, 'AAAAA', '10', '2015-05-26', 3, 1, 0, 14, 3, 3, 78, 62),
(4, 'cuponTienda', '10', '2015-05-26', 1, 1, 0, 18, 2, 2, 76, 60),
(5, 'cuponPaquete', '80', '2015-05-26', 2, 1, 0, 18, 2, 2, 77, 61),
(6, 'cuponTienda', '10', '2015-06-06', 1, 1, 0, 20, 2, 2, 81, 65),
(7, 'cuponPaquete', '80', '2015-06-06', 2, 1, 0, 20, 2, 2, 82, 66);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupondetalle`
--

CREATE TABLE IF NOT EXISTS `cupondetalle` (
  `cuponDetalleID` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `vigencia` int(2) NOT NULL,
  `tipoCupon` int(1) NOT NULL,
  `cuponID` int(11) NOT NULL,
  PRIMARY KEY (`cuponDetalleID`,`cuponID`) USING BTREE,
  KEY `detalleCupon` (`cuponID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinoenvio`
--

CREATE TABLE IF NOT EXISTS `destinoenvio` (
  `destinoID` int(11) NOT NULL AUTO_INCREMENT,
  `grupoID` int(11) NOT NULL,
  `estadoID` int(11) NOT NULL,
  PRIMARY KEY (`destinoID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='agrupacion de estados segun costo de envio' AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `destinoenvio`
--

INSERT INTO `destinoenvio` (`destinoID`, `grupoID`, `estadoID`) VALUES
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
(16, 10, 13),
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
(38, 1, 33),
(39, 1, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepaquete`
--

CREATE TABLE IF NOT EXISTS `detallepaquete` (
  `detalleID` int(11) NOT NULL AUTO_INCREMENT,
  `cantFotos` int(11) NOT NULL,
  `caracteres` int(11) NOT NULL,
  `vigencia` int(2) NOT NULL,
  `cupones` int(2) NOT NULL,
  `videos` int(2) NOT NULL,
  `precio` float(5,2) NOT NULL,
  `paqueteID` int(3) NOT NULL,
  `tipoPaquete` int(11) NOT NULL DEFAULT '1' COMMENT 'Elemento que identifica el tipo de paquete',
  PRIMARY KEY (`detalleID`,`paqueteID`) USING BTREE,
  KEY `detallePaquete` (`paqueteID`) USING BTREE,
  KEY `fk_tipoPaquete_paquete_idx` (`tipoPaquete`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `detallepaquete`
--

INSERT INTO `detallepaquete` (`detalleID`, `cantFotos`, `caracteres`, `vigencia`, `cupones`, `videos`, `precio`, `paqueteID`, `tipoPaquete`) VALUES
(1, 2, 40, 30, 0, 0, 89.00, 1, 1),
(2, 2, 300, 15, 1, 2, 100.00, 2, 2),
(3, 3, 1000, 60, 3, 2, 166.00, 3, 3),
(4, 0, 1000, 1825, 0, 0, 0.00, 4, 4),
(5, 0, 100, 30, 0, 0, 25.00, 5, 5),
(6, 0, 200, 60, 0, 0, 50.00, 6, 5),
(7, 0, 300, 90, 0, 0, 75.00, 7, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccionenvio`
--

CREATE TABLE IF NOT EXISTS `direccionenvio` (
  `direccionID` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `calle` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `colonia` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estadoID` int(11) DEFAULT NULL,
  `paisID` int(11) DEFAULT '146',
  PRIMARY KEY (`direccionID`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci PACK_KEYS=0 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `direccionenvio`
--

INSERT INTO `direccionenvio` (`direccionID`, `idUsuario`, `nombre`, `apellido`, `cp`, `calle`, `colonia`, `numero`, `ciudad`, `estadoID`, `paisID`) VALUES
(1, 3, 'martha', 'hdez', 76000, 'Ozono', 'Universo', '55', 'QRO', 5, 146),
(2, 29, 'REMIGIO', 'AMIEVA', 76000, 'Falsa', 'Falsedades', '123', 'Querétaro', 22, 146);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `estadoID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEstado` varchar(30) NOT NULL,
  PRIMARY KEY (`estadoID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=496 AUTO_INCREMENT=34 ;

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
  `idUsuario` int(11) DEFAULT NULL,
  KEY `favoritos` (`idUsuario`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`publicacionID`, `idUsuario`) VALUES
(14, 3),
(15, 25),
(27, 3),
(2, 3),
(4, 3),
(30, 3),
(42, 31),
(43, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotoscontenido`
--

CREATE TABLE IF NOT EXISTS `fotoscontenido` (
  `fotoID` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(120) NOT NULL,
  `contenidoID` int(11) NOT NULL,
  PRIMARY KEY (`fotoID`) USING BTREE,
  KEY `productoID_new` (`contenidoID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=819 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `fotoscontenido`
--

INSERT INTO `fotoscontenido` (`fotoID`, `foto`, `contenidoID`) VALUES
(23, 'Captura_de_pantalla_2015-04-23_a_la(s)_10.03_.03_.png', 10),
(24, 'Captura_de_pantalla_2015-04-23_a_la(s)_10.02_.48_.png', 2),
(25, 'Captura_de_pantalla_2015-04-23_a_la(s)_09.58_.51_1.png', 3),
(26, 'Captura_de_pantalla_2015-04-23_a_la(s)_10.06_.39_.png', 4),
(29, 'Captura_de_pantalla_2015-04-23_a_la(s)_10.14_.04_.png', 11),
(31, 'media.png', 12),
(34, 'gran-danes.jpg', 8),
(35, 'Captura_de_pantalla_2015-04-23_a_la(s)_10.03_.03_1.png', 9),
(36, 'Captura_de_pantalla_2015-04-23_a_la(s)_10.12_.08_.png', 5),
(37, 'Labrador_Negro.jpg', 6),
(38, 'chihuahua34.jpg', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotospublicacion`
--

CREATE TABLE IF NOT EXISTS `fotospublicacion` (
  `fotoID` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(180) NOT NULL,
  `publicacionID` int(11) NOT NULL,
  `servicioID` int(11) NOT NULL,
  `detalleID` int(11) NOT NULL,
  `paqueteID` int(3) NOT NULL,
  PRIMARY KEY (`fotoID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=16384 AUTO_INCREMENT=63 ;

--
-- Volcado de datos para la tabla `fotospublicacion`
--

INSERT INTO `fotospublicacion` (`fotoID`, `foto`, `publicacionID`, `servicioID`, `detalleID`, `paqueteID`) VALUES
(1, 'images/anuncios/b90e11b0-8f8f-4af4-a87d-4924a26b4279.JPG', 1, 1, 1, 1),
(2, 'images/anuncios/8a48420f-0054-453d-859a-d8240ee88561.jpg', 2, 2, 1, 1),
(3, 'images/anuncios/eede3f33-6f7e-4afb-b07f-a56f7122bfba.jpg', 3, 3, 1, 1),
(4, 'images/anuncios/3789484a-18c7-4df4-8e48-649174b499a8.png', 4, 4, 1, 1),
(5, 'images/anuncios/454e45a8-ad89-48d8-aba7-289c73f0236b.png', 5, 5, 1, 1),
(6, 'images/anuncios/06187ead-2fd3-40c3-b062-577e45fd6845.png', 6, 6, 1, 1),
(7, 'images/anuncios/3832f822-9fa3-4861-afc4-9b094bc6fc5e.png', 7, 7, 1, 1),
(8, 'images/anuncios/7dfcb5c4-8ed6-4481-ac8e-7c8fe4b9dda6.png', 8, 8, 1, 1),
(9, 'images/anuncios/e61ca286-613c-49c8-a31c-d11946c0bcff.png', 11, 11, 1, 1),
(10, 'images/anuncios/75905b1d-49eb-4aa0-b804-e49f34870796.png', 12, 12, 2, 2),
(11, 'images/anuncios/cbedef91-04ca-426b-9baa-04a01486542d.jpg', 12, 12, 2, 2),
(12, 'images/anuncios/509d9e92-f0eb-44b5-8782-dd118b3af499.jpg', 14, 14, 3, 3),
(13, 'images/anuncios/c868f79b-3b6b-4a9e-8daf-621f3d08d844.jpg', 14, 14, 3, 3),
(14, 'images/anuncios/3b916c25-695b-4de4-8308-b510dd168f09.jpg', 14, 14, 3, 3),
(15, 'images/anuncios/39c44e60-4c3b-410c-a605-a7ad09dd34c1.png', 19, 19, 1, 1),
(16, 'images/anuncios/bdb772c3-d589-4b8c-93a6-4b68c878da4b.png', 20, 20, 2, 2),
(17, 'images/anuncios/606d6218-a193-4ca1-8377-5a07c9b1d8f8.png', 20, 20, 2, 2),
(21, 'images/negocio_logo/351b931b-9af1-455e-9746-3d86517ffc46.jpg', 24, 24, 4, 4),
(22, 'images/negocio_logo/abb751ee-58ae-4984-9caf-202c60095ec5.jpg', 25, 25, 6, 6),
(23, 'images/negocio_logo/139e62d5-7294-471d-ab7a-c79286afae17.jpg', 26, 26, 4, 4),
(24, 'images/anuncios/9b2dc534-8010-4a29-a2d2-3eb9d3692e88.jpg', 27, 27, 3, 3),
(25, 'images/anuncios/d1ac9399-cc25-4373-88fa-b350f1e24135.jpg', 27, 27, 3, 3),
(26, 'images/anuncios/3a32482b-d1de-4c95-bb05-8c1186079adf.jpg', 27, 27, 3, 3),
(27, 'images/anuncios/c2e90f6a-f45f-43a1-9955-beecc13c28f0.jpg', 28, 28, 3, 3),
(28, 'images/anuncios/326d6c63-b5d4-432b-8756-5c36161d37e7.jpg', 28, 28, 3, 3),
(29, 'images/anuncios/1de49f4d-bbab-4193-b0b5-8921b873ba97.jpg', 28, 28, 3, 3),
(30, 'images/negocio_logo/c61e2de9-c331-48ce-8ead-546ab0c443a7.png', 29, 29, 7, 7),
(31, 'images/anuncios/69f612b0-0637-4c2f-8481-db99c046796e.jpg', 30, 30, 1, 1),
(32, 'images/anuncios/783152df-3b5e-426d-80dc-5e874ec213b7.jpg', 30, 30, 1, 1),
(33, 'images/anuncios/72a36691-2fd9-439c-b545-13c7f13eb14d.jpg', 30, 30, 1, 1),
(34, 'images/anuncios/debb97ee-5ec0-4f78-ba6d-61bd706b5452.jpg', 31, 31, 1, 1),
(35, 'images/anuncios/6a70c601-99e4-4b8d-a4cc-19459287379c.jpg', 32, 32, 2, 2),
(36, 'images/anuncios/3c011301-4f00-46a6-b4dd-28af1563945c.jpg', 32, 32, 2, 2),
(37, 'images/anuncios/3c7ff37c-7ccb-4b03-8ebf-c06653e85a05.jpg', 33, 33, 3, 3),
(38, 'images/anuncios/4885709d-0f6c-4d84-af0a-2b0f78e48b95.jpg', 33, 33, 3, 3),
(39, 'images/anuncios/7c379cce-2a95-4df7-85d9-30d0a5947a1d.jpg', 33, 33, 3, 3),
(40, 'images/anuncios/afe0eb04-7686-478f-85cf-d5c2bbb2ddb2.jpg', 34, 34, 2, 2),
(41, 'images/anuncios/a1d88667-981e-42f5-80a8-b30549315b1d.jpg', 34, 34, 2, 2),
(42, 'images/anuncios/6d0c847f-6ed0-4ecc-80c3-6b07df48c3f8.jpg', 35, 35, 2, 2),
(43, 'images/anuncios/ee0730d2-16af-4bb5-bdff-f9245ab8e135.jpg', 35, 35, 2, 2),
(44, 'images/anuncios/0bd1da64-ba9a-4dfd-98f8-b3a29a104c77.jpg', 36, 36, 1, 1),
(45, 'images/anuncios/c773fc1b-2a19-4b1a-b950-db5db8d8fdc4.jpg', 36, 36, 1, 1),
(46, 'images/anuncios/7aa6af59-ac12-4925-8c52-6ed0c171447a.jpg', 36, 36, 1, 1),
(47, 'images/anuncios/b00a1638-0e89-4879-bada-fc8eff486c02.jpg', 37, 37, 2, 2),
(48, 'images/anuncios/35d1174d-3f1c-430c-9d46-7d6d58f3f330.jpg', 37, 37, 2, 2),
(49, 'images/anuncios/7fca74d6-d434-473f-871e-5d8b1d7af002.jpg', 38, 38, 1, 1),
(50, 'images/anuncios/9e8db4de-4131-4458-9d43-2bd896951383.jpg', 38, 38, 1, 1),
(51, 'images/anuncios/cec7f781-a7c8-486c-bcee-a4ffd1e3b177.jpg', 38, 38, 1, 1),
(52, 'images/anuncios/82359618-8846-436e-bf80-a5f31e3e832a.jpg', 39, 39, 1, 1),
(53, 'images/anuncios/a3374509-9acd-4701-b65a-0a8579c31db1.jpg', 39, 39, 1, 1),
(54, 'images/anuncios/c903b406-3fad-4e15-b349-1ea2dd9f3f88.jpg', 39, 39, 1, 1),
(55, 'images/anuncios/412b4118-011b-40f6-b6ac-b6fc8f19ba4c.jpg', 40, 40, 3, 3),
(56, 'images/anuncios/84665bbd-d175-4ff7-a318-2de5d0c9fa6d.jpg', 40, 40, 3, 3),
(57, 'images/anuncios/ea00f880-e225-4b6d-b248-af4c31c0b94a.jpg', 41, 41, 3, 3),
(58, 'images/anuncios/c720351e-e376-4215-a667-24d93017f9b1.jpg', 41, 41, 3, 3),
(59, 'images/anuncios/bb1d6aa0-db5b-4e67-8384-528ea7b8ec25.jpg', 42, 42, 1, 1),
(60, 'images/anuncios/1e3a1f7f-98bc-4b99-a5e1-fb5dcc5250b0.jpg', 42, 42, 1, 1),
(61, 'images/anuncios/9fe126cf-1d11-4300-8ce6-62c357f23043.jpg', 43, 43, 1, 1),
(62, 'images/anuncios/3ad5be59-69dd-49f8-83af-4fdaa6a84d75.jpg', 43, 43, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotostienda`
--

CREATE TABLE IF NOT EXISTS `fotostienda` (
  `fotoID` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(120) NOT NULL,
  `productoID` int(11) NOT NULL,
  PRIMARY KEY (`fotoID`) USING BTREE,
  KEY `productoID` (`productoID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=819 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `fotostienda`
--

INSERT INTO `fotostienda` (`fotoID`, `foto`, `productoID`) VALUES
(19, 'adulto1_large1.png', 5),
(20, 'descarga1.jpg', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giro`
--

CREATE TABLE IF NOT EXISTS `giro` (
  `giroID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Se definen de acuerdo al formulario de registro para empresa en index_view',
  `nombreGiro` varchar(100) NOT NULL,
  `logo` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`giroID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1365 AUTO_INCREMENT=13 ;

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
  `giroEmpresaID` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuarioDetalle` int(11) NOT NULL,
  `giroID` int(11) NOT NULL,
  PRIMARY KEY (`giroEmpresaID`) USING BTREE,
  KEY `idUsuarioDetalle` (`idUsuarioDetalle`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupoenvio`
--

CREATE TABLE IF NOT EXISTS `grupoenvio` (
  `grupoID` int(11) NOT NULL,
  `costo` double NOT NULL,
  PRIMARY KEY (`grupoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Division de grupos para cobro de envio';

--
-- Volcado de datos para la tabla `grupoenvio`
--

INSERT INTO `grupoenvio` (`grupoID`, `costo`) VALUES
(1, 1000),
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
  `mensajeID` int(11) NOT NULL AUTO_INCREMENT,
  `asunto` varchar(80) NOT NULL,
  `mensaje` varchar(300) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `tipoMensaje` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`mensajeID`) USING BTREE,
  KEY `mensajes` (`idUsuario`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2340 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`mensajeID`, `asunto`, `mensaje`, `idUsuario`, `tipoMensaje`) VALUES
(1, '10% de descuento en Tienda', 'A partir del próximo 1 de mayo, podrás disfrutar de un 10% de descuento en todos los artículos de nuestra tienda.', 14, 'Oferta'),
(2, '10% de descuento en Tienda', 'A partir del próximo 1 de mayo, podrás disfrutar de un 10% de descuento en todos los artículos de nuestra tienda.', 22, 'Oferta'),
(3, '10% de descuento en Tienda', 'A partir del próximo 1 de mayo, podrás disfrutar de un 10% de descuento en todos los artículos de nuestra tienda.', 23, 'Oferta'),
(4, '10% de descuento en Tienda', 'A partir del próximo 1 de mayo, podrás disfrutar de un 10% de descuento en todos los artículos de nuestra tienda.', 21, 'Oferta'),
(6, '10% de descuento en Tienda', 'A partir del próximo 1 de mayo, podrás disfrutar de un 10% de descuento en todos los artículos de nuestra tienda.', 3, 'Oferta'),
(7, '10% de descuento en Tienda', 'A partir del próximo 1 de mayo, podrás disfrutar de un 10% de descuento en todos los artículos de nuestra tienda.', 12, 'Oferta'),
(8, '10% de descuento en Tienda', 'A partir del próximo 1 de mayo, podrás disfrutar de un 10% de descuento en todos los artículos de nuestra tienda.', 8, 'Oferta'),
(10, '10% de descuento en Tienda', 'A partir del próximo 1 de mayo, podrás disfrutar de un 10% de descuento en todos los artículos de nuestra tienda.', 24, 'Oferta'),
(11, 'Protección de datos ', 'Recuerda que tu informaci{on es confidencial, consulta el aviso de privacidad', 25, 'Alerta'),
(12, 'Protección de datos ', 'Recuerda que tu informaci{on es confidencial, consulta el aviso de privacidad', 27, 'Alerta'),
(13, 'Protección de datos ', 'Recuerda que tu informaci{on es confidencial, consulta el aviso de privacidad', 14, 'Alerta'),
(14, 'Protección de datos ', 'Recuerda que tu informaci{on es confidencial, consulta el aviso de privacidad', 22, 'Alerta'),
(15, 'Protección de datos ', 'Recuerda que tu informaci{on es confidencial, consulta el aviso de privacidad', 23, 'Alerta'),
(16, 'Protección de datos ', 'Recuerda que tu informaci{on es confidencial, consulta el aviso de privacidad', 21, 'Alerta'),
(18, 'Protección de datos ', 'Recuerda que tu informaci{on es confidencial, consulta el aviso de privacidad', 3, 'Alerta'),
(19, 'Protección de datos ', 'Recuerda que tu informaci{on es confidencial, consulta el aviso de privacidad', 12, 'Alerta'),
(20, 'Protección de datos ', 'Recuerda que tu informaci{on es confidencial, consulta el aviso de privacidad', 28, 'Alerta'),
(21, 'Protección de datos ', 'Recuerda que tu informaci{on es confidencial, consulta el aviso de privacidad', 8, 'Alerta'),
(23, 'Protección de datos ', 'Recuerda que tu informaci{on es confidencial, consulta el aviso de privacidad', 24, 'Alerta'),
(24, 'Protección de datos ', 'Recuerda que tu informaci{on es confidencial, consulta el aviso de privacidad', 26, 'Alerta'),
(25, 'Protección de datos ', 'Recuerda que tu informaci{on es confidencial, consulta el aviso de privacidad', 3, 'Alerta'),
(26, 'PRUEBA 28-MAYO', '28-MAYO PRUEBA MENSAEJE', 25, 'Oferta'),
(27, 'PRUEBA 28-MAYO', '28-MAYO PRUEBA MENSAEJE', 27, 'Oferta'),
(28, 'PRUEBA 28-MAYO', '28-MAYO PRUEBA MENSAEJE', 14, 'Oferta'),
(29, 'PRUEBA 28-MAYO', '28-MAYO PRUEBA MENSAEJE', 22, 'Oferta'),
(30, 'PRUEBA 28-MAYO', '28-MAYO PRUEBA MENSAEJE', 23, 'Oferta'),
(31, 'PRUEBA 28-MAYO', '28-MAYO PRUEBA MENSAEJE', 21, 'Oferta'),
(32, 'PRUEBA 28-MAYO', '28-MAYO PRUEBA MENSAEJE', 3, 'Oferta'),
(33, 'PRUEBA 28-MAYO', '28-MAYO PRUEBA MENSAEJE', 12, 'Oferta'),
(34, 'PRUEBA 28-MAYO', '28-MAYO PRUEBA MENSAEJE', 28, 'Oferta'),
(35, 'PRUEBA 28-MAYO', '28-MAYO PRUEBA MENSAEJE', 8, 'Oferta'),
(36, 'PRUEBA 28-MAYO', '28-MAYO PRUEBA MENSAEJE', 29, 'Oferta'),
(37, 'PRUEBA 28-MAYO', '28-MAYO PRUEBA MENSAEJE', 24, 'Oferta'),
(38, 'PRUEBA 28-MAYO', '28-MAYO PRUEBA MENSAEJE', 26, 'Oferta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajesadmin`
--

CREATE TABLE IF NOT EXISTS `mensajesadmin` (
  `mensajeID` int(11) NOT NULL AUTO_INCREMENT,
  `tipoMensaje` varchar(80) DEFAULT NULL,
  `asunto` varchar(80) DEFAULT NULL,
  `contenido` text,
  PRIMARY KEY (`mensajeID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `mensajesadmin`
--

INSERT INTO `mensajesadmin` (`mensajeID`, `tipoMensaje`, `asunto`, `contenido`) VALUES
(1, 'Oferta', '10% de descuento en Tienda', 'A partir del próximo 1 de mayo, podrás disfrutar de un 10% de descuento en todos los artículos de nuestra tienda.'),
(2, 'Alerta', 'Protección de datos ', 'Recuerda que tu informaci{on es confidencial, consulta el aviso de privacidad'),
(3, 'Oferta', 'PRUEBA 28-MAYO', '28-MAYO PRUEBA MENSAEJE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `paisID` int(11) NOT NULL AUTO_INCREMENT,
  `PAIS_ISONUM` smallint(6) DEFAULT NULL,
  `PAIS_ISO2` char(2) DEFAULT NULL,
  `PAIS_ISO3` char(3) DEFAULT NULL,
  `nombrePais` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`paisID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=68 AUTO_INCREMENT=241 ;

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
  `paqueteID` int(3) NOT NULL AUTO_INCREMENT,
  `nombrePaquete` varchar(20) NOT NULL,
  `tipoPublicacion` int(11) DEFAULT NULL COMMENT '1 si es una publicacion en alguna seccion diferente al directorio\r\n2 si es una publicacion en el directorio',
  PRIMARY KEY (`paqueteID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=8 ;

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
  `idPermiso` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` int(11) NOT NULL,
  `nombrePermiso` varchar(70) NOT NULL,
  `borrado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPermiso`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2340 AUTO_INCREMENT=8 ;

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
  `detalleProductoID` int(11) NOT NULL AUTO_INCREMENT,
  `productoID` int(11) DEFAULT NULL,
  `detalle` varchar(70) DEFAULT NULL,
  `valor` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`detalleProductoID`) USING BTREE,
  KEY `productoID` (`productoID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1260 AUTO_INCREMENT=48 ;

--
-- Volcado de datos para la tabla `productodetalle`
--

INSERT INTO `productodetalle` (`detalleProductoID`, `productoID`, `detalle`, `valor`) VALUES
(42, 5, 'talla', 'Grande'),
(43, 5, 'color', 'N/A'),
(44, 6, 'talla', 'Chica'),
(45, 6, 'talla', 'Mediana'),
(46, 6, 'talla', 'Grande'),
(47, 6, 'color', 'Azul');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
  `publicacionID` int(11) NOT NULL AUTO_INCREMENT,
  `seccion` int(1) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `numeroVisitas` int(11) NOT NULL,
  `estadoID` int(11) NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `razaID` char(20) NOT NULL,
  `precioVenta` float DEFAULT NULL,
  `descripcion` text NOT NULL,
  `muestraTelefono` tinyint(1) NOT NULL,
  `aprobada` tinyint(1) NOT NULL,
  `servicioID` int(11) NOT NULL,
  `detalleID` int(11) NOT NULL,
  `paqueteID` int(3) NOT NULL,
  `ciudad` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`publicacionID`,`servicioID`,`detalleID`,`paqueteID`) USING BTREE,
  KEY `contenidoPublicacion` (`servicioID`,`detalleID`,`paqueteID`) USING BTREE,
  KEY `publicacionID` (`publicacionID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1820 AUTO_INCREMENT=44 ;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`publicacionID`, `seccion`, `titulo`, `vigente`, `fechaCreacion`, `fechaVencimiento`, `numeroVisitas`, `estadoID`, `genero`, `razaID`, `precioVenta`, `descripcion`, `muestraTelefono`, `aprobada`, `servicioID`, `detalleID`, `paqueteID`, `ciudad`) VALUES
(2, 7, 'Perro Perdido', 1, '2015-04-06', '2015-05-06', 20, 1, 1, '32', 0, 'Perro perdido - Aguascalientes', 1, 1, 2, 1, 1, 'Aguascalientes'),
(3, 6, 'Anuncio', 1, '2015-04-23', '2015-05-23', 13, 22, 0, '19', 0, 'En adopcion', 1, 1, 3, 1, 1, 'Qro'),
(4, 2, 'prueba', 1, '2015-04-23', '2015-05-23', 11, 22, 0, '3', 12345, 'uyhkjhn,,mnkjhkghjgjhfghffddd', 0, 1, 4, 1, 1, 'queretaro'),
(5, 2, 'dasdasd', 1, '2015-04-26', '2015-05-26', 5, 19, 0, '18', 1232, 'asdasdasdascxczcasdqweqwesada', 0, 1, 5, 1, 1, 'qwedas'),
(6, 2, 'adas', 1, '2015-04-26', '2015-05-26', 2, 19, 0, '18', 123123, 'daslkasjdlasdjlkasdjasdasdasd', 0, 1, 6, 1, 1, 'qweqw'),
(7, 6, 'asdasd', 1, '2015-04-26', '2015-05-26', 11, 19, 0, '17', 0, 'asdasdasdasd', 1, 1, 7, 1, 1, 'qweq'),
(8, 7, 'asdsad', 1, '2015-04-26', '2015-05-26', 0, 19, 0, '19', 0, 'qweqwe', 0, 0, 8, 1, 1, 'asd'),
(9, 2, 'qwe', 1, '2015-04-26', '2015-05-26', 0, 18, 0, '19', 9876, 'dfghjkl', 0, 1, 9, 1, 1, 'ytr'),
(10, 2, 'qwe', 1, '2015-04-26', '2015-05-26', 2, 18, 0, '2', 123, 'qwertyukjhgfdsxdcghjklkjgtreds', 0, 1, 10, 1, 1, 'qwe'),
(11, 6, 'Adoptado', 1, '2015-04-26', '2015-05-26', 0, 3, 0, '3', 0, 'sssss', 1, 2, 11, 1, 1, 'qro'),
(12, 2, 'ddddddd', 1, '2015-04-26', '2015-05-11', 9, 2, 0, '18', 99999, 'ddddddddddddddddd', 1, 1, 12, 2, 2, 'ddddddd'),
(13, 7, 'qwesad', 1, '2015-04-26', '2015-05-26', 0, 19, 0, '15', 0, 'sadxczxczxczxczxczxczxc', 1, 0, 13, 1, 1, 'qweqwe'),
(14, 2, 'Meh', 1, '2015-04-26', '2015-06-25', 15, 16, 0, '13', 4500.5, 'Meh', 1, 1, 14, 3, 3, 'Morelia'),
(15, 2, 'weqwe', 1, '2015-04-26', '2015-05-26', 8, 19, 0, '19', 69, 'qweqweqwe', 1, 1, 15, 1, 1, 'qwe'),
(16, 2, 'qwe', 1, '2015-04-26', '2015-05-26', 0, 18, 0, '19', 69, 'asdasdasd', 0, 1, 16, 1, 1, 'qeqwe'),
(17, 2, 'qweqe', 1, '2015-04-26', '2015-05-26', 0, 19, 0, '19', 69, 'qweqwe', 0, 1, 17, 1, 1, 'qwe'),
(18, 6, 'qwe', 1, '2015-04-26', '2015-05-11', 0, 2, 0, '1', 0, 'asdad', 0, 0, 18, 2, 2, 'jkhsd'),
(19, 6, 'sadasd', 1, '2015-05-07', '2015-06-06', 0, 1, 0, '1', 0, 'asdasdasd', 1, 1, 19, 1, 1, 'asdasd'),
(20, 6, 'asdasd', 1, '2015-05-07', '2015-05-22', 15, 4, 0, '2', 0, 'sadasdasdasdasd', 0, 2, 20, 2, 2, 'asda'),
(24, 11, 'publicacion de directorio', 1, '2015-05-12', '2020-05-10', 0, 2, 0, '1', 0, 'jjjj', 1, 0, 24, 4, 4, NULL),
(25, 4, 'publicacion de directorio', 1, '2015-05-12', '2015-07-11', 0, 2, 0, '1', 50, '', 1, 2, 25, 6, 6, NULL),
(26, 11, 'publicacion de directorio', 1, '2015-05-12', '2020-05-10', 0, 2, 0, '1', 0, 'dd dddd', 0, 1, 26, 4, 4, NULL),
(27, 2, 'Nuevo', 1, '2015-05-24', '2015-07-23', 23, 19, 1, '17', 45666, 'Perro nuevo', 1, 1, 27, 3, 3, 'MTY'),
(28, 2, 'IMG', 1, '2015-05-24', '2015-07-23', 1, 3, 1, '18', 444, 'sssssss', 1, 1, 28, 3, 3, 'ssss'),
(29, 4, 'publicacion de directorio', 1, '2015-05-25', '2015-08-23', 0, 22, 0, '1', 75, 'EL mejor lugar para tu mascota, ven y conocenos!', 1, 1, 29, 7, 7, NULL),
(30, 2, 'prueba', 1, '2015-05-28', '2015-06-27', 1, 2, 0, '1', 500, 'Prueba', 1, 1, 30, 1, 1, 'Falsa'),
(31, 2, 'asdkjsl', 1, '2015-05-28', '2015-06-27', 0, 2, 0, '1', 456, 'jlkjlkjlkjlkjlkjlkjlkjnm,b', 0, 0, 31, 1, 1, 'jhkjhj'),
(32, 7, 'test', 1, '2015-06-08', '2015-06-23', 0, 18, 0, '19', 0, 'test', 0, 0, 32, 2, 2, 'Tepic'),
(33, 7, 'test', 1, '2015-06-08', '2015-08-07', 0, 19, 0, '19', 0, 'test', 1, 0, 33, 3, 3, 'nl'),
(34, 7, 'test', 1, '2015-06-09', '2015-06-24', 0, 1, 0, '1', 0, 'tegasdjkhdfaslknmc,znjlkhsadnmcbxz,msand,saldkjqwehkjebndbnmasdmnbdsahkjeqwhkjfdsbnmdsbnmdasbmnasdbmnsdambnasbnmasdbmnsdamnbdashjkeqwhjkewqhjkdsabnmsdabnmdsahgjkewqhghgjsdasdasd', 0, 0, 34, 2, 2, 'ags'),
(35, 7, 'test', 1, '2015-06-09', '2015-06-24', 0, 1, 0, '1', 0, 'qweasd', 0, 0, 35, 2, 2, 'ags'),
(36, 2, 'qwertyu', 1, '2015-06-09', '2015-07-09', 0, 2, 1, '2', 898, 'sdf', 1, 0, 36, 1, 1, 'werty'),
(37, 2, 'zzz', 1, '2015-06-09', '2015-06-24', 0, 2, 0, '6', 787, 'dddd', 1, 0, 37, 2, 2, 'ccc'),
(38, 2, 'eeee', 1, '2015-06-10', '2015-07-10', 0, 1, 1, '2', 0, 'eeeee', 1, 0, 38, 1, 1, 'ee'),
(39, 2, 'kgfg', 1, '2015-06-10', '2015-07-10', 0, 2, 0, '4', 989, 'kkk', 1, 0, 39, 1, 1, 'jj'),
(40, 2, 'test', 1, '2015-06-10', '2015-08-09', 0, 1, 0, '1', 1234, 'kjdakdjkladjkldjkldajkldsjkldasjklnm,cxnmcn,mdskjdjfsjkhfnbmvnnnm,dfkjhjksfjkfshjfnm,dnm,danm,dajkhejkehjkewjhkjhkfshjksdghjdashgjdayuttyueqwghjdghjdahgjdahjdahgjdsahgjdahgjdagtyeqtyeqghjdsahgjdaghjdaghjvdvdabnddascvvdaadsadsvcdascadsgfhegfh', 1, 0, 40, 3, 3, 'ags'),
(41, 2, 'test', 1, '2015-06-10', '2015-08-09', 0, 1, 0, '1', 1234, 'klsjdlalkjdajkhfsdkjhvnm,vbnmbfhjsfjksduiwryiwhfdjkhfjsknc,mnbzmnbhjkdhasduiyiyfuhweryuiosfdhjkf742687weyriuhjkdfshjkdauiewyihfhjhbnbn,vnbmvxhjgdfsghjsdfavsbxndhnfmcksjeueyrhdnhsnbahywyehydehdnsnsbd', 1, 0, 41, 3, 3, 'ags'),
(42, 2, 'test', 1, '2015-06-11', '2015-07-11', 1, 1, 0, '1', 1234, 'qweerfsdsfsdjhkdsfkjh', 1, 1, 42, 1, 1, 'ags'),
(43, 6, 'quptest', 1, '2015-06-11', '2015-07-11', 3, 1, 0, '1', 0, 'prueba de adopcion', 1, 1, 43, 1, 1, 'ags');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE IF NOT EXISTS `raza` (
  `razaID` int(11) NOT NULL AUTO_INCREMENT,
  `raza` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`razaID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=197 AUTO_INCREMENT=84 ;

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
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(45) NOT NULL,
  `borrado` int(11) NOT NULL,
  PRIMARY KEY (`idRol`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=4 ;

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
  `idPermiso` int(11) NOT NULL,
  PRIMARY KEY (`idRol`,`idPermiso`) USING BTREE,
  KEY `fk_rol_has_permiso_permiso1` (`idPermiso`) USING BTREE,
  KEY `fk_rol_has_permiso_rol` (`idRol`) USING BTREE
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
  `seccionID` int(10) NOT NULL AUTO_INCREMENT,
  `seccionNombre` varchar(50) NOT NULL,
  PRIMARY KEY (`seccionID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1092 AUTO_INCREMENT=18 ;

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
  `servicioID` int(11) NOT NULL AUTO_INCREMENT,
  `cantFotos` int(11) NOT NULL,
  `caracteres` int(11) NOT NULL,
  `vigencia` int(2) NOT NULL,
  `cupones` int(2) NOT NULL,
  `videos` int(2) NOT NULL,
  `precio` float(5,2) NOT NULL,
  `detalleID` int(11) NOT NULL,
  `paqueteID` int(3) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `pagado` int(11) DEFAULT '0',
  PRIMARY KEY (`servicioID`,`detalleID`,`paqueteID`) USING BTREE,
  KEY `detallePaqueteUsuario` (`idUsuario`) USING BTREE,
  KEY `historicoPaquete` (`detalleID`,`paqueteID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=606 AUTO_INCREMENT=44 ;

--
-- Volcado de datos para la tabla `serviciocontratado`
--

INSERT INTO `serviciocontratado` (`servicioID`, `cantFotos`, `caracteres`, `vigencia`, `cupones`, `videos`, `precio`, `detalleID`, `paqueteID`, `idUsuario`, `pagado`) VALUES
(1, 1, 30, 30, 0, 0, 0.00, 1, 1, 3, 1),
(2, 1, 30, 30, 0, 0, 0.00, 1, 1, 3, 1),
(3, 1, 30, 30, 0, 0, 0.00, 1, 1, 2, 1),
(4, 1, 30, 30, 0, 0, 0.00, 1, 1, 21, 1),
(5, 1, 30, 30, 0, 0, 0.00, 1, 1, 3, 1),
(6, 1, 30, 30, 0, 0, 0.00, 1, 1, 3, 1),
(7, 1, 30, 30, 0, 0, 0.00, 1, 1, 24, 1),
(8, 1, 30, 30, 0, 0, 0.00, 1, 1, 24, 1),
(9, 1, 30, 30, 0, 0, 0.00, 1, 1, 3, 1),
(10, 1, 30, 30, 0, 0, 0.00, 1, 1, 3, 1),
(11, 1, 30, 30, 0, 0, 69.00, 1, 1, 24, 0),
(12, 2, 300, 15, 2, 1, 100.00, 2, 2, 24, 1),
(13, 1, 30, 30, 0, 0, 69.00, 1, 1, 3, 0),
(14, 3, 1000, 60, 3, 2, 166.00, 3, 3, 24, 1),
(15, 1, 30, 30, 0, 0, 69.00, 1, 1, 3, 0),
(16, 1, 30, 30, 0, 0, 69.00, 1, 1, 3, 0),
(17, 1, 30, 30, 0, 0, 69.00, 1, 1, 3, 0),
(18, 2, 300, 15, 2, 1, 100.00, 2, 2, 3, 0),
(19, 1, 30, 30, 0, 0, 0.00, 1, 1, 26, 1),
(20, 2, 300, 15, 2, 1, 100.00, 2, 2, 26, 1),
(24, 0, 1000, 1825, 0, 0, 0.00, 4, 4, 27, 1),
(25, 0, 200, 60, 0, 0, 50.00, 6, 6, 28, 1),
(26, 0, 1000, 1825, 0, 0, 0.00, 4, 4, 27, 1),
(27, 3, 1000, 60, 3, 2, 166.00, 3, 3, 3, 0),
(28, 3, 1000, 60, 3, 2, 166.00, 3, 3, 3, 1),
(29, 0, 300, 90, 0, 0, 75.00, 7, 7, 22, 0),
(30, 3, 40, 30, 0, 0, 0.00, 1, 1, 29, 1),
(31, 3, 40, 30, 0, 0, 89.00, 1, 1, 29, 0),
(32, 2, 300, 15, 1, 2, 100.00, 2, 2, 3, 0),
(33, 3, 1000, 60, 3, 2, 166.00, 3, 3, 3, 0),
(34, 2, 300, 15, 1, 2, 100.00, 2, 2, 3, 0),
(35, 2, 300, 15, 1, 2, 100.00, 2, 2, 3, 0),
(36, 3, 40, 30, 0, 0, 89.00, 1, 1, 3, 0),
(37, 2, 300, 15, 1, 2, 100.00, 2, 2, 3, 0),
(38, 3, 40, 30, 0, 0, 0.00, 1, 1, 30, 1),
(39, 3, 40, 30, 0, 0, 89.00, 1, 1, 30, 0),
(40, 3, 1000, 60, 3, 2, 166.00, 3, 3, 3, 0),
(41, 3, 1000, 60, 3, 2, 166.00, 3, 3, 3, 0),
(42, 2, 40, 30, 0, 0, 0.00, 1, 1, 31, 1),
(43, 2, 40, 30, 0, 0, 0.00, 1, 1, 32, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopaquete`
--

CREATE TABLE IF NOT EXISTS `tipopaquete` (
  `idtipopaquete` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoPaquete` varchar(80) NOT NULL,
  PRIMARY KEY (`idtipopaquete`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=6 ;

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
  `ubicacionUsuarioID` int(11) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` int(1) NOT NULL,
  `latitud` varchar(40) NOT NULL,
  `longitud` varchar(20) NOT NULL,
  `idUsuarioDato` int(11) NOT NULL,
  `estadoID` int(11) DEFAULT NULL,
  `zonageograficaID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ubicacionUsuarioID`,`idUsuarioDato`) USING BTREE,
  KEY `ubicacionUsuario` (`idUsuarioDato`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ubicacionusuario`
--

INSERT INTO `ubicacionusuario` (`ubicacionUsuarioID`, `tipoUsuario`, `latitud`, `longitud`, `idUsuarioDato`, `estadoID`, `zonageograficaID`) VALUES
(1, 2, '20.5593958', '-100.41902920000001', 5, 22, 4),
(2, 3, '', '', 6, 0, NULL),
(3, 3, '20.55768805512681', '-100.40999552003785', 10, 2, 1),
(4, 2, '20.5593958', '-100.41902920000001', 11, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
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
  `paqueteGratis` int(11) DEFAULT '1' COMMENT 'si paquete gratis = 1 no lo ha usado, si = 0 entonces ya tiene costo',
  PRIMARY KEY (`idUsuario`) USING BTREE,
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=3276 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `telefono`, `correo`, `contrasena`, `recepcionCorreo`, `tipoUsuario`, `status`, `nivel`, `codigoConfirmacion`, `fechaRegistro`, `useragent`, `last_ip_access`, `authKey`, `paqueteGratis`) VALUES
(2, 'admin', 'admin', 1111, 'admin@gmail.com', '2e0e4da5c11c0f8a73a01a5ddd672211af58c5b1e5179d7412', 0, 0, 1, 0, 'A7995E2C507D113EF045E8BE6', '2014-07-14 21:23:15', NULL, NULL, '580B6200F258D47812DA', 0),
(3, 'martha', 'hdez', 1234567890, 'marthahdez2@gmail.com', '5a3e46ff6a96aab86914d4851d86888e80248ff1c6a6282276', 1, 1, 1, 1, '5E5156618D4918A7A429746A3', '2014-07-17 17:24:18', NULL, NULL, '2534E6C593E020131895', 0),
(4, 'dddd', 'dddd', 0, 'dddd@ssss.com', '2e0e4da5c11c0f8a73a01a5ddd672211af58c5b1e5179d7412', 0, 1, 1, 1, 'A7995E2C507D113EF045E8BE6', '2014-08-03 18:24:47', NULL, NULL, 'DAE20D308B05D531E511', 1),
(6, 'Martha', 'hh', 2147483647, 'martha.tain1@gmail.com', '2e0e4da5c11c0f8a73a01a5ddd672211af58c5b1e5179d7412', 0, 2, 1, 2, 'A7995E2C507D113EF045E8BE6', '2014-08-06 21:23:18', NULL, NULL, '98C754E1CE1B08B535CA', 1),
(7, 'AAA', 'AAAAAAA', 0, 'AAAA@AAA.COM', '2e0e4da5c11c0f8a73a01a5ddd672211af58c5b1e5179d7412', 0, 3, 1, 3, 'FA5760A00DBFD87A83B1444D1', '2014-08-06 21:27:41', NULL, NULL, '8C57194032ECDF532210', 1),
(8, 'qwerty', 'qwerty', 0, 'marthahdez1@gmail.com', '09e9594c4e08da50121b6d96709f0cb82883ed0a589d568e22', 1, 2, 1, 2, 'A7CB99ED6727A5DC281AECB4D', '2014-08-15 18:54:48', NULL, NULL, 'BC1577B76C78A27825D6', 1),
(9, 'ADMIN', 'ADMIN', 1234567890, 'marthahdez22@gmail.com', 'ce837a193dcf8a0928f833783098d1618022daa182d8b46285', 1, 0, 2, 0, '257F06E49C44489737D3BBD31', '2014-08-24 03:08:24', NULL, NULL, '727E36D81670749F9ADC', 1),
(10, 'ADMIN', 'ADMIN', 1234567890, 'marthahdez3@gmail.com', 'dbc69d29174adbf8ce36f3dcfc0f59e71ba84994beeda33375', 1, 0, 2, 0, 'B26B7969336756D19A6AEA3B3', '2014-08-24 03:13:22', NULL, NULL, 'F5D6087BCAFD0F5DA5CB', 1),
(11, 'adminadmin', 'adminadmin', 0, 'marthahdez4@gmail.com', '24da39cb7e92b5194a1139a352eff6414cf1a844b3fb968d33', 1, 0, 2, 0, 'E17BCBA6035A2D74A239BEF0F', '2014-08-24 03:15:23', NULL, NULL, '8E90D61BADDC5BE38ACB', 1),
(12, 'martha', 'hdez', 0, 'cosa83@hotmail.com', 'b183d14427376863e2c042ddfa2d7e306dc3772b69f7d141c6', 1, 1, 1, 1, '341AFB0F050E31E75BB0D79B7', '2014-08-28 10:55:37', NULL, NULL, 'EEBFE31A1948BA164A2C', 1),
(14, 'Juan', 'Perez', 2147483647, 'joanitom@hotmail.com', '48eccaf71f31964898232300a4a1258871de71a7c393fa1b63', 1, 1, 1, 1, '91C1CA0D827694473AEA68FB4', '2014-11-08 17:22:08', NULL, NULL, '1F8F7CBBB0A1DAAD7855', 1),
(17, 'Martha', 'Hdez', 0, 'martha.tain@gmail.com', '75d7a37743b8743a338f20c983ca64c0b72f23e51f772ae40e', 1, 1, 0, 1, 'FD1638535C23DB4E41E3AD28F', '2014-11-24 16:57:40', NULL, NULL, '5F254CE7FCDDF16185D9', 1),
(21, 'ljksakjsa', 'kljsakljsda', 2147483647, 'pruebasqupindex@mailinator.com', 'd20d0ed03641d0d8df5a0abdafdd2d506622f41909ed7f111e', 1, 1, 1, 1, '91639095ECF67C42700801AEA', '2015-04-23 19:52:38', NULL, NULL, 'CD10340D5068EB851291', 0),
(22, 'kjlasdkljsalkj', 'kjlsdakljas', 2147483647, 'pruebasqupindexn@mailinator.com', '90458f9645ae60c9577b99e74d1861650800b6e01931d12762', 1, 3, 1, 2, '477239D9B6E6EF410877726A1', '2015-04-23 19:55:35', NULL, NULL, 'EB4C0180731ACF0725BE', 1),
(23, 'kjldslkjfsdklj', 'sljkslkjsa', 2147483647, 'pruebasqupindexa@mailinator.com', '88a1d37cb17a924a64c211e96aeb10f843a2dac2120b697877', 1, 3, 1, 3, 'AD05FF76C6287595719A33B32', '2015-04-23 19:57:50', NULL, NULL, '2DC3E8C08C39983E9FF9', 1),
(24, 'Test', 'Subject', 2147483647, 'quptest01@mailinator.com', '14391daba4d8a334a414d25a82873d0f3d309201bbf313563f', 1, 1, 1, 1, '7BF77CA91EAB2DB21A88A657E', '2015-04-26 15:13:03', NULL, NULL, 'D623F4B92D7F525E1BF5', 0),
(25, 'Andres', 'Gomez', 2147483647, 'test.u@mailinator.com', '85d8263aea3a05f113c70c7e631634e637c1ce2027626641ed', 1, 1, 1, 1, 'C678FA3DCE33E054D64C37379', '2015-04-29 17:11:32', NULL, NULL, '34D9104873D235FAAE7B', 1),
(26, 'testes', 'falso', 1233211232, 'onceit@mailinator.com', '7b81286d66823029eed8613fea206bcdea3d7c6b994acb18de', 1, 1, 1, 1, '8436A539B7513DF9E8FBEC110', '2015-05-07 21:52:35', NULL, NULL, 'B079323E83D4FC417707', 0),
(27, 'asdasd', 'sesd', 1233211232, 'onceit2@mailinator.com', '6e9b00706993a59ab6fdefcc5e52ba4b99ee98b7baa08f3ec6', 1, 3, 1, 3, 'E744ED3AFEE9A66AD74138568', '2015-05-07 22:33:35', NULL, NULL, '09E050C6F0F261A7EC51', 1),
(28, 'NEGOCIO', 'N', 0, 'ntest@mailinator.com', 'df690017d8607f4432a7c074ff988c5659804b640c2ac68573', 1, 3, 1, 2, '2361C8463CAF7E7D9BA182D5E', '2015-05-12 16:40:17', NULL, NULL, 'BA8BD1E44F25E2DA5449', 1),
(29, 'REMIGIO', 'AMIEVA', 2147483647, 'ramieva@calclosets.com', 'd705b0397995a8b4e48eddd8760ed0276173a7f0b71e6f1ece', 1, 1, 1, 1, 'F1EA5651A586967B0737F5B68', '2015-05-28 19:43:30', NULL, NULL, '5503FA210FE75CD1B425', 0),
(30, 'Jose', 'Jose', 0, 'josej@mailinator.com', 'ac0688dc0815b53ba4848f8be1bc5cf895e56f0d2f4fd68615', 1, 1, 1, 1, '8B8CFAE4979EE1B3B145BA456', '2015-06-10 00:12:37', NULL, NULL, 'A11AC55BA4D8C9EF6285', 0),
(31, 'Tomas', 'Diaz', 0, 't.diaz@mailinator.com', 'd3dac870e5496d2238d427eb74fd4961faaf98f73e069cd226', 1, 1, 1, 1, 'F72D6C815C2AF98FE03D47DFD', '2015-06-11 00:01:42', NULL, NULL, '6F53EC3EFE7647A33482', 0),
(32, 'Juan', 'Perez', 1234567891, 'quptest11@mailinator.com', '5e2e14619320da619a55c184d477dad5a994ff80a1003e8a84', 1, 1, 1, 1, '1EB94FFFF9341E8787B3114E0', '2015-06-11 20:05:12', NULL, NULL, 'ED47F7F653C8C0DD5032', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariodato`
--

CREATE TABLE IF NOT EXISTS `usuariodato` (
  `idUsuarioDato` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `razonSocial` varchar(45) NOT NULL,
  `rfc` varchar(20) DEFAULT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `noInterior` varchar(11) DEFAULT NULL,
  `noExterior` varchar(11) DEFAULT NULL,
  `cp` int(7) DEFAULT NULL,
  `municipio` varchar(45) DEFAULT NULL,
  `estadoID` int(11) NOT NULL,
  `idPais` int(11) DEFAULT '147' COMMENT '147 = M?xico',
  PRIMARY KEY (`idUsuarioDato`) USING BTREE,
  KEY `adicional` (`idUsuario`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2730 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `usuariodato`
--

INSERT INTO `usuariodato` (`idUsuarioDato`, `idUsuario`, `razonSocial`, `rfc`, `calle`, `noInterior`, `noExterior`, `cp`, `municipio`, `estadoID`, `idPais`) VALUES
(2, 3, 'RFC', 'RFC', 'qwerty', '0', '454', 76000, 'MTY', 19, 147),
(4, 21, 'wqerwe', 'sadsad', '', '0', '', 0, '', 0, 147),
(5, 22, '', '', 'Falsa', '0', '123', 76000, 'Queretato', 22, 146),
(6, 23, 'ljksdakljdsalksda', 'wqerewsdklsad', 'lkjsdaslk', '0', '1293', 76000, 'Queretaro', 22, 147),
(7, 24, '', '', '', '0', '', 0, '', 0, 147),
(8, 25, 'Andres Gomez', 'XX09908765', '22', '0', '22', 22222, 'MTY', 19, 147),
(9, 26, '', '', '', '0', '', 0, '', 0, 147),
(10, 27, '', '', 'hh', '0', '0hh', 12345, 'hhh', 2, 146),
(11, 28, '', '', 'd', '0', 'd', 12345, 'd', 2, 146),
(12, 29, '', '', '', '0', '', 0, '', 0, 147),
(13, 30, '', '', '', '0', '', 0, '', 0, 147),
(14, 31, '', '', '', '0', '', 0, '', 0, 147),
(15, 32, '', '', '', '0', '', 0, '', 0, 147);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariodetalle`
--

CREATE TABLE IF NOT EXISTS `usuariodetalle` (
  `idusuarioDetalle` int(11) NOT NULL AUTO_INCREMENT,
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
  `municipioC` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idusuarioDetalle`,`idUsuario`) USING BTREE,
  KEY `detalleUsuario` (`idUsuario`) USING BTREE,
  KEY `idusuarioDetalle` (`idusuarioDetalle`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192 COMMENT='Ambos usuarios, Negocio y AC comparten estos datos, por lo cual ambos se almacenan en esta tabla' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuariodetalle`
--

INSERT INTO `usuariodetalle` (`idusuarioDetalle`, `idUsuario`, `tipoUsuario`, `nombreNegocio`, `giro`, `nombreContacto`, `telefono`, `calle`, `numero`, `idEstado`, `colonia`, `cp`, `correo`, `paginaWeb`, `logo`, `descripcion`, `municipioC`) VALUES
(1, 22, 2, 'Negocio de prueba', NULL, 'kjlasdkljsalkj kjlsdakljas', '2147483647', 'Falsa', '123', 22, 'Falsa', 76000, 'pruebasqupindexn@mailinator.com', '', 'images/negocio_logo/c61e2de9-c331-48ce-8ead-5', 'EL mejor lugar para tu mascota, ven y conocenos!', NULL),
(2, 23, 3, '0', '0', '0', '0', '0', '0', 0, '0', 0, '0', '0', '', '0', '0'),
(3, 27, 3, 'lll', NULL, 'asdasd sesd', '1233211232', 'hh', '0hh', 2, 'hhh', 12345, 'onceit2@mailinator.com', '', 'images/negocio_logo/139e62d5-7294-471d-ab7a-c', 'dd dddd', NULL),
(4, 28, 2, 'ddd', NULL, 'NEGOCIO N', '0', 'd', 'd', 2, 'd', 12345, 'ntest@mailinator.com', '', 'images/negocio_logo/abb751ee-58ae-4984-9caf-2', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `videoID` int(11) NOT NULL AUTO_INCREMENT,
  `link` text NOT NULL,
  `publicacionID` int(11) NOT NULL,
  `servicioID` int(11) NOT NULL,
  `detalleID` int(11) NOT NULL,
  `paqueteID` int(3) NOT NULL,
  PRIMARY KEY (`videoID`) USING BTREE,
  KEY `publicacionID` (`publicacionID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`videoID`, `link`, `publicacionID`, `servicioID`, `detalleID`, `paqueteID`) VALUES
(1, '', 1, 1, 1, 1),
(2, '', 2, 2, 1, 1),
(3, '', 3, 3, 1, 1),
(4, '', 4, 4, 1, 1),
(5, '', 5, 5, 1, 1),
(6, '', 6, 6, 1, 1),
(7, '', 7, 7, 1, 1),
(8, '', 8, 8, 1, 1),
(9, '', 9, 9, 1, 1),
(10, '', 10, 10, 1, 1),
(11, '', 11, 11, 1, 1),
(12, '', 12, 12, 2, 2),
(13, '', 13, 13, 1, 1),
(14, 'https://www.youtube.com/embed/09R8_2nJtjg', 14, 14, 3, 3),
(15, '', 15, 15, 1, 1),
(16, '', 16, 16, 1, 1),
(17, '', 17, 17, 1, 1),
(18, '', 18, 18, 2, 2),
(19, '', 19, 19, 1, 1),
(20, '', 20, 20, 2, 2),
(21, 'https://www.youtube.com/embed/8hxCvElZia4', 27, 27, 3, 3),
(22, 'https://www.youtube.com/embed/wXsinaBrpWY', 28, 28, 3, 3),
(23, '', 30, 30, 1, 1),
(24, '', 31, 31, 1, 1),
(25, '', 32, 32, 2, 2),
(26, 'https://www.youtube.com/watch?v=KWZGAExj-es', 33, 33, 3, 3),
(27, '', 34, 34, 2, 2),
(28, '', 35, 35, 2, 2),
(29, '', 36, 36, 1, 1),
(30, 'https://www.youtube.com/embed/BF1DQr5dKW8', 37, 37, 2, 2),
(31, '', 38, 38, 1, 1),
(32, '', 39, 39, 1, 1),
(33, '', 40, 40, 3, 3),
(34, '', 41, 41, 3, 3),
(35, '', 42, 42, 1, 1),
(36, '', 43, 43, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE IF NOT EXISTS `visita` (
  `idVisita` int(11) NOT NULL,
  `numeroVisitas` int(11) DEFAULT '0',
  PRIMARY KEY (`idVisita`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`idVisita`, `numeroVisitas`) VALUES
(1, 943);

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
('productos', NULL, NULL, NULL, 'quieroun_perro*3989957', '2014-07-25 18:46:09', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonageografica`
--

CREATE TABLE IF NOT EXISTS `zonageografica` (
  `zonaID` int(11) NOT NULL AUTO_INCREMENT,
  `zona` varchar(60) NOT NULL,
  PRIMARY KEY (`zonaID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1820 AUTO_INCREMENT=10 ;

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
  `zonaID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `estadoID` int(11) NOT NULL,
  `zonageograficaID` int(11) DEFAULT NULL,
  PRIMARY KEY (`zonaID`,`estadoID`) USING BTREE,
  KEY `zonageograficaID` (`zonageograficaID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=496 AUTO_INCREMENT=35 ;

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
-- Filtros para la tabla `direccionenvio`
--
ALTER TABLE `direccionenvio`
  ADD CONSTRAINT `direccionenvio_fk1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

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
