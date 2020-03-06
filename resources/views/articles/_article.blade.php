<article class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
        <div class="col-sm-4">
            <a href="{{ $article->path() }}">
                <img style="height: 100%;" src="https://images.unsplash.com/photo-1517154421773-0529f29ea451?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" class="card-img" alt="{{ $article->title }}">
            </a>
        </div>
        <div class="col-sm-8">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ $article->path() }}" class="stretched-link">{{ $article->title }}</a></h5>
                <p class="card-text">{{ $article->summary }}</p>
                <p class="card-text"><small class="text-muted">Published {{ $article->published_at() }} ago</small></p>
            </div>
        </div>
    </div>
</article>
