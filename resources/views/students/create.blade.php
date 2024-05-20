@extends('layouts.main')

@section('title', 'Create student')
@section('content')
    <div class="page-title py-5">
        <h1>Student details</h1>
        <a class="btn btn-info my-3" href="{{ url('students') }}">Back to list</a>
    </div>

    <form method="POST" action="{{ url('students/create') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input value="{{ old('name') }}" type="text" class="@error('name') is-invalid @enderror form-control"
                id="name" name="name">
            @error('name')
                <div class="text-danger text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input value="{{ old('phone') }}" type="text" class="@error('phone') is-invalid @enderror form-control"
                id="phone" name="phone">
            @error('phone')
                <div class="text-danger text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input value="{{ old('email') }}" type="text" class="@error('email') is-invalid @enderror form-control"
                id="email" name="email">
            @error('email')
                <div class="text-danger text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
