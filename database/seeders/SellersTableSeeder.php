<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sellerRecords = [
            [
                'id' => 1,
                'name' => 'Dani Pramono',
                'address' => 'Dsn Nglegok RT 01 RW 05 Desa Sriwedari',
                'city' => 'Magelang',
                'state' => 'Jawa Tengah',
                'country' => 'Indonesia',
                'pincode' => '568902',
                'phone' => '08573634912',
                'email' => 'danipram@gmail.com',
                'status' => 0,
            ],
        ];

        Seller::insert($sellerRecords);
    }
}
