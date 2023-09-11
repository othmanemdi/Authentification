<?php
require_once "database/db.php";
require_once "helpers/functions.php";
$page = "user_historique";
$title = "L'historiques des utilisateurs";

$users_histo = $db->query("SELECT * FROM view_user_historique")->fetchAll();

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

        <h3 class="my-3">L'historiques des utilisateurs</h3>

        <?php include 'body/message_flash.php' ?>


        <div class="card mt-2">
            <div class="card-header">
                <h5>
                    L'historiques des utilisateurs
                </h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-striped">
                        <theade>
                            <tr class="table-light">
                                <th>User id</th>
                                <th>Nom</th>
                                <th>Date de connection</th>
                                <th>IP Adresse</th>
                            </tr>
                        </theade>
                        <tbody>
                            <?php foreach ($users_histo as $key => $v) : ?>

                                <tr>
                                    <td>
                                        <?= $v->user_id ?>
                                    </td>
                                    <td>
                                        <?= $v->nom ?>
                                    </td>
                                    <td>
                                        <?= $v->date_connected ?>
                                    </td>
                                    <td>
                                        <?= $v->ip ?>
                                    </td>
                                </tr>
                            <?php endforeach  ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <?php include "body/script.php" ?>

</body>

</html>