<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Authentification</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">

                <?php if (!isset($_SESSION['auth'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'index' ? 'fw-bold text-danger' : '' ?>" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'contact' ? 'fw-bold text-danger' : '' ?>" href="contact.php">Contact</a>
                    </li>
                <?php else : ?>

                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'dashboard' ? 'fw-bold text-danger' : '' ?>" href="dashboard.php">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'user_historique' ? 'fw-bold text-danger' : '' ?>" href="user_historique.php">Historique des utilisateurs</a>
                    </li>
                <?php endif ?>

            </ul>
            <ul class="d-flex navbar-nav my-2 my-lg-0">

                <?php if (isset($_SESSION['auth'])) : ?>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?background=random&format=svg&rounded=true&backgrounda=000&colora=fff&name=<?= $_SESSION['auth']->nom ?>" alt="mdo" width="32" height="32" class="rounded-circle">

                            <?= ucfirst($_SESSION['auth']->nom) ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profil.php">Profil</a></li>
                            <li><a class="dropdown-item" href="logout.php">Deconnexion</a></li>
                        </ul>
                    </li>


                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'login' ? 'fw-bold text-danger' : '' ?>" href="login.php">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'register' ? 'fw-bold text-danger' : '' ?>" href="register.php">Register</a>
                    </li>
                <?php endif ?>

            </ul>
        </div>
    </div>
</nav>