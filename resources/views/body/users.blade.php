@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Users</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col">
                    <a href="{{ route('createEmp') }}" class="btn btn-primary float-end mb-2 "><i></i>Add User</a>
                </div>

                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <table class="table datatable ">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th scope="col">emp id</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">middle Name</th>
                                        <th scope="col">last name</th>
                                        <th scope="col">email</th>
                                        <th scope="col">phone </th>
                                        <th scope="col">age</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($test as $test)
                                        <tr>
                                            <td>{{ $test->emp_id }}</td>
                                            <td>{{ $test->fname }}</td>
                                            <td>{{ $test->mname }}</td>
                                            <td>{{ $test->lname }}</td>
                                            <td>{{ $test->email }}</td>
                                            <td>{{ $test->phone }}</td>
                                            <td>{{ $test->age }}</td>
                                            <td><a href="{{ route('editEmp', $test->id) }}">Edit</a>|
                                                <a href="{{ route('viewEmp', $test->id) }}">view</a>|
                                                <a href="{{ route('editEmp', $test->id) }}">delete</a>
                                            </td>
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
@endsection
