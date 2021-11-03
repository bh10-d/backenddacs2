<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for($i = 101;$i <= 200;$i++){
        //    $mem = new users();
        //    $mem->username = 'akat'.$i;
        //    $temppass = Hash::make('akatsuki'.$i);
        //    $mem->password = $temppass;
        User::create([
            'username' => 'akat'.$i,
            'password' => Hash::make('akatsuki'.$i),
        ]);
        }
        
    }
}
