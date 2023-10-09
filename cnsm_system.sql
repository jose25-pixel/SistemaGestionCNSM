-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2023 a las 03:31:20
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
-- Base de datos: `cnsm_system`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `cod_paciente` varchar(50) DEFAULT NULL,
  `fecha_naci` varchar(25) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `fecha_reg` varchar(25) DEFAULT NULL,
  `genero` varchar(15) DEFAULT NULL,
  `ocupacion` varchar(150) DEFAULT NULL,
  `lugar_estudio` varchar(150) DEFAULT NULL,
  `grado` varchar(100) DEFAULT NULL,
  `nivel_educativo` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `departamento` varchar(150) DEFAULT NULL,
  `municipio` varchar(150) DEFAULT NULL,
  `celular_dos` varchar(12) DEFAULT NULL,
  `celular_tres` varchar(12) DEFAULT NULL,
  `id_cita` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `cod_paciente`, `fecha_naci`, `edad`, `fecha_reg`, `genero`, `ocupacion`, `lugar_estudio`, `grado`, `nivel_educativo`, `direccion`, `departamento`, `municipio`, `celular_dos`, `celular_tres`, `id_cita`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, '011020231', '2000-10-10', 0, '2023-10-01', 'masculino', 'jjjjjjj', 'lkkhgf', 'noveno', 'sexto', 'hjkgfhgf', 'san salvador', 'santiago ', '37482947', '78675646', 1, 1, '', ''),
