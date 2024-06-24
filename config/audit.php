<?php



return [
    'user_actions' => [
        'login' => true,
        'profile_update' => true,
        // Add more actions here
    ],
    'system_events' => [
        'database_update' => true,
        'file_upload' => true,
        // Add more events here
    ],

    'log_user_actions' => true,
    'log_system_events' => true,
    'mask_fields' => ['password', 'credit_card'],
];
