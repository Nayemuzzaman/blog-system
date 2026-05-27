<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::orderByDesc('updated_at')->get();

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        //
    }

    public function createConfirm(Request $request)
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Article $article): View
    {
        return view('articles.show', compact('article'));
    }

    public function edit(string $article)
    {
        //
    }

    public function editConfirm(Request $request, string $article)
    {
        //
    }

    public function update(Request $request, string $article)
    {
        //
    }

    public function deleteConfirm(string $article)
    {
        //
    }

    public function destroy(string $article)
    {
        //
    }
}
