<?php


return [
    "
      CREATE TABLE `slides` (
        `id` bigint(20) NOT NULL,
        `title` varchar(191) NOT NULL,
        `url` varchar(191) NOT NULL,
        `address` varchar(191) DEFAULT NULL,
        `amount` varchar(191) DEFAULT NULL,
        `body` text NOT NULL,
        `image` varchar(191) NOT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        `deleted_at` datetime DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
      ALTER TABLE `slides`
        ADD PRIMARY KEY (`id`);
      ALTER TABLE `slides`
        MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
      COMMIT;
    "
];