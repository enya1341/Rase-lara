<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'email' => 'ryuna6337@gmail.com',
            'password' => 'test'
        ];
        DB::table('users')->insert($param);
    }
}
