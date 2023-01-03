<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/connexion.css">
    <title>Connexion</title>
</head>

<body>
    <video autoplay="autoplay" loop muted src="CSS/video/video_fond.mp4"></video>
    <div>
        <h1>Connexion</h1>
        <form action="connexion/connexioncode.php" method="POST">
            <p><?php session_start();
            echo $_SESSION['erreur'];
            unset($_SESSION['erreur'])?>
            <div class="id">
                <input type="text" placeholder="Identifiant" name="id" required ppattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-]{3,255}" autocomplete="off">
            </div>
            <div class="mdp">
                <input type="password" placeholder="Mot de passe" name="pswd" required pattern="{8,255}" autocomplete="off">
            </div>
            <div>
                <button type="submit" name="submit">Valider</button>
            </div>
        </form>
    </div>
</body>


</html>

<?php
?>