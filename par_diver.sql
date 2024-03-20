-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2024 a las 17:28:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `par_diver`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atraccion`
--

CREATE TABLE `atraccion` (
  `id_atrac` int(11) NOT NULL,
  `atraccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `atraccion`
--

INSERT INTO `atraccion` (`id_atrac`, `atraccion`) VALUES
(1, 'Montaña rusa'),
(2, 'Rueda de la fortuna'),
(3, 'Caja musical'),
(4, 'Viaje en tren');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comida`
--

CREATE TABLE `comida` (
  `id_com` int(11) NOT NULL,
  `comida` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comida`
--

INSERT INTO `comida` (`id_com`, `comida`) VALUES
(1, 'perro caliente'),
(2, 'hamburguesa'),
(3, 'maiz pira'),
(4, 'helado'),
(5, 'papas'),
(6, 'dulces');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cedula` int(12) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `telefono` int(12) NOT NULL,
  `id_atrac` varchar(50) NOT NULL,
  `id_com` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cedula`, `nombre`, `telefono`, `id_atrac`, `id_com`, `fecha_ingreso`) VALUES
(1111222567, 'Yurica Ducuara', 321244196, '2', '3', '2024-03-06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atraccion`
--
ALTER TABLE `atraccion`
  ADD PRIMARY KEY (`id_atrac`);

--
-- Indices de la tabla `comida`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`id_com`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atraccion`
--
ALTER TABLE `atraccion`
  MODIFY `id_atrac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comida`
--
ALTER TABLE `comida`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
