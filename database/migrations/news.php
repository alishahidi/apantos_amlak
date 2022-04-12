<?php


return [
    "
      CREATE TABLE `news` (
        `id` bigint(20) NOT NULL,
        `title` varchar(191) NOT NULL,
        `body` text NOT NULL,
        `image` text NOT NULL,
        `user_id` bigint(20) NOT NULL,
        `cat_id` int(10) NOT NULL,
        `published_at` datetime NOT NULL,
        `status` tinyint(5) NOT NULL DEFAULT 0,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        `deleted_at` datetime DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
      ALTER TABLE `news`
        ADD PRIMARY KEY (`id`),
        ADD KEY `user_id` (`user_id`),
        ADD KEY `cat_id` (`cat_id`);
      ALTER TABLE `news`
        MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
      ALTER TABLE `news`
        ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
        ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
      COMMIT;
    "
];