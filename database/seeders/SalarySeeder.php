<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salaries')->insert([
            'title' => '0 - 1000 usd',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('salaries')->insert([
            'title' => '1000 - 2000 usd',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('salaries')->insert([
            'title' => '2000 - 5000 usd',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('salaries')->insert([
            'title' => '5000 - 10000 usd',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
