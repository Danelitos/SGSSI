-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 12-11-2022 a las 14:10:32
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
-- Base de datos: `database`
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

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`Id`, `Nombre`, `Marca`, `Color`, `Caballos`, `Precio`) VALUES
(1, 'Ibiza', 'Seat', 'Negro', 120, '5000.00'),
(2, 'Golf', 'Volkswagen', 'Azul', 150, '25000.50'),
(3, 'A3', 'Audi', 'Rojo', 170, '10500.99'),
(4, 'Clio', 'Renault', 'Blanco', 90, '4600.95');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `correoUsuario` varchar(50) NOT NULL,
  `entrada` varchar(30) NOT NULL,
  `fechaHora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `log`
--



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
  `Salt` varchar(100) NOT NULL,
  `Contraseña` varchar(200) NOT NULL,
  `IntentosFallidos` int(11) NOT NULL,
  `Estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombre`, `Apellidos`, `Dni`, `Telefono`, `Email`, `Fecha_Ncto`, `Salt`, `Contraseña`, `IntentosFallidos`, `Estado`) VALUES
(6, 'Adrian', 'Cuadron Cortes', '79136554-V', '612345678', 'adrian@gmail.com', '2002-08-02', '5fff3e02d59afa877696c1e9a24172e8', '656cd6caa7f4587a143d45d4d6b1ada883697b69affab3c6182db5b647f8359c577d9a5facb50dcf92b31855e84f28fc6dc129a80406c61b1413d0dcb8e08b19', 1, 'activo'),
(7, 'SERGIO', 'CORTÉS', '79299377-T', '987654321', 'Sergio@gmail.com', '2000-08-02', 'c33d18139f71454a6e1986596bdff097', '4bb04204207c728ddc1d4ff6b8b2b2de548c594ed95b9786e5646b42c65367ee615032c264dadc01b08f18517c274f8214309fbb1f1af464dd076e08fefcfddb', 1, 'activo'),
(8, 'jose', 'garcia', '79136554-V', '987654321', 'jose@gmail.com', '1990-08-02', 'c12bf41d149630b4aa73e3b9e31d5cb8', '23bffb983730882eddbc6a06644174022d240240034d90555161a5618af964b9a40fe1d312d9ee36afc144fab93c1ae09dc1b493cf52403f5068008f597427b2', 0, 'activo');

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
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
