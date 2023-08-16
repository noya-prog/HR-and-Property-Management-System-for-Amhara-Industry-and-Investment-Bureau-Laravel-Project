@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ __('Requested Items') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item text-capitalize">{{ __('Property Management') }}</li>
                    <li class="breadcrumb-item active text-capitalize">{{ __('My Items') }}</li>
                    <li class="breadcrumb-item active text-capitalize">{{ __('Requested Items') }}</li>
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
                                        <th scope="col">{{ __('Amount') }}</th>
                                        <th scope="col">{{ __('Measurement') }}</th>
                                        <th scope="col">{{ __('Available In Stock') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Request Date') }}</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $test)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $test->r_equ_name }}</td>
                                            <td>{{ $test->r_amount }}</td>
                                            <td>{{ $test->r_equ_measurement }}</td>
                                            <td>{{ $test->in_stock }}</td>
                                            <td>
                                                @if ($test->r_status == 'pending')
                                                    <span class="badge bg-warning text-dark">{{ __('Pending') }}</span>
                                                @elseif($test->r_status == 'approved')
                                                    <span class="badge bg-success text-dark">{{ __('Approved') }}</span>
                                                @elseif($test->r_status == 'received')
                                                    <span class="badge bg-light text-dark">{{ __('Received') }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $test->item_requests_created_at}}</td>
                                            {{-- <td>

                                                <div class="dropdown ">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    </button>
                                                    <ul class="dropdown-menu text-center ">
                                                        @can('Employee edit')
                                                            <li>
                                                                <a class="text-primary" href=""data-bs-toggle="modal"
                                                                    data-bs-target="#addnew{{ $test->item_id }}">{{ __('Delete') }}</a>
                                                            </li>
                                                        @endcan
                                                    </ul>
                                                </div>

                                            </td> --}}
                                        </tr>

                                        
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
