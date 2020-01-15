@extends('layout')

@section('content')
  <h1>Hello</h1>
@endsection

@extends('layout')
@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" rel="stylesheet"  />
@endsection
@section('content')
    <div id="wrapper">
        <h1 class="heading has-text-weight-bold is-size-4"> New Article </h1>
        <form class="" action="/contact" method="post">
            @csrf

            <div class="field">
                <label
                  class="block text-xs uppercase font-semibold mb-1"
                  for="email"
                  >
                  Email Address
                </label>
                <div class="control">
                  <input
                    class="border px-2 py-1 text-sm w-full"
                    name="email"
                    id="email"
                  >
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-link" type="submit">Email me</button>
                </div>
            </div>

        </form>
    </div>
@endsection
