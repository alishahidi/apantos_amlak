<?php

return [
  "
    CREATE TABLE `ads` (
      `id` bigint(20) NOT NULL,
      `title` varchar(191) NOT NULL,
      `description` text NOT NULL,
      `address` text NOT NULL,
      `amount` varchar(191) NOT NULL,
      `image` varchar(191) NOT NULL,
      `floor` varchar(191) NOT NULL,
      `year` int(11) NOT NULL,
      `storeroom` tinyint(1) NOT NULL,
      `balcony` tinyint(1) NOT NULL,
      `area` int(11) NOT NULL,
      `room` tinyint(5) NOT NULL,
      `toilet` enum('ایرانی','فرنگی','ایرانی و فرنگی','') NOT NULL,
      `parking` tinyint(5) NOT NULL,
      `tag` varchar(191) NOT NULL,
      `user_id` bigint(20) NOT NULL,
      `cat_id` int(20) NOT NULL,
      `status` tinyint(5) NOT NULL,
      `sell_status` tinyint(4) NOT NULL,
      `type` tinyint(4) NOT NULL,
      `view` int(11) NOT NULL DEFAULT 0,
      `created_at` datetime NOT NULL,
      `updated_at` datetime NULL,
      `deleted_at` datetime NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ALTER TABLE `ads`
      ADD PRIMARY KEY (`id`),
      ADD KEY `user_id` (`user_id`,`cat_id`),
      ADD KEY `cat_id` (`cat_id`);
    ALTER TABLE `ads`
      MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
    COMMIT;
    ALTER TABLE `ads`
      ADD CONSTRAINT `ads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
      ADD CONSTRAINT `ads_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;
    "
];
