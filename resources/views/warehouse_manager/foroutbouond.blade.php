@extends('layouts.warehouse-manager_layout')

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">For Outbound</h5>
                        <h3 class="card-title">Scan Result</h3>
                        <form action="{{ route('warehouse') }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="quantity" class="col-sm-10 col-form-label">Quantity to Outbound</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-5">
                                    <form action="{{ route('warehouse') }}" method="post">
                                        <button type="submit" class="btn btn-primary">Cancel</button>
                                    </form>
                                </div>
                                <div class="col-sm-5">
                                    <form action="{{ route('warehouse') }}" method="post">
                                        <button type="submit" class="btn btn-primary">Outbound</button>
                                    </form>
                                </div>
                            </div>

                        </form>
                    @endsection
