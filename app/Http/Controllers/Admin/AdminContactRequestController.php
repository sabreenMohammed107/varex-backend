<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminContactRequestController extends Controller
{
    public function index()
    {
        // Fetch all contact requests
        $contactRequests = ContactRequest::all();

        // Return view with contact requests data
        return view('admin.contact_requests.index', compact('contactRequests'));
    }
}