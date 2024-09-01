<?php

require "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mysql = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_database);
    $sql = "SELECT * FROM users WHERE login = '$email' AND password = '$password'";
    $result = $mysql->query($sql);

    if ($result->num_rows > 0) {
        echo "success";
    }
    else{
        echo "error";
    }
    $mysql->close();
}