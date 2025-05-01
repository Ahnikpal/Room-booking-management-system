<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $query = Booking::select('booking.*', 'users.name as user_name')
            ->leftJoin('users', 'booking.user_id', '=', 'users.id');
        
        $data = $query->get();
        return view('AdminDashboard.Bookings.index', ['data' => $data]);
    }
    
    public function userBookings()
    {
        // Fetch the user's bookings
        $bookings = Booking::where('user_id', Auth::id())->get();
    
        // Pass the bookings as 'data' to the view (to match the view variable name)
        return view('UserDashboard.Bookings.index', ['data' => $bookings]);
    }
    

    public function add()
    {
        $data = User::all(); // This defines $data
        return view('AdminDashboard.Bookings.addEdit', ['data' => $data]); // Passing it to the view
    }
    

    public function save(Request $request)
    {
        $request->validate([
            'booking_name' => 'required|string|max:255',
            'booking_on' => 'required|date',
            'booking_status' => 'required|string'
        ]);

        Booking::create([
            'name' => $request->booking_name,
            'booking_datetime' => $request->booking_on,
            'status' => $request->booking_status,
            'user_id' => Auth::user()->user_type == 1 
                ? $request->user_name 
                : Auth::id()
        ]);

        return redirect()->route('booking.all');
    }

    public function getBookingsById($id)
    {
        $data = User::all(); // Make sure $data is defined here
        $booking = Booking::findOrFail($id);
        return view('AdminDashboard.Bookings.addEdit', [
            'data' => $data, 
            'booking' => $booking
        ]);
    }
    

    public function updateBookingsById(Request $request, $id)
    {
        $request->validate([
            'booking_name' => 'required|string|max:255',
            'booking_on' => 'required|date',
            'booking_status' => 'required|string'
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update([
            'name' => $request->booking_name,
            'booking_datetime' => $request->booking_on,
            'status' => $request->booking_status,
            'user_id' => Auth::user()->user_type == 1 
                ? $request->user_name 
                : Auth::id()
        ]);

        $route = Auth::user()->user_type == 1 ? 'booking.all' : 'booking.my';
        return redirect()->route($route);
    }

    public function viewDelete($id)
    {
        $view = Auth::user()->user_type == 1 
            ? 'AdminDashboard.Bookings.delete' 
            : 'UserDashboard.Bookings.delete';
        
        return view($view, ['booking' => Booking::findOrFail($id)]);
    }
    
    public function delete($id)
    {
        // Find the booking by ID
        $booking = Booking::findOrFail($id);
        
        // Delete the booking
        $booking->delete();
        
        // Redirect based on user type (Admin or User)
        $route = Auth::user()->user_type == 1 ? 'booking.all' : 'booking.my';
        
        return redirect()->route($route)
            ->with('success', 'Booking deleted successfully');
    }
    
}