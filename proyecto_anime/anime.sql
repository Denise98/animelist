-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2018 a las 16:15:26
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `anime`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE `login_attempts` (
  `idlogin` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `success` tinyint(1) NOT NULL,
  `usuario` varchar(500) NOT NULL,
  `ipusuario` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login_attempts`
--

INSERT INTO `login_attempts` (`idlogin`, `fecha`, `success`, `usuario`, `ipusuario`) VALUES
(1, '2018-11-26', 1, '2', '::1'),
(2, '2018-11-26', 1, '2', '::1'),
(3, '2018-11-26', 1, '2', '::1'),
(4, '2018-11-27', 1, '2', '::1'),
(5, '2018-11-27', 1, '2', '::1'),
(6, '2018-11-27', 1, '2', '::1'),
(7, '2018-11-27', 1, '2', '::1'),
(8, '2018-11-27', 0, '2', '::1'),
(9, '2018-11-27', 1, '2', '::1'),
(10, '2018-11-27', 1, '2', '::1'),
(11, '2018-11-27', 0, '2', '::1'),
(12, '2018-11-27', 1, '2', '::1'),
(13, '2018-11-27', 0, '2', '::1'),
(14, '2018-11-27', 1, '2', '::1'),
(15, '2018-11-27', 0, '2', '::1'),
(16, '2018-11-27', 1, '2', '::1'),
(17, '2018-11-27', 1, '2', '::1'),
(18, '2018-11-27', 1, '2', '::1'),
(19, '2018-11-27', 1, '2', '::1'),
(20, '2018-11-27', 1, '2', '::1'),
(21, '2018-11-27', 1, '2', '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_anime_list`
--

CREATE TABLE `user_anime_list` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `punct` int(11) NOT NULL,
  `id_anime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_anime_list`
--

INSERT INTO `user_anime_list` (`id`, `id_usuario`, `nombre`, `punct`, `id_anime`) VALUES
(1, 3, 'Tensei shitara Slime Datta Ken', 8, 37430);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(11) NOT NULL,
  `password` varchar(350) NOT NULL,
  `nombre` varchar(11) NOT NULL,
  `apellido` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `password`, `nombre`, `apellido`) VALUES
(3, '2', '3bafbf08882a2d10133093a1b8433f50563b93c14acd05b79028eb1d12799027241450980651994501423a66c276ae26c43b739bc65c4e16b10c3af6c202aebb', 'julio', 'gonzalez');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`idlogin`);

--
-- Indices de la tabla `user_anime_list`
--
ALTER TABLE `user_anime_list`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `user_anime_list`
--
ALTER TABLE `user_anime_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
