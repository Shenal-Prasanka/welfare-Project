{{-- filepath: resources/views/admin/rank/view_show.blade.php --}}
@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-semibold"><i class="bi bi-buildings-fill"></i>{{ __(' View Unit') }}</h1>
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
                            <div class="form-group">
                                <label>{{ __('Unit') }}</label>
                                <input type="text" class="form-control" value="{{ $unit->unit }}" readonly>
                            </div>
                             <!-- regement Field -->
                                    <div class="form-group">
                                        <label for="regement_id">{{ __('Regement') }}</label>
                                        <select name="regement_id" id="regement_id" class="form-control" readonly>
                                            <option value="">{{ __('Select Regement') }}</option>
                                            <option value="1" {{ old('regement_id', $unit->regement_id ?? '') == 1 ? 'selected' : '' }}>Sri Lanka Armoured Corps</option>
                                            <option value="2"{{ old('regement_id', $unit->regement_id ?? '') == 2 ? 'selected' : '' }}>Sri Lanka Artillery</option>
                                            <option value="3"{{ old('regement_id', $unit->regement_id ?? '') == 3 ? 'selected' : '' }}>Sri Lanka Engineers</option>
                                            <option value="4"{{ old('regement_id', $unit->regement_id ?? '') == 4 ? 'selected' : '' }}>Sri Lanka Signals Corps</option>
                                            <option value="5"{{ old('regement_id', $unit->regement_id ?? '') == 5 ? 'selected' : '' }}>Sri Lanka Light Infantry</option>
                                            <option value="6"{{ old('regement_id', $unit->regement_id ?? '') == 6 ? 'selected' : '' }}>Sri Lanka Sinha Regiment</option>
                                            <option value="7"{{ old('regement_id', $unit->regement_id ?? '') == 7 ? 'selected' : '' }}>Gemunu Watch</option>
                                            <option value="8"{{ old('regement_id', $unit->regement_id ?? '') == 8 ? 'selected' : '' }}>Gajaba Regiment</option>
                                            <option value="9"{{ old('regement_id', $unit->regement_id ?? '') == 9 ? 'selected' : '' }}>Vijayabahu Infantry Regiment</option>
                                            <option value="10"{{ old('regement_id', $unit->regement_id ?? '') == 10 ? 'selected' : '' }}>Mechanized Infantry Regiment</option>
                                            <option value="11"{{ old('regement_id', $unit->regement_id ?? '') == 11 ? 'selected' : '' }}>Commando Regiment</option>
                                            <option value="12"{{ old('regement_id', $unit->regement_id ?? '') == 12 ? 'selected' : '' }}>Special Forces Regiment</option>
                                            <option value="13"{{ old('regement_id', $unit->regement_id ?? '') == 13 ? 'selected' : '' }}>Military Intelligence Corps</option>
                                            <option value="14"{{ old('regement_id', $unit->regement_id ?? '') == 14 ? 'selected' : '' }}>Engineer Services Regiment</option>
                                            <option value="15"{{ old('regement_id', $unit->regement_id ?? '') == 15 ? 'selected' : '' }}>Sri Lanka Army Service Corps</option>
                                            <option value="16"{{ old('regement_id', $unit->regement_id ?? '') == 16 ? 'selected' : '' }}>Sri Lanka Army Medical Corps</option>
                                            <option value="17"{{ old('regement_id', $unit->regement_id ?? '') == 17 ? 'selected' : '' }}>Sri Lanka Army Ordnance Corps</option>
                                            <option value="18"{{ old('regement_id', $unit->regement_id ?? '') == 18 ? 'selected' : '' }}>Sri Lanka Electrical and Mechanical Engineers</option>
                                            <option value="19"{{ old('regement_id', $unit->regement_id ?? '') == 19 ? 'selected' : '' }}>Sri Lanka Corps of Military Police</option>
                                            <option value="20"{{ old('regement_id', $unit->regement_id ?? '') == 20 ? 'selected' : '' }}>Sri Lanka Army General Service Corps</option>
                                            <option value="21"{{ old('regement_id', $unit->regement_id ?? '') == 21 ? 'selected' : '' }}>Sri Lanka Army Women's Corps</option>
                                            <option value="22"{{ old('regement_id', $unit->regement_id ?? '') == 22 ? 'selected' : '' }}>Sri Lanka Army Corps of Agriculture and Livestock</option>
                                            <option value="23"{{ old('regement_id', $unit->regement_id ?? '') == 23 ? 'selected' : '' }}>Sri Lanka Rifle Corps</option>
                                            <option value="24"{{ old('regement_id', $unit->regement_id ?? '') == 24 ? 'selected' : '' }}>Sri Lanka Army Pioneer Corps</option>
                                            <option value="25"{{ old('regement_id', $unit->regement_id ?? '') == 25 ? 'selected' : '' }}>Sri Lanka National Guard</option>
                                        </select>
                                         @error('regement_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    </div>
                            <div class="form-group">
                                <label>{{ __('Status') }}</label>
                                <input type="text" class="form-control" value="{{ $unit->active ? __('Active') : __('Deactive') }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Created At') }}</label>
                                <input type="text" class="form-control" value="{{ $unit->created_at }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Updated At') }}</label>
                                <input type="text" class="form-control" value="{{ $unit->updated_at }}" readonly>
                            </div>
                            <a href="{{ route('unit') }}" class="btn btn-primary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection