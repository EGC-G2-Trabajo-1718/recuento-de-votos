-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-12-2017 a las 19:41:07
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `api`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2017_12_03_000001_create_poll_table', 1),
('2017_12_03_000002_create_vote_table', 1),
('2017_12_03_000003_create_user_table', 1),
('2017_12_03_000004_create_user_auth_poll_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Poll`
--

CREATE TABLE `Poll` (
  `poll_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `results` text COLLATE utf8_unicode_ci NOT NULL,
  `result` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `begin_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `finish_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `total_voters` int(11) NOT NULL,
  `total_votes` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `options` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `User`
--

CREATE TABLE `User` (
  `auth_token` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `User_auth_Poll`
--

CREATE TABLE `User_auth_Poll` (
  `user_auth_poll_id` int(10) UNSIGNED NOT NULL,
  `auth_token` int(11) NOT NULL,
  `poll_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Vote`
--

CREATE TABLE `Vote` (
  `vote_id` int(10) UNSIGNED NOT NULL,
  `poll_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Poll`
--
ALTER TABLE `Poll`
  ADD PRIMARY KEY (`poll_id`);

--
-- Indices de la tabla `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`auth_token`);

--
-- Indices de la tabla `User_auth_Poll`
--
ALTER TABLE `User_auth_Poll`
  ADD PRIMARY KEY (`user_auth_poll_id`),
  ADD KEY `user_auth_poll_auth_token_foreign` (`auth_token`),
  ADD KEY `user_auth_poll_poll_id_foreign` (`poll_id`);

--
-- Indices de la tabla `Vote`
--
ALTER TABLE `Vote`
  ADD PRIMARY KEY (`vote_id`),
  ADD KEY `vote_poll_id_foreign` (`poll_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Poll`
--
ALTER TABLE `Poll`
  MODIFY `poll_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `User_auth_Poll`
--
ALTER TABLE `User_auth_Poll`
  MODIFY `user_auth_poll_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Vote`
--
ALTER TABLE `Vote`
  MODIFY `vote_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `User_auth_Poll`
--
ALTER TABLE `User_auth_Poll`
  ADD CONSTRAINT `user_auth_poll_auth_token_foreign` FOREIGN KEY (`auth_token`) REFERENCES `user` (`auth_token`),
  ADD CONSTRAINT `user_auth_poll_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `poll` (`poll_id`);

--
-- Filtros para la tabla `Vote`
--
ALTER TABLE `Vote`
  ADD CONSTRAINT `vote_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `poll` (`poll_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
