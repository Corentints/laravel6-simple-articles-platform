<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $categories = Category::all();

        return view('admin.index', [
            'articles' => $articles,
            'categories' => $categories
        ]);
    }
}
