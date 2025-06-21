@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }
        .main-header, .main-footer {
            flex-shrink: 0;
        }
        .content-wrapper {
            flex: 1 1 auto;
            overflow-y: auto;
            padding: 15px;
            background-color: #f4f6f9;
            margin-left: 250px;
        }
        .main-footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
        }
        .main-sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            z-index: 1030;
            overflow-y: auto;
        }
    </style>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold"><i class="bi bi-person-workspace"></i>{{ __(' Add New User') }}</h1>
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
                            <form method="POST" action="{{ route('user.store') }}" novalidate>
                                @csrf

                                <!-- Name Field -->
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="name" 
                                        class="form-control @error('name') is-invalid @enderror" 
                                        value="{{ old('name') }}" 
                                        placeholder="Enter full name"
                                        required>
                                    @error('name')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email Field -->
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="email" 
                                        class="form-control @error('email') is-invalid @enderror" 
                                        value="{{ old('email') }}" 
                                        placeholder="Enter email address"
                                        required>
                                    @error('email')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Mobile Field -->
                                <div class="form-group">
                                    <label for="mobile">{{ __('Mobile') }}</label>
                                    <input type="text" name="mobile" id="mobile" 
                                        class="form-control @error('mobile') is-invalid @enderror" 
                                        value="{{ old('mobile') }}" 
                                        placeholder="Enter mobile number"
                                        required>
                                    @error('mobile')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Address Field -->
                                <div class="form-group">
                                    <label for="address">{{ __('Address') }}</label>
                                    <input type="text" name="address" id="address" 
                                        class="form-control @error('address') is-invalid @enderror" 
                                        value="{{ old('address') }}" 
                                        placeholder="Enter address"
                                        required>
                                    @error('address')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Employee No Field -->
                                <div class="form-group">
                                    <label for="employee_no">{{ __('Employee NO') }}</label>
                                    <input type="text" name="employee_no" id="employee_no" 
                                        class="form-control @error('employee_no') is-invalid @enderror" 
                                        value="{{ old('employee_no') }}" 
                                        placeholder="Enter employee number"
                                        required>
                                    @error('employee_no')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Regement No Field -->
                                <div class="form-group">
                                    <label for="regement_no">{{ __('Regement No') }}</label>
                                    <input type="text" name="regement_no" id="regement_no" 
                                        class="form-control @error('regement_no') is-invalid @enderror" 
                                        value="{{ old('regement_no') }}" 
                                        placeholder="Enter regement number"
                                        required>
                                    @error('regement_no')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Regement Field -->
                                <div class="form-group">
                                    <label for="regement_id">{{ __('Regement') }}</label>
                                    <select name="regement_id" id="regement_id" 
                                            class="form-control @error('regement_id') is-invalid @enderror" required>
                                        <option value="" disabled selected>Select Regement</option>
                                        @foreach($regements as $regement)
                                            <option value="{{ $regement->id }}" {{ old('regement_id') == $regement->id ? 'selected' : '' }}>
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
                                        <option value="" disabled selected>Select Unit</option>
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>
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
                                        <option value="" disabled selected>Select Rank</option>
                                        @foreach($ranks as $rank)
                                            <option value="{{ $rank->id }}" {{ old('rank_id') == $rank->id ? 'selected' : '' }}>
                                                {{ $rank->rank }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('rank_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Role Field -->
                                <div class="form-group">
                                    <label for="role">{{ __('Role') }}</label>
                                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                                        <option value="0" {{ old('role', 0) == '0' ? 'selected' : '' }}>User</option>
                                        <!-- Add other role options if needed -->
                                    </select>
                                    @error('role')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Active Field -->
                                <div class="form-group">
                                    <label for="active">{{ __('Status') }}</label>
                                    <select name="active" id="active" class="form-control @error('active') is-invalid @enderror" required>
                                        <option value="1" {{ old('active', 1) == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>Deactive</option>
                                    </select>
                                    @error('active')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Password Field -->
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="password" 
                                        class="form-control @error('password') is-invalid @enderror" 
                                        placeholder="Enter password"
                                        required>
                                    @error('password')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('Add User') }}</button>
                                    <a href="{{ route('user') }}" class="btn btn-secondary">Back</a>
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