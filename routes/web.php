<?php

use Webklex\IMAP\Facades\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/test-imap', function () {
//     try {
//         $client = Client::account('default');
//         $client->connect();

//         $folder = $client->getFolder('INBOX');
//         $messages = $folder->messages()->unseen()->limit(1)->get();

//         $client->disconnect();

//         if ($messages->count() > 0) {
//             foreach ($messages as $message) {
//                 Log::info('Email Subject: ' . $message->getSubject());
//                 Log::info('Email From: ' . $message->getFrom()[0]->mail);
//                 Log::info('Email Body: ' . $message->getTextBody());
//             }
//             return 'IMAP connection successful, fetched an unseen email. Check logs for details.';
//         } else {
//             return 'IMAP connection successful, but no unseen emails found.';
//         }
//     } catch (\Exception $e) {
//         Log::error('IMAP connection failed: ' . $e->getMessage());
//         return 'IMAP connection failed. Check logs for details.';
//     }
// });

// Route::get('/test-smtp', function () {
//     $details = [
//         'title' => 'Test Email from Laravel',
//         'body' => 'This is a test email to check SMTP configuration.'
//     ];

//     Mail::raw('This is a test email to check SMTP configuration.', function($message) {
//         $message->to('jerishbalakrishnan@gmail.com')
//                 ->subject('Test Email from Laravel');
//     });

//     return 'Test email sent successfully!';
// });