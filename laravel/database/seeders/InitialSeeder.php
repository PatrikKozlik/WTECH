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

        // Insert data into the category table
        DB::table('category')->insert([
            [
                'value' => 'Hračky',
                'state_id' => '1',
            ],
            [
                'value' => 'Príslušenstvo',
                'state_id' => '1',
            ],
            [
                'value' => 'Krmivo',
                'state_id' => '1',
            ],
        ]);

        // Insert data into the supplier table
        DB::table('supplier')->insert([
            [
                'value' => 'Pedigree',
                'state_id' => '1',
            ],
            [
                'value' => 'Darling',
                'state_id' => '1',
            ],
            [
                'value' => 'Slovakia farm',
                'state_id' => '1',
            ],
            [
                'value' => 'Papo',
                'state_id' => '1',
            ],
            [
                'value' => 'Mojo',
                'state_id' => '1',
            ],
            [
                'value' => 'Whiskas',
                'state_id' => '1',
            ],
            [
                'value' => "Hill's",
                'state_id' => '1',
            ],
        ]);

    }
}
