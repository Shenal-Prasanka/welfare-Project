{{-- filepath: resources/views/admin/rank/edit_show.blade.php --}}
@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold"><i class="bi bi-tag-fill"></i>{{ __(' Edit Category') }}</h1>
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

                            <form method="POST" action="{{ route('category.update', $category->id) }}">
                             @csrf
                           <!-- category Field -->
                                <div class="col-md-12 mb-3">
                                    <label for="category">{{ __('Category') }}</label>
                                    <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
                                        <option value="">{{ __('Choose...') }}</option>
                                        <option value="Electric" {{ old('category', $category->category) == 'Electric' ? 'selected' : '' }}>Electric</option>
                                        <option value="Electronic" {{ old('category', $category->category) == 'Electronic' ? 'selected' : '' }}>Electronic</option>
                                        <option value="Furniture" {{ old('category', $category->category) == 'Furniture' ? 'selected' : '' }}>Furniture</option>
                                        
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Active Field -->
                                <div class="col-md-12 mb-3">
                                    <label for="active" class="form-label">{{ __('Status') }}</label>
                                    <select name="active" id="active" class="form-select @error('active') is-invalid @enderror">
                                        <option value="" disabled {{ old('active', $category->active) === null ? 'selected' : '' }}>{{ __('Choose...') }}</option>
                                        <option value="1" {{ old('active', $category->active) == '1' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="0" {{ old('active', $category->active) == '0' ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                    </select>
                                    @error('active')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Description Field -->
                                <div class="col-md-12 mb-3">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $category->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">{{ __('Update category') }}</button>
                                <a href="{{ route('category') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection