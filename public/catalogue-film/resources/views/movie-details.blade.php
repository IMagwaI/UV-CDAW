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
                            <div class="row w-100 align-middle">
                                @if (!$isLiked)
                                    <button class="col add-button"
                                        style="cursor: pointer; border: none; padding: 1rem; border-radius: 5px">
                                        <a style="color: black"
                                            href="{{ route('addFavoris', ['id' => $movie->id]) }}">Ajouter aux favoris</a>
                                        <i class="bi-heart-fill"></i></button>
                                @else
                                    <button class="col add-button"
                                        style="cursor: pointer; border: none; padding: 1rem; border-radius: 5px; color: red"
                                        href="{{ route('deleteFavoris', ['id' => $movie->id]) }}">
                                        <a style="color: black"
                                            href="{{ route('deleteFavoris', ['id' => $movie->id]) }}">Supprimer des
                                            favoris</a> <i class="bi-heart-fill"></i></button>
                                @endif

                                @if (!$isSeen)
                                    <button class="col add-button"
                                        style="cursor: pointer; border: none; padding: 1rem; border-radius: 5px"
                                        href="{{ route('addHistorique', ['id' => $movie->id]) }}">
                                        <a style="color: black"
                                            href="{{ route('addHistorique', ['id' => $movie->id]) }}">Marquer comme vu</a>
                                        <i class="bi-eye-fill"></i></button>
                                @else
                                    <button class="col add-button"
                                        style="cursor: pointer; border: none; padding: 1rem; border-radius: 5px; color: red"
                                        href="{{ route('deleteHistorique', ['id' => $movie->id]) }}">
                                        <a style="color: black"
                                            href="{{ route('deleteHistorique', ['id' => $movie->id]) }}">Supprimer de
                                            l'historique </a><i class="bi-eye-fill"></i></button>
                                @endif
                                @if ($playlistExists)
                                    <button class="col  add-button"
                                        style="cursor: pointer; border: none; padding: 1rem; border-radius: 5px"
                                        data-toggle="modal" data-target="#exampleModal">
                                        <a style="color: black"
                                            href="{{ route('add-to-playlist', ['mediaId' => $movie->id]) }}">Ajouter au
                                            playlist</a>
                                        <i class="bi-plus-circle-fill"></i></button>
                                @endif
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                <img src="{{ $movie->image }}"   height="200" width="150" alt="">
                            </div>
                            <div class="col">
                                <h3>{{ $movie->fullTitle }}</h3>
                                <ul>
                                    <li><strong>Type :</strong> {{$movie->type}}</li>
                                    <li><strong>Categorie</strong>: {{$movie->category}}</li>
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

    // add event listener to delete button
    /*  $(".deleter").click(function(e) {
        var id = e.currentTarget.parentNode.id;
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        $.ajax({
             type: "DELETE",
             url: "{{ route('deleteComment', ['id_comment' => 'idC', 'id_film' => $movie->id]) }}".replace('idC', id),
             data: {
                 "_token": "{{ csrf_token() }}",
                 "_method": "DELETE"
             },
             success: function(data) {
                 alert("Commentaire supprimé");
             }
         })
    });  */

    function deleter(e) {
        // delete in html
        // get id of comment
        var media_id = e.currentTarget.parentNode.value;
        alert(e.currentTarget.parentNode.value);

        /*      e.currentTarget.parentNode.remove();
             
             var id = e.currentTarget.parentNode.id; 
              $.ajax({
                 type: "DELETE",
                 url: ""{{ route('deleteComment', ['id_comment' => 'idC', 'id_film' => $movie->id]) }}".replace('idC', id),"
                 data: {
                     "_token": "{{ csrf_token() }}",
                     "_method": "DELETE"
                 },
                 success: function(data) {
                     alert("Commentaire supprimé");
                 }
             });   */
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
            CommentDiv.value = {{ $movie->id }};
            CommentDiv.className = "comment mt-4 text-justify float-left";
            var img = document.createElement("img");
            @if (Auth::check())
                if ("{{ auth()->user()->image }}" != "") {
                    img.src = "{{ auth()->user()->image }}";
                } else {
                    img.src = 'https://bootdey.com/img/Content/avatar/avatar7.png';
                }
            @endif
            @if (!Auth::check())
                img.src = "https://www.w3schools.com/howto/img_avatar.png";
            @endif
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
            var textmoderation = document.createElement("span");
            textmoderation.textContent = "Ce commentaire est en attente de modération";
            textmoderation.style.color = "red";

            CommentDiv.appendChild(img);
            CommentDiv.appendChild(h4);
            CommentDiv.appendChild(span);
            CommentDiv.appendChild(p);
            CommentDiv.appendChild(textmoderation);
            const allcomments = document.getElementsByClassName("allComments")[0];
            allcomments.insertBefore(CommentDiv, allcomments.firstChild);
            /*             CommentDiv.appendChild(modify);
                        CommentDiv.appendChild(remove); */
            //update database
            var form = $('#sendComment').serialize();
            <?php if (Auth::check()) { ?>

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
                    /*                       alert("Commentaire ajouté"); 
                     */
                }
            });
            <?php } ?>


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
