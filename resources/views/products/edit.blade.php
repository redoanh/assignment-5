@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <h3 class="text-center fw-bold mb-3" style="color: green;">Edit Product</h3>

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h6 class="fw-bold mb-2">Please fix the following errors:</h6>
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" class="p-3 border rounded-3 shadow-sm bg-white">
                @csrf
                @method('PUT')

                <table class="table table-borderless mb-3">
                    <tbody>

                        <tr>
                            <td class="fw-semibold text-secondary align-middle">Product ID</td>
                            <td>
                                <input 
                                    type="text" 
                                    class="form-control form-control-sm border-secondary rounded-3" 
                                    id="product_id" 
                                    name="product_id" 
                                    value="{{ $product->product_id }}" 
                                    required>
                            </td>
                        </tr>

                        <tr>
                            <td class="fw-bold text-secondary align-middle">Name</td>
                            <td>
                                <input 
                                    type="text" 
                                    class="form-control form-control-sm border-secondary rounded-3" 
                                    id="name" 
                                    name="name" 
                                    value="{{ $product->name }}" 
                                    required>
                            </td>
                        </tr>

                        <tr>
                            <td class="fw-bold text-secondary align-middle">Description</td>
                            <td>
                                <textarea 
                                    class="form-control form-control-sm border-secondary rounded-3" 
                                    id="description" 
                                    name="description" 
                                    rows="2" 
                                    placeholder="Enter product description">{{ $product->description }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="fw-bold text-secondary align-middle">Price</td>
                            <td>
                                <input 
                                    type="number" 
                                    class="form-control form-control-sm border-secondary rounded-3" 
                                    id="price" 
                                    name="price" 
                                    value="{{ $product->price }}" 
                                    required>
                            </td>
                        </tr>

                        <tr>
                            <td class="fw-bold text-secondary align-middle">Stock</td>
                            <td>
                                <input 
                                    type="number" 
                                    class="form-control form-control-sm border-secondary rounded-3" 
                                    id="stock" 
                                    name="stock" 
                                    value="{{ $product->stock }}">
                            </td>
                        </tr>

                        <tr>
                            <td class="fw-bold text-secondary align-middle">Image</td>
                            <td>
                                <input 
                                    type="file" 
                                    class="form-control form-control-sm border-secondary rounded-3" 
                                    id="image" 
                                    name="image">
                            </td>
                        </tr>

                        @if($product->image)
                            <tr>
                                <td class="fw-bold text-secondary align-middle">Current Image</td>
                                <td class="text-center">
                                    <img 
                                        src="{{ asset('storage/' . $product->image) }}" 
                                        alt="{{ $product->name }}" 
                                        class="img-fluid rounded shadow-sm border" 
                                        style="max-height: 120px;">
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success btn-sm px-3 rounded-pill shadow-sm">
                        <i class="bi bi-save"></i> Update
                    </button>
                    <a href="{{ route('products.index') }}" class="btn btn-danger btn-sm px-3 rounded-pill shadow-sm">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
