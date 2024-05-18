@extends('Layout.Layout')

@section('content')

<div class="container vh-100 d-flex flex-column justify-content-center align-items-center">
    <img src="{{ asset('asset/KRT.png') }}" alt="Your Logo" class="img-fluid mb-4" style="height: 250px;width: 250px;">
    <h1 class="display-4 text-center">Asomasow</h1>
    <p class="lead text-center">LOGIN</p>
    <a href="#more" class="btn btn-primary">Start Here!</a>
</div>

@endsection