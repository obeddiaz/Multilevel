-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2014 at 09:55 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `basicosa_cupones`
--

-- --------------------------------------------------------

--
-- Table structure for table `detalle_venta`
--

CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`id_detalle_venta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle_venta`, `cantidad`, `id_producto`, `id_venta`, `precio`) VALUES
(17, 1, 1, 13, 439),
(18, 1, 3, 14, 487),
(19, 1, 1, 15, 439),
(20, 1, 1, 16, 439),
(21, 4, 1, 17, 439),
(22, 4, 3, 17, 487);

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `estados`
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
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `menu`
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
-- Table structure for table `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `precio` double DEFAULT NULL,
  `ruta_imagen` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `ruta_imagen`, `descripcion`) VALUES
(1, 'Flores', 439, 'Tulips.jpg', 'test 3 bla bla bla '),
(3, 'Pinguinos', 487, 'Koala.jpg', 'Este es un koalacagado');

-- --------------------------------------------------------

--
-- Table structure for table `total_venta`
--

CREATE TABLE IF NOT EXISTS `total_venta` (
  `id_venta` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
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
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(100) NOT NULL DEFAULT 'usuario.jpg',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `password`, `nombre`, `apellido_paterno`, `apellido_materno`, `genero`, `estados_id_estado`, `email`, `telefono`, `celular`, `id_tipo_usuario`, `pago_inicial`, `fecha_nacimiento`, `id_usuario`, `foto`) VALUES
('obed', '45e148e9751f84e7b2323f8a0c4977bbe6a7b4c8', 'obed', 'diaz', 'rodriguez', 1, 1, 'obed.9@hotmail.com', '634564531', '', 3, 1, '1992-08-31', 1, 'usuario.jpg'),
('david', '45e148e9751f84e7b2323f8a0c4977bbe6a7b4c8', 'David', 'Díaz', 'rodriguez', 1, 1, 'obed.diaz@hotmail.com', '44856745641', '41234134', 2, 1, '1992-08-31', 2, 'usuario.jpg'),
('obed.diaz', '45e148e9751f84e7b2323f8a0c4977bbe6a7b4c8', 'Obed', 'Díaz ', 'Rodríguez', 1, 1, 'obed.9@hotmail.com', '151443', '2345234524', 2, 0, '1992-08-31', 3, 'usuario.jpg'),
('dias.obed', '45e148e9751f84e7b2323f8a0c4977bbe6a7b4c8', 'Obed', 'Díaz Rodríguez', 'gsdfgsdfg', 1, 1, 'obed.9@hotmail.com', '4325452', NULL, 2, 1, '1992-08-31', 4, 'usuario.jpg'),
('omar', '45e148e9751f84e7b2323f8a0c4977bbe6a7b4c8', 'omar', 'nieves', 'carrizales', 1, 1, 'obed.0@gmail.com', '449 -913649716', '130947819057', 2, 1, '1992-08-31', 5, 'usuario.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_afiliado`
--

CREATE TABLE IF NOT EXISTS `usuario_afiliado` (
  `id_usuario` int(11) NOT NULL,
  `id_usuario_inv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario_afiliado`
--

INSERT INTO `usuario_afiliado` (`id_usuario`, `id_usuario_inv`) VALUES
(1, 2),
(2, 4),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `fecha_venta` datetime NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_usuario`, `fecha_venta`) VALUES
(13, 2, '2014-10-01 00:00:00'),
(14, 4, '2014-10-01 00:00:00'),
(15, 4, '2014-10-01 00:00:00'),
(16, 2, '2014-10-01 00:00:00'),
(17, 5, '2014-10-01 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
