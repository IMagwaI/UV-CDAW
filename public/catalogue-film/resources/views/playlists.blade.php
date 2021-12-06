@extends('template')
@section('content')
    <main id="main">
        <!-- ======= Team Section ======= -->
        <section id="team" class="team mt-5">

            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="section-title">
                        <h2>Playlists</h2>
                        <p>Playlists créés</p>
                    </div>
                </div>
                <div class="col">
                    <div class="mr-auto">
                        <button class="btn" style="background-color: whitesmoke"><a
                                href="{{ route('addPlaylist') }}">Créer nouvelle
                                playlist</a></button>
                    </div>

                </div>


                <div class="row mt-4">
                    @if (!$playlists->isEmpty())

                        @foreach ($playlists as $key => $value)


                            <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                                <div class="member" data-aos="fade-up" data-aos-delay="100">
                                    <div class="member-img">
                                        {{-- <img src="./assets/img/poster.jpg" class="img-fluid" alt=""> --}}
                                        <img width="1013" src={{ $images[$key] }} class="img-fluid" alt="">
                                        <div class="social">
                                            <a href=""><i class="bi bi-twitter"></i></a>
                                            <a href=""><i class="bi bi-facebook"></i></a>
                                            <a href=""><i class="bi bi-instagram"></i></a>
                                            <a href=""><i class="bi bi-linkedin"></i></a>
                                        </div>
                                    </div>
                                    <div class="member-info">
                                        <h4><a
                                                href="{{ route('playlist-details', ['id' => $value->id]) }}">{{ $value->name }}</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>


            </div>
        </section>

    </main>
@endsection
