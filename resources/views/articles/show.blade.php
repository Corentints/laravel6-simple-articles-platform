@extends('layouts.app')
@section('content')
    <style>
        p {
            margin: 0;
        }

        .is-hidden {
            display: none;
        }

        a:not([href]) {
            color: #3490dc;
            cursor: pointer;
        }

        button, input[type="submit"], input[type="reset"] {
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
            text-decoration: underline;
        }

    </style>

    <article>
        <h1 class="m-0">{{ $article->title }}</h1>
        @foreach($article->categories as $category)
            <a href="{{ $category->path() }}" class="badge badge-dark">#{{ $category->name }}</a>
        @endforeach
        <p>By {{ $article->author->name }}</p>
        <p>{{ $article->content }}</p>
        {{$article->published}}
        <time>Published {{ $article->published_at() }} ago</time>
    </article>

    <section class="comments">
        <h1>Comments</h1>
        @include('articles.comments._form')
        <hr>
        <section class="mt-4">
            @include('layouts._flash-messages', ['type' => 'comment'])
            @forelse($article->comments as $comment)
                <article class="mb-3 border border-secondary p-2">
                    <p class="font-weight-bold">{{ $comment->user->name }}
                        @auth()
                            <a class="stretched-link font-weight-normal btn-edit" data-target-form="#comment-{{ $comment->id }}">Edit my comment</a>
                            @include('articles.comments._delete')
                        @endauth
                    </p>
                    <p class="comment-content">{{ $comment->content }}</p>
                    @auth()
                        @include('articles.comments._edit')
                    @endauth

                    <time>Posted {{ $comment->postedAt() }} ago</time>
                    @if($comment->created_at < $comment->updated_at)
                       <small class="text-muted">(edited {{ $comment->updatedAt() }} ago)</small>
                    @endif
                </article>
            @empty
            @endforelse
        </section>
    </section>
    <script>
        const editCommentButtons = document.querySelectorAll('.btn-edit');
        editCommentButtons.forEach(function(editCommentButton) {
           editCommentButton.addEventListener('click', function(e) {
               document.querySelector(this.dataset.targetForm).classList.toggle('is-hidden');
           })
        });
    </script>
@endsection
