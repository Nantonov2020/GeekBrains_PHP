-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 19 2020 г., 19:17
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `geekbranis_php_na`
--

-- --------------------------------------------------------

--
-- Структура таблицы `baskets`
--

CREATE TABLE `baskets` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `count` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `baskets`
--

INSERT INTO `baskets` (`id`, `id_users`, `id_product`, `count`) VALUES
(13, 4, 4, 5),
(15, 4, 8, 1),
(16, 4, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `path` varchar(1024) NOT NULL,
  `size` int(11) NOT NULL DEFAULT 0,
  `count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `name`, `path`, `size`, `count`) VALUES
(3, 'Мягкие игрушки', 'img/img1.jpg', 110592, 24),
(4, 'Машинки', 'img/img2.jpg', 128899, 19),
(5, 'Детские радости', 'img/img3.jpg', 167283, 15),
(6, 'Странности', 'img/img4.jpg', 458000, 22),
(8, 'test', 'img/img5.jpg', 332344, 2),
(9, 'Совенок', 'img/img6.jpg', 330233, 1),
(10, 'Грустный зайчонок', 'img/img7.jpg', 200413, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `comment` text NOT NULL,
  `time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_users`, `comment`, `time`, `status`, `phone`) VALUES
(35, 3, '', 1597765910, 0, ''),
(36, 3, '', 1597766013, 0, ''),
(38, 6, '', 1597845138, 2, ''),
(39, 6, '', 1597845233, 0, ''),
(40, 6, '', 1597845263, 1, ''),
(41, 6, '', 1597845422, 0, ''),
(42, 6, '', 1597845611, 0, ''),
(43, 6, 'Звонить днем', 1597845672, 0, '+7-582-397-11-23');

-- --------------------------------------------------------

--
-- Структура таблицы `position_of_orders`
--

CREATE TABLE `position_of_orders` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `position_of_orders`
--

INSERT INTO `position_of_orders` (`id_order`, `id_product`, `count`) VALUES
(35, 8, 1),
(35, 4, 1),
(38, 4, 1),
(38, 6, 1),
(38, 8, 1),
(40, 8, 1),
(40, 4, 1),
(40, 5, 1),
(41, 8, 1),
(42, 4, 1),
(42, 6, 1),
(43, 6, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `price` mediumint(9) NOT NULL,
  `manufacture` varchar(30) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `text`, `price`, `manufacture`, `path`) VALUES
(3, 'Необычные вещи', 'MySQL портирована на большое количество платформ: AIX, BSDi, FreeBSD, HP-UX, Linux, macOS, NetBSD, OpenBSD, OS/2 Warp, SGI IRIX, Solaris, SunOS, SCO OpenServer, UnixWare, Tru64, Windows 95, Windows 98, Windows NT, Windows 2000, Windows XP, Windows Server 2003, WinCE, Windows Vista, Windows 7 и Windows 10.', 6000, 'США', 'img/img3.jpg'),
(4, 'Мягкие игрушки', 'Скриптовый язык общего назначения, интенсивно применяемый для разработки веб-приложений. В настоящее время поддерживается подавляющим большинством хостинг-провайдеров и является одним из лидеров среди языков, применяющихся для создания динамических веб-сайтов.', 7865, 'Англия', 'img/img1.jpg'),
(5, 'Киборги', 'Редирект (или перенаправление, переадресация, форвардинг) - это способ, который позволяет один и тот же документ сделать доступным с других адресов (URLов). Разбираем все виды редиректов (html, js, php, htaccess). Читать ещё', 444, 'Венесуэла', 'img/img6.jpg'),
(6, 'слоны', 'Параметр encoding представляет собой символьную кодировку. Если он опущен, вместо него будет использовано значение внутренней кодировки.', 6754, 'Гондурас', 'img/img5.jpg'),
(8, 'Ананасы', 'Проверяет, что значение является корректным e-mail. \r\nВ целом, происходит проверка синтаксиса адреса в соответствии с RFC 822, за исключением того, что не поддерживаются комментарии, схлопывание пробельных символов и доменные имена без точек. ', 9000, 'Венесуэла', 'img/img6.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `pass` varchar(80) NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `role`, `email`) VALUES
(1, 'admin', '84h2b692e5698d51a19d8a121ce581499d7b70166884h2b692e5', 1, 'nantonov@mail.ru'),
(2, '111', '84h2b692e596e79218965eb72c92a549dd5a33011284h2b692e5', 0, 'erewrwr@kkkkk.ru'),
(3, '222', '84h2b692e5e3ceb5881a0a1fdaad01296d7554868d84h2b692e5', 0, 'vvvvv@mmnd.ru'),
(4, '333', '84h2b692e51a100d2c0dab19c4430e7d73762b342384h2b692e5', 0, 'dgfdgdgd@llot.com'),
(5, '444', '84h2b692e573882ab1fa529d7273da0db6b49cc4f384h2b692e5', 0, 'dfgdfgd@ssgsdfsf.ru'),
(6, '555', '84h2b692e55b1b68a9abf4d2cd155c81a9225fd15884h2b692e5', 0, 'ssfsfsgdhrh@dgdhd.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
