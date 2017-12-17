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
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Poll_Option`
--

CREATE TABLE `Poll_Option` (
  `poll_option_id` int(10) UNSIGNED NOT NULL,
  `option` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `Poll_Option_Poll`
--

CREATE TABLE `Poll_Option_Poll` (
  `poll_option_poll_id` int(10) UNSIGNED NOT NULL,
  `poll_id` int(10) UNSIGNED NOT NULL,
  `poll_option_id` int(10) UNSIGNED NOT NULL
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
  `poll_option_id` int(10) UNSIGNED NOT NULL,
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
-- Indices de la tabla `Poll_Option`
--
ALTER TABLE `Poll_Option`
  ADD PRIMARY KEY (`poll_option_id`);

--
-- Indices de la tabla `Poll_Option_Poll`
--
ALTER TABLE `Poll_Option_Poll`
  ADD PRIMARY KEY (`poll_option_poll_id`),
  ADD KEY `poll_option_poll_poll_id_foreign` (`poll_id`),
  ADD KEY `poll_option_poll_poll_option_id_foreign` (`poll_option_id`);

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
  ADD KEY `vote_poll_id_foreign` (`poll_id`),
  ADD KEY `vote_poll_option_id_foreign` (`poll_option_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Poll`
--
ALTER TABLE `Poll`
  MODIFY `poll_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Poll_Option`
--
ALTER TABLE `Poll_Option`
  MODIFY `poll_option_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

S--
-- AUTO_INCREMENT de la tabla `Poll_Option_Poll`
--
ALTER TABLE `Poll_Option_Poll`
  MODIFY `poll_option_poll_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `User_auth_Poll`
--
ALTER TABLE `User_auth_Poll`
  MODIFY `user_auth_poll_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Vote`
--
ALTER TABLE `Vote`
  MODIFY `vote_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3000;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Poll_Option_Poll`
--
ALTER TABLE `Poll_Option_Poll`
  ADD CONSTRAINT `poll_option_poll_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `poll` (`poll_id`),
  ADD CONSTRAINT `poll_option_poll_poll_option_id_foreign` FOREIGN KEY (`poll_option_id`) REFERENCES `poll_option` (`poll_option_id`);

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
  ADD CONSTRAINT `vote_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `poll` (`poll_id`),
  ADD CONSTRAINT `vote_poll_option_id_foreign` FOREIGN KEY (`poll_option_id`) REFERENCES `Poll_Option` (`poll_option_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
