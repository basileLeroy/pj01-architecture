<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Lang;

class OrderShipped extends Mailable
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
    public $bookCover;
    public $product;
    public $price;
    public $status;
    public $order_number;
    public $date;

    public function __construct(string $first_name, string $last_name, string $email, string $phone, string $country, string $region, string $zip, string $city, string $street, string $bookCover, string $product, string $price, string $status, string $order_number)
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
        $this->bookCover = url('/images/architectuur/products/' . $bookCover);
        $this->product = $product;
        $this->price = $price;
        $this->status = $status;
        $this->order_number = $order_number;
        $this->date = Carbon::now();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.orderShipped')
            ->subject('Architecturer - Status: ' . Lang::get('order.title') );
    }
}
