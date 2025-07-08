<?php
require_once("../config/database.php");
require_once("../config/session.php");

deconnecter();
header("Location: index.php");
exit();
?>
