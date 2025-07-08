<?php
require_once("../config/database.php");
require_once("../config/session.php");

if (!estConnecte()) {
    header("Location: index.php");
    exit();
}

$etudiant = $_SESSION['etudiant'];
?>

<!DOCTYPE html>
<html>
<head><title>Tableau de bord</title><meta charset="utf-8"></head>
<body>
<h2>Bienvenue <?php echo htmlspecialchars($etudiant['prenom']); ?></h2>

<ul>
    <li><a href="liste_clubs.php">Voir les clubs</a></li>
    <li><a href="mes_badges.php">Mes badges</a></li>
    <li><a href="statistiques.php">Statistiques des clubs</a></li>
    <li><a href="club_message.php">message du club</a></li>
    <li><a href="liste_notifications.php">notification</a></li>
    <li><a href="liste_evenements.php">les evenements à venir</a></li>
    <li><a href="deconnexion.php">Déconnexion</a></li>

</body>
</html>
