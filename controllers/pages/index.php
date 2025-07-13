<?php
require_once("../config/database.php");
require_once("../config/session.php");

$message = "";

if (isset($_POST['NIE']) && isset($_POST['mot_de_passe'])) {
    $nie = mysql_real_escape_string($_POST['NIE']);
    $mdp = mysql_real_escape_string($_POST['mot_de_passe']);

    $res = mysql_query("SELECT * FROM etudiants WHERE NIE = '$nie' AND mot_de_passe = '$mdp'");
    if (mysql_num_rows($res) == 1) {
        $etudiant = mysql_fetch_assoc($res);
        connecter($etudiant);
        header("Location: tableau_bord.php");
        exit();
    } else {
        $message = "NIE ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Connexion</title><meta charset="utf-8"></head>
<body>
<h2>Connexion Étudiant</h2>
<form method="post">
    NIE : <input type="text" name="NIE" required><br>
    Mot de passe : <input type="password" name="mot_de_passe" required><br>
    <input type="submit" value="Se connecter">
</form>
<p style="color:red;"><?php echo $message; ?></p>
<p>Pas encore inscrit ?</p>
<p><a href="inscription.php">Inscription</a></p>
</body>
</html>
