@extends('layouts.app')
@section('title'){{ $category->name }}@endsection
@section('content')
    <h1>Articles from category {{ $category->name }}</h1>
    @foreach($category->articles  as $article)
        @include('articles._article', ['article' => $article])
    @endforeach
@endsection
