@extends('layouts.app')
@section('content')
    @forelse($categories as $category)
        <div>
            <a href="{{ $category->path() }}">{{ $category->name }}</a>
        </div>
    @empty
        <h1>There are no categories. :(</h1>
    @endforelse
@endsection
