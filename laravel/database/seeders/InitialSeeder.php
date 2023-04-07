<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert data into the state table
        DB::table('state')->insert([
            [
                'value' => 'Aktívne',
            ],
            [
                'value' => 'Neaktívne',
            ]
        ]);

        // Insert data into the role table
        DB::table('role')->insert([
            [
                'value' => 'User',
                'state_id' => '1',
            ],
            [
                'value' => 'Tenant',
                'state_id' => '1',
            ],
            [
                'value' => 'Payer',
                'state_id' => '1',
            ],
            [
                'value' => 'Admin',
                'state_id' => '1',
            ],
            [
                'value' => 'Superadmin',
                'state_id' => '1',
            ]
        ]);

    }
}
