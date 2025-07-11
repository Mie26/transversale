<?php
// controllers/LoginController.php
session_start();
require_once __DIR__ . '/../models/Etudiant.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';

    if (!$email) $errors[] = "Email obligatoire";
    if (!$mot_de_passe) $errors[] = "Mot de passe obligatoire";

    if (empty($errors)) {
        $etudiant = new Etudiant($pdo);
        $user = $etudiant->verifierLogin($email, $mot_de_passe);
        if ($user) {
            // Stockage en session
            $_SESSION['user'] = $user;
            header('Location: index.php?page=accueil');
            exit;
        } else {
            $errors[] = "Email ou mot de passe incorrect";
        }
    }
}

require_once __DIR__ . '/../views/pages/LoginPage.php';
