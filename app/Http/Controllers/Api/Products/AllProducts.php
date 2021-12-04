<?php

namespace App\Http\Controllers\Api\Products;

use App\Helpers\StatusCode;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AllProducts extends Controller
{

    public function index()
    {
        try {
            $result = Product::where('status', 0)->get();
            if ($result) {
                return [
                    'message' => 'Data is fetched successfully',
                    'data' => $result,
                    'status' => StatusCode::STATUS_CODE_SUCCESS
                ];
            } else {
                return [
                    'message' => 'No result found',
                    'data' => null,
                    'status' => StatusCode::STATUS_CODE_NOT_FOUND
                ];
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return [
                'message' => 'Something went wrong',
                'data' => $th->getMessage(),
                'status' => StatusCode::STATUS_CODE_ERROR
            ];
        }
    }
}
