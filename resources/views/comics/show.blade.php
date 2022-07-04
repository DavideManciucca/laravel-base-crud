@extends('layouts.main')

@section('content')
    <div class="container">
       <h1>{{$comic->title}} <a class="btn btn-primary" href="{{route('comics.edit', $comic)}}">EDIT</a></h1>
       <div>
        Type:{{$comic->type}}
       </div>

       <div>
            <img src="{{$comic->image}}" alt="{{$comic->title}}">
       </div>

       <a class="btn btn-secondary my-5" href="{{route('comics.index')}}"><-GO BACK</a>

    </div>
@endsection
