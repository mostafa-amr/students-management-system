<?php

namespace App\Repositories;

use App\Models\Student;

class StudentRepository
{
    public function getAll()
    {
        return Student::with('level')->paginate(10);
    }

    public function create($data)
    {
        return Student::create($data);
    }

    public function update(Student $student,$data)
    {
        return $student->update($data);
    }

    public function delete(Student $student)
    {
        return $student->delete();
    }

    public function find($id)
    {
        return Student::findOrFail($id);
    }

    public function filterByLevel($levelId)
    {
        return Student::where('level_id', $levelId) ->paginate(10);
    }

    public function search($search)
    {
        return Student::where('full_name', 'like', '%' . $search . '%')
            ->orWhere('code', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->paginate(10);
    }
}