-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 26 2020 г., 14:57
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pizza_delivery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `email`) VALUES
(13, 'etst', '43645453', 'iuewhiewd@mail.ru'),
(14, 'test', '67565', 'dgfefw@mail.ru'),
(17, 'test', '8746587435', 'oiuhefigv@mail.ru'),
(19, 'tedst', '48756876', 'kjirgfetf@mail.ru'),
(20, 'jygiyg', '8658855', 'ugewf@mail.ru'),
(21, 'dsddd', '7657657', 'ffdeffdf@mail.ru'),
(22, 'test', '76565576', 'kwhirf@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `delivery_min_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `delivery_min_price`) VALUES
(1, 'USD', 12),
(2, 'EUR', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `description` text,
  `type` varchar(255) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `image`, `description`, `type`, `active`) VALUES
(1, 'Pepperoni', '1.jpg', 'Pepperoni is an American variety of salami, made from a cured mixture of pork and beef seasoned with paprika or other chili pepper. Pepperoni is characteristically soft, slightly smoky, and bright red in color. Thinly sliced pepperoni is a popular pizza topping in American pizzerias.', 'product', 1),
(2, '4 cheese', '2.jpg', 'This pizza comes originally from Rome and is called pizza quattro formaggi. The cheeses used are mozzarella, stracchino, fontina and gorgonzola.', 'product', 1),
(3, 'Margherita', '3.jpg', 'Pizza Margherita (more commonly known in English as Margherita pizza) is a typical Neapolitan pizza, made with San Marzano tomatoes, mozzarella cheese, fresh basil, salt and extra-virgin olive oil. Traditionally, it is made with fior di latte (cow\'s milk mozzarella) rather than buffalo mozzarella.', 'product', 1),
(4, 'Delivery fee', '', NULL, 'delivery', 0),
(5, 'Capricciosa', '4.jpg', 'The name of this pizza literally translates to capricious, and seems quite appropriate, considering that the toppings tend to vary from one region to another. Capricciosa is made with an ever-changing combination of ingredients which most often include tomatoes, mozzarella, mushrooms, artichokes, ham, olives, and a sliced hard-boiled egg, whereas in central and northern Italy, it is not uncommon to add capers, sausages, and sometimes even anchovies.', 'product', 1),
(6, 'Marinara', '5.jpg', 'Marinara is a Neapolitan pizza with a topping of tomatoes, oregano, garlic, extra virgin olive oil, and sometimes fresh basil. Its name is not derived from the popular belief that it has seafood on it (because it does not), but because it was a staple food of the fishermen who consumed it upon their return home from fishing in the Bay of Naples.', 'product', 1),
(7, 'Calzone', '6.jpg', 'This unique type of pizza is characterized by its half-round shape, made by folding a full-sized pizza in half. Hailing from 18th century Naples, calzone literally means pant leg, referring to the fact that calzone\'s original purpose was to be a pizza which can be consumed while walking or standing.', 'product', 1),
(8, 'Manakish', '7.jpg', 'Manakish is a favorite Lebanese breakfast - a round, flat bread that is typically topped with olive oil and zaatar (sesame seeds, thyme, and sumac), then baked in the oven. Other toppings might include cheese, minced lamb, spinach, or fried eggplants.', 'product', 1),
(9, 'Tirolese', '8.jpg', 'Tirolese or speck pizza consists of tomato sauce, mozzarella, and thin slices of cured Tiroler speck. Although it is typical for South Tyrol, this pizza is eaten throughout the country. Tirolese can sometimes be enriched with the addition of mushrooms.', 'product', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `goods_prices`
--

CREATE TABLE `goods_prices` (
  `id` int(11) NOT NULL,
  `good_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `currency_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods_prices`
--

INSERT INTO `goods_prices` (`id`, `good_id`, `price`, `currency_id`) VALUES
(1, 1, 1.55, 2),
(2, 1, 1.99, 1),
(3, 2, 1.69, 2),
(4, 2, 2.15, 1),
(5, 3, 1.34, 2),
(6, 3, 1.87, 1),
(7, 4, 1, 2),
(8, 4, 1.25, 1),
(9, 5, 1.76, 1),
(10, 5, 2.34, 2),
(11, 6, 2.54, 1),
(12, 6, 1.97, 2),
(13, 7, 3.07, 1),
(14, 7, 2.65, 2),
(15, 8, 5.56, 1),
(16, 8, 4.87, 2),
(17, 9, 3.47, 1),
(18, 9, 2.83, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `address` text,
  `comment` text,
  `currency_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `address`, `comment`, `currency_id`) VALUES
(3, 13, 'address', 'comment', 1),
(4, 14, 'udysg', 'iehfewf', 1),
(5, 14, 'udysg', 'iehfewf', 1),
(6, 14, 'udysg', 'iehfewf', 1),
(7, 17, 'utfutftu', 'iygfref', 1),
(8, 17, 'utfutftu', 'iygfref', 1),
(9, 19, 'kjgihg', 'hgiug', 1),
(10, 20, 'utfutf', 'ufuffu', 1),
(11, 21, 'khwfhrgf', 'frwfrfef', 1),
(12, 22, 'address', 'comment', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_positions`
--

CREATE TABLE `orders_positions` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `good_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders_positions`
--

INSERT INTO `orders_positions` (`id`, `order_id`, `good_id`, `price`, `quantity`) VALUES
(4, 3, 2, 1.69, 2),
(5, 3, 3, 1.34, 4),
(6, 3, 4, 2, 1),
(7, 4, 2, 1.69, 2),
(8, 4, 3, 1.34, 4),
(9, 4, 4, 2, 1),
(10, 5, 1, 1.55, 1),
(11, 5, 2, 1.69, 2),
(12, 5, 3, 1.34, 4),
(13, 5, 4, 0, 1),
(14, 6, 1, 1.55, 2),
(15, 6, 2, 1.69, 2),
(16, 6, 3, 1.34, 4),
(17, 6, 4, 0, 1),
(18, 7, 1, 1.55, 2),
(19, 7, 2, 1.69, 2),
(20, 7, 3, 1.34, 4),
(21, 7, 4, 0, 1),
(22, 8, 1, 1.55, 3),
(23, 8, 2, 1.69, 2),
(24, 8, 3, 1.34, 4),
(25, 8, 4, 0, 1),
(26, 9, 1, 1.55, 3),
(27, 9, 2, 1.69, 2),
(28, 9, 3, 1.34, 4),
(29, 9, 4, 0, 1),
(30, 10, 1, 1.55, 3),
(31, 10, 2, 1.69, 2),
(32, 10, 3, 1.34, 4),
(33, 10, 4, 0, 1),
(34, 11, 1, 1.55, 3),
(35, 11, 2, 1.69, 2),
(36, 11, 3, 1.34, 4),
(37, 11, 4, 0, 1),
(38, 12, 1, 1.55, 3),
(39, 12, 2, 1.69, 2),
(40, 12, 3, 1.34, 4),
(41, 12, 4, 0, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `currencies`
--
ALTER TABLE `currencies`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `goods_prices`
--
ALTER TABLE `goods_prices`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `orders_positions`
--
ALTER TABLE `orders_positions`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `goods_prices`
--
ALTER TABLE `goods_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `orders_positions`
--
ALTER TABLE `orders_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
