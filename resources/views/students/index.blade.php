@extends('layouts.main')

@section('title', 'Student list')
@section('content')
    <div class="page-title py-5">
        <h1>Students list</h1>
        @if (Session::has('msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ Session::get('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <a class="btn btn-success my-3" href="{{ url('students/create') }}">Add new student</a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->getStatus() }}</td>
                    <td>{{ $student->created_at }}</td>
                    <td>{{ $student->updated_at->diffForHumans() }}</td>
                    <td>
                        <div>
                            <a href="{{ url('students/view/' . $student->id) }}" class="btn btn-primary">View</a>
                            <a href="{{ url('students/edit/' . $student->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ url('students/delete/' . $student->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan=7 class="text-center">No records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $students->links() }}
    </div>
@endsection
