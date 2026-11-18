<?php

namespace App\Http\Controllers;

use App\Models\Senior;
use Illuminate\Http\Request;

class SeniorController extends Controller
{
    public function index()
    {
        $seniors = Senior::latest()->get();
        return view('seniors.index', compact('seniors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'osca_id'        => 'required|string|unique:seniors,osca_id',
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'birthdate'      => 'required|date',
            'contact_number' => 'nullable|string',
            'barangay'       => 'required|string',
        ], [
            'osca_id.unique'   => 'Warning: This OSCA ID number is already registered in the system!',
            'osca_id.required' => 'Please provide an OSCA ID number.',
            'birthdate.required' => 'Please select a valid birthdate.',
        ]);

        Senior::create($validated);

        return redirect()->route('seniors.index')->with('success', 'Senior Citizen successfully registered!');
    }

    public function update(Request $request, Senior $senior)
{
    $validated = $request->validate([
        'osca_id'        => 'required|string|max:50|unique:seniors,osca_id,' . $senior->id,
        'first_name'     => 'required|string|max:100',
        'last_name'      => 'required|string|max:100',
        'middle_name'    => 'nullable|string|max:100',
        'birthdate'      => 'required|date',
        'contact_number' => 'nullable|string|max:20',
        'barangay_id'    => 'nullable|exists:barangays,id',
        'address'        => 'nullable|string|max:255',
    ]);

    $senior->update($validated);

    return redirect()->route('seniors.index')
        ->with('success', 'Senior Citizen record successfully updated!');
}

public function destroy(Senior $senior)
{
    $senior->delete();

    return redirect()->route('seniors.index')
        ->with('success', 'Senior Citizen record successfully deleted!');
}

}