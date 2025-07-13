<?php
if (!isset($_SESSION['user'])) {
    header('Location: ?page=connexion');
    exit;
}

$title = "Liste des clubs - Clubs Universitaires";
$description = "Découvrez tous les clubs disponibles selon votre profil.";

$clubs = [
    [
        'id' => 1,
        'nom' => 'Club Informatique',
        'description' => 'Pour les passionnés d’informatique, coding, IA et nouvelles technologies.',
        'image' => 'public/images/info.jpg',
    ],
    [
        'id' => 2,
        'nom' => 'Club Artistique',
        'description' => 'Expression artistique, peinture, dessin, musique et créativité.',
        'image' => 'public/images/artistique.jpg',
    ],
    [
        'id' => 3,
        'nom' => 'Club Robotique',
        'description' => 'Conception et programmation de robots, challenges et compétitions.',
        'image' => 'public/images/robot.jpg',
    ],
    [
        'id' => 4,
        'nom' => 'Club Environnement',
        'description' => 'Sensibilisation à l’écologie, protection de la nature et actions durables.',
        'image' => 'public/images/env_1.jpg',
    ],
    [
        'id' => 5,
        'nom' => 'Club Sportif',
        'description' => 'Football, basketball, athlétisme et autres sports collectifs.',
        'image' => 'public/images/foot.jpg',
    ],
    [
        'id' => 6,
        'nom' => 'Club Littéraire',
        'description' => 'Lecture, écriture, poésie, et débats littéraires.',
        'image' => 'public/images/litter_1.jpg',
    ],
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="<?= htmlspecialchars($description) ?>" />
  <title><?= htmlspecialchars($title) ?></title>
  <link rel="stylesheet" href="public/style/bootstrap-4.0.0-dist/css/bootstrap.min.css" />
  <style>
    body {
      background-color: #f8f9fa;
    }
    .club-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
    }
    .club-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 30px rgba(0,0,0,0.25);
    }
    .club-img {
      height: 180px;
      object-fit: cover;
      border-top-left-radius: 0.25rem;
      border-top-right-radius: 0.25rem;
    }
    .card-body {
      display: flex;
      flex-direction: column;
    }
    .btn-details {
      margin-top: auto;
    }
  </style>
</head>
<body>
  <?php include __DIR__ . '/../components/header.php'; ?>

  <main class="container mb-5">
    <h1 class="mb-4">Liste des clubs</h1>
    <p class="mb-4">Voici la liste des clubs adaptés à votre profil :</p>

    <div class="row">
      <?php foreach ($clubs as $club): ?>
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card club-card h-100 shadow-sm">
            <img src="<?= htmlspecialchars($club['image']) ?>" alt="<?= htmlspecialchars($club['nom']) ?>" class="card-img-top club-img" />
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?= htmlspecialchars($club['nom']) ?></h5>
              <p class="card-text flex-grow-1"><?= htmlspecialchars($club['description']) ?></p>
              <a href="?page=club&id=<?= $club['id'] ?>" class="btn btn-primary btn-details">S'inscrire</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </main>

  <?php include __DIR__ . '/../components/footer.php'; ?>
  <script src="public/style/bootstrap-4.0.0-dist/js/jquery.min.js"></script>
  <script src="public/style/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
