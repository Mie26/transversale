<?php
require_once("../config/database.php");
require_once("../config/session.php");

if (!estConnecte()) {
    header("Location: index.php");
    exit();
}

$id_etudiant = $_SESSION['etudiant']['id_etudiant'];

$res = mysql_query("SELECT * FROM badges WHERE id_etudiant = $id_etudiant");
?>

<!DOCTYPE html>
<html>
<head><title>Mes badges</title><meta charset="utf-8"></head>
<body>
<h2>Mes badges</h2>

<?php if (mysql_num_rows($res) == 0): ?>
    <p>Vous n'avez pas encore de badge.</p>
<?php else: ?>
    <ul>
        <?php while ($b = mysql_fetch_assoc($res)) : ?>
            <li><?php echo htmlspecialchars($b['type_badge']) . " (Obtenu le " . $b['date_obtention'] . ")"; ?></li>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>

<p><a href="tableau_bord.php">Retour</a></p>
</body>
</html>
