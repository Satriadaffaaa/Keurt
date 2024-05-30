@extends('Layout.layoutd')

@section('Contents')

@include('Component.navbar')
@include('Component.sidebar')

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
</div>

@endsection