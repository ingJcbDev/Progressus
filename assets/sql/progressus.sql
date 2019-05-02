-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2019 a las 05:20:37
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `progressus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `descrpcion` varchar(30) NOT NULL,
  `url` varchar(50) DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT '0',
  `sw_estado` int(11) NOT NULL DEFAULT '1' COMMENT '(1) Activo - (0) Inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`menu_id`, `descrpcion`, `url`, `orden`, `sw_estado`) VALUES
(1, 'Gestion de Usuarios', 'vistas/usuario.php', 1, 1),
(2, 'Gestion de Temas', NULL, 2, 1),
(3, 'Temas', NULL, 3, 1),
(4, 'Juegos', NULL, 5, 1),
(5, 'Reporte Evaluacion', NULL, 4, 1),
(6, 'Inicio', 'index.php', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_submenu`
--

CREATE TABLE `menu_submenu` (
  `menu_submenu_id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `perfil_id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`perfil_id`, `descripcion`) VALUES
(1, 'Root'),
(2, 'Profesor'),
(3, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_menu`
--

CREATE TABLE `perfil_menu` (
  `perfil_menu_id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil_menu`
--

INSERT INTO `perfil_menu` (`perfil_menu_id`, `perfil_id`, `menu_id`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 1, 6),
(4, 1, 3),
(5, 1, 5),
(6, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu`
--

CREATE TABLE `submenu` (
  `submenu_id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `num_documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `login`, `clave`, `condicion`) VALUES
(26, 'stevan fernandez', 'TI', '1005893728', 'calle 72a #4-35', '4867597', 'fer.s29@hotmail.com', 'stevan1', 'stevan', 1),
(29, 'katherine', 'CC', '122335555555', 'yumbo', '6666666', 'katherine@gmail.com', 'katherine', '1', 1),
(30, 'dario cabrera cardenas', 'CC', '333333333337', 'cauca seco', '55347837', 'dario@gmail.com', 'dario', '1', 1),
(31, 'andres', 'TI', '33333333', 'palmira', '34356789', 'andres@gmail.com', 'andres', '1', 1),
(32, 'jonier cabrera', 'CC', '2344343434', 'cauca seco', '547646656', 'jonier.cabrera', 'jonier.cabrera', '1', 1),
(33, 'tania gutierrez', 'CC', '34567890', 'yumbo', '3456543543', 'tania@gmail.com', 'tania', '1', 0),
(34, 'jacobo gutierrez', 'RC', '356453656345', 'yumbo', '32143424534', 'jacobo@gmail.com', 'jacobo', '1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_perfil`
--

CREATE TABLE `usuario_perfil` (
  `usuario_perfil_id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_perfil`
--

INSERT INTO `usuario_perfil` (`usuario_perfil_id`, `idusuario`, `perfil_id`) VALUES
(32, 32, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indices de la tabla `menu_submenu`
--
ALTER TABLE `menu_submenu`
  ADD PRIMARY KEY (`menu_submenu_id`),
  ADD KEY `submenu_menu_submenu_fk` (`submenu_id`),
  ADD KEY `menu_menu_submenu_fk` (`menu_id`),
  ADD KEY `usuario_menu_submenu_fk` (`idusuario`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`perfil_id`);

--
-- Indices de la tabla `perfil_menu`
--
ALTER TABLE `perfil_menu`
  ADD PRIMARY KEY (`perfil_menu_id`),
  ADD KEY `menu_perfil_menu_fk` (`menu_id`),
  ADD KEY `perfil_perfil_menu_fk` (`perfil_id`);

--
-- Indices de la tabla `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`submenu_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- Indices de la tabla `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  ADD PRIMARY KEY (`usuario_perfil_id`),
  ADD KEY `perfil_usuario_perfil_fk` (`perfil_id`),
  ADD KEY `usuario_usuario_perfil_fk` (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `menu_submenu`
--
ALTER TABLE `menu_submenu`
  MODIFY `menu_submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `perfil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `perfil_menu`
--
ALTER TABLE `perfil_menu`
  MODIFY `perfil_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `submenu`
--
ALTER TABLE `submenu`
  MODIFY `submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  MODIFY `usuario_perfil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `menu_submenu`
--
ALTER TABLE `menu_submenu`
  ADD CONSTRAINT `menu_menu_submenu_fk` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `submenu_menu_submenu_fk` FOREIGN KEY (`submenu_id`) REFERENCES `submenu` (`submenu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_menu_submenu_fk` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `perfil_menu`
--
ALTER TABLE `perfil_menu`
  ADD CONSTRAINT `menu_perfil_menu_fk` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `perfil_perfil_menu_fk` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`perfil_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  ADD CONSTRAINT `perfil_usuario_perfil_fk` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`perfil_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_usuario_perfil_fk` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
