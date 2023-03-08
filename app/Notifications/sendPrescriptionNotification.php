<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;


class sendPrescriptionNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['telegram'];
    }

    public function toTelegram($notifiable)
    {

        // dd($notifiable);

        return TelegramMessage::create()
            ->to('-450298079') //testing
            // ->to('-1001281632553') //production, nanti harus dipindah ke env
            ->content('*Nama Pasien:*')
            ->line('')
            ->line($notifiable->pasien->nama_lengkap)
            ->line('')
            ->line('*Diagnosa:*')
            ->line($notifiable->diagnosa)
            ->line('')
            ->line('*Resep:*')
            ->line($notifiable->planning);
    }
}
