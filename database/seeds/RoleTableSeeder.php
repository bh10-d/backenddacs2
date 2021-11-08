<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'user'=>'admin'
        ]);
        Role::create([
            'user'=>'user1'
        ]);
    }
}
