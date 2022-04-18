-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-04-2022 a las 16:19:01
-- Versión del servidor: 8.0.28-0ubuntu0.20.04.3
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `resultat` int DEFAULT '-1',
  `dinersApostats` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equip`
--

CREATE TABLE `equip` (
  `id_Equip` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `equip`
--

INSERT INTO `equip` (`id_Equip`, `nom`, `pais`) VALUES
(1, 'G2 Esports', 'Europa'),
(3, 'Ninjas in Pyjamas', 'Europa'),
(4, 'Vodafone Giants', 'Europa'),
(5, 'Team SoloMid', 'Norteamérica'),
(6, 'Cloud9', 'Norteamérica'),
(7, 'KRÜ Esports', 'Sudamérica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadors`
--

CREATE TABLE `jugadors` (
  `id_Jugador` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `dorcal` varchar(50) NOT NULL,
  `id_Equip` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `jugadors`
--

INSERT INTO `jugadors` (`id_Jugador`, `nom`, `dorcal`, `id_Equip`) VALUES
(1, 'NagZet', '1', 7),
(2, 'Mazino', '2', 7),
(3, 'Klaus', '3', 7),
(4, 'delz1k', '4', 7),
(5, 'Keznit', '5', 7),
(6, 'Davidp', '1', 1),
(7, 'ardiis', '2', 1),
(8, 'mixwell', '3', 1),
(9, 'paTiTek', '4', 1),
(10, 'pyth', '5', 1),
(11, 'CREA', '1', 3),
(12, 'Fearoth', '2', 3),
(13, 'HyP', '3', 3),
(14, 'Sayf', '4', 3),
(15, 'luckeRRR', '5', 3),
(16, 'Fit1nho', '1', 4),
(17, 'Yurii', '2', 4),
(18, 'donQ', '3', 4),
(19, 'jonba', '4', 4),
(20, 'HITBOX', '5', 4),
(21, 'Subroza', '1', 5),
(22, 'Wardell', '2', 5),
(23, 'drone', '3', 5),
(24, 'hazed', '4', 5),
(25, 'reltuC', '5', 5),
(26, 'Relyks', '1', 6),
(27, 'TenZ', '2', 6),
(28, 'mitch', '3', 6),
(29, 'shinobi', '4', 6),
(30, 'vice', '5', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partit`
--

CREATE TABLE `partit` (
  `Id_partit` int NOT NULL,
  `id_EquipLocal` int NOT NULL,
  `id_EquipVisitant` int NOT NULL,
  `res_Local` int DEFAULT NULL,
  `res_Visitant` int DEFAULT NULL,
  `benefici` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `partit`
--

INSERT INTO `partit` (`Id_partit`, `id_EquipLocal`, `id_EquipVisitant`, `res_Local`, `res_Visitant`, `benefici`) VALUES
(3, 1, 7, 32, 2, 200),
(4, 4, 3, NULL, NULL, 150),
(5, 6, 5, NULL, NULL, 250);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari`
--

CREATE TABLE `usuari` (
  `isAdmin` tinyint(1) DEFAULT '0',
  `email` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `cognom` varchar(50) NOT NULL,
  `contrassenya` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `adreca` varchar(50) NOT NULL,
  `cartera` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuari`
--

INSERT INTO `usuari` (`isAdmin`, `email`, `nom`, `cognom`, `contrassenya`, `adreca`, `cartera`) VALUES
(1, 'descobar@inspalamos.cat', 'Dani', 'Escobar', '$2y$10$AU3fOX9E.eKWL47kCqjRXOcam9PbSnGcz8Mv3/vFbWUq4ZMzYyh76', 'aaa', NULL),
(1, 'edpufa@inspalamos.cat', 'Edu', 'Pujadas', '$2y$10$mYmVc6jrRhoLK34eV.jGGOoPDfQWPgLu.gKT.ErIgyNBxsHOiC5/K', 'Pals', NULL),
(0, 'fdsa@gmail.com', 'fdsa', 'fdsa', '$2y$10$ZyT22k//a.ZElvrPtPYxCutV2cGi.08ajP1iSfyLwMJfLFt9iHYyy', 'fdsa', NULL),
(0, 'prova@gmail.com', 'prova', 'aa', '$2y$10$TRk/ICyuOaqxvPkuLKh2n.RmFtjCPtfsbr.zu4/OhnpmmtQyv0UXu', 'prova', NULL);

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
  MODIFY `id_Equip` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `jugadors`
--
ALTER TABLE `jugadors`
  MODIFY `id_Jugador` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `partit`
--
ALTER TABLE `partit`
  MODIFY `Id_partit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
