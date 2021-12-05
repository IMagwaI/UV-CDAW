@extends('template')
@section('content')
    <main id="main">
        <!-- ======= Team Section ======= -->
        <section id="team" class="team mt-5">
            <div class="container">

                <div class="section-title">
                    <h2>Playlist</h2>
                    <p>{{ $playlist->name }}</p>

                    <div class="row">

                    </div>

                </div>



                @if (!$medias->isEmpty())
                    @foreach ($medias as $key => $value)
                        <div class="col-md-3 ">
                            <div class="member" data-aos="fade-up" data-aos-delay="100">
                                <div class="member-img">
                                    <img src="{{ $value->media->image }}" class="img-thumbnail" alt="Responsive image"
                                        style="width: 100%">
                                    <div class="social">
                                        <a href=""><i class="bi bi-heart"></i></a>
                                        <a href=""><i class="bi bi-plus-circle"></i></a>
                                        <a href="{{ route('movie-details-show', ['id' => $value->media->id]) }}"><i
                                                class="bi bi-eye"></i></a>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h4>
                                        <a
                                            href="{{ route('movie-details-show', ['id' => $value->media->id]) }}">{{ $value->media->title }}</a>
                                    </h4>
                                    <span>Rating : {{ $value->media->rank }}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif


            </div>
        </section>

    </main>
@endsection
