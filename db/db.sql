-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2024 a las 21:33:24
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto-final-tercero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `ID_Alumno` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellido` varchar(255) NOT NULL,
  `Curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`ID_Alumno`, `Nombre`, `Apellido`, `Curso`) VALUES
(1, 'Maximiliano', 'Alcaraz', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `ID_Asistencia` int(11) NOT NULL,
  `Alumno` int(11) NOT NULL,
  `Presente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`ID_Asistencia`, `Alumno`, `Presente`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `ID_Carrera` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Institución` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`ID_Carrera`, `Nombre`, `Institución`) VALUES
(1, 'Analista Funcional en Sistemas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `ID_Curso` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `División` varchar(3) DEFAULT NULL,
  `Carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`ID_Curso`, `Nombre`, `División`, `Carrera`) VALUES
(1, '3', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exámenes`
--

CREATE TABLE `exámenes` (
  `ID_Examen` int(11) NOT NULL,
  `Número` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Profesores_Materias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `exámenes`
--

INSERT INTO `exámenes` (`ID_Examen`, `Número`, `Fecha`, `Profesores_Materias`) VALUES
(1, 1, '2024-08-31', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

CREATE TABLE `instituciones` (
  `ID_Instituciones` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `instituciones`
--

INSERT INTO `instituciones` (`ID_Instituciones`, `Nombre`) VALUES
(1, 'San Pablo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material-academico`
--

CREATE TABLE `material-academico` (
  `ID_Material` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `material-academico`
--

INSERT INTO `material-academico` (`ID_Material`, `Nombre`, `Materia`) VALUES
(1, 'BD7.pdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `ID_Materia` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`ID_Materia`, `Nombre`) VALUES
(1, 'Base de datos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `ID_Nota` int(11) NOT NULL,
  `Alumno` int(11) NOT NULL,
  `Examen` int(11) NOT NULL,
  `Nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`ID_Nota`, `Alumno`, `Examen`, `Nota`) VALUES
(1, 1, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `ID_Profesor` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellido` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`ID_Profesor`, `Nombre`, `Apellido`) VALUES
(1, 'Nicolás', 'Rotili');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores-materias`
--

CREATE TABLE `profesores-materias` (
  `ID_Profesores-Materias` int(11) NOT NULL,
  `Materia` int(11) NOT NULL,
  `Profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `profesores-materias`
--

INSERT INTO `profesores-materias` (`ID_Profesores-Materias`, `Materia`, `Profesor`) VALUES
(1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`ID_Alumno`),
  ADD KEY `Curso` (`Curso`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`ID_Asistencia`),
  ADD KEY `Alumno` (`Alumno`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`ID_Carrera`),
  ADD KEY `Institución` (`Institución`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`ID_Curso`),
  ADD KEY `Carrera` (`Carrera`);

--
-- Indices de la tabla `exámenes`
--
ALTER TABLE `exámenes`
  ADD PRIMARY KEY (`ID_Examen`),
  ADD KEY `Profesores_Materias` (`Profesores_Materias`);

--
-- Indices de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  ADD PRIMARY KEY (`ID_Instituciones`);

--
-- Indices de la tabla `material-academico`
--
ALTER TABLE `material-academico`
  ADD PRIMARY KEY (`ID_Material`),
  ADD KEY `Materia` (`Materia`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`ID_Materia`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`ID_Nota`),
  ADD KEY `Alumno` (`Alumno`),
  ADD KEY `Examen` (`Examen`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`ID_Profesor`);

--
-- Indices de la tabla `profesores-materias`
--
ALTER TABLE `profesores-materias`
  ADD PRIMARY KEY (`ID_Profesores-Materias`),
  ADD KEY `Materia` (`Materia`),
  ADD KEY `Profesor` (`Profesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `ID_Alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `ID_Asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `ID_Carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `ID_Curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `exámenes`
--
ALTER TABLE `exámenes`
  MODIFY `ID_Examen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  MODIFY `ID_Instituciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `material-academico`
--
ALTER TABLE `material-academico`
  MODIFY `ID_Material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `ID_Materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `ID_Nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `ID_Profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `profesores-materias`
--
ALTER TABLE `profesores-materias`
  MODIFY `ID_Profesores-Materias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`Curso`) REFERENCES `cursos` (`ID_Curso`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`Alumno`) REFERENCES `alumnos` (`ID_Alumno`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD CONSTRAINT `carreras_ibfk_1` FOREIGN KEY (`Institución`) REFERENCES `instituciones` (`ID_Instituciones`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`Carrera`) REFERENCES `carreras` (`ID_Carrera`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `exámenes`
--
ALTER TABLE `exámenes`
  ADD CONSTRAINT `exámenes_ibfk_1` FOREIGN KEY (`Profesores_Materias`) REFERENCES `profesores-materias` (`ID_Profesores-Materias`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `material-academico`
--
ALTER TABLE `material-academico`
  ADD CONSTRAINT `material-academico_ibfk_1` FOREIGN KEY (`Materia`) REFERENCES `materias` (`ID_Materia`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`Alumno`) REFERENCES `alumnos` (`ID_Alumno`) ON UPDATE CASCADE,
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`Examen`) REFERENCES `exámenes` (`ID_Examen`);

--
-- Filtros para la tabla `profesores-materias`
--
ALTER TABLE `profesores-materias`
  ADD CONSTRAINT `profesores-materias_ibfk_1` FOREIGN KEY (`Materia`) REFERENCES `materias` (`ID_Materia`) ON UPDATE CASCADE,
  ADD CONSTRAINT `profesores-materias_ibfk_2` FOREIGN KEY (`Profesor`) REFERENCES `profesores` (`ID_Profesor`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
