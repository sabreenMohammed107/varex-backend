<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class CertificateController extends Controller
{
    public function index()
    {
        $rows = Certificate::all();
        return view('admin.certificates.index', compact('rows'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rank' => 'required|integer',
        ]);

        $certificate = new Certificate();
        $certificate->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
        if ($request->hasFile('image')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Move uploaded file to public/uploads/certificate folder
            $request->file('image')->move(public_path('uploads/certificate'), $fileNameToStore);
            // Save file name to database
            $certificate->image = 'uploads/certificate/'.$fileNameToStore;
        }

        $certificate->rank = $request->rank;

        $certificate->save();

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate created successfully.');
    }

    public function show(Certificate $certificate)
    {
        return view('admin.certificates.show', compact('certificate'));
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rank' => 'required|integer',
        ]);
            $certificate = Certificate::findOrFail($id);
            $certificate->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
            // Delete the old icon if it exists
            if ($request->hasFile('image')) {
                // Delete the old icon if it exists
            if ($certificate->image && File::exists(public_path($certificate->image))) {
                File::delete(public_path($certificate->image));
            }
                // Get file name with extension
                $fileNameWithExt = $request->file('image')->getClientOriginalName();
                // Get just file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get just extension
                $extension = $request->file('image')->getClientOriginalExtension();
                // File name to store
                $fileNameToStore = $fileName.'_'.time().'.'.$extension;
                // Move uploaded file to public/uploads/certificate folder
                $request->file('image')->move(public_path('uploads/certificate'), $fileNameToStore);
                // Save file name to database
                $certificate->image = 'uploads/certificate/'.$fileNameToStore;
            }
        $certificate->rank = $request->rank;
        $certificate->save();

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate updated successfully.');
    }

    public function destroy($id)
    {
        $certificate = Certificate::findOrFail($id);

        // Delete the certificate icon if it exists
        if ($certificate->image && File::exists(public_path($certificate->image))) {
            File::delete(public_path($certificate->icon));
        }

        // Delete the certificate
        $certificate->delete();

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate deleted successfully.');
    }
}
