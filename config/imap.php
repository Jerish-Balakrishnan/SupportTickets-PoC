<?php

return [

    /*
    |--------------------------------------------------------------------------
    | IMAP default account
    |--------------------------------------------------------------------------
    |
    | The default account identifier. It will be used as default for all
    | missing account parameters.
    |
    */
    'default' => env('IMAP_DEFAULT_ACCOUNT', 'default'),

    /*
    |--------------------------------------------------------------------------
    | Available IMAP accounts
    |--------------------------------------------------------------------------
    |
    | Please list all IMAP accounts you want to connect to.
    | Make sure you include all required options.
    |
    */
    'accounts' => [

        'default' => [
            'host'          => env('IMAP_HOST', 'imap.gmail.com'),
            'port'          => env('IMAP_PORT', 993),
            'encryption'    => env('IMAP_ENCRYPTION', 'ssl'),
            'validate_cert' => env('IMAP_VALIDATE_CERT', true),
            'username'      => env('IMAP_USERNAME'),
            'password'      => env('IMAP_PASSWORD'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Available IMAP options
    |--------------------------------------------------------------------------
    |
    | Available php-imap options are listed below
    | Make sure you check them for your account.
    |
    */
    'options' => [
        'delimiter' => '/',
        'fetch' => \Webklex\PHPIMAP\IMAP::FT_UID,
        'sequence' => \Webklex\PHPIMAP\IMAP::ST_MSGN,
        'fetch_body' => true,
        'fetch_attachment' => true,
        'fetch_flags' => false,
        'message_key' => 'id',
        'fetch_order' => 'asc',
        'dispositions' => ['attachment', 'inline'],
        'common_folders' => [
            'root' => false,
            'junk' => 'INBOX.junk',
            'draft' => 'INBOX.drafts',
            'sent' => 'INBOX.sent',
            'trash' => 'INBOX.trash',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Available IMAP mask
    |--------------------------------------------------------------------------
    |
    | Mask a message and only show what you want.
    |
    | \Webklex\PHPIMAP\Support\Masks\MessageMask::class
    |
    */
    'masks' => [
        'message' => \Webklex\PHPIMAP\Support\Masks\MessageMask::class,
    ],
];
