<?php
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection HtmlRequiredTitleElement */
/** @noinspection PhpIncludeInspection */
/** @noinspection HtmlUnknownTarget */

use MyApp\View\ViewHelper;

/** @var string $page_file */
/** @var ViewHelper $helper */
/** @var array $page_info */
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <?php require $helper->parts('html_head_meta'); ?>
    <link rel='stylesheet' href='/css/materialize.min.css' />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel='stylesheet' href='/css/style.css' />
    <!-- page css: START -->
    <?php foreach($page_info['css'] as $css) : ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $css; ?>">
    <?php endforeach; ?>
    <!-- page css: END -->
    <script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
</head>
<body>
<!-- Start Header Area -->
<?php require $helper->parts('header'); ?>
<!-- End Header Area -->
<main class="container">
    <?php require $page_file; ?>
</main>
<!-- Start footer Area -->
<?php require $helper->parts('footer'); ?>
<!-- End footer Area -->

<script type="text/javascript" src='/js/materialize.js'></script>
<!-- page javascripts: START -->
<?php foreach($page_info['javascript'] as $js) : ?>
    <script src="<?php echo $js; ?>"></script>
<?php endforeach; ?>
<!-- page javascripts: END -->
</body>
</html>