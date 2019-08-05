<?php

/**
 * Author: Ioana Matac
 * Autoload Classes
 */

const CLASSES_SOURCES = [
    '/src',
    '/src/model',
    '/src/controller'
];

function autoloadClass($class)
{

    $sources = array_map(function ($folder) use ($class) {

        return __DIR__ . $folder . '/' . $class . '.php';
    }, CLASSES_SOURCES);

    foreach ($sources as $s) {

        if (file_exists($s)) {
            require_once($s);
        }
    }
}

spl_autoload_register('autoloadClass');



/**
 * Exemples de routes:
 *
 * /index.php?model=book&method=list
 * /index.php?model=book&method=read&id=3
 * /index.php?model=book&method=new
 * /index.php?model=book&method=edit&id=3
 * /index.php?model=book&method=delete&id=3
 */


switch ($_GET['model']) {
    case 'subscriber':
        switch ($_GET['method']) {

            case 'list':
                SubscriberController::list();
                break;

            case 'read':
                SubscriberController::read(intval($_GET['id']));
                break;

            case 'new':
                SubscriberController::new($_POST);
                break;

            case 'create':
                SubscriberController::create();
                break;
            case 'new_edit':
                SubscriberController::new_edit($_POST);
                break;

            case 'edit':
                SubscriberController::edit();
                break;

            case 'delete':
                SubscriberController::delete($_GET['id']);
                break;
        }
        break;       

    case 'subscriber_book':
         switch ($_GET['method']) {

            case 'list':
                SubscriberController::list();
                break;
        
            case 'read':
                SubscriberController::read(intval($_GET['id']));
                break;
        
            case 'new':
                SubscriberController::new($_POST);
                break;
        
            case 'create':
                SubscriberController::create();
                break;
                # code...
                break;    
    
    case 'book':
        switch ($_GET['method']) {

            case 'list':
                BookController::list();
                break;

            case 'read':
                BookController::read(intval($_GET['id']));
                break;

            case 'new':
                BookController::new($_POST);
                break;

            case 'create':
                BookController::create();
                break;
            case 'new_edit':
                BookController::new_edit($_POST);
                break;

            case 'edit':
                BookController::edit();
                break;

            case 'delete':
                BookController::delete($_GET['id']);
                break;
        }
        break;

    default:
        # code...
        break;
}
}