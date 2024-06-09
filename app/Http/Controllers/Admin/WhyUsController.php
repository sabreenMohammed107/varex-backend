<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WhyUsController extends Controller
{
    public function index()
    {
        $rows = WhyUs::all();
        return view('admin.whyUs.index', compact('rows'));
    }

    public function create()
    {
        return view('admin.whyUs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vedio_link' => 'required',
         ]);

       $whyUs = new whyUs();
       $whyUs->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        // Delete the old icon if it exists
        if ($request->hasFile('icon')) {
            // Delete the old icon if it exists
            if ($whyUs->icon && File::exists(public_path($whyUs->icon))) {
                File::delete(public_path($whyUs->icon));
            }
            // Get file name with extension
            $fileNameWithExt = $request->file('icon')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('icon')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            // Move uploaded file to public/uploads/category folder
            $request->file('icon')->move(public_path('uploads/whyUs'), $fileNameToStore);
            // Save file name to database
           $whyUs->icon = 'uploads/whyUs/' . $fileNameToStore;
        }
       $whyUs->description = ['ar' => $request->description_ar, 'en' => $request->description_en];
       $whyUs->save();

        return redirect()->route('admin.why-us.index')->with('success', 'whyUs created successfully.');
    }

    public function show(WhyUs $whyUs)
    {
        return view('admin.whyUs.show', compact('whyUs'));
    }

    public function edit($id)
    {
       $whyUs = WhyUs::findOrFail($id);
        return view('admin.whyUs.edit', compact('whyUs'));
    }

    public function update(Request $request, $id)
    {

       $whyUs = WhyUs::findOrFail($id);
       $whyUs->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        // Delete the old icon if it exists
        if ($request->hasFile('icon')) {
            // Delete the old icon if it exists
            if ($whyUs->icon && File::exists(public_path($whyUs->icon))) {
                File::delete(public_path($whyUs->icon));
            }
            // Get file name with extension
            $fileNameWithExt = $request->file('icon')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('icon')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            // Move uploaded file to public/uploads/category folder
            $request->file('icon')->move(public_path('uploads/whyUs'), $fileNameToStore);
            // Save file name to database
           $whyUs->icon = 'uploads/whyUs/' . $fileNameToStore;
        }
       $whyUs->description = ['ar' => $request->description_ar, 'en' => $request->description_en];
       $whyUs->save();

        return redirect()->route('admin.why-us.index')->with('success', 'whyUs updated successfully.');
    }

    public function destroy($id)
    {
       $whyUs = WhyUs::findOrFail($id);

        if ($whyUs->icon && File::exists(public_path($whyUs->icon))) {
            File::delete(public_path($whyUs->icon));
        }

        // Delete the category
       $whyUs->delete();

        return redirect()->route('why-us.index')->with('success', 'why us deleted successfully.');
    }
}
