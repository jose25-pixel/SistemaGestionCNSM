-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2023 a las 00:09:52
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
  `tipotratamiento` varchar(50) DEFAULT NULL,
  `nombreatendio` varchar(50) DEFAULT NULL,
  `direcionatendio` varchar(100) DEFAULT NULL,
  `telefonoatendio` varchar(50) DEFAULT NULL,
  `tipofarmaco` varchar(100) DEFAULT NULL,
  `tipo_sustancia` varchar(100) DEFAULT NULL,
  `tiempo_consumo` varchar(100) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedentes_salud`
--

CREATE TABLE `antecedentes_salud` (
  `id` int(11) NOT NULL,
  `fecha` varchar(25) DEFAULT NULL,
  `patologias` varchar(100) DEFAULT NULL,
  `enfergenetica` varchar(100) DEFAULT NULL,
  `otros` text DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'MANUEL', '67898765-5', '7897-6543', '2023-10-01', '8:30 AM', 'nomadelcarmen@gmail.com', 'revision', 0, 2, 1, '2023-09-30 18:59:38', '2023-09-30 18:59:38'),
(2, 'JOSE', '78655446-5', '7865-7435', '2023-11-11', '8:30 AM', '--', 'revision', 1, 3, 1, '2023-10-01 15:13:02', '2023-10-01 15:13:02'),
(3, 'JOSE', '75287523-4', '7689-6789', '2023-10-05', '8:30 AM', 'nomadelcarmen@gmail.com', 'sistomas de abuxo', 0, 4, 1, '2023-10-03 02:06:05', '2023-10-03 02:06:05'),
(4, 'JOSE', '75287523-4', '7689-6789', '2023-10-05', '8:30 AM', 'nomadelcarmen@gmail.com', 'sistomas de abuxo', 0, 4, 1, '2023-10-03 02:06:33', '2023-10-03 02:06:33'),
(5, 'JOSE', '78656556-6', '7654-3567', '2023-10-06', '9:30 AM', 'nomadelcarmen@gmail.com', 'revision', 0, 4, 1, '2023-10-03 02:09:19', '2023-10-03 02:09:19'),
(6, 'JOSE', '89999999-9', '2242-2222', '2023-10-04', '10:00 AM', 'josezavaletac@gmail.com', 'df', 0, 3, 1, '2023-10-03 02:14:20', '2023-10-03 02:14:20'),
(7, 'MANUEL', '89878899-7', '4434-3444', '2023-10-03', '9:00 AM', 'nomadelcarmen@gmail.com', 'uriereu', 0, 4, 1, '2023-10-03 02:15:42', '2023-10-03 02:15:42'),
(8, 'MANUEL', '89878899-7', '4434-3444', '2023-10-03', '9:00 AM', 'nomadelcarmen@gmail.com', 'uriereu', 0, 4, 1, '2023-10-03 02:15:42', '2023-10-03 02:15:42'),
(9, 'MANUEL', '73849935-9', '7689-6789', '2023-10-07', '10:00 AM', '--', 'nueva relacion', 0, 3, 1, '2023-10-03 02:27:12', '2023-10-03 02:27:12'),
(10, 'MANUEL', '73849935-9', '7689-6789', '2023-10-07', '10:00 AM', '--', 'nueva relacion', 0, 3, 1, '2023-10-03 02:27:12', '2023-10-03 02:27:12'),
(11, 'MANUEL', '87777777-7', '7689-6789', '2023-10-10', '9:30 AM', '---', 'sistomas de abuxo', 0, 4, 1, '2023-10-03 02:29:39', '2023-10-03 02:29:39'),
(12, 'MANUEL', '87777777-7', '7689-6789', '2023-10-10', '9:30 AM', '---', 'sistomas de abuxo', 0, 4, 1, '2023-10-03 02:29:39', '2023-10-03 02:29:39'),
(13, 'OSCAR', '89321898-2', '7654-3467', '2023-10-02', '11:00 AM', '---', 'ddd', 0, 3, 1, '2023-10-03 02:30:58', '2023-10-03 02:31:44'),
(14, 'SUSANA', '53553355-5', '4232-2232', '2023-10-10', '9:00 AM', '--', '4343', 0, 3, 1, '2023-10-03 02:54:30', '2023-10-10 15:27:19'),
(15, 'OSCAR', '84928932-0', '7689-6789', '2023-10-10', '11:30 AM', '--', 'consulta', 0, 3, 1, '2023-10-03 03:01:50', '2023-10-10 15:19:16'),
(16, 'OSCAR', '85340045-0', '5678-9876', '2023-10-10', '10:30 AM', 'refrigeradorazeta@gmail.com', '5345', 0, 4, 1, '2023-10-03 03:25:25', '2023-10-10 20:10:29'),
(17, 'ESTER', '78788866-7', '7689-6789', '2023-10-12', '8:30 AM', '--', 'revision', 0, 5, 1, '2023-10-03 22:06:53', '2023-10-10 22:00:10'),
(18, 'OSCAR', '90923489-2', '7689-6789', '2023-10-18', '9:30 AM', 'nomadelcarmen@gmail.com', 'consulta', 1, 5, 1, '2023-10-10 13:23:35', '2023-10-10 13:23:35');

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
  `paciente_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `num_clinico`, `fecha`, `hora`, `motivo_consulta`, `genograma`, `aprox_diagnostico`, `paciente_id`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, '7842', '2023-10-08', '22:10:32', 'Este paciente tiene dolor de cabeza', '-', '---', 0, 0, '2023-10-08 22:41:32', '2023-10-08 22:41:32'),
(2, '7842', '2023-10-08', '22:10:43', 'Este paciente tiene dolor de cabeza', '-', '---', 2, 1, '2023-10-08 22:47:43', '2023-10-08 22:47:43'),
(3, '011020231', '2023-10-08', '22:10:46', 'Este paciente tiene dolor de cabeza', '-', '---', 1, 1, '2023-10-08 22:55:46', '2023-10-08 22:55:46'),
(4, '011020231', '2023-10-08', '22:10:19', 'Este paciente tiene dolor de cabeza', '-', '---', 1, 1, '2023-10-08 22:56:19', '2023-10-08 22:56:19'),
(5, '011020231', '2023-10-08', '22:10:55', 'Este paciente tiene dolor de cabeza', '-', '---', 1, 1, '2023-10-08 22:56:55', '2023-10-08 22:56:55'),
(6, '011020231', '2023-10-08', '22:10:26', 'Este paciente tiene dolor de cabeza', '-', '---', 1, 1, '2023-10-08 22:58:26', '2023-10-08 22:58:26'),
(7, '7842', '2023-10-08', '23:10:57', 'Este paciente tiene dolor de cabeza', '-', '---', 2, 1, '2023-10-08 23:08:57', '2023-10-08 23:08:57'),
(8, '7842', '2023-10-10', '07:10:01', 'revision', '-', 'diagnostico de la varables', 2, 1, '2023-10-10 07:42:01', '2023-10-10 07:42:01');

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
  `nombre` varchar(50) DEFAULT NULL,
  `nivel_educativo` varchar(150) DEFAULT NULL,
  `ocupacion` varchar(150) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `numero_hijo` int(11) DEFAULT NULL,
  `edades` varchar(100) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conyuge`
--

INSERT INTO `conyuge` (`id`, `nombre`, `nivel_educativo`, `ocupacion`, `edad`, `numero_hijo`, `edades`, `id_paciente`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'MELEINA', 'SUPERIOR', 'VETERNIARIA', 34, 2, '21,34', 4, 1, '2023-10-10 13:32:13', '2023-10-10 13:32:13'),
(2, 'MELEINA', 'SUPERIOR', 'VETERNIARIA', 34, 2, '21,34', 5, 1, '2023-10-10 13:33:27', '2023-10-10 13:33:27'),
(3, 'MELEINA', 'SUPERIOR', 'VETERNIARIA', 34, 2, '21,34', 6, 1, '2023-10-10 13:39:43', '2023-10-10 13:39:43'),
(4, 'MELEINA', 'SUPERIOR', 'VETERNIARIA', 45, 2, '21,34', 7, 1, '2023-10-10 15:48:35', '2023-10-10 15:48:35');

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
  `direccion` varchar(200) DEFAULT NULL,
  `departamento` varchar(150) DEFAULT NULL,
  `municipio` varchar(150) DEFAULT NULL,
  `celular_dos` varchar(12) DEFAULT NULL,
  `celular_tres` varchar(12) DEFAULT NULL,
  `id_cita` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `cod_paciente`, `fecha_naci`, `edad`, `fecha_reg`, `genero`, `ocupacion`, `lugar_estudio`, `grado`, `nivel_educativo`, `direccion`, `departamento`, `municipio`, `celular_dos`, `celular_tres`, `id_cita`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, '011020231', '2000-10-10', 0, '2023-10-01', 'masculino', 'jjjjjjj', 'lkkhgf', 'noveno', 'sexto', 'hjkgfhgf', 'san salvador', 'santiago ', '37482947', '78675646', 1, 1, '', ''),
(2, '7842', '1994/5/2023', 0, '398323', 'masculino', 'jdsjkjkfsjksf', 'kadjlkds', 'noveno', 'sexto', 'avenidad las olimpicas', 'san salvador', 'santiago tesacuangos', '37482947', '7867564', 14, 1, '', ''),
(3, '20231012864', '2023-10-12', 34, '2023-10-10 13:26:02', 'femenino', 'EMPRESARIO', 'CENTRO ESCOLAS EL SAUCE', 'NOVENO', 'MEDIO', 'JDSSSSSSSSSS', 'Ahuachapan', 'San Pedro Puxtla', '7865-4334', '7865-432', 2, 1, '2023-10-10 13:26:02', '2023-10-10 13:26:02'),
(4, '20231012972', '2023-10-12', 34, '2023-10-10 13:32:13', 'femenino', 'EMPRESARIO', 'CENTRO ESCOLAS EL SAUCE', 'NOVENO', 'MEDIO', 'JDSSSSSSSSSS', 'Ahuachapan', 'San Pedro Puxtla', '7865-4334', '7865-432', 2, 1, '2023-10-10 13:32:13', '2023-10-10 13:32:13'),
(5, '20231012450', '2023-10-12', 34, '2023-10-10 13:33:27', 'femenino', 'EMPRESARIO', 'CENTRO ESCOLAS EL SAUCE', 'NOVENO', 'MEDIO', 'JDSSSSSSSSSS', 'Ahuachapan', 'San Pedro Puxtla', '7865-4334', '7865-432', 2, 1, '2023-10-10 13:33:27', '2023-10-10 13:33:27'),
(6, '20231012797', '2023-10-12', 34, '2023-10-10 13:39:43', 'femenino', 'EMPRESARIO', 'CENTRO ESCOLAS EL SAUCE', 'NOVENO', 'MEDIO', 'JDSSSSSSSSSS', 'Ahuachapan', 'San Pedro Puxtla', '7865-4334', '7865-432', 2, 1, '2023-10-10 13:39:43', '2023-10-10 13:39:43'),
(7, '20231019818', '2023-10-19', 88, '2023-10-10 15:48:35', 'femenino', 'EMPRESARIO', 'CENTRO ESCOLAS EL SAUCE', 'NOVENO', 'MEDIO', 'JDSSSSSSSSSS', 'Cabañas', 'Sensuntepeque', '7865-4334', '4555-3663', 18, 1, '2023-10-10 15:48:35', '2023-10-10 15:48:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentesco`
--

