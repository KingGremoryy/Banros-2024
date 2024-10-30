@extends('layout.main')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@section('content')
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pesanan Pelanggan</h1>
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

    <!-- Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Lapangan</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Harga</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->field->name }}</td>
                                    <td>{{ $order->date }}</td>
                                    <td>
                                        <div class="time-wrapper">
                                            <div class="time-text">
                                                {{ $order->tarifSession->first()->session_time }} <!-- Menampilkan satu sesi waktu pertama -->
                                                <span class="more-text" style="display: none;">
                                                    @foreach($order->tarifSession as $session)
                                                        <br>{{ $session->session_time }} <!-- Menampilkan semua sesi waktu -->
                                                    @endforeach
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>{{ $order->customer_phone }}</td>
                                    <td>
                                        @if($order->payment_status == 'Dalam Proses')
                                            <span class="badge bg-warning">{{ $order->payment_status }}</span> <!-- Kuning -->
                                        @elseif($order->payment_status == 'Sukses')
                                            <span class="badge bg-success">{{ $order->payment_status }}</span> <!-- Hijau -->
                                        @elseif($order->payment_status == 'Dibatalkan')
                                            <span class="badge bg-danger">{{ $order->payment_status }}</span> <!-- Merah -->
                                        @else
                                            <span class="badge bg-secondary">{{ $order->payment_status }}</span> <!-- Warna default untuk status lain -->
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Edit Button -->
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editOrderModal-{{ $order->id }}">Edit</button>
                                        
                                        <!-- Delete Button -->
                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteOrderModal-{{ $order->id }}">Hapus</button>
                                    </td>
                                </tr>
                                <style>
                             th {
                                    text-align: center; /* Menengahkan teks di dalam elemen <th> */
                                    vertical-align: middle; /* Memastikan isi header berada di tengah secara vertikal */
                                }

                                .badge {
                                    padding: 5px 10px; /* Memberikan padding untuk badge */
                                    border-radius: 5px; /* Membuat sudut badge lebih halus */
                                    color: white; /* Mengubah warna teks badge menjadi putih */
                                    text-align: center; /* Mengatur teks badge agar berada di tengah */
                                    display: inline-block; /* Memastikan badge berperilaku sebagai elemen blok inline */
                                    min-width: 100px; /* Menentukan lebar minimum agar badge tidak terlalu kecil */
                                }

                            .time-wrapper {
                                display: flex; /* Menggunakan Flexbox */
                                flex-direction: column; /* Menyusun elemen secara vertikal */
                                align-items: center; /* Menengahkan konten secara horizontal */
                                justify-content: center; /* Menengahkan konten secara vertikal */
                                cursor: pointer;
                                padding: 5px; /* Memberikan padding untuk lebih nyaman dilihat */
                                background-color: #e7f0ff; /* Warna biru muda sebagai latar belakang */
                                border: 1px solid #c1d3ff; /* Border berwarna biru */
                                border-radius: 5px; /* Membuat sudut lebih halus */
                                transition: background-color 0.3s; /* Transisi halus saat hover */
                            }

                            .time-text {
                                text-align: center; /* Mengatur teks agar berada di tengah */
                                display: block; /* Tampilkan satu waktu secara vertikal */
                            }


                                .time-wrapper:hover {
                                    background-color: #d0e2ff; /* Warna saat hover */
                                }

                                .more-text {
                                    display: none; /* Sembunyikan tampilan waktu tambahan awalnya */
                                }
                                </style>
                              <!-- Modal Edit -->
<div class="modal fade" id="editOrderModal-{{ $order->id }}" tabindex="-1" aria-labelledby="editOrderLabel-{{ $order->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editOrderLabel-{{ $order->id }}">Edit Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Field -->
                    <div class="form-group">
                        <label for="field_id">Lapangan</label>
                        <select class="form-control" name="field_id" required>
                            <option value="">Pilih Lapangan</option>
                            @foreach($fields as $field)
                                <option value="{{ $field->id }}" {{ $order->field_id == $field->id ? 'selected' : '' }}>{{ $field->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tanggal -->
                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input type="date" class="form-control" name="date" value="{{ $order->date }}" required>
                    </div>

                    <!-- Nama Pelanggan -->
                    <div class="form-group">
                        <label for="customer_name">Nama</label>
                        <input type="text" class="form-control" name="customer_name" value="{{ $order->customer_name }}" required>
                    </div>

                    <!-- Telepon Pelanggan -->
                    <div class="form-group">
                        <label for="customer_phone">Telepon</label>
                        <input type="tel" class="form-control" name="customer_phone" value="{{ $order->customer_phone }}" required>
                    </div>

                    <!-- Session Time and Price -->
                    @foreach($order->tarifSession as $index => $session)
                    <div class="form-row mb-2 session-row">
                        <div class="col-md-6">
                            <label for="session_time">Waktu</label>
                            <input type="text" class="form-control" name="session_time[]" value="{{ $session->session_time }}" required>
                        </div>
                    </div>
                    @endforeach

                    <div class="form-group">
                        <label for="payment_status">Status</label>
                        <select class="form-control" name="payment_status" required>
                            <option value="">Pilih Status</option>
                            <option value="Dalam Proses" {{ $order->payment_status == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
                            <option value="Sukses" {{ $order->payment_status == 'Sukses' ? 'selected' : '' }}>Diterima</option>
                            <option value="Dibatalkan" {{ $order->payment_status == 'Dibatalkan' ? 'selected' : '' }}>Batal</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


                               <!-- Modal Delete -->
<div class="modal fade" id="deleteOrderModal-{{ $order->id }}" tabindex="-1" aria-labelledby="deleteOrderLabel-{{ $order->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteOrderLabel-{{ $order->id }}">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus pesanan <strong>{{ $order->customer_name }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

                            @endforeach
                        </tbody>
                        <script>
                            document.querySelectorAll('.time-wrapper').forEach(wrapper => {
                                wrapper.addEventListener('click', () => {
                                    const moreText = wrapper.querySelector('.more-text');
                                    
                                    if (moreText.style.display === "none") {
                                        moreText.style.display = "block"; // Tampilkan seluruh waktu
                                    } else {
                                        moreText.style.display = "none"; // Sembunyikan waktu tambahan
                                    }
                                });
                            });
                        </script>
                    </table>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of {{ $orders->total() }} orders
                        </div>
                        <div>
                            {{ $orders->links('pagination::bootstrap-4') }} <!-- Menampilkan link pagination -->
                        </div>
                    </div>                    
            </div>
        </div>
    </section>
</div>

@endsection
