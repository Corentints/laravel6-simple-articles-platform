@extends('layouts.app')
@section('content')
    <h1>Edit the category</h1>

    <form action="/admin{{ $category->path() }}" method="POST">
        @csrf
        @method('PATCH')
        @include('admin.categories._form')
        <button type="submit" class="btn btn-outline-primary">Edit the category</button>
    </form>
@endsection
