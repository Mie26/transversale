<?php
require_once("../config/database.php");
require_once("../config/session.php");

if (!estConnecte()) {
    header("Location: index.php");
    exit();
}

$clubs = mysql_query("SELECT * FROM clubs ORDER BY nb_membres DESC") or die(mysql_error());
?>

<!DOCTYPE html>
<html>
<head>
    <title>Statistiques des clubs</title>
    <meta charset="utf-8">
</head>
<body>
<h2>Statistiques des clubs</h2>

<table border="1" cellpadding="5" cellspacing="0">
<tr>
    <th>Nom du club</th>
    <th>Membres</th>
    <th>Activités</th>
</tr>

<?php while ($c = mysql_fetch_assoc($clubs)) : ?>
<tr>
    <td><?php echo htmlspecialchars($c['nom_club']); ?></td>
    <td><?php echo (int)$c['nb_membres']; ?></td>
    <td><?php echo (int)$c['nb_activites']; ?></td>
</tr>
<?php endwhile; ?>

</table>

<p><a href="tableau_bord.php">Retour</a></p>
</body>
</html>
