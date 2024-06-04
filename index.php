<?php
require '../vendor/autoload.php';


$router = new App\Router(dirname(__DIR__). '/views');
$router
    ->match("/","index",'home')
    ->match("/Ajout-Inventaire","outils/ajout",'ajout')
    ->match("/liste-de-courses","outils/liste",'liste')
    ->match("/inventaire/modification/elements-[i:id]","outils/modification",'modification')
    ->run();