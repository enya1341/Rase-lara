<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ReservationsController extends Controller
{
    public function put($store_id, Request $request)
    {
        $now = Carbon::now();
        $param = [
            "user_id" => $request->user_id,
            "store_id" => $store_id,
            "day" => $request->day,
            "number" => $request->number,
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
        $reservations_use_userid = DB::table('Reservations')->where('user_id', $request->user_id)->get();
        if($reservations_use_userid){
            $datetime = preg_split('/["\s]/', DB::table('Reservations')->where('user_id', $request->user_id)->select('day')->get());
            $params = [
                'reservations'   => $reservations_use_userid,
                'date' => $datetime[3],
                'time' => $datetime[4]
            ];
        }
        return response()->json([
            'message' => 'Reservation got successfully',
            'data' => $params
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
