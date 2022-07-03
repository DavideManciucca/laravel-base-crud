@extends('layouts.main')

@section('content')
    <div class="container">
        {{-- importimamo da bootstrap una form --}}
<h1>Inserisci qui i dati del nuovo comic!</h1>
        <form action="{{route('comics.store')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Nome Comic</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci nome">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo di Comic</label>
                <input type="text" name="type" class="form-control" id="type" placeholder="Inserisci tipo" >
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Inserisci qui l'url dell'immagine!</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="Inserisci url immagine" >
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>



    </div>
@endsection
