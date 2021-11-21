<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationOrder;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mollie\Laravel\Facades\Mollie;

class MollieController extends Controller
{

    public function  __construct() {

        Mollie::api()->setApiKey('test_pg9VavKdz39DpWhAvPeq2ytg36vHRa'); // your mollie test api key
    }

    /*
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function preparePayment(Request $request)
    {
        $request->validate([
            'firstName' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
            'lastName' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
            'email' => 'required|max:255|email',
            'phone' => 'required|max:20',
            'street' => 'required|max:225',
            'city' => 'required|max:225',
            'region' => 'max:225',
            'postal' => 'required|numeric',
            'country' => 'required|max:225',
        ]);

        $product = Product::get()
        ->where('title', '=', session('Title'))
        ->first();

        $payment = Mollie::api()->payments()->create([
        'amount' => [
            'currency' => $product->currency, // Type of currency you want to send
            'value' => $product->price, // You must send the correct number of decimals, thus we enforce the use of strings
        ],
        'description' => $product->title,
        'redirectUrl' => route('payment.check', ['locale' => app()->getLocale(), 'purchase_id' => $product->id ] ), // after the payment completion where you to redirect
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);

        Customer::create([
            'purchase_id' => $payment->id,
            'payment_status' => 'Open',
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'phone' => $request->phone,
            'street' => $request->street,
            'city' => $request->city,
            'region' => $request->region,
            'postal' => $request->postal,
            'country' => $request->country,
            'delivery_status' => "To be sent out",
        ]);

        session()->put([
            'Order_Number' => $payment->id,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'phone' => $request->phone,
            'street' => $request->street,
            'city' => $request->city,
            'region' => $request->region,
            'postal' => $request->postal,
            'country' => $request->country,
        ]);
        session()->save();



        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    /*
     * Page redirection after the successful payment
     *
     * @return Response
     */
    public function checkTransaction() {
        $payment = Mollie::api()->payments()->get(session("Order_Number"));
        $products = Product::all();

        if ($payment->status === "paid") {
            $product = Product::get()
                ->where('title', '=', session('Title'))
                ->first();

            $updateCustomer = Customer::get()
                ->where('purchase_id', '=', session('Order_Number'))
                ->first();

            $updateCustomer->payment_status = 'Paid';
            $updateCustomer->save();

            Mail::to(session('email'))
                ->queue(new ConfirmationOrder(session('first_name'), session('last_name'), $product->title, $product->price, "Paid"));

            session()->flash('PaymentMessage', 'Purchase has been completed! .. An email has been sent.');
        } else {
            session()->flash('PaymentMessage', 'There has been an issue, your payment did not go through.');
        }
        return view('shop.products')->with('products', $products);
    }
}
