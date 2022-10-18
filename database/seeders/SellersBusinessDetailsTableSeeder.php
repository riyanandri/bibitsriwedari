<?php

namespace Database\Seeders;

use App\Models\SellersBusinessDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellersBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sellerBusinessRecords = [
            [
                'id' => 1,
                'seller_id' => 1,
                'shop_name' => 'Warung Bibit Sriwedari',
                'shop_address' => 'Dsn Nglegok RT 01 RW 05 Desa Sriwedari',
                'shop_city' => 'Magelang',
                'shop_state' => 'Jawa Tengah',
                'shop_country' => 'Indonesia',
                'shop_pincode' => '568902',
                'shop_phone' => '08573634912',
                'shop_email' => 'warungbibitsriwedari@gmail.com',
                'shop_proof' => 'KTP',
                'shop_proof_image' => 'wbs.jpg',
                'business_license_number' => '123435871959',
            ],
        ];

        SellersBusinessDetail::insert($sellerBusinessRecords);
    }
}
