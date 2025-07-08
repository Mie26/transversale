<?php
require_once("../config/database.php");

$message = "";

// Pour simplifier, on affiche tous les clubs dans un select
$clubs = mysql_query("SELECT * FROM clubs");

if (isset($_POST['titre']) && isset($_POST['date_debut']) && isset($_POST['id_club']) && isset($_POST['lieu'])) {
    $titre = mysql_real_escape_string($_POST['titre']);
    $date_debut = mysql_real_escape_string($_POST['date_debut']);
    $id_club = (int)$_POST['id_club'];
    $lieu = mysql_real_escape_string($_POST['lieu']);

    mysql_query("INSERT INTO evenements (titre, date_debut, id_club, lieu) VALUES ('$titre', '$date_debut', $id_club, '$lieu')");
    $message = "Événement ajouté.";
}
?>

<!DOCTYPE html>
<html>
<head><title>Ajouter un événement</title><meta charset="utf-8"></head>
<body>
<h2>Ajouter un événement</h2>
<form method="post">
    Titre : <input type="text" name="titre" required><br>
    Date et heure (AAAA-MM-JJ HH:MM:SS) : <input type="text" name="date_debut" required><br>
    Club : 
    <select name="id_club" required>
        <?php while ($c = mysql_fetch_assoc($clubs)) : ?>
            <option value="<?php echo $c['id_club']; ?>"><?php echo htmlspecialchars($c['nom_club']); ?></option>
        <?php endwhile; ?>
    </select><br>
    Lieu : <input type="text" name="lieu" required><br>
    <input type="submit" value="Ajouter">
</form>
<p style="color:green;"><?php echo $message; ?></p>
<p><a href="index.php">Retour admin</a></p>
</body>
</html>
