<?php

class Book extends AbstractDb
{

    public static function findAll()
    {

        $bdd = self::connectDb();

        // 2. request
        $request = 'SELECT * FROM book';

        // 3. execution de la request
        $response = $bdd->query($request);

        // 4. return des données
        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById(int $id)
    {
        $bdd = self::connectDb();

        $request = 'SELECT * FROM book WHERE id = ' . $id;

        $response = $bdd->query($request);

        return $response->fetch(PDO::FETCH_ASSOC);
    }

    public static function new($params)
    {
        $bdd = self::connectDb();

        $request = $bdd->prepare('INSERT INTO book (title,author) VALUES (:title,:author)');
        $request->execute(array(
            'title' => $params['title'],
            'author' => $params['author']
        ));

        echo 'Livre et author ajoute !';
    }

    public static function update(int $id)
    {
        $bdd = self::connectDb();

        $valeur = $_POST['id_title'];
        $title = $_POST['title'];

        $req = $bdd->prepare('UPDATE book set title = \'' . $title . '\' where id = ' . $valeur);
        $req->execute();

        echo "Le title $valeur a été mis à jour avec la valeur : <br> $title ";
    }

    public static function delete(int $id)
    {
        $bdd = self::connectDb();

        foreach ($_POST['id_title'] as $valeur) {

            $req = $bdd->prepare('DELETE from book where id = ?');
            $req->execute(array($valeur));

            echo "Le livre $valeur a été supprimée <br>";
        }
    }
}
