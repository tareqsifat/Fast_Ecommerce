<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = Product::where('subcategory_id', $request->category_id)
                    ->whereBetween('price', [$request->min_price, $request->max_price])
                    ->orWhere('availability', $request->availability ? $request->availability : '1')
                    ->get();
            } else {
                $data = Product::where('category_id', $request->category_id)
                    ->orderBy($request->orderBy, $request->shortBy)
                    ->get();
            }
        }
    }
}
