@extends('layouts.home')
@section('content')
    <html>

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>

    <body>

        <main id="main" class="main">
            <div class="pagetitle">
                {{-- <h1>{{__('Profile')}}</h1> --}}
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('Users') }}</li>
                        <li class="breadcrumb-item active">{{ __('Add Employee') }}</li>
                    </ol>
                </nav>
            </div>
            <section class="section profile ">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('SaveEmployee') }}" class="text-capitalize">
                                    @csrf
                                    <h5 class="card-title">{{ __('Personal Information') }}</h5>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6  mb-3">
                                            <label for="email" class=" col-form-label">{{ __('Email') }}</label>
                                            <input name="email"value="{{ old('email') }}"
                                                class="form-control   @error('email') is-invalid @enderror" type="text"
                                                id="email" placeholder="example@gmail.com">
                                            @error('email')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6 mb-3 ">
                                            <label for="first_name" class=" col-form-label">{{ __('First Name') }}</label>
                                            <input name="first_name"value="{{ old('first_name') }}"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                type="text" placeholder="First Name">
                                            @error('first_name')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3">
                                            <label for="middle_name" class=" col-form-label">{{ __('Middle Name') }}</label>
                                            <input name="middle_name" value="{{ old('middle_name') }}"
                                                class="form-control  @error('middle_name') is-invalid @enderror"
                                                type="text" placeholder="Middle Name"> @error('middle_name')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6  mb-3">
                                            <label for="last_name" class="col-form-label">{{ __('Last Name') }}</label>
                                            <input name="last_name"value="{{ old('last_name') }}"
                                                class="form-control  @error('last_name') is-invalid @enderror"
                                                type="text" placeholder="Last name"> @error('last_name')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        
                                        {{-- department and job --}}
                                        <div class="col-12 col-md-6  mb-3">
                                            <label for="department" class="col-form-label">{{ __('Department') }}</label>
                                            <select name="department" id="department"
                                                class="form-select input-lg dynamic @error('department') is-invalid @enderror"
                                                data-dependent="job_title">
                                                <option selected disabled value="">{{ __('Select Department') }}
                                                </option>
                                                @foreach ($dep as $deps)
                                                    <option value="{{ $deps->dep_id_fk }}">{{ $deps->department_name }}
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
                                            <label for="job_title" class="col-form-label">{{ __('Job Title') }}</label>
                                            <select name="job_title" id="job_title"
                                                class="form-select input-lg @error('job_title') is-invalid @enderror">
                                                <option selected disabled value="">{{ __('Select Job Title') }}
                                                </option>
                                            </select>
                                            @error('job_title')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        {{ csrf_field() }}
                                        {{--  --}}
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="" class="col-form-label">{{ __('Sex') }}</label>
                                            <select name="sex" id="sex"
                                                class="form-select  @error('sex') is-invalid @enderror">
                                                <option value="" disabled selected>{{ __('--Select--') }}</option>
                                                <option value="male" {{ old('sex') == 'male' ? 'selected' : '' }}>
                                                    {{ __('Male') }}
                                                </option>
                                                <option value="female" {{ old('sex') == 'female' ? 'selected' : '' }}>
                                                    {{ __('Female') }}
                                                </option>
                                            </select> @error('sex')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="dob" class=" col-form-label">{{ __('Date of Birth') }}</label>
                                            <input name="dob"value="{{ old('dob') }}"
                                                class="form-control  @error('dob') is-invalid @enderror" type="date"
                                                placeholder="First Name"> @error('dob')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for=""
                                                class=" col-form-label">{{ __('Martial Status') }}</label>
                                            <select name="martial" id="martial"
                                                class="form-select  @error('martial') is-invalid @enderror">
                                                <option value="" selected disabled>{{ __('--Select--') }}</option>
                                                <option value="single" {{ old('martial') == 'single' ? 'selected' : '' }}>
                                                    {{ __('Single') }}
                                                </option>
                                                <option value="married"
                                                    {{ old('martial') == 'married' ? 'selected' : '' }}>
                                                    {{ __('Married') }}</option>
                                                <option value="widdowed"
                                                    {{ old('martial') == 'widdowed' ? 'selected' : '' }}>
                                                    {{ __('Widdowed') }}</option>
                                            </select>
                                            @error('martial')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6  mb-3">
                                            <label for="phone"
                                                class=" col-form-label">{{ __('Phone Number') }}</label>
                                            <input name="phone" value="{{ old('phone') }}"
                                                class="form-control  @error('phone') is-invalid @enderror" type="tel"
                                                placeholder="Phone Number">

                                            @error('phone')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="employeed_at"
                                                class="col-form-label">{{ __('Employeed at') }}</label>
                                            <input name="employeed_at" value="{{ old('employeed_at') }}"
                                                class="form-control @error('employeed_at') is-invalid @enderror"
                                                type="date" placeholder="">
                                            @error('employeed_at')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <h5 class="card-title">{{ __('Address') }}</h5>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="state" class=" col-form-label">{{ __('State') }}</label>
                                            <input name="state"value="{{ old('state') }}"
                                                class="form-control  @error('state') is-invalid @enderror" type="text"
                                                placeholder="state">
                                            @error('state')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="city" class=" col-form-label">{{ __('City') }}</label>
                                            <input name="city"value="{{ old('this') }}"
                                                class="form-control  @error('city') is-invalid @enderror" type="text"
                                                placeholder="city">
                                            @error('city')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="kebele" class=" col-form-label">{{ __('Kebele') }}</label>
                                            <input name="kebele"value="{{ old('kebele') }}"
                                                class="form-control  @error('kebele') is-invalid @enderror"
                                                type="number" placeholder="">
                                            @error('kebele')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="house_num"
                                                class=" col-form-label">{{ __('House Number') }}</label>
                                            <input name="house_num" value="{{ old('house_num') }}"
                                                class="form-control  @error('house_num') is-invalid @enderror"
                                                type="number" placeholder=""> @error('house_num')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <h5 class="card-title">{{ __('Dependents') }}</h5>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="d_mother_name"
                                                class=" col-form-label">{{ __('Mother Name') }}</label>
                                            <input name="d_mother_name" value="{{ old('d_mother_name') }}"
                                                class="form-control  @error('d_mother_name') is-invalid @enderror"
                                                type="text" placeholder="mother Name">
                                            @error('d_mother_name')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="d_father_name"
                                                class=" col-form-label">{{ __('Father Name') }}</label>
                                            <input name="d_father_name" value="{{ old('d_father_name') }}"
                                                class="form-control  @error('d_father_name') is-invalid @enderror"
                                                type="text" placeholder="Father Name"> @error('d_father_name')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="spouse_name"
                                                class=" col-form-label">{{ __('Spouse Name') }}</label>
                                            <input name="spouse_name" value="{{ old('spouse_name') }}"
                                                class="form-control  @error('spouse_name') is-invalid @enderror"
                                                type="text" placeholder="spouse Name"> @error('spouse_name')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="num_of_children"
                                                class=" col-form-label">{{ __('Number of
                                                                                                Children') }}</label>
                                            <input name="num_of_children" value="{{ old('num_of_children') }}"
                                                class="form-control  @error('num_of_children') is-invalid @enderror"
                                                type="number" placeholder="Number Of Children">
                                            @error('num_of_children')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <h5 class="card-title">{{ __('Employee Education') }}</h5>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="elementary_school"
                                                class=" col-form-label">{{ __('Elementary School') }}</label>
                                            <input name="elementary_school" value="{{ old('elementary_school') }}"
                                                class="form-control  @error('elementary_school') is-invalid @enderror"
                                                type="text" placeholder=""> @error('elementary_school')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="high_school"
                                                class=" col-form-label">{{ __('High School') }}</label>
                                            <input name="high_school" value="{{ old('high_school') }}"
                                                class="form-control  @error('high_school') is-invalid @enderror"
                                                type="text" placeholder="">
                                            @error('high_school')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="prep_school"
                                                class=" col-form-label">{{ __('Preparatory School') }}</label>
                                            <input name="prep_school" value="{{ old('prep_school') }}"
                                                class="form-control  @error('prep_school') is-invalid @enderror"
                                                type="text" placeholder="">
                                            @error('prep_school')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="higher_commission"
                                                class=" col-form-label">{{ __('Higher Commission') }}</label>
                                            <input name="higher_commission" value="{{ old('higher_commission') }}"
                                                class="form-control  @error('higher_commission') is-invalid @enderror"
                                                type="text" placeholder="">
                                            @error('higher_commission')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="education_level"
                                                class=" col-form-label">{{ __('Education Level') }}</label>
                                            <select name="education_level" id=""
                                                value="{{ old('education_level') }}"
                                                class="form-select @error('education_level') is-invalid @enderror">
                                                <option value=""disabled selected>{{ __('--Select--') }}</option>
                                                <option value="BSC"
                                                    {{ old('education_level') == 'BSC' ? 'selected' : '' }}>
                                                    Bachlors Degree</option>
                                                <option value="Masters"
                                                    {{ old('education_level') == 'Masters' ? 'selected' : '' }}>Masters
                                                </option>
                                                <option value="PHD"
                                                    {{ old('education_level') == 'PHD' ? 'selected' : '' }}>
                                                    Phd</option>
                                                <option value="Level I"
                                                    {{ old('education_level') == 'Level I' ? 'selected' : '' }}>level 1
                                                </option>
                                                <option value="Level II"
                                                    {{ old('education_level') == 'Level II' ? 'selected' : '' }}>level 2
                                                </option>

                                            </select>
                                            @error('education_level')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <h5 class="card-title">{{ __('Employee Experience') }}</h5>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="prev_company"
                                                class=" col-form-label">{{ __('Previous Company') }}</label>
                                            <input name="prev_company" value="{{ old('prev_company') }}"
                                                class="form-control  @error('prev_company') is-invalid @enderror"
                                                type="text" placeholder="">
                                            @error('prev_company')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="period_of_service"
                                                class=" col-form-label">{{ __('Period of Service') }}</label>
                                            <input name="period_of_service" value="{{ old('period_of_service') }}"
                                                class="form-control  @error('period_of_service') is-invalid @enderror"
                                                type="text" placeholder="">
                                            @error('period_of_service')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="relevant_experience"
                                                class=" col-form-label">{{ __('Relevant Experience') }}</label>
                                            <input name="relevant_experience" value="{{ old('relevant_experience') }}"
                                                class="form-control  @error('relevant_experience') is-invalid @enderror"
                                                type="text" placeholder="">
                                            @error('relevant_experience')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <h5 class="card-title">{{ __('Have colateral') }}</h5>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="co_full_name"
                                                class=" col-form-label">{{ __('Full Name') }}</label>
                                            <input name="co_full_name" value="{{ old('co_full_name') }}"
                                                class="form-control  @error('co_full_name') is-invalid @enderror"
                                                type="text" placeholder="">
                                            @error('co_full_name')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="co_email" class=" col-form-label">{{ __('Email') }}</label>
                                            <input name="co_email" value="{{ old('co_email') }}"
                                                class="form-control  @error('co_email') is-invalid @enderror" type="text"
                                                placeholder="">
                                            @error('co_email')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="co_company_name"
                                                class=" col-form-label">{{ __('Company Name') }}</label>
                                            <input name="co_company_name" value="{{ old('co_company_name') }}"
                                                class="form-control  @error('co_company_name') is-invalid @enderror"
                                                type="text" placeholder="">
                                            @error('co_company_name')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="co_state" class=" col-form-label">{{ __('State') }}</label>
                                            <input name="co_state" value="{{ old('co_state') }}"
                                                class="form-control  @error('co_state') is-invalid @enderror"
                                                type="text" placeholder="">
                                            @error('co_state')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="co_city" class=" col-form-label">{{ __('City') }}</label>
                                            <input name="co_city" value="{{ old('co_city') }}"
                                                class="form-control  @error('co_city') is-invalid @enderror"
                                                type="text" placeholder="">
                                            @error('co_city')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="co_kebele" class=" col-form-label">{{ __('Kebele') }}</label>
                                            <input name="co_kebele" value="{{ old('co_kebele') }}"
                                                class="form-control  @error('co_kebele') is-invalid @enderror"
                                                type="number" placeholder="">
                                            @error('co_kebele')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="co_relationship"
                                                class=" col-form-label">{{ __('Relationship') }}</label>
                                            <input name="co_relationship" value="{{ old('co_relationship') }}"
                                                class="form-control  @error('co_relationship') is-invalid @enderror"
                                                type="text" placeholder="">
                                            @error('co_relationship')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3    ">
                                            <label for="co_salary" class="col-form-label">{{ __('Salary') }}
                                            </label>

                                            <input name="co_salary" value="{{ old('co_salary') }}"
                                                class="form-control  @error('co_salary') is-invalid @enderror"
                                                type="number" placeholder="7000 ETB ">
                                            @error('co_salary')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <h5 class="card-title">{{ __('Are colateral') }}</h5>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="ac_full_name"
                                                class=" col-form-label">{{ __('Full Name') }}</label>
                                            <input name="ac_full_name" value="{{ old('ac_full_name') }}"
                                                class="form-control  @error('ac_full_name') is-invalid @enderror"
                                                type="text" placeholder="">
                                            @error('ac_full_name')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="ac_relationship"
                                                class=" col-form-label">{{ __('Relationship') }}</label>
                                            <input name="ac_relationship" value="{{ old('ac_relationship') }}"
                                                class="form-control  @error('ac_relationship') is-invalid @enderror"
                                                type="text" placeholder="">
                                            @error('ac_relationship')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="ac_state" class=" col-form-label">{{ __('State') }}</label>
                                            <input name="ac_state" value="{{ old('ac_state') }}"
                                                class="form-control  @error('ac_state') is-invalid @enderror"
                                                type="text" placeholder="">
                                            @error('ac_state')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="" class=" col-form-label">{{ __('City') }}</label>
                                            <input name="ac_city" value="{{ old('ac_city') }}"
                                                class="form-control  @error('ac_city') is-invalid @enderror"
                                                type="text" placeholder="">
                                            @error('ac_city')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="" class=" col-form-label">{{ __('Kebele') }}</label>
                                            <input name="ac_kebele" value="{{ old('ac_kebele') }}"
                                                class="form-control  @error('ac_kebele') is-invalid @enderror"
                                                type="number" placeholder="">
                                            @error('ac_kebele')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <h5 class="card-title">{{ __('Emergency Contact') }}</h5>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="EC_name" class=" col-form-label">{{ __('Full Name') }}
                                            </label>
                                            <input name="EC_name" value="{{ old('EC_name') }}"
                                                class="form-control  @error('EC_name') is-invalid @enderror"
                                                type="text" placeholder="">
                                            @error('EC_name')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="EC_relation" class=" col-form-label">{{ __('Relationship') }}
                                            </label>
                                            <input name="EC_relation" value="{{ old('EC_relation') }}"
                                                class="form-control  @error('EC_relation') is-invalid @enderror"
                                                type="text" placeholder="">
                                            @error('EC_relation')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="EC_email" class=" col-form-label">{{ __('Email') }}</label>
                                            <input name="EC_email" value="{{ old('EC_email') }}"
                                                class="form-control  @error('EC_email') is-invalid @enderror"
                                                type="email" placeholder="">
                                            @error('EC_email')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="EC_phone"
                                                class=" col-form-label">{{ __('Phone Number') }}</label>
                                            <input name="EC_phone" value="{{ old('EC_phone') }}"
                                                class="form-control  @error('EC_phone') is-invalid @enderror"
                                                type="tel" placeholder="">
                                            @error('EC_phone')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="EC_age" class=" col-form-label">{{ __('Age') }}</label>
                                            <input name="EC_age" value="{{ old('EC_age') }}"
                                                class="form-control  @error('EC_age') is-invalid @enderror"
                                                type="number" placeholder="">
                                            @error('EC_age')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6  mb-3 ">
                                            <label for="EC_sex" class=" col-form-label">{{ __('Sex') }}</label>
                                            <select name="EC_sex" id="" value="{{ old('EC_sex') }}"
                                                class="form-select @error('EC_sex') is-invalid @enderror">
                                                <option value=""disabled selected>{{ __('--Select--') }}</option>
                                                <option value="male" {{ old('EC_sex') == 'male' ? 'selected' : '' }}>
                                                    {{ __('Male') }}</option>
                                                <option value="female" {{ old('EC_sex') == 'female' ? 'selected' : '' }}>
                                                    {{ __('Female') }}
                                                </option>
                                            </select>
                                            @error('EC_sex')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <button class="btn btn-primary" type="submit">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>

    </html>
    <script>
        $(document).ready(function() {

            $('.dynamic').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('dynamicdependent.fetch') }}",
                        method: "POST",
                        data: {
                            select: select,
                            value: value,
                            _token: _token,
                            dependent: dependent
                        },
                        success: function(result) {
                            $('#' + dependent).html(result);
                        }

                    })
                }
            });

            $('#department').change(function() {
                $('#job_tilte').val('');
            });

        });
    </script>
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
