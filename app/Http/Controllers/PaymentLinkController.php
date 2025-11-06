<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentLinkController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'amount' => 'required|numeric',
            'currency' => 'required|string',
            'description' => 'nullable|string',
            'redirect_url' => 'nullable|url',
        ]);

        $response = Http::withToken(env('FLUTTERWAVE_SECRET_KEY'))
            ->post(env('FLUTTERWAVE_BASE_URL').'/payment-links', [
                'title' => $validated['title'],
                'amount' => $validated['amount'],
                'currency' => strtoupper($validated['currency']),
                'description' => $validated['description'] ?? '',
                'redirect_url' => $validated['redirect_url'] ?? url('/payments/success'),
            ]);

        return response()->json($response->json(), $response->status());
    }

    public function index()
    {
        $response = Http::withToken(env('FLUTTERWAVE_SECRET_KEY'))
            ->get(env('FLUTTERWAVE_BASE_URL').'/payment-links');

        return response()->json($response->json());
    }
}
