let btnSwitch = document.getElementById("trigger");
let audioPlayer = document.getElementById("audioPlayer");

function moncu (audioname) {             // Audio name correspond au nom donné au fichier mp3 lors de sa création, dans la base de donnée
    audioPlayer.setAttribute('src', audioname)             // On change l'attribut src de l'élément du haut, pour pouvoir écouter la musique de chaque personne.
    audioPlayer.play();                                    // lorsque l'attribut a été changé, on joue automatiquement la musique.
}


