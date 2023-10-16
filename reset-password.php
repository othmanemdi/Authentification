<?php
require_once "database/db.php";
require_once "helpers/functions.php";
not_allowed();
$page = _get_page_name();
$title = "Changer le mot de passe";

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
                    <a href="profil.php" class="list-group-item list-group-item-action ">
                        Donnée personnelle
                    </a>
                    <a href="reset-password.php" class="list-group-item list-group-item-action active" aria-current="true">
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
                            Changer votre mot de passe
                        </h5>
                    </div>

                    <div class="card-body">


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