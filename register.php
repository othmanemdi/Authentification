<?php
require_once "database/db.php";
require_once "helpers/functions.php";
logged();

$page = _get_page_name();
$title = "register";

// $colors_string = "red green blue yellow";
// $colors = explode(' ', $colors_string);
// $cs = implode('-', $colors);
// dd($cs);

$errors = [];

if (isset($_POST['register'])) {

    if (isset($_POST['nom'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) {

        $nom = e($_POST['nom']);
        $email = e($_POST['email']);
        $password = e($_POST['password']);
        $confirm_password = e($_POST['confirm_password']);

        if (empty($nom) || !preg_match('/^[a-zA-Z ]+$/', $nom)) {
            $errors["nom"] = "Votre nom n'est pas valide";
            $nom_class_input = "is-invalid";
            $nom_class_feedback = "invalid-feedback";
        } else {
            $nom_class_input = "is-valid";
            $nom_class_feedback = "valid-feedback";
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Votre email n'est pas valide";
            $email_class_input = "is-invalid";
            $email_class_feedback = "invalid-feedback";
        } else {
            $req = $db->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
            $req->execute([$email]);
            $rows_user = $req->rowcount();

            if ($rows_user == 1) {
                $errors['email'] = 'Cet email ' . $email . ' est déjà utilisé pour un autre compte';
                $email_class_input = "is-invalid";
                $email_class_feedback = "invalid-feedback";
            } else {
                $email_class_input = "is-valid";
                $email_class_feedback = "valid-feedback";
            }
        } // Fin traitement email


        if (empty($password) || !preg_match('/^[a-zA-Z0-9-@$*. ]+$/', $password)) {
            $errors["password"] = "Votre mot de passe n'est pas valide";
            $password_class_input = "is-invalid";
            $password_class_feedback = "invalid-feedback";
        } else {

            if (empty($confirm_password) || ($password != $confirm_password)) {
                $errors["confirm_password"] = "Les deux mots de passe ne sont pas identiques";
                $confirm_password_class_input = "is-invalid";
                $confirm_password_class_feedback = "invalid-feedback";
                $password_class_input = "is-invalid";
                $password_class_feedback = "invalid-feedback";
            } else {
                $confirm_password_class_input = "is-valid";
                $confirm_password_class_feedback = "valid-feedback";

                $password_class_input = "is-valid";
                $password_class_feedback = "valid-feedback";
            }
        }
    } else {
        $errors[] = "Veuillez remplire tous les champs";
    }

    if (empty($errors)) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $req = $db->prepare("INSERT INTO users SET nom = :nom, email = :email, password = :password ");
        $req->execute(['nom' => $nom, 'email' => $email, 'password' => $password_hash]);
        // $user_id = $db->lastInsertId();

        $_SESSION['color'] = 'info';
        $_SESSION['message'] = 'Bien enregister';
        // http_response_code(308);
        // // header("HTTP/1.1 301 Moved Permanently");
        // // header("Location: /option-a");
        header('Location: login.php', true, 301);
        exit;
        exit();
    } else {
        // $_SESSION['color'] = 'danger';
        // $_SESSION['message'] = implode('<br>', $errors);
        // header('Location: register2.php');
        // exit();
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
                            <b><?= $key ?></b>
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
                        <h4>Register</h4>
                    </div>

                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control <?= $nom_class_input ?>" name="nom" id="nom" placeholder="Nom:" value="<?= $nom ?? '' ?>">

                                <span class="text-danger <?= $nom_class_feedback ?? '' ?>">
                                    <?= $errors["nom"] ?? '' ?>
                                </span>
                            </div>

                            <?php // input($nom, $nom_class_input, $nom_class_feedback, $errors["nom"]) 
                            ?>



                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control <?= $email_class_input ?>" name="email" id="email" placeholder="Email:" value="<?= $email ?? '' ?>">
                                <span class="text-danger <?= $email_class_feedback ?? '' ?>">
                                    <?= $errors["email"] ?? '' ?>
                                </span>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control <?= $password_class_input ?>" name="password" id="password" placeholder="Password:">
                                <span class="text-danger <?= $password_class_feedback ?? '' ?>">
                                    <?= $errors["password"] ?? '' ?>
                                </span>
                            </div>

                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirme Password</label>
                                <input type="password" class="form-control <?= $confirm_password_class_input ?>" name="confirm_password" id="confirm_password" placeholder="Confirme Password:">
                                <span class="text-danger <?= $confirm_passwordclass_feedback ?? '' ?>">
                                    <?= $errors["confirm_password"] ?? '' ?>
                                </span>
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