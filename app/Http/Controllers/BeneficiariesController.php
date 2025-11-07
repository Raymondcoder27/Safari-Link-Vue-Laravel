<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use Illuminate\Http\Request;

class BeneficiariesController extends Controller
{
    public function index()
    {
        return response()->json(Beneficiary::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'relationship' => 'nullable|string|max:100',
        ]);

        $beneficiary = Beneficiary::create($validated);
        return response()->json($beneficiary, 201);
    }

    public function show($id)
    {
        $beneficiary = Beneficiary::find($id);
        if (!$beneficiary) {
            return response()->json(['message' => 'Beneficiary not found'], 404);
        }
        return response()->json($beneficiary);
    }

    public function update(Request $request, $id)
    {
        $beneficiary = Beneficiary::find($id);
        if (!$beneficiary) {
            return response()->json(['message' => 'Beneficiary not found'], 404);
        }

        $beneficiary->update($request->all());
        return response()->json($beneficiary);
    }

    public function destroy($id)
    {
        $beneficiary = Beneficiary::find($id);
        if (!$beneficiary) {
            return response()->json(['message' => 'Beneficiary not found'], 404);
        }

        $beneficiary->delete();
        return response()->json(['message' => 'Beneficiary deleted successfully']);
    }
}
