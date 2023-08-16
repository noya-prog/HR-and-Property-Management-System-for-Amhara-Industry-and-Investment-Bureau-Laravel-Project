@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{__('Job Title')}}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('home') }}">{{__('Home')}}</a></li>

                    <li class="breadcrumb-item active text-capitalize">{{__('Job Title')}}</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <table class="table datatable table-striped table-secondary">
                            <thead>
                                <tr>

                                    <th scope="col">{{__('Job Title')}}</th>
                                    <th scope="col">{{__('Required Employee')}}</th>
                                    <th scope="col">{{__('Hired Employee')}}</th>
                                    <th scope="col">{{__('Department')}}</th>
                                    {{-- <th scope="col">Job Title Leader</th> --}}
                                    {{-- <th scope="col">Action</th> --}}

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $data)
                                    <tr>

                                        <td>{{ $data->job_title }}</td>
                                        <td>{{ $data->max_Emp_Limit }}</td>
                                        <td>{{ $data->Hired_Emp }}</td>
                                        <td>{{ $data->department_name }}</td>
                                        {{-- <td>{{ $data->leader_name }}</td> --}}
                                        {{-- <td>
                                            <a href="{{ url('admin/empinfo/edit/' . $data->id) }}"><i
                                                    class="fa-solid fa-pen"></i></a> | <a
                                                href="{{ url('admin/empinfo/delete/' . $data->id) }}"><i
                                                    class="fa-solid fa-trash-can text-danger"></i></a>
                                        </td> --}}

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endsection
