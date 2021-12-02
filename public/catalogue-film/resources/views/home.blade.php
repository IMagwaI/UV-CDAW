@extends('template')
@section('content')
    <!-- ======= Hero Section ======= -->

    <section id="hero" class="d-flex align-items-center justify-content-center" style="height: 50%">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                <div class="col-xl-6 col-lg-8">
                    <h1>Welcome to Movie Time<span>.</span></h1>
                    <h2>There's always a time for a movie</h2>
                    <br>
                </div>
            </div>
            <div class="input-group">
                <input type="search" class="form-control rounded" placeholder="Retrouver votre film" aria-label="Search"
                    aria-describedby="search-addon" style="background-color:rgba(0,0,0,0); color:white" />
                <button type="button" class="btn warning"
                    style="color:#fcc100; border-style: solid; border-color: #fcc100;">search</button>
            </div>



        </div>
    </section>

    <main id="main">
        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Discover</h2>
                    <p>Our media</p>

                    <div class="btn-group btn-group-toggle " data-toggle="buttons" style="width: 100%;">
                        <label class="btn btn-secondary active">
                            <input onclick="movieType();" type="radio" name="options" id="all" autocomplete="off"
                                checked> All
                        </label>
                        <label class="btn btn-secondary">
                            <input onclick="movieType();" type="radio" name="options" id="Movie" autocomplete="off"> Film
                        </label>
                        <label class="btn btn-secondary">
                            <input onclick="movieType();" type="radio" name="options" id="TV-series" autocomplete="off"> serie
                        </label>
                        <label class="btn btn-secondary">
                            <input onclick="movieType();" type="radio" name="options" id="Anime" autocomplete="off"> Anime
                        </label>
                        <label class="btn btn-secondary">
                            <input onclick="movieType();" type="radio" name="options" id="Documentary" autocomplete="off">
                            Documentaire
                        </label>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-2 col-md-6 footer-links">

                        <h4>Catégorie</h4>
                        <ul>
                            <li style="cursor: pointer;"  onclick="document.getElementById('Movie').click(); return false;"><i class="bx bx-chevron-right"></i> <a href="">Film</a></li>
                            <li style="cursor: pointer;"  onclick="document.getElementById('TV-series').click(); return false;"><i class="bx bx-chevron-right"></i> <a href="">Serie</a></li>
                            <li style="cursor: pointer;"  onclick="document.getElementById('Anime').click(); return false;"><i class="bx bx-chevron-right"></i> <a href="">Anime</a></li>
                            <li style="cursor: pointer;"  onclick="document.getElementById('Documentary').click(); return false;"><i class="bx bx-chevron-right"></i> <a href="">Documentaire</a></li>
                        </ul>

                        <h4>Genre</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Action</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Drama</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Sience-fi</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Aventure</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Romance</a></li>
                        </ul>
                    </div>
                    <div class="col">

                        <div class="row pagination_data">
                            @include('media')
                        </div>
                        <div style="display: flex;justify-content: center;">
                            <span class="pagination-link">
                                {{ $homeFilms->links() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- import Jquery --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
                integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
        <script>
            function fetch_data(page) {
                var all = document.getElementById("all");
                var Movie = document.getElementById("Movie");
                var series = document.getElementById("TV-series");
                var Anime = document.getElementById("Anime");
                var Documentary = document.getElementById("Documentary");
                var type = "";
                if (all.checked) {
                    type = "all";
                } else if (Movie.checked) {
                    type = "Movie";
                } else if (series.checked) {
                    type = "TV-series";
                } else if (Anime.checked) {
                    type = "Anime";
                } else if (Documentary.checked) {
                    type = "Documentary";
                }
                $.ajax({
                    url: "movieType/"+type +"?page=" + page,
                    success: function (data) {
                        $('.pagination_data').html(data);
                    }
                });
            }

            $(document).ready(function() {
                $('.pagination').on('click', function(e) {
                    e.preventDefault();
                    $('.page-item').removeClass('active');
                    e.target.parentElement.classList.add('active');
                    var page = e['target']['href'].split('page=')[1];
                    fetch_data(page);

                });

            });
        </script>
        <script>
            function movieType() {
                var all = document.getElementById("all");
                var Movie = document.getElementById("Movie");
                var series = document.getElementById("TV-series");
                var Anime = document.getElementById("Anime");
                var Documentary = document.getElementById("Documentary");
                var type = "";
                if (all.checked) {
                    type = "all";
                } else if (Movie.checked) {
                    type = "Movie";
                } else if (series.checked) {
                    type = "TV-series";
                } else if (Anime.checked) {
                    type = "Anime";
                } else if (Documentary.checked) {
                    type = "Documentary";
                }
                $.ajax({
                    url: "movieType/" + type,
                    success: function (data) {
                        $('.pagination_data').html(data);
                    }
                });
        }
        </script>
    </main>

@endsection
