@extends('layout')

@section('content')

  <div id="wrapper">
    <div id="page" class="container">
      <div id="content">
        @foreach ($articles as $article)
        <div id="content">
          <div class="title">
            <!-- <h2><a href = '/articles/{{ $article-> id }}'>{{ $article -> title }}</a></h2> -->
            <h2><a href = '{{ route('articles.show', $article) }}'>{{ $article -> title }}</a></h2>
            <p>
                <img src="/images/banner.jpg" alt="" class="image image-full" />
            </p>
            <p>
                <p>{{ $article -> excerpt }}</p>
            </p>


        </div>
        @endforeach
      </div>

    </div>
  </div>
@endsection
