@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold"><i class="bi bi-tag-fill"></i>{{ __(' Add New Category') }}</h1>
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
                            <form method="POST" action="{{ route('category.store') }}">
                                @csrf

                                <!-- category Field -->
                               
                                       <div class="col-md-12">
                                        <label for="category">{{ __('Category') }}</label>
                                        <select name="category" id="category" class="form-select @error('active') is-invalid @enderror">
                                            <option disabled {{ old('category') === null ? 'selected' : '' }}>{{ __('Choose Category...') }}</option>
                                            <option value="Electric" >Electric</option>
                                            <option value="Electronic" >Electronic</option>
                                            <option value="Furnitures" >Furnitures</option>    
                                        </select>

                                        @error('category')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>


                               
                                 <!-- Active Field -->
                            <div class="col-md-12 mt-3">
                                <label for="active" class="form-label">{{ __('Status') }}</label>
                                <select name="active" id="active"
                                    class="form-select @error('active') is-invalid @enderror" >
                                    <option disabled {{ old('active') === null ? 'selected' : '' }}>{{ __('Choose Status...') }}</option>
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
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Add your Description"></textarea>
                                    @error('description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Submit Button -->
                                <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">{{ __('Add Category') }}</button>
                                <a href="{{ route('category') }}" class="btn btn-secondary">{{ __('Back') }}</a>
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