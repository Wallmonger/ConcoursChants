<?php

session_start();

class Connected {
    public $nom;
    public $prenom;
    public $identifiant;
    public $email;
    public $adresse;
    public $codepostal;
    public $ville;
    public $birth;
    public $admin;
    public $profilpic;


    function __construct ($nom, $prenom, $identifiant, $email, $adresse, $codepostal, $ville, $birth, $admin, $profilpic) {       // on assigne une méthode aux variables
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->identifiant = $identifiant;
        $this->email = $email;
        $this->adresse = $adresse;
        $this->codepostal = $codepostal;
        $this->ville = $ville;
        $this->birth = $birth;
        $this->admin = $admin;
        $this->profilpic = $profilpic;
    }
}

$nomU = $_SESSION['nom'];              // on assigne aux variables les données sessions, récupérées après la connexion
$prenomU = $_SESSION['prenom'];
$identifiantU = $_SESSION['identifiant'];
$emailU = $_SESSION['email'];
$adresseU = $_SESSION['adresse'];
$codepostalU = $_SESSION['codepostal'];
$villeU = $_SESSION['ville'];
$birthU = $_SESSION['birth'];
$adminU = $_SESSION['administrateur'];
$profilpicU = $_SESSION['profilpic'];


$utilisateur = new Connected("$nomU", "$prenomU", "$identifiantU", "$emailU", "$adresseU", "$codepostalU","$villeU", "$birthU", "$adminU", "$profilpicU");  // on insère grâce au construct.
// pour appeler une propriété, faire "echo $utilisateur->nom"


?>

