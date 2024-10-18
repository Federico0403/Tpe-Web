-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2024 a las 22:55:31
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
  `id_productora` int(11) NOT NULL,
  `imagen_pelicula` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_peliculas`, `Nombre_pelicula`, `Lanzamiento`, `director`, `Idioma`, `genero`, `id_productora`, `imagen_pelicula`) VALUES
(1, 'Buscando a Nemo', '2003-05-30', 'Andrew Stanton', 'Ingles', 'Animacion infantil', 0, ''),
(2, 'One day', '2011-08-08', 'Lone Scherfig', 'Ingles', 'cine romantico ', 1, ''),
(7, 'Duro de matar 1', '1988-12-15', 'John MCTiernan', 'Ingles', 'Accion', 3, ''),
(9, 'Scary Movie', '2000-10-26', 'Kennen ivory Wayans', 'Ingles', 'Comedia', 4, ''),
(17, 'harry potter', '2001-11-29', 'Chris Columbus', 'Ingles', 'Fantasia', 5, ''),
(18, 'jfjwej', '0002-02-22', 'cknknckn', 'Ingles', 'comedia', 4, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoras`
--

CREATE TABLE `productoras` (
  `id_productora` int(11) NOT NULL,
  `nombre_productora` varchar(50) NOT NULL,
  `año_fundacion` date NOT NULL,
  `fundador_es` varchar(100) NOT NULL,
  `pais_origen` varchar(50) NOT NULL,
  `imagen_productora` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productoras`
--

INSERT INTO `productoras` (`id_productora`, `nombre_productora`, `año_fundacion`, `fundador_es`, `pais_origen`, `imagen_productora`) VALUES
(0, 'pixar', '1986-02-03', ' Steve Jobs, John Lasseter, George Lucas, Edwin Catmull, Alvy Ray Smith, Alexandre Schure', 'Estados Unidos', ''),
(1, 'juan pedro', '0000-00-00', 'hihihihihi', 'rusia', ''),
(3, '20th century studios', '1935-05-31', 'Joseph M. Schenck, Darryl F. Zanuck', 'Estados Unidos', ''),
(4, 'MiraMax', '1979-02-13', 'Harvey Weinstein, Bob Weinstein', 'Estados Unidos', ''),
(5, 'Warner Bros', '1923-04-04', ' Sam Warner, Jack Warner, Harry Warner, Albert Warner', 'Estados Unidos', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `password`) VALUES
(1, 'usuario@gmail.com', 'contraseña');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id_peliculas`),
  ADD KEY `id_productoras` (`id_productora`);

--
-- Indices de la tabla `productoras`
--
ALTER TABLE `productoras`
  ADD PRIMARY KEY (`id_productora`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id_peliculas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `productoras`
--
ALTER TABLE `productoras`
  MODIFY `id_productora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_productora`) REFERENCES `productoras` (`id_productora`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
