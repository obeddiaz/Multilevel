-- phpMyAdmin SQL Dump
-- version 4.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-10-2014 a las 01:39:34
-- Versión del servidor: 5.6.18-enterprise-commercial-advanced
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `basicosa_cupones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE IF NOT EXISTS `detalle_venta` (
`id_detalle_venta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle_venta`, `cantidad`, `id_producto`, `id_venta`, `precio`) VALUES
(1, 1, 1, 2, 325),
(2, 2, 1, 3, 325);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
`id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `nombre_estado`) VALUES
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
(32, 'Zacatecas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `nombre`) VALUES
(1, 'Inicio'),
(2, 'Contacto'),
(3, 'Mision'),
(4, 'Vision'),
(5, 'Plan de Compensacion'),
(6, 'Productos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
`id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` double DEFAULT NULL,
  `ruta_imagen` varchar(150) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `ruta_imagen`, `descripcion`) VALUES
(1, 'Nuevo Productoi', 325, 'Lighthouse.jpg', 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `total_venta`
--

CREATE TABLE IF NOT EXISTS `total_venta` (
  `id_venta` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido_paterno` varchar(30) NOT NULL,
  `apellido_materno` varchar(30) NOT NULL,
  `genero` int(11) NOT NULL,
  `estados_id_estado` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telefono` varchar(70) NOT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `pago_inicial` double NOT NULL,
  `fecha_nacimiento` date NOT NULL,
`id_usuario` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'usuario.jpg'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `password`, `nombre`, `apellido_paterno`, `apellido_materno`, `genero`, `estados_id_estado`, `email`, `telefono`, `celular`, `id_tipo_usuario`, `pago_inicial`, `fecha_nacimiento`, `id_usuario`, `foto`) VALUES
('obed', '45e148e9751f84e7b2323f8a0c4977bbe6a7b4c8', 'obed', 'diaz', 'rodriguez', 1, 1, 'obed.9@hotmail.com', '634564531', '', 3, 1, '1992-08-31', 1, 'usuario.jpg'),
('david', '45e148e9751f84e7b2323f8a0c4977bbe6a7b4c8', 'obed', 'diaz', 'rodriguez', 1, 1, 'obed.diaz@hotmail.com', '44856745641', '41234134', 2, 1, '1992-08-31', 2, 'usuario.jpg'),
('obed.diaz', '45e148e9751f84e7b2323f8a0c4977bbe6a7b4c8', 'Obed', 'Díaz ', 'Rodríguez', 1, 1, 'obed.9@hotmail.com', '151443', '2345234524', 2, 0, '1992-08-31', 3, 'usuario.jpg'),
('dias.obed', '45e148e9751f84e7b2323f8a0c4977bbe6a7b4c8', 'Obed', 'Díaz Rodríguez', 'gsdfgsdfg', 1, 1, 'obed.9@hotmail.com', '4325452', NULL, 2, 1, '1992-08-31', 4, 'usuario.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_afiliado`
--

CREATE TABLE IF NOT EXISTS `usuario_afiliado` (
  `id_usuario` int(11) NOT NULL,
  `id_usuario_inv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_afiliado`
--

INSERT INTO `usuario_afiliado` (`id_usuario`, `id_usuario_inv`) VALUES
(1, 2),
(2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
`id_venta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_venta` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_usuario`, `fecha_venta`) VALUES
(1, 2, '2014-09-30 00:00:00'),
(2, 2, '2014-09-30 00:00:00'),
(3, 2, '2014-09-30 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
 ADD PRIMARY KEY (`id_detalle_venta`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
 ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
 ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
MODIFY `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
