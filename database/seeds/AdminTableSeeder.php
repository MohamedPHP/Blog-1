<?php

use Illuminate\Database\Seeder;

use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->email = 'mohamedzayed709@yahoo.com';
        $admin->password = bcrypt('123123');
        $admin->save();
    }
}
