@extends('layouts.app')

@section('content')

@if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
<div class="container">
    <h1>Enrolled Students for {{ $course->name }}</h1>

    <form method="POST" action="{{ route('course.addStudent', $course->id) }}">
        @csrf
        <div class="form-group">
            <label for="student_id">Add Student</label>
            <select name="student_id" class="form-control" required>
                <option value="">Select a student</option>
                @foreach(App\Models\Student::all() as $student)
                    <option value="{{ $student->id }}">{{ $student->full_name }} ({{ $student->code }})</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Student</button>
    </form>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Student Code</th>
                @foreach($gradeItems as $item)
                    <th>{{ $item->name }} (Max: {{ $item->max_degree }})</th>
                @endforeach
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->code }}</td>

                    @php
                        $totalScore = 0;
                    @endphp

                    @foreach($gradeItems as $item)
                        @php
                            $grade = $student->grades->firstWhere('grade_item_id', $item->id);
                            $score = $grade ? $grade->score : '--';
                            $totalScore += $grade ? $grade->score : 0;
                        @endphp
                        <td>{{ $score }}</td>
                    @endforeach

                    <td>{{ $totalScore }}</td>
                    <td>
                        <form action="{{ route('course.removeStudent', ['course' => $course->id, 'student' => $student->id]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
