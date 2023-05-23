-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2023 a las 18:43:03
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
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id_archivo` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `nombre_archivo` varchar(32) NOT NULL,
  `SIZE` varchar(200) NOT NULL,
  `DOWNLOAD` varchar(200) NOT NULL,
  `TIMERS` varchar(200) NOT NULL,
  `tipo_usuario` varchar(300) NOT NULL,
  `EMAIL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id_archivo`, `usuario`, `nombre_archivo`, `SIZE`, `DOWNLOAD`, `TIMERS`, `tipo_usuario`, `EMAIL`) VALUES
(3, 0, '', '187621', '0', 'Feb-16-2023 10:12 AM', 'Admin', 'Enriq'),
(4, 0, '', '902182', '0', 'Feb-18-2023 11:59 AM', 'Admin', 'Enriq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio`
--

CREATE TABLE `convenio` (
  `id_conv` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `organismo` text NOT NULL,
  `status` int(11) NOT NULL,
  `vigencia_inicio` date NOT NULL,
  `vigencia_final` date NOT NULL,
  `rep_ext` varchar(64) NOT NULL,
  `op_ext` varchar(64) NOT NULL,
  `dept_ext` text NOT NULL,
  `firma_ext` date NOT NULL,
  `rep_int` varchar(64) NOT NULL,
  `op_int` text NOT NULL,
  `dept_int` text NOT NULL,
  `firma_int` date NOT NULL,
  `beneficios` varchar(248) NOT NULL,
  `compromisos` varchar(248) NOT NULL,
  `usuario` varchar(32) NOT NULL,
  `ruta_archivo` varchar(64) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `convenio`
--

INSERT INTO `convenio` (`id_conv`, `nombre`, `organismo`, `status`, `vigencia_inicio`, `vigencia_final`, `rep_ext`, `op_ext`, `dept_ext`, `firma_ext`, `rep_int`, `op_int`, `dept_int`, `firma_int`, `beneficios`, `compromisos`, `usuario`, `ruta_archivo`, `estatus`) VALUES
(4, 'convenio prueba56', 'Hogwards', 0, '2003-03-01', '2005-03-01', 'Arturo', '', '', '2000-05-01', '', '', '', '2003-03-05', 'cacsaa', 'adasda', '', '0', 0),
(5, 'convenio universidad de frankfurt', 'UPSI', 0, '2003-03-08', '2005-03-01', 'Rectora Pricila Sosa', 'Ana', 'psofa', '0000-00-00', 'psofa', '', 'Alberto', '2003-03-05', 'fdbcfb', 'vdfbxb', '', '0', 0),
(6, 'Convenio USLA ', 'cambridge', 0, '2003-03-07', '2005-03-01', 'Rector. DR.EFRAÍN', 'Andres', 'Salud Publica', '2002-05-10', 'Salud Publica', '', 'Carlos', '2003-03-08', 'nkhnhk', 'jkkhkh', 'Carlos', '0', 0),
(7, 'TP645', 'ULSA', 0, '2003-03-07', '2005-03-01', 'lorem impsua', 'Alberto', 'dsfsd', '2000-05-01', 'Salud Publica', '', 'Tayron', '2003-03-01', 'zfzsfa', 'adada', 'Tomy', '0', 0),
(8, 'LD5', 'Hogwards', 0, '2003-03-01', '2005-03-01', 'Ulises', 'Pedro', 'tuu', '2002-05-10', 'Salud Publica', '', 'Tayron', '2003-03-01', 'asdasddfd', 'dfdfd', '', '0', 0),
(10, 'UP', 'Universidad del caribe', 0, '2003-03-01', '2005-03-01', 'Rectora Pricila Sosa', 'Carlos', 'Salud Publica', '2000-05-01', '', 'Andres', 'psofa', '2003-03-01', 'sadsa', 'sadas', '', '0', 0),
(11, 'PO', 'Columbia ', 0, '2003-03-07', '2005-03-01', 'Snap', 'Luna', 'Salud Publica', '2000-05-01', '', 'Carlos', 'psofa', '2003-03-01', 'aaaa', 'ssss', '', '0', 0),
(12, 'test1dsa', 'cambridge', 0, '2003-03-01', '2005-03-01', 'Rectora Pricila Sosa', 'Alberto', 'Administracion', '2000-05-10', 'Lorem Impsu', 'Tayron', 'psofa', '2003-03-01', 'aaaaaaaaaa', 'eeeeeeeee', '', '0', 0),
(13, 'Convenio De la Universidad de Granada', 'Universidad de Granada', 0, '2003-03-01', '2005-03-01', 'Dr Carlos', 'Luna', 'Practicas', '2000-05-01', 'Rectora Pricila Sosa', 'Mario', 'Administracion', '2003-03-01', '   ---', '---', 'Mario', '0', 0),
(14, 'convenio prueba 14', 'ut', 0, '2003-03-01', '2005-03-01', 'Sr Juan', 'Ana', 'Negocios', '2002-05-10', 'Rector. DR.EFRAÍN', 'Andres', 'Danza', '2003-03-08', 'popooopopopop', 'fafafaaffa', 'Jose', '0', 0),
(15, 'convenio 15', 'Hogwards', 0, '2003-03-07', '2005-03-01', 'Lorem Impsu', 'Carlos', 'Biblioteca', '2000-05-01', 'Sr Juan', 'Pedro', 'dsfsd', '2003-03-01', 'llplp', 'nknknkn k', 'Pedro', '0', 0),
(16, 'Universidad Tecnológica de Leon', 'UPSI', 0, '2023-05-25', '2023-05-17', 'Rector. DR.EFRAÍN', 'Carlos Trejo', 'Administracion', '2023-05-17', 'Pablo', '', 'Salud Publica', '2023-05-17', 'pocos', 'muchos', 'Andres', '0', 0),
(17, 'Convenio Intercultural', 'Universidad del caribe', 0, '2023-05-12', '2023-05-12', 'Rectora Pricila Sosa', 'Alejandro Gomez', '', '2023-05-02', 'Rectora Pricila Sosa', '', 'Deporte', '2023-05-25', '---------', '-----------', 'Math', '0', 0),
(18, 'Convenio Parcial', 'ULSA', 0, '2023-05-05', '2023-05-05', 'Pablo', 'Alejandro Gomez', '', '2023-05-01', 'Rectora Pricila Sosa', '', 'comercio', '2023-05-05', 'aaaa', 'e', 'Cesar', '0', 0),
(19, 'Convenio Intercambio', 'UPSI', 0, '2023-05-17', '2023-05-24', 'Rector. DR.EFRAÍN', 'Alejandro Gomez', 'Administracion', '2023-05-10', 'Rectora Pricila Sosa', 'Carlos Trejo', 'Administracion', '2023-05-10', 'ddddddd', 'dddddddd', 'Julio', '0', 0),
(20, 'Convenio Parcial 3', 'Universidad del Sur', 0, '2023-05-25', '2023-05-11', 'Rector. DR.EFRAÍN', 'Alejandro Gomez', 'Administracion', '2023-05-02', 'Rector. DR.EFRAÍN', 'Carlos Trejo', 'Salud Publica', '2023-05-26', 'aaa', 'eeee', 'Cesar', '', 0),
(21, 'Convenio Archivo', 'Universidad del caribe', 0, '2023-05-18', '2023-05-18', 'Rectora Pricila Sosa', 'mariana hernandez', 'comercio', '2023-05-06', 'Pablo', 'mariana hernandez', 'Biblioteca', '2023-05-27', 'fffff', 'fddddddd', 'Alejandro', '../uploads/', 0),
(22, 'Prueba archivo', 'Universidad del caribe', 0, '2023-05-26', '2023-05-11', 'Rectora Pricila Sosa', 'mariana hernandez', 'comercio', '2023-05-04', 'Rectora Pricila Sosa', 'mariana hernandez', 'comercio', '2023-05-19', 'aaa', 'aaa', 'Enrique', '../uploads/Informacion_del_convenio.pdf', 0),
(23, 'Convenio Posix', 'Universidad del caribe', 0, '2023-05-18', '2023-05-04', 'Rectora Pricila Sosa', 'mariana hernandez', 'comercio', '2023-05-13', 'Rectora Pricila Sosa', 'mariana hernandez', 'comercio', '2023-05-19', 'fffff', 'sssss', 'Andres', '../uploads/acta defunción.pdf', 0),
(24, 'Convenio Yucatan', 'Universidad del caribe', 0, '2023-05-11', '2023-05-12', 'Rectora Pricila Sosa', 'mariana hernandez', 'comercio', '2023-05-06', 'Rectora Pricila Sosa', 'mariana hernandez', 'comercio', '2023-05-11', 'aaa', 'aaaa', 'Enrique', '../uploads/Informacion_del_convenio (5).pdf', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_dept` int(11) NOT NULL,
  `dept` varchar(64) NOT NULL,
  `operador` varchar(64) NOT NULL,
  `org` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_dept`, `dept`, `operador`, `org`) VALUES
(1, 'comercio', 'mariana hernandez', 'unicaribe'),
(2, 'dsfsd', 'asa', 'UT'),
(4, 'Administracion', 'Carlos Trejo', 'ANAHUAC'),
(5, 'Salud Publica', 'Alejandro Gomez', 'Universidad del caribe'),
(7, 'Deporte', 'Tomy', 'UT'),
(9, 'Biblioteca', 'Raul', 'UT4'),
(10, 'Practicas', 'Raul', 'Universidad del Sur');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `id_estatus` int(11) NOT NULL,
  `estatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `email` text NOT NULL,
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

INSERT INTO `history_log1` (`log_id`, `id`, `email`, `action`, `actions`, `ip`, `host`, `login_time`, `logout_time`) VALUES
(0, 11, 'richard@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'buhayko-PC', 'May-29-2019 02:34 PM', 'May-29-2019 02:35 PM'),
(0, 12, 'joneltoledo@yahoo.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'buhayko-PC', 'May-29-2019 02:35 PM', 'Mar-27-2021 10:59 PM'),
(0, 12, 'joneltoledo@yahoo.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'buhayko-PC', 'May-29-2019 02:37 PM', 'Mar-27-2021 10:59 PM'),
(0, 12, 'joneltoledo@yahoo.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'buhayko-PC', 'May-30-2019 04:33 PM', 'Mar-27-2021 10:59 PM'),
(0, 12, 'joneltoledo@yahoo.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '127.0.0.1', 'keystone.mwbsys.com', 'Mar-27-2021 10:56 PM', 'Mar-27-2021 10:59 PM'),
(0, 13, 'admin@campcodes.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '127.0.0.1', 'keystone.mwbsys.com', 'Mar-27-2021 10:59 PM', 'Mar-27-2021 11:00 PM'),
(0, 13, 'admin@campcodes.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-16-2023 09:44 AM', ''),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-16-2023 10:05 AM', 'Mar-07-2023 10:52 AM'),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-16-2023 10:32 AM', 'Mar-07-2023 10:52 AM'),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-18-2023 11:36 AM', 'Mar-07-2023 10:52 AM'),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-21-2023 09:21 AM', 'Mar-07-2023 10:52 AM'),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-28-2023 06:32 AM', 'Mar-07-2023 10:52 AM'),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-28-2023 06:36 AM', 'Mar-07-2023 10:52 AM'),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-28-2023 06:40 AM', 'Mar-07-2023 10:52 AM'),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-28-2023 06:47 AM', 'Mar-07-2023 10:52 AM'),
(0, 15, 'donjoe@test', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Feb-28-2023 09:01 AM', ''),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-01-2023 10:28 AM', 'Mar-07-2023 10:52 AM'),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-01-2023 10:29 AM', 'Mar-07-2023 10:52 AM'),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-01-2023 10:29 AM', 'Mar-07-2023 10:52 AM'),
(0, 14, 'enriq@ucaribe.edu.mx', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-01-2023 10:35 AM', 'Mar-07-2023 10:52 AM'),
(0, 21, 'test1@caribe', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-07-2023 11:01 AM', ''),
(0, 21, 'test1@caribe', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-09-2023 04:55 AM', ''),
(0, 21, 'test1@caribe', 'Inicio sesion ', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-14-2023 12:15 PM', ''),
(0, 21, 'test1@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-14-2023 12:35 PM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-14-2023 12:36 PM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-14-2023 12:36 PM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-14-2023 12:37 PM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-14-2023 12:38 PM', ''),
(0, 21, 'test1@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-14-2023 12:49 PM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-14-2023 12:50 PM', ''),
(0, 21, 'test1@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-14-2023 12:51 PM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-14-2023 12:51 PM', ''),
(0, 21, 'test1@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-14-2023 01:00 PM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-14-2023 01:00 PM', ''),
(0, 13, 'admin@campcodes.com', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-14-2023 01:05 PM', ''),
(0, 21, 'test1@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-16-2023 06:03 AM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-16-2023 06:04 AM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-16-2023 09:07 AM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-16-2023 09:54 AM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-16-2023 10:06 AM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-16-2023 10:10 AM', ''),
(0, 21, 'test1@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-16-2023 12:03 PM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-16-2023 12:06 PM', ''),
(0, 21, 'test1@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-16-2023 12:06 PM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-16-2023 12:14 PM', ''),
(0, 24, 'oper@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-16-2023 12:34 PM', ''),
(0, 24, 'oper@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-16-2023 12:38 PM', ''),
(0, 21, 'test1@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-16-2023 12:41 PM', ''),
(0, 24, 'oper@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-16-2023 12:49 PM', ''),
(0, 24, 'oper@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-22-2023 12:11 PM', ''),
(0, 24, 'oper@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-23-2023 03:27 AM', ''),
(0, 21, 'test1@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-23-2023 03:36 AM', ''),
(0, 21, 'test1@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-23-2023 04:24 AM', ''),
(0, 21, 'test1@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-23-2023 04:31 AM', ''),
(0, 24, 'oper@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-23-2023 04:35 AM', ''),
(0, 24, 'oper@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-23-2023 04:58 AM', ''),
(0, 21, 'test1@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-23-2023 05:06 AM', ''),
(0, 24, 'oper@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-23-2023 05:13 AM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-23-2023 05:14 AM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-23-2023 05:27 AM', ''),
(0, 24, 'oper@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-24-2023 07:32 AM', ''),
(0, 21, 'test1@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-24-2023 07:33 AM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-24-2023 07:52 AM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-25-2023 04:58 AM', ''),
(0, 24, 'oper@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-25-2023 05:08 AM', ''),
(0, 24, 'oper@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-25-2023 05:09 AM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-25-2023 05:31 AM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-25-2023 05:55 AM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-25-2023 07:33 AM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-25-2023 09:09 AM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-30-2023 03:22 AM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Mar-30-2023 05:08 AM', ''),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Apr-05-2023 08:43 AM', ''),
(0, 0, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Apr-19-2023 11:20 AM', 'May-20-2023 05:39 AM'),
(0, 0, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Apr-19-2023 11:21 AM', 'May-20-2023 05:39 AM'),
(0, 0, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Apr-19-2023 11:21 AM', 'May-20-2023 05:39 AM'),
(0, 0, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Apr-19-2023 11:21 AM', 'May-20-2023 05:39 AM'),
(0, 0, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Apr-19-2023 11:22 AM', 'May-20-2023 05:39 AM'),
(0, 0, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Apr-19-2023 11:22 AM', 'May-20-2023 05:39 AM'),
(0, 0, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Apr-19-2023 11:23 AM', 'May-20-2023 05:39 AM'),
(0, 0, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Apr-19-2023 11:24 AM', 'May-20-2023 05:39 AM'),
(0, 0, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Apr-19-2023 11:24 AM', 'May-20-2023 05:39 AM'),
(0, 19, 'donjoea@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Apr-19-2023 11:26 AM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Apr-19-2023 11:26 AM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Apr-19-2023 11:27 AM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Apr-20-2023 05:38 AM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Apr-20-2023 05:38 AM', ''),
(0, 30, 'Oper2@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Apr-20-2023 05:47 AM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'Apr-20-2023 05:50 AM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-04-2023 09:39 AM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-05-2023 02:48 AM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-15-2023 12:18 PM', ''),
(0, 20, 'doejoe@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-15-2023 12:19 PM', ''),
(0, 20, 'doejoe@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-15-2023 12:20 PM', ''),
(0, 20, 'doejoe@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-15-2023 12:21 PM', ''),
(0, 20, 'doejoe@caribe', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-15-2023 12:22 PM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-16-2023 09:37 AM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-19-2023 07:38 AM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-19-2023 07:38 AM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-19-2023 07:39 AM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-19-2023 07:39 AM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-19-2023 07:42 AM', ''),
(0, 33, 'OP1@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-19-2023 07:49 AM', ''),
(0, 33, 'OP1@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-19-2023 07:59 AM', ''),
(0, 33, 'OP1@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-19-2023 08:00 AM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-19-2023 08:06 AM', ''),
(0, 34, 'user@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-19-2023 08:07 AM', ''),
(0, 34, 'user@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-19-2023 08:11 AM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-19-2023 08:22 AM', ''),
(0, 34, 'user@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-19-2023 08:29 AM', ''),
(0, 34, 'user@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-19-2023 08:39 AM', ''),
(0, 34, 'user@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-19-2023 08:40 AM', ''),
(0, 34, 'user@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-19-2023 08:53 AM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-20-2023 05:19 AM', ''),
(0, 34, 'user@test', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-20-2023 05:37 AM', ''),
(0, 29, 'admin@admin', 'Inicio sesión', 'Has LoggedOut the system at', '::1', 'LAPTOP-874GVJN5', 'May-20-2023 05:39 AM', '');

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
  `id_orga` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `alias` varchar(64) NOT NULL,
  `tipo` varchar(64) NOT NULL,
  `representante` varchar(64) NOT NULL,
  `direccion` varchar(128) NOT NULL,
  `codigo postal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `organismos`
--

INSERT INTO `organismos` (`id_orga`, `nombre`, `alias`, `tipo`, `representante`, `direccion`, `codigo postal`) VALUES
(3, 'Universidad del caribe', 'caribe02', 'institucion academica', 'Rectora Pricila Sosa', 'dsvzd', 77500),
(6, 'ULSA', 'ULSA1', 'institucion', 'Ulises', 'ULSA-775', 775355),
(7, 'UPSI', 'UPSI', 'institucion sin fines de lucro', 'Pablo', 'Fidu-56', 556622),
(8, 'Universidad del Sur', 'USUR23', 'Institución academica', 'Rector. DR.EFRAÍN', 'cancun qroo', 77500),
(9, 'Universidad Tecnológica de Cancún', 'UT02', 'institucion academica', '', 'Sm 20', 3320),
(10, 'Universidad Maya', 'UMA', 'institucion academica', 'Enrique', 'Sm 20', 75000),
(11, 'Universidad de Granada', 'Gr2', 'Institucion academica', 'Dr Carlos', 'Sm 20', 77500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` text NOT NULL,
  `email` text NOT NULL,
  `admin_password` text NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `email`, `admin_password`, `tipo_usuario`) VALUES
(14, 'enriq8', 'enriq@ucaribe', '$2y$12$lOY9I.EtFqJS2zKoS5SrROXCqJ3d6eY.YiNRBxAkh12c/Mt1KEO02', 'Administrador'),
(20, 'CARIBE', 'doejoe@caribe', '$2y$12$bZzWrgov0WUn5Fh3POyDkuY8tawKa0pYplviuUlOuTzK4.wTiEVQi', 'Administrador'),
(24, 'DonOp', 'oper@caribe', '$2y$12$GgbMY7tcJHoN9n8gK3fxEugwRSRXCEyXX/phMZEXp4TXgapRZMvW.', 'Operador'),
(25, 'test155', 'test1@caribes', '$2y$12$fBYSH.NN4dMzwgQkmfpatue7a955TR1h184AT4b1jnww5g/9jBpli', 'admin'),
(27, 'Administrador', 'admin@caribe', '$2y$12$4ifpHqY23F6xN19mSLVKROymlA9BRY/lldAKZLE/2IscnqnGSPh9e', 'Administrador'),
(29, 'Enrique', 'admin@admin', '$2y$12$TqMQjkzU8SQG1hc5cTgw/eG37w0bSKA4n86BM70FgZfq4mNVzyaUS', 'Administrador'),
(30, 'DonOp', 'oper@caribe', '$2y$12$ENrY8AtlpTXfFtRdK0tfE.lkml8gope6SK51DVDPvL17G3rHdNxFS', 'Administrador'),
(31, 'ultimo', 'enriq4@ucaribe.edu.mx', '$2y$12$Z3g6T9JTaSSWOFC9RLJOceW4nDMQCNGBQd1BaBU6EMWyJiPzp0XkC', 'Administrador'),
(32, 'ultimo usuario', 'ultimo@caribe', '$2y$12$KG82mI3p56bDpD1xbDQG/OBM3do0jslr7SHtoNU8kDfpFz.jiq/H6', 'admin'),
(33, 'Operador Prueba', 'OP1@test', '$2y$12$AsyhiU3epOZRLTX2agF4DuTcdISTjLadlXQ/oGrsnyhT7jCYpi8.W', 'operador'),
(34, 'Usuario1', 'user@test', '$2y$12$AXzBaSi.u7512UgX03V6/u7Su6tealr8dT2QqY4QsOh6fDe1RgOSO', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `convenio`
--
ALTER TABLE `convenio`
  ADD PRIMARY KEY (`id_conv`),
  ADD KEY `conexiones` (`ruta_archivo`,`estatus`) USING BTREE;

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_dept`),
  ADD KEY `organismo` (`org`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id_estatus`);

--
-- Indices de la tabla `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `organismos`
--
ALTER TABLE `organismos`
  ADD PRIMARY KEY (`id_orga`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `convenio`
--
ALTER TABLE `convenio`
  MODIFY `id_conv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id_estatus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `organismos`
--
ALTER TABLE `organismos`
  MODIFY `id_orga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
