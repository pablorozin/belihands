<?php

namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $phone,
        public readonly ?Product $product,
    )
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Recibiste un contacto de {$this->name} ({$this->email})";

        if ($this->product) {
            $subject .= " por el producto {$this->product->name} ({$this->product->code})";
        }

        return $this
            ->subject($subject)
            ->replyTo($this->email, $this->name)
            ->view('mails.contact')
            ->text('mails.contact_plain');
    }
}
