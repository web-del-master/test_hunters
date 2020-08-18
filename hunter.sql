-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 18 2020 г., 15:38
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hunter`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `vk_id_user` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `vk_id_user`, `first_name`, `last_name`) VALUES
(1, 53636214, 'Иван', 'Рудской'),
(2, 347084466, 'Ваня', 'Холдик'),
(3, 238615607, 'Иван', 'Охлобыстин'),
(4, 9063356, 'Иван', 'Алексеев'),
(5, 174069236, 'Иван', 'Трофимов'),
(6, 442547471, 'Иван', 'Дрёмин'),
(7, 421758015, 'Иван', 'Калиниченко'),
(8, 540887228, 'Ваня', 'Иванов'),
(9, 1894461, 'Иван', 'Мулин'),
(10, 83195655, 'Иван', 'Жвакин'),
(11, 23106580, 'Иван', 'Засидкевич'),
(12, 4687911, 'Иван', 'Дубровский'),
(13, 38232403, 'Иван', 'Дорн'),
(14, 13713806, 'Ваня', 'Бизаро'),
(15, 62820, 'Ivan', 'Spell'),
(16, 323936036, 'Иван', 'Янишевский'),
(17, 5328513, 'Иван', 'Чебанов'),
(18, 18696798, 'Иван', 'Дёмкин'),
(19, 246291240, 'Иван', 'Авличев'),
(20, 177914889, 'Иван', 'Жерновков');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
