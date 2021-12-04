@extends('template')
@section('content')


    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <div class="col">

                        <h2>Détails du média</h2>

                    </div>
                    <div class="col mr-auto">
                        <div class="container">
                            <div class="row w-100">
                                @if (!$isLiked)
                                    <a class="col add-button" style="cursor: pointer"
                                        href="{{ route('addFavoris', ['id' => $movie->id]) }}">
                                        Ajouter aux favoris <i class="bi-heart-fill"></i></a>
                                @else
                                    <a class="col add-button" style="cursor: pointer; color: red"
                                        href="{{ route('deleteFavoris', ['id' => $movie->id]) }}">
                                        Supprimer des favoris <i class="bi-heart-fill"></i></a>
                                @endif

                                @if (!$isSeen)
                                    <a class="col add-button" style="cursor: pointer"
                                        href="{{ route('addHistorique', ['id' => $movie->id]) }}">
                                        Marquer comme vu <i class="bi-eye-fill"></i></a>
                                @else
                                    <a class="col add-button" style="cursor: pointer; color: red"
                                        href="{{ route('deleteHistorique', ['id' => $movie->id]) }}">
                                        Supprimer de l'historique <i class="bi-eye-fill"></i></a>
                                @endif
                                <div class="col  add-button" style="cursor: pointer">
                                    Ajouter au playlist <i class="bi-plus-circle-fill"></i></div>
                                {{-- <div class="col  add-button" style="cursor: pointer">
                                    Marquer comme vu <i class="bi-eye-fill"></i></div> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">
                    <div class="col">
                        <div class="portfolio-info d-flex flex-row justify-items-between">
                            <div class="col">
                                <img src="{{ $movie->image }}" />
                            </div>
                            <div class="col">
                                <h3>{{ $movie->fullTitle }}</h3>
                                <ul>
                                    {{-- <li><strong>Genre:</strong> {{$movie->category}}</li> --}}
                                    <li><strong>Categorie</strong>: Drame, Famille, Romance</li>
                                    <li><strong>Directeur</strong>: {{ $movie->director }}</li>
                                    <li><strong>Année</strong>: {{ $movie->year }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="portfolio-description">
                            <h2>Sommaire</h2>
                            <p>{{ $movie->description }}</p>
                        </div>
                    </div>

                    <div class="col">
                        <h3>Trailer du média</h3>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/iPk4_0Xf2ZI"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>


                </div>

            </div>
        </section><!-- End Portfolio Details Section -->
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-md-6 col-12 pb-4">
                    <h1>Commentaires</h1>
                    <div class="allComments">
                        @include('commentaire')
                    </div>

                </div>
                <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                    @if (Auth::check())
                        <form id="sendComment" class="send-form" method="POST"
                            action="{{ route('addComment', ['id_user' => auth()->user()->id, 'id_film' => $movie->id]) }}">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <h4>Laissez un commentaire</h4>
                                <label for="message">Message</label>
                                <textarea name="msg" id="msg" msg cols="30" rows="5" class="form-control"
                                    style="background-color: rgb(255, 255, 255);"></textarea>
                            </div>
                            <br>
                            <div style="display: flex;justify-content: center;" class="form-group">
                                <button style="background-color: #ffbb38" type="button" id="post"
                                    class="get-started-btn scrollto" onclick="addComment()">Ajouter
                                </button>
                            </div>
                        </form>

                    @endif
                    @if (!Auth::check())
                        <div class="form-group">
                            <h4>Vous devez être connecté pour laisser un commentaire</h4>
                        </div>
                        <a href="{{ route('login') }}" class="get-started-btn scrollto"
                            style="background-color: #ffbb38;display: flex;justify-content: center;">Connexion</a>

                    @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div style="display: flex;justify-content: center;">
                <span class="pagination-link">
                    {{ $comments->links() }}
                </span>
            </div>
        </div>


    </main><!-- End #main -->
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script>
    "use strict";

    function modify(e) {
        var name = prompt("update comment", ". . . .");
        var txtid = document.getElementById(e.currentTarget.parentNode.id);
        txtid.getElementsByTagName('p')[0].textContent = name;
    }

    function deleter(e) {
        e.currentTarget.parentNode.remove();
        // delete one comment from the database
        var id = e.currentTarget.parentNode.id;
        $.ajax({
            type: "POST",
            url: "{{ route('deleteComment', ['id' => 'idC']) }}".replace('idC', id),
            data: {
                "_token": "{{ csrf_token() }}",
                "_method": "DELETE"
            },
            success: function(data) {
                console.log(data);
            }
        });
    }

    function addComment() {
        /*   $('#sendComsment').on('submit', function(e) { */
        event.preventDefault();
        if (document.getElementById("msg").value === "") {
            alert("Veuillez saisir un commentaire");
        } else {
            //update UI
            var comment = document.getElementById("msg").value;
            var movie_id = {{ $movie->id }};
            var CommentDiv = document.createElement("div");
            CommentDiv.className = "comment mt-4 text-justify float-left";
            var img = document.createElement("img");
            @if (Auth::check())
                img.src = "{{ auth()->user()->image }}";
            @endif
            img.src = "https://www.w3schools.com/howto/img_avatar.png";
            img.Error = 'https://bootdey.com/img/Content/avatar/avatar7.png';
            img.className = "rounded-circle";
            img.width = "40";
            img.height = "40";
            var h4 = document.createElement("h4");
            @if (Auth::check())
                h4.textContent = "{{ auth()->user()->name }}";
            @endif
            h4.textContent = "Vous";
            var span = document.createElement("span");
            span.textContent = "il y a moins d'une minute";
            span.style.fontSize = "12px";
            var p = document.createElement("p");
            p.textContent = document.getElementById("msg").value;
            var modify = document.createElement("button");
            modify.textContent = "Modify Comment";
            modify.className = "modify";
            if (modify.addEventListener) {
                modify.addEventListener("click", modify);
            };
            var remove = document.createElement("button");
            remove.textContent = "Remove Comment";
            remove.className = "remove";
            if (remove.addEventListener) {
                remove.addEventListener("click", deleter);
            };
            CommentDiv.appendChild(img);
            CommentDiv.appendChild(h4);
            CommentDiv.appendChild(span);
            CommentDiv.appendChild(p);
            const allcomments = document.getElementsByClassName("allComments")[0];
            allcomments.insertBefore(CommentDiv, allcomments.firstChild);
            CommentDiv.appendChild(modify);
            CommentDiv.appendChild(remove);
            //update database
            var form = $('#sendComment').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('addComment', ['id_user' => auth()->user()->id, 'id_film' => $movie->id]) }}",
                data: form,
                success: function(data) {
                    /*  alert("Commentaire ajouté"); */

                }
            });
            document.getElementById("msg").value = "";
        }

    };
    var preventDefault = function(event) {
        event.preventDefault();
        event.stopPropagation();
    }
    let modifiers = document.getElementsByClassName("modify");
    Array.from(modifiers).forEach(m => m
        .addEventListener("click", modify));

    let remover = document.getElementsByClassName("remove");
    Array.from(remover).forEach(m => m
        .addEventListener("click", deleter));
</script>
<script>
    function fetch_data(page) {
        $.ajax({
            url: "{{ route('commentsPagination', ['id_film' => $movie->id]) }}" + '?page=' + page,
            success: function(data) {
                $('.allComments').html(data);
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
