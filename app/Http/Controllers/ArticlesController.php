<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function index(){
    // Render a list of a resources
        $articles = Article::latest()->get();

        return view('articles.index', [
          'articles' => $articles
        ]);
    }

    public function show(Article $article){
    // Shows a sigle resource
        return view('articles.show', [
          'article' => $article
        ]);
    }

    public function create(){
    // Shows a view to create a new resource
        return view('articles.create');
    }

    public function store(){
    // Persist the new resource
        // request()->validate([
        //     'title' => ['required', 'min:3', 'max:255'],
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ]);

        // $article = new Article();
        //
        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');
        //
        // $article->save();

        // Article::create(
        //     request()->validate([
        //         'title' => ['required', 'min:3', 'max:255'],
        //         'excerpt' => 'required',
        //         'body' => 'required'
        //     ])
        // );
        Article::create($this->validateArticle());
        return redirect('/articles');
    }

    public function edit(Article $article){
    // Show a view to edit an existing resource
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article){
    // Persist the edited resource
        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');
        //
        // $article->save();

        // $article->update(
        //     request()->validate([
        //         'title' => ['required', 'min:3', 'max:255'],
        //         'excerpt' => 'required',
        //         'body' => 'required'
        //     ])
        // );
        $article->update($this->validateArticle());
        // return redirect('/articles/' . $article->id);
        return redirect(route('articles.show', $article));
    }

    protected function validateArticle(){
        return request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }

    public function destroy(){
    // Delete the resource
    }
}
