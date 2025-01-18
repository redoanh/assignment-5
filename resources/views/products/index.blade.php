@extends('layouts.app')

@section('content')
<div class="container p-5  rounded shadow" style="background-color:beige;">

    <h1 class="text-center text-gradient mb-4">Products</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <nav class="navbar navbar-expand-lg  shadow-sm py-2 mb-4" style="background-color: aquamarine;" >
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <form method="GET" action="{{ route('products.index') }}" class="d-flex align-items-center">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control form-control-sm me-2 rounded-pill" 
                    placeholder="Search for products..." 
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-light btn-sm text-primary fw-bold">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <a href="{{ route('products.create') }}" class="btn btn-light btn-sm text-success fw-bold rounded-pill">
                <i class="bi bi-plus-circle"></i> Add Product
            </a>
        </div>
    </nav>

    <div class="text-center my-3">
        <div class="btn-group">
            <a href="{{ route('products.index', ['sort_by' => 'name', 'order' => 'asc']) }}" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-sort-alpha-down"></i> Name (A-Z)
            </a>
            <a href="{{ route('products.index', ['sort_by' => 'name', 'order' => 'desc']) }}" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-sort-alpha-up"></i> Name (Z-A)
            </a>
            <a href="{{ route('products.index', ['sort_by' => 'price', 'order' => 'asc']) }}" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-cash-coin"></i> Price (Low to High)
            </a>
            <a href="{{ route('products.index', ['sort_by' => 'price', 'order' => 'desc']) }}" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-cash"></i> Price (High to Low)
            </a>
        </div>
    </div>

    <div class="table-responsive bg-white shadow-sm rounded-lg p-3">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-primary">
                <tr>
                    <th>Product ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
    @forelse($products as $product)
        <tr>
            <td>{{ $product->product_id }}</td>
            <td>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                     class="img-fluid rounded-circle border" style="max-width: 70px; height: 70px;">
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td> 
            <td>{{ $product->stock }}</td>
            <td>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm text-white me-1">
                    <i class="bi bi-eye"></i> View
                </a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm text-dark me-1">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center text-muted">No products found.</td>
        </tr>
    @endforelse
</tbody>

        </table>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>


@endsection
