<?php
session_start();
require_once __DIR__ . '/../controllers/userController.php';

$user = $_SESSION['user'] ?? null;
if (!$user) {
    header('Location: ?page=connexion');
    exit;
}

// Envoi du message
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {
    $expediteurId = $user['id'];
    $destinataireId = $_POST['destinataire'] ?? null;
    $contenu = $_POST['contenu'] ?? '';

    if ($destinataireId && $contenu) {
        sendMessageById($expediteurId, $destinataireId, $contenu);
    }
}

// Récupération messages
$messages = getMessagesForUser($user['id']);
$destinataires = getAllUsersExcept($user['id']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Messagerie Privée</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Messagerie Privée</h2>
    <a href="dashboard.php">← Retour au tableau de bord</a>

    <?php if (isset($_SESSION['success'])): ?>
        <p style="color:green"><?= $_SESSION['success'] ?></p>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <p style="color:red"><?= $_SESSION['error'] ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <div class="message-list">
        <?php if (count($messages) === 0): ?>
            <p>Aucun message pour le moment.</p>
        <?php else: ?>
            <?php foreach ($messages as $msg): ?>
                <div class="message">
                    <strong><?= htmlspecialchars($msg['expediteur']) ?> → <?= htmlspecialchars($msg['destinataire']) ?>:</strong><br>
                    <?= nl2br(htmlspecialchars($msg['contenu'])) ?>
                    <hr>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <form method="POST" action="">
        <label for="destinataire">Destinataire :</label>
        <select name="destinataire" id="destinataire" required>
            <option value="" disabled selected>-- Choisissez un membre --</option>
            <?php foreach ($destinataires as $d): ?>
                <option value="<?= $d['id'] ?>"><?= htmlspecialchars($d['nom']) ?> — <?= htmlspecialchars($d['club'] ?? '') ?></option>
            <?php endforeach; ?>
        </select>

        <label for="contenu">Message :</label>
        <textarea name="contenu" id="contenu" rows="3" required placeholder="Écrivez votre message ici..."></textarea>

        <button type="submit" name="envoyer">Envoyer</button>
    </form>
</div>
</body>
</html>
