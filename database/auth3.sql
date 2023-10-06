CREATE TABLE `user_historique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `date_connected` datetime NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_historique_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO `user_historique` (`id`, `user_id`, `date_connected`, `ip`) VALUES ('1', '2', '2023-09-12 00:08:22', '127.0.0.1');
INSERT INTO `user_historique` (`id`, `user_id`, `date_connected`, `ip`) VALUES ('2', '4', '2023-09-12 00:08:37', '127.0.0.1');
INSERT INTO `user_historique` (`id`, `user_id`, `date_connected`, `ip`) VALUES ('3', '1', '2023-09-12 00:08:54', '127.0.0.1');
INSERT INTO `user_historique` (`id`, `user_id`, `date_connected`, `ip`) VALUES ('4', '', '2023-09-12 00:10:03', '127.0.0.1');
INSERT INTO `user_historique` (`id`, `user_id`, `date_connected`, `ip`) VALUES ('5', '', '2023-09-12 00:10:45', '127.0.0.1');
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO `users` (`id`, `nom`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES ('1', 'hind', 'hind@gmail.com', '123456', '2023-09-12 00:01:13', '', '');
INSERT INTO `users` (`id`, `nom`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES ('2', 'nabila', 'nabila@gmail.com', '123456', '2023-09-12 00:04:43', '', '');
INSERT INTO `users` (`id`, `nom`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES ('3', 'maryam', 'maryam@gmail.com', '123456', '2023-09-12 00:04:55', '', '');
INSERT INTO `users` (`id`, `nom`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES ('4', 'Youssra', 'youssra@gmail.com', '123456', '2023-09-12 00:05:07', '', '');
INSERT INTO `users` (`id`, `nom`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES ('5', 'othmane', 'othmane@gmail.com', '$2y$10$NbtKfvUZFYLQC8OV9rC2J.19nz6Prj7P5pNwx9oTeHVzlPcxiMbUm', '2023-10-03 00:07:24', '', '');
INSERT INTO `users` (`id`, `nom`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES ('6', 'sara', 'sara@gmail.com', '$2y$10$IEuaq7SOipqQtL7RC8FTCOMnjz9Ft4R7G2CWd4vfBWMKVqzLaczWO', '2023-10-03 00:44:44', '', '');
INSERT INTO `users` (`id`, `nom`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES ('7', 'ali', 'ali@gmail.com', '$2y$10$g8PdFDV/WxXTWHW.nSNPO.KY1fowaC5dYw7PYDbZYkf3UiUHSgk9u', '2023-10-03 00:49:42', '', '');
;
INSERT INTO `view_user_historique` (`user_id`, `nom`, `email`, `date_connected`, `ip`) VALUES ('2', 'nabila', 'nabila@gmail.com', '2023-09-12 00:08:22', '127.0.0.1');
INSERT INTO `view_user_historique` (`user_id`, `nom`, `email`, `date_connected`, `ip`) VALUES ('4', 'Youssra', 'youssra@gmail.com', '2023-09-12 00:08:37', '127.0.0.1');
INSERT INTO `view_user_historique` (`user_id`, `nom`, `email`, `date_connected`, `ip`) VALUES ('1', 'hind', 'hind@gmail.com', '2023-09-12 00:08:54', '127.0.0.1');
INSERT INTO `view_user_historique` (`user_id`, `nom`, `email`, `date_connected`, `ip`) VALUES ('', '', '', '2023-09-12 00:10:03', '127.0.0.1');
INSERT INTO `view_user_historique` (`user_id`, `nom`, `email`, `date_connected`, `ip`) VALUES ('', '', '', '2023-09-12 00:10:45', '127.0.0.1');
