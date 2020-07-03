-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Июл 03 2020 г., 05:20
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
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_product`, `title`, `descript`, `id_category`, `id_brand`, `count`, `price`, `id_status`) VALUES
(110, 'Product1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi aliquam quam sit amet sodales porttitor. Vestibulum gravida facilisis sapien et bibendum. Curabitur vulputate erat vel auctor interdum. Curabitur id diam in est dictum volutpat eu et lectus. Fusce pretium facilisis sem, et tristique arcu dictum non. Maecenas efficitur at risus sit amet aliquet. Maecenas ultricies ultrices convallis. Donec non lorem rhoncus, porta sem at, viverra nisi. Nam eu finibus nulla. Aliquam feugiat odio ac ex sagittis, non tristique nulla sollicitudin. Maecenas nec odio ante. Nunc sagittis ipsum eget odio efficitur, non pharetra massa fermentum. Suspendisse luctus nunc pellentesque nulla porttitor. ', 4, 1, 5, '550', 1),
(111, 'Product2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi aliquam quam sit amet sodales porttitor. Vestibulum gravida facilisis sapien et bibendum. Curabitur vulputate erat vel auctor interdum. Curabitur id diam in est dictum volutpat eu et lectus. Fusce pretium facilisis sem, et tristique arcu dictum non. Maecenas efficitur at risus sit amet aliquet. Maecenas ultricies ultrices convallis. Donec non lorem rhoncus, porta sem at, viverra nisi. Nam eu finibus nulla. Aliquam feugiat odio ac ex sagittis, non tristique nulla sollicitudin. Maecenas nec odio ante. Nunc sagittis ipsum eget odio efficitur, non pharetra massa fermentum. Suspendisse luctus nunc pellentesque nulla porttitor. ', 6, 2, 10, '790', 1),
(112, 'Product3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi aliquam quam sit amet sodales porttitor. Vestibulum gravida facilisis sapien et bibendum. Curabitur vulputate erat vel auctor interdum. Curabitur id diam in est dictum volutpat eu et lectus. Fusce pretium facilisis sem, et tristique arcu dictum non. Maecenas efficitur at risus sit amet aliquet. Maecenas ultricies ultrices convallis. Donec non lorem rhoncus, porta sem at, viverra nisi. Nam eu finibus nulla. Aliquam feugiat odio ac ex sagittis, non tristique nulla sollicitudin. Maecenas nec odio ante. Nunc sagittis ipsum eget odio efficitur, non pharetra massa fermentum. Suspendisse luctus nunc pellentesque nulla porttitor. ', 6, 3, 5, '990', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `name_image` varchar(300) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id_image`, `name_image`, `id_product`) VALUES
(47, '1015977681.jpg', 110),
(48, 'S17-14091_617_10.jpg', 110),
(49, '1.jpg', 111),
(50, '2.jpg', 111),
(51, '3.jpg', 112),
(52, '4.jpg', 112);

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
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(35) NOT NULL,
  `password` varchar(300) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `midname` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `sex` varchar(1) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `e-mail` varchar(30) NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `firstname`, `lastname`, `midname`, `date_of_birth`, `sex`, `phone`, `e-mail`, `id_role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Имя', 'Фамилия', 'Отчество', '1995-12-10', 'М', '89999999999', 'email@email.com', 2),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'Пользователь', 'Пользователь', 'Пользователь', '1985-06-01', 'М', '89999999999', 'oleg@yandex.ru', 1);

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
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `image` (`id_product`);

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
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
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
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Ограничения внешнего ключа таблицы `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image` FOREIGN KEY (`id_product`) REFERENCES `goods` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
