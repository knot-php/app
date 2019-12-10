<?php
/*
 * Config settings
 */
return [

    /** Site information */
    'site' => [
        /** Site Name */
        'site_name' => $_ENV['SITE_NAME'],

        /** Site URL */
        'site_url' => $_ENV['SITE_URL'],

    ],

    /** meta tags */
    'meta' => [
        'viewport' => 'width=device-width, initial-scale=1.0',

        /** Description in header */
        'description' => '',

        /** SEO keywords */
        'keywords' => '',
    ],

    /** title */
    'title' => $_ENV['SITE_NAME'],

];