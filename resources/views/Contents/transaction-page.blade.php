@extends('Layout.layoutd')


@section('Contents')

@include('Component.navbar')
@include('Component.sidebar')

<section class="content">
    <div class="container mt-5">
        <!-- TABLE: LATEST ORDERS -->
        <div class="row align-items-center">
            <div class="col d-flex justify-content-between">
                <h3 class="mt-3 ms-1">Transaksi</h3>
                <a href="add-transaction-page">
                    @auth
                    @if (auth()->user()->role == 'rt' || auth()->user()->role == 'bendahara')
                    <button type="button" class="btn btn-primary mt-3">Tambah Transaksi</button>
                    @endif
                    @endauth
                </a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th class="text-center">Transaksi</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Transaction as $transaksi)
                        <tr>
                            <td hidden>{{ $transaksi->id }}</td>
                            <td class="text-center">{{ $transaksi->transaction }}</td>
                            <td class="text-center">{{ $transaksi->date }}</td>
                            <td class="text-center">{{ $transaksi->amount }}</td>
                            <td class="text-center">
                                @auth
                                @if (auth()->user()->role == 'rt' || auth()->user()->role == 'bendahara')
                                <div class="btn-group">
                                    <a href="{{ url('edit-transaction-page/edit/'.$transaksi->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ url('dashboard-delete-transaction/'.$transaksi->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this transaction?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                                @endif
                                @endauth
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <!-- Pagination links -->
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo; Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next &raquo;</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-wallet"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Saldo</span>
                        <span class="info-box-number">
                            {{number_format ( $totalAmount,2) }}
                            <small>Rp</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill-alt"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pemasukan</span>
                        <span class="info-box-number">
                            {{ number_format($totalIncome, 2) }}
                            <small>Rp</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-piggy-bank"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pengeluaran</span>
                        <span class="info-box-number">
                            {{ number_format($totalExpenses, 2) }}

                            <small>Rp</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection