-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 04 2016 г., 00:39
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `oneway`
--

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `key_city` int(11) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `key_country` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`key_city`, `city`, `key_country`) VALUES
(1, 'Лондон', 1),
(2, 'Луисвилл', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `key_country` int(11) NOT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`key_country`, `country`) VALUES
(1, 'Великобритания'),
(2, 'США');

-- --------------------------------------------------------

--
-- Структура таблицы `like_photo`
--

CREATE TABLE IF NOT EXISTS `like_photo` (
  `key_likeP` int(11) NOT NULL,
  `IP` varchar(255) DEFAULT NULL,
  `key_photo` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `like_photo`
--

INSERT INTO `like_photo` (`key_likeP`, `IP`, `key_photo`) VALUES
(19, '37.72.87.181', 2),
(45, '37.72.87.181', 8),
(48, '37.72.87.181', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `key_fio` int(11) NOT NULL,
  `fio` varchar(255) DEFAULT NULL,
  `img_ava` varchar(255) DEFAULT NULL,
  `key_prof` int(11) DEFAULT NULL,
  `dt_birthday` date DEFAULT NULL,
  `small_opisan` varchar(255) DEFAULT NULL,
  `big_opisan` text,
  `key_city` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `people`
--

INSERT INTO `people` (`key_fio`, `fio`, `img_ava`, `key_prof`, `dt_birthday`, `small_opisan`, `big_opisan`, `key_city`) VALUES
(3, 'Emilia Clark', './images/1.jpg', 6, '1989-10-26', 'Британская актриса. Наиболее известна по роли Дейенерис Таргариен в телесериале «Игра престолов» и Сары Коннор в фильме «Терминатор: Генезис».', 'Родилась в Лондоне, детство провела в Беркшире. Отец работал звукорежиссёром в театре, мать занималась бизнесом. Получила театральное образование в Лондонском драматическом центре (англ. Drama Centre London), который закончила в 2009 году.\r\n\r\nВо время обучения сыграла в нескольких спектаклях Центра: драмах Awake and Sing, The Hot L Baltimore, Wild Honey (букв. «Дикий мёд»).', 1),
(4, 'Jennifer Lawrence', './images/2.jpg', 6, '1990-08-15', 'американская актриса. Лауреат премий «Оскар» (2013), BAFTA (2014) и трёхкратный лауреат премии «Золотой глобус» (2013, 2014, 2016)', 'Лоуренс начала актёрскую карьеру в 2006 году, сыграв в телепроекте «Городская компания». Дженнифер получила признание в актёрской среде после роли Тиффани в комедийной драме «Мой парень — псих». Наибольшую популярность актрисе принесла роль Китнисс Эвердин из книжной трилогии «Голодные игры».', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `key_photo` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `key_fio` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`key_photo`, `photo`, `key_fio`) VALUES
(1, './images/slide-1.jpg', 3),
(2, './images/slide-2.jpg', 3),
(3, './images/slide-3.jpg', 3),
(4, './images/slide-4.jpg', 3),
(5, './images/slide-5.jpg', 3),
(6, './images/slide-6.jpg', 4),
(7, './images/slide-7.jpg', 4),
(8, './images/slide-8.jpg', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `profession`
--

CREATE TABLE IF NOT EXISTS `profession` (
  `key_prof` int(11) NOT NULL,
  `prof` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profession`
--

INSERT INTO `profession` (`key_prof`, `prof`) VALUES
(6, 'актриса');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`key_city`), ADD KEY `FK_city_country_key_country` (`key_country`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`key_country`);

--
-- Индексы таблицы `like_photo`
--
ALTER TABLE `like_photo`
  ADD PRIMARY KEY (`key_likeP`), ADD KEY `FK_like_photo_photo_key_photo` (`key_photo`);

--
-- Индексы таблицы `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`key_fio`), ADD KEY `FK_People_profession_key_prof` (`key_prof`), ADD KEY `FK_people_city_key_city` (`key_city`);

--
-- Индексы таблицы `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`key_photo`), ADD KEY `FK_Photo_people_key_fio` (`key_fio`);

--
-- Индексы таблицы `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`key_prof`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `key_city` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `key_country` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `like_photo`
--
ALTER TABLE `like_photo`
  MODIFY `key_likeP` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT для таблицы `people`
--
ALTER TABLE `people`
  MODIFY `key_fio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `key_photo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `profession`
--
ALTER TABLE `profession`
  MODIFY `key_prof` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `city`
--
ALTER TABLE `city`
ADD CONSTRAINT `FK_city_country_key_country` FOREIGN KEY (`key_country`) REFERENCES `country` (`key_country`);

--
-- Ограничения внешнего ключа таблицы `like_photo`
--
ALTER TABLE `like_photo`
ADD CONSTRAINT `FK_like_photo_photo_key_photo` FOREIGN KEY (`key_photo`) REFERENCES `photo` (`key_photo`);

--
-- Ограничения внешнего ключа таблицы `people`
--
ALTER TABLE `people`
ADD CONSTRAINT `FK_people_city_key_city` FOREIGN KEY (`key_city`) REFERENCES `city` (`key_city`),
ADD CONSTRAINT `FK_People_profession_key_prof` FOREIGN KEY (`key_prof`) REFERENCES `profession` (`key_prof`);

--
-- Ограничения внешнего ключа таблицы `photo`
--
ALTER TABLE `photo`
ADD CONSTRAINT `FK_Photo_people_key_fio` FOREIGN KEY (`key_fio`) REFERENCES `people` (`key_fio`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
