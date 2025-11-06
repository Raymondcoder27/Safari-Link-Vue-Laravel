<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    public function index(): JsonResponse
    {
        $data = [
            'totalBookings' => 5,
            'totalCustomers' => 10,
        ];

        return response()->json($data);
    }
}