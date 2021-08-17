<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = "Admin";
        $admin->email = "admin123@gmail.com";
        $admin->password = bcrypt('password');
        $admin->visible_password = 'password';
        $admin->email_verified_at = Now();
        $admin->occupation = "CEO";
        $admin->address = "Palestine";
        $admin->phone = "0594367643";
        $admin->is_admin = 1;
        $admin->save();
    }
}
