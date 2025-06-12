@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-semibold"><i class="bi bi-buildings-fill"></i>{{ __(' Add New Unit') }}</h1>
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
                            <form method="POST" action="{{ route('unit.store') }}">
                                @csrf

                                <!-- Rank Field -->
                                <div class="form-group">
                                    <label for="unit">{{ __('Unit') }}</label>
                                    <input type="text" name="unit" id="unit" class="form-control" value="" required>
                                </div>

                                <!-- Type Field -->
                                    <div class="form-group">
                                        <label for="regement_id">{{ __('Regement') }}</label>
                                        <select name="regement_id" id="regement_id" class="form-control" required>
                                            <option value="">{{ __('Select Regement') }}</option>
                                            @foreach($regements as $regement)
                                                <option value="{{ $regement->id }}">{{ $regement->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                <!-- Active Field -->
                                <div class="form-group">
                                    <label for="active">{{ __('Status') }}</label>
                                    <select name="active" id="active" class="form-control">
                                        <option value="1">{{ __('Active') }}</option>
                                        <option value="0">{{ __('Deactive') }}</option>
                                    </select>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">{{ __('Add Unit') }}</button>
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