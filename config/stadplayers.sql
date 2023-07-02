-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-07-2023 a las 03:12:40
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `stadplayers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `continentes`
--

CREATE TABLE `continentes` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `continentes`
--

INSERT INTO `continentes` (`id`, `nombre`) VALUES
(1, 'America'),
(2, 'Africa'),
(3, 'Europa'),
(4, 'Asia'),
(5, 'Oceania');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `copas`
--

CREATE TABLE `copas` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `copas`
--

INSERT INTO `copas` (`id`, `nombre`) VALUES
(1, 'Copa Mundial'),
(2, 'Copa America'),
(3, 'Eurocopa'),
(4, 'Copa Africana de Naciones'),
(5, 'Asian Cup AFC'),
(6, ' Copa Oro de la Concacaf '),
(7, 'Copa Santander Libertadores'),
(8, 'Copa Suramericana'),
(9, 'Liga de Campeones de Europa'),
(10, 'Liga de Campeones de la COCACAF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` bigint UNSIGNED NOT NULL,
  `equipo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `equipo`) VALUES
(1, 'Atletico Nacional'),
(2, 'America'),
(3, 'Santa Fe'),
(4, 'Millonarios'),
(5, 'Real Madrid'),
(6, 'Barcelona'),
(7, 'Manchester City'),
(8, 'Inter De Milan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas`
--

CREATE TABLE `estadisticas` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `predeterminada` int DEFAULT '0',
  `tipo` int NOT NULL COMMENT 'tipo de jugador\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `estadisticas`
--

