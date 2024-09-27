<?php
namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    public function getAllCourses($search = null)
    {
        $query = Course::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('code', 'like', '%' . $search . '%');
        }

        return $query->paginate(10); 
    }

    public function findById($courseId)
    {
        return Course::findOrFail($courseId);
    }

    public function getStudents($courseId)
    {
        return $this->findById($courseId)->students()->with('grades')->get();
    }

    public function getGradeItems($courseId)
    {
        return $this->findById($courseId)->gradeItems;
    }

    public function addStudent($courseId, $studentId)
    {
        return $this->findById($courseId)->students()->attach($studentId);
    }

    public function removeStudent($courseId, $studentId)
    {
        return $this->findById($courseId)->students()->detach($studentId);
    }
}
