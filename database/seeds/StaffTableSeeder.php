<?php

use Illuminate\Database\Seeder;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;
class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 3;$i<=200;$i++) {
            $staff = new Staff();
            $password = 'user'.$i.'user'.$i;
            $staff->username = 'user'.$i;
            $staff->password = Hash::make($password);
            $staff->save();
        }
    }
}
