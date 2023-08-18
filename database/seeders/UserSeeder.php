<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // fake users
        User::factory()
            ->count(10)
            ->create();

        // dev
        $dev = new User;
        $dev->name = 'dev';
        $dev->email = 'dev@motivemob.com';
        $dev->password = Hash::make('password');
        $dev->save();
    }
}
