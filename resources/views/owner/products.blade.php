@extends('layouts.owner_layout')
@section('title', 'Products')

@section('contents')

    <div class="d-flex flex-column">

        <div class="d-flex justify-content-between">
            <a href="{{ route('owner.create') }}" class="btn btn-primary">Add Products</a>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datatables</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>
                                        <b>N</b>ame
                                    </th>
                                    <th>Ext.</th>
                                    <th>City</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                                    <th>Completion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Unity Pugh</td>
                                    <td>9958</td>
                                    <td>Curicó</td>
                                    <td>2005/02/11</td>
                                    <td>37%</td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
