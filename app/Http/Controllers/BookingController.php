<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class BookingController extends Controller
{
    public function index(): JsonResponse
    {
        $bookings = [
            ['id' => 1, 'date' => '2025-10-01', 'customer' => 'John Doe'],
            ['id' => 2, 'date' => '2025-10-02', 'customer' => 'Jane Smith'],
        ];

        return response()->json($bookings);
    }
}