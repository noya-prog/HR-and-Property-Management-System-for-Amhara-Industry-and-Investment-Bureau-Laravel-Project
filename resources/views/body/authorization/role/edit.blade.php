@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{__('Role')}}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('home') }}">{{__('Home')}}</a></li>

                    <li class="breadcrumb-item active text-capitalize">{{__('Role')}}</li>
                    <li class="breadcrumb-item active text-capitalize">{{__('Edit')}}</li>
                </ol>
            </nav>
        </div>

        <section class="section">

            <div class="container mx-auto px-2 py-1">
                <div class="shadow-md rounded  ">
                    <form method="POST" action="{{ route('roles.update', $role->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="role_name" class="form-label font-medium">{{__('Role')}}</label>
                            <input id="role_name" type="text" name="name" value="{{ old('name', $role->name) }}"
                                placeholder="Placeholder" class="form-control" />
                        </div>
                        <h3 class="text-xl my-4 text-gray-600">{{__('Permission')}}</h3>
                        <div class="row row-cols-3 g-4">
                            @foreach ($permissions as $permission)
                                <div class="col">
                                    <div class="form-check">
                                        <label class="col-form-label">
                                            <input type="checkbox" class="form-check-input" name="permissions[]"
                                                value="{{ $permission->id }}"
                                                @if (count($role->permissions->where('id', $permission->id))) checked @endif><span
                                                class="ml-2 text-gray-700">{{ $permission->name }}</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 shadow">{{__('Update')}}</button>
                        </div>
                </div>

            </div>

            </div>
            </div>
        </section>
    </main>
@endsection
