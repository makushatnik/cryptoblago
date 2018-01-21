-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 21 2018 г., 18:09
-- Версия сервера: 10.1.16-MariaDB
-- Версия PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blago`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `proposals`
--

CREATE TABLE `proposals` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` smallint(1) DEFAULT '0',
  `verified` tinyint(1) DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sum` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `proposals`
--

INSERT INTO `proposals` (`id`, `user_id`, `status`, `verified`, `title`, `body`, `created_at`, `sum`) VALUES
(1, 1, 1, 1, 'Заявка №1', 'Тестовая заявка', '2018-01-21 09:02:02', 0),
(2, 1, 0, 1, 'Заявка на лечение', 'Лечение пациентки Петровой', '2018-01-21 14:35:48', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verified` tinyint(1) DEFAULT '0',
  `role` smallint(6) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `verified`, `role`, `admin`) VALUES
(1, 'admin', 'admin@example.com', '202cb962ac59075b964b07152d234b70', NULL, '2018-01-21 05:15:52', '2018-01-21 05:15:52', 1, 1, 1),
(2, 'ljudmila', 'ljudmila@yandex.ru', '4c56ff4ce4aaf9573aa5dff913df997a', NULL, '2018-01-21 10:14:11', '2018-01-21 10:14:11', 1, 1, 0),
(3, 'sly_cat', 'sly_cat@gmail.com', 'a0a080f42e6f13b3a2df133f073095dd', NULL, '2018-01-21 10:43:26', '2018-01-21 10:43:26', 1, 2, 0),
(4, 'sergey', 'sergey@yahoo.com', 'c8ffe9a587b126f152ed3d89a146b445', NULL, '2018-01-21 10:46:28', '2018-01-21 10:46:28', 1, 3, 0),
(5, 'alexandra', 'alexandra@example.com', '3def184ad8f4755ff269862ea77393dd', NULL, '2018-01-21 10:48:22', '2018-01-21 10:48:22', 1, 4, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `proposals`
--
ALTER TABLE `proposals`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
