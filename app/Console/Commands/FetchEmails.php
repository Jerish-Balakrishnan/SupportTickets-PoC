<?php

namespace App\Console\Commands;

use App\Mail\TicketCreated;
use App\Models\SupportTicket;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Webklex\IMAP\Facades\Client;

class FetchEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch emails and create support tickets';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = Client::account('default');
        $client->connect();

        // Read only the unread messages from Inbox
        $folder = $client->getFolder('INBOX');
        $messages = $folder->messages()->unseen()->get();

        foreach ($messages as $message) {
            $ticket = new SupportTicket();
            $ticket->subject = $message->getSubject();
            $ticket->body = $message->getTextBody();
            $ticket->email = $message->getFrom()[0]->mail;
            $ticket->save();

            // Send an email to the sender
            Mail::to($ticket->email)->send(new TicketCreated($ticket));

            // Mark the message as read
            $message->setFlag('Seen');
        }

        $client->disconnect();

        $this->info('Emails have been fetched, support tickets created, and confirmation emails sent.');
    }
}
