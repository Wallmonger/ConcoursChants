<?php 
session_start();
unset($_SESSION["identifiant"]);
session_destroy();
header('Location: index.html');
?>