@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm border-0 rounded-lg">
        <div class="card-header bg-primary text-white text-center rounded-top">
            <h3 class="mb-0">Product Details</h3>
        </div>
        <div class="card-body p-4">
            <div class="row g-4">
                <div class="col-lg-6">
                    <h5 class="text-primary mb-3">Product Information</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Product ID:</strong> {{ $product->product_id }}
                        </li>
                        <li class="list-group-item">
                            <strong>Name:</strong> {{ $product->name }}
                        </li>
                        <li class="list-group-item">
                            <strong>Description:</strong> 
                            <p class="text-muted mb-0">{{ $product->description }}</p>
                        </li>
                        <li class="list-group-item">
                            <strong>Price:</strong> ${{ number_format($product->price, 2) }}
                        </li>
                        <li class="list-group-item">
                            <strong>Stock:</strong> {{ $product->stock }}
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <h5 class="text-primary mb-3">Product Image</h5>
                        <img 
                            src="{{ asset('storage/' . $product->image) }}" 
                            alt="{{ $product->name }}" 
                            class="img-fluid rounded shadow-sm border" 
                            style="max-width: 100%; height: auto; object-fit: cover; max-height: 300px;"
                        >
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary btn-sm px-4 rounded-pill shadow-sm">
                    Back to Products
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
