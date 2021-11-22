<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Lang;

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
    public $email;
    public $phone;
    public $country;
    public $region;
    public $zip;
    public $city;
    public $street;
    public $product;
    public $price;
    public $status;
    public $order_number;

    public function __construct(string $first_name, string $last_name, string $email, string $phone, string $country, string $region, string $zip, string $city, string $street, string $product, string $price, string $status, string $order_number)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->country = $country;
        $this->region = $region;
        $this->zip = $zip;
        $this->city = $city;
        $this->street = $street;
        $this->product = $product;
        $this->price = $price;
        $this->status = $status;
        $this->order_number = $order_number;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.confirmation-order')
            ->subject('Architecturer - ' . Lang::get('order.title') );
    }
}
