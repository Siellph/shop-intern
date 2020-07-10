-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Июл 11 2020 г., 01:48
-- Версия сервера: 5.7.26
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shopIntern`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `brand_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`id_brand`, `brand_name`) VALUES
(1, 'Gucci'),
(2, 'GA'),
(3, 'LV'),
(4, 'Asos'),
(5, 'Zara'),
(6, 'Moschino');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`) VALUES
(1, 'Обувь'),
(2, 'Футболка'),
(3, 'Джинсы'),
(4, 'Брюки'),
(5, 'Штаны'),
(6, 'Куртки'),
(7, 'Аксесуары');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id_product` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `descript` varchar(5000) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` varchar(30) NOT NULL,
  `id_status` int(11) NOT NULL,
  `image` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_product`, `title`, `descript`, `id_category`, `id_brand`, `count`, `price`, `id_status`, `image`) VALUES
(110, 'Product1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi aliquam quam sit amet sodales porttitor. Vestibulum gravida facilisis sapien et bibendum. Curabitur vulputate erat vel auctor interdum. Curabitur id diam in est dictum volutpat eu et lectus. Fusce pretium facilisis sem, et tristique arcu dictum non. Maecenas efficitur at risus sit amet aliquet. Maecenas ultricies ultrices convallis. Donec non lorem rhoncus, porta sem at, viverra nisi. Nam eu finibus nulla. Aliquam feugiat odio ac ex sagittis, non tristique nulla sollicitudin. Maecenas nec odio ante. Nunc sagittis ipsum eget odio efficitur, non pharetra massa fermentum. Suspendisse luctus nunc pellentesque nulla porttitor. ', 4, 1, 5, '550', 1, ''),
(111, 'Product2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi aliquam quam sit amet sodales porttitor. Vestibulum gravida facilisis sapien et bibendum. Curabitur vulputate erat vel auctor interdum. Curabitur id diam in est dictum volutpat eu et lectus. Fusce pretium facilisis sem, et tristique arcu dictum non. Maecenas efficitur at risus sit amet aliquet. Maecenas ultricies ultrices convallis. Donec non lorem rhoncus, porta sem at, viverra nisi. Nam eu finibus nulla. Aliquam feugiat odio ac ex sagittis, non tristique nulla sollicitudin. Maecenas nec odio ante. Nunc sagittis ipsum eget odio efficitur, non pharetra massa fermentum. Suspendisse luctus nunc pellentesque nulla porttitor. ', 6, 2, 10, '790', 1, ''),
(112, 'Product3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi aliquam quam sit amet sodales porttitor. Vestibulum gravida facilisis sapien et bibendum. Curabitur vulputate erat vel auctor interdum. Curabitur id diam in est dictum volutpat eu et lectus. Fusce pretium facilisis sem, et tristique arcu dictum non. Maecenas efficitur at risus sit amet aliquet. Maecenas ultricies ultrices convallis. Donec non lorem rhoncus, porta sem at, viverra nisi. Nam eu finibus nulla. Aliquam feugiat odio ac ex sagittis, non tristique nulla sollicitudin. Maecenas nec odio ante. Nunc sagittis ipsum eget odio efficitur, non pharetra massa fermentum. Suspendisse luctus nunc pellentesque nulla porttitor. ', 6, 3, 5, '990', 1, ''),
(113, 'Тестовый товар', 'Здесь будет описание товара.', 1, 1, 1, '1990', 1, ''),
(114, 'Тестовый товар 2', 'Описание к тестовому товару 2', 1, 3, 12, '1900', 2, NULL),
(115, 'Тестовый товар 3', 'И снова описание тестового товара', 5, 3, 10, '1890', 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id_role`, `role_name`) VALUES
(1, 'Пользователь'),
(2, 'Администратор');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `name_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id_status`, `name_status`) VALUES
(1, 'Активен'),
(2, 'Неактивен');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password_hash` varchar(256) NOT NULL,
  `auth_key` varchar(256) NOT NULL,
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(256) NOT NULL,
  `verification_token` varchar(256) NOT NULL,
  `created_at` varchar(256) NOT NULL,
  `updated_at` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password_hash`, `auth_key`, `firstname`, `lastname`, `sex`, `phone`, `email`, `verification_token`, `created_at`, `updated_at`, `status`, `id_role`) VALUES
(1, 'admin', '$2y$13$g/CVOjeC9shyXxrRi9UtmechHKOX0uikjLQ0DL5uALYTgXa8vHP7m', 'AD_Lt7Wt-wLgXGSh0a5fx0tBwtiltTsX', 'Vladislav', 'Gordin', 'М', '+7 (996) 323 36 35', 'vl241095@gmail.com', 'qWXSmTUNMjyouJhfcp53VxQg0qopk4uT_1594243238', '1594243238', '1594243238', 10, 2),
(2, 'VlGor', '$2y$13$csVBn2pYcpykgQFmcSISw.MO6TIsMoRj3RRAOF5.SLUKir44hw2xC', '5z3wzTZE1KX5XrCB2R-FlPqMOW5FYUOL', 'Vladislav', 'Grodin', 'М', '+7 (996) 323 36 35', 'vl241095@yandex.ru', 'Resw-8ypuQr9YAwOlJh94q7OPUaRJCFN_1594245963', '1594245963', '1594245963', 10, 1),
(3, 'admin2', '$2y$13$y6rjf8jvt8Y9LdNdB0gUPuSscudcuH45LrKXey1PW0Ux31FGTUoiO', 'IU4kZVMtTObxCVfnYk8P2D2lvvGAd-QY', 'Admin', 'V2', 'М', '+7 (999) 999 99 99', 'Admin@admin.ru', '9rdPnkUIwTG7ZUE5M6W8lsW6ab6EtmLA_1594413636', '1594413636', '1594413636', 10, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_brand` (`id_brand`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`id_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `brand` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
