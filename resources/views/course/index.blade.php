@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Courses</h1>

    <form method="GET" action="{{ route('courses.index') }}" class="form-inline mb-3">
        <div class="form-group mr-2">
            <input type="text" name="search" class="form-control" placeholder="Search by name or code" value="{{ request('search') }}">
        </div>
        <button type="submit" class="btn btn-primary mr-2">Search</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Reset</a>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->code }}</td>
                    <td>
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info">View Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

   
    <div class="d-flex justify-content-center">
        {{ $courses->links() }}
    </div>
</div>
@endsection
