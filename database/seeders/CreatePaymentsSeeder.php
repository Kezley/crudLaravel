<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CreatePaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('payments')->insertOrIgnore([
            [
                'id' => 1,
                'name' => 'Débito'
            ],
            [
                'id' => 2,
                'name' => 'Crédito'
            ]
        ]);
    }
}
