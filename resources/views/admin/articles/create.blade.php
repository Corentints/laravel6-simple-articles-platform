@extends('layouts.app')
@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<h1>Create an article</h1>
    <form method="post" action="/admin/articles" class="mt-3">
        @csrf
        @include('admin.articles._form', ['article' => new \App\Article])
        <button type="submit" class="btn btn-primary mt-4">Create the article</button>
    </form>
@endsection
