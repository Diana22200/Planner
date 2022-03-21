-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2022 a las 00:29:16
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

CREATE DATABASE  IF NOT EXISTS `surrogate_keys` ;
USE `surrogate_keys`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `surrogate_keys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `deadline` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `link` varchar(500) DEFAULT NULL,
  `classid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `activity`
--

INSERT INTO `activity` (`id`, `code`, `title`, `description`, `type`, `deadline`, `status`, `link`, `classid`) VALUES
(1, 2201, 'Llaves naturales', 'hacer el código SQL de este diseño que está usando solo llaves naturales', 'Tarea', '2021-07-06', 'activo', 'https://classroom.google.com/u/3/c/Mjg5MDMwMTkyMjgy/a/Mjg5OTE5NjE0NTA2/details', 4),
(2, 2202, 'Llaves surrogates', 'hacer el código SQL de este diseño que está usando solo llaves surrogates', 'Tarea', '2021-07-06', 'activo', 'https://classroom.google.com/u/3/c/Mjg5MDMwMTkyMjgy/a/MjkwMzEzNjgwODA0/details', 4),
(3, 2203, 'Guías de DML y DDL', 'Realizar las sentencias DDL del proyecto a partir del modelo entidad relación ysentencias DML del proyecto para agregar la información.', 'Tarea', '2021-06-14', 'activo', 'https://classroom.google.com/u/1/c/Mjg5MDMwMTkyMjgy/a/MjkwMzEzNjgwOTcx/details', 4),
(4, 2204, 'Actividad definiciones', 'Vizualice el siguiente video relacionando el tema con su proyecto formativo', 'Tarea', '2021-05-14', 'inactivo', 'https://www.napofilm.net/es/napos-films/films?page=2&view_mode=page_grid', 1),
(5, 2205, 'Tell me the most important dates', 'You need to record your voice, and tell me the most important dates in Colombia. Submit in here the activity.', 'Activity', '2021-05-18', 'inactivo', 'https://classroom.google.com/u/1/c/Mjg5NDA4MjYzMTQ3/a/MjkwNTIwNjUyNDQ5/details', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `class`
--

INSERT INTO `class` (`id`, `code`, `subject`, `status`) VALUES
(1, 9283, 'Promover', 'Activo'),
(2, 2342, 'Ejercer derechos del trabajo', 'Inactivo'),
(3, 6433, 'bilingüismo', 'Activo'),
(4, 9543, 'ADSI', 'Activo'),
(5, 8324, 'Educación Física', 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `num_students` int(11) DEFAULT NULL,
  `program_name` varchar(60) NOT NULL,
  `trimestre` int(11) NOT NULL,
  `Modeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `course`
--

INSERT INTO `course` (`id`, `code`, `status`, `num_students`, `program_name`, `trimestre`, `Modeid`) VALUES
(1, 2251585, 'activo', 31, 'Análisis y Desarrollo de Sistemas de Información', 2, 6),
(2, 2049893, 'activo', 32, 'Electricidad Industrial', 5, 6),
(3, 2141398, 'activo', 35, 'gestion de redes de datos', 3, 4),
(4, 2022661, 'activo', 30, 'instalacion de redes internas de telecomunicaciones', 4, 4),
(5, 1964769, 'activo', 29, 'Mantenimiento de Equipos Electrónicos de Audio y Video', 3, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_class`
--

CREATE TABLE `course_class` (
  `id` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `id_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `course_class`
--

INSERT INTO `course_class` (`id`, `id_class`, `id_course`) VALUES
(2, 1, 2),
(3, 2, 3),
(4, 3, 4),
(1, 4, 1),
(5, 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `acronym_doc` varchar(10) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `document`
--

INSERT INTO `document` (`id`, `acronym_doc`, `name`) VALUES
(1, 'TI', 'Tarjeta de identidad'),
(2, 'CC', 'Cedula de Ciudadanía'),
(3, 'Pas', 'Pasaporte'),
(4, 'DNI', 'Documento Nacional de Identificación'),
(5, 'NIT', 'Número de Identificación Tributaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `shipping_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(40) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `message`
--

INSERT INTO `message` (`id`, `text`, `shipping_date`, `title`, `code`) VALUES
(1, 'Mi nombre es incorrecto', '0000-00-00 00:00:00', 'CAMBIO DE DATOS', 34567),
(2, '¿A cuál nombre desea cambiar?', '0000-00-00 00:00:00', 'CAMBIO DE NOMBRE', 12345),
(3, 'Quiero actualizar mi tipo de documento, pues ahora soy mayor de edad.', '0000-00-00 00:00:00', 'ACTUALIZACIÓN INFO', 23456),
(4, 'Presento problemas para utilizar la plataforma, no puedo acceder al link de la actividad', '0000-00-00 00:00:00', 'AYUDA PLATAFORMA', 45678),
(5, 'Mi correo es incorrecto', '0000-00-00 00:00:00', 'CAMBIO DE CORREO', 91011);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mode`
--

CREATE TABLE `mode` (
  `id` int(11) NOT NULL,
  `modality` varchar(15) NOT NULL,
  `session_time` varchar(30) NOT NULL,
  `education_level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mode`
--

INSERT INTO `mode` (`id`, `modality`, `session_time`, `education_level`) VALUES
(1, 'Presencial', 'Diurna', 'Técnico'),
(6, 'Presencial', 'Diurna', 'Tecnólogo'),
(4, 'Presencial', 'Nocturna', 'Técnico'),
(5, 'Presencial', 'Tarde', 'Curso corto'),
(2, 'Virtual', 'Mañana', 'Tecnólogo'),
(3, 'Virtual', 'Tarde', 'Curso corto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qualification`
--

CREATE TABLE `qualification` (
  `id` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `Userid` int(11) NOT NULL,
  `Activityid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `qualification`
--

INSERT INTO `qualification` (`id`, `score`, `Userid`, `Activityid`) VALUES
(1, 50, 3, 2),
(2, 35, 4, 1),
(3, 38, 3, 1),
(4, 45, 4, 2),
(5, 20, 12, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id`, `type`) VALUES
(1, 'Administrador'),
(2, 'Aprendiz'),
(3, 'Instructor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `num_doc` int(11) NOT NULL,
  `documentid` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `names` varchar(60) NOT NULL,
  `surname` varchar(60) NOT NULL,
  `url_prof_pic` varchar(500) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(16) NOT NULL,
  `Roleid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `num_doc`, `documentid`, `status`, `names`, `surname`, `url_prof_pic`, `email`, `password`, `Roleid`) VALUES
(1, 1001348758, 1, 'Activo', 'Stephanny Diana Alejandra', 'Guevara Bocanegra', 'https://i.postimg.cc/BnDx0b83/IMG-4491.jpg', 'sdguevara85@misena.edu.co', '*sjshdafiwu', 1),
(2, 1012346253, 1, 'Activo', 'Heidy Natalia', 'Pinto Peña', 'https://i.postimg.cc/HkmDff2W/Whats-App-Image-2021-05-19-at-10-37-46-PM.jpg', 'hnpinto3@misena.edu.co', '*Najkjskjas', 3),
(3, 1013099805, 1, 'Activo', 'Anyi Stefania', 'Becerra Martinez', 'https://i.postimg.cc/W1nqZ1g9/ad2cd732-f521-4acd-8993-3e87ade1e27f.jpg', 'asbecerra5@misena.edu.co', 'Asfjhfj', 2),
(4, 1001044333, 2, 'Activo', 'Cristian Camilo', 'Garcia Garcia', 'https://i.postimg.cc/tg4ZNGz9/Cristian-chikito.jpg', 'ccgarcia333@misena.edu.co', 'Ccuishdai', 2),
(5, 1000131959, 1, 'Inactivo', 'Andrés Camilo', 'Hernández Guerrero', 'https://i.postimg.cc/P5h8Nwpp/andres.jpg', 'achernandez959@misena.edu.co', '*Askhdu', 2),
(6, 1030520171, 1, 'Activo', 'Anderson Camilo', 'Jimenez Villareal', 'https://i.pinimg.com/564x/67/74/c6/6774c61b2a00008f1f82b364b4bc6be1.jpg', 'acjimenez171@misena.edu.co', 'id032jsui', 3),
(7, 1000161919, 1, 'Activo', 'William Alejandro', 'Bermudez Quiroga', 'https://i.pinimg.com/564x/06/e1/44/06e1441cb163c317889e3ef45a62cefd.jpg', 'wabermudez91@misena.edu.co', 'jhsj234243', 3),
(8, 1014176695, 1, 'Activo', 'Juan Camilo', 'Rojas Rojas', 'https://i.pinimg.com/564x/c1/ef/13/c1ef13e75a7e91015ae1479e25cf5113.jpg', 'jcrojas596@misena.edu.co', 'aaaai823h3', 3),
(9, 1003000638, 2, 'Activo', 'Elizabeth Esther', 'Gonzalez velasquez', 'https://i.pinimg.com/564x/06/19/f4/0619f4140977610d3da52d0fe2afc70f.jpg', 'eegonzalez83@misena.edu.co', 'EEGV100ksdjue', 3),
(10, 1000604423, 1, 'Activo', 'Johan Styven', 'Castro Forero', 'https://i.pinimg.com/564x/e6/0d/21/e60d217d1fe700d20141056a699336f2.jpg', 'jscastro324@misena.edu.co', 'sjhajsksi7', 2),
(11, 1013096053, 1, 'Activo', 'Camilo Andrés', 'Galindo Rivera', 'https://i.pinimg.com/564x/93/1b/92/931b92942c5f7f96c7452ed3228d0e9f.jpg', 'cagalindo35@misena.edu.co', 'jhuiehw', 2),
(12, 1006094577, 2, 'Activo', 'Luis Fernando', 'Perdomo Enciso', 'https://i.pinimg.com/564x/f6/2a/81/f62a817bb27218ad3b8d191dd1ea03a7.jpg', 'lfperdomo77@misena.edu.co', 'sadhjhnew', 2),
(13, 1000708656, 1, 'Activo', 'Juan David', 'Mercado Torres', 'https://i.pinimg.com/564x/5f/56/96/5f5696074cfdd50e6ed7ac411c136cf3.jpg', 'jdmercado656@misena.edu.co', 'juishiew', 2),
(14, 1025140590, 1, 'Activo', 'BRAYAN STEVEN', 'HORTA QUEVEDO', 'https://i.pinimg.com/564x/6b/9a/66/6b9a66332552988dc43e1f78e020e779.jpg', 'bshorta0@misena.edu.co', 'Nhafhsdj', 2),
(15, 1001049702, 2, 'Activo', 'IRIS DAYANA', 'ACOSTA MONCADA', 'https://i.pinimg.com/564x/74/f0/69/74f069fee2dbd50ef41c71cd3fd7c5ae.jpg', 'idacosta20@misena.edu.co', 'Sdfxfjv', 2),
(16, 1001174023, 2, 'Activo', 'JUAN CARLOS', 'GUERRERO ARANZAZU', 'https://i.pinimg.com/564x/52/8f/76/528f767cbdfd82a50257712e569a44c5.jpg', 'jcguerrero3204@misena.edu.co', 'Ijsfbs', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_class`
--

CREATE TABLE `user_class` (
  `id` int(11) NOT NULL,
  `Userid` int(11) NOT NULL,
  `classid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user_class`
--

INSERT INTO `user_class` (`id`, `Userid`, `classid`) VALUES
(1, 2, 4),
(2, 6, 1),
(3, 7, 2),
(4, 8, 3),
(5, 9, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_course`
--

CREATE TABLE `user_course` (
  `id` int(11) NOT NULL,
  `Userid` int(11) NOT NULL,
  `Courseid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user_course`
--

INSERT INTO `user_course` (`id`, `Userid`, `Courseid`) VALUES
(1, 3, 1),
(2, 4, 1),
(3, 10, 2),
(4, 11, 3),
(5, 12, 4),
(6, 13, 5),
(7, 14, 2),
(8, 15, 3),
(9, 16, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_message`
--

CREATE TABLE `user_message` (
  `id` int(11) NOT NULL,
  `Userid` int(11) NOT NULL,
  `messageid` int(11) NOT NULL,
  `situation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user_message`
--

INSERT INTO `user_message` (`id`, `Userid`, `messageid`, `situation`) VALUES
(1, 3, 1, 'Enviado'),
(2, 1, 2, 'Enviado'),
(3, 4, 4, 'Enviado'),
(4, 2, 5, 'Enviado'),
(5, 5, 3, 'Enviado'),
(6, 1, 3, 'Recibido'),
(17, 1, 1, 'Recibido'),
(18, 3, 2, 'Recibido'),
(19, 1, 4, 'Recibido'),
(20, 1, 5, 'Recibido');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_code_act` (`code`),
  ADD KEY `fk_class_acti` (`classid`);

--
-- Indices de la tabla `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_code_class` (`code`);

--
-- Indices de la tabla `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_code_course` (`code`),
  ADD KEY `fk_cour_mode` (`Modeid`);

--
-- Indices de la tabla `course_class`
--
ALTER TABLE `course_class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_course_class` (`id_class`,`id_course`),
  ADD KEY `fk_cocl_cour` (`id_course`);

--
-- Indices de la tabla `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_acronym_doc` (`acronym_doc`),
  ADD UNIQUE KEY `uk_name_doc` (`name`);

--
-- Indices de la tabla `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_code_msg` (`code`);

--
-- Indices de la tabla `mode`
--
ALTER TABLE `mode`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_mode_course` (`modality`,`session_time`,`education_level`);

--
-- Indices de la tabla `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_score_user` (`Activityid`,`Userid`),
  ADD KEY `fk_user_qual` (`Userid`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_type_role` (`type`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_ema_user` (`email`),
  ADD UNIQUE KEY `uk_doc_user` (`num_doc`,`documentid`),
  ADD KEY `fk_user_role` (`Roleid`),
  ADD KEY `fk_docu_user` (`documentid`);

--
-- Indices de la tabla `user_class`
--
ALTER TABLE `user_class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_user_class` (`Userid`,`classid`),
  ADD KEY `fk_uscl_role` (`classid`);

--
-- Indices de la tabla `user_course`
--
ALTER TABLE `user_course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_user_course` (`Userid`,`Courseid`),
  ADD KEY `fk_usco_cour` (`Courseid`);

--
-- Indices de la tabla `user_message`
--
ALTER TABLE `user_message`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_user_message` (`Userid`,`messageid`),
  ADD KEY `fk_mess_usme` (`messageid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `course_class`
--
ALTER TABLE `course_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mode`
--
ALTER TABLE `mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `user_class`
--
ALTER TABLE `user_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user_course`
--
ALTER TABLE `user_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `user_message`
--
ALTER TABLE `user_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `fk_class_acti` FOREIGN KEY (`classid`) REFERENCES `class` (`id`);

--
-- Filtros para la tabla `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_cour_mode` FOREIGN KEY (`Modeid`) REFERENCES `mode` (`id`);

--
-- Filtros para la tabla `course_class`
--
ALTER TABLE `course_class`
  ADD CONSTRAINT `fk_cocl_cour` FOREIGN KEY (`id_course`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `fk_cour_class` FOREIGN KEY (`id_class`) REFERENCES `class` (`id`);

--
-- Filtros para la tabla `qualification`
--
ALTER TABLE `qualification`
  ADD CONSTRAINT `fk_qual_acti` FOREIGN KEY (`Activityid`) REFERENCES `activity` (`id`),
  ADD CONSTRAINT `fk_user_qual` FOREIGN KEY (`Userid`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_docu_user` FOREIGN KEY (`documentid`) REFERENCES `document` (`id`),
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`Roleid`) REFERENCES `role` (`id`);

--
-- Filtros para la tabla `user_class`
--
ALTER TABLE `user_class`
  ADD CONSTRAINT `fk_uscl_role` FOREIGN KEY (`classid`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `fk_user_uscl` FOREIGN KEY (`Userid`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `user_course`
--
ALTER TABLE `user_course`
  ADD CONSTRAINT `fk_usco_cour` FOREIGN KEY (`Courseid`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `fk_user_usco` FOREIGN KEY (`Userid`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `user_message`
--
ALTER TABLE `user_message`
  ADD CONSTRAINT `fk_mess_usme` FOREIGN KEY (`messageid`) REFERENCES `message` (`id`),
  ADD CONSTRAINT `fk_user_usme` FOREIGN KEY (`Userid`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
