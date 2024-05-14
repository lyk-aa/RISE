@extends('layouts.owner_layout')

@section('title', 'Product Details')

@section('contents')
    <div class="container mt-4">
        <h1>{{ $product->rice_type }} ({{ $product->unit }} kg)</h1>
        <p>Unit Price: ${{ number_format($product->unit_price, 2) }} per kg</p>
        <p>Selling Price: ${{ number_format($product->selling_price, 2) }} per kg</p>
        <p>Target Level: {{ $product->target_level }}</p>
        <p>Re-order Level: {{ $product->reorder_level }}</p>
        <p>Discontinue: {{ $product->discontinue ? 'Yes' : 'No' }}</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products</a>
    </div>
@endsection
