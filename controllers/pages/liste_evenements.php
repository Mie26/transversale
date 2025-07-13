<?php
require_once("../config/session.php");
require_once("../config/database.php");


if (!isset($_SESSION['etudiant'])) {
    header("Location: ../index.php");
    exit();
}

$id_etudiant = $_SESSION['etudiant']['id_etudiant'];
$id_club = isset($_GET['id_club']) ? (int)$_GET['id_club'] : 0;

if ($id_club == 0) {
    echo "Club invalide.";
    exit();
}

// Récupérer les événements du club
$query = "SELECT * FROM evenements WHERE id_club = $id_club ORDER BY date_debut ASC";
$res = mysql_query($query);

// Vérifier les inscriptions de l’étudiant
$inscriptions = array();
$q2 = mysql_query("SELECT id_evenement FROM inscriptions_evenements WHERE id_etudiant = $id_etudiant");
while ($row = mysql_fetch_assoc($q2)) {
    $inscriptions[] = $row['id_evenement'];
}
?>

<!DOCTYPE html>
<html>
<head><title>Événements du club</title><meta charset="utf-8"></head>
<body>
<h2>Événements du club</h2>
<ul>
<?php while ($event = mysql_fetch_assoc($res)) : ?>
    <li>
        <strong><?php echo htmlspecialchars($event['titre']); ?></strong> - <?php echo $event['date_debut']; ?> - <?php echo htmlspecialchars($event['lieu']); ?>
        <?php if (in_array($event['id_evenement'], $inscriptions)) : ?>
            <em>Inscrit</em>
        <?php else : ?>
            <a href="inscription_evenement.php?id_evenement=<?php echo $event['id_evenement']; ?>">S'inscrire</a>
        <?php endif; ?>
    </li>
<?php endwhile; ?>
</ul>
<p><a href="tableau_bord.php">Retour au tableau de bord</a></p>
</body>
</html>
