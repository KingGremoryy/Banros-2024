@extends('layout.guest')

@section('content')
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="flex items-center min-h-screen bg-gray-50">
            <div class="flex-1 max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
                <div class="flex flex-col md:flex-row">
                    <div class="h-32 md:h-auto md:w-1/2">
                        <!-- Ganti URL gambar dengan URL gambar yang valid -->
                        <img class="object-cover w-full h-full" src="https://unsplash.com/photos/a-white-cube-that-is-floating-in-the-air-mpXAVvxfxDg" alt="Placeholder">
                    </div>
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <h3 class="mb-4 text-xl font-bold text-blue-600">Buat Reservasi</h3>
        
                            <div class="w-full bg-gray-200 rounded-full">
                                <div class="w-40 p-1 text-xs font-medium leading-none text-center text-blue-100 bg-blue-600 rounded">Step 1</div>
                            </div>
        
                            <form action="{{ route('pesanan.store.step-one') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                  <label for="first_name">Nama Depan</label>
                                  <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $pesanan->first_name }}">
                                  @error('first_name')
                                    <small class="text-danger">{{ $message }}</small>
                                  @enderror    
                                </div>
                                <div class="form-group">
                                  <label for="last_name">Nama Belakang</label>
                                  <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $pesanan->last_name }}">
                                  @error('last_name')
                                    <small class="text-danger">{{ $message }}</small>
                                  @enderror    
                                </div>
                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" name="email" class="form-control" id="email" value="{{ $pesanan->email }}">
                                  @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                  @enderror  
                                </div>
                                <div class="form-group">
                                  <label for="telepon">Telepon</label>
                                  <input type="number" name="telepon" class="form-control" id="telepon" value="{{ $pesanan->telepon }}">
                                  @error('telepon')
                                    <small class="text-danger">{{ $message }}</small>
                                  @enderror  
                                </div>    
                                <div class="form-group">
                                  <label for="res_date">Tanggal Reservasi</label>
                                  <div class="input-group">
                                    <input type="datetime-local" id="res_date" name="res_date" value="{{ old('res_date', date('Y-m-d\TH:i', strtotime($pesanan->res_date))) }}">
                                  @error('res_date')
                                    <small class="text-danger">{{ $message }}</small>
                                  @enderror  
                                  </div>
                                </div>    
                                <div class="form-group">
                                  <label for="guest_number">guest_number</label>
                                  <input type="number" name="guest_number" class="form-control" id="guest_number" value="{{ $pesanan->guest_number }}">
                                  @error('guest_number')
                                    <small class="text-danger">{{ $message }}</small>
                                  @enderror  
                                </div>
                                <div class="form-group">
                            
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
        
    </div>
@endsection
