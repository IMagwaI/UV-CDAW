    @if (!$homeFilms->isEmpty())
        @foreach ($homeFilms as $key => $value)
            <div class="col-md-3 ">
                <div class="member" data-aos="fade-up" data-aos-delay="100">
                    <div class="member-img">
                        <img src="{{ $value->image }}" class="img-thumbnail"
                            alt="Responsive image" style="width: 100%">
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
     