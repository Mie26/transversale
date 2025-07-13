<?php
require_once("../config/database.php");

// Cette fonction attribue un badge "Actif" à un étudiant s'il est inscrit à au moins 2 clubs actifs
function attribuerBadgeActif($id_etudiant) {
    // Compter le nombre de clubs actifs
    $res = mysql_query("SELECT COUNT(*) as total FROM membres_club WHERE id_etudiant = $id_etudiant AND actif = 1");
    $data = mysql_fetch_assoc($res);
    $nb_clubs = $data['total'];

    // Si l’étudiant est inscrit à au moins 2 clubs, on lui donne un badge
    if ($nb_clubs >= 2) {
        // Vérifier si le badge est déjà attribué
        $verif = mysql_query("SELECT * FROM badges WHERE id_etudiant = $id_etudiant AND type_badge = 'Actif'");
        if (mysql_num_rows($verif) == 0) {
            // Insérer le badge
            mysql_query("INSERT INTO badges (id_etudiant, type_badge, date_obtention) VALUES ($id_etudiant, 'Actif', CURDATE())");
            return true;
        }
    }
    return false;
}

// Exemple d’utilisation : attribuer un badge à l’étudiant connecté
session_start();
if (isset($_SESSION['etudiant'])) {
    $id_etudiant = $_SESSION['etudiant']['id_etudiant'];
    if (attribuerBadgeActif($id_etudiant)) {
        echo "Badge 'Actif' attribué.";
    } else {
        echo "Pas de badge attribué.";
    }
} else {
    echo "Utilisateur non connecté.";
}
?>
