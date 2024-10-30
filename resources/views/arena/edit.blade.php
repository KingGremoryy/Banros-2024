@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <i class="fas fa-arrow-alt-circle-left"></i>
            <a href="{{ route('admin.arena.index') }}" class="m-0 text-info">Kembali</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Tambah Arena</li>
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
                <form action="{{ route('admin.arena.update', $arena->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label for="lapangan">Name</label>
                    <input type="text" class="form-control" id="lapangan" name="lapangan" value="{{ $arena->lapangan }}">
                    @error('lapangan')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror    
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <div class="mt-1">
                        <select name="status" id="status" class="form-multiselect block mt-1" style="width: 100%;">
                          @foreach (App\Enums\ArenaStatus::cases() as $status)
                            <option value="{{ $status->value }}" @selected($arena->status == $status->value)>{{ $status->name }}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                  <label for="arenaStatus">ArenaStatus</label>
                  <div class="mt-1">
                      <select name="arenaStatus" id="arenaStatus" class="form-multiselect block mt-1" style="width: 100%;">
                        @foreach (App\Enums\BookStatus::cases() as $arenaStatus)
                          <option value="{{ $arenaStatus->value }}" @selected($arena->arenaStatus == $arenaStatus->value)>{{ $arenaStatus->name }}</option>
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
