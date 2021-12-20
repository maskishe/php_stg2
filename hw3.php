<?php
//  Author: Mikhail Kurzin (GitHub: maskishe, Email: maskishe@gmail.com, Tgram: maskishe)
//  Date:   16 Dec 2021
//  
//  Lesson 3. Task #1. Twig.
use \Twig\Environment;
use \Twig\Loader\FilesystemLoader;

require_once '../vendor/autoload.php';
///echo (var_dump(dirname(__DIR__)) . '/vendor/autoload_runtime.php');

$loader = new FilesystemLoader('../templates');
//echo var_dump($loader);
$twig   = new Environment($loader, []);
//echo var_dump($twig);

$dirs = scandir('./images');

try {
    $template = $twig->load('hw3.html.twig');
    echo $template->render([
        'title' => 'Some title',
        'dirs' => $dirs,        
    ]);
}
catch ( \Exception $exception ) {
    echo $exception->getMessage();
    var_dump($exception->getTrace());
}


