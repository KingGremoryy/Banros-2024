@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <i class="fas fa-arrow-alt-circle-left"></i>
            <a href="{{ route('admin.booking.index') }}" class="m-0 text-info">Kembali</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Data Booking</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <form action="{{ route('admin.booking.store') }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="first_name">Nama Depan</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Masukkan Nama Depan">
                    @error('first_name')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror    
                  </div>
                  <div class="form-group">
                    <label for="last_name">Nama Belakang</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Masukkan Nama Belakang">
                    @error('last_name')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror    
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email">
                    @error('email')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror  
                  </div>
                  <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="number" name="telepon" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon">
                    @error('telepon')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror  
                  </div>    
                  <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="res_date">Tanggal Pemesanan</label>
                                <input type="date" id="res_date" name="res_date" class="form-control @error('res_date') is-invalid @enderror">
                                @error('res_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>                        
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="res_time">Waktu Pemesanan</label>
                                <select id="res_time" name="res_time" class="form-control @error('res_time') is-invalid @enderror">
                                    @for ($hour = 9; $hour <= 22; $hour++)
                                        <option value="{{ $hour }}:00">{{ $hour }}:00</option>
                                        <option value="{{ $hour }}:00">{{ $hour }}:00</option>
                                    @endfor
                                </select>
                                @error('res_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>                        
                        </div>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="tamu">Tamu</label>
                    <input type="text" name="tamu" class="form-control" id="tamu" placeholder="Atas Nama">
                    @error('tamu')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror  
                  </div>
                  <div class="form-group">
                    <label for="arena_id">Pilih Arena</label>
                    <div class="mt-1">
                        <select name="arena_id" id="arena_id" class="form-multiselect block mt-1" style="width: 100%;">
                            @foreach ($arena as $ar)
                                <option value="{{ $ar->id }}">{{ $ar->lapangan }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>              
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
