<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;


class CreateDonationsIntervalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('donations_interval')->insertOrIgnore([
            [
                'id' => 1,
                'name' => 'Único'
            ],
            [
                'id' => 2,
                'name' => 'Bimestral'
            ] ,
            [
                'id' => 3,
                'name' => 'Semestral'
            ],
            [
                'id' => 4,
                'name' => 'Anual'
            ]
        ]);
    }
}
