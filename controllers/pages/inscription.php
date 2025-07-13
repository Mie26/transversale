<?php
require_once("../config/database.php");
require_once("../config/session.php");
$message = "";

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['NIE']) && isset($_POST['mot_de_passe'])) {
    $nom = mysql_real_escape_string($_POST['nom']);
    $prenom = mysql_real_escape_string($_POST['prenom']);
    $nie = mysql_real_escape_string($_POST['NIE']);
    $mdp = mysql_real_escape_string($_POST['mot_de_passe']);

    $verif = mysql_query("SELECT * FROM etudiants WHERE NIE = '$nie'");
    if (mysql_num_rows($verif) == 0) {
        $ok = mysql_query("INSERT INTO etudiants (nom, prenom, NIE, mot_de_passe) VALUES ('$nom', '$prenom', '$nie', '$mdp')");
        if ($ok) {
            $message = "Inscription réussie. Vous pouvez maintenant vous connecter.";
        } else {
            $message = "Erreur lors de l'inscription.";
        }
    } else {
        $message = "Un compte avec ce NIE existe déjà.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Inscription</title><meta charset="utf-8"></head>
<body>
<h2>Inscription Étudiant</h2>
<form method="post">
    Nom : <input type="text" name="nom" required><br>
    Prénom : <input type="text" name="prenom" required><br>
    NIE : <input type="text" name="NIE" required><br>
    Mot de passe : <input type="password" name="mot_de_passe" required><br>
    <input type="submit" value="S'inscrire">
</form>
<p style="color:green;"><?php echo $message; ?></p>
<p><a href="index.php">Retour</a></p>
</body>
</html>
