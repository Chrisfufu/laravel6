<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;

class PostsController extends Controller
{

    public function show($slug)
    {
      // now $post is a variable.
      // if we use first or fail, we don't need to check if the key exists or not.
      $post = Post::where('slug', $slug)->firstOrFail();
      // echo $post;
      // dd($post);
      // $posts = [
      //   'my-first-post' => 'Hello, this is my first blog post',
      //   'my-second-post' => 'now I am getting the hang of this blogging thing.'
      // ];


      // $post = Post::where('slug', $slug)->first();
      // if (! array_key_exists($post, $posts)){
      //   abort(404, "Sorry, that post was not found");
      // }

      // if (! $post){
      //   abort(404);
      // }

      return view('post', [
        'post' => $post
      ]);

    }
}
