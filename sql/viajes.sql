-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2026 a las 10:35:00
-- Versión del servidor: 12.0.2-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `viajes_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `id_viaje` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `destacado` tinyint(1) NOT NULL,
  `tipo_de_viaje` varchar(100) NOT NULL,
  `plazas` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`id_viaje`, `titulo`, `descripcion`, `fecha_inicio`, `fecha_fin`, `precio`, `destacado`, `tipo_de_viaje`, `plazas`, `imagen`) VALUES
(1, 'Escapada a Granada', 'Viaje cultural por Granada con visita a la Alhambra, Albaicín y tapas típicas.', '2026-04-10', '2026-04-14', 395.00, 1, 'Cultural', 25, 'granada.jpg'),
(2, 'Ruta por la Costa de Cádiz', 'Disfruta de playas, pueblos blancos y gastronomía andaluza.', '2026-06-01', '2026-06-07', 650.00, 1, 'Playa', 30, 'cadiz.jpg'),
(3, 'Fin de semana rural en la Alpujarra', 'Desconexión total en plena naturaleza con rutas de senderismo.', '2026-03-21', '2026-03-23', 180.00, 0, 'Rural', 15, 'alpujarra.jpg'),
(4, 'Aventura en Sierra Nevada', 'Viaje de aventura con esquí y actividades de montaña.', '2026-01-15', '2026-01-19', 520.00, 0, 'Aventura', 20, 'sierranevada.jpg'),
(5, 'Sevilla monumental', 'Recorrido histórico por Sevilla: Catedral, Giralda y Real Alcázar.', '2026-05-05', '2026-05-08', 310.00, 1, 'Cultural', 28, 'sevilla.jpg'),
(6, 'El corazón de ella', 'Un viaje extremo a paisajes helados y silenciosos, donde el frío cala hasta los huesos y el hielo parece guardar secretos imposibles de romper. Una experiencia tan bella como implacable.', '2026-12-01', '2026-12-10', 4890.00, 1, 'Expedición polar', 8, 'corazon_de_ella.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`id_viaje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
