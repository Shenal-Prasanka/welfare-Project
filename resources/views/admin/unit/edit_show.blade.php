{{-- filepath: resources/views/admin/rank/edit_show.blade.php --}}
@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold"><i class="bi bi-buildings-fill"></i>{{ __(' Edit Unit') }}</h1>
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

                            <form method="POST" action="{{ route('unit.update', $unit->id) }}">
                                @csrf

                                <!-- Rank Field -->
                                <div class="form-group">
                                    <label for="rank">{{ __('Unit') }}</label>
                                    <input type="text" name="unit" id="unit" class="form-control" value="{{ old('unit', $unit->unit) }}">
                                     @error('unit')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                 <!-- regement Field -->
                                    <div class="form-group">
                                        <label for="regement_id">{{ __('Regement') }}</label>
                                        <select name="regement_id" id="regement_id" class="form-control">
                                            <option value="">{{ __('Select Regement') }}</option>
                                            <option value="1" {{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka Armoured Corps</option>
                                            <option value="2"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka Artillery</option>
                                            <option value="3"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka Engineers</option>
                                            <option value="4"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka Signals Corps</option>
                                            <option value="5"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka Light Infantry</option>
                                            <option value="6"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka Sinha Regiment</option>
                                            <option value="7"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Gemunu Watch</option>
                                            <option value="8"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Gajaba Regiment</option>
                                            <option value="9"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Vijayabahu Infantry Regiment</option>
                                            <option value="10"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Mechanized Infantry Regiment</option>
                                            <option value="11"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Commando Regiment</option>
                                            <option value="12"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Special Forces Regiment</option>
                                            <option value="13"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Military Intelligence Corps</option>
                                            <option value="14"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Engineer Services Regiment</option>
                                            <option value="15"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka Army Service Corps</option>
                                            <option value="16"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka Army Medical Corps</option>
                                            <option value="17"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka Army Ordnance Corps</option>
                                            <option value="18"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka Electrical and Mechanical Engineers</option>
                                            <option value="19"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka Corps of Military Police</option>
                                            <option value="20"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka Army General Service Corps</option>
                                            <option value="21"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka Army Women's Corps</option>
                                            <option value="22"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka Army Corps of Agriculture and Livestock</option>
                                            <option value="23"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka Rifle Corps</option>
                                            <option value="24"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka Army Pioneer Corps</option>
                                            <option value="25"{{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka National Guard</option>
                                        </select>
                                         @error('regement_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    </div>

                                   <!-- Active Field -->
                                <div class="form-group">
                                    <label for="active">{{ __('Status') }}</label>
                                    <select name="active" id="active" class="form-control">
                                        <option value="1" {{ $unit->active ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="0" {{ !$unit->active ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                    </select>
                                     @error('active')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Show Updated At (read-only) -->
                                <div class="form-group">
                                    <label>{{ __('Last Updated At') }}</label>
                                    <input type="text" class="form-control" 
                                        value="{{ $unit->updated_at->timezone('Asia/Colombo')->format('Y-m-d h:i:s A') }}" readonly>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">{{ __('Update Unit') }}</button>
                                 <a href="{{ route('unit') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection