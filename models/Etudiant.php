<?php
// Ajoute dans models/Etudiant.php

public function verifierLogin($email, $mot_de_passe) {
    $sql = "SELECT * FROM etudiants WHERE email = :email LIMIT 1";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($etudiant && password_verify($mot_de_passe, $etudiant['mot_de_passe'])) {
        // Login OK, retourne données utilisateur sans mot de passe
        unset($etudiant['mot_de_passe']);
        return $etudiant;
    }
    return false;
}

?>