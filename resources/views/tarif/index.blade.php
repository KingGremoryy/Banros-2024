@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tarif</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Tarif Lapangan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <!-- /.card-header -->
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
                                        <th>Hari</th>
                                        <th>Sesi</th>
                                        <th>Harga</th>
                                        <th>Aksi    </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tarifs as $tarif)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tarif->day }}</td>
                                            <td>
                                                @foreach ($tarif->sessions as $session)
                                                    <div>{{ $session->session_time }}</div>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($tarif->sessions as $session)
                                                    <div>Rp. {{ $session->price }}</div>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a data-toggle="modal" data-target="#modal-edit" data-id="{{ $tarif->id }}" class="btn btn-primary btn-edit"><i class="fas fa-pen"></i>Edit</a>
                                                <a data-toggle="modal" data-target="#modal-hapus{{ $tarif->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
    
                    <!-- Pagination Links -->
                    <div class="pagination">
                        {{ $tarifs->links() }}
                    </div>
    
                </div>
            </div>
        </div>
    </section>    
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.tarif.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="day">Hari</label>
                        <input type="text" class="form-control" name="day" placeholder="Masukkan Hari" required>
                    </div>
                    <div class="form-group">
                        <label for="sessions">Sesi Dan Harga</label>
                        <div id="session-container">
                            <div class="input-group mb-2">
                                <select class="form-control" name="sessions[]" required>
                                    <option value="07:00 - 15:00">07:00 - 15:00</option>
                                    <option value="15:00 - 20:00">15:00 - 20:00</option>
                                    <option value="20:00 - 00:00">20:00 - 00:00</option>
                                </select>
                                <input type="number" class="form-control ml-2" name="prices[]" placeholder="Harga" required>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-end">
                        <div class="mb-2">
                            <button class="btn btn-outline-secondary add-session" type="button">+</button>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>  
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        document.querySelector('.add-session').addEventListener('click', function () {
                            let sessionContainer = document.getElementById('session-container');
                            let newInputGroup = document.createElement('div');
                            newInputGroup.classList.add('input-group', 'mb-2');
                            newInputGroup.innerHTML = `
                                <select class="form-control" name="sessions[]" required>
                                    <option value="07:00 - 15:00">07:00 - 15:00</option>
                                    <option value="15:00 - 20:00">15:00 - 20:00</option>
                                    <option value="20:00 - 00:00">20:00 - 00:00</option>
                                </select>
                                <input type="number" class="form-control ml-2" name="prices[]" placeholder="Price" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary remove-session" type="button">-</button>
                                </div>
                            `;
                            sessionContainer.appendChild(newInputGroup);
                            newInputGroup.querySelector('.remove-session').addEventListener('click', function () {
                                newInputGroup.remove();
                            });
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-form" action="" method="POST">
                    @csrf
                    @method('PUT') <!-- Method spoofing for PUT request -->
                    <div class="form-group">
                        <label for="day">Hari</label>
                        <input type="text" class="form-control" name="day" id="edit-day" placeholder="Masukkan Hari" required>
                    </div>
                    <div class="form-group">
                        <label for="sessions">Sesi Dan Harga</label>
                        <div id="edit-session-container">
                            <!-- Existing sessions will be populated here -->
                        </div>
                         <div class="d-flex flex-column align-items-end">
                        <div class="mb-2">
                            <button class="btn btn-outline-secondary add-session" type="button">+</button>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>  
                    </div>
                </form>

                <script>
                   document.addEventListener('DOMContentLoaded', function () {
    // Fungsi untuk meng-update event listeners
    function updateSessionButtons() {
        // Tambahkan event listener untuk tombol remove
        document.querySelectorAll('.remove-session').forEach(button => {
            button.removeEventListener('click', removeSessionHandler);
            button.addEventListener('click', removeSessionHandler);
        });

        // Tambahkan event listener untuk tombol add-session
        let addButtons = document.querySelectorAll('.add-session');
        addButtons.forEach(button => {
            button.removeEventListener('click', addSessionHandler);
            button.addEventListener('click', addSessionHandler);
        });
    }

    // Fungsi untuk menambahkan sesi baru
    function addSessionHandler() {
        let sessionContainer = document.getElementById('edit-session-container');
        let newInputGroup = document.createElement('div');
        newInputGroup.classList.add('input-group', 'mb-2');
        newInputGroup.innerHTML = `
            <select class="form-control" name="sessions[]" required>
                <option value="07:00 - 15:00">07:00 - 15:00</option>
                <option value="15:00 - 20:00">15:00 - 20:00</option>
                <option value="20:00 - 00:00">20:00 - 00:00</option>
            </select>
            <input type="number" class="form-control ml-2" name="prices[]" placeholder="Price" required>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary remove-session" type="button">-</button>
            </div>
        `;
        sessionContainer.appendChild(newInputGroup);
        updateSessionButtons(); // Reapply event listeners to new buttons
    }

    // Fungsi untuk menghapus sesi
    function removeSessionHandler() {
        this.closest('.input-group').remove();
    }

    // Panggil fungsi untuk set event listener pada tombol-tombol yang ada
    updateSessionButtons();

    // Tambahkan event listener untuk tombol edit
    document.querySelectorAll('.btn-edit').forEach(button => {
        button.addEventListener('click', function () {
            let id = this.getAttribute('data-id');
            let form = document.getElementById('edit-form');
            form.action = `/admin/tarif/${id}`;

            // Ambil data dari server dan populate form
            fetch(`/admin/tarif/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('edit-day').value = data.day;
                    let sessionContainer = document.getElementById('edit-session-container');
                    sessionContainer.innerHTML = ''; // Clear existing sessions

                    // Populate sesi dan harga yang sudah ada
                    data.sessions.forEach(session => {
                        let newInputGroup = document.createElement('div');
                        newInputGroup.classList.add('input-group', 'mb-2');
                        newInputGroup.innerHTML = `
                            <select class="form-control" name="sessions[]" required>
                                <option value="07:00 - 15:00" ${session.session_time === '07:00 - 15:00' ? 'selected' : ''}>07:00 - 15:00</option>
                                <option value="15:00 - 20:00" ${session.session_time === '15:00 - 20:00' ? 'selected' : ''}>15:00 - 20:00</option>
                                <option value="20:00 - 00:00" ${session.session_time === '20:00 - 00:00' ? 'selected' : ''}>20:00 - 00:00</option>
                            </select>
                            <input type="number" class="form-control ml-2" name="prices[]" value="${session.price}" placeholder="Price" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary remove-session" type="button">-</button>
                            </div>
                        `;
                        sessionContainer.appendChild(newInputGroup);
                    });

                    // Re-apply event listeners for dynamically added elements
                    updateSessionButtons();
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        });
    });
});

                </script>                
                
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Data -->
@foreach ($tarifs as $tarif)
    <div class="modal fade" id="modal-hapus{{ $tarif->id }}" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah kamu yakin ingin menghapus data <b>{{ $tarif->day }}</b>?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.tarif.destroy', ['tarif' => $tarif->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

 @endsection
