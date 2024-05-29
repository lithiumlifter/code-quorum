<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            [
                'slug' => 'code-review',
                'name' => 'Code Review',
            ],
            [
                'slug' => 'javascript',
                'name' => 'JavaScript',
            ],
            [
                'slug' => 'python',
                'name' => 'Python',
            ],
            [
                'slug' => 'java',
                'name' => 'Java',
            ],
            [
                'slug' => 'c#',
                'name' => 'C#',
            ],
            [
                'slug' => 'php',
                'name' => 'PHP',
            ],
            [
                'slug' => 'android',
                'name' => 'Android',
            ],
            [
                'slug' => 'html',
                'name' => 'HTML',
            ],
            [
                'slug' => 'jquery',
                'name' => 'jQuery',
            ],
            [
                'slug' => 'c++',
                'name' => 'C++',
            ],
            [
                'slug' => 'c++',
                'name' => 'C++',
            ],
        ]);
    }
}
