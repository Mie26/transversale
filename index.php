<?php 
session_start();
require_once("controllers/userController.php");

try {
    $page = $_GET['page'] ?? 'connexion';

    switch ($page) {
        case 'connexion':
            require_once 'views/pages/LoginPage.php';
            break;

        case 'login':
            doLogin();
            break;

        case 'register':
            require_once 'views/pages/RegisterPage.php';
            break;

        case 'doRegister':
            doRegister();
            break;

        case 'send_message':
            if (!isset($_SESSION['user'])) {
                header("Location: ?page=connexion");
                exit;
            }
            require_once 'controllers/messageController.php';
            sendMessage();
            break;

        case 'homepage':
            if (!isset($_SESSION['user'])) {
                header("Location: ?page=connexion");
                exit;
            }
            require_once 'views/pages/Homepage.php';
            break;

        case 'clubs':
            if (!isset($_SESSION['user'])) {
                header("Location: ?page=connexion");
                exit;
            }
            require_once 'views/pages/ClubsPage.php';
            break;

        case 'activites':
            if (!isset($_SESSION['user'])) {
                header("Location: ?page=connexion");
                exit;
            }
            require_once 'views/pages/ActivitiesPage.php'; // ✅ nom précis du fichier
            break;

        case 'notification':
            if (!isset($_SESSION['user'])) {
                header("Location: ?page=connexion");
                exit;
            }
            require_once 'views/pages/NotificationPage.php';
            break;

        case 'messages':
            if (!isset($_SESSION['user'])) {
                header("Location: ?page=connexion");
                exit;
            }
            require_once 'views/pages/MessagesPage.php';
            break;

        case 'logout':
            session_destroy();
            header("Location: ?page=connexion");
            exit;

        default:
            echo "Page non trouvée.";
            break;
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
