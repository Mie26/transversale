<?php
if (!isset($_SESSION['user'])) {
    header('Location: ?page=connexion');
    exit;
}

$title = "Activités - Clubs Universitaires";
$description = "Liste des activités proposées par les clubs.";
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

  <main class="container">
    <h1>Activités des clubs</h1>
    <p>Voici les activités à venir :</p>

    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th>Nom de l'activité</th>
          <th>Date</th>
          <th>Club</th>
          <th>Lieu</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Atelier Programmation</td>
          <td>15 juillet 2025</td>
          <td>Club Informatique</td>
          <td>Amphithéâtre 1</td>
        </tr>
        <tr>
          <td>Exposition artistique</td>
          <td>17 juillet 2025</td>
          <td>Club Artistique</td>
          <td>Galerie Universitaire</td>
        </tr>
        <tr>
          <td>Compétition Robotique</td>
          <td>19 juillet 2025</td>
          <td>Club Robotique</td>
          <td>Salle TechLab</td>
        </tr>
        <tr>
          <td>Journée Écologie</td>
          <td>21 juillet 2025</td>
          <td>Club Environnement</td>
          <td>Parc Campus</td>
        </tr>
        <tr>
          <td>Match de football</td>
          <td>23 juillet 2025</td>
          <td>Club Sportif</td>
          <td>Stade Universitaire</td>
        </tr>
        <tr>
          <td>Soirée poésie</td>
          <td>25 juillet 2025</td>
          <td>Club Littéraire</td>
          <td>Salle de conférence</td>
        </tr>
      </tbody>
    </table>
  </main>

  <?php include __DIR__ . '/../components/footer.php'; ?>
  <script src="public/style/bootstrap-4.0.0-dist/js/jquery.min.js"></script>
  <script src="public/style/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
