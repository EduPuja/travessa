-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-02-2022 a las 18:50:17
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `btravessa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aposta`
--

CREATE TABLE `aposta` (
  `resultat` int(11) DEFAULT -1,
  `dinersApostats` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equip`
--

CREATE TABLE `equip` (
  `id_Equip` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadors`
--

CREATE TABLE `jugadors` (
  `id_Jugador` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `dorcal` varchar(50) NOT NULL,
  `id_Equip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partit`
--

CREATE TABLE `partit` (
  `Id_partit` int(11) NOT NULL,
  `id_EquipLocal` int(11) NOT NULL,
  `id_EquipVisitant` int(11) NOT NULL,
  `res_Local` int(11) NOT NULL,
  `res_Visitant` int(11) NOT NULL,
  `benefici` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari`
--

CREATE TABLE `usuari` (
  `email` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `cognom` varchar(50) NOT NULL,
  `contrassenya` varchar(20) NOT NULL,
  `adreca` varchar(50) NOT NULL,
  `cartera` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuari`
--

INSERT INTO `usuari` (`email`, `nom`, `cognom`, `contrassenya`, `adreca`, `cartera`) VALUES
('carmebello@gmail.com', 'Carme', 'Bello', '$2y$10$1ccFd3K4em6p5', 'Palmos', NULL),
('descobar@inspalamos.cat', 'Daniel', 'Escobar', '$2y$10$ZUMLWSUTdb/Lj', 'Vallo', NULL),
('edpufa@inspalamos.cat', 'Edu', 'Pujadas', '$2y$10$Rl/AlsyabCbY6', 'Pals', NULL),
('xevimolina@gmail.com', 'Xevi', 'Molina', '$2y$10$hnwmq1u7WdJGE', 'Calonje', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equip`
--
ALTER TABLE `equip`
  ADD PRIMARY KEY (`id_Equip`);

--
-- Indices de la tabla `jugadors`
--
ALTER TABLE `jugadors`
  ADD PRIMARY KEY (`id_Jugador`);

--
-- Indices de la tabla `partit`
--
ALTER TABLE `partit`
  ADD PRIMARY KEY (`Id_partit`);

--
-- Indices de la tabla `usuari`
--
ALTER TABLE `usuari`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equip`
--
ALTER TABLE `equip`
  MODIFY `id_Equip` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jugadors`
--
ALTER TABLE `jugadors`
  MODIFY `id_Jugador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partit`
--
ALTER TABLE `partit`
  MODIFY `Id_partit` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
