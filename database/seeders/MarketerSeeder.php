<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MarketerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('marketers')->insert([
            'Name' => Str::random(10),
            'ID' =>rand(1234,456789),
            'Phone' => rand(1234,456789),
            'address' => Str::random(10),

        ]);
    }
}
