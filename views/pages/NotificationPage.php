<?php
if (!isset($_SESSION['user'])) {
    header('Location: ?page=connexion');
    exit;
}

$title = "Notifications - Clubs Universitaires";
$description = "Consultez vos notifications.";
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
    <h1>Notifications</h1>
    <div class="list-group">
      <?php
      // Exemples statiques : à remplacer par les notifications de la base
      $notifications = [
          ['message' => 'Nouveau atelier disponible dans le Club Informatique', 'date' => '2025-07-01'],
          ['message' => 'Le match de football a été reporté', 'date' => '2025-07-03'],
          ['message' => 'Réunion exceptionnelle du Club Littéraire le 10 juillet', 'date' => '2025-07-05'],
      ];

      foreach ($notifications as $notif) {
          echo '<div class="list-group-item">';
          echo '<strong>' . htmlspecialchars($notif['date']) . ' :</strong> ';
          echo htmlspecialchars($notif['message']);
          echo '</div>';
      }
      ?>
    </div>
  </main>

  <?php include __DIR__ . '/../components/footer.php'; ?>
  <script src="public/style/bootstrap-4.0.0-dist/js/jquery.min.js"></script>
  <script src="public/style/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
