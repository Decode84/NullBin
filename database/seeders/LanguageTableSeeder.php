<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = array(
            'text',
            'php',
            'rust',
            'c-sharp',
            'bash',
            'c++',
            'CSS',
            'Markdown',
            'Ruby',
            'Go',
            'Java',
            'JavaScript',
            'JSON',
            'Kotlin',
            'Lua',
            'Makefile',
            'Perl',
            'Objective-C',
            'Python',
            'R',
            'SQL',
            'Swift',
            'TypeScript',
            'Visual Basic',
        );

        foreach ($arr as $item) {
            DB::table('languages')->insert([
                'name' => "$item",
                'created_at' => now(),
            ]);
        }
    }
}
