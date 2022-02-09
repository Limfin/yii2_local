-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 03 2021 г., 13:27
-- Версия сервера: 5.7.29
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `text` text NOT NULL,
  `test` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `name`, `email`, `text`, `test`) VALUES
(1, 'Автор', 'mail@mail.com', 'Тескт сообщения', 'Тест'),
(2, 'Имя', '2@2.com', 'Текст сообщения', 'Тестовое поле');

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`user_id`, `post_id`) VALUES
(2, 2),
(6, 2),
(1, 5),
(2, 5),
(1, 7),
(2, 7),
(4, 7),
(6, 7),
(2, 9),
(3, 9),
(4, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `text`, `image`, `date`) VALUES
(1, 1, 'Сообщение Марии Lorem ipsum dolor sit amet, consectetur.', 'https://picsum.photos/400/300?random=1', '2021-01-07 12:52:27'),
(2, 2, 'Сообщение Брока Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid blanditiis dolorem eaque et, explicabo facere facilis harum laboriosam magni nobis numquam provident quam rem rerum, vero? Nostrum porro ratione sed.', NULL, '2021-01-11 12:53:27'),
(5, 3, 'Где детонатор?', NULL, '2011-02-14 03:04:41'),
(6, 2, 'По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст.', 'https://fish-text.ru/images/logo.png', '2013-03-05 12:44:32'),
(7, 5, 'Зарегался на вк, хороший сервис и не банят', 'https://i2.wp.com/media.globalnews.ca/videostatic/news/vamt80qbaq-94ovmaxjqg/trumptwitterupdate.jpg?w=500&quality=70&strip=all', '2016-05-02 08:27:00'),
(8, 4, 'По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст.', 'https://licenceindia.s3.ap-south-1.amazonaws.com/s3fs-public/news27novstep10licenseindia105535dde829e97bf4.jpg', '2015-01-11 08:12:32'),
(9, 3, 'Где детонатор?!? Я тебя спрашиваю!!111', 'https://www.meme-arsenal.com/memes/27606cb09d10f670389750cffb4d900d.jpg', '2011-02-14 03:05:00'),
(10, 4, 'По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст.', NULL, '2017-01-11 09:10:32'),
(11, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, ad alias commodi delectus eaque earum impedit ipsum nostrum officiis quasi repudiandae, rerum suscipit tenetur vero voluptatem! Architecto consequuntur cupiditate tempore!', 'https://picsum.photos/400/300.jpg', '2021-02-10 07:51:14');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'images/no_avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`, `avatar`) VALUES
(1, 'mary', '$2y$10$2VRQn9MxIcKhhhaXsfg08eGqAjoWxF1wV.4p1v4mYvA5LzDjnnXda', 'Мария Иванова', 'images/mary.jpg'),
(2, 'brock', '$2y$10$6hLPoGN43kfIHQejEvTxbOcziqPY9DZKpRO8szCSTVfwzS8kB9V7C', 'Brock Merge', 'images/brock.jpg'),
(3, 'vasil', '$2y$10$7ekgyxjSFDq04xMYm94ma.LhxMyw1sCHa1GcI.yIXH1TCEdqXc5f.', 'Олег Васильевич', 'images/vasil.jpg'),
(4, 'raamin', '$2y$10$FCzxg3xIjUWiAFgZuVfQ2ePbNnehjoUkuyGw3FSwGpuJR/qKyGQdu', 'Raamin', 'images/raamin.jpg'),
(5, 'trampampam', '$2y$10$E8tmhCNyoAZ3tfUzTAr4tuH5l/7tX0oWyV/t0mB4vWWiuIPMB9//O', 'Дональд', 'images/trampampam.jpg'),
(6, 'asd', '$2y$10$NRwPN/Pekkw9l5GnI18bzeKnfN1LEUmmoISl3j0XM3YRi6UgVNyLW', 'Asd', 'images/no_avatar.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
