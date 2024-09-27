<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Services\LevelService;
use Illuminate\Http\Request;
use App\Services\StudentService;

class StudentController extends Controller
{
    protected $studentService;
    protected $levelService;

    public function __construct(StudentService $studentService, LevelService $levelService)
    {
        $this->studentService = $studentService;
        $this->levelService = $levelService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $levelId = $request->input('level_id');
        $levels = $this->levelService->getAllLevels();

        if ($search) {
            $students = $this->studentService->searchStudents($search);
        } elseif ($levelId) {
            $students = $this->studentService->filterByLevel($levelId);
        } else {
            $students = $this->studentService->getAllStudents();
        }

        return view('students.index', compact('students','levels'));
    }


    public function create()
    {
        $levels = $this->levelService->getAllLevels();
        return view('students.create', compact('levels'));
    }

    public function store(StoreStudentRequest $request) 
    {
        $this->studentService->createStudent($request->validated());
        return redirect()->route('students.index');
    }

    public function edit($id)
    {
        $student = $this->studentService->getStudentById($id);
        $levels = $this->levelService->getAllLevels();
        return view('students.edit', compact('student', 'levels'));
    }


    public function update(UpdateStudentRequest $request, $id) 
    {
        $this->studentService->updateStudent($id, $request->validated());
        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $this->studentService->deleteStudent($id);
        return redirect()->route('students.index');
    }

}
