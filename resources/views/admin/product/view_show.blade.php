{{-- filepath: resources/views/admin/rank/view_show.blade.php --}}
@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold"><i class="bi bi-pc-display-horizontal"></i>{{ __(' View Product') }}</h1>
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
                            <div class="form-group">
                                <label>{{ __('Product') }}</label>
                               <select name="product" id="product" class="form-control" readonly>
                                            <option value="">{{ __('Choose...') }}</option>
                                            <option value="Television"{{ old('product', $product->product) == 'Television' ? 'selected' : '' }} >Television</option>
                                            <option value="Mobile-Phones" {{ old('product', $product->product) == 'Mobile-Phones' ? 'selected' : '' }}>Mobile-Phones</option>
                                            <option value="Laptop" {{ old('product', $product->product) == 'Laptop' ? 'selected' : '' }}>Laptop</option>    
                                        </select>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Category') }}</label>
                                 <select name="category_id" id="category_id" class="form-control" readonly>
                                            <option value="">{{ __('Choose...') }}</option>
                                            <option value="1" {{ old('category_id', $product->category_id ?? '') == 1 ? 'selected' : '' }}>Electric</option>
                                            <option value="2" {{ old('category_id', $product->category_id ?? '') == 2 ? 'selected' : '' }}>Electronic</option>
                                            <option value="3" {{ old('category_id', $product->category_id ?? '') == 3 ? 'selected' : '' }}>Furnitures</option>
                                        </select>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Supply') }}</label>
                                <select name="supply_id" id="supply_id" class="form-control" readonly>
                                            <option value="">{{ __('Choose...') }}</option>
                                            <option value="2" {{ old('supply_id', $product->supply_id ?? '') == '2' ? 'selected' : '' }}>Abans</option>
                                            <option value="3" {{ old('supply_id', $product->supply_id ?? '') == '3' ? 'selected' : '' }}>Panasonic</option>
                                            <option value="4" {{ old('supply_id', $product->supply_id ?? '') == '4' ? 'selected' : '' }}>Singer</option>
                                            <option value="6" {{ old('supply_id', $product->supply_id ?? '') == '6' ? 'selected' : '' }}>LG</option>
                                        </select>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Status') }}</label>
                                <input type="text" class="form-control" value="{{ $product->active ? __('Active') : __('Deactive') }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Created At') }}</label>
                                <input type="text" class="form-control" value="{{ $product->created_at }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Updated At') }}</label>
                                <input type="text" class="form-control" value="{{ $product->updated_at }}" readonly>
                            </div>
                            <a href="{{ route('product') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection