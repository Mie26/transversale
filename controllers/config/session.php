<?php
session_start();

function estConnecte() {
    return isset($_SESSION['etudiant']);
}

function connecter($etudiant) {
    $_SESSION['etudiant'] = $etudiant;
}

function deconnecter() {
    session_destroy();
}
?>
