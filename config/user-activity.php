<?php

return [
    'activated'        => true, // active/inactive all logging
    'middleware'       => ['web', 'auth'],
    'route_path'       => 'admin/user-activity',
    'admin_panel_path' => 'admin/dashboard',
    'delete_limit'     => 7, // default 7 days
    'tables_except'    => [
        'failed_jobs',
        'migrations',
        'password_reset_tokens',
        'password_resets',
        'personal_access_tokens',
        'user_activities'
    ],

    'model' => [
        'user' => "App\Models\User"
    ],

    'log_events' => [
        'on_create'     => true,
        'on_edit'       => true,
        'on_delete'     => true,
        'on_login'      => true,
        'on_update'     => true,
        'on_lockout'    => true
    ]
];

