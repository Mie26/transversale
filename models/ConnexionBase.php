<?php
class ConnexionBase {
    public static $connex;

    public static function getConnexion() {
        if (self::$connex == null) {
            $url = "mysql:host=127.0.0.1;dbname=gestion_etudiants_clubs;charset=utf8";
            $user = "root";
            $mdp = "";

            try {
                self::$connex = new PDO($url, $user, $mdp);
                self::$connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$connex;
    }
}
?>
