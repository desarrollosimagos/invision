-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-11-2017 a las 16:37:27
-- Versión del servidor: 5.5.58-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `twitter_imago`
--
CREATE DATABASE IF NOT EXISTS `twitter_imago` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `twitter_imago`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `class` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `assigned` int(11) NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

--
-- Volcado de datos para la tabla `actions`
--

INSERT INTO `actions` (`id`, `name`, `class`, `route`, `assigned`, `d_create`, `d_update`) VALUES
(1, 'PERFILES', 'CPerfil', 'profile', 1, '2017-05-08 18:28:55', '0000-00-00 00:00:00'),
(2, 'EMPLEADOS', 'CUser', 'users', 1, '2017-05-08 18:29:01', '0000-00-00 00:00:00'),
(5, 'BITACORA', 'CBitacora', 'logs', 0, '2017-05-08 20:07:19', '0000-00-00 00:00:00'),
(6, 'HOME', 'Home', 'home', 0, '2017-05-04 15:42:52', '0000-00-00 00:00:00'),
(8, 'MENUS', 'CMenus', 'menus', 1, '2017-05-08 18:47:10', '0000-00-00 00:00:00'),
(9, 'SUBMENUS', 'CSubMenus', 'submenus', 1, '2017-05-08 18:47:18', '0000-00-00 00:00:00'),
(10, 'ACCIONES', 'CAcciones', 'acciones', 1, '2017-05-08 18:47:23', '0000-00-00 00:00:00'),
(24, 'LEnguaje', 'LanguageSwitcher', 'language', 0, '2017-05-30 19:21:53', '0000-00-00 00:00:00'),
(32, 'BANDEJA ENTRADA', 'CBandejaEntrada', 'bandeja_entrada', 1, '2017-11-07 16:04:14', '0000-00-00 00:00:00'),
(33, 'BANDEJA POLITICO', 'CBandejaPolitico', 'bandeja_politico', 1, '2017-11-08 15:10:52', '0000-00-00 00:00:00'),
(34, 'BANDEJA ASISTENCIAL', 'CBandejaAsistencial', 'bandeja_asistencial', 1, '2017-11-08 16:15:39', '0000-00-00 00:00:00'),
(35, 'BANDEJA OPERANTES', 'CBandejaOperantes', 'bandeja_operantes', 1, '2017-11-08 18:04:34', '0000-00-00 00:00:00'),
(36, 'BANDEJA OPONENTES', 'CBandejaOponentes', 'bandeja_oponentes', 1, '2017-11-08 18:17:13', '0000-00-00 00:00:00'),
(37, 'BANDEJA INDIVIDUALES', 'CBandejaIndividuales', 'bandeja_individuales', 1, '2017-11-08 18:33:40', '0000-00-00 00:00:00'),
(38, 'BANDEJA COLECTIVOS', 'CBandejaColectivos', 'bandeja_colectivos', 1, '2017-11-08 18:49:51', '0000-00-00 00:00:00'),
(39, 'TWITTERS', 'CTwitter', 'twitters', 0, '2017-11-09 15:21:15', '0000-00-00 00:00:00'),
(40, 'PERFILES_SOCIALES', 'CPerfilSocial', 'social_profile', 0, '2017-11-09 20:39:27', '0000-00-00 00:00:00'),
(41, 'TIME_LINE', 'CTweet', 'time_line', 0, '2017-11-14 15:29:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bandeja_asistencial`
--

CREATE TABLE IF NOT EXISTS `bandeja_asistencial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `screen_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_str` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `asignacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bot` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `bandeja_asistencial`
--

INSERT INTO `bandeja_asistencial` (`id`, `screen_name`, `id_str`, `text`, `created_at`, `asignacion`, `bot`, `status`) VALUES
(1, 'Lorem Ipsum81', '97', 'dolor sit amet, consectetur, adipisci velit', '2017-11-14', '', 0, 1),
(2, 'Lorem Ipsum80', '96', 'dolor sit amet, consectetur, adipisci velit', '2017-11-14', '', 0, 1),
(3, 'Lorem Ipsum79', '95', 'dolor sit amet, consectetur, adipisci velit', '2017-11-14', 'Colectivo', 0, 0),
(4, 'Lorem Ipsum78', '94', 'dolor sit amet, consectetur, adipisci velit', '2017-11-14', 'Individual', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bandeja_colectivos`
--

CREATE TABLE IF NOT EXISTS `bandeja_colectivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `screen_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_str` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `asignacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bot` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `bandeja_colectivos`
--

INSERT INTO `bandeja_colectivos` (`id`, `screen_name`, `id_str`, `text`, `created_at`, `asignacion`, `bot`, `status`) VALUES
(1, 'Lorem Ipsum79', '95', 'dolor sit amet, consectetur, adipisci velit', '2017-11-14', '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bandeja_entrada`
--

CREATE TABLE IF NOT EXISTS `bandeja_entrada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `screen_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_str` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `asignacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bot` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=103 ;

--
-- Volcado de datos para la tabla `bandeja_entrada`
--

INSERT INTO `bandeja_entrada` (`id`, `screen_name`, `id_str`, `text`, `created_at`, `asignacion`, `bot`, `status`) VALUES
(1, 'César Soplín', '1', 'Nubecino inquebrantable. Maxiquiosco owner', '2017-11-03 03:04:05', '', 1, 1),
(2, 'Erik Porroa', '2', 'Code Hipster.', '2017-11-03 03:04:05', '', 1, 1),
(3, 'José Ignacio', '3', 'Rockstar chef, consejero espiritual', '2017-11-03 03:04:05', '', 1, 1),
(4, 'Pedro Perez', '4', 'Primera prueba de edicion', '2017-11-03 03:04:05', '', 0, 1),
(5, 'Maria Lopez', '5', 'Segunda prueba de edicion', '2017-11-03 03:04:05', '', 0, 1),
(6, 'Setsuko', '6', 'Tuvo un vida corta y difícil.', '2017-11-03 03:04:05', '', 0, 1),
(7, 'Momo', '7', 'Ve fantasmas', '2017-11-03 03:04:05', '', 0, 1),
(8, 'Chihiro', '8', 'También ve fantasmas y espíritus', '2017-11-03 03:04:05', '', 0, 1),
(9, 'San', '9', 'La Princesa Mononoke', '2017-11-03 03:04:05', '', 0, 1),
(10, 'Ponyo', '10', 'Quiere dejar el mar.', '2017-11-03 03:04:05', '', 0, 1),
(11, 'Nausicaa', '11', 'Valiente y guerrera', '2017-11-03 03:04:05', '', 0, 1),
(12, 'Kiki', '12', 'Le gusta la aventura', '2017-11-03 03:04:05', '', 0, 1),
(13, 'Youko', '13', 'Una escritora novicia pero con mucho talento.', '2017-11-03 03:04:05', '', 0, 1),
(14, 'Haru', '14', 'Ha estado en el reino de los gatos.', '2017-11-03 03:04:05', '', 0, 1),
(15, 'Arrietty', '15', 'Es valiente y atrevida', '2017-11-03 03:04:05', '', 0, 1),
(16, 'Umi', '16', 'incansable luchadora', '2017-11-03 03:04:05', '', 0, 1),
(17, 'Lorem Ipsum1', '17', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(18, 'Lorem Ipsu2', '18', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(19, 'Lorem Ipsum3', '19', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(20, 'Lorem Ipsum4', '20', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(21, 'Lorem Ipsum5', '21', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(22, 'Lorem Ipsum6', '22', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(23, 'Lorem Ipsum7', '23', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(24, 'Lorem Ipsum8', '24', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(25, 'Lorem Ipsum9', '25', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(26, 'Lorem Ipsum10', '26', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(27, 'Lorem Ipsum11', '27', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(28, 'Lorem Ipsum12', '28', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(29, 'Lorem Ipsum13', '29', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(30, 'Lorem Ipsum14', '30', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(31, 'Lorem Ipsum15', '31', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(32, 'Lorem Ipsum16', '32', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(33, 'Lorem Ipsum17', '33', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(34, 'Lorem Ipsum18', '34', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(35, 'Lorem Ipsum19', '35', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(37, 'Lorem Ipsum20', '36', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(38, 'Lorem Ipsum21', '37', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(39, 'Lorem Ipsum22', '38', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(40, 'Lorem Ipsum23', '39', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(41, 'Lorem Ipsum24', '40', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(42, 'Lorem Ipsum25', '41', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(43, 'Lorem Ipsum26', '42', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(44, 'Lorem Ipsum27', '43', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(45, 'Lorem Ipsum28', '44', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(46, 'Lorem Ipsum29', '45', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(47, 'Lorem Ipsum30', '46', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(48, 'Lorem Ipsum31', '47', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(49, 'Lorem Ipsum32', '48', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(50, 'Lorem Ipsum33', '49', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(51, 'Lorem Ipsum34', '50', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(52, 'Lorem Ipsum35', '51', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(53, 'Lorem Ipsum36', '52', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(54, 'Lorem Ipsum37', '53', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(55, 'Lorem Ipsum38', '54', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(56, 'Lorem Ipsum39', '55', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(57, 'Lorem Ipsum40', '56', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(58, 'Lorem Ipsum41', '57', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(59, 'Lorem Ipsum42', '58', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(60, 'Lorem Ipsum43', '59', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(61, 'Lorem Ipsum44', '60', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(62, 'Lorem Ipsum45', '61', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(63, 'Lorem Ipsum46', '62', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(64, 'Lorem Ipsum47', '63', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(65, 'Lorem Ipsum48', '64', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(66, 'Lorem Ipsum49', '65', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(67, 'Lorem Ipsum50', '66', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(68, 'Lorem Ipsum51', '67', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(69, 'Lorem Ipsum52', '68', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(70, 'Lorem Ipsum53', '69', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(71, 'Lorem Ipsum54', '70', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(72, 'Lorem Ipsum55', '71', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(73, 'Lorem Ipsum56', '72', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(74, 'Lorem Ipsum57', '73', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(75, 'Lorem Ipsum58', '74', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(76, 'Lorem Ipsum59', '75', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(77, 'Lorem Ipsum60', '76', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(78, 'Lorem Ipsum61', '77', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(79, 'Lorem Ipsum62', '78', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(80, 'Lorem Ipsum63', '79', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(81, 'Lorem Ipsum64', '80', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(82, 'Lorem Ipsum65', '81', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(83, 'Lorem Ipsum66', '82', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(84, 'Lorem Ipsum67', '83', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(85, 'Lorem Ipsum68', '84', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(86, 'Lorem Ipsum69', '85', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(87, 'Lorem Ipsum70', '86', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(88, 'Lorem Ipsum71', '87', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(89, 'Lorem Ipsum72', '88', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(90, 'Lorem Ipsum73', '89', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(91, 'Lorem Ipsum74', '90', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(92, 'Lorem Ipsum75', '91', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', '', 0, 1),
(93, 'Lorem Ipsum76', '930828189206753280', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', 'Político', 0, 0),
(94, 'Lorem Ipsum77', '93', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', 'Político', 0, 0),
(95, 'Lorem Ipsum78', '94', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', 'Asistencial', 0, 0),
(96, 'Lorem Ipsum79', '95', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', 'Asistencial', 0, 0),
(97, 'Lorem Ipsum80', '96', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', 'Asistencial', 0, 0),
(98, 'Lorem Ipsum81', '97', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', 'Asistencial', 0, 0),
(99, 'Lorem Ipsum82', '98', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', 'Político', 0, 0),
(100, 'Lorem Ipsum83', '99', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', 'Político', 0, 0),
(101, 'Lorem Ipsum84', '100', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', 'Político', 0, 0),
(102, 'Lorem Ipsum85', '101', 'dolor sit amet, consectetur, adipisci velit', '2017-11-03 03:04:05', 'Político', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bandeja_individuales`
--

CREATE TABLE IF NOT EXISTS `bandeja_individuales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `screen_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_str` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `asignacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bot` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `bandeja_individuales`
--

INSERT INTO `bandeja_individuales` (`id`, `screen_name`, `id_str`, `text`, `created_at`, `asignacion`, `bot`, `status`) VALUES
(1, 'Lorem Ipsum78', '94', 'dolor sit amet, consectetur, adipisci velit', '2017-11-14', '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bandeja_operantes`
--

CREATE TABLE IF NOT EXISTS `bandeja_operantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `screen_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_str` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `asignacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bot` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `bandeja_operantes`
--

INSERT INTO `bandeja_operantes` (`id`, `screen_name`, `id_str`, `text`, `created_at`, `asignacion`, `bot`, `status`) VALUES
(1, 'Lorem Ipsum83', '99', 'dolor sit amet, consectetur, adipisci velit', '2017-11-14', '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bandeja_oponentes`
--

CREATE TABLE IF NOT EXISTS `bandeja_oponentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `screen_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_str` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `asignacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bot` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `bandeja_oponentes`
--

INSERT INTO `bandeja_oponentes` (`id`, `screen_name`, `id_str`, `text`, `created_at`, `asignacion`, `bot`, `status`) VALUES
(1, 'Lorem Ipsum82', '98', 'dolor sit amet, consectetur, adipisci velit', '2017-11-14', '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bandeja_politico`
--

CREATE TABLE IF NOT EXISTS `bandeja_politico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `screen_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_str` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `asignacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bot` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `bandeja_politico`
--

INSERT INTO `bandeja_politico` (`id`, `screen_name`, `id_str`, `text`, `created_at`, `asignacion`, `bot`, `status`) VALUES
(1, 'Lorem Ipsum85', '101', 'dolor sit amet, consectetur, adipisci velit', '2017-11-13', '', 0, 1),
(2, 'Lorem Ipsum84', '100', 'dolor sit amet, consectetur, adipisci velit', '2017-11-14', '', 0, 1),
(3, 'Lorem Ipsum83', '99', 'dolor sit amet, consectetur, adipisci velit', '2017-11-14', 'Operante', 0, 0),
(4, 'Lorem Ipsum82', '98', 'dolor sit amet, consectetur, adipisci velit', '2017-11-14', 'Oponente', 0, 0),
(5, 'Lorem Ipsum77', '93', 'dolor sit amet, consectetur, adipisci velit', '2017-11-15', '', 0, 1),
(7, 'Lorem Ipsum76', '930828189206753280', 'dolor sit amet, consectetur, adipisci velit', '2017-11-15', '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('670hojljqf0rh2d3svuhq12vfv2011o2', '216.33.196.25', 1506376981, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337363938313b),
('ac1he65q6u6a0dhdnk92b7b0jsakcb8r', '216.33.196.25', 1506377021, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337373032313b),
('32aqgrson1t80phj3g3dgtre8fitc3hr', '216.33.196.25', 1506377034, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337373033343b),
('df0ekgl721l1eksluudabe4tdg5bh3vu', '216.33.196.25', 1506377048, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337373034383b),
('fnlehlnbh0bhfeh937c20bht54pjvrsc', '216.33.196.25', 1506377050, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337373035303b),
('n6ss60s298ia9in2s1tbnc3rjuotbnqp', '216.33.196.25', 1506377061, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337373036313b),
('75eejcs4ave46e4i6j0c2rnue03r9me9', '216.33.196.25', 1506377063, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337373036333b),
('ehgq5o0eur59cd6ijd8as5dg23tmpe05', '216.33.196.25', 1506377068, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337373036383b),
('8vbbv793h6ufl4844prs2qd6kih42noq', '216.33.196.25', 1506377102, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337373130323b),
('bthe2i6ael6cgn3t1ndv7a5fil59gr7l', '216.33.196.25', 1506377360, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337373336303b),
('t7cieqplnv6vjjulbu8urhcqlsto1cuk', '216.33.196.25', 1506377361, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337373336313b),
('07sso8jiv2sdgmdijmb09c2ssndcpnms', '216.33.196.25', 1506384663, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363338343636333b),
('372ijl8lv51pccf1a7j7or79mgka5tsb', '216.33.196.25', 1506384663, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363338343636333b),
('2jhlo9o0cahh5egkdb8k69gg3urpmflr', '216.33.196.25', 1506419977, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363431393937373b),
('mr99p1alq8l9c9q6b8be78raq3rhubob', '216.33.196.25', 1506419977, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363431393937373b),
('qk43oh0uk8kgftvo8te90vk436hf8rrt', '216.33.196.25', 1506423368, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363432333336383b),
('i2lpmusvenajqkba4e7fgjomt81i4op0', '216.33.196.25', 1506423368, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363432333336383b),
('6dju8i6fik6jst5f6bcfh6ne0ave9038', '216.33.196.25', 1506427652, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363432373635323b),
('lop33nhjqo3b8of4n0dotmga34hl5du5', '216.33.196.25', 1506427741, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363432373734313b),
('fna8iknarq66fgtc3etr46vjjmqt2q8f', '216.33.196.25', 1506434221, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363433343232313b),
('rhcf3pp65ir072knh0n13d7uli1e3749', '216.33.196.25', 1506434299, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363433343239393b),
('c7r8305dlo7l3qc699pvjgs0mhv7l0n3', '216.33.196.25', 1506436956, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363433363935363b),
('hbsffhfquomc36d8ln9j0nogefbvq2o7', '216.33.196.25', 1506436956, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363433363935363b),
('fm1u292814ljgdumoocdkknkn5pi6blc', '216.33.196.25', 1506436956, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363433363935363b),
('tcj1hfdt42tjn01sui4vpi0dkl8pcumv', '216.33.196.25', 1506436956, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363433363935363b),
('4a3lh1e5gic7t12c043ghf6aig0ie3dr', '216.33.196.25', 1506437162, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363433373136323b),
('5iimihcq98m68k7onpse69gmgqus4lno', '216.33.196.25', 1506437162, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363433373136323b),
('g1b7mrli1kt4q7q8sbb9nf4c4jh87rk1', '216.33.196.25', 1506437221, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363433373232313b),
('oht12s2vv7vaqvagi9e6rmftr0qim5n5', '216.33.196.25', 1506437221, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363433373232313b),
('kvlku50gbnes6246fl5p2f5m715sn2on', '216.33.196.25', 1506437227, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363433373232373b),
('mmjolnrbof7u8on9cubr628p52qpfnfq', '216.33.196.25', 1506437227, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363433373232373b),
('i5e7gia510bnksc2otmg0gq9f26po7sv', '201.208.26.58', 1506441434, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363434303037393b6c6f676765645f696e7c613a31303a7b733a323a226964223b733a323a223337223b733a383a22757365726e616d65223b733a32323a2276656e746173406d33756e69666f726d65732e636f6d223b733a353a2261646d696e223b733a313a2230223b733a31303a2270726f66696c655f6964223b733a323a223232223b733a31323a2270726f66696c655f6e616d65223b733a383a22434c49454e544553223b733a383a22616363696f6e6573223b613a343a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2236223b733a343a226e616d65223b733a343a22484f4d45223b733a353a22636c617373223b733a343a22486f6d65223b733a353a22726f757465223b733a343a22686f6d65223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30352d30342030383a34323a3532223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a313b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2234223b733a343a226e616d65223b733a373a225449454e444153223b733a353a22636c617373223b733a383a22435469656e646173223b733a353a22726f757465223b733a393a226672616e6368697365223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332031333a30353a3533223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a323b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223139223b733a343a226e616d65223b733a393a2250524f445543544f53223b733a353a22636c617373223b733a31303a224350726f647563746f73223b733a353a22726f757465223b733a393a2270726f647563746f73223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d31342031343a32373a3133223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a333b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223236223b733a343a226e616d65223b733a31373a225449454e4441535f5649525455414c4553223b733a353a22636c617373223b733a31373a22435469656e6461735669727475616c6573223b733a353a22726f757465223b733a31373a227469656e6461735f7669727475616c6573223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332030393a32353a3130223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d733a383a227065726d69736f73223b613a303a7b7d733a373a227469656e646173223b613a313a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223234223b733a333a22726966223b733a373a2230303030303030223b733a343a226e616d65223b733a31373a224d3320556e69666f726d657320432e412e223b733a373a2261646472657373223b733a373a224d617261636179223b733a353a2270686f6e65223b733a31313a223032343335313131313338223b733a363a22737461747573223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30392d32352031343a32343a3537223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d733a383a227375626d656e7573223b613a303a7b7d733a353a226d656e7573223b613a333a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a373a225469656e646173223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a373a227469656e646173223b733a393a22616374696f6e5f6964223b733a313a2234223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332031333a30353a3533223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a313b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223130223b733a343a226e616d65223b733a393a2250726f647563746f73223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a393a2270726f647563746f73223b733a393a22616374696f6e5f6964223b733a323a223139223b733a383a22645f637265617465223b733a31393a22323031372d30382d31342031343a32373a3133223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a323b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223131223b733a343a226e616d65223b733a31373a225469656e646173205669727475616c6573223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a383a227469656e64617376223b733a393a22616374696f6e5f6964223b733a323a223236223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332030393a32353a3130223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d7d),
('1opnehvh089ca3c4l71rh14j3k74fgg5', '201.208.26.58', 1506442214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363434313230353b6c6f676765645f696e7c613a31303a7b733a323a226964223b733a323a223337223b733a383a22757365726e616d65223b733a32323a2276656e746173406d33756e69666f726d65732e636f6d223b733a353a2261646d696e223b733a313a2230223b733a31303a2270726f66696c655f6964223b733a323a223232223b733a31323a2270726f66696c655f6e616d65223b733a383a22434c49454e544553223b733a383a22616363696f6e6573223b613a343a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2236223b733a343a226e616d65223b733a343a22484f4d45223b733a353a22636c617373223b733a343a22486f6d65223b733a353a22726f757465223b733a343a22686f6d65223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30352d30342030383a34323a3532223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a313b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2234223b733a343a226e616d65223b733a373a225449454e444153223b733a353a22636c617373223b733a383a22435469656e646173223b733a353a22726f757465223b733a393a226672616e6368697365223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332031333a30353a3533223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a323b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223139223b733a343a226e616d65223b733a393a2250524f445543544f53223b733a353a22636c617373223b733a31303a224350726f647563746f73223b733a353a22726f757465223b733a393a2270726f647563746f73223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d31342031343a32373a3133223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a333b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223236223b733a343a226e616d65223b733a31373a225449454e4441535f5649525455414c4553223b733a353a22636c617373223b733a31373a22435469656e6461735669727475616c6573223b733a353a22726f757465223b733a31373a227469656e6461735f7669727475616c6573223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332030393a32353a3130223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d733a383a227065726d69736f73223b613a303a7b7d733a373a227469656e646173223b613a313a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223234223b733a333a22726966223b733a373a2230303030303030223b733a343a226e616d65223b733a31373a224d3320556e69666f726d657320432e412e223b733a373a2261646472657373223b733a373a224d617261636179223b733a353a2270686f6e65223b733a31313a223032343335313131313338223b733a363a22737461747573223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30392d32352031343a32343a3537223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d733a383a227375626d656e7573223b613a303a7b7d733a353a226d656e7573223b613a333a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a373a225469656e646173223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a373a227469656e646173223b733a393a22616374696f6e5f6964223b733a313a2234223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332031333a30353a3533223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a313b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223130223b733a343a226e616d65223b733a393a2250726f647563746f73223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a393a2270726f647563746f73223b733a393a22616374696f6e5f6964223b733a323a223139223b733a383a22645f637265617465223b733a31393a22323031372d30382d31342031343a32373a3133223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a323b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223131223b733a343a226e616d65223b733a31373a225469656e646173205669727475616c6573223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a383a227469656e64617376223b733a393a22616374696f6e5f6964223b733a323a223236223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332030393a32353a3130223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d7d),
('cv9lqqqsvl1n9pt9qmb9bh1iamha8oll', '201.208.26.58', 1506377367, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337363936383b6c6f676765645f696e7c613a31303a7b733a323a226964223b733a323a223337223b733a383a22757365726e616d65223b733a32323a2276656e746173406d33756e69666f726d65732e636f6d223b733a353a2261646d696e223b733a313a2230223b733a31303a2270726f66696c655f6964223b733a323a223232223b733a31323a2270726f66696c655f6e616d65223b733a383a22434c49454e544553223b733a383a22616363696f6e6573223b613a343a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2236223b733a343a226e616d65223b733a343a22484f4d45223b733a353a22636c617373223b733a343a22486f6d65223b733a353a22726f757465223b733a343a22686f6d65223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30352d30342030383a34323a3532223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a313b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2234223b733a343a226e616d65223b733a373a225449454e444153223b733a353a22636c617373223b733a383a22435469656e646173223b733a353a22726f757465223b733a393a226672616e6368697365223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332031333a30353a3533223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a323b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223139223b733a343a226e616d65223b733a393a2250524f445543544f53223b733a353a22636c617373223b733a31303a224350726f647563746f73223b733a353a22726f757465223b733a393a2270726f647563746f73223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d31342031343a32373a3133223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a333b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223236223b733a343a226e616d65223b733a31373a225449454e4441535f5649525455414c4553223b733a353a22636c617373223b733a31373a22435469656e6461735669727475616c6573223b733a353a22726f757465223b733a31373a227469656e6461735f7669727475616c6573223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332030393a32353a3130223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d733a383a227065726d69736f73223b613a303a7b7d733a373a227469656e646173223b613a303a7b7d733a383a227375626d656e7573223b613a303a7b7d733a353a226d656e7573223b613a333a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a373a225469656e646173223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a373a227469656e646173223b733a393a22616374696f6e5f6964223b733a313a2234223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332031333a30353a3533223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a313b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223130223b733a343a226e616d65223b733a393a2250726f647563746f73223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a393a2270726f647563746f73223b733a393a22616374696f6e5f6964223b733a323a223139223b733a383a22645f637265617465223b733a31393a22323031372d30382d31342031343a32373a3133223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a323b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223131223b733a343a226e616d65223b733a31373a225469656e646173205669727475616c6573223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a383a227469656e64617376223b733a393a22616374696f6e5f6964223b733a323a223236223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332030393a32353a3130223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d7d),
('8b356qclp9lssdafmakb78hoqjmrgl8a', '216.33.196.25', 1506376888, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337363838383b),
('9bffggrusn79adjq5er579v0maifpmab', '216.33.196.25', 1506376888, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337363838383b),
('krhtnf49pjoev89a2va6e3658sm6ohsj', '216.33.196.25', 1506375950, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337353935303b),
('7qpjh8nfs5tptnaui3h868gt1r9nutpr', '216.33.196.25', 1506375946, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337353934363b),
('6gdjapi0epcem0ss5p0qog8rv9simpjs', '216.33.196.25', 1506375874, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337353837343b),
('1sc4h6e81tkabpfelm8mh4dr2vo4pgdn', '216.33.196.25', 1506375848, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337353834383b),
('qm3qvrs3b5ce58tn2icjr50ik4bskkvj', '216.33.196.25', 1506369243, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363336393234333b),
('n4nbtf9catfs6drldfvje3p3306950tl', '216.33.196.25', 1506373284, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337333238343b),
('tnl62lf8gs1cvd651463rpc22ss9ngnt', '216.33.196.25', 1506373953, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337333935333b),
('v8kqq6f34ocpv7o5pmasb9rfrqedn3tm', '216.33.196.25', 1506373953, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337333935333b),
('s90hqu2tvl67qq3oc4ukh57fj0n0ekdh', '201.208.26.58', 1506376380, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363337343633323b6c6f676765645f696e7c613a31303a7b733a323a226964223b733a323a223337223b733a383a22757365726e616d65223b733a32323a2276656e746173406d33756e69666f726d65732e636f6d223b733a353a2261646d696e223b733a313a2230223b733a31303a2270726f66696c655f6964223b733a323a223232223b733a31323a2270726f66696c655f6e616d65223b733a383a22434c49454e544553223b733a383a22616363696f6e6573223b613a343a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2236223b733a343a226e616d65223b733a343a22484f4d45223b733a353a22636c617373223b733a343a22486f6d65223b733a353a22726f757465223b733a343a22686f6d65223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30352d30342030383a34323a3532223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a313b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2234223b733a343a226e616d65223b733a373a225449454e444153223b733a353a22636c617373223b733a383a22435469656e646173223b733a353a22726f757465223b733a393a226672616e6368697365223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332031333a30353a3533223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a323b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223139223b733a343a226e616d65223b733a393a2250524f445543544f53223b733a353a22636c617373223b733a31303a224350726f647563746f73223b733a353a22726f757465223b733a393a2270726f647563746f73223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d31342031343a32373a3133223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a333b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223236223b733a343a226e616d65223b733a31373a225449454e4441535f5649525455414c4553223b733a353a22636c617373223b733a31373a22435469656e6461735669727475616c6573223b733a353a22726f757465223b733a31373a227469656e6461735f7669727475616c6573223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332030393a32353a3130223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d733a383a227065726d69736f73223b613a303a7b7d733a373a227469656e646173223b613a303a7b7d733a383a227375626d656e7573223b613a303a7b7d733a353a226d656e7573223b613a333a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a373a225469656e646173223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a373a227469656e646173223b733a393a22616374696f6e5f6964223b733a313a2234223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332031333a30353a3533223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a313b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223130223b733a343a226e616d65223b733a393a2250726f647563746f73223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a393a2270726f647563746f73223b733a393a22616374696f6e5f6964223b733a323a223139223b733a383a22645f637265617465223b733a31393a22323031372d30382d31342031343a32373a3133223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a323b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223131223b733a343a226e616d65223b733a31373a225469656e646173205669727475616c6573223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a383a227469656e64617376223b733a393a22616374696f6e5f6964223b733a323a223236223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332030393a32353a3130223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d7d),
('gclfdq4f44hgk5bdnpa6ej3pb536tb7n', '201.208.26.58', 1506442399, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363434313830303b6c6f676765645f696e7c613a31303a7b733a323a226964223b733a323a223130223b733a383a22757365726e616d65223b733a31353a2261646d696e40676d61696c2e636f6d223b733a353a2261646d696e223b733a313a2231223b733a31303a2270726f66696c655f6964223b733a313a2231223b733a31323a2270726f66696c655f6e616d65223b733a31333a2241444d494e4953545241444f52223b733a383a22616363696f6e6573223b613a313a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2236223b733a343a226e616d65223b733a343a22484f4d45223b733a353a22636c617373223b733a343a22486f6d65223b733a353a22726f757465223b733a343a22686f6d65223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30352d30342030383a34323a3532223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d733a383a227065726d69736f73223b613a32323a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2235223b733a343a226e616d65223b733a383a2242495441434f5241223b733a353a22636c617373223b733a393a224342697461636f7261223b733a353a22726f757465223b733a343a226c6f6773223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30352d30382031333a30373a3139223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a313b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2231223b733a343a226e616d65223b733a383a2250455246494c4553223b733a353a22636c617373223b733a373a224350657266696c223b733a353a22726f757465223b733a373a2270726f66696c65223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30352d30382031313a32383a3535223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a323b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a393a22454d504c4541444f53223b733a353a22636c617373223b733a353a224355736572223b733a353a22726f757465223b733a353a227573657273223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30352d30382031313a32393a3031223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a333b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2233223b733a343a226e616d65223b733a393a22534552564943494f53223b733a353a22636c617373223b733a393a22435365727669636573223b733a353a22726f757465223b733a373a2273657276696365223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30382d30342030373a32393a3239223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a343b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2234223b733a343a226e616d65223b733a373a225449454e444153223b733a353a22636c617373223b733a383a22435469656e646173223b733a353a22726f757465223b733a393a226672616e6368697365223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332031333a30353a3533223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a353b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2237223b733a343a226e616d65223b733a363a22505255454241223b733a353a22636c617373223b733a373a2243507275656261223b733a353a22726f757465223b733a363a22707275656261223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30352d32322031303a34353a3036223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a363b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2238223b733a343a226e616d65223b733a353a224d454e5553223b733a353a22636c617373223b733a363a22434d656e7573223b733a353a22726f757465223b733a353a226d656e7573223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30352d30382031313a34373a3130223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a373b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2239223b733a343a226e616d65223b733a383a225355424d454e5553223b733a353a22636c617373223b733a393a22435375624d656e7573223b733a353a22726f757465223b733a383a227375626d656e7573223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30352d30382031313a34373a3138223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a383b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223130223b733a343a226e616d65223b733a383a22414343494f4e4553223b733a353a22636c617373223b733a393a2243416363696f6e6573223b733a353a22726f757465223b733a383a22616363696f6e6573223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30352d30382031313a34373a3233223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a393b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223131223b733a343a226e616d65223b733a31303a2241535349474e4d454e54223b733a353a22636c617373223b733a31313a224341737369676e6d656e74223b733a353a22726f757465223b733a31303a2261737369676e6d656e74223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30352d31352031303a33393a3134223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a31303b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223132223b733a343a226e616d65223b733a383a22434c49454e544553223b733a353a22636c617373223b733a373a2243436c69656e74223b733a353a22726f757465223b733a373a22636c69656e7473223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30382d30342030373a32393a3338223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a31313b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223135223b733a343a226e616d65223b733a373a2250525545424132223b733a353a22636c617373223b733a383a224350727565626132223b733a353a22726f757465223b733a373a2270727565626132223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30352d32332031313a30383a3131223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a31323b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223136223b733a343a226e616d65223b733a373a2250525545424133223b733a353a22636c617373223b733a383a224350727565626133223b733a353a22726f757465223b733a373a2270727565626133223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30352d31302031333a30393a3239223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a31333b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223137223b733a343a226e616d65223b733a31373a224f5244454e20444520534552564943494f223b733a353a22636c617373223b733a363a22434f72646572223b733a353a22726f757465223b733a353a226f72646572223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30382d30342030373a32393a3434223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a31343b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223139223b733a343a226e616d65223b733a393a2250524f445543544f53223b733a353a22636c617373223b733a31303a224350726f647563746f73223b733a353a22726f757465223b733a393a2270726f647563746f73223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d31342031343a32373a3133223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a31353b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223233223b733a343a226e616d65223b733a373a2270727565626134223b733a353a22636c617373223b733a383a224350727565626134223b733a353a22726f757465223b733a373a2270727565626134223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30352d32332031313a31393a3330223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a31363b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223234223b733a343a226e616d65223b733a383a224c456e6775616a65223b733a353a22636c617373223b733a31363a224c616e67756167655377697463686572223b733a353a22726f757465223b733a383a226c616e6775616765223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30352d33302031323a32313a3533223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a31373b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223235223b733a343a226e616d65223b733a31303a224d4154455249414c4553223b733a353a22636c617373223b733a31313a22434d6174657269616c6573223b733a353a22726f757465223b733a31303a226d6174657269616c6573223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30382d31342031343a32373a3133223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a31383b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223236223b733a343a226e616d65223b733a31373a225449454e4441535f5649525455414c4553223b733a353a22636c617373223b733a31373a22435469656e6461735669727475616c6573223b733a353a22726f757465223b733a31373a227469656e6461735f7669727475616c6573223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332030393a32353a3130223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a31393b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223237223b733a343a226e616d65223b733a31323a2241504c49434143494f4e4553223b733a353a22636c617373223b733a31333a224341706c69636163696f6e6573223b733a353a22726f757465223b733a31323a2261706c69636163696f6e6573223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d31352031333a35333a3031223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a32303b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223238223b733a343a226e616d65223b733a31323a22415349474e4143494f4e4553223b733a353a22636c617373223b733a31333a2243417369676e6163696f6e6573223b733a353a22726f757465223b733a31323a22617369676e6163696f6e6573223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30382d31372030373a30383a3034223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a32313b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223239223b733a343a226e616d65223b733a343a2241504953223b733a353a22636c617373223b733a353a224341706973223b733a353a22726f757465223b733a343a2261706973223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30382d32312031323a31323a3230223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d733a373a227469656e646173223b613a353a7b693a303b613a303a7b7d693a313b613a303a7b7d693a323b613a303a7b7d693a333b613a303a7b7d693a343b613a303a7b7d7d733a383a227375626d656e7573223b613a353a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a393a7b733a323a226964223b733a313a2231223b733a343a226e616d65223b733a383a2250657266696c6573223b733a31313a226465736372697074696f6e223b733a33393a223c6c693e3c6120687265663d2270726f66696c65223e50657266696c65733c2f613e3c2f6c693e223b733a343a226c6f676f223b733a303a22223b733a353a22726f757465223b733a373a2270726f66696c65223b733a373a226d656e755f6964223b733a313a2231223b733a393a22616374696f6e5f6964223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30352d30352031333a35393a3437223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a313b613a313a7b693a303b4f3a383a22737464436c617373223a393a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a383a225573756172696f73223b733a31313a226465736372697074696f6e223b733a33373a223c6c693e3c6120687265663d227573657273223e5573756172696f733c2f613e3c2f6c693e223b733a343a226c6f676f223b733a303a22223b733a353a22726f757465223b733a353a227573657273223b733a373a226d656e755f6964223b733a313a2231223b733a393a22616374696f6e5f6964223b733a313a2232223b733a383a22645f637265617465223b733a31393a22323031372d30352d30352031333a35393a3535223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a323b613a313a7b693a303b4f3a383a22737464436c617373223a393a7b733a323a226964223b733a313a2235223b733a343a226e616d65223b733a363a224d656ec3ba73223b733a31313a226465736372697074696f6e223b733a33363a22203c6c693e3c6120687265663d226d656e7573223e4d656ec3ba733c2f613e3c2f6c693e223b733a343a226c6f676f223b733a303a22223b733a353a22726f757465223b733a353a226d656e7573223b733a373a226d656e755f6964223b733a313a2237223b733a393a22616374696f6e5f6964223b733a313a2238223b733a383a22645f637265617465223b733a31393a22323031372d30352d30352031343a30303a3138223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a333b613a313a7b693a303b4f3a383a22737464436c617373223a393a7b733a323a226964223b733a313a2236223b733a343a226e616d65223b733a393a225375626d656ec3ba73223b733a31313a226465736372697074696f6e223b733a34323a22203c6c693e3c6120687265663d227375626d656e7573223e5375626d656ec3ba733c2f613e3c2f6c693e223b733a343a226c6f676f223b733a303a22223b733a353a22726f757465223b733a383a227375626d656e7573223b733a373a226d656e755f6964223b733a313a2237223b733a393a22616374696f6e5f6964223b733a313a2239223b733a383a22645f637265617465223b733a31393a22323031372d30352d31382031303a31393a3533223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a343b613a313a7b693a303b4f3a383a22737464436c617373223a393a7b733a323a226964223b733a313a2237223b733a343a226e616d65223b733a383a22416363696f6e6573223b733a31313a226465736372697074696f6e223b733a34313a22203c6c693e3c6120687265663d22616363696f6e6573223e416363696f6e65733c2f613e3c2f6c693e223b733a343a226c6f676f223b733a303a22223b733a353a22726f757465223b733a383a22616363696f6e6573223b733a373a226d656e755f6964223b733a313a2237223b733a393a22616374696f6e5f6964223b733a323a223130223b733a383a22645f637265617465223b733a31393a22323031372d30352d32332031313a30313a3131223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d733a353a226d656e7573223b613a363a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a373a225469656e646173223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a373a227469656e646173223b733a393a22616374696f6e5f6964223b733a313a2234223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332031333a30353a3533223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a313b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223130223b733a343a226e616d65223b733a393a2250726f647563746f73223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a393a2270726f647563746f73223b733a393a22616374696f6e5f6964223b733a323a223139223b733a383a22645f637265617465223b733a31393a22323031372d30382d31342031343a32373a3133223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a323b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223131223b733a343a226e616d65223b733a31373a225469656e646173205669727475616c6573223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a383a227469656e64617376223b733a393a22616374696f6e5f6964223b733a323a223236223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332030393a32353a3130223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a333b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223132223b733a343a226e616d65223b733a31323a2241706c69636163696f6e6573223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31323a2266612066612d6d6f62696c65223b733a353a22726f757465223b733a31323a2261706c69636163696f6e6573223b733a393a22616374696f6e5f6964223b733a323a223237223b733a383a22645f637265617465223b733a31393a22323031372d30382d31352031333a35333a3031223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a343b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a313a2231223b733a343a226e616d65223b733a383a225573756172696f73223b733a31313a226465736372697074696f6e223b733a3130363a223c61203e3c6920636c6173733d2266612066612d757365722d6f223e3c2f693e203c7370616e20636c6173733d226e61762d6c6162656c223e5573756172696f733c2f7370616e3e3c7370616e20636c6173733d226661206172726f77223e3c2f7370616e3e3c2f613e223b733a343a226c6f676f223b733a31323a2266612066612d757365722d6f223b733a353a22726f757465223b733a303a22223b733a393a22616374696f6e5f6964223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30352d30392030373a30343a3330223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a353b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a313a2237223b733a343a226e616d65223b733a363a224d656ec3ba73223b733a31313a226465736372697074696f6e223b733a3130343a223c61203e3c6920636c6173733d2266612066612d757365722d6f223e3c2f693e203c7370616e20636c6173733d226e61762d6c6162656c223e4d656ec3ba733c2f7370616e3e3c7370616e20636c6173733d226661206172726f77223e3c2f7370616e3e3c2f613e223b733a343a226c6f676f223b733a31303a2266612066612d62617273223b733a353a22726f757465223b733a303a22223b733a393a22616374696f6e5f6964223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30352d30392030373a30333a3435223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d7d),
('2sug26ooapvpbqkck6hd2cofkskrgiem', '201.208.26.58', 1506444638, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363434343136373b6c6f676765645f696e7c613a31303a7b733a323a226964223b733a323a223337223b733a383a22757365726e616d65223b733a32323a2276656e746173406d33756e69666f726d65732e636f6d223b733a353a2261646d696e223b733a313a2230223b733a31303a2270726f66696c655f6964223b733a323a223232223b733a31323a2270726f66696c655f6e616d65223b733a383a22434c49454e544553223b733a383a22616363696f6e6573223b613a343a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2236223b733a343a226e616d65223b733a343a22484f4d45223b733a353a22636c617373223b733a343a22486f6d65223b733a353a22726f757465223b733a343a22686f6d65223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30352d30342030383a34323a3532223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a313b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2234223b733a343a226e616d65223b733a373a225449454e444153223b733a353a22636c617373223b733a383a22435469656e646173223b733a353a22726f757465223b733a393a226672616e6368697365223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332031333a30353a3533223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a323b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223139223b733a343a226e616d65223b733a393a2250524f445543544f53223b733a353a22636c617373223b733a31303a224350726f647563746f73223b733a353a22726f757465223b733a393a2270726f647563746f73223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d31342031343a32373a3133223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a333b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223236223b733a343a226e616d65223b733a31373a225449454e4441535f5649525455414c4553223b733a353a22636c617373223b733a31373a22435469656e6461735669727475616c6573223b733a353a22726f757465223b733a31373a227469656e6461735f7669727475616c6573223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332030393a32353a3130223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d733a383a227065726d69736f73223b613a303a7b7d733a373a227469656e646173223b613a313a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223234223b733a333a22726966223b733a373a2230303030303030223b733a343a226e616d65223b733a31373a224d3320556e69666f726d657320432e412e223b733a373a2261646472657373223b733a373a224d617261636179223b733a353a2270686f6e65223b733a31313a223032343335313131313338223b733a363a22737461747573223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30392d32362030393a30383a3533223b733a383a22645f757064617465223b733a31393a22323031372d30392d32362031363a30383a3533223b7d7d7d733a383a227375626d656e7573223b613a303a7b7d733a353a226d656e7573223b613a333a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a373a225469656e646173223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a373a227469656e646173223b733a393a22616374696f6e5f6964223b733a313a2234223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332031333a30353a3533223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a313b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223130223b733a343a226e616d65223b733a393a2250726f647563746f73223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a393a2270726f647563746f73223b733a393a22616374696f6e5f6964223b733a323a223139223b733a383a22645f637265617465223b733a31393a22323031372d30382d31342031343a32373a3133223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a323b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223131223b733a343a226e616d65223b733a31373a225469656e646173205669727475616c6573223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a383a227469656e64617376223b733a393a22616374696f6e5f6964223b733a323a223236223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332030393a32353a3130223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d7d);
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('ii8rlie47uk2dosrcctqhh23uhqtql31', '201.208.26.58', 1506443037, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363434323538363b6c6f676765645f696e7c613a31303a7b733a323a226964223b733a323a223338223b733a383a22757365726e616d65223b733a33313a22616e647265732e6a65737573313939382e6a6d333640676d61696c2e636f6d223b733a353a2261646d696e223b733a313a2230223b733a31303a2270726f66696c655f6964223b733a323a223232223b733a31323a2270726f66696c655f6e616d65223b733a383a22434c49454e544553223b733a383a22616363696f6e6573223b613a343a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2236223b733a343a226e616d65223b733a343a22484f4d45223b733a353a22636c617373223b733a343a22486f6d65223b733a353a22726f757465223b733a343a22686f6d65223b733a383a2261737369676e6564223b733a313a2230223b733a383a22645f637265617465223b733a31393a22323031372d30352d30342030383a34323a3532223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a313b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2234223b733a343a226e616d65223b733a373a225449454e444153223b733a353a22636c617373223b733a383a22435469656e646173223b733a353a22726f757465223b733a393a226672616e6368697365223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332031333a30353a3533223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a323b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223139223b733a343a226e616d65223b733a393a2250524f445543544f53223b733a353a22636c617373223b733a31303a224350726f647563746f73223b733a353a22726f757465223b733a393a2270726f647563746f73223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d31342031343a32373a3133223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a333b613a313a7b693a303b4f3a383a22737464436c617373223a373a7b733a323a226964223b733a323a223236223b733a343a226e616d65223b733a31373a225449454e4441535f5649525455414c4553223b733a353a22636c617373223b733a31373a22435469656e6461735669727475616c6573223b733a353a22726f757465223b733a31373a227469656e6461735f7669727475616c6573223b733a383a2261737369676e6564223b733a313a2231223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332030393a32353a3130223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d733a383a227065726d69736f73223b613a303a7b7d733a373a227469656e646173223b613a303a7b7d733a383a227375626d656e7573223b613a303a7b7d733a353a226d656e7573223b613a333a7b693a303b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a373a225469656e646173223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a373a227469656e646173223b733a393a22616374696f6e5f6964223b733a313a2234223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332031333a30353a3533223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a313b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223130223b733a343a226e616d65223b733a393a2250726f647563746f73223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a393a2270726f647563746f73223b733a393a22616374696f6e5f6964223b733a323a223139223b733a383a22645f637265617465223b733a31393a22323031372d30382d31342031343a32373a3133223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d693a323b613a313a7b693a303b4f3a383a22737464436c617373223a383a7b733a323a226964223b733a323a223131223b733a343a226e616d65223b733a31373a225469656e646173205669727475616c6573223b733a31313a226465736372697074696f6e223b733a303a22223b733a343a226c6f676f223b733a31393a2266612066612d73686f7070696e672d63617274223b733a353a22726f757465223b733a383a227469656e64617376223b733a393a22616374696f6e5f6964223b733a323a223236223b733a383a22645f637265617465223b733a31393a22323031372d30382d32332030393a32353a3130223b733a383a22645f757064617465223b733a31393a22303030302d30302d30302030303a30303a3030223b7d7d7d7d);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `icons`
--

CREATE TABLE IF NOT EXISTS `icons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=598 ;

--
-- Volcado de datos para la tabla `icons`
--

INSERT INTO `icons` (`id`, `class`, `name`, `category`, `d_create`, `d_update`) VALUES
(1, 'fa fa-address-book', 'address-book', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(2, 'fa fa-address-book-o', 'address-book-o', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(3, 'fa fa-address-card', 'address-card', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(4, 'fa fa-address-card-o', 'address-card-o', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(5, 'fa fa-bandcamp', 'bandcamp', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(6, 'fa fa-bath', 'bath', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(7, 'fa fa-bathtub', 'bathtub (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(8, 'fa fa-drivers-license', 'drivers-license (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(9, 'fa fa-drivers-license-o', 'drivers-license-o (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(10, 'fa fa-eercast', 'eercast', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(11, 'fa fa-envelope-open', 'envelope-open', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(12, 'fa fa-envelope-open-o', 'envelope-open-o', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(13, 'fa fa-etsy', 'etsy', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(14, 'fa fa-free-code-camp', 'free-code-camp', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(15, 'fa fa-grav', 'grav', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(16, 'fa fa-handshake-o', 'handshake-o', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(17, 'fa fa-id-badge', 'id-badge', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(18, 'fa fa-id-card', 'id-card', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(19, 'fa fa-id-card-o', 'id-card-o', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(20, 'fa fa-imdb', 'imdb', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(21, 'fa fa-linode', 'linode', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(22, 'fa fa-meetup', 'meetup', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(23, 'fa fa-microchip', 'microchip', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(24, 'fa fa-podcast', 'podcast', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(25, 'fa fa-quora', 'quora', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(26, 'fa fa-ravelry', 'ravelry', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(27, 'fa fa-s15', 's15 (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(28, 'fa fa-shower', 'shower', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(29, 'fa fa-snowflake-o', 'snowflake-o', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(30, 'fa fa-superpowers', 'superpowers', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(31, 'fa fa-telegram', 'telegram', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(32, 'fa fa-thermometer', 'thermometer (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(33, 'fa fa-thermometer-0', 'thermometer-0 (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(34, 'fa fa-thermometer-1', 'thermometer-1 (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(35, 'fa fa-thermometer-2', 'thermometer-2 (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(36, 'fa fa-thermometer-3', 'thermometer-3 (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(37, 'fa fa-thermometer-4', 'thermometer-4 (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(38, 'fa fa-thermometer-empty', 'thermometer-empty', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(39, 'fa fa-thermometer-full', 'thermometer-full', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(40, 'fa fa-thermometer-half', 'thermometer-half', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(41, 'fa fa-thermometer-quarter', 'thermometer-quarter', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(42, 'fa fa-thermometer-three-quarters', 'thermometer-three-quarters', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(43, 'fa fa-times-rectangle', 'times-rectangle (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(44, 'fa fa-times-rectangle-o', 'times-rectangle-o (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(45, 'fa fa-user-circle', 'user-circle', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(46, 'fa fa-user-circle-o', 'user-circle-o', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(47, 'fa fa-user-o', 'user-o', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(48, 'fa fa-vcard', 'vcard (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(49, 'fa fa-vcard-o', 'vcard-o (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(50, 'fa fa-window-close', 'window-close', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(51, 'fa fa-window-close-o', 'window-close-o', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(52, 'fa fa-window-maximize', 'window-maximize', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(53, 'fa fa-window-minimize', 'window-minimize', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(54, 'fa fa-window-restore', 'window-restore', 'New Icons in 4.7.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(55, 'fa fa-wpexplorer', 'wpexplorer', 'New Icons in 4.7.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(56, 'fa fa-angellist', 'fa-angellist', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(57, 'fa fa-area-chart', 'fa-area-chart', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(58, 'fa fa-at', 'fa-at', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(59, 'fa fa-bell-slash', 'fa-bell-slash', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(60, 'fa fa-bell-slash-o', 'fa-bell-slash-o', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(61, 'fa fa-bicycle', 'fa-bicycle', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(62, 'fa fa-binoculars', 'fa-binoculars', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(63, 'fa fa-birthday-cake', 'fa-birthday-cake', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(64, 'fa fa-bus', 'fa-bus', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(65, 'fa fa-calculator', 'fa-calculator', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(66, 'fa fa-cc', 'fa-cc', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(67, 'fa fa-cc-amex', 'fa-cc-amex', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(68, 'fa fa-cc-discover', 'fa-cc-discover', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(69, 'fa fa-cc-mastercard', 'fa-cc-mastercard', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(70, 'fa fa-cc-paypal', 'fa-cc-paypal', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(71, 'fa fa-cc-stripe', 'fa-cc-stripe', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(72, 'fa fa-cc-visa', 'fa-cc-visa', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(73, 'fa fa-copyright', 'fa-copyright', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(74, 'fa fa-eyedropper', 'fa-eyedropper', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(75, 'fa fa-futbol-o', 'fa-futbol-o', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(76, 'fa fa-google-wallet', 'fa-google-wallet', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(77, 'fa fa-ils', 'fa-ils', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(78, 'fa fa-ioxhost', 'fa-ioxhost', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(79, 'fa fa-lastfm', 'fa-lastfm', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(80, 'fa fa-lastfm-square', 'fa-lastfm-square', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(81, 'fa fa-line-chart', 'fa-line-chart', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(82, 'fa fa-meanpath', 'fa-meanpath', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(83, 'fa fa-newspaper-o', 'fa-newspaper-o', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(84, 'fa fa-paint-brush', 'fa-paint-brush', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(85, 'fa fa-paypal', 'fa-paypal', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(86, 'fa fa-pie-chart', 'fa-pie-chart', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(87, 'fa fa-plug', 'fa-plug', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(88, 'fa fa-shekel', 'fa-shekel (alias)', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(89, 'fa fa-sheqel', 'fa-sheqel (alias)', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(90, 'fa fa-slideshare', 'fa-slideshare', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(91, 'fa fa-soccer-ball-o', 'fa-soccer-ball-o (alias)', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(92, 'fa fa-toggle-off', 'fa-toggle-off', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(93, 'fa fa-toggle-on', 'fa-toggle-on', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(94, 'fa fa-trash', 'fa-trash', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(95, 'fa fa-tty', 'fa-tty', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(96, 'fa fa-twitch', 'fa-twitch', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(97, 'fa fa-wifi', 'fa-wifi', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(98, 'fa fa-yelp', 'fa-yelp', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(99, 'fa fa-rub', 'fa-rub', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(100, 'fa fa-ruble', 'fa-ruble (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(101, 'fa fa-rouble', 'fa-rouble (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(102, 'fa fa-pagelines', 'fa-pagelines', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(103, 'fa fa-stack-exchange', 'fa-stack-exchange', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(104, 'fa fa-arrow-circle-o-right', 'fa-arrow-circle-o-right', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(105, 'fa fa-arrow-circle-o-left', 'fa-arrow-circle-o-left', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(106, 'fa fa-caret-square-o-left', 'fa-caret-square-o-left', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(107, 'fa fa-toggle-left', 'fa-toggle-left (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(108, 'fa fa-dot-circle-o', 'fa-dot-circle-o', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(109, 'fa fa-wheelchair', 'fa-wheelchair', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(110, 'fa fa-vimeo-square', 'fa-vimeo-square', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(111, 'fa fa-try', 'fa-try', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(112, 'fa fa-turkish-lira', 'fa-turkish-lira (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(113, 'fa fa-plus-square-o', 'fa-plus-square-o', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(114, 'fa fa-automobile', 'fa-automobile (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(115, 'fa fa-bank', 'fa-bank (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(116, 'fa fa-behance', 'fa-behance', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(117, 'fa fa-behance-square', 'fa-behance-square', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(118, 'fa fa-bomb', 'fa-bomb', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(119, 'fa fa-building', 'fa-building', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(120, 'fa fa-cab', 'fa-cab (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(121, 'fa fa-car', 'fa-car', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(122, 'fa fa-child', 'fa-child', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(123, 'fa fa-circle-o-notch', 'fa-circle-o-notch', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(124, 'fa fa-circle-thin', 'fa-circle-thin', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(125, 'fa fa-codepen', 'fa-codepen', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(126, 'fa fa-cube', 'fa-cube', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(127, 'fa fa-cubes', 'fa-cubes', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(128, 'fa fa-database', 'fa-database', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(129, 'fa fa-delicious', 'fa-delicious', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(130, 'fa fa-deviantart', 'fa-deviantart', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(131, 'fa fa-digg', 'fa-digg', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(132, 'fa fa-drupal', 'fa-drupal', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(133, 'fa fa-empire', 'fa-empire', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(134, 'fa fa-envelope-square', 'fa-envelope-square', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(135, 'fa fa-fax', 'fa-fax', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(136, 'fa fa-file-archive-o', 'fa-file-archive-o', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(137, 'fa fa-file-audio-o', 'fa-file-audio-o', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(138, 'fa fa-file-code-o', 'fa-file-code-o', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(139, 'fa fa-file-excel-o', 'fa-file-excel-o', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(140, 'fa fa-file-image-o', 'fa-file-image-o', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(141, 'fa fa-file-movie-o', 'fa-file-movie-o (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(142, 'fa fa-file-pdf-o', 'fa-file-pdf-o', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(143, 'fa fa-file-photo-o', 'fa-file-photo-o (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(144, 'fa fa-file-picture-o', 'fa-file-picture-o (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(145, 'fa fa-file-powerpoint-o', 'fa-file-powerpoint-o', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(146, 'fa fa-file-sound-o', 'fa-file-sound-o (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(147, 'fa fa-file-video-o', 'fa-file-video-o', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(148, 'fa fa-file-word-o', 'fa-file-word-o', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(149, 'fa fa-file-zip-o', 'fa-file-zip-o (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(150, 'fa fa-ge', 'fa-ge (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(151, 'fa fa-git', 'fa-git', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(152, 'fa fa-git-square', 'fa-git-square', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(153, 'fa fa-google', 'fa-google', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(154, 'fa fa-graduation-cap', 'fa-graduation-cap', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(155, 'fa fa-hacker-news', 'fa-hacker-news', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(156, 'fa fa-header', 'fa-header', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(157, 'fa fa-history', 'fa-history', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(158, 'fa fa-institution', 'fa-institution (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(159, 'fa fa-joomla', 'fa-joomla', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(160, 'fa fa-jsfiddle', 'fa-jsfiddle', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(161, 'fa fa-language', 'fa-language', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(162, 'fa fa-life-bouy', 'fa-life-bouy (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(163, 'fa fa-life-ring', 'fa-life-ring', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(164, 'fa fa-life-saver', 'fa-life-saver (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(165, 'fa fa-mortar-board', 'fa-mortar-board (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(166, 'fa fa-openid', 'fa-openid', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(167, 'fa fa-paper-plane', 'fa-paper-plane', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(168, 'fa fa-paper-plane-o', 'fa-paper-plane-o', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(169, 'fa fa-paragraph', 'fa-paragraph', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(170, 'fa fa-paw', 'fa-paw', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(171, 'fa fa-pied-piper', 'fa-pied-piper', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(172, 'fa fa-pied-piper-alt', 'fa-pied-piper-alt', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(173, 'fa fa-pied-piper-square', 'fa-pied-piper-square (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(174, 'fa fa-qq', 'fa-qq', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(175, 'fa fa-ra', 'fa-ra (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(176, 'fa fa-rebel', 'fa-rebel', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(177, 'fa fa-recycle', 'fa-recycle', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(178, 'fa fa-reddit', 'fa-reddit', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(179, 'fa fa-reddit-square', 'fa-reddit-square', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(180, 'fa fa-send', 'fa-send (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(181, 'fa fa-send-o', 'fa-send-o (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(182, 'fa fa-share-alt', 'fa-share-alt', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(183, 'fa fa-share-alt-square', 'fa-share-alt-square', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(184, 'fa fa-slack', 'fa-slack', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(185, 'fa fa-sliders', 'fa-sliders', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(186, 'fa fa-soundcloud', 'fa-soundcloud', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(187, 'fa fa-space-shuttle', 'fa-space-shuttle', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(188, 'fa fa-spoon', 'fa-spoon', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(189, 'fa fa-spotify', 'fa-spotify', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(190, 'fa fa-steam', 'fa-steam', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(191, 'fa fa-steam-square', 'fa-steam-square', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(192, 'fa fa-stumbleupon', 'fa-stumbleupon', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(193, 'fa fa-stumbleupon-circle', 'fa-stumbleupon-circle', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(194, 'fa fa-support', 'fa-support (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(195, 'fa fa-taxi', 'fa-taxi', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(196, 'fa fa-tencent-weibo', 'fa-tencent-weibo', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(197, 'fa fa-tree', 'fa-tree', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(198, 'fa fa-university', 'fa-university', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(199, 'fa fa-vine', 'fa-vine', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(200, 'fa fa-wechat', 'fa-wechat (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(201, 'fa fa-weixin', 'fa-weixin', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(202, 'fa fa-wordpress', 'fa-wordpress', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(203, 'fa fa-yahoo', 'fa-yahoo', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(204, 'fa fa-adjust', 'fa-adjust', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(205, 'fa fa-anchor', 'fa-anchor', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(206, 'fa fa-archive', 'fa-archive', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(207, 'fa fa-arrows', 'fa-arrows', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(208, 'fa fa-arrows-h', 'fa-arrows-h', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(209, 'fa fa-arrows-v', 'fa-arrows-v', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(210, 'fa fa-asterisk', 'fa-asterisk', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(211, 'fa fa-ban', 'fa-ban', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(212, 'fa fa-bar-chart-o', 'fa-bar-chart-o', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(213, 'fa fa-barcode', 'fa-barcode', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(214, 'fa fa-bars', 'fa-bars', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(215, 'fa fa-beer', 'fa-beer', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(216, 'fa fa-bell', 'fa-bell', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(217, 'fa fa-bell-o', 'fa-bell-o', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(218, 'fa fa-bolt', 'fa-bolt', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(219, 'fa fa-book', 'fa-book', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(220, 'fa fa-bookmark', 'fa-bookmark', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(221, 'fa fa-bookmark-o', 'fa-bookmark-o', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(222, 'fa fa-briefcase', 'fa-briefcase', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(223, 'fa fa-bug', 'fa-bug', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(224, 'fa fa-building-o', 'fa-building-o', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(225, 'fa fa-bullhorn', 'fa-bullhorn', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(226, 'fa fa-bullseye', 'fa-bullseye', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(227, 'fa fa-calendar', 'fa-calendar', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(228, 'fa fa-calendar-o', 'fa-calendar-o', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(229, 'fa fa-camera', 'fa-camera', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(230, 'fa fa-camera-retro', 'fa-camera-retro', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(231, 'fa fa-caret-square-o-down', 'fa-caret-square-o-down', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(232, 'fa fa-caret-square-o-right', 'fa-caret-square-o-right', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(233, 'fa fa-caret-square-o-up', 'fa-caret-square-o-up', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(234, 'fa fa-certificate', 'fa-certificate', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(235, 'fa fa-check', 'fa-check', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(236, 'fa fa-check-circle', 'fa-check-circle', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(237, 'fa fa-check-circle-o', 'fa-check-circle-o', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(238, 'fa fa-check-square', 'fa-check-square', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(239, 'fa fa-check-square-o', 'fa-check-square-o', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(240, 'fa fa-circle', 'fa-circle', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(241, 'fa fa-circle-o', 'fa-circle-o', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(242, 'fa fa-clock-o', 'fa-clock-o', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(243, 'fa fa-cloud', 'fa-cloud', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(244, 'fa fa-cloud-download', 'fa-cloud-download', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(245, 'fa fa-cloud-upload', 'fa-cloud-upload', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(246, 'fa fa-code', 'fa-code', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(247, 'fa fa-code-fork', 'fa-code-fork', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(248, 'fa fa-coffee', 'fa-coffee', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(249, 'fa fa-cog', 'fa-cog', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(250, 'fa fa-cogs', 'fa-cogs', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(251, 'fa fa-comment', 'fa-comment', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(252, 'fa fa-comment-o', 'fa-comment-o', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(253, 'fa fa-comments', 'fa-comments', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(254, 'fa fa-comments-o', 'fa-comments-o', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(255, 'fa fa-compass', 'fa-compass', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(256, 'fa fa-credit-card', 'fa-credit-card', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(257, 'fa fa-crop', 'fa-crop', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(258, 'fa fa-crosshairs', 'fa-crosshairs', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(259, 'fa fa-cutlery', 'fa-cutlery', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(260, 'fa fa-dashboard', 'fa-dashboard (alias)', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(261, 'fa fa-desktop', 'fa-desktop', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(262, 'fa fa-download', 'fa-download', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(263, 'fa fa-edit', 'fa-edit (alias)', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(264, 'fa fa-ellipsis-h', 'fa-ellipsis-h', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(265, 'fa fa-ellipsis-v', 'fa-ellipsis-v', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(266, 'fa fa-envelope', 'fa-envelope', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(267, 'fa fa-envelope-o', 'fa-envelope-o', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(268, 'fa fa-eraser', 'fa-eraser', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(269, 'fa fa-exchange', 'fa-exchange', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(270, 'fa fa-exclamation', 'fa-exclamation', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(271, 'fa fa-exclamation-circle', 'fa-exclamation-circle', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(272, 'fa fa-exclamation-triangle', 'fa-exclamation-triangle', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(273, 'fa fa-external-link', 'fa-external-link', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(274, 'fa fa-external-link-square', 'fa-external-link-square', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(275, 'fa fa-eye', 'fa-eye', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(276, 'fa fa-eye-slash', 'fa-eye-slash', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(277, 'fa fa-female', 'fa-female', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(278, 'fa fa-fighter-jet', 'fa-fighter-jet', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(279, 'fa fa-film', 'fa-film', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(280, 'fa fa-filter', 'fa-filter', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(281, 'fa fa-fire', 'fa-fire', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(282, 'fa fa-fire-extinguisher', 'fa-fire-extinguisher', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(283, 'fa fa-flag', 'fa-flag', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(284, 'fa fa-flag-checkered', 'fa-flag-checkered', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(285, 'fa fa-flag-o', 'fa-flag-o', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(286, 'fa fa-flash', 'fa-flash (alias)', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(287, 'fa fa-flask', 'fa-flask', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(288, 'fa fa-folder', 'fa-folder', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(289, 'fa fa-folder-o', 'fa-folder-o', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(290, 'fa fa-folder-open', 'fa-folder-open', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(291, 'fa fa-folder-open-o', 'fa-folder-open-o', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(292, 'fa fa-frown-o', 'fa-frown-o', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(293, 'fa fa-gamepad', 'fa-gamepad', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(294, 'fa fa-gavel', 'fa-gavel', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(295, 'fa fa-gear', 'fa-gear (alias)', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(296, 'fa fa-gears', 'fa-gears (alias)', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(297, 'fa fa-gift', 'fa-gift', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(298, 'fa fa-glass', 'fa-glass', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(299, 'fa fa-globe', 'fa-globe', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(300, 'fa fa-group', 'fa-group (alias)', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(301, 'fa fa-hdd-o', 'fa-hdd-o', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(302, 'fa fa-headphones', 'fa-headphones', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(303, 'fa fa-heart', 'fa-heart', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(304, 'fa fa-heart-o', 'fa-heart-o', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(305, 'fa fa-home', 'fa-home', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(306, 'fa fa-inbox', 'fa-inbox', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(307, 'fa fa-info', 'fa-info', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(308, 'fa fa-info-circle', 'fa-info-circle', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(309, 'fa fa-key', 'fa-key', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(310, 'fa fa-keyboard-o', 'fa-keyboard-o', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(311, 'fa fa-laptop', 'fa-laptop', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(312, 'fa fa-leaf', 'fa-leaf', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(313, 'fa fa-legal', 'fa-legal (alias)', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(314, 'fa fa-lemon-o', 'fa-lemon-o', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(315, 'fa fa-level-down', 'fa-level-down', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(316, 'fa fa-level-up', 'fa-level-up', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(317, 'fa fa-lightbulb-o', 'fa-lightbulb-o', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(318, 'fa fa-location-arrow', 'fa-location-arrow', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(319, 'fa fa-lock', 'fa-lock', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(320, 'fa fa-magic', 'fa-magic', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(321, 'fa fa-magnet', 'fa-magnet', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(322, 'fa fa-mail-forward', 'fa-mail-forward (alias)', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(323, 'fa fa-mail-reply', 'fa-mail-reply (alias)', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(324, 'fa fa-mail-reply-all', 'fa-mail-reply-all', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(325, 'fa fa-male', 'fa-male', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(326, 'fa fa-map-marker', 'fa-map-marker', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(327, 'fa fa-meh-o', 'fa-meh-o', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(328, 'fa fa-microphone', 'fa-microphone', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(329, 'fa fa-microphone-slash', 'fa-microphone-slash', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(330, 'fa fa-minus', 'fa-minus', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(331, 'fa fa-minus-circle', 'fa-minus-circle', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(332, 'fa fa-minus-square', 'fa-minus-square', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(333, 'fa fa-minus-square-o', 'fa-minus-square-o', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(334, 'fa fa-mobile', 'fa-mobile', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(335, 'fa fa-mobile-phone', 'fa-mobile-phone (alias)', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(336, 'fa fa-money', 'fa-money', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(337, 'fa fa-moon-o', 'fa-moon-o', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(338, 'fa fa-music', 'fa-music', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(339, 'fa fa-pencil', 'fa-pencil', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(340, 'fa fa-pencil-square', 'fa-pencil-square', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(341, 'fa fa-pencil-square-o', 'fa-pencil-square-o', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(342, 'fa fa-phone', 'fa-phone', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(343, 'fa fa-phone-square', 'fa-phone-square', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(344, 'fa fa-picture-o', 'fa-picture-o', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(345, 'fa fa-plane', 'fa-plane', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(346, 'fa fa-plus', 'fa-plus', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(347, 'fa fa-plus-circle', 'fa-plus-circle', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(348, 'fa fa-plus-square', 'fa-plus-square', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(349, 'fa fa-power-off', 'fa-power-off', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(350, 'fa fa-print', 'fa-print', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(351, 'fa fa-puzzle-piece', 'fa-puzzle-piece', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(352, 'fa fa-qrcode', 'fa-qrcode', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(353, 'fa fa-question', 'fa-question', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(354, 'fa fa-question-circle', 'fa-question-circle', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(355, 'fa fa-quote-left', 'fa-quote-left', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(356, 'fa fa-quote-right', 'fa-quote-right', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(357, 'fa fa-random', 'fa-random', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(358, 'fa fa-refresh', 'fa-refresh', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(359, 'fa fa-reply', 'fa-reply', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(360, 'fa fa-reply-all', 'fa-reply-all', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(361, 'fa fa-retweet', 'fa-retweet', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(362, 'fa fa-road', 'fa-road', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(363, 'fa fa-rocket', 'fa-rocket', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(364, 'fa fa-rss', 'fa-rss', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(365, 'fa fa-rss-square', 'fa-rss-square', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(366, 'fa fa-search', 'fa-search', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(367, 'fa fa-search-minus', 'fa-search-minus', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(368, 'fa fa-search-plus', 'fa-search-plus', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(369, 'fa fa-share', 'fa-share', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(370, 'fa fa-share-square', 'fa-share-square', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(371, 'fa fa-share-square-o', 'fa-share-square-o', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(372, 'fa fa-shield', 'fa-shield', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(373, 'fa fa-shopping-cart', 'fa-shopping-cart', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(374, 'fa fa-sign-in', 'fa-sign-in', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(375, 'fa fa-sign-out', 'fa-sign-out', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(376, 'fa fa-signal', 'fa-signal', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(377, 'fa fa-sitemap', 'fa-sitemap', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(378, 'fa fa-smile-o', 'fa-smile-o', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(379, 'fa fa-sort', 'fa-sort', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(380, 'fa fa-sort-alpha-asc', 'fa-sort-alpha-asc', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(381, 'fa fa-sort-alpha-desc', 'fa-sort-alpha-desc', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(382, 'fa fa-sort-amount-asc', 'fa-sort-amount-asc', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(383, 'fa fa-sort-amount-desc', 'fa-sort-amount-desc', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(384, 'fa fa-sort-asc', 'fa-sort-asc', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(385, 'fa fa-sort-desc', 'fa-sort-desc', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(386, 'fa fa-sort-down', 'fa-sort-down (alias)', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(387, 'fa fa-sort-numeric-asc', 'fa-sort-numeric-asc', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(388, 'fa fa-sort-numeric-desc', 'fa-sort-numeric-desc', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(389, 'fa fa-sort-up', 'fa-sort-up (alias)', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(390, 'fa fa-spinner', 'fa-spinner', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(391, 'fa fa-square', 'fa-square', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(392, 'fa fa-square-o', 'fa-square-o', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(393, 'fa fa-star', 'fa-star', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(394, 'fa fa-star-half', 'fa-star-half', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(395, 'fa fa-star-half-empty', 'fa-star-half-empty (alias)', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(396, 'fa fa-star-half-full', 'fa-star-half-full (alias)', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(397, 'fa fa-star-half-o', 'fa-star-half-o', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(398, 'fa fa-star-o', 'fa-star-o', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(399, 'fa fa-subscript', 'fa-subscript', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(400, 'fa fa-suitcase', 'fa-suitcase', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(401, 'fa fa-sun-o', 'fa-sun-o', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(402, 'fa fa-superscript', 'fa-superscript', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(403, 'fa fa-tablet', 'fa-tablet', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(404, 'fa fa-tachometer', 'fa-tachometer', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(405, 'fa fa-tag', 'fa-tag', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(406, 'fa fa-tags', 'fa-tags', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(407, 'fa fa-tasks', 'fa-tasks', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(408, 'fa fa-terminal', 'fa-terminal', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(409, 'fa fa-thumb-tack', 'fa-thumb-tack', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(410, 'fa fa-thumbs-down', 'fa-thumbs-down', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(411, 'fa fa-thumbs-o-down', 'fa-thumbs-o-down', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(412, 'fa fa-thumbs-o-up', 'fa-thumbs-o-up', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(413, 'fa fa-thumbs-up', 'fa-thumbs-up', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(414, 'fa fa-ticket', 'fa-ticket', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(415, 'fa fa-times', 'fa-times', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(416, 'fa fa-times-circle', 'fa-times-circle', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(417, 'fa fa-times-circle-o', 'fa-times-circle-o', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(418, 'fa fa-tint', 'fa-tint', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(419, 'fa fa-toggle-down', 'fa-toggle-down (alias)', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(420, 'fa fa-toggle-right', 'fa-toggle-right (alias)', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(421, 'fa fa-toggle-up', 'fa-toggle-up (alias)', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(422, 'fa fa-trash-o', 'fa-trash-o', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(423, 'fa fa-trophy', 'fa-trophy', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(424, 'fa fa-truck', 'fa-truck', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(425, 'fa fa-umbrella', 'fa-umbrella', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(426, 'fa fa-unlock', 'fa-unlock', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(427, 'fa fa-unlock-alt', 'fa-unlock-alt', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(428, 'fa fa-unsorted', 'fa-unsorted (alias)', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(429, 'fa fa-upload', 'fa-upload', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(430, 'fa fa-user', 'fa-user', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(431, 'fa fa-users', 'fa-users', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(432, 'fa fa-video-camera', 'fa-video-camera', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(433, 'fa fa-volume-down', 'fa-volume-down', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(434, 'fa fa-volume-off', 'fa-volume-off', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(435, 'fa fa-volume-up', 'fa-volume-up', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(436, 'fa fa-warning', 'fa-warning (alias)', 'Web Application Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(437, 'fa fa-wrench', 'fa-wrench', 'Web Application Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(438, 'fa fa-bitcoin', 'fa-bitcoin (alias)', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(439, 'fa fa-btc', 'fa-btc', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(440, 'fa fa-cny', 'fa-cny (alias)', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(441, 'fa fa-dollar', 'fa-dollar (alias)', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(442, 'fa fa-eur', 'fa-eur', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(443, 'fa fa-euro', 'fa-euro (alias)', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(444, 'fa fa-gbp', 'fa-gbp', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(445, 'fa fa-inr', 'fa-inr', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(446, 'fa fa-jpy', 'fa-jpy', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(447, 'fa fa-krw', 'fa-krw', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(448, 'fa fa-rmb', 'fa-rmb (alias)', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(449, 'fa fa-rupee', 'fa-rupee (alias)', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(450, 'fa fa-usd', 'fa-usd', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(451, 'fa fa-won', 'fa-won (alias)', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(452, 'fa fa-yen', 'fa-yen (alias)', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(453, 'fa fa-align-center', 'fa-align-center', 'Text Editor Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(454, 'fa fa-align-justify', 'fa-align-justify', 'Text Editor Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(455, 'fa fa-align-left', 'fa-align-left', 'Text Editor Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(456, 'fa fa-align-right', 'fa-align-right', 'Text Editor Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00');
INSERT INTO `icons` (`id`, `class`, `name`, `category`, `d_create`, `d_update`) VALUES
(457, 'fa fa-bold', 'fa-bold', 'Text Editor Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(458, 'fa fa-chain', 'fa-chain (alias)', 'Text Editor Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(459, 'fa fa-chain-broken', 'fa-chain-broken', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(460, 'fa fa-clipboard', 'fa-clipboard', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(461, 'fa fa-columns', 'fa-columns', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(462, 'fa fa-copy', 'fa-copy (alias)', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(463, 'fa fa-cut', 'fa-cut (alias)', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(464, 'fa fa-dedent', 'fa-dedent (alias)', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(465, 'fa fa-file', 'fa-file', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(466, 'fa fa-file-o', 'fa-file-o', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(467, 'fa fa-file-text', 'fa-file-text', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(468, 'fa fa-file-text-o', 'fa-file-text-o', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(469, 'fa fa-files-o', 'fa-files-o', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(470, 'fa fa-floppy-o', 'fa-floppy-o', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(471, 'fa fa-font', 'fa-font', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(472, 'fa fa-indent', 'fa-indent', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(473, 'fa fa-italic', 'fa-italic', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(474, 'fa fa-link', 'fa-link', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(475, 'fa fa-list', 'fa-list', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(476, 'fa fa-list-alt', 'fa-list-alt', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(477, 'fa fa-list-ol', 'fa-list-ol', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(478, 'fa fa-list-ul', 'fa-list-ul', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(479, 'fa fa-outdent', 'fa-outdent', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(480, 'fa fa-paperclip', 'fa-paperclip', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(481, 'fa fa-paste', 'fa-paste (alias)', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(482, 'fa fa-repeat', 'fa-repeat', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(483, 'fa fa-rotate-left', 'fa-rotate-left (alias)', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(484, 'fa fa-rotate-right', 'fa-rotate-right (alias)', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(485, 'fa fa-save', 'fa-save (alias)', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(486, 'fa fa-scissors', 'fa-scissors', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(487, 'fa fa-strikethrough', 'fa-strikethrough', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(488, 'fa fa-table', 'fa-table', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(489, 'fa fa-text-height', 'fa-text-height', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(490, 'fa fa-text-width', 'fa-text-width', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(491, 'fa fa-th', 'fa-th', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(492, 'fa fa-th-large', 'fa-th-large', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(493, 'fa fa-th-list', 'fa-th-list', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(494, 'fa fa-underline', 'fa-underline', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(495, 'fa fa-undo', 'fa-undo', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(496, 'fa fa-unlink', 'fa-unlink (alias)', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(497, 'fa fa-angle-double-down', 'fa-angle-double-down', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(498, 'fa fa-angle-double-left', 'fa-angle-double-left', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(499, 'fa fa-angle-double-right', 'fa-angle-double-right', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(500, 'fa fa-angle-double-up', 'fa-angle-double-up', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(501, 'fa fa-angle-down', 'fa-angle-down', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(502, 'fa fa-angle-left', 'fa-angle-left', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(503, 'fa fa-angle-right', 'fa-angle-right', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(504, 'fa fa-angle-up', 'fa-angle-up', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(505, 'fa fa-arrow-circle-down', 'fa-arrow-circle-down', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(506, 'fa fa-arrow-circle-left', 'fa-arrow-circle-left', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(507, 'fa fa-arrow-circle-o-down', 'fa-arrow-circle-o-down', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(508, 'fa fa-arrow-circle-o-up', 'fa-arrow-circle-o-up', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(509, 'fa fa-arrow-circle-right', 'fa-arrow-circle-right', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(510, 'fa fa-arrow-circle-up', 'fa-arrow-circle-up', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(511, 'fa fa-arrow-down', 'fa-arrow-down', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(512, 'fa fa-arrow-left', 'fa-arrow-left', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(513, 'fa fa-arrow-right', 'fa-arrow-right', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(514, 'fa fa-arrow-up', 'fa-arrow-up', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(515, 'fa fa-arrows-alt', 'fa-arrows-alt', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(516, 'fa fa-caret-down', 'fa-caret-down', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(517, 'fa fa-caret-left', 'fa-caret-left', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(518, 'fa fa-caret-right', 'fa-caret-right', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(519, 'fa fa-caret-up', 'fa-caret-up', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(520, 'fa fa-chevron-circle-down', 'fa-chevron-circle-down', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(521, 'fa fa-chevron-circle-left', 'fa-chevron-circle-left', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(522, 'fa fa-chevron-circle-right', 'fa-chevron-circle-right', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(523, 'fa fa-chevron-circle-up', 'fa-chevron-circle-up', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(524, 'fa fa-chevron-down', 'fa-chevron-down', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(525, 'fa fa-chevron-left', 'fa-chevron-left', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(526, 'fa fa-chevron-right', 'fa-chevron-right', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(527, 'fa fa-chevron-up', 'fa-chevron-up', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(528, 'fa fa-hand-o-down', 'fa-hand-o-down', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(529, 'fa fa-hand-o-left', 'fa-hand-o-left', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(530, 'fa fa-hand-o-right', 'fa-hand-o-right', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(531, 'fa fa-hand-o-up', 'fa-hand-o-up', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(532, 'fa fa-long-arrow-down', 'fa-long-arrow-down', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(533, 'fa fa-long-arrow-left', 'fa-long-arrow-left', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(534, 'fa fa-long-arrow-right', 'fa-long-arrow-right', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(535, 'fa fa-long-arrow-up', 'fa-long-arrow-up', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(536, 'fa fa-backward', 'fa-backward', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(537, 'fa fa-compress', 'fa-compress', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(538, 'fa fa-eject', 'fa-eject', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(539, 'fa fa-expand', 'fa-expand', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(540, 'fa fa-fast-backward', 'fa-fast-backward', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(541, 'fa fa-fast-forward', 'fa-fast-forward', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(542, 'fa fa-forward', 'fa-forward', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(543, 'fa fa-pause', 'fa-pause', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(544, 'fa fa-play', 'fa-play', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(545, 'fa fa-play-circle', 'fa-play-circle', 'Video Player Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(546, 'fa fa-play-circle-o', 'fa-play-circle-o', 'Video Player Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(547, 'fa fa-step-backward', 'fa-step-backward', 'Video Player Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(548, 'fa fa-step-forward', 'fa-step-forward', 'Video Player Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(549, 'fa fa-stop', 'fa-stop', 'Video Player Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(550, 'fa fa-youtube-play', 'fa-youtube-play', 'Video Player Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(551, 'fa fa-adn', 'fa-adn', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(552, 'fa fa-android', 'fa-android', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(553, 'fa fa-apple', 'fa-apple', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(554, 'fa fa-bitbucket', 'fa-bitbucket', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(555, 'fa fa-bitbucket-square', 'fa-bitbucket-square', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(556, 'fa fa-css3', 'fa-css3', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(557, 'fa fa-dribbble', 'fa-dribbble', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(558, 'fa fa-dropbox', 'fa-dropbox', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(559, 'fa fa-facebook', 'fa-facebook', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(560, 'fa fa-facebook-square', 'fa-facebook-square', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(561, 'fa fa-flickr', 'fa-flickr', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(562, 'fa fa-foursquare', 'fa-foursquare', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(563, 'fa fa-github', 'fa-github', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(564, 'fa fa-github-alt', 'fa-github-alt', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(565, 'fa fa-github-square', 'fa-github-square', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(566, 'fa fa-gittip', 'fa-gittip', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(567, 'fa fa-google-plus', 'fa-google-plus', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(568, 'fa fa-google-plus-square', 'fa-google-plus-square', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(569, 'fa fa-html5', 'fa-html5', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(570, 'fa fa-instagram', 'fa-instagram', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(571, 'fa fa-linkedin', 'fa-linkedin', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(572, 'fa fa-linkedin-square', 'fa-linkedin-square', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(573, 'fa fa-linux', 'fa-linux', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(574, 'fa fa-maxcdn', 'fa-maxcdn', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(575, 'fa fa-pinterest', 'fa-pinterest', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(576, 'fa fa-pinterest-square', 'fa-pinterest-square', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(577, 'fa fa-renren', 'fa-renren', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(578, 'fa fa-skype', 'fa-skype', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(579, 'fa fa-stack-overflow', 'fa-stack-overflow', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(580, 'fa fa-trello', 'fa-trello', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(581, 'fa fa-tumblr', 'fa-tumblr', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(582, 'fa fa-tumblr-square', 'fa-tumblr-square', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(583, 'fa fa-twitter', 'fa-twitter', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(584, 'fa fa-twitter-square', 'fa-twitter-square', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(585, 'fa fa-vk', 'fa-vk', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(586, 'fa fa-weibo', 'fa-weibo', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(587, 'fa fa-windows', 'fa-windows', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(588, 'fa fa-xing', 'fa-xing', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(589, 'fa fa-xing-square', 'fa-xing-square', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(590, 'fa fa-youtube', 'fa-youtube', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(591, 'fa fa-youtube-square', 'fa-youtube-square', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(592, 'fa fa-ambulance', 'fa-ambulance', 'Medical Icons', '2017-05-19 14:12:29', '0000-00-00 00:00:00'),
(593, 'fa fa-h-square', 'fa-h-square', 'Medical Icons', '2017-05-19 14:12:29', '0000-00-00 00:00:00'),
(594, 'fa fa-hospital-o', 'fa-hospital-o', 'Medical Icons', '2017-05-19 14:12:29', '0000-00-00 00:00:00'),
(595, 'fa fa-medkit', 'fa-medkit', 'Medical Icons', '2017-05-19 14:12:29', '0000-00-00 00:00:00'),
(596, 'fa fa-stethoscope', 'fa-stethoscope', 'Medical Icons', '2017-05-19 14:12:29', '0000-00-00 00:00:00'),
(597, 'fa fa-user-md', 'fa-user-md', 'Medical Icons', '2017-05-19 14:12:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `detail` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` int(11) NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `action_id` int(11) NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `action_id` (`action_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `name`, `description`, `logo`, `route`, `action_id`, `d_create`, `d_update`) VALUES
(1, 'Usuarios', '<a ><i class="fa fa-user-o"></i> <span class="nav-label">Usuarios</span><span class="fa arrow"></span></a>', 'fa fa-user-o', '', 0, '2017-05-09 14:04:30', '0000-00-00 00:00:00'),
(7, 'Menús', '<a ><i class="fa fa-user-o"></i> <span class="nav-label">Menús</span><span class="fa arrow"></span></a>', 'fa fa-bars', '', 0, '2017-05-09 14:03:45', '0000-00-00 00:00:00'),
(15, 'Bandeja de entrada', '', 'fa fa-inbox', 'bandeja_entrada', 32, '2017-11-07 16:04:14', '0000-00-00 00:00:00'),
(16, 'Bandeja política', '', 'fa fa-inbox', 'bandeja_politico', 33, '2017-11-08 15:10:52', '0000-00-00 00:00:00'),
(17, 'Bandeja asistencial', '', 'fa fa-inbox', 'bandeja_asistencial', 34, '2017-11-08 16:15:39', '0000-00-00 00:00:00'),
(18, 'Bandeja operantes', '', 'fa fa-inbox', 'bandeja_operantes', 35, '2017-11-08 18:04:34', '0000-00-00 00:00:00'),
(19, 'Bandeja oponentes', '', 'fa fa-inbox', 'bandeja_oponentes', 36, '2017-11-08 18:17:13', '0000-00-00 00:00:00'),
(20, 'Bandeja individuales', '', 'fa fa-inbox', 'bandeja_individuales', 37, '2017-11-08 18:33:40', '0000-00-00 00:00:00'),
(21, 'Bandeja colectivos', '', 'fa fa-inbox', 'bandeja_colectivos', 38, '2017-11-08 18:49:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `genero` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `direccion_nac` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion_viv` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `centro_votacion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `direccion_centro_votacion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `cedula`, `genero`, `nombre`, `apellido`, `fecha_nac`, `direccion_nac`, `direccion_viv`, `telefono`, `celular`, `correo`, `centro_votacion`, `direccion_centro_votacion`, `facebook`) VALUES
(1, '18993867', 'Masculino', 'JOSE ALFREDO', 'SOLORZANO HERNANDEZ', '03/02/1989', 'San Fernando de Apure', 'Río Blanco I', '0243258963', '04168464923', 'jose@gmail.com', 'ESCUELA BASICA ESTADAL ANTONIO JOSE DE SUCRE', 'BARRIO RIO BLANCO II FRENTE CALLE LAS FLORES A 100MTS DEL PASO DEL RIO CASA', 'josealfredo'),
(2, '19151341', '', 'ANA KARINA', 'SOLORZANO HERNANDEZ', '', '', 'Río Blanco', '', '04162587896', 'ana@gmail.com', 'CONCENTRACION RURAL BOLIVARIANA GARABATO', 'SECTOR: GARABATO. FRENTE CARRETERA GARABATO EL ALAMBIQUE PARTE ALTA. DERECHA CARRETERA GARABATO. REFERENCIA CARRETERA VIA POZO DE ROSAS, SECTOR GARABATO, FRENTE AL CENTRO DE FORMACION POSO DE ROSAS', ''),
(3, '19112593', 'Masculino', 'JESUS GERARDO', 'LAYA RODRIGUEZ', '17/06/1988', '', '', '02432587985', '04162587436', 'jesus@gmail.com', 'INCE INDUSTRIAL POLIVALENTE', 'SECTOR: CAMPO ALEGRE. FRENTE CALLE LA PAPELERA. DERECHA AVENIDA BERMUDEZ. REFERENCIA AL LADO DE LA EMPRESA DE TRANSPORTE DE VALORES PANAMERICANO', ''),
(4, '18123456', '', 'IRMA ', 'GONZALEZ MONTOYA', '', '', '', '', '', 'irma@gmail.com', 'ESCUELA BASICA BOLIVARIANA  FOCION F CORDERO', 'SECTOR PUEBLO LLANO IZQUIERDA AVENIDA CAMPO ELIAS. DERECHA CALLE DOÑA LAURA. FRENTE CALLE INDEPENDENCIA CALLE INDEPENDENCIA PUEBLO LLANO CASA', '@irma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `parameter_permit` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `action_id` (`action_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=127 ;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `user_id`, `action_id`, `parameter_permit`, `d_create`, `d_update`) VALUES
(1, 10, 5, '777', '2017-05-03 18:04:33', '0000-00-00 00:00:00'),
(36, 10, 8, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(37, 10, 9, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(38, 10, 10, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(62, 10, 24, '777', '2017-05-30 19:24:30', '0000-00-00 00:00:00'),
(106, 39, 2, '777', '2017-09-26 20:29:39', '0000-00-00 00:00:00'),
(107, 10, 1, '777', '2017-09-27 14:07:06', '0000-00-00 00:00:00'),
(112, 10, 32, '777', '2017-11-07 16:05:28', '0000-00-00 00:00:00'),
(113, 10, 33, '777', '2017-11-08 15:11:23', '0000-00-00 00:00:00'),
(114, 10, 34, '777', '2017-11-08 16:16:18', '0000-00-00 00:00:00'),
(115, 10, 35, '777', '2017-11-08 18:04:57', '0000-00-00 00:00:00'),
(116, 10, 36, '777', '2017-11-08 18:17:32', '0000-00-00 00:00:00'),
(117, 10, 37, '777', '2017-11-08 18:34:00', '0000-00-00 00:00:00'),
(118, 10, 38, '777', '2017-11-08 18:50:12', '0000-00-00 00:00:00'),
(119, 10, 39, '777', '2017-11-09 15:21:41', '0000-00-00 00:00:00'),
(120, 10, 40, '777', '2017-11-09 20:39:59', '0000-00-00 00:00:00'),
(121, 10, 41, '777', '2017-11-14 15:30:09', '0000-00-00 00:00:00'),
(122, 37, 32, '000', '2017-11-14 19:20:05', '0000-00-00 00:00:00'),
(123, 37, 39, '777', '2017-11-14 21:13:31', '0000-00-00 00:00:00'),
(124, 37, 41, '000', '2017-11-14 19:26:32', '0000-00-00 00:00:00'),
(125, 37, 40, '000', '2017-11-14 20:42:59', '0000-00-00 00:00:00'),
(126, 10, 2, '777', '2017-11-16 20:10:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`id`, `name`, `d_create`, `d_update`) VALUES
(1, 'ADMINISTRADOR', '2017-05-03 20:38:17', '0000-00-00 00:00:00'),
(2, 'FRANQUICIA', '2017-05-03 19:03:27', '0000-00-00 00:00:00'),
(20, 'PRUEBA', '2017-05-12 18:27:42', '0000-00-00 00:00:00'),
(21, 'PRUEBA2', '2017-05-12 16:09:10', '0000-00-00 00:00:00'),
(22, 'CLIENTES', '2017-08-31 17:58:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile_actions`
--

CREATE TABLE IF NOT EXISTS `profile_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `parameter_permit` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `action_id` (`action_id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=74 ;

--
-- Volcado de datos para la tabla `profile_actions`
--

INSERT INTO `profile_actions` (`id`, `profile_id`, `action_id`, `parameter_permit`, `d_create`, `d_update`) VALUES
(5, 1, 6, '777', '2017-05-04 15:44:22', '0000-00-00 00:00:00'),
(48, 20, 6, '777', '2017-05-12 15:55:17', '0000-00-00 00:00:00'),
(49, 20, 1, '777', '2017-05-12 15:55:17', '0000-00-00 00:00:00'),
(50, 20, 2, '777', '2017-05-12 15:55:18', '0000-00-00 00:00:00'),
(60, 20, 5, '777', '2017-05-12 18:27:42', '0000-00-00 00:00:00'),
(68, 22, 6, '777', '2017-08-31 17:58:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `parameter_permit` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `labels` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `name`, `parameter_permit`, `labels`, `d_create`, `d_update`) VALUES
(1, 'ABIERTO', '', 'label', '2017-05-23 19:43:05', '0000-00-00 00:00:00'),
(2, 'PRESUPUESTADO', '', 'label label-info', '2017-05-23 19:43:43', '0000-00-00 00:00:00'),
(3, 'APROBADO', '', 'label label-primary', '2017-05-23 19:46:51', '0000-00-00 00:00:00'),
(4, 'EN CURSO', '', 'label label-warning', '2017-05-23 19:45:02', '0000-00-00 00:00:00'),
(5, 'FINALIZADO', '', 'label label-danger', '2017-05-23 19:46:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenus`
--

CREATE TABLE IF NOT EXISTS `submenus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `action_id` (`action_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `submenus`
--

INSERT INTO `submenus` (`id`, `name`, `description`, `logo`, `route`, `menu_id`, `action_id`, `d_create`, `d_update`) VALUES
(1, 'Perfiles', '<li><a href="profile">Perfiles</a></li>', '', 'profile', 1, 1, '2017-05-05 20:59:47', '0000-00-00 00:00:00'),
(2, 'Usuarios', '<li><a href="users">Usuarios</a></li>', '', 'users', 1, 2, '2017-05-05 20:59:55', '0000-00-00 00:00:00'),
(5, 'Menús', ' <li><a href="menus">Menús</a></li>', '', 'menus', 7, 8, '2017-05-05 21:00:18', '0000-00-00 00:00:00'),
(6, 'Submenús', ' <li><a href="submenus">Submenús</a></li>', '', 'submenus', 7, 9, '2017-05-18 17:19:53', '0000-00-00 00:00:00'),
(7, 'Acciones', ' <li><a href="acciones">Acciones</a></li>', '', 'acciones', 7, 10, '2017-05-23 18:01:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE IF NOT EXISTS `tiendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rif` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `referencia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bd_externa` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cp_externo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`id`, `rif`, `name`, `address`, `referencia`, `bd_externa`, `cp_externo`, `phone`, `status`, `d_create`, `d_update`) VALUES
(24, '0000000', 'M3 Uniformes C.A.', 'Maracay', '', 'vsdfvgsdfg', '', '02435111138', 1, '2017-10-04 19:51:28', '2017-09-27 21:08:13'),
(25, '0000001', 'Prueba', 'Maracay', 'nduie78gv834mg123', 'gfsdgfsd', '', '257572648934', 1, '2017-10-04 19:51:31', '2017-09-27 15:11:38'),
(26, 'J-14785236-9', 'prueba2', 'prueba2', 'vgdfsgfdgs', 'gdfsgdfs', 'gfdgfds123', '04162587933', 1, '2017-10-10 16:22:34', '2017-10-10 16:22:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `time_line`
--

CREATE TABLE IF NOT EXISTS `time_line` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` int(11) NOT NULL,
  `mensaje` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `accion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tweet_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario` (`usuario`),
  KEY `tweet_id` (`tweet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `time_line`
--

INSERT INTO `time_line` (`id`, `fecha`, `usuario`, `mensaje`, `accion`, `tweet_id`) VALUES
(1, '2017-11-13 03:04:05', 10, 'cegefhtrjtryndfnf', 'Asignado a bandeja político', '101'),
(2, '2017-11-13 03:04:05', 10, 'vgfghdfhfghdfghdghd', 'Asignado a bandeja político', '100'),
(3, '2017-11-13 03:04:05', 10, 'vfxcvdbswgw', 'Asignado a bandeja político', '99'),
(4, '2017-11-13 03:04:05', 10, 'gdfgdfhdfvbf3h5htrhgh', 'Asignado a bandeja político', '98'),
(5, '2017-11-13 03:04:05', 10, 'cdsggsdghdfgsdsdfgdsgs', 'Asignado a bandeja asistencial', '97'),
(6, '2017-11-13 03:04:05', 10, 'sdfasdfgsvdfg3he', 'Asignado a bandeja asistencial', '96'),
(7, '2017-11-13 03:04:05', 10, 'gwegewgegerg24', 'Asignado a bandeja asistencial', '95'),
(8, '2017-11-13 03:04:05', 10, 'gftergwegefgh3gde', 'Asignado a bandeja asistencial', '94'),
(16, '2017-11-14 14:11:09', 10, 'vsdgfsdgeryhr', 'Asignado a bandeja oponentes', '98'),
(17, '2017-11-14 14:14:53', 10, 'bgrhrhrehrehtere', 'Asignado a bandeja operantes', '99'),
(18, '2017-11-14 14:49:47', 10, 'cdsfwegwegwe', 'Asignado a bandeja individuales', '94'),
(19, '2017-11-14 14:50:22', 10, 'eryeruryuhjfjfg', 'Asignado a bandeja colectivos', '95'),
(20, '2017-11-15 12:32:57', 10, '12345678', 'Asignado a bandeja político', '93'),
(22, '2017-11-15 14:18:12', 10, 'detalles', 'Asignado a bandeja político', '930828189206753280');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `twitter`
--

CREATE TABLE IF NOT EXISTS `twitter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `screen_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `followers_count` int(11) NOT NULL,
  `friends_count` int(11) NOT NULL,
  `listed_count` int(11) NOT NULL,
  `favorites_count` int(11) NOT NULL,
  `statuses_count` int(11) NOT NULL,
  `profile_image_url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=103 ;

--
-- Volcado de datos para la tabla `twitter`
--

INSERT INTO `twitter` (`id`, `screen_name`, `name`, `location`, `url`, `description`, `followers_count`, `friends_count`, `listed_count`, `favorites_count`, `statuses_count`, `profile_image_url`) VALUES
(1, 'César Soplín', 'César Soplín', 'Localización para probar la visualización en el perfil del twitter', 'http://www.prueba.com', 'Nubecino inquebrantable. Maxiquiosco owner', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(2, 'Erik Porroa', 'Erik Porroa', 'Localización para probar la visualización en el perfil del twitter', 'http://www.prueba.com', 'Code Hipster.', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(3, 'José Ignacio', 'José Ignacio', 'Localización para probar la visualización en el perfil del twitter', 'http://www.prueba.com', 'Rockstar chef, consejero espiritual', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(4, 'Pedro Perez', 'Pedro Perez', 'Localización para probar la visualización en el perfil del twitter', 'http://www.prueba.com', 'Primera prueba de edicion', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(5, 'Maria Lopez', 'Maria Lopez', 'Localización para probar la visualización en el perfil del twitter', 'http://www.prueba.com', 'Segunda prueba de edicion', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(6, 'Setsuko', 'Setsuko', 'Localización para probar la visualización en el perfil del twitter', 'http://www.prueba.com', 'Tuvo un vida corta y difícil.', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(7, 'Momo', 'Momo', 'Localización para probar la visualización en el perfil del twitter', 'http://www.prueba.com', 'Ve fantasmas', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(8, 'Chihiro', 'Chihiro', 'Localización para probar la visualización en el perfil del twitter', 'http://www.prueba.com', 'También ve fantasmas y espíritus', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(9, 'San', 'San', 'Localización para probar la visualización en el perfil del twitter', 'http://www.prueba.com', 'La Princesa Mononoke', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(10, 'Ponyo', 'Ponyo', 'Localización para probar la visualización en el perfil del twitter', 'http://www.prueba.com', 'Quiere dejar el mar.', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(11, 'Nausicaa', 'Nausicaa', 'Localización para probar la visualización en el perfil del twitter', 'http://www.prueba.com', 'Valiente y guerrera', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(12, 'Kiki', 'Kiki', 'Localización para probar la visualización en el perfil del twitter', 'http://www.prueba.com', 'Le gusta la aventura', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(13, 'Youko', 'Youko', 'Localización para probar la visualización en el perfil del twitter', 'http://www.prueba.com', 'Una escritora novicia pero con mucho talento.', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(14, 'Haru', 'Haru', 'Localización para probar la visualización en el perfil del twitter', 'http://www.prueba.com', 'Ha estado en el reino de los gatos.', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(15, 'Arrietty', 'Arrietty', 'Localización para probar la visualización en el perfil del twitter', 'http://www.prueba.com', 'Es valiente y atrevida', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(16, 'Umi', 'Umi', 'Localización para probar la visualización en el perfil del twitter', 'http://www.prueba.com', 'incansable luchadora', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(17, 'Lorem Ipsum1', 'Lorem Ipsum1', 'Localización para probar la visualización en el perfil del twitter', 'http://www.prueba.com', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(18, 'Lorem Ipsum2', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(19, 'Lorem Ipsum3', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(20, 'Lorem Ipsum4', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(21, 'Lorem Ipsum5', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(22, 'Lorem Ipsum6', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(23, 'Lorem Ipsum7', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(24, 'Lorem Ipsum8', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(25, 'Lorem Ipsum9', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(26, 'Lorem Ipsum10', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(27, 'Lorem Ipsum11', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(28, 'Lorem Ipsum12', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(29, 'Lorem Ipsum13', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(30, 'Lorem Ipsum14', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(31, 'Lorem Ipsum15', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(32, 'Lorem Ipsum16', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(33, 'Lorem Ipsum17', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(34, 'Lorem Ipsum18', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(35, 'Lorem Ipsum19', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(37, 'Lorem Ipsum20', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(38, 'Lorem Ipsum21', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(39, 'Lorem Ipsum22', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(40, 'Lorem Ipsum23', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(41, 'Lorem Ipsum24', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(42, 'Lorem Ipsum25', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(43, 'Lorem Ipsum26', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(44, 'Lorem Ipsum27', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(45, 'Lorem Ipsum28', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(46, 'Lorem Ipsum29', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(47, 'Lorem Ipsum30', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(48, 'Lorem Ipsum31', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(49, 'Lorem Ipsum32', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(50, 'Lorem Ipsum33', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(51, 'Lorem Ipsum34', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(52, 'Lorem Ipsum35', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(53, 'Lorem Ipsum36', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(54, 'Lorem Ipsum37', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(55, 'Lorem Ipsum38', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(56, 'Lorem Ipsum39', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(57, 'Lorem Ipsum40', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(58, 'Lorem Ipsum41', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(59, 'Lorem Ipsum42', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(60, 'Lorem Ipsum43', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(61, 'Lorem Ipsum44', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(62, 'Lorem Ipsum45', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(63, 'Lorem Ipsum46', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(64, 'Lorem Ipsum47', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(65, 'Lorem Ipsum48', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(66, 'Lorem Ipsum49', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(67, 'Lorem Ipsum50', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(68, 'Lorem Ipsum51', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(69, 'Lorem Ipsum52', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(70, 'Lorem Ipsum53', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(71, 'Lorem Ipsum54', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(72, 'Lorem Ipsum55', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(73, 'Lorem Ipsum56', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(74, 'Lorem Ipsum57', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(75, 'Lorem Ipsum58', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(76, 'Lorem Ipsum59', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(77, 'Lorem Ipsum60', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(78, 'Lorem Ipsum61', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(79, 'Lorem Ipsum62', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(80, 'Lorem Ipsum63', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(81, 'Lorem Ipsum64', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(82, 'Lorem Ipsum65', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(83, 'Lorem Ipsum66', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(84, 'Lorem Ipsum67', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(85, 'Lorem Ipsum68', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(86, 'Lorem Ipsum69', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(87, 'Lorem Ipsum70', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(88, 'Lorem Ipsum71', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(89, 'Lorem Ipsum72', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(90, 'Lorem Ipsum73', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(91, 'Lorem Ipsum74', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(92, 'Lorem Ipsum75', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(93, 'Lorem Ipsum76', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(94, 'Lorem Ipsum77', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(95, 'Lorem Ipsum78', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(96, 'Lorem Ipsum79', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(97, 'Lorem Ipsum80', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(98, 'Lorem Ipsum81', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(99, 'Lorem Ipsum82', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(100, 'Lorem Ipsum83', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(101, 'Lorem Ipsum84', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg'),
(102, 'Lorem Ipsum85', '', '', '', 'dolor sit amet, consectetur, adipisci velit', 123, 456, 0, 789, 0, 'https://adminlte.io/themes/AdminLTE/dist/img/user8-128x128.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `twitter_perfil`
--

CREATE TABLE IF NOT EXISTS `twitter_perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil_id` int(11) NOT NULL,
  `twitter_id` int(11) NOT NULL,
  `d_create` date NOT NULL,
  `d_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `perfil_id` (`perfil_id`,`twitter_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `twitter_perfil`
--

INSERT INTO `twitter_perfil` (`id`, `perfil_id`, `twitter_id`, `d_create`, `d_update`) VALUES
(2, 2, 1, '2017-11-10', '2017-11-10 21:22:00'),
(3, 3, 1, '2017-11-13', '2017-11-13 18:41:32'),
(4, 1, 1, '2017-11-13', '2017-11-13 18:50:56'),
(6, 1, 99, '2017-11-14', '2017-11-14 14:07:24'),
(7, 4, 1, '2017-11-14', '2017-11-14 21:26:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `profile_id` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `lastname`, `profile_id`, `admin`, `status`, `d_create`, `d_update`) VALUES
(10, 'admin@gmail.com', 'pbkdf2_sha256$12000$a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin', 'admin', 1, 1, 1, '2017-11-16 20:06:33', '2017-11-16 20:06:33'),
(37, 'ventas@m3uniformes.com', 'pbkdf2_sha256$12000$8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'M3 Uniformes', 'ventas@m3uniformes.com', 22, 0, 1, '2017-11-16 20:03:26', '2017-11-16 20:03:26'),
(39, 'solorzano202009@gmail.com', 'pbkdf2_sha256$12000$a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'José', 'Solorzano', 22, 0, 1, '2017-09-26 20:29:39', '2017-09-26 20:29:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_tiendas`
--

CREATE TABLE IF NOT EXISTS `users_tiendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tienda_id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `tienda_id` (`tienda_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=72 ;

--
-- Volcado de datos para la tabla `users_tiendas`
--

INSERT INTO `users_tiendas` (`id`, `user_id`, `tienda_id`, `tipo`, `status`, `d_create`, `d_update`) VALUES
(67, 37, 24, 1, 1, '2017-09-26 04:24:57', '0000-00-00 00:00:00'),
(69, 39, 24, 2, 0, '2017-09-26 20:32:32', '0000-00-00 00:00:00'),
(70, 10, 25, 1, 1, '2017-09-27 15:06:24', '0000-00-00 00:00:00'),
(71, 37, 26, 1, 1, '2017-10-10 16:19:40', '0000-00-00 00:00:00');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `permissions_ibfk_2` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `profile_actions`
--
ALTER TABLE `profile_actions`
  ADD CONSTRAINT `profile_actions_ibfk_1` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `profile_actions_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `submenus`
--
ALTER TABLE `submenus`
  ADD CONSTRAINT `submenus_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `submenus_ibfk_2` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
