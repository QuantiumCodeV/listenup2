<?php
require "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $login = $_POST['email'];
    $password = $_POST['password'];
    $mysql = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_database);
    $sql = "INSERT INTO users (login, password) VALUES ('$login', '$password')";
    $mysql->query($sql);
    $mysql->close();
    echo "success";
}