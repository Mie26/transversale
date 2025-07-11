<?php
session_start();
require_once("models/Database.php"); // ou connexion à ta base
require_once("models/Etudiant.php"); // classe ou fonctions pour gérer les étudiants

$success = false; // initialisation

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Exemple simple : récupérer données POST
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['mot_de_passe'] ?? '';
    $langue = $_POST['langue_preferee'] ?? 'fr';
    
    // Valide simple (à améliorer)
    if ($nom && $prenom && filter_var($email, FILTER_VALIDATE_EMAIL) && $password) {
        // Ici tu insères dans la base, exemple PDO (à adapter)
        $pdo = Database::getConnection(); // méthode fictive, à créer selon ta config
        
        // Vérifier si email/NIE existe déjà ?
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM etudiants WHERE NIE = ?");
        $stmt->execute([$email]);  // ici NIE = email dans ta table ?
        $exists = $stmt->fetchColumn();
        
        if ($exists) {
            $error = "Cet email/NIE est déjà utilisé.";
        } else {
            // Hash mot de passe
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Insérer en base
            $insert = $pdo->prepare("INSERT INTO etudiants (nom, prenom, NIE, mot_de_passe, langue_preferee) VALUES (?, ?, ?, ?, ?)");
            $insert->execute([$nom, $prenom, $email, $hash, $langue]);

            $success = true;
        }
    } else {
        $error = "Veuillez remplir tous les champs correctement.";
    }
}

require_once("views/pages/InscriptionPage.php");
