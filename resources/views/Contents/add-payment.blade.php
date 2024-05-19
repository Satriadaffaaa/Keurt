@extends('Layout.layoutd')

@section('Contents')

@include('Component.navbar')
@include('Component.sidebar')

<div class="container text-center">
    <div class="row align-items-start">
        <div class="col mt-3">
            <h3>Add Payment</h3>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row align-items-start">
        <div class="col mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">Description</label>
                        </div>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Add Title">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">Date</label>
                        </div>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Add Description">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">Amount</label>
                        </div>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="formFile" class="form-label">Default file input example</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>

                    <input class="btn btn-primary btn-lg w-100" type="submit" value="Submit">
                </div>
            </div>
        </div>
    </div>
</div>



@endsection