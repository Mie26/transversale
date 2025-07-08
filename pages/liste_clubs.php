<?php
require_once("../config/database.php");
require_once("../config/session.php");

if (!estConnecte()) {
    header("Location: index.php");
    exit();
}

$res = mysql_query("SELECT * FROM clubs");
?>

<!DOCTYPE html>
<html>
<head><title>Liste des clubs</title><meta charset="utf-8"></head>
<body>
<h2>Liste des clubs</h2>

<ul>
<?php while ($club = mysql_fetch_assoc($res)) : ?>
    <li>
        <strong><?php echo htmlspecialchars($club['nom_club']); ?></strong> — 
        <a href="inscription.php?id=<?php echo $club['id_club']; ?>">Voir le club</a>
    </li>
<?php endwhile; ?>
</ul>

<p><a href="tableau_bord.php">Retour</a></p>
</body>
</html>
