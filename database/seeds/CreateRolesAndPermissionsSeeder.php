<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CreateRolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       User::create([
            'name' => 'Claude Myburgh',
            'email' => 'claude@designbycode.co.za'
            'password' => bcrypt('CMyburgh1978')
        ]);

        Role::create(['name' => 'super-admin']);

        $user = User::first();

        $user->assignRole('super-admin');

    }
}
