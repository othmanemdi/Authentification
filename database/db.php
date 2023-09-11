<?php
// https://www.php.net/manual/fr/book.pdo.php
$db_name = "auth";
$host = "127.0.0.1";
$db_username = "root";
$db_password = "";
$envirenement = "local"; // production

try {
    if ($envirenement === "local") {
        $error_mode = "PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION";
    } else if ($envirenement === "production") {
        $error_mode = "";
    }

    $db = new PDO('mysql:dbname=' . $db_name . ';host=' . $host, $db_username, $db_password, [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, //  FETCH_OBJ or FETCH_ASSOC or FETCH_CLASS
        $error_mode
    ]);
} catch (\Throwable $e) {
    echo "Error Database";
    die();
}
