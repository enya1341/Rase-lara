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
        foreach($reservations_use_userid as $reservation){
            $datetime = preg_split('/["\s]/', $reservation->day);
            $params = [
                'reservations'   => $reservations_use_userid,
                'date' => $datetime[0],
                'time' => $datetime[1]
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
