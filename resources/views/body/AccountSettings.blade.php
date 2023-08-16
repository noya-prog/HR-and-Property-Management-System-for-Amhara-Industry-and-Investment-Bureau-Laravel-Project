@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-xl">
                <div class="card mt-3">

                    {{-- @if (session('error'))
                        <div class="alert alert-danger ">
                            {{ session('error') }}
                        </div>
                    @endif --}}
                    <div class="card-body pt-3">
                        <h5 class="card-title">Change Your Password</h5>
                        <form method="POST" action="{{ route('updatePassword') }}">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Current
                                    Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="current_password" type="password" value="{{ old('current_password') }}"
                                        class="form-control  @error('current_password') is-invalid   @enderror"
                                        id="current_password">
                                    @error('current_password')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="new_password" class="col-md-4 col-lg-3 col-form-label">New
                                    Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="new_password" type="password" value="{{ old('new_password') }}"
                                        class="form-control @error('new_password')  is-invalid  @enderror"
                                        id="new_password">
                                    @error('new_password')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="confirm_password" class="col-md-4 col-lg-3 col-form-label">Confirm
                                    Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="confirm_password" type="password"
                                        class="form-control   @error('confirm_password')  is-invalid @enderror"
                                        value="{{ old('confirm_password') }}" id="confirm_password">
                                    @error('confirm_password')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="text-center"> <button type="submit" class="btn btn-primary">Change
                                    Password</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
