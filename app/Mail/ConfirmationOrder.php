<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $first_name;
    public $last_name;
    public $product;
    public $price;
    public $status;

    public function __construct(string $first_name, string $last_name, string $product, string $price, string $status)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->product = $product;
        $this->price = $price;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.confirmation-order')
            ->subject('Thank you for purchasing our products');
    }
}
