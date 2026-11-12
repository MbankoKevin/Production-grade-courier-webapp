CREATE TABLE IF NOT EXISTS `users` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT IGNORE INTO `users` (`user_id`, `email`, `username`, `password`) VALUES
(1, 'kingveli@gmail.com', 'admin', MD5('admin123'));

CREATE TABLE IF NOT EXISTS `shipments` (
  `track_id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `jname` VARCHAR(255) NOT NULL,
  `jadd` VARCHAR(255) NOT NULL,
  `jcountry` VARCHAR(255) NOT NULL,
  `jemail` VARCHAR(255) NOT NULL,
  `jnumber` VARCHAR(255) NOT NULL,
  `sname` VARCHAR(255) NOT NULL,
  `sadd` VARCHAR(255) NOT NULL,
  `scountry` VARCHAR(255) NOT NULL,
  `semail` VARCHAR(255) NOT NULL,
  `snumber` VARCHAR(255) NOT NULL,
  `prod` VARCHAR(255) NOT NULL,
  `mode` VARCHAR(255) NOT NULL,
  `Ship_date` VARCHAR(255) NOT NULL,
  `carrier` VARCHAR(255) NOT NULL,
  `ddate` VARCHAR(255) NOT NULL,
  `Ship_time` VARCHAR(255) NOT NULL,
  `dtime` VARCHAR(255) NOT NULL,
  `currentl` VARCHAR(255) NOT NULL,
  `pickupl` VARCHAR(255) NOT NULL,
  `status` VARCHAR(255) NOT NULL,
  `deliverys` VARCHAR(255) NOT NULL,
  `cat` VARCHAR(255) NOT NULL,
  `weight` VARCHAR(255) NOT NULL,
  `item` VARCHAR(255) NOT NULL,
  `descrip` VARCHAR(255) NOT NULL,
  `ship_id` VARCHAR(255) NOT NULL,
  `lon` VARCHAR(255) NOT NULL,
  `lat` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`track_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;