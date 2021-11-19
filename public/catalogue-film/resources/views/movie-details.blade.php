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
                <img src="./assets/img/poster.jpg" height="300" />
              </div>
              <div class="col">
                <h3>Nos âmes d'enfants</h3>
                <ul>
                  <li><strong>Category</strong>: Drame, Famille, Romance</li>
                  <li><strong>Director</strong>: Mike Mills</li>
                  <li><strong>Année</strong>: 2021</li>
                </ul>
              </div>
            </div>
            <div class="portfolio-description">
              <h2>Sommaire</h2>
              <p>
                Johnny is an emotionally stunted and softspoken radio journalist who travels the country interviewing a variety of kids about their thoughts concerning their world and their future. Then Johnny's saddled with caring for his young nephew Jesse. Jesse brings a new perspective and, as they travel from state to state, effectively turns the emotional tables on Johnny. </p>
            </div>
          </div>

          <div class="col">
            <h3>Trailer du média</h3>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/iPk4_0Xf2ZI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>


        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
@endsection