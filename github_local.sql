-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2020 at 03:36 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `github_local`
--

-- --------------------------------------------------------

--
-- Table structure for table `repo`
--

CREATE TABLE `repo` (
  `id_repo` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `owner_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `html_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forks_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stargazers_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `downloads_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `clone_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stargazers_count` int(11) DEFAULT NULL,
  `is_forks` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `repo`
--

INSERT INTO `repo` (`id_repo`, `name`, `full_name`, `owner_id`, `owner_url`, `owner_name`, `html_url`, `description`, `forks_url`, `stargazers_url`, `downloads_url`, `created_at`, `updated_at`, `clone_url`, `stargazers_count`, `is_forks`) VALUES
(138369974, 'AFF-FROJECT', 'nguyentrungtung/AFF-FROJECT', 35985221, 'https://api.github.com/users/nguyentrungtung', 'nguyentrungtung', 'https://github.com/nguyentrungtung/AFF-FROJECT', 'AFF-FROJECT -TEST', 'https://api.github.com/repos/nguyentrungtung/AFF-FROJECT/forks', 'https://api.github.com/repos/nguyentrungtung/AFF-FROJECT/stargazers', 'https://api.github.com/repos/nguyentrungtung/AFF-FROJECT/downloads', '2018-06-22 21:03:55', '2018-06-22 21:12:45', 'https://github.com/nguyentrungtung/AFF-FROJECT.git', 0, 0),
(291484947, 'awesome-laravel', 'nguyentrungtung/awesome-laravel', 35985221, 'https://api.github.com/users/nguyentrungtung', 'nguyentrungtung', 'https://github.com/nguyentrungtung/awesome-laravel', 'A curated list of bookmarks, packages, tutorials, videos and other cool resources from the Laravel ecosystem', 'https://api.github.com/repos/nguyentrungtung/awesome-laravel/forks', 'https://api.github.com/repos/nguyentrungtung/awesome-laravel/stargazers', 'https://api.github.com/repos/nguyentrungtung/awesome-laravel/downloads', '2020-08-30 07:20:59', '2020-08-30 07:21:00', 'https://github.com/nguyentrungtung/awesome-laravel.git', 0, 0),
(197502380, 'iptvlisttest', 'Bretho/iptvlisttest', 37275232, 'https://api.github.com/users/Bretho', 'Bretho', 'https://github.com/Bretho/iptvlisttest', NULL, 'https://api.github.com/repos/Bretho/iptvlisttest/forks', 'https://api.github.com/repos/Bretho/iptvlisttest/stargazers', 'https://api.github.com/repos/Bretho/iptvlisttest/downloads', '2019-07-17 20:12:05', '2019-07-17 20:12:05', 'https://github.com/Bretho/iptvlisttest.git', 0, 0),
(198571014, 'PIPITV', 'Bretho/PIPITV', 37275232, 'https://api.github.com/users/Bretho', 'Bretho', 'https://github.com/Bretho/PIPITV', NULL, 'https://api.github.com/repos/Bretho/PIPITV/forks', 'https://api.github.com/repos/Bretho/PIPITV/stargazers', 'https://api.github.com/repos/Bretho/PIPITV/downloads', '2019-07-23 23:18:25', '2019-07-23 23:18:28', 'https://github.com/Bretho/PIPITV.git', 0, 0),
(291485622, 'awesome-python', 'nguyentrungtung/awesome-python', 35985221, 'https://api.github.com/users/nguyentrungtung', 'nguyentrungtung', 'https://github.com/nguyentrungtung/awesome-python', 'A curated list of awesome Python frameworks, libraries, software and resources', 'https://api.github.com/repos/nguyentrungtung/awesome-python/forks', 'https://api.github.com/repos/nguyentrungtung/awesome-python/stargazers', 'https://api.github.com/repos/nguyentrungtung/awesome-python/downloads', '2020-08-30 07:24:55', '2020-08-30 07:24:57', 'https://github.com/nguyentrungtung/awesome-python.git', 0, 0),
(154930969, 'FC_test', 'nguyentrungtung/FC_test', 35985221, 'https://api.github.com/users/nguyentrungtung', 'nguyentrungtung', 'https://github.com/nguyentrungtung/FC_test', NULL, 'https://api.github.com/repos/nguyentrungtung/FC_test/forks', 'https://api.github.com/repos/nguyentrungtung/FC_test/stargazers', 'https://api.github.com/repos/nguyentrungtung/FC_test/downloads', '2018-10-26 22:51:08', '2018-10-26 23:09:30', 'https://github.com/nguyentrungtung/FC_test.git', 0, 0),
(305587009, 'google-drive-stream', 'nguyentrungtung/google-drive-stream', 35985221, 'https://api.github.com/users/nguyentrungtung', 'nguyentrungtung', 'https://github.com/nguyentrungtung/google-drive-stream', 'Stream videos from Google Drive.', 'https://api.github.com/repos/nguyentrungtung/google-drive-stream/forks', 'https://api.github.com/repos/nguyentrungtung/google-drive-stream/stargazers', 'https://api.github.com/repos/nguyentrungtung/google-drive-stream/downloads', '2020-10-19 21:11:55', '2020-10-19 21:11:57', 'https://github.com/nguyentrungtung/google-drive-stream.git', 0, 0),
(147894294, 'perfex_crm', 'nguyentrungtung/perfex_crm', 35985221, 'https://api.github.com/users/nguyentrungtung', 'nguyentrungtung', 'https://github.com/nguyentrungtung/perfex_crm', 'CRM-PERFEX', 'https://api.github.com/repos/nguyentrungtung/perfex_crm/forks', 'https://api.github.com/repos/nguyentrungtung/perfex_crm/stargazers', 'https://api.github.com/repos/nguyentrungtung/perfex_crm/downloads', '2018-09-07 19:35:55', '2018-09-07 20:05:38', 'https://github.com/nguyentrungtung/perfex_crm.git', 0, 0),
(150815410, 'bizmanage', 'nguyentrungtung/bizmanage', 35985221, 'https://api.github.com/users/nguyentrungtung', 'nguyentrungtung', 'https://github.com/nguyentrungtung/bizmanage', 'bizmanage', 'https://api.github.com/repos/nguyentrungtung/bizmanage/forks', 'https://api.github.com/repos/nguyentrungtung/bizmanage/stargazers', 'https://api.github.com/repos/nguyentrungtung/bizmanage/downloads', '2018-09-28 19:25:05', '2018-09-28 20:34:52', 'https://github.com/nguyentrungtung/bizmanage.git', 0, 0),
(99132503, 'barcode-bars-to-binary', 'agarrharr/barcode-bars-to-binary', 3266363, 'https://api.github.com/users/agarrharr', 'agarrharr', 'https://github.com/agarrharr/barcode-bars-to-binary', '???? Convert barcode from width of bars and gaps to the binary value', 'https://api.github.com/repos/agarrharr/barcode-bars-to-binary/forks', 'https://api.github.com/repos/agarrharr/barcode-bars-to-binary/stargazers', 'https://api.github.com/repos/agarrharr/barcode-bars-to-binary/downloads', '2017-08-02 08:28:27', '2020-07-14 14:20:05', 'https://github.com/agarrharr/barcode-bars-to-binary.git', 1, 0),
(115139787, 'awesome-typewriters', 'agarrharr/awesome-typewriters', 3266363, 'https://api.github.com/users/agarrharr', 'agarrharr', 'https://github.com/agarrharr/awesome-typewriters', '⌨️???? A curated list of awesome things related to typewriters', 'https://api.github.com/repos/agarrharr/awesome-typewriters/forks', 'https://api.github.com/repos/agarrharr/awesome-typewriters/stargazers', 'https://api.github.com/repos/agarrharr/awesome-typewriters/downloads', '2017-12-22 11:16:08', '2020-07-14 14:21:33', 'https://github.com/agarrharr/awesome-typewriters.git', 3, 0),
(31401471, 'awesome-static-website-services', 'agarrharr/awesome-static-website-services', 3266363, 'https://api.github.com/users/agarrharr', 'agarrharr', 'https://github.com/agarrharr/awesome-static-website-services', '???? ???? A curated list of awesome static websites services', 'https://api.github.com/repos/agarrharr/awesome-static-website-services/forks', 'https://api.github.com/repos/agarrharr/awesome-static-website-services/stargazers', 'https://api.github.com/repos/agarrharr/awesome-static-website-services/downloads', '2015-02-26 20:19:28', '2020-10-22 23:08:38', 'https://github.com/agarrharr/awesome-static-website-services.git', 1322, 0),
(3204040, 'HTML5Search', 'ebidel/HTML5Search', 238208, 'https://api.github.com/users/ebidel', 'ebidel', 'https://github.com/ebidel/HTML5Search', 'Searching all the best HTML5, CSS and Javascript resources on the web.', 'https://api.github.com/repos/ebidel/HTML5Search/forks', 'https://api.github.com/repos/ebidel/HTML5Search/stargazers', 'https://api.github.com/repos/ebidel/HTML5Search/downloads', '2012-01-17 15:48:16', '2019-09-07 19:00:39', 'https://github.com/ebidel/HTML5Search.git', 8, 0),
(137155151, 'lambda', 'nguyentrungtung/lambda', 35985221, 'https://api.github.com/users/nguyentrungtung', 'nguyentrungtung', 'https://github.com/nguyentrungtung/lambda', 'PSD lambda html5 , sass', 'https://api.github.com/repos/nguyentrungtung/lambda/forks', 'https://api.github.com/repos/nguyentrungtung/lambda/stargazers', 'https://api.github.com/repos/nguyentrungtung/lambda/downloads', '2018-06-12 20:02:29', '2018-06-12 20:07:45', 'https://github.com/nguyentrungtung/lambda.git', 0, 0),
(305577381, 'fb_get_token_from_cookie', 'nguyentrungtung/fb_get_token_from_cookie', 35985221, 'https://api.github.com/users/nguyentrungtung', 'nguyentrungtung', 'https://github.com/nguyentrungtung/fb_get_token_from_cookie', 'Only with cookies you can take the fb access token very easily and no checkpoints', 'https://api.github.com/repos/nguyentrungtung/fb_get_token_from_cookie/forks', 'https://api.github.com/repos/nguyentrungtung/fb_get_token_from_cookie/stargazers', 'https://api.github.com/repos/nguyentrungtung/fb_get_token_from_cookie/downloads', '2020-10-19 20:18:34', '2020-10-19 20:18:36', 'https://github.com/nguyentrungtung/fb_get_token_from_cookie.git', 0, 0),
(126622546, 'api.jneidel.com', 'jneidel/api.jneidel.com', 25589715, 'https://api.github.com/users/jneidel', 'jneidel', 'https://github.com/jneidel/api.jneidel.com', 'Personal API for jneidel.com', 'https://api.github.com/repos/jneidel/api.jneidel.com/forks', 'https://api.github.com/repos/jneidel/api.jneidel.com/stargazers', 'https://api.github.com/repos/jneidel/api.jneidel.com/downloads', '2018-03-24 10:18:17', '2018-12-17 06:57:42', 'https://github.com/jneidel/api.jneidel.com.git', 0, 0),
(122611489, 'py-range', 'jneidel/py-range', 25589715, 'https://api.github.com/users/jneidel', 'jneidel', 'https://github.com/jneidel/py-range', 'Lightweight implementation of Python\'s range( a, b, [step] )', 'https://api.github.com/repos/jneidel/py-range/forks', 'https://api.github.com/repos/jneidel/py-range/stargazers', 'https://api.github.com/repos/jneidel/py-range/downloads', '2018-02-23 04:12:30', '2018-02-23 07:02:47', 'https://github.com/jneidel/py-range.git', 0, 0),
(166605936, 'youtube-local', 'jneidel/youtube-local', 25589715, 'https://api.github.com/users/jneidel', 'jneidel', 'https://github.com/jneidel/youtube-local', 'Local version of youtubes subscription feed as a text file; manage new videos in vim and watch with vlc', 'https://api.github.com/repos/jneidel/youtube-local/forks', 'https://api.github.com/repos/jneidel/youtube-local/stargazers', 'https://api.github.com/repos/jneidel/youtube-local/downloads', '2019-01-19 16:54:38', '2020-04-27 07:17:32', 'https://github.com/jneidel/youtube-local.git', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` enum('','github','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_repo`
--

CREATE TABLE `user_repo` (
  `id_user` int(11) NOT NULL,
  `id_repo` int(11) NOT NULL,
  `repo_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_repo`
--

INSERT INTO `user_repo` (`id_user`, `id_repo`, `repo_url`) VALUES
(35985221, 122611489, 'https://github.com/nguyentrungtung/py-range'),
(35985221, 126622546, 'https://github.com/nguyentrungtung/api.jneidel.com'),
(35985221, 99132503, 'https://github.com/nguyentrungtung/barcode-bars-to-binary'),
(35985221, 115139787, 'https://github.com/nguyentrungtung/awesome-typewriters'),
(35985221, 119139040, 'https://github.com/nguyentrungtung/google-drive-stream'),
(35985221, 3204040, 'https://github.com/nguyentrungtung/HTML5Search'),
(35985221, 301285824, 'https://github.com/nguyentrungtung/fb_get_token_from_cookie'),
(35985221, 22417801, 'https://github.com/nguyentrungtung/awesome-laravel'),
(35985221, 301285824, 'https://github.com/nguyentrungtung/fb_get_token_from_cookie'),
(35985221, 22417801, 'https://github.com/nguyentrungtung/awesome-laravel'),
(35985221, 198571014, 'https://github.com/nguyentrungtung/PIPITV'),
(35985221, 166605936, 'https://github.com/nguyentrungtung/youtube-local');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
