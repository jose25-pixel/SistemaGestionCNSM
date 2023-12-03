-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2023 a las 16:07:23
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
-- Base de datos: `cnsm_nueva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones_paciente`
--

CREATE TABLE `acciones_paciente` (
  `id` int(11) NOT NULL,
  `fecha` varchar(25) NOT NULL,
  `hora` varchar(25) NOT NULL,
  `tipo_accion` varchar(50) NOT NULL,
  `observaciones` text NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `tratamientorec` text DEFAULT NULL,
  `tipofarmaco` varchar(100) DEFAULT NULL,
  `tipo_sustancia` varchar(100) DEFAULT NULL,
  `tiempo_consumo` varchar(100) DEFAULT NULL,
  `adiccion` text DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `adicciones`
--

INSERT INTO `adicciones` (`id`, `fecha`, `atencioncnsm`, `tratamientos`, `tipotratamiento`, `nombreatendio`, `direcionatendio`, `telefonoatendio`, `tratamientorec`, `tipofarmaco`, `tipo_sustancia`, `tiempo_consumo`, `adiccion`, `id_paciente`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, '2023-11-17 02:58:21', 'NO', NULL, NULL, 'NO APLICA', 'NO APLICA', NULL, 'NO', 'NO', 'NINGUNA', 'NO APLICA', NULL, 1, 29, '2023-11-17 02:58:21', '2023-11-17 02:58:21'),
(2, '2023-11-25 18:26:31', 'NO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ALCOHOL', 'DOS AÑOS', NULL, 2, 1, '2023-11-25 18:26:31', '2023-11-25 18:26:31'),
(3, '2023-11-30 02:25:59', 'NO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ALCOHOL', '3 AÑOS', NULL, 3, 1, '2023-11-30 02:25:59', '2023-11-30 02:25:59'),
(4, '2023-12-01 02:03:12', 'NO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ALCOHOL', '3 AÑOS', NULL, 4, 1, '2023-12-01 02:03:12', '2023-12-01 02:03:12'),
(5, '2023-12-01 02:32:47', 'NEUROLOGÍCO', NULL, NULL, 'NO', 'NO APLICA', NULL, 'TERAPIAS', 'NO APLICA', 'NO', 'NO', NULL, 5, 38, '2023-12-01 02:32:47', '2023-12-01 02:32:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedentes_salud`
--

CREATE TABLE `antecedentes_salud` (
  `id` int(11) NOT NULL,
  `fecha` varchar(25) DEFAULT NULL,
  `patologias` text DEFAULT NULL,
  `enfergenetica` text DEFAULT NULL,
  `otros` text DEFAULT NULL,
  `iniciotrabajar` varchar(50) DEFAULT NULL,
  `trabaja` varchar(50) DEFAULT NULL,
  `trabaja_actualmente` varchar(15) DEFAULT NULL,
  `duracion_empleo` varchar(25) DEFAULT NULL,
  `despedido` varchar(25) DEFAULT NULL,
  `causa` text DEFAULT NULL,
  `satisfecho` text DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `antecedentes_salud`
--

INSERT INTO `antecedentes_salud` (`id`, `fecha`, `patologias`, `enfergenetica`, `otros`, `iniciotrabajar`, `trabaja`, `trabaja_actualmente`, `duracion_empleo`, `despedido`, `causa`, `satisfecho`, `id_paciente`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, '2023-11-17 02:58:21', 'NO APLICA', 'NO APLICA', 'NO', '20', 'SI', 'SI', '2 AÑOS', 'SI', 'LA EMPRESA SE FUE A LA QUIEBRA', 'SI', 1, 29, '2023-11-17 02:58:21', '2023-11-17 02:58:21'),
(2, '2023-11-25 18:26:31', 'NINGUNA', 'NINGUNA', 'NINGUNA', NULL, 'SI', 'SI', NULL, 'SI', NULL, NULL, 2, 1, '2023-11-25 18:26:31', '2023-11-25 18:26:31'),
(3, '2023-11-30 02:25:59', 'NO APLICA', 'NO APLICA', 'OPERACIÓN DE OVARIOS', '20', 'SI', 'SI', '5 AÑOS', 'NO', 'NO APLICA', 'NO APLICA', 3, 1, '2023-11-30 02:25:59', '2023-11-30 02:25:59'),
(4, '2023-12-01 02:03:12', 'PROBLEMAS DE SALUD', 'NO APLICA', 'NO PLICA', '20', 'SI', 'SI', '5 AÑOS', 'NO', 'NO APLICA', 'SI', 4, 1, '2023-12-01 02:03:12', '2023-12-01 02:03:12'),
(5, '2023-12-01 02:32:47', 'NO APLICA', 'SI DIABETES', 'OPERACION DE OVARIOS', '19', 'SI', 'NO APLICA', '2 AÑOS', 'SI', 'CIERE DE LA EMPRESA', 'SI', 5, 38, '2023-12-01 02:32:47', '2023-12-01 02:32:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `paciente` varchar(250) NOT NULL,
  `dui` varchar(20) DEFAULT NULL,
  `celular` varchar(12) DEFAULT NULL,
  `fecha` varchar(10) DEFAULT NULL,
  `hora` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `motivo` text DEFAULT NULL,
  `estado_cita` int(11) NOT NULL,
  `terapeuta_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `paciente`, `dui`, `celular`, `fecha`, `hora`, `email`, `motivo`, `estado_cita`, `terapeuta_id`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'JUANA GUADALUPE CAMPOS ORELLANA', '94282924-0', '7892-4792', '2023-11-16', '9:30 AM', 'JUANA@GMAIL.COM', 'revisión', 1, 2, 1, '2023-11-17 02:37:56', '2023-11-17 02:37:56'),
(2, 'MARTA ESTELA SUAREZ ORTIS', '89234783-2', '7897-9833', '2023-11-18', '8:30 AM', 'marta@gmail.com', 'Problemas por muerte de familiar', -1, 2, 1, '2023-11-17 02:38:38', '2023-11-17 02:47:13'),
(3, 'DALIA MARLENE ASENCIO', '89247264-7', '6732-8495', '2023-11-23', '8:30 AM', 'dalia@gmail.com', 'Problemas por muerte de familiar', 1, 30, 1, '2023-11-17 02:39:17', '2023-11-17 02:48:26'),
(4, 'PATRICIA  EMERALDA VAZQUES', '92989472-8', '6543-2346', '2023-11-23', '8:30 AM', '--', 'drogas', 0, 30, 1, '2023-11-17 02:40:24', '2023-11-17 02:48:08'),
(6, 'MARIA CRISTINA PEREZ', '78928344-5', '7287-4293', '2023-11-23', '8:30 AM', 'maria@gmail.com', 'drogas', 1, 31, 1, '2023-11-17 02:49:59', '2023-11-17 02:49:59'),
(7, 'MARTIN ESMAEL CAMPOS ORELLAN ALOPEZ IRAETA', '89349829-3', '8935-9359', '2023-11-30', '10:00 AM', 'martin@gmail.com', NULL, 0, 35, 1, '2023-11-29 01:06:08', '2023-11-29 01:06:08'),
(8, 'MANUEL CRISTIAL CALVO ERNESTO', '89393858-9', '7387-5903', '2023-12-01', '8:30 AM', '--', 'revisión', -1, 37, 1, '2023-11-29 02:00:04', '2023-12-01 01:47:23'),
(9, 'OLVALDO  ELEASAR MENJIVAS CANTAÑEDA', '78977878-9', '6789-4534', '2023-12-05', '10:00 AM', '--', 'sequimiento', 0, 37, 38, '2023-11-29 02:11:12', '2023-11-29 02:11:12'),
(10, 'MAITRIS ELEAZAR ZOLORZANO', '78738959-7', '8998-3459', '2023-12-08', '8:30 AM', '--', 'lunes nahshdha¿', 1, 37, 38, '2023-11-29 03:22:59', '2023-11-29 03:22:59'),
(11, 'IRMA SUARES DE PERES LANDA VERDE', '79724378-2', '7827-4782', '2023-11-28', '11:30 AM', '--', 'nuevos datos', 1, 37, 1, '2023-11-29 03:39:50', '2023-11-29 03:39:50'),
(13, 'ENRIQUE MANUEL CAMPOS', '09098893-3', '7830-2736', '2023-12-03', '9:00 AM', 'enrique@gmail.com', 'revisión', -1, 37, 38, '2023-12-01 02:21:05', '2023-12-01 02:22:21'),
(15, 'IRMA SUARES DE PERES LANDA VERDE', '79724378-2', '7827-4782', '2023-12-15', '10:00 AM', '--', 'seguimiento del preoceso', 1, 37, 38, '2023-12-01 02:35:55', '2023-12-01 02:36:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `num_clinico` varchar(25) NOT NULL,
  `fecha` varchar(25) NOT NULL,
  `hora` varchar(15) NOT NULL,
  `motivo_consulta` varchar(250) DEFAULT NULL,
  `genograma` varchar(200) DEFAULT NULL,
  `aprox_diagnostico` text NOT NULL,
  `situacion_actual` text DEFAULT NULL,
  `paciente_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `num_clinico`, `fecha`, `hora`, `motivo_consulta`, `genograma`, `aprox_diagnostico`, `situacion_actual`, `paciente_id`, `usuario_id`, `created_at`, `updated_at`) VALUES
(2, '19850616495', '2023-11-18', '17:00:47', 'nueva coonsulta', 'consultas/genogramas/7NLC9D7uD37rO3sdUumTSwyAA20i3f3UdOUwQOyA.jpg', 'ghjhfjdgf', 'ghfgdhfsdfs', 1, 1, '2023-11-18 17:00:48', '2023-11-25 12:39:37'),
(3, '20060623677', '2023-11-25', '12:42:04', 'hola', 'consultas/genogramas/TB39C2tMf83dTll1yrpL6jnhg55LyCCOsj6TUMm4.jpg', 'problemas con los datos', 'se encuentra controlado y', 2, 1, '2023-11-25 12:42:04', '2023-11-25 12:42:04'),
(4, '19900629940', '2023-11-29', '22:02:31', 'hola', 'consultas/genogramas/8eDJ4sOCprdQ27vLgL9LZGocUeMyAyCecgZAttwa.jpg', 'problemas con los datos', 'kjkskd', 3, 1, '2023-11-29 22:02:32', '2023-11-29 22:02:32'),
(5, '19820630993', '2023-11-30', '20:08:50', 'revision', 'consultas/genogramas/hVniC5rJcNIZfKkzZNXporNHwfoTNMlT9CmqraAx.jpg', 'problemas con los datos', 'presenta prblemas de ansiedad desde la situacion de perdida', 4, 1, '2023-11-30 20:08:50', '2023-11-30 20:09:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_atenciones`
--

CREATE TABLE `control_atenciones` (
  `id` int(11) NOT NULL,
  `numero_exp` varchar(25) DEFAULT NULL,
  `fecha` varchar(25) DEFAULT NULL,
  `hora` varchar(20) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_terapeuta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conyuge`
--

CREATE TABLE `conyuge` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `nivel_educativo` varchar(150) DEFAULT NULL,
  `ocupacion` varchar(150) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `notac` text DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conyuge`
--

INSERT INTO `conyuge` (`id`, `nombre`, `nivel_educativo`, `ocupacion`, `edad`, `notac`, `id_paciente`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'ISMAEL FRANCISCO', 'SUPERIOR', 'EMPRRESARIO', 45, 'LLEVAMOS UNA RELACION MUY BONITA', 1, 29, '2023-11-17 02:58:21', '2023-11-17 02:58:21'),
(2, NULL, NULL, NULL, NULL, NULL, 2, 1, '2023-11-25 18:26:30', '2023-11-25 18:26:30'),
(3, 'TERESA ESMERALDA CASTRO LOPÉZ', 'SUPERIOR', 'SECRETARIA', 32, 'TODO BIEN CON MI PAAREJA', 3, 1, '2023-11-30 02:25:59', '2023-11-30 02:25:59'),
(4, 'TERESA ESMERALDA', 'SUPERIOR', 'SECRETARIA', 38, 'NOTAS', 4, 1, '2023-12-01 02:03:12', '2023-12-01 02:03:12'),
(5, 'MANUEL ENRIQUE', 'MEDIO', 'ALABAÑIL', 56, '----', 5, 38, '2023-12-01 02:32:46', '2023-12-01 02:32:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_control_atenciones`
--

CREATE TABLE `det_control_atenciones` (
  `id` int(11) NOT NULL,
  `numero_exp` varchar(25) DEFAULT NULL,
  `fecha` varchar(25) DEFAULT NULL,
  `hora` varchar(20) DEFAULT NULL,
  `fase` varchar(150) DEFAULT NULL,
  `actividad` text DEFAULT NULL,
  `id_control_atenciones` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `cod_paciente` varchar(50) NOT NULL,
  `fecha_naci` varchar(25) DEFAULT NULL,
  `edad` int(11) NOT NULL,
  `fecha_reg` varchar(25) NOT NULL,
  `genero` varchar(15) DEFAULT NULL,
  `ocupacion` varchar(150) DEFAULT NULL,
  `lugar_estudio` varchar(150) DEFAULT NULL,
  `grado` varchar(100) DEFAULT NULL,
  `nivel_educativo` varchar(100) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `departamento` varchar(150) DEFAULT NULL,
  `municipio` varchar(150) DEFAULT NULL,
  `celular_dos` varchar(12) DEFAULT NULL,
  `celular_tres` varchar(12) DEFAULT NULL,
  `nu_hermano` varchar(50) DEFAULT NULL,
  `lugar_ocupa` varchar(50) DEFAULT NULL,
  `nu_hijo` varchar(50) DEFAULT NULL,
  `edad_hijo` varchar(30) DEFAULT NULL,
  `ano_casado` varchar(50) DEFAULT NULL,
  `id_cita` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `cod_paciente`, `fecha_naci`, `edad`, `fecha_reg`, `genero`, `ocupacion`, `lugar_estudio`, `grado`, `nivel_educativo`, `direccion`, `departamento`, `municipio`, `celular_dos`, `celular_tres`, `nu_hermano`, `lugar_ocupa`, `nu_hijo`, `edad_hijo`, `ano_casado`, `id_cita`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, '19850616495', '1985-06-16', 38, '2023-11-17 02:58:21', 'femenino', 'ABOGADA', NULL, NULL, 'SUPERIOR', 'CANTON EL MORRRO SANTIAGO TEXACUANGOS ANTIGUA CARRETERA A ZACATECOLUCA KM 15/2', 'San Miguel', 'San Luis de la Reina', '6789-6475', '6734-8934', '5', 'ULTIMO', '2', '12,14', '15', 3, 29, '2023-11-17 02:58:21', '2023-11-17 02:58:21'),
(2, '20060623677', '2006-06-23', 17, '2023-11-25 18:26:30', 'femenino', 'ESTUDIANTE', 'CENTRO ESCOLAR NUEVOS DATOS', 'NOVENO', 'BÁSICO', 'AVENIDAD LOS LAURELES', 'Cuscatlán', 'Cojutepeque', '7472-4855', '8934-834', '2', 'PRIMERO', NULL, NULL, '0', 1, 1, '2023-11-25 18:26:30', '2023-11-25 18:26:30'),
(3, '19900629940', '1990-06-29', 33, '2023-11-30 02:25:59', 'femenino', 'PROFESORA', NULL, NULL, 'SUPERIOR', 'CANTON EL MORRO , SANTIGO TEXACUANGOS', 'Union', 'Pasaquina', '7834-8789', '6734-5789', '2', 'PRIMERO', '1', '8', '10', 15, 1, '2023-11-30 02:25:59', '2023-12-01 02:36:21'),
(4, '19820630993', '1982-06-30', 41, '2023-12-01 02:03:12', 'HOLA', 'TECNICO', NULL, NULL, 'MEDIO', 'CAMPOS ILICIOS', 'Sonsonate', 'Armenia', '7829-3838', '7829-8344', '0', 'NO', '1', '20', '21', 10, 1, '2023-12-01 02:03:12', '2023-12-01 02:03:12'),
(5, '19840730295', '1984-07-30', 39, '2023-12-01 02:32:46', 'femenino', 'TECNICO', NULL, NULL, 'MEDIO', 'AVENIDAD LOS LAURELES', 'Cuscatlán', 'Suchitoto', '6787-2832', '7827-8438', '2', 'PRIMERO', '2', '10,8', '12', 6, 38, '2023-12-01 02:32:46', '2023-12-01 02:32:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentesco`
--

CREATE TABLE `parentesco` (
  `id` int(11) NOT NULL,
  `nombre_madre` varchar(250) DEFAULT NULL,
  `edad_madre` int(11) DEFAULT NULL,
  `estado_civilm` varchar(25) DEFAULT NULL,
  `nivel_educativom` varchar(100) DEFAULT NULL,
  `ocupacionm` varchar(150) DEFAULT NULL,
  `vivem` varchar(25) DEFAULT NULL,
  `duim` varchar(15) DEFAULT NULL,
  `notam` text DEFAULT NULL,
  `viveaunm` varchar(30) DEFAULT NULL,
  `nombrep` varchar(250) DEFAULT NULL,
  `edadp` int(11) DEFAULT NULL,
  `estado_civilp` varchar(25) DEFAULT NULL,
  `ocupacionp` varchar(30) DEFAULT NULL,
  `nivel_educativop` varchar(30) DEFAULT NULL,
  `vivep` varchar(30) DEFAULT NULL,
  `duip` varchar(15) DEFAULT NULL,
  `notap` text DEFAULT NULL,
  `viveaunp` varchar(30) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `parentesco`
--

INSERT INTO `parentesco` (`id`, `nombre_madre`, `edad_madre`, `estado_civilm`, `nivel_educativom`, `ocupacionm`, `vivem`, `duim`, `notam`, `viveaunm`, `nombrep`, `edadp`, `estado_civilp`, `ocupacionp`, `nivel_educativop`, `vivep`, `duip`, `notap`, `viveaunp`, `id_paciente`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'CARMEN CUSTODIO SUARES CUBIAS', 60, 'viuda', 'PRIMARIA', 'AMA DE CASA', 'NO', '89284349-9', 'NO', 'SI', NULL, NULL, '***', NULL, NULL, 'NO', NULL, 'NO VIVE', '--', 1, 29, '2023-11-17 02:58:21', '2023-11-17 02:58:21'),
(2, 'URSULA CAMPOS', 45, 'casada', 'BASICO', 'AMA DE CASA', 'SI', '04567294-5', 'BUENAS RRELACIONES', 'SI', 'PABLO SAMUEL ORTIS CAMPOS', 50, 'casado', 'ELECTRICISTA', 'MEDIO', 'SI', '05436789-6', 'SOLOS', 'SI', 2, 1, '2023-11-25 18:26:31', '2023-11-25 18:26:31'),
(3, 'MARIANA CRISTINA SUARES LANDAVERDE', 50, 'casada', 'BASICO', 'AMA DE CASA', 'NO', '09859358-9', 'NOTA', 'SI', 'MARCOS ERNESTO PERÉZ SOLANO', 55, 'casado', 'ALBAÑIL', 'BASICO', 'SI', '08395388-5', 'DATOS', 'SI', 3, 1, '2023-11-30 02:25:59', '2023-11-30 02:25:59'),
(4, 'MARIA JUANA', 60, 'casada', 'BASICO', 'AMA DE CASA', 'NO', '09092834-7', 'NOTAS', 'SI', 'IMAEL ALFREDO PEREZ', 65, 'casado', 'ALBAÑIL', 'BASICO', 'NO', '00903289-8', 'NO', 'SI', 4, 1, '2023-12-01 02:03:12', '2023-12-01 02:03:12'),
(5, 'MARIANA CRISTINA SUARES LANDAVERDE', 60, 'acompañada', 'BASICO', 'AMA DE CASA', 'SI', '00283948-7', '------', 'NO', NULL, NULL, '***', NULL, NULL, '--', NULL, NULL, 'NO', 5, 38, '2023-12-01 02:32:47', '2023-12-01 02:32:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE `responsable` (
  `id` int(11) NOT NULL,
  `nombrer` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_civilr` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nivel_educativor` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `edadr` int(11) DEFAULT NULL,
  `ocupacionr` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `duir` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `updated_at` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`id`, `nombrer`, `estado_civilr`, `nivel_educativor`, `edadr`, `ocupacionr`, `duir`, `id_paciente`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'ELSY ROSMERY', 'viudo', 'BASICO', 50, 'AMA DE CASA', '009348538-5', 1, 29, '2023-11-17 02:58:21', '2023-11-17 02:58:21'),
(2, 'MARIA ESTER', 'acompañado', 'MEDIO', 55, 'AMA DE CASA', '065444563433', 2, 1, '2023-11-25 18:26:31', '2023-11-25 18:26:31'),
(3, NULL, 'soltero', NULL, NULL, NULL, NULL, 3, 1, '2023-11-30 02:25:59', '2023-11-30 02:25:59'),
(4, 'MARIA ESTER', 'soltero', 'BASICO', 45, 'NO APLICA', '90999887-6', 4, 1, '2023-12-01 02:03:12', '2023-12-01 02:03:12'),
(5, 'PATRICIA ESMERALDA', 'viudo', 'BASICO', 45, 'AMA DE CASA', '02934989-3', 5, 38, '2023-12-01 02:32:47', '2023-12-01 02:32:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintomas`
--

CREATE TABLE `sintomas` (
  `id` int(11) NOT NULL,
  `fecha_regis` varchar(25) NOT NULL,
  `hora_regis` varchar(25) NOT NULL,
  `sintoma` varchar(200) DEFAULT NULL,
  `conflicto` text DEFAULT NULL,
  `situacion` text DEFAULT NULL,
  `id_consulta` int(11) DEFAULT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sintomas`
--

INSERT INTO `sintomas` (`id`, `fecha_regis`, `hora_regis`, `sintoma`, `conflicto`, `situacion`, `id_consulta`, `created_at`, `updated_at`) VALUES
(8, '2023-11-25', '12:39:37', 'dos', 'nuevos', NULL, 2, '2023-11-25 12:39:38', '2023-11-25 12:39:38'),
(9, '2023-11-25', '12:39:37', 'tres', 'cuatro', NULL, 2, '2023-11-25 12:39:38', '2023-11-25 12:39:38'),
(10, '2023-11-25', '12:42:04', 'paciencia', 'segurida', NULL, 3, '2023-11-25 12:42:04', '2023-11-25 12:42:04'),
(11, '2023-11-29', '22:02:31', 'kasdkj', 'ahshjas', NULL, 4, '2023-11-29 22:02:32', '2023-11-29 22:02:32'),
(13, '2023-11-30', '20:09:37', 'ansieda', 'problemas', NULL, 5, '2023-11-30 20:09:38', '2023-11-30 20:09:38'),
(14, '2023-11-30', '20:09:37', 'nuevos', 'nuevos', NULL, 5, '2023-11-30 20:09:38', '2023-11-30 20:09:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `id` int(11) NOT NULL,
  `fecha` varchar(25) DEFAULT NULL,
  `trat_interno` varchar(10) DEFAULT NULL,
  `tipo_tratamiento` varchar(100) DEFAULT NULL,
  `nombre_terapeuta` varchar(50) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `celular` varchar(12) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dui` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(25) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `viewPassword` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `categoria` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `created_at` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `updated_at` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `codigo`, `nombre`, `direccion`, `dui`, `telefono`, `email`, `usuario`, `password`, `viewPassword`, `categoria`, `estado`, `created_at`, `updated_at`) VALUES
(1, '', 'cruz', 'santiago', '67897654.9', '6876-7896', 'cruz@gmail.com', 'cruz', '$2y$10$00AiaGU.OzGuZGqSIRv7ResQ50.uibIumdBd43msOGBGZ5Ttt1iYu', '', 'Admin', 1, '', ''),
(2, '', 'MARTA', 'la nueva salidad', '89765468-6', '7896-5435', 'marta@gmail.com', 'update2023', '-', '', 'Terapeuta', 1, '2023-09-30 18:59:26', '2023-09-30 18:59:26'),
(28, '34236', 'CARLOS', NULL, '89284782-3', '7892-8745', 'carlos@gmail.com', 'update2023', '-', '', 'Terapeuta', 1, '2023-11-17 02:40:14', '2023-11-17 02:40:14'),
(29, '--', 'veronica esmeralda gimenez', 'CANTON EL MORRRO SANTIAGO TEXACUANGOS ANTIGUA CARRETEA 15/2', '78922479-2', '7824-9826', 'veronica@gmail.com', 'veronica1', '$2y$10$GlpBdWb7Q7lL.VBOrUC2tuxcKw5teGpSnKdZ8rWhLWAWtdxMPDPvK', 'eyJpdiI6InI4bVRCUWpJVG1MT1hDdlNhMHcxOXc9PSIsInZhbHVlIjoiODdFRFpnSmNkQkt2SStBN2lGc3Aydz09IiwibWFjIjoiZjg5ZDAxYmNjNmY0YTExZGMzOTQ3N2U1YjgzYWQ2ODRlYzBjYjVkYTM4YTgzMWZmNGZlMzExZjY1NTFmNDk5NyIsInRhZyI6IiJ9', 'Admin', 1, '2023-11-17 02:44:10', '2023-11-17 02:46:27'),
(30, '78654', 'norma del carmen solorzano', 'casa 33, la ezperanza', '07387432-7', '6758-3945', 'norma@gmail.com', 'norma', '$2y$10$Sf0r0QAqfS/L5Gpdy661CeI.36gkzOnPDtykZDdwfmMh8StOH48FG', 'eyJpdiI6IjBIbUROVUlHZ1ZaU0N4TjJReERUcVE9PSIsInZhbHVlIjoiY0Z5UXRXcjBoZU8xYm5zdWJkWjdrMXR6NWtwaURyNTVuQkpEMmZsQnFPST0iLCJtYWMiOiI4NWZjMDRjOWEyNDNjZjEyMmI1MDBlYTdjZjE5NGY2Zjc4NmRjOWMyNWI3ODFiMjQ4YWE4ZDkwMzViNWIwMzhjIiwidGFnIjoiIn0=', 'Terapeuta', 1, '2023-11-17 02:45:34', '2023-11-17 02:45:34'),
(31, '56745', 'ELMER CARLOS', NULL, '89284237-4', '7828-3942', 'elmer@gmail.com', 'update2023', '-', '', 'Terapeuta', 1, '2023-11-17 02:49:51', '2023-11-17 02:49:51'),
(32, '5435', 'carlos', 'nuevos datso venideros', '89358305-3', '7839-7439', 'arlos@gmail.com', 'carlitos', '$2y$10$cxmcHrVH.hQitxyyy9JOOu.BUAeVrNpaptC0CbRdAUkyTyQtZVOPy', 'eyJpdiI6ImFMd0FlSjVaanlDekRhV3g4dGY2T0E9PSIsInZhbHVlIjoiUGxQVE55QjNoNkpSVjZPY2FHYTh0MXdpc1ByakZGTXgzR0U4OXB1bmp1OD0iLCJtYWMiOiJhYjE4ZDA2NDk4ZjFjMGU0OGY4YzFhMzI2Y2M1ZjE4MDM0ZWUyYTU0NTg0ZGE4NzUwN2U4MGYzNzk0Zjg1NGY5IiwidGFnIjoiIn0=', 'Admin', 0, '2023-11-26 03:12:14', '2023-11-26 03:12:14'),
(33, '89888', 'esteban eleazar solorzano contrafuegos', 'los nuevos datso de la vaneida españa conglomeracion las uracanacias', '85349895-4', '8897-3589', 'esteba@gmail.com', 'nuevo', '$2y$10$dRvlFk89AJ4K38UH6pjD9OQ3ELWS/p2QU/zQtYGbmfnkM7solLe2q', 'eyJpdiI6ImFIWlJ4TXBzNlFRMGkvdWFuRXF2Rnc9PSIsInZhbHVlIjoiN0VMeGFNNFdDSVZjZnNjRDJZdTVJdz09IiwibWFjIjoiNGQ1NWI0NTMwYzRmMWRkYzZhNDY2NDAyMTNjNWZlZGVhMGYyMjY3NTgzZTZiNTQ1ODAxOWQ4YWY1Mjk5YzU1ZSIsInRhZyI6IiJ9', 'Admin', 1, '2023-11-26 04:10:31', '2023-11-26 04:10:31'),
(34, NULL, 'marlon', 'los nuevos datso de la vaneida españa conglomeracion las uracanacias', '68638942-0', '4894-9383', 'eleazar@gmail.com', 'si', '$2y$10$JOVRc1zAyFXxShHXBj5XFeiPOBcmOpXhdnf2EVa4.BzzMFfeYvSzi', 'eyJpdiI6ImpvWk54YlhJSUhoSTgvcFBobTkvS2c9PSIsInZhbHVlIjoibjFORk1kK3NacVl0dUxsRHlmRHNzZz09IiwibWFjIjoiMWU2NjM5NzZlZWViMmRjNWUwOWRhODlhMThlNzRhYTA1ZWUzM2Y4NzllNzRjYTc2OTY2MTQ1NzdkNjMzOWMxZSIsInRhZyI6IiJ9', 'Admin', 1, '2023-11-26 04:14:30', '2023-11-26 04:14:30'),
(35, '34546', 'MAURICIO', NULL, '89239483-4', '7828-3495', 'mauricio@gmail.com', 'update2023', '-', 'eyJpdiI6InhTdlNwc2c2c2psYlkwNHZRa3RTT1E9PSIsInZhbHVlIjoiTlNVaW9Ibm0rbGpXSTNKaXY3Ny9wQT09IiwibWFjIjoiMzU3YWZkYjAzZDEwYTc4NzRmMTBjN2Q5MzQ2NGM2YjI5NDQyNmI0NWYyZDVjMTc5NjNiN2M2OTRmODg3YjZiYSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-11-29 01:06:02', '2023-11-29 01:12:00'),
(36, '36486', 'ESTELITA', NULL, '79248234-2', '7830-9450', 'estelita@gmail.com', 'estelita', '$2y$10$pGJKor2RQkhR5VeAnZ/PYubY/SYyi7fKRfgbphdAZ/vpCg8KpLhFu', 'eyJpdiI6Im5pMmZ0NVVSVDExOU9CLzhqaksvWnc9PSIsInZhbHVlIjoiY3ZJRHpZQzNIeGJHN3drblBoSVhHQT09IiwibWFjIjoiZDc3ZDkwNjMzMDU2NGZhNDcxYmM1NTA4NDJkOWNjNjE2MDUxMzg4YWNiMGI5NmMwZDMzYjU1NGUwNzEwOTY0OSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-11-29 01:34:01', '2023-11-29 01:44:05'),
(37, '45677', 'PATRICIA', NULL, '73923423-9', '7836-4723', 'patricia@gmail.com', 'PATRI', '$2y$10$WLxAf8LPhd6mRbcsGsmLwutmtw12whsSFAUxeFlOmJzp.nmU.Dp9y', 'eyJpdiI6IjFRbkw5RzdVZFJYcWxTU21kUTNOYXc9PSIsInZhbHVlIjoiUk1TVDdXSEUxejlheEUxWHVXdjNadz09IiwibWFjIjoiOWViMjcwYTY2MGZmOTBhNTgwZDQyZTM4YzUyYThjMzI1YzE5ZDM1NmVkOTNiZjkxMzA3OTZmY2EwNGE4N2UxNSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-11-29 01:54:46', '2023-12-03 15:01:06'),
(38, NULL, 'cruz', 'campos ilicios', '89209492-3', '7824-7282', 'cruz@gmail.com', 'marcos', '$2y$10$eXmm/QumqYwmoWzygEBOuuQE9M9PrL8qTkZwtuN1LnUEC6Tl6fViO', 'eyJpdiI6IjNDcEQwYkd3UTM5ZmFxSU1MMjlzR0E9PSIsInZhbHVlIjoiRmVmRm5UUldoSkZKRzdYZ2VxejFXZz09IiwibWFjIjoiYmEyZjExNzAzODlhZGMyZDg2ZDQzOWRjOWMyNzVhNjY0OTljZGUzN2UxMzU5Mjg2Yjc5ZDc0ODg4YjgyZDBkZiIsInRhZyI6IiJ9', 'Recepcionista', 1, '2023-11-29 02:07:14', '2023-12-01 02:14:40'),
(39, NULL, 'pedro alfaro rolin', 'santiago texacuangos antigura carretera a zacatecoluca', '09345994-5', '7834-5873', 'pedroalfaro@gmail.com', 'pedro', '$2y$10$093GUv56e7fHE9bIopK0qOVxfj5Mh6lNfKKA6MGxIupoJVZmpA1OS', 'eyJpdiI6IkJrVnhTbTNUM1BBbk8xd0lVc2pRdUE9PSIsInZhbHVlIjoiUitZMEUyM2w3OUpBZkFJNm1CZ04zZz09IiwibWFjIjoiOGZiYzhjY2JjYTFlM2EwYzNiZWE2NDQyMDkzZDcxOTEyMmIyMWE5ZWMzMzRjMjk0ZmY4MmM5YmZmMWRkOGExMyIsInRhZyI6IiJ9', 'Recepcionista', 1, '2023-12-01 01:39:55', '2023-12-01 01:41:39'),
(40, NULL, 'Julia Antonia', 'GHJHFHDHDG', '09898768-5', '6776-756', 'jjksdhfd@gmail.com', 'hola', '$2y$10$I9zOAvJWct7015iIEhU07ummlXOD8pDBX4sKbA2/bA.W.Nqmf5jAC', 'eyJpdiI6IkFiYzhqY09nUldpdVVEdjNVR2hXbVE9PSIsInZhbHVlIjoiSkIvZU5aOEE3ZHl2MC9Vdy9MRStZdz09IiwibWFjIjoiM2ViODhjYjhkZDNiZTBkNGQ2OTMzNTJkMTZhZmJkMDA3ZjhiMjQxZTkzZmVhOTQ5YTNmNjhiNTZjN2U0ZWNjOCIsInRhZyI6IiJ9', 'Recepcionista', 1, '2023-12-03 14:55:52', '2023-12-03 14:55:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_permiso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones_paciente`
--
ALTER TABLE `acciones_paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `adicciones`
--
ALTER TABLE `adicciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `antecedentes_salud`
--
ALTER TABLE `antecedentes_salud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`paciente_id`);

--
-- Indices de la tabla `control_atenciones`
--
ALTER TABLE `control_atenciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `conyuge`
--
ALTER TABLE `conyuge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `det_control_atenciones`
--
ALTER TABLE `det_control_atenciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_control_atenciones` (`id_control_atenciones`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cita` (`id_cita`);

--
-- Indices de la tabla `parentesco`
--
ALTER TABLE `parentesco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_consulta` (`id_consulta`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_usuario` (`id_usuario`),
  ADD KEY `fk_id_permiso` (`id_permiso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones_paciente`
--
ALTER TABLE `acciones_paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `adicciones`
--
ALTER TABLE `adicciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `antecedentes_salud`
--
ALTER TABLE `antecedentes_salud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `control_atenciones`
--
ALTER TABLE `control_atenciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `conyuge`
--
ALTER TABLE `conyuge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `det_control_atenciones`
--
ALTER TABLE `det_control_atenciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `parentesco`
--
ALTER TABLE `parentesco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `responsable`
--
ALTER TABLE `responsable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adicciones`
--
ALTER TABLE `adicciones`
  ADD CONSTRAINT `adicciones_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`);

--
-- Filtros para la tabla `antecedentes_salud`
--
ALTER TABLE `antecedentes_salud`
  ADD CONSTRAINT `antecedentes_salud_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`);

--
-- Filtros para la tabla `conyuge`
--
ALTER TABLE `conyuge`
  ADD CONSTRAINT `conyuge_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
