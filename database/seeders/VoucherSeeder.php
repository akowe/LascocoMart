<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Voucher;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Voucher::create(
        [
            'user_id' => '4',
            'voucher' => 'C150819134',
            'credit' => '2000'
        ]);
    }

}//class
