@extends('layouts.landing-page')
@section('title', 'Services')
@section('contentLandingPage')

    <!--? Hero Start -->
    <div class="container-fluid">
        <div class="slider-area2">
            <div class="slider-height2 hero-overly d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2">
                                <h2>Services</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    {{-- card --}}


    <section class="pricing-card-area fix mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <div class="card-grid">
                        @forelse ($kategori_mobil as $item)
                            <div class="card mx-2">
                                <div class="card-body">
                                    <img src="{{ asset('landing-page/assets/img/icon/price1.svg') }}" alt="">
                                    <h1 class="card-title my-3">{{ $item->kategori_mobil }}</h1>
                                    <input type="radio" class="form-check-input" id="exampleCheck1" name="mobil"
                                        value="mobilKecil">
                                    <label for="exampleCheck1">Pilih</label>
                                </div>
                            </div>
                        @empty
                            kosong
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>





    {{-- end card --}}
    <!--? Pricing Card Start -->
    <section class="pricing-card-area fix mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10">
                    <div class="section-tittle text-center mb-90">
                        <h2>We offer best services to our customer</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                    <div class="single-card text-center mb-30">
                        <div class="card-top">
                            <img src="{{ asset('landing-page/assets/img/icon/price1.svg') }}" alt="">
                            <h4>Car wash</h4>
                            <p>Starting at</p>
                        </div>
                        <div class="card-mid">
                            <h4>$50.00</h4>
                        </div>
                        <div class="card-bottom">
                            <ul>
                                <li>2 TB of space</li>
                                <li>unlimited bandwidth</li>
                                <li>full backup systems</li>
                                <li>free domain</li>
                                <li>unlimited database</li>
                            </ul>
                            <a href="{{ asset('#') }}" class="borders-btn">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                    <div class="single-card text-center mb-30">
                        <div class="card-top">
                            <img src="{{ asset('landing-page/assets/img/icon/price1.svg') }}" alt="">
                            <h4>Detailing</h4>
                            <p>Starting at</p>
                        </div>
                        <div class="card-mid">
                            <h4>$100.00</h4>
                        </div>
                        <div class="card-bottom">
                            <ul>
                                <li>2 TB of space</li>
                                <li>unlimited bandwidth</li>
                                <li>full backup systems</li>
                                <li>free domain</li>
                                <li>unlimited database</li>
                            </ul>
                            <a href="{{ asset('#') }}" class="borders-btn">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                    <div class="single-card text-center mb-30">
                        <div class="card-top">
                            <img src="{{ asset('landing-page/assets/img/icon/price1.svg') }}" alt="">
                            <h4>Wash & Detailing</h4>
                            <p>Starting at</p>
                        </div>
                        <div class="card-mid">
                            <h4>$200.00</h4>
                        </div>
                        <div class="card-bottom">
                            <ul>
                                <li>2 TB of space</li>
                                <li>unlimited bandwidth</li>
                                <li>full backup systems</li>
                                <li>free domain</li>
                                <li>unlimited database</li>
                            </ul>
                            <a href="{{ url('#') }}" class="borders-btn">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Card End -->
    <!--? Services Area Start -->
    <section class="categories-area section-padding40">
        <div class="container">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-xl-6 col-lg-7 col-md-10 col-sm-11">
                    <div class="section-tittle mb-60">
                        <h2>Why take our services?</h2>
                        <p>Duis aute irure dolor inasfa reprehenderit in voluptate velit esse cillum reeut
                            cupidatatfug nulla pariatur. Excepteur sintxsdfas occaecat.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="cat-icon">
                            <img src="{{ asset('landing-page/assets/img/icon/services1.svg') }}" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Car wash 100% without detergents</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros
                                elementum tristique.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="cat-icon">
                            <img src="{{ asset('landing-page/assets/img/icon/services2.svg') }}" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Efficient surface drying machines</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros
                                elementum tristique.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="cat-icon">
                            <img src="{{ asset('landing-page/assets/img/icon/services3.svg') }}" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>We have an application</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros
                                elementum tristique.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                        <div class="cat-icon">
                            <img src="{{ asset('landing-page/assets/img/icon/services4.svg') }}" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Safe lacquer protection</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros
                                elementum tristique.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--? Services Area End -->

@endsection


@push('style')
    <style>
        .card-grid {
            display: flex;
            justify-content: center;
        }

        .card {
            border: 2px solid #ced4da;
            background-color: #fff;
            transition: border-color 0.3s ease-in-out;
            cursor: pointer;
            flex-basis: 30%;
            padding: 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .card:hover {
            border-color: #80bdff;
        }

        .card input[type="radio"] {
            display: none;
        }

        .card label {
            cursor: pointer;
            padding-top: 10px;
        }

        .card input[type="radio"]+label:before {
            content: "";
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid #adb5bd;
            border-radius: 50%;
            margin-right: 8px;
            vertical-align: middle;
        }

        .card input[type="radio"]:checked+label:before {
            background-color: #80bdff;
            border-color: #80bdff;
        }
    </style>
@endpush
@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var cards = document.querySelectorAll(".card");

            cards.forEach(function(card) {
                card.addEventListener("click", function() {
                    var radio = this.querySelector('input[type="radio"]');
                    radio.checked = true;
                });
            });
        });
    </script>
@endpush
