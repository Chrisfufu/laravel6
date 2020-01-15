@extends('layout')
@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" rel="stylesheet"  />
@endsection
@section('content')
    <div id="wrapper">
        <h1 class="heading has-text-weight-bold is-size-4"> New Article </h1>
        <form class="" action="/articles" method="post">
            @csrf
            <div class="field">
                <label class="label" for="title">Title</label>
                <div class="control">
                    <input
                        class="input"
                        name="title"
                        id="title"
                        value="{{ old('title') }}"
                        >
                    @if ($errors->has('title'))
                        <p  class='help is-danger'> {{ $errors->first('title') }} </p>
                    @endif
                    <!-- @error('title')
                        <p  class='help is-danger'> {{ $errors->first('title') }} </p>
                    @enderror -->
                    <!-- <input class="input @error('title') is-danger @enderror" name="title" id="title"></input> -->
                </div>
            </div>

            <div class="field">
                <label class="label" for="excerpt">Excerpt</label>
                <div class="control">
                    <textarea class="textarea" name="excerpt" id="excerpt" >
                        {{ old('excerpt') }}
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
                        {{ old('body') }}
                    </textarea>
                    @if ($errors->has('body'))
                        <p  class='help is-danger'> {{ $errors->first('body') }} </p>
                    @endif
                </div>
            </div>

            <div class="field">
                <label class="label" for="tags">Tags</label>
                <div class="control select is-multiple">
                    <select name='tags[]' multiple>
                      @foreach($tags as $tag)
                        <option
                          value="{{$tag->id}}"
                          >
                          {{$tag->name}}
                        </option>
                      @endforeach
                    </select>
                    @if ($errors->has('tags'))
                        <p  class='help is-danger'> {{ $errors->first('tags') }} </p>
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
