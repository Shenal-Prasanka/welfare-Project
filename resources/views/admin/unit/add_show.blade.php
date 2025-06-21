@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold"><i class="bi bi-buildings-fill"></i>{{ __(' Add New Unit') }}</h1>
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
                            <form method="POST" action="{{ route('unit.store') }}">
                                @csrf

                                <!-- Rank Field -->
                                <div class="form-group">
                                    <label for="unit">{{ __('Unit') }}</label>
                                    <input type="text" name="unit" id="unit" class="form-control  @error('unit') is-invalid @enderror" placeholder="{{ __('Enter Unit Name') }}"
                                        value="{{ old('unit') }}">
                                    @error('unit')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- regement Field -->
                                    <div class="form-group">
                                        <label for="regement_id">{{ __('Regement') }}</label>
                                        <select name="regement_id" id="regement_id" class="form-select @error('regement_id') is-invalid @enderror">
                                            <option value="">{{ __('Select Regement....') }}</option>
                                            <option value="1">Sri Lanka Armoured Corps</option>
                                            <option value="2">Sri Lanka Artillery</option>
                                            <option value="3">Sri Lanka Engineers</option>
                                            <option value="4">Sri Lanka Signals Corps</option>
                                            <option value="5">Sri Lanka Light Infantry</option>
                                            <option value="6">Sri Lanka Sinha Regiment</option>
                                            <option value="7">Gemunu Watch</option>
                                            <option value="8">Gajaba Regiment</option>
                                            <option value="9">Vijayabahu Infantry Regiment</option>
                                            <option value="10">Mechanized Infantry Regiment</option>
                                            <option value="11">Commando Regiment</option>
                                            <option value="12">Special Forces Regiment</option>
                                            <option value="13">Military Intelligence Corps</option>
                                            <option value="14">Engineer Services Regiment</option>
                                            <option value="15">Sri Lanka Army Service Corps</option>
                                            <option value="16">Sri Lanka Army Medical Corps</option>
                                            <option value="17">Sri Lanka Army Ordnance Corps</option>
                                            <option value="18">Sri Lanka Electrical and Mechanical Engineers</option>
                                            <option value="19">Sri Lanka Corps of Military Police</option>
                                            <option value="20">Sri Lanka Army General Service Corps</option>
                                            <option value="21">Sri Lanka Army Women's Corps</option>
                                            <option value="22">Sri Lanka Army Corps of Agriculture and Livestock</option>
                                            <option value="23">Sri Lanka Rifle Corps</option>
                                            <option value="24">Sri Lanka Army Pioneer Corps</option>
                                            <option value="25">Sri Lanka National Guard</option>
                                        </select>
                                        @error('regement_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    </div>
                                <!-- Active Field -->
                                <div class="form-group">
                                     <label for="active" class="form-label">{{ __('Status') }}</label>
                                <select name="active" id="active"
                                    class="form-select @error('active') is-invalid @enderror">
                                    <option disabled {{ old('active') === null ? 'selected' : '' }}>{{ __('Select status...') }}</option>
                                    <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                    <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                </select>
                                @error('active')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">{{ __('Add Unit') }}</button>
                                <a href="{{ route('unit') }}" class="btn btn-secondary">{{ __('Back') }}</a>
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