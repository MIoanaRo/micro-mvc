<?php

abstract class AbstractDb {
    const DB_NAME = 'ioana_bibliotheque';
    const DB_HOST = '127.0.0.1';
    const DB_PORT = '3306';
    const DB_USER = 'root';
    const DB_PSWD = '';

    protected static function connectDb() {
        try {
            $bdd = new PDO('mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_HOST . ';port=' . self::DB_PORT, self::DB_USER, self::DB_PSWD);
        } catch (PDOException $e) {
            dump($e);
        }

        return $bdd;
    }
}