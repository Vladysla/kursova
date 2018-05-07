-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 07 2018 г., 15:27
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc_table`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `patronomic` varchar(20) NOT NULL,
  `grade` text NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `genre_id` text,
  `image_title` varchar(255) NOT NULL,
  `image_main` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `actors`
--

INSERT INTO `actors` (`id`, `first_name`, `last_name`, `patronomic`, `grade`, `birth_date`, `genre_id`, `image_title`, `image_main`) VALUES
(1, 'Олег', 'Табаков', 'Павлович', 'Советский актёр и режиссёр театра и кино, педагог. Народный артист СССР (1988)', '17/08/1935', '2,4,6,9', 'Tabakov_Oleg_Pavlovich.jpg', ''),
(2, 'Сергей', 'Безруков', 'Витальевич', 'Российский актёр театра и кино, режиссёр, сценарист. Народный артист Российской Федерации.', '18/10/1973', '2,3,4,8,9,10', 'Bezrukov.jpg', ''),
(3, 'Мария', 'Аронова', 'Валерьевна', ' Российская актриса театра и кино, Народная артистка Российской Федерации (2012).', '18/04/1972', '3,7,8', 'Aronova.jpeg', ''),
(4, 'Влад', 'Понич', 'Вячеславович', 'Народный артист', '11/11/1998', '3,4', 'Розклад.png', NULL),
(13, 'Vladysla', 'фыв', 'фыв', 'фывфв', '11/11/1998', NULL, 'no-avatar.png', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `actor_ganer`
--

CREATE TABLE `actor_ganer` (
  `actor_id` int(11) NOT NULL,
  `ganer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `actor_ganer`
--

INSERT INTO `actor_ganer` (`actor_id`, `ganer_id`) VALUES
(1, 2),
(1, 4),
(1, 6),
(1, 9),
(3, 3),
(3, 7),
(3, 8),
(13, 3),
(13, 4),
(2, 3),
(2, 4),
(2, 8),
(2, 9),
(2, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `actor_impresario`
--

CREATE TABLE `actor_impresario` (
  `actor_id` int(11) NOT NULL,
  `impresario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `actor_impresario`
--

INSERT INTO `actor_impresario` (`actor_id`, `impresario_id`) VALUES
(13, 3),
(13, 4),
(13, 5),
(2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `cinema`
--

CREATE TABLE `cinema` (
  `id` int(11) NOT NULL,
  `name_cinema` varchar(255) NOT NULL,
  `capacity` int(4) NOT NULL,
  `screen_size` float NOT NULL,
  `number_of_halls` int(2) NOT NULL,
  `support_3d` tinyint(1) NOT NULL,
  `title_img` varchar(255) NOT NULL,
  `discription` text NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cinema`
--

INSERT INTO `cinema` (`id`, `name_cinema`, `capacity`, `screen_size`, `number_of_halls`, `support_3d`, `title_img`, `discription`, `location`) VALUES
(1, 'Черновцы', 464, 150, 2, 0, 'cinema_chernivcy.jpg', ' История здания, в котором находится кинотеатр “Черновцы”, берет начало в далеком 1877 году, когда еврейской части населения города передали это сооружение для молитв. Автором архитектуры стал профессор Юлиан Захаревич. В 40-х годах синагогу неоднократно пытались сравнять с землей, однако храм остался стоять, пусть и наполовину разрушенным. Сооружение вернули к жизни в 1959 году, когда выстроив храм обратно, превратили его кинотеатр “Жовтень”. В прошлом синагога и одна из главных достопримечательностей города, в наше время радует зрителей очаровательных Черновцов самым большим залом в городе и демократичными ценами на билеты.', 'г.Черновцы, ул. Университетская, 10');

-- --------------------------------------------------------

--
-- Структура таблицы `concert_events`
--

CREATE TABLE `concert_events` (
  `id` int(11) NOT NULL,
  `name_event` varchar(255) NOT NULL,
  `date_event` datetime NOT NULL,
  `building_id` int(3) NOT NULL,
  `organizator_id` varchar(50) NOT NULL,
  `actors` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `cultural_buildings`
--

CREATE TABLE `cultural_buildings` (
  `id` int(11) NOT NULL,
  `type_of_building` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `capacity` int(4) NOT NULL,
  `screen_size` float DEFAULT NULL,
  `number_of_halls` int(2) NOT NULL DEFAULT '1',
  `support_3d` tinyint(1) DEFAULT NULL,
  `title_img` varchar(255) DEFAULT NULL,
  `discription` text,
  `scena` text,
  `lighting` varchar(255) DEFAULT NULL,
  `sound` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cultural_buildings`
--

INSERT INTO `cultural_buildings` (`id`, `type_of_building`, `name`, `capacity`, `screen_size`, `number_of_halls`, `support_3d`, `title_img`, `discription`, `scena`, `lighting`, `sound`, `location`) VALUES
(1, 'cinema', 'Черновцы', 464, 150, 2, 0, 'cinema_chernivcy.jpg', 'История здания, в котором находится кинотеатр “Черновцы”, берет начало в далеком 1877 году, когда еврейской части населения города передали это сооружение для молитв. Автором архитектуры стал профессор Юлиан Захаревич. В 40-х годах синагогу неоднократно пытались сравнять с землей, однако храм остался стоять, пусть и наполовину разрушенным. Сооружение вернули к жизни в 1959 году, когда выстроив храм обратно, превратили его кинотеатр “Жовтень”. В прошлом синагога и одна из главных достопримечательностей города, в наше время радует зрителей очаровательных Черновцов самым большим залом в городе и демократичными ценами на билеты.', '', '', '', 'г.Черновцы, ул. Университетская, 10');

-- --------------------------------------------------------

--
-- Структура таблицы `ganers`
--

CREATE TABLE `ganers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ganers`
--

INSERT INTO `ganers` (`id`, `name`) VALUES
(1, 'Водевиль'),
(2, 'Драма'),
(3, 'Комедия'),
(4, 'Мелодрама'),
(5, 'Мим'),
(6, 'Мистерия'),
(7, 'Мюзикл'),
(8, 'Пародия'),
(9, 'Трагедия'),
(10, 'Трагикомедия');

-- --------------------------------------------------------

--
-- Структура таблицы `impressario`
--

CREATE TABLE `impressario` (
  `id` int(11) NOT NULL,
  `PIB` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `impressario`
--

INSERT INTO `impressario` (`id`, `PIB`) VALUES
(1, 'Сергей Павлович Дягилев'),
(2, 'Соломон Израилевич Гурков'),
(3, 'Камерон Энтони Макинтош'),
(4, 'Брайан Сэмюэл Эпстайн'),
(5, 'Воскресенский Василий Григорьевич');

-- --------------------------------------------------------

--
-- Структура таблицы `organizators`
--

CREATE TABLE `organizators` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `theater`
--

CREATE TABLE `theater` (
  `id` int(11) NOT NULL,
  `capacity` int(4) NOT NULL,
  `scena` text NOT NULL,
  `lighting` text NOT NULL,
  `sound` text NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `concert_events`
--
ALTER TABLE `concert_events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cultural_buildings`
--
ALTER TABLE `cultural_buildings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ganers`
--
ALTER TABLE `ganers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `impressario`
--
ALTER TABLE `impressario`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `organizators`
--
ALTER TABLE `organizators`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `theater`
--
ALTER TABLE `theater`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `concert_events`
--
ALTER TABLE `concert_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `cultural_buildings`
--
ALTER TABLE `cultural_buildings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `ganers`
--
ALTER TABLE `ganers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `impressario`
--
ALTER TABLE `impressario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `organizators`
--
ALTER TABLE `organizators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `theater`
--
ALTER TABLE `theater`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
