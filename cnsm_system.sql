-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2023 a las 18:04:17
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
(1, '2023-10-27 12:33:39', 'NO', NULL, NULL, 'NO APLICA', 'NO AAPLICA', NULL, 'JKFSHFSDFHSJDFHJSFDFDJHFHJFDHJSFHHFHFFJDSHSF SHFSHFJSFHS LAA NSUEC VA OSS DATO SDE LA IDNOFRMACIO NSE LA IA SERAN VBASTENATE SD DEACUANDKJAJFHJKSSFDJKASJDKSJFHJKSHFHJKSHFJDFJF', 'NO APLICO', 'ALCOHOL', '2 AÑOS', NULL, 1, 1, '2023-10-27 12:33:39', '2023-10-27 12:33:39');

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
(1, '2023-10-27 12:33:39', 'JKFSHFSDFHSJDFHJSFDFDJHFHJFDHJSFHHFHFFJDSHSF SHFSHFJSFHS LAA NSUEC VA OSS DATO SDE LA IDNOFRMACIO NSE LA IA SERAN VBASTENATE SD DEACUANDKJAJFHJKSSFDJKASJDKSJFHJKSHFHJKSHFJDFJF', 'JKFSHFSDFHSJDFHJSFDFDJHFHJFDHJSFHHFHFFJDSHSF SHFSHFJSFHS LAA NSUEC VA OSS DATO SDE LA IDNOFRMACIO NSE LA IA SERAN VBASTENATE SD DEACUANDKJAJFHJKSSFDJKASJDKSJFHJKSHFHJKSHFJDFJF', 'JKFSHFSDFHSJDFHJSFDFDJHFHJFDHJSFHHFHFFJDSHSF SHFSHFJSFHS LAA NSUEC VA OSS DATO SDE LA IDNOFRMACIO NSE LA IA SERAN VBASTENATE SD DEACUANDKJAJFHJKSSFDJKASJDKSJFHJKSHFHJKSHFJDFJF', '23', 'SI', 'SI', '2 MESES', 'SI', 'JKFSHFSDFHSJDFHJSFDFDJHFHJFDHJSFHHFHFFJDSHSF SHFSHFJSFHS LAA NSUEC VA OSS DATO SDE LA IDNOFRMACIO NSE LA IA SERAN VBASTENATE SD DEACUANDKJAJFHJKSSFDJKASJDKSJFHJKSHFHJKSHFJDFJF', 'JKFSHFSDFHSJDFHJSFDFDJHFHJFDHJSFHHFHFFJDSHSF SHFSHFJSFHS LAA NSUEC VA OSS DATO SDE LA IDNOFRMACIO NSE LA IA SERAN VBASTENATE SD DEACUANDKJAJFHJKSSFDJKASJDKSJFHJKSHFHJKSHFJDFJF', 1, 1, '2023-10-27 12:33:39', '2023-10-27 12:33:39');

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
(1, 'JOSE', '90923489-2', '7689-6789', '2023-10-27', '9:00 AM', 'josezavaletac@gmail.com', 'revision', 1, 5, 1, '2023-10-22 02:06:01', '2023-10-27 03:27:37'),
(2, 'SUSANA', '94282924-0', '7348-7249', '2023-10-28', '10:30 AM', 'nomadelcarmen@gmail.com', 'sistomas de abuxo', 0, 4, 1, '2023-10-22 02:07:07', '2023-10-27 03:27:59'),
(3, 'JOSE', '90923489-2', '7689-6789', '2023-11-01', '9:00 AM', 'nomadelcarmen@gmail.com', 'sistomas de abuxo', 0, 5, 1, '2023-10-22 02:17:05', '2023-10-24 12:28:34'),
(6, 'JOSE', '90923489-2', '7689-6789', '2023-11-02', '8:30 AM', 'nomadelcarmen@gmail.com', 'Seguimiento', 0, 5, 1, '2023-10-25 02:01:28', '2023-10-25 02:11:00'),
(7, 'SUSANA', '78972424-4', '7689-6789', '2023-11-05', '9:00 AM', 'nomadelcarmen@gmail.com', 'revision', 0, 6, 1, '2023-10-25 02:17:50', '2023-10-25 02:18:02'),
(11, 'MANUEL  ORELLANA CAMPOS', '94282924-0', '7689-6789', '2023-11-09', '9:00 AM', '----', 'revision', 0, 5, 1, '2023-10-25 03:08:09', '2023-10-25 03:08:29'),
(14, 'PATRICIA  EMERALDA VAZQUES ROMAN', '74328920-2', '7866-6545', '2023-11-10', '8:30 AM', '----', 'revision', 0, 5, 1, '2023-10-25 03:40:02', '2023-10-26 20:31:35'),
(15, 'JUANA GUADALUPE CAMPOS ORELLANA', '94282924-0', '7867-3292', '2023-11-11', '10:30 AM', 'JUANA@GMAIL.COM', 'seguridad', 0, 4, 1, '2023-10-25 03:40:36', '2023-10-25 03:54:48'),
(16, 'MARIANA CALDERON ESTELINA CAMPOS', '64647456-4', '7348-7249', '2023-11-10', '10:00 AM', 'dsorianoa144@gmail.com', 'sistomas de abuxo', 0, 4, 1, '2023-10-27 03:33:57', '2023-10-27 03:33:57');

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
(1, 'MELEINA', 'SUPERIOR', 'VETERNIARIA', 67, 'lllllllllllkkkkkkkkkkkkkkkk', 1, 1, '2023-10-22 02:13:12', '2023-10-22 02:13:12'),
(2, 'CARLA', NULL, 'VETERNIARIA', 45, NULL, 2, 1, '2023-10-24 02:53:56', '2023-10-24 02:53:56'),
(3, NULL, NULL, NULL, NULL, NULL, 3, 1, '2023-10-25 03:01:52', '2023-10-25 03:01:52'),
(4, NULL, NULL, NULL, NULL, NULL, 4, 1, '2023-10-25 03:25:18', '2023-10-25 03:25:18'),
(5, 'ANDREA PERÉZ', 'SUPERIOR', 'VETERNIARIA', 56, 'SOUCION', 5, 1, '2023-10-27 03:40:42', '2023-10-27 03:40:42'),
(6, 'ANDREA PERÉZ', 'SUPERIOR', 'VETERNIARIA', 56, 'SOUCION', 6, 1, '2023-10-27 03:44:06', '2023-10-27 03:44:06'),
(7, 'ANDREA PERÉZ', 'SUPERIOR', 'VETERNIARIA', 56, 'SOUCION', 7, 1, '2023-10-27 03:48:05', '2023-10-27 03:48:05'),
(8, 'MELEINA DAIA ESTER GONZALES', 'SUPERIOR', 'MAESTRA', 34, 'HFLKFJSKLJFSKFSBFJKJKDSFHJKSFDHJSKFHJKFHJFKSDFHJKHSFJKHFDSJKHFJKDSHFJKSDFHJKHSDFJHSDJKFHJKDSHJFDKSHDSJKSDHJFHSDKFHKJHSDFJHSDHFHDSHJDFJKDSKJFDSHDJFJHSJKFSDKFSFDHSJHFJDSHHFHSDFHHFFHSD', 1, 1, '2023-10-27 12:33:39', '2023-10-27 12:33:39');

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
  `nu_hermano` int(11) DEFAULT NULL,
  `lugar_ocupa` varchar(50) DEFAULT NULL,
  `nu_hijo` int(11) DEFAULT NULL,
  `edad_hijo` varchar(30) DEFAULT NULL,
  `ano_casado` int(11) DEFAULT NULL,
  `id_cita` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `cod_paciente`, `fecha_naci`, `edad`, `fecha_reg`, `genero`, `ocupacion`, `lugar_estudio`, `grado`, `nivel_educativo`, `direccion`, `departamento`, `municipio`, `celular_dos`, `celular_tres`, `nu_hermano`, `lugar_ocupa`, `nu_hijo`, `edad_hijo`, `ano_casado`, `id_cita`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, '19440627162', '1944-06-27', 79, '2023-10-27 12:33:39', 'masculino', 'EMPRESARIO', 'CENTRO ESCOLAR BUENA VISTA', 'NOVENO', 'SUPERIOR', 'AVENIDAD  EL CALVARIO', 'Cuscatlán', 'Cojutepeque', '7845-6789', '7653-4556', 2, 'ULTIMO', 1, '20', 1, 1, 1, '2023-10-27 12:33:39', '2023-10-27 12:33:39');

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
(1, 'ALEJANDRA MARIA CAMPOS ODORNES CABRERA', 45, 'acompañada', 'BASICO', 'AMA DE CASA', 'SI', '64635235-2', 'LLJLLJKSDFJHSFJSDHJFB SFJHSFSKFDFJSFBUISDJBSBFJSFSJDJKSKHDJSDHJSAHDJAHSDKJASHDJKASHDKJHASJHFSJKFHJSFJKASFHJKSAHFJKFASHJKFHSAJKHFSAJSKSJASFHSJAFHASFJHFJFSAHJSFHSAFJHFKSAHFJASHFJASHFJKHAFSJFHJASHFJFSFJSAHFJAKSHFJFSAHFJSKJHSFAJHFJSJFSHJASJASJFHHASJFJKASJKFJASJFAKSFHKHASFJFKSK', 'SI', 'ALFREDO MARCOS CRISTAL ORELLANA', 60, 'acompañado', 'ALBAÑIL', 'BASICO', '--', '78329723-2', 'HJSDHJSD LA NUEVA GNERACION DEL MUNDO ESTA CRCA PUEDEN  ENCONTRA LO SIQGUINETE ES EL MANUALDE AYUFA DO NDE D¿TSDFDSHFHJFHDJSBFVSFJBVSFVBSDJKSDHFJKASDHJKASDHAJKSDHSDKJ', 'NO', 1, 1, '2023-10-27 12:33:39', '2023-10-27 12:33:39');

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
(1, 'CARMEN', 'casado', 'LICENCIATURA EN ADMINISTRACION DE EMPRESAS', 65, 'ODONTOLOGO', '5734743-8', 1, 1, '2023-10-27 12:33:39', '2023-10-27 12:33:39');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `antecedentes_salud`
--
ALTER TABLE `antecedentes_salud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `control_atenciones`
--
ALTER TABLE `control_atenciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `conyuge`
--
ALTER TABLE `conyuge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `det_control_atenciones`
--
ALTER TABLE `det_control_atenciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `parentesco`
--
ALTER TABLE `parentesco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `responsable`
--
ALTER TABLE `responsable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
