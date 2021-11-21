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
                        <label for="exampleInputName">Nom du Film</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="Nom"
                            placeholder="Nom du film">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDirector1">Directeur du film</label>
                        <input type="text" class="form-control" name="director" id="exampleInputDirector1"
                            placeholder="directeur du film">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCategory">Category</label>
                        <br>
                        <select id="category" name="category">
                            <option selected value="" disabled selected>Category</option>
                            @foreach ($categories as $category){
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                }
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-warning">Enregister</button>
                </form>
            </div>
    </main>

    </html>
@endsection
