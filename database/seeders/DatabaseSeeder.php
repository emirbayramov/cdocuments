<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CUser;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new CUser();
        $user->name = 'emir';
        $user->email = 'emir@bayramov.com';
        $user->password = bcrypt('123654');
        $user->save();

        $user = new CUser();
        $user->name = 'emir1';
        $user->email = 'emir1@bayramov.com';
        $user->password = bcrypt('123654');
        $user->save();

        $user = new CUser();
        $user->name = 'emir2';
        $user->email = 'emir2@bayramov.com';
        $user->password = bcrypt('123654');
        $user->save();

        $user = new CUser();
        $user->name = 'emir3';
        $user->email = 'emir3@bayramov.com';
        $user->password = bcrypt('123654');
        $user->save();

        $user = new CUser();
        $user->name = 'emir4';
        $user->email = 'emir4@bayramov.com';
        $user->password = bcrypt('123654');
        $user->save();
    }
}
