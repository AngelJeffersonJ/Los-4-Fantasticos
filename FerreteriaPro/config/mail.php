<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | Esta opción controla el servicio de correo predeterminado usado para
    | enviar todos los mensajes de email, a menos que se especifique otro.
    |
    */

    'default' => env('MAIL_MAILER', 'smtp'), // Cambiado a 'smtp'

    /*
    |--------------------------------------------------------------------------
    | Configuración de los Mailers
    |--------------------------------------------------------------------------
    |
    | Aquí se configuran todos los mailers utilizados por la aplicación.
    |
    */

    'mailers' => [

        'smtp' => [
            'transport' => 'smtp',
            'host' => env('MAIL_HOST', 'smtp.gmail.com'),
            'port' => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'auth_mode' => null,
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Dirección Global "From"
    |--------------------------------------------------------------------------
    |
    | Se puede establecer una dirección y nombre de email global para todos
    | los correos salientes desde la aplicación.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'jeffersonreincarnation@gmail.com'),
        'name' => env('MAIL_FROM_NAME', 'Ferretería Proveedores'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Configuración del Mailer de Markdown
    |--------------------------------------------------------------------------
    |
    | Laravel usa plantillas de Markdown para construir correos electrónicos
    | ricos en contenido. Se pueden personalizar los componentes aquí.
    |
    */

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];
