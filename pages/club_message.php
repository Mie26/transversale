<?php
require_once("../config/session.php");
require_once("../config/database.php");


if (!isset($_SESSION['etudiant'])) {
    header("Location: ../index.php");
    exit();
}

$id_etudiant = $_SESSION['etudiant']['id_etudiant'];
$id_club = isset($_GET['id_club']) ? (int)$_GET['id_club'] : 0;

$message = "";

if (isset($_POST['message'])) {
    $msg = mysql_real_escape_string($_POST['message']);

    // Insertion du message (à simplifier)
    mysql_query("INSERT INTO messages_club (id_club, id_etudiant, contenu, date_envoi) VALUES ($id_club, $id_etudiant, '$msg', NOW())");
    $message = "Message envoyé.";
}
?>

<!DOCTYPE html>
<html>
<head><title>Envoyer un message au club</title><meta charset="utf-8"></head>
<body>
<h2>Envoyer un message au club</h2>
<form method="post">
    Message : <br>
    <textarea name="message" required></textarea><br>
    <input type="submit" value="Envoyer">
</form>
<p style="color:green;"><?php echo $message; ?></p>
<p><a href="tableau_bord.php">Retour</a></p>
</body>
</html>
