-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 02:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gofi_lezcanoemanuel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripciónGeneral` varchar(255) NOT NULL,
  `procesador` varchar(255) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `placaMadre` varchar(100) NOT NULL,
  `cantidadCanalMemoria` int(5) NOT NULL,
  `almacenamiento` varchar(150) NOT NULL,
  `gráfica` varchar(100) NOT NULL,
  `puertosHdmi` int(5) NOT NULL,
  `puertosHdmiMini` int(5) NOT NULL,
  `puertoUsb2` int(5) NOT NULL,
  `puertoUsb3` int(5) NOT NULL,
  `puertoUsb31` int(5) NOT NULL,
  `puertoUsb31C` int(5) NOT NULL,
  `bluetooth` varchar(20) NOT NULL,
  `wifi` varchar(20) NOT NULL,
  `puertoEthernet` varchar(20) NOT NULL,
  `peso` varchar(20) NOT NULL,
  `ancho` varchar(20) NOT NULL,
  `profundidad` varchar(20) NOT NULL,
  `alto` varchar(20) NOT NULL,
  `tamañoPantalla` varchar(20) NOT NULL,
  `tipoDisplay` varchar(20) NOT NULL,
  `resolución` varchar(20) NOT NULL,
  `touch` varchar(20) NOT NULL,
  `frecuenciaRefresco` varchar(20) NOT NULL,
  `lectoraDvd` varchar(20) NOT NULL,
  `tecladoLuminoso` varchar(20) NOT NULL,
  `padNumérico` varchar(20) NOT NULL,
  `webCam` varchar(20) NOT NULL,
  `stock` int(255) NOT NULL,
  `stockMinimo` int(5) NOT NULL DEFAULT 5,
  `enOferta` int(11) NOT NULL DEFAULT 0,
  `eliminado` int(11) NOT NULL DEFAULT 0,
  `tipoDispositivo` int(11) NOT NULL,
  `precioCompra` decimal(20,2) NOT NULL,
  `precioPC` decimal(54,0) NOT NULL,
  `imagenPC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripciónGeneral`, `procesador`, `ram`, `placaMadre`, `cantidadCanalMemoria`, `almacenamiento`, `gráfica`, `puertosHdmi`, `puertosHdmiMini`, `puertoUsb2`, `puertoUsb3`, `puertoUsb31`, `puertoUsb31C`, `bluetooth`, `wifi`, `puertoEthernet`, `peso`, `ancho`, `profundidad`, `alto`, `tamañoPantalla`, `tipoDisplay`, `resolución`, `touch`, `frecuenciaRefresco`, `lectoraDvd`, `tecladoLuminoso`, `padNumérico`, `webCam`, `stock`, `stockMinimo`, `enOferta`, `eliminado`, `tipoDispositivo`, `precioCompra`, `precioPC`, `imagenPC`) VALUES
(22, 'Intel i5', 'intel i5 8ram 240hdd', 'intel i5', '4gb', 'h310m', 2, '240gb', 'no', 2, 2, 2, 2, 2, 2, 'si', 'si', 'si (1)', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'si', 'si', 'si', 'no', 6, 5, 1, 0, 2, '70000.00', '90000', '1656384596_7d8c0d4649b0cb0c955f.webp'),
(23, 'Intel i3', 'intel i3 8ram 240hdd', 'intel i3', '4gb', 'h310m', 2, '240gb', 'no', 2, 2, 2, 2, 2, 2, 'si', 'si', 'si (1)', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'si', 'si', 'si', 'no', 9, 5, 1, 0, 1, '50000.00', '70000', '1656384678_b1e3e2c89f2ad0bcf16d.webp'),
(24, 'Intel i7', 'intel i7 8ram 240hdd', 'intel i7', '4gb', 'h310m', 2, '240gb', 'no', 2, 2, 2, 2, 2, 2, 'si', 'si', 'si (1)', '12', '23', '2', '31', '13x44', 'ips', '1080x766', 'si', '60ghz', 'si', 'si', 'si', 'no', 9, 5, 1, 0, 2, '90000.00', '120000', '1656384780_131018043a5f3196a26d.webp'),
(25, 'Intel Celeron 8gb', 'Pc Gamer Completa Armada Intel Celeron 8gb Ssd240 Windows 10', 'Intel Celeron G5905 4MB 3.50 GHz Socket 1200', '8Gb ', 'Gigabyte H410M V3 Socket 1200', 2, 'SSD 240Gb ', 'Integrada', 1, 0, 2, 4, 0, 0, 'No', 'No', 'Si', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'No', 'No', 'Si', 'No', 10, 5, 0, 0, 1, '28000.00', '41000', '1657081586_ae64919d4197c561d3da.webp'),
(26, 'AMD Ryzen 3 4350G', 'Pc Armada Gamer Amd Ryzen 3 4350g 8gb Ssd 240 Radeon Rx Vega', 'AMD Ryzen 3 4350G', '8Gb ', 'Gigabyte A320M-S2H Socket Am4', 2, 'SSD 240Gb ', 'Integrada', 1, 0, 2, 4, 0, 0, 'No', 'No', 'Si', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'No', 'No', 'Si', 'No', 11, 5, 0, 0, 1, '45999.00', '59999', '1657102990_e158214fc5dbf2c46fd9.webp'),
(27, 'Notebook HP 15-dw3033dx natural silver 15.6\"', 'Notebook HP 15-dw3033dx natural silver 15.6\", Intel Core i3 1115G4 8GB de RAM 256GB SSD, Intel UHD Graphics Xe G4 48EUs 1920x1080px Windows 10 Home', 'Core i3 1115G4', '8 GB', 'Integrada', 2, '240Gb', 'Intel UHD Graphics Xe G4 48EUs', 1, 0, 2, 3, 0, 0, 'Si', 'Si', 'Si ', '3.86 lb', '14.11 \"', '9.53 \"', '0.78 \"', '15.6 \"', 'IPS', '1920 px x 1080 px', 'No', '60 Ghz', 'No', 'No', 'Si', 'No ', 7, 5, 0, 0, 2, '120999.00', '1499999', '1657167069_bbcc72ee8feb5a5d1e31.webp');

-- --------------------------------------------------------

--
-- Table structure for table `tableconsults`
--

CREATE TABLE `tableconsults` (
  `id_consulta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `email_consulta` varchar(100) NOT NULL,
  `consulta` varchar(255) NOT NULL,
  `fecha_consulta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombreUsu` varchar(100) NOT NULL,
  `apellidoUsu` varchar(100) NOT NULL,
  `passwordUsu` varchar(255) NOT NULL,
  `emailUsu` varchar(100) NOT NULL,
  `eliminado` int(2) NOT NULL DEFAULT 0,
  `perfilUsu` int(3) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombreUsu`, `apellidoUsu`, `passwordUsu`, `emailUsu`, `eliminado`, `perfilUsu`) VALUES
(13, 'Raul', 'leyes', '$2y$10$kK0E32zAToYACArhIWvuy.4QjYJI3Nr05hd3Q8NkDzOftzL.h8nOq', 'raul@gmail.com', 0, 2),
(14, 'sofia', 'leza', '$2y$10$Us0VJNsr52o2pzuNDD9fVuFosPZrpqPZzF8tjmpclL8g42REZ12Ga', 'sofia@gmail.com', 0, 2),
(15, 'man', 'ses', '$2y$10$yLTGSwPRLUYr8y4FaIHg1uCI5nuYZ1uvEVXrBBDr.MG4LspU42ugi', 'man@gmail.com', 0, 2),
(16, 'Emanuel', 'Lezcano', '$2y$10$iVnqMWZbDjpHfaP4aGBy/uaU69VAKtGxASMhooDiYL955mYt3tmY6', 'emanuellezcano999@gmail.com', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `total_venta` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`id_venta`, `fecha_venta`, `usuario_id`, `total_venta`) VALUES
(4, '2022-06-30', 13, 90000.00),
(5, '2022-06-30', 13, 90000.00),
(6, '2022-06-30', 13, 80000.00),
(7, '2022-07-01', 16, 90000.00);

-- --------------------------------------------------------

--
-- Table structure for table `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id_ventaDetalle` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad_ventaDetalle` int(11) NOT NULL,
  `precio_ventaDetalle` double(10,2) NOT NULL,
  `total_ventaDetalle` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id_ventaDetalle`, `venta_id`, `producto_id`, `cantidad_ventaDetalle`, `precio_ventaDetalle`, `total_ventaDetalle`) VALUES
(10, 4, 22, 1, 90000.00, 0.00),
(11, 5, 22, 1, 90000.00, 0.00),
(13, 7, 22, 1, 90000.00, 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipoDispositivo` (`tipoDispositivo`);

--
-- Indexes for table `tableconsults`
--
ALTER TABLE `tableconsults`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfilUsu` (`perfilUsu`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id_ventaDetalle`),
  ADD KEY `venta_id` (`venta_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tableconsults`
--
ALTER TABLE `tableconsults`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id_ventaDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `productos` (`tipoDispositivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tableconsults`
--
ALTER TABLE `tableconsults`
  ADD CONSTRAINT `tableconsults_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD CONSTRAINT `ventas_detalle_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_detalle_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
