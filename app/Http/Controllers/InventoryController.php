<?php

namespace App\Http\Controllers;
use App\Models\Inventory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class InventoryController extends Controller
{
    // public function index(): JsonResponse
    // {
    //     $inventory = [
    //         ['id' => 1, 'item' => 'Product A', 'quantity' => 100],
    //         ['id' => 2, 'item' => 'Product B', 'quantity' => 200],
    //     ];

    //     return response()->json($inventory);
    // }


   public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'item' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
        ]);

        $inventory = Inventory::create($validated);

        return response()->json($inventory, 201);
    }


    public function index(): JsonResponse
    {
        return response()->json(Inventory::all());
    }
}