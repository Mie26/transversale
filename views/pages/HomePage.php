<?php
if (!isset($_SESSION['user'])) {
    header('Location: ?page=connexion');
    exit;
}

$title = "Accueil - Clubs Universitaires";
$description = "Page d'accueil du site des Clubs Universitaires.";
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
    /* Background hero en haut */
    .hero {
      position: relative;
      background-image: url('public/images/clubs1.png'); /* ton image */
      background-size: cover;
      background-position: center;
      height: 60vh;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      border-radius: 0 0 40px 40px;
      overflow: hidden;
      margin-bottom: 40px;
    }

    /* Overlay sombre pour texte lisible */
    .hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.5);
      z-index: 0;
      border-radius: 0 0 40px 40px;
    }

    .hero-content {
      position: relative;
      z-index: 1;
      max-width: 700px;
      padding: 0 20px;
    }

    .hero h1 {
      font-size: 3rem;
      font-weight: 700;
      text-shadow: 0 2px 8px rgba(0,0,0,0.7);
    }

    .hero p {
      font-size: 1.25rem;
      margin-top: 15px;
      text-shadow: 0 1px 6px rgba(0,0,0,0.7);
    }

    /* Section cards sous le hero */
    .cards-section {
      max-width: 1140px;
      margin: 0 auto 50px auto;
      padding: 0 15px;
    }

    .card {
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      color: #222;
    }
    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 30px rgba(0,0,0,0.25);
    }
  </style>
</head>
<body>
  <?php include __DIR__ . '/../components/header.php'; ?>

  <main class="container-fluid px-0">
    <section class="hero">
      <div class="hero-content">
        <h1>Bienvenue, <?= htmlspecialchars($_SESSION['user']['prenom'] ?? $_SESSION['user']['nom'] ?? 'Utilisateur') ?> !</h1>
        <p>Bienvenue sur la plateforme de gestion des Clubs Universitaires.</p>
      </div>
    </section>

    <section class="cards-section">
      <div class="row">
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Liste des clubs</h5>
              <p class="card-text flex-grow-1">Explorez les clubs selon vos centres d'intérêt.</p>
              <a href="index.php?page=clubs" class="btn btn-primary mt-auto">Voir les clubs</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Mes messages</h5>
              <p class="card-text flex-grow-1">Consultez les messages de vos clubs.</p>
              <a href="?page=messages" class="btn btn-warning mt-auto">Accéder aux messages</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Notifications</h5>
              <p class="card-text flex-grow-1">Soyez informé de toutes les nouveautés.</p>
              <a href="?page=notifications" class="btn btn-info mt-auto">Voir les notifications</a>
            </div>
          </div>
        </div>

        <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin') : ?>
        <div class="col-md-6 col-lg-8 mb-4">
          <div class="card h-100 shadow-sm border-dark">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Interface d'administration</h5>
              <p class="card-text flex-grow-1">Gérez les clubs, utilisateurs et activités.</p>
              <a href="?page=admin" class="btn btn-dark mt-auto">Accéder à l'administration</a>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/../components/footer.php'; ?>
  <script src="public/style/bootstrap-4.0.0-dist/js/jquery.min.js"></script>
  <script src="public/style/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
