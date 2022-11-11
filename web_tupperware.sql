-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 11-11-2022 a las 01:51:56
-- Versión del servidor: 5.5.62-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web_tupperware`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL COMMENT 'TRIAL',
  `tipo` varchar(10) NOT NULL COMMENT 'TRIAL',
  `cuerpo` mediumtext COMMENT 'TRIAL',
  `opciones` varchar(255) NOT NULL COMMENT 'TRIAL',
  `trial481` char(1) DEFAULT NULL COMMENT 'TRIAL',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='TRIAL';

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `tipo`, `cuerpo`, `opciones`, `trial481`) VALUES
(1, 'slider', '[{\"imagen\":\"http://admin-web-version2.com/public/img/banner/HD-Backgrounds-Game-of-Thrones%20(1).jpg\",\"enlace\":null},{\"imagen\":\"http://admin-web-version2.com/public/img/banner/05.jpg\",\"enlace\":null},{\"imagen\":\"http://admin-web-version2.com/public/img/banner/06.jpg\",\"enlace\":null},{\"imagen\":\"http://admin-web-version2.com/public/img/banner/04.jpg\",\"enlace\":null}]', '{\"fade\":true,\"dimensionar\":true,\"height\":\"100\",\"indicadores\":true}', 'T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `idcatg` int(11) NOT NULL AUTO_INCREMENT COMMENT 'TRIAL',
  `nombre` varchar(70) NOT NULL COMMENT 'TRIAL',
  `filtro` varchar(70) NOT NULL COMMENT 'TRIAL',
  `catpad` int(11) DEFAULT NULL COMMENT 'TRIAL',
  `fecreg` datetime DEFAULT NULL COMMENT 'TRIAL',
  `estado` char(1) DEFAULT 'A' COMMENT 'TRIAL',
  `trial485` char(1) DEFAULT NULL COMMENT 'TRIAL',
  PRIMARY KEY (`idcatg`),
  UNIQUE KEY `idx_nombre` (`nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COMMENT='TRIAL';

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcatg`, `nombre`, `filtro`, `catpad`, `fecreg`, `estado`, `trial485`) VALUES
(1, 'Alacena', 'alacena', NULL, '2022-05-29 15:11:31', 'A', 'T'),
(2, 'Freezer', 'freezer', NULL, '2022-05-29 15:11:32', 'A', NULL),
(3, 'Heladera', 'heladera', NULL, '2022-05-29 15:11:33', 'A', NULL),
(4, 'Líquido', 'liquido', NULL, '2022-05-29 15:11:34', 'A', NULL),
(5, 'Lunch', 'lunch', NULL, '2022-05-29 15:11:35', 'A', NULL),
(6, 'Microondas', 'microondas', NULL, '2022-05-29 15:11:36', 'A', NULL),
(7, 'Preparación', 'preparacion', NULL, '2022-05-29 15:11:37', 'A', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias2`
--

