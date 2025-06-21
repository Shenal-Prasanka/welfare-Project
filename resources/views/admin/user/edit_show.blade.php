@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold"><i class="bi bi-person-workspace"></i>{{ __(' Edit User') }}</h1>
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

                            <form method="POST" action="{{ route('user.update', $user->id) }}">
                                @csrf
                               

                                <!-- Name Field -->
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email Field -->
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Mobile Field -->
                                <div class="form-group">
                                    <label for="mobile">{{ __('Mobile') }}</label>
                                    <input type="text" name="mobile" id="mobile"
                                        class="form-control @error('mobile') is-invalid @enderror"
                                        value="{{ old('mobile', $user->mobile) }}" required>
                                    @error('mobile')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Address Field -->
                                <div class="form-group">
                                    <label for="address">{{ __('Address') }}</label>
                                    <input type="text" name="address" id="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ old('address', $user->address) }}" required>
                                    @error('address')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Employee No Field -->
                                <div class="form-group">
                                    <label for="employee_no">{{ __('Employee NO') }}</label>
                                    <input type="text" name="employee_no" id="employee_no"
                                        class="form-control @error('employee_no') is-invalid @enderror"
                                        value="{{ old('employee_no', $user->employee_no) }}" required>
                                    @error('employee_no')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Regement No Field -->
                                <div class="form-group">
                                    <label for="regement_no">{{ __('Regement No') }}</label>
                                    <input type="text" name="regement_no" id="regement_no"
                                        class="form-control @error('regement_no') is-invalid @enderror"
                                        value="{{ old('regement_no', $user->regement_no) }}" required>
                                    @error('regement_no')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Regement Field -->
                                <div class="form-group">
                                    <label for="regement_id">{{ __('Regement') }}</label>
                                    <select name="regement_id" id="regement_id"
                                            class="form-control @error('regement_id') is-invalid @enderror" required>
                                        <option value="" disabled>Select Regement</option>
                                        @foreach($regements as $regement)
                                            <option value="{{ $regement->id }}" {{ old('regement_id', $user->regement_id) == $regement->id ? 'selected' : '' }}>
                                                {{ $regement->regement }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('regement_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Unit Field -->
                                <div class="form-group">
                                    <label for="unit_id">{{ __('Unit') }}</label>
                                    <select name="unit_id" id="unit_id"
                                            class="form-control @error('unit_id') is-invalid @enderror" required>
                                        <option value="" disabled>Select Unit</option>
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}" {{ old('unit_id', $user->unit_id) == $unit->id ? 'selected' : '' }}>
                                                {{ $unit->unit }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('unit_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Rank Field -->
                                <div class="form-group">
                                    <label for="rank_id">{{ __('Rank') }}</label>
                                    <select name="rank_id" id="rank_id"
                                            class="form-control @error('rank_id') is-invalid @enderror" required>
                                        <option value="" disabled>Select Rank</option>
                                        @foreach($ranks as $rank)
                                            <option value="{{ $rank->id }}" {{ old('rank_id', $user->rank_id) == $rank->id ? 'selected' : '' }}>
                                                {{ $rank->rank }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('rank_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Active Field -->
                                <div class="form-group">
                                    <label for="active">{{ __('Status') }}</label>
                                    <select name="active" id="active" class="form-control @error('active') is-invalid @enderror" required>
                                        <option value="1" {{ old('active', $user->active) == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('active', $user->active) == '0' ? 'selected' : '' }}>Deactive</option>
                                    </select>
                                    @error('active')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <!-- Show Updated At (read-only) -->
                                <div class="form-group">
                                    <label>{{ __('Last Updated At') }}</label>
                                    <input type="text" class="form-control"
                                        value="{{ $user->updated_at->timezone('Asia/Colombo')->format('Y-m-d h:i:s A') }}" readonly>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('Update user') }}</button>
                                    <a href="{{ route('user') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection