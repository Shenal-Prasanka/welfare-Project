@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }
        .main-header, .main-footer {
            flex-shrink: 0;
        }
        .content-wrapper {
            flex: 1 1 auto;
            overflow-y: auto;
            padding: 15px;
            background-color: #f4f6f9;
            margin-left: 250px;
        }
        .main-footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
        }
        .main-sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            z-index: 1030;
            overflow-y: auto;
        }
    </style>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold"><i class="bi bi-backpack"></i>{{ __(' Add New Item') }}</h1>
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
                                    <select name="item" id="item" class="form-select  @error('item') is-invalid @enderror">
                                            <option value="" >{{ __('Choose Item...') }}</option>
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
                                    <select name="product_id" id="product_id" class="form-select  @error('product_id') is-invalid @enderror">
                                            <option value="">{{ __('Choose Product...') }}</option>
                                            <option value="1" >Television</option>
                                            <option value="3" >Mobile-Phones</option>
                                            <option value="4" >Laptop</option>    
                                        </select>
                                    @error('product_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- welfare Field -->
                               <div class="col-md-12 mt-3">
                                    <label for="welfare_id">{{ __('Welfare') }}</label>
                                    <select name="welfare_id" id="welfare_id" class="form-select  @error('welfare_id') is-invalid @enderror">
                                            <option disabled {{ old('welfare_id') === null ? 'selected' : '' }}>{{ __('Choose...') }}</option>
                                            <option value="1" {{ old('welfare_id') == '1' ? 'selected' : 'Colombo' }}>{{ __('colombo') }}</option>
                                            <option value="2" {{ old('welfare_id') == '2' ? 'selected' : 'kandy' }}>{{ __('kandy') }}</option>
                                            <option value="3" {{ old('welfare_id') == '3' ? 'selected' : 'Anuradhapura' }}>{{ __('Anuradhapura') }}</option>
                                            <option value="4" {{ old('welfare_id') == '4' ? 'selected' : 'Galle' }}>{{ __('Galle') }}</option>
                                            <option value="5" {{ old('welfare_id') == '5' ? 'selected' : 'Jaffna' }}>{{ __('Jaffna') }}</option>
                                            <option value="6" {{ old('welfare_id') == '6' ? 'selected' : 'Baticola' }}>{{ __('Baticola') }}</option>
                                            <option value="7" {{ old('welfare_id') == '7' ? 'selected' : 'Rathnapura' }}>{{ __('Rathnapura') }}</option>
                                            <option value="8" {{ old('welfare_id') == '8' ? 'selected' : 'Vavuniya' }}>{{ __('Vavuniya') }}</option>
                                            <option value="9" {{ old('welfare_id') == '9' ? 'selected' : 'Puttalam' }}>{{ __('Puttalam') }}</option>
                                            <option value="10" {{ old('welfare_id') == '10' ? 'selected' : 'Kurunegala' }}>{{ __('Kurunegala') }}</option>
                                            <option value="11" {{ old('welfare_id') == '11' ? 'selected' : 'Badulla' }}>{{ __('Badulla') }}</option>   
                                        </select>
                                    @error('welfare_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- serial_number Field -->
                               <div class="col-md-12 mt-3">
                                    <label for="serial_number">{{ __('Serial_number') }}</label>
                                    <input type="text" name="serial_number" id="serial_number" class="form-control  @error('serial_number') is-invalid @enderror" placeholder="{{ __('Enter Serial Number') }}" value="{{ old('serial_number') }}">
                                    @error('serial_number')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                 <!-- Price Field -->
                                <div class="col-md-12 mt-3">
                                    <label for="price">{{ __('Price(RS)') }}</label>
                                    <input type="text" name="price" id="price" class="form-control  @error('price') is-invalid @enderror" placeholder="{{ __('100 000') }}">
                                    @error('price')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- VAT Field -->
                                <div class="col-md-12 mt-3">
                                    <label for="vat">{{ __('VAT(%)') }}</label>
                                    <input type="text" name="vat" id="vat" class="form-control  @error('vat') is-invalid @enderror" placeholder="{{ __('10') }}">
                                    @error('vat')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tax Field -->
                                <div class="col-md-12 mt-3">
                                    <label for="tax">{{ __('TAX(%)') }}</label>
                                    <input type="text" name="tax" id="tax" class="form-control  @error('tax') is-invalid @enderror" placeholder="{{ __('5') }}">
                                    @error('tax')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Discount Field -->
                                <div class="col-md-12 mt-3">
                                    <label for="discount">{{ __('Discount(%)') }}</label>
                                    <input type="text" name="discount" id="discount" class="form-control  @error('discount') is-invalid @enderror" placeholder="{{ __('3') }}">
                                    @error('discount')
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
                                <a href="{{ route('item') }}" class="btn btn-secondary">{{ __('Back') }}</a>
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