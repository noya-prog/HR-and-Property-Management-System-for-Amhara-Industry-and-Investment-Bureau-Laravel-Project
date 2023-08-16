@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Approval</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('home') }}">Home</a></li>

                    <li class="breadcrumb-item active text-capitalize">Approve User</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <form method="POST" action="{{ route('user.role', $users->id) }}">
                @csrf
                @method('PATCH')

                <div class="container ">
                    <div class="row">

                        <div class="col">
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder=""
                                    value="{{ $users->name }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="middleName">Middle Name</label>
                                <input type="text" class="form-control" id="middleName" placeholder=""
                                    value="{{ $users->mname }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName" placeholder=""
                                    value="{{ $users->lname }}">
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($roles as $role)
                    <div class="form-check mt-5 text-capitalize">
                        <input type="checkbox" class="form-check-input me-2" id="saveDetails" name="roles[]"
                            value="{{ $role->id }}">
                        <label class="form-check-label" for="saveDetails">{{ $role->name }}</label>
                    </div>
                @endforeach

                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary rounded-pill px-5 py-2  shadow">Grant
                        Access</button>
                </div>
                </div>
            </form>
          
        </section>
    @endsection
