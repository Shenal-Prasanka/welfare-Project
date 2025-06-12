{{-- filepath: resources/views/admin/rank/edit_show.blade.php --}}
@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-semibold"><i class="bi bi-buildings-fill"></i>{{ __(' Edit Unit') }}</h1>
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
                            <form method="POST" action="{{ route('unit.update', $unit->id) }}">
                                @csrf

                                <!-- Rank Field -->
                                <div class="form-group">
                                    <label for="rank">{{ __('Unit') }}</label>
                                    <input type="text" name="unit" id="unit" class="form-control" value="{{ old('unit', $unit->unit) }}" required>
                                </div>

                                <!-- Type Field -->
                                <div class="form-group">
                                    <label for="type">{{ __('Regement-id') }}</label>
                                    <input type="text" name="regement_id" id="regement_id" class="form-control" value="{{ old('regement_id', $unit->regement_id) }}" required>
                                </div>

                                <!-- Active Field -->
                                <div class="form-group">
                                    <label for="active">{{ __('Status') }}</label>
                                    <select name="active" id="active" class="form-control">
                                        <option value="1" {{ $unit->active ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="0" {{ !$unit->active ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                    </select>
                                </div>

                                <!-- Show Updated At (read-only) -->
                                <div class="form-group">
                                    <label>{{ __('Last Updated At') }}</label>
                                    <input type="text" class="form-control" value="{{ $unit->updated_at }}">
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">{{ __('Update Unit') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection