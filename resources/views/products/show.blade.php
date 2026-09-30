@extends('layouts.app')

@section('title', 'Product Details')

@section('content')

<div class="container">

    <h2>Product Details</h2>

    <div class="card mt-4">

        <div class="card-body">

            <p>
                <strong>ID:</strong>
                {{ $product['id'] }}
            </p>

            <p>
                <strong>Name:</strong>
                {{ $product['name'] }}
            </p>

            <p>
                <strong>Price:</strong>
                ₱{{ number_format($product['price'], 2) }}
            </p>

            <p>
                <strong>Stock:</strong>
                {{ $product['stock'] }}
            </p>

            <a
                href="{{ route('products.index') }}"
                class="btn btn-secondary"
            >
                Back to Products
            </a>

        </div>

    </div>

</div>

@endsection
