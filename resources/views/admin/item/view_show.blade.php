{{-- filepath: resources/views/admin/rank/view_show.blade.php --}}
@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold"><i class="bi bi-backpack"></i>{{ __(' View item') }}</h1>
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
                                <label>{{ __('Item') }}</label>
                                <input type="text" class="form-control" value="{{ $item->item }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Product') }}</label>
                                <select name="product_id" id="product_id" class="form-control" readonly>
                                            <option value="1" >Television</option>
                                            <option value="3" >Mobile-Phones</option>
                                            <option value="4" >Laptop</option>    
                                        </select>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Status') }}</label>
                                <input type="text" class="form-control" value="{{ $item->active ? __('Active') : __('Deactive') }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Created At') }}</label>
                                <input type="text" class="form-control" value="{{ $item->created_at }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Updated At') }}</label>
                                <input type="text" class="form-control" value="{{ $item->updated_at }}" readonly>
                            </div>
                            <a href="{{ route('item') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection