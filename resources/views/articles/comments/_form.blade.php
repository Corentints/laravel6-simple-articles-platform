<form action="{{ $article->path() . '/comments' }}" method="POST">
    @csrf
    <div class="row" style="flex-direction: column;">
        <label for="content" class="font-weight-bold">Post your comment:</label>
        <textarea name="content" id="content" cols="50" rows="5" aria-describedby="contentHelp" required placeholder="I think that this article is..."></textarea>
        <small id="slugHelp" class="form-text text-muted">HTML is not allowed.</small>

        <button type="submit" class="btn btn-outline-primary mt-4">Post my comment</button>
    </div>
</form>
