@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{__('Role')}}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active text-capitalize">{{__('Role')}}</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                @can('Role create')
                <div class="col">
                    <a href="{{ route('roles.create') }}" class="btn btn-primary float-end mb-2 "><i></i>{{__('Add Role')}}</a>
                </div>
                @endcan
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <table class="table datatable ">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th scope="col">{{__('Role')}}</th>
                                        <th scope="col">{{__('Permission')}}</th>
                                        <th scope="col">{{__('Action')}}</th>
                                    </tr>
                                </thead>
                                @can('Role access')
                                <tbody>

                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <div class="border-b border-grey-light">
                                                    @foreach ($role->permissions as $permission)
                                                        <span
                                                            class="badge bg-secondary text-center">{{ $permission->name }}</span>
                                                    @endforeach
                                                </div>
                                            </td>

                                            <td>

                                                <div class="dropdown ">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    </button>
                                                    <ul class="dropdown-menu text-center ">
                                                        @can('Role edit')
                                                            <li>
                                                                <a class="text-primary"
                                                                    href="{{ route('roles.edit', $role->id) }}">{{__('Edit')}}</a>
                                                            </li>
                                                        @endcan
                                                        {{-- <li>
                                                            <a
                                                                class="text-success"href="{{ route('viewEmp', $role->id) }}">View</a>
                                                        </li> --}}
                                                        @can('Role delete')
                                                            <li>
                                                                <a class="text-danger" href="" data-bs-toggle="modal"
                                                                    data-bs-target="#staticBackdrop{{ $role->id }}">
                                                                    {{__('Delete')}}
                                                                </a>
                                                            </li>
                                                        @endcan
                                                    </ul>
                                                </div>

                                            </td>
                                        </tr>

                                        <div class="modal fade" id="staticBackdrop{{ $role->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{__('Are you sure you want to Delete?')}}

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">{{__('Cancle')}}</button>

                                                        <form action="{{ route('roles.delete', $role->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit">{{__('Delete')}}</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            
                                        </div>@endcan
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
@endsection
