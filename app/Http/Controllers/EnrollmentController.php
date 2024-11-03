<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('enrollment.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('enrollment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Add validation and store logic
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        return view('enrollment.show', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        return view('enrollment.edit', compact('enrollment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        // Add validation and update logic
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        // Add delete logic
    }
}
