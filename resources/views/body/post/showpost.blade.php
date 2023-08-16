@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Show Post</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('home') }}">Home</a></li>

                    <li class="breadcrumb-item active text-capitalize">View Post</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="container text-center">
                <h3 class="post-title text-primary">
                    {{ $post->title }}
                </h3>

                <div class="fs-6 tex-center text-justify">
                    {{ $post->description }}
                </div>

            </div>

            <div class="creator-wrapper ">
                <div class="creator ">
                    By: {{ $post->user->name }} {{ $post->user->mname }} {{ $post->user->lname }}
                    <br>
                    Created On {{ $post->created_at->format('F jS, Y') }}
                </div>

            </div>
        </section>
    </main>
    @endsection
