{{-- filepath: resources/views/admin/rank/edit_show.blade.php --}}
@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-semibold"><i class="bi bi-buildings-fill"></i>{{ __(' Edit Product') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            {{-- Success Alert --}}
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('product.update', $product->id) }}">
                                @csrf

                                <!-- Product Field -->
                                <div class="col-md-12">
                                        <label for="Product">{{ __('Product') }}</label>
                                        <select name="product" id="product" class="form-control">
                                            <option value="">{{ __('Choose...') }}</option>
                                            <option value="Television"{{ old('product', $product->product) == 'Television' ? 'selected' : '' }} >Television</option>
                                            <option value="Mobile-Phones" {{ old('product', $product->product) == 'Mobile-Phones' ? 'selected' : '' }}>Mobile-Phones</option>
                                            <option value="Laptop" {{ old('product', $product->product) == 'Laptop' ? 'selected' : '' }}>Laptop</option>    
                                        </select>

                                        @error('product')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                 <!-- Category Field -->
                                    <div class="col-md-12 mt-3">
                                        <label for="category_id">{{ __('Category') }}</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">{{ __('Choose...') }}</option>
                                            <option value="1" {{ old('category_id', $product->category_id ?? '') == 1 ? 'selected' : '' }}>Electric</option>
                                            <option value="2" {{ old('category_id', $product->category_id ?? '') == 2 ? 'selected' : '' }}>Electronic</option>
                                            <option value="3" {{ old('category_id', $product->category_id ?? '') == 3 ? 'selected' : '' }}>Furnitures</option>
                                        </select>

                                        @error('category_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Supply Field -->
                                    <div class="col-md-12 mt-3">
                                        <label for="supply_id">{{ __('Supplier') }}</label>
                                        <select name="supply_id" id="supply_id" class="form-control">
                                            <option value="">{{ __('Choose...') }}</option>
                                            <option value="2" {{ old('supply_id', $product->supply_id ?? '') == '2' ? 'selected' : '' }}>Abans</option>
                                            <option value="3" {{ old('supply_id', $product->supply_id ?? '') == '3' ? 'selected' : '' }}>Panasonic</option>
                                            <option value="4" {{ old('supply_id', $product->supply_id ?? '') == '4' ? 'selected' : '' }}>Singer</option>
                                            <option value="6" {{ old('supply_id', $product->supply_id ?? '') == '6' ? 'selected' : '' }}>LG</option>
                                        </select>

                                        @error('supply_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                   <!-- Active Field -->
                                 <div class="col-md-12 mt-3">
                                    <label for="active">{{ __('Status') }}</label>
                                    <select name="active" id="active" class="form-control">
                                        <option value="1" {{ $product->active ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="0" {{ !$product->active ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                    </select>
                                     @error('active')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Show Updated At (read-only) -->
                                 <div class="col-md-12 mt-3">
                                    <label>{{ __('Last Updated At') }}</label>
                                    <input type="text" class="form-control" 
                                        value="{{ $product->updated_at->timezone('Asia/Colombo')->format('Y-m-d h:i:s A') }}" readonly>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">{{ __('Update Product') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection