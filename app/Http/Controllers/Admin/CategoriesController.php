<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.categories.index', ['categories' => Category::all()]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store()
    {
        $category = Category::create(request()->validate([
            'name' => 'required|unique:categories'
        ]));
        return redirect('admin' . $category->path())->with('status', 'Category created!');;
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Category $category)
    {
        $category->update([
            'name' => request('name')
        ]);
        return redirect('/admin/categories')->with('status', 'Category updated!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/admin/categories')->with('status', 'Category deleted!');
    }
}
