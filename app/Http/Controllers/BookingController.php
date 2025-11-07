<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        return response()->json(Booking::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string',
            'service_type' => 'required|string',
            'date' => 'required|date',
            'status' => 'sometimes|string'
        ]);

        $booking = Booking::create($validated);

        return response()->json($booking, 201);
    }
}
