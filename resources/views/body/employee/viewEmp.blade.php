@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Employee Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('HR Management') }}</li>
                    <li class="breadcrumb-item">{{ __('Personal Information') }}</li>
                    <li class="breadcrumb-item active">{{ __('Detail') }}</li>
                </ol>
            </nav>
        </div>
        <section class="section profile">
            <div class="row">
                <div class="col-xl">
                    <div class="card">
                        <div class="card-body pt-3">
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item"> <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">{{ __('Personal Information') }}</button></li>
                                <li class="nav-item"> <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#address">{{ __('Address') }}</button></li>
                                <li class="nav-item"> <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#dependents">{{ __('Dependents') }}</button></li>
                                <li class="nav-item"> <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#emergency_contact">{{ __('Emergency Contact') }}</button></li>
                                <li class="nav-item"> <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#employee_experience">{{ __('Employee Experience') }}</button></li>
                                <li class="nav-item"> <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#employee_education">{{ __('Employee Education') }}</button></li>
                                {{-- <li class="nav-item"> <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#are_colateral">Are Colateral</button></li> --}}
                                <li class="nav-item"> <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#have_colateral">{{ __('Colateral') }}</button></li>

                                {{-- <li class="nav-item"> <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#change_password">Change Password</button></li> --}}
                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">{{ __('Personal Information') }}</h5>
                                    <div class="row">
                                        {{-- <div class="col-lg-3 col-md-4 label">Company</div>
                                        <div class="col-lg-9 col-md-8">Amhara Industry And investment Bureau</div> --}}
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">{{ __('Full Name') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->fname }} {{ $user->mname }}
                                            {{ $user->lname }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Email') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Sex') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->sex }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Age') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->age }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Martial Status') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->martial }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Phone Number') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->phone }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Employeed at') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->employeed_at }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Worked For') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->worked_for }}</div>
                                    </div>

                                </div>

                                <div class="tab-pane fade show  profile-overview" id="address">
                                    <h5 class="card-title">{{ __('Address') }}</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('State') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->state }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">{{ __('City') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->city }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Kebele') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->kebele }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('House Number') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->house_num }}</div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show  profile-overview" id="dependents">
                                    <h5 class="card-title">{{ __('Dependents') }}</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Mother Name') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->d_mother_name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">{{ __('Spouse Name') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->spouse_name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Number of Children') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->num_of_children }}</div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show  profile-overview" id="emergency_contact">
                                    <h5 class="card-title">{{ __('Emergency Contact') }}</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Full Name') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->EC_name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">{{ __('Relationship') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->EC_email }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Email') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->EC_email }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Age') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->EC_age }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Phone Number') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->EC_phone }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Sex') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->EC_sex }}</div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show  profile-overview" id="employee_experience">
                                    <h5 class="card-title">{{ __('Employee Experience') }}</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Job Title') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->job_title }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">{{ __('Previous Company') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->prev_company }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Period of Service') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->period_of_service }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Relevant Experience') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->relevant_experience }}</div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show  profile-overview" id="employee_education">
                                    <h5 class="card-title">{{ __('Employee Education') }}</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Elementary School') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->elementary_school }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">{{ __('High School') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->high_school }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Preparatory School') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->prep_school }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Higher Commission') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->higher_commission }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Education Level') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->education_level }}</div>
                                    </div>
                                </div>

                                {{-- <div class="tab-pane fade show  profile-overview" id="are_colateral">
                                    <h5 class="card-title">Are colateral</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{__('Full Name')}}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->ac_full_name}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">{{__('Full Name')}}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->ac_relationship}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">State</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->ac_state}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">City</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->ac_city}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Kebele</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->ac_kebele}}</div>
                                    </div>
                                </div> --}}
                                <div class="tab-pane fade show  profile-overview" id="have_colateral">
                                    <h5 class="card-title">{{ __('Colateral') }}</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Full Name') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->co_full_name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">{{ __('Email') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->co_email}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Company Name') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->co_company_name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('State') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->co_state }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('City') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->co_city }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Kebele') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->co_kebele }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Relationship') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->co_relationship }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Salary') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->co_salary }}</div>
                                    </div>
                                </div>
                                {{-- <div class="tab-pane fade pt-3" id="profile-settings">
                                    <form>
                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                                                Notifications</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="form-check"> <input class="form-check-input" type="checkbox"
                                                        id="changesMade" checked> <label class="form-check-label"
                                                        for="changesMade"> Changes made to your account </label></div>
                                                <div class="form-check"> <input class="form-check-input" type="checkbox"
                                                        id="newProducts" checked> <label class="form-check-label"
                                                        for="newProducts"> Information on new products and services
                                                    </label></div>
                                                <div class="form-check"> <input class="form-check-input" type="checkbox"
                                                        id="proOffers"> <label class="form-check-label" for="proOffers">
                                                        Marketing and promo offers </label></div>
                                                <div class="form-check"> <input class="form-check-input" type="checkbox"
                                                        id="securityNotify" checked disabled> <label
                                                        class="form-check-label" for="securityNotify"> Security alerts
                                                    </label></div>
                                            </div>
                                        </div>
                                        <div class="text-center"> <button type="submit" class="btn btn-primary">Save
                                                Changes</button></div>
                                    </form>
                                </div>
                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <form>
                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                                Password</label>
                                            <div class="col-md-8 col-lg-9"> <input name="password" type="password"
                                                    class="form-control" id="currentPassword"></div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9"> <input name="newpassword" type="password"
                                                    class="form-control" id="newPassword"></div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9"> <input name="renewpassword" type="password"
                                                    class="form-control" id="renewPassword"></div>
                                        </div>
                                        <div class="text-center"> <button type="submit" class="btn btn-primary">Change
                                                Password</button></div>
                                    </form>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
