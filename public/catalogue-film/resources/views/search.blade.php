@extends('template')
@section('content')
    <!-- ======= Hero Section ======= -->

    <section id="hero" class="d-flex align-items-center justify-content-center" style="height: 50%">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                <div class="col-xl-6 col-lg-8">
                    <h1>Résultats de recherche<span>.</span></h1>
                    <br>
                </div>
            </div>

        </div>
    </section>

    <main id="main">
        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-title">

                </div>
                <div class="row ">
                    <div class="col">

                        <div class="row pagination_data">
                            @include('media')
                        </div>
                        {{-- <div style="display: flex;justify-content: center;">
                            <span class="pagination-link">
                                {{ $homeFilms->links() }}
                            </span>
                        </div> --}}
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
        </script>
    </main>

@endsection
