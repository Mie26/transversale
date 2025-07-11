<?php
$title = "Connexion - Clubs Universitaires";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= htmlspecialchars($title) ?></title>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

    <!-- Style personnalisé sombre avec carte claire -->
    <style>
        body {
            background: linear-gradient(to right, #121212, #1f1f1f);
            color: #f8f9fa;
        }

        .card {
            background-color: #2d2d35; /* Un peu plus clair que le fond */
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }

        .card-header {
            background-color: #444;
            color: #ffffff;
            border-bottom: 1px solid #555;
        }

        .form-control {
            background-color: #3b3b48;
            color: #fff;
            border: 1px solid #555;
        }

        .form-control::placeholder {
            color: #bbb;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0069d9;
        }

        a {
            color: #66b2ff;
        }

        a:hover {
            color: #99ccff;
            text-decoration: none;
        }

        .alert {
            color: #fff;
        }

        .alert-success {
            background-color: #28a745;
            border: none;
        }

        .alert-danger {
            background-color: #dc3545;
            border: none;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg">
                <div class="card-header text-center">
                    <h4 class="mb-0">Clubs Universitaires</h4>
                </div>
                <div class="card-body">
                    <h5 class="text-center mb-4">Connexion</h5>

                    <?php if (!empty($_SESSION['success'])): ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_SESSION['success']; unset($_SESSION['success']); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($_SESSION['error'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="?page=login">
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Entrez votre email" required />
                        </div>

                        <div class="form-group">
                            <label for="motdepasse">Mot de passe :</label>
                            <input type="password" name="motdepasse" class="form-control" id="motdepasse" placeholder="Entrez votre mot de passe" required />
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                    </form>

                    <hr class="bg-secondary" />
                    <p class="text-center">
                        Pas encore de compte ?
                        <a href="index.php?page=register">S'inscrire</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
