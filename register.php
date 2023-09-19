<?php
require_once "database/db.php";
require_once "helpers/functions.php";
$page = _get_page_name();
$title = "register";

$errors = [];

if (isset($_POST['register'])) {

    if (isset($_POST['nom'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) {

        $nom = e($_POST['nom']);
        $email = e($_POST['email']);
        $password = e($_POST['password']);
        $confirm_password = e($_POST['confirm_password']);

        if ($nom == '') {
            $errors[] = "Veuillez saisire le champ (nom)";
        }

        if (strlen($nom) < 3) {
            $errors[] = "(nom) Veuillez saisire Plus que 3 charactéres";
        }

        if (!preg_match('/^[a-zA-Z]+$/', $nom)) {
            $errors[] = "(nom) Seul les charactére sont autoriser";
        }


        if ($email == '') {
            $errors[] = "Veuillez saisire le champ (email)";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email invalide";
        }

        // $email_rows = $db->query("SELECT id FROM users WHERE email = '$email' LIMIT 1")->rowCount();

        $req = $db->prepare("SELECT id FROM users WHERE email = ? LIMIT 1");
        $req->execute([$email]);
        $email_rows =  $req->rowCount();

        if ($email_rows == 1) {
            $errors[] = "Cet email '" . $email . "' est déja pris";
        }

        if ($password == '') {
            $errors[] = "Veuillez saisire le champ (password)";
        }

        if (strlen($password) < 6) {
            $errors[] = "(password) Veuillez saisire Plus que 6 charactéres";
        }

        if ($confirm_password == '') {
            $errors[] = "Veuillez saisire le champ (confirm_password)";
        }

        if ($password != $confirm_password) {
            $errors[] = "Les deux mot de passe ne sont pas identique";
        }
    } else {
        $errors[] = "Veuillez remplire tous les champs";
    }

    // Ok
    if (empty($errors)) {

        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        dd($password_hash);


        $req = $db->prepare("INSERT INTO users SET nom = ?, email = ?, password = ? ");
        $req->execute([$nom, $email, $password_hash]);
        $_SESSION['message'] = 'Bien enregistrer';
        $_SESSION['color'] = 'info';
        header('Location: login.php');
        exit;
    } else {
        dd($errors);
    }

    exit;




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
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Register</h5>
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

                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Your Password</label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Your Password:">
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