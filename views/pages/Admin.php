<?php
session_start();
if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] ?? '') !== 'admin') {
    header('Location: ?page=connexion');
    exit;
}

$title = "Administration - Clubs Universitaires";
$description = "Gestion des utilisateurs, clubs, et contenu.";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="<?= htmlspecialchars($description) ?>" />
  <title><?= htmlspecialchars($title) ?></title>
  <link rel="stylesheet" href="public/style/bootstrap-4.0.0-dist/css/bootstrap.min.css" />
</head>
<body>
  <?php include __DIR__ . '/../components/header.php'; ?>

  <main class="container mt-4">
    <h1>Administration</h1>
    <p>Bienvenue, <?= htmlspecialchars($_SESSION['user']['prenom'] ?? 'Admin') ?>.</p>

    <div class="row">
      <div class="col-md-6">
        <h3>Gestion des utilisateurs</h3>
        <a href="?page=admin_users" class="btn btn-secondary mb-3">Voir les utilisateurs</a>
      </div>
      <div class="col-md-6">
        <h3>Gestion des clubs</h3>
        <a href="?page=admin_clubs" class="btn btn-secondary mb-3">Voir les clubs</a>
      </div>
    </div>

    <h3>Paramètres généraux</h3>
    <p>Fonctionnalités à développer selon besoins.</p>
  </main>

  <?php include __DIR__ . '/../components/footer.php'; ?>
  <script src="public/style/bootstrap-4.0.0-dist/js/jquery.min.js"></script>
  <script src="public/style/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
