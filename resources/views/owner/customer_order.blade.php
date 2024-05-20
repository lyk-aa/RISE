@extends('layouts.owner_layout')


@section('title', 'Products')

@section('contents')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Rice Type</th>
                                <th>Quantity</th>
                                <th>Re-order Point</th>
                                <th>Target Level</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01/15/2024</td>
                                <td>Sinandomeng</td>
                                <td>150</td>
                                <td>50</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>01/15/2024</td>
                                <td>Princess Blue</td>
                                <td>150</td>
                                <td>50</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>01/15/2024</td>
                                <td>Jasmine Blue</td>
                                <td>150</td>
                                <td>50</td>
                                <td>300</td>
                            </tr>

                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
@endsection
