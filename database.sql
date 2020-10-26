CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `oauth_provider` enum('','github','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL,
 `oauth_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
 `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

// add repo
CREATE TABLE `repo` (
  `id_repo` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `html_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `forks_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stargazers_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `downloads_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `clone_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stargazers_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;