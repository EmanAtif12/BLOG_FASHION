<?php

namespace App\Http\Controllers;

use App\Models\CallRequest;
use Illuminate\Http\Request;

class CallRequestController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'message' => 'nullable|string',
        ]);

        CallRequest::create($validatedData);

        return back()->with('success', 'Your request has been submitted successfully!');
    }
}
