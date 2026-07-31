<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::insert([
            ['name' => 'Technology'],
            ['name' => 'Programming'],
            ['name' => 'AI'],
            ['name' => 'News'],
            ['name' => 'Tutorials'],
        ]);
    }
}
