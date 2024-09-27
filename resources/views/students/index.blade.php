@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Students</h1>

    <form method="GET" action="{{ route('students.index') }}" class="form-inline mb-3">
    <div class="form-group mr-2">
        <input type="text" name="search" class="form-control" placeholder="Search by name, code, or email" value="{{ request('search') }}">
    </div>
    <div class="form-group mr-2 mt-2">
        <select name="level_id" class="form-control">
            <option value="">Filter by Level</option>
            @foreach ($levels as $level)
                <option value="{{ $level->id }}" {{ request('level_id') == $level->id ? 'selected' : '' }}>
                    {{ $level->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary mr-2 mt-3">Search</button>

   
    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Reset</a>
</form>

    <a href="{{ route('students.create') }}" class="btn btn-primary mt-5">Add New Student</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Code</th>
                <th>Email</th>
                <th>Level</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->full_name }}</td>
                <td>{{ $student->code }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->level->name }}</td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $students->links() }}
    </div>
</div>
@endsection
