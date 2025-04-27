<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function summary()
    {
        $totalStock = Item::sum('quantity');
        $totalValue = Item::sum(DB::raw('price * quantity'));
        $averagePrice = Item::avg('price') ?? 0;

        return response()->json([
            'total_stock' => $totalStock,
            'total_value' => $totalValue,
            'average_price' => $averagePrice,
        ]);
    }
}
