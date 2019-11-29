<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (User::find(0))
            return;
        $admin = new User;
        $admin->email = 'admin@dyq';
        $admin->password = Hash::make('admin@dyq');
        $admin->name = 'Administrator';
        $admin->verified = true;
        $admin->save();
        $admin->id = 0;
        $admin->save();
    }
}
