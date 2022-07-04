@extends('layouts.main')

@section('content')
    <div class="container">


            @if ($errors->any)
                <div >
                    <ul >
                        @foreach ($errors->all() as $error )
                            <li  class="alert alert-danger">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


        {{-- importimamo da bootstrap una form --}}
<h1>Inserisci qui i dati del nuovo comic!</h1>
        <form action="{{route('comics.store')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Nome Comic</label>
              <input type="text"  value="{{old("title")}}" class="form-control
              @error("title")
                  is-invalid
              @enderror"
               id="title" name="title"
               placeholder="Inserisci nome">
               @error("title")
                   <p style="color: red">{{$message}}</p>
               @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo di Comic</label>
                <input type="text" name="type"   value="{{old("type")}}" class="form-control
                @error("type")
                is-invalid
                @enderror
                " id="type" placeholder="Inserisci tipo" >
                @error("type")
                <p style="color:red" >{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Inserisci qui l'url dell'immagine!</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="Inserisci url immagine" >
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>



    </div>
@endsection