INSERT INTO `estadisticas` (`id`, `nombre`, `descripcion`, `predeterminada`, `tipo`) VALUES
(1, 'Pases acertados', 'Entrega el balón corrctamente a su compañero', 1, 0),
(2, 'Pases errados', 'No entrega el balón a su compañero', 1, 0),
(3, 'Tiros al arco', 'Remates directos al arco', 1, 0),
(4, 'Asistencias de Gol', 'Ultimo pase antes del gol', 1, 0),
(5, 'Rechazos bien dirigidos', 'Ultimo pase antes del gol', 1, 0),
(6, 'Rechazos mal dirigidos', 'Ultimo pase antes del gol', 1, 0),
(7, 'Perdidas de balon', 'Pierde la posesion del balon', 1, 0),
(8, 'Perdidas de balon perjudiciales', 'perdidas que termina en gol del rival', 1, 0),
(9, 'Minutos Jugados', 'Por partido', 1, 0),
(10, 'Goles Anotados', 'Por partido', 1, 0),
(11, 'Amarillas Recibidas', 'Por partido', 1, 0),
(12, 'Roja Recibida', 'Por partido', 1, 0),
(13, 'Atajada Heroica', 'De remates inminentes a gol', 1, 1),
(14, 'Penales atajados', 'Por partido', 1, 1),
(15, 'exitos en mano a mano', 'enfrentamiento directo con el delantero como ultimo hombre', 1, 1),
(16, 'Gol de chilena', 'Remate en el aire de espaldas al arco', 0, 0),
(18, 'faltas cometidas', 'realizar faltas al oponente', 0, 0),
(19, 'goles de taco', 'hace el gol con el talon y de espaldas a la porteria', 0, 0),
(20, 'jugadas estupidas', 'el jugador hace jugadar pendejas', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas_count`
--

CREATE TABLE `estadisticas_count` (
  `id` bigint UNSIGNED NOT NULL,
  `valor` int DEFAULT '0',
  `id_estadistica` bigint UNSIGNED NOT NULL,
  `id_encuentro_estadistica` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `estadisticas_count`
--

INSERT INTO `estadisticas_count` (`id`, `valor`, `id_estadistica`, `id_encuentro_estadistica`) VALUES
(1, 2, 1, 4),
(2, 5, 2, 4),
(3, 1, 3, 4),
(4, 2, 4, 4),
(5, 1, 5, 4),
(6, 6, 6, 4),
(7, 2, 7, 4),
(8, 5, 8, 4),
(9, 88, 9, 4),
(10, 1, 10, 4),
(11, 0, 11, 4),
(12, 3, 12, 4),
(13, 8, 1, 5),
(14, 5, 2, 5),
(15, 2, 3, 5),
(16, 2, 4, 5),
(17, 1, 5, 5),
(18, 6, 6, 5),
(19, 1, 7, 5),
(20, 3, 8, 5),
(21, 75, 9, 5),
(22, 0, 10, 5),
(23, 1, 11, 5),
(24, 1, 12, 5),
(25, 6, 1, 6),
(26, 2, 2, 6),
(27, 1, 3, 6),
(28, 5, 4, 6),
(29, 5, 5, 6),
(30, 5, 6, 6),
(31, 2, 7, 6),
(32, 1, 8, 6),
(33, 95, 9, 6),
(34, 1, 10, 6),
(35, 0, 11, 6),
(36, 1, 12, 6),
(37, 9, 1, 7),
(38, 3, 2, 7),
(39, 1, 3, 7),
(40, 3, 4, 7),
(41, 4, 5, 7),
(42, 3, 6, 7),
(43, 1, 7, 7),
(44, 5, 8, 7),
(45, 90, 9, 7),
(46, 0, 10, 7),
(47, 0, 11, 7),
(48, 0, 12, 7),
(49, 2, 1, 1),
(50, 6, 2, 1),
(51, 1, 3, 1),
(52, 1, 4, 1),
(53, 5, 5, 1),
(54, 2, 6, 1),
(55, 1, 7, 1),
(56, 2, 8, 1),
(57, 70, 9, 1),
(58, 0, 10, 1),
(59, 0, 11, 1),
(60, 0, 12, 1),
(61, 5, 1, 1),
(62, 2, 2, 8),
(63, 0, 3, 8),
(64, 4, 4, 8),
(65, 3, 5, 8),
(66, 5, 6, 8),
(67, 3, 7, 8),
(68, 1, 8, 8),
(69, 80, 9, 8),
(70, 2, 10, 8),
(71, 1, 11, 8),
(72, 0, 12, 8),
(73, 5, 1, 9),
(74, 3, 2, 9),
(75, 1, 3, 9),
(76, 2, 4, 9),
(77, 4, 5, 9),
(78, 2, 6, 9),
(79, 3, 7, 9),
(80, 4, 8, 9),
(81, 40, 9, 9),
(82, 1, 10, 9),
(83, 0, 11, 9),
(84, 0, 12, 9),
(85, 10, 1, 10),
(86, 8, 2, 10),
(87, 1, 3, 10),
(88, 2, 4, 10),
(89, 4, 5, 10),
(90, 1, 6, 10),
(91, 3, 7, 10),
(92, 3, 8, 10),
(93, 70, 9, 10),
(94, 1, 10, 10),
(95, 1, 11, 10),
(96, 0, 12, 10),
(97, 12, 1, 11),
(98, 8, 2, 11),
(99, 3, 3, 11),
(100, 1, 4, 11),
(101, 3, 5, 11),
(102, 3, 6, 11),
(103, 1, 7, 11),
(104, 8, 8, 11),
(105, 60, 9, 11),
(106, 1, 10, 11),
(107, 0, 11, 11),
(108, 0, 12, 11),
(109, 7, 1, 12),
(110, 2, 2, 12),
(111, 2, 3, 12),
(112, 3, 4, 12),
(113, 6, 5, 12),
(114, 1, 6, 12),
(115, 2, 7, 12),
(116, 3, 8, 12),
(117, 90, 9, 12),
(118, 0, 10, 12),
(119, 0, 11, 12),
(120, 0, 12, 12),
(121, 3, 1, 2),
(122, 4, 2, 2),
(123, 1, 3, 2),
(124, 2, 4, 2),
(125, 4, 5, 2),
(126, 2, 6, 2),
(127, 2, 7, 2),
(128, 3, 8, 2),
(129, 95, 9, 2),
(130, 0, 10, 2),
(131, 1, 11, 2),
(132, 0, 12, 2),
(133, 10, 1, 3),
(134, 8, 2, 3),
(135, 3, 3, 3),
(136, 1, 4, 3),
(137, 4, 5, 3),
(138, 3, 6, 3),
(139, 1, 7, 3),
(140, 2, 8, 3),
(141, 70, 9, 3),
(142, 1, 10, 3),
(143, 0, 11, 3),
(144, 0, 12, 3),
(145, 8, 1, 13),
(146, 13, 2, 13),
(147, 2, 3, 13),
(148, 5, 4, 13),
(149, 6, 5, 13),
(150, 4, 6, 13),
(151, 6, 7, 13),
(152, 2, 8, 13),
(153, 87, 9, 13),
(154, 1, 10, 13),
(155, 0, 11, 13),
(156, 1, 12, 13),
(157, 20, 1, 14),
(158, 10, 2, 14),
(159, 2, 3, 14),
(160, 2, 4, 14),
(161, 4, 5, 14),
(162, 5, 6, 14),
(163, 6, 7, 14),
(164, 3, 8, 14),
(165, 50, 9, 14),
(166, 0, 10, 14),
(167, 0, 11, 14),
(168, 0, 12, 14),
(241, 10, 1, 19),
(242, 3, 2, 19),
(243, 0, 3, 19),
(244, 0, 4, 19),
(245, 5, 5, 19),
(246, 3, 6, 19),
(247, 1, 7, 19),
(248, 1, 8, 19),
(249, 95, 9, 19),
(250, 0, 10, 19),
(251, 0, 11, 19),
(252, 0, 12, 19),
(253, 5, 13, 19),
(254, 1, 14, 19),
(255, 6, 15, 19),
(256, 8, 1, 20),
(257, 2, 2, 20),
(258, 0, 3, 20),
(259, 0, 4, 20),
(260, 3, 5, 20),
(261, 2, 6, 20),
(262, 0, 7, 20),
(263, 0, 8, 20),
(264, 90, 9, 20),
(265, 0, 10, 20),
(266, 1, 11, 20),
(267, 0, 12, 20),
(268, 2, 13, 20),
(269, 2, 14, 20),
(270, 3, 15, 20),
(271, 16, 1, 21),
(272, 11, 2, 21),
(273, 1, 3, 21),
(274, 0, 4, 21),
(275, 5, 5, 21),
(276, 3, 6, 21),
(277, 2, 7, 21),
(278, 1, 8, 21),
(279, 75, 9, 21),
(280, 1, 10, 21),
(281, 2, 11, 21),
(282, 1, 12, 21),
(283, 4, 13, 21),
(284, 1, 14, 21),
(285, 6, 15, 21),
(286, 10, 1, 22),
(287, 8, 2, 22),
(288, 1, 3, 22),
(289, 0, 4, 22),
(290, 5, 5, 22),
(291, 3, 6, 22),
(292, 1, 7, 22),
(293, 1, 8, 22),
(294, 80, 9, 22),
(295, 5, 10, 22),
(296, 0, 11, 22),
(297, 0, 12, 22),
(298, 0, 13, 22),
(299, 0, 14, 22),
(300, 0, 15, 22),
(301, 1, 16, 22),
(303, 10, 1, 22),
(304, 8, 2, 22),
(305, 1, 3, 22),
(306, 0, 4, 22),
(307, 5, 5, 22),
(308, 3, 6, 22),
(309, 1, 7, 22),
(310, 1, 8, 22),
(311, 80, 9, 22),
(312, 5, 10, 22),
(313, 0, 11, 22),
(314, 0, 12, 22),
(315, 0, 13, 22),
(316, 0, 14, 22),
(317, 0, 15, 22),
(318, 1, 16, 22),
(319, 8, 18, 22),
(320, 28, 1, 23),
(321, 18, 2, 23),
(322, 4, 3, 23),
(323, 6, 4, 23),
(324, 8, 5, 23),
(325, 4, 6, 23),
(326, 1, 7, 23),
(327, 1, 8, 23),
(328, 90, 9, 23),
(329, 5, 10, 23),
(330, 1, 11, 23),
(331, 0, 12, 23),
(332, 0, 13, 23),
(333, 0, 14, 23),
(334, 0, 15, 23),
(335, 2, 16, 23),
(336, 3, 18, 23),
(337, 12, 1, 24),
(338, 6, 2, 24),
(339, 1, 3, 24),
(340, 2, 4, 24),
(341, 1, 5, 24),
(342, 2, 6, 24),
(343, 4, 7, 24),
(344, 3, 8, 24),
(345, 70, 9, 24),
(346, 3, 10, 24),
(347, 2, 11, 24),
(348, 1, 12, 24),
(349, 0, 13, 24),
(350, 0, 14, 24),
(351, 0, 15, 24),
(352, 1, 16, 24),
(353, 7, 18, 24),
(354, 2, 1, 25),
(355, 1, 2, 25),
(356, 1, 3, 25),
(357, 2, 4, 25),
(358, 3, 5, 25),
(359, 1, 6, 25),
(360, 1, 7, 25),
(361, 0, 8, 25),
(362, 1, 9, 25),
(363, 1, 10, 25),
(364, 1, 11, 25),
(365, 0, 12, 25),
(366, 0, 16, 25),
(367, 0, 18, 25),
(368, 0, 13, 26),
(369, 0, 14, 26),
(370, 0, 15, 26),
(371, 0, 1, 26),
(372, 0, 2, 26),
(373, 0, 3, 26),
(374, 0, 4, 26),
(375, 0, 5, 26),
(376, 0, 6, 26),
(377, 0, 7, 26),
(378, 0, 8, 26),
(379, 0, 9, 26),
(380, 0, 10, 26),
(381, 0, 11, 26),
(382, 0, 12, 26),
(383, 0, 16, 26),
(384, 0, 18, 26),
(385, 0, 1, 27),
(386, 0, 2, 27),
(387, 0, 3, 27),
(388, 0, 4, 27),
(389, 0, 5, 27),
(390, 0, 6, 27),
(391, 0, 7, 27),
(392, 0, 8, 27),
(393, 0, 9, 27),
(394, 0, 10, 27),
(395, 0, 11, 27),
(396, 0, 12, 27),
(397, 0, 16, 27),
(398, 0, 18, 27),
(399, 11, 1, 28),
(400, 5, 2, 28),
(401, 3, 3, 28),
(402, 2, 4, 28),
(403, 7, 5, 28),
(404, 4, 6, 28),
(405, 4, 7, 28),
(406, 1, 8, 28),
(407, 93, 9, 28),
(408, 1, 10, 28),
(409, 1, 11, 28),
(410, 0, 12, 28),
(411, 0, 16, 28),
(412, 0, 18, 28),
(413, 7, 1, 29),
(414, 3, 2, 29),
(415, 1, 3, 29),
(416, 1, 4, 29),
(417, 11, 5, 29),
(418, 6, 6, 29),
(419, 4, 7, 29),
(420, 1, 8, 29),
(421, 40, 9, 29),
(422, 2, 10, 29),
(423, 0, 11, 29),
(424, 0, 12, 29),
(425, 1, 16, 29),
(426, 4, 18, 29),
(427, 1, 19, 29),
(428, 0, 1, 30),
(429, 0, 2, 30),
(430, 0, 3, 30),
(431, 0, 4, 30),
(432, 0, 5, 30),
(433, 0, 6, 30),
(434, 0, 7, 30),
(435, 0, 8, 30),
(436, 0, 9, 30),
(437, 0, 10, 30),
(438, 0, 11, 30),
(439, 0, 12, 30),
(440, 0, 16, 30),
(441, 0, 18, 30),
(442, 0, 19, 30),
(443, 9, 1, 31),
(444, 8, 2, 31),
(445, 2, 3, 31),
(446, 3, 4, 31),
(447, 5, 5, 31),
(448, 4, 6, 31),
(449, 2, 7, 31),
(450, 3, 8, 31),
(451, 3, 9, 31),
(452, 3, 10, 31),
(453, 2, 11, 31),
(454, 1, 12, 31),
(455, 1, 16, 31),
(456, 5, 18, 31),
(457, 3, 19, 31),
(458, 8, 1, 32),
(459, 3, 2, 32),
(460, 4, 3, 32),
(461, 2, 4, 32),
(462, 2, 5, 32),
(463, 1, 6, 32),
(464, 1, 7, 32),
(465, 0, 8, 32),
(466, 92, 9, 32),
(467, 2, 10, 32),
(468, 1, 11, 32),
(469, 0, 12, 32),
(470, 1, 16, 32),
(471, 3, 18, 32),
(472, 1, 19, 32),
(473, 9, 1, 33),
(474, 3, 2, 33),
(475, 6, 3, 33),
(476, 4, 4, 33),
(477, 4, 5, 33),
(478, 2, 6, 33),
(479, 1, 7, 33),
(480, 1, 8, 33),
(481, 92, 9, 33),
(482, 4, 10, 33),
(483, 2, 11, 33),
(484, 1, 12, 33),
(485, 1, 16, 33),
(486, 7, 18, 33),
(487, 0, 19, 33),
(503, 3, 13, 35),
(504, 1, 14, 35),
(505, 4, 15, 35),
(506, 6, 1, 35),
(507, 1, 2, 35),
(508, 1, 3, 35),
(509, 0, 4, 35),
(510, 4, 5, 35),
(511, 2, 6, 35),
(512, 1, 7, 35),
(513, 1, 8, 35),
(514, 91, 9, 35),
(515, 0, 10, 35),
(516, 1, 11, 35),
(517, 0, 12, 35),
(518, 0, 16, 35),
(519, 0, 18, 35),
(520, 0, 19, 35),
(521, 0, 1, 36),
(522, 0, 2, 36),
(523, 0, 3, 36),
(524, 0, 4, 36),
(525, 0, 5, 36),
(526, 0, 6, 36),
(527, 0, 7, 36),
(528, 0, 8, 36),
(529, 0, 9, 36),
(530, 0, 10, 36),
(531, 0, 11, 36),
(532, 0, 12, 36),
(533, 0, 16, 36),
(534, 0, 18, 36),
(535, 0, 19, 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas_encuentro`
--

CREATE TABLE `estadisticas_encuentro` (
  `id` bigint UNSIGNED NOT NULL,
  `fecha_del_partido` date NOT NULL,
  `numero_partido` bigint NOT NULL,
  `id_tipo_partido` bigint UNSIGNED NOT NULL,
  `id_jugador` bigint UNSIGNED NOT NULL,
  `id_equipo` bigint UNSIGNED NOT NULL,
  `id_usuario` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `estadisticas_encuentro`
--

INSERT INTO `estadisticas_encuentro` (`id`, `fecha_del_partido`, `numero_partido`, `id_tipo_partido`, `id_jugador`, `id_equipo`, `id_usuario`) VALUES
(1, '2017-04-26', 0, 1, 1, 1, 1),
(2, '2018-07-10', 0, 2, 2, 3, 1),
(3, '2023-05-10', 0, 3, 2, 5, 1),
(4, '2023-06-12', 0, 1, 6, 1, 2),
(5, '2023-06-25', 0, 1, 6, 1, 2),
(6, '2023-08-03', 0, 1, 6, 1, 2),
(7, '2023-10-10', 0, 1, 6, 1, 2),
(8, '2022-02-02', 0, 1, 1, 3, 3),
(9, '2022-05-12', 0, 1, 1, 4, 3),
(10, '2022-07-27', 0, 1, 1, 5, 3),
(11, '2022-09-08', 0, 1, 1, 6, 3),
(12, '2023-03-28', 0, 1, 1, 1, 3),
(13, '2021-02-10', 0, 1, 2, 2, 1),
(14, '2021-04-13', 0, 1, 2, 3, 1),
(19, '2021-05-02', 0, 1, 5, 1, 2),
(20, '2022-05-10', 0, 1, 5, 1, 2),
(21, '2023-11-13', 0, 1, 5, 1, 2),
(22, '2022-02-20', 0, 2, 6, 6, 1),
(23, '2022-03-10', 0, 2, 6, 6, 1),
(24, '2023-05-28', 0, 3, 6, 6, 3),
(25, '2023-05-16', 1, 1, 6, 1, 1),
(26, '2023-06-13', 1, 3, 5, 4, 1),
(27, '2012-12-12', 1, 1, 1, 2, 1),
(28, '2023-07-15', 1, 1, 18, 2, 23),
(29, '2023-08-08', 2, 1, 18, 4, 23),
(30, '2022-02-12', 15, 3, 7, 5, 1),
(31, '2010-10-10', 18, 1, 18, 8, 23),
(32, '2020-07-02', 13, 1, 19, 4, 1),
(33, '2019-03-25', 18, 1, 19, 3, 1),
(35, '2022-07-19', 14, 1, 5, 1, 1),
(36, '2010-10-10', 18, 2, 17, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generar_reporte`
--

CREATE TABLE `generar_reporte` (
  `id` bigint UNSIGNED NOT NULL,
  `fecha_inicial` date NOT NULL,
  `fecha_final` date NOT NULL,
  `id_jugador` bigint UNSIGNED NOT NULL,
  `id_usuario` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `generar_reporte`
--

INSERT INTO `generar_reporte` (`id`, `fecha_inicial`, `fecha_final`, `id_jugador`, `id_usuario`) VALUES
(26, '2018-02-22', '2022-12-10', 1, 1),
(28, '2023-06-12', '2023-10-10', 6, 1),
(30, '2023-06-12', '2023-10-10', 6, 1),
(39, '2021-05-02', '2023-11-13', 5, 1),
(40, '2022-03-10', '2023-05-28', 6, 1),
(41, '2016-07-22', '2016-08-23', 1, 1),
(43, '2023-07-15', '2023-08-08', 18, 23),
(44, '0017-02-02', '2023-03-03', 5, 1),
(48, '2010-06-12', '2023-06-14', 1, 1),
(49, '2023-05-29', '2023-06-13', 1, 1),
(50, '2023-06-27', '2023-06-27', 20, 1),
(51, '2023-06-26', '2010-07-11', 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_equipos`
--

CREATE TABLE `historial_equipos` (
  `id` bigint UNSIGNED NOT NULL,
  `fecha_inicial` datetime NOT NULL,
  `fecha_terminacion` datetime NOT NULL,
  `id_equipo` bigint UNSIGNED NOT NULL,
  `id_jugador` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `historial_equipos`
--

INSERT INTO `historial_equipos` (`id`, `fecha_inicial`, `fecha_terminacion`, `id_equipo`, `id_jugador`) VALUES
(6, '2011-02-10 00:00:00', '2012-05-20 00:00:00', 5, 12),
(7, '2021-02-10 00:00:00', '2022-03-30 00:00:00', 7, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre_completo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apodo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `caracteristicas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `id_usuario` bigint UNSIGNED NOT NULL,
  `id_equipo` bigint UNSIGNED NOT NULL,
  `id_liga` bigint UNSIGNED NOT NULL,
  `id_pais` bigint UNSIGNED NOT NULL,
  `id_contiente` bigint UNSIGNED NOT NULL,
  `id_posicion` bigint UNSIGNED NOT NULL,
  `id_perfil` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id`, `nombre_completo`, `apodo`, `fecha_nacimiento`, `caracteristicas`, `id_usuario`, `id_equipo`, `id_liga`, `id_pais`, `id_contiente`, `id_posicion`, `id_perfil`) VALUES
(1, 'Rosito Mañaneiros', 'El 3am', '1999-10-14', NULL, 1, 3, 1, 5, 3, 6, 1),
(2, 'David Hernandez', 'La Cachaza', '1998-08-23', NULL, 2, 4, 1, 3, 1, 5, 1),
(5, 'Kevin Mier', 'La Araña', '2000-02-15', NULL, 1, 1, 1, 4, 1, 1, 1),
(6, 'Dorlan Pavon', 'Memín', '2000-05-22', '', 1, 5, 1, 3, 1, 9, 1),
(7, 'Albert Hass', 'El lentejo', '1999-12-23', NULL, 1, 5, 4, 8, 2, 3, 1),
(8, 'Alan Brito Delgado', 'El Flaco', '2003-05-02', NULL, 3, 3, 2, 4, 1, 5, 2),
(9, 'Guillermo Nigote', 'El Nadies', '2008-07-06', NULL, 3, 7, 5, 8, 4, 9, 2),
(10, 'Elvio Lao', 'El suave', '2005-08-10', NULL, 2, 4, 5, 6, 4, 10, 2),
(12, 'santiago cristancho', 'el cofla', '2004-02-10', 'el puntual', 1, 6, 3, 6, 4, 3, 3),
(13, 'Aquiles Castro Bueno', 'La guillotina', '2002-02-10', 'Rápido y inmisericorde', 21, 7, 2, 6, 5, 6, 1),
(14, 'Guillermo Nigote', 'El titere', '2011-02-10', 'Invisible', 21, 2, 1, 2, 1, 1, 2),
(17, 'Santiago del paso', 'la loca', '2004-06-22', 'loca por naturaleza', 21, 6, 3, 7, 3, 7, 2),
(18, 'Alberth Hass', 'lentejo', '2012-02-10', 'rapado', 23, 5, 3, 6, 3, 11, 2),
(19, 'Alberth Hass', 'lentejo', '2006-06-25', 'rapado', 1, 8, 4, 2, 1, 13, 1),
(20, 'walter Riaño', 'El torombolo', '2010-02-25', 'pendejo por naturaleza', 1, 4, 1, 2, 1, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ligas`
--

CREATE TABLE `ligas` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `ligas`
--

INSERT INTO `ligas` (`id`, `nombre`) VALUES
(1, 'Liga BetPlay'),
(2, 'Premier League'),
(3, 'La Liga'),
(4, 'Serie A'),
(5, 'Ligue 1'),
(6, 'Bundesliga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numero_partido`
--

CREATE TABLE `numero_partido` (
  `id` bigint NOT NULL,
  `num_partido` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `numero_partido`
--

INSERT INTO `numero_partido` (`id`, `num_partido`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 16),
(16, 17),
(17, 18),
(18, 19),
(19, 20),
(20, 21),
(21, 22),
(22, 23),
(23, 24),
(24, 25),
(25, 26),
(26, 27),
(27, 28),
(28, 29),
(29, 30),
(30, 31),
(31, 32),
(32, 33),
(33, 34),
(34, 35),
(35, 36),
(36, 37),
(37, 38),
(38, 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `olvido_password`
--

CREATE TABLE `olvido_password` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `olvido_password`
--

INSERT INTO `olvido_password` (`id`, `email`, `token`) VALUES
(290, 'alejoecheverry33@gmail.com', '3e222481ab92e5484baff0a088df589e64a08df2872bc'),
(291, 'alejoecheverry33@gmail.com', 'c30a820aac4a5aa9e87b747ab27485bf64a08e9cef0eb'),
(292, 'alejoecheverry33@gmail.com', 'a2a1da23bede3485ffd3976bd83a458964a08ed56c5c1'),
(293, 'alejoecheverry33@gmail.com', '4a0ac42548ab2755a3b157c68fdf8f3964a0a249ccce4'),
(294, 'alejoecheverry33@gmail.com', '6223b85ffc6c07350fcca3d673c9f25064a0e6c00503d');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre_pais` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `nombre_pais`) VALUES
(1, 'Argentina'),
(2, 'Colombia'),
(3, 'Brasil'),
(4, 'Alemania'),
(5, 'Francia'),
(6, 'Inglaterra'),
(7, 'Senegal'),
(8, 'Camerun');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `nombre`) VALUES
(1, 'Diestro'),
(2, 'Zurdo'),
(3, 'Ambidiestro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posiciones`
--

CREATE TABLE `posiciones` (
  `id` bigint UNSIGNED NOT NULL,
  `descripcion` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `posiciones`
--

INSERT INTO `posiciones` (`id`, `descripcion`) VALUES
(1, 'Arquero'),
(2, 'Defensa Central Derecho'),
(3, 'Defensa Central Izquierdo'),
(4, 'Defensa Lateral Derecho'),
(5, 'Defensa Lateral Izquierdo'),
(6, 'Volante de Recuperacion'),
(7, 'Volante De Salida'),
(8, 'Volante De Creacion'),
(9, 'Volante Mixto'),
(10, 'Delantero Media Punta'),
(11, 'Delantero Extremo Izquierdo'),
(12, 'Delantero Extremo Derecho'),
(13, 'Delantero Nueve');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_partido`
--

CREATE TABLE `tipo_partido` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_partido`
--

INSERT INTO `tipo_partido` (`id`, `nombre`) VALUES
(1, 'Liga'),
(2, 'Seleccion'),
(3, 'Liertadores'),
(4, 'Recocha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulos_jugador`
--

CREATE TABLE `titulos_jugador` (
  `id` bigint UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `id_equipo` bigint UNSIGNED NOT NULL,
  `id_copa` bigint UNSIGNED NOT NULL,
  `id_jugador` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `titulos_jugador`
--

INSERT INTO `titulos_jugador` (`id`, `fecha`, `id_equipo`, `id_copa`, `id_jugador`) VALUES
(7, '2011-06-20 00:00:00', 4, 7, 12),
(8, '2023-07-20 00:00:00', 1, 5, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint UNSIGNED NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nickname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Email`, `nickname`, `password`) VALUES
(1, 'josecanseco@gmail', 'jose45', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'asher@gmail', 'perritoal100%', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'canela@cansanciogmail.com', 'saltarina123', '8ddcff3a80f4189ca1c9d4d902c3c909'),
(21, 'pepita@gmail.com', 'peputa', 'e10adc3949ba59abbe56e057f20f883e'),
(23, 'alejoecheverry33@gmail.com', 'alejoP19', 'e10adc3949ba59abbe56e057f20f883e'),
(26, 'StadplayersGroup@gmail.com', 'adsi2023', 'b66dc44cd9882859d84670604ae276e6'),
(27, 'lamaszorra@gmail.com', 'ramera2023', '7d0710824ff191f6a0086a7e3891641e'),
(28, 'elcacas@gmail.com', 'petroidiota2023', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `continentes`
--
ALTER TABLE `continentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `copas`
--
ALTER TABLE `copas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadisticas_count`
--
ALTER TABLE `estadisticas_count`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_encuentro_estadistica` (`id_encuentro_estadistica`),
  ADD KEY `id_estadistica` (`id_estadistica`);

--
-- Indices de la tabla `estadisticas_encuentro`
--
ALTER TABLE `estadisticas_encuentro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_partido` (`id_tipo_partido`),
  ADD KEY `id_jugador` (`id_jugador`),
  ADD KEY `id_equipo` (`id_equipo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `generar_reporte`
--
ALTER TABLE `generar_reporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_jugador_id_generar_reporte_id` (`id_jugador`),
  ADD KEY `FK_usuario_id_generar_reporte_id` (`id_usuario`);

--
-- Indices de la tabla `historial_equipos`
--
ALTER TABLE `historial_equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_equipo` (`id_equipo`),
  ADD KEY `id_jugador` (`id_jugador`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_equipo` (`id_equipo`),
  ADD KEY `id_liga` (`id_liga`),
  ADD KEY `id_pais` (`id_pais`),
  ADD KEY `id_contiente` (`id_contiente`),
  ADD KEY `id_posicion` (`id_posicion`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- Indices de la tabla `ligas`
--
ALTER TABLE `ligas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `numero_partido`
--
ALTER TABLE `numero_partido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `olvido_password`
--
ALTER TABLE `olvido_password`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posiciones`
--
ALTER TABLE `posiciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_partido`
--
ALTER TABLE `tipo_partido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `titulos_jugador`
--
ALTER TABLE `titulos_jugador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_equipo` (`id_equipo`),
  ADD KEY `id_copa` (`id_copa`),
  ADD KEY `id_jugador` (`id_jugador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `continentes`
--
ALTER TABLE `continentes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `copas`
--
ALTER TABLE `copas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `estadisticas_count`
--
ALTER TABLE `estadisticas_count`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=536;

--
-- AUTO_INCREMENT de la tabla `estadisticas_encuentro`
--
ALTER TABLE `estadisticas_encuentro`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `generar_reporte`
--
ALTER TABLE `generar_reporte`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `historial_equipos`
--
ALTER TABLE `historial_equipos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `ligas`
--
ALTER TABLE `ligas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `numero_partido`
--
ALTER TABLE `numero_partido`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `olvido_password`
--
ALTER TABLE `olvido_password`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `posiciones`
--
ALTER TABLE `posiciones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tipo_partido`
--
ALTER TABLE `tipo_partido`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `titulos_jugador`
--
ALTER TABLE `titulos_jugador`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estadisticas_count`
--
ALTER TABLE `estadisticas_count`
  ADD CONSTRAINT `FK_encuentro_estad_id_count_estadisticas_id` FOREIGN KEY (`id_encuentro_estadistica`) REFERENCES `estadisticas_encuentro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_estadistica_id_count_estadisticas_id` FOREIGN KEY (`id_estadistica`) REFERENCES `estadisticas` (`id`);

--
-- Filtros para la tabla `estadisticas_encuentro`
--
ALTER TABLE `estadisticas_encuentro`
  ADD CONSTRAINT `FK_equipo_id_encuentro_estadisticas_id` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `FK_id_usuario_encuentro_estadisticas_id` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_jugador_id_encuentro_estadisticas_id` FOREIGN KEY (`id_jugador`) REFERENCES `jugadores` (`id`),
  ADD CONSTRAINT `FK_tipo_partido_id_encuentro_estadisticas_id` FOREIGN KEY (`id_tipo_partido`) REFERENCES `tipo_partido` (`id`);

--
-- Filtros para la tabla `generar_reporte`
--
ALTER TABLE `generar_reporte`
  ADD CONSTRAINT `FK_jugador_id_generar_reporte_id` FOREIGN KEY (`id_jugador`) REFERENCES `jugadores` (`id`),
  ADD CONSTRAINT `FK_usuario_id_generar_reporte_id` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `historial_equipos`
--
ALTER TABLE `historial_equipos`
  ADD CONSTRAINT `FK_equipo_id_historial_equipos_id` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `FK_jugador_id_historial_equipos_id` FOREIGN KEY (`id_jugador`) REFERENCES `jugadores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `FK_continente_jugadores_id` FOREIGN KEY (`id_contiente`) REFERENCES `continentes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_equipo_jugadores_id` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `FK_jugador_usuarios_id` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `FK_liga_jugadores_id` FOREIGN KEY (`id_liga`) REFERENCES `ligas` (`id`),
  ADD CONSTRAINT `FK_pais_jugadores_id` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id`),
  ADD CONSTRAINT `FK_perfil_jugadores_id` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id`),
  ADD CONSTRAINT `FK_posicion_jugadores_id` FOREIGN KEY (`id_posicion`) REFERENCES `posiciones` (`id`);

--
-- Filtros para la tabla `titulos_jugador`
--
ALTER TABLE `titulos_jugador`
  ADD CONSTRAINT `FK_copas_id_titulos_jugador_id` FOREIGN KEY (`id_copa`) REFERENCES `copas` (`id`),
  ADD CONSTRAINT `FK_equipos_id_titulos_jugador_id` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `FK_jugador_id_titulos_jugador_id` FOREIGN KEY (`id_jugador`) REFERENCES `jugadores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
