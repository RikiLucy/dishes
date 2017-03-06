-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 06 2017 г., 21:15
-- Версия сервера: 5.7.13
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dishes`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dish`
--

CREATE TABLE IF NOT EXISTS `dish` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` text,
  `ingredient` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT 'no_image.png'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dish`
--

INSERT INTO `dish` (`id`, `title`, `desc`, `ingredient`, `img`) VALUES
(4, 'Вода с сыром, рисом и сахаром', '', '1', 'no_image.png'),
(5, 'Лук с сыром и солью', '', '1', 'no_image.png'),
(6, 'Лук с водой, сыром, рисом и сахаром', '', '1', 'no_image.png'),
(9, 'Соль с сахаром', '', '1', 'no_image.png'),
(13, 'Лук с сыром и сахаром', '', '1', 'no_image.png'),
(14, 'Лук с сыром и солью 2', '', '1', 'no_image.png');

-- --------------------------------------------------------

--
-- Структура таблицы `ingredient`
--

CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` text,
  `img` varchar(255) DEFAULT 'no_image.png',
  `status` char(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ingredient`
--

INSERT INTO `ingredient` (`id`, `title`, `desc`, `img`, `status`) VALUES
(1, 'Лук', '', 'no_image.png', '1'),
(2, 'Вода', '', 'no_image.png', '1'),
(3, 'Сыр', '', 'no_image.png', '1'),
(4, 'Соль', '', 'no_image.png', '1'),
(5, 'Рис', '', 'no_image.png', '1'),
(6, 'Сахар', '', 'no_image.png', '1'),
(7, 'Неизвестный номер 1', 'ингредиент без блюд', 'no_image.png', '1'),
(10, 'Неизвестный номер 2', '', 'no_image.png', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `ingredient_dish`
--

CREATE TABLE IF NOT EXISTS `ingredient_dish` (
  `id` int(11) NOT NULL,
  `ingredient_id` varchar(255) DEFAULT NULL,
  `dish_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ingredient_dish`
--

INSERT INTO `ingredient_dish` (`id`, `ingredient_id`, `dish_id`) VALUES
(7, '2', '7'),
(23, '2', '8'),
(24, '3', '8'),
(52, '1', '10'),
(53, '2', '10'),
(54, '1', '11'),
(55, '2', '11'),
(56, '3', '11'),
(57, '4', '11'),
(61, '1', '12'),
(62, '2', '12'),
(63, '3', '12'),
(81, '1', '5'),
(82, '3', '5'),
(83, '4', '5'),
(97, '4', '9'),
(98, '6', '9'),
(121, '1', '6'),
(122, '2', '6'),
(123, '3', '6'),
(124, '5', '6'),
(125, '6', '6'),
(132, '8', '15'),
(155, '2', '4'),
(156, '3', '4'),
(157, '5', '4'),
(158, '6', '4'),
(159, '1', '13'),
(160, '3', '13'),
(161, '6', '13'),
(166, '1', '14'),
(167, '3', '14'),
(168, '4', '14');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1488634819),
('m170304_130024_create_ingredient_table', 1488717043),
('m170304_130133_create_dish_table', 1488717043),
('m170304_132703_create_prepared_dish_table', 1488717043);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ingredient_dish`
--
ALTER TABLE `ingredient_dish`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `ingredient_dish`
--
ALTER TABLE `ingredient_dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=169;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
