<?php
namespace App\Services;

use App\Repositories\StudentRepository;

class StudentService
{
    protected $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function getAllStudents()
    {
        return $this->studentRepository->getAll();
    }

    public function getStudentById($id)
    {
        return $this->studentRepository->find($id);
    }

    public function createStudent($data)
    {
        return $this->studentRepository->create($data);
    }

    public function updateStudent($id,$data)
    {
        $student = $this->studentRepository->find($id);
        return $this->studentRepository->update($student, $data);
    }

    public function deleteStudent($id)
    {
        $student = $this->studentRepository->find($id);
        return $this->studentRepository->delete($student);
    }

    public function filterByLevel($levelId)
    {
        return $this->studentRepository->filterByLevel($levelId);
    }

    public function searchStudents($search)
    {
        return $this->studentRepository->search($search);
    }
}