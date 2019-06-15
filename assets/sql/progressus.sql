-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2019 a las 17:26:37
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
(6, 'Quimica grado 7'),
(7, 'Biologia Grado 11'),
(8, 'Matematicas Grado 11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_periodos`
--

CREATE TABLE `materias_periodos` (
  `matrias_periodos_id` int(11) NOT NULL,
  `periodo_id` int(11) NOT NULL,
  `materias_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias_periodos`
--

INSERT INTO `materias_periodos` (`matrias_periodos_id`, `periodo_id`, `materias_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 1, 2),
(6, 2, 2),
(7, 3, 2),
(8, 4, 2),
(9, 1, 3),
(10, 2, 3),
(11, 3, 3),
(12, 4, 3),
(13, 1, 4),
(14, 2, 4),
(15, 3, 4),
(16, 4, 4),
(17, 1, 5),
(18, 2, 5),
(19, 3, 5),
(20, 4, 5),
(21, 1, 6),
(22, 2, 6),
(23, 3, 6),
(24, 4, 6),
(25, 1, 7),
(26, 2, 7),
(27, 3, 7),
(28, 4, 7),
(29, 1, 8),
(30, 2, 8),
(31, 3, 8),
(32, 4, 8);

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
(4, 'Juegos', 'vistas/juego.php', 5, 0, 1),
(5, 'Reporte Evaluacion', '#', 4, 1, 1),
(6, 'Inicio', 'index.php', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_submenu`
--

CREATE TABLE `menu_submenu` (
  `menu_submenu_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu_submenu`
--

INSERT INTO `menu_submenu` (`menu_submenu_id`, `menu_id`, `submenu_id`, `perfil_id`) VALUES
(1, 2, 1, 1),
(2, 2, 2, 1),
(3, 2, 3, 1),
(4, 2, 4, 1),
(5, 2, 5, 1),
(6, 2, 6, 1),
(7, 3, 1, 1),
(8, 3, 2, 1),
(9, 3, 3, 1),
(10, 3, 4, 1),
(11, 3, 5, 1),
(12, 3, 6, 1),
(13, 2, 1, 2),
(14, 2, 2, 2),
(15, 2, 3, 2),
(16, 2, 4, 2),
(17, 2, 5, 2),
(18, 2, 6, 2),
(19, 3, 1, 3),
(20, 3, 2, 4),
(21, 3, 3, 5),
(22, 3, 4, 6),
(23, 3, 5, 7),
(24, 3, 6, 8),
(25, 5, 7, 2),
(26, 5, 8, 3),
(27, 5, 8, 4),
(28, 5, 8, 5),
(29, 5, 8, 6),
(30, 5, 8, 7),
(31, 5, 8, 8),
(32, 5, 8, 1),
(33, 5, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_materia_periodo`
--

CREATE TABLE `nota_materia_periodo` (
  `nota_materia_periodo_id` int(11) NOT NULL,
  `materias_id` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `nota_periodo_1` decimal(10,1) NOT NULL,
  `nota_periodo_2` decimal(10,1) NOT NULL,
  `nota_periodo_3` decimal(10,1) NOT NULL,
  `nota_periodo_4` decimal(10,1) NOT NULL,
  `nota_final` decimal(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nota_materia_periodo`
--

INSERT INTO `nota_materia_periodo` (`nota_materia_periodo_id`, `materias_id`, `idusuario`, `nota_periodo_1`, `nota_periodo_2`, `nota_periodo_3`, `nota_periodo_4`, `nota_final`) VALUES
(1, 2, 39, '5.0', '0.0', '2.5', '5.0', '3.5'),
(2, 1, 39, '0.0', '0.0', '0.0', '0.0', '0.0'),
(3, 1, 32, '0.0', '0.0', '0.0', '0.0', '0.0'),
(4, 4, 42, '5.0', '0.0', '0.0', '0.0', '1.0'),
(5, 5, 42, '5.0', '0.0', '0.0', '0.0', '1.0');

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
(3, 'Estudiante Grado 6'),
(4, 'Estudiante Grado 7'),
(5, 'Estudiante Grado 8'),
(6, 'Estudiante Grado 9'),
(7, 'Estudiante Grado 10'),
(8, 'Estudiante Grado 11');

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
(6, 1, 4),
(7, 2, 6),
(8, 2, 2),
(10, 2, 4),
(11, 3, 6),
(12, 3, 3),
(13, 3, 4),
(14, 3, 5),
(15, 4, 6),
(16, 4, 3),
(17, 4, 4),
(18, 4, 5),
(19, 5, 6),
(20, 5, 3),
(21, 5, 4),
(22, 5, 5),
(23, 6, 6),
(24, 6, 3),
(25, 6, 4),
(26, 6, 5),
(27, 7, 6),
(28, 7, 3),
(29, 7, 4),
(30, 7, 5),
(31, 8, 6),
(32, 8, 3),
(33, 8, 4),
(34, 8, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `periodo_id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `sw_estado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`periodo_id`, `descripcion`, `sw_estado`) VALUES
(1, 'periodo 1', '1'),
(2, 'periodo 2', '1'),
(3, 'periodo 3', '1'),
(4, 'periodo 4', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos_temas`
--

CREATE TABLE `periodos_temas` (
  `periodos_temas_id` int(11) NOT NULL,
  `temas_id` int(11) NOT NULL,
  `periodo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodos_temas`
--

INSERT INTO `periodos_temas` (`periodos_temas_id`, `temas_id`, `periodo_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 2),
(5, 5, 3),
(6, 6, 4),
(7, 7, 1),
(8, 8, 2),
(9, 9, 4),
(10, 10, 3),
(11, 11, 4),
(12, 12, 1),
(13, 13, 2),
(14, 14, 3),
(15, 15, 4),
(16, 16, 3),
(17, 17, 3),
(18, 18, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `pregunta_id` int(11) NOT NULL,
  `periodos_temas_id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `sw_estado` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`pregunta_id`, `periodos_temas_id`, `descripcion`, `sw_estado`) VALUES
(1, 1, 'M 6 p 1', '1'),
(2, 2, 'M 7 P 1', '1'),
(3, 3, 'M 6 P 2', '1'),
(4, 4, 'M 6 P 2', '1'),
(5, 5, 'M 6 P 3', '1'),
(6, 6, 'M 6 P 4', '1'),
(7, 7, 'S 6 P 1', '1'),
(8, 8, 'S 6 P 2', '1'),
(9, 9, 'S 6 P 4', '1'),
(10, 10, 'M 7 P 3', '1'),
(11, 11, 'M 7 P 4', '1'),
(12, 12, 'S 7 P 1', '1'),
(13, 13, 'S 7 P 2', '1'),
(14, 14, 'S 7 P 3', '1'),
(15, 15, 'S 7 P 4', '1'),
(16, 16, 'S 6 P 3', '1'),
(17, 17, 'S 6 1 P 3', '1'),
(18, 18, 'Principalmente que estudia la quÃ­mica ', '1'),
(19, 18, 'La quÃ­mica se ocupa principalmente agrupaciones de ?', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_detalle`
--

CREATE TABLE `pregunta_detalle` (
  `pregunta_detalle_id` int(11) NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `respuesta` varchar(1) NOT NULL,
  `sw_estado` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta_detalle`
--

INSERT INTO `pregunta_detalle` (`pregunta_detalle_id`, `pregunta_id`, `descripcion`, `respuesta`, `sw_estado`) VALUES
(1, 1, '1', '1', '1'),
(2, 1, '2', '0', '1'),
(3, 1, '3', '0', '1'),
(4, 1, '4', '0', '1'),
(5, 2, '1', '0', '1'),
(6, 2, '2', '0', '1'),
(7, 2, '3', '0', '1'),
(8, 2, '4', '1', '1'),
(9, 3, '1', '0', '1'),
(10, 3, '2', '0', '1'),
(11, 3, '3', '0', '1'),
(12, 3, '4', '1', '1'),
(13, 4, '1', '1', '1'),
(14, 4, '2', '0', '1'),
(15, 4, '3', '0', '1'),
(16, 4, '4', '0', '1'),
(17, 5, '1', '0', '1'),
(18, 5, '2', '0', '1'),
(19, 5, '3', '1', '1'),
(20, 5, '6', '0', '1'),
(21, 6, '1', '1', '1'),
(22, 6, '2', '0', '1'),
(23, 6, '3', '0', '1'),
(24, 6, '4', '0', '1'),
(25, 7, '1', '0', '1'),
(26, 7, '2', '0', '1'),
(27, 7, '3', '0', '1'),
(28, 7, '4', '1', '1'),
(29, 8, '1', '0', '1'),
(30, 8, '2', '0', '1'),
(31, 8, '4', '0', '1'),
(32, 8, '3', '1', '1'),
(33, 9, '1', '1', '1'),
(34, 9, '2', '0', '1'),
(35, 9, '3', '0', '1'),
(36, 9, '4', '0', '1'),
(37, 10, '1', '0', '1'),
(38, 10, '2', '0', '1'),
(39, 10, '3', '0', '1'),
(40, 10, '4', '1', '1'),
(41, 11, '1', '0', '1'),
(42, 11, '2', '0', '1'),
(43, 11, '3', '0', '1'),
(44, 11, '4', '1', '1'),
(45, 12, '1', '0', '1'),
(46, 12, '2', '0', '1'),
(47, 12, '3', '0', '1'),
(48, 12, '4', '1', '1'),
(49, 13, '1', '0', '1'),
(50, 13, '1', '0', '1'),
(51, 13, '1', '0', '1'),
(52, 13, '1', '1', '1'),
(53, 14, '1', '0', '1'),
(54, 14, '2', '0', '1'),
(55, 14, '3', '0', '1'),
(56, 14, '4', '1', '1'),
(57, 15, '1', '0', '1'),
(58, 15, '2', '0', '1'),
(59, 15, '3', '0', '1'),
(60, 15, '4', '1', '1'),
(61, 16, '1', '0', '1'),
(62, 16, '2', '0', '1'),
(63, 16, '3', '0', '1'),
(64, 16, '4', '1', '1'),
(65, 17, '1', '0', '1'),
(66, 17, '2', '0', '1'),
(67, 17, '3', '0', '1'),
(68, 17, '4', '1', '1'),
(69, 18, 'Numeros', '0', '1'),
(70, 18, 'El mapa', '0', '1'),
(71, 18, 'composiciÃ³n, estructura y propiedades de la materia', '1', '1'),
(72, 18, 'La luna', '0', '1'),
(73, 19, 'fÃºtbol ', '0', '1'),
(74, 19, 'supraatÃ³micas', '1', '1'),
(75, 19, 'tenis ', '0', '1'),
(76, 19, 'musica', '0', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `respuestas_id` int(11) NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `pregunta_detalle_id` int(11) NOT NULL,
  `temas_notas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`respuestas_id`, `pregunta_id`, `pregunta_detalle_id`, `temas_notas_id`) VALUES
(1, 16, 64, 1),
(2, 17, 66, 2),
(3, 7, 28, 3),
(4, 8, 31, 4),
(5, 9, 33, 5),
(6, 1, 4, 6),
(7, 4, 16, 7),
(8, 5, 20, 8),
(9, 6, 24, 9),
(10, 1, 4, 10),
(11, 4, 14, 11),
(12, 5, 20, 12),
(13, 5, 20, 13),
(14, 5, 20, 14),
(15, 5, 20, 15),
(16, 2, 8, 16),
(17, 12, 48, 17);

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
(6, 'vistas/materias.php', 'Grado 11'),
(7, 'vistas/reporte_profesor.php', 'Reporte Notas'),
(8, 'vistas/reporte_estudiante.php', 'Reporte Mis Notas');

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
(6, 2, 6),
(7, 6, 7),
(8, 6, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_variables`
--

CREATE TABLE `system_variables` (
  `variable_id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `detalle` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `system_variables`
--

INSERT INTO `system_variables` (`variable_id`, `descripcion`, `valor`, `detalle`) VALUES
(1, 'cantidadPreguntas', '3', NULL),
(2, 'porcentaje_notas', '0.2|0.2|0.2|0.4', 'porcentaje de las cada nota separados por un | deben ser solo 4 parametros -nota1,nota2,nota3,nota4-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `temas_id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `materias_id` int(11) DEFAULT NULL,
  `descripcion` mediumtext NOT NULL,
  `sw_estado` varchar(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`temas_id`, `titulo`, `materias_id`, `descripcion`, `sw_estado`) VALUES
(1, 'M 6 p 1', 1, 'tema 1', '1'),
(2, 'M 7 P 1', 4, 'tema 2', '1'),
(3, 'M 6 P 2', 4, 'tema 3', '1'),
(4, 'M 6 P 2', 1, 'tema 4', '1'),
(5, 'M 6 P 3', 1, 'tema 5', '1'),
(6, 'M 6 P 4', 1, 'tema 6', '1'),
(7, 'S 6 P 1', 2, 'tema 7', '1'),
(8, 'S 6 P 2', 2, 'tema 8', '1'),
(9, 'S 6 P 4', 2, 'tema 9', '1'),
(10, 'M 7 P 3', 4, 'tema 10', '1'),
(11, 'M 7 P 4', 4, 'tema 11', '1'),
(12, 'S 7 P 1', 5, 'tema 12', '1'),
(13, 'S 7 P 2', 5, 'tema 13', '1'),
(14, 'S 7 P 3', 5, 'tema 14', '1'),
(15, 'S 7 P 4', 5, 'tema 15', '1'),
(16, 'S 6 P 3', 2, 'tema 16', '1'),
(17, 'S 6 1 P 3', 2, 'tema 17', '1'),
(18, 'Quimina periodo 1 ', 3, 'La quÃ­mica es la ciencia que estudia la composiciÃ³n, estructura y propiedades de la materia, asÃ­ como los cambios que esta experimenta durante las reacciones quÃ­micas y su relaciÃ³n con la energÃ­a.1â€‹ Linus Pauling la define como la ciencia que estudia las sustancias, su estructura (tipos y formas de acomodo de los Ã¡tomos), sus propiedades y las reacciones que las transforman en otras sustancias en referencia con el tiempo.2â€‹ La quÃ­mica se ocupa principalmente de las agrupaciones supraatÃ³micas, como son los gases, las molÃ©culas, los cristales y los metales, estudiando su composiciÃ³n, propiedades estadÃ­sticas, transformaciones y reacciones. La quÃ­mica tambiÃ©n incluye la comprensiÃ³n de las propiedades e interacciones de la materia a escala atÃ³mica.', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas_notas`
--

CREATE TABLE `temas_notas` (
  `temas_notas_id` int(11) NOT NULL,
  `temas_id` int(11) NOT NULL,
  `nota` decimal(10,1) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `temas_notas`
--

INSERT INTO `temas_notas` (`temas_notas_id`, `temas_id`, `nota`, `idusuario`) VALUES
(1, 16, '5.0', 39),
(2, 17, '0.0', 39),
(3, 7, '5.0', 39),
(4, 8, '0.0', 39),
(5, 9, '5.0', 39),
(6, 1, '0.0', 39),
(7, 4, '0.0', 39),
(8, 5, '0.0', 39),
(9, 6, '0.0', 39),
(10, 1, '0.0', 32),
(11, 4, '0.0', 32),
(12, 5, '0.0', 32),
(13, 5, '0.0', 32),
(14, 5, '0.0', 32),
(15, 5, '0.0', 32),
(16, 2, '5.0', 42),
(17, 12, '5.0', 42);

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
(31, 'andres', 'TI', '33333333', 'palmira', '34356789', 'andres@gmail.com', 'andres', '1', 1),
(32, 'admin a.', 'CC', '2344343434', 'cauca seco', '547646656', 'admin', 'admin', '1', 1),
(34, 'jacobo gutierrez', 'RC', '356453656345', 'yumbo', '32143424534', 'jacobo@gmail.com', 'jacobo', '1', 1),
(38, 'sebastian villada', 'TI', '23456789087654', 'cali', '4354687', 'sebas@gmail.com', 'sebas', '1', 1),
(39, 'stevan', 'TI', '10058765', 'calle34a', '124635', 'stevan@gmail.com', 'stevan23', '1', 1),
(40, 'julio', 'CC', '56898765', 'calle34', '8586868494', 'julio.24@gmail.com', 'julio67', '1', 1),
(41, 'alexander', 'CC', '55556215', 'cali', '8454554', 'alex@gmail.com', 'alex', '1', 1),
(42, 'abel lucumi', 'CC', '4564869', 'cali', '8454645', 'abel@gmail.com', 'abel', '1', 1);

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
(1, 32, 1),
(2, 31, 2),
(3, 34, 4),
(7, 38, 4),
(8, 39, 3),
(9, 40, 2),
(10, 41, 3),
(11, 42, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`materias_id`);

--
-- Indices de la tabla `materias_periodos`
--
ALTER TABLE `materias_periodos`
  ADD PRIMARY KEY (`matrias_periodos_id`),
  ADD KEY `periodo_matrias_periodos_fk` (`periodo_id`),
  ADD KEY `materias_matrias_periodos_fk` (`materias_id`);

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
  ADD KEY `menu_submenu_fk` (`perfil_id`);

--
-- Indices de la tabla `nota_materia_periodo`
--
ALTER TABLE `nota_materia_periodo`
  ADD PRIMARY KEY (`nota_materia_periodo_id`),
  ADD KEY `materias_nota_materia_periodo_fk` (`materias_id`),
  ADD KEY `nota_materia_periodo_fk` (`idusuario`);

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
  ADD PRIMARY KEY (`periodo_id`);

--
-- Indices de la tabla `periodos_temas`
--
ALTER TABLE `periodos_temas`
  ADD PRIMARY KEY (`periodos_temas_id`),
  ADD KEY `temas_periodos_temas_fk` (`temas_id`),
  ADD KEY `periodo_periodos_temas_fk` (`periodo_id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`pregunta_id`),
  ADD KEY `preguntas_fk` (`periodos_temas_id`);

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
  ADD KEY `preguntas_respuestas_fk` (`pregunta_id`),
  ADD KEY `respuestas_fk` (`temas_notas_id`);

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
-- Indices de la tabla `system_variables`
--
ALTER TABLE `system_variables`
  ADD PRIMARY KEY (`variable_id`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`temas_id`),
  ADD KEY `temas_fk` (`materias_id`);

--
-- Indices de la tabla `temas_notas`
--
ALTER TABLE `temas_notas`
  ADD PRIMARY KEY (`temas_notas_id`),
  ADD KEY `temas_notas_fk` (`temas_id`),
  ADD KEY `temas_notas_fk_1` (`idusuario`);

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
  MODIFY `materias_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `materias_periodos`
--
ALTER TABLE `materias_periodos`
  MODIFY `matrias_periodos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `menu_submenu`
--
ALTER TABLE `menu_submenu`
  MODIFY `menu_submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `nota_materia_periodo`
--
ALTER TABLE `nota_materia_periodo`
  MODIFY `nota_materia_periodo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `perfil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `perfil_menu`
--
ALTER TABLE `perfil_menu`
  MODIFY `perfil_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `periodo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `periodos_temas`
--
ALTER TABLE `periodos_temas`
  MODIFY `periodos_temas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `pregunta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `pregunta_detalle`
--
ALTER TABLE `pregunta_detalle`
  MODIFY `pregunta_detalle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `respuestas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `submenu`
--
ALTER TABLE `submenu`
  MODIFY `submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `submenu_materias`
--
ALTER TABLE `submenu_materias`
  MODIFY `submenu_marterias_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `system_variables`
--
ALTER TABLE `system_variables`
  MODIFY `variable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `temas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `temas_notas`
--
ALTER TABLE `temas_notas`
  MODIFY `temas_notas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  MODIFY `usuario_perfil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `materias_periodos`
--
ALTER TABLE `materias_periodos`
  ADD CONSTRAINT `materias_matrias_periodos_fk` FOREIGN KEY (`materias_id`) REFERENCES `materias` (`materias_id`),
  ADD CONSTRAINT `periodo_matrias_periodos_fk` FOREIGN KEY (`periodo_id`) REFERENCES `periodo` (`periodo_id`);

--
-- Filtros para la tabla `menu_submenu`
--
ALTER TABLE `menu_submenu`
  ADD CONSTRAINT `menu_menu_submenu_fk` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `submenu_menu_submenu_fk` FOREIGN KEY (`submenu_id`) REFERENCES `submenu` (`submenu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `nota_materia_periodo`
--
ALTER TABLE `nota_materia_periodo`
  ADD CONSTRAINT `materias_nota_materia_periodo_fk` FOREIGN KEY (`materias_id`) REFERENCES `materias` (`materias_id`),
  ADD CONSTRAINT `nota_materia_periodo_fk` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `perfil_menu`
--
ALTER TABLE `perfil_menu`
  ADD CONSTRAINT `menu_perfil_menu_fk` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `perfil_perfil_menu_fk` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`perfil_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `periodos_temas`
--
ALTER TABLE `periodos_temas`
  ADD CONSTRAINT `periodo_periodos_temas_fk` FOREIGN KEY (`periodo_id`) REFERENCES `periodo` (`periodo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `temas_periodos_temas_fk` FOREIGN KEY (`temas_id`) REFERENCES `temas` (`temas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_fk` FOREIGN KEY (`periodos_temas_id`) REFERENCES `periodos_temas` (`periodos_temas_id`);

--
-- Filtros para la tabla `pregunta_detalle`
--
ALTER TABLE `pregunta_detalle`
  ADD CONSTRAINT `preguntas_pregunta_detalle_fk` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`pregunta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `preguntas_respuestas_fk` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`pregunta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `respuestas_fk` FOREIGN KEY (`temas_notas_id`) REFERENCES `temas_notas` (`temas_notas_id`);

--
-- Filtros para la tabla `submenu_materias`
--
ALTER TABLE `submenu_materias`
  ADD CONSTRAINT `materias_submenu_materias_fk` FOREIGN KEY (`materias_id`) REFERENCES `materias` (`materias_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `submenu_submenu_materias_fk` FOREIGN KEY (`submenu_id`) REFERENCES `submenu` (`submenu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `temas`
--
ALTER TABLE `temas`
  ADD CONSTRAINT `temas_fk` FOREIGN KEY (`materias_id`) REFERENCES `materias` (`materias_id`);

--
-- Filtros para la tabla `temas_notas`
--
ALTER TABLE `temas_notas`
  ADD CONSTRAINT `temas_notas_fk` FOREIGN KEY (`temas_id`) REFERENCES `temas` (`temas_id`),
  ADD CONSTRAINT `temas_notas_fk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

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
