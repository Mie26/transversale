<?php
require_once 'models/Database.php';

// --- Inscription ---
function doRegister() {
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $motdepasse = $_POST['motdepasse'] ?? '';

    if ($nom && $email && $motdepasse) {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $_SESSION['error'] = "Email déjà utilisé.";
            header("Location: ?page=register");
            exit;
        }

        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email, motdepasse) VALUES (?, ?, ?)");
        $stmt->execute([$nom, $email, $motdepasse]);

        $_SESSION['success'] = "Inscription réussie. Veuillez vous connecter.";
        header("Location: ?page=connexion");
        exit;
    } else {
        $_SESSION['error'] = "Tous les champs sont obligatoires.";
        header("Location: ?page=register");
    }
}

// --- Connexion ---
function doLogin() {
    $email = $_POST['email'] ?? '';
    $motdepasse = $_POST['motdepasse'] ?? '';

    if ($email && $motdepasse) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ? AND motdepasse = ?");
        $stmt->execute([$email, $motdepasse]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['user'] = $user;
            header("Location: ?page=homepage");
            exit;
        } else {
            $_SESSION['error'] = "Email ou mot de passe incorrect.";
            header("Location: ?page=connexion");
            exit;
        }
    } else {
        $_SESSION['error'] = "Veuillez remplir tous les champs.";
        header("Location: ?page=connexion");
        exit;
    }
}

// --- Récupération des messages ---
function getAllUsersExcept($userId) {
    $pdo = Database::getConnection();
    $stmt = $pdo->prepare("SELECT id, nom FROM utilisateurs WHERE id != ?");
    $stmt->execute([$userId]);
    return $stmt->fetchAll();
}

function sendMessageById($expediteurId, $destinataireId, $contenu) {
    $pdo = Database::getConnection();

    if (empty(trim($contenu))) {
        $_SESSION['error'] = "Le message ne peut pas être vide.";
        return;
    }

    $stmt = $pdo->prepare("INSERT INTO messages (expediteur_id, destinataire_id, contenu, date_envoi) VALUES (?, ?, ?, NOW())");
    $stmt->execute([$expediteurId, $destinataireId, $contenu]);

    $_SESSION['success'] = "Message envoyé avec succès.";
}

