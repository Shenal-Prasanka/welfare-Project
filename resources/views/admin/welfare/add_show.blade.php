@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold"><i class="bi bi-bag-check-fill"></i>{{ __(' Add New WelfareShop') }}</h1>
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
                            
                            <form method="POST" action="{{ route('welfare.store') }}">
                                @csrf

                                <!-- Name Field -->
                                <div class="form-group">
                                    <label for="rank">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" placeholder="{{ __('Enter Welfareshop Name') }}"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Active Field -->
                                <div class="form-group">
                                     <label for="active" class="form-label">{{ __('Status') }}</label>
                                <select name="active" id="active"
                                    class="form-select @error('active') is-invalid @enderror">
                                    <option disabled {{ old('active') === null ? 'selected' : '' }}>{{ __('Choose Status') }}</option>
                                    <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                    <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                </select>
                                @error('active')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">{{ __('Add Welfareshop') }}</button>
                                <a href="{{ route('welfare') }}" class="btn btn-secondary">{{ __('Back') }}</a>
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