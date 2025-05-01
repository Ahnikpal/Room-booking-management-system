@extends('AdminDashboard.Layout.adminBaseView')
@section('dashContent')

@if(isset($booking))
    <form action="{{ route('booking.update', ['id' => $booking->id]) }}" method="POST">
    @method('PUT')
@else
    <form action="{{ route('booking.save') }}" method="POST">
@endif
    @csrf

    <div class="container">

        {{-- Only Admin sees this --}}
        @if(Auth::user()->user_type == 1)
        <div class="mb-3 w-50">
            <label for="user_name" class="form-label">User Name</label>
            <select class="form-select" name="user_name" id="user_name" aria-label="Default select example">
                <option value="">Select User</option>
                @foreach($data as $user)
                    <option value="{{ $user->id }}"
                        {{ isset($booking->user_id) && $booking->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @else
        {{-- Regular user doesn't choose user ID --}}
        <input type="hidden" name="user_name" value="{{ isset($booking->user_id) ? $booking->user_id : Auth::user()->id }}">
        @endif

        <div class="mb-3 w-50">
            <label for="booking_name" class="form-label">Booking Name</label>
            <input type="text" class="form-control" id="booking_name" name="booking_name"
                   placeholder="Booking Name" value="{{ isset($booking->name) ? $booking->name : '' }}">
        </div>

        <div class="mb-3 w-50">
            <label for="booking_on" class="form-label">Booking Date</label>
            <input type="date" class="form-control" id="booking_on" name="booking_on"
                   value="{{ isset($booking->booking_datetime) ? \Illuminate\Support\Carbon::parse($booking->booking_datetime)->format('Y-m-d') : '' }}">
        </div>

        <div class="mb-3 w-50">
            <label for="booking_status" class="form-label">Booking Status</label>
            <select class="form-select" name="booking_status" id="booking_status" aria-label="Default select example">
                <option value="">Set Status</option>
                <option value="1" {{ isset($booking->status) && $booking->status == 1 ? 'selected' : '' }}>Booked</option>
                <option value="2" {{ isset($booking->status) && $booking->status == 2 ? 'selected' : '' }}>Booking Cancelled</option>
                <option value="3" {{ isset($booking->status) && $booking->status == 3 ? 'selected' : '' }}>Booking Fulfilled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($booking) ? 'Update' : 'Save' }}
        </button>

    </div>
</form>
@endsection
