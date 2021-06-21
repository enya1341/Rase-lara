<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'test',
            'email' => 'ryuusei.y828633739@gmail.com',
            'password' => Hash::make('test')
        ];
        DB::table('users')->insert($param);
    }
}
