@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }
        .main-header, .main-footer {
            flex-shrink: 0;
        }
        .content-wrapper {
            flex: 1 1 auto;
            overflow-y: auto;
            padding: 15px;
            background-color: #f4f6f9;
            margin-left: 250px;
        }
        .main-footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
        }
        .main-sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            z-index: 1030;
            overflow-y: auto;
        }
    </style>
@endsection

@section('content')
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                 <div class="col-12 d-flex justify-content-between align-items-center">
                    <h1 class="m-0 font-weight-bold">
                        <i class="bi bi-bag-check-fill"></i> {{ __('Welfare-Shops Details') }}
                    </h1>
                    <a href="{{ url('welfare/add') }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-plus-circle"></i> {{ __('Add New WelfareShop') }}
                                    </a>
                </div>
                <div class="col-sm-6">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show py-1 px-2" role="alert" style="font-size: 0.875rem;">
                            {{ session('success') }}
                            <button type="button" class="btn-close btn-sm py-2 px-3" data-bs-dismiss="alert" aria-label="Close" style="filter: invert(1); font-size: 0.875rem;"></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           
                            <div class="table-responsive">
                                <table id="welfareTable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ __('Id') }}</th>
                                            <th class="text-center">{{ __('Name') }}</th>
                                            <th class="text-center">{{ __('Active') }}</th>
                                        <!--    <th class="text-center">{{ __('Created At') }}</th>
                                            <th class="text-center">{{ __('Updated At') }}</th>-->
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
                                              <!--  <td class="text-center">{{ $name->created_at }}</td>
                                                <td class="text-center">{{ $name->updated_at }}</td>-->
                                                <td class="text-center">
                                                    <a href="{{ route('welfare.edit', $name->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                    <a href="{{ route('welfare.view', $name->id) }}" class="btn btn-sm btn-secondary"><i class="bi bi-eye-fill"></i></a>
                                                    <a href="{{ route('welfare.delete', $name->id) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new DataTable('#welfareTable', {
                paging: true,
                searching: true,
                ordering: true,
                responsive: true
            });
        });
    </script>
@endsection