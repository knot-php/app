<?php
ob_start();

$base_dir = dirname(__DIR__);

require_once $base_dir . '/env.php';
require_once $base_dir . '/vendor/autoload.php';
require_once $base_dir . '/include/functions.php';

(new Calgamo\Kernel\Bootstrap())
    ->mount(new MyApp\App\Front\FileSystem\FrontFileSystem($base_dir))
    ->boot(MyApp\App\Front\FrontWebApplication::class);
