<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'asma@gmail.com',
            'password' => Hash::make('123456789'),
        ]);

    }
}
