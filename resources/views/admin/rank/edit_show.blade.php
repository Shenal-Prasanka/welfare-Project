{{-- filepath: resources/views/admin/rank/edit_show.blade.php --}}
@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-semibold"><i class="bi bi-bookmark-star-fill"></i>{{ __(' Edit Rank') }}</h1>
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
                            <form method="POST" action="{{ route('rank.update', $rank->id) }}">
                                @csrf

                                <!-- Rank Field -->
                                <div class="form-group">
                                    <label for="rank">{{ __('Rank') }}</label>
                                    <input type="text" name="rank" id="rank" class="form-control" value="{{ old('rank', $rank->rank) }}" required>
                                </div>

                                <!-- Type Field -->
                                <div class="form-group">
                                    <label for="type">{{ __('Type') }}</label>
                                    <input type="text" name="type" id="type" class="form-control" value="{{ old('type', $rank->type) }}" required>
                                </div>

                                <!-- Active Field -->
                                <div class="form-group">
                                    <label for="active">{{ __('Status') }}</label>
                                    <select name="active" id="active" class="form-control">
                                        <option value="1" {{ $rank->active ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="0" {{ !$rank->active ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                    </select>
                                </div>

                                <!-- Show Updated At (read-only) -->
                                <div class="form-group">
                                    <label>{{ __('Last Updated At') }}</label>
                                    <input type="text" class="form-control" value="{{ $rank->updated_at }}">
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">{{ __('Update Rank') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection