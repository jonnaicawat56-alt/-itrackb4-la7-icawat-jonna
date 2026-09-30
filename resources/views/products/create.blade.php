@extends('layouts.app')

@section('title', 'Add Product')

@section('content')

    <div class="product-form">

        <h2>Add New Product</h2>

        <form action="{{ route('products.store') }}" method="POST">

            @csrf

            <!-- Product Name -->
            <div class="form-group">
                <label for="name">Product Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                >

                @error('name')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <!-- Price -->
            <div class="form-group">
                <label for="price">Price</label>

                <input
                    type="number"
                    id="price"
                    name="price"
                    value="{{ old('price') }}"
                    step="0.01"
                >

                @error('price')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <!-- Stock -->
            <div class="form-group">
                <label for="stock">Stock</label>

                <select id="stock" name="stock">

                    <option value="">
                        Select Stock
                    </option>

                    <option value="0" {{ old('stock') == '0' ? 'selected' : '' }}>
                        0
                    </option>

                    <option value="10" {{ old('stock') == '10' ? 'selected' : '' }}>
                        10
                    </option>

                    <option value="20" {{ old('stock') == '20' ? 'selected' : '' }}>
                        20
                    </option>

                    <option value="30" {{ old('stock') == '30' ? 'selected' : '' }}>
                        30
                    </option>

                    <option value="40" {{ old('stock') == '40' ? 'selected' : '' }}>
                        40
                    </option>

                    <option value="50" {{ old('stock') == '50' ? 'selected' : '' }}>
                        50
                    </option>

                </select>

                @error('stock')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <!-- Buttons -->
            <div class="form-buttons">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Add Product
                </button>

                <a
                    href="{{ route('products.index') }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

@endsection
