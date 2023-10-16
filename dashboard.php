<?php
require_once "database/db.php";
require_once "helpers/functions.php";
not_allowed();
$page = _get_page_name();
$title = "dashboard";

?>
<!doctype html>
<html lang="en">

<head>
    <?php include "body/header.php" ?>
</head>

<body>
    <header>
        <!-- place navbar here -->
        <?php include "body/nav.php" ?>
    </header>
    <main class="container">
        <?php include 'body/message_flash.php' ?>
        <h3 class="my-3">Dashboard</h3>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <?php include "body/script.php" ?>

</body>

</html>