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
    <form method="post" action="/admin/articles">
        @csrf
        @include('admin.articles._form', ['article' => new \App\Article])
        <button type="submit" class="btn btn-primary mt-4">Create the article</button>
    </form>
@endsection
