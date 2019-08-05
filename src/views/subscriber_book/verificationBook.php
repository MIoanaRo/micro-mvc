<?php
    $bdd = self::connectDb();

if (isset($_POST['title']) && isset($_POST['author'])) {

    $bdd = self::connectDb();

    $username = mysqli_real_escape_string($db, htmlspecialchars($_POST['title']));
    $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['author']));

    if ($title !== "" && $author !== "") {
        $requete = "SELECT * FROM book where 
              title = '" . $title . "' and author = '" . $author . "' ";
        
        } else {
            header('Location: new.php');
        }

}

