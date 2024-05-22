@extends('Layout.layoutd')

@section('Contents')

@include('Component.navbar')
@include('Component.sidebar')


<section class="content">
    <!-- <div class="container text-center mt-3"> -->
        <div class="row align-items-center">
            <div class="col d-flex justify-content-between">
                <h3 class="mt-3 ms-1">Payment</h3>
                <a href="add-payment">
                    <button type="button" class="btn btn-primary mt-3">Add Payment</button>
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
                            <th>Description</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Iuran Warga</td>
                            <td>02-02-2022</td>
                            <td>Rp. 50.000</td>
                            <td>asomasow</td>
                            <td>
                                <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                            </td>
                        </tr>


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