<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Certificate;
use App\Models\ContactRequest;
use App\Models\DistributeRequest;
use App\Models\Faq;
use App\Models\WhyUs;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    public function index()
    {
        $about = AboutUs::first();
        $whyUs = WhyUs::all();
        $faqs = Faq::all();
        return view('aboutUs', compact('about', 'whyUs', 'faqs'));
    }
    public function certificates()
    {
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
    public function distribute(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'company_name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        DistributeRequest::create($validatedData);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
