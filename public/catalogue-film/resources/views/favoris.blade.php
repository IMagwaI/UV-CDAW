@extends('template')
@section('content')
    <main id="main">
        <!-- ======= Team Section ======= -->
        <section id="team" class="team mt-5">

            <div class="container">
                <div class="col">
                    <div class="section-title">
                        <h2>Favoris</h2>
                        <p>Mes medias favoris</p>
                    </div>
                </div>


                <div class="row ">
                    @if (!$favoris->isEmpty())
                        @foreach ($favoris as $key => $value)
                            <div class="col-md-3 ">
                                <div class="member" data-aos="fade-up" data-aos-delay="100">
                                    <div class="member-img">
                                        <img src="{{ $value->image }}" class="img-thumbnail" alt="Responsive image"
                                            style="width: 100%">
                                        <div class="social">
                                            <a href=""><i class="bi bi-heart"></i></a>
                                            <a href=""><i class="bi bi-plus-circle"></i></a>
                                            <a href="{{ route('movie-details-show', ['id' => $value->id]) }}"><i
                                                    class="bi bi-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="member-info">
                                        <h4>
                                            <a
                                                href="{{ route('movie-details-show', ['id' => $value->id]) }}">{{ $value->title }}</a>
                                        </h4>
                                        <span>Rating : {{ $value->rank }}</span>
                                        </span>
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
