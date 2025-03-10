<?php

class BookController
{

    public static function list()
    {

        // 1. Appel du Model
        $books = Book::findAll();

        // 2. Return/include de la view
        include(__DIR__ . '/../views/books/list.php');
    }

    public static function read(int $id)    {

        // 1. Appel du Model
        $book = Book::findById($id);

        // 2. Include de la lview
        include(__DIR__ . '/../views/books/read.php');
    }

    public static function new($params)
    {
        Book::new($params);
    }

    public static function create() {
        
        include(__DIR__ . '/../views/books/new.php');
    }

    public static function new_edit($id)
    {
        Book::new_edit($id);
    }

    public static function edit()    {        

        include(__DIR__ . '/../views/books/new_edit.php');
    }    

    public static function delete($id)
    { 
        $book = Book::delete($id);      

        include(__DIR__ . '/../views/books/delete.php');

    }
}
