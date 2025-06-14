@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-semibold"><i class="bi bi-bag-check-fill"></i>{{ __(' WelfareShops Details') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <!-- Empty right column for alignment -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- Search Bar and Active Filter -->
                                    <form method="GET" action="{{ route('welfare') }}" class="form-inline">
                                        <input type="text" name="search" class="form-control form-control-sm" placeholder="{{ __('Search...') }}" value="{{ request('search') }}">
                                        <select name="active" class="form-control form-control-sm ml-2">
                                            <option value="">{{ __('All') }}</option>
                                            <option value="1" {{ request('active') == '1' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                            <option value="0" {{ request('active') == '0' ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-primary ml-2">{{ __('Search') }}</button>
                                    </form>
                                </div><!-- /.col -->
                                <div class="col-sm-6 text-right">
                                    <!-- Add Button -->
                                    <a href="{{ url('welfare/add') }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-plus-circle"></i> {{ __('Add New WelfareShop') }}
                                    </a>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                            <p class="card-text">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">{{ __('Id') }}</th>
                                                <th class="text-center">{{ __('name') }}</th>
                                                <th class="text-center">{{ __('Active') }}</th>
                                                <th class="text-center">{{ __('Created At') }}</th>
                                                <th class="text-center">{{ __('Updated At') }}</th>
                                                <th class="text-center">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($welfares as $name)
                                                <tr>
                                                    <td class="text-center">{{ $name->id }}</td>
                                                    <td class="text-center">{{ $name->name }}</td>
                                                    <td class="text-center">
                                                        <a href="welfare/{{ $name->id }}" class="badge badge-{{ $name->active ? 'success' : 'danger' }}">
                                                        {{ $name->active ? __('Active') : __('Deactive') }}
                                                        </a>
                                                    </td>
                                                    <td class="text-center">{{ $name->created_at }}</td>
                                                    <td class="text-center">{{ $name->updated_at }}</td>
                                                    <td class="text-center">
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('welfare.edit', $name->id) }}"  class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        <!-- view Button -->
                                                        <a href="{{ route('welfare.view', $name->id) }}"  class="btn btn-sm btn-secondary"><i class="bi bi-eye-fill"></i></a>
                                                        <!-- Delete Button -->
                                                        <a href="{{ route('welfare.delete', $name->id) }}"  class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                 <!-- Pagination Links -->
                            <div class="d-flex justify-content-left btn-xs">
                                {{ $welfares->links() }}
                            </div>
                            </p>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection