<?php

   $conn = mysqli_connect('10.10.10.1', 'root', 'Flag{I_know_g1tHab}');
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   $sql = "CREATE DATABASE IF NOT EXISTS test";
   if ($conn->query($sql) === TRUE) {
      echo "Database created successfully";
   } else {
      echo "Error creating database: " . $conn->error;
   }

   mysqli_query($conn, "CREATE USER IF NOT EXISTS 'mysqluser'@'%' IDENTIFIED BY 'password';");
   mysqli_query($conn, "GRANT ALL ON test.* TO 'mysqluser'@'%';");
   mysqli_query($conn, "FLUSH PRIVILEGES;");
   // mysql -umysqluser -ppassword
   
   mysqli_close($conn);

   $conn = mysqli_connect("10.10.10.1", "mysqluser", "password");
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   mysqli_select_db($conn, "test");

   mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `persons` ( `id` bigint unsigned NOT NULL AUTO_INCREMENT, `name` varchar(255) DEFAULT NULL COMMENT 'Имя пользователя', `birthday` date DEFAULT NULL COMMENT 'Дата рождения', `created` datetime DEFAULT CURRENT_TIMESTAMP, `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY (`id`), UNIQUE KEY `id` (`id`)) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='пользователи';");
   $res = mysqli_query($conn, "INSERT INTO `persons` (`id`, `name`, `birthday`, `created`, `updated`) VALUES (1, 'Иванов', '1991-03-31', '2021-03-31 23:16:11', '2021-03-31 23:16:24'), (2, 'Петров', '1990-01-28', '2021-03-31 23:16:34', '2021-03-31 23:16:42'), (3, 'Сидоров', '1992-06-01', '2021-03-31 23:17:02', '2021-03-31 23:17:02'),(4, 'Малинин', '1982-05-01', '2021-03-31 23:21:12', '2021-03-31 23:21:12'),(5, 'Третьяк', '1992-07-24', '2021-03-31 23:30:32', '2021-03-31 23:30:48'),(6, 'Вишин', '1991-12-31', '2021-03-31 23:31:17', '2021-03-31 23:31:17'),(7, 'Соловьев', '2001-03-31', '2021-03-31 23:31:43', '2021-03-31 23:31:43');");

   mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `request` (`id` bigint unsigned NOT NULL AUTO_INCREMENT,`user_id` int unsigned DEFAULT NULL,`created` datetime DEFAULT CURRENT_TIMESTAMP,`updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,PRIMARY KEY (`id`),UNIQUE KEY `id` (`id`),KEY `index_of_user_id` (`user_id`)) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Заказы';");
   $res = mysqli_query($conn, "INSERT INTO `request` (`id`, `user_id`, `created`, `updated`) VALUES(1, 1, '2021-03-31 23:19:01', '2021-03-31 23:19:01'),(2, 1, '2021-03-31 23:19:01', '2021-03-31 23:19:01'),(3, 2, '2021-03-31 23:19:01', '2021-03-31 23:19:01');");

   mysqli_close($conn);
   
   ?>
