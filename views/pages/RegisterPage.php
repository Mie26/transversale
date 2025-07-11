<?php
$title = "Inscription - Clubs Universitaires";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($title) ?></title>
  <!-- Bootstrap 4 CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

  <!-- Style personnalisé sombre -->
  <style>
    body {
        background: linear-gradient(to right, #121212, #1f1f1f);
        color: #f8f9fa;
    }

    .card {
        background-color: #2d2d35; /* clair par rapport au fond */
        border: none;
        border-radius: 0.75rem;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
    }

    .form-control {
        background-color: #3b3b48;
        color: #fff;
        border: 1px solid #555;
    }

    .form-control::placeholder {
        color: #bbb;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    a {
        color: #66b2ff;
    }

    a:hover {
        color: #99ccff;
        text-decoration: none;
    }

    .alert-danger {
        background-color: #dc3545;
        border: none;
        color: #fff;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card shadow-lg">
        <div class="card-body">
          <h2 class="text-center mb-4">Inscription</h2>

          <?php if (!empty($_SESSION['error'])): ?>
            <div class="alert alert-danger" role="alert">
              <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
          <?php endif; ?>

          <form method="post" action="?page=doRegister">
            <div class="form-group">
              <label for="nom">Nom :</label>
              <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrez votre nom" required />
            </div>

            <div class="form-group">
              <label for="email">Email :</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Entrez votre email" required />
            </div>

            <div class="form-group">
              <label for="motdepasse">Mot de passe :</label>
              <input type="password" name="motdepasse" class="form-control" id="motdepasse" placeholder="Choisissez un mot de passe" required />
            </div>

            <button type="submit" class="btn btn-success btn-block">S'inscrire</button>
          </form>

          <hr class="bg-secondary" />
          <p class="text-center mt-3">
            Déjà inscrit ?
            <a href="?page=connexion">Se connecter</a>
          </p>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Scripts Bootstrap 4 -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
