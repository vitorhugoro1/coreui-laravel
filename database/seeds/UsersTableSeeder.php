<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Vitor Hugo',
            'email' => 'vitorhugo.ro10@gmail.com',
            'password' => bcrypt(env('SENHA')),
        ]);

        Role::create([
            'name' => 'admin'
        ]);

        Role::create([
            'name' => 'associated'
        ]);

        Role::create([
            'name' => 'subscribed'
        ]);

        $user->assignRole('admin');
    }
}
