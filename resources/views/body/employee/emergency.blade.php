@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ __('Emergency Contact') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active text-capitalize">{{ __('Emergency contact') }}</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                @can('Employee create')
                    {{-- <div class="col">
                        <a href="{{ route('createEmp') }}"
                            class="btn btn-primary float-end mb-2 "><i></i>{{ __('Add Employee') }}</a>
                    </div> --}}
                @endcan
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <table class="table datatable ">
                                @can('Personal_information access')
                                    <thead class="text-capitalize">
                                        <tr>
                                            <th scope="col">{{ __('#') }}</th>
                                            <th scope="col">{{ __('Employee Full Name') }}</th>
                                            <th scope="col">{{ __('Emergency Name') }}</th>
                                            <th scope="col">{{ __('Relationship') }}</th>
                                            <th scope="col">{{ __('Email') }}</th>
                                            <th scope="col">{{ __('Phone Number') }}</th>
                                            <th scope="col">{{ __('Age') }}</th>
                                            <th scope="col">{{ __('Sex') }}</th>
                                            <th scope="col">{{ __('Action') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($test as $test)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $test->fname }} {{ $test->mname }} {{ $test->lname }}</td>
                                                <td>{{ $test->EC_name }}</td>
                                                <td>{{ $test->EC_relation }}</td>
                                                <td>{{ $test->EC_email }}</td>
                                                <td>{{ $test->EC_phone }}</td>
                                                <td>{{ $test->EC_age }}</td>
                                                <td>{{ $test->EC_sex }}</td>
                                                <td>

                                                    <div class="dropdown ">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                        </button>
                                                        <ul class="dropdown-menu text-center ">
                                                            <li>
                                                                <a class="text-primary"
                                                                    href="{{ route('editEmp', $test->emp_id) }}">{{ __('Edit') }}</a>
                                                            </li>
                                                            {{-- <li>
                                                                <a
                                                                    class="text-success"href="{{ route('viewEmp', $test->emp_id) }}">{{ __('Detail') }}</a>
                                                            </li>
                                                            <li>
                                                                <a class="text-danger" href="" data-bs-toggle="modal"
                                                                    data-bs-target="#staticBackdrop{{ $test->emp_id }}">
                                                                    {{ __('Delete') }}
                                                                </a>
                                                            </li> --}}

                                                        </ul>
                                                    </div>

                                                </td>
                                            </tr>

                                            <div class="modal fade" id="staticBackdrop{{ $test->emp_id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{ __('Are you sure you want to Delete?') }}

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">{{ __('Cancle') }}</button>

                                                            <form action="{{ route('DelEmp', $test->emp_id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger"
                                                                    type="submit">{{ __('Delete') }}</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </tbody>
                                @endcan
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
@endsection
