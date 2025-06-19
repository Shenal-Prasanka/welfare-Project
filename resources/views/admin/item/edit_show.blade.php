{{-- filepath: resources/views/admin/rank/edit_show.blade.php --}}
@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-semibold"><i class="bi bi-buildings-fill"></i>{{ __(' Edit Item') }}</h1>
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

                            <form method="POST" action="{{ route('item.update', $item->id) }}">
                                @csrf

                                <!-- Item Field -->
                                <div class="form-group">
                                    <label for="item">{{ __('Item') }}</label>
                                    <select name="item" id="item" class="form-control">
                                            <option value="">{{ __('Choose...') }}</option>
                                            <option value="Samsung s30" {{ old('item', $item->item) == 'Samsung s30' ? 'selected' : '' }}>Samsung s30</option>
                                            <option value="iphone 13" {{ old('item', $item->item) == 'iphone 13' ? 'selected' : '' }} >iphone 13</option>
                                            <option value="Redmi 6c" {{ old('item', $item->item) == 'Redmi 6c' ? 'selected' : '' }} >Redmi 6c</option>    
                                        </select>
                                     @error('item')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                 <!-- product Field -->
                                    <div class="form-group">
                                        <label for="product_id">{{ __('Product') }}</label>
                                         <select name="product_id" id="product_id" class="form-control">
                                            <option value="">{{ __('Choose...') }}</option>
                                            <option value="1" {{ old('product_id', $item->product_id) == '1' ? 'selected' : '' }}>Television</option>
                                            <option value="3" {{ old('product_id', $item->product_id) == '3' ? 'selected' : '' }}>Mobile-Phones</option>
                                            <option value="4" {{ old('product_id', $item->product_id) == '4' ? 'selected' : '' }}>Laptop</option>    
                                        </select> 
                                         @error('product_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    </div>

                                     <!-- serial_number Field -->
                               <div class="col-md-12">
                                    <label for="serial_number">{{ __('Serial_number') }}</label>
                                    <input type="text" name="serial_number" id="serial_number" class="form-control" value="{{ $item->serial_number }}" readonly>
                                    @error('serial_number')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                   <!-- Active Field -->
                                <div class="form-group">
                                    <label for="active">{{ __('Status') }}</label>
                                    <select name="active" id="active" class="form-control">
                                        <option value="1" {{ $item->active ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="0" {{ !$item->active ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                    </select>
                                     @error('active')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Show Updated At (read-only) -->
                                <div class="form-group">
                                    <label>{{ __('Last Updated At') }}</label>
                                    <input type="text" class="form-control" 
                                        value="{{ $item->updated_at->timezone('Asia/Colombo')->format('Y-m-d h:i:s A') }}" readonly>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">{{ __('Update Item') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection