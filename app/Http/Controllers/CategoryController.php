<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'created_by' => 'required|exists:admins,id',
        ]);

        $category = Category::create($validated);
        return response()->json($category, 201);
    }

    public function index()
    {
        $categories = Category::with('createdBy')->get();
        return response()->json($categories);
    }
}
