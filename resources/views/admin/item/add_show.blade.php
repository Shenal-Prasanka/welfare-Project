@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-semibold"><i class="bi bi-buildings-fill"></i>{{ __(' Add New Item') }}</h1>
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
                            <form method="POST" action="{{ route('item.store') }}">
                                @csrf

                                <!-- Item Field -->
                                <div class="col-md-12">
                                    <label for="item">{{ __('Item') }}</label>
                                    <select name="item" id="item" class="form-select">
                                            <option value="">{{ __('Choose...') }}</option>
                                            <option value="Samsung s30" >Samsung s30</option>
                                            <option value="iphone 13" >iphone 13</option>
                                            <option value="Redmi 6c" >Redmi 6c</option>    
                                        </select>
                                    @error('item')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                             <!-- product Field -->
                               <div class="col-md-12 mt-3">
                                    <label for="product_id">{{ __('Product') }}</label>
                                    <select name="product_id" id="product_id" class="form-select">
                                            <option value="">{{ __('Choose...') }}</option>
                                            <option value="1" >Television</option>
                                            <option value="3" >Mobile-Phones</option>
                                            <option value="4" >Laptop</option>    
                                        </select>
                                    @error('product_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- serial_number Field -->
                               <div class="col-md-12 mt-3">
                                    <label for="serial_number">{{ __('Serial_number') }}</label>
                                    <input type="text" name="serial_number" id="serial_number" class="form-control">
                                    @error('serial_number')
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
                                <button type="submit" class="btn btn-primary">{{ __('Add Item') }}</button>
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