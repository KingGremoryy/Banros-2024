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
              <li class="breadcrumb-item active">Edit Booking</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-12"> <!-- Mengubah lebar kolom menjadi 8 -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.booking.update', $booking->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label for="first_name">Nama Depan</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $booking->first_name) }}">
                    @error('first_name')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror    
                  </div>
                  <div class="form-group">
                    <label for="last_name">Nama Belakang</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $booking->last_name) }}">
                    @error('last_name')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror    
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $booking->email) }}">
                    @error('email')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror  
                  </div>
                  <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="number" name="telepon" class="form-control" id="telepon" value="{{ old('telepon', $booking->telepon) }}">
                    @error('telepon')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror  
                  </div>    
                  <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="res_date">Tanggal Pemesanan</label>
                                <input type="date" id="res_date" name="res_date" value="{{ old('res_date', date('Y-m-d', strtotime($booking->res_date))) }}">
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
                                      @php
                                          $selectedTime = old('res_time', $booking->res_time ? date('H:i', strtotime($booking->res_time)) : ''); // Ambil waktu yang disimpan dalam database sebagai nilai default
                                          $time00 = sprintf('%02d:00', $hour);
                                          $time30 = sprintf('%02d:30', $hour);
                                      @endphp
                                      <option value="{{ $time00 }}" {{ $selectedTime == "$hour:00" ? 'selected' : '' }}>{{ $hour }}:00</option>
                                      <option value="{{ $time30 }}" {{ $selectedTime == "$hour:30" ? 'selected' : '' }}>{{ $hour }}:00</option>
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
                    <input type="text" name="tamu" class="form-control" id="tamu" value="{{ old('tamu', $booking->tamu) }}">
                    @error('tamu')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror  
                  </div>
                  <div class="form-group">
                    <label for="arena_id">Pilih Arena</label>
                    <div class="mt-1">
                        <select name="arena_id" id="arena_id" class="form-multiselect block mt-1" style="width: 100%;">
                            @foreach ($arena as $ar)
                                <option value="{{ $ar->id }}" {{ old('arena_id', $booking->arena_id) == $ar->id ? 'selected' : '' }}>
                                    {{ $ar->lapangan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>                
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
@endsection
