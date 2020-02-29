<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Article $article
     * @return Response
     */
    public function store(Article $article)
    {
        $article->comments()->create([
            'content' => request('content'),
            'article_id' => $article->id,
            'user_id' => auth()->user()->id
        ]);
         return redirect($article->path());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return Response
     */
    public function update(Article $article, Comment $comment)
    {
        $comment->update([
            'content' => request('content')
        ]);

        return redirect($article->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @param \App\Comment $comment
     * @return Response
     * @throws \Exception
     */
    public function destroy(Article $article, Comment $comment)
    {
        $comment->delete();
        return redirect($article->path());
    }

}
