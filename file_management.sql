-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-03-2023 a las 14:52:04
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `file_management`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `history_log`
--

CREATE TABLE `history_log` (
  `log_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `email_address` text NOT NULL,
  `action` varchar(100) NOT NULL,
  `actions` varchar(200) NOT NULL DEFAULT 'Has LoggedOut the system at',
  `ip` text NOT NULL,
  `host` text NOT NULL,
  `login_time` varchar(200) NOT NULL,
  `logout_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `history_log`
--

INSERT INTO `history_log` (`log_id`, `id`, `email_address`, `action`, `actions`, `ip`, `host`, `login_time`, `logout_time`) VALUES
(0, 1, 'nario@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'buhayko-PC', 'May-29-2019 02:36 PM', 'May-30-2019 04:33 PM'),
(0, 1, 'nario@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'buhayko-PC', 'May-30-2019 04:30 PM', 'May-30-2019 04:33 PM'),
(0, 2, '150300119@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-16-2023 09:57 AM', 'Feb-28-2023 06:47 AM'),
(0, 2, '150300119@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-16-2023 10:05 AM', 'Feb-28-2023 06:47 AM'),
(0, 2, '150300119@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-21-2023 08:55 AM', 'Feb-28-2023 06:47 AM'),
(0, 2, '150300119@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-21-2023 09:21 AM', 'Feb-28-2023 06:47 AM'),
(0, 2, '150300119@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-28-2023 06:47 AM', 'Feb-28-2023 06:47 AM'),
(0, 3, 'ochoa@ucaribe', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-28-2023 08:01 AM', ''),
(0, 3, 'ochoa@ucaribe', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-28-2023 08:33 AM', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `history_log1`
--

CREATE TABLE `history_log1` (
  `log_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `admin_user` text NOT NULL,
  `action` varchar(100) NOT NULL,
  `actions` varchar(200) NOT NULL DEFAULT 'Has LoggedOut the system at',
  `ip` text NOT NULL,
  `host` text NOT NULL,
  `login_time` varchar(200) NOT NULL,
  `logout_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `history_log1`
--

INSERT INTO `history_log1` (`log_id`, `id`, `admin_user`, `action`, `actions`, `ip`, `host`, `login_time`, `logout_time`) VALUES
(0, 11, 'richard@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'buhayko-PC', 'May-29-2019 02:34 PM', 'May-29-2019 02:35 PM'),
(0, 12, 'joneltoledo@yahoo.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'buhayko-PC', 'May-29-2019 02:35 PM', 'Mar-27-2021 10:59 PM'),
(0, 12, 'joneltoledo@yahoo.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'buhayko-PC', 'May-29-2019 02:37 PM', 'Mar-27-2021 10:59 PM'),
(0, 12, 'joneltoledo@yahoo.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'buhayko-PC', 'May-30-2019 04:33 PM', 'Mar-27-2021 10:59 PM'),
(0, 12, 'joneltoledo@yahoo.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '127.0.0.1', 'keystone.mwbsys.com', 'Mar-27-2021 10:56 PM', 'Mar-27-2021 10:59 PM'),
(0, 13, 'admin@campcodes.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '127.0.0.1', 'keystone.mwbsys.com', 'Mar-27-2021 10:59 PM', 'Mar-27-2021 11:00 PM'),
(0, 13, 'admin@campcodes.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-16-2023 09:44 AM', ''),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-16-2023 10:05 AM', 'Feb-28-2023 09:00 AM'),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-16-2023 10:32 AM', 'Feb-28-2023 09:00 AM'),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-18-2023 11:36 AM', 'Feb-28-2023 09:00 AM'),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-21-2023 09:21 AM', 'Feb-28-2023 09:00 AM'),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-28-2023 06:32 AM', 'Feb-28-2023 09:00 AM'),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-28-2023 06:36 AM', 'Feb-28-2023 09:00 AM'),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-28-2023 06:40 AM', 'Feb-28-2023 09:00 AM'),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-28-2023 06:47 AM', 'Feb-28-2023 09:00 AM'),
(0, 15, 'donjoe@test', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-28-2023 09:01 AM', ''),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-01-2023 10:28 AM', ''),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-01-2023 10:29 AM', ''),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-01-2023 10:29 AM', ''),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-01-2023 10:35 AM', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_user`
--

CREATE TABLE `login_user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email_address` text NOT NULL,
  `user_password` text NOT NULL,
  `user_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `login_user`
--

INSERT INTO `login_user` (`id`, `name`, `email_address`, `user_password`, `user_status`) VALUES
(2, 'steck', '150300119@ucaribe.edu.mx', '$2y$12$474XT/uzFJaqncOo2BIl9.vjbFXJM3o9kQTLhM8gnKEWw1/cLFbme', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organismos`
--

CREATE TABLE `organismos` (
  `nombre` varchar(64) NOT NULL,
  `id_org` varchar(64) NOT NULL,
  `tipo` varchar(64) NOT NULL,
  `representante` varchar(64) NOT NULL,
  `direccion` varchar(128) NOT NULL,
  `codigo postal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `organismos`
--

INSERT INTO `organismos` (`nombre`, `id_org`, `tipo`, `representante`, `direccion`, `codigo postal`) VALUES
('Universidad del caribe', 'caribe02', 'institucion academica', 'Rectora', 'dsvzd', 77500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `upload_files`
--

CREATE TABLE `upload_files` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SIZE` varchar(200) NOT NULL,
  `DOWNLOAD` varchar(200) NOT NULL,
  `TIMERS` varchar(200) NOT NULL,
  `ADMIN_STATUS` varchar(300) NOT NULL,
  `EMAIL` text NOT NULL,
  `firma_int` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `upload_files`
--

INSERT INTO `upload_files` (`ID`, `NAME`, `SIZE`, `DOWNLOAD`, `TIMERS`, `ADMIN_STATUS`, `EMAIL`, `firma_int`) VALUES
(1, 'ajax_tutorial.pdf', '618379', '1', 'May-29-2019 02:36 PM', 'Employee', 'Email Luis Nario', NULL),
(2, 'css_tutorial.pdf', '910221', '0', 'May-29-2019 02:36 PM', 'Employee', 'Email Luis Nario', NULL),
(3, 'licencia2023sat.pdf', '187621', '0', 'Feb-16-2023 10:12 AM', 'Admin', 'Enriq', NULL),
(4, 'Identidades trigonometricas..pdf', '902182', '0', 'Feb-18-2023 11:59 AM', 'Admin', 'Enriq', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` text NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `admin_password` text NOT NULL,
  `rol` varchar(20) NOT NULL,
  `departamento` varchar(20) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `occupation`, `email`, `admin_password`, `rol`, `departamento`, `tipo_usuario`) VALUES
(13, 'CampCodes', '', 'admin@campcodes.com', '$2y$12$yjn.g4FtUoXrOqqNMka/Mu/4tq7Brp7Q.aAILGCrjpw.iHKas/uC.', '', '', ''),
(14, 'enriq', '', 'enriq@ucaribe.edu.mx', '$2y$12$nixHVKKBzNKS0pPhe9yleOvF/X3bl9L4bLD67ODNdWgsG.1PCfRuG', '', '', ''),
(18, 'doe joe', '', 'doej@caribe', '$2y$12$lTgu0aXPQYPHQc20yF6YieyoSEc3GZ2EQex7E3H781v1gn0K6vGZ.', 'rep_ext', '', 'usuario'),
(19, 'Don joe1', '', 'donjoea@test', '$2y$12$503gpAWBnSQh/6OeG0OOR.G4i2v2rwW64SbCc1oc4HrkKV5wBIYXG', 'rep_ext', '', 'admin'),
(20, 'doe joe1', '', 'doejo1@caribe', '$2y$12$zC667TL30B0AALQUgXCs3eFW7bvrp1deyrp2W3e7HGuGh6.eZd22m', 'rep_ext', 'Negocios', 'usuario'),
(21, 'test1', '', 'test1@caribe', '$2y$12$2HGD9g3wQ7roKD75bKdNEOfAgcXmRj190WViW1KMDOiYrvX3hxpMi', 'op_int', 'Practicas', 'usuario'),
(22, 'test1', '', 'test123@caribe', '$2y$12$9Q3gGB2cYfWC2ySznvbJVudCKVliGAiF83ZyJdnjni4ZNVd8TPU7.', 'op_int', 'Vinculacion', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `organismos`
--
ALTER TABLE `organismos`
  ADD PRIMARY KEY (`id_org`);

--
-- Indices de la tabla `upload_files`
--
ALTER TABLE `upload_files`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `upload_files`
--
ALTER TABLE `upload_files`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
