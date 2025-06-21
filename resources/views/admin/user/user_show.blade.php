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
                        <i class="bi bi-person-workspace"></i> {{ __('User Details') }}
                    </h1>
                    <a href="{{ url('user/add') }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-plus-circle"></i> {{ __('Add New User') }}
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

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                             <div style="transform: scale(1); transform-origin: top left; width: 100%;">
                                <table id="userTable" class="table table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ __('Id') }}</th>
                                            <th class="text-center">{{ __('Name') }}</th>
                                            <th class="text-center">{{ __('Email') }}</th>
                                            <th class="text-center">{{ __('Mobile') }}</th>
                                            <th class="text-center">{{ __('Address') }}</th>
                                            <th class="text-center">{{ __('Emp-No') }}</th>
                                            <th class="text-center">{{ __('Rege-No') }}</th>
                                            <th class="text-center">{{ __('Regement') }}</th>
                                            <th class="text-center">{{ __('Unit') }}</th>
                                            <th class="text-center">{{ __('Rank') }}</th>
                                            <th class="text-center">{{ __('Role') }}</th>
                                         <!--   <th class="text-center">{{ __('Active') }}</th>-->
                                            <th class="text-center">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td class="text-center">{{ $user->id }}</td>
                                                <td class="text-center">{{ $user->name }}</td>
                                                <td class="text-center">{{ $user->email }}</td>
                                                <td class="text-center">{{ $user->mobile }}</td>
                                                <td class="text-center"> {!! nl2br(e(str_replace(',', ",\n", $user->address))) !!}</td>
                                                <td class="text-center">{{ $user->employee_no }}</td>
                                                <td class="text-center">{{ $user->regement_no }}</td>
                                                <td class="text-center">{{ $user->regement->regement }}</td>
                                                <td class="text-center">{{ $user->unit->unit }}</td>
                                                <td class="text-center">{{ $user->rank->rank }}</td>
                                                <td class="text-center">
                                                    @php
                                                        $roleNames = [
                                                            0 => 'User',
                                                            1 => 'Admin',
                                                            2 => 'unit-clerk',
                                                            3 => 'unit-OC',
                                                            4 => 'shop-coord-Clerk',
                                                            5 => 'shop-coord-OC',
                                                            6 => 'Welfare-shop-Clerk',
                                                            7 => 'Welfare-shop-OC',
                                                            8 => 'Ledger-Clerk',
                                                            9 => 'Ledger-OC',
                                                        ];
                                                        echo $roleNames[$user->role] ?? $user->role;
                                                    @endphp
                                                </td>
                                              <!--  <td class="text-center">
                                                    <a href="{{ route('user.active', $user->id) }}" class="badge badge-{{ $user->active ? 'success' : 'danger' }}">
                                                        {{ $user->active ? __('Active') : __('Deactive') }}
                                                    </a>
                                                </td>-->
                                                <td class="text-center">
                                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a><br>
                                                    <a href="{{ route('user.view', $user->id) }}" class="btn btn-sm btn-secondary mt-1"><i class="bi bi-eye-fill"></i></a><br>
                                                    <a href="{{ route('user.delete', $user->id) }}" class="btn btn-sm btn-danger mt-1"><i class="bi bi-trash3-fill"></i></a>
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
            new DataTable('#userTable', {
                paging: true,
                searching: true,
                ordering: true,
                responsive: true,
                scrollY: false,
            });
        });
    </script>
@endsection
