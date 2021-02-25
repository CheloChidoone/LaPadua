-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-03-2019 a las 04:56:19
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_orden_restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

DROP TABLE IF EXISTS `direccion`;
CREATE TABLE IF NOT EXISTS `direccion` (
  `NombreDireccion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `CodigoPostal` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NumeroInterno` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NumeroExterno` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Colonia` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Calle` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cruzamientos` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `InfoAdicional` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`NombreDireccion`,`IdUsuario`),
  KEY `IdUsuario` (`IdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`NombreDireccion`, `IdUsuario`, `CodigoPostal`, `NumeroInterno`, `NumeroExterno`, `Colonia`, `Calle`, `Cruzamientos`, `InfoAdicional`) VALUES
('casa', 11, '90000', '477', '10', 'heroes', '10', '54diag y 160', 'porton negro casa blanca'),
('Departamentoo', 3, '65342', '99', '', 'Altabrisa', '50', '49x53', 'Muy Lejos de Aquii'),
('La Guarida', 4, '77500', NULL, '35', 'Chuburná', '21', '28x30', 'Reja blanca, Casa Blanca'),
('La Kueva', 5, '23456', '87', '40', 'Heroes', '96', '69x66', 'Tocar antes de entrar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `NumeroPlatillo` int(11) NOT NULL AUTO_INCREMENT,
  `NombrePlatillo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Seccion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descripcion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PrecioUnitario` decimal(12,2) NOT NULL,
  `Disponibilidad` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Imagen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`NumeroPlatillo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`NumeroPlatillo`, `NombrePlatillo`, `Seccion`, `Descripcion`, `PrecioUnitario`, `Disponibilidad`, `Imagen`) VALUES
(1, 'Hamburguesa Clásica', 'Hamburguesas', 'Hamburguesa de res con salsa especial de la casa y queso americano', '7500.00', 'Disponible', 'IMG/4.jpg'),
(2, 'Hamburguesa Vegetariana', 'Hamburguesas', 'Hamburguesa de frijol negro y pimiento con salsa de la casa', '85.00', 'Disponible', 'IMG/5.jpg'),
(3, 'Pizza Hawaiiana', 'Pizzas', 'Pizza con queso mozzarella, salsa de tomate, piña y jamón', '80.00', 'Disponible', 'IMG/2.jpg'),
(4, 'Pizza Pepperoni', 'Pizzas', 'Pizza con queso mozzarella, salsa de tomate y pepperoni', '90.00', 'Disponible', 'IMG/1.jpg'),
(5, 'Spaghetti Bolognese', 'Pastas', 'Spaghetti con salsa bolognesa, queso y carne molida', '200.00', 'Disponible', 'IMG/16.jpg'),
(6, 'Lasagna de la casa', 'Pastas', 'Lasagna con la receta secreta de la abuelita del chef', '200.00', 'Disponible', 'IMG/15.jpg'),
(7, 'Gelatto di Baileys', 'Postres', 'Para los atrevidos, helado natural de baileys', '75.00', 'Disponible', 'IMG/14.jpg'),
(8, 'Tiramisú', 'Postres', 'Tiramisú humedecido en café, con crema y espolvoreado de chocolate ', '85.00', 'Disponible', 'IMG/13.jpg'),
(9, 'Panna Cotta', 'Postres', 'Panna Cotta elaborada a partir de crema de leche, adornada con mermeladas de fruta. Panna Cotta elaborada a partir de crema de leche, adornada con mermeladas de fruta.Panna Cotta elaborada a partir de crema de leche, adornada con mermeladas de fruta.', '60.50', 'Disponible', 'IMG/12.jpg'),
(10, 'Agua Natural', 'Bebidas', 'Aguas frescas de la casa, cambian de acuerdo a la fruta de la temporada', '30.00', 'Disponible', 'IMG/11.png'),
(11, 'Refresco', 'Bebidas', 'Refrescos de diversas partes del mundo con sabores exoticos', '35.00', 'Disponible', 'IMG/6.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

DROP TABLE IF EXISTS `orden`;
CREATE TABLE IF NOT EXISTS `orden` (
  `NumeroOrden` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FechaHora` datetime NOT NULL,
  `UsuarioCliente` int(11) NOT NULL,
  `Estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Subtotal` decimal(12,2) NOT NULL,
  `Impuestos` decimal(12,2) NOT NULL,
  `Descuentos` decimal(12,2) DEFAULT NULL,
  `Propina` decimal(12,2) DEFAULT NULL,
  `Total` decimal(12,2) NOT NULL,
  `FormaPago` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UsuarioAdministrador` int(11) NOT NULL,
  `UsuarioRepartidor` int(11) NOT NULL,
  PRIMARY KEY (`NumeroOrden`),
  KEY `UsuarioCliente` (`UsuarioCliente`),
  KEY `UsuarioAdministrador` (`UsuarioAdministrador`),
  KEY `UsuarioRepartidor` (`UsuarioRepartidor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenmenu`
--

DROP TABLE IF EXISTS `ordenmenu`;
CREATE TABLE IF NOT EXISTS `ordenmenu` (
  `NumeroOrden` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NumeroPlatillo` int(11) NOT NULL,
  `PrecioUnitario` decimal(12,2) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`NumeroOrden`,`NumeroPlatillo`),
  KEY `NumeroPlatillo` (`NumeroPlatillo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Clave` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nombres` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ApellidoPaterno` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ApellidoMaterno` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telefono` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CorreoElectronico` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TipoUsuario` enum('Cliente','Repartidor','Administrador','Dueño') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`IdUsuario`),
  UNIQUE KEY `Telefono` (`Telefono`),
  UNIQUE KEY `CorreoElectronico` (`CorreoElectronico`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `Clave`, `Nombres`, `ApellidoPaterno`, `ApellidoMaterno`, `Telefono`, `CorreoElectronico`, `TipoUsuario`) VALUES
(3, 'DestruirHumanos666', 'Luis Manuel', 'Ojeda', 'Bonilla', '9999652345', 'luis_el_genial@yahoo.com.mx', 'Cliente'),
(4, 'Extremewrestling98', 'Marcelo', 'Torres', 'Pardo', '9981006710', 'chelot06@gmail.com', 'Administrador'),
(5, 'elUnicoMartinez777', 'Luis Javier', 'Martínez', 'Fernandez', '9998754320', 'lugamafe@alumno.uady.mx', 'Dueño'),
(11, '123', 'luis javier', 'martinez', 'fernandez', '99999999', 'luisjavier004@hotmail.com', 'Cliente');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`UsuarioCliente`) REFERENCES `usuario` (`IdUsuario`),
  ADD CONSTRAINT `orden_ibfk_2` FOREIGN KEY (`UsuarioAdministrador`) REFERENCES `usuario` (`IdUsuario`),
  ADD CONSTRAINT `orden_ibfk_3` FOREIGN KEY (`UsuarioRepartidor`) REFERENCES `usuario` (`IdUsuario`);

--
-- Filtros para la tabla `ordenmenu`
--
ALTER TABLE `ordenmenu`
  ADD CONSTRAINT `ordenmenu_ibfk_1` FOREIGN KEY (`NumeroPlatillo`) REFERENCES `menu` (`NumeroPlatillo`),
  ADD CONSTRAINT `ordenmenu_ibfk_2` FOREIGN KEY (`NumeroOrden`) REFERENCES `orden` (`NumeroOrden`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
