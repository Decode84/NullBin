<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\LanguageTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *eb
     * @return void
     */
    public function run()
    {
        $this->call([
            LanguageTableSeeder::class,
        ]);

        DB::table('users')->insert([
            'username' => 'anon',
            'password' => Hash::make('anon'),
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'user',
            'password' => Hash::make('user'),
            'created_at' => now(),
        ]);
    }
}
