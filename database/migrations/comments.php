<?php

return [
    "
      CREATE TABLE `comments` (
        `id` bigint(20) NOT NULL,
        `user_id` bigint(20) NOT NULL,
        `news_id` bigint(20) NOT NULL,
        `comment` text NOT NULL,
        `parent_id` bigint(20) DEFAULT NULL,
        `status` tinyint(5) NOT NULL DEFAULT 0,
        `approved` tinyint(5) NOT NULL DEFAULT 0,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        `deleted_at` datetime DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
      ALTER TABLE `comments`
        ADD PRIMARY KEY (`id`),
        ADD KEY `user_id` (`user_id`,`news_id`),
        ADD KEY `parent_id` (`parent_id`),
        ADD KEY `news_id` (`news_id`);
      ALTER TABLE `comments`
        MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
      ALTER TABLE `comments`
        ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
      COMMIT;
    "
];