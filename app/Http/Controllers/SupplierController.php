<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'contact_info' => 'nullable|string|max:100',
            'created_by' => 'required|exists:admins,id',
        ]);

        $supplier = Supplier::create($validated);
        return response()->json($supplier, 201);
    }

    public function index()
    {
        $suppliers = Supplier::with('createdBy')->get();
        return response()->json($suppliers);
    }
}
