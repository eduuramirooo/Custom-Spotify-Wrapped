-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2025 a las 10:18:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wrapped`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE `cancion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `artista` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `puesto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`id`, `nombre`, `artista`, `link`, `puesto`, `id_usuario`) VALUES
(1, 'The bell jar', 'superreservao', 'https://i.scdn.co/image/ab67616d0000b273f5bb9ce360ab4d4e1960daae', 1, 1),
(2, 'Atrás', 'Sticky M.A.', 'https://i.scdn.co/image/ab67616d0000b273b5af39875b6d4ff6f9ebc859', 2, 1),
(3, 'MUSICA DE ASCENSOR', 'AgusFortnite2008', 'https://i.scdn.co/image/ab67616d0000b273b7491811bb65bbd790f100d9', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `username`, `password`) VALUES
(1, 'Edu', 'eduu', '$2y$10$Ow84ISYOYRI7bE7uDN0QyewVkiUDU/E15f28VmSbDUJqJDImbGPte');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cancion`
--
ALTER TABLE `cancion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
