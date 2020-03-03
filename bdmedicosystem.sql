-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2020 a las 19:52:14
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdmedicosystem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblgenero`
--

CREATE TABLE `tblgenero` (
  `idgenero` int(11) NOT NULL,
  `nombre` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblgenero`
--

INSERT INTO `tblgenero` (`idgenero`, `nombre`) VALUES
(1, 'Hombre'),
(2, 'Mujer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblhistorias`
--

CREATE TABLE `tblhistorias` (
  `idhistoria` int(11) NOT NULL,
  `paciente` int(11) NOT NULL,
  `medico` int(11) NOT NULL,
  `observacion` text NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblhistorias`
--

INSERT INTO `tblhistorias` (`idhistoria`, `paciente`, `medico`, `observacion`, `fecha`) VALUES
(3, 123456, 98765, 'Dolor de muela', '2020-03-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmedicos`
--

CREATE TABLE `tblmedicos` (
  `numerodocumento` int(11) NOT NULL,
  `tipodoc` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblmedicos`
--

INSERT INTO `tblmedicos` (`numerodocumento`, `tipodoc`, `nombre`) VALUES
(123, 2, 'Lola'),
(98765, 1, 'Ramiro Perea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpacientes`
--

CREATE TABLE `tblpacientes` (
  `numerodocumento` int(11) NOT NULL,
  `tipodoc` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `genero` int(11) NOT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblpacientes`
--

INSERT INTO `tblpacientes` (`numerodocumento`, `tipodoc`, `nombre`, `apellido`, `genero`, `edad`) VALUES
(98765, 1, 'Juan', 'Lopez', 1, 19),
(123456, 2, 'Juana', 'De Arco', 2, 15),
(10002000, 1, 'Pepe', 'Pepe', 1, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipodocumento`
--

CREATE TABLE `tbltipodocumento` (
  `idtipodoc` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltipodocumento`
--

INSERT INTO `tbltipodocumento` (`idtipodoc`, `nombre`) VALUES
(1, 'Cédula'),
(2, 'Tarjeta de identidad');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblgenero`
--
ALTER TABLE `tblgenero`
  ADD PRIMARY KEY (`idgenero`);

--
-- Indices de la tabla `tblhistorias`
--
ALTER TABLE `tblhistorias`
  ADD PRIMARY KEY (`idhistoria`),
  ADD KEY `paciente` (`paciente`),
  ADD KEY `medico` (`medico`);

--
-- Indices de la tabla `tblmedicos`
--
ALTER TABLE `tblmedicos`
  ADD PRIMARY KEY (`numerodocumento`),
  ADD KEY `tipodoc` (`tipodoc`);

--
-- Indices de la tabla `tblpacientes`
--
ALTER TABLE `tblpacientes`
  ADD PRIMARY KEY (`numerodocumento`),
  ADD KEY `tipodoc` (`tipodoc`),
  ADD KEY `genero` (`genero`);

--
-- Indices de la tabla `tbltipodocumento`
--
ALTER TABLE `tbltipodocumento`
  ADD PRIMARY KEY (`idtipodoc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblgenero`
--
ALTER TABLE `tblgenero`
  MODIFY `idgenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblhistorias`
--
ALTER TABLE `tblhistorias`
  MODIFY `idhistoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbltipodocumento`
--
ALTER TABLE `tbltipodocumento`
  MODIFY `idtipodoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblhistorias`
--
ALTER TABLE `tblhistorias`
  ADD CONSTRAINT `tblhistorias_ibfk_1` FOREIGN KEY (`paciente`) REFERENCES `tblpacientes` (`numerodocumento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tblhistorias_ibfk_2` FOREIGN KEY (`medico`) REFERENCES `tblmedicos` (`numerodocumento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblmedicos`
--
ALTER TABLE `tblmedicos`
  ADD CONSTRAINT `tblmedicos_ibfk_1` FOREIGN KEY (`tipodoc`) REFERENCES `tbltipodocumento` (`idtipodoc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblpacientes`
--
ALTER TABLE `tblpacientes`
  ADD CONSTRAINT `tblpacientes_ibfk_1` FOREIGN KEY (`tipodoc`) REFERENCES `tbltipodocumento` (`idtipodoc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tblpacientes_ibfk_2` FOREIGN KEY (`genero`) REFERENCES `tblgenero` (`idgenero`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
