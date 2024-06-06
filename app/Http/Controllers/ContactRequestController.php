<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Certificate;
use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    public function index()
    {
        $about = AboutUs::first();
        return view('aboutUs', compact('about'));
    }
     public function certificates(){
        $certificates = Certificate::all();
        return view('certificates', compact('certificates'));
     }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactRequest::create($validatedData);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
