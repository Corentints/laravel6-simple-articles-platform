<div class="row">
    <div class="col"><div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
        </div>
    </div>
    <div class="col"><div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" aria-describedby="slugHelp" value="{{ $category->slug }}" placeholder="my-super-slug">
            <small id="slugHelp" class="form-text text-muted">Optional: create a custom slug for the category. The title is used by default</small>
        </div>
    </div>
</div>

