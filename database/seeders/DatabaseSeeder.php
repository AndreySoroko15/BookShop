<?php

namespace Database\Seeders;

use App\Enum\Role\RoleEnum;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = [
            'name' => 'User',
            'email' => 'user@mail.ru',
            'password' => Hash::make('User123456789'),
        ];

        $user = User::firstOrCreate([
            'email' => $user['email'],
        ], $user);

        $role = Role::firstOrCreate([
            'slug' => RoleEnum::ADMIN->value,
            'title' => 'Администратор'
        ]);

        $user->roles()->sync($role->id);
    }
}
