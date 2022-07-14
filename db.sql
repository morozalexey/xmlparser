-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 14 2022 г., 14:19
-- Версия сервера: 5.7.29
-- Версия PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `xmlparser`
--

-- --------------------------------------------------------

--
-- Структура таблицы `parsing`
--

CREATE TABLE `parsing` (
  `#` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `mark` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `generation` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `run` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `engine` varchar(255) DEFAULT NULL,
  `transmission` varchar(255) DEFAULT NULL,
  `gear` varchar(255) DEFAULT NULL,
  `generation_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Индексы таблицы `parsing`
--
ALTER TABLE `parsing`
  ADD PRIMARY KEY (`#`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `parsing`
--
ALTER TABLE `parsing`
  MODIFY `#` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
