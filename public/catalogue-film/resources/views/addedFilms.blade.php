@extends('template')
@section('content')
    <html>

    <main class="team">
        <br><br>
        <div class="container ">

            <div class="section-title">
                <h2>Films ajouté</h2>
                <p>Liste des films ajouté</p>
                <div class="row">
                </div>
            </div>
            <div class="container col-md-4">
                @if (!$films->isEmpty())
                    @foreach ($films as $singlefilm)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nom : {{ $singlefilm->name }}</h5>
                                <p class="card-text">Directeur : {{ $singlefilm->director }}</p>
                                <p class="card-text">Category : {{ 
                                    $singlefilm->category->name }}</p></p>
                                <a href="" class="btn btn-primary">Voir</a>
                                <form action="{{ route('deleteFilm', $singlefilm->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                                <form action="{{ route('film_update', $singlefilm->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-warning">Modifier</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No films</p>
                @endif

            </div>
    </main>

    </html>
@endsection
