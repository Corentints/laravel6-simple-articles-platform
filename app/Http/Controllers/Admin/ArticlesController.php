<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticle;
use Illuminate\Routing\Redirector;

class ArticlesController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request\StoreArticle  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticle $request)
    {
        $article = auth()->user()->articles()->create($request->validated());
        return $article->published ? redirect($article->path()) : redirect('/admin/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update an article
     * @param StoreArticle $request
     * @param Article $article
     * @return Redirector
     */
    public function update(StoreArticle $request, Article $article)
    {
        $article->update($request->validated());
        return $article->published ? redirect($article->path()) : redirect('/admin/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }

}
