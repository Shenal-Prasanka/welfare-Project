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

                                <!-- Rank Field -->
                                <div class="form-group">
                                    <label for="rank">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control" value="" required>
                                </div>

                                <!-- Type Field -->
                                <div class="form-group">
                                    <label for="type">{{ __('Email') }}</label>
                                    <input type="text" name="email" id="email" class="form-control" value="" required>
                                </div>

                                  <!-- Role Field -->
                                <div class="form-group">
                                    <label for="type">{{ __('Role') }}</label>
                                    <input type="text" name="role" id="role" class="form-control" value="" required>
                                </div>

                                 <div class="form-group">
                                     <label for="password">{{ __('Password') }}</label>
                                     <input type="password" name="password" id="password" class="form-control" required>
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