@extends('layouts.home')
@section('content')
    <style>
        .error {
            border: 1px solid red;
        }

        ;
    </style>
    <main id="main" class="main">
        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item">{{__('Property Management')}}</li>
                    <li class="breadcrumb-item">{{__('Register Item')}}</li>
                    <li class="breadcrumb-item active">{{__('Edit Item')}}</li>
                </ol>
            </nav>
        </div>
        <section class="section profile ">

            <div class="row">
                <div class="col-lg-12">
                    <h4 class="text-primary">{{__('Edit Item')}}</h4>
                    <div class="card">
                        <div class="card-body">
                            
                            @if (session('success'))
                                <div class="alert alert-success w-full">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('updateItem', $item->item_id) }}"
                                class="text-capitalize">
                                @csrf
                                @method('PATCH')

                                <h5 class="card-title">{{__('Edit Item')}}</h5>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6 mb-3 ">
                                        <label for="item_name" class=" col-form-label">{{__('Name')}}</label>
                                        <input name="item_name" value="{{ $item->item_name }}"
                                            class="form-control @error('item_name') error  @enderror" type="text"
                                            placeholder="Name">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3">
                                        <label for="item_description" class=" col-form-label">{{__('Description')}}</label>
                                        <input name="item_description" value="{{ $item->item_description }}"
                                            class="form-control  @error('item_description') error  @enderror" type="text"
                                            placeholder="item_description">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3">
                                        <label for="item_measurement" class="col-form-label">{{__('Measurement')}}</label>
                                        <input name="item_measurement" value="{{ $item->item_measurement }}"
                                            class="form-control
                                            @error('item_measurement') error  @enderror"
                                            type="text" placeholder="item_measurement">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3">
                                        <label for="in_stock" class="col-form-label">{{__('Available In Stock')}}</label>
                                        <input name="in_stock" value="{{ $item->in_stock }}"
                                            class="form-control
                                            @error('in_stock') error  @enderror"
                                            type="text" placeholder="in_stock">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3">
                                        <label for="single_price" class="col-form-label">{{__('Single Price')}}</label>
                                        <input name="single_price" value="{{ $item->single_price }}"
                                            class="form-control
                                            @error('single_price') error  @enderror"
                                            type="text" placeholder="single_price">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3">
                                        <label for="store_name" class="col-form-label">{{__('Store Name')}}</label>
                                        <input name="store_name" value="{{ $item->store_name }}"
                                            class="form-control
                                            @error('store_name') error  @enderror"
                                            type="text" placeholder="store_name">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class="col-form-label">{{__('Status')}}</label>
                                        <select name="item_status" id="item_status"
                                            class="form-select  @error('item_status') is-invalid @enderror">
                                            <option value="" disabled selected>{{__('--Select--')}}</option>
                                            <option value="NEW"
                                                {{ old('item_status', $item->item_status) == 'NEW' ? 'selected' : '' }}>
                                                {{__('NEW')}}
                                            </option>
                                            <option value="FAIR"
                                                {{ old('item_status', $item->item_status) == 'FAIR' ? 'selected' : '' }}>
                                                {{__('FAIR')}}
                                            </option>
                                            <option value="USED"
                                                {{ old('item_status', $item->item_status) == 'USED' ? 'selected' : '' }}>
                                                {{__('USED')}}
                                            </option>

                                        </select>
                                        @error('item_status')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="col-12 col-md-6  mb-3">
                                        <label for="department" class="col-form-label">{{ __('Department') }}</label>
                                        <select name="department" id="department"
                                            class="form-select input-lg dynamic @error('department') is-invalid @enderror"
                                            data-dependent="job_title">
                                            <option selected disabled value="">{{ __('Select Department') }}
                                            </option>
                                            @foreach ($department as $deps)
                                                <option value="{{ $deps->id }}">{{ $deps->department_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('department')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6  mb-3">
                                        <label for="item_type" class="col-form-label">{{ __('Item Type') }}</label>
                                        <select name="item_type" id="item_type"
                                            class="form-select input-lg @error('item_type') is-invalid @enderror">
                                            <option selected disabled value="">{{ __('Select Item') }}
                                            </option>
                                            @foreach ($itemType as $items)
                                                <option value="{{ $items->id }}">{{ $items->equ_type }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('item_type')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                  
<div class="row"><div class="text-center mt-5">
    <button class="btn btn-success" type="submit">
        {{__('Update')}}
    </button>
</div>
    </div>
                                

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
@endsection
