<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //membuat role 
        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->display_name = "Admin";
        $adminRole->save();

        $memberRole = new Role();
        $memberRole->name = 'member';
        $memberRole->display_name = "Member";
        $memberRole->save();

        //membuat sample
        $admin = new user();
        $admin -> name = 'Admin';
        $admin -> email = 'admin@gmail.com';
        $admin -> password = bcrypt ('rahasia');
        $admin -> save();
        $admin -> attachRole($adminRole);

        $member = new user();
        $member -> name = 'Sample Member';
        $member -> email = 'member@gmail.com';
        $member -> password = bcrypt ('rahasia');
        $member -> save();
        $member -> attachRole($memberRole);

    }
}
