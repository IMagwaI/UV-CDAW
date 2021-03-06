@extends('template')
@section('content')
    <link href="{{ asset('assets/css/form.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
        integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script> <div id="popup-reg" class="popup">
        <div class="popup-content">
            <form id="send" class="send-form" method="POST" action="{{ route('update_profil', auth()->user()->id) }}">
                @csrf
                <div class="form-group">
                    <input type="text" placeholder="Enter name..." value="{{ auth()->user()->name }}" name="name"
                        id="name" class="form-control">
                    <label for="name">
                        <i class="fa fa-user"></i>
                    </label>
                </div>
                <div class="form-group">
                    <input type="number" placeholder="Enter phone..." value="{{ auth()->user()->phone }}" name="phone"
                        id="phone" class="form-control">
                    <label for="phone">
                        <i class="fa fa-phone"></i>
                    </label>
                </div>
                <div class="form-group">
                    <input type="date" name="bday" id="bday" onchange="submitBday()" value="{{ auth()->user()->bday }}">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Adresse..." value="{{ auth()->user()->adress }}" name="adress"
                        id="adress" class="form-control">
                    <label for="adress">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </label>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="statut..." value="{{ auth()->user()->profilStatut }}" name="statut"
                        id="statut" class="form-control">
                    <label for="statut">
                        <i class="fa fa-address-card" aria-hidden="true"></i>
                    </label>
                </div>
                <div class="form-group">
                    <input id="input-url" class="input-url" type="text" placeholder="Enter an image URL"
                        value="{{ auth()->user()->image }}" name="image">
                    <label for="img">
                        <i class="fa fa-picture-o"></i>
                    </label>
                </div>
                <div class="form-group">
                    <img id="image-preview" class="image-preview" src="" />
                </div>
                <button type="submit" class="main-btn-rect" name="text" value="Send">
                    <i class="fa fa-paper-plane"></i>Modifier</button>
            </form>
            <span id="closef" class="fade-out main-btn-circle">???</span>
        </div>
    </div>
    <main id="main">
        <br></br><br></br>
        <div class="container">
            <div class="main-body">


                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ auth()->user()->image }} "
                                        onError="this.src = 'https://bootdey.com/img/Content/avatar/avatar7.png'"
                                        alt="Admin" class="rounded-circle" width="150" height="150" id="resultImage">
                                    <div class="mt-3">
                                        <h4 id="resultName">{{ auth()->user()->name }}</h4>
                                        <p class="text-secondary mb-1" id="resultStatut">
                                            {{ auth()->user()->profilStatut }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-globe mr-2 icon-inline">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path
                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                            </path>
                                        </svg>Website</h6>
                                    <span class="text-secondary">https://google.com</span>
                                </li>
                                <!--                   <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                                                <span class="text-secondary">bootdey</span>
                                              </li> -->
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-twitter mr-2 icon-inline text-info">
                                            <path
                                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                            </path>
                                        </svg>Twitter</h6>
                                    <span class="text-secondary">@somepage</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-instagram mr-2 icon-inline text-danger">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                        </svg>Instagram</h6>
                                    <span class="text-secondary">somepage</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-facebook mr-2 icon-inline text-primary">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                            </path>
                                        </svg>Facebook</h6>
                                    <span class="text-secondary">somepage</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ auth()->user()->email }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Birthday</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" id="resultBday">
                                        @if (auth()->user()->bday)
                                            {{ auth()->user()->bday }}
                                        @else
                                            <span class="text-secondary">No birthday</span>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" id="resultPhone">
                                        @if (auth()->user()->phone)
                                            {{ auth()->user()->phone }}
                                        @else
                                            <span class="text-secondary">No address</span>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" id="resultAdress">
                                        @if (auth()->user()->adress)
                                            {{ auth()->user()->adress }}
                                        @else
                                            <span class="text-secondary">No address</span>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="button" class="main-btn-rect popup-btn"
                                            data-popup="popup-reg">Modifier</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

            </div>
        </div>

        <script>
            "use strict";


            $(document).ready(function() {
                $('.popup-btn').click(function() {
                    var popupBlock = $('#' + $(this).data('popup'));
                    popupBlock.addClass('active')
                        .find('.fade-out').click(function() {
                            popupBlock.css('opacity', '0').find('.popup-content').css('margin-top',
                            '350px');
                            setTimeout(function() {
                                $('.popup').removeClass('active');
                                popupBlock.css('opacity', '').find('.popup-content').css(
                                    'margin-top', '');
                            }, 600);
                        });
                });
            });

            function submitBday() {
                var Q4A = "Your birthday is: ";
                var Bdate = document.getElementById('bday').value;
                var Bday = +new Date(Bdate);
                Q4A += Bdate + ". You are " + ~~((Date.now() - Bday) / (31557600000));
                var theBday = document.getElementById('resultBday');
                /* theBday.innerHTML = Q4A; */
            };

            $('#send').on('submit', function(e) {
                e.preventDefault();
                var name = document.getElementById('name').value;
                var phone = document.getElementById('phone').value;
                var bday = document.getElementById('bday').value;
                var image = document.getElementById('input-url').value;
                var adress = document.getElementById('adress').value;
                var profilStatut = document.getElementById('statut').value;
                document.getElementById('resultName').innerHTML = name;
                document.getElementById('resultPhone').innerHTML = phone;
                document.getElementById('resultBday').innerHTML = bday;
                document.getElementById('resultImage').src = image;
                document.getElementById('resultAdress').innerHTML = adress;
                document.getElementById('resultStatut').innerHTML = profilStatut;
                document.getElementById('closef').click();

                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.code == 0) {
                            $.each(data.error, function(prefix, val) {
                                $(form).find('span.' + prefix + '_error').text(val[0]);
                            });
                        }
                    }
                });
            });


            var inputUrlElem = document.getElementById('input-url');
            var inputDragElem = document.getElementById('input-drag');
            var imagePreviewUrlElem = document.getElementById('image-preview');

            var preventDefault = function(event) {
                event.preventDefault();
                event.stopPropagation();
                return false;
            }
        </script>
    </main>
@endsection
