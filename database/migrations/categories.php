<?php

return [
    "
      CREATE TABLE `categories` (
        `id` int(20) NOT NULL,
        `name` varchar(191) NOT NULL,
        `parent_id` int(20) DEFAULT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        `deleted_at` datetime DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
      ALTER TABLE `categories`
        ADD PRIMARY KEY (`id`),
        ADD KEY `parent_id` (`parent_id`);
      ALTER TABLE `categories`
        MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
      ALTER TABLE `categories`
        ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
      COMMIT;
    "

];