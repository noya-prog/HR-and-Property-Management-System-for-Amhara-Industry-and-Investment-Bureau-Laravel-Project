@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{__('Bureau Structure')}}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active text-capitalize">{{__('Bureau Structure')}}</li>
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

                                    <th scope="col">{{__('Full Name')}}</th>
                                    <th scope="col">{{__('Leader')}}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>

                                        <td>@php
                                            $jobs = explode(',', $data->jobs);
                                            echo implode('<br>', $jobs);
                                        @endphp</td>
                                        <td>{{ $data->leader }}</td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endsection
