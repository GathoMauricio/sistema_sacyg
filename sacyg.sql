-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2015 a las 04:03:40
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sacyg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimento`
--

CREATE TABLE IF NOT EXISTS `alimento` (
  `id_alimento` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_alimento` int(11) NOT NULL,
  `alimento` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id_alimento`),
  KEY `fk_tipo_alimento` (`id_tipo_alimento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `alimento`
--

INSERT INTO `alimento` (`id_alimento`, `id_tipo_alimento`, `alimento`, `descripcion`, `precio`) VALUES
(1, 1, 'ATÚN', 'Trozos de atún fresco sellado servido sobre lechugas y aguacate con aderezo de soya con un toque de chile habanero.', 25.50),
(2, 1, 'CAPRESE', 'Frescas rodajas de jitomate, queso mozzarella, aceituna negra y albahaca. Con aderezo de eneldo.', 34.50),
(3, 2, 'MINESTRONE', 'Una sopa rara ,uuuy rara', 50.00),
(4, 2, 'SOPA DE TORTILLA', 'Tortillas remojadas como la comida del perro', 25.50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimento_orden`
--

CREATE TABLE IF NOT EXISTS `alimento_orden` (
  `id_alimento_orden` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `id_alimento` int(11) NOT NULL,
  KEY `fk_orden_alimento_orden` (`id_orden`),
  KEY `fk_alimento_orden_alimento` (`id_alimento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `id_direccion` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rfc_cliente` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `calle_numero` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `colonia` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `municipio` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cp` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `fk_direccion_cliente` (`id_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE IF NOT EXISTS `disponibilidad` (
  `id_disponibilidad` int(11) NOT NULL AUTO_INCREMENT,
  `estatus` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_disponibilidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `disponibilidad`
--

INSERT INTO `disponibilidad` (`id_disponibilidad`, `estatus`) VALUES
(1, 'Disponible'),
(2, 'Ocupada'),
(3, 'Reservada'),
(4, 'En reparación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ap_paterno` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ap_materno` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `calle_numero` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `colonia` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `municipio` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cp` varchar(110) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `fk_usuario` (`id_usuario`),
  KEY `fk_sucursal_empleado` (`id_sucursal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `id_usuario`, `id_sucursal`, `nombre`, `ap_paterno`, `ap_materno`, `fecha_nacimiento`, `telefono`, `email`, `calle_numero`, `colonia`, `municipio`, `cp`) VALUES
(1, 1, 1, 'Don Administrador', 'MeroMero', 'PipirisNice', '1987-08-27', '5515457898', 'administrador@sagyg.com', 'Oriente 9 #226', 'Reforma', 'Nezahualcoyotl', '57840');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `id_orden` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `fk_factura_orden` (`id_orden`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE IF NOT EXISTS `mesa` (
  `id_mesa` int(11) NOT NULL AUTO_INCREMENT,
  `id_sucursal` int(11) NOT NULL,
  `id_disponibilidad` int(11) NOT NULL,
  `numero_mesa` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  PRIMARY KEY (`id_mesa`),
  KEY `fk_mesa_sucursal` (`id_sucursal`),
  KEY `fk_mesa_disponibilidad` (`id_disponibilidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`id_mesa`, `id_sucursal`, `id_disponibilidad`, `numero_mesa`, `capacidad`) VALUES
(1, 1, 1, 1, 4),
(2, 1, 1, 2, 6),
(4, 2, 1, 1, 4),
(5, 2, 1, 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

CREATE TABLE IF NOT EXISTS `nomina` (
  `id_nomina` int(11) NOT NULL AUTO_INCREMENT,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `sueldo` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id_nomina`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `nomina`
--

INSERT INTO `nomina` (`id_nomina`, `hora_entrada`, `hora_salida`, `sueldo`) VALUES
(1, '08:00:00', '16:00:00', 1500.00),
(2, '09:00:00', '18:00:00', 1600.00),
(3, '07:00:00', '14:00:00', 1550.00),
(4, '09:00:00', '17:00:00', 1650.00),
(5, '07:00:00', '19:00:00', 3000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE IF NOT EXISTS `orden` (
  `id_orden` int(11) NOT NULL AUTO_INCREMENT,
  `total_orden` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id_orden`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_domicilio`
--

CREATE TABLE IF NOT EXISTS `pedido_domicilio` (
  `id_pedido_domicilio` int(11) NOT NULL AUTO_INCREMENT,
  `id_orden` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `total_orden` decimal(8,2) NOT NULL,
  `latitud` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `longitud` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_pedido_domicilio`),
  KEY `fk_pedido_domicilio_orden` (`id_orden`),
  KEY `fk_pedido_domicilio_cliente` (`id_cliente`),
  KEY `fk_pedido_domicilio_sucursal` (`id_sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE IF NOT EXISTS `reservacion` (
  `id_reservacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_mesa` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `numero_personas` int(11) NOT NULL,
  PRIMARY KEY (`id_reservacion`),
  KEY `fk_reservacion_mesa` (`id_mesa`),
  KEY `fk_reservacion_cliente` (`id_cliente`),
  KEY `fk_reservacion_orden` (`id_orden`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_rol` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `tipo_rol`) VALUES
(1, 'Administrador'),
(2, 'Mesero'),
(3, 'Repartidor'),
(4, 'Recopcionista'),
(5, 'Cocinero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE IF NOT EXISTS `sucursal` (
  `id_sucursal` int(11) NOT NULL AUTO_INCREMENT,
  `sucursal` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `mapa` varchar(1000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `calle_numero` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `colonia` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `delegacion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cp` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_sucursal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `sucursal`, `telefono`, `mapa`, `calle_numero`, `colonia`, `delegacion`, `cp`) VALUES
(1, 'SACYG Iztapalapa', '5548652365', '<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d60233.714497195186!2d-99.05017099999999!3d19.342845799999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1srestaurant+iztapalapa!5e0!3m2!1ses-419!2smx!4v1435881065879" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 'Av. Ignacio Zaragoza #130', 'Del Valle', 'Iztapalapa', '548521'),
(2, 'SACYG Sor Juana', '5545895623', '<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d60253.3111973169!2d-98.91260009999998!3d19.289672900000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1ssor+juana+restaurant!5e0!3m2!1ses-419!2smx!4v1435883785182" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 'Av Sor Juana #45', 'Benito Juarez', 'Nezahualcoyotl', '57489');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_alimento`
--

CREATE TABLE IF NOT EXISTS `tipo_alimento` (
  `id_tipo_alimento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_alimento` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_alimento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_alimento`
--

INSERT INTO `tipo_alimento` (`id_tipo_alimento`, `tipo_alimento`) VALUES
(1, 'ENSALADAS'),
(2, 'SOPAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `id_nomina` int(11) NOT NULL,
  `usuario` varchar(32) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contrasena` varchar(32) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_rol` (`id_rol`),
  KEY `fk_nomina` (`id_nomina`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_rol`, `id_nomina`, `usuario`, `contrasena`) VALUES
(1, 1, 1, '21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alimento`
--
ALTER TABLE `alimento`
  ADD CONSTRAINT `fk_tipo_alimento` FOREIGN KEY (`id_tipo_alimento`) REFERENCES `tipo_alimento` (`id_tipo_alimento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `alimento_orden`
--
ALTER TABLE `alimento_orden`
  ADD CONSTRAINT `fk_alimento_orden_alimento` FOREIGN KEY (`id_alimento`) REFERENCES `alimento` (`id_alimento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orden_alimento_orden` FOREIGN KEY (`id_orden`) REFERENCES `orden` (`id_orden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_sucursal_empleado` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura_orden` FOREIGN KEY (`id_orden`) REFERENCES `orden` (`id_orden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD CONSTRAINT `fk_mesa_disponibilidad` FOREIGN KEY (`id_disponibilidad`) REFERENCES `disponibilidad` (`id_disponibilidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mesa_sucursal` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido_domicilio`
--
ALTER TABLE `pedido_domicilio`
  ADD CONSTRAINT `fk_pedido_domicilio_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pedido_domicilio_orden` FOREIGN KEY (`id_orden`) REFERENCES `orden` (`id_orden`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pedido_domicilio_sucursal` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `fk_reservacion_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reservacion_mesa` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id_mesa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reservacion_orden` FOREIGN KEY (`id_orden`) REFERENCES `orden` (`id_orden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_nomina` FOREIGN KEY (`id_nomina`) REFERENCES `nomina` (`id_nomina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
