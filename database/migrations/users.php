<?php

return [
    "
      CREATE TABLE `users` (
        `id` bigint(20) NOT NULL,
        `email` varchar(191) NOT NULL,
        `first_name` varchar(191) NOT NULL,
        `last_name` varchar(191) NOT NULL,
        `avatar` varchar(191) NOT NULL,
        `password` text NOT NULL,
        `status` tinyint(5) NOT NULL DEFAULT 0,
        `is_active` tinyint(5) NOT NULL DEFAULT 0,
        `verify_token` varchar(191) DEFAULT NULL,
        `user_type` varchar(191) NOT NULL,
        `remember_token` varchar(191) DEFAULT NULL,
        `remember_token_expire` datetime DEFAULT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        `deleted_at` datetime DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
      ALTER TABLE `users`
        ADD PRIMARY KEY (`id`),
        ADD UNIQUE KEY `email` (`email`);
      ALTER TABLE `users`
        MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
      COMMIT;
    "
];