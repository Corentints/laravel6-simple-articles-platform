@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{ $article->title }}">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" aria-describedby="slugHelp" value="{{ $article->slug }}">
            <small id="slugHelp" class="form-text text-muted">Optional: create a custom slug for the article. The title is used by default</small>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="summary">Summary</label>
    <input type="text" class="form-control" name="summary" id="summary" aria-describedby="summaryHelp" value="{{ $article->summary }}">
    <small id="summaryHelp" class="form-text text-muted">Summary displayed in the article card (homepage)</small>
</div>

<div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" name="content" id="content" rows="5" required>{{ $article->content }}</textarea>
</div>

<div class="form-check">
    <input class="form-check-input" type="checkbox" value="1" name="published" id="published" @if($article->published) checked @endif>
    <label class="form-check-label" for="published">
        Publish the article
    </label>
</div>
