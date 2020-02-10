<?php

namespace App\Controllers;

use Stripe;
use PHPMailer\PHPMailer\SMTP;
use App\Models\Transaction_model;
use PHPMailer\PHPMailer\PHPMailer;

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

    public function checkout_success($stripe_id)
    {
        $mail = new PHPMailer(true);

        try {
            $transaction_model = new Transaction_model();
            $data = $transaction_model->where('stripe_id', $stripe_id)
                ->find();
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'erfin.aditya@gmail.com';
            $mail->Password   = '************';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('erfin.aditya@gmail.com', 'Mailer');
            $email = $data[0]['email'];
            $mail->addAddress($email);


            $mail->isHTML(true);
            $mail->Subject = 'Receipt of ' . $data[0]['product_name'];
            $mail->Body    = '<b>THANK YOU SO MUCH :) </b>';
            $mail->AltBody = 'THANK YOU SO MUCH :)';
            $mail->send();
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }

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
        $transaction_model = new Transaction_model();
        $data = [
            'stripe_id' => $paymentIntent->id,
            'business_name' => $json_req['businessName'],
            'customer_name' => $json_req['customerName'],
            'email' => $json_req['customerEmail'],
            'qty' => $json_req['items'][0]['quantity'],
            'amount' => $amount,
            'product_id' => $json_req['items'][0]['sku'],
            'product_name' => $json_req['productName']
        ];
        $transaction_model->insert($data);

        return json_encode($paymentIntent);
    }
    public function public_key()
    {
        return json_encode(['publicKey' => 'pk_test_orCVw9oNvGplRkfVETTizKQD00NBBNrPLe']);
    }
}
