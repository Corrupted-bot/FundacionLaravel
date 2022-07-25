-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2022 a las 08:21:42
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fundacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `rut` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `giro` varchar(255) NOT NULL,
  `direccion` text NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `dotacion` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `rut`, `email`, `telefono`, `giro`, `direccion`, `cargo`, `dotacion`, `created_at`, `updated_at`) VALUES
(1, 'TEST 2', '20.419.463-7', 'diego.lopez2000@hotmail.com', '992048648', '2500000', 'victoria 98287', 'Programador', '545555', '2022-04-11', '2022-04-11'),
(5, 'TEST 3', '20.419.463-7', 'diego.lopez2000@hotmail.com', '+34992048648', '1222', 'Santiago, 22', 'PROGRAMADOR', '1231231', '2022-04-21', '2022-04-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriz_evaluacion`
--

CREATE TABLE `matriz_evaluacion` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `estacionamiento_revision_1` text DEFAULT NULL,
  `estacionamiento_criterio_1` varchar(255) DEFAULT NULL,
  `estacionamiento_logro_1` varchar(255) DEFAULT NULL,
  `estacionamiento_revision_2` text DEFAULT NULL,
  `estacionamiento_criterio_2` varchar(255) DEFAULT NULL,
  `estacionamiento_logro_2` varchar(255) DEFAULT NULL,
  `estacionamiento_revision_3` text DEFAULT NULL,
  `estacionamiento_criterio_3` varchar(255) DEFAULT NULL,
  `estacionamiento_logro_3` varchar(255) DEFAULT NULL,
  `estacionamiento_revision_4` text DEFAULT NULL,
  `estacionamiento_criterio_4` varchar(255) DEFAULT NULL,
  `estacionamiento_logro_4` varchar(255) DEFAULT NULL,
  `estacionamiento_revision_5` text DEFAULT NULL,
  `estacionamiento_criterio_5` varchar(255) DEFAULT NULL,
  `estacionamiento_logro_5` varchar(255) DEFAULT NULL,
  `estacionamiento_revision_6` text DEFAULT NULL,
  `estacionamiento_criterio_6` varchar(255) DEFAULT NULL,
  `estacionamiento_logro_6` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `ingreso_revision_1` text DEFAULT NULL,
  `ingreso_logro_1` varchar(255) DEFAULT NULL,
  `ingreso_criterio_1` varchar(255) DEFAULT NULL,
  `ingreso_revision_2` text DEFAULT NULL,
  `ingreso_logro_2` varchar(255) DEFAULT NULL,
  `ingreso_criterio_2` varchar(255) DEFAULT NULL,
  `ingreso_revision_3` text DEFAULT NULL,
  `ingreso_logro_3` varchar(255) DEFAULT NULL,
  `ingreso_criterio_3` varchar(255) DEFAULT NULL,
  `ingreso_revision_4` text DEFAULT NULL,
  `ingreso_logro_4` varchar(255) DEFAULT NULL,
  `ingreso_criterio_4` varchar(255) DEFAULT NULL,
  `ingreso_revision_5` text DEFAULT NULL,
  `ingreso_logro_5` varchar(255) DEFAULT NULL,
  `ingreso_criterio_5` varchar(255) DEFAULT NULL,
  `ingreso_revision_6` text DEFAULT NULL,
  `ingreso_logro_6` varchar(255) DEFAULT NULL,
  `ingreso_criterio_6` varchar(255) DEFAULT NULL,
  `ingreso_revision_7` text DEFAULT NULL,
  `ingreso_logro_7` varchar(255) DEFAULT NULL,
  `ingreso_criterio_7` varchar(255) DEFAULT NULL,
  `ingreso_revision_8` text DEFAULT NULL,
  `ingreso_logro_8` varchar(255) DEFAULT NULL,
  `ingreso_criterio_8` varchar(255) DEFAULT NULL,
  `puerta_revision_1` text DEFAULT NULL,
  `puerta_logro_1` varchar(255) DEFAULT NULL,
  `puerta_criterio_1` varchar(255) DEFAULT NULL,
  `puerta_revision_2` text DEFAULT NULL,
  `puerta_logro_2` varchar(255) DEFAULT NULL,
  `puerta_criterio_2` varchar(255) DEFAULT NULL,
  `puerta_revision_3` text DEFAULT NULL,
  `puerta_logro_3` varchar(255) DEFAULT NULL,
  `puerta_criterio_3` varchar(255) DEFAULT NULL,
  `puerta_revision_4` text DEFAULT NULL,
  `puerta_logro_4` varchar(255) DEFAULT NULL,
  `puerta_criterio_4` varchar(255) DEFAULT NULL,
  `puerta_revision_5` text DEFAULT NULL,
  `puerta_logro_5` varchar(255) DEFAULT NULL,
  `puerta_criterio_5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `matriz_evaluacion`
--

INSERT INTO `matriz_evaluacion` (`id`, `id_proyecto`, `estacionamiento_revision_1`, `estacionamiento_criterio_1`, `estacionamiento_logro_1`, `estacionamiento_revision_2`, `estacionamiento_criterio_2`, `estacionamiento_logro_2`, `estacionamiento_revision_3`, `estacionamiento_criterio_3`, `estacionamiento_logro_3`, `estacionamiento_revision_4`, `estacionamiento_criterio_4`, `estacionamiento_logro_4`, `estacionamiento_revision_5`, `estacionamiento_criterio_5`, `estacionamiento_logro_5`, `estacionamiento_revision_6`, `estacionamiento_criterio_6`, `estacionamiento_logro_6`, `created_at`, `updated_at`, `ingreso_revision_1`, `ingreso_logro_1`, `ingreso_criterio_1`, `ingreso_revision_2`, `ingreso_logro_2`, `ingreso_criterio_2`, `ingreso_revision_3`, `ingreso_logro_3`, `ingreso_criterio_3`, `ingreso_revision_4`, `ingreso_logro_4`, `ingreso_criterio_4`, `ingreso_revision_5`, `ingreso_logro_5`, `ingreso_criterio_5`, `ingreso_revision_6`, `ingreso_logro_6`, `ingreso_criterio_6`, `ingreso_revision_7`, `ingreso_logro_7`, `ingreso_criterio_7`, `ingreso_revision_8`, `ingreso_logro_8`, `ingreso_criterio_8`, `puerta_revision_1`, `puerta_logro_1`, `puerta_criterio_1`, `puerta_revision_2`, `puerta_logro_2`, `puerta_criterio_2`, `puerta_revision_3`, `puerta_logro_3`, `puerta_criterio_3`, `puerta_revision_4`, `puerta_logro_4`, `puerta_criterio_4`, `puerta_revision_5`, `puerta_logro_5`, `puerta_criterio_5`) VALUES
(1, 1, 'test', 'cumple', '100', 'test', 'cumple', '18', 'test', 'no_aplica', NULL, 'test', 'cumple', '18', 'test', 'cumple', '100', 'test', 'no_cumple', NULL, '2022-07-25', '2022-07-25', 'test', '81', 'cumple', 'test', NULL, NULL, 'test', NULL, NULL, 'test', NULL, NULL, 'test', NULL, NULL, 'test', NULL, NULL, 'test', NULL, NULL, 'test', NULL, NULL, 'test', '100', 'cumple', 'test', '100', 'cumple', 'test', '100', 'cumple', 'test', '100', 'cumple', 'test', '100', 'cumple'),
(2, 4, 'test', 'cumple', '100', 'test', NULL, NULL, 'teest', NULL, NULL, 'test', NULL, NULL, 'tests', NULL, NULL, 'test', NULL, NULL, '2022-07-25', '2022-07-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 5, 'test', 'cumple', '98', 'test', 'no_cumple', NULL, 'test', 'cumple', '96', 'test', 'no_aplica', NULL, 'test', 'no_aplica', NULL, 'test', 'no_cumple', NULL, '2022-07-25', '2022-07-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_04_07_194912_create_sessions_table', 1),
(7, '2022_04_07_194943_create_sessions_table', 2),
(8, '2022_04_21_023201_create_permission_tables', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `idinformeapt` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `nombre`, `descripcion`, `idEmpresa`, `idinformeapt`, `created_at`, `updated_at`) VALUES
(1, 'Test Proyecto', 'Esto es una descripción test', 1, 0, '2022-04-11', '2022-04-11'),
(3, 'TEST PROYECTO', 'Esto es un test de proyecto.', 5, NULL, '2022-04-21', '2022-04-21'),
(4, 'Proyecto de Prueba', 'Esto es un proyecto para testear la matriz de evaluación', 5, NULL, '2022-07-25', '2022-07-25'),
(5, 'Proyecto de Prueba 2', 'Esto es un test para medir el registro', 1, NULL, '2022-07-25', '2022-07-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'gestor', 'web', '2022-04-21 06:34:35', '2022-04-21 06:34:35'),
(2, 'administrador', 'web', '2022-04-21 06:35:11', '2022-04-21 06:35:11'),
(4, 'empresa', 'web', '2022-04-21 06:39:14', '2022-04-21 06:39:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_empresa`
--

CREATE TABLE `roles_empresa` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles_empresa`
--

INSERT INTO `roles_empresa` (`id`, `email`, `idEmpresa`) VALUES
(1, 'antraxh037@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9RRXmNOu8MWfLkWLlw7scgn5m2AtdtcZQQeIm43k', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.134 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNmdJdWlhUm1GOTNLb1dUd1hJZ29uem93bW5YTGxjUk9rUW85dVlZbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm95ZWN0b3MiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFEwb01pUm5pT3Q1WFM2L3Y5c2hnZXVVTmhFU2o0eGdmYXZwcW5KTFFzZXVyUUMxZTVWblptIjt9', 1658729511);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(3, 'Diego Lopez', 'antraxh037@gmail.com', NULL, '$2y$10$jLqzp0LbVu/KM693ULgzuubGJsV9zi8wxr41heW9.YcAJkCykbNuq', NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-21 07:56:18', '2022-04-21 07:56:18'),
(4, 'Diego Lopez', 'diego.lopez2000@hotmail.com', NULL, '$2y$10$Q0oMiRniOt5XS6/v9shgeuUNhESj4xgfavpqnJLQseurQC1e5VnZm', NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-21 08:14:25', '2022-04-21 08:14:25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `matriz_evaluacion`
--
ALTER TABLE `matriz_evaluacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proyectos_empresa` (`idEmpresa`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `roles_empresa`
--
ALTER TABLE `roles_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `matriz_evaluacion`
--
ALTER TABLE `matriz_evaluacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles_empresa`
--
ALTER TABLE `roles_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `fk_proyectos_empresa` FOREIGN KEY (`idEmpresa`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
