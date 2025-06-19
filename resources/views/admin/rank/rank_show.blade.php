@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-semibold"><i class="bi bi-bookmark-star-fill"></i>{{ __(' Rank Details') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                      {{-- Success Alert --}}
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show py-1 px-2" role="alert" style="font-size: 0.875rem;">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close btn-sm py-2 px-3" data-bs-dismiss="alert" aria-label="Close" style="filter: invert(1); font-size: 0.875rem;"></button>
                                </div>
                            @endif
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
                                    <form method="GET" action="{{ route('rank') }}" class="form-inline">
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
                                    <a href="{{ url('rank/add') }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-plus-circle"></i> {{ __('Add New Rank') }}
                                    </a>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                            <p class="card-text">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">{{ __('Id') }}</th>
                                                <th class="text-center">{{ __('Rank') }}</th>
                                                <th class="text-center">{{ __('Type') }}</th>
                                                <th class="text-center">{{ __('Active') }}</th>
                                                <th class="text-center">{{ __('Created At') }}</th>
                                                <th class="text-center">{{ __('Updated At') }}</th>
                                                <th class="text-center">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ranks as $rank)
                                                <tr>
                                                    <td class="text-center">{{ $rank->id }}</td>
                                                    <td class="text-center">{{ $rank->rank }}</td>
                                                    <td class="text-center">{{ $rank->type }}</td>
                                                    <td class="text-center">
                                                        <a href="rank/{{ $rank->id }}" class="badge badge-{{ $rank->active ? 'success' : 'danger' }}">
                                                        {{ $rank->active ? __('Active') : __('Deactive') }}
                                                        </a>
                                                    </td>
                                                    <td class="text-center">{{ $rank->created_at }}</td>
                                                    <td class="text-center">{{ $rank->updated_at }}</td>
                                                    <td class="text-center">
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('rank.edit', $rank->id) }}"  class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                        <!-- view Button -->
                                                        <a href="{{ route('rank.view', $rank->id) }}"  class="btn btn-sm btn-secondary"><i class="bi bi-eye-fill"></i></a>
                                                        <!-- Delete Button -->
                                                        <a href="{{ route('rank.delete', $rank->id) }}"  class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></a>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                 <!-- Pagination Links -->
                            <div class="d-flex justify-content-left btn-xs">
                                {{ $ranks->links() }}
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