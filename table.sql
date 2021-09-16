CREATE DATABASE IF NOT EXISTS `battlegame` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `battlegame`;

CREATE TABLE `personnages` (
    `id` int(11) NOT NULL,
    `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    `force` int(11) NOT NULL,
    `degats` int(11) NOT NULL,
    `niveau` int(11) NOT NULL,
    `experience` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=UTF8_UNICODE_CI;

ALTER TABLE `personnages` ADD PRIMARY KEY (`id`);
ALTER TABLE `personnages` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

INSERT INTO personnages (`id`, `nom`, `force`, `degats`, `niveau`, `experience`) VALUES
 (1, 'Walter', 50, 0, 2, 0),
 (2, 'Leny', 80, 0, 1, 0);