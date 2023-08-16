<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeclinedRequestNotification extends Notification
{
    use Queueable;
    public $first_name; 
    public $middle_name; 
    public $last_name; 
    public $item_name; 
    public $amount; 
    /**
     * Create a new notification instance.
     */
    public function __construct($first_name,$middle_name,$last_name,$item_name,$amount)
    {
        $this->first_name = $first_name;
        $this->middle_name = $middle_name;
        $this->last_name = $last_name;
        $this->item_name = $item_name;
        $this->amount = $amount;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'name' =>$this->first_name,
            'mname' =>$this->middle_name,
            'lname' =>$this->last_name,
            'item_name' =>$this->item_name,
            'amount' =>$this->amount,
        ];
    }
}
