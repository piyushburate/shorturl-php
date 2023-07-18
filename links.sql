CREATE TABLE `links` (
  `id` int(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `link` varchar(2000) NOT NULL,
  `uid` int(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `qr_code` int(11) NOT NULL DEFAULT '0',
  `clicks` bigint(20) NOT NULL DEFAULT '0',
  `link_active` tinyint(1) NOT NULL DEFAULT '1'
);

ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

ALTER TABLE `links`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
