<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\GradeItem;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = DB::table('students')->pluck('id')->toArray();
        $gradeItems = DB::table('grade_items')->get();  
        $grades = [];

        for ($i = 0; $i < 10; $i++) {
            $gradeItem = $gradeItems->random();
            $grades[] = [
                'student_id'    => $students[array_rand($students)],  
                'grade_item_id' => $gradeItem->id,  
                'score'         => rand(0, $gradeItem->max_degree), 
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ];
        }

        
        DB::table('grades')->insert($grades);
    }
}
