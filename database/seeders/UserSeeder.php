<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'Airon Lima', 'email' => 'aironwellington@gmail.com', 'password' => Hash::make('123456'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
