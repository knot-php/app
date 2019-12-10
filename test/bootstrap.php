<?php
$base_dir = dirname(__DIR__);
require_once $base_dir . '/vendor/autoload.php';

spl_autoload_register(function ($class)
{
    if (strpos($class, 'Calgamo\\App\\') === 0) {
        $name = substr($class, strlen('Calgamo\\App\\'));
        $name = array_filter(explode('\\',$name));
        $file = dirname(__DIR__) . '/src/' . implode('/',$name) . '.php';
        /** @noinspection PhpIncludeInspection */
        require_once $file;
    }
});