<?php
require_once 'models/Database.php';

function sendMessage() {
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $expediteur_id = $_SESSION['user']['id'];
        $destinataire_id = $_POST['destinataire_id'] ?? null;
        $contenu = trim($_POST['contenu'] ?? '');

        if (!$destinataire_id || !$contenu) {
            $_SESSION['error'] = "Tous les champs sont obligatoires.";
            header("Location: ?page=messages");
            exit;
        }

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO messages (expediteur_id, destinataire_id, contenu) VALUES (?, ?, ?)");
        if ($stmt->execute([$expediteur_id, $destinataire_id, $contenu])) {
            $_SESSION['success'] = "Message envoyé avec succès.";
        } else {
            $_SESSION['error'] = "Erreur lors de l'envoi du message.";
        }

        header("Location: ?page=messages");
        exit;
    } else {
        header("Location: ?page=messages");
        exit;
    }
}
