@if($comment->user->id === auth()->user()->id)
    <form method="post" class="is-hidden" action="{{ $article->path() . '/comments/' . $comment->id }}" id="comment-{{ $comment->id }}">
        @csrf
        @method('PATCH')
        <textarea name="content" id="content" rows="1" style="width: 100%;">{{ $comment->content }}</textarea>
        <button type="submit" class="btn btn-outline-primary btn-edit-comment">Edit my comment</button>
    </form>
@endif
