<?php

namespace Database\Seeders;

use \App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Contracts\Container\BindingResolutionException;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function run()
    {
        User::firstOrCreate([
            'level' => (int)config('roles.level.manager', 1)
        ],[
            'name' => 'Manager',
            'level' => (int)config('roles.level.manager', 1),
            'email' => 'manager@example.com',
            'password' => app('hash')->make('10101010'),
        ]);
    }
}
