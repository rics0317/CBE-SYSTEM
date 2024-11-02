<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // Show the calendar with available slots
    public function calendar()
    {
        // Fetch available slots from the database
        $appointments = Appointment::where('status', 'available')->get();

        return view('student.appointment-calendar', compact('appointments'));
    }

    // Handle appointment booking
    public function book(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
        ]);

        $appointment = Appointment::find($request->appointment_id);
        $appointment->update([
            'student_id' => Auth::id(),
            'status' => 'booked',
        ]);

        return redirect()->route('student.appointments.calendar')->with('success', 'Appointment booked successfully.');
    }
}
