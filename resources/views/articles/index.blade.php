@extends('layouts.app')
@section('content')

<style>
    a {
        text-decoration: none!important;
    }
</style>

<div class="row">
    @forelse ($articles as $article)
        <div class="col-md-4">
<a href="{{ $article->path() }}">
            <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="https://picsum.photos/350/500" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h1 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ $article->summary }}</p>
                    <p class="card-text"><small class="text-muted">Published {{ $article->published_at() }} ago</small></p>
                </div>
                </div>
            </div>
            </div>
        </a>
</div>

    @empty
        <h1>There are no articles at the moment.</h1>
    @endforelse
</div>

@endsection
