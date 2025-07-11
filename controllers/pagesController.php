<?php
function accueilPage() {
    echo "<h1>Bienvenue sur le site des clubs universitaires</h1>";
    echo "<p><a href='?page=register'>Inscription</a> | <a href='?page=connexion'>Connexion</a></p>";
}

function connexionPage() {
    require_once("views/pages/LoginPage.php");
}

function registerPage() {
    require_once("views/pages/RegisterPage.php");
}
?>
