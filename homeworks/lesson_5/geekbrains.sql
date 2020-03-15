-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 15 2020 г., 19:54
-- Версия сервера: 10.2.22-MariaDB
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `geekbrains`
--

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `small_path` varchar(255) NOT NULL,
  `small_size` int(11) NOT NULL,
  `big_path` varchar(255) NOT NULL,
  `big_size` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `small_path`, `small_size`, `big_path`, `big_size`, `views`) VALUES
(1, '1.jpg', '/upload/images/small/', 4022, '/upload/images/big/', 75924, 7),
(2, '2.jpg', '/upload/images/small/', 3086, '/upload/images/big/', 52610, 0),
(3, '3.jpg', '/upload/images/small/', 2831, '/upload/images/big/', 49269, 0),
(4, '4.jpg', '/upload/images/small/', 2898, '/upload/images/big/', 42512, 0),
(5, '5.jpg', '/upload/images/small/', 5259, '/upload/images/big/', 113195, 0),
(6, '6.jpg', '/upload/images/small/', 3765, '/upload/images/big/', 65109, 0),
(7, '7.jpg', '/upload/images/small/', 3804, '/upload/images/big/', 70070, 0),
(8, '8.jpg', '/upload/images/small/', 4391, '/upload/images/big/', 74605, 0),
(9, '9.jpg', '/upload/images/small/', 3615, '/upload/images/big/', 65324, 0),
(10, '10.jpg', '/upload/images/small/', 4029, '/upload/images/big/', 68430, 0),
(11, '11.jpg', '/upload/images/small/', 3724, '/upload/images/big/', 71089, 1),
(12, '12.jpg', '/upload/images/small/', 5870, '/upload/images/big/', 93760, 0),
(13, '13.jpg', '/upload/images/small/', 4896, '/upload/images/big/', 74348, 1),
(14, '14.jpg', '/upload/images/small/', 4891, '/upload/images/big/', 106018, 0),
(15, '15.jpg', '/upload/images/small/', 4131, '/upload/images/big/', 89168, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
