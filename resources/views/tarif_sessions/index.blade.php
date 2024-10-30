@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sesi Tarif</h1>
                </div>
                <div class="col-sm-6">
                    <form action="{{ route('orders.index') }}" method="GET" class="float-right">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari Pesanan" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                            <a data-toggle="modal" data-target="#modal-create" class="btn btn-primary mb-3">Tambah Data</a>
                        <div class="card-body table-responsive p-0">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Lapangan</th>
                                        <th>Hari</th>
                                        <th>Sesi Waktu</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tarifSessions as $tarifSession)
                                    <tr>
                                        <td>{{ $tarifSession->id }}</td>
                                        <td>{{ $tarifSession->field->name}}</td> 
                                        <td>{{ $tarifSession->day_of_week }}</td>
                                        <td>{{ $tarifSession->session_time }}</td>
                                        <td>{{ number_format($tarifSession->price, 0, ',', '.') }}</td>
                                        <td>
                                            <a data-toggle="modal" data-target="#modal-edit-{{ $tarifSession->id }}" class="btn btn-primary">Edit</a>
                                            <a data-toggle="modal" data-target="#modal-delete-{{ $tarifSession->id }}" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                        <!-- Pagination -->
                        <div class="d-flex justify-content-between align-items-center" style="padding: 10px;">
                            <div>
                                Showing {{ $tarifSessions->firstItem() }} of {{ $tarifSessions->lastItem() }} to {{ $tarifSessions->total() }} sesi tarif
                            </div>
                                {{ $tarifSessions->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Create -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Sesi Tarif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.tarif_sessions.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="field_id">Lapangan</label>
                        <select class="form-control" name="field_id" id="field_id" required>
                            <option value="">Pilih Lapangan</option>
                            @foreach($fields as $field)
                                <option value="{{ $field->id }}">{{ $field->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="day_of_week">Hari</label>
                        <select class="form-control" name="day_of_week" id="day_of_week" required>
                            <option value="">Pilih Hari</option>
                            @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                                <option value="{{ $day }}">{{ $day }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="session_time">Sesi Waktu</label>
                        <input type="text" class="form-control" name="session_time" placeholder="e.g., 07:00 - 15:00" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" class="form-control" name="price" placeholder="Harga" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit & Delete -->
@foreach($tarifSessions as $tarifSession)
    <!-- Modal Edit -->
    <div class="modal fade" id="modal-edit-{{ $tarifSession->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Sesi Tarif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.tarif_sessions.update', $tarifSession->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="field_id">Lapangan</label>
                            <select class="form-control" name="field_id" required>
                                @foreach($fields as $field)
                                    <option value="{{ $field->id }}" {{ $tarifSession->field_id == $field->id ? 'selected' : '' }}>{{ $field->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="day_of_week">Hari</label>
                            <select class="form-control" name="day_of_week" required>
                                @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                                    <option value="{{ $day }}" {{ $tarifSession->day_of_week == $day ? 'selected' : '' }}>{{ $day }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="session_time">Sesi Waktu</label>
                            <input type="text" class="form-control" name="session_time" value="{{ $tarifSession->session_time }}" placeholder="e.g., 07:00 - 15:00" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="number" class="form-control" name="price" value="{{ $tarifSession->price }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="modal-delete-{{ $tarifSession->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Sesi Tarif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.tarif_sessions.destroy', $tarifSession->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <p>Apakah kamu yakin ingin menghapus data ini? <strong>{{ $tarifSession->id }}</strong>?</p>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
