<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            // [
            //     'id' => 1,
            //     'name' => 'Super Admin',
            //     'type' => 'superadmin',
            //     'seller_id' => 0,
            //     'phone' => '08712352375',
            //     'email' => 'admin@admin.com',
            //     'password' => Hash::make('password'),
            //     'image' => '',
            //     'status' => 1,
            // ],
            [
                'id' => 2,
                'name' => 'Dani Pram',
                'type' => 'seller',
                'seller_id' => 1,
                'phone' => '08573634912',
                'email' => 'danipram@gmail.com',
                'password' => Hash::make('password'),
                'image' => '',
                'status' => 0,
            ],
        ];

        Admin::insert($adminRecords);
    }
}
