<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->all();
        $event = null;

        try {
            $event = \Stripe\Event::constructFrom($payload);
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response()->json(['error' => 'Invalid payload'], 400);
        }

        // Handle the event based on its type
        switch ($event->type) {
            case 'payment_intent.succeeded':
                $paymentIntent = $event->data->object;

                // Retrieve the customer object from the payment intent
                $customer = \Stripe\Customer::retrieve($paymentIntent->customer);

                // Get the customer's name and email
                $customer->name;
                $customer->email;
                $password = Hash::make(Str::random(8));

                User::create([
                    'name' => $customer->name,
                    'email' => $customer->email,
                    'password' => $password,
                    'password_confirmation' => $password
                ]);

                break;
            case 'payment_intent.payment_failed':
                // Payment failed logic here
                break;
            // Handle other event types here
            default:
                // Unexpected event type
                return response()->json(['error' => 'Unexpected event type'], 400);
        }

        return response()->json(['success' => true]);
    }
}
