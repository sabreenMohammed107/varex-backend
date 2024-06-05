<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{

    public function edit()
    {
        // Retrieve the first entry in the contact_us table
        $contact = DB::table('contact_us')->first();

        // Pass the contact information to the view
        return view('admin.contactUs.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'email1' => 'required|email',
            'email2' => 'nullable|email',
            'sales_phone' => 'required|string',
            'service_support_phone' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'g_map' => 'nullable|string',
            'location_ar' => 'required|string',
            'location_en' => 'required|string',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);

        // Prepare the location JSON field
        $location = json_encode([
            'ar' => $validatedData['location_ar'],
            'en' => $validatedData['location_en']
        ]);

        // Update the contact_us table
        DB::table('contact_us')->update([
            'email1' => $validatedData['email1'],
            'email2' => $validatedData['email2'],
            'sales_phone' => $validatedData['sales_phone'],
            'service_support_phone' => $validatedData['service_support_phone'],
            'whatsapp' => $validatedData['whatsapp'],
            'g_map' => $validatedData['g_map'],
            'location' => $location,
            'facebook' => $validatedData['facebook'],
            'twitter' => $validatedData['twitter'],
            'instagram' => $validatedData['instagram'],
            'updated_at' => now(),
        ]);

        // Redirect back to the edit page with a success message
        return redirect()->route('admin.contact-us.edit')->with('success', 'Contact information updated successfully.');
    }


}
