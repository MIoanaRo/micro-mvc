<?php
    $bdd = self::connectDb();

if (isset($_POST['firstName']) && isset($_POST['lastName'])) {

    $bdd = self::connectDb();

    $username = mysqli_real_escape_string($db, htmlspecialchars($_POST['firstName']));
    $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['lastName']));

    if ($firstName !== "" && $lastName !== "") {
        $requete = "SELECT * FROM subscriber where 
              firstName = '" . $firstName . "' and lastName = '" . $lastName . "' ";
        
        } else {
            header('Location: new.php');
        }

}

