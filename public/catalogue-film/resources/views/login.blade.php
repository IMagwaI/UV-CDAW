@extends('template')
@section('content')
    <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container" data-aos="fade-up">

            <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-xl-6 col-lg-4">
                    <h1>Rejoingnez-nous sur <span>Movie Time</span></h1>
                    <h2>Notre braa eaaaaa aeredza ezczecezc ezcez</h2>
                </div>
                <div class="col-xl-2 col-lg-4">
                </div>

                <div class="signin">
                    <input type="checkbox" id="chk" aria-hidden="true">

                    <div class="signup">
                        <form>
                            <label class="labelsignin" for="chk" aria-hidden="true">S'inscrire</label>
                            <input class="inputsingin" type="text" name="txt" placeholder="User name" required="">
                            <input class="inputsingin" type="email" name="email" placeholder="Email" required="">
                            <input class="inputsingin" type="password" name="pswd" placeholder="Password" required="">
                            <button class="buttonsignin">S'inscrire</button>
                        </form>
                    </div>

                    <div class="login">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <label class="labelsignin" for="chk" aria-hidden="true">Connexion</label>
                            <input class="inputsingin" type="email" id="email" name="email" placeholder="Email" required="">
                            <input class="inputsingin" type="password" id="password" name="pswd" placeholder="Password" required="">
                            <button type="submit" class="buttonsignin">Se connecter</button>
                        </form>
                    </div>
                </div>

            </div>


        </div>
    </section>
    <!-- End Hero -->

    <main id="main">



    </main>
@endsection
