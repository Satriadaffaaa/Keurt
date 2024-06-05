@extends('Layout.layoutd')

@section('Contents')

@include('Component.navbar')
@include('Component.sidebar')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Overview</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
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
                </div>
            </div>
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
                </div>
            </div>
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
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>
    <div class="container mt-5">
        <!-- TABLE: LATEST ORDERS -->
        <div class="row align-items-center">
            <div class="col d-flex justify-content-between">
                <h3 class="mt-3 ms-1">Transaksi</h3>
                <div class="d-flex">
                    <a href="{{ route('add-transaction-page') }}" class="btn btn-primary mt-3 me-3">Add Transaction</a>
                    <a href="{{ route('pdf.generate') }}" class="btn btn-link mt-3" style="color: #4CAF50; text-decoration: none;">
                        <i class="far fa-file-pdf" style="margin-right: 5px;"></i> Download Transaksi
                    </a>


                </div>
            </div>
        </div>
        <!-- Row Count Control -->
        <div class="row mt-3">
            <div class="col">
                <label for="rowCount">Show Rows:</label>
                <select id="rowCount" class="form-control w-auto d-inline">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="All">All</option>
                </select>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0 mt-3">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th class="text-center column-transaction">Transaksi</th>
                            <th class="text-center column-date">Tanggal</th>
                            <th class="text-center column-amount">Saldo</th>
                            <th class="text-center column-action">Action</th>
                        </tr>
                    </thead>
                    <tbody id="transactionTable">
                        @foreach($Transaction as $transaction)
                        <tr>
                            <td hidden>{{ $transaction->id }}</td>
                            <td class="text-center column-transaction">{{ $transaction->transaction }}</td>
                            <td class="text-center column-date">{{ $transaction->date }}</td>
                            <td class="text-center column-amount">{{ $transaction->amount }}</td>
                            <td class="text-center column-action">
                                <div class="btn-group">
                                    <a href="{{ url('edit-transaction-page/edit/'.$transaction->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ url('dashboard-delete-transaction/'.$transaction->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this transaction?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
    </div>


    @endsection