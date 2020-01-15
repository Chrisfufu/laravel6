<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;

class ArticlesController extends Controller
{
    public function index(){
    // Render a list of a resources
        if(request('tag')){
          $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        }else{
          $articles = Article::latest()->get();
        }

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
        $tags = Tag::all();
        return view('articles.create',[
          'tags' => $tags
        ]);
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
        // Article::create($this->validateArticle());
        $this->validateArticle();

        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1;
        $article->save();

        if(request()->has('tags')){
          $article->tags()->attach(request('tags'));
        }
        
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
            'body' => 'required',
            'tags' => 'exists:tags, id'
        ]);
    }

    public function destroy(){
    // Delete the resource
    }
}
