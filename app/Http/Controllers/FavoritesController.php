<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class FavoritesController extends Controller
{
    public function post()
    {
        $COMMENT = "Favorites created successfully";
        $now = Carbon::now();
        $param = [
            "created_at" => $now,
            "updated_at" => $now
        ];
        DB::table('favorites')->insert($param);
        return response()->json([
            'message' => $COMMENT,
            'data' => $param
        ], 200);
    }
    public function delete(Request $request)
    {
        $COMMENT = "Favorites deleted successfully";
        DB::table('favorites')->where('store_id', $request->store_id)->where('user_id', $request->user_id)->delete();
        return response()->json([
            'message' => $COMMENT,
        ], 200);
    }
}
