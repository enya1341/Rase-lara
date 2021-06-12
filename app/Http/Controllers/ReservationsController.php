<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservationsController extends Controller
{
    public function post(Request $request)
    {
        $now = Carbon::now();
        $param = [
            "time" => $request->time,
            "day" => $request->day,
            "created_at" => $now,
            "updated_at" => $now
        ];
        DB::table('Reservations')->insert($param);
        return response()->json([
            'message' => 'Reservation created successfully',
            'data' => $param
        ], 200);
    }

    public function get(Request $request)
    {
        $items = DB::table('Reservations')->where('user_id', $request->user_id)->get();
        return response()->json([
            'message' => 'Reservation got successfully',
            'data' => $items
        ], 200);
    }

    public function delete(Request $request)
    {
        DB::table('Reservations')->where('store_id', $request->store_id)->where('user_id', $request->user_id)->delete();
        return response()->json([
            'message' => 'Reservation deleted successfully',
        ], 200);
    }
}
