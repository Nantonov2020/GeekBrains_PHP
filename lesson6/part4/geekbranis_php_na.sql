-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 09 2020 г., 21:07
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
(2, 'Головоломки', 'MySQL имеет двойное лицензирование. MySQL может распространяться в соответствии с условиями лицензии GPL. Однако по условиям GPL, если какая-либо программа использует библиотеки (или включает в себя другой GPL-код) MySQL, то она тоже должна распространяться по лицензии GPL. Это может расходиться с планами разработчиков, не желающих открывать исходные тексты своих программ. Для таких случаев предусмотрена коммерческая лицензия, которая также обеспечивает качественную сервисную поддержку.', 777, 'Индия', 'img/img7.jpg'),
(3, 'Необычные вещи', 'MySQL портирована на большое количество платформ: AIX, BSDi, FreeBSD, HP-UX, Linux, macOS, NetBSD, OpenBSD, OS/2 Warp, SGI IRIX, Solaris, SunOS, SCO OpenServer, UnixWare, Tru64, Windows 95, Windows 98, Windows NT, Windows 2000, Windows XP, Windows Server 2003, WinCE, Windows Vista, Windows 7 и Windows 10.', 6000, 'США', 'img/img3.jpg'),
(4, 'Мягкие игрушки', 'Скриптовый язык общего назначения, интенсивно применяемый для разработки веб-приложений. В настоящее время поддерживается подавляющим большинством хостинг-провайдеров и является одним из лидеров среди языков, применяющихся для создания динамических веб-сайтов.', 7865, 'Англия', 'img/img1.jpg'),
(5, 'Киборги', 'Редирект (или перенаправление, переадресация, форвардинг) - это способ, который позволяет один и тот же документ сделать доступным с других адресов (URLов). Разбираем все виды редиректов (html, js, php, htaccess). Читать ещё', 444, 'Венесуэла', 'img/img6.jpg'),
(6, 'слоны', 'Параметр encoding представляет собой символьную кодировку. Если он опущен, вместо него будет использовано значение внутренней кодировки.', 6754, 'Гондурас', 'img/img5.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `autor`, `text`, `time`) VALUES
(1, 'Ivanov Petr', 'При нажатии на кнопку Reset данные формы возвращаются в первоначальное значение. Как правило, эту кнопку применяют для очистки введенной в полях формы информации. Для больших форм от использования кнопки Reset лучше вообще отказаться, чтобы по ошибке на нее не нажать', 1111),
(2, 'Galina Попова', 'Тег input с атрибутом type в значении reset создает кнопку сброса полей HTML формы. После нажатия на такую кнопку поля формы приобретут тот вид, который они имели при заходе на страницу (до внесенных пользователем изменений). Пример. Давайте изменим поля формы, а затем нажмем', 2222),
(3, 'Иванов Василий', 'сли обычный reset не работает, значит нужно больше подробностей, что это за странная форма такая и как она работает – andreymal 20 ... Либо, используя обычную кнопку, повесив обработчик на неё, который будет вызывать метод reset формы: let form = document.getElementByI', 333999999),
(4, 'Григорий Васильев', 'Всем привет, сегодня познакомимся с элементом html - textarea. Его можно назвать братом или скорее сестрой тега input. Главное отличие этих двух тегов заключается в том, что input содержит в себе одну строку, textarea же позволяет делать переносы, сохраняя их при отправке на сервер, тем самым образуя не один десяток строк. Этот элемент требует закрытия и пишется так: &lt;textarea&gt;&lt;/textarea&gt;.  ', 1596900554),
(5, 'Григорий Васильев', 'Всем привет, сегодня познакомимся с элементом html - textarea. Его можно назвать братом или скорее сестрой тега input. Главное отличие этих двух тегов заключается в том, что input содержит в себе одну строку, textarea же позволяет делать переносы, сохраняя их при отправке на сервер, тем самым образуя не один десяток строк. Этот элемент требует закрытия и пишется так: &lt;textarea&gt;&lt;/textarea&gt;.  ', 1596900565),
(6, 'Nikolay', '          то же такое Captcha[капча]? ... Сейчас компании, создающие сервис по предоставлению Капчи, начали работать в сторону упрощения распознавания. Одной из таких компаний можно назвать google и её капч      ', 1596901450),
(7, 'Родион', '              2. RuCaptcha. 3. 2Captcha. 4. Капча от Advego. 5. MegaTypers. ... RuCaptcha – это еще один из самых популярных в сервисов Рунете, по заработку на вводе капчи. Для того чтобы начать зарабатывать, нужно зарегистрироваться и в... Читать ещё  ', 1596901521);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
