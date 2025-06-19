{{-- filepath: resources/views/admin/rank/edit_show.blade.php --}}
@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-semibold"><i class="bi bi-star-fill"></i>{{ __(' Edit Regement') }}</h1>
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

                            <form method="POST" action="{{ route('regement.update', $regement->id) }}">
                                @csrf

                            <!-- Regement Field -->
                                        <div class="form-group mb-3">
                                            <label for="regement">{{ __('Regement') }}</label>
                                            <select name="regement" id="regement" class="form-control @error('regement') is-invalid @enderror" required>
                                                <option value="" disabled {{ old('regement', $regement->regement ?? '') == '' ? 'selected' : '' }}>
                                                    -- Select Regement --
                                                </option>

                                                @php
                                                    $regements = [
                                                        'Sri Lanka Armoured Corps',
                                                        'Sri Lanka Artillery',
                                                        'Sri Lanka Engineers',
                                                        'Sri Lanka Signals Corps',
                                                        'Sri Lanka Light Infantry',
                                                        'Sri Lanka Sinha Regiment',
                                                        'Gemunu Watch',
                                                        'Gajaba Regiment',
                                                        'Vijayabahu Infantry Regiment',
                                                        'Mechanized Infantry Regiment',
                                                        'Commando Regiment',
                                                        'Special Forces Regiment',
                                                        'Military Intelligence Corps',
                                                        'Engineer Services Regiment',
                                                        'Sri Lanka Army Service Corps',
                                                        'Sri Lanka Army Medical Corps',
                                                        'Sri Lanka Army Ordnance Corps',
                                                        'Sri Lanka Electrical and Mechanical Engineers',
                                                        'Sri Lanka Corps of Military Police',
                                                        'Sri Lanka Army General Service Corps',
                                                        'Sri Lanka Army Women\'s Corps',
                                                        'Sri Lanka Army Corps of Agriculture and Livestock',
                                                        'Sri Lanka Rifle Corps',
                                                        'Sri Lanka Army Pioneer Corps',
                                                        'Sri Lanka National Guard'
                                                    ];
                                                @endphp

                                                @foreach ($regements as $regementOption)
                                                    <option value="{{ $regementOption }}" {{ old('regement', $regement->regement ?? '') == $regementOption ? 'selected' : '' }}>
                                                        {{ $regementOption }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('regement')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @else
                                                <div class="invalid-feedback">Please select a valid regement.</div>
                                            @enderror
                                        </div>

                                <!-- Active Field -->
                                <div class="form-group">
                                    <label for="active">{{ __('Status') }}</label>
                                    <select name="active" id="active" class="form-control">
                                        <option value="1" {{ $regement->active ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="0" {{ !$regement->active ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                    </select>
                                </div>

                                <!-- Show Updated At (read-only) -->
                                <div class="form-group">
                                    <label>{{ __('Last Updated At') }}</label>
                                    <input type="text" class="form-control" 
                                        value="{{ $regement->updated_at->timezone('Asia/Colombo')->format('Y-m-d h:i:s A') }}" readonly>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">{{ __('Update Regement') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection