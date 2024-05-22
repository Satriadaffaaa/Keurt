@extends('Layout.Layout')

@section('content')
<div class="container text-center mt-5">
    <div class="row align-items-start">
        <div class="col">
            <img src="{{ asset('asset/KRT.png') }}" alt="Your Logo" class="img-fluid mb-4"
                style="height: 250px;width: 250px;">
        </div>
        <div class="col">
            <h3>Login Here!</h3>

            {{-- Tampilan pesan kesalahan --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                    <div>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="name@example.com" value="{{ old('email') }}" required
                            autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <div>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100">
                    Login
                </button>
            </form>
            <div class="mt-1 text-end">
                <p>Belum ada akun? <a href="{{ route('register') }}" style="text-decoration: none;">Daftar disini</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
@endpush