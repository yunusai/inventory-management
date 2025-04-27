<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'created_by' => 'required|exists:admins,id',
        ]);

        $item = Item::create($validated);
        return response()->json($item, 201);
    }

    public function index()
    {
        $items = Item::with(['category', 'supplier', 'createdBy'])->get();
        return response()->json($items);
    }

    public function lowStock()
    {
        $threshold = 5;
        $items = Item::where('quantity', '<', $threshold)
            ->with(['category', 'supplier', 'createdBy'])
            ->get();
        return response()->json($items);
    }
}
