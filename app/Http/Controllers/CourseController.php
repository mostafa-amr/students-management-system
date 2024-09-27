<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollStudentRequest;
use App\Repositories\CourseRepository;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseRepository;
    protected $courseEnrollmentService;

    public function __construct(CourseRepository $courseRepository, CourseService $courseService)
    {
        $this->courseRepository = $courseRepository;
        $this->courseEnrollmentService = $courseService;
    }

    
    public function index(Request $request)
    {
        $search = $request->input('search');
        $courses = $this->courseRepository->getAllCourses($search);

        return view('course.index', compact('courses'));
    }

    
    public function show($courseId)
    {
        $courseDetails = $this->courseEnrollmentService->getCourseDetails($courseId);
        //dd($courseDetails);

        return view('course.show', $courseDetails);
    }

    public function addStudent(EnrollStudentRequest $request, $courseId)
    {
        $this->courseEnrollmentService->addStudentToCourse($courseId, $request->student_id);

        return redirect()->route('courses.show', $courseId)->with('success', 'Student added successfully.');
    }

   
    public function removeStudent($course, $student)
    {
        $this->courseEnrollmentService->removeStudentFromCourse($course, $student);

        return redirect()->route('courses.show', $course)->with('success', 'Student removed successfully.');
    }
}
