@extends('layouts.home')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Add New Post</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('home') }}">Home</a></li>

                    <li class="breadcrumb-item active text-capitalize">Post</li>
                    <li class="breadcrumb-item active text-capitalize">Add New Post</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="container">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('savePost') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3 col-md-6 mb-3">
                            <label for="title" class="form-label" required>Post Title</label>
                            <input name="post_title" id="title" type="text" class="form-control" placeholder="Title">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-6 mb-3">
                            <label for="slug" class="form-label" required>Post Slug</label>
                            <input name="post_slug" id="slug" type="text" class="form-control" placeholder="slug">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-3 col-md-9">
                            <label for="desc">Post Description</label>
                            <textarea name="post_description" class="form-control" placeholder="place your post here" rows="12" id="desc"></textarea>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

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
