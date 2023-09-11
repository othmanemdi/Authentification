<?php
require_once "database/db.php";
require_once "helpers/functions.php";
$page = "login";
$title = "login";

if (isset($_POST['login'])) {

    $email = e($_POST['email']);
    $password = e($_POST['password']);

    $req = $db->prepare("SELECT id FROM users WHERE email = :email  AND password = :password LIMIT 1");
    $req->execute(['email' => $email, 'password' => $password]);
    $rows = $req->rowCount();
    if ($rows == 0) {
        $_SESSION['message'] = "Mot de passe incorrecte";
        $_SESSION['color'] = "danger";
        header('Location:login.php');
        exit;
    }
    $user_id = $req->fetch()->id;

    $req = $db->prepare("INSERT INTO user_historique SET user_id = ?, ip = ?");
    $req->execute([$user_id, IP]);

    $_SESSION['message'] = "Bien coonecter";
    $_SESSION['color'] = "info";
    header('Location:dashboard.php');
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
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email:">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password:">
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="remember_me" name="remember_me">
                                        <label class="form-check-label" for="remember_me">
                                            Se souvenire de moi
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <a href="recuperation_password.php">
                                        Mot de passe oublier
                                    </a>
                                </div>

                            </div>

                            <button type="submit" name="login" class="btn btn-primary fw-bold">
                                Se connecter
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