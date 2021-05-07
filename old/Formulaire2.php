<?php
// Récupère les réponses du formulaire: arrive dessus après avoir cliquer sur envoyer
    include('entete.inc.html');
    require ('Form.class.php');
    
    $data = new FormData($_POST, $_POST); 
    
    echo "<ul>";
    foreach ($data->retournePost() as $champ => $valeur) {
        echo "<li>$champ: $valeur </li>";
    }
    echo "</ul>";
    
    echo "<ul>";
   /* foreach ($data->retourneFile() as $champ => $valeur) {
        echo "<li>$champ: $valeur</li>";
    }
    echo "</ul>";*/
     
    include('pied.inc.html');


?>