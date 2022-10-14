-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 06-10-2022 a las 10:16:14
-- Versión del servidor: 10.8.2-MariaDB-1:10.8.2+maria~focal
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `databaseWeb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `Id` bigint(20) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Marca` varchar(40) NOT NULL,
  `Color` varchar(40) NOT NULL,
  `Caballos` int(3) NOT NULL,
  `Precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` bigint(20) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Apellidos` varchar(40) NOT NULL,
  `Dni` varchar(10) NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Fecha_Ncto` date NOT NULL,
  `Contraseña` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `coches`
--
ALTER TABLE `coches`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

-- Meter valores a la lista de coches --

INSERT INTO `coches` (Nombre,Marca,Color,Caballos,Precio) VALUES ("Ibiza","Seat","Negro","120","5000");
INSERT INTO `coches` (Nombre,Marca,Color,Caballos,Precio) VALUES ("Golf","Volkswagen","Azul","150","25000.50");
INSERT INTO `coches` (Nombre,Marca,Color,Caballos,Precio) VALUES ("A3","Audi","Rojo","170","10500.99");
INSERT INTO `coches` (Nombre,Marca,Color,Caballos,Precio) VALUES ("Clio","Renault","Blanco","90","4600.95");

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
