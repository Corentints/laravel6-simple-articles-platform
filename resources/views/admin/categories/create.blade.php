@extends('layouts.app')
@section('content')
    <h1>Create a category</h1>

    <form action="/admin/categories" method="POST">
        @csrf
        @include('admin.categories._form', ['category' => new \App\Category()])
        <button type="submit" class="btn btn-outline-primary">Create</button>
    </form>
@endsection
