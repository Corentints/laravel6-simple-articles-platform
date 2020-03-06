@extends('layouts.app')
@section('content')
    <h1>Admin dashboard - manage the blog</h1>

    <section class="articles">
        <a href="/admin/articles">Manage articles</a>
        Latest articles
    </section>

    <section class="categories">
        <a href="/admin/categories">Manage categories</a>
        Latest categories
    </section>

@endsection
