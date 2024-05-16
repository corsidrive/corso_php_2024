<?php
use service\autenticate\AutenticateService;

$is_auth = AutenticateService::isAutenticate();
$user = AutenticateService::getAuthenticatedUser();
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rispondituttogame</title>
    <link href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="./vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <header class="p-5 bg-primary text-center text-light">
        <h1 class="h3">Rispondituttogame</h1>
        <?php if ($is_auth): ?>
            <span><?= $user->nome . " " . $user->cognome ?><span>
                    <span><a class="btn btn-outline-light" href="logout.php">logout<a></span>
                <?php endif ?>

    </header>
    <!-- NAV BAR inizio -->
    <?php if ($is_auth): ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="#">RG</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="users_index.php">Classifica</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./nuova_partita.php">Nuova Partita</a>
                        </li>
                     
                    
                    </ul>
                </div>
            </div>
        </nav>
    <?php endif ?>
    <!-- NAV BAR fine -->
    <main class="pt-5">