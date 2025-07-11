<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top">
    <a class="navbar-brand" href="index.php?page=homepage">Clubs Universitaire</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
        aria-controls="navbarNav" aria-expanded="false" aria-label="Basculer la navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="index.php?page=clubs">Clubs</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=activites">Activités</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=messages">Messages</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=notification">Notifications</a></li>
        </ul>
        <ul class="navbar-nav">
            <?php if (isset($_SESSION['user'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=profil">Bonjour, <?= htmlspecialchars($_SESSION['user']['prenom'] ?? $_SESSION['user']['nom'] ?? 'Utilisateur') ?></a>
                </li>
                <li class="nav-item"><a class="nav-link" href="index.php?page=logout">Déconnexion</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="index.php?page=connexion">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<!-- Ajoute un padding-top pour éviter que le contenu soit caché sous la navbar fixe -->
<div class="container mt-5 pt-5">
