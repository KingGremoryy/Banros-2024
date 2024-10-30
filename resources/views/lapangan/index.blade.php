@extends('layout.main')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Field</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Detail Field</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a data-toggle="modal" data-target="#modal-tambah" class="btn btn-primary mb-3">Tambah Data</a>

                        <div class="card-body table-responsive p-0">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Field</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($fields->isEmpty())
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada field ditemukan.</td>
                                        </tr>
                                    @else
                                        @foreach ($fields as $key => $field)
                                        <tr>
                                            <td>{{ $fields->firstItem() + $key }}</td>
                                            <td>{{ $field->name }}</td>
                                            <td>
                                                <img src="{{ Storage::url($field->image_url) }}" alt="Image of {{ $field->name }}" style="max-width: 70px; max-height: 100px;">
                                            </td>
                                            <td>
                                                <a data-toggle="modal" data-target="#modal-edit{{ $field->id }}" class="btn btn-primary">
                                                    <i class="fas fa-pen"></i> Edit
                                                </a>
                                                <a data-toggle="modal" data-target="#modal-hapus{{ $field->id }}" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="modal-edit{{ $field->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit-label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('admin.lapangan.update', $field->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modal-edit-label">Edit Field</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Nama Field</label>
                                                                <input type="text" class="form-control" name="name" value="{{ $field->name }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="image_url">Foto (kosongkan jika tidak ingin mengubah)</label>
                                                                <input type="file" class="form-control" name="image_url">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Gambar Saat Ini</label><br>
                                                                <img src="{{ Storage::url($field->image_url) }}" alt="Image of {{ $field->name }}" style="max-width: 100px; max-height: 100px;">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="modal-hapus{{ $field->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-hapus-label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('admin.lapangan.destroy', $field->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modal-hapus-label">Hapus Field</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah Anda yakin ingin menghapus field <strong>{{ $field->name }}</strong>?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-between align-items-center" style="padding: 10px;">
                                <div>
                                    Showing {{ $fields->firstItem() }} to {{ $fields->lastItem() }} of {{ $fields->total() }} fields
                                </div>
                                {{-- <div>
                                    {{ $fields->appends(['search' => $request->get('search')])->links('pagination::bootstrap-4') }}
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <!-- Modal Tambah Field -->
                    <div class="modal fade" id="modal-tambah">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('admin.lapangan.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Field</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">Nama Field</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="image_url">Foto</label>
                                            <input type="file" class="form-control" name="image_url" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
