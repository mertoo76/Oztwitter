<?php

session_start();

$db = new PDO('mysql:host=localhost;dbname=oztwitter;charset=utf8', 'root', '');
$tuz = 'sepjogeıiɠeıs#$½¾{[{tijvoivd3985479';

require_once 'lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('sablonlar');
$twig = new Twig_Environment($loader, array(
    'cache' => 'onbellek',
    'debug' => true,
));