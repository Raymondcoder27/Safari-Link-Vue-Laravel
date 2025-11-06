<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class MyBusinessController extends Controller
{
    public function index(): JsonResponse
    {
        $businessInfo = [
            'name' => 'My Business',
            'location' => '123 Main St',
        ];

        return response()->json($businessInfo);
    }
}