CREATE TABLE `post`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(100) NOT NULL,
    `content` TEXT NOT NULL,
    `id_user` BIGINT NOT NULL,
    `like` BIGINT NOT NULL,
    `id_categorie` BIGINT NOT NULL
);
CREATE TABLE `image`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `link` TEXT NOT NULL
);
CREATE TABLE `sous_categorie`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_categorie` BIGINT UNSIGNED NOT NULL,
    `name` VARCHAR(100) NOT NULL
);
CREATE TABLE `categorie`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL
);
CREATE TABLE `report`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `report_post` BIGINT UNSIGNED NULL,
    `report_comment` BIGINT UNSIGNED NULL,
    `id_user` BIGINT UNSIGNED NOT NULL
);
CREATE TABLE `comment`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(100) NOT NULL,
    `content` TEXT NOT NULL,
    `likes` BIGINT NOT NULL,
    `id_post` BIGINT UNSIGNED NOT NULL
);
CREATE TABLE `user`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `email` VARCHAR(150) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `pseudo` VARCHAR(100) NOT NULL,
    `statut` VARCHAR(50) NOT NULL,
    `pdp` BIGINT UNSIGNED NOT NULL,
    `bio` TEXT NULL
);
ALTER TABLE
    `user` ADD CONSTRAINT `user_pdp_foreign` FOREIGN KEY(`pdp`) REFERENCES `image`(`id`);
ALTER TABLE
    `report` ADD CONSTRAINT `report_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `user`(`id`);
ALTER TABLE
    `post` ADD CONSTRAINT `post_id_categorie_foreign` FOREIGN KEY(`id_categorie`) REFERENCES `sous_categorie`(`id`);
ALTER TABLE
    `report` ADD CONSTRAINT `report_report_post_foreign` FOREIGN KEY(`report_post`) REFERENCES `post`(`id`);
ALTER TABLE
    `sous_categorie` ADD CONSTRAINT `sous_categorie_id_categorie_foreign` FOREIGN KEY(`id_categorie`) REFERENCES `categorie`(`id`);
ALTER TABLE
    `post` ADD CONSTRAINT `post_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `user`(`id`);
ALTER TABLE
    `comment` ADD CONSTRAINT `comment_id_post_foreign` FOREIGN KEY(`id_post`) REFERENCES `post`(`id`);
ALTER TABLE
    `report` ADD CONSTRAINT `report_report_comment_foreign` FOREIGN KEY(`report_comment`) REFERENCES `comment`(`id`);