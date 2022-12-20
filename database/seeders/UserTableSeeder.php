<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Admin')->first();
        $role_user = Role::where('name', 'User')->first();

        $admin = new User();
        $admin->name = "Admin";
        $admin->email = "admin@cphprzemysl.pl";
        $admin->password = bcrypt('we!@njk98P{sr');
        $admin->email_verified_at = date("Y-m-d h:i:s");
        $admin->save();
        $admin->roles()->attach($role_admin);

        // $user = new User();
        // $user->name = "Paweł";
        // $user->email = "pawel@user.pl";
        // $user->password = bcrypt('123456');
        // $user->save();
        // $user->roles()->attach($role_user);
    }
}
