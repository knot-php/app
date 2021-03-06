<?php
/*
 * Config settings
 */
return [

    /** Site information */
    'site' => [
        /** Site Name */
        'site_name' => 'My Blog',

        /** Site URL */
        'site_url' => 'https:://example.com',

    ],

    /** meta tags */
    'meta' => [
        'viewport' => 'width=device-width, initial-scale=1.0',

        /** Description in header */
        'description' => 'this is an exmaple site',

        /** SEO keywords */
        'keywords' => 'example, kNot Framework',
    ],

    /** title */
    'title' => $_ENV['SITE_NAME'],

];