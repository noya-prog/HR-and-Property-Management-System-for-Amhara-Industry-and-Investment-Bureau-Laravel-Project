@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Roles</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                    <li class="breadcrumb-item active">Roles</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                {{-- <div class="col-md-12">
                    <button type="button" class="btn btn-primary float-end mb-3">Add Role</button>
                </div> --}}
                {{-- <div class="col mb-4">
                    <form action="" method="GET" class="text-capitalize">

                        <div class="row ">
                            <div class="col-md-3">
                                <label for="" class="form-lable">filter by date</label>
                                <input name="created_at" type="date" value="{{ 'y-m-d' }}" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="form-lable">filter by role</label>
                                <select name="role" id="role" class="form-select">
                                    <option value="" diabled selected>Select</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                    <option value="editor">Editor</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary ms-4 mt-4" type="submit">Filter</button>
                            </div>
                        </div>
                    </form>
                </div> --}}

                <hr>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <table class="table datatable ">
                                <thead>
                                    <tr>
                                        <th scope="col">#id</th>
                                        <th scope="col">Role Name</th>

                                    </tr>
                                </thead>
                                <tbody class="text-capitalize">
                                    @foreach ($roles as $role)
                                        <tr>

                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
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
@endsection
