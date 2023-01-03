<?php
session_start();
if (isset($_POST['submit'])) {
    define("DBHOST", "localhost");
    define("DBUSER", "benjaminl");
    define("DBPASS", "benjaminl");
    define("DBNAME", "chant");
    try {
        $dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;
        $db = new PDO($dsn, DBUSER, DBPASS);
        $db->exec("SET NAMES utf8");
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $email = htmlentities($_POST['email']);
        $pswd = htmlentities($_POST['pswd']);
        $identifiant = $_SESSION['user']['identifiant'];
        // echo $email;
        if (!empty($_POST['email'])) {
            $sql = "UPDATE `profil` SET `email` = '$email' WHERE `identifiant`= '$identifiant' ";
            $query = $db->prepare($sql);
            $query->execute();
            $_SESSION['user']['email'] = $email;
        } 
        if (!empty($_POST['pswd'])) {
            $sql = "UPDATE `profil` SET `pswd` = '$pswd' WHERE `identifiant`= '$identifiant' ";
            $query = $db->prepare($sql);
            $query->execute();
            $_SESSION['user']['pswd'] = $pswd;
        } 
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    header('location: ../mon_compte.php');
}
