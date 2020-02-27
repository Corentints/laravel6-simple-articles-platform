@extends('layouts.app')
@section('content')

    <h1>{{ $article->title }}</h1>
    <p>By {{ $article->author->name }}</p>
    <p>{{ $article->content }}</p>
    {{$article->published}}
    <time>Published {{ $article->published_at() }} ago</time>

@endsection
