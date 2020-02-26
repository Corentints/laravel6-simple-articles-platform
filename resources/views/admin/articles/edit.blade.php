@extends('layouts.app')
@section('content')
    <h1>Edit the article</h1>
    <form action="/admin{{ $article->path() }}" method="POST">
        @csrf
        @method('PATCH')
        @include('admin.articles._form')
        <button type="submit" class="btn btn-primary mt-4">Edit the article</button>
    </form>
@endsection
