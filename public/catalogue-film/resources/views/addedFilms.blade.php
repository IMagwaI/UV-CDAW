@extends('template')
@section('content')
    <html>

    <main class="team">
        <br><br>
        <div class="container ">

            <div class="section-title">
                <h2>Films ajouté</h2>
                <p>Liste des films ajoutés</p>
                <div class="row">
                </div>
            </div>
            <div class="container">
            <div class="row">
                @if (!$films->isEmpty())
                    @foreach ($films as $singlefilm)
                        <div class="card col-md-4">
                            <div class="card-body">
                                <h5 class="card-title">Nom : {{ $singlefilm->name }}</h5>
                                <p class="card-text">Directeur : {{ $singlefilm->director }}</p>
                                <p class="card-text">Category : {{ 
                                    $singlefilm->category->name }}</p></p>
                                <div class="container d-flex justify-content-between">
                                {{-- <a href="" class="btn btn-primary">Voir</a> --}}
                                <form action="{{ route('film_update', $singlefilm->id) }}" method="post">
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="btn btn-warning">Modifier</button>
                                </form>
                                <form action="{{ route('deleteFilm', $singlefilm->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No films</p>
                @endif

            </div>
            </div>
    </main>

    </html>
@endsection
