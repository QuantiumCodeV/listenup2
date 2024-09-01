<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "config.php";

$sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
)";

$mysql = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_database);

$mysql->query($sql);

$mysql->close();

echo "Table Users created";