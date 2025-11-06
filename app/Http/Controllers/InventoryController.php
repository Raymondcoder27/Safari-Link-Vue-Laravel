<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class InventoryController extends Controller
{
    public function index(): JsonResponse
    {
        $inventory = [
            ['id' => 1, 'item' => 'Product A', 'quantity' => 100],
            ['id' => 2, 'item' => 'Product B', 'quantity' => 200],
        ];

        return response()->json($inventory);
    }
}