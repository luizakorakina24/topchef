<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Lead $lead)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Заявка с сайта TopChef');
    }

    public function content(): Content
    {
        $lines = [];

        foreach (config('leads.labels') as $field => $label) {
            $value = $this->lead->{$field};

            if ($value instanceof \DateTimeInterface) {
                $value = $value->format('d.m.Y');
            }

            if ($value !== null && $value !== '') {
                $lines[$label] = (string) $value;
            }
        }

        return new Content(text: 'emails.lead', with: ['lines' => $lines]);
    }
}
