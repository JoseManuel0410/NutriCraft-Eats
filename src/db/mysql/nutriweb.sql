-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2024 a las 19:01:35
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nutriweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `CategoriaID` int(11) NOT NULL,
  `NombreCategoria` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`CategoriaID`, `NombreCategoria`) VALUES
(1, 'CARNES'),
(2, 'PESCADOS'),
(3, 'HUEVOS'),
(4, 'FRUTAS'),
(5, 'FRUTOS SECOS'),
(6, 'VERDURAS/HORTALIZAS'),
(7, 'LEGUMBRES'),
(8, 'CEREALES y DERIVADOS'),
(9, 'GRASAS'),
(10, 'LACTEOS'),
(11, 'QUESOS'),
(12, 'OTROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `fecha_subida` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `ingrediente_id` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Calorias` float DEFAULT NULL,
  `Proteinas` float DEFAULT NULL,
  `Lipidos` float DEFAULT NULL,
  `Hidratos_de_Carbono` float DEFAULT NULL,
  `CategoriaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`ingrediente_id`, `Nombre`, `Calorias`, `Proteinas`, `Lipidos`, `Hidratos_de_Carbono`, `CategoriaID`) VALUES
(1, 'Bistec de ternera', 92, 20.7, 1, 0.5, 1),
(2, 'Buey semi graso', 160, NULL, NULL, NULL, 1),
(3, 'Cabrito', 127, 19.2, 17, 0.7, 1),
(4, 'Cerdo carne magra', 146, 19.9, 6.8, 0, 1),
(5, 'Cerdo carne grasa', 398, 14.5, 37.3, 0, 1),
(6, 'Ciervo', 120, 20.3, 3.7, 0.6, 1),
(7, 'Codorniz', 162, 25, 6.8, 0, 1),
(8, 'Conejo', 120, 21.2, 6.6, 0, 1),
(9, 'Cordero Lechal', 105, 21, 2.4, 0, 1),
(10, 'Cordero (Pierna)', 98, 17.1, 3.3, 0, 1),
(11, 'Faisán', 144, 24.3, 5.2, 0, 1),
(12, 'Hígado de cerdo', 141, 22.8, 4.8, 1.5, 1),
(13, 'Higado de vacuno', 129, 21, 4.4, 0.9, 1),
(14, 'Jabalí', 107, 21, 2, 0.4, 1),
(15, 'Lacón', 361, 19.2, 31.6, 0, 1),
(16, 'Liebre', 126, 22.8, 3.2, 0, 1),
(17, 'Pato', 288, 15.9, 24.9, 0, 1),
(18, 'Pavo pechuga', 134, 22, 4.9, 0.4, 1),
(19, 'Pavo muslo', 186, 20.9, 11.2, 0.4, 1),
(20, 'Perdiz', 120, 25, 1.4, 0.5, 1),
(21, 'Pollo muslo', 130, 19.6, 5.7, 0, 1),
(22, 'Pollo pechuga', 108, 22.4, 2.1, 0, 1),
(23, 'Almeja', 73, 10.2, 2.5, 2.2, 2),
(24, 'Anguila', 264, 11.8, 23.7, 0.1, 2),
(25, 'Arenque', 174, 17.7, 11.5, 0, 2),
(26, 'Atún fresco', 158, 21.5, 8, 0, 2),
(27, 'Bacalao', 122, 29, 0.7, 0, 2),
(28, 'Boquerón', 96, 16.8, 2.6, 1.5, 2),
(29, 'Caballa', 170, 17, 11.1, 0, 2),
(30, 'Calamar', 68, 12.6, 1.7, 0.7, 2),
(31, 'Dorada', 80, 19.8, 1.2, 0, 2),
(32, 'Gallo', 78, 16.2, 0.9, 1.2, 2),
(33, 'Gamba', 65, 13.6, 0.6, 2.9, 2),
(34, 'Langosta', 88, 16.2, 1.9, 1, 2),
(35, 'Lenguado', 82, 16.9, 1.7, 0.8, 2),
(36, 'Lubina', 82, 16.6, 1.5, 0.6, 2),
(37, 'Lucio', 81, 18, 0.6, 0, 2),
(38, 'Mejillones', 66, 11.7, 2.7, 3.4, 2),
(39, 'Merluza', 71, 17, 0.3, 0, 2),
(40, 'Mero', 80, 17.9, 0.7, 0.6, 2),
(41, 'Pez espada', 109, 16.9, 4.2, 1, 2),
(42, 'Pulpo', 57, 10.6, 1, 1.4, 2),
(43, 'Rodaballo', 81, 16.3, 1.3, 1.2, 2),
(44, 'Salmón', 176, 18.4, 12, 0, 2),
(45, 'Salmonete', 123, 15.8, 6.2, 1.1, 2),
(46, 'Sardina', 124, 15, 4.4, 1, 2),
(47, 'Sepia', 73, 14, 1.5, 0.7, 2),
(48, 'Trucha', 96, NULL, NULL, NULL, 2),
(49, 'Huevo entero (100 gr)', 156, 13, 11.1, 0, 3),
(50, 'Huevo entero pequeño (50 gr)', 78, NULL, NULL, NULL, 3),
(51, 'Yema (17 gr)', 55, NULL, NULL, NULL, 3),
(52, 'Clara (33 gr)', 16, NULL, NULL, NULL, 3),
(53, 'Aguacate', 232, 1.9, 23.5, 3.2, 4),
(54, 'Albaricoque', 52, 0.4, 0.1, 12.5, 4),
(55, 'Arandano', 41, 0.6, 0.4, 10.1, 4),
(56, 'Cereza', 48, 0.8, 0.1, 11.7, 4),
(57, 'Ciruela', 36, 0.5, 0.1, 8.9, 4),
(58, 'Frambuesa', 30, 1, 0.6, 5.6, 4),
(59, 'Fresa', 27, 0.9, 0.4, 5.6, 4),
(60, 'Granada', 62, 0.5, 0.1, 15.9, 4),
(61, 'Grosella', 37, 0.9, 0.6, 8.3, 4),
(62, 'Higo fresco', 47, 0.9, 0.2, 11.2, 4),
(63, 'Limón', 14, 0.6, 0, 3.2, 4),
(64, 'Mandarina', 41, 0.7, 0.4, 9.1, 4),
(65, 'Mango', 73, 0.7, 0.4, 16.8, 4),
(66, 'Manzana', 45, 0.2, 0.3, 10.4, 4),
(67, 'Melocotón', 30, 0.8, 0.1, 6.9, 4),
(68, 'Melón', 30, 0.8, 0.2, 7.4, 4),
(69, 'Mora', 35, 1, 0.6, 6.5, 4),
(70, 'Naranja', 53, 1, 0.2, 11.7, 4),
(71, 'Níspero', 28, 0.4, 0.4, 6.1, 4),
(72, 'Piña', 55, 0.5, 0.2, 12.7, 4),
(73, 'Pera', 38, 0.7, 0.1, 2, 4),
(74, 'Plátano', 85, 1.2, 0.3, 19.5, 4),
(75, 'Pomelo', 26, 0.6, 0, 6.2, 4),
(76, 'Sandía', 15, 0.7, 0, 3.7, 4),
(77, 'Uva', 61, 0.5, 0.1, 15.6, 4),
(78, 'Almendra', 499, 16, 51.4, 4, 5),
(79, 'Avellana', 625, 13, 62.9, 1.8, 5),
(80, 'Cacahuete', 452, 20.4, 25.6, 35, 5),
(81, 'Castaña', 349, 4.7, 3, 89, 5),
(82, 'Ciruela pasa', 177, 2.2, 0.5, 43.7, 5),
(83, 'Dátil seco', 256, 2.7, 0.6, 63.1, 5),
(84, 'Higo seco', 270, 3.5, 2.7, 66.6, 5),
(85, 'Nuez', 670, 15.6, 63.3, 11.2, 5),
(86, 'Piñón', 568, 29.6, 47.8, 5, 5),
(87, 'Pistacho', 600, NULL, NULL, NULL, 5),
(88, 'Uva Pasa', 301, 1.9, 0.6, 72, 5),
(89, 'Ajo', 124, 6, 0.1, 26.3, 6),
(90, 'Alcachofa', 17, 1.4, 0.2, 2.3, 6),
(91, 'Apio', 22, 2.3, 0.2, 2.4, 6),
(92, 'Berenjena', 16, 1.1, 0.1, 2.6, 6),
(93, 'Berro', 13.2, 2.4, 0.2, 1.6, 6),
(94, 'Brécol', 31, 3.3, 0.2, 4, 6),
(95, 'Calabacín', 12, 1.3, 0.1, 1.4, 6),
(96, 'Calabaza', 18, 1.1, 0.1, 3.5, 6),
(97, 'Cardo', 10, 0.6, 0.1, 1.7, 6),
(98, 'Cebolla', 24, 1, 0, 5.2, 6),
(99, 'Col lombarda', 20, 1.9, 0.2, 3.4, 6),
(100, 'Coles de Bruselas', 31, 4.2, 0.5, 4.3, 6),
(101, 'Coliflor', 25, 3.2, 0.2, 2.7, 6),
(102, 'Espárrago', 27, 3.6, 0.2, 2.9, 6),
(103, 'Espinaca', 31, 3.4, 0.7, 3, 6),
(104, 'Guisantes frescos', 70, 7, 0.2, 10.6, 6),
(105, 'Haba fresca', 52, 4.1, 0.8, 7.7, 6),
(106, 'Hinojo', 16, 0.5, 0.3, 3.2, 6),
(107, 'Lechuga', 19, 1.8, 0.4, 2.2, 6),
(108, 'Nabo', 16, 1, 0, 3.3, 6),
(109, 'Patata', 80, 2.1, 1, 18, 6),
(110, 'Pepino', 10.4, 0.7, 0.1, 2, 6),
(111, 'Puerro', 26, 2.1, 0.1, 6, 6),
(112, 'Remolacha', 42, 1.5, 0.1, 8.2, 6),
(113, 'Repollo', 19, 2.1, 0.1, 2.5, 6),
(114, 'Seta', 35, 4.6, 0.4, 5.2, 6),
(115, 'Tomate', 16, 1, 0.2, 2.9, 6),
(116, 'Trufa', 30, 6, 0.5, 0.7, 6),
(117, 'Zanahoria', 37, 1, 0.2, 7.8, 6),
(118, 'Alubia (judía seca)', 316, 23, 1.3, 61, 7),
(119, 'Garbanzo', 338, 21.8, 4.9, 54.3, 7),
(120, 'Guisantes secos', 304, 21.7, 2, 53.6, 7),
(121, 'Haba seca', 304, 27, 2.4, 46.5, 7),
(122, 'Lenteja', 325, 25, 2.5, 54, 7),
(123, 'Arroz', 362, 7, 0.6, 87.6, 8),
(124, 'Cebada', 373, 10.4, 1.4, 82.3, 8),
(125, 'Centeno', 350, 9.4, 1, 76, 8),
(126, 'Copos de Maiz', 372, 7.6, 1, 85.2, 8),
(127, 'Harina Integral', 321, 11, 1.9, 69.7, 8),
(128, 'Galleta tipo María', 409, 6.8, 8.1, 82.3, 8),
(129, 'Harina', 345, 11, 0.7, 73.6, 8),
(130, 'Maíz', 363, 9.2, 3.8, 73, 8),
(131, 'Pan Blanco', 270, 8.1, 0.5, 64, 8),
(132, 'Pan Integral', 230, 9, 1, 47.5, 8),
(133, 'Pan Tostado', 420, 11.3, 6, 83, 8),
(134, 'Pasta al huevo', 368, 19, 0.2, 73.4, 8),
(135, 'Pasta de sémola', 336, 13, 0.3, 78.6, 8),
(136, 'Polenta (Harina de Maíz', 358, 8.7, 2.7, 79.8, 8),
(137, 'Sémola', 361, 11.5, 0.5, 77.6, 8),
(138, 'Tapioca', 363, 0.6, 0.2, 86.4, 8),
(139, 'Trigo duro', 361, 13, 2.9, 70.8, 8),
(140, 'Aceite de oliva', 900, 0, 100, 0, 9),
(141, 'Aceite de semillas', 900, 0, 100, 0, 9),
(142, 'Mantequilla', 750, 0.6, 83, 0.3, 9),
(143, 'Manteca de cerdo', 891, 0.3, 82.8, 0.2, 9),
(144, 'Margarina', 747, 0, 99, 0.3, 9),
(145, 'Leche entera', 63, 3.2, 3.7, 4.6, 10),
(146, 'Leche semidesnatada', 49, 3.5, 1.8, 5, 10),
(147, 'Leche desnatada', 33, 3.4, 0.2, 4.7, 10),
(148, 'Yogur entero', 61, 3.3, 3.5, 4, 10),
(149, 'Yogur desnatado', 36, 3.3, 0.9, 4, 10),
(150, 'Yogur con frutas', 89, 2.8, 3.3, 12.6, 10),
(151, 'Nata', 337, 2.3, 35, 3.4, 10),
(152, 'Brie', 263, 17, 21, 1.67, 11),
(153, 'Camembert', 301, 20.5, 25.7, 0.9, 11),
(154, 'Cheddar', 381, 25, 31, 0.5, 11),
(155, 'Edam', 306, 26, 22, 1, 11),
(156, 'Emmental', 404, 28.5, 30.6, 3.6, 11),
(157, 'Gruyère', 393, 29, 30, 1.5, 11),
(158, 'Mahon', 373, 24, 29, 0, 11),
(159, 'Manchego', 395, 25.1, 32.1, 0, 11),
(160, 'Mozzarella', 300, 18, 22, 0, 11),
(161, 'Parmesano', 392, 33, 29, 0, 11),
(162, 'Roncal', 397, 29.3, 32.1, 0, 11),
(163, 'Roquefort', 369, 20, 30, 2, 11),
(164, 'Semicurado', 350, 24.1, 28.5, 0, 11),
(165, 'Tipo Philadelphia', 277, 7, 25, 4, 11),
(166, 'Azúcar', 387, 0, 0, 99.9, 12),
(167, 'Cacao en polvo', 372, 19.6, 21, 10.2, 12),
(168, 'Café (mg)', 5, 0.1, 0, 0, 12),
(169, 'Miel', 286, 0.3, 0, 80, 12),
(170, 'Mostaza', 66, 5, 4.7, 3.6, 12),
(171, 'Vinagre', 21, 0, 0, 0.1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id` int(11) NOT NULL,
  `nombre_receta` varchar(100) DEFAULT NULL,
  `pasos` text DEFAULT NULL,
  `calorias_totales` float DEFAULT NULL,
  `proteinas_totales` float DEFAULT NULL,
  `lipidos_totales` float DEFAULT NULL,
  `hidratos_de_carbono_totales` float DEFAULT NULL,
  `ingredientes` varchar(255) DEFAULT NULL,
  `fecha_subida` timestamp NOT NULL DEFAULT current_timestamp(),
  `ruta1` varchar(255) DEFAULT NULL,
  `ruta2` varchar(255) DEFAULT NULL,
  `ruta3` varchar(255) DEFAULT NULL,
  `usu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nombre` varchar(255) NOT NULL,
  `usu_correo` varchar(255) NOT NULL,
  `usu_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nombre`, `usu_correo`, `usu_password`) VALUES
(6, 'cesar', 'cesar@gmail.com', 'cesar'),
(9, 'dcdcdcdc', 'cwecewee@gmail.com', 'dddd');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`CategoriaID`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`ingrediente_id`),
  ADD KEY `FK_CategoriaID` (`CategoriaID`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_receta` (`usu_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `ingrediente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD CONSTRAINT `FK_CategoriaID` FOREIGN KEY (`CategoriaID`) REFERENCES `categorias` (`CategoriaID`);

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `fk_usuario_receta` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
