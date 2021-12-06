@extends('template')
@section('content')
    <html>

    <main class="team">
        <br><br>
        <div class="container ">

            <div class="section-title">
                <h2>Ajout</h2>
                <p>Ajouter un nouveau Film</p>

                <div class="row">

                </div>

            </div>
            <div class="container col-md-4">
                <form method="POST" action="{{ route('addFilm_store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName">Nom du Media</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="Nom"
                            placeholder="Nom" required>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleInputDirector1">Directeur du media</label>
                        <input type="text" class="form-control" name="director" id="exampleInputDirector1"
                            placeholder="Directeur" required>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleInputDirector1">Type de media</label>
                        <select id="type" name="type" required>
                            <option selected value="" disabled selected>----</option>
                            <option value="Movie">Movie</option>
                            <option value="TV-series">TV-series</option>
                            <option value="Anime">Anime</option>
                            <option value="Documentary">Documentary</option>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleInputAnneeSortie">Année de sortie</label>
                        <input type="number" class="form-control" name="year" id="exampleInputDirector1"
                            placeholder="Année de sortie" required>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleInputPoser1">Poster du media</label>
                        <input type="text" class="form-control" name="image" id="exampleInputDirector1"
                            placeholder="URL lien de poster image" required>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleInputCategory">Catégorie du media</label>
                        <br>
                        <select id="category" name="category" required>
                            <option selected value="" disabled selected>----</option>
                            <option value="Action">Action</option>
                            <option value="Sience-fi">Sience-fi</option>
                            <option value="Aventure">Aventure</option>
                            <option value="Romance">Romance</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-warning">Enregister</button>
                </form>
            </div>
    </main>

    </html>
@endsection
