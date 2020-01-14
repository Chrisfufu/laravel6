<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/posts/{post}', function ($post) {
  // $posts = [
  //   'my-first-post' => 'Hello, this is my first blog post',
  //   'my-second-post' => 'new I am getting the hang of this blogging thing.'
  // ];
  //
  // if (! array_key_exists($post, $posts)){
  //   abort(404, "Sorry, that post was not found");
  // }
  //
  // return view('post', [
  //   'post' => $posts[$post]
  // ]);
// });

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/', function(){
  return view('welcome');
});

Route::get('/contact', function(){
  return view('contact');
});

Route::get('/about', function(){
  // $article = App\Article::latest()->get();
  // $article = App\Article::take(2)->get();
  // $article = App\Article::paginate(2);
  // return $article;

  return view('about', [
    'articles' => App\Article::take(3)->latest()->get()
  ]);
});

Route::get('/articles', function(){
  return view('articles', [
    'articles' => App\Article::take(3)->latest()->get()
  ]);
});
Route::get('/articles', "ArticlesController@index");
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/create', "ArticlesController@create");
Route::get('/articles/{article}', "ArticlesController@show")->name('articles.show');
Route::get('/articles/{article}/edit', "ArticlesController@edit");
Route::put('articles/{article}', 'ArticlesController@update');
