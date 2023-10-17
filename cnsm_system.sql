-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2023 a las 16:54:04
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cnsm_3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adicciones`
--

CREATE TABLE `adicciones` (
  `id` int(11) NOT NULL,
  `fecha` varchar(25) DEFAULT NULL,
  `atencioncnsm` varchar(75) DEFAULT NULL,
  `tratamientos` varchar(100) DEFAULT NULL,
  `tipotratamiento` varchar(100) DEFAULT NULL,
  `nombreatendio` varchar(50) DEFAULT NULL,
  `direcionatendio` varchar(150) DEFAULT NULL,
  `telefonoatendio` varchar(50) DEFAULT NULL,
  `tipofarmaco` varchar(100) DEFAULT NULL,
  `tipo_sustancia` varchar(100) DEFAULT NULL,
  `tiempo_consumo` varchar(100) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `adicciones`
--

INSERT INTO `adicciones` (`id`, `fecha`, `atencioncnsm`, `tratamientos`, `tipotratamiento`, `nombreatendio`, `direcionatendio`, `telefonoatendio`, `tipofarmaco`, `tipo_sustancia`, `tiempo_consumo`, `id_paciente`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, '2023-10-11 21:38:26', 'NO', 'eeeeeerrrrrrrrrrr', NULL, 'NO APLICA', 'NO AAPLICA', 'NO APLICA', 'RERREEERERE', 'NO APLICA', 'NINGUN', 15, 1, '2023-10-11 21:38:26', '2023-10-11 21:38:26'),
(2, '2023-10-12 02:49:43', 'NO', 'sfssffsdffsd', NULL, 'NO APLICA', 'NO AAPLICA', 'NO APLICA', 'SDSF', 'NO APLICA', 'NINGUN', 16, 1, '2023-10-12 02:49:43', '2023-10-12 02:49:43'),
(3, '2023-10-12 03:11:29', 'PSICOLOGÍCO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1, '2023-10-12 03:11:29', '2023-10-12 03:11:29'),
(4, '2023-10-12 03:11:30', 'PSICOLOGÍCO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1, '2023-10-12 03:11:30', '2023-10-12 03:11:30'),
(5, '2023-10-15 14:43:54', 'PSICOLOGÍCO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1, '2023-10-15 14:43:54', '2023-10-15 14:43:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adicciones`
--
ALTER TABLE `adicciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adicciones`
--
ALTER TABLE `adicciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adicciones`
--
ALTER TABLE `adicciones`
  ADD CONSTRAINT `adicciones_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
