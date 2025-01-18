@extends('layouts.app')

@section('content')
<div class="container my-5 p-4 bg-white rounded shadow-lg" style="max-width: 500px;">
    <h3 class="text-center mb-4 text-primary font-weight-bold">Create Product</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label text-dark">Product Name</label>
            <input type="text" class="form-control p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400" id="name" name="name" value="{{ old('name') }}" required placeholder="Enter product name">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label text-dark">Product Description</label>
            <textarea class="form-control p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400" id="description" name="description" rows="4" placeholder="Provide a detailed description">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label text-dark">Price</label>
            <input type="number" class="form-control p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400" id="price" name="price" value="{{ old('price') }}" required placeholder="Enter product price">
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label text-dark">Stock</label>
            <input type="number" class="form-control p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400" id="stock" name="stock" value="{{ old('stock') }}" placeholder="Enter stock quantity">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label text-dark">Product Image</label>
            <input type="file" class="form-control p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400" id="image" name="image" required>
            <small class="form-text text-muted">Upload an image for the product (max. size: 5MB)</small>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary w-100 py-2 px-4 rounded-lg shadow-lg hover:bg-blue-600 transition duration-300 ease-in-out">Create Product</button>
        </div>
    </form>
</div>
@endsection
