@extends('template')
@section('content')
    @if (auth()->check() && auth()->user()->role == 'banned')
        <div class="main">
            <br><br><br><br><br>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Sorry, you are banned') }}</div>

                            <div class="card-body">
                                <div class="alert alert-danger" role="alert">
                                    {{ __('You are banned from this site. Please contact the administrator.') }}
                                    <strong>atif&tantaoui@gmail.com</strong>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-danger" role="alert">
                                    {{ __('You will be disconnected shortly') }}
                                    {{ Auth::logout() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else


                <!-- ======= Hero Section ======= -->

                <section id="hero" class="d-flex align-items-center justify-content-center" style="height: 50%">
                    <div class="container" data-aos="fade-up">
                        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                            <div class="col-xl-6 col-lg-8">
                                <h1>Bienvenue dans <br> Movie <span>Time.</span></h1>
                                <h2>Il est toujours temps pour regarder un bon film</h2>
                                <br>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('search') }}">
                            @csrf
                            @method('POST')
                            <div class="input-group">
                                <input required name="title" id="title" type="search" class="form-control rounded"
                                    placeholder="Retrouver votre film" aria-label="Search" aria-describedby="search-addon"
                                    style="background-color:rgba(0,0,0,0); color:white" />
                                <button type="submit" class="btn"
                                    style="background-color: whitesmoke;color:black; border-style: solid; border-color: #fcc100;">search</button>
                            </div>
                        </form>



                    </div>
                </section>


                <main id="main">
                    <!-- ======= Team Section ======= -->
                    <section id="team" class="team">
                        <div class="container" data-aos="fade-up">

                            <div class="section-title">
                                <h2>Découvrir</h2>
                                <p>Nos medias</p>

                                <div class="btn-group btn-group-toggle " data-toggle="buttons" style="width: 100%;">
                                    <label class="btn btn-secondary active">
                                        <input onclick="movieType();" type="radio" name="options" id="all"
                                            autocomplete="off" checked> Tout
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input onclick="movieType();" type="radio" name="options" id="Movie"
                                            autocomplete="off">
                                        Film
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input onclick="movieType();" type="radio" name="options" id="TV-series"
                                            autocomplete="off"> série
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input onclick="movieType();" type="radio" name="options" id="Anime"
                                            autocomplete="off">
                                        Anime
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input onclick="movieType();" type="radio" name="options" id="Documentary"
                                            autocomplete="off">
                                        Documentaire
                                    </label>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-lg-2 col-md-6 footer-links">

                                    <h4>Type</h4>
                                    <ul>
                                        <li style="cursor: pointer;"
                                            onclick="document.getElementById('Movie').click(); return false;"><i
                                                class="bx bx-chevron-right"></i> <a href="">Film</a></li>
                                        <li style="cursor: pointer;"
                                            onclick="document.getElementById('TV-series').click(); return false;"><i
                                                class="bx bx-chevron-right"></i> <a href="">Série</a></li>
                                        <li style="cursor: pointer;"
                                            onclick="document.getElementById('Anime').click(); return false;"><i
                                                class="bx bx-chevron-right"></i> <a href="">Anime</a></li>
                                        <li style="cursor: pointer;"
                                            onclick="document.getElementById('Documentary').click(); return false;"><i
                                                class="bx bx-chevron-right"></i> <a href="">Documentaire</a></li>
                                    </ul>

                                    <h4>Catégorie</h4>
                                    <ul>
                                        <li style="cursor: pointer;" id="Action" onclick="category(this.id);return false;"><i class="bx bx-chevron-right" ></i> <a href="">Action</a></li>
                                        <li style="cursor: pointer;" id="Drama" onclick="category(this.id);return false;"><i class="bx bx-chevron-right" ></i> <a href="">Drama</a></li>
                                        <li style="cursor: pointer;" id="Sience-fi" onclick="category(this.id);return false;"><i class="bx bx-chevron-right" ></i> <a href="">Sience-fi</a></li>
                                        <li style="cursor: pointer;" id="Aventure" onclick="category(this.id);return false;"><i class="bx bx-chevron-right" ></i> <a href="">Aventure</a></li>
                                        <li style="cursor: pointer;" id="Romance" onclick="category(this.id);return false;"><i class="bx bx-chevron-right" ></i> <a href="">Romance</a></li>
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
                                url: "movieType/" + type + "?page=" + page,
                                success: function(data) {
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
                                success: function(data) {
                                    $('.pagination_data').html(data);
                                }
                            });
                        }

                        function category(id) {
                            $.ajax({
                                url: "movieCategory/" + id,
                                success: function(data) {
                                    $('.pagination_data').html(data);
                                }
                            });
                        }
                    </script>
                </main>
    @endif
@endsection
