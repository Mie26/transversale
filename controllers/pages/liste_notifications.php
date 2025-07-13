<?php
require_once("../config/session.php");
require_once("../config/database.php");

// Vérification session
if (!isset($_SESSION['etudiant'])) {
    header("Location: ../index.php");
    exit();
}

$id_etudiant = (int)$_SESSION['etudiant']['id_etudiant']; // cast pour sécurité

// Requête SQL
$res = mysql_query("SELECT * FROM notifications WHERE id_etudiant = $id_etudiant ORDER BY date_envoi DESC");

if (!$res) {
    die('Erreur SQL : ' . mysql_error());
}
?>

<!DOCTYPE html>
<html>
<head><title>Mes notifications</title><meta charset="utf-8"></head>
<body>
<h2>Notifications</h2>

<?php if (mysql_num_rows($res) == 0): ?>
    <p>Vous n'avez aucune notification.</p>
<?php else: ?>
    <ul>
        <?php while ($notif = mysql_fetch_assoc($res)) : ?>
            <li>
                <?php echo htmlspecialchars($notif['contenu']); ?> - <em><?php echo $notif['date_envoi']; ?></em>
            </li>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>

<p><a href="tableau_bord.php">Retour</a></p>
</body>
</html>
