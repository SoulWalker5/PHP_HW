DROP DATABASE IF EXISTS `products`;

CREATE DATABASE IF NOT EXISTS `products`;

USE `products`;

CREATE TABLE IF NOT EXISTS `products` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(50),
    `price` float,
    `amount` INT NOT NULL,
    `description` VARCHAR(50)
    );

INSERT INTO `products` (`title`, `price`,`amount`, `description`)
VALUES('SomeProd1',30,356,'Lorem'),
       ('SomeProd2',31,359,'Ipsum'),
       ('SomeProd3',32,362,'simply'),
       ('SomeProd4',33,365,'dummy'),
       ('SomeProd5',34,368,'printing'),
       ('SomeProd6',35,371,'text');

CREATE TABLE IF NOT EXISTS `roles`(
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `firstname` VARCHAR(50),
    `email` VARCHAR(320),
    `password` TEXT,
    `date_created` DATETIME NOT NULL,
    `role_id` INT(11) NOT NULL DEFAULT 1,
     FOREIGN KEY(`role_id`) REFERENCES `roles` (`id`)
);

CREATE TABLE IF NOT EXISTS `orders`(
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `number` INT(11) NOT NULL,
    `user_id`INT(11) NOT NULL,
    FOREIGN KEY(`user_id`) REFERENCES `users` (`id`)
);

CREATE TABLE IF NOT EXISTS `orders_products`(
    `order_id` INT(11) NOT NULL,
    `product_id` INT(11) NOT NULL,
    `quantity` INT(11) NOT NULL,
    FOREIGN KEY(`order_id`) REFERENCES `orders` (`id`),
    FOREIGN KEY(`product_id`) REFERENCES `products` (`id`)
    );

INSERT INTO `roles`(`title`)
VALUES ('user'),
       ('admin');

INSERT INTO `users`(`email`, `firstname`,`password`, `date_created`, `role_id`)
VALUES ('user@gg.com', 'UserName', '$2y$10$snCNHhsTA2c685VAktkTxOPZxaISZur1ub..rqStcFXYUTYtyVyvO', '2021-03-16 14:06:35', 1),
       ('adm@gg.com', 'UserName', '$2y$10$MNAACCQ8XFMZGvMLWqK8GOdQOCLwxKEsyATbSFm4vFWuLdLQKhaWm', '2021-03-17 12:08:18', 2);

INSERT INTO `orders`(`number`, `user_id`)
VALUES (18021 ,4);

INSERT INTO `orders_products`(`order_id`, `product_id`, `quantity`)
VALUES (1 ,1 ,100),
       (1 ,3 ,1);

