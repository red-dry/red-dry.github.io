-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 22 2018 г., 17:14
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `space_trip`
--

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `client_login` varchar(20) NOT NULL,
  `client_name` varchar(45) NOT NULL,
  `client_lastname` varchar(45) NOT NULL,
  `client_password` varchar(30) NOT NULL,
  `client_born` date DEFAULT NULL,
  `client_number` int(11) DEFAULT NULL,
  `client_email` varchar(45) NOT NULL,
  `client_orders` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`client_id`, `client_login`, `client_name`, `client_lastname`, `client_password`, `client_born`, `client_number`, `client_email`, `client_orders`) VALUES
(1, 'theo', 'van', 'gogh', '29071890', '1855-05-10', 7507511, 'theo@van.fr', NULL),
(2, 'vincent', 'van', 'gogh', '30031853', '1853-03-30', 7950315, 'vincent@van.nl', NULL),
(3, 'tolouse', 'lautreck', 'anri', 'qwerty', NULL, NULL, 'tulouse@lautreck.fr', NULL),
(5, 'giordano', 'bruno', 'noula', '12345', NULL, NULL, 'giordano@bruno.it', NULL),
(9, 'pablito', 'pablo', 'escobar', 'qwerty', '1953-11-15', 70831705, 'pablito@pablo.bz', NULL),
(10, 'cock', 'asd', 'df', '123', NULL, 123, 'df', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `order_cost` float NOT NULL,
  `tour_name` varchar(45) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`order_id`, `order_date`, `order_time`, `order_cost`, `tour_name`, `client_id`) VALUES
