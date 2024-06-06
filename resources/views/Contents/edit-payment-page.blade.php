@extends('Layout.layoutd')

@section('Contents')

@include('Component.navbar')
@include('Component.sidebar')

<div class="container text-center">
    <div class="row align-items-start">
        <div class="col mt-3">
            <h3>Edit Pembayaran</h3>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row align-items-start">
        <div class="col mt-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('edit-payment-page/' . $payment->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="description" class="form-label">Deskripsi</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="Tambah Pembayaran" value="{{$payment->description}}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="date" class="form-label">Tanggal</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" class="form-control" id="date" name="date" value="{{$payment->date}}"
                                    required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="amount" class="form-label">Jumlah</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="amount" name="amount"
                                    placeholder="Tambahkan Jumlah" value="{{$payment->amount}}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="image" class="form-label">Bukti</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" class="form-control" id="image" name="image"
                                    value="{{$payment->image}}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Edit Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection