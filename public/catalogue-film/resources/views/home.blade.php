@extends('template')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
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

                    <div class="row">

                    </div>

                    <div class="btn-group btn-group-toggle " data-toggle="buttons" style="width: 100%;">
                        <label class="btn btn-secondary active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked> Film
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="options" id="option2" autocomplete="off"> serie
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="options" id="option3" autocomplete="off"> Anime
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="options" id="option4" autocomplete="off"> Documentaire
                        </label>
                    </div>

                </div>
                <div class="row ">
                    <div class="col-lg-2 col-md-6 footer-links">

                        <h4>Catégorie</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Film</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Serie</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Anime</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Documentaire</a></li>
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
                    <div class="col-lg-1 col-md-6 footer-links"></div>

                    <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="./assets/img/poster5.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-heart"></i></a>
                                    <a href=""><i class="bi bi-plus-circle"></i></a>
                                    <a href=""><i class="bi bi-eye"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>C'Mon C'Mon</h4>
                                <span>Chief Executive Officer</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="200">
                            <div class="member-img">
                                <img src="./assets/img/poster3.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-heart"></i></a>
                                    <a href=""><i class="bi bi-plus-circle"></i></a>
                                    <a href=""><i class="bi bi-eye"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>C'Mon C'Mon</h4>
                                <span>Product Manager</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="300">
                            <div class="member-img">
                                <img src="./assets/img/poster4.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-heart"></i></a>
                                    <a href=""><i class="bi bi-plus-circle"></i></a>
                                    <a href=""><i class="bi bi-eye"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>C'Mon C'Mon</h4>
                                <span>CTO</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="400">
                            <div class="member-img">
                                <img src="./assets/img/poster2.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-heart"></i></a>
                                    <a href=""><i class="bi bi-plus-circle"></i></a>
                                    <a href=""><i class="bi bi-eye"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>C'Mon C'Mon</h4>
                                <span>Accountant</span>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="row">
                    <div class="col-lg-2 col-md-6 footer-links ">
                    </div>
                    <div class="col-lg-1 col-md-6 footer-links"></div>


                    <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="./assets/img/poster.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-heart"></i></a>
                                    <a href=""><i class="bi bi-plus-circle"></i></a>
                                    <a href=""><i class="bi bi-eye"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>C'Mon C'Mon</h4>
                                <span>Chief Executive Officer</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <div style=" text-align:center;">
            <a href="" class="get-started-btn scrollto" style="color: black;">Afficher Plus</a>
            <br></br>

        </div>



    </main>

@stop
