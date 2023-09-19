<?php
require_once "database/db.php";
require_once "helpers/functions.php";
$page = _get_page_name();
$title = "L'historiques des utilisateurs";

// if (isset($_POST['filter'])) {
//     $plateform = e($_POST['plateform']);
//     $users_histo = $db->query("SELECT * FROM view_user_historique WHERE plateform = '$plateform' ORDER BY date_connected DESC")->fetchAll();
// } else {
//     $users_histo = $db->query("SELECT * FROM view_user_historique ORDER BY date_connected DESC")->fetchAll();
// }

$query = "";
if (isset($_POST['filter'])) {
    $plateform = e($_POST['plateform']);
    $query = " WHERE plateform = '$plateform' ";
}

$users_histo = $db->query("SELECT * FROM view_user_historique $query ORDER BY date_connected DESC")->fetchAll();


$plateforms = $db->query("SELECT DISTINCT plateform FROM view_user_historique ORDER BY plateform DESC ")->fetchAll();





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




                <form method="post" class="row">
                    <div class="col-md-4">

                        <div class="mb-3">
                            <label for="plateform" class="form-label">Plateforms</label>
                            <select class="form-select" name="plateform" id="plateform">
                                <?php foreach ($plateforms as $key => $p) : ?>
                                    <option value="<?= $p->plateform ?>"><?= $p->plateform ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <!-- mb-3 -->
                    </div>
                    <!-- col -->
                    <div class="col-md-4">
                        <button type="submit" name="filter" class="btn btn-light fw-bold mt-4">
                            <i class="bi bi-funnel-fill"></i>
                            Filter
                        </button>
                    </div>
                    <!-- col -->
                </form>
                <!-- row -->


                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-striped">
                        <theade>
                            <tr class="table-light">
                                <th>User id</th>
                                <th>Nom</th>
                                <th>Date de connection</th>
                                <th>IP Adresse</th>
                                <th>Plateform</th>
                            </tr>
                        </theade>
                        <tbody>
                            <?php foreach ($users_histo as $v) : ?>

                                <tr>
                                    <td>
                                        <?= $v->user_id ?>
                                    </td>
                                    <td>
                                        <?= $v->nom ?>
                                    </td>
                                    <td>
                                        <?=
                                        _datetime_format($v->date_connected);
                                        ?>
                                    </td>
                                    <td>
                                        <?= $v->ip ?>
                                    </td>
                                    <td>
                                        <?= _get_plateform($v->plateform) .  $v->plateform ?>
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