<?php
namespace App\Services;

use App\Repositories\CourseRepository;

class CourseService
{
    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function getCourseDetails($courseId)
    {
        $course = $this->courseRepository->findById($courseId);
        $students = $this->courseRepository->getStudents($courseId);
        $gradeItems = $this->courseRepository->getGradeItems($courseId);

        return compact('course', 'students', 'gradeItems');
    }

    public function addStudentToCourse($courseId, $studentId)
    {
        $course = $this->courseRepository->findById($courseId);

        if ($course->students()->where('student_id', $studentId)->exists()) {
            
            return redirect()->back()->with('error', 'Student is already enrolled in this course.');
        }
    
        
        return $this->courseRepository->addStudent($courseId, $studentId);
    }

    public function removeStudentFromCourse($courseId, $studentId)
    {
        return $this->courseRepository->removeStudent($courseId, $studentId);
    }
}