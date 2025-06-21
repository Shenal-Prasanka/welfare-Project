@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="bi bi-bar-chart-line-fill"></i>{{ __(' Dashboard') }}</h1>
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
                               <div class="row">
                                <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $userCount }}</h3>
                                        <p>Total Users</p>
                                    </div>
                                    <div class="icon">
                                       <i class="bi bi-person-fill-lock  text-white"></i>
                                    </div>
                                    <a href="{{ url('user') }}" class="small-box-footer">
                                        More info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                    </div>
                                </div>
                                <!-- ./col -->

                                <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-success">
                                    <div class="inner">
                                       <h3>{{ $rankCount }}</h3>
                                        <p>Total Ranks</p>
                                    </div>
                                    <div class="icon">
                                       <i class="bi bi-bookmark-star-fill  text-white"></i>
                                    </div>
                                    <a href="{{ url('rank') }}" class="small-box-footer">
                                        More info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                    </div>
                                </div>
                                <!-- ./col -->

                                <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ $welfareCount }}</h3>
                                        <p>Total WelfareShops</p>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-shop  text-white"></i>
                                    </div>
                                    <a href="{{ url('welfare') }}" class="small-box-footer">
                                        More info <i class="fas fa-arrow-circle-right "></i>
                                    </a>
                                    </div>
                                </div>
                                <!-- ./col -->

                                 <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-dark">
                                    <div class="inner text">
                                        <h3>{{ $regementCount }}</h3>
                                        <p>Total Regements</p>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-star-fill text-white"></i>
                                    </div>
                                    <a href="{{ url('regement') }}" class="small-box-footer">
                                        More info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                    </div>
                                </div>
                                <!-- ./col -->

                                <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-secondary">
                                    <div class="inner">
                                        <h3>{{ $unitCount }}</h3>
                                        <p>Total units</p>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-buildings-fill  text-white"></i>
                                    </div>
                                    <a href="{{ url('unit') }}" class="small-box-footer">
                                        More info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                    </div>
                                </div>
                                <!-- ./col -->

                                

                
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