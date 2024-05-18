@extends('Layout.Layoutl')

@section('content')

<div class="container vh-100 d-flex flex-column justify-content-center align-items-center">
    <img src="{{ asset('asset/KRT.png') }}" alt="Your Logo" class="img-fluid mb-4" style="height: 250px;width: 250px;">
    <h1 class="display-4 text-center">Welcome to Your Website</h1>
    <p class="lead text-center">Some introductory text about your site.</p>
    <a href="#more" class="btn btn-primary">Start Here!</a>
</div>

@endsection