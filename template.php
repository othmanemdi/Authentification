<?php
require_once "database/db.php";
require_once "helpers/functions.php";
$page = _get_page_name();
$title = "page";
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

        <h3 class="my-3">Page</h3>

        <?php include 'body/message_flash.php' ?>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <?php include "body/script.php" ?>

</body>

</html>