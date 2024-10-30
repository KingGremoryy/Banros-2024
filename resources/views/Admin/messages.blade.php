@extends('layout.main')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pesan Masuk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Daftar Pesan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex mb-2 justify-content-end">
        <div class="col-auto">
            <form action="{{ route('admin.messages') }}" method="GET" class="mb-0">
                <div class="input-group">
                    <input type="text" name="search" class="form-control custom-search-input" placeholder="Search messages" value="{{ request('search') }}" style="width: 200px;">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
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
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Pesan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($messages->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada pesan ditemukan.</td>
                                    </tr>
                                @else
                                    @foreach ($messages as $key => $message)
                                    <tr>
                                        <td>{{ $messages->firstItem() + $key }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->phone }}</td>
                                        <td>{{ $message->message }}</td>
                                        <td>
                                            <a data-toggle="modal" data-target="#modal-hapus{{ $message->id }}" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="modal-hapus{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-hapus-label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modal-hapus-label">Hapus Pesan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus pesan dari <strong>{{ $message->name }}</strong>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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

                        <!-- Pagination -->
                        <div class="d-flex justify-content-between align-items-center" style="padding: 10px;">
                            <div>
                                Showing {{ $messages->firstItem() }} of {{ $messages->lastItem() }} to {{ $messages->total() }} messages
                            </div>
                            <div>
                                {{ $messages->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
