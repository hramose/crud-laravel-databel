-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2017 a las 01:23:45
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `crudbeltran`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persons`
--

CREATE TABLE IF NOT EXISTS `persons` (
`id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `comments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `persons`
--

INSERT INTO `persons` (`id`, `code`, `name`, `lastname`, `gender`, `email`, `address`, `city`, `birth`, `comments`, `created_at`, `updated_at`) VALUES
(1, '2233', 'Angelina', 'Jolie', 'f', 'angelina@jolie.com.ar', 'Av Washington 2233', 'Washington', '0000-00-00', 'Besto movies on the world...', '2017-02-05 21:34:36', '2017-02-06 00:50:39'),
(2, '1122', 'Henry', 'Ford', 'm', 'henry@ford.com', 'Av Washington 2233', 'Kansas', '1979-02-02', 'Besto cars on the world...', '2017-01-01 21:34:36', '2017-02-05 21:34:36'),
(4, '3535', 'Rocky', 'Balboa', 'm', 'rocky@balboa.com', 'A. Lincoln 4455', 'New York', '1999-12-28', '', '2017-02-05 22:41:02', '2017-02-05 22:41:02'),
(6, 'CH123', 'Charles', 'Chaplin', 'm', 'charles@chaplin.com', 'Av roma 123', 'New York', '1955-02-05', '', '2017-02-06 00:40:05', '2017-02-06 00:40:05'),
(7, 'ARS', 'Claudia', 'Schiffer', 'f', 'claudia@sch.com', 'Av Whasington 3232', 'Oklahoma', '1999-12-27', '', '2017-02-06 00:44:02', '2017-02-06 00:44:02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persons`
--
ALTER TABLE `persons`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `persons_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persons`
--
ALTER TABLE `persons`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
