<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            ['name' => 'Math', 'code' => 'MATH10', 'description' => 'حساب المثلثات'],
            ['name' => 'Physics', 'code' => 'PHYS11', 'description' => 'الكهرباءوعلوم الديناميكه'],
            ['name' => 'Arabic', 'code' => 'CHEM12', 'description' => 'تعلم العربيه'],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
