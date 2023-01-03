<?php
      session_start();
      if(isset($_SESSION['nom'])) {
        header('Location: ../profil.php');
      }
      var_dump($_POST);
      if(isset($_POST['genre'], $_POST['identifiant'], $_POST['email'], $_POST['password'], $_POST['confirmPassword'],$_POST['adresse'],$_POST['codePostal'],$_POST['name'],$_POST['firstname'],$_POST['datedenaissance'],$_POST['ville']) && !empty($_POST['genre']) && !empty($_POST['identifiant']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmPassword']) && !empty($_POST['codePostal']) && !empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['datedenaissance']) && !empty($_POST['ville'])) {
            $_SESSION['error'] = [];

                  $genre = strip_tags($_POST['genre']);              // strip_tags enleve les balises des inputs
                  $identifiant = strip_tags($_POST['identifiant']);
                  $email = strip_tags($_POST['email']);
                  $password = strip_tags($_POST['password']);
                  $passwordconfirm = strip_tags($_POST['confirmPassword']);
                  $codepostal = strip_tags($_POST['codePostal']);
                  $name = strip_tags($_POST['name']);
                  $adresse = strip_tags($_POST['adresse']);
                  $firstname = strip_tags($_POST['firstname']);
                  $datebirth = strip_tags($_POST['datedenaissance']);
                  $ville = strip_tags($_POST['ville']);   
                  $datenow = date("Ymd");
                        //conditions d'acceptations
                  echo $genre;

                  if (strlen($identifiant) < 3 && strlen($identifiant) > 20) {
                        $_SESSION["error"][] = "L'identifiant doit comporter entre 3 et 20 caractères";
                  }

                  if (strlen($name) < 3) {
                        $_SESSION["error"][] = "Le nom doit comporter au moins 3 lettres";         //strlen renvoie le nombre de charactères
                  }

                  if (strlen($firstname) < 3)   {
                        $_SESSION["error"][] = "Le prénom doit comporter au moins 3 lettres";
                  }

                  if (strlen($password) < 6)   {
                        $_SESSION["error"][] = "Le mot de passe doit contenir au moins 6 caractères";
                  }
                  
                  if (strlen($passwordconfirm) < 6)   {
                        $_SESSION["error"][] = "Le mot de passe doit contenir au moins 6 caractères";
                  }  

                  if (strlen($adresse) < 2 && strlen($adresse) > 100)   {
                        $_SESSION["error"][] = "La limite de caractères de l''adresse' est compris entre 2 et 100";
                  }  
                  
                  if ($codepostal < 10000 && $codepostal > 98000) {
                        $_SESSION["error"][] = "Le code postal n'existe pas";
                  }


                  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                  $_SESSION["error"][] = "L'adresse email n'est pas valide";
                  }

                  if($_POST["genre"] !== "homme" && $_POST["genre"] !== "femme") {
                        $_SESSION["error"][] = "Sélectionner un genre";          
                  } 

                  if(strlen($_POST['ville']) < 3) {
                        $_SESSION["error"][] = "Sélectionner un genre";          
                  }

                  if ($_POST["password"] != $_POST['confirmPassword']) {
                        $_SESSION["error"][] = "les mots de passe ne sont pas identiques";
                        header("Location: ../inscription.php");
                  }
                  

                  // fin des conditions d'acceptations

                  if ($_SESSION['error'] === []) {  //Si aucune erreur n'a été trouvé
                        $passwordhashed = password_hash($password, PASSWORD_DEFAULT);             // hachage du mot de passe
                        include("../Include/db.php");
                        $etatCheckEmail = $bdd->prepare(
                              "SELECT COUNT(*) FROM `profil` WHERE email = '$email' OR identifiant = '$identifiant'"
                        );
                  
                        $etatCheckEmail->execute();
                        $resultEmail = $etatCheckEmail->fetchAll();
                  
                        $resultEmail2 = $resultEmail[0]['COUNT(*)'];
                        
                  
                        if ($resultEmail2>0) {
                              $_SESSION['error'][] = "Identifiant ou Email déjà utilisée";
                              header("Location: ../inscription.php");
                        } else {

                              $etat = $bdd->prepare(
                                    "INSERT INTO `profil`(`identifiant`, `nom`, `prenom`, `email`, `pswd`, `birth`, `adresse`, `codepostal`, `ville`, `dateinscription`, `genre`, `admin`, `profilpic`) VALUES (:identifiant, :nom, :prenom, :email, :pswd, :birth, :adresse, :codepostal, :ville, :dateinscription, :genre, :administrateur, 'rien')"
                              );
                                    $etat->bindValue(':identifiant', $identifiant, PDO::PARAM_STR);
                                    $etat->bindValue(':nom', $name, PDO::PARAM_STR);
                                    $etat->bindValue(':prenom', $firstname, PDO::PARAM_STR);
                                    $etat->bindValue(':email', $email, PDO::PARAM_STR);
                                    $etat->bindValue(':pswd', $passwordhashed, PDO::PARAM_STR);
                                    $etat->bindValue(':birth', $datebirth, PDO::PARAM_STR);
                                    $etat->bindValue(':adresse', $adresse, PDO::PARAM_STR);
                                    $etat->bindValue(':codepostal', $codepostal, PDO::PARAM_INT);       
                                    $etat->bindValue(':ville', $ville, PDO::PARAM_STR);
                                    $etat->bindValue(':dateinscription', $datenow, PDO::PARAM_STR);
                                    $etat->bindValue(':genre', $genre, PDO::PARAM_STR);
                                    $etat->bindValue(':administrateur', "false", PDO::PARAM_STR);
                              
                              $etat->execute();
                              
                              header ("Location: ../index.html");
                              }
                  

                  }
      
            }

      else {

            header("Location: ../inscription.php");
      }
?>
