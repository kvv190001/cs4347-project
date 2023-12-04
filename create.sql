CREATE TABLE `Users` (
  `id` integer PRIMARY KEY,
  `username` varchar(255),
  `password` varchar(255),
  `email` varchar(255),
  `created_at` timestamp
);

CREATE TABLE `History` (
  `show_id` integer,
  `user_id` integer,
  `last_watched` timestamp
);

CREATE TABLE `Shows` (
  `show_id` integer PRIMARY KEY,
  `title` varchar(255),
  `average_rating` decimal(2,1),
  `date_added` timestamp
);

CREATE TABLE `Episodes` (
  `episode_id` integer PRIMARY KEY,
  `show_id` integer,
  `filler_flag` boolean
);

CREATE TABLE `Reviews` (
  `review_id` integer PRIMARY KEY,
  `show_id` integer,
  `rating` decimal(2,1),
  `body` text COMMENT 'Content of the post',
  `user_id` integer,
  `created_at` timestamp
);

ALTER TABLE `History` ADD FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);

ALTER TABLE `Reviews` ADD FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);

ALTER TABLE `History` ADD FOREIGN KEY (`show_id`) REFERENCES `Shows` (`show_id`);

ALTER TABLE `Reviews` ADD FOREIGN KEY (`show_id`) REFERENCES `Shows` (`show_id`);

ALTER TABLE `Episodes` ADD FOREIGN KEY (`show_id`) REFERENCES `Shows` (`show_id`);