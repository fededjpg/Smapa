-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2020 a las 04:02:52
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(100) NOT NULL,
  `user` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `passwd` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `adminuser`
--

INSERT INTO `adminuser` (`id`, `user`, `email`, `passwd`) VALUES
(11, 'fededjpg', 'federicodjprzgmz247@gmail.com', '$2y$15$vL3UX8tU1TfFoseI8PkCF.nXIvhLWgI8rfEaZ2OMPQJtO3Eevrpl2'),
(12, 'fededjpg3', 'fededj-247@hotmail.com', '$2y$15$cOg72prdNZSrUGc8meEJe.hxcNUrH6uCpqcUlB6QVMEoZN29/IhRe'),
(13, 'fede', 'federico@gmail.com', '12345'),
(14, 'nando', 'nando@hotmail.com', '$2y$15$aRPr2YADeJ8BRlmKX2cZUe0vfAy6rZUlHNcbyb/RKmuwiLyCrqGNi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brigadas`
--

CREATE TABLE `brigadas` (
  `Brigadas` varchar(100) NOT NULL,
  `Fecha` varchar(100) NOT NULL,
  `Lugar` varchar(100) NOT NULL,
  `Folio` int(100) NOT NULL,
  `Horario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `brigadas`
--

INSERT INTO `brigadas` (`Brigadas`, `Fecha`, `Lugar`, `Folio`, `Horario`) VALUES
('Equipo 9', '2020-05-21', 'Palacio de Gobierno de Estado de Chiapas, Avenida 2a. Sur Poniente, La Lomita, Tuxtla Gutiérrez, Chi', 1, '12: 00 PM - 9:00PM'),
('Equipo 8', '2020-05-10', 'De La 19 Poniente Sur, Penipak, Tuxtla Gutiérrez, Chiapas', 2, '12: 00 PM - 8: 00PM'),
('Equipo 4', '2020-04-03', 'Pistimbak, Tuxtla Gutiérrez, Chis.', 3, '12:00 pm - 3:00 pm'),
('Equipo 7', '2020-04-03', 'Bienestar Social, Tuxtla Gutiérrez, Chiapas', 4, '9:00 am - 12:00 pm'),
('Equipo 8', '2020-04-03', 'Secretaría de Bienestar Social, Calle 12A. Poniente Norte, El Magueyito, Tuxtla Gutiérrez, Chiapas', 5, '7:00 am - 1:00 pm'),
('Equipo 9', '2020-04-03', 'Patria Nueva, Tuxtla Gutiérrez, Chis.', 6, '6:00 am - 2:00 pm'),
('Equipo 3', '2020-04-03', 'ZOOMAT, Calle Señor del Pozo, Cerro Hueco, Tuxtla Gutiérrez, Chiapas', 7, '6:00 pm - 8:00 pm'),
('Equipo 6', '2020-04-03', 'Parque Patricia, Francisco I. Madero, Tuxtla Gutiérrez, Chis.', 8, '4:00 pm - 6:00 pm'),
('Equipo 2', '2020-04-03', 'Joyyo Mayu, Contra esquina del Reloj Floral, Periférico Norte Poniente, Joyo Mayyu, Tuxtla Gutiérrez', 9, '2:00 pm - 2:30 pm'),
('Equipo 1', '2020-04-03', 'Plaza Ambar, Carretera Internacional, Boulevares, Tuxtla Gutiérrez, Chis.', 10, '4:00 pm - 6:00 pm'),
('Equipo 4', '2020-05-16', 'Secretaría Académica Universidad Autónoma de Chiapas, Boulevard Belisario Domínguez, Sin Nombre, Tux', 32, '12: 00 PM - 8: 00PM'),
('Equipo 3', '2020-04-03', 'Los Pájaros, Tuxtla Gutiérrez, Chis., México', 6804, '12: 00 PM - 8: 00PM');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `brigadas`
--
ALTER TABLE `brigadas`
  ADD PRIMARY KEY (`Folio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
