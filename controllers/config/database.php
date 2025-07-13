<?php
// Connexion MySQL simple (PHP5)
mysql_connect("localhost", "root", "") or die("Erreur de connexion à la base");
mysql_select_db("clubs_universitaires") or die("Base inconnue");
mysql_query("SET NAMES 'utf8'");
?>
