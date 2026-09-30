@extends('layouts.app')

@section('title', 'My Product List')

@section('content')


    <div style="
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    ">

        <h2 style="margin: 0;">
            My Product List
        </h2>

        <a
            href="{{ route('products.create') }}"
            class="btn btn-primary"
        >
            + Add Product
        </a>

    </div>

    <div class="filter-section">

        <strong>Filter by name:</strong>

        @foreach ($products as $product)

            <a
                href="{{ route('products.index', ['name' => $product['name']]) }}"
                class="btn btn-secondary"
                style="margin: 2px;"
            >
                {{ $product['name'] }}
            </a>
        @endforeach

    </div>

    <div class="filter-section">

        <strong>Filter by stock:</strong>

        <a
            href="{{ route('products.index', ['stock' => 20]) }}"
            class="btn btn-secondary"
        >
            20+ stock
        </a>

    </div>

    <div style="margin-bottom: 20px;">

        <a
            href="{{ route('products.index') }}"
            class="btn btn-secondary"
        >
            Clear filters
        </a>

    </div>

    @if ($name)
        <p>Showing products matching: <strong>{{ $name }}</strong>  </p>

    @elseif ($stock !== null && $stock !== '')

        <p> Showing products with <strong>{{ $stock }}+ stock</strong>.  </p>

    @else

        <p> Showing all products.</p>

    @endif

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($products as $index => $product)
                <tr>
                    <td>    {{ $index + 1 }} </td>

                    <td>
                        {{ $product['id'] }}
                    </td>

                    <td>
                        <a
                            href="{{ route('products.show', $product['id']) }}"
                        >
                            {{ $product['name'] }}
                        </a>
                    </td>

                    <td>  ₱{{ number_format($product['price'], 2) }}  </td>
                    <td> {{ $product['stock'] }} </td>
                </tr>

            @empty

                <tr>
                    <td colspan="5"> No products found.  </td>
                </tr>

            @endforelse
        </tbody>
    </table>
@endsection
