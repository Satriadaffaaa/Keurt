@extends('Layout.Layout')

@section('content')

<div class="container vh-100 d-flex flex-column justify-content-center align-items-center">
    <img src="{{ asset('asset/krt-black.png') }}" alt="Your Logo" class="img-fluid mb-4"
        style="height: 250px;width: 250px;">
    <h1 class="display-4 text-center">Selamat Datang Di KeuRTa</h1>
    <p class="lead text-center">Aplikasi manajemen keuangan rumah tangga adalah alat penting untuk memastikan kestabilan
        finansial keluarga, memungkinkan pengelolaan pemasukan, pengeluaran, tabungan, dan investasi secara efisien.
        Dengan fitur canggih dan antarmuka user-friendly, aplikasi ini membantu melacak keuangan real-time, membuat
        anggaran terperinci, serta memberikan laporan dan analisis untuk keputusan yang tepat, sehingga menghindari
        hutang tidak perlu dan membangun masa depan finansial yang aman.</p>
    <a href="login-page" class="btn btn-primary">Klik Untuk Memulai!</a>
</div>

@endsection