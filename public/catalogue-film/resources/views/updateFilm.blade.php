@extends('template')
@section('content')
    <html>

    <main class="team">
        <br><br>
        <div class="container ">

            <div class="section-title">
                <h2>Modification</h2>
                <p>Modifier un Film</p>

                <div class="row">

                </div>

            </div>
            <div class="container col-md-4">
                <form method="post" action="{{ route('updateFilm_put', $film->id)}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName">Nom du Film</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="Nom"
                            placeholder="Nom" value={{$film->name}}>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleInputDirector1">Directeur du film</label>
                        <input type="text" class="form-control" name="director" id="exampleInputDirector1"
                            placeholder="Directeur" value={{$film->director}}>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleInputCategory">Catégorie du film</label>
                        <br>
                        <select id="category" name="category" selected={{$film->category_id}}>
                            @foreach ($categories as $category){
                                <option value="{{ $category->id }}" {{ $film->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
