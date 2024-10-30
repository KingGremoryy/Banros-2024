@extends('layout.main')
{{-- @section('content') --}}
{{-- @extends('layout.admin') --}}

@section('content')
    <div class="container mt-5">
        <h2>Bookings Management</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>User</th>
                    <th>Field</th>
                    <th>Date</th>
                    <th>Time</th>   
                    <th>Payment Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->field->name }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>{{ $booking->time }}</td>
                        <td>
                            <span class="badge badge-{{ $booking->payment_status == 'pending' ? 'warning' : 'success' }}">
                                {{ ucfirst($booking->payment_status) }}
                            </span>
                        </td>
                        <td>
                            @if($booking->payment_status == 'pending')
                                <form action="{{ route('admin.updateBookingStatus', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">Mark as Paid</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

    {{-- @endsection --}}
