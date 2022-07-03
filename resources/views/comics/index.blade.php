@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h1>Elenco dei comics</h1>
    {{-- @dump($comics) --}}

    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Type</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

        <tbody>
            @foreach ($comics as $comic )
            <tr>
                <th scope="row">{{$comic->id}}</th>
                <td>{{$comic->title}}</td>
                <td>{{$comic->type}}</td>
                <td>
                    <a class="btn btn-success" href="{{route('comics.show',$comic)}}">SHOW</a>
                    <a class="btn btn-primary" href="{{route('comics.edit',$comic)}}">EDIT</a>
                    <form onsubmit="return confirm('vuoi eliminare il campo?')" class="d-inline" action="{{route('comics.destroy',$comic)}}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" >DELETE</a>
                    </form>
                </td>
              </tr>
            @endforeach



        </tbody>
      </table>


</div>

@endsection
