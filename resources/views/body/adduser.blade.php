@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Add User</li>
                </ol>
            </nav>
        </div>
        <section class="section profile ">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mt-1">
                                {{-- @foreach ($errors->all() as $error)
                                    <li class="alert-danger" role="alert">
                                        {{ $error }}
                                    </li>
                                @endforeach --}}
                            </div>
                            <p class="text-danger">
                                Note:it only submits personal info and address to database for other fields adjust employee
                                controller
                            </p>
                            <h5 class="card-title">Personal Information</h5>
                            <form method="POST" action="{{ route('SaveEmployee') }}" class="text-capitalize">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6  mb-3">
                                        <label for="email" class=" col-form-label">email</label>
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
                                        <label for="first_name" class=" col-form-label">first name</label>
                                        <input name="first_name"value="{{ old('first_name') }}"
                                            class="form-control @error('first_name') is-invalid @enderror" type="text"
                                            placeholder="First Name">
                                        @error('first_name')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6  mb-3">
                                        <label for="middle_name" class=" col-form-label">Middle Name</label>
                                        <input name="middle_name" value="{{ old('middle_name') }}"
                                            class="form-control  @error('middle_name') is-invalid @enderror" type="text"
                                            placeholder="Middle Name"> @error('middle_name')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6  mb-3">
                                        <label for="last_name" class="col-form-label">Last Name</label>
                                        <input name="last_name"value="{{ old('last_name') }}"
                                            class="form-control  @error('last_name') is-invalid @enderror" type="text"
                                            placeholder="Last name"> @error('last_name')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class="col-form-label">Sex</label>
                                        <select name="sex" id="sex"
                                            class="form-select  @error('sex') is-invalid @enderror">
                                            <option value="" disabled selected>--Select--</option>
                                            <option value="male" {{ old('sex') == 'male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female" {{ old('sex') == 'female' ? 'selected' : '' }}>Female
                                            </option>
                                        </select> @error('sex')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="firstname" class=" col-form-label">Date of Birth</label>
                                        <input name="dob"value="{{ old('dob') }}"
                                            class="form-control  @error('dob') is-invalid @enderror" type="date"
                                            placeholder="First Name"> @error('dob')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class=" col-form-label">Martial Status</label>
                                        <select name="martial" id="martial"
                                            class="form-select  @error('martial') is-invalid @enderror">
                                            <option value="" selected disabled>--Select--</option>
                                            <option value="single" {{ old('martial') == 'single' ? 'selected' : '' }}>
                                                Single
                                            </option>
                                            <option value="married" {{ old('martial') == 'married' ? 'selected' : '' }}>
                                                Married</option>
                                            <option value="widdowed" {{ old('martial') == 'widdowed' ? 'selected' : '' }}>
                                                Widdowed</option>
                                        </select>
                                        @error('martial')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6  mb-3">
                                        <label for="phone" class=" col-form-label">Phone Number</label>
                                        <input name="phone"value="{{ old('phone') }}"
                                            class="form-control  @error('phone') is-invalid @enderror" type="tel"
                                            placeholder="Phone Number">

                                        @error('phone')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="employeed_at" class="col-form-label">employeed at</label>
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

                                <h5 class="card-title">Address</h5>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="state" class=" col-form-label">state</label>
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
                                        <label for="city" class=" col-form-label">city</label>
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
                                        <label for="kebele" class=" col-form-label">kebele</label>
                                        <input name="kebele"value="{{ old('kebele') }}"
                                            class="form-control  @error('kebele') is-invalid @enderror" type="number"
                                            placeholder="">
                                        @error('kebele')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="house_num" class=" col-form-label">house number</label>
                                        <input name="house_num" value="{{ old('house_num') }}"
                                            class="form-control  @error('house_num') is-invalid @enderror" type="number"
                                            placeholder=""> @error('house_num')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <h5 class="card-title">Dependants</h5>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="d_mother_name" class=" col-form-label">mother name</label>
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
                                        <label for="d_father_name" class=" col-form-label">father Name</label>
                                        <input name="d_father_name" value="{{ old('d_father_name') }}"
                                            class="form-control  @error('d_father_name') is-invalid @enderror"
                                            type="text" placeholder="Father Name"> @error('d_father_name')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="spouse_name" class=" col-form-label">spouse name</label>
                                        <input name="spouse_name" value="{{ old('spouse_name') }}"
                                            class="form-control  @error('spouse_name') is-invalid @enderror"
                                            type="text" placeholder="spouse Name"> @error('spouse_name')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="num_of_children" class=" col-form-label">Number of Children</label>
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

                                <h5 class="card-title">Education</h5>

                                <div class="row mb-3">
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class=" col-form-label">Elementary school</label>
                                        <input name="elementary_school" value="{{ old('elementary_school') }}"
                                            class="form-control  @error('elementary_school') is-invalid @enderror"
                                            type="text" placeholder=""> @error('elementary_school')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="high_school" class=" col-form-label">high school</label>
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
                                        <label for="prep_school" class=" col-form-label">preparatory school</label>
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
                                        <label for="" class=" col-form-label">higher comission</label>
                                        <select name="higher_comission" id=""
                                            value="{{ old('higher_comission') }}"
                                            class="form-select @error('higher_comission') is-invalid @enderror">
                                            <option value=""disabled selected>--Select--</option>
                                            <option value="BSC"
                                                {{ old('higher_comission') == 'BSC' ? 'selected' : '' }}>
                                                Bachlors Degree</option>
                                            <option value="Masters"
                                                {{ old('higher_comission') == 'Masters' ? 'selected' : '' }}>Masters
                                            </option>
                                            <option value="PHD"
                                                {{ old('higher_comission') == 'PHD' ? 'selected' : '' }}>
                                                Phd</option>
                                            <option value="Level I"
                                                {{ old('higher_comission') == 'Level I' ? 'selected' : '' }}>level 1
                                            </option>
                                            <option value="Level II"
                                                {{ old('higher_comission') == 'Level II' ? 'selected' : '' }}>level 2
                                            </option>

                                        </select>
                                        @error('higher_comission')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <h5 class="card-title">Work Experience</h5>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="prev_comp" class=" col-form-label">previous Company</label>
                                        <input name="prev_comp" value="{{ old('prev_comp') }}"
                                            class="form-control  @error('prev_comp') is-invalid @enderror" type="text"
                                            placeholder="">
                                        @error('prev_comp')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="period_of_service" class=" col-form-label">period of service</label>
                                        <input name="period_of_service" value="{{ old('period_of_service') }}"
                                            class="form-control  @error('period_of_service') is-invalid @enderror"
                                            type="text" placeholder="">
                                        @error('period_of_service')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <h5 class="card-title">colateral information</h5>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class=" col-form-label">colateral full name</label>
                                        <input name="colateral_name" value="{{ old('colateral_name') }}"
                                            class="form-control  @error('colateral_name') is-invalid @enderror"
                                            type="text" placeholder="">
                                        @error('colateral_name')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class=" col-form-label">colateral job</label>
                                        <input name="colateral_job" value="{{ old('colateral_job') }}"
                                            class="form-control  @error('colateral_job') is-invalid @enderror"
                                            type="text" placeholder="">
                                        @error('colateral_job')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class=" col-form-label">colateral state</label>
                                        <input name="colateral_state" value="{{ old('colateral_state') }}"
                                            class="form-control  @error('colateral_state') is-invalid @enderror"
                                            type="text" placeholder="">
                                        @error('colateral_state')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class=" col-form-label">colateral city</label>
                                        <input name="colateral_city" value="{{ old('colateral_city') }}"
                                            class="form-control  @error('colateral_city') is-invalid @enderror"
                                            type="text" placeholder="">
                                        @error('colateral_city')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="" class=" col-form-label">colateral kebele</label>
                                        <input name="colateral_kebele" value="{{ old('colateral_kebele') }}"
                                            class="form-control  @error('colateral_kebele') is-invalid @enderror"
                                            type="number" placeholder="">
                                        @error('colateral_kebele')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-primary" type="submit">
                                        Submit
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
