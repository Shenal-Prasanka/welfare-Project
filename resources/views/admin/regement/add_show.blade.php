@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-semibold"><i class="bi bi-star-fill"></i>{{ __(' Add New Regement') }}</h1>
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
                            <form method="POST" action="{{ route('regement.store') }}">
                                @csrf

                                <!-- Regement Field -->
                               
                                        <div class="col-md-12">
                                            <label for="regement">{{ __('Regement') }}</label>
                                            <select name="regement" id="regement" class="form-select @error('active') is-invalid @enderror" >
                                                <option value="">{{ __('Choose...') }}</option>
                                                <option value="Sri Lanka Armoured Corps">Sri Lanka Armoured Corps</option>
                                                <option value="Sri Lanka Artillery">Sri Lanka Artillery</option>
                                                <option value="Sri Lanka Engineers">Sri Lanka Engineers</option>
                                                <option value="Sri Lanka Signals Corps">Sri Lanka Signals Corps</option>
                                                <option value="Sri Lanka Light Infantry">Sri Lanka Light Infantry</option>
                                                <option value="Sri Lanka Sinha Regiment">Sri Lanka Sinha Regiment</option>
                                                <option value="Gemunu Watch">Gemunu Watch</option>
                                                <option value="Gajaba Regiment">Gajaba Regiment</option>
                                                <option value="Vijayabahu Infantry Regiment">Vijayabahu Infantry Regiment</option>
                                                <option value="Mechanized Infantry Regiment">Mechanized Infantry Regiment</option>
                                                <option value="Commando Regiment">Commando Regiment</option>
                                                <option value="Special Forces Regiment">Special Forces Regiment</option>
                                                <option value="Military Intelligence Corps">Military Intelligence Corps</option>
                                                <option value="Engineer Services Regiment">Engineer Services Regiment</option>
                                                <option value="Sri Lanka Army Service Corps">Sri Lanka Army Service Corps</option>
                                                <option value="Sri Lanka Army Medical Corps">Sri Lanka Army Medical Corps</option>
                                                <option value="Sri Lanka Army Ordnance Corps">Sri Lanka Army Ordnance Corps</option>
                                                <option value="Sri Lanka Electrical and Mechanical Engineers">Sri Lanka Electrical and Mechanical Engineers</option>
                                                <option value="Sri Lanka Corps of Military Police">Sri Lanka Corps of Military Police</option>
                                                <option value="Sri Lanka Army General Service Corps">Sri Lanka Army General Service Corps</option>
                                                <option value="Sri Lanka Army Women's Corps">Sri Lanka Army Women's Corps</option>
                                                <option value="Sri Lanka Army Corps of Agriculture and Livestock">Sri Lanka Army Corps of Agriculture and Livestock</option>
                                                <option value="Sri Lanka Rifle Corps">Sri Lanka Rifle Corps</option>
                                                <option value="Sri Lanka Army Pioneer Corps">Sri Lanka Army Pioneer Corps</option>
                                                <option value="Sri Lanka National Guard">Sri Lanka National Guard</option>
                                            </select>
                                            @error('regement')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @else
                                        
                                    @enderror
                                        </div>


                               
                                 <!-- Active Field -->
                            <div class="col-md-12 mt-3">
                                <label for="active" class="form-label">{{ __('Status') }}</label>
                                <select name="active" id="active"
                                    class="form-select @error('active') is-invalid @enderror" >
                                    <option disabled {{ old('active') === null ? 'selected' : '' }}>{{ __('Choose...') }}</option>
                                    <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                    <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                </select>
                                @error('active')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @else
                                @enderror
                            </div>

                                <!-- Submit Button -->
                                <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">{{ __('Add Regement') }}</button>
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