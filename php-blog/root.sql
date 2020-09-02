-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 02 2020 г., 22:40
-- Версия сервера: 5.5.62-log
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
-- База данных: `root`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `text` varchar(5000) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `name`, `description`, `text`) VALUES
(2, 'Первый пост', 'Описание первого поста', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec mauris ac nunc volutpat imperdiet id eu lorem. Maecenas pharetra euismod nisi vel ultrices. Phasellus non leo et felis varius tincidunt. Suspendisse a tempor orci, sed congue tortor. Morbi malesuada at massa at tincidunt. Integer at orci euismod, dignissim nibh eu, laoreet orci. Suspendisse potenti. Vestibulum eget ex a dolor cursus tempus. Aliquam ac tristique lacus. Vestibulum nisi nisi, maximus a venenatis quis, viverra vitae libero. Phasellus mauris ex, blandit eu nisi a, egestas euismod felis. Vestibulum eget imperdiet nulla.\r\n\r\nPhasellus feugiat est in aliquet interdum. Proin viverra ultricies eros, sed dapibus turpis aliquam id. Donec scelerisque faucibus tincidunt. Nulla venenatis ex in lectus pretium pharetra. In ut pulvinar nisl. In suscipit, felis in interdum blandit, augue metus consectetur sapien, quis cursus elit tortor non tortor. Pellentesque quis metus diam. Duis euismod dolor sem, sit amet finibus sem egestas eget. Nullam facilisis at leo nec varius. Nam ornare volutpat pharetra. Sed finibus leo eu lacus sodales, vel rhoncus magna scelerisque. Maecenas auctor, lectus elementum efficitur porta, velit diam aliquam metus, sit amet cursus libero justo in augue. Maecenas placerat, arcu non pretium aliquam, mi lacus ullamcorper magna, ac tincidunt turpis magna eu nunc.'),
(3, 'Второй пост', 'Описание второго поста', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec mauris ac nunc volutpat imperdiet id eu lorem. Maecenas pharetra euismod nisi vel ultrices. Phasellus non leo et felis varius tincidunt. Suspendisse a tempor orci, sed congue tortor. Morbi malesuada at massa at tincidunt. Integer at orci euismod, dignissim nibh eu, laoreet orci. Suspendisse potenti. Vestibulum eget ex a dolor cursus tempus. Aliquam ac tristique lacus. Vestibulum nisi nisi, maximus a venenatis quis, viverra vitae libero. Phasellus mauris ex, blandit eu nisi a, egestas euismod felis. Vestibulum eget imperdiet nulla.\r\n\r\nPhasellus feugiat est in aliquet interdum. Proin viverra ultricies eros, sed dapibus turpis aliquam id. Donec scelerisque faucibus tincidunt. Nulla venenatis ex in lectus pretium pharetra. In ut pulvinar nisl. In suscipit, felis in interdum blandit, augue metus consectetur sapien, quis cursus elit tortor non tortor. Pellentesque quis metus diam. Duis euismod dolor sem, sit amet finibus sem egestas eget. Nullam facilisis at leo nec varius. Nam ornare volutpat pharetra. Sed finibus leo eu lacus sodales, vel rhoncus magna scelerisque. Maecenas auctor, lectus elementum efficitur porta, velit diam aliquam metus, sit amet cursus libero justo in augue. Maecenas placerat, arcu non pretium aliquam, mi lacus ullamcorper magna, ac tincidunt turpis magna eu nunc.'),
(4, 'Третий пост', 'Описание третьего поста', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean non metus nec nisi vestibulum venenatis. Etiam nunc metus, egestas nec eros at, rhoncus imperdiet nunc. Nullam in cursus purus. Quisque placerat fringilla ultricies. Suspendisse eget nunc felis. Sed elementum ultricies dapibus. Pellentesque purus nunc, viverra quis magna eu, aliquam elementum augue.\r\n\r\nProin mauris ex, tincidunt ac lorem bibendum, congue feugiat est. Fusce leo nibh, posuere nec est consequat, vestibulum viverra leo. Aliquam ac sem at metus fringilla laoreet. Curabitur eget ante eget risus consectetur fringilla. Suspendisse potenti. Quisque hendrerit vitae metus ut congue. Duis tempus laoreet eros eget fermentum. Maecenas fringilla vel urna sed faucibus. Vestibulum in nunc ut ligula blandit pellentesque. Duis tempor quam sit amet tincidunt tristique. Integer varius, mauris in pellentesque cursus, ligula sapien fermentum orci, vel tincidunt magna tortor at sapien. Etiam eu egestas lectus, sed varius enim. Curabitur cursus fermentum lobortis. Vivamus maximus ligula dignissim, luctus felis quis, pretium augue.\r\n\r\nCras vel pulvinar sapien, quis auctor velit. Donec sapien arcu, eleifend eu sagittis eu, suscipit eu erat. Praesent varius arcu massa, faucibus ultrices ligula varius non. Sed interdum sit amet dolor non pharetra. Proin tellus lorem, imperdiet aliquam ipsum ac, viverra mollis nibh. Nulla facilisi. Vivamus vehicula felis sit amet nisl accumsan auctor. Praesent vitae metus efficitur, pharetra lorem nec, hendrerit diam.\r\n\r\nNunc gravida eu est in efficitur. In hac habitasse platea dictumst. Ut sed risus elit. In at ullamcorper urna. In eget ex in erat congue facilisis eu ac urna. In luctus in leo et bibendum. Mauris id nisi est. Morbi eget quam nisi.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
