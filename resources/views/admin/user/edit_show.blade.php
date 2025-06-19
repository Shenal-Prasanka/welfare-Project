{{-- filepath: resources/views/admin/rank/edit_show.blade.php --}}
@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-semibold"><i class="bi bi-person-fill-lock"></i>{{ __(' Edit User') }}</h1>
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

                                <!-- user Field -->
                                <div class="form-group">
                                    <label for="rank">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
                                     @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @else
                    
                                    @enderror
                                </div>

                                <!-- email Field -->
                                <div class="form-group">
                                    <label for="type">{{ __('Email') }}</label>
                                    <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
                                     @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @else
                    
                                    @enderror
                                </div>

                              <!-- Role Field -->
                                <div class="form-group">
                                    <label for="type">{{ __('Role') }}</label>
                                    <input type="text" name="role" id="role" class="form-control" value="{{ old('role', $user->role) }}">
                                     @error('role')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @else
                    
                                    @enderror
                                </div>

                                <!-- Show Updated At (read-only) -->
                                <div class="form-group">
                                    <label>{{ __('Last Updated At') }}</label>
                                    <input type="text" class="form-control" 
                                        value="{{ $user->updated_at->timezone('Asia/Colombo')->format('Y-m-d h:i:s A') }}" readonly>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">{{ __('Update user') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection