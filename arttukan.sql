-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2019 a las 23:38:09
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `arttukan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleingresos`
--

CREATE TABLE `detalleingresos` (
  `idDetalleIngreso` int(10) UNSIGNED NOT NULL,
  `idProducto` int(10) UNSIGNED NOT NULL,
  `idIngreso` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalleingresos`
--

INSERT INTO `detalleingresos` (`idDetalleIngreso`, `idProducto`, `idIngreso`, `cantidad`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '2018-12-04 07:13:05', '2018-12-04 07:13:05'),
(2, 1, 2, 3, '2018-12-04 07:14:29', '2018-12-04 07:14:29'),
(3, 1, 2, 3, '2018-12-04 07:14:29', '2018-12-04 07:14:29'),
(4, 1, 3, 3, '2018-12-04 07:15:39', '2018-12-04 07:15:39'),
(5, 1, 3, 3, '2018-12-04 07:15:39', '2018-12-04 07:15:39'),
(6, 1, 4, 10, '2018-12-04 07:19:12', '2018-12-04 07:19:12'),
(7, 6, 5, 10, '2019-02-18 07:41:15', '2019-02-18 07:41:15'),
(8, 1, 6, 10, '2019-02-24 00:33:49', '2019-02-24 00:33:49'),
(9, 9, 7, 10, '2019-02-24 00:40:09', '2019-02-24 00:40:09'),
(10, 1, 8, 1, '2019-03-05 09:32:56', '2019-03-05 09:32:56'),
(11, 1, 9, 1, '2019-03-05 09:41:34', '2019-03-05 09:41:34'),
(12, 1, 10, 7, '2019-03-05 11:01:30', '2019-03-05 11:01:30'),
(13, 1, 10, 2, '2019-03-05 11:01:30', '2019-03-05 11:01:30'),
(14, 8, 10, 3, '2019-03-05 11:01:30', '2019-03-05 11:01:30'),
(15, 7, 11, 3, '2019-03-05 20:12:24', '2019-03-05 20:12:24'),
(16, 1, 12, 2, '2019-03-10 09:02:15', '2019-03-10 09:02:15'),
(17, 5, 12, 3, '2019-03-10 09:02:16', '2019-03-10 09:02:16'),
(18, 7, 13, 2, '2019-03-10 20:49:18', '2019-03-10 20:49:18'),
(19, 1, 14, 2, '2019-03-11 20:22:23', '2019-03-11 20:22:23'),
(20, 3, 15, 1, '2019-03-11 20:28:59', '2019-03-11 20:28:59'),
(21, 9, 16, 5, '2019-03-13 02:35:10', '2019-03-13 02:35:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE `detalleventas` (
  `idDetalleVenta` int(10) UNSIGNED NOT NULL,
  `idVenta` int(10) UNSIGNED NOT NULL,
  `idProducto` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioVenta` decimal(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalleventas`
--

INSERT INTO `detalleventas` (`idDetalleVenta`, `idVenta`, `idProducto`, `cantidad`, `precioVenta`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 3, '10000.00', '2018-12-04 06:20:51', '2018-12-04 06:20:51'),
(2, 2, 5, 1, '10000.00', '2018-12-04 06:22:37', '2018-12-04 06:22:37'),
(3, 3, 7, 1, '10000.00', '2018-12-04 08:04:13', '2018-12-04 08:04:13'),
(4, 4, 7, 1, '10000.00', '2018-12-04 08:13:20', '2018-12-04 08:13:20'),
(5, 5, 7, 1, '10000.00', '2018-12-04 08:14:09', '2018-12-04 08:14:09'),
(6, 6, 1, 1, '10000.00', '2018-12-04 08:14:32', '2018-12-04 08:14:32'),
(7, 7, 1, 1, '10000.00', '2018-12-04 08:15:04', '2018-12-04 08:15:04'),
(8, 8, 1, 1, '10000.00', '2018-12-04 08:15:16', '2018-12-04 08:15:16'),
(9, 9, 5, 1, '10000.00', '2019-02-18 07:39:14', '2019-02-18 07:39:14'),
(10, 9, 3, 1, '10000.00', '2019-02-18 07:39:14', '2019-02-18 07:39:14'),
(11, 10, 7, 1, '10000.00', '2019-02-24 00:50:05', '2019-02-24 00:50:05'),
(12, 10, 5, 1, '10000.00', '2019-02-24 00:50:06', '2019-02-24 00:50:06'),
(13, 11, 1, 1, '10000.00', '2019-02-28 03:19:25', '2019-02-28 03:19:25'),
(14, 11, 4, 1, '10000.00', '2019-02-28 03:19:25', '2019-02-28 03:19:25'),
(15, 12, 1, 1, '10000.00', '2019-03-05 01:13:15', '2019-03-05 01:13:15'),
(16, 12, 3, 1, '10000.00', '2019-03-05 01:13:15', '2019-03-05 01:13:15'),
(17, 13, 1, 1, '10000.00', '2019-03-06 00:01:58', '2019-03-06 00:01:58'),
(18, 13, 6, 1, '10000.00', '2019-03-06 00:01:58', '2019-03-06 00:01:58'),
(19, 13, 6, 1, '10000.00', '2019-03-06 00:01:58', '2019-03-06 00:01:58'),
(20, 14, 1, 1, '10000.00', '2019-03-06 00:02:42', '2019-03-06 00:02:42'),
(21, 15, 1, 1, '10000.00', '2019-03-06 00:05:21', '2019-03-06 00:05:21'),
(22, 16, 1, 1, '10000.00', '2019-03-06 01:24:32', '2019-03-06 01:24:32'),
(23, 17, 1, 1, '10000.00', '2019-03-11 20:29:03', '2019-03-11 20:29:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `idIngreso` int(10) UNSIGNED NOT NULL,
  `fechaHora` date NOT NULL,
  `estado` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`idIngreso`, `fechaHora`, `estado`, `created_at`, `updated_at`) VALUES
(1, '2018-12-03', 'A', '2018-12-04 07:13:05', '2018-12-04 07:13:05'),
(2, '2018-12-03', 'C', '2018-12-04 07:14:29', '2019-02-28 03:29:27'),
(3, '2018-12-03', 'C', '2018-12-04 07:15:39', '2019-02-20 09:44:29'),
(4, '2018-12-03', 'A', '2018-12-04 07:19:11', '2018-12-04 07:19:11'),
(5, '2019-02-17', 'A', '2019-02-18 07:41:15', '2019-02-18 07:41:15'),
(6, '2019-02-23', 'A', '2019-02-24 00:33:48', '2019-02-24 00:33:48'),
(7, '2019-02-23', 'A', '2019-02-24 00:40:09', '2019-02-24 00:40:09'),
(8, '2019-03-04', 'C', '2019-03-05 09:32:56', '2019-03-07 12:22:19'),
(9, '2019-03-04', 'C', '2019-03-05 09:41:34', '2019-03-10 08:30:35'),
(10, '2019-03-05', 'C', '2019-03-05 11:01:30', '2019-03-09 02:50:35'),
(11, '2019-03-05', 'C', '2019-03-05 20:12:24', '2019-03-10 08:53:04'),
(12, '2019-03-09', 'C', '2019-03-10 09:02:15', '2019-03-10 20:49:41'),
(13, '2019-03-10', 'A', '2019-03-10 20:49:17', '2019-03-10 20:49:17'),
(14, '2019-03-11', 'A', '2019-03-11 20:22:23', '2019-03-11 20:22:23'),
(15, '2019-03-11', 'A', '2019-03-11 20:28:59', '2019-03-11 20:28:59'),
(16, '2019-03-12', 'A', '2019-03-13 02:35:10', '2019-03-13 02:35:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_20_065935_tipoProductos', 1),
(4, '2018_10_20_070049_productos', 2),
(5, '2018_10_20_070110_ventas', 2),
(6, '2018_10_20_070143_detalleVentas', 2),
(7, '2018_10_22_064329_ingresos', 2),
(8, '2018_10_22_064354_detalleIngresos', 2),
(9, '2018_10_27_055521_entrust_setup_tables', 2),
(10, '2018_11_01_165623_pedidos', 2),
(11, '2018_11_01_165830_detallePedidos', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(10) UNSIGNED NOT NULL,
  `codigoProducto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombreProducto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `estado` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idTipoProducto` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `codigoProducto`, `nombreProducto`, `imagen`, `stock`, `precio`, `estado`, `idTipoProducto`, `created_at`, `updated_at`) VALUES
(1, 'sm0078', 'camisa supermanss', '1543548424sm.jpg', 10, '10000.00', '2', 1, NULL, NULL),
(2, 'pt001', 'pantiiiewe33', '1543548587pantaloneta1.jpg', 8, '20000.00', '1', 5, NULL, NULL),
(3, 'cm002', 'camisa flash', '1543548766índice.jpg', 10, '20000.00', '2', 3, NULL, NULL),
(4, 'sm2', 'mug verde', '154355092941qEn90YN2L._SY300_QL70_.jpg', 10, '5000.00', '2', 10, NULL, NULL),
(5, 'sm200', 'pantaloneta', '1543552057pantaloneta1.jpg', 10, '20000.00', '2', 10, NULL, NULL),
(6, 'sm200', 'pantaloneta', '1543552096pantaloneta1.jpg', 10, '20000.00', '2', 10, NULL, NULL),
(7, '12mm', 'camisa carlos', '1543889881sm.jpg', 2, '4500.00', '2', 1, NULL, NULL),
(8, '1233', 'camisassrrss', '1549147961smus.jpg', 3, '23455.00', '1', 1, NULL, NULL),
(9, 'm011', 'manilla amarilla', '1550950748índice.jpg', 10, '20000.00', '2', 16, NULL, NULL),
(10, 'cma1', 'camisa', '1551730039bat.jpg', 10, '123399.00', '2', 1, NULL, NULL),
(11, 'Camis1212', 'Camisa Varios', '1552288015varios.jpg', 2, '15000.00', '1', 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproductos`
--

CREATE TABLE `tipoproductos` (
  `idTipoProducto` int(10) UNSIGNED NOT NULL,
  `nombreTipoProducto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcionTipoProducto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipoproductos`
--

INSERT INTO `tipoproductos` (`idTipoProducto`, `nombreTipoProducto`, `descripcionTipoProducto`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'casmisa', 'camisa', 1, '2018-11-30 02:37:53', '2018-11-30 02:37:53'),
(2, 'casmisa', 'camisa', 1, '2018-11-30 02:39:13', '2018-11-30 02:39:13'),
(3, 'Casmisas', 'tipos de camisas', 0, '2018-11-30 02:39:33', '2019-02-20 09:56:49'),
(4, 'mugs', 'difrerntes tipos de mugs', 0, '2018-11-30 06:56:13', '2019-03-11 10:21:57'),
(5, 'mugs', 'difrerntes tipos de mugs', 1, '2018-11-30 06:59:34', '2018-11-30 06:59:34'),
(6, 'mugs', 'difrerntes tipos de mugs', 1, '2018-11-30 06:59:49', '2018-11-30 06:59:49'),
(7, 'mugs', 'difrerntes tipos de mugs', 1, '2018-11-30 07:00:17', '2018-11-30 07:00:17'),
(8, 'mugs', 'difrerntes tipos de mugs', 1, '2018-11-30 07:02:36', '2018-11-30 07:02:36'),
(9, 'mugs', 'difrerntes tipos de mugs', 1, '2018-11-30 07:02:45', '2018-11-30 07:02:45'),
(10, 'mugsdsdsd', 'difrerntes tipos de mugsdsdsddsds', 0, '2018-11-30 07:03:07', '2019-03-13 01:56:38'),
(11, 'mugs', 'difrerntes tipos de mugs', 1, '2018-11-30 07:04:06', '2018-11-30 07:04:06'),
(12, 'mugs', 'difrerntes tipos de camisas', 0, '2018-11-30 07:59:26', '2019-03-11 11:18:49'),
(13, 'mugs', 'difrerntes tipos de mugs', 1, '2018-11-30 07:59:55', '2018-11-30 07:59:55'),
(14, 'mugs', 'difrerntes tipos de mugs', 1, '2018-11-30 08:03:01', '2018-11-30 08:03:01'),
(15, 'Carlos', 'rubio', 0, '2018-11-30 08:03:15', '2019-02-20 09:53:17'),
(16, 'Manillas', 'Diferentes tipos de manillas', 1, '2019-02-24 00:35:35', '2019-02-24 00:35:35'),
(17, 'camisa manga corta', 'Diferentes tipos de camisas manga corta', 1, '2019-03-05 00:55:06', '2019-03-05 00:55:06'),
(18, 'camisa manga corta', 'Diferentes tipos de camisas manga corta', 0, '2019-03-05 00:59:01', '2019-03-11 11:18:57'),
(19, 'camisa manga corta', 'Diferentes tipos de camisas manga corta', 0, '2019-03-05 01:00:49', '2019-03-11 11:19:04'),
(20, 'dato', 'dato1', 0, '2019-03-05 01:01:33', '2019-03-05 01:28:41'),
(21, 'dato', 'dato1', 0, '2019-03-05 01:03:54', '2019-03-05 01:28:49'),
(22, 'monje', 'monje vaya sirva el almuerzo', 0, '2019-03-05 01:08:51', '2019-03-05 01:09:10'),
(23, 'sas', 'adsad', 0, '2019-03-05 01:09:38', '2019-03-05 01:28:32'),
(24, 'Camisa', 'Camisa con diferentes tallas', 1, '2019-03-11 10:21:13', '2019-03-11 10:21:13'),
(25, 'holaeeeeee', 'hola', 0, '2019-03-13 01:57:10', '2019-03-13 01:57:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoDocumento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numDocumento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombres`, `apellidos`, `email`, `tipoDocumento`, `numDocumento`, `direccion`, `telefono`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'CArlos', 'rubio', 'rubiogallegoc@gmai.com', 'CÉDULA DE CIUDADANÍA', '111111', 'cr 21 #25-25', '3157873181', '$2y$10$RcQc5/FLGCoGXPlO3v0JiuWu5cqqvJ/yCuWsi/I0rV9qdnIbH8yCK', NULL, '2018-11-30 01:00:25', '2018-11-30 01:00:25'),
(2, 'carlos', 'rubio', 'rubiogallegoc@gmail.com', 'CÉDULA DE CIUDADANÍA', '1113691790', 'cr 21 #25-25', '44', '$2y$10$nVwYmfRZmEwWNuuqG.pKHuWDIUuAPDwcy2ZiCPquCGguAtvybLXkG', NULL, '2018-12-04 00:28:21', '2018-12-04 00:28:21'),
(3, 'carlos', 'rubio', 'carlos@gmail.com', 'CÉDULA DE CIUDADANÍA', '1234', 'mi casa', '3157873181', '$2y$10$5tBy1oJ4MI0TG6eWqK/7AewwMYrPhH74xhC0FTpQRi/W6zTP4beZm', 'Hi1LO8jLulsY02a8mj9hF9o5FVt9GqdKP3rcFlcT4KUY1m2Mrw59Us87xDRh', '2019-02-20 04:26:39', '2019-02-20 04:26:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVenta` int(10) UNSIGNED NOT NULL,
  `fechaHora` datetime NOT NULL,
  `totalVenta` decimal(11,2) NOT NULL,
  `estado` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idVenta`, `fechaHora`, `totalVenta`, `estado`, `created_at`, `updated_at`) VALUES
(1, '2018-12-03 20:20:51', '70000.00', 'A', '2018-12-04 06:20:51', '2018-12-04 06:20:51'),
(2, '2018-12-03 20:22:37', '70000.00', 'C', '2018-12-04 06:22:37', '2019-02-20 09:34:02'),
(3, '2018-12-03 22:04:13', '30000.00', 'A', '2018-12-04 08:04:13', '2018-12-04 08:04:13'),
(4, '2018-12-03 22:13:20', '30000.00', 'A', '2018-12-04 08:13:20', '2018-12-04 08:13:20'),
(5, '2018-12-03 22:14:09', '30000.00', 'A', '2018-12-04 08:14:09', '2018-12-04 08:14:09'),
(6, '2018-12-03 22:14:31', '90000.00', 'A', '2018-12-04 08:14:31', '2018-12-04 08:14:31'),
(7, '2018-12-03 22:15:04', '30000.00', 'A', '2018-12-04 08:15:04', '2018-12-04 08:15:04'),
(8, '2018-12-03 22:15:16', '30000.00', 'A', '2018-12-04 08:15:16', '2018-12-04 08:15:16'),
(9, '2019-02-17 21:39:13', '110000.00', 'A', '2019-02-18 07:39:14', '2019-02-18 07:39:14'),
(10, '2019-02-23 14:50:05', '160000.00', 'A', '2019-02-24 00:50:05', '2019-02-24 00:50:05'),
(11, '2019-02-27 17:19:25', '40000.00', 'A', '2019-02-28 03:19:25', '2019-02-28 03:19:25'),
(12, '2019-03-04 15:13:15', '40000.00', 'A', '2019-03-05 01:13:15', '2019-03-05 01:13:15'),
(13, '2019-03-05 14:01:58', '50000.00', 'C', '2019-03-06 00:01:58', '2019-03-11 20:56:59'),
(14, '2019-03-05 14:02:42', '10000.00', 'C', '2019-03-06 00:02:42', '2019-03-11 20:56:51'),
(15, '2019-03-05 14:05:21', '10000.00', 'A', '2019-03-06 00:05:21', '2019-03-06 00:05:21'),
(16, '2019-03-05 15:24:31', '10000.00', 'A', '2019-03-06 01:24:31', '2019-03-06 01:24:31'),
(17, '2019-03-11 10:29:03', '10000.00', 'C', '2019-03-11 20:29:03', '2019-03-11 20:56:45');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalleingresos`
--
ALTER TABLE `detalleingresos`
  ADD PRIMARY KEY (`idDetalleIngreso`),
  ADD KEY `detalleingresos_idproducto_foreign` (`idProducto`),
  ADD KEY `detalleingresos_idingreso_foreign` (`idIngreso`);

--
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`idDetalleVenta`),
  ADD KEY `detalleventas_idventa_foreign` (`idVenta`),
  ADD KEY `detalleventas_idproducto_foreign` (`idProducto`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`idIngreso`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `productos_idtipoproducto_foreign` (`idTipoProducto`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `tipoproductos`
--
ALTER TABLE `tipoproductos`
  ADD PRIMARY KEY (`idTipoProducto`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_numdocumento_unique` (`numDocumento`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalleingresos`
--
ALTER TABLE `detalleingresos`
  MODIFY `idDetalleIngreso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `idDetalleVenta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `idIngreso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoproductos`
--
ALTER TABLE `tipoproductos`
  MODIFY `idTipoProducto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleingresos`
--
ALTER TABLE `detalleingresos`
  ADD CONSTRAINT `detalleingresos_idingreso_foreign` FOREIGN KEY (`idIngreso`) REFERENCES `ingresos` (`idIngreso`),
  ADD CONSTRAINT `detalleingresos_idproducto_foreign` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD CONSTRAINT `detalleventas_idproducto_foreign` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`),
  ADD CONSTRAINT `detalleventas_idventa_foreign` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`idVenta`);

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_idtipoproducto_foreign` FOREIGN KEY (`idTipoProducto`) REFERENCES `tipoproductos` (`idTipoProducto`);

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
