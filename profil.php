<?php
require_once "database/db.php";
require_once "helpers/functions.php";
not_allowed();
$page = _get_page_name();
$title = "profil";

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
    <main class="container-fluid">
        <?php include 'body/message_flash.php' ?>
        <h3 class="my-3">Profil</h3>


        <div class="row">
            <div class="col-md-3 mb-3">

                <div class="list-group">
                    <a href="profile" class="list-group-item list-group-item-action active" aria-current="true">
                        Donnée personnelle
                    </a>
                    <a href="reset-password.php" class="list-group-item list-group-item-action">
                        Changer votre mot de passe
                    </a>
                    <a href="logout.php" class="list-group-item list-group-item-action text-danger fw-bold">
                        Déconnécter
                    </a>
                </div>

            </div>
            <!-- col -->

            <div class="col-md-9">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>
                            Donnée personnelle
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Nom et prénom:
                                        <span>
                                            <?= ucfirst($_SESSION['auth']->nom) ?>
                                        </span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Adresse Email:
                                        <span>
                                            <?= $_SESSION['auth']->email ?>
                                        </span>
                                    </li>

                                </ul>
                            </div>
                            <!-- col -->
                            <div class="col">
                                <div class="card card-body">
                                    <center>
                                        <img width="150" src="https://ui-avatars.com/api/?background=random&format=svg&rounded=true&backgrounda=000&colora=fff&name=<?= $_SESSION['auth']->nom ?>" alt="">
                                    </center>
                                </div>

                            </div>
                            <!-- col -->
                        </div>
                        <!-- row -->
                    </div>
                    <!-- card-body -->
                </div>
                <!-- card -->

            </div>
            <!-- col -->
        </div>
        <!-- row -->

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <?php include "body/script.php" ?>

</body>

</html>