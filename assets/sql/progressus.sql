-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2019 a las 06:13:30
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
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `materias_id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`materias_id`, `descripcion`) VALUES
(1, 'Matematicas grado 6'),
(2, 'Sociales grado 6'),
(3, 'Quimica grado 6'),
(4, 'Matematicas grado 7'),
(5, 'Sociales grado 7'),
(6, 'Quimica grado 7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `descrpcion` varchar(30) NOT NULL,
  `url` varchar(50) DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT '0',
  `sw_submenu` int(11) NOT NULL DEFAULT '0' COMMENT 'Aplica submenu ((1) Si o (0) No)',
  `sw_estado` int(11) NOT NULL DEFAULT '1' COMMENT '(1) Activo - (0) Inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`menu_id`, `descrpcion`, `url`, `orden`, `sw_submenu`, `sw_estado`) VALUES
(1, 'Gestion de Usuarios', 'vistas/usuario.php', 1, 0, 1),
(2, 'Gestion de Temas', '#', 2, 1, 1),
(3, 'Temas', '#', 3, 1, 1),
(4, 'Juegos', '#', 5, 0, 1),
(5, 'Reporte Evaluacion', '#', 4, 0, 1),
(6, 'Inicio', 'index.php', 0, 0, 1);

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

--
-- Volcado de datos para la tabla `menu_submenu`
--

INSERT INTO `menu_submenu` (`menu_submenu_id`, `idusuario`, `menu_id`, `submenu_id`) VALUES
(1, 32, 2, 1),
(2, 32, 2, 2),
(3, 32, 2, 3),
(4, 32, 2, 4),
(5, 32, 2, 5),
(6, 32, 2, 6),
(7, 32, 3, 1),
(8, 32, 3, 2),
(9, 32, 3, 3),
(10, 32, 3, 4),
(11, 32, 3, 5),
(12, 32, 3, 6);

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
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `periodo_id` int(11) NOT NULL,
  `materias_id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `sw_estado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `pregunta_id` int(11) NOT NULL,
  `periodo_id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `sw_estado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_detalle`
--

CREATE TABLE `pregunta_detalle` (
  `pregunta_detalle_id` int(11) NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `respuesta` varchar(1) NOT NULL,
  `sw_estado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `respuestas_id` int(11) NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `respuesta` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu`
--

CREATE TABLE `submenu` (
  `submenu_id` int(11) NOT NULL,
  `url` varchar(60) DEFAULT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `submenu`
--

INSERT INTO `submenu` (`submenu_id`, `url`, `descripcion`) VALUES
(1, 'vistas/materias.php', 'Grado 6'),
(2, 'vistas/materias.php', 'Grado 7'),
(3, 'vistas/materias.php', 'Grado 8'),
(4, 'vistas/materias.php', 'Grado 9'),
(5, 'vistas/materias.php', 'Grado 10'),
(6, 'vistas/materias.php', 'Grado 11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu_materias`
--

CREATE TABLE `submenu_materias` (
  `submenu_marterias_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL,
  `materias_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `submenu_materias`
--

INSERT INTO `submenu_materias` (`submenu_marterias_id`, `submenu_id`, `materias_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6);

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
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`materias_id`);

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
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`periodo_id`),
  ADD KEY `materias_periodo_fk` (`materias_id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`pregunta_id`),
  ADD KEY `periodo_preguntas_fk` (`periodo_id`);

--
-- Indices de la tabla `pregunta_detalle`
--
ALTER TABLE `pregunta_detalle`
  ADD PRIMARY KEY (`pregunta_detalle_id`),
  ADD KEY `preguntas_pregunta_detalle_fk` (`pregunta_id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`respuestas_id`),
  ADD KEY `preguntas_respuestas_fk` (`pregunta_id`);

--
-- Indices de la tabla `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`submenu_id`);

--
-- Indices de la tabla `submenu_materias`
--
ALTER TABLE `submenu_materias`
  ADD PRIMARY KEY (`submenu_marterias_id`),
  ADD KEY `materias_submenu_materias_fk` (`materias_id`),
  ADD KEY `submenu_submenu_materias_fk` (`submenu_id`);

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
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `materias_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `menu_submenu`
--
ALTER TABLE `menu_submenu`
  MODIFY `menu_submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `perfil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `perfil_menu`
--
ALTER TABLE `perfil_menu`
  MODIFY `perfil_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `periodo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `pregunta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pregunta_detalle`
--
ALTER TABLE `pregunta_detalle`
  MODIFY `pregunta_detalle_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `respuestas_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `submenu`
--
ALTER TABLE `submenu`
  MODIFY `submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `submenu_materias`
--
ALTER TABLE `submenu_materias`
  MODIFY `submenu_marterias_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Filtros para la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD CONSTRAINT `materias_periodo_fk` FOREIGN KEY (`materias_id`) REFERENCES `materias` (`materias_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `periodo_preguntas_fk` FOREIGN KEY (`periodo_id`) REFERENCES `periodo` (`periodo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pregunta_detalle`
--
ALTER TABLE `pregunta_detalle`
  ADD CONSTRAINT `preguntas_pregunta_detalle_fk` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`pregunta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `preguntas_respuestas_fk` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`pregunta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `submenu_materias`
--
ALTER TABLE `submenu_materias`
  ADD CONSTRAINT `materias_submenu_materias_fk` FOREIGN KEY (`materias_id`) REFERENCES `materias` (`materias_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `submenu_submenu_materias_fk` FOREIGN KEY (`submenu_id`) REFERENCES `submenu` (`submenu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