CREATE TABLE `parentesco` (
  `id` int(11) NOT NULL,
  `nombre_madre` varchar(150) DEFAULT NULL,
  `edad_madre` int(11) DEFAULT NULL,
  `estado_civilm` varchar(25) DEFAULT NULL,
  `nivel_educativom` varchar(100) DEFAULT NULL,
  `ocupacionm` varchar(150) DEFAULT NULL,
  `vivem` varchar(25) DEFAULT NULL,
  `nombrep` varchar(20) DEFAULT NULL,
  `edadp` int(11) DEFAULT NULL,
  `estado_civilp` varchar(25) DEFAULT NULL,
  `ocupacionp` varchar(30) DEFAULT NULL,
  `nivel_educativop` varchar(30) DEFAULT NULL,
  `vivep` varchar(30) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `parentesco`
--

INSERT INTO `parentesco` (`id`, `nombre_madre`, `edad_madre`, `estado_civilm`, `nivel_educativom`, `ocupacionm`, `vivem`, `nombrep`, `edadp`, `estado_civilp`, `ocupacionp`, `nivel_educativop`, `vivep`, `id_paciente`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'ALEJANDRA', 22, 'soltera', 'DDADDA', 'AMA DE CASA', 'NO', 'ALFREDO', 12, 'soltero', 'ABOGADO', 'SUPERIOR', 'NO', 4, 1, '2023-10-10 13:32:13', '2023-10-10 13:32:13'),
(2, 'ALEJANDRA', 22, 'soltera', 'DDADDA', 'AMA DE CASA', 'NO', 'ALFREDO', 12, 'soltero', 'ABOGADO', 'SUPERIOR', 'NO', 5, 1, '2023-10-10 13:33:27', '2023-10-10 13:33:27'),
(3, 'ALEJANDRA', 22, 'soltera', 'DDADDA', 'AMA DE CASA', 'NO', 'ALFREDO', 12, 'soltero', 'ABOGADO', 'SUPERIOR', 'NO', 6, 1, '2023-10-10 13:39:44', '2023-10-10 13:39:44'),
(4, 'ALEJANDRA', 45, 'casada', 'DDADDA', 'AMA DE CASA', 'SI', 'ALFREDO', 56, 'casado', 'ABOGADO', 'SUPERIOR', 'NO', 7, 1, '2023-10-10 15:48:35', '2023-10-10 15:48:35');

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
  `nombrer` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_civilr` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nivel_educativor` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `edadr` int(11) DEFAULT NULL,
  `ocupacionr` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nu_hermano` int(11) DEFAULT NULL,
  `lugar_ocupa` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nu_hijo` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `edad_hijo` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre_conyugue` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ano_casado` int(11) DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `updated_at` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`id`, `nombrer`, `estado_civilr`, `nivel_educativor`, `edadr`, `ocupacionr`, `nu_hermano`, `lugar_ocupa`, `nu_hijo`, `edad_hijo`, `nombre_conyugue`, `ano_casado`, `id_paciente`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'MARIA', 'soltero', 'BASICO', 45, 'ODONTOLOGO', 2, 'ultimo', '2', '23,45', NULL, 2, 6, 1, '2023-10-10 13:39:44', '2023-10-10 13:39:44'),
