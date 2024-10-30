<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class KontakController extends Controller
{
    public function index(Request $request)
    {
        // Get search query if present
        $search = $request->input('search');

        // Get all messages from the database with pagination and search functionality
        $messages = Message::when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%")
                      ->orWhere('message', 'like', "%{$search}%");
            })
            ->paginate(4); // Adjust the number per page as needed

        // Display the contact page and send the message data
        return view('admin.messages', compact('messages', 'search')); // Pass search variable for preserving input
    }

    public function kirim(Request $request)
    {
        // Validate data
        $request->validate([
            'name' => 'required',
            'phone' => 'required|regex:/^[0-9]{10,15}$/', // Only accepts valid phone numbers
            'message' => 'required',
        ]);

        // Save message data to the database
        Message::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ]);

        // Redirect back with a success message
        return back()->with('success', 'Pesan Anda telah berhasil dikirim!');
    }

    public function destroy($id)
    {
        // Find and delete the message
        $message = Message::findOrFail($id);
        $message->delete();

        // Redirect with a success message
        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
