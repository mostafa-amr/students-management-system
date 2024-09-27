<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = Level::all();

        $students = [
            ['full_name' => 'Mostafa Amr', 'code' => '20170540', 'date_of_birth' => '2000-01-01', 'email' => 'mamr1527@gmail.com'],
            ['full_name' => 'Mohamed Ali', 'code' => '20170530', 'date_of_birth' => '2004-01-01', 'email' => 'mohamed.ali@gmail.com'],
            ['full_name' => 'Mohamed Khalid', 'code' => '20170522', 'date_of_birth' => '2009-01-01', 'email' => 'mohamed.khalid@gmail.com'],
        ];

        foreach ($students as $key => $student) {
            
            Student::create(array_merge($student, ['level_id' => $levels->random()->id]));
        }
    }
}
