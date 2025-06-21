{{-- filepath: resources/views/admin/rank/view_show.blade.php --}}
@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold"><i class="bi bi-person-workspace"></i>{{ __(' View User') }}</h1>
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
                                <label>{{ __('Name') }}</label>
                                <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Email') }}</label>
                                <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Mobile') }}</label>
                                <input type="text" class="form-control" value="{{ $user->mobile }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Address') }}</label>
                                <input type="text" class="form-control" value="{{ $user->address }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Employee NO') }}</label>
                                <input type="text" class="form-control" value="{{ $user->employee_no }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Regement No') }}</label>
                                <input type="text" class="form-control" value="{{ $user->regement_no }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Regement') }}</label>
                                <input type="text" class="form-control" value="{{ $user->regement->regement ?? '-' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Unit') }}</label>
                                <input type="text" class="form-control" value="{{ $user->unit->unit ?? '-' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Rank') }}</label>
                                <input type="text" class="form-control" value="{{ $user->rank->rank ?? '-' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Role') }}</label>
                                <input type="text" class="form-control" value="{{ $user->role }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Status') }}</label>
                                <input type="text" class="form-control" value="{{ $user->active ? 'Active' : 'Deactive' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Created At') }}</label>
                                <input type="text" class="form-control" value="{{ $user->created_at }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Updated At') }}</label>
                                <input type="text" class="form-control" value="{{ $user->updated_at }}" readonly>
                            </div>
                            <a href="{{ route('user') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection