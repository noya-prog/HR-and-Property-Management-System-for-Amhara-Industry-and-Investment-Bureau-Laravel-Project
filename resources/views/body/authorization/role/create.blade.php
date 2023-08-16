@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{__('Role')}}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('home') }}">{{__('Home')}}</a></li>

                    <li class="breadcrumb-item active text-capitalize">{{__('Add Role')}}</li>
                </ol>
            </nav>
        </div>
        <section>
            <div class="container mx-auto px-2 py-1">
                <div class="shadow-md rounded ">
                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="role_name" class="form-label font-medium">{{__('Role')}}</label>
                            <input id="role_name" type="text" name="name" value="{{ old('name') }}"
                            class="form-control   @error('name') is-invalid @enderror" type="text"
                            placeholder="Enter role" class="form-control">
                                            @error('name')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                
                        </div>
                        <h3 class="text-xl my-4 text-gray-600">{{__('Permission')}}</h3>
                        <div class="row row-cols-3 g-4">
                            @foreach ($permissions as $permission)
                                <div class="col">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input " style="margin-top:10px"
                                            name="permissions[]" value="{{ $permission->id }}"
                                            id="permission_{{ $permission->id }}">
                                        <label class="col-form-label "
                                            for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 shadow">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>

        </section>
    </main>
@endsection
