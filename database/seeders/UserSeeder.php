<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //  User::create([
                
        //         'fname' => 'super',
        //         'lname' => 'admin',
        //         'role_name' => 'superadmin',
        //         'email' => 'superadmin@admin.com',
        //         'password' => \Illuminate\Support\Facades\Hash::make('Passme@123'),
        //         'role' => 1
        //     ]);
          User::create([
                
                'fname' => 'Esther',
                'lname' => 'Omo',
                'role_name' => 'member',
                'coopname'=> '',
                'code'=> 'Coopmart752',
                'address'=> 'No 22 Ikeja',
                'location'=> 'Lagos',
                'email' => 'estherakowe@yahoo.com',
                'phone'=>'07033314567',
                'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
                'role' => 2
            ]);

        //    User::create([
                
        //         'fname' => 'merchant',
        //         'lname' => 'admin',
        //         'role_name' => 'merchant',
        //         'email' => 'merchant@admin.com',
        //         'password' => \Illuminate\Support\Facades\Hash::make('merchant123'),
        //         'role' => 3
        //     ]);

            //  User::create([
                
            //     'fname' => 'member',
            //     'lname' => 'admin',
            //     'role_name' => 'member',
            //     'code'=> 'coopmart01',
            //     'email' => 'member@admin.com',
            //     'password' => \Illuminate\Support\Facades\Hash::make('member123'),
            //     'role' => 4
            // ]);

    }

}//class
