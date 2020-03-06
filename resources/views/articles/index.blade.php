@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-5 d-none d-md-block">
            <aside>
                <ul class="list-group">
                    @foreach($categories as $category)
                        <li class="list-group-item"><a href="{{ $category->path() }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </aside>
        </div>

        <div class="col-md-7">
            <section>
                @forelse($articles as $article)
                    @include('articles._article', ['article' => $article])
                @empty
                    <h1>No articles found. :(</h1>
                @endforelse

            </section>
        </div>
    </div>
@endsection
