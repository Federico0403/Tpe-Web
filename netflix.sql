-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2024 a las 23:08:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `netflix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id_peliculas` int(11) NOT NULL,
  `Nombre_pelicula` varchar(50) NOT NULL,
  `Lanzamiento` date NOT NULL,
  `director` varchar(50) NOT NULL,
  `Idioma` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `id_productoras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_peliculas`, `Nombre_pelicula`, `Lanzamiento`, `director`, `Idioma`, `genero`, `id_productoras`) VALUES
(1, 'Buscando a Nemo', '2003-05-30', 'Andrew Stanton', 'Ingles', 'Animacion infantil', 0),
(2, 'One day', '2011-08-08', 'Lone Scherfig', 'Ingles', 'cine romantico ', 1),
(7, 'Duro de matar 1', '1988-12-15', 'John MCTiernan', 'Ingles', 'Accion', 3),
(9, 'Scary Movie', '2000-10-26', 'Kennen ivory Wayans', 'Ingles', 'Comedia', 4),
(17, 'harry potter', '2001-11-29', 'Chris Columbus', 'Ingles', 'Fantasia', 5),
(18, 'Buscando a Nemo 2', '0222-02-22', '222', 'Español', '222', 1),
(19, 'asdsad', '3232-02-22', '132131', 'Español', '1323123', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoras`
--

CREATE TABLE `productoras` (
  `id_productoras` int(11) NOT NULL,
  `nombre_productora` varchar(50) NOT NULL,
  `año_fundacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productoras`
--

INSERT INTO `productoras` (`id_productoras`, `nombre_productora`, `año_fundacion`) VALUES
(0, 'pixar', '1986-02-03'),
(1, 'Filn4 Productions', '1982-07-21'),
(3, '20th century studios', '1935-05-31'),
(4, 'MiraMax', '1979-02-13'),
(5, 'Warner Bros', '1923-04-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`) VALUES
(1, 'usuario@gmail.com', 'contraseña'),
(2, 'usuario2@gmail.com', 'contraseña');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id_peliculas`),
  ADD KEY `id_productoras` (`id_productoras`);

--
-- Indices de la tabla `productoras`
--
ALTER TABLE `productoras`
  ADD PRIMARY KEY (`id_productoras`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id_peliculas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `productoras`
--
ALTER TABLE `productoras`
  MODIFY `id_productoras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_productoras`) REFERENCES `productoras` (`id_productoras`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
