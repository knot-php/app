<?php
return [
    'log_manager' => [
        'log_enabled' => true,
    ],
    'logs' => [
        'front' => [
            'type' => 'file',
            'enabled' => true,
            'options' => [
                'logs_dir'   => '%LOGS_DIR%/front/%DATE_Y4%/%DATE_M%/%DATE_D%',
                'file_name'  => '%DATE_Y4%-%DATE_M%-%DATE_D%_%DATE_H24%-%DATE_I%-%DATE_S%_%DATE_U%_front.log',
                'log_levels' => ['ALL'],
            ],
        ],
        'error' => [
            'type' => 'file',
            'enabled' => true,
            'options' => [
                'logs_dir'   => '%LOGS_DIR%/front/%DATE_Y4%/%DATE_M%/%DATE_D%',
                'file_name'  => '%DATE_Y4%-%DATE_M%-%DATE_D%_%DATE_H24%-%DATE_I%-%DATE_S%_%DATE_U%_error.log',
                'log_levels' => ['E'],
            ],
        ],
    ],
];