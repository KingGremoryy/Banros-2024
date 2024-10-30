@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Tarif Session</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- Card for displaying tarif session data -->
                    <div class="card">
                        <div class="card-header">
                            <a data-toggle="modal" data-target="#modal-create" class="btn btn-primary mb-3">Create New Tarif Session</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tarif ID</th>
                                        <th>Session Time</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tarifSessions as $tarifSession)
                                        <tr>
                                            <td>{{ $tarifSession->id }}</td>
                                            <td>{{ $tarifSession->tarif->name }}</td>
                                            <td>{{ $tarifSession->session_time }}</td>
                                            <td>{{ $tarifSession->price }}</td>
                                            <td>
                                                <a data-toggle="modal" data-target="#modal-edit-{{ $tarifSession->id }}" class="btn btn-primary" data-id="{{ $tarifSession->id }}">Edit</a>
                                                <a data-toggle="modal" data-target="#modal-delete-{{ $tarifSession->id }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal Create -->
                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create Tarif Session</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.tarifsession.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="tarif_id">Tarif</label>
                                            <select class="form-control" name="tarif_id" id="tarif_id" required>
                                                <option value="">Pilih Tarif</option>
                                                @foreach($tarifs as $tarif)
                                                    <option value="{{ $tarif->id }}">{{ $tarif->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div id="session-input-container">
                                            <div class="form-row mb-2 session-row">
                                                <div class="col-md-5">
                                                    <label for="session_time">Session Time</label>
                                                    <input type="text" class="form-control" name="session_time[]" placeholder="Session Time" required>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="price">Price</label>
                                                    <input type="number" class="form-control" name="price[]" placeholder="Price" required>
                                                </div>
                                                <div class="col-md-2 d-flex align-items-center justify-content-center">
                                                    <button type="button" class="btn btn-danger btn-sm remove-session">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn btn-secondary btn-sm" id="add-session-input">Tambah Session & Price</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit -->
                    @foreach($tarifSessions as $tarifSession)
                    <div class="modal fade" id="modal-edit-{{ $tarifSession->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Tarif Session</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.tarifsession.update', $tarifSession->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="tarif_id">Tarif</label>
                                            <select class="form-control" name="tarif_id" id="tarif_id" required>
                                                <option value="">Pilih Tarif</option>
                                                @foreach($tarifs as $tarif)
                                                    <option value="{{ $tarif->id }}" {{ $tarifSession->tarif_id == $tarif->id ? 'selected' : '' }}>{{ $tarif->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div id="session-input-container-{{ $tarifSession->id }}">
                                            <div class="form-row mb-2 session-row">
                                                <div class="col-md-5">
                                                    <label for="session_time">Session Time</label>
                                                    <input type="text" class="form-control" name="session_time[]" value="{{ $tarifSession->session_time }}" placeholder="Session Time" required>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="price">Price</label>
                                                    <input type="number" class="form-control" name="price[]" value="{{ $tarifSession->price }}" placeholder="Price" required>
                                                </div>
                                                <div class="col-md-2 d-flex align-items-center justify-content-center">
                                                    <button type="button" class="btn btn-danger btn-sm remove-session">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn btn-secondary btn-sm add-session-input" data-target="#session-input-container-{{ $tarifSession->id }}">Tambah Session & Price</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Modal Delete -->
                    @foreach($tarifSessions as $tarifSession)
                        <div class="modal fade" id="modal-delete-{{ $tarifSession->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Tarif Session</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.tarifsession.destroy', $tarifSession->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <p>Are you sure you want to delete this tarif session <strong>{{ $tarifSession->id }}</strong>?</p>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
</div>

<!-- Script for dynamic input handling -->
<script>
    document.getElementById('add-session-input').addEventListener('click', function() {
        let container = document.getElementById('session-input-container');
        let newSessionRow = document.createElement('div');
        newSessionRow.classList.add('form-row', 'mb-2', 'session-row');
        newSessionRow.innerHTML = `
            <div class="col-md-5">
                <label for="session_time">Session Time</label>
                <input type="text" class="form-control" name="session_time[]" placeholder="Session Time" required>
            </div>
            <div class="col-md-5">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price[]" placeholder="Price" required>
            </div>
            <div class="col-md-2 d-flex align-items-center justify-content-center">
                <button type="button" class="btn btn-danger btn-sm remove-session">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        container.appendChild(newSessionRow);
    });
    
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-session')) {
            e.target.closest('.session-row').remove();
        }
    });
    
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('add-session-input')) {
            let targetId = e.target.getAttribute('data-target');
            let container = document.querySelector(targetId);
            let newSessionRow = document.createElement('div');
            newSessionRow.classList.add('form-row', 'mb-2', 'session-row');
            newSessionRow.innerHTML = `
                <div class="col-md-5">
                    <label for="session_time">Session Time</label>
                    <input type="text" class="form-control" name="session_time[]" placeholder="Session Time" required>
                </div>
                <div class="col-md-5">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price[]" placeholder="Price" required>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-center">
                    <button type="button" class="btn btn-danger btn-sm remove-session">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
            container.appendChild(newSessionRow);
        }
    });
    </script>
    
