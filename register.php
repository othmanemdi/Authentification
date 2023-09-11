<?php
require_once "database/db.php";
require_once "helpers/functions.php";
$page = "register";
$title = "register";


if (isset($_POST['register'])) {

    $nom = e($_POST['nom']);
    $email = e($_POST['email']);
    $password = e($_POST['password']);

    $req = $db->prepare("INSERT INTO users SET nom = ?, password = ?, email = ? ");
    $req->execute([$_POST['nom'], $password, $_POST['email']]);
    // $user_id = $db->lastInsertId();

    // $req = $db->prepare("INSERT INTO user_historique SET user_id = ?, ip = ?");
    // $req->execute([$user_id, IP]);

    $_SESSION['message'] = "Bien enregister";
    $_SESSION['color'] = "info";
    header('Location:login.php');
    exit;
}

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

        <div class="row justify-content-center g-2 mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>

                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="nom" id="nom" placeholder="Email:">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email:">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password:">
                            </div>

                            <button type="submit" name="register" class="btn btn-primary">
                                Register
                            </button>
                        </form>
                    </div>
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