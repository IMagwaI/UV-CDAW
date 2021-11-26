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
                                <div class="col">
                                    Ajouter aux favoris <i class="bi-heart-fill"></i></div>
                                <div class="col">
                                    Ajouter au playlist <i class="bi-plus-circle-fill"></i></div>
                                <div class="col">
                                    Marquer comme vu <i class="bi-eye-fill"></i></div>
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
                                    <li><strong>Directeur</strong>: {{$movie->director}}</li>
                                    <li><strong>Année</strong>: {{$movie->year}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="portfolio-description">
                            <h2>Sommaire</h2>
                            <p>{{$movie->description}}</p>
                            <p>
                                Johnny is an emotionally stunted and softspoken radio journalist who travels the country
                                interviewing a variety of kids about their thoughts concerning their world and their future.
                                Then Johnny's saddled with caring for his young nephew Jesse. Jesse brings a new perspective
                                and, as they travel from state to state, effectively turns the emotional tables on Johnny.
                            </p>
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
                  <h1>Comments</h1>
                  <div class="comment mt-4 text-justify float-left"> <img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <h4>Jhon Doe</h4> <span>- 20 October, 2018</span> <br>
                      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                  </div>
                  <div class="text-justify darker mt-4 float-right"> <img src="https://i.imgur.com/CFpa3nK.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <h4>Rob Simpson</h4> <span>- 20 October, 2018</span> <br>
                      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                  </div>
                  <div class="comment mt-4 text-justify"> <img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <h4>Jhon Doe</h4> <span>- 20 October, 2018</span> <br>
                      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                  </div>
                  <div class="darker mt-4 text-justify"> <img src="https://i.imgur.com/CFpa3nK.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <h4>Rob Simpson</h4> <span>- 20 October, 2018</span> <br>
                      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                  </div>
              </div>
              <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                  <form id="algin-form">
                      <div class="form-group">
                          <h4>Leave a comment</h4> <label for="message">Message</label> <textarea name="msg" id="" msg cols="30" rows="5" class="form-control" style="background-color: rgb(255, 255, 255);"></textarea>
                      </div>
                      <div class="form-group"> <label for="name">Name</label> <input type="text" name="name" id="fullname" class="form-control"> </div>
                      <div class="form-group"> <label for="email">Email</label> <input type="text" name="email" id="email" class="form-control"> </div>
                      <div class="form-group">
                          <p class="text-secondary">If you have a <a href="#" class="alert-link">Movie time account</a> your address will be used to display your profile picture.</p>
                      </div>
{{--                       <div class="form-inline"> <input type="checkbox" name="check" id="checkbx" class="mr-1"> <label for="subscribe">Subscribe me to the newlettter</label> </div>
 --}}                      <div class="form-group"> <button type="button" id="post" class="btn">Post Comment</button> </div>
                  </form>
              </div>
          </div>
      </div>

    </main><!-- End #main -->
@endsection
