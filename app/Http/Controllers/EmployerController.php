<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller {
    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $this->authorize('create', Employer::class);
        return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'company_name' => 'required|min:3|unique:employers,company_name',
            'logo' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $file = $request->file('logo');
        $path = $file->store('company_logo', 'private');

        Auth::user()->employer()->create([
            'company_name' => $validatedData['company_name'],
            'logo' => $path,
        ]);

        return redirect()->route('job-listings.index')->with('success', 'Your employer account was created!');
    }
}
