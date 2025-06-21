@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold"><i class="bi bi-pc-display-horizontal"></i>{{ __(' Add New Product') }}</h1>
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
                                        <select name="product" id="product" class="form-select @error('product') is-invalid @enderror"">
                                            <option value="">{{ __('Choose Product...') }}</option>
                                            <option value="Television" >Television</option>
                                            <option value="Mobile-Phones" >Mobile-Phones</option>
                                            <option value="Laptop" >Laptop</option>    
                                        </select>

                                        @error('product')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Brand Field -->
                               
                                       <div class="col-md-12">
                                        <label for="brand">{{ __('Brand') }}</label>
                                        <select name="brand" id="brand" class="form-select @error('brand') is-invalid @enderror">
                                            <option value="">{{ __('Choose Brand...') }}</option>
                                            <option value="Samsung" >Samsung</option>
                                            <option value="Huawei" >Huawei</option>
                                            <option value="Redmi" >Redmi</option>
                                            <option value="Vivo" >Vivo</option>
                                            <option value="i Phone" >i Phone</option>     
                                        </select>

                                        @error('brand')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                     <!-- Model Field -->
                               
                                       <div class="col-md-12">
                                        <label for="model">{{ __('Model') }}</label>
                                        <select name="model" id="model" class="form-select @error('model') is-invalid @enderror">
                                            <option value="">{{ __('Choose Model...') }}</option>
                                            <option value="S-20" >S-20</option>
                                            <option value="i-15" >i-15</option>
                                            <option value="note-7" >note-7</option>
                                            <option value="S-25" >S-25</option>
                                            <option value="i-16" >i-16</option>     
                                        </select>

                                        @error('model')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                               <!-- category Field -->
                               
                                       <div class="col-md-12 mt-3">
                                        <label for="category_id">{{ __('Cacategory') }}</label>
                                        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror"">
                                            <option value="">{{ __('Choose Category...') }}</option>
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
                                        <select name="supply_id" id="supply_id" class="form-select @error('supply_id') is-invalid @enderror"">
                                            <option value="">{{ __('Choose Supply...') }}</option>
                                            <option value="1">Abans</option>
                                            <option value="2">Panasonic</option>
                                            <option value="3" >Singer</option>
                                            <option value="4" >LG</option>     
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
                                    <option disabled {{ old('active') === null ? 'selected' : '' }}>{{ __('Choose Status...') }}</option>
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
                                <a href="{{ route('product') }}" class="btn btn-secondary">{{ __('Back') }}</a>
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