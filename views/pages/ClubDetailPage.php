<?php
if (!isset($_SESSION['user'])) {
    header('Location: ?page=connexion');
    exit;
}

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "Club non spécifié.";
    exit;
}

$title = "Détails du club - Clubs Universitaires";
$description = "Fiche détaillée du club choisi.";

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
    <?php
    // Simuler une recherche club par $id (à remplacer par requête SQL)
    $clubs = [
        1 => ['nom' => 'Club Informatique', 'description' => 'Pour les passionnés d’informatique.', 'details' => 'Activités: programmation, hackathons, ateliers.'],
        2 => ['nom' => 'Club Sportif', 'description' => 'Activités sportives variées.', 'details' => 'Football, basketball, yoga, fitness.'],
        3 => ['nom' => 'Club Littéraire', 'description' => 'Lecture, écriture et débats.', 'details' => 'Rencontres d’auteurs, ateliers d’écriture, débats.'],
    ];

    if (!isset($clubs[$id])) {
        echo "<div class='alert alert-danger'>Club introuvable.</div>";
    } else {
        $club = $clubs[$id];
        ?>
        <h1><?= htmlspecialchars($club['nom']) ?></h1>
        <p><strong>Description :</strong> <?= htmlspecialchars($club['description']) ?></p>
        <p><strong>Détails :</strong> <?= htmlspecialchars($club['details']) ?></p>

        <form method="post" action="?page=inscrire">
          <input type="hidden" name="club_id" value="<?= $id ?>">
          <button type="submit" class="btn btn-primary">S'inscrire à ce club</button>
        </form>
        <?php
    }
    ?>
  </main>

  <?php include __DIR__ . '/../components/footer.php'; ?>
  <script src="public/style/bootstrap-4.0.0-dist/js/jquery.min.js"></script>
  <script src="public/style/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
