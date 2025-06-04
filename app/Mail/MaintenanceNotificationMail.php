<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MaintenanceNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $machine;

    public function __construct($machine)
    {
        $this->machine = $machine;
    }

    public function build()
    {
        return $this->from('giulianamercado43@gmail.com')
                    ->subject('Alerta de Mantenimiento!')
                    ->markdown('mail.maintenance-notification')
                    ->with([
                        'serialNumber' => $this->machine->serial_number,
                        'kilometers' => $this->machine->current_kilometers,
                        'kilometersLimit' => $this->machine->maintenance_kilometers_limit,
                    ]);
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Maintenance Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         markdown: 'mail.maintenance-notification',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
