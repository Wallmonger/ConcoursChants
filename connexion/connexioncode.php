
  <?php


session_start();

if(isset($_POST['id']) && isset($_POST['pswd'])) {

$currentUser = $_POST['id'];
$currentPassword = $_POST['pswd'];




  $user = 'benjaminl';
  $password = 'benjaminl';
  $database_link = 'mysql:host=localhost;dbname=chant;charset=utf8';



/************************************************ */

try 
{
  $bdd = new PDO(
    $database_link,
    $user,
    $password,
  );
} catch (PDOException $e) 
{
  die('Erreur:'. $e->getMessage());
  echo "Erreur mec !";
}
/********************************************** */


$etatfetch = $bdd->prepare("SELECT * FROM `profil` WHERE identifiant = '$currentUser';");
      $etatfetch->execute();
      $resultats = $etatfetch->fetchAll();
      


      $passwordServer = $resultats[0]['pswd'];                      // vérification du mot de passe hashé par la base de données en utilisant la fonction password_verify, qui renvoie un booléen
      $arePasswordTheSame = password_verify($currentPassword, $passwordServer);
      echo $arePasswordTheSame;


      
      
      if(!empty($arePasswordTheSame)) {

        $etatfetchUser = $bdd->prepare("SELECT * FROM `profil` WHERE identifiant = '$currentUser';");
                      $etatfetchUser->execute();
                      $resultatsUser = $etatfetchUser->fetchAll();
                      
                      

        $_SESSION['id'] = $resultatsUser[0]['ID'];
        $_SESSION['nom'] = $resultatsUser[0]['nom'];
        $_SESSION['prenom'] = $resultatsUser[0]['prenom'];
        $_SESSION['identifiant'] = $resultatsUser[0]['identifiant'];
        $_SESSION['email'] = $resultatsUser[0]['email'];
        $_SESSION['adresse'] = $resultatsUser[0]['adresse'];
        $_SESSION['codepostal'] = $resultatsUser[0]['codepostal'];
        $_SESSION['ville'] = $resultatsUser[0]['ville'];
        $_SESSION['birth'] = $resultatsUser[0]['birth'];
        $_SESSION['administrateur'] = $resultatsUser[0]['admin'];
        $_SESSION['profilpic'] = $resultatsUser[0]['profilpic'];

         

       
        
            header("Location: ../mon_compte.php");
        
                    } else {
                      header("Location: ../connexion.php");
                      $_SESSION['erreur'] = "Identifiant ou mot de passe incorrect !";
                      
                    }
      
}


?>
