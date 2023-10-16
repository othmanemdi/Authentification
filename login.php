<?php
require_once "database/db.php";
require_once "helpers/functions.php";
logged();

$page = _get_page_name();
$title = "login";
// var_dump(http_response_code(404));
// exit;
$plateform = trim($_SERVER['HTTP_SEC_CH_UA_PLATFORM'], '"');
$errors = [];

if (isset($_POST['login'])) {
    // dd($_SERVER['REQUEST_METHOD']);
    // dd(123);
    if (isset($_POST['email'], $_POST['password'])) {
        $email = e($_POST['email']);
        $password = e($_POST['password']);

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Votre email n'est pas valide";
            $email_class_input = "is-invalid";
            $email_class_feedback = "invalid-feedback";
        } else {
            $email_class_input = "is-valid";
            $email_class_feedback = "valid-feedback";
        } // Fin traitement email

        if (empty($password) || !preg_match('/^[a-zA-Z0-9-@$*. ]+$/', $password)) {
            $errors["password"] = "Votre mot de passe n'est pas valide";
            $password_class_input = "is-invalid";
            $password_class_feedback = "invalid-feedback";
        } else {
            $password_class_input = "is-valid";
            $password_class_feedback = "valid-feedback";
        }
    } else {
        $errors[] = "Veuillez remplire votre email et mot de passe";
    }
    if (empty($errors)) {

        $req = $db->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
        $req->execute([$email]);
        $fetch_user = $req->fetch();
        $password_hash = $fetch_user->password;

        if (password_verify($password, $password_hash)) {
            $user_id = $fetch_user->id;
            $req = $db->prepare("INSERT INTO user_historique SET user_id = ?, ip = ?, plateform = ?");
            $req->execute([$user_id, IP, $plateform]);

            $_SESSION['auth'] = $fetch_user;

            $_SESSION['message'] = "Bien coonecter";
            $_SESSION['color'] = "info";
            header('Location:dashboard.php');
            exit;
        } else {
            $_SESSION['message'] = "Mot de passe ou email incorrecte";
            $_SESSION['color'] = "danger";
            $email_class_input = "is-invalid";
            $password_class_input = "is-invalid";
            // header('Location:login.php');
            // exit;
        }
    }
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
        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $key => $e) : ?>
                        <li>
                            <b><?= ucfirst($key) ?></b>
                            <?= $e ?>
                        </li>
                    <?php endforeach  ?>
                </ul>
            </div>
        <?php endif ?>

        <div class="row justify-content-center g-2 mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control <?= $email_class_input ?? '' ?>" name="email" id="email" placeholder="Email:" value="<?= $_POST['email'] ?? '' ?>">
                                <span class="text-danger <?= $email_class_feedback ?? '' ?>">
                                    <?= $errors["email"] ?? '' ?>
                                </span>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control <?= $password_class_input ?? '' ?>" name="password" id="password" placeholder="Password:">
                                <span class="text-danger <?= $password_class_feedback ?? '' ?>">
                                    <?= $errors["password"] ?? '' ?>
                                </span>
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