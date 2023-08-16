@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{__('Item Detail Information')}}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Property Management') }}</li>
                    <li class="breadcrumb-item">{{ __('Register Items') }}</li>
                    <li class="breadcrumb-item active">{{ __('Detail') }}</li>
                </ol>
            </nav>
        </div>
        <section class="section profile">
            <div class="row">
                <div class="col-xl">
                    <div class="card">
                        <div class="card-body pt-3">
                            {{-- <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item"> <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">{{ __('Personal Information') }}</button></li>
                            </ul> --}}
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">{{ __('Registerd Item') }}</h5>
                                    <div class="row">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">{{ __('Name') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $item->item_name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Description') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $item->item_description}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Measurement') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $item->item_measurement }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Available In Stock') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $item->in_stock}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Single Price') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $item->single_price}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Store Name') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $item->store_name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Status') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $item->item_status }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Department') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $item->department_name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Item Type') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $item->equ_type }}</div>
                                    </div>

                                </div>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
