@extends('layouts.home')
@section('content')
    <html>

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>

    <body>

        <main id="main" class="main">
            <div class="pagetitle">
                {{-- <h1>{{__('Profile')}}</h1> --}}
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('Property Managemetn') }}</li>
                        <li class="breadcrumb-item active">{{ __('Register Item') }}</li>
                    </ol>
                </nav>
            </div>
            <section class="section profile ">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('SaveItem') }}" class="text-capitalize">
                                    @csrf
                                    <h5 class="card-title">{{ __('Register Item') }}</h5>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6  mb-3">
                                            <label for="item_name" class=" col-form-label">{{ __('Name') }}</label>
                                            <input name="item_name"value="{{ old('item_name') }}"
                                                class="form-control   @error('item_name') is-invalid @enderror"
                                                type="text" id="item_name" placeholder="Name">
                                            @error('item_name')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6 mb-3 ">
                                            <label for="item_description"
                                                class=" col-form-label">{{ __('Description') }}</label>
                                            <input name="item_description"value="{{ old('item_description') }}"
                                                class="form-control @error('item_description') is-invalid @enderror"
                                                type="text" placeholder="Description">
                                            @error('item_description')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3">
                                            <label for="item_measurement"
                                                class=" col-form-label">{{ __('Measurement') }}</label>
                                            <input name="item_measurement" value="{{ old('item_measurement') }}"
                                                class="form-control  @error('item_measurement') is-invalid @enderror"
                                                type="text" placeholder="Measurement"> @error('item_measurement')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6  mb-3">
                                            <label for="in_stock"
                                                class="col-form-label">{{ __('Available In Stock') }}</label>
                                            <input name="in_stock"value="{{ old('in_stock') }}"
                                                class="form-control  @error('in_stock') is-invalid @enderror" type="number"
                                                placeholder="Available In Stock"> @error('in_stock')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3">
                                            <label for="single_price"
                                                class="col-form-label">{{ __('Single Price') }}</label>
                                            <input name="single_price"value="{{ old('single_price') }}"
                                                class="form-control  @error('single_price') is-invalid @enderror"
                                                type="number" placeholder="Single Price"> @error('single_price')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3">
                                            <label for="store_name" class="col-form-label">{{ __('Store Name') }}</label>
                                            <input name="store_name"value="{{ old('store_name') }}"
                                                class="form-control  @error('store_name') is-invalid @enderror"
                                                type="text" placeholder="Last name"> @error('store_name')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class="col-form-label">{{__('Status')}}</label>
                                        <select name="item_status" id="item_status"
                                            class="form-select  @error('item_status') is-invalid @enderror">
                                            <option value="" disabled selected>{{__('--Select--')}}</option>
                                            <option value="NEW"
                                                {{ old('item_status') == 'NEW' ? 'selected' : '' }}>
                                                {{__('NEW')}}
                                            </option>
                                            <option value="FAIR"
                                                {{ old('item_status') == 'FAIR' ? 'selected' : '' }}>
                                                {{__('FAIR')}}
                                            </option>
                                            <option value="USED"
                                                {{ old('item_status') == 'USED' ? 'selected' : '' }}>
                                                {{__('USED')}}
                                            </option>
                                        </select>
                                        @error('item_status')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                        {{-- department and job --}}
                                        <div class="col-12 col-md-6  mb-3">
                                            <label for="department" class="col-form-label">{{ __('Department') }}</label>
                                            <select name="department" id="department"
                                                class="form-select input-lg @error('department') is-invalid @enderror">
                                                <option selected disabled value="">{{ __('Select Department') }}
                                                </option>
                                                @foreach ($dep as $deps)
                                                    <option value="{{ $deps->id }}">{{ $deps->department_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('department')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3">
                                            <label for="item_type" class="col-form-label">{{ __('Item Type') }}</label>
                                            <select name="item_type" id="item_type"
                                                class="form-select input-lg @error('item_type') is-invalid @enderror">
                                                <option selected disabled value="">{{ __('Select Item Type') }}
                                                </option>
                                                @foreach ($item as $items)
                                                    <option value="{{ $items->id }}">{{ $items->equ_type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('item_type')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mt-3">

                                                <button class="btn btn-primary" type="submit">
                                                    {{ __('Submit') }}
                                                </button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>

    </html>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if (Session::has('success'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.success(" Success! <br> {{ Session::get('success') }}  ");
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.error(" Error! <br> {{ Session::get('error') }}  ");
        </script>
    @endif
@endsection
