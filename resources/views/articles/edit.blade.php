@extends('layout')
@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" rel="stylesheet"  />
@endsection
@section('content')
    <div id="wrapper">
        <h1 class="heading has-text-weight-bold is-size-4"> Update Article </h1>
        <form class="" action="/articles/{{ $article->id }}" method="post">
            @csrf
            @method('put')
            <div class="field">
                <label class="label" for="title">Title</label>
                <div class="control">
                    <input class='input' type='text' name='title' id='title' value='{{ $article->title }}'>
                    @if ($errors->has('title'))
                        <p  class='help is-danger'> {{ $errors->first('title') }} </p>
                    @endif
                </div>
            </div>

            <div class="field">
                <label class="label" for="excerpt">Excerpt</label>
                <div class="control">
                    <textarea class="textarea" name="excerpt" id="excerpt">
                        {{ $article->excerpt }}
                    </textarea>
                    @if ($errors->has('excerpt'))
                        <p  class='help is-danger'> {{ $errors->first('excerpt') }} </p>
                    @endif
                </div>
            </div>

            <div class="field">
                <label class="label" for="body">Body</label>
                <div class="control">
                    <textarea class="textarea" name="body" id="body">
                        {{ $article->body }}
                    </textarea>
                    @if ($errors->has('body'))
                        <p  class='help is-danger'> {{ $errors->first('body') }} </p>
                    @endif
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection
