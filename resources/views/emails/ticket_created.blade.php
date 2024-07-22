<!DOCTYPE html>
<html>

<head>
    <title>Support Ticket Created</title>
</head>

<body>
    <p>Dear {{ $ticket->email }},</p>
    <p>Thank you for reaching out. We have created a support ticket for your query.</p>
    <p>Ticket ID: {{ $ticket->id }}</p>
    <p>Subject: {{ $ticket->subject }}</p>
    <p>We will get back to you shortly.</p>
    <p>Best regards,<br>{{ config('app.name') }} Support Team</p>
</body>

</html>