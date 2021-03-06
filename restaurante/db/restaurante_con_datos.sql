-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 08, 2019 at 05:11 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurante`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cedula` int(9) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `provincia` varchar(100) NOT NULL,
  `canton` varchar(100) NOT NULL,
  `distrito` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `cedula`, `telefono`, `correo`, `direccion`, `provincia`, `canton`, `distrito`) VALUES
(1, 'Rafael Monroy', 112500420, '88925162', 'drakkaroy@gmail.com', 'barrio la granja', 'sna jose', 'desamparados', 'san rafael arriba'),
(7, 'Jose Miguel', 145032976, '988765423', 'jose@gmail.com', 'San Rafael Arriba, Desamparados, café segura 25 sur, 50 oest', 'Desamparados', 'San José', 'chepe'),
(8, 'Ramon luis', 145679483, '88888888', 'carlosluis@gmail.com', 'por ahi', 'san jose', 'desampa', 'barrio'),
(9, 'carlos ramon gonzales', 123456789, '8002251237', 'charlie@gmail.com', 'Staybridge Hotel, Room 413', 'IN', 'INDIANAPOLIS', 'san sebas'),
(10, 'Luis Diego', 145764356, '99876535', 'diego@gmail.com', 'San Rafael Arriba, Desamparados, café segura 25 sur, 50 oest, Barrio la granja, frente a iglesia cristiana Peniel', 'Desamparados', 'San José', 'test'),
(11, 'Daniel Talavera', 174937457, '76542378', 'tala@gmail.com', 'Staybridge Hotel, Room 413', 'IN', 'INDIANAPOLIS', 'usa'),
(13, 'Juan Diego', 245678635, '66554433', 'juan-diego@gmail.com', 'San Sebastian, San Jose', 'San Jose', 'San Jose', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `facturas`
--

CREATE TABLE `facturas` (
  `consecutivo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `orden` int(11) NOT NULL,
  `subtotal` decimal(9,2) NOT NULL,
  `impuesto` decimal(9,2) NOT NULL,
  `iva` decimal(9,2) NOT NULL,
  `total` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ordenes`
--

CREATE TABLE `ordenes` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `mesa` tinyint(4) NOT NULL,
  `cliente` int(11) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordenes`
--

INSERT INTO `ordenes` (`id`, `fecha`, `hora`, `mesa`, `cliente`, `estado`) VALUES
(1, '2019-07-12', '12:34:00', 34, 8, 'P'),
(3, '2019-07-12', '12:34:00', 12, 10, 'P'),
(5, '2019-07-17', '12:34:00', 6, 13, 'P'),
(6, '2019-07-17', '12:34:00', 6, 13, 'P'),
(7, '2019-07-17', '12:34:00', 6, 13, 'P'),
(8, '2019-07-26', '12:34:00', 21, 1, 'C'),
(9, '2019-07-26', '12:34:00', 21, 1, 'C'),
(10, '2019-07-07', '16:45:00', 1, 1, 'L'),
(11, '2019-07-27', '00:45:00', 2, 11, 'R');

-- --------------------------------------------------------

--
-- Table structure for table `orden_platillos`
--

CREATE TABLE `orden_platillos` (
  `id` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `id_platillo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orden_platillos`
--

INSERT INTO `orden_platillos` (`id`, `id_orden`, `id_platillo`) VALUES
(3, 9, 2),
(4, 10, 1),
(5, 10, 2),
(6, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `platillos`
--

CREATE TABLE `platillos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` decimal(7,2) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `presentacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `platillos`
--

INSERT INTO `platillos` (`id`, `nombre`, `precio`, `descripcion`, `presentacion`) VALUES
(1, 'camarones al ajillo', '7000.00', 'camarones al ajillo con ensalada y papas', 'excelente'),
(2, 'camarones empanizado', '7500.00', 'camarones empanizados con ensalada y papas', 'excelente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`consecutivo`),
  ADD KEY `orden` (`orden`);

--
-- Indexes for table `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente` (`cliente`);

--
-- Indexes for table `orden_platillos`
--
ALTER TABLE `orden_platillos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_orden` (`id_orden`),
  ADD KEY `id_platillo` (`id_platillo`);

--
-- Indexes for table `platillos`
--
ALTER TABLE `platillos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `facturas`
--
ALTER TABLE `facturas`
  MODIFY `consecutivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orden_platillos`
--
ALTER TABLE `orden_platillos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `platillos`
--
ALTER TABLE `platillos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `orden` FOREIGN KEY (`orden`) REFERENCES `ordenes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `cliente` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orden_platillos`
--
ALTER TABLE `orden_platillos`
  ADD CONSTRAINT `id_orden` FOREIGN KEY (`id_orden`) REFERENCES `ordenes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_platillo` FOREIGN KEY (`id_platillo`) REFERENCES `platillos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
