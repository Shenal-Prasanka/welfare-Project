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
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h1 class="m-0 font-weight-bold"><i class="bi bi-backpack"></i>{{ __(' Item Details') }}</h1>
                    <a href="{{ url('item/add') }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-plus-circle"></i> {{ __('Add New Item') }}
                                    </a>
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
                           
                            <p class="card-text">
                                <div class="table-responsive">
                                    <table id="itemTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">{{ __('Item-Id') }}</th>
                                                <th class="text-center">{{ __('Item') }}</th>
                                                <th class="text-center">{{ __('Product') }}</th>
                                                <th class="text-center">{{ __('Welfare') }}</th> 
                                                <th class="text-center">{{ __('Serial-Number') }}</th>
                                                <th class="text-center">{{ __('Price(RS.)') }}</th>
                                                <th class="text-center">{{ __('VAT(%)') }}</th>
                                                <th class="text-center">{{ __('TAX(%)') }}</th>
                                                <th class="text-center">{{ __('Discount(%)') }}</th>
                                                <th class="text-center">{{ __('Total Price(RS.)') }}</th> 
                                                <th class="text-center">{{ __('Active') }}</th>
                                              <!--  <th class="text-center">{{ __('Created At') }}</th>
                                                <th class="text-center">{{ __('Updated At') }}</th>-->
                                                <th class="text-center">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($items as $item)
                                                <tr>
                                                    <td class="text-center">{{ $item->id }}</td>
                                                    <td class="text-center">{{ $item->item }}</td>
                                                    <td class="text-center">{{ $item->product->product }}</td>
                                                    <td class="text-center">{{ $item->welfare->name }}</td>
                                                    <td class="text-center">{{ $item->serial_number }}</td>
                                                    <td class="text-center">{{ $item->price }}</td>
                                                    <td class="text-center">{{ $item->vat }}</td>
                                                    <td class="text-center">{{ $item->tax }}</td>
                                                    <td class="text-center">{{ $item->discount }}</td>
                                                    <td class="text-center">{{ $item->total_price }}</td>
                                                    <td class="text-center">
                                                        <a href="item/{{ $item->id }}" class="badge badge-{{ $item->active ? 'success' : 'danger' }}">
                                                        {{ $item->active ? __('Active') : __('Deactive') }}
                                                        </a>
                                                    </td>
                                                  <!--  <td class="text-center">{{ $item->created_at }}</td>
                                                    <td class="text-center">{{ $item->updated_at }}</td>-->
                                                    <td class="text-center">
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('item.edit', $item->id) }}"  class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a><br>
                                                        <!-- view Button -->
                                                        <a href="{{ route('item.view', $item->id) }}"  class="btn btn-sm btn-secondary mt-1"><i class="bi bi-eye-fill"></i></a><br>
                                                        <!-- Delete Button -->
                                                        <a href="{{ route('item.delete', $item->id) }}"  class="btn btn-sm btn-danger mt-1"><i class="bi bi-trash3-fill"></i></a>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

@section('scripts')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new DataTable('#itemTable', {
                paging: true,
                searching: true,
                ordering: true,
                responsive: true
            });
        });
    </script>
@endsection