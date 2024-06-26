<?php

include_once("config.php")

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $iduser = htmlspecialchars($_POST['iduser']);
    $idpass = htmlspecialchars($_POST['idpass']);

    $query = "SELECT COUNT(*) FROM utilisateurs WHERE nom_utilisateur = $iduser";
    $result = $sql->query($query);

    if ($result->num_rows > 0) {
        $encrypt = password_hash($idpass, PASSWORD_DEFAULT);

        while($row = $result->fetch_assoc()) {
            if ($encrypt == $row[password_utlisateur])
                echo "Bravo vous êtes maintenant connecté"
            } else {
                echo "Mauvais mot de passe"
            }
            

    } else {
        echo "Le nom d'utilisateur entré n'existe pas";
    }
    


    }  

?>