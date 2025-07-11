<?php
if (!isset($_SESSION['user'])) {
    header('Location: ?page=connexion');
    exit;
}

$title = "Tableau de bord - Clubs Universitaires";
$description = "Votre tableau de bord personnalisé.";
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
    <h1>Tableau de bord</h1>
    <p>Bonjour, <?= htmlspecialchars($_SESSION['user']['prenom'] ?? 'Utilisateur') ?>.</p>

    <div class="card mb-4">
      <div class="card-header">Mes clubs inscrits</div>
      <ul class="list-group list-group-flush">
        <?php
        // Exemples statiques à remplacer par données issues de ta DB
        $mesClubs = [
          'Club Informatique',
          'Club Littéraire',
        ];
        foreach ($mesClubs as $club) {
            echo '<li class="list-group-item">' . htmlspecialchars($club) . '</li>';
        }
        ?>
      </ul>
    </div>

    <div class="card">
      <div class="card-header">Activités récentes</div>
      <div class="card-body">
        <ul>
          <li>Atelier programmation le 15 juillet</li>
          <li>Conférence Club Littéraire le 20 juillet</li>
          <li>Match de football amical le 22 juillet</li>
        </ul>
      </div>
    </div>
  </main>

  <?php include __DIR__ . '/../components/footer.php'; ?>
  <script src="public/style/bootstrap-4.0.0-dist/js/jquery.min.js"></script>
  <script src="public/style/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
