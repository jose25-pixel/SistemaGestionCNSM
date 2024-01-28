-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2024 a las 18:51:28
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
  `atencioncnsm` varchar(200) DEFAULT NULL,
  `tratamientos` varchar(250) DEFAULT NULL,
  `tipotratamiento` varchar(200) DEFAULT NULL,
  `nombreatendio` varchar(250) DEFAULT NULL,
  `direcionatendio` varchar(250) DEFAULT NULL,
  `telefonoatendio` varchar(50) DEFAULT NULL,
  `tratamientorec` text DEFAULT NULL,
  `tipofarmaco` varchar(250) DEFAULT NULL,
  `tipo_sustancia` varchar(250) DEFAULT NULL,
  `tiempo_consumo` varchar(250) DEFAULT NULL,
  `adiccion` text DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `aprox_diagnostico` text DEFAULT NULL,
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
  `nombre` varchar(250) DEFAULT NULL,
  `nivel_educativo` varchar(150) DEFAULT NULL,
  `ocupacion` varchar(150) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `notac` text DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintomas`
--

CREATE TABLE `sintomas` (
  `id` int(11) NOT NULL,
  `fecha_regis` varchar(25) NOT NULL,
  `hora_regis` varchar(25) NOT NULL,
  `sintoma` varchar(250) DEFAULT NULL,
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
  `trat_interno` varchar(250) DEFAULT NULL,
  `tipo_tratamiento` varchar(250) DEFAULT NULL,
  `nombre_terapeuta` varchar(250) DEFAULT NULL,
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
(1, '456', 'Jose Administrador', 'San Salvador', '99340323-1', '7447-4903', 'josedeodanes99@gmail.com', 'jose', '$2y$10$VAQg6jbjR82jKFFRkbw.JuSu/N8nFzUNeTB.0aHDfC5A72SOcdy9e', 'eyJpdiI6IlU1a3B6QkFTSjVYd0c2UmF6NkVSN0E9PSIsInZhbHVlIjoiNWl2K21Db3QwV3hpdmxoRCs3Z2J2QT09IiwibWFjIjoiOTE3MjJhZGRjZDA2NzE5NzM1MjNiNWNlYTkxNzgzODA0ZjRiMWI2ZGJjZTY0MTU1NTcyMjM0YWE2OWRiMTgxNCIsInRhZyI6IiJ9', 'Admin', 1, '', '2024-01-28 17:22:41'),
(2, '-', 'Norma Mendoza', 'Cuscatlan', '99340323-1', '7447-4903', 'nomadelcarmen@gmail.com', 'norma', '$2y$10$tO2bjwdJ4HL0OeJIOI3Qk.4oMplFyHV7EkytKD59UMunqcrCawbsu', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Admin', 1, '', '2023-11-01 13:56:47'),
(3, NULL, 'Jaaziel Isaac', 'LA PAZ', '99340323-1', '7447-4903', 'josedeodanes99@gmail.com', 'jaaziel', '$2y$10$paQoF/qIojNw33zWk4RZBuRatydWE7A5oTnfydrttf0ytjytKEowK', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Admin', 1, '', '2023-11-01 15:46:53'),
(5, NULL, 'DanielSoriano', 'SAN SALVADOR', '03972752-4', '7129-9252', 'dsorianoa144@gmail.com', 'Daniel144', '$2y$10$jt/iIL0Jn3DJ2fmL2rXxDuHduSpuMI9s/YR/N4QZW7c.gf7R8h7dW', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Admin', 1, '2023-10-01 00:00:00', '2023-11-01 15:19:26'),
(7, '', 'DANIEL SORIANOA AYALA', 'Res. Eucaliptos 2, Pasaje Los Cedros 12', '03972752-4', '7129-9252', 'dsorianoa144@gmail.com', 'update2023', '-', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-10-02 18:15:21', '2023-10-02 18:15:21'),
(8, '', 'DALIA TERESA GARAY DE SERPAS', '3428', '00716552-6', '7069-7045', 'daliagaray95@gmail.com', 'update2023', '-', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-10-05 16:33:57', '2023-10-05 16:33:57'),
(11, '', 'Silvia', '-', '00000000-0', '-', '-', 'Silvia', '$2y$10$OSG484yNmJb1OubvrtcNIu38Q38MrLGtgGVAkZmXFK5G74TIor21S', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Admin', 1, '2023-10-01 00:00:00', '2023-10-01 00:00:00'),
(12, '', 'Dalia', '-', '00000000-0', '-', '-', 'Dalia', '$2y$10$5I3brjXvKDcBqFDLlezCjuQSCYf2mQR4hv8DJ6UseMoakTrWNHI1C', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Admin', 1, '2023-10-01 00:00:00', '2023-10-01 00:00:00'),
(13, '861', 'BLANCA ESTELA ARTIGA', NULL, '01572749-7', '7841-6847', 'N', 'update2023', '-', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-10-10 14:22:46', '2023-10-10 14:22:46'),
(14, '10351', 'CARLOS FRANCISCO SERRANO AGUIRRE', NULL, '05926538-0', '7673-4591', 'franserrqno@gmail.com', 'update2023', '-', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-10-10 15:26:10', '2023-10-10 15:26:10'),
(15, '0000', 'RODRIGO ANDRES ALVARENGA MUNGUIA', NULL, '05759381-8', '7011-3505', 'rodrialvarenga98@gmqail.com', 'update2023', '-', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-10-10 15:29:12', '2023-10-10 15:29:12'),
(16, '601', 'MARIA CECILIA LARA CAÑAS', NULL, '01889772-0', '7965-2365', 'cecililara@yahoo.com', 'update2023', '-', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-10-10 15:31:31', '2023-10-10 15:31:31'),
(17, '2064', 'MARLENE GLORIBEL GARCIA DE CALIX', NULL, '00413798-0', '7164-4221', 'marlenydecalix1@gmail.com', 'update2023', '-', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-10-10 15:34:09', '2023-10-10 15:34:09'),
(18, '532', 'ANA ELIZABETH GARCIA', '--', '00681119-0', '7877-3660', 'garcia.anaely@gmail.com', 'A.GARCIA', '$2y$10$WHPkFnX03pH0anrmgsErKenelFZWxqnHjd6QcMFKEJBv/xZTcDRYG', 'eyJpdiI6InRpZXJNSkZxaDA2ZEg1L2NvRzdjL3c9PSIsInZhbHVlIjoibUZDUlhiZE9TVHVTTXd6aC9jNUNscnVkY1pIY2pSdmE2NTlMWDdHWkR0Zz0iLCJtYWMiOiI0MmY4YmQzMGY0NDIwZWY3YTFjZWQ5MzRhMThlZjgwZWNhZWE3M2M4MDdkZWE2ZWNjOWJmNjhhMWZkZTQ2ZWE1IiwidGFnIjoiIn0=', 'Terapeuta', 1, '2023-10-10 15:37:09', '2024-01-27 15:31:19'),
(19, '381', 'MARIA BENIGNA FUENTES ROMERO', NULL, '02045923-2', '7682-2353', 'maria', 'update2023', '-', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-10-10 15:45:25', '2023-10-10 15:45:25'),
(20, '00001', 'ANDREA  MARCELA BERMUDEZ', NULL, '05821676-0', '7308-4117', 'ba17019@ues.edu.sv', 'update2023', '-', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-10-10 16:06:37', '2023-10-10 16:06:37'),
(21, '0002', 'ALLAN ARTURO RUANO CUELLAR', NULL, '01717625-2', '7450-8091', 'aarturoo767@gmail.com', 'update2023', '-', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-10-10 17:19:53', '2023-10-10 17:19:53'),
(22, '0003', 'TANIA VANESSA LAZO', NULL, '05158346-7', '7333-7032', 'vane.lazo21@gmail.com', 'update2023', '-', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-10-18 17:03:00', '2023-10-18 17:03:00'),
(23, '0004', 'SONIA ELIZABETH DERAS VENTURA', NULL, '05418159-9', '7867-7501', 'elizadv420@gmail.com', 'sonia2023', '$2y$10$fWNyrInjFj4w239Nu8vHSubHTkk4dLz7mL4OwysBZeheDX244v2Bq', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-10-19 17:17:05', '2023-11-07 22:19:00'),
(24, '0001', 'MIGUEL ANGEL ROMERO', NULL, '01148324-5', '7742-3889', 'romerozepeda@yahoo.com', 'Romero2023', '$2y$10$cpCdlmx6gZbGUqbSXgn4lehrj.gl7oI91jG7UuiEVMCCibs1IHXb6', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Admin', 1, '2023-10-25 16:14:41', '2023-11-07 22:19:14'),
(25, NULL, 'GICELA JUDITH MADRIL REYES', '-', '05592618-8', '7713-4013', 'MR17052@UES.EDU.SV', 'judith', '$2y$10$3fyIaCrLUBT9h9.PRUSmGurRgQkE9lhSUgAwClasVrXojtVnscgnG', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-10-25 16:16:56', '2023-10-31 23:58:42'),
(26, NULL, 'Luis_t', 'ejemplo', '23432432-4', '2343-4343', 'dsfsdfsd@gmail.com', 'Luis_t', '$2y$10$ijzKHgC6PnEwditE.5BmS.fbeqrttu7Sd9H2qU5O.yh1VYTRPcLjO', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-11-01 15:18:30', '2023-11-16 14:19:20'),
(27, '1844', 'Hercilia Márquez López', 'San Salvador', '02648881-0', '7063-5354', 'hercymarquez7@gmail.com', 'Hercy07', '$2y$10$uE6Si6n.Xeg2b9HUDZS46usglaYHoPNkX5gvm21rEOYNVl0pVdmP6', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-11-11 17:24:05', '2023-11-11 17:24:05'),
(28, '111111', 'MIGUEL ANGEL ROMERO ZEPEDA', NULL, '01010111-1', '1', '1', 'update2023', '-', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2023-11-14 19:03:35', '2024-01-27 15:34:48'),
(29, '123', 'Armando_te', 'ejemplo', '54846565-4', '1213-2165', 'armando@gmail.com', 'Armando_te', '$2y$10$jOB28dPfKbFmEnSUNu2Ff.p7DfArGuIWqFeVMPHMkY3fSwhiGSjqe', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 0, '2023-11-16 14:22:40', '2023-12-03 14:59:55'),
(30, '1234', 'Willliam_t', 'ejemplo', '45416589-8', '1151-5616', 'dsfsdfsd@gmail.com', 'Willliam_t', '$2y$10$vAjAV1umDLhC42eVVFQX/ebZHbRFhLlWkXrDIV5SryuCkrEs/qrmq', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 0, '2023-11-16 14:24:16', '2023-11-25 03:49:05'),
(32, '13467', 'SOFIA ALEJANDRA MENDEZ', 'SAN SALVADOR', '08456320-1', '2245-8902', 'sofiamedez@gmail.com', 'sofia', '$2y$10$9ateJwYes9V/3ysXYjXjXul0jeL2Y9ix2OxEcMB.HuI/gc4eUI2zK', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 0, '2023-11-29 17:34:02', '2024-01-27 15:26:08'),
(33, '24590', 'KARLA ESTEFANY LEMUS', 'SONSONATE', '02345689-9', '2234-4981', 'karlit@gmail.com', 'karla', '$2y$10$x5KoJG4CcvSetZvggUrrFOip8tAe7rwrgNlFaSYM6HKV4RmfVbob6', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Recepcionista', 0, '2023-11-29 17:42:15', '2023-12-03 14:53:59'),
(35, '1696', 'REINALDO FLORES', 'N/A', '02431580-9', '7740-7991', 'rsuperacion@gmail.com', 'R.FLORES', '$2y$10$iil69Y3HyQkw9XdrNiL51.BuPHCXzLXVLnjlZ2qnKPHPfCwA9cvCa', 'eyJpdiI6Ing1Ulovc0VoRC9KZXFMWXBPSmZFYWc9PSIsInZhbHVlIjoiTTVYYnJOQ3dHQnNBaFBLbzExSUFYNHA1UWxFRDltOXNsc2RjTUxKUUxKdz0iLCJtYWMiOiJkM2QzNTRiMzhmOTMyNWNjMDkyYTYyNTQ2NmU4ZWY3YjRiZTQ2NWM2YTU5MTc3Njk1NzNhMDk4MTJkYmMxMzgxIiwidGFnIjoiIn0=', 'Terapeuta', 1, '2023-12-15 19:11:12', '2024-01-27 15:25:51'),
(36, NULL, 'JOSE ZAVALETA', 'SANTIAGO TEXACUANGOS, CANTON EL MORRO', '09382942-8', '7125-0171', 'josezavaletac94@gmail.com', 'cruz', '$2y$10$6GYYzoWZxwLtzkeagKmOYOuZfYGex6j5rODC77y36r2xqqgQWIo36', 'eyJpdiI6IjFSdUp5OUI5VkR6b3FZWkFnUnZGR3c9PSIsInZhbHVlIjoiaUJteVEwRDZ6SkNZWHV2NFVBZCtGdz09IiwibWFjIjoiZjU5ZWJlOGM4OTg4NDY3Yjc2NDY5MmQyOTdkODY5ZDhkZWQzOGNhZTU3OWNjZGJjM2MzNWRjMmRhYzE5NmI3ZSIsInRhZyI6IiJ9', 'Admin', 1, '2023-12-16 01:37:43', '2023-12-16 01:37:43'),
(37, NULL, 'MARIA ESTELA', 'CANTON EL MORRO, SANTIAGO EXACUANGOS', '08482837-3', '7645-2662', 'maria@gmail.com', 'maria', '$2y$10$KhALmb/nePpV8t2ViBmmSexwe22zB3dCEP3TKTjFuvbHitBbFFSMS', 'eyJpdiI6InluK2s1NjR3Z0lrWjA5RlJCeXdCSGc9PSIsInZhbHVlIjoiNUZPWlQyeExqWnhoaTJIbzRHRlkyUT09IiwibWFjIjoiY2QzNTAxN2U4ZTlkZGZhYTU2ODFkZjQxMmI3YzFjZjJiYzFjNDFjNTk2YmNkMmQ4N2RkYjUzN2RlNzc1N2EyZSIsInRhZyI6IiJ9', 'Recepcionista', 0, '2023-12-16 14:01:43', '2024-01-27 15:23:54'),
(38, '00001', 'MERCEDES RODRIGUES', 'SAN SALVADOR', '90909090-9', '7878-2983', '435435', 'merce', '$2y$10$cYhqw7/tcTrgqBHQYxijkONj4g.ePTYx5Pqj6y6ADIXIYROMrsrj6', 'eyJpdiI6IjRua0RYem9wdDQ5a0pVL1ROS2FyRnc9PSIsInZhbHVlIjoieUU0TW9iZ2tWbnVlMEowa3RRcWpwUT09IiwibWFjIjoiMjQ5ZTcwMmVhMTViMzVjMmUzMTQyY2RkYTY1Zjg4MjQ4OGEyZTNmNjA2OGE3YjkwZDg0YTA5NzhkNjc5MjAxOSIsInRhZyI6IiJ9', 'Terapeuta', 1, '2024-01-28 17:00:40', '2024-01-28 17:10:05'),
(39, '0002', 'CARMENCITA PRADO', NULL, '89239023-4', '3434-3434', 'carmencita.prado22@gmail.com', 'CARME', '$2y$10$Y5Ku3ZKoRyhYtKyuF3GBce4nR.Izq4xWKkPCvFAn86UEigjTxsHia', 'eyJpdiI6IkM2T2pGeGtDWUw4Z0E5cHJMbHUrQ2c9PSIsInZhbHVlIjoiU1kwUkdzdTRxVjhSRklrUVIrcWF3Zz09IiwibWFjIjoiNzZjYTY1YjQwNjRkMDAzYTJiNzRkODE0M2JmNjg0OWRmMmI0NzllM2RlM2ZkYWM3OTViYjc3MjdjNWFjMmJlZCIsInRhZyI6IiJ9', 'Terapeuta', 1, '2024-01-28 17:27:41', '2024-01-28 17:27:41');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `det_control_atenciones`
--
ALTER TABLE `det_control_atenciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `parentesco`
--
ALTER TABLE `parentesco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `responsable`
--
ALTER TABLE `responsable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