(16, '2018-12-22', '13:41:05', 1, 'fly to mars', 10),
(18, '2018-12-22', '13:42:01', 1.5, 'jupiter trip', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `planet`
--

CREATE TABLE `planet` (
  `planet_id` int(11) NOT NULL,
  `planet_name` varchar(45) NOT NULL,
  `planet_distance_mkm` varchar(45) NOT NULL,
  `planet_radius` tinyint(4) NOT NULL,
  `planet_description` longtext NOT NULL,
  `planet_surname` varchar(20) NOT NULL,
  `planet_fact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `planet`
--

INSERT INTO `planet` (`planet_id`, `planet_name`, `planet_distance_mkm`, `planet_radius`, `planet_description`, `planet_surname`, `planet_fact`) VALUES
(1, 'Mars', '400', 3, '', 'red planet', '50C average temp'),
(2, 'Jupiter', '640', 70, '', 'gas giant', 'biggest planet in solar'),
(3, 'Saturn', '1200', 60, '', 'gas giant', 'circles'),
(4, 'Uran', '2700', 25, '', 'ice giant', 'the coldest planet');

-- --------------------------------------------------------

--
-- Структура таблицы `shattle`
--

CREATE TABLE `shattle` (
  `shattle_id` int(11) NOT NULL,
  `shattle_name` varchar(45) NOT NULL,
  `shattle_capacity` tinyint(4) NOT NULL,
  `shattle_maxdist` int(10) NOT NULL,
  `shuttle_speed` int(11) NOT NULL,
  `shattle_class` varchar(45) NOT NULL,
  `shattle_usd` int(10) NOT NULL,
  `shattle_discription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shattle`
--

INSERT INTO `shattle` (`shattle_id`, `shattle_name`, `shattle_capacity`, `shattle_maxdist`, `shuttle_speed`, `shattle_class`, `shattle_usd`, `shattle_discription`) VALUES
(1, 'Falcon heavy', 5, 500, 30, 'near', 90, ''),
(2, 'Dragon 1', 12, 1700, 50, 'secondary', 700, ''),
(3, 'Appolo 13', 21, 2900, 40, 'further', 1250, '');

-- --------------------------------------------------------

--
-- Структура таблицы `tour`
--

CREATE TABLE `tour` (
  `tour_id` int(11) NOT NULL,
  `tour_name` varchar(45) NOT NULL,
  `planet_name` varchar(45) NOT NULL,
  `shuttle_name` varchar(45) NOT NULL,
  `tour_fly_days` int(11) NOT NULL,
  `tour_days_on_planet` int(11) NOT NULL,
  `tour_age_limit` int(11) DEFAULT NULL,
  `tour_description` text NOT NULL,
  `tour_usd` float NOT NULL,
  `tour_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tour`
--

INSERT INTO `tour` (`tour_id`, `tour_name`, `planet_name`, `shuttle_name`, `tour_fly_days`, `tour_days_on_planet`, `tour_age_limit`, `tour_description`, `tour_usd`, `tour_image`) VALUES
(1, 'fly to mars', 'Mars', 'Falcon heavy', 15, 21, 80, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima cumque impedit fugiat. Consectetur eligendi deleniti vitae eius unde! Ut sapiente atque tempora quia, corrupti eveniet aut reiciendis nemo in minus repudiandae, maiores iusto sunt. Itaque unde excepturi sit explicabo autem soluta nisi culpa tenetur non repellat, similique corporis beatae voluptate expedita amet possimus, velit reiciendis iste optio facilis fuga! Animi, explicabo quos harum quisquam quia nobis accusantium consequatur molestiae veniam?', 1, 'mars.png'),
(2, 'jupiter trip', 'Jupiter', 'Dragon 1', 21, 12, 60, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima cumque impedit fugiat. Consectetur eligendi deleniti vitae eius unde! Ut sapiente atque tempora quia, corrupti eveniet aut reiciendis nemo in minus repudiandae, maiores iusto sunt. Itaque unde excepturi sit explicabo autem soluta nisi culpa tenetur non repellat, similique corporis beatae voluptate expedita amet possimus, velit reiciendis iste optio facilis fuga! Animi, explicabo quos harum quisquam quia nobis accusantium consequatur molestiae veniam?', 1.5, 'jupiter.png'),
(3, 'uran arctic', 'Uran', 'Appolo 13', 62, 15, 57, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima cumque impedit fugiat. Consectetur eligendi deleniti vitae eius unde! Ut sapiente atque tempora quia, corrupti eveniet aut reiciendis nemo in minus repudiandae, maiores iusto sunt. Itaque unde excepturi sit explicabo autem soluta nisi culpa tenetur non repellat, similique corporis beatae voluptate expedita amet possimus, velit reiciendis iste optio facilis fuga! Animi, explicabo quos harum quisquam quia nobis accusantium consequatur molestiae veniam?', 4.5, 'uran.png');

-- --------------------------------------------------------

--
-- Структура таблицы `worker`
--

CREATE TABLE `worker` (
  `worker_id` int(11) NOT NULL,
  `worker_login` varchar(30) NOT NULL,
  `worker_password` varchar(30) NOT NULL,
  `worker_name` varchar(45) NOT NULL,
  `worker_lastname` varchar(45) NOT NULL,
  `worker_born` date NOT NULL,
  `worker_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `worker`
--

INSERT INTO `worker` (`worker_id`, `worker_login`, `worker_password`, `worker_name`, `worker_lastname`, `worker_born`, `worker_number`) VALUES
(1, 'admin', 'qwerty', 'loui', 'bloom', '1984-01-15', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_email_UNIQUE` (`client_email`),
  ADD UNIQUE KEY `client_login` (`client_login`),
  ADD UNIQUE KEY `client_number_UNIQUE` (`client_number`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `tour_name_idx` (`tour_name`),
  ADD KEY `client_id_idx` (`client_id`);

--
-- Индексы таблицы `planet`
--
ALTER TABLE `planet`
  ADD PRIMARY KEY (`planet_id`),
  ADD UNIQUE KEY `planet_name_UNIQUE` (`planet_name`);

--
-- Индексы таблицы `shattle`
--
ALTER TABLE `shattle`
  ADD PRIMARY KEY (`shattle_id`),
  ADD UNIQUE KEY `shattle_name_UNIQUE` (`shattle_name`);

--
-- Индексы таблицы `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tour_id`),
  ADD UNIQUE KEY `tour_name_UNIQUE` (`tour_name`),
  ADD KEY `tour_dislocation_idx` (`planet_name`),
  ADD KEY `tour_shattle_idx` (`shuttle_name`);

--
-- Индексы таблицы `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`worker_id`),
  ADD UNIQUE KEY `worker_number_UNIQUE` (`worker_number`),
  ADD UNIQUE KEY `worker_login` (`worker_login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `planet`
--
ALTER TABLE `planet`
  MODIFY `planet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `shattle`
--
ALTER TABLE `shattle`
  MODIFY `shattle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tour`
--
ALTER TABLE `tour`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `worker`
--
ALTER TABLE `worker`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `client_id` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tour_name` FOREIGN KEY (`tour_name`) REFERENCES `tour` (`tour_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_dislocation` FOREIGN KEY (`planet_name`) REFERENCES `planet` (`planet_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tour_shattle` FOREIGN KEY (`shuttle_name`) REFERENCES `shattle` (`shattle_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
