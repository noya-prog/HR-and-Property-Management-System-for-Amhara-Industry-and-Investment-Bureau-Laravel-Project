@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Anouncement</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('home') }}">Home</a></li>

                    <li class="breadcrumb-item active text-capitalize">All Anouncement</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            
                <div class="row">
                    <div class="col-md-8">
                        <h5 class="card-title">
                            {{ 'Anouncement' }} &amp; {{ 'News' }}
                        </h5>
                        <div class="news">
                            @foreach ($posts as $post)
                                <div class="post-item clearfix position-relative mb-3">
                                    <img src="{{ asset('assets/img/aa.jpg') }}" alt="" />
                                    <h4><a href="{{ route('showpost', $post->id) }}">{{ $post->title }}</a></h4>
                                    <p>
                                        {{ $post->slug }}
                                    </p>
                                    <div class="crud position-absolute">

                                        <a class="text-primary" href="{{ route('showpost', $post->id) }}">
                                            {{ 'View' }}|
                                        </a>
                                        @if (Auth::user()->id && Auth::user()->id == $post->post_id)
                                            <a class="text-success" href="{{ route('editpost', $post->id) }}">
                                                {{ 'Edit' }}|</a>
                                            <a class="text-danger" href="" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{ $post->id }}">
                                                {{ 'Delete' }}
                                            </a>
                                        @endif

                                    </div>

                                </div>

                                <!-- Button trigger modal -->

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop{{ $post->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                {{ $post->id }}
                                                {{ 'Are you sure you want to Delete?' }}

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">{{ 'Cancle' }}</button>

                                                <form action="{{ route('deletepost', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"
                                                        type="submit">{{ 'Delete' }}</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                {{-- News And Updates Start here --}}

            </section>
        
    </main>
@endsection
