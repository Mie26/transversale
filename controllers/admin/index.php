<?php
require_once("../config/session.php");
require_once("../config/database.php");

// Ici on suppose qu’un système de session admin est à créer,
// mais pour l’instant, on fait simple et accessible.

?>

<!DOCTYPE html>
<html>
<head><title>Admin - Gestion Clubs</title><meta charset="utf-8"></head>
<body>
<h2>Administration - Gestion des clubs</h2>

<ul>
    <li><a href="ajout_club.php">Ajouter un club</a></li>
    <li><a href="ajout_evenement.php">Ajouter un événement</a></li>
    <li><a href="liste_membres.php">Liste des membres</a></li>
</ul>

<p><a href="../index.php">Retour à l’accueil étudiant</a></p>
</body>
</html>
