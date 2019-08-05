<?php

class SubscriberController
{

    public static function list()
    {

        // 1. Appel du Model
        $subscribers = Subscriber::findAll();

        // 2. Return/include de la view
        include(__DIR__ . '/../views/subscribers/list_subscriber.php');
    }

    public static function read(int $id)    {

        // 1. Appel du Model
        $subscriber = Subscriber::findById($id);

        // 2. Include de la lview
        include(__DIR__ . '/../views/subscribers/read_subscriber.php');
    }

    public static function new($params)
    {
        Subscriber::new($params);
    }

    public static function create() {
        
        include(__DIR__ . '/../views/subscribers/new_subscriber.php');
    }

    public static function new_edit($id)
    {
        Book::new_edit($id);
    }

    public static function edit()    {        

        include(__DIR__ . '/../views/subscribers/new_edit.php');
    }    

    public static function delete($id)
    { 
        $book = Book::delete($id);      

        include(__DIR__ . '/../views/subscribers/delete_subscriber.php');

    }
}