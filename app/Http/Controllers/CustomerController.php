<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    public function index(): JsonResponse
    {
        $customers = [
            ['id' => 1, 'name' => 'Alice Johnson', 'email' => 'alice@example.com'],
            ['id' => 2, 'name' => 'Bob Brown', 'email' => 'bob@example.com'],
        ];

        return response()->json($customers);
    }
}