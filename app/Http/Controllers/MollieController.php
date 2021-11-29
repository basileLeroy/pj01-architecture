<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationOrder;
use App\Mail\OrderShipped;
use App\Mail\PurchaseReport;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mollie\Laravel\Facades\Mollie;

class MollieController extends Controller
{

    public function  __construct() {

        Mollie::api()->setApiKey(env('MOLLIE_KEY')); // your mollie test api key
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

        $product = Product::where('title', '=', session('Title'))
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
            $product = Product::where('title', '=', session('Title'))
                ->first();

            $customer = Customer::where('purchase_id', '=', session('Order_Number'))
                ->first();

            $updateCustomer = Customer::where('purchase_id', '=', session('Order_Number'))
                ->first();
            $updateCustomer->payment_status = 'Paid';
            $updateCustomer->save();

            Mail::to(session('email'))
                ->queue(new ConfirmationOrder(
                    $customer->first_name,
                    $customer->last_name,
                    $customer->email,
                    $customer->phone,
                    $customer->country,
                    $customer->region,
                    $customer->postal,
                    $customer->city,
                    $customer->street,
                    $product->cover,
                    $product->title,
                    $product->price,
                    $customer->payment_status,
                    $customer->purchase_id
                ));

            Mail::to(env('MAIL_ADMIN'))
                ->queue(new PurchaseReport(
                    $customer->first_name,
                    $customer->last_name,
                    $customer->email,
                    $customer->phone,
                    $customer->country,
                    $customer->region,
                    $customer->postal,
                    $customer->city,
                    $customer->street,
                    $product->cover,
                    $product->title,
                    $product->price,
                    $customer->payment_status,
                    $customer->purchase_id
                ));

            session()->flash('PaymentMessage', 'Purchase has been completed! .. An email has been sent.');
        } else {
            session()->flash('PaymentMessage', 'There has been an issue, your payment did not go through.');
        }
        return view('shop.products')->with('products', $products);
    }

    public function sendPackageMail() {
        $product = Product::where('title', '=', session('Title'))
            ->first();


        $customer = Customer::where('purchase_id', '=', session('Order_Number'))
            ->first();

        $updateCustomer = Customer::where('purchase_id', '=', session('Order_Number'))
            ->first();
        $updateCustomer->delivery_status = 'Package sent';
        $updateCustomer->save();

        Mail::to(session('email'))
            ->queue(new OrderShipped(
                $customer->first_name,
                $customer->last_name,
                $customer->email,
                $customer->phone,
                $customer->country,
                $customer->region,
                $customer->postal,
                $customer->city,
                $customer->street,
                $product->cover,
                $product->title,
                $product->price,
                $customer->payment_status,
                $customer->purchase_id
            ));

        return view('shop.confirmation');
    }
}