(2, 'MARIA', 'acompañado', 'BASICO', 55, 'ODONTOLOGO', 2, NULL, NULL, NULL, 'MARIA', NULL, 7, 1, '2023-10-10 15:48:35', '2023-10-10 15:48:35');

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
(1, '2023-10-08', '22:10:55', NULL, '---', '---', 5, '2023-10-08 22:56:55', '2023-10-08 22:56:55'),
(2, '2023-10-08', '22:10:26', NULL, '---', '---', 6, '2023-10-08 22:58:26', '2023-10-08 22:58:26'),
(3, '2023-10-08', '23:10:57', '---', '---', '---', 7, '2023-10-08 23:08:57', '2023-10-08 23:08:57'),
(4, '2023-10-10', '07:10:01', 'fff', 'sdddd', 'sade', 8, '2023-10-10 07:42:01', '2023-10-10 07:42:01');

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
  `codigo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dui` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(25) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `categoria` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `created_at` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `updated_at` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `codigo`, `nombre`, `direccion`, `dui`, `telefono`, `email`, `usuario`, `password`, `categoria`, `estado`, `created_at`, `updated_at`) VALUES
(1, '', 'cruz', 'santiago', '67897654.9', '6876-7896', 'cruz@gmail.com', 'cruz', '$2y$10$00AiaGU.OzGuZGqSIRv7ResQ50.uibIumdBd43msOGBGZ5Ttt1iYu', 'administrador', 1, '', ''),
(2, '', 'MARTA', 'la nueva salidad', '89765468-6', '7896-5435', 'marta@gmail.com', 'update2023', '-', 'Terapeuta', 1, '2023-09-30 18:59:26', '2023-09-30 18:59:26'),
(3, '', 'MARTA', 'la nueva salidad', '67677654-4', '7865-4533', '---', 'update2023', '-', 'Terapeuta', 1, '2023-10-01 15:12:22', '2023-10-01 15:12:22'),
(4, '', 'JOSE', 'nueva', '98767777-7', '7846-7292', '--', 'update2023', '-', 'Terapeuta', 1, '2023-10-03 01:44:13', '2023-10-03 01:44:13'),
(5, '', 'JUANA', 'la nueva salidad', '75448294-0', '7834-2352', '--', 'update2023', '-', 'Terapeuta', 1, '2023-10-03 21:59:14', '2023-10-03 21:59:14'),
(6, '3423', 'CRISTINA', NULL, '74824983-0', '6489-4328', '--', 'update2023', '-', 'Terapeuta', 1, '2023-10-06 03:45:52', '2023-10-06 03:45:52');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `antecedentes_salud`
--
ALTER TABLE `antecedentes_salud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `control_atenciones`
--
ALTER TABLE `control_atenciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `conyuge`
--
ALTER TABLE `conyuge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `det_control_atenciones`
--
ALTER TABLE `det_control_atenciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `parentesco`
--
ALTER TABLE `parentesco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `responsable`
--
ALTER TABLE `responsable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
