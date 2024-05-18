@extends('Layout.Layout')

@section('content')



<div class="container text-center mt-5">
    <div class="row align-items-start">
        <div class="col">
            <img src="{{ asset('asset/KRT.png') }}" alt="Your Logo" class="img-fluid mb-4" style="height: 250px;width: 250px;">
        </div>
        <div class="col">
            <h3>Login Here!</h3>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <input class="btn btn-primary btn-lg w-100" type="submit" value="Submit">
            <div class="mt-1 text-end">
                <p>Belum ada akun? <a href="register-page" style="text-decoration: none;">Daftar disini</a></p>
            </div>
        </div>
    </div>
</div>
@endsection