<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\GradeItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::all();

        $gradeItems = [
            ['name' => 'Practical Exam', 'max_degree' => 20],
            ['name' => 'Oral Exam', 'max_degree' => 10],
            ['name' => 'Midterm Exam', 'max_degree' => 40],
            ['name' => 'Final Exam', 'max_degree' => 60],
        ];

        foreach ($courses as $course) {
            foreach ($gradeItems as $item) {
                GradeItem::create([
                    'name' => $item['name'],
                    'max_degree' => $item['max_degree'],
                    'course_id' => $course->id,
                ]);
            }
        }
    }
}