DROP TABLE IF EXISTS `categorias2`;
CREATE TABLE IF NOT EXISTS `categorias2` (
  `idcatg` int(11) NOT NULL AUTO_INCREMENT COMMENT 'TRIAL',
  `nombre` varchar(70) NOT NULL COMMENT 'TRIAL',
  `filtro` varchar(70) NOT NULL COMMENT 'TRIAL',
  `catpad` int(11) DEFAULT NULL COMMENT 'TRIAL',
  `fecreg` datetime DEFAULT NULL COMMENT 'TRIAL',
  `estado` char(1) DEFAULT 'A' COMMENT 'TRIAL',
  `trial485` char(1) DEFAULT NULL COMMENT 'TRIAL',
  PRIMARY KEY (`idcatg`),
  UNIQUE KEY `idx_nombre` (`nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COMMENT='TRIAL';

--
-- Volcado de datos para la tabla `categorias2`
--

INSERT INTO `categorias2` (`idcatg`, `nombre`, `filtro`, `catpad`, `fecreg`, `estado`, `trial485`) VALUES
(8, 'Linea Chef', 'linea', NULL, '2022-05-29 15:11:31', 'A', 'T'),
(9, 'Moldes', 'moldes', NULL, '2022-05-29 15:11:32', 'A', NULL),
(10, 'Ollas Chef', 'ollas', NULL, '2022-05-29 15:11:33', 'A', NULL),
(11, 'Termo', 'termo', NULL, '2022-05-29 15:11:34', 'A', NULL),
(12, 'Utensilios', 'utensilios', NULL, '2022-05-29 15:11:35', 'A', NULL),
(13, 'Otros', 'otros', NULL, '2022-05-29 15:11:36', 'A', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

DROP TABLE IF EXISTS `correos`;
CREATE TABLE IF NOT EXISTS `correos` (
  `idcorreo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'TRIAL',
  `nombres` varchar(255) NOT NULL COMMENT 'TRIAL',
  `correos` varchar(255) NOT NULL COMMENT 'TRIAL',
  `fecsuscripcion` datetime DEFAULT NULL COMMENT 'TRIAL',
  `trial485` char(1) DEFAULT NULL COMMENT 'TRIAL',
  PRIMARY KEY (`idcorreo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='TRIAL';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `idemp` int(11) NOT NULL AUTO_INCREMENT COMMENT 'TRIAL',
  `nombre` varchar(100) NOT NULL COMMENT 'TRIAL',
  `telefono` varchar(40) DEFAULT NULL COMMENT 'TRIAL',
  `celular` varchar(40) DEFAULT NULL COMMENT 'TRIAL',
  `direccion` varchar(220) DEFAULT NULL COMMENT 'TRIAL',
  `correo1` varchar(100) DEFAULT NULL COMMENT 'TRIAL',
  `correo2` varchar(100) DEFAULT NULL COMMENT 'TRIAL',
  `facebook` varchar(200) DEFAULT NULL COMMENT 'TRIAL',
  `whatsapp1` varchar(200) DEFAULT NULL COMMENT 'TRIAL',
  `whatsapp2` varchar(200) NOT NULL COMMENT 'TRIAL',
  `instagram` varchar(200) DEFAULT NULL COMMENT 'TRIAL',
  `youtube` varchar(200) DEFAULT NULL COMMENT 'TRIAL',
  `twitter` varchar(200) DEFAULT NULL COMMENT 'TRIAL',
  `linkedin` varchar(250) DEFAULT NULL COMMENT 'TRIAL',
  `intranet` varchar(200) DEFAULT NULL COMMENT 'TRIAL',
  `liblink` varchar(200) DEFAULT NULL COMMENT 'TRIAL',
  `libmail` varchar(100) DEFAULT NULL COMMENT 'TRIAL',
  `libnume` int(11) DEFAULT NULL COMMENT 'TRIAL',
  `metades` varchar(255) DEFAULT NULL COMMENT 'TRIAL',
  `trial485` char(1) DEFAULT NULL COMMENT 'TRIAL',
  PRIMARY KEY (`idemp`),
  UNIQUE KEY `idx_nombre` (`nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='TRIAL';

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idemp`, `nombre`, `telefono`, `celular`, `direccion`, `correo1`, `correo2`, `facebook`, `whatsapp1`, `whatsapp2`, `instagram`, `youtube`, `twitter`, `linkedin`, `intranet`, `liblink`, `libmail`, `libnume`, `metades`, `trial485`) VALUES
(1, 'Tupperware', '', '', '', 'desarrollo@dev.com', 'desarrollo_php@dev.com', 'https://es-la.facebook.com/', 'https://web.whatsapp.com/', 'https://web.whatsapp.com/', 'https://www.instagram.com/?hl=es', 'https://www.youtube.com/', 'https://www.php.net/manual/es/intro-whatis.php', 'https://pe.linkedin.com/', '', '', '', NULL, '', 'T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

DROP TABLE IF EXISTS `galeria`;
CREATE TABLE IF NOT EXISTS `galeria` (
  `idgaleria` int(11) NOT NULL AUTO_INCREMENT COMMENT 'TRIAL',
  `titulo` varchar(150) NOT NULL COMMENT 'TRIAL',
  `detalle` varchar(270) DEFAULT NULL COMMENT 'TRIAL',
  `ncolum` int(11) DEFAULT NULL COMMENT 'TRIAL',
  `cuerpo` mediumtext COMMENT 'TRIAL',
  `modo` char(1) DEFAULT 'A' COMMENT 'TRIAL',
  `portada` varchar(300) DEFAULT NULL COMMENT 'TRIAL',
  `fecreg` datetime DEFAULT NULL COMMENT 'TRIAL',
  `visible` char(1) DEFAULT 'N' COMMENT 'TRIAL',
  `trial488` char(1) DEFAULT NULL COMMENT 'TRIAL',
  PRIMARY KEY (`idgaleria`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='TRIAL';

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`idgaleria`, `titulo`, `detalle`, `ncolum`, `cuerpo`, `modo`, `portada`, `fecreg`, `visible`, `trial488`) VALUES
(1, 'dsadsa', '', 4, '[{\"tipo\":\"I\",\"content\":\"/public/img/galeria/img003.jpg\",\"portada\":\"/public/img/galeria/img003.jpg\"},{\"tipo\":\"I\",\"content\":\"/public/img/galeria/img003.jpg\",\"portada\":\"/public/img/galeria/img003.jpg\"},{\"tipo\":\"I\",\"content\":\"/public/img/galeria/img003.jpg\",\"portada\":\"/public/img/galeria/img003.jpg\"},{\"tipo\":\"I\",\"content\":\"/public/img/galeria/img003.jpg\",\"portada\":\"/public/img/galeria/img003.jpg\"},{\"tipo\":\"I\",\"content\":\"/public/img/galeria/img003.jpg\",\"portada\":\"/public/img/galeria/img003.jpg\"},{\"tipo\":\"I\",\"content\":\"/public/img/galeria/img003.jpg\",\"portada\":\"/public/img/galeria/img003.jpg\"}]', 'B', '', '2022-06-27 17:44:30', 'S', 'T'),
(2, 'dfgdfg', '', 4, '[{\"id\":64065,\"tipo\":\"I\",\"content\":\"/public/img/galeria/03.jpg\",\"portada\":\"/public/img/galeria/03.jpg\"},{\"id\":18771,\"tipo\":\"I\",\"content\":\"/public/img/galeria/02.jpg\",\"portada\":\"/public/img/galeria/02.jpg\"}]', 'A', '', '2022-10-24 12:51:23', 'N', 'T'),
(3, 'vcvcvcv', '', 4, '[{\"id\":12588,\"tipo\":\"I\",\"content\":\"/public/img/galeria/04.jpg\",\"portada\":\"/public/img/galeria/04.jpg\"},{\"id\":84677,\"tipo\":\"I\",\"content\":\"/public/img/galeria/03.jpg\",\"portada\":\"/public/img/galeria/03.jpg\"},{\"id\":72693,\"tipo\":\"I\",\"content\":\"/public/img/galeria/02.jpg\",\"portada\":\"/public/img/galeria/02.jpg\"},{\"id\":21846,\"tipo\":\"I\",\"content\":\"/public/img/galeria/07.jpg\",\"portada\":\"/public/img/galeria/07.jpg\"},{\"id\":15381,\"tipo\":\"I\",\"content\":\"/public/img/galeria/01.jpg\",\"portada\":\"/public/img/galeria/01.jpg\"},{\"id\":21846,\"tipo\":\"I\",\"content\":\"/public/img/galeria/07.jpg\",\"portada\":\"/public/img/galeria/07.jpg\"},{\"id\":77707,\"tipo\":\"I\",\"content\":\"/public/img/galeria/05.jpg\",\"portada\":\"/public/img/galeria/05.jpg\"}]', 'A', '', '2022-10-24 12:52:12', 'N', 'T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `popup`
--

DROP TABLE IF EXISTS `popup`;
CREATE TABLE IF NOT EXISTS `popup` (
  `id` int(11) NOT NULL COMMENT 'TRIAL',
  `titulo` varchar(250) DEFAULT NULL COMMENT 'TRIAL',
  `tipo` char(1) NOT NULL COMMENT 'TRIAL',
  `cuerpo` mediumtext COMMENT 'TRIAL',
  `header` char(1) DEFAULT NULL COMMENT 'TRIAL',
  `margen` char(1) DEFAULT NULL COMMENT 'TRIAL',
  `slider` char(1) DEFAULT NULL COMMENT 'TRIAL',
  `animation` varchar(40) DEFAULT NULL COMMENT 'TRIAL',
  `visible` char(1) DEFAULT NULL COMMENT 'TRIAL',
  `trial488` char(1) DEFAULT NULL COMMENT 'TRIAL',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='TRIAL';

--
-- Volcado de datos para la tabla `popup`
--

INSERT INTO `popup` (`id`, `titulo`, `tipo`, `cuerpo`, `header`, `margen`, `slider`, `animation`, `visible`, `trial488`) VALUES
(1, 'Titulo de ventana', 'I', '<div id=\"carouselModal\" class=\"carousel slide\" data-bs-ride=\"carousel\"><div class=\"carousel-inner\"><div class=\"carousel-item active\"><img src=\"/public/img/galeria/07.jpg\" class=\"d-block w-100\"></div><div class=\"carousel-item \"><img src=\"/public/img/galeria/01.jpg\" class=\"d-block w-100\"></div><div class=\"carousel-item \"><img src=\"/public/img/galeria/HD-Backgrounds-Game-of-Thrones (1).jpg\" class=\"d-block w-100\"></div><div class=\"carousel-item \"><img src=\"/public/img/galeria/05.jpg\" class=\"d-block w-100\"></div></div><button class=\"carousel-control-prev\" type=\"button\" data-bs-target=\"#carouselModal\" data-bs-slide=\"prev\"> <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span> <span class=\"visually-hidden\">Previous</span></button><button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#carouselModal\" data-bs-slide=\"next\"><span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span><span class=\"visually-hidden\">Next</span></button></div>', 'N', 'N', 'S', 'animate__zoomIn', 'S', 'T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

DROP TABLE IF EXISTS `publicacion`;
CREATE TABLE IF NOT EXISTS `publicacion` (
  `idpub` int(11) NOT NULL AUTO_INCREMENT COMMENT 'TRIAL',
  `idcatg` int(11) NOT NULL COMMENT 'TRIAL',
  `titulo` varchar(280) NOT NULL COMMENT 'TRIAL',
  `tagname` varchar(330) NOT NULL COMMENT 'TRIAL',
  `portada` varchar(350) DEFAULT NULL COMMENT 'TRIAL',
  `detalle` varchar(250) DEFAULT NULL COMMENT 'TRIAL',
  `cuerpo` longtext COMMENT 'TRIAL',
  `fecpub` datetime NOT NULL COMMENT 'TRIAL',
  `fecreg` datetime DEFAULT NULL COMMENT 'TRIAL',
  `visible` char(1) DEFAULT 'N' COMMENT 'TRIAL',
  `trial488` char(1) DEFAULT NULL COMMENT 'TRIAL',
  `img1` varchar(250) DEFAULT NULL,
  `img2` varchar(250) DEFAULT NULL,
  `img3` varchar(250) DEFAULT NULL,
  `img4` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idpub`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COMMENT='TRIAL';

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`idpub`, `idcatg`, `titulo`, `tagname`, `portada`, `detalle`, `cuerpo`, `fecpub`, `fecreg`, `visible`, `trial488`, `img1`, `img2`, `img3`, `img4`) VALUES
(2, 1, 'MODULARES OVALES ', 'modulares-ovales', 'http://admin-web-tupper.com/public/img/galeria/producto2.jpg', 'lorem', '<div><strong>BENEFICIOS Y UTILIDADES</strong></div>\r\n<div>&nbsp;</div>\r\n<div>Los modulares est&aacute;n especialmente dise&ntilde;ados para almacenar alimentos secos ocupando muy poco espacio en la alacena.</div>\r\n<div>Su dise&ntilde;o ovalado permite retirar y colocar f&aacute;cilmente el recipiente en la alacena.</div>\r\n<div>Ahorra espacio al guardar cantidades de alimento tales como: galletas, granos, cereales, harinas entre otros.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>DISE&Ntilde;O</strong></div>\r\n<div>&nbsp;</div>\r\n<div>\r\n<div>Su dise&ntilde;o oval permite apilarlos.</div>\r\n<div>Material r&iacute;gido transl&uacute;cido de gran resistencia.</div>\r\n<div>Diferentes alturas con diferentes capacidades para almacenar alimentos como: Galletas, granos, cereales, harinas entre otros.</div>\r\n<div>El sello a prueba de aire es muy f&aacute;cil de colocar y retirar, conservando los alimentos frescos por m&aacute;s tiempo. &nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div><strong>CAPACIDAD</strong></div>\r\n</div>\r\n<div>&nbsp;</div>\r\n<div>\r\n<div>Modular Oval # 1 &nbsp;500 ml</div>\r\n<div>Modular Oval # 2 &nbsp;1.1 L</div>\r\n<div>Modular Oval # 3 &nbsp;1.7 L</div>\r\n<div>Modular Oval # 4 &nbsp;2.3 L</div>\r\n<div>Modular Oval # 5 &nbsp;2.9 L</div>\r\n</div>', '2022-11-09 15:26:00', NULL, 'S', NULL, 'http://admin-web-tupper.com/public/img/galeria/01.jpg', 'http://admin-web-tupper.com/public/img/galeria/02.jpg', '', ''),
(3, 1, 'PRODUCTO2-PRUEBA', 'producto2-prueba', 'https://www.reyplast.pe/blog/wp-content/uploads/2017/11/taper-de-plastico-rey-1.jpg', '', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed incidunt reiciendis reprehenderit eum rem eius aliquam, dolorum quam commodi aut. Natus doloremque iure aliquam! Neque nam obcaecati voluptates in quia.</div>', '2022-11-10 09:34:00', NULL, 'S', NULL, 'https://www.reyplast.pe/blog/wp-content/uploads/2017/11/taper-de-plastico-hermetico.jpg', '', '', ''),
(4, 1, 'ejemplo333333', 'producto3', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMotYtYnAtsPEm9h-mV2CgBZVqoJuoiEPG8cKFyenk7jxbbxyqlI1G_keTTZCt2qZo-u8&usqp=CAU', '', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed incidunt reiciendis reprehenderit eum rem eius aliquam, dolorum quam commodi aut. Natus doloremque iure aliquam! Neque nam obcaecati voluptates in quia.</div>', '2022-11-10 11:11:00', NULL, 'S', NULL, 'https://cdn.shopify.com/s/files/1/0092/7373/7295/products/SCHWINN-TRIPLE-LINK-PEDALS---MORSE-TAPER_1200x630.jpg?v=1654639887', 'https://cdn.shopify.com/s/files/1/0092/7373/7295/products/SCHWINN-TRIPLE-LINK-PEDALS---MORSE-TAPER_1200x630.jpg?v=1654639887', 'https://cdn.shopify.com/s/files/1/0092/7373/7295/products/SCHWINN-TRIPLE-LINK-PEDALS---MORSE-TAPER_1200x630.jpg?v=1654639887', 'https://cdn.shopify.com/s/files/1/0092/7373/7295/products/SCHWINN-TRIPLE-LINK-PEDALS---MORSE-TAPER_1200x630.jpg?v=1654639887');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion2`
--

DROP TABLE IF EXISTS `publicacion2`;
CREATE TABLE IF NOT EXISTS `publicacion2` (
  `idpub` int(11) NOT NULL AUTO_INCREMENT COMMENT 'TRIAL',
  `idcatg` int(11) NOT NULL COMMENT 'TRIAL',
  `titulo` varchar(280) NOT NULL COMMENT 'TRIAL',
  `tagname` varchar(330) NOT NULL COMMENT 'TRIAL',
  `portada` varchar(350) DEFAULT NULL COMMENT 'TRIAL',
  `detalle` varchar(250) DEFAULT NULL COMMENT 'TRIAL',
  `cuerpo` longtext COMMENT 'TRIAL',
  `fecpub` datetime NOT NULL COMMENT 'TRIAL',
  `fecreg` datetime DEFAULT NULL COMMENT 'TRIAL',
  `visible` char(1) DEFAULT 'N' COMMENT 'TRIAL',
  `trial488` char(1) DEFAULT NULL COMMENT 'TRIAL',
  `img1` varchar(250) DEFAULT NULL,
  `img2` varchar(250) DEFAULT NULL,
  `img3` varchar(250) DEFAULT NULL,
  `img4` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idpub`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COMMENT='TRIAL';

--
-- Volcado de datos para la tabla `publicacion2`
--

INSERT INTO `publicacion2` (`idpub`, `idcatg`, `titulo`, `tagname`, `portada`, `detalle`, `cuerpo`, `fecpub`, `fecreg`, `visible`, `trial488`, `img1`, `img2`, `img3`, `img4`) VALUES
(6, 8, '12345678', '2121321', 'https://plazavea.vteximg.com.br/arquivos/ids/1087576-1000-1000/3583.jpg', '', '<div>21321312312312</div>', '2022-11-10 16:06:00', NULL, 'S', NULL, 'https://promart.vteximg.com.br/arquivos/ids/654818-1000-1000/image-ac306b1f3e0d4582bee61b2dcf4c3e77.jpg?v=637457105449630000', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT COMMENT 'TRIAL',
  `nombre` varchar(30) NOT NULL COMMENT 'TRIAL',
  `pass` varchar(250) NOT NULL COMMENT 'TRIAL',
  `fecreg` datetime DEFAULT NULL COMMENT 'TRIAL',
  `trial488` char(1) DEFAULT NULL COMMENT 'TRIAL',
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `idx_nombre` (`nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COMMENT='TRIAL';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`iduser`, `nombre`, `pass`, `fecreg`, `trial488`) VALUES
(101, 'admin', '$2y$10$DhfhM2fqBho3DZCMb79JIOWFjf8KNDfd8eGLU3g4N2djUjqX.9egi', '2022-05-29 15:11:31', 'T');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
