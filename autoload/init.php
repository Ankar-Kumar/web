<?php

use Bookstore\Domain\Book;
use Bookstore\Domain\Customer;

function autoload($classname)
{
    $lastSlash = strpos($classname, '\\') + 1;
    $classname = substr($classname, $lastSlash);
    $directory = str_replace('\\', '/', $classname);
    print_r($directory);
    $filename = __DIR__ . '/' . $directory . '.php';
    print_r($filename);
    require_once($filename);
}
spl_autoload_register('autoload');
$book1 = new Book();
?>