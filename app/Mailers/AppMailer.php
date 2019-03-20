<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 16.03.2019
 * Time: 14:37
 */
namespace App\Mailers;


use App\Ticket;

class AppMailer {
    protected $mailer;
    protected $fromAddress = 'roman@kislovs.ru';
    protected $fromname = 'Сервис поддержки клиентов Института Радиоэлектронных Систем';
    protected $to;
    protected $subject;
    protected $view;
    protected $data = [];

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendTicketInformation($user, Ticket $ticket)
    {
        $this->to = $user->email;
        $this->subject = "[Завка $ticket->ticket_id] $ticket->title";
        $this->view = 'emails.ticket_info';
        $this->data = compact('user','ticket');

        return $this->deliver();
    }

    public function deliver()
    {
        $this->mailer->send($this->view,$this->data,function ($message){
           $message->from($this->fromAddress, $this->fromname)->to($this->to)->subject($this->subject);
        });
    }
}
