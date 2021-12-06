@extends('template')
@section('content')
    <html>

    <main class="team">
        <br><br>
        <div class="container ">

            <div class="section-title">
                <h2>Ajout</h2>
                <p>Ajouter une nouvelle playlist</p>

                <div class="row">

                </div>

            </div>
            <div class="container col-md-4">
                <form method="POST" action="{{ route('addPlaylist_store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName">Nom du playlist</label>
                        <input required type="text" name="name" class="form-control" id="exampleInputName"
                            aria-describedby="Nom" placeholder="Nom">
                    </div><br>

                    <br>
                    <button type="submit" class="btn btn-warning">Enregister</button>
                </form>
            </div>
    </main>

    </html>
@endsection
