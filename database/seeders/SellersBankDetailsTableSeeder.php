<?php

namespace Database\Seeders;

use App\Models\SellersBankDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellersBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sellerBankRecords = [
            [
                'id' => 1,
                'seller_id' => 1,
                'account_name' => 'Dani Pramono',
                'account_number' => '029128524763782',
                'bank_name' => 'Bank Rakyat Indonesia',
            ],
        ];

        SellersBankDetail::insert($sellerBankRecords);
    }
}
