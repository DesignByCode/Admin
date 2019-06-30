<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => config('admin.auth.name'),
            'email' => config('admin.auth.email'),
            'password' => bcrypt(config('admin.auth.password')),
        ]);
    }
}
