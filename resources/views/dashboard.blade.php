@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Selamat Datang, <span>{{Auth::user()->name }}</span></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    {{-- <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-12 mb-4">
                    <!-- small box -->
                    <div class="card shadow-sm border-left-info">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Arena</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalData1 }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="ion ion-clipboard fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.arena.index') }}" class="card-footer text-info clearfix small z-1">
                            <span class="float-left font-weight-bold">More info</span>
                            <span class="float-right">
                                <i class="fas fa-arrow-circle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-12 mb-4">
                    <!-- small box -->
                    <div class="card shadow-sm border-left-success">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Booking</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalData2 }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="ion ion-email fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.booking.index') }}" class="card-footer text-success clearfix small z-1">
                            <span class="float-left font-weight-bold">More info</span>
                            <span class="float-right">
                                <i class="fas fa-arrow-circle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-12 mb-4">
                    <!-- small box -->
                    <div class="card shadow-sm border-left-warning">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Lapangan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalData3 }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="ion ion-document-text fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.lapangan.index') }}" class="card-footer text-warning clearfix small z-1">
                            <span class="float-left font-weight-bold">More info</span>
                            <span class="float-right">
                                <i class="fas fa-arrow-circle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-12 mb-4">
                    <!-- small box -->
                    <div class="card shadow-sm border-left-success">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tersedia</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTersedia }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="ion ion-checkmark-circled fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.arena.index') }}" class="card-footer text-success clearfix small z-1">
                            <span class="float-left font-weight-bold">More info</span>
                            <span class="float-right">
                                <i class="fas fa-arrow-circle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-12 mb-4">
                    <!-- small box -->
                    <div class="card shadow-sm border-left-danger">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Booked</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBooked }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="ion ion-close-circled fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.arena.index') }}" class="card-footer text-danger clearfix small z-1">
                            <span class="float-left font-weight-bold">More info</span>
                            <span class="float-right">
                                <i class="fas fa-arrow-circle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-12 mb-4">
                    <!-- small box -->
                    <div class="card shadow-sm border-left-primary">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Aktif</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAktif }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="ion ion-checkmark-circled fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.arena.index') }}" class="card-footer text-primary clearfix small z-1">
                            <span class="float-left font-weight-bold">More info</span>
                            <span class="float-right">
                                <i class="fas fa-arrow-circle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section> --}}
    <!-- /.content -->
</div>
@endsection
