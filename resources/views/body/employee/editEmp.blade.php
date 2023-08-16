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
                    <li class="breadcrumb-item">{{__('HR Management')}}</li>
                    <li class="breadcrumb-item">{{__('Personal Information')}}</li>
                    <li class="breadcrumb-item active">{{__('Edit Employee')}}</li>
                </ol>
            </nav>
        </div>
        <section class="section profile ">

            <div class="row">
                <div class="col-lg-12">
                    <h4 class="text-primary">{{__('Edit Employee')}}</h4>
                    <div class="card">
                        <div class="card-body">
                            @foreach ($errors->all() as $error)
                                <li class="alert-danger" role="alert">
                                    {{ $error }}
                                </li>
                            @endforeach
                            @if (session('success'))
                                <div class="alert alert-success w-full">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('updateEmp', $personal->emp_id) }}"
                                class="text-capitalize">
                                @csrf
                                @method('PATCH')

                                <h5 class="card-title">{{__('Personal Information')}}</h5>
                                <div class="row mb-3">
                                    {{-- <div class="col-12 col-md-6  mb-3">
                                        <label for="email" class=" col-form-label">email</label>
                                        <input name="email" value="{{ $personal->email }}"
                                            class="form-control  @error('email') error  @enderror" type="text"
                                            id="email" placeholder="example@gmail.com">
                                    </div> --}}
                                    <div class="col-12 col-md-6 mb-3 ">
                                        <label for="first_name" class=" col-form-label">{{__('First Name')}}</label>
                                        <input name="first_name" value="{{ $personal->fname }}"
                                            class="form-control @error('first_name') error  @enderror" type="text"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3">
                                        <label for="middle_name" class=" col-form-label">{{__('Middle Name')}}</label>
                                        <input name="middle_name" value="{{ $personal->mname }}"
                                            class="form-control  @error('middle_name') error  @enderror" type="text"
                                            placeholder="Middle Name">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3">
                                        <label for="last_name" class="col-form-label">{{__('Last Name')}}</label>
                                        <input name="last_name" value="{{ $personal->lname }}"
                                            class="form-control
                                            @error('last_name') error  @enderror"
                                            type="text" placeholder="Last name">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class="col-form-label">{{__('Sex')}}</label>
                                        <select name="sex" id="sex"
                                            class="form-select  @error('sex') error  @enderror">
                                            <option value="" disabled selected>{{__('--Select--')}}</option>
                                            <option value="male"
                                                {{ old('sex', $personal->sex) == 'male' ? 'selected' : '' }}>
                                                {{__('Male')}}
                                            </option>
                                            <option value="female"
                                                {{ old('sex', $personal->sex) == 'female' ? 'selected' : '' }}>
                                                {{__('Female')}}
                                            </option>

                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="firstname" class=" col-form-label">{{__('Date of Birth')}}</label>
                                        <input name="dob"value="{{ $personal->dob }}"
                                            class="form-control
                                            @error('dob') error  @enderror"
                                            type="date" placeholder="First Name">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class=" col-form-label">{{__('Martial Status')}}</label>
                                        <select name="martial" id="martial"
                                            class="form-select  @error('martial') error  @enderror">
                                            <option value="" selected disabled>{{__('--Select--')}}</option>

                                            <option value="single"
                                                {{ old('martial', $personal->martial) == 'single' ? 'selected' : '' }}>
                                                {{__('Single')}}
                                            </option>

                                            <option value="married"
                                                {{ old('martial', $personal->martial) == 'married' ? 'selected' : '' }}>
                                                {{__('Married')}}                                            </option>
                                            {{-- <option value="widdowed"
                                                {{ old('martial', $personal->martial) == 'widdowed' ? 'selected' : '' }}>
                                                {{__('Widdowed')}}
                                            </option> --}}
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6  mb-3">
                                        <label for="phone" class=" col-form-label">{{__('Phone Number')}}</label>
                                        <input name="phone" value="{{ $personal->phone }}"
                                            class="form-control
                                            @error('phone') error  @enderror"
                                            type="tel" placeholder="Phone Number">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="employeed_at" class="col-form-label">{{__('Employeed at')}}</label>
                                        <input name="employeed_at" value="{{ $personal->employeed_at }}"
                                            class="form-control
                                            @error('employeed_at') error  @enderror"
                                            type="date" placeholder="">
                                    </div>
                                </div>

                                <h5 class="card-title">{{__('Address')}}</h5>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="state" class=" col-form-label">{{__('State')}}</label>
                                        <input name="state" value="{{ $address->state }}"
                                            class="form-control
                                            @error('state') error  @enderror"
                                            type="text" placeholder="state">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="city" class=" col-form-label">{{__('City')}}</label>
                                        <input name="city" value="{{ $address->city }}"
                                            class="form-control
                                            @error('city') error  @enderror"
                                            type="text" placeholder="city">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="kebele" class=" col-form-label">{{__('Kebele')}}</label>
                                        <input name="kebele" value="{{ $address->kebele }}"
                                            class="form-control
                                            @error('kebele') error  @enderror"
                                            type="number" placeholder="">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="house_num" class=" col-form-label">{{__('House Number')}}</label>
                                        <input name="house_num" value="{{ $address->house_num }}"
                                            class="form-control
                                            @error('house_num') error  @enderror"
                                            type="number" placeholder="">
                                    </div>
                                </div>

                                <h5 class="card-title">{{__('Dependents')}}</h5>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="d_mother_name" class="col-form-label">{{__('Mother Name')}}</label>
                                        <input name="d_mother_name" value="{{ $dependent->d_mother_name }}"
                                            class="form-control
                                            @error('d_mother_name') error  @enderror"
                                            type="text" placeholder="mother Name">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="d_father_name" class=" col-form-label">{{__('Father Name')}}</label>
                                        <input name="d_father_name" value="{{ $dependent->d_father_name }}"
                                            class="form-control
                                            @error('d_father_name') error  @enderror"
                                            type="text" placeholder="Father Name">
                                    </div>

                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="spouse_name" class=" col-form-label">{{__('Spouse Name')}}</label>
                                        <input name="spouse_name" value="{{ $dependent->spouse_name }}"
                                            class="form-control  @error('spouse_name') error  @enderror" type="text"
                                            placeholder="spouse Name">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="num_of_children" class=" col-form-label">{{__('Number of Children')}}</label>
                                        <input name="num_of_children" value="{{ $dependent->num_of_children }}"
                                            class="form-control
                                            @error('num_of_children') error  @enderror"
                                            type="number" placeholder="Number Of Children">
                                    </div>
                                </div>

                                <h5 class="card-title">{{__('Employee Education')}}</h5>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class=" col-form-label">{{__('Elementary School')}}</label>
                                        <input name="elementary_school" value="{{ $education->elementary_school }}"
                                            class="form-control
                                            @error('elementary_school') error  @enderror"
                                            type="text" placeholder="">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="high_school" class=" col-form-label">{{__('High School')}}</label>
                                        <input name="high_school" value="{{ $education->high_school }}"
                                            class="form-control
                                            @error('high_school') error  @enderror"
                                            type="text" placeholder="">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="prep_school" class=" col-form-label">{{__('Preparatory School')}}</label>
                                        <input name="prep_school" value="{{ $education->prep_school }}"
                                            class="form-control
                                            @error('prep_school') error  @enderror"
                                            type="text" placeholder="">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="higher_commission" class=" col-form-label">{{__('Higher Commission')}}</label>
                                        <input name="higher_commission" value="{{ $education->higher_commission }}"
                                            class="form-control
                                            @error('higher_commission') error  @enderror"
                                            type="text" placeholder="">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class=" col-form-label">{{__('Education Level')}}</label>
                                        <select name="education_level" id=""
                                            value="{{ old('education_level') }}"
                                            class="form-select @error('education_level') error  @enderror">
                                            <option value=""disabled selected>{{__('--Select--')}}</option>
                                            <option value="BSC"
                                                {{ old('education_level', $education->education_level) == 'BSC' ? 'selected' : '' }}>
                                                Bachlors Degree</option>
                                            <option value="Masters"
                                                {{ old('education_level', $education->education_level) == 'Masters' ? 'selected' : '' }}>
                                                Masters
                                            </option>
                                            <option value="PHD"
                                                {{ old('education_level', $education->education_level) == 'PHD' ? 'selected' : '' }}>
                                                Phd</option>
                                            <option value="Level I"
                                                {{ old('education_level', $education->education_level) == 'Level I' ? 'selected' : '' }}>
                                                level 1
                                            </option>
                                            <option value="Level II"
                                                {{ old('education_level', $education->education_level) == 'Level II' ? 'selected' : '' }}>
                                                level 2
                                            </option>

                                        </select>
                                    </div>
                                </div>

                                <h5 class="card-title">{{__('Employee Experience')}}</h5>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="prev_company" class=" col-form-label">{{__('Previous Company')}}</label>
                                        <input name="prev_company" value="{{ $work_exp->prev_company }}"
                                            class="form-control
                                            @error('prev_company') error  @enderror"
                                            type="text" placeholder="">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="period_of_service" class=" col-form-label">{{__('Period of Service')}}</label>
                                        <input name="period_of_service" value="{{ $work_exp->period_of_service }}"
                                            class="form-control
                                            @error('period_of_service') error  @enderror"
                                            type="text" placeholder="">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="relevant_experience" class=" col-form-label">{{__('Relevant Experience')}}</label>
                                        <input name="relevant_experience" value="{{ $work_exp->relevant_experience }}"
                                            class="form-control
                                            @error('relevant_experience') error  @enderror"
                                            type="text" placeholder="">
                                    </div>

                                </div>

                                <h5 class="card-title">{{__('Are colateral')}}</h5>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class=" col-form-label">{{__('Full Name')}}</label>
                                        <input name="ac_full_name" value="{{ $colateral->ac_full_name }}"
                                            class="form-control  @error('ac_full_name') error  @enderror" type="text"
                                            placeholder="">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class=" col-form-label">{{__('Relationship')}}</label>
                                        <input name="ac_relationship" value="{{ $colateral->ac_relationship }}"
                                            class="form-control  @error('ac_relationship') error  @enderror"
                                            type="text" placeholder="">
                                    </div>

                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class=" col-form-label">{{__('State')}}</label>
                                        <input name="ac_state" value="{{ $colateral->ac_state }}"
                                            class="form-control  @error('ac_state') error  @enderror" type="text"
                                            placeholder="">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class=" col-form-label">{{__('City')}}</label>
                                        <input name="ac_city" value="{{ $colateral->ac_city }}"
                                            class="form-control  @error('ac_city') error  @enderror" type="text"
                                            placeholder="">
                                    </div>

                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class=" col-form-label">{{__('Kebele')}}</label>
                                        <input name="ac_kebele" value="{{ $colateral->ac_kebele }}"
                                            class="form-control  @error('ac_kebele') error  @enderror" type="number"
                                            placeholder="">
                                    </div>
                                </div>

                                <h5 class="card-title">{{__('Have colateral')}}</h5>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="co_full_name" class=" col-form-label">{{__('Full Name')}}</label>
                                        <input name="co_full_name" value="{{ $have_colateral->co_full_name }}"
                                            class="form-control  @error('co_full_name') error  @enderror" type="text"
                                            placeholder="">
                                    </div>
                                    {{-- <div class="col-12 col-md-6  mb-3 ">
                                        <label for="email" class=" col-form-label">colateral Email</label>
                                        <input name="email" value="{{ $have_colateral->email }}"
                                            class="form-control  @error('email') error  @enderror" type="text"
                                            placeholder="">
                                    </div> --}}

                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="co_company_name" class=" col-form-label">{{__('Company Name')}}</label>
                                        <input name="co_company_name" value="{{ $have_colateral->co_company_name }}"
                                            class="form-control  @error('co_company_name') error  @enderror"
                                            type="text" placeholder="">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class=" col-form-label">{{__('State')}}</label>
                                        <input name="co_state" value="{{ $have_colateral->co_state }}"
                                            class="form-control  @error('co_state') error  @enderror" type="text"
                                            placeholder="">
                                    </div>

                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="co_kebele" class=" col-form-label">{{__('City')}}</label>
                                        <input name="co_city" value="{{ $have_colateral->co_city }}"
                                            class="form-control  @error('co_city') error  @enderror" type="text"
                                            placeholder="">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="co_kebele" class=" col-form-label">{{__('Kebele')}}</label>
                                        <input name="co_kebele" value="{{ $have_colateral->co_kebele }}"
                                            class="form-control  @error('co_kebele') error  @enderror" type="number"
                                            placeholder="">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="co_relationship" class=" col-form-label">{{__('Relationship')}}</label>
                                        <input name="co_relationship" value="{{ $have_colateral->co_relationship }}"
                                            class="form-control  @error('co_relationship') error  @enderror"
                                            type="text" placeholder="">
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="co_salary" class=" col-form-label">{{__('Salary')}}</label>
                                        <input name="co_salary" value="{{ $have_colateral->co_salary }}"
                                            class="form-control  @error('co_salary') error  @enderror" type="number"
                                            placeholder="">
                                    </div>
                                </div>

                                <h5 class="card-title">{{__('Emergency Contact')}}</h5>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="EC_name" class=" col-form-label">{{__('Full Name')}}</label>
                                        <input name="EC_name" value="{{ $EMG->EC_name }}"
                                            class="form-control  @error('EC_name') is-invalid @enderror" type="text"
                                            placeholder="">
                                        @error('EC_name')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="EC_relation" class=" col-form-label">{{__('Relationship')}}
                                        </label>
                                        <input name="EC_relation" value="{{ $EMG->EC_relation }}"
                                            class="form-control  @error('EC_relation') is-invalid @enderror"
                                            type="text" placeholder="">
                                        @error('EC_relation')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- <div class="col-12 col-md-6  mb-3 ">
                                        <label for="EC_email" class=" col-form-label">Emergency email</label>
                                        <input name="EC_email" value="{{ $EMG->EC_email }}"
                                            class="form-control  @error('EC_email') is-invalid @enderror" type="email"
                                            placeholder="">
                                        @error('EC_email')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div> --}}
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="EC_phone" class=" col-form-label">{{__('Phone Number')}}</label>
                                        <input name="EC_phone" value="{{ $EMG->EC_phone }}"
                                            class="form-control  @error('EC_phone') is-invalid @enderror" type="number"
                                            placeholder="">
                                        @error('EC_phone')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="EC_age" class=" col-form-label">{{__('Age')}}</label>
                                        <input name="EC_age" value="{{ $EMG->EC_age }}"
                                            class="form-control  @error('EC_age') is-invalid @enderror" type="number"
                                            placeholder="">
                                        @error('EC_age')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="EC_sex" class="col-form-label">{{__('Sex')}}</label>
                                        <select name="EC_sex" id="EC_sex"
                                            class="form-select  @error('EC_sex') error  @enderror">
                                            <option value="" disabled selected>{{__('--Select--')}}</option>
                                            <option value="male"
                                                {{ old('EC_sex', $EMG->EC_sex) == 'male' ? 'selected' : '' }}>
                                                {{__('Male')}}
                                            </option>
                                            <option value="female"
                                                {{ old('EC_sex', $EMG->EC_sex) == 'female' ? 'selected' : '' }}>
                                                {{__('Female')}}
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
                                    <button class="btn btn-success" type="submit">
                                        {{__('Update')}}
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
@endsection
