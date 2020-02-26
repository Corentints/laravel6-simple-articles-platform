@extends('layouts.app')
@section('content')
<h1>Articles</h1>
<a href="/admin/articles/create">Create an article</a>

<table class="table table-bordered mt-3">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Summary</th>
      <th scope="col">Author</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($articles as $article)
        <tr>
            <td>{{ $article->id }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->slug }}</td>
            <td>{{ $article->summary }}</td>
            <td>{{ $article->author->name }}</td>
            <td>
                <div style="display: flex;">
                <a href="/admin{{ $article->path() }}" class="btn btn-light mr-3">Edit article</a>
                <form action="/admin{{ $article->path() }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete article</a>
                </form>
                </div>
            </td>
        </tr>
      @endforeach
  </tbody>
</table>

{{ $articles->links() }}
@endsection
