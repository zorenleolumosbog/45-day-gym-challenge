<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                // Payment succeeded logic here
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
