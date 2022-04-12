<?php

return [
    "
      CREATE TABLE `galleries` (
        `id` bigint(20) NOT NULL,
        `image` varchar(191) NOT NULL,
        `advertise_id` bigint(20) NOT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        `deleted_at` datetime DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
      ALTER TABLE `galleries`
        ADD PRIMARY KEY (`id`),
        ADD KEY `advertise_id` (`advertise_id`);
      ALTER TABLE `galleries`
        MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
      ALTER TABLE `galleries`
        ADD CONSTRAINT `galleries_ibfk_1` FOREIGN KEY (`advertise_id`) REFERENCES `ads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
      COMMIT;
    "
];