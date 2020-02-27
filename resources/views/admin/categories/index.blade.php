@extends('layouts.app')
@section('content')
    <h1>Categories</h1>

    <table class="table table-bordered mt-3">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <div style="display: flex;">
                        <a href="/admin{{ $category->path() }}/edit" class="btn btn-light mr-3">Edit Category</a>
                        <form action="/admin{{ $category->path() }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are your sure?')">Delete Category</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
