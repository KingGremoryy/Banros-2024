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
        
                            <form action="" method="POST">
                                @csrf
                               
                                <div class="form-group">
                                  <label for="ruangs_id">Pilih Ruang</label>
                                  <div class="mt-1">
                                    <select name="ruangs_id" id="ruangs_id" class="form-multiselect block mt-1" style="width: 100%;">
                                      @foreach ($ruangs as $ruang)
                                      <option value="{{ $ruang->id }}" {{ $ruang->id == $pesanan->ruangs_id ? 'selected' : '' }}>
                                          {{ $ruang->lapangan }}
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
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
