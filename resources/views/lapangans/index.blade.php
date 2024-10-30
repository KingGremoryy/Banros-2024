@extends('layout.guest')

@section('content')
<style>
    /* Card styles */
    .card {
        width: 100%;
        max-width: 300px; /* Adjust maximum width */
        height: 300px; /* Fixed height */
        display: flex;
        flex-direction: column;
        overflow: hidden;
        border-radius: 8px;
        position: relative; /* Add relative positioning */
        background: #fff; /* Ensure background color for proper layout */
    }

    .card img {
        width: 100%;
        height: 120px; /* Adjust image height */
        object-fit: cover; /* Ensure image covers area */
        display: block; /* Ensure image takes up full width */
    }

    .card-content {
        flex: 1;
        padding: 16px;
        display: flex;
        flex-direction: column;
    }

    /* View More button styles */
    .view-more-container {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50%; /* Cover full height of the card */
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
        transform: translateY(100%); /* Initially hide button */
        opacity: 0; /* Initially hide button */
        transition: transform 0.3s ease, opacity 0.3s ease; /* Animation for showing the button */
        color: white;
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        padding: 10px;
        border-top: 1px solid rgba(255, 255, 255, 0.3); /* Optional border for better visibility */
        z-index: 1; /* Ensure it is behind the card content */
    }

    .card:hover .view-more-container {
        transform: translateY(0); /* Show button on hover */
        opacity: 1; /* Make button fully visible */
        z-index: 10; /* Ensure it is above the card content */
    }

    /* Modal styles */
    #productModal {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 50;
        visibility: hidden;
        opacity: 0;
        transition: visibility 0.3s, opacity 0.3s ease;
    }

    #productModal.active {
        visibility: visible;
        opacity: 1;
    }

    .modal-content {
        background: #fff;
        border-radius: 8px;
        max-width: 500px;
        width: 100%;
        padding: 20px;
        position: relative;
    }

    .modal-content img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .close-button {
        position: absolute;
        top: 8px;
        right: 8px;
        background: red;
        color: #fff;
        border: none;
        padding: 8px;
        border-radius: 30%;
        cursor: pointer;
    }

   /* Styling umum untuk .tarif-container dan elemen terkait */
.tarif-container {
    width: 42%; /* Reduced container width */
    margin: 30px auto;
    padding: 15px; /* Reduced padding */
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.tarif-header {
    text-align: center;
    color: red;
    margin-bottom: 15px; /* Reduced margin */
    font-size: 18px; /* Reduced font size */
}

.tarif-list {
    display: flex;
    flex-wrap: wrap; /* Allows wrapping to the next line if necessary */
    gap: 15px; /* Adds space between items */
}

.tarif-list div {
    flex: 1 1 45%; /* Adjust to fit two items per row or change to 100% for full width */
}

.tarif-card {
    margin-bottom: 15px; /* Jarak antara kartu tarif */
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
    padding: 10px; /* Menambahkan padding dalam kartu tarif */
}

.tarif-card ul {
    font-size: 14px;
    display: flex;
    flex-wrap: wrap; /* Allows wrapping to the next line if necessary */
    padding: 0;
    list-style: none;
}

.tarif-card li {
    margin-right: 10px; /* Adds space between time slots */
    margin-bottom: 5px; /* Adds space between rows */
}

.btn-book {
    width: 100%;
    padding: 8px; /* Reduced padding */
    font-size: 14px; /* Reduced font size */
    background-color: red;
    color: #fff;
    border: none;
    border-radius: 5px;
}

/* Media Queries for Responsiveness */
@media (max-width: 1024px) {
    .tarif-container {
        width: 70%; /* Wider container on medium screens */
    }

    .tarif-list div {
        flex: 1 1 48%; /* 2 items per row on medium screens */
    }
}

@media (max-width: 768px) {
    .tarif-container {
        width: 85%; /* Wider container on small screens */
    }

    .tarif-list {
        gap: 10px; /* Reduce gap between items */
    }

    .tarif-list div {
        flex: 1 1 100%; /* 1 item per row on small screens */
    }
}

@media (max-width: 576px) {
    .tarif-header {
        font-size: 16px; /* Smaller font size for small screens */
    }

    .tarif-card ul {
        font-size: 12px; /* Smaller font size for list items */
    }

    .btn-book {
        padding: 10px; /* Slightly larger padding for readability */
        font-size: 16px; /* Larger font size for better usability */
    }
}

</style>

<div class="container mx-auto px-5 py-6">
    <h1 class="text-4xl font-bold mb-6 text-center text-green-600">Lapangan - Banros</h1>

    <div class="tarif-container">
        <h2 class="tarif-header">Pesan Sekarang!</h2>
        <div class="tarif-list">
            @foreach ($tarifs as $tarif)
                <div>
                    <h6>{{ $tarif->day }}</h6>
                    <div class="tarif-card">
                        <ul>
                            @foreach ($tarif->sessions as $session)
                                @php
                                    $formattedPrice = number_format($session->price, 0, ',', '.');
                                @endphp
                                <li>{{ $session->session_time }} | Rp. {{ $formattedPrice }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="btn-book">BOOK</button>
    </div>
    

    {{-- <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-6">
        @foreach ($lapangans as $lapangan)
            <div class="card mx-auto bg-white rounded-lg shadow-md overflow-hidden transition-transform transform hover:scale-105">
                <div class="relative">
                    <img src="{{ Storage::url($lapangan->image) }}" alt="Image" />
                    <div class="view-more-container btn-detail bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700"
                        data-lapangan='@json($lapangan)'>
                        View More
                    </div>
                </div>
                <div class="card-content">
                    <h4 class="mb-3 text-2xl font-semibold tracking-tight text-green-600 uppercase">
                        {{ $lapangan->lapangan }}
                    </h4>
                    <div class="flex items-center justify-between">
                        <span class="text-xl font-bold text-green-600">Rp.{{ $lapangan->harga }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Modal HTML -->
<div id="productModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
    <div class="modal-content">
        <button id="closeModal" class="close-button">&times;</button>
        <h2 class="text-2xl font-bold text-green-600" id="modalTitle"></h2>
        <img id="modalImage" class="w-full h-48 object-cover mt-4" />
        <p id="modalDetail" class="text-gray-700 mt-4"></p>
        <div class="flex items-center justify-between mt-4">
            <span id="modalPrice" class="text-xl font-bold text-green-600"></span>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('productModal');
        const closeModal = document.getElementById('closeModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalImage = document.getElementById('modalImage');
        const modalDetail = document.getElementById('modalDetail');
        const modalPrice = document.getElementById('modalPrice');

        // Function to open the modal
        function openModal(lapangan) {
            modalTitle.textContent = lapangan.lapangan;
            modalImage.src = lapangan.image;
            modalDetail.textContent = lapangan.detail;
            modalPrice.textContent = `Rp.${lapangan.harga}`;
            modal.classList.add('active');
        }

        // Function to close the modal
        closeModal.addEventListener('click', function () {
            modal.classList.remove('active');
        });

        // Adding event listener to buttons
        document.querySelectorAll('.btn-detail').forEach(button => {
            button.addEventListener('click', function () {
                const lapangan = JSON.parse(this.getAttribute('data-lapangan'));
                openModal(lapangan);
            });
        });
    });
</script> --}}
@endsection
