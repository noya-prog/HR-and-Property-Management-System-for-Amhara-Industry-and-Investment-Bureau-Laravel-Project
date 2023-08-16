@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{__('Register Item Page')}}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item text-capitalize">{{__('Property Management')}}</li>
                    <li class="breadcrumb-item active text-capitalize">{{__('Register Items')}}</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                @can('Item add')
                    
                <div class="col">
                    <a href="{{route('createItem')}}" class="btn btn-primary float-end mb-2 "><i></i>{{__('Register Item')}}</a>
                </div>
                @endcan
             
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <table class="table datatable ">
                               
                                <thead class="text-capitalize">
                                    <tr>
                                        <th scope="col">{{__('Name')}}</th>
                                        <th scope="col">{{__('Description')}}</th>
                                        <th scope="col">{{__('Measurement')}}</th>
                                        <th scope="col">{{__('Available In Stock')}}</th>
                                        <th scope="col">{{__('Single Price')}}</th>
                                        <th scope="col">{{__('Department')}}</th>
                                        <th scope="col">{{__('Store Name')}}</th>
                                        <th scope="col">{{__('Action')}}</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($test as $test)
                                        <tr>
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
                                                        @can('Item edit')  
                                                        <li>
                                                            <a class="text-primary"
                                                                href="{{ route('editItem', $test->item_id) }}">{{__('Edit')}}</a>
                                                        </li>
                                                        @endcan
                                                        @can('Item view')
                                                            
                                                        
                                                        <li>
                                                            <a
                                                                class="text-success"href="{{ route('viewItem', $test->item_id) }}">{{__('Detail')}}</a>
                                                        </li>
                                                        @endcan
                                                        @can('Item delete')
                                                            
                                                      
                                                        <li>
                                                            <a class="text-danger" href="" data-bs-toggle="modal"
                                                                data-bs-target="#staticBackdrop{{ $test->item_id }}">
                                                                {{__('Delete')}}
                                                            </a>
                                                        </li>
                                                        @endcan
                                                    </ul>
                                                </div>

                                            </td>
                                        </tr>

                                        <div class="modal fade" id="staticBackdrop{{ $test->item_id }}"
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

                                                        <form action="{{ route('delItem', $test->item_id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit">{{__('Delete')}}</button>
                                                        </form>

                                                    </div>
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
@endsection
