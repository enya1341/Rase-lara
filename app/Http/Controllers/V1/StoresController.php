<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function get($store_id)
    {
        if($store_id){
            $items = DB::table('stores')->where('id',$store_id)->get();
            return response()->json([
                'message' => 'User got successfully',
                'data' => $items
            ], 200);
        }else{
            $items = DB::table('stores')->get();
            return response()->json([
                'message' => 'User got successfully',
                'data' => $items
            ], 200);
        }

    }

}
