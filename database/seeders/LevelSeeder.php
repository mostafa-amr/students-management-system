<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            ['name' => 'Level1', 'number' => 1, 'description' => 'First Level'],
            ['name' => 'Level2', 'number' => 2, 'description' => 'Second Level'],
            ['name' => 'Level3', 'number' => 3, 'description' => 'Third Level'],
            ['name' => 'Level4', 'number' => 4, 'description' => 'Fourth Level'],
        ];

        foreach ($levels as $level) {
            Level::create($level);
        }
    }
}
