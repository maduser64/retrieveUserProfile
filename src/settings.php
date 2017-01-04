<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // custom open graph settings
        'openGraph' => [
            'app_id' => '643931279111443',
            'app_secret' => '4b27dbed273f80adbcc5072f0688cb18',
            'default_graph_version' => 'v2.2',
            'query_fields' => 'first_name,last_name'
        ]
    ],
];
