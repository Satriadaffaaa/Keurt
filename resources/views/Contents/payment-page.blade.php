@extends('Layout.layoutd')

@section('Contents')

@include('Component.navbar')
@include('Component.sidebar')


<section class="content">
    <!-- <div class="container text-center mt-3"> -->
    <div class="row align-items-center">
        <div class="col d-flex justify-content-between">
            <h3 class="mt-3 ms-1">Pembayaran</h3>
            <a href="add-payment-page">
                <button type="button" class="btn btn-primary mt-3">Tambah Pembayaran</button>
            </a>
        </div>
    </div>
    <!-- </div> -->
</section>

<!-- TABLE: LATEST ORDERS -->
<section class="content">
    <!-- <div class="container"> -->
    <div class="card mt-3">
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th class="text-center">Description</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Bukti Pembayaran</th>

                            @auth
                                @if (auth()->user()->role == 'rt' || auth()->user()->role == 'bendahara')

                                    <th class="text-center">Pengirim</th>
                                @endif
                            @endauth
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <td hidden>{{ $payment->id }}</td>
                                <td class="text-center">{{ $payment->description }}</td>
                                <td class="text-center">{{ $payment->date }}</td>
                                <td class="text-center">{{ $payment->amount }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#imageModal{{$payment->id}}">
                                        Lihat Bukti
                                    </button>
                                </td>
                                @auth
                                    @if (auth()->user()->role == 'rt' || auth()->user()->role == 'bendahara')

                                        <td class="text-center">{{ $payment->user->name }}</td>

                                    @endif
                                @endauth
                                <td>
                                    <div class="btn-group">
                                        @if(Auth::id() === $payment->user_id)
                                            <a href="{{ url('edit-payment-page/edit/' . $payment->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ url('dashboard-delete-payment/' . $payment->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this transaction?')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>

                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="imageModal{{$payment->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="imageModalLabel{{$payment->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel{{$payment->id}}">Bukti Pembayaran
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ Storage::url($payment->image) }}" class="img-fluid"
                                                alt="Payment Image">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- End Modal -->

                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
    </div>

    <!-- </div> -->
</section>

@endsection