<?php

class Subscriber extends AbstractDb
{
    public static function findAll()
    {

        $bdd = self::connectDb();

        // 2. request
        $request = 'SELECT * FROM subscriber';

        // 3. execution de la request
        $response = $bdd->query($request);

        // 4. return des données
        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById(int $id)
    {

        $bdd = self::connectDb();

        $request = 'SELECT * FROM subscriber WHERE id = ' . $id;

        $response = $bdd->query($request);

        return $response->fetch(PDO::FETCH_ASSOC);
    }

    public static function new($params)
    {
        $bdd = self::connectDb();

        $request = $bdd->prepare('INSERT INTO subscriber (firstName,lastName) VALUES (:firstName,:lastName)');
        $request->execute(array(
            'firstName' => $params['firstName'],
            'lastName' => $params['lastName']
        ));

        echo 'Abonné ajoute !';
    }

    public static function update(int $id)
    {

        $bdd = self::connectDb();

        $valeur = $_POST['id_subscriber'];
        $firstName = $_POST['firstName'];

        $req = $bdd->prepare('UPDATE subscriber set firstName = \'' . $firstName . '\' where id = ' . $valeur);
        $req->execute();

        echo "L'abonne nr $valeur a été mis à jour : <br> $firstName ";
    }

    public static function delete(int $id)
    {

        $bdd = self::connectDb();

        foreach ($_POST['id_subscriber'] as $valeur) {

            $req = $bdd->prepare('DELETE from subscriber where id = ?');
            $req->execute(array($valeur));

            echo "L'abonné  $valeur a été supprimée <br>";
        }
    }
}
