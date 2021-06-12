<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StoresController extends Controller
{

    public function storeget()
    {
            $items = DB::table('stores')->get();
            return response()->json([
                'message' => 'Store got successfully',
                'data' => $items
            ], 200);

    }

    public function storedata($store_id)
    {
            $items = DB::table('stores')->where('id', $store_id)->get();
            return response()->json([
                'message' => 'Storedata got successfully',
                'data' => $items
            ], 200);
    }

}
