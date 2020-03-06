@if($comment->user->id === auth()->user()->id)
    <form action="{{ $article->path() . '/comments/' .  $comment->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are your sure?')">Delete my comment</button>
    </form>
@endif
