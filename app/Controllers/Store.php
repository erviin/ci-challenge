<?php

namespace App\Controllers;

use Stripe;

class Store extends BaseController
{
    public function index()
    {
        return view('store');
    }

    public function checkout($id)
    {
        return view('store_checkout', ['product_id' => $id]);
    }

    public function checkout_success()
    {
        return view('checkout_success');
    }

    public function payment_intents()
    {
        Stripe\Stripe::setApiKey('sk_test_jY8VJ0W8C1iOau5cqQmGJuIt00iWHEHnpl');
        $json_req = json_decode($this->request->getBody(), true);
        $amount = (float) str_replace("$", '', $json_req['amount']);
        $paymentIntent = \Stripe\PaymentIntent::create([
            "amount" => round($amount * 100),
            "currency" => 'usd',
        ]);

        return json_encode($paymentIntent);
    }
    public function public_key()
    {
        return json_encode(['publicKey' => 'pk_test_orCVw9oNvGplRkfVETTizKQD00NBBNrPLe']);
    }
}
