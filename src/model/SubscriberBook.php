<?php

class SubscriberBook extends AbstractDb
{

    public static function findAll()
    {

        $bdd = self::connectDb();

        // 2. request
        $request = 'SELECT book.title, book.author, subscriber.firstName, subscriber.lastName 
                    FROM book JOIN subscriber WHERE book.id= subscriber.id;';

        // 3. execution de la request
        $response = $bdd->query($request);

        // 4. return des données
        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById(int $id)
    {
        $bdd = self::connectDb();

        $request = 'SELECT * FROM subscriber_book WHERE id = ' . $id;

        $response = $bdd->query($request);

        return $response->fetch(PDO::FETCH_ASSOC);
    }

    public static function new($params)
    {
        $bdd = self::connectDb();

        $request = $bdd->prepare('INSERT INTO subscriber_book (id_subscriber, id_book) VALUES (:id_subscriber,:id_book)');
        $request->execute(array(
            'title' => $params['id_subscriber'],
            'author' => $params['id_book']
        ));

        echo '';
    }
}
