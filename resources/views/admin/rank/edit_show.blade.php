@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold"><i class="bi bi-bookmark-star-fill"></i>{{ __(' Edit Rank') }}</h1>
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

                           

                            <form method="POST" action="{{ route('rank.update', $rank->id) }}">
                                @csrf

                               <!-- Rank Field -->
                                    <div class="form-group mb-3">
                                        <label for="rank">{{ __('Rank') }}</label>
                                        <select name="rank" id="rank" class="form-control @error('rank') is-invalid @enderror" required>
                                            <option value="" disabled {{ old('rank', $rank->rank ?? '') == '' ? 'selected' : '' }}>-- Select Rank --</option>

                                            <!-- Commissioned Officers -->
                                            @php
                                                $commissioned = [
                                                    'Field Marshal', 'General', 'Lieutenant General', 'Major General', 'Brigadier',
                                                    'Colonel', 'Lieutenant Colonel', 'Major', 'Captain', 'Lieutenant', '2nd Lieutenant'
                                                ];
                                                $warrantOfficers = [
                                                    'Warrant Officer Class1', 'Warrant Officer Class11', 'Staff Sergeant', 'Sergeant',
                                                    'Corporal', 'Lance Corporal', 'Private'
                                                ];
                                            @endphp

                                            <optgroup label="Commissioned Officers">
                                                @foreach($commissioned as $rankOption)
                                                    <option value="{{ $rankOption }}" {{ old('rank', $rank->rank ?? '') == $rankOption ? 'selected' : '' }}>
                                                        {{ $rankOption }}
                                                    </option>
                                                @endforeach
                                            </optgroup>

                                            <optgroup label="Warrant Officers and Others">
                                                @foreach($warrantOfficers as $rankOption)
                                                    <option value="{{ $rankOption }}" {{ old('rank', $rank->rank ?? '') == $rankOption ? 'selected' : '' }}>
                                                        {{ $rankOption }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        </select>

                                        @error('rank')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @else
                                            <div class="invalid-feedback">Please select a valid rank.</div>
                                        @enderror
                                    </div>
                                <!-- Type Field -->
                                <div class="form-group">
                                    <label for="type">{{ __('Type') }}</label>
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="COMMISSIONED OFFICERS" {{ old('type', $rank->type) == 'COMMISSIONED OFFICERS' ? 'selected' : '' }}>
                                            COMMISSIONED OFFICERS
                                        </option>
                                        <option value="WARRANT OFFICERS" {{ old('type', $rank->type) == 'WARRANT OFFICERS' ? 'selected' : '' }}>
                                            WARRANT OFFICERS
                                        </option>
                                    </select>
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
                                    <input type="text" class="form-control" 
                                        value="{{ $rank->updated_at->timezone('Asia/Colombo')->format('Y-m-d h:i:s A') }}" readonly>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">{{ __('Update Rank') }}</button>
                                 <a href="{{ route('rank') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection