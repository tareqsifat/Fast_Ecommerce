<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function shippingSearch(Request $request)
    {
        if ($request->shipping_search_query == null) {
            session()->forget('shipping_search_query');
        } else {
            session(['shipping_search_query' => $request->shipping_search_query]);
        }
        return redirect()->route('front.shipping');
    }







    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function filterChangeByCategory(Request $request, $slug)
    {
        if ($request->search_by == 'category') { //search_by
            $cateData = Category::where('slug', $slug)->first();
            session(['search_by' => 'categories']);
        } elseif ($request->search_by == 'sub_category') {
            $cateData = Subcategory::where('slug', $slug)->first();
            session(['search_by' => 'subcategories']);
        } elseif ($request->search_by == 'sub_sub_categories') {
            $cateData = SubSubCategory::where('slug', $slug)->first();
            session(['search_by' => 'sub_sub_categories']);
        } elseif ($request->search_by == 'filter') {
            $cateData = DB::table(session('search_by'))->where('slug', $slug)->first();
        } else {
            return abort(404);
        }

        if ($cateData) {
            if ($request->min_price == null) {
                session()->forget('min_price');
            } else {
                session(['min_price' => $request->min_price]);
            }
            if ($request->max_price == null) {
                session()->forget('max_price');
            } else {
                session(['max_price' => $request->max_price]);
            }
            // instock 
            if ($request->instock == null) {
                session()->forget('instock');
            } else {
                session(['instock' => $request->instock]);
            }

            if ($request->short_by) {
                session(['short_by' => $request->short_by]);
            }
            if ($request->countby) {
                session(['countby' => $request->countby]);
            }
            if ($request->type) {
                session(['type' => $request->type]);
            }
            return redirect()->route('filter.get', $slug);
        } else {
            return abort(404);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function headerSearch(Request $request, $slug)
    {
        if ($request->hScategory_id == 'all') {
            session()->forget('hScategory_id');
        } else {
            session(['hScategory_id' => $request->hScategory_id]);
        }
        if ($request->hSbrand_id == 'all') {
            session()->forget('hSbrand_id');
        } else {
            session(['hSbrand_id' => $request->hSbrand_id]);
        }
        if ($request->min_price == null) {
            session()->forget('min_price');
        } else {
            session(['min_price' => $request->min_price]);
        }
        if ($request->max_price == null) {
            session()->forget('max_price');
        } else {
            session(['max_price' => $request->max_price]);
        }
        // instock 
        if ($request->instock == null) {
            session()->forget('instock');
        } else {
            session(['instock' => $request->instock]);
        }

        if ($request->short_by) {
            session(['short_by' => $request->short_by]);
        }
        if ($request->countby) {
            session(['countby' => $request->countby]);
        }
        if ($request->type) {
            session(['type' => $request->type]);
        }
        return redirect()->route('search.header', $slug);
    }
}
