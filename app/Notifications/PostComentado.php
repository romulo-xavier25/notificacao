<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Comentario;

class PostComentado extends Notification implements ShouldQueue
{
    use Queueable;
    private $comentario;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Comentario $comentario)
    {
        $this->comentario = $comentario;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject("Novo comentario - " . $this->comentario->titulo)
                    ->line($this->comentario->mensagem)
                    ->action('Veja o comentário', route('posts.show', $this->comentario->post_id))
                    ->line('Abraços <3');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'comentario'    => $this->comentario->load('user'),
        ];
    }
}
