<?php
require_once("../config/database.php");

$query = "SELECT m.id_membre, e.nom, e.prenom, c.nom_club, m.date_inscription 
          FROM membres_club m
          JOIN etudiants e ON m.id_etudiant = e.id_etudiant
          JOIN clubs c ON m.id_club = c.id_club
          WHERE m.actif = 1
          ORDER BY c.nom_club, e.nom";

$res = mysql_query($query);
?>

<!DOCTYPE html>
<html>
<head><title>Liste des membres</title><meta charset="utf-8"></head>
<body>
<h2>Membres actifs des clubs</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Club</th>
        <th>Date d'inscription</th>
    </tr>
    <?php while ($m = mysql_fetch_assoc($res)) : ?>
    <tr>
        <td><?php echo htmlspecialchars($m['nom']); ?></td>
        <td><?php echo htmlspecialchars($m['prenom']); ?></td>
        <td><?php echo htmlspecialchars($m['nom_club']); ?></td>
        <td><?php echo htmlspecialchars($m['date_inscription']); ?></td>
    </tr>
    <?php endwhile; ?>
</table>
<p><a href="index.php">Retour admin</a></p>
</body>
</html>
