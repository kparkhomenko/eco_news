-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 13 2023 г., 03:48
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `news_eco`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `news_id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `news_id`, `user_id`, `user_name`, `text`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Владимир Остываев', 'Что нас ждёт - река хранит молчание.', '2023-06-12 14:35:45', '2023-06-12 14:35:45'),
(3, 1, 3, 'Анатолий Мальцев', 'Страшно у Вас в Астрахани!', '2023-06-12 15:16:53', '2023-06-12 15:16:53');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_29_174106_create_news_table', 1),
(6, '2023_05_29_175930_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `user_id`, `region`, `title`, `text`, `path`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'astrakhan', 'В Волге выявили угрожающее содержание марганца', 'Превышение ПДК более чем в 40 раз зафиксировано в месте осуществления деятельности нефтеперерабатывающих предприятий', 'XyTlipwoLpXJvHZqiwvOlmxv1sNPRcNr3RRIM92k.jpg', 'moderated', '2023-06-12 14:09:23', '2023-06-12 14:09:53'),
(2, 1, 'rostov', 'Почему река Дон мелеет?', 'Основная причина состоит в том, что местные жители сделали почти на всей территории бассейна реки угодья, а сам Дон перегородили плотинами. Также весомая часть воды ежегодно идет для разных нужд — в том числе сельского хозяйства.', 'xAOOgBtXWYJW9Uliuqc8BRd0KKitue4UxxnqgL8p.jpg', 'moderated', '2023-06-12 14:14:44', '2023-06-12 14:16:16'),
(3, 1, 'astrakhan', 'В Астраханской области в Волгу выпустили мальков сазана', 'Выпуск рыбной молоди в селе Солодники Черноярского района провела служба природопользования и охраны окружающей среды Астраханской области. В регион мальков привезли из Волгоградской области.', '60Xb8DpQQV4uIlCYqsCTy3oAplfmQndBWId2sHk9.jpg', 'moderated', '2023-06-12 14:20:02', '2023-06-12 14:20:12'),
(4, 1, 'volgograd', 'Первый фестиваль экологических театров пройдет в Волгоградской области', 'В Волгоградской области начнет свою работу первый молодежный фестиваль экологических театров. Об этом \"Городским вестям\" сообщили в региональном комитете образования, науки и молодежной политики. Возраст участников фестиваля - от 14 до 35 лет.', 'qQJ022k5hxifLEZsvQ2GuALDn2mmERDdXDefTW8e.jpg', 'moderated', '2023-06-12 14:23:20', '2023-06-12 14:23:45'),
(5, 1, 'volgograd', 'Под Волгоградом полигон переполнен опасными отходами', 'Сотрудники Управления Росприроднадзора по Астраханской и Волгоградской областям зафиксировали факты осуществления ООО «Комус» экологически вредной деятельности по сбору и размещению отходов производства и потребления I – V классов опасности.', 'LfSq7ooFnVEQza3rzGzLeaft7n1UrTUxrn6lNlMw.jpg', 'moderated', '2023-06-12 14:27:23', '2023-06-12 14:27:31'),
(6, 1, 'astrakhan', 'Астраханские экоактивисты очистили пляж на Городском острове', 'Волонтёры провели уборку на пляже Городского острова. Всего было собрано 56 мешков мусора, 32 мешка отправили на переработку.В акции приняли участие активисты «Центра чистой природы 12-15», а также специалисты «Зелёного города». Всего — 77 человек.', 'dhGqiW2BWFH6rNXULKzyxcqW9EKBFKJTvy0gMEBT.jpg', 'moderated', '2023-06-12 14:29:38', '2023-06-12 14:29:50');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `path`, `status`, `region`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Валерий Степанович', 'admin@mail.com', '$2y$10$yw36xxLWhAc/eLx7W7oVYOaVyHzhneOttc9qnwkVxlXcEYRVaz4z.', 'O6Az4LuBmp9YH7SYwqRw2gc2ObUdm6anHoXA9EUl.png', 'admin', 'astrakhan', NULL, '2023-06-12 14:06:11', '2023-06-12 14:06:11'),
(2, 'Владимир Остываев', 'ostyvaev@mail.ru', '$2y$10$ZhlKhqv50eueiCP/ec9/2.ZtzbwyKV.dAGPjB74dXK.9b0jcpq90q', '7LRDuDswRzoTBb0xzetF6x72wJkDPyMR6SwgG9Zd.jpg', 'user', 'astrakhan', NULL, '2023-06-12 14:33:12', '2023-06-12 14:33:12'),
(3, 'Анатолий Мальцев', 'anatoly@mail.ru', '$2y$10$0T6iomrXw2lQD/1FVyqBJO1e0iVHuNNXdlcPNJyFG3xuImuuprEi6', 'B8fXNnaQj2HlawmOU6w9HVxjShIPLOoqaAGWMxKy.jpg', 'user', 'volgograd', NULL, '2023-06-12 15:16:32', '2023-06-12 15:16:32');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_news_id_foreign` (`news_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`);

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
