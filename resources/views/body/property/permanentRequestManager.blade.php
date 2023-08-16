@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ __('Requested Permanent Item View Page') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item text-capitalize">{{ __('Property Management') }}</li>
                    <li class="breadcrumb-item active text-capitalize">{{ __('Requested Limited Items') }}</li>
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
                                        <th scope="col">{{ __('Employee Name') }}</th>
                                        <th scope="col">{{ __('item Name') }}</th>
                                        <th scope="col">{{ __('Description') }}</th>
                                        {{-- <th scope="col">{{ __('Measurement') }}</th> --}}
                                        <th scope="col">{{ __('Available In Stock') }}</th>
                                        <th scope="col">{{ __('Requested Amount') }}</th>
                                        <th scope="col">{{ __('Reason') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Action') }}</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($test as $test)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $test->fname }} {{ $test->mname }} {{ $test->lname }}</td>
                                            <td>{{ $test->r_equ_name }}</td>
                                            <td>{{ $test->r_equ_description }}</td>
                                            {{-- <td>{{ $test->r_equ_measurement }}</td> --}}
                                            <td>{{ $test->in_stock }}</td>
                                            <td>{{ $test->r_amount }}</td>
                                            <td>{{ $test->r_reason }}</td>
                                            <td> @if ($test->r_status == 'approved')
                                                <span class="badge bg-success">{{ __('Approved') }}</span>
                                            @elseif ($test->r_status == 'pending' || $test->r_status == '')
                                                <span class="badge bg-warning text-dark">{{ __('Pending') }}</span>
                                            @elseif ($test->r_status == 'declined')
                                                <span class="badge bg-danger">{{ __('Declined') }}</span>
                                            @endif
                                            </td>
                                            @can('Requested_items approve')
                                            <td>

                                                <div class="dropdown ">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    </button>
                                                    <ul class="dropdown-menu text-center ">
                                                        <li>
                                                            @if ($test->r_status == 'pending')
                                                                <a href="{{ route('accepet_request_per', $test->r_id) }}"
                                                                    class="btn btn-success btn-sm tooltip-test"
                                                                    title="Allow user to the system">{{__('Approve')}}</a>
                                                                    <a href="{{ route('decline_request_per', $test->r_id) }}"
                                                                        class="btn btn-danger btn-sm tooltip-test"
                                                                        title="Allow user to the system">{{ __('Decline') }}</a>
                                                            @elseif ( $test->r_status == 'declined')
                                                                <a href="{{ route('accepet_request_per', $test->r_id) }}"
                                                                    class="btn btn-success btn-sm tooltip-test"
                                                                    title="Allow user to the system">{{__('Approve')}}</a>
                                                            @else
                                                            <a href="{{ route('decline_request_per', $test->r_id) }}"
                                                                class="btn btn-danger btn-sm tooltip-test"
                                                                title="Allow user to the system">{{ __('Decline') }}</a>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            @endcan
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
