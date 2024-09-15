<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OgaranyaAPI;

class OgaranyaAPISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        OgaranyaAPI::create([
            'test_token'        => 'e4f3f028-c0b4-4c9b-b8ef-8be41a7613f6',
            'test_publickey'    => '62f2da03d13992642d5416b3b1977071bf3adfe99a93b8daea6194306b168b84901f49025f25a245f083b0d627c921f5642ff124047e4a143dfe4cc1dd526d1b',
            'live_token'        => 'MDY0OTgzMTkxNjIzNGViZDA3YWIxZWMwZTFjYzY2Mzk1OTAwYjYwNTc2ZjY4NzBlOTBlMGQzMjk5YzJlZmUxZA==',
            'live_publickey'    => '4f223ac9cff724d03833fb8fb9e1a0638dc5125696420cc33c71bcf2e35a0af08beb8cd85a0c0c2eca2670d0244ca70bb9dff6bfa081def75cdaab1034beb1fe'
        
        ]);
    }
}
