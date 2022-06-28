<?php

$config = [
    'settings' => [
        'displayErrorDetails' => true,
        'jiraApi' => [
            'defaultProjectId' => 13017
        ]
    ],
];

if (getenv('MODE') == 'test') {
    $config['settings']['jiraApi']['defaultProjectId'] = 14301;
}


return $config;