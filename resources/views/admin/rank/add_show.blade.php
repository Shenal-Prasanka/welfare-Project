@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 font-weight-semibold">
                    <i class="bi bi-bookmark-star-fill"></i> {{ __('Add New Rank') }}
                </h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <!-- Form Start -->
                        <form method="POST" action="{{ route('rank.store') }}" class="row g-3 needs-validation" novalidate>
                            @csrf

                          <!-- Rank Field -->
                                <div class="col-md-12">
                                    <label for="rank" class="form-label">{{ __('Rank') }}</label>
                                    <select
                                        name="rank"
                                        id="rank"
                                        class="form-control @error('rank') is-invalid @enderror"
                                        required
                                    >
                                        <option value="" disabled {{ old('rank', $rank->rank ?? '') == '' ? 'selected' : '' }}>
                                            -- Select Rank --
                                        </option>

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
                                        <div class="invalid-feedback">Please provide a valid rank.</div>
                                    @enderror
                                </div>


                            <!-- Type Field -->
                                <div class="form-group mb-3">
                                    <label for="type">{{ __('Type') }}</label>
                                    <select
                                        name="type"
                                        id="type"
                                        class="form-control @error('type') is-invalid @enderror"
                                        required
                                    >
                                        <option value="" disabled {{ old('type', $rank->type ?? '') == '' ? 'selected' : '' }}>
                                            -- Select Type --
                                        </option>
                                        <option value="COMMISSIONED OFFICERS" {{ old('type', $rank->type ?? '') == 'COMMISSIONED OFFICERS' ? 'selected' : '' }}>
                                            COMMISSIONED OFFICERS
                                        </option>
                                        <option value="WARRANT OFFICERS" {{ old('type', $rank->type ?? '') == 'WARRANT OFFICERS' ? 'selected' : '' }}>
                                            WARRANT OFFICERS
                                        </option>
                                    </select>

                                    @error('type')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @else
                                        <div class="invalid-feedback">Please provide a valid type.</div>
                                    @enderror
                                </div>


                            <!-- Active Field -->
                            <div class="col-md-12">
                                <label for="active" class="form-label">{{ __('Status') }}</label>
                                <select name="active" id="active"
                                    class="form-select @error('active') is-invalid @enderror" required>
                                    <option disabled {{ old('active') === null ? 'selected' : '' }}>{{ __('Choose...') }}</option>
                                    <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                    <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                </select>
                                @error('active')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">Please select a valid status.</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">{{ __('Add Rank') }}</button>
                            </div>
                        </form>
                        <!-- Form End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 Validation Script -->
<script>
    (() => {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });

        @if ($errors->any())
            document.querySelector('form').classList.add('was-validated');
        @endif
    })();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
