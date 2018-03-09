<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = new \App\Admin();
        $admin->email = "admin@tuition.lk";
        $admin->password = bcrypt("admin@123");
        $admin->name = 'tuition-admin';

        $admin->save();
    }
}
