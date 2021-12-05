@extends('template')
@section('content')
    <html>

    <main class="team">
        <br><br>
        <div class="container ">

            <div class="section-title">
                <h2>Ajout</h2>
                <p>Ajouter le film à une playlist</p>

                <div class="row">

                </div>

            </div>
            <div class="container col-md-4">
                <form method="POST" action="{{ route('post-to-playlist', ['mediaId' => $id]) }}">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputCategory">Choix du playlist</label>
                        <br>
                        <select id="playlist" name="playlist">
                            <option selected value="" disabled selected>Nom de playlist</option>
                            @foreach ($playlists as $playlist){
                                <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
                                }
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-warning text-center">Enregister</button>
                </form>
            </div>
    </main>

    </html>
@endsection
