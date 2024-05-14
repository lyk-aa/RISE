@extends('layouts.owner_layout')

@section('title', 'Edit Product')

@section('contents')
    <div class="container mt-4">
        <h1>Edit Product</h1>

        <!-- Form for editing an existing product -->
        <form action="{{ route('owner.update', $product->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="rice_type" class="form-label">Rice Type:</label>
                <input type="text" id="rice_type" name="rice_type" class="form-control" value="{{ $product->rice_type }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="unit" class="form-label">Unit (kg):</label>
                <input type="number" id="unit" name="unit" class="form-control" value="{{ $product->unit }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="unit_price" class="form-label">Unit Price:</label>
                <input type="number" id="unit_price" name="unit_price" class="form-control"
                    value="{{ $product->unit_price }}" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="selling_price" class="form-label">Selling Price:</label>
                <input type="number" id="selling_price" name="selling_price" class="form-control"
                    value="{{ $product->selling_price }}" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="target_level" class="form-label">Target Level:</label>
                <input type="number" id="target_level" name="target_level" class="form-control"
                    value="{{ $product->target_level }}" required>
            </div>

            <div class="mb-3">
                <label for="reorder_level" class="form-label">Re-order Level:</label>
                <input type="number" id="reorder_level" name="reorder_level" class="form-control"
                    value="{{ $product->reorder_level }}" required>
            </div>

            <div class="mb-3">
                <label for="discontinue" class="form-label">Discontinue:</label>
                <select id="discontinue" name="discontinue" class="form-control" required>
                    <option value="0" {{ !$product->discontinue ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $product->discontinue ? 'selected' : '' }}>Yes</option>
                </select>
            </div>


            <button type="submit" class="btn btn-success">Update Product</button>
            <a href="{{ route('owner.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
