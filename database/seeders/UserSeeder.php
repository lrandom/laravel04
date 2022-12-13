<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Lrandom1',
            'email' => 'a@gmail1.com',
            'password' => \Illuminate\Support\Facades\Hash::make("lrandom"),
        ]);
    }
}
