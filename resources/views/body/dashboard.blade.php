@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <div class="clock  positon-relative">
                <div class="digital-clock">00:00:00</div>
            </div>
            <h1>{{__('Dashboard')}}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Dashboard')}}</li>
                </ol>

            </nav>
        </div>

        <section class="section dashboard mt-4">
            <div class="row">
                <div class="col-lg-8 justify-content-between">
                    {{-- Cards start here --}}
                    <div class="row">
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">{{__('Male Employees')}} </h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-user-large"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $male }}</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span>
                                            <span class="text-muted small pt-2 ps-1">increase</span>

                                        </div>

                                        <div class="">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">{{__('Female Employees')}} </h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-user-large"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $female }}</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span>
                                            <span class="text-muted small pt-2 ps-1">increase</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">{{__('Permanent')}} <br>{{__('Items')}}</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-desktop"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $female }}</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span>
                                            <span class="text-muted small pt-2 ps-1">increase</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">{{__('Limited')}} <br> {{__('Items')}} </h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-soap"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $female }}</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span>
                                            <span class="text-muted small pt-2 ps-1">increase</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">{{__('Total')}} <br> {{__('Items')}}</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $female }}</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span>
                                            <span class="text-muted small pt-2 ps-1">increase</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col">

                            <div class="card info-card sales-card d-flex ">
                                <div class="card-body">
                                    <h5 class="card-title">Property </h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">

                                            <div class="d-flex mb-2 align-items-center">

                                                <h6> Limited items {{ $limited }}</h6>
                                            </div>
                                            <div class="d-flex mb-2 align-items-center text-primary">

                                                <h6> Fixed items {{ $fixed }}</h6>
                                            </div>
                                            <div class="d-flex mb-2 align-items-center text-primary">

                                                <h6> Total items {{ $total_equip }}</h6>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div> --}}
                </div>

                <div class="col-lg-4">
                    <div class="card-body pb-0">
                        <h5 class="card-title">
                            {{ __('Anouncement') }} {{__('&')}} {{ __('News') }}
                        </h5>

                        <div class="news  mb-4">
                            @php $recentPosts = $posts->take(6); @endphp
                            @foreach ($recentPosts as $post)
                                <div class="post-item clearfix position-relative">
                                    <div class="position-absolute recently-updated">
                                        @if ($post->updated_at >= now()->subDays(1))
                                            <span class="badge rounded-pill bg-success">
                                                {{__('new')}}
                                            </span>
                                        @endif
                                    </div>
                                    <img src="assets/img/aa.jpg" alt="" />

                                    <h4><a href="{{ route('showpost', $post->id) }}">{{ $post->title }}</a></h4>
                                    <p>
                                        {{ $post->slug }}
                                    </p>

                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>

            {{-- News And Updates end here --}}

        </section>
    </main>
@endsection
