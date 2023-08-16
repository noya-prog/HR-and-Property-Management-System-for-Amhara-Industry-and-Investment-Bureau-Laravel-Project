@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ __('Limited Item Request Page') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item text-capitalize">{{ __('Property Management') }}</li>
                    <li class="breadcrumb-item active text-capitalize">{{ __('Request Limited Items') }}</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <table class="table datatable ">

                                <thead class="text-capitalize">
                                    <tr>
                                        <th scope="col">{{ __('#') }}</th>
                                        <th scope="col">{{ __('Item Name') }}</th>
                                        <th scope="col">{{ __('Description') }}</th>
                                        <th scope="col">{{ __('Measurement') }}</th>
                                        <th scope="col">{{ __('Available In Stock') }}</th>
                                        <th scope="col">{{ __('Single Price') }}</th>
                                        <th scope="col">{{ __('Department') }}</th>
                                        <th scope="col">{{ __('Store Name') }}</th>
                                        <th scope="col">{{ __('Action') }}</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($test as $test)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $test->item_name }}</td>
                                            <td>{{ $test->item_description }}</td>
                                            <td>{{ $test->item_measurement }}</td>
                                            <td>{{ $test->in_stock }}</td>
                                            <td>{{ $test->single_price }}</td>
                                            <td>{{ $test->department_name }}</td>
                                            <td>{{ $test->store_name }}</td>
                                            <td>

                                                <div class="dropdown ">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    </button>
                                                    <ul class="dropdown-menu text-center ">
                                                      
                                                            <li>
                                                                <a class="text-primary" href=""data-bs-toggle="modal"
                                                                    data-bs-target="#addnew{{ $test->item_id }}">{{ __('Requset') }}</a>
                                                            </li>
                                                        
                                                    </ul>
                                                </div>

                                            </td>
                                        </tr>

                                        <div class="modal fade" id="addnew{{ $test->item_id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div
                                                class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <h5 class="modal-title" id="exampleModalLabel">{{__('Request Item')}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('req_store', $test->item_id) }}"
                                                            method="POST">
                                                            {{ csrf_field() }}
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                                                                    <label for="item_id" class="form-label">{{__('Item Status')}}</label>
                                                                    <input type="text" value="{{ $test->item_status }} "
                                                                        class="form-control px-3 @error('item_status') is-invalid @enderror"
                                                                        id="item_status" name="item_status">

                                                                    @error('item_status')
                                                                        <span class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                                                                    <label for="item_name" class="form-label">{{__('Item Name')}}</label>
                                                                    <input type="text" value="{{ $test->item_name }}   "
                                                                        class="form-control px-3 @error('item_name') is-invalid @enderror"
                                                                        id="item_name" name="item_name">

                                                                    @error('item_name')
                                                                        <span class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                                                                    <label for="measurment" class="form-label">{{__('Measurement')}}
                                                                    </label>
                                                                    <input type="text"
                                                                        class="form-control px-3 @error('item_measurement') is-invalid @enderror"
                                                                        id="item_measurement"
                                                                        value=" {{ $test->item_measurement }} "
                                                                        name="item_measurement">

                                                                    @error('item_measurement')
                                                                        <span class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                                                                        <label class="form-label">{{__('Item Type')}}</label>
                                                                        <input type="text" value="{{ $test->equ_type }}"
                                                                            class="form-control px-3 @error('name') is-invalid @enderror"
                                                                            name="name">
                                                                            <input type="hidden" value="{{ $test->type_id_fk }}"
                                                                            class="form-control px-3 @error('r_type_id_fk') is-invalid @enderror"
                                                                            name="r_type_id_fk">
    
                                                                        @error('r_type_id_fk')
                                                                            <span class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                                                                    <label for="description" class="form-label">{{__('Description')}}
                                                                    </label>
                                                                    <input type="text"
                                                                        value=" {{ $test->item_description }} "class="form-control px-3 @error('item_description') is-invalid @enderror"
                                                                        id="item_description" name="item_description">

                                                                    @error('item_description')
                                                                        <span class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                                                                    <label class="form-label">{{__('Available In Stock')}}</label>
                                                                    <input type="number" value="{{ $test->in_stock }}"
                                                                        class="form-control px-3 @error('in_stock') is-invalid @enderror"
                                                                        name="in_stock">

                                                                    @error('in_stock')
                                                                        <span class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                               
                                                                <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                                                                    <label for="item_amount"
                                                                        class="form-label">{{__('Amount')}}</label>
                                                                    <input type="number"
                                                                        class="form-control px-3 @error('item_amount') is-invalid @enderror"
                                                                        id="item_amount" name="item_amount">

                                                                    @error('item_amount')
                                                                        <span class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                                                                    <label for="reason"
                                                                        class="form-label">{{__('Reason')}}</label>
                                                                    <input type="text"
                                                                        class="form-control px-3 @error('reason') is-invalid @enderror  "
                                                                        id="reason" name="reason">

                                                                    @error('reason')
                                                                        <span class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i>
                                                            {{__('Close')}}</button>
                                                        <button type="submit" class="btn btn-primary"><i
                                                                class="bi bi-send"></i>{{__('Submit')}}</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
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

    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#addnew{{ $test->item_id }}').modal('show');
            });
        </script>
    @endif
@endsection