(2, '7842', '1994/5/2023', 0, '398323', 'masculino', 'jdsjkjkfsjksf', 'kadjlkds', 'noveno', 'sexto', 'avenidad las olimpicas', 'san salvador', 'santiago tesacuangos', '37482947', '7867564', 14, 1, '', ''),
(3, NULL, '2023-10-20', 56, NULL, 'femenino', NULL, NULL, 'noveno', NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, '2023-10-08 03:28:24', '2023-10-08 03:28:24'),
(4, '202310132598', '2023-10-13', 56, '2023-10-08 03:35:48', 'femenino', 'nueva amaneces', 'san antonio', 'noveno', 'fffff', 'ghffddfsf', 'Cabañas', 'ggggggg', '4567892', '765345', 2, NULL, '2023-10-08 03:35:48', '2023-10-08 03:35:48'),
(5, '20231020891', '2023-10-20', 67, '2023-10-08 03:41:52', 'femenino', 'nueva amaneces', 'san antonio', 'noveno', 'fffff', 'ghffddfsf', 'Cabañas', 'ggggggg', '4567892', '765345', 3, 1, '2023-10-08 03:41:52', '2023-10-08 03:41:52'),
(6, '20231019712', '2023-10-19', 67, '2023-10-08 03:54:25', 'masculino', 'nueva amaneces', 'san antonio', 'noveno', '-----', '-------', 'Ahuchapan', NULL, NULL, NULL, 4, 1, '2023-10-08 03:54:25', '2023-10-08 03:54:25'),
(7, '20231028753', '2023-10-28', 23, '2023-10-08 04:02:41', 'masculino', 'nueva amaneces', NULL, 'noveno', NULL, NULL, NULL, NULL, NULL, NULL, 6, 1, '2023-10-08 04:02:41', '2023-10-08 04:02:41'),
(8, '20231020630', '2023-10-20', 55, '2023-10-08 04:05:02', 'femenino', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 1, '2023-10-08 04:05:02', '2023-10-08 04:05:02'),
(9, '20231019268', '2023-10-19', NULL, '2023-10-08 04:11:35', 'femenino', NULL, 'san antonio', 'noveno', NULL, NULL, NULL, NULL, NULL, NULL, 8, 1, '2023-10-08 04:11:35', '2023-10-08 04:11:35'),
(10, '20231020943', '2023-10-20', NULL, '2023-10-08 04:20:50', 'femenino', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1, '2023-10-08 04:20:50', '2023-10-08 04:20:50'),
(11, '20231020956', '2023-10-20', NULL, '2023-10-08 04:21:38', 'femenino', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1, '2023-10-08 04:21:38', '2023-10-08 04:21:38'),
(12, '20231011882', '2023-10-11', 56, '2023-10-08 14:21:46', 'femenino', 'empresario', 'centro escolas el sauce', 'noveno', 'medio', 'jdssssssssss', 'Santa Ana', 'ilobasco', '78654334', '7865432', 10, 1, '2023-10-08 14:21:46', '2023-10-08 14:21:46'),
(13, '20231011155', '2023-10-11', 56, '2023-10-08 14:44:59', 'femenino', 'empresario', 'santotomas', 'noveno', 'medio', 'jdssssssssss', 'Santa Ana', 'ilobasco', '78654334', '7865432', 11, 1, '2023-10-08 14:44:59', '2023-10-08 14:44:59'),
(14, '20231011374', '2023-10-11', 56, '2023-10-08 14:52:44', 'femenino', 'empresario', 'santotomas', 'noveno', 'medio', 'jdssssssssss', 'Santa Ana', 'ilobasco', '78654334', '7865432', 11, 1, '2023-10-08 14:52:44', '2023-10-08 14:52:44'),
(15, '20231012733', '2023-10-12', 66, '2023-10-08 16:41:54', 'masculino', NULL, NULL, NULL, NULL, NULL, 'La Libertad', NULL, NULL, NULL, 18, 1, '2023-10-08 16:41:54', '2023-10-08 16:41:54'),
(16, '20231013739', '2023-10-13', 24, '2023-10-08 21:04:44', 'femenino', 'empresario', 'santotomas', 'septimo', 'medio', '----', 'Morazán', 'ilobasco', '78654334', '7653468', 13, 1, '2023-10-08 21:04:44', '2023-10-08 21:04:44'),
(17, '20231019365', '2023-10-19', NULL, '2023-10-08 21:07:43', 'femenino', NULL, 'santotomas', 'noveno', NULL, NULL, 'San Salvador', 'ilobasco', '7635169234', '7656434', 16, 1, '2023-10-08 21:07:43', '2023-10-08 21:07:43'),
(18, '20231019437', '2023-10-19', NULL, '2023-10-08 21:10:47', 'femenino', NULL, 'santotomas', 'noveno', NULL, NULL, 'San Salvador', 'ilobasco', '7635169234', '7656434', 16, 1, '2023-10-08 21:10:47', '2023-10-08 21:10:47'),
(19, '20231013767', '2023-10-13', 33, '2023-10-08 21:12:57', 'femenino', NULL, 'centro escolas el sauce', 'noveno', NULL, NULL, NULL, NULL, NULL, NULL, 17, 1, '2023-10-08 21:12:57', '2023-10-08 21:12:57'),
(20, '20110616860', '2011-06-16', 56, '2023-10-08 21:21:33', 'masculino', 'empresario', 'centro escolas el sauce', 'septimo', NULL, NULL, NULL, NULL, NULL, NULL, 19, 1, '2023-10-08 21:21:33', '2023-10-08 21:21:33'),
(21, '20231018333', '2023-10-18', 33, '2023-10-08 22:43:23', 'femenino', NULL, 'centro escolas el sauce', 'ty', NULL, '----', 'Santa Ana', NULL, NULL, NULL, 20, 1, '2023-10-08 22:43:23', '2023-10-08 22:43:23'),
(22, '20231018327', '2023-10-18', 33, '2023-10-08 22:45:42', 'femenino', NULL, 'centro escolas el sauce', 'ty', NULL, '----', 'Santa Ana', NULL, NULL, NULL, 20, 1, '2023-10-08 22:45:42', '2023-10-08 22:45:42'),
(23, '20231008795', '2023-10-08', NULL, '2023-10-08 22:51:40', 'femenino', NULL, NULL, NULL, NULL, NULL, 'San Miguel', NULL, NULL, NULL, 21, 1, '2023-10-08 22:51:40', '2023-10-08 22:51:40'),
(24, '20231008729', '2023-10-08', NULL, '2023-10-08 22:53:39', 'femenino', NULL, NULL, NULL, NULL, NULL, 'San Miguel', NULL, NULL, NULL, 21, 1, '2023-10-08 22:53:39', '2023-10-08 22:53:39'),
(25, '20231011550', '2023-10-11', 45, '2023-10-08 23:18:24', 'femenino', 'empresario', 'centro escolas el sauce', 'noveno', 'medio', '----', 'San Salvador', 'ilobasco', '78456789', '7865432', 22, 1, '2023-10-08 23:18:24', '2023-10-08 23:18:24'),
(26, '20231010803', '2023-10-10', 44, '2023-10-08 23:45:56', 'femenino', 'empresario', 'centro escolas el sauce', 'noveno', 'medio', '---', 'San Salvador', 'Municipio2', '78654334', '7865432', 12, 1, '2023-10-08 23:45:56', '2023-10-08 23:45:56');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cita` (`id_cita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
