@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{__('Users')}}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('Users') }}</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                {{-- <div class="col">
                    <a href="{{ route('createEmp') }}" class="btn btn-primary float-end mb-2 "><i></i>Add User</a>
                </div> --}}

                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            @can('User access')
                                <table class="table datatable ">
                                    <thead class="text-capitalize">
                                        <tr>
                                            <th scope="col">{{__('#')}}</th>

                                            <th scope="col">{{ __('Name') }}</th>

                                            <th scope="col">{{ __('Email') }}</th>
                                            {{-- <th scope="col">phone</th> --}}
                                            <th scope="col">{{ __('Role') }}</th>
                                            <th scope="col">{{ __('Status') }}</th>
                                            <th scope="col">{{ __('Action') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($test as $test)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $test->name }} {{ $test->mname }} {{ $test->lname }} </td>

                                                <td>{{ $test->email }}</td>
                                                {{-- <td>{{ $test->phone }}</td> --}}
                                                <td class=" border-b border-grey-light">
                                                    @foreach ($test->roles as $role)
                                                        <span class="badge bg-secondary text-center">{{ $role->name }}</span>
                                                    @endforeach
                                                </td>
                                                {{-- <td>status</td> --}}

                                                {{-- <td>{{ $test->phone }}</td> --}}
                                                {{-- <td>{{ $test->age }}</td> --}}

                                                <td>

                                                    @if ($test->status == 'approved')
                                                        <span class="badge bg-success">{{ __('Approved') }}</span>
                                                    @elseif ($test->status == 'pending' || $test->status == '')
                                                        <span class="badge bg-warning text-dark">{{ __('Pending') }}</span>
                                                    @elseif ($test->status == 'declined')
                                                        <span class="badge bg-danger">{{ __('Declined') }}</span>
                                                    @endif

                                                </td>
                                                @can('User Grant_Role')
                                                    <td>
                                                        <div class="dropdown ">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                            </button>
                                                            <ul class="dropdown-menu text-center ">
                                                                <li>
                                                                    @if ($test->status == 'pending' || $test->status == 'declined')
                                                                        <a href="{{ route('role.give', $test->id) }}"
                                                                            class="btn btn-success btn-sm tooltip-test"
                                                                            title="Allow user to the system">{{ __('Grant Role') }}</a>
                                                                    @else
                                                                    <a href="{{ route('decline.role', $test->id) }}"
                                                                        class="btn btn-danger btn-sm tooltip-test"
                                                                        title="Allow user to the system">{{ __('Decline') }}</a>
                                                                    @endif
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </td>
                                                @endcan
                                            </tr>

                                            {{-- @include('body.authorization.user.users_modal') --}}
                                        @endforeach

                                    </tbody>
                                </table>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->
            <!-- Modal -->

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
