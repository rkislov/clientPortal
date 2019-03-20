<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Информация системы поддержки клиентов</title>
</head>
<body>
<p>
    Спасибо {{ ucfirst($user->name) }} что оставили заявку.
</p>

<p>Тема: {{ $ticket->title }}</p>
<p>Приоритет: {{ $ticket->priority()->name }}</p>
<p>Статус: {{ $ticket->status()->name }}</p>

<p>
    Адрес для отслеживания состояния заявки {{ url('tickets/'. $ticket->ticket_id) }}
</p>

</body>
</html>
