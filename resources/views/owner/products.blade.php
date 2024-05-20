@extends('layouts.owner_layout')

@section('title', 'Products')

@section('contents')
    <div class="d-flex flex-column">
        <div class="d-flex justify-content-between">
            <a href="{{ route('owner.create') }}" class="btn btn-primary">Add Products</a>
        </div>
    </div>
    <div></div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List of Products</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Rice type</th>
                                    <th>Unit</th>
                                    <th>Unit Price</th>
                                    <th>Selling Price</th>
                                    <th>Target level</th>
                                    <th>Re-order level</th>
                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->rice_type }}</td>
                                        <td>{{ $product->unit }}</td>
                                        <td>{{ $product->unit_price }}</td>
                                        <td>{{ $product->selling_price }}</td>
                                        <td>{{ $product->target_level }}</td>
                                        <td>{{ $product->reorder_level }}</td>
                                        {{-- <a href="{{ route('owner.show', $product->id) }}" class="btn">View</a>
                                        <a href="{{ route('owner.edit', $product->id) }}" class="btn">Edit</a>
                                        <form action="{{ route('owner.products.destroy', $product->id) }}" method="post"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn">Delete</button> --}}

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
