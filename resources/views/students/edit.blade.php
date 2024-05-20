@extends('layouts.main')

@section('title', 'Edit student')
@section('content')
    <div class="page-title py-5">
        <h1>Edit student details</h1>
        <a class="btn btn-info my-3" href="{{ url('students') }}">Back to list</a>
    </div>

    <form method="POST" action="{{ url('students/edit/' . $student->id) }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input value="{{ $student->name }}" type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input value="{{ $student->phone }}" type="name" class="form-control" id="phone" name="phone">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input value="{{ $student->email }}" type="email" class="form-control" id="email" name="email">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
