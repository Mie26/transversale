<?php
require_once("../config/database.php");

$message = "";

if (isset($_POST['nom_club']) && isset($_POST['description'])) {
    $nom_club = mysql_real_escape_string($_POST['nom_club']);
    $description = mysql_real_escape_string($_POST['description']);

    // Vérifier que le club n’existe pas déjà
    $res = mysql_query("SELECT * FROM clubs WHERE nom_club = '$nom_club'");
    if (mysql_num_rows($res) == 0) {
        mysql_query("INSERT INTO clubs (nom_club, description, nb_membres, nb_activites) VALUES ('$nom_club', '$description', 0, 0)");
        $message = "Club ajouté avec succès.";
    } else {
        $message = "Un club avec ce nom existe déjà.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Ajouter un club</title><meta charset="utf-8"></head>
<body>
<h2>Ajouter un nouveau club</h2>
<form method="post">
    Nom du club : <input type="text" name="nom_club" required><br>
    Description : <textarea name="description" required></textarea><br>
    <input type="submit" value="Ajouter">
</form>
<p style="color:green;"><?php echo $message; ?></p>
<p><a href="index.php">Retour admin</a></p>
</body>
</html>
