@extends('layout.guest')

@section('content')
    <div class="container mx-auto px-5 py-6">
        <h1 class="text-4xl font-bold mb-6 text-center text-green-600">{{ $lapangan->lapangan }}</h1>
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img class="w-full h-80 object-cover" src="{{ Storage::url($lapangan->image) }}" alt="Image" />
            <div class="p-6">
                <p class="text-gray-700 mb-4">{{ $lapangan->detail }}</p>
                <div class="text-xl font-bold text-green-600">Rp.{{ $lapangan->harga }}</div>
                <!-- Additional details or actions here -->
            </div>
        </div>
    </div>
@endsection
