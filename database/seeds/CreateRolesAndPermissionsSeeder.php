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
           'name' => config('admin.auth.name'),
           'email' => config('admin.auth.email'),
           'password' => bcrypt(config('admin.auth.password')),
        ]);

        Role::create(['name' => 'super-admin']);

        $user = User::first();

        $user->assignRole('super-admin');

    }
}
