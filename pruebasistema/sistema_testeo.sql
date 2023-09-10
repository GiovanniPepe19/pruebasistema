-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2023 a las 21:15:34
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
-- Base de datos: `sistema_testeo`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_persona` (`personaid` BIGINT)   BEGIN
		DECLARE existe_persona INT;
		DECLARE id INT;
		SET existe_persona = (SELECT COUNT(*) FROM persona WHERE idpersona = personaid);
		IF existe_persona  > 0 THEN
			delete from persona where idpersona = personaid;
			set id = 1;			
		ELSE
			SET id = 0;
		END IF;
		SELECT id;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_persona` (`nom` VARCHAR(100), `ape` VARCHAR(100), `tel` BIGINT, `emailp` VARCHAR(100))   BEGIN
		declare existe_persona INT;
		DECLARE id INT;
		set existe_persona = (SELECT count(*) from persona where email = emailp);
		if existe_persona  = 0 then
			insert into persona(nombre,apellido,telefono,email) VALUES(nom,ape,tel,emailp);
			SET id = last_insert_id();
		else
			set id = 0;
		end if;
		select id;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `search_persona` (`busqueda` VARCHAR(100))   begin
		select idpersona,nombre,apellido,telefono,email from persona where
		(nombre like concat('%',busqueda,'%') or
		apellido LIKE CONCAT('%',busqueda,'%') or
		telefono LIKE CONCAT('%',busqueda,'%') or
		email LIKE CONCAT('%',busqueda,'%'))
		and
		status != 0;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_persona` (`id` BIGINT)   begin
		SELECT idpersona,nombre,apellido,telefono,email FROM persona WHERE idpersona = id and status != 0;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_personas` ()   begin
		SELECT idpersona,nombre,apellido,telefono,email FROM persona where status != 0 order by idpersona desc;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_persona` (`id` BIGINT, `nom` VARCHAR(100), `ape` VARCHAR(100), `tel` BIGINT, `emailp` VARCHAR(100))   BEGIN
		declare existe_persona INT;
		DECLARE existe_email INT;
		DECLARE idp INT;
		set existe_persona = (SELECT count(*) from persona where idpersona = id);
		if existe_persona  > 0 then
			set existe_email = (SELECT count(*) from persona where email = emailp and idpersona != id);
			if existe_email = 0 then
				update persona set nombre=nom,apellido=ape,telefono=tel,email=emailp where idpersona = id;
				set idp = id;
			else
				set idp = 0;
			end if;
			
		else
			set idp = 0;
		end if;
		select idp;
	END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id` int(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `cedula` int(20) NOT NULL,
  `telefono` int(20) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `antecedentesp` varchar(100) NOT NULL,
  `antecedentesf` varchar(100) NOT NULL,
  `alergia` varchar(100) NOT NULL,
  `tratamiento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `nombre`, `apellido`, `cedula`, `telefono`, `sexo`, `antecedentesp`, `antecedentesf`, `alergia`, `tratamiento`) VALUES
(1, 'prueba', 'prueba', 423423, 42342, 'm', 'no', 'si', '4z', 'masaje, tratamientos tituanio debe venir el 10 de abril nuevamente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `codigo` varchar(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `edad` int(2) NOT NULL,
  `telefono` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `start` date NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `start`, `color`) VALUES
(1, 'modifica 2', '2023-03-01', '#000000'),
(5, '2:15', '2023-03-09', '#000000'),
(7, 'fdfsd', '2023-03-02', '#000000'),
(10, 'modificado 2', '2023-03-03', '#000000'),
(19, 'pm', '2023-03-02', '#051485'),
(30, 'lÃ±lÃ±', '2023-03-03', '#000000'),
(33, 'fd', '2023-03-01', '#000000'),
(35, 'fds', '2023-03-10', '#000000'),
(36, 'fds', '2023-03-26', '#000000'),
(38, '9:00', '2023-03-18', '#000000'),
(39, 'pm', '2023-03-04', '#9b0303'),
(41, '5:30', '2023-03-12', '#000000'),
(42, '4:30', '2023-03-11', '#000000'),
(43, '9:00', '2023-03-29', '#000000'),
(46, '22 de abril', '2023-04-22', '#000000'),
(47, '12 pm', '2023-03-07', '#000000'),
(48, '7:00 cristina', '2023-03-30', '#000000'),
(49, 'car', '2023-03-05', '#000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`usuario`, `password`) VALUES
('pepe', 'pepe'),
('isabella', 'isabella'),
('develoteca', 'sistema'),
('nay', 'nay'),
('prueba', 'prueba'),
('ocho', 'ocho');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `cedula_2` (`cedula`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
