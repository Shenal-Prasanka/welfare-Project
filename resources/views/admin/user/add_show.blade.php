@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-semibold"><i class="bi bi-person-fill-lock"></i>{{ __(' Add New User') }}</h1>
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
                            <form method="POST" action="{{ route('user.store') }}">
                                @csrf

                               <!-- Name Field -->
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="name" class="form-select @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                               <!-- Email Field -->
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input type="text" name="email" id="email" class="form-select @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                <!-- Role Field (Dropdown: 0=Admin, 1–9 as numbers) -->
                                <div class="form-group">
                                    <label for="role">{{ __('Role') }}</label>
                                    <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                                        <option value="">-- Select Role --</option>
                                        @for ($i = 0; $i <= 9; $i++)
                                            <option value="{{ $i }}" {{ old('role') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password Field -->
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="password" class="form-select @error('password') is-invalid @enderror" required>
                                    @error('password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">{{ __('Add User') }}</button>
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