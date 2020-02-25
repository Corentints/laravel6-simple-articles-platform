@extends('layouts.app')
@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
    <form method="post" action="/admin/articles">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" aria-describedby="slugHelp">
                    <small id="slugHelp" class="form-text text-muted">Optional: create a custom slug for the article. The title is used by default</small>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="summary">Summary</label>
            <input type="text" class="form-control" name="summary" id="summary" aria-describedby="summaryHelp">
            <small id="summaryHelp" class="form-text text-muted">Summary displayed in the article card (homepage)</small>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" rows="5" required></textarea>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="published" id="published">
            <label class="form-check-label" for="published">
                Publish the article
            </label>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
@endsection
