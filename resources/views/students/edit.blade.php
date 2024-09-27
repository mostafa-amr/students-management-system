@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Student</h1>

    <form method="POST" action="{{ route('students.update', $student->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" class="form-control" value="{{ $student->full_name }}" required>
        </div>

        <div class="form-group">
            <label for="code">Student Code</label>
            <input type="text" name="code" class="form-control" value="{{ $student->code }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" class="form-control" value="{{ $student->date_of_birth }}" required>
        </div>

        <div class="form-group">
            <label for="level_id">Level</label>
            <select name="level_id" class="form-control" required>
                @foreach($levels as $level)
                    <option value="{{ $level->id }}" {{ $student->level_id == $level->id ? 'selected' : '' }}>
                        {{ $level->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
</div>
@endsection
