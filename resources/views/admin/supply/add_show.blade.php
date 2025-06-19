@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-semibold"><i class="bi bi-star-fill"></i>{{ __(' Add New Supplier') }}</h1>
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
                            <form method="POST" action="{{ route('supply.store') }}">
                                @csrf

                                <!-- Supply Field -->
                                <div class="col-md-12">
                                        <label for="supply">{{ __('Supplier') }}</label>
                                        <select name="supply" id="supply" class="form-select @error('active') is-invalid @enderror">
                                            <option value="">{{ __('Choose...') }}</option>
                                            <option value="Abans" >Abans</option>
                                            <option value="Panasonic" >Panasonic</option>
                                            <option value="Singer" >Singer</option> 
                                            <option value="LG" >LG</option>    
                                        </select>

                                        @error('supply')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>


                               
                                 <!-- Active Field -->
                            <div class="col-md-12 mt-3">
                                <label for="active" class="form-label">{{ __('Status') }}</label>
                                <select name="active" id="active"
                                    class="form-select @error('active') is-invalid @enderror" >
                                    <option disabled {{ old('active') === null ? 'selected' : '' }}>{{ __('Choose...') }}</option>
                                    <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                    <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                </select>
                                @error('active')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @else
                                @enderror
                            </div>

                            <!-- Description Field -->
                                <div class="col-md-12 mt-3">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3"></textarea>
                                    @error('description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Submit Button -->
                                <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">{{ __('Add Supplier') }}</button>
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