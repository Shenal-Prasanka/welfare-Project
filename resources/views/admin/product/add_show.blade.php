@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-semibold"><i class="bi bi-buildings-fill"></i>{{ __(' Add New Product') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('product.store') }}">
                                @csrf

                                 <!-- product Field -->
                               
                                       <div class="col-md-12">
                                        <label for="Product">{{ __('Product') }}</label>
                                        <select name="product" id="product" class="form-select">
                                            <option value="">{{ __('Choose...') }}</option>
                                            <option value="Television" >Television</option>
                                            <option value="Mobile-Phones" >Mobile-Phones</option>
                                            <option value="Laptop" >Laptop</option>    
                                        </select>

                                        @error('product')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                               <!-- category Field -->
                               
                                       <div class="col-md-12 mt-3">
                                        <label for="category_id">{{ __('Cacategory') }}</label>
                                        <select name="category_id" id="category_id" class="form-select">
                                            <option value="">{{ __('Choose...') }}</option>
                                            <option value="1">Electric</option>
                                            <option value="2" >Electronic</option>
                                            <option value="3" >Furnitures</option>    
                                        </select>

                                        @error('category_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                <!-- Supply Field -->
                                <div class="col-md-12 mt-3">
                                        <label for="supply_id">{{ __('Supplier') }}</label>
                                        <select name="supply_id" id="supply_id" class="form-select">
                                            <option value="">{{ __('Choose...') }}</option>
                                            <option value="2">Abans</option>
                                            <option value="3">Panasonic</option>
                                            <option value="4" >Singer</option>
                                            <option value="6" >LG</option>     
                                        </select>

                                        @error('supply_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                <!-- Active Field -->
                                 <div class="col-md-12 mt-3">
                                     <label for="active" class="form-label">{{ __('Status') }}</label>
                                <select name="active" id="active"
                                    class="form-select @error('active') is-invalid @enderror">
                                    <option disabled {{ old('active') === null ? 'selected' : '' }}>{{ __('Choose...') }}</option>
                                    <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                    <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                </select>
                                @error('active')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                </div>

                                <!-- Submit Button -->
                                 <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">{{ __('Add Product') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection