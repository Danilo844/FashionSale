-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2015 a las 02:51:54
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `minii`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_CatalogoEstadoHabilitar`(IN `p_idCatalogo` INT)
    NO SQL
update catalogo set estado = 1 where idCatalogo = p_idCatalogo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_CatalogoEstadoInhabilitar`(IN `p_idCatalogo` INT)
    NO SQL
update catalogo set estado = 0
where idCatalogo = p_idCatalogo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_CategoriaEstadoHabilitar`(IN `p_idCategoria` INT)
    NO SQL
update categoria set estado = 1 where idCategoria = p_idCategoria$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_CategoriaEstadoInhabilitar`(IN `p_idCategoria` INT)
    NO SQL
update categoria set estado = 0
where idCategoria = p_idCategoria$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ClientesConsultar`(IN `p_Cedula` VARCHAR(30))
    NO SQL
select Cedula,NombreUsuario,Correo,Password,Estado,idRoles from usuario
where Cedula = p_Cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ClientesEstadoHabilitar`(IN `p_Cedula` VARCHAR(30))
    NO SQL
update usuario set Estado = 1
where Cedula = p_Cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ClientesEstadoInhabilitar`(IN `p_Cedula` VARCHAR(30))
    NO SQL
update usuario set Estado = 0
where Cedula = p_Cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ClientesListar`()
    NO SQL
select Cedula,NombreUsuario,Correo,Password,Estado,idRoles
from usuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ClientesRegistrar`(IN `p_Cedula` VARCHAR(30), IN `p_NombreUsuario` VARCHAR(60), IN `p_Correo` VARCHAR(60), IN `p_Password` VARCHAR(60), IN `p_Estado` BIT(1), IN `p_idRoles` INT)
    NO SQL
insert into usuario values 
(p_Cedula,p_NombreUsuario,p_Correo,p_Password,1,p_idRoles)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_comunicacionConsultar`(IN `p_Codigo` INT)
    NO SQL
select Codigo, Nombre, Descripcion, Estado from comunicacion
where Codigo = p_Codigo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_comunicacionEstadoHabilitar`(IN `p_Codigo` INT)
    NO SQL
update comunicacion set Estado = 1 where Codigo = p_Codigo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_comunicacionEstadoInhabilitar`(IN `p_Codigo` INT)
    NO SQL
update comunicacion set Estado = 0
where Codigo = p_Codigo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_comunicacionListar`()
    NO SQL
select Codigo, Nombre, Descripcion, Estado from comunicacion$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_comunicacionModificar`(IN `p_Codigo` INT, IN `p_Nombre` VARCHAR(60), IN `p_Descripcion` TEXT)
    NO SQL
update comunicacion set Nombre = p_Nombre,Descripcion = p_Descripcion
where Codigo = p_Codigo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_comunicacionRegistrar`(IN `p_Nombre` VARCHAR(60), IN `p_Descripcion` TEXT, IN `p_Estado` BIT(1))
    NO SQL
insert into comunicacion values(0,p_Nombre,p_Descripcion,1)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ConsultarCatalogo`(IN `p_idCatalogo` INT)
    NO SQL
select idCatalogo, nombre, descripcion from catalogo
where idCatalogo = p_idCatalogo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ConsultarCategoria`(IN `p_idCategoria` INT)
    NO SQL
select idCategoria, nombre, descripcion from categoria
where idCategoria = p_idCategoria$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_existeCedula`(IN `p_Cedula` VARCHAR(30))
    NO SQL
select Cedula from usuario 
where Cedula = p_Cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_existeCorreo`(IN `p_Cedula` VARCHAR(30))
    NO SQL
select Correo from usuario 
where Cedula = p_Cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listarCatalogo`()
    NO SQL
select idCatalogo, nombre, descripcion, estado from catalogo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listarCategoria`()
    NO SQL
select idCategoria, nombre, descripcion, estado from categoria$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listarModulos`(IN `p_idRol` INT)
    NO SQL
select p.idPermisos, p.url, p.Nombre 
from permisosroles pr
inner join permisos p on (p.idPermisos = pr.idPermisos)
where pr.idRoles = p_idRol$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Login`(IN `p_Cedula` VARCHAR(60))
    NO SQL
select Cedula, NombreUsuario, Correo, Password,Estado, idRoles from usuario
where Cedula = p_Cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_modificarCatalogo`(IN `p_idCatalogo` INT, IN `p_Nombre` VARCHAR(40), IN `p_Descripcion` VARCHAR(40))
    NO SQL
update catalogo set nombre = p_Nombre, descripcion = p_Descripcion
where idCatalogo = p_idCatalogo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_modificarCategoria`(IN `p_idCategoria` INT, IN `p_nombre` VARCHAR(40), IN `p_descripcion` TEXT)
    NO SQL
update categoria set nombre = p_Nombre, descripcion = p_Descripcion
where idCategoria = p_idCategoria$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_passwordModificar`(IN `p_Cedula` INT, IN `p_Password` VARCHAR(60))
    NO SQL
update usuario set Password = p_Password
where Cedula = p_Cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_PermisosListar`()
    NO SQL
SELECT idPermisos,Nombre FROM permisos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_permisosRol`(IN `p_idRoles` INT, IN `p_idPermisos` INT)
    NO SQL
insert into permisosroles values
(0,p_idRoles,p_idPermisos)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_PermisosRolListar`(IN `p_idRol` INT)
    NO SQL
SELECT idPermisosRoles,idRoles,idPermisos FROM permisosroles WHERE idRoles = p_idRol$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_publicacionRegistrar`(IN `p_Codigo` INT, IN `p_Empleado` INT, IN `p_Comunicacion` VARCHAR(60), IN `p_Descripcion` TEXT)
    NO SQL
insert into publicaciones values(0,p_Empleado,p_Comunicacion,p_Descripcion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_recuperarContrasena`(IN `p_Correo` VARCHAR(60))
    NO SQL
select Correo, NombreUsuario from usuario
where Correo = p_Correo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RegistrarCatalogo`(IN `p_Nombre` VARCHAR(40), IN `p_Descripcion` TEXT, IN `p_Estado` BIT(1))
    NO SQL
insert into catalogo values (0,p_Nombre,p_Descripcion,1)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RegistrarCategoria`(IN `p_Nombre` VARCHAR(40), IN `p_Descripcion` TEXT, IN `p_Estado` BIT(1))
    NO SQL
insert into categoria values (0,p_Nombre,p_Descripcion,1)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RolesConsultar`(IN `p_idRol` INT)
    NO SQL
select idRoles, Nombre, Estado from roles
where idRoles = p_idRol$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RolesEstadoHabilitar`(IN `p_idRoles` INT)
    NO SQL
update roles set Estado = 1 where idRoles = p_idRoles$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RolesEstadoInhabilitar`(IN `p_idRoles` INT)
    NO SQL
update roles set Estado = 0
where idRoles = p_idRoles$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RolesListar`()
    NO SQL
select idRoles, Nombre, Estado from roles$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_rolesListarPermisos`()
    NO SQL
select idRoles, Nombre, Estado from roles order by idRoles desc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RolesModificar`(IN `p_idRol` INT, IN `p_Nombre` VARCHAR(60))
    NO SQL
update roles set Nombre = p_Nombre
where idRoles = p_idRol$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RolesRegistrar`(IN `p_Nombre` VARCHAR(60), IN `p_Estado` BIT(1))
    NO SQL
insert into roles values(0,p_Nombre,1)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_TallasConsultar`(IN `p_idTalla` INT)
    NO SQL
select idTalla, NombreTalla, Estado, Descripcion from tallas
where idTalla = p_idTalla$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_TallasEstadoHabilitar`(IN `p_idTalla` INT)
    NO SQL
update tallas set Estado = 1 where idTalla = p_idTalla$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_TallasEstadoInhabilitar`(IN `p_idTalla` INT)
    NO SQL
update tallas set Estado = 0
where idTalla = p_idTalla$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_TallasListar`()
    NO SQL
select idTalla, NombreTalla, Estado, Descripcion from tallas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_TallasModificar`(IN `p_idTalla` INT, IN `p_NombreTalla` VARCHAR(60), IN `p_Descripcion` TEXT)
    NO SQL
update tallas set NombreTalla = p_NombreTalla, Descripcion = p_Descripcion
where idTalla = p_idTalla$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_TallasRegistrar`(IN `p_NombreTalla` VARCHAR(10) CHARSET utf8, IN `p_Estado` BIT(1), IN `p_Descripcion` TEXT CHARSET utf8)
    NO SQL
insert into tallas values(0,p_NombreTalla,1,p_Descripcion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ultimoRol`()
    NO SQL
select max(idRoles) from roles$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_UsuariosConsultar`(IN `p_idUsuario` INT)
    NO SQL
select Cedula,NombreUsuario,Correo,Password,Estado,idRoles from usuario
where cedula = p_idUsuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_UsuariosEstadoHabilitar`(IN `p_idUsuario` INT)
    NO SQL
update usuario set Estado = 1
where Cedula = p_idUsuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_UsuariosEstadoInhabilitar`(IN `p_idUsuario` INT)
    NO SQL
update usuario set Estado = 0
where Cedula = p_idUsuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_UsuariosListar`()
    NO SQL
select Cedula,NombreUsuario,Correo,Password,Estado,idRoles
from usuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_UsuariosModificar`(IN `p_Cedula` INT, IN `p_Nombre` VARCHAR(60), IN `p_Correo` VARCHAR(60))
    NO SQL
update usuario set NombreUsuario = p_Nombre, Correo = p_Correo
where Cedula = p_Cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_UsuariosRegistrar`(IN `p_Cedula` INT(60), IN `p_NombreUsuario` VARCHAR(60), IN `p_Correo` VARCHAR(60), IN `p_Password` VARCHAR(60), IN `p_Estado` BIT, IN `p_idRoles` INT)
    NO SQL
insert into usuario values (p_Cedula,p_NombreUsuario,p_Correo,p_Password,1,p_idRoles)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE IF NOT EXISTS `catalogo` (
`idCatalogo` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `estado` bit(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`idCatalogo`, `nombre`, `descripcion`, `estado`) VALUES
(15, 'Hombre', 'Prendas de vestir para Jovenes y Adultos', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
`idCategoria` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` bit(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombre`, `descripcion`, `estado`) VALUES
(0, 'Caballeros', 'Masculino\r\n', b'1'),
(1, 'sss', ' sssss', b'1'),
(2, 'sss', 'aaa', b'1'),
(3, 'Blusas', 'Prenda de vestir para damas', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `Cedula` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `NombreCliente` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Correo` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Password` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Estado` bit(1) NOT NULL,
  `idRoles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Cedula`, `NombreCliente`, `Correo`, `Password`, `Estado`, `idRoles`) VALUES
('1020474498', 'Daniel', 'danilo.dh300@hotmail.com', 'Q8LcXbj5pHlllfgf0j8gts/U2w+knn8qLxOody/NVWs=', b'1', 2),
('123456987', 'Gustavo', 'tavo@hotmail.com', 'pEL13RQ6UE5SxVtGhawATRusiMMmNQgrU0gQA3+G8Ps=', b'1', 2),
('96031416440', 'Daniel Henao', 'daniel@hotmail.com', 'xp0G1EBBqMwt9rIaVqWsZEWwKwAAqSMXGetOzKWYmXU=', b'1', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunicacion`
--

CREATE TABLE IF NOT EXISTS `comunicacion` (
`Codigo` int(11) NOT NULL,
  `Nombre` varchar(60) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Descripcion` text COLLATE utf8mb4_spanish2_ci,
  `Estado` bit(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `comunicacion`
--

INSERT INTO `comunicacion` (`Codigo`, `Nombre`, `Descripcion`, `Estado`) VALUES
(1, 'eventos', 'comunicacion', b'1'),
(2, 'noticias', 'comunicacion', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
`idPermisos` int(11) NOT NULL,
  `Nombre` varchar(60) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `url` varchar(80) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idPermisos`, `Nombre`, `url`) VALUES
(1, 'Inicio', 'home/index'),
(2, 'Catalogos', 'catalogos/index'),
(3, 'Administracion', 'administracion/index'),
(4, 'Roles', 'roles/index'),
(5, 'Comunicación', 'comunicacion/index');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisosroles`
--

CREATE TABLE IF NOT EXISTS `permisosroles` (
`idPermisosRoles` int(11) NOT NULL,
  `idRoles` int(11) DEFAULT NULL,
  `idPermisos` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `permisosroles`
--

INSERT INTO `permisosroles` (`idPermisosRoles`, `idRoles`, `idPermisos`) VALUES
(1, 20, 4),
(2, 20, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
`Codigo` int(11) NOT NULL,
  `Empleado` int(11) DEFAULT NULL,
  `Comunicacion` varchar(60) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Descripcion` text COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`idRoles` int(11) NOT NULL,
  `Nombre` varchar(60) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Estado` bit(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRoles`, `Nombre`, `Estado`) VALUES
(20, 'Administrador', b'1'),
(21, 'vendedor', b'1'),
(23, 'cliente', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE IF NOT EXISTS `tallas` (
`idTalla` int(11) NOT NULL,
  `NombreTalla` varchar(10) COLLATE utf8_bin NOT NULL,
  `Estado` bit(1) NOT NULL,
  `Descripcion` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`idTalla`, `NombreTalla`, `Estado`, `Descripcion`) VALUES
(1, 'l', b'1', '55'),
(2, 'l', b'1', ''),
(3, 's', b'1', ''),
(4, 'xs', b'1', 'sfsff'),
(5, 'xlxl', b'1', 'kjlwefh lsdksdfja'),
(6, 'XL', b'1', 'Talla Extra Grande sfsf'),
(7, '2XL', b'1', 'Doble Extra Grande sfff'),
(8, 'xs', b'1', '7557557');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `Cedula` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `NombreUsuario` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Correo` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Password` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Estado` bit(1) DEFAULT NULL,
  `idRoles` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Cedula`, `NombreUsuario`, `Correo`, `Password`, `Estado`, `idRoles`) VALUES
('1020474498', 'Daniel', 'Daniel@hotmail.com', '1234567', b'0', 20),
('96031416440', 'Diego Morales', 'diego@hotmail.com', 'vE+2nvg3mvTNLhvvoz1hVYqQhJ8TptGYDwW+pmIFNtU=', b'1', 20);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
 ADD PRIMARY KEY (`idCatalogo`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`Cedula`);

--
-- Indices de la tabla `comunicacion`
--
ALTER TABLE `comunicacion`
 ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
 ADD PRIMARY KEY (`idPermisos`);

--
-- Indices de la tabla `permisosroles`
--
ALTER TABLE `permisosroles`
 ADD PRIMARY KEY (`idPermisosRoles`), ADD KEY `idRoles` (`idRoles`,`idPermisos`), ADD KEY `idPermisos` (`idPermisos`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
 ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`idRoles`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
 ADD PRIMARY KEY (`idTalla`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`Cedula`), ADD KEY `idRoles` (`idRoles`), ADD KEY `idRoles_2` (`idRoles`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
MODIFY `idCatalogo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `comunicacion`
--
ALTER TABLE `comunicacion`
MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
MODIFY `idPermisos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `permisosroles`
--
ALTER TABLE `permisosroles`
MODIFY `idPermisosRoles` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
MODIFY `idRoles` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
MODIFY `idTalla` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permisosroles`
--
ALTER TABLE `permisosroles`
ADD CONSTRAINT `permisosroles_ibfk_1` FOREIGN KEY (`idRoles`) REFERENCES `roles` (`idRoles`),
ADD CONSTRAINT `permisosroles_ibfk_2` FOREIGN KEY (`idPermisos`) REFERENCES `permisos` (`idPermisos`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `fk_ro_idRol` FOREIGN KEY (`idRoles`) REFERENCES `roles` (`idRoles`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
